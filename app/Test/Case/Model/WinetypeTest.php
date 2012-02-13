<?php
/* Winetype Test cases generated on: 2011-12-08 20:06:01 : 1323371161*/
App::uses('Winetype', 'Model');

/**
 * Winetype Test Case
 *
 */
class WinetypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.winetype', 'app.wine', 'app.country', 'app.producer', 'app.region', 'app.grapetype', 'app.storage', 'app.cabinet', 'app.cellar');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Winetype = ClassRegistry::init('Winetype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Winetype);

		parent::tearDown();
	}

}
