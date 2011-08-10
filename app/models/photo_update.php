<?php

class PhotoUpdate extends AppModel {
	var $name = 'PhotoUpdate';
	
	var $belongsTo = array(
		'Album' => array(
			'className' => 'Album',
			'foreignKey' => 'album_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	//get the photos update.. 
	//set profile to 1 to get the updates of profile album
	function getUpdates($member_id, $profile = 0, $limit = 5) {
		$update = $this->find('first', array(
						'conditions'=> array(
							'PhotoUpdate.member_id'=>$member_id,
							'PhotoUpdate.profile'=> $profile),
						'fields'=> array(
							'PhotoUpdate.created',
							'PhotoUpdate.album_id'),
						'recursive'=>-1,
						'order'=> 'PhotoUpdate.created DESC'));
		
		if(!empty($update)) {
			$photoUpdates = $this->Album->Photo->find('all', array(
								'conditions'=> array(
									'Photo.created'=> $update['PhotoUpdate']['created'],
									'Photo.album_id'=> $update['PhotoUpdate']['album_id']),
								'recursive'=>-1,
								'limit'=>$limit));
			return (!empty($photoUpdates) ? $photoUpdates : false);
		} else {
			return false; // no updates yet
		}
	}
	
	function deleteUpdate($album_id, $member_id) {
		
	}
	
	
/**
	 * Load Random photo update of a member ...
	 * @param $memberId The member
	 */
	function loadUpdate($memberId){
		$dateFrom = date("Y-m-d h:i:s", strtotime("-3 days"));
		$dateTo = date("Y-m-d h:i:s");
		return $this->find("first", array("conditions"=>array("PhotoUpdate.member_id"=>$memberId, "PhotoUpdate.created BETWEEN '".$dateFrom."' AND '".$dateTo."'"),
									"order"=>"RAND()"));
	}
	
	/**
	 * Check if the user has a photo update ...
	 * @param $memberId
	 */
	function hasUpdate($memberId){
		return $this->loadUpdate($memberId)!=null;		
	}

}