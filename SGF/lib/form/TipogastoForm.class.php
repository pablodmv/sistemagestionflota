<?php

/**
 * Tipogasto form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class TipogastoForm extends BaseTipogastoForm
{
  public function configure()
  {
      $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'TipoGasto', 'column' => 'descripcion'), array('invalid' => 'Ya existe'))

                );
  }
}
