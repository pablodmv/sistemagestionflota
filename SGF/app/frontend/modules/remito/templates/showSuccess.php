<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Remito->getId() ?></td>
    </tr>
    <tr>
      <th>Id orden:</th>
      <td><?php echo $Remito->getIdOrden() ?></td>
    </tr>
    <tr>
      <th>Fecha:</th>
      <td><?php echo $Remito->getFecha() ?></td>
    </tr>
    <tr>
      <th>Km Inicial:</th>
      <td><?php echo $Remito->getKmIni() ?></td>
    </tr>
    <tr>
      <th>Km Final:</th>
      <td><?php echo $Remito->getKmFin() ?></td>
    </tr>
    <tr>
      <th>Horas:</th>
      <td><?php echo $Remito->getHoras() ?></td>
    </tr>
    <tr>
      <th>Detalle:</th>
      <td><?php echo $Remito->getDetalle() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('remito/edit?id='.$Remito->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php echo url_for('remito/index?idOrden='.$Remito->getIdOrden()) ?>">volver</a>
