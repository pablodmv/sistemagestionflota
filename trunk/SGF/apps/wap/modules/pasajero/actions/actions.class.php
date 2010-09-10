<?php
sfContext::getInstance()->getConfiguration()->loadHelpers('Date');
/**
 * pasajero actions.
 *
 * @package    SGF
 * @subpackage pasajero
 * @author     Your name here
 */
function __autoload($class){
    $ruta= "/apps/frontend/lib/";
    require_once $ruta.$class.".class.php";
}

class pasajeroActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->Pasajeros = PasajeroPeer::doSelect(new Criteria());
     $idorden=$request->getParameter('orden');
    if ($idorden){
        //Criteria para selecccionar pasajeros de una orden
     $c=new Criteria();
    $c->addJoin(PasajeroPeer::ORDEN, OrdenPeer::ID, Criteria::JOIN);
    $c->add(OrdenPeer::ID,$idorden,Criteria::EQUAL);
    $c->add(PasajeroPeer::ORDEN,"ORDEN.FECHA_HASTA>=CURRENT_DATE", Criteria::CUSTOM);

    $this->Pasajeros = PasajeroPeer::doSelect($c);
    $this->idOrden = $idorden ;
    }else{
    $c= new Criteria();
   // $c->add(OrdenPeer::ID,"NOT EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
    $this->Pasajeros = PasajeroPeer::doSelect($c);
  }}

  public function executeShow(sfWebRequest $request)
  {
    $this->Pasajero = PasajeroPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Pasajero);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PasajeroForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PasajeroForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Pasajero = PasajeroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Pasajero does not exist (%s).', $request->getParameter('id')));
    $this->form = new PasajeroForm($Pasajero);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Pasajero = PasajeroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Pasajero does not exist (%s).', $request->getParameter('id')));
    $this->form = new PasajeroForm($Pasajero);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Pasajero = PasajeroPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Pasajero does not exist (%s).', $request->getParameter('id')));
    $Pasajero->delete();

    $this->redirect('pasajero/index');
  }

  public function executeMap(sfWebRequest $request){

      $this->direccion = $request->getParameter('dir');

      $gm2 = new DrawingMap();
      $gm2->SetAddress($this->direccion.",Uruguay");
      $gm2->ObtenerCoordenadas();

      $this->gMap = new GMap();
      $this->gMap->setWidth(400);
      $this->gMap->setHeight(320);
      $this->gMap->setZoom(16);
      foreach($gm2->GetPlacemark() as $placemark){

        $this->gMap->setCenter($placemark->getLatitude(),$placemark->getLongitude());
        // Agregar las Marcas
        $this->gMap->addMarker(
            new GMapMarker($placemark->getLatitude(),$placemark->getLongitude())
        );
      }
      // END OF ACTION
      $this->generated_js = $this->gMap->getJavascript();
  }

  public function executeImprimir(){
    
    $config = sfTCPDFPluginConfigHandler::loadConfig();
    sfTCPDFPluginConfigHandler::includeLangFile($this->getUser()->getCulture());

    $doc_title    = "test title";
    $doc_subject  = "test description";
    $doc_keywords = "test keywords";

    //Genero la tabla via html
    $htmlcontent = "";
    //Primero me traigo la lista de pasajeros, a futuro nos traeriamos los pasajeros habilitados.
    $this->Pasajeros = PasajeroPeer::doSelect(new Criteria());

    $htmlcontent .="<table border=\"1\" cellspacing=\"1\" cellpadding=\"1\" style=\"width: 2390px\">";
    $htmlcontent .="<thead>";
    $htmlcontent .="<tr>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 100px\">Id</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 350px\">Nombre</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center\">Direccion</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center\">Hora</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 250px\">Zona</th>";
    $htmlcontent .="<th style=\"font-weight: bold;text-align: center;width: 550px\">Vehiculo</th>";
    $htmlcontent .="</tr>";
    $htmlcontent .="</thead>";
    $htmlcontent .="<tbody>";
    //Recorro la lista y genero el html
    foreach($this->Pasajeros as $pasajero){
        $htmlcontent .= "<tr>";
        $htmlcontent .= "<td style=\"width: 100px; text-align: center\">".$pasajero->getId()."</td>";
        $htmlcontent .= "<td style=\"width: 350px; text-align: center\">".$pasajero->getNombre()."</td>";
        $htmlcontent .= "<td style=\"text-align: center\">".$pasajero->getDireccion()."</td>";
        $fecha= $pasajero->getHora();
        $htmlcontent .= "<td style=\"text-align: center\">".format_datetime($fecha, 'r', 'es_ES')."</td>";
        $htmlcontent .= "<td style=\"width: 250px; text-align: center\">".$pasajero->getNombreZona()."</td>";
        $htmlcontent .= "<td style=\"width: 550px; text-align: center\">".$pasajero->getNombreVehiculo()."</td>";
        $htmlcontent .= "</tr>";
    }
    $htmlcontent .="</tbody>";
    $htmlcontent .="</table>";
    //$htmlcontent  .= "<h1>".$pasajero->getId()."</h1><h2>heading 2</h2><h3>heading 3</h3><h4>heading 4</h4><h5>heading 5</h5><h6>heading 6</h6>ordered list:<br /><ol><li><b>bold text</b></li><li><i>italic text</i></li><li><u>underlined text</u></li><li><a href=\"http://www.tecnick.com\">link to http://www.tecnick.com</a></li><li>test break<br />second line<br />third line</li><li><font size=\"+3\">font + 3</font></li><li><small>small text</small></li><li>normal <sub>subscript</sub> <sup>superscript</sup></li></ul><hr />table:<br /><table border=\"1\" cellspacing=\"1\" cellpadding=\"1\"><tr><th>#</th><th>A</th><th>B</th></tr><tr><th>1</th><td bgcolor=\"#cccccc\">A1</td><td>B1</td></tr><tr><th>2</th><td>A2 â‚¬ &euro; &#8364; &amp; Ã¨ &egrave; </td><td>B2</td></tr><tr><th>3</th><td>A3</td><td><font color=\"#FF0000\">B3</font></td></tr></table><hr />image:<br /><img src=\"sfTCPDFPlugin/images/logo_example.png\" alt=\"test alt attribute\" width=\"100\" height=\"100\" border=\"0\" />";

    //create new PDF document (document units are set by default to millimeters)
    $pdf = new sfTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor(PDF_AUTHOR);
    $pdf->SetTitle($doc_title);
    $pdf->SetSubject($doc_subject);
    $pdf->SetKeywords($doc_keywords);

    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING."Lista de Pasajeros");

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


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Pasajero = $form->save();
      $this->redirect('pasajero/index');
   //   $this->redirect('pasajero/edit?id='.$Pasajero->getId());
    }
  }

  
}
