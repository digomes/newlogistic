<?php
App::uses('Reverse', 'Model');

/**
 * Reverse Test Case
 *
 */
class ReverseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reverse',
		'app.status',
		'app.cost',
		'app.product',
		'app.category',
		'app.reverses_product',
		'app.upload',
		'app.reverses_upload'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Reverse = ClassRegistry::init('Reverse');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Reverse);

		parent::tearDown();
	}

}
