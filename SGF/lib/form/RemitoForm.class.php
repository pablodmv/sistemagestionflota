<?php

/**
 * Remito form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class RemitoForm extends BaseRemitoForm
{

 

   
  public function configure()
  {

//      $orden=$this->getObject()->getIdOrden();
//    $c=new Criteria();
//    $c->add(VehiculoPeer::ID,"EXISTS (SELECT IDVEHICULO FROM VEHICXORDEN WHERE VEHICXORDEN.IDORDEN='$orden' AND VEHICXORDEN.IDVEHICULO=VEHICULO.ID)", Criteria::CUSTOM);
//    $this->widgetSchema['idVehiculo']= new sfWidgetFormPropelChoice(array('model' => 'Vehiculo','criteria' => $c));

    $this->widgetSchema['id_orden']= new sfWidgetFormInputHidden();
    
      
    $this->setValidators(array(
      'id'       => new sfValidatorPropelChoice(array('model' => 'Remito', 'column' => 'id', 'required' => false)),
      'id_orden' => new sfValidatorPropelChoice(array('model' => 'Orden', 'column' => 'id')),
      'idVehiculo' => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id')),
      'fecha'    => new sfValidatorDate(),
      'km_ini'    => new sfValidatorNumber(),
      'km_fin'    => new sfValidatorNumber(),
      'horasTrab'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'moneda'   => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id', 'required' => false)),
      'total'    => new sfValidatorNumber(),
      'detalle'  => new sfValidatorString(array('max_length' => 100)),
    ));

    unset(
       $this['fecha'], $this['moneda'],$this['total'], $this['liquidada'], $this['proveedor']
             );

       $this->widgetSchema->setLabels(array(
            'idVehiculo'    => 'Vehiculo',
            'fecha'      => 'Fecha',
            'km_ini'   => 'Km Inicial',
          'km_fin'   => 'Km Final',
          'horasTrab'   => 'Horas totales',
           'horaFin'   => 'Hora Final',
           'moneda'   => 'Moneda',
           'detalle'   => 'Concepto',
));

  }

      public function setIdOrden($IDORDEN)
   {
       $this->getWidget('id_orden')->setAttribute('value', $IDORDEN);
   }




    public function  doBind(array $values)
    {
                $this->validatorSchema['km_ini']->setOption('required', true);
            $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(

                new sfValidatorSchemaCompare('km_ini', '<', 'km_fin', array('throw_global_error' => true), array('invalid' => 'Kilometraje final menor a inicial')) ,
            )));

           

        return parent::doBind($values);
    }


}
