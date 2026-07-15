# ClinicApp — Reto técnico Symfony 1.4

Mini sistema de gestión de citas médicas construido con
**symfony 1.4.20 + Doctrine 1** sobre XAMPP (PHP 5.6, MySQL).

## Funcionalidades

- **3 CRUDs relacionados**: Pacientes, Médicos y Citas
  (`Cita` N-1 `Paciente`, `Cita` N-1 `Medico`; ver `config/doctrine/schema.yml`).
- **Autenticación con sfGuard** (`sfDoctrineGuardPlugin`): toda la aplicación es segura
  (`security.yml`), login en `/guard/login`.
- **Consulta de API externa**: módulo `pais` consume la API pública del Banco Mundial
  (listado y detalle por código ISO3) con caché en disco de 1 hora
  (`lib/service/WorldBankApiClient.class.php`).
- **DataTables** en todos los listados (paginación + búsqueda, idioma español).
- Extras: Bootstrap 3, validaciones de campos (documento, email, fecha de cita no pasada),
  filtros adicionales en el listado de citas (médico, estado, rango de fechas) y
  vista de **admisión** con dos formularios en una sola pantalla (paciente + primera cita,
  formulario embebido: `lib/form/doctrine/PacienteAdmisionForm.class.php`).

## Instalación

1. Requisitos: XAMPP con PHP 5.6 y MySQL activos.
2. Crear la base de datos: `CREATE DATABASE clinicapp CHARACTER SET utf8;`
   (credenciales en `config/databases.yml`).
3. Construir el modelo y cargar datos de ejemplo:

       php symfony doctrine:build --all --and-load --no-confirmation
       php symfony cc

4. Abrir `http://localhost/clinicapp/web/index.php`
   (o `frontend_dev.php` para desarrollo) e ingresar con **admin / admin**.

## Estructura relevante

    config/doctrine/schema.yml        Modelo y relaciones
    data/fixtures/                    Usuario admin (sfGuard) y datos de ejemplo
    lib/form/doctrine/                Formularios con validaciones
    lib/model/doctrine/               Lógica de modelo (CitaTable::getQueryFiltrada, etc.)
    lib/service/                      Cliente de la API externa
    apps/frontend/modules/            paciente, medico, cita, pais, sfGuardAuth (login)
    apps/frontend/templates/          Layout Bootstrap + partial global de formularios
