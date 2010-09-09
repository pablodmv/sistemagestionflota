<?php

/**
 * Tarifa form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class TarifaForm extends BaseTarifaForm
{
  public function configure()
  {

      $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Tarifa', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 50),array('required' => 'Requerido',
                                            'max_length' =>'Se permiten hasta 50 carac.')),
      'valor'       => new sfValidatorNumber(array('max' => 100000,'min'=>1),array('required' => 'Requerido',
          'min'=>'Debe ser positivo', 'max' => 'Debe ser menor a 100000')),
    ));
      $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'Tarifa', 'column' => 'descripcion'), array('invalid' => 'Ya existe'))

                );
  }
}
