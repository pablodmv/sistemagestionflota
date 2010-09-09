<?php

/**
 * Pasajero filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BasePasajeroFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'direccion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail'      => new sfWidgetFormFilterInput(),
      'hora'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'zona_id'   => new sfWidgetFormPropelChoice(array('model' => 'Zona', 'add_empty' => true)),
      'vehiculo'  => new sfWidgetFormPropelChoice(array('model' => 'Vehiculo', 'add_empty' => true)),
      'orden'     => new sfWidgetFormPropelChoice(array('model' => 'Orden', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'    => new sfValidatorPass(array('required' => false)),
      'direccion' => new sfValidatorPass(array('required' => false)),
      'telefono'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mail'      => new sfValidatorPass(array('required' => false)),
      'hora'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'zona_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Zona', 'column' => 'id')),
      'vehiculo'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Vehiculo', 'column' => 'id')),
      'orden'     => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Orden', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('pasajero_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pasajero';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'nombre'    => 'Text',
      'direccion' => 'Text',
      'telefono'  => 'Number',
      'mail'      => 'Text',
      'hora'      => 'Date',
      'zona_id'   => 'ForeignKey',
      'vehiculo'  => 'ForeignKey',
      'orden'     => 'ForeignKey',
    );
  }
}
