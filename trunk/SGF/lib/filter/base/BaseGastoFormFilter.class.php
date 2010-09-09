<?php

/**
 * Gasto filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseGastoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tipoGasto'  => new sfWidgetFormPropelChoice(array('model' => 'Tipogasto', 'add_empty' => true)),
      'vehiculo'   => new sfWidgetFormPropelChoice(array('model' => 'Vehiculo', 'add_empty' => true)),
      'fechaGasto' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'importe'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'tipoGasto'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Tipogasto', 'column' => 'id')),
      'vehiculo'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Vehiculo', 'column' => 'id')),
      'fechaGasto' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'importe'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('gasto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gasto';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'tipoGasto'  => 'ForeignKey',
      'vehiculo'   => 'ForeignKey',
      'fechaGasto' => 'Date',
      'importe'    => 'Number',
    );
  }
}
