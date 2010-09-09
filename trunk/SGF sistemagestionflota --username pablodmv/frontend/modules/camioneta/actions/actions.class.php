<?php

/**
 * camioneta actions.
 *
 * @package    SGF
 * @subpackage camioneta
 * @author     Your name here
 */
class camionetaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Camionetas = CamionetaPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Camioneta = CamionetaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Camioneta);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CamionetaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CamionetaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Camioneta = CamionetaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Camioneta does not exist (%s).', $request->getParameter('id')));
    $this->form = new CamionetaForm($Camioneta);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Camioneta = CamionetaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Camioneta does not exist (%s).', $request->getParameter('id')));
    $this->form = new CamionetaForm($Camioneta);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Camioneta = CamionetaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Camioneta does not exist (%s).', $request->getParameter('id')));
    $Camioneta->delete();

    $this->redirect('camioneta/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Camioneta = $form->save();

      $this->redirect('camioneta/edit?id='.$Camioneta->getId());
    }
  }
}
