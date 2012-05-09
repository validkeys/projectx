<?php
/* Experiment Fixture generated on: 
Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/New_York' for 'EDT/-4.0/DST' instead in /Users/kyledavis/Sites/projectx/cake/console/templates/default/classes/fixture.ctp on line 24
2012-05-08 22:27:08 : 1336530428 */
class ExperimentFixture extends CakeTestFixture {
	var $name = 'Experiment';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'action' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'noun' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'verb' => array('type' => 'string', 'null' => false, 'default' => NULL, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'complete' => array('type' => 'boolean', 'null' => false, 'default' => NULL),
		'date_completed' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'action' => 'Lorem ipsum dolor sit amet',
			'noun' => 'Lorem ipsum dolor sit amet',
			'verb' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'complete' => 1,
			'date_completed' => '2012-05-08 22:27:08',
			'created' => '2012-05-08 22:27:08',
			'modified' => '2012-05-08 22:27:08'
		),
	);
}
