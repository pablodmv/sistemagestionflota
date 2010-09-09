<h2>Detalle Localidad</h2>

<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Localidad->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $Localidad->getNombre() ?></td>
    </tr>
    <tr>
      <th>Distancia:</th>
      <td><?php echo $Localidad->getDistancia() ?></td>
    </tr>
    <tr>
      <th>Capital:</th>
      <td><?php echo $Localidad->getCapital() ?></td>
    </tr>
    <tr>
      <th>Ciudadreferencia:</th>
      <td><?php echo $Localidad->getCiudadreferencia() ?></td>
    </tr>
  </tbody>
</table>


<div id="pie">
<a href="<?php echo url_for('localidad/edit?id='.$Localidad->getId()) ?>">Modificar</a>
&nbsp;
<a href="<?php echo url_for('localidad/index') ?>">Volver</a>
<hr />    
</div>
