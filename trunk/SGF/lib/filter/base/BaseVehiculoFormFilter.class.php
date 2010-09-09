<?php

/**
 * Vehiculo filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseVehiculoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'marca'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'modelo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ano'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'matricula'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'capacidad'   => new sfWidgetFormFilterInput(),
      'proveedor'   => new sfWidgetFormPropelChoice(array('model' => 'Proveedor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'descripcion' => new sfValidatorPass(array('required' => false)),
      'marca'       => new sfValidatorPass(array('required' => false)),
      'modelo'      => new sfValidatorPass(array('required' => false)),
      'ano'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'matricula'   => new sfValidatorPass(array('required' => false)),
      'capacidad'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'proveedor'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Proveedor', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('vehiculo_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Vehiculo';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'descripcion' => 'Text',
      'marca'       => 'Text',
      'modelo'      => 'Text',
      'ano'         => 'Number',
      'matricula'   => 'Text',
      'capacidad'   => 'Number',
      'proveedor'   => 'ForeignKey',
    );
  }
}
