<?php

/**
 * remito actions.
 *
 * @package    SGF
 * @subpackage remito
 * @author     Your name here
 */
class remitoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $idorden=$request->getParameter('idOrden');
    if ($idorden){
        //Criteria para selecccionar pasajeros de una orden
     $c=new Criteria();
    $c->add(RemitoPeer::ID_ORDEN, $idorden, Criteria::EQUAL);
    $this->Remitos = RemitoPeer::doSelect($c);
    }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Remito = RemitoPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Remito);
  }

  public function executeNew(sfWebRequest $request)
  {
    $idOrden = $request->getParameter('idOrden');
    if(!empty($idOrden)){
        $objOrden = OrdenPeer::retrieveByPk($idOrden[0]);
        $remito = new Remito();
        $remito->setIdOrden($objOrden->getId());
        $this->Orden = $objOrden->getDescripcion();
        $this->form = new RemitoForm($remito);
        $this->form->setIdOrden($idOrden);
    }else{
        $this->redirect('orden/index');
    }
    
  }

  public function executeCreate(sfWebRequest $request)
  {

    
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    
    $this->form = new RemitoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Remito = RemitoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Remito does not exist (%s).', $request->getParameter('id')));
    $this->form = new RemitoForm($Remito);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Remito = RemitoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Remito does not exist (%s).', $request->getParameter('id')));
    $this->form = new RemitoForm($Remito);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Remito = RemitoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Remito does not exist (%s).', $request->getParameter('id')));
    $Remito->delete();

    $this->redirect('remito/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      
      $Remito = $form->save();

      $this->redirect('orden/index');
    }
  }
}
