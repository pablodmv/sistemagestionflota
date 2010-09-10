<?php

/**
 * tarifa actions.
 *
 * @package    SGF
 * @subpackage tarifa
 * @author     Your name here
 */
class tarifaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Tarifas = TarifaPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Tarifa = TarifaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Tarifa);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TarifaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TarifaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Tarifa = TarifaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Tarifa does not exist (%s).', $request->getParameter('id')));
    $this->form = new TarifaForm($Tarifa);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Tarifa = TarifaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Tarifa does not exist (%s).', $request->getParameter('id')));
    $this->form = new TarifaForm($Tarifa);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Tarifa = TarifaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Tarifa does not exist (%s).', $request->getParameter('id')));
    $Tarifa->delete();

    $this->redirect('tarifa/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Tarifa = $form->save();

      $this->redirect('tarifa/edit?id='.$Tarifa->getId());
    }
  }
}
