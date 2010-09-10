<h2>Ordenes Pendientes</h2>

<table id="tblOrden">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Descripcion</th>
      <th>Fecha</th>
      <th>Contacto</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Ordens as $Orden): ?>
      <tr>
      <td><?php echo $Orden->getNombreCliente() ?></td>
      <td><?php echo $Orden->getDescripcion() ?></td>
      <td><?php echo $Orden->getFecha() ?></td>
            <td><?php echo $Orden->getContacto() ?></td>
                  <td><?php echo $Orden->getTelContacto() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="pie">
    <hr/>
</div>