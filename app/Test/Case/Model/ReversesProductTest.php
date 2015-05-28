<?php
App::uses('ReversesProduct', 'Model');

/**
 * ReversesProduct Test Case
 *
 */
class ReversesProductTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.reverses_product',
		'app.reverse',
		'app.user',
		'app.group',
		'app.workshop',
		'app.status',
		'app.cost',
		'app.upload',
		'app.type',
		'app.product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->ReversesProduct = ClassRegistry::init('ReversesProduct');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->ReversesProduct);

		parent::tearDown();
	}

}
