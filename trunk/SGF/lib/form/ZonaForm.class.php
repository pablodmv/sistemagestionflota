<?php

/**
 * Zona form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class ZonaForm extends BaseZonaForm
{
  public function configure()
  {
      $this->setValidators(array(
      'id'           => new sfValidatorPropelChoice(array('model' => 'Zona', 'column' => 'id', 'required' => false)),
      'descripcion'  => new sfValidatorString(array('max_length' => 50),array('required' => 'Requerido')),
      'localidad_id' => new sfValidatorPropelChoice(array('model' => 'Localidad', 'column' => 'id')),
    ));
      $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'Zona', 'column' => 'descripcion'), array('invalid' => 'Ya existe'))

                );
  }
}
