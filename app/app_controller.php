<?php
/* SVN FILE: $Id$ */

/**
 * Short description for file.
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */

/**
 * This is a placeholder class.
 * Create the same file in app/app_controller.php
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.cake.libs.controller
 */
class AppController extends Controller {
	var $helpers = array('Html', 'Form', 'Javascript', "Paginator", "Ajax", "Website", "Js", "NotificationCompletor", "AgoTime", "Time");
	var $components =array("Session", "Cookie", "Notifier", "Weightable","RequestHandler", "DistanceCalculate", "Auth");
	
	
	function beforeFilter(){
		if (!$this->RequestHandler->isAjax()){
			Configure::write("debug",0);
		}else{
			Configure::write("debug",0);
		}
		$this->setup();
		//$this->boot();
		
		if ($this->action=="login"){
			$this->layout = "home_page";
			
			
		}
		//$this->load_index();

	}
	function setup(){
		if (isset($this->Auth)){
			$this->Auth->userModel = "Member";
			$this->Auth->authorize = "controller";
			$this->Auth->loginError = "Invalid password!";
			$this->Auth->fields = array("username"=>"email", "password"=>"password");
			$this->Auth->authError = "Sorry, you are lacking access.";
			$this->Auth->loginAction = array("controller"=>"Members", "action"=>"login", "plugin"=>null);
			$this->Auth->loginRedirect = array("controller"=>"Members", "action"=>"decidePath");
			$this->Auth->logoutRedirect = array("controller"=>"Members", "action"=>"signup");
			$this->Auth->autoRedirect =false;
			if ($this->name=="Pages"){
				$this->Auth->allowedActions = array("display");
				$this->handlePageController();
			}else if ($this->name=="Members"){
				if (!$this->Auth->user()){
					$this->Auth->allowedActions = array("signup","forgot_password", "reset", "login", "logout", "forgot_password_success");
				}else{
					
				}
			}else{
			
			}
			if ($this->Auth->user()){
				$this->Auth->allow("*");
				$this->load_index();
			}
			if (!$this->Session->check("Member.id")){
				if ($this->Cookie->read("Member.id")!=""){
					$this->Session->write("Member.id", $this->Cookie->read("Member.id"));
				}
			}
			if ($this->Session->check("Member.id")){
				if ($this->checkACL($this->Session->read("Member.id"))){
					$this->checkAndUpdateSubscription();
				}
			}
			
		}	
		$action = $this->action;
		if (($action!="not_allowed")||($action!="not_allowed_ajax")){
			if ($this->isAdmin($action)){
				return;	
			}
		 	if (($action == "signup")||($action == "login")){
				$this->performSignupRedirect();
		 	}
		}
	}
	
	function handlePageController(){
		if ($this->name=="Pages"){
			if ($this->RequestHandler->isAjax()){
				$this->layout = "ajax";
			}else{
				$this->layout = "about";	
			}
			$this->set("page", $this->params["pass"][0]);
			return;
		}
	}
	function isAuthorized(){
		$action = $this->action;
		if ((action!="admin_login")&&(substr($action, 0, 5)=="admin")){
			if ($this->Auth->user()){
				$role = $this->Session->read("Auth.Member.role_id");
				if ($role==4){
					return false;
				}
			}	
		}
		return true;
	}
	/**
	 * Boot process
	 */
	private function boot(){
		//$this->Session->write("Member.id", 1);
		//$this->Session->write("Member.logged", 1);
		$action = $this->action;
		$name = $this->name;
		if ($action=="not_allowed"){
			return;
		}
		if (($action=="forgot_password")||($action=="forgot_password_success")){
			return;
		}
		
		if ($action=="step"){
			if ($this->Session->check("Member.id")){
				return;
			}else{
				$this->redirect("/members/login");
			}
		}
		if (($action!="not_allowed")||($action!="not_allowed_ajax")){
			if ($this->isAdmin($action)){
				return;	
			}
		 	if (($action == "signup")||($action == "login")){
				$this->performSignupRedirect();
			}else{
				$this->performLoginRedirect ();

			}
			
		}
	}
	/**
	 * Perform login redirects ...
	 */
	private function performLoginRedirect() {
		if (!(($this->Session->check("Member.id")||$this->Session->check("Member.logged")))){
			if (!$this->RequestHandler->isAjax()){
				$this->redirect(array("controller"=>"Members",
									   "action"=>"login"));
			}
		}
	}

	/**
	 * Perform signup and login redirects ...
	 */
	private function performSignupRedirect() {
		if ($this->RequestHandler->isGet()){
			if ($this->Session->check("Member.logged")){
				$this->redirect(array("controller"=>"Members",
									   "action"=>"index"));
			}
			if ($this->Session->check("Member.id")){
				if ($this->Session->check("process")){
					if ($this->Session->read("process")=="signup"){
						return;
					}
					$this->redirect(array("controller"=>"Members",
									   "action"=>"index"));
				}
	
			}
		}
	}

	/**
	 * check if action is admin ...
	 * @param action
	 */
	private function isAdmin($action) {
		return substr($action, 0, 5)=="admin";
	}

	/**
	 * Force SSL connection ...
	 */
	function forceSSL(){
		$this->redirect('https://' . $_SERVER['SERVER_NAME'] . $this->here);
	}
	

	/**
	 * Load the index. It is used for refreshing as well as for full reloads ...
	 */
	protected function load_index($option="quick") {
		if ($this->name!="members"){
			$this->loadModel("Member");
		}
		$member_id = $this->Session->read ( "Member.id" );
		$member = $this->Member->read ( null, $member_id );
		$this->loadModel("SubscriptionType");
		$this->loadModel("SubscriptionTransaction");
		$subscription = $this->SubscriptionTransaction->find("first", array("conditions"=>array("SubscriptionTransaction.member_id"=>$member_id, "SubscriptionTransaction.expired"=>0)));
		if ($option=="all"){
			$answers = $this->Member->InMyOwnWordsAnswer->shuffle($member_id);
			$this->process_load_notification($member_id);
			$this->set("answers", $answers);
			//$this->set("weights", $this->Weightable->getTopicOpeners($member_id, 3));
		}
		if (($this->name=="Gifts")||($this->action=="buy")){
			$this->set ( "user", $member );	
		}else{
			$this->set ( "member", $member );
		}
		
		$role = $this->Member->getRole($member_id);
		$this->set("role", $role);
		if (!empty($subscription)){
			$this->set("subscription", $subscription);
		}
	}

	/**
	 * 
	 * load list of notifications ...
	 * @param $member_id
	 */
	protected function process_load_notification($member_id){
		$this->loadModel("Notification");
		$notifications = $this->Notification->find("all",array("conditions"=>array("Member.id"=>$member_id), "order"=>"Notification.created desc", "limit"=>10));
		$this->set ("notifications", $notifications);
	}
	
	/**
	 * Checks for ACL ...
	 * @param int $member_id The member
	 */
	private function checkACL($member_id){
		$action = $this->action;
		$controller = $this->name;
		if ($controller!="Members"){
			$this->loadModel("Member");
		}
		$this->loadModel("Action");
		$this->loadModel("Role");
		$this->loadModel("Location");
		$role_id = $this->Member->getRole($member_id);	
		$location_id = $this->Location->getLocationId($controller);
		return $this->Role->isAllowed($role_id, $action, $location_id);

	}

	/**
	 * Checks and updates subscription ...
	 */
	private function checkAndUpdateSubscription(){
		if ($this->name!="Members"){
			$this->loadModel("Member");
			
		}
		$this->loadModel("SubscriptionTransaction");
		$member_id = $this->Session->read("Member.id");
		
		$role_id = $this->Member->getRole($member_id);
		
		if (!(($role_id==1)||($role_id==4))){
			$result = $this->SubscriptionTransaction->checkIfSubscribeOrExpired($member_id);
			if (!$result){
				$this->SubscriptionTransaction->expireSubscription($member_id);
				$this->Member->updateRole(2, $member_id);
			}
		}
	}
	
	/**
	 * Not allowed ajax ...
	 */
	function not_allowed_ajax(){
		$this->render("/elements/not_allowed", "ajax");
	}
	
	/**
	 * Not allowed redirect ...
	 */
	function not_allowed(){
		$this->load_index();
		$this->set("process", "wa");
		$this->render("/elements/not_allowed", "full_block_new");
	}
	
	
	/**
	 * (non-PHPdoc)
	 * @see Controller::beforeRender()
	 */
	function beforeRender() {
		if ($this->name=="CakeError"){
			Configure::write("debug",0);
			$this->layout = "error_layout";
		}
		$gift_path = Configure::read('gift_path');
		$qpath = Configure::read('upload_path');
		$uploadsPath = Configure::read('uploadsPath');
		$fullImagePath = Configure::read('fullImagePath');
		$this->set(compact('gift_path', 'qpath', 'uploadsPath', 'fullImagePath'));
	}
	
	
}
?>