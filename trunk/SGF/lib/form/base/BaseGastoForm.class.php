<?php

/**
 * Gasto form base class.
 *
 * @method Gasto getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseGastoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'tipoGasto'  => new sfWidgetFormPropelChoice(array('model' => 'Tipogasto', 'add_empty' => false)),
      'vehiculo'   => new sfWidgetFormPropelChoice(array('model' => 'Vehiculo', 'add_empty' => false)),
      'fechaGasto' => new sfWidgetFormDate(),
      'importe'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Gasto', 'column' => 'id', 'required' => false)),
      'tipoGasto'  => new sfValidatorPropelChoice(array('model' => 'Tipogasto', 'column' => 'id')),
      'vehiculo'   => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id')),
      'fechaGasto' => new sfValidatorDate(),
      'importe'    => new sfValidatorNumber(),
    ));

    $this->widgetSchema->setNameFormat('gasto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gasto';
  }


}
