<?php

/**
 * Tipogasto form base class.
 *
 * @method Tipogasto getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTipogastoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Tipogasto', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 50)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Tipogasto', 'column' => array('descripcion')))
    );

    $this->widgetSchema->setNameFormat('tipogasto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tipogasto';
  }


}
