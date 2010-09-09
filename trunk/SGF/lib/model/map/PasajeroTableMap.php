<?php


/**
 * This class defines the structure of the 'pasajero' table.
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
class PasajeroTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.PasajeroTableMap';

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
		$this->setName('pasajero');
		$this->setPhpName('Pasajero');
		$this->setClassname('Pasajero');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NOMBRE', 'Nombre', 'VARCHAR', true, 100, null);
		$this->addColumn('DIRECCION', 'Direccion', 'VARCHAR', true, 150, null);
		$this->addColumn('TELEFONO', 'Telefono', 'INTEGER', true, null, null);
		$this->addColumn('MAIL', 'Mail', 'VARCHAR', false, 80, null);
		$this->addColumn('HORA', 'Hora', 'TIMESTAMP', true, null, null);
		$this->addForeignKey('ZONA_ID', 'ZonaId', 'INTEGER', 'zona', 'ID', true, null, null);
		$this->addForeignKey('VEHICULO', 'Vehiculo', 'INTEGER', 'vehiculo', 'ID', true, null, null);
		$this->addForeignKey('ORDEN', 'Orden', 'INTEGER', 'orden', 'ID', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Zona', 'Zona', RelationMap::MANY_TO_ONE, array('zona_id' => 'id', ), null, null);
    $this->addRelation('VehiculoRelatedByVehiculo', 'Vehiculo', RelationMap::MANY_TO_ONE, array('vehiculo' => 'id', ), null, null);
    $this->addRelation('OrdenRelatedByOrden', 'Orden', RelationMap::MANY_TO_ONE, array('orden' => 'id', ), null, null);
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

} // PasajeroTableMap
