<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Remito->getId() ?></td>
    </tr>
    <tr>
      <th>Id orden:</th>
      <td><?php echo $Remito->getIdOrden() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $Remito->getFecha() ?></td>
    </tr>
    <tr>
      <th>Horaini:</th>
      <td><?php echo $Remito->getHoraini() ?></td>
    </tr>
    <tr>
      <th>Horafin:</th>
      <td><?php echo $Remito->getHorafin() ?></td>
    </tr>
    <tr>
      <th>Moneda:</th>
      <td><?php echo $Remito->getMoneda() ?></td>
    </tr>
    <tr>
      <th>Total:</th>
      <td><?php echo $Remito->getTotal() ?></td>
    </tr>
    <tr>
      <th>Detalle:</th>
      <td><?php echo $Remito->getDetalle() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('remito/edit?id='.$Remito->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('remito/index') ?>">List</a>
