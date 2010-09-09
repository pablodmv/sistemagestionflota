<?php include_stylesheets() ?>
<h2>Facturar Ordenes Pendientes</h2>
<fieldset  >
<h3>Buscar Cliente</h3>
<form action="<?php echo url_for('cliente_search') ?>" method="get" >

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
<?php  if (count($ordens) > 0):  ?>
<form  id="formfacturar" action="facturar/facturar" method="POST">
  
  
<table id="tblFactura">
  <thead>
    <tr>
      <th>Cliente</th>
      <th>Descripcion</th>
      <th>Desde</th>
      <th>Hasta</th>
     <th>Seleccionar</th>
     <th>Detalle</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($ordens as $orden): ?>
    <tr>
      <td><?php echo $orden->getNombreCliente() ?></td>
      <td><?php echo $orden->getDescripcion() ?></td>
      <td><?php echo $orden->getFechaDesde() ?></td>
      <td><?php echo $orden->getFechaHasta() ?></td>
      <!-- <td><?php// echo $orden->getFacturada() ?></td> -->
     <td> <input type="checkbox" name="seleccionFacturar[]"  class="checkbox" value="<?php echo $orden->getID()?>" ></td>
     <td><a href="<?php echo url_for('orden/edit?id='.$orden->getId()) ?>">Modificar</a></td>
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

     <input type="button" name="facturar" value="Detalle" class="guardar" id="facturar" />
 </form>
<?php endif; ?>

<?php  if (count($ordens) == 0):  ?>
<div id="msj">
    <p>NO HAY ORDENES PENDIENTES</p>
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