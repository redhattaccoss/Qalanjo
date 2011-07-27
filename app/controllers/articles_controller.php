<?php
class ArticlesController extends AppController {

	var $name = 'Articles';
	var $helpers = array('Html', 'Form');

	
	function read($name){
		$this->render($name, "article");
	}
	
	
}
?>