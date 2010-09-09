<?php

/**
 * Camioneta filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCamionetaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'marca'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'modelo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ano'       => new sfWidgetFormFilterInput(),
      'matricula' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'capacidad' => new sfWidgetFormFilterInput(),
      'zona_id'   => new sfWidgetFormPropelChoice(array('model' => 'Zona', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'marca'     => new sfValidatorPass(array('required' => false)),
      'modelo'    => new sfValidatorPass(array('required' => false)),
      'ano'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'matricula' => new sfValidatorPass(array('required' => false)),
      'capacidad' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'zona_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Zona', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('camioneta_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Camioneta';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'marca'     => 'Text',
      'modelo'    => 'Text',
      'ano'       => 'Number',
      'matricula' => 'Text',
      'capacidad' => 'Number',
      'zona_id'   => 'ForeignKey',
    );
  }
}
