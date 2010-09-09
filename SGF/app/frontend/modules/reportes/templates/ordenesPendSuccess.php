<h2>Ordenes Pendientes</h2>

<table id="tblOrden">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Descripcion</th>
      <th>Desde</th>
      <th>Hasta</th>
      <th>Contacto</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Ordens as $Orden): ?>
      <tr>
      <td><?php echo $Orden->getNombreCliente() ?></td>
      <td><?php echo $Orden->getDescripcion() ?></td>
      <td><?php echo $Orden->getFechaDesde('d-m-Y') ?></td>
      <td><?php echo $Orden->getFechaHasta('d-m-Y') ?></td>
            <td><?php echo $Orden->getContacto() ?></td>
                  <td><?php echo $Orden->getTelContacto() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<a href="<?php echo url_for('reportes/ImprimirOrdPend') ?>">Imprimir</a>
<div id="pie">
    <hr/>
</div>