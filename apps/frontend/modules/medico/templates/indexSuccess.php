<div class="page-header">
  <h1>Medicos
    <span class="pull-right">
      <a href="<?php echo url_for('medico/new') ?>" class="btn btn-primary">Nuevo medico</a>
    </span>
  </h1>
</div>

<table class="table table-striped table-hover datatable">
  <thead>
    <tr>
      <th>Registro medico</th>
      <th>Nombre completo</th>
      <th>Especialidad</th>
      <th>Correo</th>
      <th>Citas</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($medicos as $medico): ?>
    <tr>
      <td><?php echo $medico->getRegistroMedico() ?></td>
      <td><a href="<?php echo url_for('medico/show?id='.$medico->getId()) ?>"><?php echo $medico->getNombreCompleto() ?></a></td>
      <td><?php echo $medico->getEspecialidad() ?></td>
      <td><?php echo $medico->getEmail() ?></td>
      <td><?php echo count($medico->getCitas()) ?></td>
      <td class="text-right">
        <a href="<?php echo url_for('medico/edit?id='.$medico->getId()) ?>" class="btn btn-xs btn-default">Editar</a>
        <?php echo link_to('Eliminar', 'medico/delete?id='.$medico->getId(), array(
          'method'  => 'delete',
          'confirm' => 'Se eliminara el medico y todas sus citas. Continuar?',
          'class'   => 'btn btn-xs btn-danger',
        )) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
