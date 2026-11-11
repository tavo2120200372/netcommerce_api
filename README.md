# Netcommerce API

API REST desarrollada con Laravel para gestionar empresas y sus tareas.

## Tecnologías

- PHP 8.2
- Laravel 12
- MySQL
- Eloquent ORM

## Requisitos

- PHP 8.2 o superior
- Composer
- MySQL

## Instalación

1. Clonar el repositorio.
2. Instalar las dependencias:

```bash
composer install
```

3. Crear el archivo de configuración `.env` a partir de `.env.example`.

4. Configurar la conexión a MySQL en `.env`.

5. Generar la clave de la aplicación:

```bash
php artisan key:generate
```

6. Ejecutar migraciones y seeders:

```bash
php artisan migrate --seed
```

7. Iniciar el servidor:

```bash
php artisan serve
```

## Endpoints

### GET /companies

Obtiene las empresas con sus tareas y usuarios relacionados.

Permite filtrar por nombre mediante el parámetro opcional `search`.

Ejemplo:

```http
GET http://127.0.0.1:8000/companies?search=Net
```

### POST /tasks/create

Permite crear una tarea.

Ejemplo del cuerpo de la petición:

```json
{
    "company_id": 1,
    "user_id": 1,
    "name": "task 3",
    "description": "task content"
}
```

## Validaciones

- Los campos obligatorios deben estar presentes.
- La empresa y el usuario deben existir.
- El nombre de la tarea admite hasta 255 caracteres.
- Un usuario no puede tener más de cinco tareas pendientes.

La restricción se implementó mediante una regla de validación personalizada.

## Evidencias

Las capturas de las pruebas realizadas en Postman se encuentran en la carpeta `evidencias`.