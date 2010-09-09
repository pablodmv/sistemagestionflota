<?php

/**
 * Orden form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class OrdenForm extends BaseOrdenForm
{
  public function configure()
  {
      

       unset(
      $this['facturada'], $this['lineafact_list'], $this['tmplineafact_list'],
               $this['importe'], $this['kilometros'], $this['moneda'], $this['facturada'], $this['liquidada'],
               $this['horas']

               
    );

       $this->widgetSchema['descripcion']= new sfWidgetFormInputText();
       $this->widgetSchema['cliente']= new sfWidgetFormInputHidden();
       
    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Orden', 'column' => 'id', 'required' => false)),
      'cliente'        => new sfValidatorPropelChoice(array('model' => 'Cliente', 'column' => 'id')),
      'descripcion'    => new sfValidatorString(array('max_length' => 200), array('required' => 'Requerido',
                            'max_length' => 'Debe ser menor a 200 carac.')),
       'fecha_desde'       => new sfValidatorDate(array('min' => date('Y-m-d')),array('required' => 'Requerido','min' => 'Fecha menor a '.date('d/m/Y'),'invalid' => "Fecha Invalida")),
      'fecha_hasta'       => new sfValidatorDate(array('min' => date('Y-m-d ')),array('required' => 'Requerido','min' => 'Fecha menor a '.date('d/m/Y'),'invalid' => "Fecha Invalida")),
      'proveedor'      => new sfValidatorPropelChoice(array('model' => 'Proveedor', 'column' => 'id', 'required' => false)),
      'vehiculo'       => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id', 'required' => false)),
      'contacto'       => new sfValidatorString(array('max_length' => 100), array('required' => 'Requerido',
                            'max_length' =>'Debe ser menor a 100 carac.')),
      'tel_contacto'   => new sfValidatorInteger(array('min' => 0, 'max' => 2147483647), array('required' => 'Requerido')),
      'horas'       => new sfValidatorTime(array('required' => false)),
      'kilometros'       => new sfValidatorTime(array('required' => false)),
      'importe'        => new sfValidatorNumber(array('required' => false)),
      'moneda'         => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id', 'required' => false)),
      'facturada'      => new sfValidatorBoolean(array('required' => false)),
      'lineafact_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Factura', 'required' => false)),
    ));




  //  $this->mergeForm(new VehicxordenForm());
    //$this->embedForm('Vehiculo Por Orden', new VehicxordenForm());
  }
  public function  doBind(array $values)
    {
            $this->validatorSchema['fecha_desde']->setOption('required', true);
            $this->validatorSchema->setPostValidator(
                new sfValidatorSchemaCompare('fecha_desde', '<=', 'fecha_hasta', array('throw_global_error' => true), array('invalid' => 'La fecha de comienzo debe ser menor que la de fin'))
            );
            $this->validatorSchema->setPostValidator(
                new sfValidatorPropelUnique(array('model' => 'Orden', 'column' => 'descripcion'), array('invalid' => 'Ya existe'))
                );

        return parent::doBind($values);
    }

  public function setIdCliente($IDCliente)
   {
       $this->getWidget('cliente')->setAttribute('value', $IDCliente);
   }

}
