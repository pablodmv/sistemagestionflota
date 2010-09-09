<?php

/**
 * Vehicxorden form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class VehicxordenForm extends BaseVehicxordenForm
{
  public function configure()
  {
      

//      $this->widgetSchema['idVehiculo'] = new sfWidgetFormPropelChoice(array(
//      'choices' => VehicxordenPeer::pene(),
//      'expanded' => true,
//    ));

      $this->widgetSchema['horaDesde']= new sfWidgetFormTime();
      $this->widgetSchema['horahasta']= new sfWidgetFormTime();
      $this->widgetSchema['idOrden']= new sfWidgetFormInputHidden();

      $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'Vehicxorden', 'column' => 'id', 'required' => false)),
      'idOrden'       => new sfValidatorPropelChoice(array('model' => 'Orden', 'column' => 'id')),
      'idVehiculo'    => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id')),
      'horaDesde'     => new sfValidatorTime(array('time_output' => 'H:i'), array('required' => 'Requerido')),
      'horahasta'     => new sfValidatorTime(array('time_output' => 'H:i'),array('required' => 'Requerido')),
          //TODO: Dar vuelta las fechas al guardar
      'cantPasajeros' => new sfValidatorInteger(array('min' => 1, 'max' => 100), array('required' => 'Requerido',
          'min' => 'Debe ser mayor a 1', 'max' => 'Debe ser menor a 100' )),
      'chofer'        => new sfValidatorPropelChoice(array('model' => 'Chofer', 'column' => 'id'),array('required' => 'Requerido')),
    ));

      unset(
       $this['proveedor']
             );

      $this->widgetSchema->setLabels(array(
            'horaDesde'    => 'Hora inicial',
            'horahasta'      => 'Hora Final',
            'cantPasajeros'   => 'Maximo Pasajeros',
          'chofer'   => 'Conductor',
          'idVehiculo'   => 'Vehiculo',
));
  }
       public function setIdOrden($IDORDEN)
   {
       $this->getWidget('idOrden')->setAttribute('value', $IDORDEN);
   }
//
//   public function  doBind(array $values)
//    {
//            $this->validatorSchema['horaDesde']->setOption('required', true);
//            $this->validatorSchema->setPostValidator(
//                new sfValidatorSchemaCompare('horaDesde', '<', 'horaHasta', array('throw_global_error' => true), array('invalid' => 'La fecha de comienzo debe ser menor que la de fin'))
//            );
//
//        return parent::doBind($values);
//    }
}
