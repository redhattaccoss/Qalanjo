/**
 * Globals
 */
var QalanjoGlobal = {
	baseUrl:"",
	controller:"",
	action:"",
	params:"",
	validator:"",
	webroot:"",
	defaultHeight:"",
	scrollHeight:""
};
var QalanjoUserGlobal = {
	authUserId:""
}
function clone(object) {
	function F() {}
	F.prototype = object;
	return new F;
}
function extend(subClass, superClass) {
	var F = function() {};
	F.prototype = superClass.prototype;
	subClass.prototype = new F();
	subClass.prototype.constructor = subClass;
	subClass.superclass = superClass.prototype;
	if(superClass.prototype.constructor == Object.prototype.constructor) {
		superClass.prototype.constructor = superClass;
	}
}