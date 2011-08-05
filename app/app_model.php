<?php
App::import("Vendor", "dgcrypt");
class AppModel extends Model{
	 var $assocs = array(); 
	 var $actsAs = array('Containable');
	function getRandom($limit=-1){
		if ($limit==-1){
			return $this->find("all");
		}else{
			return $this->find("all", array("limit"=>$limit, "order"=>"RAND()"));
		}
	}

	function getList($limit=-1){
		if ($limit!=-1){
			return $this->find("all", array("limit"=>$limit));	
		}else{
			return $this->find("all");
		}
	}
	
		
   function getActivationHash(){
         if (!isset($this->id)) {
          	return false;
         }
        return substr(Security::hash(Configure::read("Security.salt") . $this->field("created") . date("Ymd")), 0, 8);
   }
   
   function edit($data, $validation){
		$this->set($data);
		$validates = $this->validates(array(
										"fieldList"=>$validation)
									  );
									  
		if ($validates){
			
			return $this->save($this->data, false);
		}
		
		return $validates;
	}
	
	
	
	
	
	function filterBadWords($str){
	
	 $badwords=array( "[naughty word removed]", "[naughty word removed]", "[no swearing please]", "[oops]", "[oops]", "[naughty word removed]", "[oops]", "[oops]" );
	 $replacements=array( "[naughty word removed]", "[how wude!]", "[no swearing please]" );
	
	 for($i=0;$i < sizeof($badwords);$i++){
	  srand((double)microtime()*1000000); 
	  $rand_key = (rand()%sizeof($replacements));
	  $str=eregi_replace($badwords[$i], $replacements[$rand_key], $str);
	 }
	 return $str;
	}
	
	function removeHasMany(){
		$this->hasMany = array();
	}
	
	function expects($array) { 
        foreach ($array as $assoc) { 
            $this->bindModel( 
                array($this->assocs[$assoc]['type'] => 
                    array($assoc => $this->assocs[$assoc]))); 
        } 
    } 
    
    function minlen($check, $number){
    	$value = array_values($check);
		$value = $value[0];
		return $value>=$number;
    }
    
    function maxlen($check, $number){
    	$value = array_values($check);
		$value = $value[0];
		return $value<=$number;
    }
    
    
}