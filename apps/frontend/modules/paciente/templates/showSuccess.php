<div class="page-header">
  <h1><?php echo $paciente->getNombreCompleto() ?>
    <span class="pull-right">
      <a href="<?php echo url_for('paciente/edit?id='.$paciente->getId()) ?>" class="btn btn-default">Editar</a>
      <a href="<?php echo url_for('paciente/index') ?>" class="btn btn-link">Volver al listado</a>
    </span>
  </h1>
</div>

<div class="row">
  <div class="col-md-5">
    <div class="panel panel-default">
      <div class="panel-heading">Datos del paciente</div>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <dt>Documento</dt><dd><?php echo $paciente->getDocumento() ?></dd>
          <dt>Fecha de nacimiento</dt><dd><?php echo $paciente->getFechaNacimiento() ?> (<?php echo $paciente->getEdad() ?> anios)</dd>
          <dt>Correo</dt><dd><?php echo $paciente->getEmail() ?></dd>
          <dt>Telefono</dt><dd><?php echo $paciente->getTelefono() ?></dd>
          <dt>Pais</dt>
          <dd>
            <?php if ($paciente->getPaisCodigo()): ?>
              <a href="<?php echo url_for('@pais_show?codigo='.$paciente->getPaisCodigo()) ?>"><?php echo $paciente->getPaisCodigo() ?></a>
            <?php endif; ?>
          </dd>
          <dt>Registrado</dt><dd><?php echo $paciente->getCreatedAt() ?></dd>
        </dl>
      </div>
    </div>
  </div>

  <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">Citas del paciente</div>
      <table class="table table-condensed">
        <thead>
          <tr><th>Fecha</th><th>Hora</th><th>Medico</th><th>Estado</th></tr>
        </thead>
        <tbody>
          <?php foreach ($paciente->getCitas() as $cita): ?>
          <tr>
            <td><a href="<?php echo url_for('cita/show?id='.$cita->getId()) ?>"><?php echo $cita->getFecha() ?></a></td>
            <td><?php echo $cita->getHora() ?></td>
            <td><?php echo $cita->getMedico()->getNombreCompleto() ?></td>
            <td><?php include_partial('cita/estado', array('cita' => $cita)) ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
