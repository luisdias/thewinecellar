<?php
/* Grapetypes Test cases generated on: 2011-12-08 20:05:04 : 1323371104*/
App::uses('Grapetypes', 'Controller');

/**
 * TestGrapetypes *
 */
class TestGrapetypes extends Grapetypes {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

/**
 * Grapetypes Test Case
 *
 */
class GrapetypesTestCase extends CakeTestCase {
/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Grapetypes = new TestGrapetypes();
		$this->->constructClasses();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Grapetypes);

		parent::tearDown();
	}

}
