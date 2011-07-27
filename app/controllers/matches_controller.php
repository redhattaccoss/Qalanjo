<?php
App::import("Sanitize");
class MatchesController extends AppController {

	var $name = 'Matches';

	function __construct(){
		parent::__construct();
		$this->components[] = "MatchMaker";
	}
	function daily_matches($count = 100){
		$this->layout = "ajax";
		$member_id = $this->Session->read("Member.id");
		$matches = $this->Match->find("all",array("conditions"=>array("Match.member_id"=>$member_id, "DATE(Match.created)=CURDATE()", "Match.archive"=>0), "order"=>array("Match.compatibility desc", "Match.created desc"), "limit"=>$count, "recursive"=>-1));  
		$this->loadModel("MemberProfile");
		$members = array();
		foreach($matches as $match){	
			$member = $this->Match->Member->find("first", array("conditions"=>array("Member.id"=>$match["Match"]["matched_id"])));
			$age = $this->Match->Member->MemberProfile->getAgeV2($member["Member"]["id"]);
			$member["Member"]["age"] = $age;
			$members[] = $member;	
		}
		
		$this->set("matches", $members);
	}
	/**
	 * Index for matches ...
	 * @param $option
	 */
	function index(){
		$this->layout = "blue_full_block";
		$member_id = $this->Session->read("Member.id");
		$member = $this->Match->Member->getMemberForMatching($member_id);	
		$this->MatchMaker->getCompatibleCandidates($member, array("action"=>"all"));
		$role_id = $this->Match->Member->getRole($member_id);
		$this->set("role_id", $role_id);
	}
	
	/**
	 * 
	 * Archive matches ...
	 * @param $view_member_id
	 */
	function archive($view_member_id){
		$member_id = $this->Session->read("Member.id");
		if ($this->Match->archive($view_member_id, $member_id)){
			$this->Session->setFlash("The match has been archived");
		}else{
			$this->Session->setFlash("The match has not been archived");
		}
		$this->redirect(array("controller"=>"Matches", "action"=>"index"));
	}
	
	
	
	function loadMatches($type=1){
		$this->loadModel("Country");
		$this->loadModel("MemberProfile");
		if (isset($this->passedArgs["start"])){
			$start = $this->passedArgs["start"];
		}else{
			$start = 0;
		}
		if (isset($this->passedArgs["limit"])){
			$limit = $this->passedArgs["limit"];
		}else{
			$limit = 20;
		}
		$member_id = $this->Session->read("Member.id");
		if ($type!=3){
			$tempmatches = $this->Match->getDailyMatches($member_id, $start, $limit, $type);
		}else{
			$tempmatches = $this->Match->getArchivedMatches($member_id, $start, $limit);
		}
		$matches = array();
		
		foreach($tempmatches as $match){
			$country = $this->Country->find("first", array("conditions"=>array("Country.id"=>$match["Matched"]["country_id"]), "recursive"=>-1));
			$match["Country"] = $country["Country"];
			$match["Matched"]["age"] = $this->MemberProfile->getAgeV2($member_id);
			$profile = $this->MemberProfile->find("first", array("conditions"=>array("MemberProfile.member_id"=>$member_id), "recursive"=>-1));
			$match["MemberProfile"] = $profile["MemberProfile"];
			$matches[] = $match;
		}
		
		
		$this->set("matches", $matches);
		$this->set("type", "new");
		$this->render("/elements/blue/matches/index/match_list", "ajax");
	}
	
	
	function daily_matches_paginate(){
		$this->layout = "ajax";
		$member_id = $this->Session->read("Member.id");
		$this->paginate =  array("conditions"=>array("Match.member_id"=>$member_id, "DATE(Match.created) = CURDATE()"),
								"limit"=>10, "recursive"=>2		
		);
		$this->set("matches", $this->paginate());
	}
	
	function top_matches(){
		$this->loadMatches();
		$this->layout = "ajax";
		$member_id = $this->Session->read("Member.id");
		$this->paginate =  array("conditions"=>array("Match.member_id"=>$member_id),
								"limit"=>10, "recursive"=>2, "order"=>"compatibility desc"		
		);
		$this->set("matches", $this->paginate());
		$this->render("daily_matches_paginate", "ajax");
	}
	
	
	function new_matches(){
		$this->layout = "ajax";
	}
	/**
	 * Search for the available matches of the user ...
	 * @param $type The type of searching
	 * @param $render The render type
	 */
	function search($type=1,$render = 1){	
		$this->data = Sanitize::clean($this->data);
		$member_id = $this->Session->read("Member.id");
		debug($this->data);
		$tempmatches = $this->Match->searchMatches($member_id, $this->data["Match"]["search"],$type);
		$this->searchAndRender ( $render, $tempmatches);
	}
	function loadMatchesForSelect(){
		$member_id = $this->Session->read("Member.id");
		$tempmatches = $this->Match->getDailyMatches($member_id, 0, 20, 4);
		$this->searchAndRender (2, $tempmatches);
	}
	
	/**
	 * Search and render for matches...
	 * @param render Render Type
	 * @param tempmatches the matches
	 */
	private function searchAndRender($render, $tempmatches) {
		$this->loadModel("Country");
		$this->loadModel("MemberProfile");
		$member_id = $this->Session->read("Member.id");
		$matches = array();
		foreach($tempmatches as $match){
			$country = $this->Country->find("first", array("conditions"=>array("Country.id"=>$match["Matched"]["country_id"]), "recursive"=>-1));
			$match["Country"] = $country["Country"];
			$match["Matched"]["age"] = $this->MemberProfile->getAgeV2($member_id);
			$profile = $this->MemberProfile->find("first", array("conditions"=>array("MemberProfile.member_id"=>$member_id), "recursive"=>-1));
			$match["MemberProfile"] = $profile["MemberProfile"];
			$matches[] = $match;
		}
		$this->set("matches", $matches);
		$this->set("type", "new");
		if ($render==1){
			$this->render("/elements/blue/matches/index/match_list", "ajax");
		}else{
			$this->render("/elements/blue/matches/inbox/match_list", "ajax");
		}
	}

	
	
	/**
	 * Load count of matches
	 */
	function loadMatchCount($type=1){
		if ($this->RequestHandler->isAjax()){
			$member_id = $this->Session->read("Member.id");
			$count = $this->Match->countMatch($member_id, $type);
			$this->set("response", $count);
			$this->render("/elements/responses", "ajax");
		}
	}
	
	function load_matches(){
		$member_id = $this->Session->read("Member.id");
		$tempMatches = $this->Match->getMatches($member_id);
		$matches = array();
		$this->loadModel("MemberProfile");
		foreach($tempMatches as $tempMatch){
			$profile = $this->MemberProfile->find("first", array("MemberProfile.member_id"=>$tempMatch["Matched"]["id"]));
			$tempMatch["Matched"]["MemberProfile"] = $profile["MemberProfile"];
			$matches[] = $tempMatch;
		}
		$this->set(compact("matches"));
	}
	
	
	function loadMatchesJSON($member_id){
		if ($this->RequestHandler->isAjax()){
			$member_id = $this->Session->read("Member.id");
			$matches = $this->Match->find("all", 
										array("conditions"=>array("Match.member_id"=>$member_id),
										"recursive"=>1));
			$this->set("response", json_encode($matches));
			$this->render("/elements/response", "ajax");
		}
	}
}
?>