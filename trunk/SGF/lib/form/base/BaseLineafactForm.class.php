<?php

/**
 * Lineafact form base class.
 *
 * @method Lineafact getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseLineafactForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'factura_id'  => new sfWidgetFormInputHidden(),
      'orden_id'    => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'factura_id'  => new sfValidatorPropelChoice(array('model' => 'Factura', 'column' => 'id', 'required' => false)),
      'orden_id'    => new sfValidatorPropelChoice(array('model' => 'Orden', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('lineafact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lineafact';
  }


}
