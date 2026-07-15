<div class="page-header">
  <h1>
    <img src="https://flagcdn.com/48x36/<?php echo strtolower($pais['iso2Code']) ?>.png" alt="" />
    <?php echo $pais['name'] ?> <small><?php echo $pais['id'] ?></small>
    <span class="pull-right">
      <a href="<?php echo url_for('pais/index') ?>" class="btn btn-link">Volver al listado</a>
    </span>
  </h1>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">Detalle del pais (API Banco Mundial)</div>
      <div class="panel-body">
        <dl class="dl-horizontal">
          <dt>Codigo ISO3</dt><dd><?php echo $pais['id'] ?></dd>
          <dt>Codigo ISO2</dt><dd><?php echo $pais['iso2Code'] ?></dd>
          <dt>Capital</dt><dd><?php echo $pais['capitalCity'] ?></dd>
          <dt>Region</dt><dd><?php echo $pais['region']['value'] ?></dd>
          <dt>Nivel de ingreso</dt><dd><?php echo $pais['incomeLevel']['value'] ?></dd>
          <dt>Tipo de credito</dt><dd><?php echo $pais['lendingType']['value'] ?></dd>
          <dt>Latitud</dt><dd><?php echo $pais['latitude'] ?></dd>
          <dt>Longitud</dt><dd><?php echo $pais['longitude'] ?></dd>
        </dl>
      </div>
    </div>
  </div>
</div>
