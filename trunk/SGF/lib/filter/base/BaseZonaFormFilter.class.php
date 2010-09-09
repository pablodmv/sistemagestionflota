<?php

/**
 * Zona filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseZonaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'descripcion'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'localidad_id' => new sfWidgetFormPropelChoice(array('model' => 'Localidad', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'descripcion'  => new sfValidatorPass(array('required' => false)),
      'localidad_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Localidad', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('zona_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zona';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'descripcion'  => 'Text',
      'localidad_id' => 'ForeignKey',
    );
  }
}
