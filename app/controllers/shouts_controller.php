<?php
App::import ( "Sanitize" );
class ShoutsController extends AppController{
	var $name =  "Shouts";
	function post(){
		if (!empty($this->data)){
			$this->data = Sanitize::clean($this->data);
			$this->Shout->create($this->data);
			if ($this->Shout->save($this->data)){//attempts to save		
				$id = $this->Shout->getLastInsertId();
				$shout = $this->Shout->find("first", array("conditions"=>array("Shout.id"=>$id), "recursive"=>-1));
				$shout = $this->_attachDetailToShout($shout);
						
				$this->set("response", json_encode($shout));
				$this->render("/elements/responses", "ajax");
				return;
			}
			
		}
		
	}
	/**
	 * Attach detail to shout ...
	 * @param $shout The loaded shout
	 */
	
	private function _attachDetailToShout($shout){
		$this->loadModel("Member");
		$this->loadModel("Country");
		$member = $this->Member->find("first", 
										array("conditions"=>array("Member.id"=>$shout["Shout"]["member_id"]),
											  "fields"=>array("id", "lastname", "firstname", "state", "country_id", "address1"),
											   "recursive"=>-1));
			
		$profile = $this->Member->MemberProfile->find("first", 
														array("conditions"=>array("MemberProfile.member_id"=>$shout["Shout"]["member_id"]),
															  "recursive"=>-1,
															   "fields"=>array("picture_path")));																
		$country = $this->Country->find("first", array("conditions"=>
															array("Country.id"=>$member["Member"]["country_id"])));
		$shout["Member"] = $member["Member"];
		$shout["Member"]["age"] = $this->Member->MemberProfile->getAgeV2($shout["Shout"]["member_id"]);
		$shout["MemberProfile"] = $profile["MemberProfile"];
		$shout["Country"] = $country["Country"];
		return $shout; 															
	}
	
	function load_shouts($memberId=null){
		$this->loadModel("Member");
		$this->loadModel("Country");
		
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
			$hasShouts = array();
			foreach($matches as $match){
				if ($this->Shout->hasShout($match["Match"]["matched_id"])){
					$hasShouts[] = $match;			
				}
			}
			if (!empty($hasShouts)){
				for($i=0;$i<10;$i++){
					if (count($hasShouts)>=30){
						$index = rand(0, 29);
					}else{
						$index = rand(0, count($hasShouts)-1);
					}
					$match = $hasShouts[$index];
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
																	array("conditions"=>array("MemberProfile.member_id"=>$member["Member"]["id"]),
																		  "recursive"=>-1,
																		   "fields"=>array("picture_path")));																
					$country = $this->Country->find("first", array("conditions"=>
																		array("Country.id"=>$member["Member"]["country_id"])));
					$shout["Member"] = $member["Member"];
					$shout["Member"]["age"] = $this->Member->MemberProfile->getAgeV2($match["Match"]["matched_id"]);
					$shout["MemberProfile"] = $profile["MemberProfile"];
					$shout["Country"] = $country["Country"]; 			
					$shouts[] = $shout;	
				}
			}
			$this->set("response", json_encode($shouts));
			$this->render("/elements/responses", "ajax");
		}
		
	}
}