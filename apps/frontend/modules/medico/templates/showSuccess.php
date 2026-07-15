<div class="page-header">
  <h1><?php echo $medico->getNombreCompleto() ?> <small><?php echo $medico->getEspecialidad() ?></small>
    <span class="pull-right">
      <a href="<?php echo url_for('medico/edit?id='.$medico->getId()) ?>" class="btn btn-default">Editar</a>
      <a href="<?php echo url_for('medico/index') ?>" class="btn btn-link">Volver al listado</a>
    </span>
  </h1>
</div>

<div class="row">
  <div class="col-md-5">
    <div class="panel panel-default">
      <div class="panel-heading">Datos del medico</div>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <dt>Registro medico</dt><dd><?php echo $medico->getRegistroMedico() ?></dd>
          <dt>Especialidad</dt><dd><?php echo $medico->getEspecialidad() ?></dd>
          <dt>Correo</dt><dd><?php echo $medico->getEmail() ?></dd>
          <dt>Registrado</dt><dd><?php echo $medico->getCreatedAt() ?></dd>
        </dl>
      </div>
    </div>
  </div>

  <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">Agenda del medico</div>
      <table class="table table-condensed">
        <thead>
          <tr><th>Fecha</th><th>Hora</th><th>Paciente</th><th>Estado</th></tr>
        </thead>
        <tbody>
          <?php foreach ($medico->getCitas() as $cita): ?>
          <tr>
            <td><a href="<?php echo url_for('cita/show?id='.$cita->getId()) ?>"><?php echo $cita->getFecha() ?></a></td>
            <td><?php echo $cita->getHora() ?></td>
            <td><?php echo $cita->getPaciente()->getNombreCompleto() ?></td>
            <td><?php include_partial('cita/estado', array('cita' => $cita)) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
