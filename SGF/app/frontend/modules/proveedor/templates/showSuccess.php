<h2>Detalle Proveedor</h2>
<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $proveedor->getId() ?></td>
    </tr>
    <tr>
      <th>Nombre:</th>
      <td><?php echo $proveedor->getNombre() ?></td>
    </tr>
    <tr>
      <th>Razon soc:</th>
      <td><?php echo $proveedor->getRazonSoc() ?></td>
    </tr>
    <tr>
      <th>Rut:</th>
      <td><?php echo $proveedor->getRut() ?></td>
    </tr>
    <tr>
      <th>Direccion:</th>
      <td><?php echo $proveedor->getDireccion() ?></td>
    </tr>
    <tr>
      <th>Telefono:</th>
      <td><?php echo $proveedor->getTelefono() ?></td>
    </tr>
    <tr>
      <th>Celular:</th>
      <td><?php echo $proveedor->getCelular() ?></td>
    </tr>
    <tr>
      <th>Mail:</th>
      <td><?php echo $proveedor->getMail() ?></td>
    </tr>
    <tr>
      <th>Es empresa:</th>
      <td><?php echo $proveedor->getEsEmpresa() ?></td>
    </tr>
  </tbody>
</table>

<hr />
<div id="pie">
    <a href="<?php echo url_for('proveedor/edit?id='.$proveedor->getId()) ?>">Editar</a>
    &nbsp;
    <a href="<?php echo url_for('proveedor/index') ?>">Volver</a>
    <hr />
</div>

