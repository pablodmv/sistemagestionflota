<?php

/**
 * Chofer form base class.
 *
 * @method Chofer getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseChoferForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nombre'      => new sfWidgetFormInputText(),
      'DocID'       => new sfWidgetFormInputText(),
      'domicilio'   => new sfWidgetFormInputText(),
      'libConducir' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Chofer', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 100)),
      'DocID'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'domicilio'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'libConducir' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Chofer', 'column' => array('DocID')))
    );

    $this->widgetSchema->setNameFormat('chofer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chofer';
  }


}
