<?php

/**
 * Gasto form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class GastoForm extends BaseGastoForm
{
  public function configure()
  {
      $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Gasto', 'column' => 'id', 'required' => false)),
      'tipoGasto'  => new sfValidatorPropelChoice(array('model' => 'Tipogasto', 'column' => 'id')),
      'vehiculo'   => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id')),
      'fechaGasto' => new sfValidatorDate(array(), array('required' =>'Requerido', 'invalid' =>'Fecha inválida')),
      'importe'    => new sfValidatorNumber(array('min' => 0, 'max' => 500000), array('required' => 'Requerido',
          'min' => 'Debe ser mayor a cero', 'max' => 'Debe ser menor a 500000' )),
    ));
  }
}
