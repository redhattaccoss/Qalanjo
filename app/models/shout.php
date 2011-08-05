<?php
class Shout extends AppModel {
	var $name = 'Shout';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Member' => array(
			'className' => 'Member',
			'foreignKey' => 'member_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	/**
	 * Load Random shout of a member ...
	 * @param $memberId The member
	 */
	function loadRandomShout($memberId){
		$dateFrom = date("Y-m-d h:i:s", strtotime("-3 days"));
		$dateTo = date("Y-m-d h:i:s");
		return $this->find("first", array("conditions"=>array("Shout.member_id"=>$memberId, "Shout.created BETWEEN '".$dateFrom."' AND '".$dateTo."'"),
									"order"=>"RAND()", "recursive"=>-1));
	}
}
?>