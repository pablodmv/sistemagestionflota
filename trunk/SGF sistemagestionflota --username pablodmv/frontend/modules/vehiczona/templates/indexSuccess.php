<h2>Lista Vehículos por Zona</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Idorden</th>
      <th>Idvehiculo</th>
      <th>Horadesde</th>
      <th>Horahasta</th>
      <th>Cantpasajeros</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vehicxzonas as $vehicxzona): ?>
    <tr>
      <td><a href="<?php echo url_for('vehiczona/show?id='.$vehicxzona->getId()) ?>"><?php echo $vehicxzona->getId() ?></a></td>
      <td><?php echo $vehicxzona->getIdorden() ?></td>
      <td><?php echo $vehicxzona->getIdvehiculo() ?></td>
      <td><?php echo $vehicxzona->getHoradesde() ?></td>
      <td><?php echo $vehicxzona->getHorahasta() ?></td>
      <td><?php echo $vehicxzona->getCantpasajeros() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="pie">
  <a href="<?php echo url_for('vehiczona/new') ?>">Nuevo</a>
  <hr/>
</div>
  
