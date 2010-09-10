<h2>Listado Vehiculos por Orden de Trabajo</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Idorden</th>
      <th>Idvehiculo</th>
      <th>Horadesde</th>
      <th>Horahasta</th>
      <th>Cantpasajeros</th>
      <th>Chofer</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vehicxordens as $vehicxorden): ?>
    <tr>
      <td><a href="<?php echo url_for('vehicorden/show?id='.$vehicxorden->getId()) ?>"><?php echo $vehicxorden->getId() ?></a></td>
      <td><?php echo $vehicxorden->getIdorden() ?></td>
      <td><?php echo $vehicxorden->getNombreVehiculo() ?></td>
      <td><?php echo $vehicxorden->getHoradesde() ?></td>
      <td><?php echo $vehicxorden->getHorahasta() ?></td>
      <td><?php echo $vehicxorden->getCantpasajeros() ?></td>
      <td><?php echo $vehicxorden->getNombreChofer() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="pie">
  <a href="<?php echo url_for('vehicorden/new') ?>">Nuevo</a>
  <hr/>
</div>
  
