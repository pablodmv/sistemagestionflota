<?php

/**
 * Remito form base class.
 *
 * @method Remito getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseRemitoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'id_orden'   => new sfWidgetFormPropelChoice(array('model' => 'Orden', 'add_empty' => false)),
      'idVehiculo' => new sfWidgetFormPropelChoice(array('model' => 'Vehiculo', 'add_empty' => false)),
      'fecha'      => new sfWidgetFormDate(),
      'horasTrab'  => new sfWidgetFormInputText(),
      'km_ini'     => new sfWidgetFormInputText(),
      'km_fin'     => new sfWidgetFormInputText(),
      'moneda'     => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
      'total'      => new sfWidgetFormInputText(),
      'detalle'    => new sfWidgetFormInputText(),
      'liquidada'  => new sfWidgetFormInputCheckbox(),
      'proveedor'  => new sfWidgetFormPropelChoice(array('model' => 'Proveedor', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Remito', 'column' => 'id', 'required' => false)),
      'id_orden'   => new sfValidatorPropelChoice(array('model' => 'Orden', 'column' => 'id')),
      'idVehiculo' => new sfValidatorPropelChoice(array('model' => 'Vehiculo', 'column' => 'id')),
      'fecha'      => new sfValidatorDate(),
      'horasTrab'  => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'km_ini'     => new sfValidatorNumber(array('required' => false)),
      'km_fin'     => new sfValidatorNumber(array('required' => false)),
      'moneda'     => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id', 'required' => false)),
      'total'      => new sfValidatorNumber(),
      'detalle'    => new sfValidatorString(array('max_length' => 100)),
      'liquidada'  => new sfValidatorBoolean(array('required' => false)),
      'proveedor'  => new sfValidatorPropelChoice(array('model' => 'Proveedor', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('remito[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Remito';
  }


}
