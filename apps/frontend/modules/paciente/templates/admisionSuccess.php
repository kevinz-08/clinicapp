<div class="page-header"><h1>Admision de paciente</h1></div>

<p class="text-muted">Registra el paciente y agenda su primera cita en un solo paso.</p>

<form action="<?php echo url_for('@paciente_admision') ?>" method="post">
  <?php echo $form->renderGlobalErrors() ?>
  <?php echo $form->renderHiddenFields() ?>

  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-primary">
        <div class="panel-heading">Datos del paciente</div>
        <div class="panel-body">
          <?php include_partial('global/form_campos', array('campos' => $form)) ?>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="panel panel-success">
        <div class="panel-heading">Primera cita</div>
        <div class="panel-body">
          <?php include_partial('global/form_campos', array('campos' => $form['cita'])) ?>
        </div>
      </div>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Admitir paciente</button>
  <a href="<?php echo url_for('paciente/index') ?>" class="btn btn-default">Cancelar</a>
</form>
