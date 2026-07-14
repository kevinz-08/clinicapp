<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap.min.css" />
    <?php include_stylesheets() ?>
  </head>
  <body>
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="<?php echo url_for('@homepage') ?>">ClinicApp</a>
        </div>
        <?php if ($sf_user->isAuthenticated()): ?>
          <ul class="nav navbar-nav">
            <li><a href="<?php echo url_for('cita/index') ?>">Citas</a></li>
            <li><a href="<?php echo url_for('paciente/index') ?>">Pacientes</a></li>
            <li><a href="<?php echo url_for('medico/index') ?>">Medicos</a></li>
            <li><a href="<?php echo url_for('pais/index') ?>">Paises (API)</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><p class="navbar-text"><span class="glyphicon glyphicon-user"></span> <?php echo $sf_user->getUsername() ?></p></li>
            <li><a href="<?php echo url_for('@sf_guard_signout') ?>">Salir</a></li>
          </ul>
        <?php endif; ?>
      </div>
    </nav>

    <div class="container">
      <?php foreach (array('notice' => 'success', 'error' => 'danger') as $tipo => $clase): ?>
        <?php if ($sf_user->hasFlash($tipo)): ?>
          <div class="alert alert-<?php echo $clase ?>"><?php echo $sf_user->getFlash($tipo) ?></div>
        <?php endif; ?>
      <?php endforeach; ?>

      <?php echo $sf_content ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap.min.js"></script>
    <script>
      jQuery(function ($) {
        $('.datatable').DataTable({
          pageLength: 10,
          language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.8/i18n/es-ES.json'
          }
        });
      });
    </script>
    <?php include_javascripts() ?>
  </body>
</html>
