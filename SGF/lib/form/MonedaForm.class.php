<?php

/**
 * Moneda form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class MonedaForm extends BaseMonedaForm
{
  public function configure()
  {
      $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'Moneda', 'column' => 'moneda'), array('invalid' => 'Ya existe'))

                );
  }
}
