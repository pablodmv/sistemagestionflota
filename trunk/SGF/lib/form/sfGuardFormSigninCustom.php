<?php

class sfGuardFormSigninCustom extends sfForm
{
     public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInput(),
      'password' => new sfWidgetFormInput(array('type' => 'password')),
      'remember' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'username' => new sfValidatorString(),
      'password' => new sfValidatorString(),
      'remember' => new sfValidatorBoolean(),
    ));

    $this->widgetSchema->setLabel('username', 'Usuario');
    $this->widgetSchema->setLabel('password', 'Contraseña');
    $this->widgetSchema->setLabel('remember', 'Recordar');

    $this->validatorSchema->setPostValidator(new sfGuardValidatorUser());

    $this->widgetSchema->setNameFormat('signin[%s]');
  }



//  public function configure()
//  {
//    $this->setWidgets(array(
//      'username' => new sfWidgetFormInput(),
//      'password' => new sfWidgetFormInput(array('type' => 'password')),
//    ));
//
//    $this->setValidators(array(
//      'username' => new sfValidatorString(),
//      'password' => new sfValidatorString(),
//    ));
//
//	$this->widgetSchema->setLabel('username', 'Email');
//
//    $this->validatorSchema->setPostValidator(new sfGuardValidatorUser(array(), array('invalid' => 'The email and/or password is invalid.')));
//
//    $this->widgetSchema->setNameFormat('signin[%s]');
//  }
}

