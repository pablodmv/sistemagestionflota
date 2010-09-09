<?php

/**
 * orden actions.
 *
 * @package    SGF
 * @subpackage orden
 * @author     Your name here
 */
class reportesActions extends sfActions
{
  public function executeOrdenesPend(sfWebRequest $request)
  {
    //$this->Ordens = OrdenPeer::doSelect(new Criteria());
    //$cliente=$request->getParameter('cliente');
    //if ($cliente){
//    $c=new Criteria();
//     $c->add(OrdenPeer::CLIENTE,$cliente,Criteria::EQUAL);
//     $c->add(OrdenPeer::FECHA, date('Y-m-d'),Criteria::GREATER_EQUAL);
//    $c->add(OrdenPeer::ID,"NOT EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
//    $this->Ordens = OrdenPeer::doSelect($c);

    //}else{
    $c= new Criteria();
    $c->add(OrdenPeer::FECHA_HASTA, date('Y-m-d'),Criteria::GREATER_EQUAL);
    $c->add(OrdenPeer::ID,"NOT EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
    $this->Ordens = OrdenPeer::doSelect($c);
  //}

  }



  public function executeFactFecha(sfWebRequest $request)
  {
    $this->form = new requesDateForm();
  }

public function executeListaOrden(sfWebRequest $request)
  {
    $this->form = new requesDateInputForm();
  }
public function executeListaPasajero(sfWebRequest $request)
  {
    $this->form = new requesDateVehicForm();
  }


  public function executeListadoDePasajeros(sfWebRequest $request){
       $FechaIncial=$request->getPostParameter('fechaInicial');
        $FechaFinal=$request->getPostParameter('fechaFinal');
        $vehiculo=$request->getPostParameter('idVehiculo');
        $FechaConsultaIni=$FechaIncial['year'].'-'.$FechaIncial['month'].'-'.$FechaIncial['day'].' 00:00:00';
        $FechaConsultaFin=$FechaFinal['year'].'-'.$FechaFinal['month'].'-'.$FechaFinal['day'].' 23:59:59';
      $c= new Criteria();
      $c->add(PasajeroPeer::VEHICULO, $vehiculo,Criteria::EQUAL);
    $c->add(PasajeroPeer::HORA, $FechaConsultaIni,Criteria::GREATER_EQUAL);
   $c->addAnd(PasajeroPeer::HORA, $FechaConsultaFin,Criteria::LESS_EQUAL);
    $this->Pasajeros = PasajeroPeer::doSelect($c);
    $this->fechaInicial = $FechaConsultaIni;
    $this->fechaFinal= $FechaConsultaFin;
    $this->vehic=$vehiculo;
  //}

  }

  public function executeListadoDeOrdenes(sfWebRequest $request){
       $FechaIncial=$request->getPostParameter('fechaInicial');
        $FechaFinal=$request->getPostParameter('fechaFinal');
        $cliente=$request->getPostParameter('idCliente');
        $FechaConsultaIni=$FechaIncial['year'].'-'.$FechaIncial['month'].'-'.$FechaIncial['day'].' 00:00:00';
        $FechaConsultaFin=$FechaFinal['year'].'-'.$FechaFinal['month'].'-'.$FechaFinal['day'].' 23:59:00';
      $c= new Criteria();
      $c->add(OrdenPeer::CLIENTE, $cliente,Criteria::EQUAL);
      $c->add(OrdenPeer::FECHA_DESDE, $FechaConsultaIni,Criteria::GREATER_EQUAL);
      $c->addAnd(OrdenPeer::FECHA_HASTA, $FechaConsultaFin,Criteria::LESS_EQUAL);
      $c->add(OrdenPeer::ID,"NOT EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
      $this->Ordens = OrdenPeer::doSelect($c);
      $this->fechaInicial = $FechaConsultaIni;
      $this->fechaFinal= $FechaConsultaFin;
      $this->clie=$cliente;
  //}

  }

    public function executeFechaFactura(sfWebRequest $request)
  {
        $FechaIncial=$request->getPostParameter('fechaInicial');
        $FechaFinal=$request->getPostParameter('fechaFinal');
        $FechaConsultaIni=$FechaIncial['year'].'-'.$FechaIncial['month'].'-'.$FechaIncial['day'];
        $FechaConsultaFin=$FechaFinal['year'].'-'.$FechaFinal['month'].'-'.$FechaFinal['day'];
          $c=new Criteria();
     $c->add(FacturaPeer::SUBTOTAL,0,Criteria::NOT_EQUAL);
     $c->add(FacturaPeer::FECHAPAGO,$FechaConsultaIni,Criteria::GREATER_EQUAL);
     $c->addAnd(FacturaPeer::FECHAPAGO,$FechaConsultaFin,Criteria::LESS_EQUAL);
     $fact= new Factura();
     $fact=FacturaPeer::doSelect($c);
            $total=0;
        foreach ($fact as $factura){
            $total = $factura->getSubtotal();
        }
    $this->facturas = $fact;
    $this->totales = $total;
    $this->fechaInicial = $FechaConsultaIni;
    $this->fechaFinal = $FechaConsultaFin;
    
  }


public function executeImprimirFacFecha(sfWebRequest $request){

    $FechaIncial=$request->getParameter('fechaIni');
        $FechaFinal=$request->getParameter('fechaFin');
          $c=new Criteria();
     $c->add(FacturaPeer::SUBTOTAL,0,Criteria::NOT_EQUAL);
     $c->add(FacturaPeer::FECHAPAGO,$FechaIncial,Criteria::GREATER_EQUAL);
     $c->addAnd(FacturaPeer::FECHAPAGO,$FechaFinal,Criteria::LESS_EQUAL);
     $fact=new Factura();
        $fact=FacturaPeer::doSelect($c);
            $total=0;
        foreach ($fact as $factura){
            $total = $factura->getSubtotal();
        }
    $this->facturas = $fact;

    $config = sfTCPDFPluginConfigHandler::loadConfig();
    sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

    $doc_title    = "test title";
    $doc_subject  = "test description";
    $doc_keywords = "test keywords";

    //Genero la tabla via html
    $htmlcontent = "";
    $htmlcontent .="<table border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 2390px\">";
    $htmlcontent .="<thead>";
    $htmlcontent .="<tr>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">NºFactura</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 350px\">Nombre Cliente</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center\">Fecha</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center\">Subtotal</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center\">Total</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Pago</th>";
    $htmlcontent .="</tr>";
    $htmlcontent .="</thead>";
    $htmlcontent .="<tbody>";

     //Recorro la lista y genero el html
    foreach($this->facturas as $factura){
        $htmlcontent .= "<tr>";
        $htmlcontent .= "<td style=\"width: 250px; text-align: center\">".$factura->getNumFac()."</td>";
        $htmlcontent .= "<td style=\"width: 350px; text-align: center\">".$factura->getNombreCliente()."</td>";
        $fecha= $factura->getFechaFact('d-m-Y');
        $htmlcontent .= "<td style=\"text-align: center\">".$factura->getFechaFact('d-m-Y')."</td>";
        $htmlcontent .= "<td style=\"width: 396px; text-align: center\">".$factura->getSubtotal()."</td>";
        $htmlcontent .= "<td style=\"width: 396px; text-align: center\">".$factura->getSubtotal()*1.22."</td>";
        $htmlcontent .= "<td style=\"width: 252px; text-align: center\">".$factura->getFormaPago()."</td>";
        $htmlcontent .= "</tr>";
    }
    $htmlcontent .="</tbody>";
    $htmlcontent .="</table>";

    //create new PDF document (document units are set by default to millimeters)
    $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(PDF_AUTHOR);
    $pdf->SetTitle($doc_title);
    $pdf->SetSubject($doc_subject);
    $pdf->SetKeywords($doc_keywords);

    $pdf->SetHeaderData(PDF_HEADER_LOGO,PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING."Facturación por Fecha");

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


public function executeImprimirOrdPend(){
    
    $c= new Criteria();
    $c->add(OrdenPeer::FECHA_HASTA, date('Y-m-d'),Criteria::GREATER_EQUAL);
    $c->add(OrdenPeer::ID,"NOT EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
    $this->Ordens = OrdenPeer::doSelect($c);

    $config = sfTCPDFPluginConfigHandler::loadConfig();
    sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

    $doc_title    = "test title";
    $doc_subject  = "test description";
    $doc_keywords = "test keywords";

    //Genero la tabla via html
    $htmlcontent = "";
    $htmlcontent .="<table border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 2390px\">";
    $htmlcontent .="<thead>";
    $htmlcontent .="<tr>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 300px\">Cliente</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 570px\">Descripción</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Desde</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Hasta</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center\">Contacto</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Tel</th>";
    $htmlcontent .="</tr>";
    $htmlcontent .="</thead>";
    $htmlcontent .="<tbody>";

     //Recorro la lista y genero el html
    foreach($this->Ordens as $orden){
        $htmlcontent .= "<tr>";
        $htmlcontent .= "<td style=\"width: 300px; text-align: center\">".$orden->getNombreCliente()."</td>";
        $htmlcontent .= "<td style=\"width: 570px; text-align: center\">".$orden->getDescripcion()."</td>";
        $fechaDesde= $orden->getFechaDesde('d-m-Y');
        $fechaHasta= $orden->getFechaHasta('d-m-Y');
        $htmlcontent .= "<td style=\"width: 250px; text-align: center\">".$fechaDesde."</td>";
        $htmlcontent .= "<td style=\"width: 250px; text-align: center\">".$fechaHasta."</td>";
        $htmlcontent .= "<td style=\"width: 396px; text-align: center\">".$orden->getContacto()."</td>";
        $htmlcontent .= "<td style=\"width: 250px; text-align: center\">".$orden->getTelContacto()."</td>";
        $htmlcontent .= "</tr>";
    }
    $htmlcontent .="</tbody>";
    $htmlcontent .="</table>";

    //create new PDF document (document units are set by default to millimeters)
    $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(PDF_AUTHOR);
    $pdf->SetTitle($doc_title);
    $pdf->SetSubject($doc_subject);
    $pdf->SetKeywords($doc_keywords);

    $pdf->SetHeaderData(PDF_HEADER_LOGO,PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING."Ordenes Pendientes");

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

public function executeImprimirOrdCli(sfWebRequest $request){
        $FechaIncial=$request->getParameter('fechaInicial').' 00:00:00';
        $FechaFinal=$request->getParameter('fechaFinal').'23:59:00';
        $cliente=$request->getParameter('idCliente');
      $c= new Criteria();
      $c->add(OrdenPeer::CLIENTE, $cliente,Criteria::EQUAL);
      $c->add(OrdenPeer::FECHA_DESDE, $FechaIncial,Criteria::GREATER_EQUAL);
      $c->addAnd(OrdenPeer::FECHA_HASTA, $FechaFinal,Criteria::LESS_EQUAL);
      $c->add(OrdenPeer::ID,"NOT EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
      $this->Ordens = OrdenPeer::doSelect($c);

      $config = sfTCPDFPluginConfigHandler::loadConfig();
    sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

    $doc_title    = "test title";
    $doc_subject  = "test description";
    $doc_keywords = "test keywords";

    //Genero la tabla via html
    $htmlcontent = "";
    $htmlcontent .="<table border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 2390px\">";
    $htmlcontent .="<thead>";
    $htmlcontent .="<tr>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 300px\">Cliente</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 570px\">Descripción</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Desde</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Hasta</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center\">Contacto</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Tel</th>";
    $htmlcontent .="</tr>";
    $htmlcontent .="</thead>";
    $htmlcontent .="<tbody>";

     //Recorro la lista y genero el html
    foreach($this->Ordens as $orden){
        $htmlcontent .= "<tr>";
        $htmlcontent .= "<td style=\"width: 300px; text-align: center\">".$orden->getNombreCliente()."</td>";
        $htmlcontent .= "<td style=\"width: 570px; text-align: center\">".$orden->getDescripcion()."</td>";
        $fechaDesde= $orden->getFechaDesde('d-m-Y');
        $fechaHasta= $orden->getFechaHasta('d-m-Y');
        $htmlcontent .= "<td style=\"width: 250px; text-align: center\">".$fechaDesde."</td>";
        $htmlcontent .= "<td style=\"width: 250px; text-align: center\">".$fechaHasta."</td>";
        $htmlcontent .= "<td style=\"width: 396px; text-align: center\">".$orden->getContacto()."</td>";
        $htmlcontent .= "<td style=\"width: 250px; text-align: center\">".$orden->getTelContacto()."</td>";
        $htmlcontent .= "</tr>";
    }
    $htmlcontent .="</tbody>";
    $htmlcontent .="</table>";

    //create new PDF document (document units are set by default to millimeters)
    $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(PDF_AUTHOR);
    $pdf->SetTitle($doc_title);
    $pdf->SetSubject($doc_subject);
    $pdf->SetKeywords($doc_keywords);

    $pdf->SetHeaderData(PDF_HEADER_LOGO,PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING."Ordenes por Cliente");

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

public function executeImprimirPasajeros(sfWebRequest $request){
    $FechaIncial=$request->getParameter('fechaIni');
        $FechaFinal=$request->getParameter('fechaFin');
        $vehiculo=$request->getParameter('idVehiculo');
        //$FechaConsultaIni=$FechaIncial['year'].'-'.$FechaIncial['month'].'-'.$FechaIncial['day'];
        //$FechaConsultaFin=$FechaFinal['year'].'-'.$FechaFinal['month'].'-'.$FechaFinal['day'];
      $c= new Criteria();
      $c->add(PasajeroPeer::VEHICULO, $vehiculo,Criteria::EQUAL);
    $c->add(PasajeroPeer::HORA, $FechaIncial,Criteria::GREATER_EQUAL);
    $c->addAnd(PasajeroPeer::HORA, $FechaFinal,Criteria::LESS_EQUAL);
    $this->Pasajeros = PasajeroPeer::doSelect($c);
    $this->vehic=$vehiculo;
    $objvehic = VehiculoPeer::retrieveByPK($vehiculo);

    $config = sfTCPDFPluginConfigHandler::loadConfig();
    sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

    $doc_title    = "test title";
    $doc_subject  = "test description";
    $doc_keywords = "test keywords";

    //Genero la tabla via html
    $htmlcontent = "";
    $htmlcontent .="<h3>Vehiculo:".$objvehic->getDescripcion()."</h3>";
    $htmlcontent .="<h4>Fecha:".$FechaIncial.' '.$FechaFinal."</h4>";
    $htmlcontent .="<table border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 2390px\">";
    $htmlcontent .="<thead>";
    $htmlcontent .="<tr>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 570px\">Nombre</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 900px\">Dirección</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Hora</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Zona</th>";
    $htmlcontent .="</tr>";
    $htmlcontent .="</thead>";
    $htmlcontent .="<tbody>";

     //Recorro la lista y genero el html
    foreach($this->Pasajeros as $pasajero){
        $htmlcontent .= "<tr>";
        $htmlcontent .= "<td style=\"width: 570px; text-align: center\">".$pasajero->getNombre()."</td>";
        $htmlcontent .= "<td style=\"width: 900px; text-align: center\">".$pasajero->getDireccion()."</td>";
        $hora= $pasajero->getHora('d-m-Y H:i:s');

        $htmlcontent .= "<td style=\"width: 250px; text-align: center\">".$hora."</td>";
        $htmlcontent .= "<td style=\"width: 250px; text-align: center\">".$pasajero->getNombreZona()."</td>";
        $htmlcontent .= "</tr>";
    }
    $htmlcontent .="</tbody>";
    $htmlcontent .="</table>";

    //create new PDF document (document units are set by default to millimeters)
    $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(PDF_AUTHOR);
    $pdf->SetTitle($doc_title);
    $pdf->SetSubject($doc_subject);
    $pdf->SetKeywords($doc_keywords);

    $pdf->SetHeaderData(PDF_HEADER_LOGO,PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING."Ordenes por Cliente");

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

  public function executeShow(sfWebRequest $request)
  {
    $this->Orden = PasajeroPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Orden);
  }

  public function executeNew(sfWebRequest $request)
  {
         $idCliente = $request->getParameter('idCliente');
    if(!empty($idCliente)){
        $Orden=new Orden();
        $Orden->setCliente($idCliente);
        $this->form = new OrdenForm($Orden);
        $this->form->setIdCliente($idCliente);
    }else{
        $this->redirect('orden/index');
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new OrdenForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Orden = PasajeroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Orden does not exist (%s).', $request->getParameter('id')));
    $this->form = new OrdenForm($Orden);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Orden = PasajeroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Orden does not exist (%s).', $request->getParameter('id')));
    $this->form = new OrdenForm($Orden);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Orden = PasajeroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Orden does not exist (%s).', $request->getParameter('id')));
    $Orden->delete();

    $this->redirect('orden/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Orden = $form->save();

      //$this->redirect('orden/edit?id='.$Orden->getId());
      $this->redirect('orden/index');
    }
  }
}
