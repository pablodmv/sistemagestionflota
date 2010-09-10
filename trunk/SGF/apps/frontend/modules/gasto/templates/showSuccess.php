<h2>Detalle Gasto</h2>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $gasto->getId() ?></td>
    </tr>
    <tr>
      <th>Tipogasto:</th>
      <td><?php echo $gasto->getTipogasto() ?></td>
    </tr>
    <tr>
      <th>Vehiculo:</th>
      <td><?php echo $gasto->getVehiculo() ?></td>
    </tr>
    <tr>
      <th>Fechagasto:</th>
      <td><?php echo $gasto->getFechagasto() ?></td>
    </tr>
    <tr>
      <th>Importe:</th>
      <td><?php echo $gasto->getImporte() ?></td>
    </tr>
  </tbody>
</table>


<div id="pie">
<a href="<?php echo url_for('gasto/edit?id='.$gasto->getId()) ?>">Modificar</a>
&nbsp;
<a href="<?php echo url_for('gasto/index') ?>">Volver</a>
<hr />
</div>
