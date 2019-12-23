<?php
/*
- Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
- Change the value of PAYTM_MERCHANT_KEY constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_MID constant with details received from Paytm.
- Change the value of PAYTM_MERCHANT_WEBSITE constant with details received from Paytm.
- Above details will be different for testing and production environment.
*/

//Use PAYTM_ENVIRONMENT as 'PROD' if you wanted to do transaction in production environment else 'TEST' for doing transaction in testing environment.
define('PAYTM_ENVIRONMENT', 'TEST');
//Change this constant's value with Merchant key received from Paytm
define('PAYTM_MERCHANT_KEY', 'EwV#EN%kY1cKCHxi');
//Change this constant's value with MID (Merchant ID) received from Paytm
define('PAYTM_MERCHANT_MID', 'MVGmiF55546347444980');
//Change this constant's value with Website name received from Paytm
define('PAYTM_MERCHANT_WEBSITE', 'KeyaanCashews');

if(PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
	$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
}else{
	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatuse';
	$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';	
}

define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);
define("callbackUrl", "http://ethree.in/recharge");
?>
