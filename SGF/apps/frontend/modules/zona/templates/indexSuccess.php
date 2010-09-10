<h2>Lista de Zonas</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
      <th>Localidad</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Zonas as $Zona): ?>
    <tr>
      <td><a href="<?php echo url_for('zona/show?id='.$Zona->getId()) ?>"><?php echo $Zona->getId() ?></a></td>
      <td><?php echo $Zona->getDescripcion() ?></td>
      <td><?php echo $Zona->getNombreLocalidad() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="pie">
  <a href="<?php echo url_for('zona/new') ?>">Nuevo</a>
  <hr/>
</div>
  
