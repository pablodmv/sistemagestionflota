<h1>Remitos List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Id orden</th>
      <th>Fecha</th>
      <th>Horaini</th>
      <th>Horafin</th>
      <th>Moneda</th>
      <th>Total</th>
      <th>Detalle</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Remitos as $Remito): ?>
    <tr>
      <td><a href="<?php echo url_for('remito/show?id='.$Remito->getId()) ?>"><?php echo $Remito->getId() ?></a></td>
      <td><?php echo $Remito->getIdOrden() ?></td>
      <td><?php echo $Remito->getFecha() ?></td>
      <td><?php echo $Remito->getHoraini() ?></td>
      <td><?php echo $Remito->getHorafin() ?></td>
      <td><?php echo $Remito->getMoneda() ?></td>
      <td><?php echo $Remito->getTotal() ?></td>
      <td><?php echo $Remito->getDetalle() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('remito/new') ?>">New</a>
