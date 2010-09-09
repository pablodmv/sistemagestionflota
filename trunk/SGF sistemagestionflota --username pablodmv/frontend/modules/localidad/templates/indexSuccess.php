<h2>Lista de Localidades </h2>
<br>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Distancia</th>
      <th>Capital</th>
      <th>Ciudadreferencia</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Localidads as $Localidad): ?>
    <tr>
      <td><a href="<?php echo url_for('localidad/show?id='.$Localidad->getId()) ?>"><?php echo $Localidad->getId() ?></a></td>
      <td><?php echo $Localidad->getNombre() ?></td>
      <td><?php echo $Localidad->getDistancia() ?></td>
      <td><?php echo $Localidad->getCapital() ?></td>
      <td><?php echo $Localidad->getCiudadreferencia() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="pie">
  <a href="<?php echo url_for('localidad/new') ?>">Nuevo</a>
  <hr /> 
</div>
  
