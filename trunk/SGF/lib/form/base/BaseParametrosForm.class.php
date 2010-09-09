<?php

/**
 * Parametros form base class.
 *
 * @method Parametros getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseParametrosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'numref' => new sfWidgetFormInputText(),
      'nombre' => new sfWidgetFormInputText(),
      'valor'  => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorPropelChoice(array('model' => 'Parametros', 'column' => 'id', 'required' => false)),
      'numref' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'nombre' => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'valor'  => new sfValidatorString(array('max_length' => 40, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Parametros', 'column' => array('nombre')))
    );

    $this->widgetSchema->setNameFormat('parametros[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parametros';
  }


}
