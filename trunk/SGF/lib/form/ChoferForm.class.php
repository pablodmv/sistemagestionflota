<?php

/**
 * Chofer form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class ChoferForm extends BaseChoferForm
{
  public function configure()
  {
      $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Chofer', 'column' => 'id', 'required' => false)),
      'nombre'      => new sfValidatorString(array('max_length' => 100),array('required' => 'Requerido')),
      'DocID'       => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'domicilio'   => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'libConducir' => new sfValidatorString(array('max_length' => 100, 'required' => false)),
    ));
      $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'Chofer', 'column' => 'DocID'), array('invalid' => 'Ya existe'))

                );
  }
}
