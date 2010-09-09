<?php

/**
 * Vehiculo form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Gustavo Leites
 */
class VehiculoForm extends BaseVehiculoForm
{
  public function configure()
  {

      $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id', 'required' => false)),
      'descripcion' => new sfValidatorString(array('max_length' => 100), array('required'   => 'Requerido',
                        'max_length' => 'Se permiten hasta 100 carac.',)),
      'marca'       => new sfValidatorString(array('max_length' => 100), array('required'   => 'Requerido',
                        'max_length' => 'Se permiten hasta 100 carac.',)),
      'modelo'      => new sfValidatorString(array('max_length' => 150),array('required' => 'Requerido',
                        'max_length' => 'Se permiten hasta 150 carac.')),

      'ano'         => new sfValidatorInteger(array('min' => 1900, 'max' => date('Y')),array('required' => 'Requerido',
                        'min' => 'El año debe ser mayor a 1900', 'max' =>'El año debe ser menor a '.date('Y'))),
      'matricula'   => new sfValidatorString(array('max_length' => 150),array('required' => 'Requerido',
                        'max_length' => 'Se permiten hasta 150 carac.')),
      'capacidad'   => new sfValidatorInteger(array('min' => 0, 'max' => 50), array('required' => 'Requerido',
                        'min' =>'La cap. debe ser mayor a cero','max' => 'La cap. debe ser menor a 50','invalid' => 'Ingresar solo numero')),
      'proveedor'   => new sfValidatorPropelChoice(array('model' => 'Proveedor', 'column' => 'id', 'required' => false)),
    ));
      $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'Vehiculo', 'column' => 'matricula'), array('invalid' => 'Ya existe'))

                );
  }
}
