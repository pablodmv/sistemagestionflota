<?php include_stylesheets() ?>
<h2>Datos de Cobro</h2>

<!-- $ordens debe tener datos sino mensaje de error -->
<?php  if (count($facturas) > 0):  ?>
  
  
<table>
  <thead>
    <tr>
        <th>Accion</th>
      <th>Num Factura</th>
      <th>Cliente</th>
      <th>Fecha</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($facturas as $factura): ?>
    <tr>
      <td><a href="<?php echo url_for('cobro/edit?id='.$factura->getId()) ?>">Datos Cobro</a></td>
      <td><?php echo $factura->getNumFac() ?></td>
      <td><?php echo $factura->getNombreCliente() ?></td>
     <td> <?php echo$factura->getFechaFact('d-m-Y') ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>

</table>
<a href="<?php echo url_for('orden/index') ?>">Volver </a>
<div id="pie">

<hr />

</div>

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