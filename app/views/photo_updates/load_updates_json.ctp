<?php
$temps = array();
foreach($updates as $update){
	$update["PhotoUpdate"]["created"] = $time->timeAgoInWords($update["PhotoUpdate"]["created"]);
	$temp2 = array();
	if (isset($update["Photos"])){
		foreach($update["Photos"] as $photo){
			$temp2[] = $photo["Photo"]["picture_path"];
		}
	}
	if (isset($update["Photos"])){
		unset($update["Photos"]);
		$update["Photos"] = $temp2;
	}
	$temps[] = $update;
}
debug($temps);
echo json_encode($temps);