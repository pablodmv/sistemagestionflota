<?php

/**
 * SgfPasajero filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseSgfPasajeroFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'    => new sfWidgetFormFilterInput(),
      'direccion' => new sfWidgetFormFilterInput(),
      'hora'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'zona_id'   => new sfWidgetFormPropelChoice(array('model' => 'Zona', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nombre'    => new sfValidatorPass(array('required' => false)),
      'direccion' => new sfValidatorPass(array('required' => false)),
      'hora'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'zona_id'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Zona', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('sgf_pasajero_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'SgfPasajero';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'nombre'    => 'Text',
      'direccion' => 'Text',
      'hora'      => 'Date',
      'zona_id'   => 'ForeignKey',
    );
  }
}
