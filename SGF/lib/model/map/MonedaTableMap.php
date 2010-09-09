<?php


/**
 * This class defines the structure of the 'moneda' table.
 *
 *
 * This class was autogenerated by Propel 1.4.1 on:
 *
 * 07/28/10 15:21:17
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class MonedaTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.MonedaTableMap';

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
		$this->setName('moneda');
		$this->setPhpName('Moneda');
		$this->setClassname('Moneda');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addColumn('NUMREF', 'Numref', 'INTEGER', false, null, null);
		$this->addColumn('MONEDA', 'Moneda', 'VARCHAR', true, 100, null);
		$this->addColumn('TIPOCAMBIO', 'Tipocambio', 'NUMERIC', false, 20, null);
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Orden', 'Orden', RelationMap::ONE_TO_MANY, array('id' => 'moneda', ), null, null);
    $this->addRelation('Factura', 'Factura', RelationMap::ONE_TO_MANY, array('id' => 'moneda', ), null, null);
    $this->addRelation('Tmpfactura', 'Tmpfactura', RelationMap::ONE_TO_MANY, array('id' => 'moneda', ), null, null);
    $this->addRelation('Remito', 'Remito', RelationMap::ONE_TO_MANY, array('id' => 'moneda', ), null, null);
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

} // MonedaTableMap
