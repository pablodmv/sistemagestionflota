<?php

/**
 * facturar actions.
 *
 * @package    SGF
 * @subpackage facturar
 * @author     Your name here
 */
class cobroActions extends sfActions
{


  public function executeIndex(sfWebRequest $request)
  {
    $c=new Criteria();
     $c->add(FacturaPeer::SUBTOTAL,0,Criteria::EQUAL);
    $this->facturas = FacturaPeer::doSelect($c);



  }

  public function executeShow(sfWebRequest $request)
  {
    $this->facturas = FacturaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->facturas);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new FacturaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new FacturaForm();

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

    $this->forward404Unless($Factura = FacturaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object orden does not exist (%s).', $request->getParameter('id')));
    $Factura->delete();

    $this->redirect('facturar/index');
  }

    public function executeFacturar(sfWebRequest $request)
  {
        

  }
  public function executeBuscar(sfWebRequest $request){
  }


   public function executeGuardar(sfWebRequest $request)
  {
     
  }
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {

      $Factura = $form->save();
      $this->redirect('facturar/edit?id='.$Factura->getId());
    }
  }

  

}
