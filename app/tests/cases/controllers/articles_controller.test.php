<?php
/* Articles Test cases generated on: 2011-07-27 07:07:25 : 1311778285*/
App::import('Controller', 'Articles');

class TestArticlesController extends ArticlesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ArticlesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.article');

	function startTest() {
		$this->Articles =& new TestArticlesController();
		$this->ArticlesController->constructClasses();
	}

	function endTest() {
		unset($this->Articles);
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
?>