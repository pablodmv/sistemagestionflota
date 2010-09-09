<h2>Detalle Zona</h2>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Zona->getId() ?></td>
    </tr>
    <tr>
      <th>Descripcion:</th>
      <td><?php echo $Zona->getDescripcion() ?></td>
    </tr>
    <tr>
      <th>Localidad:</th>
      <td><?php echo $Zona->getNombreLocalidad() ?></td>
    </tr>
  </tbody>
</table>
<div id="pie">
   <a href="<?php echo url_for('zona/edit?id='.$Zona->getId()) ?>">Modificar</a>
&nbsp;
<a href="<?php echo url_for('zona/index') ?>">Volver</a>
 <hr />
</div>
