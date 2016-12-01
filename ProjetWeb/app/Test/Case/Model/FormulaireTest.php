<?php
App::uses('Formulaire', 'Model');

/**
 * Formulaire Test Case
 */
class FormulaireTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.formulaire'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Formulaire = ClassRegistry::init('Formulaire');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Formulaire);

		parent::tearDown();
	}

}
