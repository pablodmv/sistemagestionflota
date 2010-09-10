<h2>Lista Proveedores</h2>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Razon soc</th>
      <th>Rut</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Celular</th>
      <th>Mail</th>
      <th>Es empresa</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($proveedors as $proveedor): ?>
    <tr>
      <td><a href="<?php echo url_for('proveedor/show?id='.$proveedor->getId()) ?>"><?php echo $proveedor->getId() ?></a></td>
      <td><?php echo $proveedor->getNombre() ?></td>
      <td><?php echo $proveedor->getRazonSoc() ?></td>
      <td><?php echo $proveedor->getRut() ?></td>
      <td><?php echo $proveedor->getDireccion() ?></td>
      <td><?php echo $proveedor->getTelefono() ?></td>
      <td><?php echo $proveedor->getCelular() ?></td>
      <td><?php echo $proveedor->getMail() ?></td>
      <td><?php echo $proveedor->getEsEmpresa() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div id="pie">
    <a href="<?php echo url_for('proveedor/new') ?>">Nuevo</a>
    <hr />
</div>
  
