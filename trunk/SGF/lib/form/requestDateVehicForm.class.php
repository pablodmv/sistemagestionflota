<?php

class requesDateVehicForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'fechaInicial'      => new sfWidgetFormDate(),
        'fechaFinal'      => new sfWidgetFormDate(),
        'idVehiculo' => new sfWidgetFormInputText(),
      
    ));

    $this->setValidators(array(
      'fechaInicial'      => new sfValidatorDate(),
        'fechaFinal'      => new sfValidatorDate(),
        'idVehiculo' => new sfValidatorNumber(),
      
    ));

       $this->widgetSchema->setLabels(array(
            'fechaInicial'    => 'Fecha Inicial',
            'fechaFinal'      => 'Fecha Final',
           'idVehiculo'      => 'Vehiculo',

));
  }
}
