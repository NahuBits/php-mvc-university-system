# Sistema de Gestión Universitaria (PHP MVC + MySQL)

Plataforma académica desarrollada en equipo con compañeros de la facultad para gestionar el funcionamiento básico de una universidad: **usuarios**, **carreras**, **materias**, **planificación** y **noticias**, con accesos diferenciados por **rol**.

> Proyecto realizado con fines educativos, aplicando buenas prácticas de organización, seguridad y trabajo en equipo.

## Funcionalidades

### General
- Gestión de perfil (edición de datos).
- Recuperación de contraseña: envío de **email + link** para cambiarla.

### Alumno
- Visualización de carreras (**grado / posgrado / cursos**) e inscripción.
- Vista de materias por **año** y **cuatrimestre**, con profesor, días y horarios.

### Profesor
- Visualización de materias asignadas (cuatrimestre, días, horarios).
- Acceso al listado de alumnos inscriptos por materia.

### Admin
- ABM de usuarios (alumnos/profesores/admin) y asignación de roles.
- ABM de carreras (grado/posgrado/cursos).
- ABM de materias y planificación (cuatrimestre, turno, días/horarios, profesor, carrera).
- ABM de noticias mostradas en la página principal.

## Tecnologías / Stack
- **Backend:** PHP (MVC), PDO  
- **Base de datos:** MySQL (XAMPP / phpMyAdmin)  
- **Frontend:** HTML, CSS, JavaScript, Bootstrap 5 (responsive)  
- **Email:** Mailer para recuperación de contraseña  
- **IDE:** Visual Studio Code

## Arquitectura del proyecto
- **Controllers:** Auth, Materias, Carreras, Profesor, Alumno, Admin, Noticias, Pages  
- **Models:** entidades y lógica de datos  
- **Core:** Router, conexión DB, BaseController  
- **Helpers:** utilidades (generación/recuperación de contraseña)

## Seguridad
- Hashing de contraseñas
- Protección de rutas
- Autorización por roles (Alumno / Profesor / Admin)
- Layouts dinámicos según contexto (público / admin / profesor / alumno)

## Cómo correrlo (XAMPP)

### Requisitos
- XAMPP (Apache + MySQL)
- phpMyAdmin
- PHP compatible con el proyecto (recomendado: PHP 7.4+)

### Pasos
1. Dentro de `xampp/htdocs/` cloná el repositorio `git clone https://github.com/NahuBits/php-mvc-university-system.git` (deberia quedarte asi: `xampp/htdocs/php-mvc-university-system`).
2. Iniciá **Apache** y **MySQL** desde el panel de XAMPP.
3. Abrí phpMyAdmin y creá/importá la base de datos:
   - **Nombre:** `universidadcompleta2`
4. Importá el script SQL de la base (que esta en en `database/`).
5. Abrí el sistema en el navegador:
   - `http://localhost/php-mvc-university-system/`

## Base de datos y credenciales demo

**Base de datos:** `universidadcompleta2`

- **Admin**
  - Email: `admin@hotmail.com`
  - Password: `1234567890`

- **Alumno**
  - Email: `alumno@hotmail.com`
  - Password: `1234567890`

- **Profesor**
  - Email: `profe@hotmail.com`
  - Password: `1234567890`

## Screenshots
📌 Capturas de pantalla del sistema disponibles en mi LinkedIn:
www.linkedin.com/in/nahuelflorentin-dev

## Tags
`#PHP` `#MVC` `#MySQL` `#Bootstrap` `#JavaScript` `#WebDevelopment` `#ProyectoGrupal`

## Licencia
Este proyecto está bajo licencia MIT. Ver archivo `LICENSE`.
