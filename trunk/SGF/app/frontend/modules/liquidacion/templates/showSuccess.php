<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php  echo $orden->getId() ?></td>
    </tr>
    <tr>
      <th>Cliente:</th>
      <td><?php echo $orden->getCliente() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $orden->getDescripcion() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $orden->getFecha() ?></td>
    </tr>
    <tr>
      <th>Vehiculo:</th>
      <td><?php echo $orden->getVehiculo() ?></td>
    </tr>
    <tr>
      <th>Contacto:</th>
      <td><?php echo $orden->getContacto() ?></td>
    </tr>
    <tr>
      <th>Tel contacto:</th>
      <td><?php echo $orden->getTelContacto() ?></td>
    </tr>
    <tr>
      <th>Hora ini:</th>
      <td><?php echo $orden->getHoraIni() ?></td>
    </tr>
    <tr>
      <th>Hora fin:</th>
      <td><?php echo $orden->getHoraFin() ?></td>
    </tr>
    <tr>
      <th>Km ini:</th>
      <td><?php echo $orden->getKmIni() ?></td>
    </tr>
    <tr>
      <th>Km fin:</th>
      <td><?php echo $orden->getKmFin() ?></td>
    </tr>
    <tr>
      <th>Importe:</th>
      <td><?php echo $orden->getImporte() ?></td>
    </tr>
    <tr>
      <th>Moneda:</th>
      <td><?php echo $orden->getMoneda() ?></td>
    </tr>
    <tr>
      <th>Facturada:</th>
      <td><?php echo $orden->getFacturada() ?></td>
    </tr>
  </tbody>
</table>



<hr />

<a href="<?php echo url_for('facturar/edit?id='.$orden->getId()) ?>">Confirmar</a>
&nbsp;
<a href="<?php echo url_for('facturar/index') ?>">Listar</a>
