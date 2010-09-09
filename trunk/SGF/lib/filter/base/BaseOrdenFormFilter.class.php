<?php

/**
 * Orden filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseOrdenFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'cliente'           => new sfWidgetFormPropelChoice(array('model' => 'Cliente', 'add_empty' => true)),
      'descripcion'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fecha_desde'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fecha_hasta'       => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'contacto'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tel_contacto'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'horas'             => new sfWidgetFormFilterInput(),
      'kilometros'        => new sfWidgetFormFilterInput(),
      'importe'           => new sfWidgetFormFilterInput(),
      'moneda'            => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
      'liquidada'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'lineafact_list'    => new sfWidgetFormPropelChoice(array('model' => 'Factura', 'add_empty' => true)),
      'tmplineafact_list' => new sfWidgetFormPropelChoice(array('model' => 'Tmpfactura', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'cliente'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cliente', 'column' => 'id')),
      'descripcion'       => new sfValidatorPass(array('required' => false)),
      'fecha_desde'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'fecha_hasta'       => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'contacto'          => new sfValidatorPass(array('required' => false)),
      'tel_contacto'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'horas'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'kilometros'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'importe'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'moneda'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Moneda', 'column' => 'id')),
      'liquidada'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'lineafact_list'    => new sfValidatorPropelChoice(array('model' => 'Factura', 'required' => false)),
      'tmplineafact_list' => new sfValidatorPropelChoice(array('model' => 'Tmpfactura', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('orden_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function addLineafactListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(LineafactPeer::ORDEN_ID, OrdenPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(LineafactPeer::FACTURA_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(LineafactPeer::FACTURA_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function addTmplineafactListColumnCriteria(Criteria $criteria, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $criteria->addJoin(TmplineafactPeer::ORDEN_ID, OrdenPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TmplineafactPeer::FACTURA_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TmplineafactPeer::FACTURA_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Orden';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'cliente'           => 'ForeignKey',
      'descripcion'       => 'Text',
      'fecha_desde'       => 'Date',
      'fecha_hasta'       => 'Date',
      'contacto'          => 'Text',
      'tel_contacto'      => 'Number',
      'horas'             => 'Number',
      'kilometros'        => 'Number',
      'importe'           => 'Number',
      'moneda'            => 'ForeignKey',
      'liquidada'         => 'Boolean',
      'lineafact_list'    => 'ManyKey',
      'tmplineafact_list' => 'ManyKey',
    );
  }
}
