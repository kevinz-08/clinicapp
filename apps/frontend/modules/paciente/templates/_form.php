<form action="<?php echo url_for('paciente/'.($form->getObject()->isNew() ? 'create' : 'update').($form->getObject()->isNew() ? '' : '?id='.$form->getObject()->getId())) ?>" method="post" class="col-md-6">
  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif; ?>

  <?php echo $form->renderGlobalErrors() ?>
  <?php echo $form->renderHiddenFields() ?>
  <?php include_partial('global/form_campos', array('campos' => $form)) ?>

  <button type="submit" class="btn btn-primary">Guardar</button>
  <a href="<?php echo url_for('paciente/index') ?>" class="btn btn-default">Cancelar</a>
</form>
