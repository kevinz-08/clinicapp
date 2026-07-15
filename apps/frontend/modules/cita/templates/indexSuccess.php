<div class="page-header">
  <h1>Citas
    <span class="pull-right">
      <a href="<?php echo url_for('cita/new') ?>" class="btn btn-primary">Agendar cita</a>
    </span>
  </h1>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Filtros</div>
  <div class="panel-body">
    <form action="<?php echo url_for('cita/index') ?>" method="get" class="form-inline">
      <div class="form-group">
        <label for="filtro_medico">Medico</label>
        <select name="medico_id" id="filtro_medico" class="form-control">
          <option value="">Todos</option>
          <?php foreach ($medicos as $medico): ?>
            <option value="<?php echo $medico->getId() ?>" <?php echo $filtros['medico_id'] == $medico->getId() ? 'selected="selected"' : '' ?>>
              <?php echo $medico->getNombreCompleto() ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="filtro_estado">Estado</label>
        <select name="estado" id="filtro_estado" class="form-control">
          <option value="">Todos</option>
          <?php foreach (Cita::getEstados() as $valor => $etiqueta): ?>
            <option value="<?php echo $valor ?>" <?php echo $filtros['estado'] === $valor ? 'selected="selected"' : '' ?>><?php echo $etiqueta ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label for="filtro_desde">Desde</label>
        <input type="date" name="desde" id="filtro_desde" class="form-control" value="<?php echo $filtros['desde'] ?>" />
      </div>
      <div class="form-group">
        <label for="filtro_hasta">Hasta</label>
        <input type="date" name="hasta" id="filtro_hasta" class="form-control" value="<?php echo $filtros['hasta'] ?>" />
      </div>
      <button type="submit" class="btn btn-default">Filtrar</button>
      <a href="<?php echo url_for('cita/index') ?>" class="btn btn-link">Limpiar</a>
    </form>
  </div>
</div>

<table class="table table-striped table-hover datatable">
  <thead>
    <tr>
      <th>Fecha</th>
      <th>Hora</th>
      <th>Paciente</th>
      <th>Medico</th>
      <th>Especialidad</th>
      <th>Estado</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($citas as $cita): ?>
    <tr>
      <td><a href="<?php echo url_for('cita/show?id='.$cita->getId()) ?>"><?php echo $cita->getFecha() ?></a></td>
      <td><?php echo $cita->getHora() ?></td>
      <td><?php echo $cita->getPaciente()->getNombreCompleto() ?></td>
      <td><?php echo $cita->getMedico()->getNombreCompleto() ?></td>
      <td><?php echo $cita->getMedico()->getEspecialidad() ?></td>
      <td><?php include_partial('cita/estado', array('cita' => $cita)) ?></td>
      <td class="text-right">
        <a href="<?php echo url_for('cita/edit?id='.$cita->getId()) ?>" class="btn btn-xs btn-default">Editar</a>
        <?php echo link_to('Eliminar', 'cita/delete?id='.$cita->getId(), array(
          'method'  => 'delete',
          'confirm' => 'Se eliminara la cita. Continuar?',
          'class'   => 'btn btn-xs btn-danger',
        )) ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
