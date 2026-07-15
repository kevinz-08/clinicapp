<div class="page-header">
  <h1>Cita del <?php echo $cita->getFecha() ?> a las <?php echo $cita->getHora() ?>
    <span class="pull-right">
      <a href="<?php echo url_for('cita/edit?id='.$cita->getId()) ?>" class="btn btn-default">Editar</a>
      <a href="<?php echo url_for('cita/index') ?>" class="btn btn-link">Volver al listado</a>
    </span>
  </h1>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">Detalle de la cita</div>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <dt>Paciente</dt>
          <dd><a href="<?php echo url_for('paciente/show?id='.$cita->getPacienteId()) ?>"><?php echo $cita->getPaciente()->getNombreCompleto() ?></a></dd>
          <dt>Medico</dt>
          <dd><a href="<?php echo url_for('medico/show?id='.$cita->getMedicoId()) ?>"><?php echo $cita->getMedico()->getNombreCompleto() ?></a></dd>
          <dt>Especialidad</dt><dd><?php echo $cita->getMedico()->getEspecialidad() ?></dd>
          <dt>Fecha</dt><dd><?php echo $cita->getFecha() ?></dd>
          <dt>Hora</dt><dd><?php echo $cita->getHora() ?></dd>
          <dt>Estado</dt><dd><?php include_partial('cita/estado', array('cita' => $cita)) ?></dd>
          <dt>Motivo</dt><dd><?php echo $cita->getMotivo() ?></dd>
          <dt>Creada</dt><dd><?php echo $cita->getCreatedAt() ?></dd>
        </dl>
      </div>
    </div>
  </div>
</div>
