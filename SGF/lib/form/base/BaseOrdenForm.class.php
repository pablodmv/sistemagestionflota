<?php

/**
 * Orden form base class.
 *
 * @method Orden getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseOrdenForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'cliente'           => new sfWidgetFormPropelChoice(array('model' => 'Cliente', 'add_empty' => false)),
      'descripcion'       => new sfWidgetFormInputText(),
      'fecha_desde'       => new sfWidgetFormDate(),
      'fecha_hasta'       => new sfWidgetFormDate(),
      'contacto'          => new sfWidgetFormInputText(),
      'tel_contacto'      => new sfWidgetFormInputText(),
      'horas'             => new sfWidgetFormInputText(),
      'kilometros'        => new sfWidgetFormInputText(),
      'importe'           => new sfWidgetFormInputText(),
      'moneda'            => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
      'liquidada'         => new sfWidgetFormInputCheckbox(),
      'lineafact_list'    => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Factura')),
      'tmplineafact_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Tmpfactura')),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'Orden', 'column' => 'id', 'required' => false)),
      'cliente'           => new sfValidatorPropelChoice(array('model' => 'Cliente', 'column' => 'id')),
      'descripcion'       => new sfValidatorString(array('max_length' => 100)),
      'fecha_desde'       => new sfValidatorDate(),
      'fecha_hasta'       => new sfValidatorDate(),
      'contacto'          => new sfValidatorString(array('max_length' => 100)),
      'tel_contacto'      => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'horas'             => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'kilometros'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'importe'           => new sfValidatorNumber(array('required' => false)),
      'moneda'            => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id', 'required' => false)),
      'liquidada'         => new sfValidatorBoolean(array('required' => false)),
      'lineafact_list'    => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Factura', 'required' => false)),
      'tmplineafact_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Tmpfactura', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Orden', 'column' => array('descripcion')))
    );

    $this->widgetSchema->setNameFormat('orden[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Orden';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['lineafact_list']))
    {
      $values = array();
      foreach ($this->object->getLineafacts() as $obj)
      {
        $values[] = $obj->getFacturaId();
      }

      $this->setDefault('lineafact_list', $values);
    }

    if (isset($this->widgetSchema['tmplineafact_list']))
    {
      $values = array();
      foreach ($this->object->getTmplineafacts() as $obj)
      {
        $values[] = $obj->getFacturaId();
      }

      $this->setDefault('tmplineafact_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveLineafactList($con);
    $this->saveTmplineafactList($con);
  }

  public function saveLineafactList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['lineafact_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(LineafactPeer::ORDEN_ID, $this->object->getPrimaryKey());
    LineafactPeer::doDelete($c, $con);

    $values = $this->getValue('lineafact_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Lineafact();
        $obj->setOrdenId($this->object->getPrimaryKey());
        $obj->setFacturaId($value);
        $obj->save();
      }
    }
  }

  public function saveTmplineafactList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['tmplineafact_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $c = new Criteria();
    $c->add(TmplineafactPeer::ORDEN_ID, $this->object->getPrimaryKey());
    TmplineafactPeer::doDelete($c, $con);

    $values = $this->getValue('tmplineafact_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Tmplineafact();
        $obj->setOrdenId($this->object->getPrimaryKey());
        $obj->setFacturaId($value);
        $obj->save();
      }
    }
  }

}
