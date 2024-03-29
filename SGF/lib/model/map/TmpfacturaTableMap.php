<?php


/**
 * This class defines the structure of the 'tmpfactura' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 07/28/10 15:21:18
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class TmpfacturaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.TmpfacturaTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('tmpfactura');
		$this->setPhpName('Tmpfactura');
		$this->setClassname('Tmpfactura');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NUM_FAC', 'NumFac', 'INTEGER', false, null, null);
		$this->addForeignKey('CLIENTE', 'Cliente', 'INTEGER', 'cliente', 'ID', true, null, null);
		$this->addColumn('FECHA_FACT', 'FechaFact', 'DATE', true, null, null);
		$this->addColumn('DESC_GENERICA', 'DescGenerica', 'LONGVARCHAR', false, null, null);
		$this->addColumn('IVA', 'Iva', 'INTEGER', false, null, null);
		$this->addColumn('SUBTOTAL', 'Subtotal', 'NUMERIC', false, 20, null);
		$this->addColumn('TOTAL', 'Total', 'NUMERIC', false, 20, null);
		$this->addForeignKey('MONEDA', 'Moneda', 'INTEGER', 'moneda', 'ID', false, null, null);
		$this->addColumn('FORMAPAGO', 'Formapago', 'VARCHAR', true, 80, null);
		$this->addColumn('FECHAPAGO', 'Fechapago', 'DATE', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ClienteRelatedByCliente', 'Cliente', RelationMap::MANY_TO_ONE, array('cliente' => 'id', ), null, null);
    $this->addRelation('MonedaRelatedByMoneda', 'Moneda', RelationMap::MANY_TO_ONE, array('moneda' => 'id', ), null, null);
    $this->addRelation('Tmplineafact', 'Tmplineafact', RelationMap::ONE_TO_MANY, array('id' => 'factura_id', ), 'CASCADE', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
		);
	} // getBehaviors()

} // TmpfacturaTableMap
