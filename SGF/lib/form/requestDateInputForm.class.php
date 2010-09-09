<?php

class requesDateInputForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'fechaInicial'      => new sfWidgetFormDate(),
        'fechaFinal'      => new sfWidgetFormDate(),
        'idCliente' => new sfWidgetFormInputText(),
      
    ));

    $this->setValidators(array(
      'fechaInicial'      => new sfValidatorDate(),
        'fechaFinal'      => new sfValidatorDate(),
        'idCliente' => new sfValidatorNumber(),
      
    ));

       $this->widgetSchema->setLabels(array(
            'fechaInicial'    => 'Fecha Inicial',
            'fechaFinal'      => 'Fecha Final',
           'idCliente'      => 'Numero de Cliente',

));
  }
}
