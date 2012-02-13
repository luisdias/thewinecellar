<?php
/* Cellar Test cases generated on: 2011-12-08 20:02:33 : 1323370953*/
App::uses('Cellar', 'Model');

/**
 * Cellar Test Case
 *
 */
class CellarTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.cellar', 'app.cabinet', 'app.storage');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Cellar = ClassRegistry::init('Cellar');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cellar);

		parent::tearDown();
	}

}
