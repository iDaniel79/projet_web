<?php
/**
 * Token Fixture
 */
class TokenFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'date_creation' => array('type' => 'date', 'null' => true, 'default' => null),
		'date_fin' => array('type' => 'date', 'null' => true, 'default' => null),
		'statut' => array('type' => 'text', 'null' => true, 'default' => null, 'length' => 1),
		'numero' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false),
		'ufs_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_tokens_ufs1_idx' => array('column' => 'ufs_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'date_creation' => '2016-12-01',
			'date_fin' => '2016-12-01',
			'statut' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'numero' => 1,
			'ufs_id' => 1
		),
	);

}
