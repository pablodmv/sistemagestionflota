<?php
/**
 * facturar actions.
 *
 * @package    SGF
 * @subpackage Error
 * @author     Gustavo Leites
 */

class errorActions extends sfActions
{

     public function executeIndex(sfWebRequest $request)
  {
         $this->idOrden = $request->getParameter('orden');
         

     }

}


?>
