<?php

/**
 * Factura form.
 *
 * @package    SGF
 * @subpackage form
 * @author     Your name here
 */
class FacturaForm extends BaseFacturaForm
{
  public function configure()
  {
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
      'formapago'      => new sfValidatorString(array('max_length' => 80),array('required' => 'Requerido')),
      'fechaPago'      => new sfValidatorDate(array('required' => false)),
      'tmplineafact_list' => new sfValidatorPropelChoice(array('multiple' => true, 'model' => 'Orden', 'required' => false)),
    ));
     unset(
       $this['lineafact_list'], $this['tmplineafact_list'], $this['num_fac'],$this['cliente'],$this['fecha_fact'],
             $this['total'], $this['desc_generica'], $this['iva']
             );

         $this->widgetSchema->setLabels(array(
            'subtotal'    => 'Cobrado (s/imp)',
            'formapago'      => 'Forma de Pago',
            'fechapago'   => 'Fecha de Pago',
));
 }
}
