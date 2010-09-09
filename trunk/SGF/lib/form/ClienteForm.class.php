<?php

/**
 * Cliente form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class ClienteForm extends BaseClienteForm
{
  public function configure()
  {
        $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Cliente', 'column' => 'id', 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 100)),
      'razon_soc'  => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'rut'        => new sfValidatorString(array('max_length' => 150, 'required' => false)),
      'direccion'  => new sfValidatorString(array('max_length' => 150)),
      'telefono'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'celular'    => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'mail'       => new sfValidatorEmail(array('required' =>false), array('invalid' => 'Direccion de mail inválida')),
      'es_empresa' => new sfValidatorBoolean(array('required' => false)),
    ));
        $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'Cliente', 'column' => 'nombre'), array('invalid' => 'Ya existe'))
                
                );
  }
}
