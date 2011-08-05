<?php
class ShoutsController extends AppController{
	var $name =  "Shouts";
	function post(){
		if (!empty($this->data)){
			
		}
	}
	
	function loadShouts($memberId=null){
		$this->loadModel("Member");
		if ($memberId==null){
			$memberId = $this->Session->read("Member.id");
			$approach = "match";
		}else{
			$approach = "individual";
		}
		if ($approach=="match"){
			
		}else{
			$matches = $this->Member->Match->getRandomMatch($memberId, "all", array("Match.member_id"), 30);
			for($i=0;$i<10;$i++){
				$index = rand(0, 30);
				$id = $matches[$index];
				
			}
		}
		
	}
}