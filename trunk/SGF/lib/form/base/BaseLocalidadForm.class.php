<?php

/**
 * Localidad form base class.
 *
 * @method Localidad getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLocalidadForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nombre'           => new sfWidgetFormInputText(),
      'distancia'        => new sfWidgetFormInputText(),
      'capital'          => new sfWidgetFormInputCheckbox(),
      'ciudadReferencia' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Localidad', 'column' => 'id', 'required' => false)),
      'nombre'           => new sfValidatorString(array('max_length' => 50)),
      'distancia'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'capital'          => new sfValidatorBoolean(array('required' => false)),
      'ciudadReferencia' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Localidad', 'column' => array('nombre')))
    );

    $this->widgetSchema->setNameFormat('localidad[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Localidad';
  }


}
