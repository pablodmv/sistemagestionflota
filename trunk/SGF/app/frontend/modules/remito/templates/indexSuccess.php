<h1>Lista de Remitos</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Vehículo</th>
      <th>Fecha</th>
      <th>Km Inicial</th>
      <th>Km Final</th>
      <th>Horas</th>
      <th>Detalle</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Remitos as $Remito): ?>
    <tr>
      <td><a href="<?php echo url_for('remito/show?id='.$Remito->getId()) ?>"><?php echo $Remito->getId() ?></a></td>
      <td><?php echo $Remito->getNombreVehiculo($Remito->getIdVehiculo()) ?></td>
      <td><?php echo $Remito->getFecha() ?></td>
      <td><?php echo $Remito->getKmIni() ?></td>
      <td><?php echo $Remito->getKmFin() ?></td>
       <td><?php echo $Remito->getHorasTrab() ?></td>
      <td><?php echo $Remito->getDetalle() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('orden/index') ?>">Volver</a>
