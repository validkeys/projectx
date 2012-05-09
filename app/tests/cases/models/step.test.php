<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/New_York' for 'EDT/-4.0/DST' instead in /Users/kyledavis/Sites/projectx/cake/console/templates/default/classes/test.ctp on line 22
/* Step Test cases generated on: 2012-05-08 22:39:47 : 1336531187*/
App::import('Model', 'Step');

class StepTestCase extends CakeTestCase {
	var $fixtures = array('app.step', 'app.experiment', 'app.user');

	function startTest() {
		$this->Step =& ClassRegistry::init('Step');
	}

	function endTest() {
		unset($this->Step);
		ClassRegistry::flush();
	}

}
