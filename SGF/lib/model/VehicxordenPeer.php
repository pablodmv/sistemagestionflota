<?php


/**
 * Skeleton subclass for performing query and update operations on the 'vehicxorden' table.
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
class VehicxordenPeer extends BaseVehicxordenPeer {

    static public function pene(){
        $types = array('full-time' => 'Full time',
    'part-time' => 'Part time',
    'freelance' => 'Freelance',

  );
        return $types;

    }

    static public $pablo = array('full-time' => 'Full time',
    'part-time' => 'Part time',
    'freelance' => 'Freelance',

  );

} // VehicxordenPeer
