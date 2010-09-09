<h2>Lista Pasajeros</h2>
<br>
<?php use_helper('Date') ?>
<table>
  <thead>
    <tr>
      <th>Mapa</th>
      <th>Nombre</th>
      <th>Direccion</th>
      <th>Hora</th>
      <th>Zona</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Pasajeros as $Pasajero): ?>
    <tr>
      <td><a href="<?php echo url_for('pasajero/map?dir='.$Pasajero->getDireccion().'&orden='.$Pasajero->getOrden()) ?>">Ver Mapa</a></td>
      <td><?php echo $Pasajero->getNombre() ?></td>
      <td><?php echo $Pasajero->getDireccion() ?></td>
      <?php $fecha=$Pasajero->getHora() ?>
      <td><?php echo format_datetime($fecha, 'r', 'es_ES') ?></td>
      <td><?php echo $Pasajero->getNombreZona() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
 
</table>
<a href="<?php echo url_for('reportes/ListaPasajero') ?>">Volver </a> &nbsp;
<a href="<?php echo url_for('reportes/ImprimirPasajeros?fechaIni='.$fechaInicial.'&fechaFin='.$fechaFinal.'&idVehiculo='.$vehic) ?>">Imprimir</a>
<div id="pie">
    
<hr />
 
</div>
  