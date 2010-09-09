<h2>Lista Tipo de Gastos</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Descripcion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tipoGastos as $tipoGasto): ?>
    <tr>
      <td><a href="<?php echo url_for('tipoGasto/show?id='.$tipoGasto->getId()) ?>"><?php echo $tipoGasto->getId() ?></a></td>
      <td><?php echo $tipoGasto->getDescripcion() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div id="pie">
  <a href="<?php echo url_for('tipoGasto/new') ?>">Nuevo</a>
  <hr/>
</div>
  
