<?php

/**
 * Tmpfactura filter form base class.
 *
 * @package    SGF
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTmpfacturaFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'num_fac'           => new sfWidgetFormFilterInput(),
      'cliente'           => new sfWidgetFormPropelChoice(array('model' => 'Cliente', 'add_empty' => true)),
      'fecha_fact'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'desc_generica'     => new sfWidgetFormFilterInput(),
      'iva'               => new sfWidgetFormFilterInput(),
      'subtotal'          => new sfWidgetFormFilterInput(),
      'total'             => new sfWidgetFormFilterInput(),
      'moneda'            => new sfWidgetFormPropelChoice(array('model' => 'Moneda', 'add_empty' => true)),
      'formapago'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fechaPago'         => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'tmplineafact_list' => new sfWidgetFormPropelChoice(array('model' => 'Orden', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'num_fac'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'cliente'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Cliente', 'column' => 'id')),
      'fecha_fact'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'desc_generica'     => new sfValidatorPass(array('required' => false)),
      'iva'               => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'subtotal'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'total'             => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'moneda'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Moneda', 'column' => 'id')),
      'formapago'         => new sfValidatorPass(array('required' => false)),
      'fechaPago'         => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'tmplineafact_list' => new sfValidatorPropelChoice(array('model' => 'Orden', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tmpfactura_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
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

    $criteria->addJoin(TmplineafactPeer::FACTURA_ID, TmpfacturaPeer::ID);

    $value = array_pop($values);
    $criterion = $criteria->getNewCriterion(TmplineafactPeer::ORDEN_ID, $value);

    foreach ($values as $value)
    {
      $criterion->addOr($criteria->getNewCriterion(TmplineafactPeer::ORDEN_ID, $value));
    }

    $criteria->add($criterion);
  }

  public function getModelName()
  {
    return 'Tmpfactura';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'num_fac'           => 'Number',
      'cliente'           => 'ForeignKey',
      'fecha_fact'        => 'Date',
      'desc_generica'     => 'Text',
      'iva'               => 'Number',
      'subtotal'          => 'Number',
      'total'             => 'Number',
      'moneda'            => 'ForeignKey',
      'formapago'         => 'Text',
      'fechaPago'         => 'Date',
      'tmplineafact_list' => 'ManyKey',
    );
  }
}
