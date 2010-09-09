<?php


/**
 * Skeleton subclass for representing a row from the 'remito' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 06/28/10 22:59:52
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Remito extends BaseRemito {


    public function save(PropelPDO $con = null)
  {

    //ACtualizo los totales por orden.
        $vehiculo=VehiculoPeer::retrieveByPK($this->getIdvehiculo());
      $this->setProveedor($vehiculo->getProveedor())  ;
      $this->setFecha(date('Y-m-d'));
     $orden=OrdenPeer::retrieveByPK($this->getIdOrden());
     $km=$this->getKmFin() - $this->getKmIni();
     $kmOrden=$orden->getKilometros();
     $horOrden=$orden->getHoras();
     $orden->setKilometros($kmOrden + $km);
     $orden->setHoras($horOrden + $this->getHorasTrab());
     $orden->setLiquidada(true);
     $orden->save();


 

    return parent::save($con);
  }


  public function getCliente(){
      return OrdenPeer::retrieveByPK($this->getIdOrden())->getNombreCliente();
  }

  public function getKilometros(){
      return $this->getKmFin() - $this->getKmIni();
  }

//  public function getHoras(){
//      return $this->getHoras();
//  }

  public function  __toString() {
      return 'Numero:'.$this->getId()
              .' '.'  Detalle:'.$this->getDetalle().' '.
      '  Fecha:'.$this->getFecha('d-m-Y').' '.
              '  Horas:'. $this->getHoras()
              //.' '.
              //'  Km:'.$this->getKmFin()-$this->getKmIni();



              ;
  }

  public function getNombreVehiculo($id){
      $tmpvehic = new Vehiculo();
      $tmpvehic= $tmpvehic->getobjVehiculo($id);
      return $tmpvehic->getDescripcion();
  }


          public function getremPrecioKM(){
            $tar=new Tarifa();
            return round($this->getKilometros()*$tar->getPrecio('Km'));
        }

           public function getremPrecioHora(){
               $tar=new Tarifa();

            return round($this->getHorasTrab()*$tar->getPrecio('Hora'));
        }

} // Remito