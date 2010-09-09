<?php

/**
 * Moneda filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseMonedaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'numref'     => new sfWidgetFormFilterInput(),
      'moneda'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tipocambio' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'numref'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'moneda'     => new sfValidatorPass(array('required' => false)),
      'tipocambio' => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('moneda_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Moneda';
  }

  public function getFields()
  {
    return array(
      'numref'     => 'Number',
      'moneda'     => 'Text',
      'tipocambio' => 'Number',
      'id'         => 'Number',
    );
  }
}
