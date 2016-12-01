<?php
App::uses('Uf', 'Model');

/**
 * Uf Test Case
 */
class UfTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.uf',
		'app.user',
		'app.users_uf'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Uf = ClassRegistry::init('Uf');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Uf);

		parent::tearDown();
	}

}
