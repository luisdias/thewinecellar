<?php
/* Producer Test cases generated on: 2011-12-08 20:05:14 : 1323371114*/
App::uses('Producer', 'Model');

/**
 * Producer Test Case
 *
 */
class ProducerTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.producer', 'app.country', 'app.region', 'app.wine');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Producer = ClassRegistry::init('Producer');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Producer);

		parent::tearDown();
	}

}
