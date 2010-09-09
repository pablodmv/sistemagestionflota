<?php

/**
 * showfact actions.
 *
 * @package    SGF
 * @subpackage showfact
 * @author     Your name here
 */
class showfactActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->facturas = TmpFacturaPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new facturaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TmpfacturaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($factura = TmpFacturaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object factura does not exist (%s).', $request->getParameter('id')));
    $this->form = new TmpfacturaForm($factura);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($factura = TmpFacturaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object factura does not exist (%s).', $request->getParameter('id')));
    $this->form = new TmpfacturaForm($factura);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($factura = TmpFacturaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object factura does not exist (%s).', $request->getParameter('id')));
    $factura->delete();

    $this->redirect('showfact/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $factura = $form->save();

      $this->redirect('showfact/edit?id='.$factura->getId());
    }
  }
}
