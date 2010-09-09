<h2>Mis Ordenes</h2>

<table id="tblFactura">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Descripcion</th>
      <th>Desde</th>
      <th>Hasta</th>
      <th>Detalle</th>
      <th>Ingresar</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Ordens as $Orden): ?>
    <tr>
      <td><?php echo $Orden->getNombreCliente() ?></td>
      <td><?php echo $Orden->getDescripcion() ?></td>
      <td><?php echo $Orden->getFechaDesde() ?></td>
      <td><?php echo $Orden->getFechaHasta() ?></td>
      <td><a href="<?php echo url_for('orden/show?id='.$Orden->getId()) ?>">Detalle</a></td>
      <td> <a href="<?php echo url_for('remito/new?idOrden='.$Orden->getID())?>" > Remito </a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="pie">
    <hr/>
</div>