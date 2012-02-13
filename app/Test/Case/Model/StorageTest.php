<?php
/* Storage Test cases generated on: 2011-12-08 20:05:36 : 1323371136*/
App::uses('Storage', 'Model');

/**
 * Storage Test Case
 *
 */
class StorageTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.storage', 'app.cabinet', 'app.cellar', 'app.wine');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Storage = ClassRegistry::init('Storage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Storage);

		parent::tearDown();
	}

}
