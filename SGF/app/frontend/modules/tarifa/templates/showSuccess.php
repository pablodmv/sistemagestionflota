<h2>Detalle Tarifa</h2>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Tarifa->getId() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $Tarifa->getDescripcion() ?></td>
    </tr>
    <tr>
      <th>Valor:</th>
      <td><?php echo $Tarifa->getValor() ?></td>
    </tr>
  </tbody>
</table>
<div id="pie">
<a href="<?php echo url_for('tarifa/edit?id='.$Tarifa->getId()) ?>">Modificar</a>
&nbsp;
<a href="<?php echo url_for('index/index') ?>">Volver</a>
<hr />
</div>
