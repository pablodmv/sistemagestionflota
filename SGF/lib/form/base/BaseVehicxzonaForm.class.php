<?php

/**
 * Vehicxzona form base class.
 *
 * @method Vehicxzona getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseVehicxzonaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'idOrden'       => new sfWidgetFormInputText(),
      'idVehiculo'    => new sfWidgetFormPropelChoice(array('model' => 'Vehiculo', 'add_empty' => false)),
      'horaDesde'     => new sfWidgetFormDateTime(),
      'horahasta'     => new sfWidgetFormDateTime(),
      'cantPasajeros' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'Vehicxzona', 'column' => 'id', 'required' => false)),
      'idOrden'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'idVehiculo'    => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id')),
      'horaDesde'     => new sfValidatorDateTime(),
      'horahasta'     => new sfValidatorDateTime(array('required' => false)),
      'cantPasajeros' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vehicxzona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehicxzona';
  }


}
