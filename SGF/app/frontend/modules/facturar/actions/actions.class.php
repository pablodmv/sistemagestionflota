<?php

/**
 * facturar actions.
 *
 * @package    SGF
 * @subpackage facturar
 * @author     Your name here
 */
class facturarActions extends sfActions
{


  public function executeIndex(sfWebRequest $request)
  {
    $cliente=$request->getParameter('cliente');
    if ($cliente){
        $c=new Criteria();
    $c=new Criteria();
     $c->add(OrdenPeer::CLIENTE,$cliente,Criteria::EQUAL);
     $c->add(OrdenPeer::LIQUIDADA,Null,Criteria::NOT_EQUAL);
    $c->add(OrdenPeer::ID,"NOT EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
    $this->ordens = OrdenPeer::doSelect($c);

    }else{
    $c= new Criteria();
    $c->add(OrdenPeer::LIQUIDADA,Null,Criteria::NOT_EQUAL);
    $c->add(OrdenPeer::ID,"NOT EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
    $this->ordens = OrdenPeer::doSelect($c);

    }


  }

  public function executeShow(sfWebRequest $request)
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
    $this->forward404Unless($Factura = FacturaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object orden does not exist (%s).', $request->getParameter('id')));
    $this->form = new FacturaForm($Factura);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Factura = FacturaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object orden does not exist (%s).', $request->getParameter('id')));
    $this->form = new FacturaForm($Factura);


    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($orden = OrdenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object orden does not exist (%s).', $request->getParameter('id')));
    $orden->delete();

    $this->redirect('facturar/index');
  }

    public function executeFacturar(sfWebRequest $request)
  {
          //FIJAR
          //
        //Obtengo los parametros enviados por el formulario
       $montoHora=0;
       $montokm=0;
        $respuesta=$request->getPostParameter('seleccionFacturar');
        $moneda=$request->getPostParameter('moneda');
        //Obtengo las ordenes seleccionadas pasando como parametro el array de checkbox
        $ordenesSeleccionadas= OrdenPeer::retrieveByPKs($respuesta);
        if($moneda==1){
           $simbolo='$';
       }
       if ($moneda==2){
              $simbolo='U$S';
       }
        foreach ($ordenesSeleccionadas as $orden){
            if ($ordenesSeleccionadas[0]->getCliente()!=$orden->getCliente()){
                $this->redirect('facturar/index?msj=1');
            }
        }

        //Creo la factura y le pongo fecha de hoy
         $tmpfactura = new Tmpfactura();
        $tmpfactura->setFechaFact(date('m/d/Y'));
      //Tomo el cliente de la primer orden. TODO: Chequear que todas las ordenes sean del mismo cliente
        $tmpfactura->setCliente($ordenesSeleccionadas[0]->getCliente());
        $tmpfactura->setMoneda($moneda);
        
        //Recorro las ordenes para agregar la coleccion de ordenes a la factura
        //$linea es la linea de factura formada por los id de Orden y Factura TODO: Cambiar por Numero de Fact (VER)

        foreach ($ordenesSeleccionadas as $orden){

            //conversion de moneda
            $linea=new Tmplineafact();
            $linea->setFacturaId($tmpfactura->getId());
            $linea->setOrden($orden);
            $linea->getTmpfactura();
            $linea->setDescripcion($orden->getDescripcion());
            $tmpfactura->setSubtotal(round($tmpfactura->getSubtotal()+$orden->getMontoxMoneda($moneda),2));
            //agrega las lineas de factura
            $tmpfactura->addTmpLineafact($linea);
            $montokm += $orden->getPrecioKM($moneda);
            $montoHora += $orden->getPrecioHora($moneda);
        }
        $tmpfactura->numeroFactura();
        $tmpfactura->calcularTotal();
        //guardo la factura en una tabla temporal. Borro los datos en la tabla primero
        $tmpfactura->save();
        //tmpFactura es lo que le pasa al facturarSuccess.php
        $this->Factura = $tmpfactura;
        $this->Seleccion = $respuesta;
        $this->Moneda = $moneda;
        $this->SubtKM=$montokm;
        $this->SubtHr=$montoHora;
        $this->Simb=$simbolo;
  }


  public function executeImprimirFacDetalle(sfWebRequest $request){
        $montoHora=0;
       $montokm=0;
        $idFact = $request->getParameter('id');
       $c=new Criteria();
       $c->add(TmpfacturaPeer::ID, $idFact,Criteria::EQUAL);
       //guarda la factura de tmpfactura en factura
       $tmpfactura=TmpfacturaPeer::doSelectOne($c);
       $c2=new Criteria();
       $c2->add(TmplineafactPeer::FACTURA_ID, $idFact,Criteria::EQUAL);
       $tmplineafacts=TmplineafactPeer::doSelect($c2);
       foreach ($tmplineafacts as $tmplineafact){
       $tmpfactura->addTmplineafact($tmplineafact);
       }
       if($tmpfactura->getMoneda()==1){
           $simbolo='$';
       }
       if ($tmpfactura->getMoneda()==2){
              $simbolo='U$S';
       }

        $config = sfTCPDFPluginConfigHandler::loadConfig();
    sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

    $doc_title    = "test title";
    $doc_subject  = "test description";
    $doc_keywords = "test keywords";

    //Genero la tabla via html
    $htmlcontent = "";
    $htmlcontent .="<table border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 2390px\">";
    $htmlcontent .="<tr>";
    $htmlcontent .="<td rowspan='2' colspan='3' style=\"width: 500px\">Detalle Factura </td>";
    $htmlcontent .="<td colspan='2'>Cliente: ".$tmpfactura->getNombreCliente()."</td>";
    $htmlcontent .="<td style=\"width: 200px\">Nº ".$tmpfactura->getNumFac()."</td>";
    $htmlcontent .="</tr>";
    $htmlcontent .="<tr>";
    $htmlcontent .="<td colspan='2' style=\"width: 500px\">Fecha ".$tmpfactura->getFechafact()." </td>";
    $htmlcontent .="<td>Ruc: ".$tmpfactura->getRUTCliente()."</td>";
    $htmlcontent .="<td style=\"width: 200px\">".$tmpfactura->getTipoMoneda()."</td>";
    $htmlcontent .="</tr>";
foreach($tmpfactura->gettmpLineafacts() as $orden){
    $htmlcontent .="<tr><td  style=\"text-align: center; width: 2047px; background-color:#808080\">&nbsp;</td></tr>";

    $htmlcontent .="<tr>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 1050px\">Orden</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Km</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Horas</th>";
    $htmlcontent .="</tr>";

     //Recorro la lista y genero el html
    
         $montokm += $orden->getPrecioKM($tmpfactura->getMoneda());
            $montoHora += $orden->getPrecioHora($tmpfactura->getMoneda());
        //$orden=OrdenPeer::retrieveByPK($linea->getOrdenId());
        $htmlcontent .= "<tr>";
        $htmlcontent .= "<td style=\"text-align: center; width: 1050px\">".$orden->getDescripcion()."</td>";
        $htmlcontent .= "<td style=\"text-align: center; width: 250px\">".$orden->getKmTotal()."</td>";
        
        $htmlcontent .= "<td style=\"text-align: center; width: 250px\">".$orden->getHoras()."</td>";
        $htmlcontent .= "</tr>";
        
        if(count($tmpfactura->getRemitoOrden($orden->getOrdenId()))>0){
            $htmlcontent .= "<tr><td  style=\"text-align: center; width: 2047px; background-color:#D8D8D8\">&nbsp;</td></tr>";
            $htmlcontent .= "<tr><td style=\"text-align: center; width: 2047px\">Remitos</td></tr>";

            $htmlcontent .= "<tr>";
            $htmlcontent .= "<td style=\"text-align: center; width: 250px; background-color:#C0C0C0\">Numero</td>";
            $htmlcontent .= "<td style=\"text-align: center; width: 850px; background-color:#C0C0C0\">Detalle</td>";
            $htmlcontent .= "<td style=\"text-align: center; width: 350px; background-color:#C0C0C0\">Fecha</td>";
            $htmlcontent .= "<td style=\"text-align: center; width: 350px; background-color:#C0C0C0\">Horas</td>";
            $htmlcontent .= "<td style=\"text-align: center; width: 244px; background-color:#C0C0C0\">Kilometros</td>";
            $htmlcontent .= "</tr>";

            foreach($tmpfactura->getRemitoOrden($orden->getOrdenId())as $remito){
                $htmlcontent .= "<tr>";
                $htmlcontent .= "<td style=\"text-align: center; width: 250px\">".$remito->getId()."</td>";
                $htmlcontent .= "<td style=\"text-align: center; width: 850px\">".$remito->getDetalle()."</td>";
                $htmlcontent .= "<td style=\"text-align: center; width: 350px\">".$remito->getFecha('d-m-Y')."</td>";
                $htmlcontent .= "<td style=\"text-align: center; width: 350px\">".$remito->getHorasTrab()."</td>";
                $kilometros = $remito->getKmFin() - $remito->getKmIni();
                $htmlcontent .= "<td style=\"text-align: center; width: 244px\">".$kilometros."</td>";

                $htmlcontent .= "</tr>";
            }

            


        }


    }

    $htmlcontent .="</table>";


    //create new PDF document (document units are set by default to millimeters)
    $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(PDF_AUTHOR);
    $pdf->SetTitle($doc_title);
    $pdf->SetSubject($doc_subject);
    $pdf->SetKeywords($doc_keywords);

    $pdf->SetHeaderData(PDF_HEADER_LOGO,PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING."Detalle Factura");

    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO); //set image scale factor

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    //initialize document
    $pdf->AliasNbPages();
    $pdf->AddPage();

    // output some HTML code
    $pdf->writeHTML($htmlcontent , true, 0);

    // Close and output PDF document
    $pdf->Output();

    // Stop symfony process
    throw new sfStopException();
      
  }




  public function executeBuscar(sfWebRequest $request){
    $this->form = new CobroFacturaForm();
  }


   public function executeGuardar(sfWebRequest $request)
  {
        $idFact = $request->getParameter('id');
       $c=new Criteria();
       $c->add(TmpfacturaPeer::ID, $idFact,Criteria::EQUAL);
       //guarda la factura de tmpfactura en factura
       $factura = new Factura();
       $tmpfactura=TmpfacturaPeer::doSelectOne($c);
       $tmpfactura->copyInto($factura);
       $c2=new Criteria();
       $c2->add(TmplineafactPeer::FACTURA_ID, $idFact,Criteria::EQUAL);
       $tmplineafacts=TmplineafactPeer::doSelect($c2);
       foreach ($tmplineafacts as $tmplineafact){
       $linea = new Lineafact();
       $tmplineafact->copyInto($linea);
       $factura->addlineafact($linea);
       }
       $factura->save();
       //limpia tmpFactura
       $tmpfactura->delete();
       $this->redirect('facturar/edit?id='.$factura->getId());
  }
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {

      $orden = $form->save();
      $this->redirect('facturar/index');
    }
  }

  

}
