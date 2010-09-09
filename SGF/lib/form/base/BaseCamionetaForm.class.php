<?php

/**
 * Camioneta form base class.
 *
 * @method Camioneta getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCamionetaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'marca'     => new sfWidgetFormInputText(),
      'modelo'    => new sfWidgetFormInputText(),
      'ano'       => new sfWidgetFormInputText(),
      'matricula' => new sfWidgetFormInputText(),
      'capacidad' => new sfWidgetFormInputText(),
      'zona_id'   => new sfWidgetFormPropelChoice(array('model' => 'Zona', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'Camioneta', 'column' => 'id', 'required' => false)),
      'marca'     => new sfValidatorString(array('max_length' => 100)),
      'modelo'    => new sfValidatorString(array('max_length' => 150)),
      'ano'       => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'matricula' => new sfValidatorString(array('max_length' => 150)),
      'capacidad' => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'zona_id'   => new sfValidatorPropelChoice(array('model' => 'Zona', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Camioneta', 'column' => array('matricula')))
    );

    $this->widgetSchema->setNameFormat('camioneta[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Camioneta';
  }


}
