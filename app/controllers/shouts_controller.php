<?php
class ShoutsController extends AppController{
	var $name =  "Shouts";
	function post(){
		if (!empty($this->data)){
			
		}
	}
	
	function load_shouts($memberId=null){
		$this->loadModel("Member");
		if ($memberId==null){
			$memberId = $this->Session->read("Member.id");
			$approach = "match";
		}else{
			$approach = "individual";
		}
		if ($approach=="individual"){
			
		}else{
			$matches = $this->Member->Match->getRandomMatch($memberId, "all", array("Match.matched_id"), 30);
			$shouts = array();
			$noshouts = array();
			$hasShouts = array();
			foreach($matches as $match){
				if ($this->Shout->hasShout($match["Match"]["matched_id"])){
					$hasShouts[] = $match;			
				}
			}
			if (!empty($matches)){
				for($i=0;$i<10;$i++){
					if (count($hasShouts)>=30){
						$index = rand(0, 29);
					}else{
						$index = rand(0, count($hasShouts)-1);
					}
					$match = $matches[$index];
					$shout = $this->Shout->loadRandomShout($match["Match"]["matched_id"]);
					$onShout = false;
					foreach($shouts as $temp){
						if ($temp["Shout"]["id"]==$shout["Shout"]["id"]){
							$onShout = true;
							break;
						}
					}
					if ($onShout){
						continue;
					}
					$member = $this->Member->find("first", 
												array("conditions"=>array("Member.id"=>$match["Match"]["matched_id"]),
													  "fields"=>array("id", "lastname", "firstname", "state", "country_id", "address1"),
													   "recursive"=>-1));
					
					$profile = $this->Member->MemberProfile->find("first", 
																	array("conditions"=>array("MemberProfile.member_id"=>$memberId),
																		  "recursive"=>-1,
																		   "fields"=>array("picture_path")));																
					$shout["Member"] = $member["Member"];
					$shout["MemberProfile"] = $profile["MemberProfile"]; 			
					$shouts[] = $shout;	
				}
			}
			$this->set("response", json_encode($shouts));
			$this->render("/elements/responses", "ajax");
		}
		
	}
}