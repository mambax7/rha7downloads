<?php
class PayPalGateway {

	var $is_inited;
	var $is_production;
	var $button_image;
	var $success_page;
	var $failure_page;
	var $pay_page_header;
	var $paypal_auth_token;

	function init($p_debugging, 
	              $p_button_image, 
				  $p_success_page, 
				  $p_failure_page, 
				  $p_pay_page_header, 
				  $p_paypal_auth_token) {
		$this->is_inited = true;
		if ($p_debugging) {
			$this->is_production = false;
		} else {
			$this->is_production = true;
		}
		$this->button_image = $p_button_image; 
		$this->success_page = $p_success_page; 
		$this->failure_page = $p_failure_page;
		$this->pay_page_header = $p_pay_page_header;
		$this->paypal_auth_token = $p_paypal_auth_token;
	}
	
	//
	// Sample Call to this function:
	// 
	// require_once("pdt.inc.php");
	// $paypal = PaymentDataTransfer($_GET['tx']);
	//
	// The First Parameter is either "true" for production or "false" for test environment (sandbox).
	// The Second parameter is the key sent back to you in a GET request to your success page.
	// The Third parameter is the key found in your paypal account's.
	// My Account -> Profile -> Website Payment Preferences -> Payment Data Transfer -> Identity Token
	// Note: This value appears only if the setting is "On"
	//
	// Sample Result from This Function Follows:
	// 
	// Array
	// (
	//     [result] => SUCCESS:SUCCESS
	//     [first_name] => Leticia
	//     [last_name] => Perez
	//     [item_name] => Sample Widget
	//     [payment_gross] => 9.95
	//     [mc_gross] => 9.95
	//     [address_status] => unconfirmed
	//     [tax] => 0.00
	//     [paypal_address_id] => WHSWX6QRT8C74
	//     [payer_id] => 4QMC7GSQ96JB2
	//     [address_street] => Mi Calle 1234
	//     [payment_date] => 01:20:02 Apr 26, 2005 PDT
	//     [payment_status] => Completed
	//     [address_zip] => 32000
	//     [mc_fee] => 0.64
	//     [address_country_code] => MX
	//     [address_name] => Leticia Perez
	//     [custom] => 
	//     [payer_status] => verified
	//     [business] => paypal@floritaseller.com
	//     [address_country] => Mexico
	//     [address_city] => Ciudad Imaginaria
	//     [quantity] => 1
	//     [payer_email] => buyers@dress.com
	//     [txn_id] => 1F018643C8455074A
	//     [payment_type] => instant
	//     [address_state] => Chihuahua
	//     [receiver_email] => paypal@floritaseller.com
	//     [address_owner] => 1
	//     [payment_fee] => 0.64
	//     [receiver_id] => R3K552Z26BBPC
	//     [ebay_address_id] => 
	//     [txn_type] => web_accept
	//     [mc_currency] => USD
	//     [item_number] => 1001
	//     [shipping] => 0.00
	// )
	//
	
	function PaymentDataTransfer($paypal_trans_token) {
		if (!$this->is_inited) {
			trigger_error("Class not init'ed (PayPalGateway)");
		}
		$req = 'cmd=_notify-synch';
		$tx_token = $paypal_trans_token; // $_GET['tx'];
		$auth_token = $this->paypal_auth_token;
		$req .= "&tx=$tx_token&at=$auth_token";
		$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
		if($this->is_prouction) {
			$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);
		} else {
			$fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);
		}
		
		$paypalpdt = NULL;
		
		if (!$fp) {
				$paypalpdt['result'] = 'FAILURE:HTTPERROR';
		} else {
			fputs ($fp, $header . $req);
			$res = '';
			$headerdone = false;
			while (!feof($fp)) {
				$line = fgets ($fp, 1024);
				if (strcmp($line, "\r\n") == 0) {
					$headerdone = true;
				} else if ($headerdone)	{
					$res .= $line;
				}
			}
			$lines = explode("\n", $res);
			$keyarray = array();
			if (strcmp ($lines[0], "SUCCESS") == 0) {
				for ($i=1; $i<count($lines);$i++){
					list($key,$val) = explode("=", $lines[$i]);
					$keyarray[urldecode($key)] = urldecode($val);
				}
				$paypalpdt["result"] = 'SUCCESS:SUCCESS';
				$paypalpdt['first_name'] = $keyarray['first_name'];
				$paypalpdt['last_name'] = $keyarray['last_name'];
				$paypalpdt['item_name'] = $keyarray['item_name'];
				$paypalpdt['payment_gross'] = $keyarray['payment_gross'];
				$paypalpdt['mc_gross'] = $keyarray['mc_gross'];
				$paypalpdt['address_status'] = $keyarray['address_status'];
				$paypalpdt['tax'] = $keyarray['tax'];
				$paypalpdt['paypal_address_id'] = $keyarray['paypal_address_id'];
				$paypalpdt['payer_id'] = $keyarray['payer_id'];
				$paypalpdt['address_street'] = $keyarray['address_street'];
				$paypalpdt['payment_date'] = $keyarray['payment_date'];
				$paypalpdt['payment_status'] = $keyarray['payment_status'];
				$paypalpdt['address_zip'] = $keyarray['address_zip'];
				$paypalpdt['mc_fee'] = $keyarray['mc_fee'];
				$paypalpdt['address_country_code'] = $keyarray['address_country_code'];
				$paypalpdt['address_name'] = $keyarray['address_name'];
				$paypalpdt['custom'] = $keyarray['custom'];
				$paypalpdt['payer_status'] = $keyarray['payer_status'];
				$paypalpdt['business'] = $keyarray['business'];
				$paypalpdt['address_country'] = $keyarray['address_country'];
				$paypalpdt['address_city'] = $keyarray['address_city'];
				$paypalpdt['quantity'] = $keyarray['quantity'];
				$paypalpdt['payer_email'] = $keyarray['payer_email'];
				$paypalpdt['txn_id'] = $keyarray['txn_id'];
				$paypalpdt['payment_type'] = $keyarray['payment_type'];
				$paypalpdt['address_state'] = $keyarray['address_state'];
				$paypalpdt['receiver_email'] = $keyarray['receiver_email'];
				$paypalpdt['address_owner'] = $keyarray['address_owner'];
				$paypalpdt['payment_fee'] = $keyarray['payment_fee'];
				$paypalpdt['receiver_id'] = $keyarray['receiver_id'];
				$paypalpdt['ebay_address_id'] = $keyarray['ebay_address_id'];
				$paypalpdt['txn_type'] = $keyarray['txn_type'];
				$paypalpdt['mc_currency'] = $keyarray['mc_currency'];
				$paypalpdt['item_number'] = $keyarray['item_number'];
				$paypalpdt['shipping'] = $keyarray['shipping'];
			} else if (strcmp ($lines[0], "FAIL") == 0) {
				$paypalpdt['result'] = 'FAILURE:PAYPALERROR';
			}
		}
		fclose ($fp);
		return $paypalpdt;
	}
	
	function MakeButton($business_email,$product_name, $product_number, $product_price) {
		if (!$this->is_inited) {
			trigger_error("Class not init'ed (PayPalGateway)");
		}
		if ($this->is_production) {
			$paypal_server = "www.paypal.com";
		} else {
			$paypal_server = "www.sandbox.paypal.com";
		}
		$button_text = "<form action=\"https://$paypal_server/cgi-bin/webscr\" method=\"post\">
                                <input type=\"hidden\" name=\"cmd\" value=\"_xclick\">
                                <input type=\"hidden\" name=\"business\" value=\"$business_email\">
                                <input type=\"hidden\" name=\"item_name\" value=\"$product_name\">
                                <input type=\"hidden\" name=\"item_number\" value=\"$product_number\">
                                <input type=\"hidden\" name=\"amount\" value=\"$product_price\">
                                <input type=\"hidden\" name=\"currency_code\" value=\"USD\">
                                <input type=\"hidden\" name=\"image_url\" value=\"$this->pay_page_header\">
                                <input type=\"hidden\" name=\"return\" value=\"$this->success_page?\">
                                <input type=\"hidden\" name=\"cancel_return\" value=\"$this->failure_page\">
                                <input type=\"hidden\" name=\"undefined_quantity\" value=\"0\">
                                <input type=\"hidden\" name=\"receiver_email\" value=\"$this->business_email\">
  							    <input type=\"hidden\" name=\"mrb\" value=\"R-3WH47588B4505740X\">
							    <input type=\"hidden\" name=\"pal\" value=\"ANNSXSLJLYR2A\">
                                <input type=\"hidden\" name=\"no_shipping\" value=\"0\">
                                <input type=\"hidden\" name=\"no_note\" value=\"1\">
                                <input name=\"submit\" type=\"image\" src=\"$this->button_image\" alt=\"Make payments with PayPal, it's fast, free, and secure!\" border=\"0\">
                                </form>";
		return $button_text;
	}
}
?>