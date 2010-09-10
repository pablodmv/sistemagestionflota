<h2>Detalle Tipo de Gasto</h2>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $tipoGasto->getId() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $tipoGasto->getDescripcion() ?></td>
    </tr>
  </tbody>
</table>


<div id="pie">
<a href="<?php echo url_for('tipoGasto/edit?id='.$tipoGasto->getId()) ?>">Modificar</a>
&nbsp;
<a href="<?php echo url_for('tipoGasto/index') ?>">Volver</a>
<hr />
</div>
