<?php

/**
 * Cliente filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseClienteFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'razon_soc'  => new sfWidgetFormFilterInput(),
      'rut'        => new sfWidgetFormFilterInput(),
      'direccion'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'telefono'   => new sfWidgetFormFilterInput(),
      'celular'    => new sfWidgetFormFilterInput(),
      'mail'       => new sfWidgetFormFilterInput(),
      'es_empresa' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'nombre'     => new sfValidatorPass(array('required' => false)),
      'razon_soc'  => new sfValidatorPass(array('required' => false)),
      'rut'        => new sfValidatorPass(array('required' => false)),
      'direccion'  => new sfValidatorPass(array('required' => false)),
      'telefono'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'celular'    => new sfValidatorPass(array('required' => false)),
      'mail'       => new sfValidatorPass(array('required' => false)),
      'es_empresa' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('cliente_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Cliente';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'nombre'     => 'Text',
      'razon_soc'  => 'Text',
      'rut'        => 'Text',
      'direccion'  => 'Text',
      'telefono'   => 'Number',
      'celular'    => 'Text',
      'mail'       => 'Text',
      'es_empresa' => 'Boolean',
    );
  }
}
