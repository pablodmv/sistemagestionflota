<?php

/**
 * tipoGasto actions.
 *
 * @package    SGF
 * @subpackage tipoGasto
 * @author     Your name here
 */
class tipoGastoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->tipoGastos = TipogastoPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->tipoGasto = TipogastoPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->tipoGasto);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new tipoGastoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new tipoGastoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($tipoGasto = TipogastoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object tipoGasto does not exist (%s).', $request->getParameter('id')));
    $this->form = new tipoGastoForm($tipoGasto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($tipoGasto = TipogastoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object tipoGasto does not exist (%s).', $request->getParameter('id')));
    $this->form = new tipoGastoForm($tipoGasto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($tipoGasto = TipogastoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object tipoGasto does not exist (%s).', $request->getParameter('id')));
    $tipoGasto->delete();

    $this->redirect('tipoGasto/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $tipoGasto = $form->save();

      $this->redirect('tipoGasto/edit?id='.$tipoGasto->getId());
    }
  }
}
