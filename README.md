# 📸 Laravel InstaClone

Un clon minimalista y funcional de una red social de fotografías. Este proyecto ha sido desarrollado con el objetivo principal de poner en práctica y dominar características clave del backend con Laravel, enfocándose en la arquitectura de datos y la seguridad.

## Capturas del Proyecto

<div align="center">
  <img src="./capturas/index.png" width="800" alt="Feed principal de InstaClone">
  <p><em>Feed fotográfico principal</em></p>
</div>

<div align="center">
  <img src="./capturas/detalle.png" width="800" alt="Vista detalle y sistema de likes">
  <p><em>Vista de detalle e interacción en tiempo real</em></p>
</div>

<div align="center">
  <img src="./capturas/editar.png" width="800" alt="Panel de edición">
  <p><em>Panel de edición de una publicación</em></p>
</div>

<div align="center">
  <img src="./capturas/login.png" width="400" alt="Pantalla de Login">
  <img src="./capturas/registro.png" width="400" alt="Pantalla de Registro">
  <p><em>Pantallas seguras de acceso y registro de usuarios</em></p>
</div>

## Enfoque Técnico del Proyecto

* **Relaciones de modelos con Eloquent:** Implementación de relaciones `HasMany` / `BelongsTo` (Usuarios y Fotos) y relaciones complejas `BelongsToMany` (Sistema de "Likes" entre Usuarios y Fotos).
* **Gestión de Archivos Multimedia:** Uso de la facade `Storage` de Laravel para la subida, validación, almacenamiento seguro y enlace público (`storage:link`) de imágenes.
* **Sistema de Autenticación:** Gestión de sesiones, registro y login seguro de usuarios utilizando las herramientas nativas de autenticación de Laravel.

## Características de la Interfaz
* **Feed fotográfico:** Visualización ágil de publicaciones.
* **Interacciones:** Capacidad de dar y quitar "Likes" a las publicaciones en tiempo real.
* **Experiencia de Usuario (UX):** Interfaz responsive construida con Tailwind CSS, incluyendo "Skeleton loaders" nativos (JavaScript + Tailwind) para evitar saltos visuales durante la carga de imágenes.

## Stack Tecnológico
* **Framework:** Laravel 11 (PHP)
* **Base de datos:** MySQL
* **Frontend:** Blade Templates y Tailwind CSS
* **Despliegue:** Servidor propio (Plesk) con despliegue continuo vía GitHub.
