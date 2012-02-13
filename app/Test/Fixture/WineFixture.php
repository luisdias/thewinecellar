<?php
/* Wine Fixture generated on: 2011-12-08 20:05:52 : 1323371152 */

/**
 * WineFixture
 *
 */
class WineFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary', 'collate' => NULL, 'comment' => ''),
		'wine_name' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'vintage' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'price' => array('type' => 'float', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'rating' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'length' => 6, 'collate' => NULL, 'comment' => ''),
		'country_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'producer_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'region_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'winetype_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'grapetype_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'collate' => NULL, 'comment' => ''),
		'picture' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'comment' => '', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'wine_name' => 'Lorem ipsum dolor sit amet',
			'vintage' => 1,
			'price' => 1,
			'rating' => 1,
			'country_id' => 1,
			'producer_id' => 1,
			'region_id' => 1,
			'winetype_id' => 1,
			'grapetype_id' => 1,
			'picture' => 'Lorem ipsum dolor sit amet'
		),
	);
}
