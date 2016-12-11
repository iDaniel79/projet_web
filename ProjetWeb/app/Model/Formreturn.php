<?php
App::uses('AppModel', 'Model');
/**
 * Formreturn Model
 *
 * @property Ufs $Ufs
 */
class Formreturn extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'ufs_id';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'notBlank' => array(
				//'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'ufs_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
            	'formulaires_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ufs' => array(
			'className' => 'Ufs',
			'foreignKey' => 'ufs_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
            	'Formulaires' => array(
			'className' => 'Formulaires',
			'foreignKey' => 'formulaires_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);
}
