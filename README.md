# MediGest 🏥

**Sistema web de gestión médica y administración de citas.**

MediGest es una aplicación web desarrollada con Laravel que busca facilitar la gestión de citas médicas, pacientes, médicos y demás procesos relacionados con la atención en instituciones de salud.

El sistema tiene como objetivo centralizar la información y mejorar la organización de los procesos administrativos y médicos.

## Tecnologías utilizadas

- **Backend:** Laravel 12.
- **Lenguaje:** PHP.
- **Base de datos:** MySQL.
- **Frontend:** HTML, CSS, Bootstrap 5 y JavaScript.
- **Autenticación:** Laravel Breeze.
- **Gestión de dependencias:** Composer y NPM.

## Roles del sistema

MediGest contempla tres tipos de usuarios:

- **Administrador:** encargado de administrar el sistema y registrar médicos.
- **Médico:** usuario encargado de gestionar sus actividades relacionadas con la atención médica.
- **Paciente:** usuario que puede registrarse en la plataforma y gestionar sus citas médicas.

## Módulos del sistema

El proyecto contempla los siguientes módulos:

- Gestión de usuarios y roles.
- Registro y administración de pacientes.
- Registro y administración de médicos.
- Gestión de especialidades médicas.
- Administración de horarios y disponibilidad.
- Programación y gestión de citas médicas.
- Historias clínicas.
- Gestión de medicamentos.
- Fórmulas médicas.

*Nota: los módulos se implementarán progresivamente de acuerdo con el avance del proyecto.*

## Requisitos para la instalación

Antes de ejecutar el proyecto, es necesario contar con:

- PHP 8.2 o superior.
- Composer.
- MySQL.
- Node.js y NPM.
- Git.

## Instalación del proyecto

### 1. Clonar el repositorio

```bash
git clone URL_DEL_REPOSITORIO
```

Ingresar a la carpeta:

```bash
cd MediGest
```

### 2. Instalar dependencias

```bash
composer install
```

Instalar las dependencias de frontend:

```bash
npm install
```

### 3. Configurar el archivo de entorno

Crear una copia del archivo de configuración:

En Windows CMD:

```cmd
copy .env.example .env
```

Configurar las credenciales de conexión a MySQL en el archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=medigest
DB_USERNAME=root
DB_PASSWORD=
```

Los valores anteriores son de ejemplo y deben ajustarse al entorno local.

### 4. Generar la clave de Laravel

```bash
php artisan key:generate
```

### 5. Crear la base de datos

Crear una base de datos MySQL llamada `medigest`.

La estructura de las tablas se podrá importar desde el archivo SQL incluido en el repositorio:

```text
database/medigest.sql
```

También se podrán ejecutar las migraciones de Laravel cuando estén disponibles y actualizadas:

```bash
php artisan migrate --seed
```

### 6. Compilar los recursos frontend

```bash
npm run build
```

### 7. Ejecutar el proyecto

```bash
php artisan serve
```

Abrir en el navegador:

```text
http://127.0.0.1:8000
```

## Estructura del proyecto

Las principales carpetas utilizadas en Laravel son:

```text
app/
 ├── Http/
 │    ├── Controllers/
 │    └── Middleware/
 └── Models/

database/
 ├── migrations/
 ├── seeders/
 └── medigest.sql

resources/
 └── views/

routes/
 └── web.php

public/
```

## Base de datos

El proyecto utiliza MySQL para almacenar la información.

Entre las entidades contempladas se encuentran:

- Usuarios.
- Pacientes.
- Médicos.
- Especialidades.
- Horarios.
- Citas.
- Historias clínicas.
- Medicamentos.
- Fórmulas médicas.

El repositorio incluirá el script SQL para facilitar la creación de la base de datos, sus relaciones y los registros de prueba necesarios.

## Estado del proyecto

**MediGest se encuentra en desarrollo.** El repositorio contiene los avances realizados hasta la fecha y se actualizará progresivamente con nuevas funcionalidades.

## Autores

Proyecto académico desarrollado como parte del proceso de formación en Tecnología en Sistemas.