<h2>Detalle Vehiculo a Orden de Trabajo</h2>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $vehicxorden->getId() ?></td>
    </tr>
    <tr>
      <th>Idorden:</th>
      <td><?php echo $vehicxorden->getIdorden() ?></td>
    </tr>
    <tr>
      <th>Idvehiculo:</th>
      <td><?php echo $vehicxorden->getNombreVehiculo() ?></td>
    </tr>
    <tr>
      <th>Horadesde:</th>
      <td><?php echo $vehicxorden->getHoradesde() ?></td>
    </tr>
    <tr>
      <th>Horahasta:</th>
      <td><?php echo $vehicxorden->getHorahasta() ?></td>
    </tr>
    <tr>
      <th>Cantpasajeros:</th>
      <td><?php echo $vehicxorden->getCantpasajeros() ?></td>
    </tr>
    <tr>
      <th>Chofer:</th>
      <td><?php echo $vehicxorden->getNombreChofer() ?></td>
    </tr>
  </tbody>
</table>


<div id="pie">
<a href="<?php echo url_for('vehicorden/edit?id='.$vehicxorden->getId()) ?>">Modificar</a>
&nbsp;
<a href="<?php echo url_for('vehicorden/index') ?>">Volver</a>
<hr />
</div>
