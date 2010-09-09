<?php include_stylesheets() ?>
<h2>Datos de Cobro</h2>

<!-- $ordens debe tener datos sino mensaje de error -->
<?php  if (count($facturas) > 0):  ?>
  
  
<table>
  <thead>
    <tr>
        
      <th>Num Factura</th>
      <th>Cliente</th>
      <th>Fecha</th>
      <th>Monto</th>
      <th>Forma Pago</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($facturas as $factura): ?>
    <tr>
      <td><?php echo $factura->getNumFac() ?></td>
      <td><?php echo $factura->getNombreCliente() ?></td>
     <td> <?php echo $factura->getFechaFact('d-m-Y') ?></td>
     <td> <?php echo $factura->getSubtotal() ?></td>
     <td> <?php echo $factura->getFormaPago()  ?></td>
    </tr>
    <?php endforeach; ?>
    <tr><td colspan="5" id="tdTotalFechaFactura">Total: <?php echo $totales; ?></td></tr>

  </tbody>

</table>
<a href="<?php echo url_for('reportes/FactFecha') ?>">Volver </a> &nbsp;
<a href="<?php echo url_for('reportes/ImprimirFacFecha?fechaIni='.$fechaInicial.'&fechaFin='.$fechaFinal) ?>">Imprimir</a>
<?php endif; ?>

<?php  if (count($facturas) == 0):  ?>
<div id="msj">
    <p>NO EXISTEN FACTURAS PENDIENTES DE COBRO</p>
</div>
<?php endif; ?>

<div id="pie">
    <hr/>
</div>
 <!-- <a href="<?php //echo url_for('facturar/new') ?>">New</a>
<a href="<?php

//      foreach ($ordens as $orden):
//      if (!$orden->getSeleccionado()) {
//          unset($ordens[$orden]);
//      }
//      endforeach;
//unset($_SESSION['ordenesfacturar']);
//$_SESSION['ordenesfacturar']=$ordens;
//echo url_for('facturar/facturar')

?>" >Facturar</a> -->