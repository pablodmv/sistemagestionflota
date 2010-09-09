<?php


/**
 * Skeleton subclass for representing a row from the 'parametros' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 05/24/10 21:44:21
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    lib.model
 */
class Parametros extends BaseParametros {

    public function getNumFactura(){
        $c=new Criteria();
         $c->add(ParametrosPeer::NUMREF,'2');
         $objnumero=ParametrosPeer::doSelectOne($c);
         return $objnumero->getValor();

    }


    public function getIVA(){
                $c=new Criteria();
            //Clausula WHERE NOMBRE='IVA?
            $c->add(ParametrosPeer::NUMREF,'1');
            //Trae solo un dato
            $iva=ParametrosPeer::doSelectOne($c);
            return $iva->getValor();

    }

} // Parametros
