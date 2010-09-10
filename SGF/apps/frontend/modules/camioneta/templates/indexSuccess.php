<h1>Camionetas List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Ano</th>
      <th>Matricula</th>
      <th>Capacidad</th>
      <th>Zona</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Camionetas as $Camioneta): ?>
    <tr>
      <td><a href="<?php echo url_for('camioneta/show?id='.$Camioneta->getId()) ?>"><?php echo $Camioneta->getId() ?></a></td>
      <td><?php echo $Camioneta->getMarca() ?></td>
      <td><?php echo $Camioneta->getModelo() ?></td>
      <td><?php echo $Camioneta->getAno() ?></td>
      <td><?php echo $Camioneta->getMatricula() ?></td>
      <td><?php echo $Camioneta->getCapacidad() ?></td>
      <td><?php echo $Camioneta->getZonaId() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('camioneta/new') ?>">New</a>
