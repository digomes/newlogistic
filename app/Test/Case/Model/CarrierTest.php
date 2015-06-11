<?php
App::uses('Carrier', 'Model');

/**
 * Carrier Test Case
 *
 */
class CarrierTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.carrier'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Carrier = ClassRegistry::init('Carrier');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Carrier);

		parent::tearDown();
	}

}
