<div class="page-header">
  <h1>Paises <small>API publica del Banco Mundial</small></h1>
</div>

<p class="text-muted">
  Datos consultados en vivo desde <code>api.worldbank.org</code> (con cache de 1 hora).
  La busqueda y la paginacion del listado usan DataTables.
</p>

<table class="table table-striped table-hover datatable">
  <thead>
    <tr>
      <th></th>
      <th>Codigo</th>
      <th>Nombre</th>
      <th>Capital</th>
      <th>Region</th>
      <th>Nivel de ingreso</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($paises as $pais): ?>
    <tr>
      <td><img src="https://flagcdn.com/24x18/<?php echo strtolower($pais['iso2Code']) ?>.png" alt="" /></td>
      <td><?php echo $pais['id'] ?></td>
      <td><a href="<?php echo url_for('@pais_show?codigo='.$pais['id']) ?>"><?php echo $pais['name'] ?></a></td>
      <td><?php echo $pais['capitalCity'] ?></td>
      <td><?php echo $pais['region']['value'] ?></td>
      <td><?php echo $pais['incomeLevel']['value'] ?></td>
      <td><a href="<?php echo url_for('@pais_show?codigo='.$pais['id']) ?>" class="btn btn-xs btn-default">Ver detalle</a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
