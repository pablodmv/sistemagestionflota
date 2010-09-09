<?php

/**
 * Remito filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseRemitoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_orden'   => new sfWidgetFormPropelChoice(array('model' => 'Orden', 'add_empty' => true)),
      'idVehiculo' => new sfWidgetFormPropelChoice(array('model' => 'Vehiculo', 'add_empty' => true)),
      'fecha'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'horasTrab'  => new sfWidgetFormFilterInput(),
      'km_ini'     => new sfWidgetFormFilterInput(),
      'km_fin'     => new sfWidgetFormFilterInput(),
      'moneda'     => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
      'total'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'detalle'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'liquidada'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'proveedor'  => new sfWidgetFormPropelChoice(array('model' => 'Proveedor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_orden'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Orden', 'column' => 'id')),
      'idVehiculo' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Vehiculo', 'column' => 'id')),
      'fecha'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'horasTrab'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'km_ini'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'km_fin'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'moneda'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Moneda', 'column' => 'id')),
      'total'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'detalle'    => new sfValidatorPass(array('required' => false)),
      'liquidada'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'proveedor'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Proveedor', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('remito_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Remito';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'id_orden'   => 'ForeignKey',
      'idVehiculo' => 'ForeignKey',
      'fecha'      => 'Date',
      'horasTrab'  => 'Number',
      'km_ini'     => 'Number',
      'km_fin'     => 'Number',
      'moneda'     => 'ForeignKey',
      'total'      => 'Number',
      'detalle'    => 'Text',
      'liquidada'  => 'Boolean',
      'proveedor'  => 'ForeignKey',
    );
  }
}
