<?php
App::uses('Formreturn', 'Model');

/**
 * Formreturn Test Case
 */
class FormreturnTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.formreturn',
		'app.ufs'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Formreturn = ClassRegistry::init('Formreturn');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Formreturn);

		parent::tearDown();
	}

}
