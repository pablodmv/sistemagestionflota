<h2>Detalle Chofer</h2>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $chofer->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $chofer->getNombre() ?></td>
    </tr>
    <tr>
      <th>Docid:</th>
      <td><?php echo $chofer->getDocid() ?></td>
    </tr>
    <tr>
      <th>Domicilio:</th>
      <td><?php echo $chofer->getDomicilio() ?></td>
    </tr>
    <tr>
      <th>Libconducir:</th>
      <td><?php echo $chofer->getLibconducir() ?></td>
    </tr>
  </tbody>
</table>

<div id="pie">
<a href="<?php echo url_for('chofer/edit?id='.$chofer->getId()) ?>">Modificar</a>
&nbsp;
<a href="<?php echo url_for('chofer/index') ?>">Volver</a>
<hr />
</div>
