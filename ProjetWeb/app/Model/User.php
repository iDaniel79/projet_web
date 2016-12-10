<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Classrooms $Classrooms
 * @property Role $Role
 * @property Uf $Uf
 */
class User extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array( 
			array(
			'rule' => 'email',
			'required' => true,
			'allowEmpty' => false,
			'message' => "L'email n'est pas valide"
			),
			array(
				'rule' => 'isUnique',
				'message' => "Cette adresse est déjà utilisée"
			)
			
		),
		'password' => array(
			'rule' => 'notEmpty',
			'message' => "Vous devez entrer un mdp",
			'allowEmpty' => false
			)		
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Classrooms' => array(
			'className' => 'Classrooms',
			'foreignKey' => 'classrooms_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
            	'Sections' => array(
			'className' => 'Sections',
			'foreignKey' => 'sections_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Role' => array(
			'className' => 'Role',
			'joinTable' => 'users_roles',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'role_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		),
		'Uf' => array(
			'className' => 'Uf',
			'joinTable' => 'users_ufs',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'uf_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
