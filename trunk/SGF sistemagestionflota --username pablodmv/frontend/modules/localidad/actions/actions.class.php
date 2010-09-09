<?php

/**
 * localidad actions.
 *
 * @package    SGF
 * @subpackage localidad
 * @author     Your name here
 */
class localidadActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->Localidads = LocalidadPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->Localidad = LocalidadPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->Localidad);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new LocalidadForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new LocalidadForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($Localidad = LocalidadPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Localidad does not exist (%s).', $request->getParameter('id')));
    $this->form = new LocalidadForm($Localidad);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($Localidad = LocalidadPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Localidad does not exist (%s).', $request->getParameter('id')));
    $this->form = new LocalidadForm($Localidad);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($Localidad = LocalidadPeer::retrieveByPk($request->getParameter('id')), sprintf('Object Localidad does not exist (%s).', $request->getParameter('id')));
    $Localidad->delete();

    $this->redirect('localidad/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $Localidad = $form->save();

      $this->redirect('localidad/edit?id='.$Localidad->getId());
    }
  }
}
