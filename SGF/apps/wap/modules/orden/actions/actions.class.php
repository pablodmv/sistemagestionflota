<?php

/**
 * orden actions.
 *
 * @package    SGF
 * @subpackage orden
 * @author     Your name here
 */
class ordenActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    //$this->Ordens = OrdenPeer::doSelect(new Criteria());
    $cliente=$request->getParameter('cliente');
    if ($cliente){
        $c=new Criteria();
    $c=new Criteria();
     $c->add(OrdenPeer::CLIENTE,$cliente,Criteria::EQUAL);
     $c->addAnd(OrdenPeer::FECHA_DESDE, date('Y-m-d'),Criteria::LESS_EQUAL);
     $c->addAnd(OrdenPeer::FECHA_HASTA, date('Y-m-d'),Criteria::GREATER_EQUAL);
    $c->add(OrdenPeer::ID,"NOT EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
    $this->Ordens = OrdenPeer::doSelect($c);

    }else{
    $c= new Criteria();
     $c->addAnd(OrdenPeer::FECHA_DESDE, date('Y-m-d'),Criteria::LESS_EQUAL);
     $c->addAnd(OrdenPeer::FECHA_HASTA, date('Y-m-d'),Criteria::GREATER_EQUAL);
    $c->add(OrdenPeer::ID,"NOT EXISTS (SELECT ORDEN_ID FROM LINEAFACT WHERE LINEAFACT.ORDEN_ID=ORDEN.ID)", Criteria::CUSTOM);
    $this->Ordens = OrdenPeer::doSelect($c);
  }}

  public function executeShow(sfWebRequest $request)
  {
    $this->Orden = OrdenPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Orden);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new OrdenForm();
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
    $this->forward404Unless($Orden = OrdenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Orden does not exist (%s).', $request->getParameter('id')));
    $this->form = new OrdenForm($Orden);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Orden = OrdenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Orden does not exist (%s).', $request->getParameter('id')));
    $this->form = new OrdenForm($Orden);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Orden = OrdenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Orden does not exist (%s).', $request->getParameter('id')));
    $Orden->delete();

    $this->redirect('orden/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Orden = $form->save();

      $this->redirect('orden/edit?id='.$Orden->getId());
    }
  }
}
