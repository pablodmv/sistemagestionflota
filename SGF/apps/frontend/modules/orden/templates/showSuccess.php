<h2>Detalle Orden</h2>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Orden->getId() ?></td>
    </tr>
     <tr>
      <th>Cliente:</th>
      <td><?php echo $Orden->getNombreCliente() ?></td>
    </tr>
     <tr>
      <th>Descripcion:</th>
      <td><?php echo $Orden->getDescripcion() ?></td>
    </tr>
    <tr>
      <th>Contacto:</th>
      <td><?php echo $Orden->getContacto() ?></td>
    </tr>
    <tr>
      <th>Tel contacto:</th>
      <td><?php echo $Orden->getTelContacto() ?></td>
    </tr>
    <tr>
      <th>Horas:</th>
      <td><?php echo $Orden->getHoras() ?></td>
    </tr>
    <tr>
      <th>Kilometros:</th>
      <td><?php echo $Orden->getKilometros() ?></td>
    </tr>
    <tr>
      <th>Importe:</th>
      <td><?php echo $Orden->getImporte() ?></td>
    </tr>
    <tr>
      <th>Moneda:</th>
      <td><?php echo $Orden->getTipoMoneda() ?></td>
    </tr>
    <tr>
      <th>Liquidada:</th>
      <td><?php echo $Orden->getFacturadaDesc() ?></td>
    </tr>
    <tr>
      <th>Pasajeros:</th>
      <td><a href="<?php echo url_for('pasajero/index?orden='.$Orden->getId()) ?>">Ver</a></td>
    </tr>
  </tbody>
</table>

<div id="pie_template">
    <a href="<?php echo url_for('orden/edit?id='.$Orden->getId()) ?>">Modificar</a>
    &nbsp;
    <a href="<?php echo url_for('orden/index') ?>">Volver</a>
    <hr/>
</div>



