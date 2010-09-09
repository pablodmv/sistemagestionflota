<?php

/**
 * Vehicxorden form base class.
 *
 * @method Vehicxorden getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseVehicxordenForm extends BaseFormPropel
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
      'chofer'        => new sfWidgetFormPropelChoice(array('model' => 'Chofer', 'add_empty' => true)),
      'proveedor'     => new sfWidgetFormPropelChoice(array('model' => 'Proveedor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'Vehicxorden', 'column' => 'id', 'required' => false)),
      'idOrden'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'idVehiculo'    => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id')),
      'horaDesde'     => new sfValidatorDateTime(),
      'horahasta'     => new sfValidatorDateTime(array('required' => false)),
      'cantPasajeros' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'chofer'        => new sfValidatorPropelChoice(array('model' => 'Chofer', 'column' => 'id', 'required' => false)),
      'proveedor'     => new sfValidatorPropelChoice(array('model' => 'Proveedor', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('vehicxorden[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehicxorden';
  }


}
