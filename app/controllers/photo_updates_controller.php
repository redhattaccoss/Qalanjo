<?php

class PhotoUpdatesController extends AppController {
	var $name = 'PhotoUpdates';
	var $helpers = array('Time');
	
	function __construct(){
		parent::__construct();
		$this->components[] = "InformationMerger";
	}
	
	function index() {
		$this->layout = "blue_full_block";
		
		$member_id = $this->Session->read('Member.id');
		$updates = $this->PhotoUpdate->getUpdates($member_id);
		$this->set('updates', $updates);
	}
	
	/**
	 * Load Updates ...
	 * @deprecated
	 */
	function loadUpdates() {
		if($this->RequestHandler->isAjax()) {
			$this->autoRender = false;
			$this->layout = 'ajax';
			$this->loadModel('Album');
			$member_id = $this->Session->read('Member.id');
			//get updates
			if($photoUpdates = $this->PhotoUpdate->getUpdates($member_id)) {
				$album_id = $photoUpdates[0]['Photo']['album_id'];
				$albumName = $this->Album->getAlbumInfo($album_id, 'name');
				$this->set('photoUpdates', $photoUpdates);
				$this->set('member_id', $member_id);
				$this->set('albumName', $albumName);
				$this->set('album_id', $album_id);
				$hasUpdate = true;
			} else { //no updates yet
				$hasUpdate = false;
			}
			$this->set('hasUpdate', $hasUpdate);
			$this->render('/elements/blue/members/index/photo-update-content', 'ajax');
		}
	}
	
	function load_updates_json($memberId = null){
		$this->loadModel("Photo");
		$this->loadModel("Album");
		
			if ($memberId == null){
				$memberId = $this->Session->read("Member.id");
				$approach = "match";
			}else{
				$approach = "individual";
			}
			
			$result = array();
			
			
			if ($approach=="individual"){
				$updates = $this->PhotoUpdate->getUpdates($memberId);
				foreach($updates as $update){
					$album_id = $updates[0]['Photo']['album_id'];
					$albumName = $this->Album->getAlbumInfo($album_id, 'name');
					$updates["albumName"] = $albumName ;
					$result[] = $updates;					
				}
			}else{
				$matches = $this->Member->Match->getRandomMatch($memberId, "all", array("Match.matched_id"), 30);
				$updates = array();
				$hasUpdates = array();
				foreach($matches as $match){
					if ($this->PhotoUpdate->hasUpdate($match["Match"]["matched_id"])){
						$hasUpdates[] = $match;			
					}
				}
				if (!empty($hasUpdates)){		
					for($i=0;$i<10;$i++){
						if (count($hasUpdates)>=30){
							$index = rand(0, 29);
						}else{
							$index = rand(0, count($hasUpdates)-1);
						}
						$match = $hasUpdates[$index];
						$update = $this->PhotoUpdate->loadUpdate($match["Match"]["matched_id"]);
						$onUpdate = false;
						foreach($updates as $temp){
							if ($temp["PhotoUpdate"]["id"]==$update["PhotoUpdate"]["id"]){
								$onUpdate = true;
								break;
							}
						}
						if ($onUpdate){
							continue;
						}
						if ($update["PhotoUpdate"]["profile"]=="0"){
							$update["Photos"] = $this->Photo->find("all", array("conditions"=>array("Photo.album_id"=>$update["PhotoUpdate"]["album_id"]), "recursive"=>-1));
							$albumName = $this->Album->getAlbumInfo($update["PhotoUpdate"]["album_id"], 'name');
							$update["albumName"] = $albumName ;
						}
						$update = $this->InformationMerger->merge($update,$match["Match"]["matched_id"]);													
						$updates[] = $update;					
					}
				}	
				$this->set("updates", $updates);	
				$this->layout = "ajax";

		}
	}
	
	
}