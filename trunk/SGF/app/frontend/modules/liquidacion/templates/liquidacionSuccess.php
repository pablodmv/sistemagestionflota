
<h2>Remitos Liquidados</h2>
<table>

     <thead>
    <tr>
      <th>Cliente</th>
      <th>Descripcion</th>
      <th>Fecha</th>
      <th>Kilometros</th>
      <th>Horas</th>
      <th>Monto KM ($)</th>
      <th>Monto Hr ($)</th>
     
    </tr>
  </thead>
  <tbody>
       <?php foreach ($remitos as $remito): ?>
    <tr>

      <td><?php echo $remito->getCliente() ?></td>
      <td><?php echo $remito->getDetalle() ?></td>
      <td><?php echo $remito->getFecha() ?></td>
      <td><?php echo $remito->getKilometros() ?></td>
      <td><?php echo $remito->getHorasTrab() ?></td>
      <td><?php echo $remito->getremPrecioKM() ?></td>
      <td><?php echo $remito->getremPrecioHora() ?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<!--<hr />

<a href="<?php//  echo url_for('showFact/edit?id='.$Factura->getId()) ?>">Editar</a>
&nbsp;
<a href="<?php// echo url_for('liquidacion/guardar') ?>">Confirmar</a>
&nbsp;
-->
<a href="<?php echo url_for('liquidacion/index')?>">Volver</a>
<br>
<hr />
<?php //endforeach;?>


