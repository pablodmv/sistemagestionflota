<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $Camioneta->getId() ?></td>
    </tr>
    <tr>
      <th>Marca:</th>
      <td><?php echo $Camioneta->getMarca() ?></td>
    </tr>
    <tr>
      <th>Modelo:</th>
      <td><?php echo $Camioneta->getModelo() ?></td>
    </tr>
    <tr>
      <th>Ano:</th>
      <td><?php echo $Camioneta->getAno() ?></td>
    </tr>
    <tr>
      <th>Matricula:</th>
      <td><?php echo $Camioneta->getMatricula() ?></td>
    </tr>
    <tr>
      <th>Capacidad:</th>
      <td><?php echo $Camioneta->getCapacidad() ?></td>
    </tr>
    <tr>
      <th>Zona:</th>
      <td><?php echo $Camioneta->getZonaId() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('camioneta/edit?id='.$Camioneta->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('camioneta/index') ?>">List</a>
