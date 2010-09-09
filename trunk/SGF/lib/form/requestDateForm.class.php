<?php

class requesDateForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'fechaInicial'      => new sfWidgetFormDate(),
        'fechaFinal'      => new sfWidgetFormDate(),
      
    ));

    $this->setValidators(array(
      'fechaInicial'      => new sfValidatorDate(),
        'fechaFinal'      => new sfValidatorDate(),
      
    ));

       $this->widgetSchema->setLabels(array(
            'fechaInicial'    => 'Fecha Inicial',
            'fechaFinal'      => 'Fecha Final',

));
  }
}
