<table id="facturaShow">
        <tr>
            <td rowspan="2" colspan="3" id="facturaLB">DETALLE FACTURA</td>
            <td  colspan="2" class="factura">Cliente: <?php echo $Factura->getNombreCliente()?></td>
            <td  class="tdLabelCabFact">Nº:</td>
            <td  class="tdFactValorCab"><?php echo $Factura->numeroFactura()?></td>
        </tr>
        <tr>
            <td colspan="2"class="factura"> Ruc: <?php echo $Factura->getRUTCliente() ?>  </td>
            <td class="tdLabelCabFact">&nbsp;Fecha:</td>
            <td class="tdFactValorCab"><?php echo $Factura->getFechafact() ?></td>
        </tr>
    <tbody>
      


        <?php foreach($Factura->getTmplineafacts() as $linea): ?>
          <!-- Separador -->
          <tr><td colspan="7" class="tdvacio">&nbsp;</td></tr>
        <tr>
            <td colspan="3" class="tdlbFactValor">Orden</td>
            <td class="tdlbFactValor">Km</td>
            <td class="tdlbFactValor">Horas</td>
            <td class="tdlbFactValor">Monto/Km</td>
            <td class="tdlbFactValor">Monto/Hr</td>
        </tr>
        <tr>
            <td colspan="3" class="tdFactLinea"><?php echo $linea->getDescripcion() ?></td>
            <td class="tdFactValor"><?php echo $linea->getKmTotal() ?></td>
            <td class="tdFactValor"><?php echo $linea->getHoras() ?></td>
            <td class="tdFactValor"><?php echo $linea->getPrecioKM($Moneda) ?></td>
            <td class="tdFactValor"><?php echo $linea->getPrecioHora($Moneda) ?></td>
            </tr>
     <?php If(count($Factura->getRemitoOrden($linea->getOrdenId()))>0):?>
            <tr><td  colspan="7">&nbsp;</td></tr>
       <tr><td id="tdRemitos" colspan="7">Remitos</td></tr>
                        <tr>
                         <td class="tdlbremito">&nbsp;</td>
                        <td  class="tdlbremito">Numero</td>
                        <td colspan="2" class="tdlbremito">Detalle</td>
                         <td class="tdlbremito">Fecha</td>
                          <td class="tdlbremito">Horas</td>
                            <td class="tdlbremito">Kilometros</td>
                        </tr>
               

             <?php foreach($Factura->getRemitoOrden($linea->getOrdenId()) as $remito): ?>
        <tr>
            <td class="tdremito">&nbsp;</td>
            <td class="tdremito" ><?php echo $remito->getId();?> </td>
                <td class="tdremito" colspan="2" ><?php echo $remito->getDetalle();?> </td>
                    <td class="tdremito" ><?php echo $remito->getFecha('d-m-Y');?> </td>
                        <td class="tdremito" ><?php echo $remito->getHorasTrab();?> </td>
                        <td class="tdremito" ><?php echo $remito->getKmFin()-$remito->getKmIni();?> </td>




        </tr>
            <?php endforeach;?>
    <hr />
         <?php endif;?>
    
          <?php endforeach;?>
            
        
    <tfoot>
        <tr>
            <td colspan="7" class="tdFactLinea">&nbsp;</td>
        </tr>
        <tr>
            <td >&nbsp;</td>
            <td colspan="2">&nbsp;</td>
            <td colspan="3">Fecha: <?php echo $Factura->getFechafact('d-m-Y')?><br>
                Moneda: <?php echo $Factura->getTipoMoneda()?>
                 <td colspan="2" class="tdFactValor">
                     Subtotal Hora: <?php echo $Simb.' '.$SubtHr ?>
                     Subtotal KM: <?php echo $Simb.' '.$SubtKM ?>
                 </td>
        </tr>


        <tr>
            <td >&nbsp;</td>
            <td colspan="2">&nbsp;
            </td>
            <td colspan="3" class="tdLabelPieFact">&nbsp;</td>
            <td colspan="2" class="tdFactValor">
                Total Hora: <?php echo $Simb.' '.$SubtHr*1.22 ?><br>
                 Total KM: <?php echo $Simb.' '.$SubtKM*1.22 ?>
            </td>
        </tr>
        </tfoot>
</table>








<!--<a href="<?php // echo url_for('showFact/edit?id='.$Factura->getId()) ?>">Editar</a>-->
&nbsp;
<a href="<?php echo url_for('facturar/guardar?id='.$Factura->getId()) ?>">Confirmar</a>
&nbsp;
<a href="<?php echo url_for('facturar/index')?>">Volver</a>
&nbsp;
<a href="<?php echo url_for('facturar/ImprimirFacDetalle?id='.$Factura->getId())?>">Imprimir</a>
<br>
<hr />
<?php //endforeach;?>


