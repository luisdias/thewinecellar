<?php
/* Region Test cases generated on: 2011-12-08 20:05:26 : 1323371126*/
App::uses('Region', 'Model');

/**
 * Region Test Case
 *
 */
class RegionTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.region', 'app.country', 'app.producer', 'app.wine');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Region = ClassRegistry::init('Region');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Region);

		parent::tearDown();
	}

}
