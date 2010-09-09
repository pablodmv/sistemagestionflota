<?php


/**
 * Skeleton subclass for representing a row from the 'vehicxorden' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 05/13/10 20:53:02
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Vehicxorden extends BaseVehicxorden {
 public function getNombreVehiculo()
	{
                //CAMBIO
                //Obtengo el vehiculo que corresponde al ID y devuelvo el nombre
                $vehiculo = VehiculoPeer::retrieveByPk($this->idvehiculo);
                return $vehiculo;
	}
     public function getNombreChofer()
	{
                //CAMBIO
                //Obtengo el vehiculo que corresponde al ID y devuelvo el nombre
                $chofer = ChoferPeer::retrieveByPk($this->chofer);
                return $chofer;
	}


  public function save(PropelPDO $con = null)
  {

      $this->setProveedor($this->getVehiculo()->getProveedor());

    return parent::save($con);
  }



} // Vehicxorden
