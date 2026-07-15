# ClinicApp — Reto técnico Symfony 1.4

Sistema de gestión de citas médicas hecho con symfony 1.4.20 + Doctrine 1, sobre XAMPP (PHP 5.6, MySQL).

## Descripcion

Desarrollé ClinicApp, un mini sistema de gestión de citas médicas: tres CRUDsrelacionados (Pacientes, Médicos y Citas, con relaciones N-1 definidas en elschema de Doctrine), autenticación con sfGuard asegurando toda la aplicación,y una vista que consume la API pública del Banco Mundial (listado y detallede países) con caché en disco. Todos los listados usan DataTables conbúsqueda y paginación en español. Como extras agregué Bootstrap 3,validaciones de campos, filtros adicionales en el listado de citas (médico,estado, rango de fechas) y una vista de admisión que registra un paciente ysu primera cita en un solo formulario, usando formularios embebidos desymfony. 

## Instalación

1. XAMPP con PHP 5.6 y MySQL activos.
2. Crear la base de datos: `CREATE DATABASE clinicapp CHARACTER SET utf8;` (credenciales en config/databases.yml).
3. Construir el modelo y cargar datos de ejemplo:
       php symfony doctrine:build --all --and-load --no-confirmation
       php symfony cc

4. Abrir `http://localhost/clinicapp/web/index.php` (o `frontend_dev.php`) e ingresar con **admin / admin**.

## Estructura

    config/doctrine/schema.yml   Modelo y relaciones
    data/fixtures/                Usuario admin y datos de ejemplo
    lib/form/doctrine/            Formularios con validaciones
    lib/model/doctrine/           Lógica de modelo (CitaTable::getQueryFiltrada, etc.)
    lib/service/                  Cliente de la API externa
    apps/frontend/modules/        paciente, medico, cita, pais, sfGuardAuth
    apps/frontend/templates/      Layout Bootstrap y partial de formularios
