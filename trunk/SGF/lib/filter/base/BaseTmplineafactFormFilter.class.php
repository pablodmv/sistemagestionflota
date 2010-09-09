<?php

/**
 * Tmplineafact filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTmplineafactFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'descripcion' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tmplineafact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tmplineafact';
  }

  public function getFields()
  {
    return array(
      'factura_id'  => 'ForeignKey',
      'orden_id'    => 'ForeignKey',
      'descripcion' => 'Text',
    );
  }
}
