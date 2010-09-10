<?php

/**
 * gasto actions.
 *
 * @package    SGF
 * @subpackage gasto
 * @author     Your name here
 */
class gastoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->gastos = GastoPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->gasto = GastoPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->gasto);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new gastoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new gastoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($gasto = GastoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object gasto does not exist (%s).', $request->getParameter('id')));
    $this->form = new gastoForm($gasto);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($gasto = GastoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object gasto does not exist (%s).', $request->getParameter('id')));
    $this->form = new gastoForm($gasto);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($gasto = GastoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object gasto does not exist (%s).', $request->getParameter('id')));
    $gasto->delete();

    $this->redirect('gasto/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $gasto = $form->save();

      $this->redirect('gasto/edit?id='.$gasto->getId());
    }
  }
}
