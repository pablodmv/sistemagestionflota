<?php

/**
 * Pasajero form base class.
 *
 * @method Pasajero getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BasePasajeroForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'nombre'    => new sfWidgetFormInputText(),
      'direccion' => new sfWidgetFormInputText(),
      'telefono'  => new sfWidgetFormInputText(),
      'mail'      => new sfWidgetFormInputText(),
      'hora'      => new sfWidgetFormDateTime(),
      'zona_id'   => new sfWidgetFormPropelChoice(array('model' => 'Zona', 'add_empty' => false)),
      'vehiculo'  => new sfWidgetFormPropelChoice(array('model' => 'Vehiculo', 'add_empty' => false)),
      'orden'     => new sfWidgetFormPropelChoice(array('model' => 'Orden', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'Pasajero', 'column' => 'id', 'required' => false)),
      'nombre'    => new sfValidatorString(array('max_length' => 100)),
      'direccion' => new sfValidatorString(array('max_length' => 150)),
      'telefono'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'mail'      => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'hora'      => new sfValidatorDateTime(),
      'zona_id'   => new sfValidatorPropelChoice(array('model' => 'Zona', 'column' => 'id')),
      'vehiculo'  => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id')),
      'orden'     => new sfValidatorPropelChoice(array('model' => 'Orden', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('pasajero[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pasajero';
  }


}
