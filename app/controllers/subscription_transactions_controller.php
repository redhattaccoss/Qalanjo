<?php
class SubscriptionTransactionsController extends AppController {

	var $name = 'SubscriptionTransactions';

	function __construct(){
		parent::__construct();
		$this->components[] = "PaypalService";
		$this->components[] = "Security";
	}
	function beforeFilter(){
		parent::beforeFilter();
		$this->Security->blackHoleCallback = "forceSSL";
		$this->Security->requireSecure('checkout');
	}
	
	
	/**
	 * Details of Subscription Types
	 */
	
	function details(){
		if (!empty($this->data)){
			$this->Session->write("Subscription.details", $this->data);
			$this->redirect(array("action"=>"checkout"));
		}
		$this->layout = "blue_full_block";
		$this->loadModel("CreditType");
		$this->loadModel("SubscriptionType");
		$types = $this->SubscriptionType->find("all", array("recursive"=>-1));
		$this->set("process", "subscribe_details");
		$this->set("types", $types);
	}
	
	function details_quick(){
		if (!empty($this->data)){
			$this->Session->write("Subscription.details", $this->data);
			$this->redirect(array("action"=>"checkout"));
		}
	}
	
	function checkout_paypal($type=-1){
		$this->loadModel("SubscriptionType");
		if ($type!=-1){
			$type = $this->SubscriptionType->find("first", array("conditions"=>array("SubscriptionType.id"=>$type), "recursive"=>-1));
			$paymentInfo["Payment"]["paymentType"] = "Sale";
			$paymentInfo["Payment"]["currencyCode"] = "USD";
			$paymentInfo["Payment"]["amount"] = $type["SubscriptionType"]["price"];
			$paymentInfo["Payment"]["description"] = $type["SubscriptionType"]["name"];
			$key = Security::generateAuthKey( );
			$this->Session->write("Payment.transaction", $key);
			$this->Session->write("Payment.type", $type);
			$this->Session->write("Payment.amount", $type["SubscriptionType"]["price"]);
			$paymentInfo["Payment"]["returnURL"] ="http://".$_SERVER['SERVER_NAME'] . $this->base."/subscription_transactions/success_paypal/".$key;
			$paymentInfo["Payment"]["cancelURL"] ="http://".$_SERVER['SERVER_NAME'] . $this->base."/subscription_transactions/cancel_paypal/".$key;
			$res = $this->PaypalService->callShortcutExpressCheckout($paymentInfo);
			debug($res);
			if ($this->Session->check("TOKEN")){
				$this->PaypalService->redirectToPaypal($this->Session->read("TOKEN"));
			}else{
				$this->redirect("/subscribe");
			}
		}else{
			$this->redirect("/subscribe");
		}
	}
	
	
	function checkout_recur_paypal($type=-1){
		$this->loadModel("SubscriptionType");
		$this->Session->write("TOKEN", null);
		if ($type!=-1){
			$type = $this->SubscriptionType->find("first", array("conditions"=>array("SubscriptionType.id"=>$type), "recursive"=>-1));
			$paymentInfo["Payment"]["paymentType"] = "Sale";
			$paymentInfo["Payment"]["currencyCode"] = "USD";
			$paymentInfo["Payment"]["amount"] = $type["SubscriptionType"]["price"];
			$paymentInfo["Payment"]["description"] = $type["SubscriptionType"]["name"];
			$key = Security::generateAuthKey( );
			$this->Session->write("Payment.transaction", $key);
			$this->Session->write("Payment.type", $type);
			$this->Session->write("Payment.amount", $type["SubscriptionType"]["price"]);
			$paymentInfo["Payment"]["returnURL"] ="https://".$_SERVER['SERVER_NAME'] . $this->base."/subscription_transactions/success_recur_paypal/".$key;
			$paymentInfo["Payment"]["cancelURL"] ="https://".$_SERVER['SERVER_NAME'] . $this->base."/subscription_transactions/cancel_paypal/".$key;
			$paymentInfo["Payment"]["startDate"] = urlencode(date("Y-M-d")."T".date("h:m:s")."Z");
			
			$this->PaypalService->recurringPayment($paymentInfo);
			if ($this->Session->check("TOKEN")){
				$this->PaypalService->redirectToPaypal($this->Session->read("TOKEN"));
			}else{
				$this->redirect("/subscribe");
			}
		}else{
			$this->redirect("/subscribe");
		}
	}
	function success_paypal($key){
		if ($this->Session->check("TOKEN")){
			$res = $this->PaypalService->getShippingDetails($this->Session->read("TOKEN"));
			if ($this->Session->check("Payment.payerId")){
				$result = $this->PaypalService->confirmPayment($this->Session->read("Payment.amount"));
				if ($result["ACK"]=="Success"){
					$this->data["SubscriptionTransaction"]["payment_method_id"] = 2;
					$this->data["SubscriptionTransaction"]["transaction_code"] = $result["PAYMENTINFO_0_TRANSACTIONID"];
					$this->data["SubscriptionTransaction"]["member_id"] = $this->Session->read("Member.id");
					$type =$this->Session->read("Payment.type");
					$this->data["SubscriptionTransaction"]["subscription_type_id"] = $type["SubscriptionType"]["id"];
					$this->Session->write("transaction", null);
					
					$this->SubscriptionTransaction->begin($this->SubscriptionTransaction);
					$this->SubscriptionTransaction->create($this->data);						
					if ($this->SubscriptionTransaction->save($this->data, false)){
						$this->loadModel("Member");
						$member_id = $this->Session->read("Member.id");
						$this->Member->updateRole(3, $member_id);
						$this->Session->setFlash("Transaction has been processed", "default", array("class"=>"success"));
						$this->redirect("http://".$_SERVER['SERVER_NAME'] . $this->base."/subscription_transactions/success");
						$this->SubscriptionTransaction->commit($this->SubscriptionTransaction);
					}else{
						$this->SubscriptionTransaction->rollback($this->SubscriptionTransaction);
					}
				}else{			
					$this->redirect("/subscribe");
				}
			}else{
				$this->redirect("/subscribe");
			}
		}else{
			$this->redirect("/subscribe");
		}
		
	}
	
	
	function success_recur_paypal(){
		if ($this->Session->check("TOKEN")){
			$this->PaypalService->getShippingDetails($this->Session->read("TOKEN"));
			if ($this->Session->check("Payment.payerId")){
				$res = $this->PaypalService->confirmPayment($this->Session->read("Payment.amount"));
				if ($result["ACK"]=="Success"){
					$result = $this->PaypalService->createRecurringProfile($this->Session->read("TOKEN"));
					if (!empty($result)){
						$this->data["SubscriptionTransaction"]["recurring_profile_id"] = $result["PROFILEID"];
						$this->data["SubscriptionTransaction"]["payment_method_id"] = 2;
						$this->data["SubscriptionTransaction"]["transaction_code"] = "";
						$this->data["SubscriptionTransaction"]["member_id"] = $this->Session->read("Member.id");
						$type =$this->Session->read("type");
						$this->data["SubscriptionTransaction"]["subscription_type_id"] = $type["SubscriptionType"]["id"];
						$this->Session->write("transaction", null);
						$this->SubscriptionTransaction->create($this->data);						
						if ($this->SubscriptionTransaction->save($this->data, false)){
							$this->loadModel("Member");
							$member_id = $this->Session->read("Member.id");
							$this->Member->updateRole(3, $member_id);
							$this->Session->setFlash("Transaction has been processed", "default", array("class"=>"success"));
							$this->redirect("http://".$_SERVER['SERVER_NAME'] . $this->base."/subscription_transactions/success");
						}
					}
				}else{			
					$this->redirect("/subscribe");
				}
			}else{
				
				$this->redirect("/subscribe");
			}
		}else{		
			$this->redirect("/subscribe");
		}
	}
	
	function cancel_paypal(){
		$this->redirect("/subscribe");
	}
	
	function checkout($type = -1){
		$this->layout = "blue_full_block";
		$this->loadModel("SubscriptionType");
		$this->loadModel("CreditType");
		$this->loadModel("Country");
		$this->loadModel("Member");
		if (!empty($this->data)){
			$this->Session->write("SubscriptionResult", null);
			if (!$this->Session->check("SubscriptionResult")){
				if ($this->data["SubscriptionTransaction"]["credit_type_id"]!=-1){
					$payment = $this->toCCPayment();
					$result = $this->PaypalService->directPayment($payment);
					if ($result["ACK"]=="Success"){
						$this->Session->write("SubscriptionResult", $result);
						$this->data["SubscriptionTransaction"]["payment_method_id"] = 1;
						$this->data["SubscriptionTransaction"]["transaction_code"] = $result["TRANSACTIONID"];
						$this->data["SubscriptionTransaction"]["subscription_type_id"] = $type;
						$this->data["SubscriptionTransaction"]["member_id"] = $this->Session->read("Member.id");
						$this->SubscriptionTransaction->create($this->data);						
						if ($this->SubscriptionTransaction->save($this->data, false)){
							$this->loadModel("Member");
							$member_id = $this->Session->read("Member.id");
							$this->Member->updateRole(3, $member_id);
							$this->Session->setFlash("Transaction has been processed", "default", array("class"=>"success"));
							$this->redirect("http://".$_SERVER['SERVER_NAME'] . $this->base."/subscription_transactions/success");
						}
					}else{
						$this->Session->setFlash($result["L_LONGMESSAGE0"], "default", array("class"=>"error"));
						$this->redirect("http://".$_SERVER['SERVER_NAME'] . $this->base."/subscription_transactions/error");
					}	
				}else{
					
				}
			}else{
				$this->redirect("http://".$_SERVER['SERVER_NAME'] . $this->base."/subscription_transactions/success");
			}
		}
		if ($type!=-1){
			$selectedSubscription = $this->SubscriptionType->find("first",array("conditions"=>array("SubscriptionType.id"=>$type)));
			$this->set("selectedSubscription", $selectedSubscription);
			$member_id = $this->Session->read("Member.id");
			$member = $this->Member->find("first", array("conditions"=>array("Member.id"=>$member_id), "fields"=>array("lastname", "firstname", "middlename" , "zipcode", "address1", "city", "state", "id", "email", "country_code", "contact_number")));
			$credit_cards = $this->CreditType->find ("all", array("recursive"=>-1));
			$countries = $this->Country->find ( "list", array ("fields" => array ("id", "name" ), "order" => "name", "recursive"=>-1 ) );
			$this->set("process", $this->action);
			$this->set("credit_cards", $credit_cards);
			$this->set("countries", $countries);
		}else{
			$this->redirect(array("action"=>"details"));	
		}
	}
	
	/**
	 * transform $this->data to a cc payment friendly object ...
	 */
	private function toCCPayment(){
		$this->loadModel("CreditType");	
		$this->loadModel("Country");
		$payment["Payment"]["amount"] = $this->data["SubscriptionTransaction"]["price"];
		$payment["Payment"]["description"] = $this->data["SubscriptionTransaction"]["description"];
		$payment["CreditCard"] = $this->data["CreditCard"];
		$payment["Payment"]["currencyCode"] = "USD";
		$payment["Payment"]["paymentType"] = "Sale";
		$type = $this->CreditType->find("first", array("conditions"=>array("CreditType.id"=>$this->data["SubscriptionTransaction"]["credit_type_id"])));
		$country = $this->Country->find("first", array("conditions"=>array("Country.id"=>$this->data["CreditCard"]["country_id"])));
		$payment["Payment"]["creditCardType"] = $type["CreditType"]["paypal_name"];
		$payment["Payment"]["countryCode"] = $country["Country"]["country_code"];
		return $payment;
	}
	
	
	function success(){
		$this->layout = "blue_full_block";
	}
	
	function error(){
		$this->layout = "blue_full_block";
	}
	
	
	/*function already_subscribe(){
		if ($this->RequestHandler->isAjax()){
			$this->layout = "ajax";
			if ($this->Session->check("Member.id")){
				$member_id = $this->Session->read("Member.id");
				$count = $this->SubscriptionTransaction->find("count", array("conditions"=>array("SubscriptionTransaction.member_id"=>$member_id, "expired"=>0)));
				if ($count==0){	
					$this->set("response", "false");
				}else{
					$this->set("response", "true");
				}
				$this->set("response", "true");
				
			}else{
				$this->set("response", "invalid");
			}
		}else{
			$this->set("response", "invalid");
		}
		$this->render("/elements/responses", "ajax");
		
	}*/
	
	function already_subscribe(){
		if($this->RequestHandler->isAjax()) {
			$this->layout = "ajax";
			
					$this->set("response", "true");
		
		}
	}
	
	function drop(){
		$result = $this->passedArgs["result"];
	}
	
	function check_subscription() {	
		if($this->RequestHandler->isAjax()) {
			Configure::write('debug', 0);
			$this->layout = 'ajax';
			$this->autoRender = false;

			if($this->Session->check('Member.id')) {// check if logged in
				$member = $this->SubscriptionTransaction->find('first', array(
												'conditions'=>array(
													'SubscriptionTransaction.member_id'=>$this->Session->read('Member.id'))));
				
				if($member['SubscriptionTransaction']['expired'] == 0) {
					echo 'valid';
				} else {
					echo 'invalid';
				}		
			} else { // not logged in
				echo 'logout';
			}

		}
	}

}
?>