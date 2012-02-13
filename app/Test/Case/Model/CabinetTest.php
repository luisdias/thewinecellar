<?php
/* Cabinet Test cases generated on: 2011-12-08 19:51:37 : 1323370297*/
App::uses('Cabinet', 'Model');

/**
 * Cabinet Test Case
 *
 */
class CabinetTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.cabinet', 'app.cellar', 'app.storage');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Cabinet = ClassRegistry::init('Cabinet');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cabinet);

		parent::tearDown();
	}

}
