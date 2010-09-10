<?php
/**
 * index actions.
 *
 * @package    SGF
 * @subpackage index
 * @author     Your name here
 */

class indexActions extends sfActions
{

    public function executeIndex()
  {
    $this->mensaje = "Este mensaje se recibe desde el metodo ".$this->action_name." del controller ".$this->controller_name;
    $this->hora = date('Y-m-d');

  }

  
    
}


?>
