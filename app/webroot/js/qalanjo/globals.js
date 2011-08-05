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
function copyPrototype(descendant, parent) {
    var sConstructor = parent.toString();
    var aMatch = sConstructor.match( /\s*function (.*)\(/ );
    if ( aMatch != null ) { descendant.prototype[aMatch[1]] = parent; }
    for (var m in parent.prototype) {
        descendant.prototype[m] = parent.prototype[m];
    }
};