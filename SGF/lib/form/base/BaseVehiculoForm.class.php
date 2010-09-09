<?php

/**
 * Vehiculo form base class.
 *
 * @method Vehiculo getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseVehiculoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
      'marca'       => new sfWidgetFormInputText(),
      'modelo'      => new sfWidgetFormInputText(),
      'ano'         => new sfWidgetFormInputText(),
      'matricula'   => new sfWidgetFormInputText(),
      'capacidad'   => new sfWidgetFormInputText(),
      'proveedor'   => new sfWidgetFormPropelChoice(array('model' => 'Proveedor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 100)),
      'marca'       => new sfValidatorString(array('max_length' => 100)),
      'modelo'      => new sfValidatorString(array('max_length' => 150)),
      'ano'         => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'matricula'   => new sfValidatorString(array('max_length' => 150)),
      'capacidad'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'proveedor'   => new sfValidatorPropelChoice(array('model' => 'Proveedor', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Vehiculo', 'column' => array('matricula')))
    );

    $this->widgetSchema->setNameFormat('vehiculo[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehiculo';
  }


}
