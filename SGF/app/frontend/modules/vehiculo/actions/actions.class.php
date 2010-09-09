<?php

/**
 * vehiculo actions.
 *
 * @package    SGF
 * @subpackage vehiculo
 * @author     Your name here
 */
class vehiculoActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->vehiculos = VehiculoPeer::doSelect(new Criteria());
   //    $this->vehiculos = VehiculoPeer::getVehicDisponible();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new vehiculoForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new vehiculoForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($vehiculo = VehiculoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vehiculo does not exist (%s).', $request->getParameter('id')));
    $this->form = new vehiculoForm($vehiculo);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($vehiculo = VehiculoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vehiculo does not exist (%s).', $request->getParameter('id')));
    $this->form = new vehiculoForm($vehiculo);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($vehiculo = VehiculoPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vehiculo does not exist (%s).', $request->getParameter('id')));
    $vehiculo->delete();

    $this->redirect('vehiculo/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $vehiculo = $form->save();

      $this->redirect('vehiculo/index');
    }
  }
}
