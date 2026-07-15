<div class="page-header">
  <h1>Pacientes
    <span class="pull-right">
      <a href="<?php echo url_for('paciente/new') ?>" class="btn btn-primary">Nuevo paciente</a>
      <a href="<?php echo url_for('@paciente_admision') ?>" class="btn btn-success">Admision (paciente + cita)</a>
    </span>
  </h1>
</div>

<table class="table table-striped table-hover datatable">
  <thead>
    <tr>
      <th>Documento</th>
      <th>Nombre completo</th>
      <th>Edad</th>
      <th>Correo</th>
      <th>Telefono</th>
      <th>Pais</th>
      <th>Citas</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pacientes as $paciente): ?>
    <tr>
      <td><?php echo $paciente->getDocumento() ?></td>
      <td><a href="<?php echo url_for('paciente/show?id='.$paciente->getId()) ?>"><?php echo $paciente->getNombreCompleto() ?></a></td>
      <td><?php echo $paciente->getEdad() ?></td>
      <td><?php echo $paciente->getEmail() ?></td>
      <td><?php echo $paciente->getTelefono() ?></td>
      <td><?php echo $paciente->getPaisCodigo() ?></td>
      <td><?php echo count($paciente->getCitas()) ?></td>
      <td class="text-right">
        <a href="<?php echo url_for('paciente/edit?id='.$paciente->getId()) ?>" class="btn btn-xs btn-default">Editar</a>
        <?php echo link_to('Eliminar', 'paciente/delete?id='.$paciente->getId(), array(
          'method'  => 'delete',
          'confirm' => 'Se eliminara el paciente y todas sus citas. Continuar?',
          'class'   => 'btn btn-xs btn-danger',
        )) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
