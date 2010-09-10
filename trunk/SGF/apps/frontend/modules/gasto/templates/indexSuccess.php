<h2>Lista Gastos</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Tipogasto</th>
      <th>Vehiculo</th>
      <th>Fechagasto</th>
      <th>Importe</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($gastos as $gasto): ?>
    <tr>
      <td><a href="<?php echo url_for('gasto/show?id='.$gasto->getId()) ?>"><?php echo $gasto->getId() ?></a></td>
      <td><?php echo $gasto->getDescripGasto() ?></td>
      <td><?php echo $gasto->getDescripVehiculo() ?></td>
      <td><?php echo $gasto->getFechagasto() ?></td>
      <td><?php echo $gasto->getImporte() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="pie">
  <a href="<?php echo url_for('gasto/new') ?>">Nuevo</a>
  <hr />
</div>
  
