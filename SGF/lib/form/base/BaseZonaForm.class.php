<?php

/**
 * Zona form base class.
 *
 * @method Zona getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseZonaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'descripcion'  => new sfWidgetFormInputText(),
      'localidad_id' => new sfWidgetFormPropelChoice(array('model' => 'Localidad', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Zona', 'column' => 'id', 'required' => false)),
      'descripcion'  => new sfValidatorString(array('max_length' => 50)),
      'localidad_id' => new sfValidatorPropelChoice(array('model' => 'Localidad', 'column' => 'id')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Zona', 'column' => array('descripcion')))
    );

    $this->widgetSchema->setNameFormat('zona[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zona';
  }


}
