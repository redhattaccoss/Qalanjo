/**
 * Custom Validators
 */
var CustomValidators = {
	defaultSelectedCombo:function(value){
		return value!="-1";
	},
	/**
	 * Validates for default selected state
	 */
	defaultSelectedState:function(key, value){
		tag = key+" :selected";
		if($(tag).text() == 'United States') {
			return value!="0";	
		}
		return true;
	}	
}