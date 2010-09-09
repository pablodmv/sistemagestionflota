<?php

/**
 * Factura form base class.
 *
 * @method Factura getObject() Returns the current form's model object
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseFacturaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'num_fac'        => new sfWidgetFormInputText(),
      'cliente'        => new sfWidgetFormPropelChoice(array('model' => 'Cliente', 'add_empty' => false)),
      'fecha_fact'     => new sfWidgetFormDate(),
      'desc_generica'  => new sfWidgetFormTextarea(),
      'iva'            => new sfWidgetFormInputText(),
      'subtotal'       => new sfWidgetFormInputText(),
      'total'          => new sfWidgetFormInputText(),
      'moneda'         => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
      'formapago'      => new sfWidgetFormInputText(),
      'fechaPago'      => new sfWidgetFormDate(),
      'lineafact_list' => new sfWidgetFormPropelChoice(array('multiple' => true, 'model' => 'Orden')),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorPropelChoice(array('model' => 'Factura', 'column' => 'id', 'required' => false)),
      'num_fac'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'cliente'        => new sfValidatorPropelChoice(array('model' => 'Cliente', 'column' => 'id')),
      'fecha_fact'     => new sfValidatorDate(),
      'desc_generica'  => new sfValidatorString(array('required' => false)),
      'iva'            => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'subtotal'       => new sfValidatorNumber(array('required' => false)),
      'total'          => new sfValidatorNumber(array('required' => false)),
      'moneda'         => new sfValidatorPropelChoice(array('model' => 'Moneda', 'column' => 'id', 'required' => false)),
      'formapago'      => new sfValidatorString(array('max_length' => 80)),
      'fechaPago'      => new sfValidatorDate(array('required' => false)),
      'lineafact_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Orden', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('factura[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Factura';
  }


  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['lineafact_list']))
    {
      $values = array();
      foreach ($this->object->getLineafacts() as $obj)
      {
        $values[] = $obj->getOrdenId();
      }

      $this->setDefault('lineafact_list', $values);
    }

  }

  protected function doSave($con = null)
  {
    parent::doSave($con);

    $this->saveLineafactList($con);
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
    $c->add(LineafactPeer::FACTURA_ID, $this->object->getPrimaryKey());
    LineafactPeer::doDelete($c, $con);

    $values = $this->getValue('lineafact_list');
    if (is_array($values))
    {
      foreach ($values as $value)
      {
        $obj = new Lineafact();
        $obj->setFacturaId($this->object->getPrimaryKey());
        $obj->setOrdenId($value);
        $obj->save();
      }
    }
  }

}
