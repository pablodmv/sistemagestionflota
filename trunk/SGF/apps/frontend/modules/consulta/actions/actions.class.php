<?php
class consultaActions extends sfActions
{

    public function executePasajero()
  {
    $this->form = new ConsultaPasajeroForm();

  }

  public function executeOrden(){
      $this->form = new ConsultaOrdenForm();

  }

  public function executeSearch(sfWebRequest $request)
  {
    $query = $request->getParameter('query');
    if($query != null){
        $this->forwardUnless($query, 'consulta', 'index');
        $this->cliente = ClientePeer::getForLuceneQuery($query);
    }else{
        $this->cliente = null;
    }    
  }


    public function executeSearchPasajero(sfWebRequest $request)
  {
    $query = $request->getParameter('query');
    if($query != null){
        $this->forwardUnless($query, 'consulta', 'index');
        $this->pasajeros = PasajeroPeer::getForLuceneQuery($query);
    }else{
        $this->pasajeros = null;
    }  }

  public function executeSubmit(){
      
  }
}
