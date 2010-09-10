<!-- apps/frontend/job/templates/_list.atom.php -->
<?php use_helper('Text') ?>

<h1>Buscar Cliente</h1>
<h2>Ingresar Nombre Cliente</h2>
<form action="<?php echo url_for('orden_search') ?>" method="get">
  <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
  <input type="submit" value="Buscar" class="guardar" />

</form>
<br>
<br>
<?php  if (count($cliente) > 0):  ?>
<table>
  <thead>
    <tr>
      <th>Seleccionar</th>
      <th>Numero Cuenta</th>
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
    <?php foreach ($cliente as $clientes): ?>
    <tr>
      <td><a href="<?php echo url_for('orden/new?idCliente='.$clientes->getId()) ?>">Nueva Orden</a> <br>
      <a href="<?php echo url_for('orden/index?cliente='.$clientes->getId()) ?>">Pendientes</a></td>
      <td><?php echo $clientes->getId() ?></td>
      <td><?php echo $clientes->getNombre() ?></td>
      <td><?php echo $clientes->getRazonSoc() ?></td>
      <td><?php echo $clientes->getRut() ?></td>
      <td><?php echo $clientes->getDireccion() ?></td>
      <td><?php echo $clientes->getTelefono() ?></td>
      <td><?php echo $clientes->getCelular() ?></td>
      <td><?php echo $clientes->getMail() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

<?php  if (count($cliente) == 0):  ?>
<div id="msj">
    <p><strong>NO SE ENCONTRO CLIENTE</strong></p>
    <p>Presionar 'Nuevo' para agregar un cliente</p>
</div>
<?php endif; ?>


  <a href="<?php  echo url_for('cliente/new') ?>">Nuevo</a>