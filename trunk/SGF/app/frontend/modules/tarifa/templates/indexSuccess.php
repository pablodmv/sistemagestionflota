<h2>Lista Tarifas</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
      <th>Valor</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Tarifas as $Tarifa): ?>
    <tr>
      <td><a href="<?php echo url_for('tarifa/show?id='.$Tarifa->getId()) ?>"><?php echo $Tarifa->getId() ?></a></td>
      <td><?php echo $Tarifa->getDescripcion() ?></td>
      <td><?php echo $Tarifa->getValor() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="pie">
  <a href="<?php echo url_for('tarifa/new') ?>">Nuevo</a>
  <hr/>
</div>
  
