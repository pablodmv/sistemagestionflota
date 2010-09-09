<?php


/**
 * This class defines the structure of the 'lineafact' table.
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
class LineafactTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.LineafactTableMap';

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
		$this->setName('lineafact');
		$this->setPhpName('Lineafact');
		$this->setClassname('Lineafact');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('FACTURA_ID', 'FacturaId', 'INTEGER' , 'factura', 'ID', true, null, null);
		$this->addForeignPrimaryKey('ORDEN_ID', 'OrdenId', 'INTEGER' , 'orden', 'ID', true, null, null);
		$this->addColumn('DESCRIPCION', 'Descripcion', 'LONGVARCHAR', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Factura', 'Factura', RelationMap::MANY_TO_ONE, array('factura_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Orden', 'Orden', RelationMap::MANY_TO_ONE, array('orden_id' => 'id', ), 'CASCADE', null);
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

} // LineafactTableMap
