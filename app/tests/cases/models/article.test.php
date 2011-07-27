<?php
/* Article Test cases generated on: 2011-07-27 07:07:21 : 1311778221*/
App::import('Model', 'Article');

class ArticleTestCase extends CakeTestCase {
	var $fixtures = array('app.article');

	function startTest() {
		$this->Article =& ClassRegistry::init('Article');
	}

	function endTest() {
		unset($this->Article);
		ClassRegistry::flush();
	}

}
?>