<?php

class ConsultaOrdenForm extends sfForm
{
  public function configure()
  {
    $this->setWidgets(array(
      'cliente'    => new sfWidgetFormInput(),

    ));

    $this->setValidators(array(
      'cliente'        => new sfValidatorString(array('max_length' => 100), array('required' => 'Requerido')),

    ));
  }
}
