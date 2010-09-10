<?php

/**
 * vehiczona actions.
 *
 * @package    SGF
 * @subpackage vehiczona
 * @author     Your name here
 */
class vehiczonaActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->vehicxzonas = VehicxzonaPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->vehicxzona = VehicxzonaPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->vehicxzona);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new vehicxzonaForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new vehicxzonaForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($vehicxzona = VehicxzonaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vehicxzona does not exist (%s).', $request->getParameter('id')));
    $this->form = new vehicxzonaForm($vehicxzona);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($vehicxzona = VehicxzonaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vehicxzona does not exist (%s).', $request->getParameter('id')));
    $this->form = new vehicxzonaForm($vehicxzona);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($vehicxzona = VehicxzonaPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vehicxzona does not exist (%s).', $request->getParameter('id')));
    $vehicxzona->delete();

    $this->redirect('vehiczona/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $vehicxzona = $form->save();

      $this->redirect('vehiczona/edit?id='.$vehicxzona->getId());
    }
  }
}
