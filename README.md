<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

------------------
# 📘 Índice de Contenido

1. [📌 Descripción del proyecto](#descripción-del-proyecto)
2. [🚀 Funcionalidades principales](#funcionalidades-principales)
3. [🛠️ Tecnologías utilizadas](#tecnologías-utilizadas)
4. [⚙️ Instalación y configuración local](#instalación-y-configuración-local)
5. [👥 Gestión de usuarios y roles](#gestión-de-usuarios-y-roles)
6. [📦 Estructura de carpetas](#estructura-de-carpetas)
7. [🧾 Base de datos y tablas principales](#base-de-datos-y-tablas-principales)
8. [🧪 Pruebas y usuarios de ejemplo](#pruebas-y-usuarios-de-ejemplo)
9. [📈 Mejoras futuras o pendientes](#mejoras-futuras-o-pendientes)
10. [👨‍💻 Autor y créditos](#autor-y-créditos)
11. [📂 Anexos: Exploración del código fuente por módulos (en desarrollo)](#anexos-exploración-del-código-fuente-por-módulos-en-desarrollo)

# 📌 Descripción del proyecto

**AGROS** es una plataforma web desarrollada con Laravel y PHP cuyo objetivo principal es **digitalizar el comercio agrícola en el Perú**, conectando directamente a **agricultores**, **compradores** y **transportistas**, sin intermediarios. La plataforma busca promover la **eficiencia logística**, la **comercialización justa de productos agrícolas** y el desarrollo tecnológico en el sector rural.

Este proyecto forma parte del curso **Desarrollo de Aplicaciones en Internet - Ciclo 2025-I** del **Instituto TECSUP**, y ha sido diseñado para simular un entorno real de comercio electrónico orientado al sector agroindustrial.

La plataforma se estructura en torno a tres actores principales:

- 👨‍🌾 **Agricultor**: Publica productos agrícolas, define precios por kilogramo y gestiona pedidos y postulaciones de transporte.
- 🛒 **Comprador**: Navega los productos disponibles, añade al carrito, selecciona cantidades, define dirección de entrega y realiza pedidos.
- 🚚 **Transportista**: Visualiza pedidos disponibles, se postula para transportarlos, y espera aprobación del agricultor.

AGROS busca fomentar una experiencia digital completa para los pequeños y medianos productores agrícolas peruanos, facilitando la venta directa y mejorando los procesos de distribución de forma transparente y organizada.

# 🚀 Funcionalidades principales

La plataforma AGROS ofrece funcionalidades específicas para cada tipo de usuario registrado, permitiendo una experiencia completa de comercio agrícola digital.

## 👨‍🌾 Agricultor

- Publicación de productos con precio por kilogramo.
- Visualización y gestión de sus productos publicados.
- Edición y eliminación de productos.
- Visualización de pedidos recibidos por parte de los compradores.
- Gestión de postulaciones de transportistas para el envío de productos (aceptar o rechazar).
- Visualización y edición de su perfil personal y datos de contacto.

## 🛒 Comprador

- Navegación por el catálogo de productos disponibles.
- Añadir productos al carrito de compras.
- Modificar cantidad de productos según el mínimo, máximo y stock disponible.
- Selección de dirección de entrega en una interfaz por pasos.
- Confirmación de pedido final con resumen de la compra.

## 🚚 Transportista

- Visualización de pedidos disponibles para transporte.
- Postulación para transportar un pedido específico.
- Revisión del estado de sus postulaciones (aceptadas o rechazadas).

# 🛠️ Tecnologías utilizadas

AGROS ha sido desarrollado con un stack moderno orientado al desarrollo web backend y frontend utilizando herramientas del ecosistema de Laravel.

### 🔙 Backend

- **PHP 8.2** – Lenguaje principal del servidor.
- **Laravel 12.15** – Framework PHP utilizado para construir toda la lógica del backend.
- **MySQL** – Sistema de gestión de base de datos relacional.
- **Laravel Breeze** – Sistema ligero de autenticación de usuarios con redirección por roles.
- **Blade** – Motor de plantillas utilizado para renderizar las vistas HTML.

### 🎨 Frontend

- **Tailwind CSS** – Framework de estilos utility-first para construir una interfaz moderna y adaptable.
- **Vite** – Herramienta de desarrollo utilizada para compilar assets frontend (`npm run dev`).

### 📦 Dependencias adicionales

- **Composer** – Gestor de dependencias PHP.
- **NPM** – Gestor de paquetes para compilar los assets con Tailwind y Vite.

> **Nota:** La estructura de base de datos se creó parcialmente con migraciones (7 tablas) y parcialmente de forma manual usando phpMyAdmin en MySQL (6 tablas). A futuro se recomienda migrar toda la estructura a migraciones para mejor control de versiones y despliegue.

# ⚙️ Instalación y configuración local

Para ejecutar el proyecto AGROS en un entorno local de desarrollo, se deben seguir los siguientes pasos:

### 🧬 1. Clonar el repositorio

```bash
git clone https://github.com/Josue-Zapata-v/AGROS.git
cd agros
```

### 📦 2. Instalar dependencias

```bash
composer install
npm install
```

### ⚙️ 3. Configurar el entorno

```bash
cp .env.example .env
php artisan key:generate
```

### 🗃️ 4. Configurar la base de datos

* Crear una base de datos vacía en MySQL con el nombre `agros_db`.
* Importar el archivo `/database/agros_db.sql` desde phpMyAdmin o con el siguiente comando:

```bash
mysql -u root -p agros_db < database/agros_db.sql
```

* Actualizar el archivo `.env` con las siguientes credenciales:

```
DB_DATABASE=agros_db
DB_USERNAME=root
DB_PASSWORD=
```

### 🎨 5. Compilar los assets con Vite

```bash
npm run dev
```

### 🚀 6. Iniciar el servidor de desarrollo

```bash
php artisan serve
```

La aplicación estará disponible en:

```
http://localhost:8000
```

# 👥 Gestión de usuarios y roles

AGROS gestiona a sus usuarios a través de un sistema de autenticación con redirección según el rol asignado. Existen tres tipos de usuarios principales, cada uno con funcionalidades específicas:

### 👨‍🌾 Agricultor

* Publica productos con precio por kilogramo.
* Administra el stock, el mínimo y máximo por envío.
* Visualiza pedidos recibidos.
* Revisa postulaciones de transportistas y aprueba o rechaza envíos.
* Edita su perfil y datos de contacto.

### 🛒 Comprador

* Se registra y navega el catálogo de productos disponibles.
* Añade productos al carrito y define la cantidad deseada.
* Ingresa la dirección de entrega y confirma el pedido en una interfaz por pasos.
* Consulta sus pedidos realizados.

### 🚚 Transportista

* Visualiza pedidos disponibles para postulación.
* Se postula para transportar pedidos específicos.
* Revisa el estado de sus postulaciones (aceptadas o rechazadas).

### 🔐 Control de acceso

* El sistema de autenticación está implementado con Laravel Breeze.
* Tras iniciar sesión, los usuarios son redirigidos automáticamente a su respectivo dashboard según su rol.
* Se realiza validación para asegurar que cada usuario acceda únicamente a las rutas permitidas para su rol.

---

# 📦 Estructura de carpetas


```plaintext
AGROS/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Agricultor/
│   │   │   ├── Auth/
│   │   │   ├── Comprador/
│   │   │   ├── Publico/
│   │   │   ├── Transportista/
│   │   │   ├── CarritoController.php
│   │   │   ├── PagoController.php
│   │   │   ├── ProfileController.php
│   │   │   └── Controller.php
│   │   ├── Kernel.php
│   │   ├── Middleware/
│   │   └── Requests/
│   ├── Models/
│   │   ├── Categoria.php
│   │   ├── DetallePedido.php
│   │   ├── Pago.php
│   │   ├── Pedido.php
│   │   ├── PostulacionTransportista.php
│   │   ├── Producto.php
│   │   ├── Transporte.php
│   │   └── User.php
│   ├── Providers/
│   │   └── AppServiceProvider.php
│   └── View/
│       └── Components/
│           ├── AppLayout.php
│           ├── FooterPublico.php
│           └── GuestLayout.php
│
├── bootstrap/
│   ├── app.php
│   ├── providers.php
│   └── cache/
│       ├── .gitignore
│       ├── packages.php
│       └── services.php
│
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   └── session.php
│
├── database/
│   ├── factories/
│   │   └── UserFactory.php
│   ├── migrations/
│   │   ├── 2025_06_11_233555_create_sessions_table.php
│   │   ├── 2025_06_12_001708_create_cache_table.php
│   │   ├── 2025_06_13_040805_add_timestamps_to_postulaciones_transportistas_table.php
│   │   ├── 2025_06_23_003338_create_categorias_table.php
│   │   ├── 2025_06_23_003424_create_categoria_producto_table.php
│   │   ├── 2025_07_04_232808_create_pagos_table.php
│   │   └── 2025_07_05_232623_replace_direccion_field_in_users.php
│   ├── seeders/
│   │   └── DatabaseSeeder.php
│   ├── .gitignore
│   └── database.sqlite
│
├── public/
│   ├── .htaccess
│   ├── favicon.ico
│   ├── index.php
│   ├── robots.txt
│   ├── storage
│   └── build/
│       ├── assets/
│       │   ├── app-Bf4POITK.js
│       │   └── app-CVatbMnu.css
│       └── manifest.json
│
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   ├── app.js
│   │   └── bootstrap.js
│   └── views/
│       ├── agricultor/
│       │   ├── dashboard.blade.php
│       │   ├── pedidos/
│       │   ├── perfil.blade.php
│       │   ├── postulaciones/
│       │   └── productos/
│       │       ├── create.blade.php
│       │       ├── edit.blade.php
│       │       └── index.blade.php
│       ├── auth/
│       │   ├── confirm-password.blade.php
│       │   ├── forgot-password.blade.php
│       │   ├── login.blade.php
│       │   ├── register.blade.php
│       │   ├── reset-password.blade.php
│       │   ├── unificado.blade.php
│       │   └── verify-email.blade.php
│       ├── components/
│       │   ├── app-layout.blade.php
│       │   ├── application-logo.blade.php
│       │   ├── auth-session-status.blade.php
│       │   ├── danger-button.blade.php
│       │   ├── dropdown-link.blade.php
│       │   ├── dropdown.blade.php
│       │   ├── footer-publico.blade.php
│       │   ├── header-publico.blade.php
│       │   ├── icono-carrito.blade.php
│       │   ├── input-error.blade.php
│       │   ├── input-label.blade.php
│       │   ├── modal.blade.php
│       │   ├── nav-link.blade.php
│       │   ├── primary-button.blade.php
│       │   ├── responsive-nav-link.blade.php
│       │   ├── secondary-button.blade.php
│       │   └── text-input.blade.php
│       ├── comprador/
│       │   ├── dashboard.blade.php
│       │   ├── mis_pedidos.blade.php
│       │   ├── pedidos/
│       │   └── productos/
│       │       └── show.blade.php
│       ├── dashboard.blade.php
│       ├── layouts/
│       │   ├── agricultor.blade.php
│       │   ├── app.blade.php
│       │   ├── guest.blade.php
│       │   ├── navigation.blade.php
│       │   ├── publico.blade.php
│       │   └── transportista.blade.php
│       ├── profile/
│       │   ├── edit.blade.php
│       │   └── partials/
│       │       ├── delete-user-form.blade.php
│       │       ├── update-password-form.blade.php
│       │       └── update-profile-information-form.blade.php
│       ├── publico/
│       │   ├── carrito/
│       │   │   ├── confirmacion.blade.php
│       │   │   ├── index.blade.php
│       │   │   ├── _paso1-carrito.blade.php
│       │   │   ├── _paso2-entrega.blade.php
│       │   │   ├── _paso3-pago.blade.php
│       │   │   ├── _pasos-header.blade.php
│       │   │   └── _scripts.blade.php
│       │   └── pedidos/
│       ├── transportista/
│       │   ├── dashboard.blade.php
│       │   ├── pedidos/
│       │   ├── postulaciones/
│       │   └── transportes/
│       ├── welcome.blade.php
│
├── routes/
│   ├── auth.php
│   ├── console.php
│   └── web.php
│
├── storage/
│   ├── app/
│   │   ├── .gitignore
│   │   ├── private/
│   │   └── public/
│   ├── framework/
│   │   ├── .gitignore
│   │   ├── cache/
│   │   ├── sessions/
│   │   ├── testing/
│   │   └── views/
│   └── logs/
│       ├── .gitignore
│       └── laravel.log
│
├── tests/
│   ├── Feature/
│   │   ├── Auth/
│   │   │   ├── AuthenticationTest.php
│   │   │   ├── EmailVerificationTest.php
│   │   │   ├── PasswordConfirmationTest.php
│   │   │   ├── PasswordResetTest.php
│   │   │   ├── PasswordUpdateTest.php
│   │   │   └── RegistrationTest.php
│   │   ├── ExampleTest.php
│   │   └── ProfileTest.php
│   ├── TestCase.php
│   └── Unit/
│       └── ExampleTest.php
│
├── vendor/
│
├── .editorconfig
├── .env
├── .env.example
├── .gitattributes
├── .gitignore
├── artisan
├── composer.json
├── composer.lock
├── package-lock.json
├── package.json
├── phpunit.xml
├── postcss.config.js
├── README.md
├── tailwind.config.js
└── vite.config.js


El proyecto AGROS mantiene una estructura organizada basada en las convenciones de Laravel, con separaciones claras por roles y componentes.

### 🔁 Carpetas destacadas

* **`app/Http/Controllers/`**:
  Contiene los controladores de cada actor del sistema, organizados en subcarpetas:

  * `Agricultor/`, `Comprador/`, `Transportista/`, `Publico/`, `Auth/`
  * Controladores comunes como `CarritoController`, `PagoController`, `ProfileController`.

* **`app/Models/`**:
  Modelos de las tablas principales: `Producto`, `Pedido`, `DetallePedido`, `PostulacionTransportista`, `User`, entre otros.

* **`resources/views/`**:
  Vistas Blade organizadas por rol y función:

  * `agricultor/`, `comprador/`, `transportista/`, `publico/`, `auth/`, `components/`, `layouts/`

* **`routes/`**:
  Rutas de la aplicación definidas en:

  * `web.php`, `auth.php`

* **`database/migrations/`**:
  Migraciones utilizadas en parte del proyecto (7 tablas).
  También se incluye el archivo `agros_db.sql` con toda la estructura y datos base.

* **`public/`**:
  Archivos públicos accesibles desde el navegador (index, favicon, assets compilados con Vite).

* **`resources/js/` y `resources/css/`**:
  Archivos JavaScript y CSS base utilizados por Vite y Tailwind CSS.

* **`storage/` y `bootstrap/cache/`**:
  Archivos temporales, logs, vistas compiladas y cachés internos de Laravel.

---

# 🧾 Base de datos y tablas principales

La base de datos de AGROS está diseñada para gestionar eficientemente la relación entre los tres tipos de usuarios (agricultor, comprador y transportista), los productos agrícolas y la cadena de pedidos y envíos.

### 📌 Detalles generales

* Motor utilizado: **MySQL**
* Nombre de la base de datos: `agros_db`
* El archivo `agros_db.sql` contiene toda la estructura y datos mínimos para iniciar el sistema.
* Algunas tablas se generaron mediante **migraciones de Laravel**, y otras se crearon directamente desde **phpMyAdmin**.

### 🧱 Tablas principales

| Tabla                          | Descripción                                                              |
| ------------------------------ | ------------------------------------------------------------------------ |
| `users`                        | Almacena los datos de los usuarios registrados, incluyendo su rol.       |
| `productos`                    | Registra los productos agrícolas publicados por los agricultores.        |
| `pedidos`                      | Guarda la información general de cada pedido realizado por compradores.  |
| `detalle_pedido`               | Contiene los productos y cantidades específicas dentro de un pedido.     |
| `postulaciones_transportistas` | Postulaciones de los transportistas para transportar pedidos.            |
| `transportes`                  | Registro del estado del transporte aceptado y completado.                |
| `pagos`                        | Información relacionada a la simulación del proceso de pago.             |
| `categorias`                   | Categorías generales de productos agrícolas.                             |
| `categoria_producto`           | Tabla pivote para relación muchos a muchos entre productos y categorías. |
| `migrations`                   | Control de migraciones realizadas con Laravel.                           |
| `password_reset_tokens`        | Tokens para recuperación de contraseñas.                                 |
| `sessions`                     | Sesiones activas de usuarios.                                            |
| `cache`, `cache_locks`         | Tablas del sistema de cache.                                             |

> **Nota:** Se recomienda estandarizar a futuro toda la estructura mediante migraciones para asegurar portabilidad, control de versiones y despliegues más seguros.

---

# 🧪 Pruebas y usuarios de ejemplo

### 👥 Creación de usuarios de prueba

Durante el desarrollo, se pueden crear usuarios de prueba desde la propia interfaz del sistema utilizando el formulario de **registro**. Al momento de registrarse, el usuario debe seleccionar uno de los tres roles disponibles:

* `Agricultor`
* `Comprador`
* `Transportista`

Una vez registrado, el sistema redirige automáticamente al dashboard correspondiente según el rol elegido.
Para simular mejor el flujo completo de la plataforma, se recomienda crear al menos un usuario por cada rol.

> **Nota:** Si un usuario no completa su perfil (dirección o teléfono), será redirigido automáticamente para actualizar esa información antes de continuar usando la plataforma.

### ✅ Estado de las pruebas

Actualmente, las pruebas han sido realizadas de forma **manual** validando:

* El flujo completo de autenticación y redirección por roles.
* Publicación y visualización de productos por parte del agricultor.
* Flujo de compra: agregar productos al carrito, entrega y confirmación del pedido.
* Postulación de transportistas y su gestión por parte del agricultor.

> El directorio `tests/` incluye algunos archivos generados automáticamente por Laravel Breeze. A futuro se pueden desarrollar pruebas unitarias y de integración más completas.

---

# 📈 Mejoras futuras o pendientes

Durante el desarrollo del proyecto AGROS, se identificaron diversas funcionalidades y mejoras que podrían implementarse en versiones futuras para enriquecer la experiencia de usuario y optimizar el sistema:

### 🔄 Funcionalidades por implementar

* **Historial de estados de pedidos**: Registro de cambios de estado para mayor trazabilidad.
* **Facturación y comprobantes de entrega**: Generación de archivos PDF con los detalles de la transacción.
* **Notificaciones internas**: Sistema para informar a los usuarios sobre postulaciones, aceptaciones o rechazos.
* **Panel administrativo**: Dashboard centralizado para monitorear usuarios, productos, pedidos y estadísticas del sistema.
* **Gestión avanzada de stock**: Alertas automáticas por bajo inventario y sugerencias de reabastecimiento.
* **Filtros y búsqueda en el catálogo**: Mejorar la navegación por productos con filtros por categoría, precio, etc.

### 🛠️ Mejoras técnicas

* Estandarizar toda la base de datos mediante **migraciones Laravel** (algunas tablas fueron creadas en phpMyAdmin).
* Implementar **pruebas unitarias y de integración** automatizadas.
* Optimización de vistas y componentes Blade para mayor reutilización.
* Modularizar lógica en controladores y servicios.

### 🌐 Escalabilidad futura

* Adaptar la plataforma para su uso en diferentes regiones del Perú con filtros geográficos.
* Posible soporte multiidioma (español, quechua).
* Preparación para despliegue en entornos cloud (como Laravel Forge o servicios VPS).

---
# 👨‍💻 Autor y créditos

Este proyecto fue desarrollado como parte del curso **Desarrollo de Aplicaciones en Internet - Ciclo 2025-I** del **Instituto TECSUP**.

### 👨‍🎓 Autor

* **Josue Isai Zapata Villegas**
  Estudiante de la carrera Diseño y Desarrollo de Software
  Instituto TECSUP – Perú
  [GitHub](https://github.com/Josue-Zapata-v) 

### 🤝 Agradecimientos

* A el docente Nilton Cesar Mercado Chavez del curso por la guía durante el desarrollo
* A la comunidad de Laravel por su amplia documentación y soporte.
* A los compañeros de clase que participaron en revisiones, sugerencias o pruebas del sistema.

> Este proyecto es de carácter académico y fue construido con fines de aprendizaje, simulando un entorno real de comercio digital para el sector agrícola peruano.

## 📂 Anexos: Exploración del código fuente por módulos (en desarrollo)

## 📂 Controlador: `ProductoController.php`

**Ubicación:**
`app/Http/Controllers/Agricultor/ProductoController.php`

**Propósito:**
Este controlador gestiona todas las acciones CRUD relacionadas a los productos que publica un agricultor autenticado.

---

### 📌 Funciones Definidas

#### 1. `index()`

**Función:** Muestra todos los productos publicados por el agricultor autenticado.

```php
$productos = Producto::where('agricultor_id', auth()->id())->get();
return view('agricultor.dashboard', compact('productos'));
```

**Vista:**
`resources/views/agricultor/dashboard.blade.php`

✅ **Comentario:** Correcto y específico. Se filtran productos por agricultor autenticado.

---

#### 2. `create()`

**Función:** Retorna la vista para crear un nuevo producto.

**Vista:**
`resources/views/agricultor/productos/create.blade.php`

✅ **Comentario:** Vista separada para formulario de creación. Correcto.

---

#### 3. `store(Request $request)`

**Función:**
Valida, guarda la imagen (si existe), agrega el `agricultor_id`, y crea el nuevo producto.

**Redirección:**
`redirect()->route('agricultor.dashboard')`

✅ **Comentario:** Implementación correcta con uso de `store()` y validación centralizada.

⚠️ **Sugerencia futura leve:** Si se desea más limpieza de código, se puede extraer la lógica de manejo de imagen a un método separado (`procesarImagen()`).

---

#### 4. `edit($id)`

**Función:**
Busca el producto por ID, validando que sea del agricultor autenticado. Retorna la vista de edición.

**Vista:**
`resources/views/agricultor/productos/edit.blade.php`

✅ Correcto. La validación de pertenencia del producto está bien aplicada.

---

#### 5. `update(Request $request, $id)`

**Función:**
Similar a `store()`. Valida y actualiza el producto, incluyendo reemplazo de imagen si se sube una nueva.

✅ Correcto.

🔍 **Observación ligera:** Podría implementarse limpieza de imagen anterior si se actualiza una nueva (aunque no es obligatorio en este punto del desarrollo).

---

#### 6. `destroy($id)`

**Función:**
Elimina un producto después de validar que pertenece al agricultor autenticado.

✅ Correcto.

📌 **Mejora futura opcional:** Eliminar la imagen del almacenamiento si se borra el producto. Se puede usar `Storage::delete($producto->imagen)` si lo implementas más adelante.

---

### 🔧 Métodos Auxiliares

#### `validarProducto(Request $request)`

**Función:**
Valida campos como nombre, precio, stock, peso mínimo y máximo, imagen, etc.

✅ Está bien segmentado. La regla `'gte:min_kg_envio'` es clave y bien usada.

---

#### `obtenerProducto($id)`

**Función:**
Consulta un producto que sea propiedad del agricultor autenticado.

✅ Correcto, buen uso de `firstOrFail()` para manejo de errores.

---

### ✅ Resumen Documental de `ProductoController`

| Método          | Propósito                                 | Vista asociada                          |
| --------------- | ----------------------------------------- | --------------------------------------- |
| index           | Mostrar productos del agricultor          | `agricultor/dashboard.blade.php`        |
| create          | Formulario de creación de producto        | `agricultor/productos/create.blade.php` |
| store           | Validar y guardar nuevo producto          | redirige al dashboard                   |
| edit            | Formulario para editar producto existente | `agricultor/productos/edit.blade.php`   |
| update          | Validar y actualizar producto             | redirige al dashboard                   |
| destroy         | Eliminar un producto                      | redirige al dashboard                   |
| validarProducto | Validar los campos del formulario         | N/A                                     |
| obtenerProducto | Verificar pertenencia del producto        | N/A                                     |

---

### 🚨 Posibles mejoras futuras (sin urgencia)

| Aspecto                 | Mejora sugerida                                        |
| ----------------------- | ------------------------------------------------------ |
| Imagen                  | Eliminar imagen anterior al actualizar o borrar.       |
| Código más limpio       | Extraer el manejo de imagen a método auxiliar.         |
| Reutilización de vistas | Considerar partials para el formulario (crear/editar). |

---

## 📂 Controlador: `PerfilController.php`

**Ubicación:**
`app/Http/Controllers/Agricultor/PerfilController.php`

**Propósito general:**
Este controlador permite que el agricultor **visualice y edite su perfil personal**, incluyendo nombre, teléfono y dirección.

---

### 📌 Funciones Definidas

---

#### 1. `edit()`

**Descripción:**
Obtiene el usuario autenticado (agricultor) y carga la vista con sus datos personales para ser editados.

**Código relevante:**

```php
$usuario = Auth::user();
return view('agricultor.perfil', compact('usuario'));
```

**Vista asociada:**
`resources/views/agricultor/perfil.blade.php`

✅ **Comentario:** Implementación directa y clara. Se usa el helper de autenticación para obtener al usuario actual.

---

#### 2. `update(Request $request)`

**Descripción:**
Valida y actualiza los datos personales del agricultor (nombre, teléfono, dirección).

**Validaciones aplicadas:**

```php
$request->validate([
    'name' => 'required|string|max:100',
    'phone' => 'nullable|string|max:20',
    'direccion' => 'nullable|string|max:255',
]);
```

**Acción de actualización:**

```php
$usuario->update([
    'name' => $request->name,
    'phone' => $request->phone,
    'direccion' => $request->direccion,
]);
```

**Redirección:**
`redirect()->route('agricultor.perfil')`

✅ **Comentario:** La actualización está bien protegida por validación. Solo se permiten campos que el agricultor puede y debe modificar.

📌 **Nota técnica futura (opcional):** Si en algún momento se permite actualizar el correo o contraseña, se deberá manejar por separado con validación más estricta.

---

### ✅ Resumen Documental de `PerfilController`

| Método | Propósito                               | Vista asociada                     |
| ------ | --------------------------------------- | ---------------------------------- |
| edit   | Mostrar formulario de edición de perfil | `agricultor/perfil.blade.php`      |
| update | Validar y actualizar datos personales   | redirige a la misma ruta con éxito |

---

### 🔐 Seguridad

* ✅ Ambos métodos solo funcionan para el usuario autenticado actual (`Auth::user()`).
* ✅ El uso del método `update()` asegura que **solo se modifiquen los campos permitidos**.

---

### 🛠 Posibles mejoras futuras (sin urgencia)

| Mejora sugerida                                | Justificación                    |
| ---------------------------------------------- | -------------------------------- |
| Agregar validación de formato para el teléfono | Asegura coherencia en la entrada |
| Mostrar confirmación con un modal              | Mejor UX en la edición de perfil |
| Soporte para imagen de perfil (avatar)         | Mejora visual y personalización  |

---

## 📂 Controlador: `PedidoController.php`

**Ubicación:**
`app/Http/Controllers/Agricultor/PedidoController.php`

**Propósito general:**
Este controlador permite al agricultor **visualizar los pedidos que han realizado los compradores** sobre sus productos. Muestra los detalles del pedido y el comprador relacionado.

---

### 📌 Funciones Definidas

---

#### 1. `index()`

**Descripción:**
Obtiene todos los pedidos dirigidos al agricultor autenticado. Carga además las relaciones necesarias para mostrar información completa:

* **Relaciones incluidas:**

  * `detalles.producto`: para saber qué productos se han solicitado y sus datos.
  * `comprador`: para saber quién hizo el pedido.

**Código clave:**

```php
$pedidos = Pedido::with(['detalles.producto', 'comprador'])
    ->where('agricultor_id', Auth::id())
    ->latest()
    ->get();
```

**Vista asociada:**
`resources/views/agricultor/pedidos/index.blade.php`

✅ **Comentario:** Excelente uso de **Eloquent eager loading** (`with`) para evitar el problema de N+1 consultas. Además, el filtro `where('agricultor_id', Auth::id())` garantiza que solo se muestren pedidos del agricultor autenticado.

---

### ✅ Resumen Documental de `PedidoController`

| Método | Propósito                                         | Vista asociada                       |
| ------ | ------------------------------------------------- | ------------------------------------ |
| index  | Listar pedidos recibidos por el agricultor actual | `agricultor/pedidos/index.blade.php` |

---

### 🔄 Relaciones esperadas

Este controlador espera que existan correctamente definidas las siguientes relaciones en los modelos:

#### Modelo `Pedido`

```php
public function detalles()
{
    return $this->hasMany(DetallePedido::class);
}

public function comprador()
{
    return $this->belongsTo(User::class, 'comprador_id');
}
```

#### Modelo `DetallePedido`

```php
public function producto()
{
    return $this->belongsTo(Producto::class);
}
```

✅ Si estas relaciones están correctamente definidas en tus modelos, todo el flujo de datos debería funcionar sin problemas.

---

### 🛠 Posibles mejoras futuras (sin urgencia)

| Mejora sugerida                                   | Justificación                                      |
| ------------------------------------------------- | -------------------------------------------------- |
| Paginación con `paginate()`                       | Si hay muchos pedidos, evitará sobrecarga de vista |
| Filtros por estado del pedido (`pendiente`, etc.) | Facilita búsqueda rápida de pedidos específicos    |
| Colores o badges según estado                     | Mejora visual para seguimiento rápido              |

---


## 📂 Controlador: `PostulacionTransportistaController.php`

**Ubicación:**
`app/Http/Controllers/Agricultor/PostulacionTransportistaController.php`

**Propósito general:**
Este controlador permite al agricultor visualizar las **postulaciones de transportistas** para sus pedidos y **aceptar o rechazar** cada postulación.

---

### 📌 Funciones Definidas

---

#### 1. `index()`

**Descripción:**
Muestra todas las postulaciones hechas por transportistas a los pedidos del agricultor autenticado.

**Lógica:**

* Carga con `with()` las relaciones:

  * `pedido`: para obtener el pedido al que se postulan.
  * `transportista`: para conocer quién se postuló.
* Filtra solo postulaciones de pedidos cuyo `agricultor_id` coincide con el usuario autenticado.
* Ordena de más reciente a más antigua.

**Código clave:**

```php
$postulaciones = PostulacionTransportista::with(['pedido', 'transportista'])
    ->whereHas('pedido', function ($query) {
        $query->where('agricultor_id', Auth::id());
    })
    ->orderBy('created_at', 'desc')
    ->get();
```

**Vista asociada:**
`resources/views/agricultor/postulaciones/index.blade.php`

✅ **Comentario:** Eloquent está bien utilizado. Se evita cargar información innecesaria gracias al `whereHas`.

---

#### 2. `responder(Request $request, $id)`

**Descripción:**
Permite al agricultor **aceptar o rechazar** una postulación de transporte.

**Validación del request:**

```php
$request->validate([
    'accion' => 'required|in:aceptar,rechazar',
]);
```

**Seguridad:**
Se valida que la postulación pertenezca a un pedido del agricultor actual mediante `whereHas`.

**Acción:**
Se actualiza el campo `estado` a `'aceptado'` o `'rechazado'`.

**Redirección:**
`redirect()->route('agricultor.postulaciones')`

✅ **Comentario:** Correctamente protegido contra acceso indebido y con lógica clara.

📌 **Nota futura:** Si se desea agregar notificaciones (correo o alerta en sistema) al transportista, este es el lugar donde hacerlo.

---

### ✅ Resumen Documental de `PostulacionTransportistaController`

| Método    | Propósito                                            | Vista asociada                                  |
| --------- | ---------------------------------------------------- | ----------------------------------------------- |
| index     | Listar postulaciones de transportistas a los pedidos | `agricultor/postulaciones/index.blade.php`      |
| responder | Aceptar o rechazar una postulación                   | redirige a `agricultor.postulaciones` con flash |

---

### 🔄 Relaciones esperadas

#### Modelo `PostulacionTransportista`

```php
public function pedido()
{
    return $this->belongsTo(Pedido::class);
}

public function transportista()
{
    return $this->belongsTo(User::class, 'transportista_id');
}
```

#### Modelo `Pedido`

(Ya documentado anteriormente)

---

### 🛠 Posibles mejoras futuras (sin urgencia)

| Mejora sugerida                            | Justificación                                                         |
| ------------------------------------------ | --------------------------------------------------------------------- |
| Aceptar solo una postulación por pedido    | Reforzar lógica de negocio (actualmente no está en este controlador). |
| Mensaje personalizado al rechazar          | Mejora la comunicación con el transportista.                          |
| Notificación al transportista (correo/app) | Mejora experiencia e interacción.                                     |
| Historial de decisiones                    | Para auditoría futura o trazabilidad.                                 |

---
app\Http\Controllers\Auth:
El cual contiene:
AuthenticatedSessionController.php
ConfirmablePasswordController.php
EmailVerificationNotificationController.php
EmailVerificationPromptController.php
NewPasswordController.php
PasswordController.php
PasswordResetLinkController.php
RegisteredUserController.php
VerifyEmailController.php

---

## 📂 Controlador: `AuthenticatedSessionController.php`

**Ubicación:**
`app/Http/Controllers/Auth/AuthenticatedSessionController.php`

**Propósito general:**
Este controlador gestiona el **inicio de sesión (login)** y el **cierre de sesión (logout)** en la plataforma AGROS. Además, redirige a cada usuario autenticado a su respectivo dashboard según su rol (`agricultor`, `comprador`, `transportista`).

---

### 📌 Funciones Definidas

---

#### 1. `create()`

**Descripción:**
Muestra la vista del formulario de inicio de sesión.

**Vista asociada:**
`resources/views/auth/login.blade.php`

**Tipo de respuesta:**
`Illuminate\View\View`

✅ **Comentario:** Lógica simple y correcta. Carga la vista de login.

---

#### 2. `store(LoginRequest $request)`

**Descripción:**
Autentica al usuario según las credenciales proporcionadas. Redirige al dashboard correspondiente según su rol.

**Flujo:**

1. Valida las credenciales mediante el objeto `LoginRequest`.
2. Regenera la sesión para prevenir ataques de fijación de sesión.
3. Evalúa el rol del usuario autenticado y redirige según corresponda:

   * `'agricultor' → agricultor.dashboard`
   * `'comprador' → comprador.dashboard`
   * `'transportista' → transportista.dashboard`
4. Si el rol no es válido, se cierra la sesión y se muestra un error.

**Tipo de respuesta:**
`Illuminate\Http\RedirectResponse`

✅ **Comentario:** Buena práctica el uso de `regenerate()` para seguridad de sesión. Correcto el uso de `switch` para manejar roles.

📌 **Nota de mejora futura:** Si se agregan más roles, se debería externalizar esta lógica en un **RedirectService** para mantener limpio este controlador.

---

#### 3. `destroy(Request $request)`

**Descripción:**
Finaliza la sesión del usuario y lo redirige a la página de inicio.

**Acciones realizadas:**

* Llama a `logout()` del guard `web`.
* Invalida la sesión actual.
* Regenera el token CSRF.
* Redirige al home `/`.

✅ **Comentario:** Excelente implementación estándar para logout seguro en Laravel.

---

### ✅ Resumen Documental de `AuthenticatedSessionController`

| Método  | Propósito                        | Vista/Ruta asociada                                                |
| ------- | -------------------------------- | ------------------------------------------------------------------ |
| create  | Mostrar formulario de login      | `auth/login.blade.php`                                             |
| store   | Autenticar y redirigir según rol | `dashboard` según rol (`agricultor`, `comprador`, `transportista`) |
| destroy | Cerrar sesión                    | Redirige a `/`                                                     |

---

### 🔐 Seguridad

* ✅ `LoginRequest` garantiza autenticación segura y validada.
* ✅ Regeneración de sesión al iniciar y al cerrar sesión.
* ✅ Protección contra usuarios con rol no válido.

---

### 🛠 Mejora sugerida a futuro (opcional)

| Mejora propuesta                                 | Justificación                         |
| ------------------------------------------------ | ------------------------------------- |
| Crear middleware `RedirectIfAuthenticatedByRole` | Centralizar redirección por rol       |
| Agregar logging de intentos fallidos             | Seguridad y trazabilidad              |
| Mostrar errores personalizados por rol           | Mejor feedback al usuario en el login |

---
---

## 📂 Controlador: `ConfirmablePasswordController.php`

**Ubicación:**
`app/Http/Controllers/Auth/ConfirmablePasswordController.php`

**Propósito general:**
Este controlador permite **confirmar la contraseña del usuario actual** antes de autorizar acciones sensibles. Forma parte del sistema de seguridad de Laravel para proteger rutas críticas.

---

### 📌 Funciones Definidas

---

#### 1. `show()`

**Descripción:**
Muestra la vista donde el usuario debe ingresar nuevamente su contraseña para confirmar su identidad.

**Vista asociada:**
`resources/views/auth/confirm-password.blade.php`

**Tipo de respuesta:**
`Illuminate\View\View`

✅ **Comentario:** Correctamente utilizado para proteger accesos sensibles (como configuración, edición de datos críticos, etc.)

---

#### 2. `store(Request $request)`

**Descripción:**
Valida si la contraseña ingresada es correcta para el usuario autenticado.

**Lógica:**

* Usa `Auth::guard('web')->validate()` para verificar si la contraseña coincide con la del usuario actual.
* Si la validación falla, lanza una `ValidationException`.
* Si es correcta, guarda en la sesión el momento de la confirmación:

  ```php
  $request->session()->put('auth.password_confirmed_at', time());
  ```
* Redirige a la ruta que se había intentado acceder (`intended`).

**Tipo de respuesta:**
`Illuminate\Http\RedirectResponse`

✅ **Comentario:** Implementación precisa. Protege la ruta posterior y evita que el usuario la acceda sin confirmar su contraseña.

---

### ✅ Resumen Documental de `ConfirmablePasswordController`

| Método | Propósito                                           | Vista/Ruta asociada                        |
| ------ | --------------------------------------------------- | ------------------------------------------ |
| show   | Mostrar formulario para confirmar la contraseña     | `auth/confirm-password.blade.php`          |
| store  | Validar contraseña ingresada y continuar navegación | Redirige a la ruta protegida originalmente |

---

### 🔐 Seguridad

* ✅ Se utiliza `Auth::guard()->validate()` para verificación directa de credenciales.
* ✅ Protección con `ValidationException` en caso de error.
* ✅ Guarda la hora exacta de la confirmación en sesión (`auth.password_confirmed_at`), lo cual permite controlar el tiempo de validez de esa confirmación en middleware como `password.confirm`.

---

### 🛠 Mejora sugerida a futuro (opcional)

| Mejora propuesta                    | Justificación                                         |
| ----------------------------------- | ----------------------------------------------------- |
| Mostrar nombre del módulo protegido | Aclara al usuario por qué se le pide reconfirmar.     |
| Configurar expiración en `.env`     | Permitir ajustar la duración de la sesión confirmada. |

---
---

## 📂 Controlador: `EmailVerificationNotificationController.php`

**Ubicación:**
`app/Http/Controllers/Auth/EmailVerificationNotificationController.php`

**Propósito general:**
Permite a un usuario reenviar manualmente el enlace de **verificación de correo electrónico** en caso de no haberlo recibido al registrarse.

---

### 📌 Función Definida

---

#### `store(Request $request)`

**Descripción:**
Envía un nuevo correo de verificación si el usuario aún no ha confirmado su email.

**Lógica:**

1. Verifica si el usuario ya confirmó su correo:

   ```php
   if ($request->user()->hasVerifiedEmail())
   ```

   Si ya está verificado, redirige a su `dashboard`.

2. Si no ha verificado el correo:

   * Envía un nuevo enlace con `sendEmailVerificationNotification()`.
   * Devuelve una respuesta con estado flash `'verification-link-sent'`.

**Tipo de respuesta:**
`Illuminate\Http\RedirectResponse`

---

### ✅ Resumen Documental de `EmailVerificationNotificationController`

| Método | Propósito                                    | Redirección / Respuesta                                          |
| ------ | -------------------------------------------- | ---------------------------------------------------------------- |
| store  | Reenviar el enlace de verificación de correo | Si ya verificado → `dashboard`<br>Si no → back con mensaje flash |

---

### 🔐 Seguridad y Consideraciones

* ✅ Usa `Auth::user()` desde el request, por lo tanto requiere que el usuario esté autenticado.
* ✅ Buena práctica: verifica si el email ya fue confirmado antes de reenviar.
* ✅ Evita spam innecesario de correos al no enviar si ya está verificado.

---

### 🔁 Comportamiento esperado en la vista

Desde la vista correspondiente (ej. `verify-email.blade.php`), se podría tener un botón que dispare esta acción de forma controlada con un `POST` a la ruta correspondiente, algo como:

```blade
<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Reenviar enlace</button>
</form>
```

El mensaje flash `'verification-link-sent'` puede ser usado para mostrar una alerta amigable de que el correo fue reenviado correctamente.

---

### 🛠 Mejora sugerida a futuro (opcional)

| Mejora propuesta                             | Justificación                                                      |
| -------------------------------------------- | ------------------------------------------------------------------ |
| Agregar límite de reintentos con throttle    | Evitar abuso (Laravel ya tiene soporte via middleware `throttle`). |
| Mostrar confirmación en frontend (alerta UI) | Mejora la experiencia del usuario.                                 |

---

---

## 📂 Controlador: `EmailVerificationPromptController.php`

**Ubicación:**
`app/Http/Controllers/Auth/EmailVerificationPromptController.php`

**Propósito general:**
Este controlador determina si el usuario debe ver la **pantalla que le solicita verificar su correo electrónico** o si puede continuar hacia su dashboard porque ya está verificado.

---

### 📌 Método Definido

---

#### `__invoke(Request $request)`

**Descripción:**
Este controlador usa un único método (por eso es "invocable") para mostrar la pantalla `verify-email.blade.php` **solo si el usuario aún no ha verificado su email**.

**Lógica:**

1. Comprueba si el usuario ya ha verificado su correo:

   ```php
   $request->user()->hasVerifiedEmail()
   ```

2. Si **sí ha verificado**, lo redirige al `dashboard`.

3. Si **no ha verificado**, muestra la vista `auth.verify-email`.

**Tipo de respuesta:**
`Illuminate\Http\RedirectResponse | Illuminate\View\View`

---

### ✅ Resumen Documental de `EmailVerificationPromptController`

| Método     | Propósito                                      | Vista/Ruta asociada           |
| ---------- | ---------------------------------------------- | ----------------------------- |
| \_\_invoke | Mostrar pantalla para verificar correo         | `auth/verify-email.blade.php` |
|            | O redirigir al dashboard si ya está verificado | Redirige a `dashboard`        |

---

### 🔐 Seguridad y Middleware

Este controlador debe ser protegido por el middleware `auth` para asegurar que solo usuarios autenticados lleguen a esta vista. Laravel Breeze/Jetstream ya suele incluir esta lógica por defecto en las rutas, como:

```php
Route::get('/verify-email', EmailVerificationPromptController::class)
    ->middleware(['auth'])
    ->name('verification.notice');
```

---

### 📄 Uso en la vista

El archivo `resources/views/auth/verify-email.blade.php` debería tener un mensaje indicando que el usuario debe verificar su correo, y posiblemente un botón para reenviar el correo de verificación:

```blade
@if (session('status') === 'verification-link-sent')
    <p>Se ha enviado un nuevo enlace de verificación a tu correo electrónico.</p>
@endif

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit">Reenviar correo</button>
</form>
```

---

### 🛠 Mejora sugerida a futuro (opcional)

| Mejora propuesta                          | Justificación                                         |
| ----------------------------------------- | ----------------------------------------------------- |
| Mostrar el email del usuario en la vista  | Confirmación visual al usuario de qué correo revisar. |
| Enlace para cerrar sesión desde esa vista | Por si se registró con un correo erróneo.             |

---
# Documentación de Archivos Relacionados: Registro y Autenticación en AGROS

## Archivos Documentados

* `RegisteredUserController.php`
* `auth/register.blade.php`

---

## 📄 `RegisteredUserController.php`

**Ubicación:** `app/Http/Controllers/Auth/`

### Funcionalidad

Este controlador gestiona el proceso de **registro de nuevos usuarios** en la plataforma AGROS. Se encarga de:

1. Mostrar el formulario de registro (`create()`).
2. Validar los datos ingresados por el usuario (`store()`):

   * `name`: requerido, texto, máximo 100 caracteres.
   * `email`: requerido, único, válido y con máximo 100 caracteres.
   * `password`: requerido, confirmado y con reglas seguras.
   * `phone`: requerido, exactamente 9 dígitos.
   * `direccion`: requerido, hasta 255 caracteres.
   * `role`: requerido, debe ser uno de: agricultor, comprador, transportista.
3. Crear un nuevo registro en la tabla `users`.
4. Autenticar al usuario y redirigirlo al dashboard correspondiente según su rol.

### Redirecciones por rol

* Agricultor → `agricultor.dashboard`
* Comprador → `comprador.dashboard`
* Transportista → `transportista.dashboard`

---

## 📄 `auth/register.blade.php`

**Ubicación:** `resources/views/auth/`

### Funcionalidad

Es la vista asociada al formulario de registro. Provee los campos requeridos por `RegisteredUserController` y muestra mensajes de error cuando la validación falla.

### Campos del formulario

* **Nombre:** campo de texto obligatorio.
* **Correo electrónico:** campo email obligatorio.
* **Teléfono:** campo texto con validación para exactamente 9 dígitos.
* **Dirección:** campo de texto obligatorio.
* **Contraseña:** campo password con confirmación.
* **Rol:** selector desplegable con opciones `agricultor`, `comprador` y `transportista`.

### Validación en frontend

* Se especifican atributos HTML como `required`, `maxlength`, `pattern="\d{9}"`, etc.
* Se usa el componente `x-input-error` para mostrar errores debajo de cada campo.

---

## Relación entre ambos archivos

* El archivo `register.blade.php` provee la interfaz que permite a un nuevo usuario enviar sus datos.
* `RegisteredUserController.php` es quien procesa esos datos, valida, guarda y redirige al usuario.
* Ambos trabajan juntos para garantizar un proceso de registro seguro, validado y consistente con la estructura de la base de datos `users`.

---

## Consistencia con la base de datos

Estos archivos trabajan en conjunto con la tabla `users`:

```sql
CREATE TABLE users (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('agricultor', 'comprador', 'transportista') NOT NULL,
  phone VARCHAR(20),
  direccion VARCHAR(255),
  precio_transporte_kg DECIMAL(10,2),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

* Todos los campos utilizados en el formulario y validados en el controlador están definidos en la estructura de esta tabla.
* El campo `precio_transporte_kg` no se establece en el registro inicial ya que solo aplica a usuarios con rol `agricultor`. Este se podrá completar posteriormente desde su perfil.
----------
---

## 📚 Módulo Agricultor – Documentación Técnica

### 🎯 Propósito

El módulo del **Agricultor** permite registrar productos, gestionar pedidos recibidos, aceptar o rechazar postulaciones de transportistas y editar su perfil. Todo el flujo está respaldado por controladores, vistas y rutas específicas que trabajan en conjunto.

---

## 🔁 Flujo de ingreso y redirección

### 📄 `AuthenticatedSessionController.php`

**Ubicación:** `app/Http/Controllers/Auth/AuthenticatedSessionController.php`
**Función:** Autentica al usuario y redirige según su rol.

```php
switch ($user->role) {
    case 'agricultor':
        return redirect()->route('agricultor.dashboard');
```

🔗 **Relación:**

* Redirige a la ruta `agricultor.dashboard`, definida en `routes/web.php`
* Esa ruta apunta a `ProductoController@index`
* Que carga la vista `resources/views/agricultor/dashboard.blade.php`

---

## 🌾 Dashboard del Agricultor

### 🛣️ Ruta Principal

```php
Route::get('/dashboard-agricultor', [ProductoController::class, 'index'])->name('agricultor.dashboard');
```

### 📄 `ProductoController.php`

**Ubicación:** `app/Http/Controllers/Agricultor/ProductoController.php`
**Función:**

* Muestra productos publicados del agricultor (`index`)
* Permite crear, editar y eliminar productos.

### 📄 Vista asociada:

* `resources/views/agricultor/dashboard.blade.php`
* Muestra el listado de productos, botón para agregar y acciones de editar/eliminar.

🔗 **Relación:**

* El layout base usado es `layouts/agricultor.blade.php`
* Este layout incluye el **menú lateral de navegación**.

---

## 🔍 Layout y navegación

### 📄 `layouts/agricultor.blade.php`

**Ubicación:** `resources/views/layouts/agricultor.blade.php`
**Función:**
Define la estructura general del panel agricultor. Incluye:

* Menú lateral con navegación a:

  * `agricultor.dashboard` → Productos
  * `agricultor.pedidos` → Pedidos recibidos
  * `agricultor.postulaciones` → Postulaciones de transportistas
  * `agricultor.perfil` → Mi perfil
* Sección principal para cada contenido dinámico `@yield('content')`.

🔗 **Relación:**
Todas las vistas del módulo agricultor extienden este layout con `@extends('layouts.agricultor')`.

---

## 📦 Pedidos recibidos

### 🛣️ Ruta

```php
Route::get('/agricultor/pedidos', [PedidoController::class, 'index'])->name('agricultor.pedidos');
```

### 📄 `PedidoController.php`

**Ubicación:** `app/Http/Controllers/Agricultor/PedidoController.php`
**Función:**
Obtiene todos los pedidos relacionados a los productos del agricultor autenticado.

🔗 **Relación:**

* Usa `with(['detalles.producto', 'comprador'])` para mostrar información detallada.
* Vista asociada: `resources/views/agricultor/pedidos/index.blade.php` (debería existir o crearse).

---

## 🚚 Postulaciones de transportistas

### 🛣️ Rutas

```php
Route::get('/agricultor/postulaciones', [PostulacionTransportistaController::class, 'index'])->name('agricultor.postulaciones');
Route::post('/agricultor/postulaciones/{id}/responder', [PostulacionTransportistaController::class, 'responder'])->name('agricultor.postulaciones.responder');
```

### 📄 `PostulacionTransportistaController.php`

**Ubicación:** `app/Http/Controllers/Agricultor/PostulacionTransportistaController.php`
**Función:**

* Muestra todas las postulaciones hechas a los pedidos del agricultor.
* Permite aceptar o rechazar la postulación.

🔗 **Relación:**

* Vista: `resources/views/agricultor/postulaciones/index.blade.php` (debería existir o crearse)

---

## 👤 Mi perfil

### 🛣️ Rutas

```php
Route::get('/agricultor/perfil', [PerfilController::class, 'edit'])->name('agricultor.perfil');
Route::post('/agricultor/perfil', [PerfilController::class, 'update'])->name('agricultor.perfil.update');
```

### 📄 `PerfilController.php`

**Ubicación:** `app/Http/Controllers/Agricultor/PerfilController.php`
**Función:**

* Permite al agricultor ver y editar su perfil.

🔗 **Relación:**

* Vista: `resources/views/agricultor/perfil.blade.php`

---

## 📝 Registro de usuario

### 📄 `RegisteredUserController.php`

**Ubicación:** `app/Http/Controllers/Auth/RegisteredUserController.php`
**Función personalizada:**

* Crea el usuario y le asigna un `role` (agricultor, comprador, transportista).
* Valida `name`, `email`, `password`, `phone` (exactamente 9 dígitos) y `direccion`.

🔗 **Relación con la tabla `users`:**

```sql
CREATE TABLE users (
  id BIGINT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role ENUM('agricultor', 'comprador', 'transportista') NOT NULL,
  phone VARCHAR(20),
  direccion VARCHAR(255),
  precio_transporte_kg DECIMAL(10,2),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

---

## ✅ Conclusión: Encadenamiento de componentes

| Acción                      | Ruta                        | Controlador                      | Vista asociada                             |
| --------------------------- | --------------------------- | -------------------------------- | ------------------------------------------ |
| Login                       | `/login`                    | `AuthenticatedSessionController` | -                                          |
| Redirección por rol         | `/dashboard`                | Interna en middleware            | Redirige según rol                         |
| Dashboard Agricultor        | `/dashboard-agricultor`     | `ProductoController@index`       | `agricultor/dashboard.blade.php`           |
| Crear producto              | `/productos/create`         | `ProductoController@create`      | `agricultor/productos/create.blade.php`    |
| Editar producto             | `/productos/{id}/edit`      | `ProductoController@edit`        | `agricultor/productos/edit.blade.php`      |
| Pedidos recibidos           | `/agricultor/pedidos`       | `PedidoController@index`         | `agricultor/pedidos/index.blade.php`       |
| Postulaciones transportista | `/agricultor/postulaciones` | `PostulacionTransportista@index` | `agricultor/postulaciones/index.blade.php` |
| Perfil agricultor           | `/agricultor/perfil`        | `PerfilController@edit`          | `agricultor/perfil.blade.php`              |

---
