<?php
/* Grapetype Test cases generated on: 2011-12-08 20:05:03 : 1323371103*/
App::uses('Grapetype', 'Model');

/**
 * Grapetype Test Case
 *
 */
class GrapetypeTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.grapetype', 'app.wine');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Grapetype = ClassRegistry::init('Grapetype');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Grapetype);

		parent::tearDown();
	}

}
