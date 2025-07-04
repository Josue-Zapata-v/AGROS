@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  // ————— AJAX de cantidad (botones +/−) ————— 
  function actualizarCantidad(productoId, accion) {
    fetch("{{ route('carrito.actualizar') }}", {
      method: "POST",
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
      },
      body: JSON.stringify({ producto_id: productoId, accion: accion })
    })
    .then(res => {
      if (!res.ok) throw new Error('Error al actualizar');
      return res.json();
    })
    .then(data => {
      // repinta cantidad y subtotales desde respuesta
      const input = document.getElementById(`input-cantidad-${productoId}`);
      if (input) input.value = data.cantidad;
      const lista = document.getElementById(`cantidad-lista-${productoId}`);
      if (lista) lista.textContent = data.cantidad;
      const subEl = document.getElementById(`subtotal-${productoId}`);
      if (subEl) {
        subEl.dataset.subtotal = data.subtotal;
        subEl.textContent     = `S/ ${data.subtotal}`;
      }
      document.getElementById('total-kg').textContent    = `${data.totalKg} kg`;
      document.getElementById('total-price').textContent = `S/ ${data.totalPrice}`;
      validarRestriccionesCarrito();
      actualizarResumen();
    })
    .catch(err => console.error(err));
  }

  // botones + / −
  document.querySelectorAll('.btn-increment').forEach(btn =>
    btn.addEventListener('click', e => {
      e.preventDefault();
      actualizarCantidad(btn.dataset.id, 'incrementar');
    })
  );
  document.querySelectorAll('.btn-decrement').forEach(btn =>
    btn.addEventListener('click', e => {
      e.preventDefault();
      actualizarCantidad(btn.dataset.id, 'disminuir');
    })
  );

  // ————— Input editable de cantidad ————— 
  document.querySelectorAll('.input-cantidad').forEach(input => {
    const id     = input.dataset.id;
    const alerta = document.getElementById(`alert-${id}`);

    // validación y resumen en tiempo real
    input.addEventListener('input', () => {
      let val    = parseInt(input.value, 10);
      const min  = parseInt(input.dataset.min, 10);
      const stock= parseInt(input.dataset.stock, 10);
      const max  = Math.min(parseInt(input.dataset.max, 10), stock);

      if (isNaN(val) || val < min || val > max) {
        input.classList.add('border-red-500');
        if (alerta) alerta.classList.remove('hidden');
      } else {
        input.classList.remove('border-red-500');
        if (alerta) alerta.classList.add('hidden');
      }
      actualizarResumen();
    });

    // cambio definitivo → forzar blur (y su fetch)
    input.addEventListener('change', () => input.blur());

    // al salir del campo → clamp, fetch y resumen
    input.addEventListener('blur', () => {
      let val    = parseInt(input.value, 10);
      const min  = parseInt(input.dataset.min, 10);
      const stock= parseInt(input.dataset.stock, 10);
      const max  = Math.min(parseInt(input.dataset.max, 10), stock);

      if (isNaN(val) || val < min) val = min;
      if (val > max) val = max;

      input.value = val;
      input.classList.remove('border-red-500');
      if (alerta) alerta.classList.add('hidden');

      // AJAX para persistir el cambio manual
      fetch("{{ route('carrito.actualizar') }}", {
        method: "POST",
        headers: {
          'Content-Type': 'application/json',
          'Accept': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: JSON.stringify({ producto_id: id, cantidad_manual: val })
      })
      .then(res => {
        if (!res.ok) throw new Error('Error al actualizar');
        return res.json();
      })
      .then(data => {
        const lista = document.getElementById(`cantidad-lista-${id}`);
        if (lista) lista.textContent = data.cantidad;
        const subEl = document.getElementById(`subtotal-${id}`);
        if (subEl) {
          subEl.dataset.subtotal = data.subtotal;
          subEl.textContent     = `S/ ${data.subtotal}`;
        }
        document.getElementById('total-kg').textContent    = `${data.totalKg} kg`;
        document.getElementById('total-price').textContent = `S/ ${data.totalPrice}`;
        validarRestriccionesCarrito();
        actualizarResumen();
      })
      .catch(err => console.error(err));
    });
  });

  // ————— Gestión de pasos y validación ————— 
  const step1   = document.getElementById('step-1');
  const step2   = document.getElementById('step-2');
  const btnNext = document.getElementById('continuar-entrega');
  const btnBack = document.getElementById('volver-carrito');

  function validarRestriccionesCarrito() {
    let errores = 0;
    document.querySelectorAll('article[data-id]').forEach(el => {
      const id       = el.dataset.id;
      const cantidad = parseInt(document.getElementById(`input-cantidad-${id}`).value, 10);
      const stock    = parseInt(el.dataset.stock, 10);
      const min      = parseInt(el.dataset.min, 10);
      const max      = parseInt(el.dataset.max, 10);
      const efectivo = Math.min(max, stock);

      el.querySelector('.btn-decrement').disabled = cantidad <= min;
      el.querySelector('.btn-increment').disabled = cantidad >= efectivo;

      if (cantidad < min || cantidad > efectivo) errores++;
    });

    if (btnNext) btnNext.disabled = errores > 0;
  }

  btnNext?.addEventListener('click', e => {
    validarRestriccionesCarrito();
    if (btnNext.disabled) {
      alert('Corrige las cantidades: alguna está fuera de stock o límites mínimo/máximo.');
      e.preventDefault();
      return;
    }
    step1.classList.add('hidden');
    step2.classList.remove('hidden');
    activarPaso(2);
  });

  btnBack?.addEventListener('click', () => {
    step2.classList.add('hidden');
    step1.classList.remove('hidden');
    activarPaso(1);
  });

  // inicializaciones
  activarPaso(1);
  validarRestriccionesCarrito();
  actualizarResumen();

  // ————— Actualiza todo el resumen en cliente —————
  function actualizarResumen() {
    let totalKg    = 0;
    let totalPrice = 0;

    document.querySelectorAll('article[data-id]').forEach(el => {
      const id    = el.dataset.id;
      const qty   = parseInt(document.getElementById(`input-cantidad-${id}`).value, 10) || 0;
      const price = parseFloat(el.dataset.price);

      const subtotal = qty * price;
      totalKg    += qty;
      totalPrice += subtotal;

      const subEl = document.getElementById(`subtotal-${id}`);
      if (subEl) {
        subEl.dataset.subtotal = subtotal.toFixed(2);
        subEl.textContent     = `S/ ${subtotal.toFixed(2)}`;
      }
    });

    document.getElementById('total-kg').textContent    = `${totalKg} kg`;
    document.getElementById('total-price').textContent = `S/ ${totalPrice.toFixed(2)}`;
  }
});

// ————— Función para pasos visuales —————
function activarPaso(paso) {
  for (let i = 1; i <= 3; i++) {
    document.getElementById(`paso-${i}-circle`).className =
      'w-10 h-10 flex items-center justify-center rounded-full font-bold bg-gray-200 text-gray-500';
    document.getElementById(`paso-${i}-text`).className =
      'mt-2 text-sm font-medium text-gray-500';
  }
  document.getElementById('barra-1-2').className = 'h-1 col-span-1 bg-[#0B5C2E]/30';
  document.getElementById('barra-2-3').className = 'h-1 col-span-1 bg-[#0B5C2E]/30';
  for (let i = 1; i <= paso; i++) {
    document.getElementById(`paso-${i}-circle`).className =
      'w-10 h-10 flex items-center justify-center rounded-full font-bold bg-green-600 text-white shadow-md';
    document.getElementById(`paso-${i}-text`).className =
      'mt-2 text-sm font-semibold text-[#0B5C2E]';
  }
  if (paso >= 2) document.getElementById('barra-1-2').className = 'h-1 col-span-1 bg-green-400';
  if (paso >= 3) document.getElementById('barra-2-3').className = 'h-1 col-span-1 bg-green-400';
}
</script>
@endpush
