<?php // Renderiza los campos visibles de un formulario (o de un formulario embebido) con estilo Bootstrap ?>
<?php foreach ($campos as $nombre => $campo): ?>
  <?php if ($campo->isHidden() || $campo instanceof sfFormFieldSchema) continue; ?>
  <div class="form-group<?php echo $campo->hasError() ? ' has-error' : '' ?>">
    <?php echo $campo->renderLabel(null, array('class' => 'control-label')) ?>
    <?php echo $campo->render() ?>
    <?php if ($campo->hasError()): ?>
      <span class="help-block"><?php echo $campo->renderError() ?></span>
    <?php endif; ?>
  </div>
<?php endforeach; ?>
