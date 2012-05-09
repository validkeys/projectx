<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/New_York' for 'EDT/-4.0/DST' instead in /Users/kyledavis/Sites/projectx/cake/console/templates/default/classes/test.ctp on line 22
/* Experiment Test cases generated on: 2012-05-08 22:27:08 : 1336530428*/
App::import('Model', 'Experiment');

class ExperimentTestCase extends CakeTestCase {
	var $fixtures = array('app.experiment', 'app.user');

	function startTest() {
		$this->Experiment =& ClassRegistry::init('Experiment');
	}

	function endTest() {
		unset($this->Experiment);
		ClassRegistry::flush();
	}

}
