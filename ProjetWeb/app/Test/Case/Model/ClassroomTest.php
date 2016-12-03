<?php
App::uses('Classroom', 'Model');

/**
 * Classroom Test Case
 */
class ClassroomTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.classroom'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Classroom = ClassRegistry::init('Classroom');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Classroom);

		parent::tearDown();
	}

}
