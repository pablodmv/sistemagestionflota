<?php

/**
 * Parametros form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class ParametrosForm extends BaseParametrosForm
{
  public function configure()
  {
      $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'Parametros', 'column' => 'nombre'), array('invalid' => 'Ya existe'))

                );
  }
}
