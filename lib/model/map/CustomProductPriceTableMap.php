<?php


/**
 * This class defines the structure of the 'custom_product_prices' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Nov  3 10:02:49 2012
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    lib.model.map
 */
class CustomProductPriceTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'lib.model.map.CustomProductPriceTableMap';

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
		$this->setName('custom_product_prices');
		$this->setPhpName('CustomProductPrice');
		$this->setClassname('CustomProductPrice');
		$this->setPackage('lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, 11, null);
		$this->addForeignKey('PRODUCT_ID', 'ProductId', 'INTEGER', 'products', 'ID', true, 11, null);
		$this->addForeignKey('CUSTOM_PRODUCT_PRICE_TYPE_ID', 'CustomProductPriceTypeId', 'INTEGER', 'custom_product_price_types', 'ID', true, 11, null);
		$this->addColumn('PRICE', 'Price', 'DECIMAL', true, 11, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', true, null, null);
		$this->addColumn('MODIFIED_AT', 'ModifiedAt', 'TIMESTAMP', true, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Product', 'Product', RelationMap::MANY_TO_ONE, array('product_id' => 'id', ), 'CASCADE', 'RESTRICT');
    $this->addRelation('CustomProductPriceType', 'CustomProductPriceType', RelationMap::MANY_TO_ONE, array('custom_product_price_type_id' => 'id', ), 'CASCADE', 'RESTRICT');
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
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // CustomProductPriceTableMap