<?php

/**
 * Parametros filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseParametrosFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'numref' => new sfWidgetFormFilterInput(),
      'nombre' => new sfWidgetFormFilterInput(),
      'valor'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'numref' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nombre' => new sfValidatorPass(array('required' => false)),
      'valor'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('parametros_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Parametros';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'numref' => 'Number',
      'nombre' => 'Text',
      'valor'  => 'Text',
    );
  }
}
