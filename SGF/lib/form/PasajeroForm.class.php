<?php

/**
 * Pasajero form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class PasajeroForm extends BasePasajeroForm
{
  public function configure()
  {
//
//////Muestra el año actual y los dos siguientes
////$range  = range(date('Y'), date('Y')+2);
////$years = array_combine($range,$range);
//////$this->widgetSchema['hora'] = new sfWidgetFormDate(array('years' => $years));
////
// //Muestra la fecha en formato d-m-y
// $years = range(date('Y'), date('Y')+20);
////
// $format = '%day%/%month%/%year%';
//$this->widgetSchema['hora'] = new sfWidgetFormDateTime(
//        new sfWidgetFormDate(array('years' => $years,'format'=>$format))
//
////        array('format' => '%date% %time%','years' => $years)
//        //array('default' => date('d/m/Y HH:mm'))
//
//);

//$format = '%day%/%month%/%year%';
//
//$this->widgetSchema['hora']
//  = new sfWidgetFormDateTime(array('format' => $format));
//
//    $orden=$this->getObject()->getOrden(); //Obtengo el ID Orden
//    $c=new Criteria();
//    $c->add(VehiculoPeer::ID,"EXISTS (SELECT IDVEHICULO FROM VEHICXORDEN WHERE VEHICXORDEN.IDORDEN='$orden' AND VEHICXORDEN.IDVEHICULO=VEHICULO.ID)", Criteria::CUSTOM);
//
//    $this->widgetSchema['vehiculo']= new sfWidgetFormPropelChoice(array('model' => 'Vehiculo','criteria' => $c));
    $this->widgetSchema['hora']= new sfWidgetFormTime();
    $this->widgetSchema['orden']= new sfWidgetFormInputHidden();
     $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'Pasajero', 'column' => 'id', 'required' => false)),
      'nombre'    => new sfValidatorString(array('max_length' => 100), array('required'   => 'Requerido',
                    'max_length' => 'Se permiten hasta 100 carac.',)),

      'direccion' => new sfValidatorString(array('max_length' => 150), array('required' => 'Requerido',
                        'max_length' => 'Se permiten hasta 150 carac.')),
      'hora'      => new sfValidatorTime(array('time_output'=> 'H:i'), array('required' => 'Requerido')),
      'zona_id'   => new sfValidatorPropelChoice(array('model' => 'Zona', 'column' => 'id')),
      'vehiculo'  => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id')),
      'telefono'  => new sfValidatorInteger(array('min' => 0, 'max' => 2147483647)),
      'mail'      => new sfValidatorEmail(array('required' =>false), array('invalid' => 'Direccion de mail inválida')),
      'orden'     => new sfValidatorPropelChoice(array('model' => 'Orden', 'column' => 'id')),
    ));

  }

        public function setIdOrden($IDORDEN)
   {
       $this->getWidget('orden')->setAttribute('value', $IDORDEN);
   }

}
