<?php
class PaypalServiceComponent extends Object {
	private $controller;
	private $apiUsername;
	private $apiPassword;
	private $apiSignature;
	private $apiEndPoint;
	private $version;
	private $subject;
	private $authToken;
	private $authSignature;
	private $authStamp;
	private $isProxyEnabled;
	private $proxyHost;
	private $proxyPort;
	private $paypalURL;
	private $sbnCode = "";
	
	function initialize($controller, $settings = array()) {
		$this->controller = $controller;
		//$this->apiUsername = "somchemist_api1.gmail.com";
		//$this->apiPassword = "9K8PR5F2W8YYQRJX";
		//$this->apiSignature = "AThnsaliW3WPQ4LX2IIE-s2zboqrAyc2jUTs3y6D2kFIdNzgS6S4lbQ";
		$this->apiUsername = "slashe_1310900488_biz_api1.yahoo.com";
		$this->apiPassword = "1310900528";
		$this->apiSignature = "AX.5dLv7.5iMnY7uLPzwYM1EpkotAasOWO8OGn04iPYEg0G71sBDOeuL";
		$this->apiEndPoint = "https://api-3t.sandbox.paypal.com/nvp";
		$this->version = "64";
		$this->isProxyEnabled = false;
		$this->proxyPort = "808";
		$this->proxyHost = "127.0.0.1";
		$this->paypalURL = "https://www.sandbox.paypal.com/webscr&cmd=_express-checkout&useraction=commit&token=";
	
	}
	
	/**
	 * Mark express checkout ...
	 * @param array $payment
	 */
	public function markExpressCheckout($payment) {
		$nvpstr = "&PAYMENTREQUEST_0_AMT=" . urlencode ( $payment ["Payment"] ["amount"] );
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_PAYMENTACTION=" . $payment ["Payment"] ["type"];
		$nvpstr = $nvpstr . "&RETURNURL=" . $payment ["Payment"] ["returnURL"];
		$nvpstr = $nvpstr . "&CANCELURL=" . $payment ["Payment"] ["cancelURL"];
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_CURRENCYCODE=" . $payment ["Payment"] ["currencyCode"];
		$nvpstr = $nvpstr . "&ADDROVERRIDE=1";
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTONAME=" . urlencode ( $payment ["Member"] ["fullName"] );
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOSTREET=" . urlencode ( $payment ["Member"] ["address1"] );
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOSTREET2=" . urlencode ( $payment ["Member"] ["address2"] );
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOCITY=" . urlencode ( $payment ["Member"] ["city"] );
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOSTATE=" . urlencode ( $payment ["Member"] ["state"] );
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE=" . urlencode ( $payment ["Member"] ["countryCode"] );
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOZIP=" . urlencode ( $payment ["Member"] ["zipCode"] );
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOPHONENUM=" . urlencode ( $payment ["Member"] ["phoneNumber"] );
		$this->controller->Session->write ( "Payment.paymentType", $payment ["Payment"] ["type"] );
		$this->controller->Session->write ( "Payment.currencyCode", $payment ["Payment"] ["currencyCode"] );
		$resArray = $this->hash_call ( "SetExpressCheckout", $nvpstr );
		$this->writeToken ( $resArray );
		return $resArray;
	}
	
	/**
	 * Writes for token ...
	 * @param $res
	 */
	private function writeToken($resArray) {
		$ack = strtoupper ( $resArray ["ACK"] );
		if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
			$token = urldecode ( $resArray ["TOKEN"] );
			$this->controller->Session->write ( "TOKEN", $token );
		}
	}
	
	/**
	 * Mark express checkout but in a shorter way ...
	 * @param array $payment
	 */
	public function callShortcutExpressCheckout($payment) {
		
		$nvpstr = "&PAYMENTREQUEST_0_AMT=" . urlencode ( $payment ["Payment"] ["amount"] );
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_PAYMENTACTION=" . urlencode ( $payment ["Payment"] ["paymentType"] );
		$nvpstr = $nvpstr . "&RETURNURL=" . $payment ["Payment"] ["returnURL"];
		$nvpstr = $nvpstr . "&CANCELURL=" . $payment ["Payment"] ["cancelURL"];
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_CURRENCYCODE=" . urlencode ( $payment ["Payment"] ["currencyCode"] );
		$this->controller->Session->write ( "Payment.paymentType", $payment ["Payment"] ["paymentType"] );
		$this->controller->Session->write ( "Payment.currencyCode", $payment ["Payment"] ["currencyCode"] );
		$resArray = $this->hash_call ( "SetExpressCheckout", $nvpstr );
		$this->writeToken ( $resArray );
		return $resArray;
	}
	
	/**
	 * Gets for shipping details of a transaction given a token ...
	 * @param string $token
	 */
	function getShippingDetails($token) {
		$nvpstr = "&TOKEN=" . $token;
		$resArray = $this->hash_call ( "GetExpressCheckoutDetails", $nvpstr );
		$ack = strtoupper ( $resArray ["ACK"] );
		if ($ack == "SUCCESS" || $ack == "SUCCESSWITHWARNING") {
			$this->controller->Session->write("Payment.payerId", $resArray["PAYERID"]);
		}
		return $resArray;
	}
	
	/**
	 * Confirm Payment ...
	 * @param $finalPaymentAmount
	 */
	function confirmPayment($finalPaymentAmount) {
		//reads for token
		$token = urlencode ( $this->controller->Session->read ( "TOKEN" ) );
		$paymentType = urlencode ( $this->controller->Session->read ( "Payment.paymentType" ) );
		$currencyCodeType = urlencode ( $this->controller->Session->read ( "Payment.currencyCode" ) );
		$payerID = urlencode ( $this->controller->Session->read ( "Payment.payerId" ) );
		$serverName = urlencode ( $_SERVER ['SERVER_NAME'] );
		$nvpstr = '&TOKEN=' . $token . '&PAYERID=' . $payerID . '&PAYMENTREQUEST_0_PAYMENTACTION=' . $paymentType . '&PAYMENTREQUEST_0_AMT=' . $finalPaymentAmount;
		$nvpstr .= '&PAYMENTREQUEST_0_CURRENCYCODE=' . $currencyCodeType . '&IPADDRESS=' . $serverName;
		$resArray = $this->hash_call ( "DoExpressCheckoutPayment", $nvpstr );
		$ack = strtoupper ( $resArray ["ACK"] );
		return $resArray;
	}
	
	/**
	 * This function makes a DoDirectPayment API call...
	 * @param CredirCardPaypalPayment $ccpayment
	 */
	function directPayment($ccpayment) {
		$expDateMonth =urlencode($ccpayment['CreditCard']['expiration_month']["month"]);
		$padDateMonth = str_pad($expDateMonth, 2, '0', STR_PAD_LEFT);
		$expDateYear =urlencode($ccpayment['CreditCard']['expiration_year']["year"]);	
		$nvpstr = "&AMT=" . $ccpayment ["Payment"] ["amount"];
		$nvpstr = $nvpstr . "&CURRENCYCODE=" . $ccpayment ["Payment"] ["currencyCode"];
		$nvpstr = $nvpstr . "&PAYMENTACTION=" . $ccpayment ["Payment"] ["paymentType"];
		$nvpstr = $nvpstr . "&CREDITCARDTYPE=" . $ccpayment ["Payment"] ["creditCardType"];
		$nvpstr = $nvpstr . "&ACCT=" . $ccpayment ["CreditCard"] ["card_number"];
		$nvpstr = $nvpstr . "&EXPDATE=" . $padDateMonth.$expDateYear;
		$nvpstr = $nvpstr . "&CVV2=" . $ccpayment ["CreditCard"] ["cv_code"];
		$nvpstr = $nvpstr . "&FIRSTNAME=" . $ccpayment ["CreditCard"] ["firstname"];
		$nvpstr = $nvpstr . "&LASTNAME=" . $ccpayment ["CreditCard"] ["lastname"];
		$nvpstr = $nvpstr . "&STREET=" . $ccpayment ["CreditCard"] ["address1"];
		$nvpstr = $nvpstr . "&CITY=" . $ccpayment ["CreditCard"] ["city"];
		$nvpstr = $nvpstr . "&STATE=" . $ccpayment ["CreditCard"] ["state"];
		$nvpstr = $nvpstr . "&COUNTRYCODE=" . $ccpayment ["Payment"] ["countryCode"];
		$nvpstr = $nvpstr . "&IPADDRESS=" . $_SERVER ['REMOTE_ADDR'];
		$resArray = $this->hash_call ( "DoDirectPayment", $nvpstr );
		return $resArray;
	}
	
	/**
	 * Function to perform the API call to PayPal using API signature.
	 * Returns an associtive array containing the response from the server.
	 * @param $methodName the name of API method
	 * @param $nvpStr nvp string
	 * @return array 
	 */
	function hash_call($methodName, $nvpStr) {
		//declaring of global variables
		global $gv_ApiErrorURL;
		
		//setting the curl parameters.
		$ch = curl_init ();
		curl_setopt ( $ch, CURLOPT_URL, $this->apiEndPoint );
		curl_setopt ( $ch, CURLOPT_VERBOSE, 1 );
		//turning off the server and peer verification(TrustManager Concept).
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt ( $ch, CURLOPT_POST, 1 );
		//if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
		//Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php 
		if ($this->isProxyEnabled) {
			curl_setopt ( $ch, CURLOPT_PROXY, $this->proxyHost . ":" . $this->proxyPort );
		}
		//NVPRequest for submitting to server
		$nvpreq = "METHOD=" . urlencode ( $methodName ) . "&VERSION=" . urlencode ( $this->version ) . "&PWD=" . urlencode ( $this->apiPassword ) . "&USER=" . urlencode ( $this->apiUsername ) . "&SIGNATURE=" . urlencode ( $this->apiSignature ) . $nvpStr . "&BUTTONSOURCE=" . urlencode ( $this->sbnCode ) . "&PAGESTYLE=RB01";
		//setting the nvpreq as POST FIELD to curl
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $nvpreq );
		//getting response from server
		//logToFile('Curl start');
		$response = curl_exec ( $ch );
		//logToFile('Curl end');
		//convrting NVPResponse to an Associative Array
		$nvpResArray = $this->deformatNVP ( $response );
		$nvpReqArray = $this->deformatNVP ( $nvpreq );
		$_SESSION ['nvpReqArray'] = $nvpReqArray;
		if (curl_errno ( $ch )) {
			// moving to display page to display curl errors
			$_SESSION ['curl_error_no'] = curl_errno ( $ch );
			$_SESSION ['curl_error_msg'] = curl_error ( $ch );
		
		//Execute the Error handling module to display errors. 
		} else {
			//closing the curl
			curl_close ( $ch );
		}
		
		return $nvpResArray;
	}
	
	/**
	 * Redirects to paypal url ...
	 * @param string $token
	 */
	function redirectToPayPal($token) {
		
		// Redirect to paypal.com here
		$payPalURL = $this->paypalURL . urlencode ( $token );
		header ( "Location: " . $payPalURL );
	}
	
	/**
	 * 
	 * This function will take NVPString and convert it to an Associative Array and it will decode the response...
	 * @param string $nvpstr NVPString
	 * @return Array 
	 */
	function deformatNVP($nvpstr) {
		$intial = 0;
		$nvpArray = array ();
		
		while ( strlen ( $nvpstr ) ) {
			//postion of Key
			$keypos = strpos ( $nvpstr, '=' );
			//position of value
			$valuepos = strpos ( $nvpstr, '&' ) ? strpos ( $nvpstr, '&' ) : strlen ( $nvpstr );
			
			/*getting the Key and Value values and storing in a Associative Array*/
			$keyval = substr ( $nvpstr, $intial, $keypos );
			$valval = substr ( $nvpstr, $keypos + 1, $valuepos - $keypos - 1 );
			//decoding the respose
			$nvpArray [urldecode ( $keyval )] = urldecode ( $valval );
			$nvpstr = substr ( $nvpstr, $valuepos + 1, strlen ( $nvpstr ) );
		}
		return $nvpArray;
	}

	
	/**
	 * Express checkout for Recurring payment ...
	 * @param $paymentInfo
	 */
	function recurringPayment($paymentInfo){
		$nvpstr = "&AMT=".urlencode($paymentInfo["Payment"]["amount"]);
		$nvpstr .= "&CURRENCYCODE=" . $paymentInfo["Payment"] ["currencyCode"];
		$nvpstr .= "&PAYMENTACTION=" . $paymentInfo["Payment"] ["paymentType"];
		$nvpstr .= "&PROFILESTARTDATE=".$paymentInfo["Payment"]["startDate"];
		$nvpstr .= "&BILLINGPERIOD=MONTH";
		$nvpstr .= "&BILLINGFREQUENCY=3";
		$this->controller->Session->write ( "Payment.paymentType", $paymentInfo ["Payment"] ["paymentType"] );
		$this->controller->Session->write ( "Payment.currencyCode", $paymentInfo ["Payment"] ["currencyCode"] );
		$resArray = $this->hash_call ( "SetExpressCheckout", $nvpstr );
		$this->writeToken ( $resArray );
		return $resArray;
	}
	
	function createRecurringProfile($token){
		$nvpstr = "&TOKEN=".urlencode($token);
		$resArray = $this->hash_call("CreateRecurringPaymentsProfile", $nvpstr);
		return $resArray;
	}
	
	function  getRecurringPaymentsProfileDetails($profileId){
		$nvpstr = "&PROFILEID=".$profileId;
		$resArray = $this->hash_call("GetRecurringPaymentsProfileDetails", $nvpstr);
		return $resArray;
	}
	
}