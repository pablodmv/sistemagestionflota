<?php

/**
 * Cliente form base class.
 *
 * @method Cliente getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseClienteForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'nombre'     => new sfWidgetFormInputText(),
      'razon_soc'  => new sfWidgetFormInputText(),
      'rut'        => new sfWidgetFormInputText(),
      'direccion'  => new sfWidgetFormInputText(),
      'telefono'   => new sfWidgetFormInputText(),
      'celular'    => new sfWidgetFormInputText(),
      'mail'       => new sfWidgetFormInputText(),
      'es_empresa' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Cliente', 'column' => 'id', 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 100)),
      'razon_soc'  => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'rut'        => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'direccion'  => new sfValidatorString(array('max_length' => 150)),
      'telefono'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'celular'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'mail'       => new sfValidatorString(array('max_length' => 80, 'required' => false)),
      'es_empresa' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Cliente', 'column' => array('nombre'))),
        new sfValidatorPropelUnique(array('model' => 'Cliente', 'column' => array('rut'))),
      ))
    );

    $this->widgetSchema->setNameFormat('cliente[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }


}
