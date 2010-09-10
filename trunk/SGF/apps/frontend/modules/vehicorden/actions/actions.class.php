<?php

/**
 * vehicorden actions.
 *
 * @package    SGF
 * @subpackage vehicorden
 * @author     Your name here
 */
class vehicordenActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->vehicxordens = VehicxordenPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->vehicxorden = VehicxordenPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->vehicxorden);
  }

  public function executeNew(sfWebRequest $request)
  {
       $idOrden = $request->getParameter('idOrden');
    if(!empty($idOrden)){
        $objOrden = OrdenPeer::retrieveByPk($idOrden[0]);
        $vehicorden = new Vehicxorden();
        $vehicorden->setIdorden($objOrden->getId());
        $this->form = new vehicxordenForm($vehicorden);
        $this->form->setIdOrden($objOrden->getId());
    }else{
        $this->redirect('orden/index');
    }
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new vehicxordenForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($vehicxorden = VehicxordenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vehicxorden does not exist (%s).', $request->getParameter('id')));
    $this->form = new vehicxordenForm($vehicxorden);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($vehicxorden = VehicxordenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vehicxorden does not exist (%s).', $request->getParameter('id')));
    $this->form = new vehicxordenForm($vehicxorden);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($vehicxorden = VehicxordenPeer::retrieveByPk($request->getParameter('id')), sprintf('Object vehicxorden does not exist (%s).', $request->getParameter('id')));
    $vehicxorden->delete();

    $this->redirect('vehicorden/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $vehicxorden = $form->save();

      $this->redirect('vehicorden/edit?id='.$vehicxorden->getId());
    }
  }
}
