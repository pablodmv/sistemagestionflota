<h1>Clientes List</h1>
<h2>Buscar Cliente</h2>
<form action="<?php echo url_for('cliente_search') ?>" method="get">
  <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
  <input type="submit" value="Buscar" class="guardar" />
  <div class="help">
    Buscar por Nombre
  </div>
</form>
<!--
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
    <?php// foreach ($clientes as $cliente): ?>
    <tr>
      <td><a href="<?php //echo url_for('cliente/edit?id='.$cliente->getId()) ?>"><?php echo $cliente->getId() ?></a></td>
      <td><?php// echo $cliente->getNombre() ?></td>
      <td><?php //echo $cliente->getRazonSoc() ?></td>
      <td><?php // echo $cliente->getRut() ?></td>
      <td><?php //echo $cliente->getDireccion() ?></td>
      <td><?php //echo $cliente->getTelefono() ?></td>
      <td><?php // echo $cliente->getCelular() ?></td>
      <td><?php// echo $cliente->getMail() ?></td>
      <td><?php // echo $cliente->getEsEmpresa() ?></td>
    </tr>
    <?php //endforeach; ?>
  </tbody>
</table>
-->

  <a href="<?php echo url_for('cliente/new') ?>">Nuevo</a>
