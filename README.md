
# 🎓 Gestor de Cursos con Laravel y Bootstrap

Este es un sistema web desarrollado con **Laravel** y **Bootstrap** para la administración de cursos, estudiantes, personal y procesos educativos en una institución. El proyecto fue realizado como parte de un curso de formación profesional en el cual fui becado.

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" alt="Laravel" width="300">
</p>

---

## 🚀 Características Principales

- 📚 **Gestión de Cursos y Categorías**
  Creación, edición y organización de cursos clasificados por temática (Programación, Marketing, Diseño, etc.).

- 🌀 **Manejo de Variantes (presencial/virtual)**
  Cada curso puede tener múltiples versiones con detalles como duración, horarios, precio, vacantes, comisión, etc.

- 🧑‍🎓 **Gestión de Estudiantes y Personal**
  Administración de perfiles de estudiantes, docentes y personal administrativo, con datos de contacto y roles.

- 📝 **Sistema de Inscripciones**
  Registro de estudiantes a cursos, seguimiento del estado de pago, deuda y montos abonados.

- 👨‍🏫 **Asignación Docente a Cursos**
  Asociación de personal (profesores) a comisiones específicas.

- 🏫 **Información Institucional**
  Panel para gestionar los datos generales de la institución: misión, visión, contacto, etc.

---

## 🛠️ Tecnologías Utilizadas

### Backend
- **Laravel Framework** — PHP moderno para desarrollo web estructurado.
- **PHP 8.x**

### Frontend
- **Bootstrap 5** — Interfaz responsive, limpia y moderna.
- **JavaScript & jQuery** — Interacciones dinámicas del lado del cliente.

### Base de Datos
- **MariaDB / MySQL** — Sistema robusto y confiable para la persistencia de datos.

---

## ⚙️ Instalación y Configuración

1. **Clonar el repositorio:**
   ```bash
   git clone [URL_DEL_REPOSITORIO]
   cd nombre-del-proyecto
   ```

2. **Crear archivo `.env` y configurar base de datos:**
   ```bash
   cp .env.example .env
   ```

   Editá el archivo `.env` con los datos de tu base:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_fundacion
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Instalar dependencias:**
   ```bash
   composer install
   ```

4. **Generar clave de aplicación:**
   ```bash
   php artisan key:generate
   ```

5. **Levantar el servidor de desarrollo:**
   ```bash
   php artisan serve
   ```

---

## 📘 Notas

- Proyecto desarrollado en contexto de aprendizaje profesional con beca.
- Código 100% funcional con estructura Laravel MVC.
- Incluye migraciones, controladores y vistas personalizadas.
- Sugerido para instituciones educativas pequeñas o medianas.

---

## 📸 Video

[Ver demostración del sistema](https://drive.google.com/file/d/1g0FeUGLOUer3iDfHVIuLt_49DlK4swUC/view?usp=drive_link)

---

## 📬 Contacto

Desarrollado por Maximiliano Soriano
📧 maxi.soriano.70.23@gmail.com
