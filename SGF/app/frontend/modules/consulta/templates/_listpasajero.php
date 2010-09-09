<!-- apps/frontend/job/templates/_list.atom.php -->
<?php use_helper('Text') ?>

<h2>Consulta Pasajeros Pendientes</h2>
<form action="<?php echo url_for('pasajero_search') ?>" method="get">
    <fieldset id="idFieldSet" >
        <legend>Buscar Pasajero</legend>
        <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
        <br>
        <input type="submit" value="Buscar" class="guardar" />
        <div class="help">
            Ingresar Nombre
        </div>
    </fieldset>
  
</form>
<br>
<br>
<?php  if (count($pasajeros) > 0):  ?>
<table>
  <thead>
    <tr>
      <th>Accion</th>
      <th>Nombre</th>
      <th>Direccion soc</th>
      <th>Telefono</th>
      <th>Mail</th>
      <th>Hora</th>
      <th>Zona</th>
      <th>Vehiculo</th>
      <th>Orden</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pasajeros as $pasajero): ?>
    <tr>
        <td><a href="<?php echo url_for('pasajero/edit?id='.$pasajero->getId()) ?>">Editar</a><br>
      <a  href="<?php echo url_for('pasajero/map?dir='.$pasajero->getDireccion()) ?>">Ver Mapa</a></td>
      <td><?php echo $pasajero->getNombre() ?></td>
      <td><?php echo $pasajero->getDireccion() ?></td>
      <td><?php echo $pasajero->getTelefono() ?></td>
      <td><?php echo $pasajero->getMail() ?></td>
      <td><?php echo $pasajero->getHora() ?></td>
      <td><?php echo $pasajero->getNombreZona() ?></td>
      <td><?php echo $pasajero->getNombreVehiculo() ?></td>
      <td><?php echo $pasajero->getNombreOrden() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php endif; ?>

<?php  if (count($pasajeros) == 0):  ?>
<div id="msj">
    <p><strong>NO SE ENCONTRO PASAJERO</strong></p>
    <p>Presionar 'Nuevo' para agregar un pasajero</p>
</div>
<?php endif; ?>

