@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  // ————— AJAX de cantidad ————— 
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
      // actualiza cantidades y totales...
      const cantidadSpan = document.getElementById(`cantidad-${productoId}`);
      if (cantidadSpan) cantidadSpan.textContent = `${data.cantidad} kg`;
      const cantidadLista = document.getElementById(`cantidad-lista-${productoId}`);
      if (cantidadLista) cantidadLista.textContent = data.cantidad;

      const subEl = document.getElementById(`subtotal-${productoId}`);
      if (subEl && data.subtotal !== undefined) {
        subEl.dataset.subtotal = data.subtotal;
        subEl.textContent     = `S/ ${data.subtotal}`;
      }

      if (data.totalKg !== undefined) {
        document.getElementById('total-kg').textContent = `${data.totalKg} kg`;
      }
      if (data.totalPrice !== undefined) {
        document.getElementById('total-price').textContent = `S/ ${data.totalPrice}`;
      }
    })
    .catch(err => console.error(err));
  }

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

  // ————— Gestión de pasos ————— 
  const step1 = document.getElementById('step-1');
  const step2 = document.getElementById('step-2');
  const btnNext = document.getElementById('continuar-entrega');
  const btnBack = document.getElementById('volver-carrito');

  btnNext?.addEventListener('click', () => {
    step1.classList.add('hidden');
    step2.classList.remove('hidden');
    activarPaso(2);
  });

  btnBack?.addEventListener('click', () => {
    step2.classList.add('hidden');
    step1.classList.remove('hidden');
    activarPaso(1);
  });

  // Activa el paso 1 al cargar
  activarPaso(1);
});

/**
 * Activa visualmente los pasos y sus barras.
 * @param {number} paso — 1, 2 o 3
 */
function activarPaso(paso) {
  // Resetear todos a inactivo
  for (let i = 1; i <= 3; i++) {
    document.getElementById(`paso-${i}-circle`).className =
      'w-10 h-10 flex items-center justify-center rounded-full font-bold bg-gray-200 text-gray-500';
    document.getElementById(`paso-${i}-text`).className =
      'mt-2 text-sm font-medium text-gray-500';
  }
  document.getElementById('barra-1-2').className = 'h-1 col-span-1 bg-[#0B5C2E]/30';
  document.getElementById('barra-2-3').className = 'h-1 col-span-1 bg-[#0B5C2E]/30';

  // Activar hasta el paso indicado
  for (let i = 1; i <= paso; i++) {
    document.getElementById(`paso-${i}-circle`).className =
      'w-10 h-10 flex items-center justify-center rounded-full font-bold bg-green-600 text-white shadow-md';
    document.getElementById(`paso-${i}-text`).className =
      'mt-2 text-sm font-semibold text-[#0B5C2E]';
  }

  // Colorear barras según avance
  if (paso >= 2) document.getElementById('barra-1-2').className = 'h-1 col-span-1 bg-green-400';
  if (paso >= 3) document.getElementById('barra-2-3').className = 'h-1 col-span-1 bg-green-400';
}
</script>
@endpush
