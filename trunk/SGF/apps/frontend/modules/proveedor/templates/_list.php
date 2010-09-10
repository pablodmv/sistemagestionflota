<!-- apps/frontend/job/templates/_list.atom.php -->
<?php use_helper('Text') ?>

<h1>PROVEEDORES</h1>
<h2>Buscar Proveedor</h2>
<form action="<?php echo url_for('proveedor_search') ?>" method="get">
  <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
  <input type="submit" value="Buscar" class="guardar" />
  <div class="help">
    Ingresar Nombre
  </div>
</form>
<br>
<br>
<?php  if (count($proveedors) > 0):  ?>
<table>
  <thead>
    <tr>
      <th>Seleccionar</th>
      <th>Nombre</th>
      <th>Razon soc</th>
      <th>Rut</th>
      <th>Direccion</th>
      <th>Telefono</th>
      <th>Celular</th>
      <th>Mail</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($proveedors as $proveedor): ?>
    <tr>
        <td><a href="<?php echo url_for('liquidacion/index?proveedor='.$proveedor->getId()) ?>">Liquidar</a></td>
      <td><?php echo $proveedor->getNombre() ?></td>
      <td><?php echo $proveedor->getRazonSoc() ?></td>
      <td><?php echo $proveedor->getRut() ?></td>
      <td><?php echo $proveedor->getDireccion() ?></td>
      <td><?php echo $proveedor->getTelefono() ?></td>
      <td><?php echo $proveedor->getCelular() ?></td>
      <td><?php echo $proveedor->getMail() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

<?php  if (count($proveedors) == 0):  ?>
<div id="msj">
    <p><strong>NO SE ENCONTRO Proveedor</strong></p>
    <p>Presionar 'Nuevo' para agregar un proveedor</p>
</div>
<?php endif; ?>


  <a href="<?php  echo url_for('proveedor/new') ?>">Nuevo</a>