<?php

/**
 * Vehicxzona form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class VehicxzonaForm extends BaseVehicxzonaForm
{
  public function configure()
  {
      $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'Vehicxzona', 'column' => 'id', 'required' => false)),
      'idOrden'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647),array('required' => 'Requerido')),
      'idVehiculo'    => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id')),
      'horaDesde'     => new sfValidatorDateTime(array('min' => date('Y-m-d H:i')),array('required' => 'Requerido')),
      'horahasta'     => new sfValidatorDateTime(array('required' => false)),
      'cantPasajeros' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));
  }
}
