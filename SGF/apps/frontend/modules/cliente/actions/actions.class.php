<?php

/**
 * cliente actions.
 *
 * @package    SGF
 * @subpackage cliente
 * @author     Your name here
 */
class clienteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->clientes = ClientePeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
       $this->form = new ClienteForm();

  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new clienteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($cliente = ClientePeer::retrieveByPk($request->getParameter('id')), sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    $this->form = new clienteForm($cliente);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($cliente = ClientePeer::retrieveByPk($request->getParameter('id')), sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    $this->form = new clienteForm($cliente);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($cliente = ClientePeer::retrieveByPk($request->getParameter('id')), sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    $cliente->delete();

    $this->redirect('cliente/index');
  }


    public function executeSearch(sfWebRequest $request)
  {
    $query = $request->getParameter('query');
    if($query != null){
        $this->forwardUnless($query, 'cliente', 'index');
        $this->cliente = ClientePeer::getForLuceneQuery($query);
    }else{
        $this->cliente = null;
    }

  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cliente = $form->save();

      $this->redirect('consulta/orden');
    }
  }
}
