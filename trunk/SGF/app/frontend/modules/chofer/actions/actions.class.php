<?php

/**
 * chofer actions.
 *
 * @package    SGF
 * @subpackage chofer
 * @author     Your name here
 */
class choferActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->chofers = ChoferPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->chofer = ChoferPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->chofer);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new choferForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new choferForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($chofer = ChoferPeer::retrieveByPk($request->getParameter('id')), sprintf('Object chofer does not exist (%s).', $request->getParameter('id')));
    $this->form = new choferForm($chofer);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($chofer = ChoferPeer::retrieveByPk($request->getParameter('id')), sprintf('Object chofer does not exist (%s).', $request->getParameter('id')));
    $this->form = new choferForm($chofer);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($chofer = ChoferPeer::retrieveByPk($request->getParameter('id')), sprintf('Object chofer does not exist (%s).', $request->getParameter('id')));
    $chofer->delete();

    $this->redirect('chofer/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $chofer = $form->save();

      $this->redirect('chofer/edit?id='.$chofer->getId());
    }
  }
}
