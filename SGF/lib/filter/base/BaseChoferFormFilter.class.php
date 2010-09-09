<?php

/**
 * Chofer filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseChoferFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nombre'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'DocID'       => new sfWidgetFormFilterInput(),
      'domicilio'   => new sfWidgetFormFilterInput(),
      'libConducir' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'nombre'      => new sfValidatorPass(array('required' => false)),
      'DocID'       => new sfValidatorPass(array('required' => false)),
      'domicilio'   => new sfValidatorPass(array('required' => false)),
      'libConducir' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('chofer_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Chofer';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'nombre'      => 'Text',
      'DocID'       => 'Text',
      'domicilio'   => 'Text',
      'libConducir' => 'Text',
    );
  }
}
