<?php

/**
 * Proveedor form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class ProveedorForm extends BaseProveedorForm
{
  public function configure()
  {
      $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Proveedor', 'column' => 'id', 'required' => false)),
      'nombre'     => new sfValidatorString(array('max_length' => 100),array('required' => 'Requerido',
                        'max_length' =>'Debe ser menor a 100 carac.')),
      'razon_soc'  => new sfValidatorString(array('max_length' => 150, 'required' => false), array('max_length' =>'Debe ser menor  a 150 carac.')),
      'rut'        => new sfValidatorString(array('max_length' => 150, 'required' => false), array('max_length' => 'Debe ser menor a 150 carac.')),
      'direccion'  => new sfValidatorString(array('max_length' => 150),array('required' =>'Requerido',
                        'max_length' => 'Debe ser menor a 150 carac.')),
      'telefono'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'celular'    => new sfValidatorString(array('max_length' => 20, 'required' => false), array('max_length' =>'Debe ser menor a 20 digitos.')),
      'mail'       => new sfValidatorEmail(array('required' =>false), array('invalid' => 'Direccion de mail inválida')),
      'es_empresa' => new sfValidatorBoolean(array('required' => false)),
    ));
      $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'Proveedor', 'column' => 'nombre'), array('invalid' => 'Ya existe'))

                );
  }
}
