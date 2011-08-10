<?php
class InformationMergerComponent extends Object{
	/**
	 * The controller ...
	 * @var AppController
	 */
	private $controller;
	function initialize($controller, $settings = array()){
		$this->controller = $controller;
		$this->controller->loadModel("Member");
		$this->controller->loadModel("Country");
	}
	
	/**
	 * Returns merge information for Member ...
	 * @param Array $data The data
	 * @param $memberId Member Information
	 */
	public function merge($data, $memberId){
		$member = $this->controller->Member->find("first", 
										array("conditions"=>array("Member.id"=>$memberId),
											  "fields"=>array("id", "lastname", "firstname", "state", "country_id", "address1"),
											   "recursive"=>-1));
			
		$profile = $this->controller->Member->MemberProfile->find("first", 
														array("conditions"=>array("MemberProfile.member_id"=>$memberId),
															  "recursive"=>-1,
															   "fields"=>array("picture_path")));																
		$country = $this->controller->Country->find("first", array("conditions"=>
															array("Country.id"=>$member["Member"]["country_id"])));
		$data["Member"] = $member["Member"];
		$data["Member"]["age"] = $this->controller->Member->MemberProfile->getAgeV2($memberId);
		$data["MemberProfile"] = $profile["MemberProfile"];
		$data["Country"] = $country["Country"];
		return $data; 																			
	}
}