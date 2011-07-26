<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'members', 'action' => 'signup'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/aboutus', array('controller' => 'pages', 'action' => 'display', "aboutus"));
	Router::connect('/company_overview', array('controller' => 'pages', 'action' => 'display', 'company_overview'));
	
	Router::connect('/terms', array('controller' => 'pages', 'action' => 'display', "terms"));
	Router::connect('/why', array('controller' => 'pages', 'action' => 'display', "why"));
	Router::connect('/affiliates', array('controller' => 'pages', 'action' => 'display', "affiliates"));
	Router::connect('/contactus', array('controller' => 'pages', 'action' => 'display', "contactus"));
	Router::connect('/team', array('controller' => 'pages', 'action' => 'display', "team"));
	Router::connect('/privacy', array('controller' => 'pages', 'action' => 'display', "privacy"));
	Router::connect('/services', array('controller' => 'pages', 'action' => 'display', "services"));
	
	Router::connect("/login", array("controller"=>"members", "action"=>"login"));
	Router::connect("/logout", array("controller"=>"members", "action"=>"logout"));
	Router::connect("/signup", array("controller"=>"members", "action"=>"signup_process"));
	Router::connect("/questionnaire/*", array("controller"=>"attributes", "action"=>"questionnaire"));
	Router::connect("/forgot_password", array("controller"=>"members", "action"=>"forgot_password"));
	Router::connect("/reset", array("controller"=>"members", "action"=>"reset"));
	
	Router::connect("/welcome", array("controller"=>"Members", "action"=>"index"));
	Router::connect("/signup_upload", array("controller"=>"MemberProfiles", "action"=>"signup_upload"));
	Router::connect("/profile_completion/*", array("controller"=>"members", "action"=>"profile_completion"));
	Router::connect("/profile/*", array("controller"=>"members", "action"=>"profile"));
	Router::connect("/activate/*", array("controller"=>"members", "action"=>"link_activation"));
	Router::connect("/inbox/*", array("controller"=>"ReceiveMessages", "action"=>"inbox"));
	Router::connect("/subscribe", array("controller"=>"SubscriptionTransactions", "action"=>"details"));
	Router::connect("/checkout/*", array("controller"=>"SubscriptionTransactions", "action"=>"checkout"));
	Router::connect("/checkout_paypal/*", array("controller"=>"SubscriptionTransactions", "action"=>"checkout_paypal"));
	Router::connect("/qpoints/checkout/*", array("controller"=>"CoinAvailTransactions", "action"=>"checkout"));
	Router::connect("/qpoints/checkout_paypal/*", array("controller"=>"CoinAvailTransactions", "action"=>"checkout_paypal"));	
	Router::connect("/qpoints/success_paypal/*", array("controller"=>"CoinAvailTransactions", "action"=>"success_paypal"));
	Router::connect("/qpoints/cancel_paypal/*", array("controller"=>"CoinAvailTransactions", "action"=>"cancel_paypal"));	
	Router::connect("/qpoints/buy/*", array("controller"=>"CoinAvailTransactions", "action"=>"buy"));
?>