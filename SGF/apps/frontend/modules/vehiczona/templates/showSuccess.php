
<h2>Detalle Vehículo por Zona</h2>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $vehicxzona->getId() ?></td>
    </tr>
    <tr>
      <th>Idorden:</th>
      <td><?php echo $vehicxzona->getIdorden() ?></td>
    </tr>
    <tr>
      <th>Idvehiculo:</th>
      <td><?php echo $vehicxzona->getIdvehiculo() ?></td>
    </tr>
    <tr>
      <th>Horadesde:</th>
      <td><?php echo $vehicxzona->getHoradesde() ?></td>
    </tr>
    <tr>
      <th>Horahasta:</th>
      <td><?php echo $vehicxzona->getHorahasta() ?></td>
    </tr>
    <tr>
      <th>Cantpasajeros:</th>
      <td><?php echo $vehicxzona->getCantpasajeros() ?></td>
    </tr>
  </tbody>
</table>
<div id="pie">
<a href="<?php echo url_for('vehiczona/edit?id='.$vehicxzona->getId()) ?>">Modificar</a>
&nbsp;
<a href="<?php echo url_for('vehiczona/index') ?>">Volver</a>
<hr />
</div>
