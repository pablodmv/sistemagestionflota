<?php

/**
 * facturar actions.
 *
 * @package    SGF
 * @subpackage Liquidacion
 * @author     Your name here
 */
class liquidacionActions extends sfActions
{


  public function executeIndex(sfWebRequest $request)
  {

//          $proveedor=$request->getParameter('proveedor');
//    if ($proveedor){
//    $c=new Criteria();
//    $c=new Criteria();
//    $c->add(OrdenPeer::PROVEEDOR,$proveedor,Criteria::EQUAL);
//    $c->add(OrdenPeer::LIQUIDADA,null,Criteria::EQUAL);
//    $c->add(OrdenPeer::ID,"EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
//    $this->ordens = OrdenPeer::doSelect($c);
//
//    }else{
//        $this->ordens=null;
//    }

      // Selecciono las ordenes del proveedor que estan vehicxorden
    $proveedor=$request->getParameter('proveedor');
    if ($proveedor){
        $c=new Criteria();
        $c->add(RemitoPeer::PROVEEDOR,$proveedor,Criteria::EQUAL);
        $c->add(RemitoPeer::LIQUIDADA,Null,Criteria::EQUAL);
        $colremitos = RemitoPeer::doSelect($c);
//        $arrayIdOrden= array();
//        $i=0;
//        foreach ($idOrden as $id){
//            $arrayIdOrden[$i]=$id->getIdOrden();
//            $i+=1;
//        }
//    $this->ordens = OrdenPeer::retrieveByPKs($arrayIdOrden);
        $this->remitos = $colremitos;
    }else{
        $this->remitos=null;
    }
  }

  public function executeShow(sfWebRequest $request)
  {
   
    $this->orden = OrdenPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->remitos);
  }


  public function executeBuscar(sfWebRequest $request)
  {
    $this->orden = OrdenPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->orden);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ordenForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ordenForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($orden = OrdenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object orden does not exist (%s).', $request->getParameter('id')));
    $this->form = new ordenForm($orden);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($orden = OrdenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object orden does not exist (%s).', $request->getParameter('id')));
    $this->form = new ordenForm($orden);


    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($orden = OrdenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object orden does not exist (%s).', $request->getParameter('id')));
    $orden->delete();

    $this->redirect('liquidacion/index');
  }

    public function executeLiquidacion(sfWebRequest $request)
  {
        $respuesta=$request->getPostParameter('seleccionFacturar');
    if ($respuesta){
        $updateremitos=RemitoPeer::retrieveByPKs($respuesta);
        foreach($updateremitos as $remito){
            $remito->setLiquidada(true);
            $remito->save();
        }
        $this->remitos = $updateremitos;
    }else{
        $this->remitos=null;
    }
//          //FIJAR
//        //Obtengo los parametros enviados por el formulario
//        $respuesta=$request->getPostParameter('seleccionFacturar');
//        $moneda=$request->getPostParameter('moneda');
//        //Obtengo las ordenes seleccionadas pasando como parametro el array de checkbox
//        $ordenesSeleccionadas= OrdenPeer::retrieveByPKs($respuesta);
////
////        foreach ($ordenesSeleccionadas as $orden){
////            if ($ordenesSeleccionadas[0]->getCliente()!=$orden->getCliente()){
////                $this->redirect('liquidacion/index?msj=1');
////            }
////        }
//
//        //Creo la factura y le pongo fecha de hoy
//        $tmpfactura = new Tmpfactura();
//        $tmpfactura->setFechaFact(date('m/d/Y'));
//      //Tomo el cliente de la primer orden. TODO: Chequear que todas las ordenes sean del mismo cliente
//      //  $tmpfactura->setCliente($ordenesSeleccionadas[0]->getProveedor());
//        $tmpfactura->setMoneda($moneda);
//
//        //Recorro las ordenes para agregar la coleccion de ordenes a la factura
//        //$linea es la linea de factura formada por los id de Orden y Factura TODO: Cambiar por Numero de Fact (VER)
//
//        foreach ($ordenesSeleccionadas as $orden){
//
//            //conversion de moneda
//            $linea=new Tmplineafact();
//            $linea->setFacturaId($tmpfactura->getId());
//            $linea->setOrden($orden);
//            $linea->getTmpfactura();
//            $linea->setDescripcion($orden->getDescripcion());
//            $tmpfactura->setSubtotal(round($tmpfactura->getSubtotal()+$orden->getMontoxMoneda($moneda),2));
//            $tmpfactura->setKMTotal($tmpfactura->getKMTotal()+$orden->getKM());
//            $tmpfactura->setHoraTotal($tmpfactura->getHoraTotal()+$orden->getHora());
//            //agrega las lineas de factura
//            $tmpfactura->addTmpLineafact($linea);
//        }
//       // $tmpfactura->numeroFactura();
//        $tmpfactura->calcularTotal();
//        //guardo la factura en una tabla temporal. Borro los datos en la tabla primero
//        //tmpFactura es lo que le pasa al facturarSuccess.php
//        $this->Factura=$tmpfactura;

  }




   public function executeGuardar(sfWebRequest $request)
  {
       //guarda la factura de tmpfactura en factura
       $factura = new Factura();
       $tmpfactura=TmpfacturaPeer::doSelectOne(new Criteria());
       $tmpfactura->copyInto($factura);
       $tmplineafacts=TmplineafactPeer::doSelect(new Criteria());
       foreach ($tmplineafacts as $tmplineafact){
       $linea = new Lineafact();
       $tmplineafact->copyInto($linea);
       $factura->addlineafact($linea);
       }
       $factura->save();
       //limpia tmpFactura
       TmpfacturaPeer::doDeleteAll();
       $this->redirect('liquidacion/index');
  }
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {

      $orden = $form->save();
      $this->redirect('liquidacion/edit?id='.$orden->getId());
    }
  }

  

}
