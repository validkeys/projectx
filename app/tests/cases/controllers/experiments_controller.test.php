<?php

Warning: date(): It is not safe to rely on the system's timezone settings. You are *required* to use the date.timezone setting or the date_default_timezone_set() function. In case you used any of those methods and you are still getting this warning, you most likely misspelled the timezone identifier. We selected 'America/New_York' for 'EDT/-4.0/DST' instead in /Users/kyledavis/Sites/projectx/cake/console/templates/default/classes/test.ctp on line 22
/* Experiments Test cases generated on: 2012-05-08 22:28:05 : 1336530485*/
App::import('Controller', 'Experiments');

class TestExperimentsController extends ExperimentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ExperimentsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.experiment', 'app.user');

	function startTest() {
		$this->Experiments =& new TestExperimentsController();
		$this->Experiments->constructClasses();
	}

	function endTest() {
		unset($this->Experiments);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
