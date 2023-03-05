<?php


session_start();

include('../../../../../app/config.php');
//include('../../../../../functions/dbconnect.php');
include'../../../../../rsev_acc/concat.php';

//$str = 'MK_TEST_QCQWMJKPSF:FFPWFWY7CMDCHRRVSQ3ENT6QSQSA5D4U';

//$str = 'Hello World!!';
//$b64 = base64_encode($str);



//$contractCode='2668562525';

//include'../../../../../objects/random.php';

//$amount='500';
//$bname='GTBank';
//$account_number='0121619553';

//$sourceAccountNumber='6639119273';



//'{"amount":"'.$amount.'","reference":"'.$rid.'","narration":"911 Transaction","destinationBankCode": "'.$bcode.'","destinationAccountNumber": "'.$account_number.'","currency": "NGN","sourceAccountNumber": "'.$sourceAccountNumber.'"}

//$sourceAccountNumber='8000011226';


if ($b64 === false) {
  $ress= 'Invalid input';
} else {

$mbname=$bname;
include'switch.php';



$curlpay = curl_init();

curl_setopt($curlpay, CURLOPT_URL,"https://app.monnify.com/api/v2/disbursements/single");
curl_setopt($curlpay, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curlpay, CURLOPT_HEADER, FALSE);

curl_setopt($curlpay, CURLOPT_POST, TRUE);

curl_setopt($curlpay, CURLOPT_POSTFIELDS, '{"amount": 100,
    "reference":"reference12934",
    "narration":"911 Transaction",
    "destinationBankCode": "058",
    "destinationAccountNumber": "0121619553",
    "currency": "NGN",
    "sourceAccountNumber": "8000011226"}');
curl_setopt($curlpay, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Basic $b64"
));

 echo $payresponse = curl_exec($curlpay);
curl_close($curlpay);

$payres=json_decode($payresponse);


//{"requestSuccessful":true,"responseMessage":"success","responseCode":"0","responseBody":{"amount":100,"reference":"kp2020090109173","status":"PENDING_AUTHORIZATION","dateCreated":"2020-09-01T07:17:36.230+0000","totalFee":35.00}}
//echo $Bearer;

}


?>