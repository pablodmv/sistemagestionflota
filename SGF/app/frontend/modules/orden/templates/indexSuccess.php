<h2>Ordenes Pendientes</h2>

<table id="tblOrden">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Descripcion</th>
      <th>Desde</th>
      <th>Hasta</th>
      <th>Accion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Ordens as $Orden): ?>
      <tr>
      <td><?php echo $Orden->getNombreCliente() ?></td>
      <td><?php echo $Orden->getDescripcion() ?></td>
      <td><?php echo $Orden->getFechaDesde('d-m-Y') ?></td>
      <td><?php echo $Orden->getFechaHasta('d-m-Y') ?></td>
      <td id="tdAccion"><a href="<?php echo url_for('orden/show?id='.$Orden->getId()) ?>">Detalle</a><br><br>
       <a href="<?php echo url_for('remito/new?idOrden='.$Orden->getID())?>" >Nuevo Remito </a><br><br>
       <a href="<?php echo url_for('remito/index?idOrden='.$Orden->getID())?>" >Ver Remitos </a><br><br>
      <a href="<?php echo url_for('pasajero/new?idOrden='.$Orden->getID())?>" >Agregar Pasajero </a><br><br>
  <a href="<?php echo url_for('vehicorden/new?idOrden='.$Orden->getID())?>" >Agregar vehiculo </a></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="pie">
    <hr/>
</div>