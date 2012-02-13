<?php
/* Wine Test cases generated on: 2011-12-08 20:05:52 : 1323371152*/
App::uses('Wine', 'Model');

/**
 * Wine Test Case
 *
 */
class WineTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.wine', 'app.country', 'app.producer', 'app.region', 'app.winetype', 'app.grapetype', 'app.storage', 'app.cabinet', 'app.cellar');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Wine = ClassRegistry::init('Wine');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Wine);

		parent::tearDown();
	}

}
