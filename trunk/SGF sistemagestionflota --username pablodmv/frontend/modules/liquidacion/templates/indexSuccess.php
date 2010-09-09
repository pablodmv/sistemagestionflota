<?php include_stylesheets() ?>
<h2>Liquidar Proveedores</h2>
<fieldset  >
<h3>Buscar Proveedor</h3>
<form action="<?php echo url_for('proveedor_search') ?>" method="get" >

  <input type="text" name="query" value="<?php echo $sf_request->getParameter('query') ?>" id="search_keywords" />
  <br>
  <input type="submit" value="Buscar" class="guardar" />
  <div class="help">
   
  </div>

</form>
    </fieldset>
<br>
<br>
<!-- $ordens debe tener datos sino mensaje de error -->
<?php  if (count($remitos) > 0 ):  ?>
<form  id="formliquidacion" action="liquidacion/liquidacion" method="POST">
  
  
<table id="tblLiquidacion">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Descripcion</th>
      <th>Fecha</th>
      <th>Kilometros</th>
      <th>Horas</th>
        <th>Monto KM ($)</th>
      <th>Monto Hr ($)</th>
     <th>Seleccionar</th>
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
  
      <!-- <td><?php// echo $orden->getFacturada() ?></td> -->
     <td> <input type="checkbox" name="seleccionFacturar[]"  class="checkbox" value="<?php echo $remito->getId()?>" ></td>
     <!--<td><a href="<?php // echo url_for('orden/edit?id='.$orden->getId()) ?>">Modificar</a></td>-->
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    <tfoot>
        <?php $mon=new Moneda() ?>
    <select name="moneda" id="moneda">
        <?php foreach($mon->getAll() as $tipomon):?>
        <option  value="<?php echo $tipomon->getId()?>"><?php echo $tipomon->getMoneda() ?></option>

        <?php endforeach; ?>
    </select>
    </tfoot>

     <input type="button" name="liquidar" value="Liquidar" class="guardar" id="liquidar" />
 </form>
<?php endif; ?>

<?php  if (count($remitos) == 0):  ?>
<div id="msj">
    <p>NO EXISTEN ORDENES PARA EL PROVEEDOR SELECCIONADO</p>
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