<?php

/**
 * Vehicxorden filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseVehicxordenFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'idOrden'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'idVehiculo'    => new sfWidgetFormPropelChoice(array('model' => 'Vehiculo', 'add_empty' => true)),
      'horaDesde'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'horahasta'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'cantPasajeros' => new sfWidgetFormFilterInput(),
      'chofer'        => new sfWidgetFormPropelChoice(array('model' => 'Chofer', 'add_empty' => true)),
      'proveedor'     => new sfWidgetFormPropelChoice(array('model' => 'Proveedor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'idOrden'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'idVehiculo'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Vehiculo', 'column' => 'id')),
      'horaDesde'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'horahasta'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'cantPasajeros' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'chofer'        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Chofer', 'column' => 'id')),
      'proveedor'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Proveedor', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('vehicxorden_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehicxorden';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'idOrden'       => 'Number',
      'idVehiculo'    => 'ForeignKey',
      'horaDesde'     => 'Date',
      'horahasta'     => 'Date',
      'cantPasajeros' => 'Number',
      'chofer'        => 'ForeignKey',
      'proveedor'     => 'ForeignKey',
    );
  }
}
