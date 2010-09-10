<h2>Listado de Vehiculos</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Año</th>
      <th>Matricula</th>
      <th>Capacidad</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($vehiculos as $vehiculo): ?>
    <tr>
    <td><a href="<?php echo url_for('vehiculo/edit?id='.$vehiculo->getId()) ?>"><?php echo $vehiculo->getId() ?></a></td> 
      <td><?php echo $vehiculo->getDescripcion() ?></td>
      <td><?php echo $vehiculo->getMarca() ?></td>
      <td><?php echo $vehiculo->getModelo() ?></td>
      <td><?php echo $vehiculo->getAno() ?></td>
      <td><?php echo $vehiculo->getMatricula() ?></td>
      <td><?php echo $vehiculo->getCapacidad() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="pie">
<a  href="<?php echo url_for('vehiculo/new') ?> ">Nuevo</a>
<hr/>
</div>

