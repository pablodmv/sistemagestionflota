<?php

/**
 * Localidad form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class LocalidadForm extends BaseLocalidadForm
{
  public function configure()
  {
      $this->setValidators(array(
      'id'               => new sfValidatorPropelChoice(array('model' => 'Localidad', 'column' => 'id', 'required' => false)),
      'nombre'           => new sfValidatorString(array('max_length' => 50),array('required' => 'Requerido')),
      'distancia'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'capital'          => new sfValidatorBoolean(array('required' => false)),
      'ciudadReferencia' => new sfValidatorBoolean(array('required' => false)),
    ));
      $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'Localidad', 'column' => 'nombre'), array('invalid' => 'Ya existe'))

                );
  }
}
