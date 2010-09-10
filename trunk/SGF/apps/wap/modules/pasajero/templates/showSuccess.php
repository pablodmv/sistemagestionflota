<?php include_stylesheets('pasajeroShow.css')?>

<h4>Detalle Pasajero</h4>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Pasajero->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Pasajero->getNombre() ?></td>
    </tr>
    <tr>
      <th>Direccion:</th>
      <td><?php echo $Pasajero->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Hora:</th>
      <td><?php echo $Pasajero->getHora() ?></td>
    </tr>
    <tr>
      <th>Zona:</th>
      <td><?php echo $Pasajero->getNombreZona() ?></td>
    </tr>
    <tr>
      <th>Vehiculo:</th>
      <td><?php echo $Pasajero->getNombreVehiculo() ?></td>
    </tr>
  </tbody>
</table>
<div id="pie">
<a href="<?php echo url_for('pasajero/index') ?>">Volver </a>
&nbsp;
<a href="<?php echo url_for('pasajero/map?dir='.$Pasajero->getDireccion()) ?>">Ver Mapa </a>
<hr />
</div>
 