<?php


/**
 * This class defines the structure of the 'orden' table.
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
class OrdenTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.OrdenTableMap';

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
		$this->setName('orden');
		$this->setPhpName('Orden');
		$this->setClassname('Orden');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('CLIENTE', 'Cliente', 'INTEGER', 'cliente', 'ID', true, null, null);
		$this->addColumn('DESCRIPCION', 'Descripcion', 'VARCHAR', true, 100, null);
		$this->addColumn('FECHA_DESDE', 'FechaDesde', 'DATE', true, null, null);
		$this->addColumn('FECHA_HASTA', 'FechaHasta', 'DATE', true, null, null);
		$this->addColumn('CONTACTO', 'Contacto', 'VARCHAR', true, 100, null);
		$this->addColumn('TEL_CONTACTO', 'TelContacto', 'INTEGER', true, null, null);
		$this->addColumn('HORAS', 'Horas', 'INTEGER', false, null, null);
		$this->addColumn('KILOMETROS', 'Kilometros', 'INTEGER', false, null, null);
		$this->addColumn('IMPORTE', 'Importe', 'NUMERIC', false, 20, null);
		$this->addForeignKey('MONEDA', 'Moneda', 'INTEGER', 'moneda', 'ID', false, null, null);
		$this->addColumn('LIQUIDADA', 'Liquidada', 'BOOLEAN', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('ClienteRelatedByCliente', 'Cliente', RelationMap::MANY_TO_ONE, array('cliente' => 'id', ), null, null);
    $this->addRelation('MonedaRelatedByMoneda', 'Moneda', RelationMap::MANY_TO_ONE, array('moneda' => 'id', ), null, null);
    $this->addRelation('Pasajero', 'Pasajero', RelationMap::ONE_TO_MANY, array('id' => 'orden', ), null, null);
    $this->addRelation('Lineafact', 'Lineafact', RelationMap::ONE_TO_MANY, array('id' => 'orden_id', ), 'CASCADE', null);
    $this->addRelation('Tmplineafact', 'Tmplineafact', RelationMap::ONE_TO_MANY, array('id' => 'orden_id', ), 'CASCADE', null);
    $this->addRelation('Remito', 'Remito', RelationMap::ONE_TO_MANY, array('id' => 'id_orden', ), null, null);
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

} // OrdenTableMap
