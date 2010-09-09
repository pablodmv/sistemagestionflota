<?php

/**
 * Tmplineafact form base class.
 *
 * @method Tmplineafact getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTmplineafactForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'factura_id'  => new sfWidgetFormInputHidden(),
      'orden_id'    => new sfWidgetFormInputHidden(),
      'descripcion' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'factura_id'  => new sfValidatorPropelChoice(array('model' => 'Tmpfactura', 'column' => 'id', 'required' => false)),
      'orden_id'    => new sfValidatorPropelChoice(array('model' => 'Orden', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tmplineafact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tmplineafact';
  }


}
