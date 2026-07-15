<div class="row" style="margin-top: 40px;">
  <div class="col-md-4 col-md-offset-4">
    <div class="panel panel-primary">
      <div class="panel-heading"><h3 class="panel-title">iniciar sesion</h3></div>
      <div class="panel-body">
        <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
          <?php echo $form->renderGlobalErrors() ?>
          <?php echo $form->renderHiddenFields() ?>

          <div class="form-group<?php echo $form['username']->hasError() ? ' has-error' : '' ?>">
            <label class="control-label">Usuario</label>
            <?php echo $form['username']->render(array('class' => 'form-control')) ?>
            <?php echo $form['username']->renderError() ?>
          </div>

          <div class="form-group<?php echo $form['password']->hasError() ? ' has-error' : '' ?>">
            <label class="control-label">Contrasena</label>
            <?php echo $form['password']->render(array('class' => 'form-control')) ?>
            <?php echo $form['password']->renderError() ?>
          </div>

          <div class="checkbox">
            <label><?php echo $form['remember']->render() ?> Recordarme</label>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Entrar</button>
        </form>
      </div>
    </div>
  </div>
</div>
