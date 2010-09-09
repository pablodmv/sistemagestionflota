<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */




class DrawingMap{


         /**
	 * @desc: 	Google Map Key
	 * @type: 	string
	 * @access: private
	 */
	var $mMapKey;

	var $mIndex;

	var $mAddressArr =  array();


        /**
	 * @desc: 	Coordenadas Array Holder
	 * @type: 	array
	 * @access: private
	 */
        var $placemarks = array();

        function DrawingMap() {
		$this->mMapKey = sfConfig::get('app_google_maps_api_keys_localhost');
		$this->mIndex = -1;
	} # end function


        function SetAddress($address) {
		$this->mIndex++;
		$this->mAddressArr[$this->mIndex] = $address;
		
	} # end function

        function GetPlacemark(){
            return $this->placemarks;
        }


        function ObtenerCoordenadas(){

            require_once('GeoCoder.class.php');

            $geocoder = new Geocoder($this->mMapKey);

            # recorro todas las direcciones que tengo en mi arreglo de direcciones
            foreach($this->mAddressArr as $direccion){
                
                #me defino una aux ya que pueden venir mas de una direccion, dependiendo de la ciudad
                $placemarkAux = $geocoder->lookup($direccion);

                foreach ($placemarkAux as $placemark) {
                    $dirActual = htmlSpecialChars($placemark);
                    list($calle, $ciudad, $pais) = explode(',', $dirActual, 3);

                    $ciudadBase = "Montevideo";
                    $paisBase = "Uruguay";
                    if((trim($ciudad) == $ciudadBase)&&(trim($pais) == $paisBase)){
                        $this->placemarks[] = $placemark->getPoint();
                        
                    }
                }
                
            }
        }
}

?>
