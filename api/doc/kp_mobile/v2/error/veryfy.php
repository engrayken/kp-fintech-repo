<?php


//include('../../../../../functions/dbConfig.php');
include('../../../../../app/config.php');
include'../../../../../rsev_acc/concat.php';

 file_put_contents('call.txt', $_GET);

//$account_number='0121619553';

$account_number=$_GET['billersCode'];

 $acc=$account_number;

//$bank_name='Access_bank';

$bank_name=$_GET['serviceID'];

$mbname=$bank_name;

if($bank_name!='')
{



include'switch.php';




if($bcode && $acc) {

//echo $bcode;

// this code check if the account number exist in the bank account //

if ($b64 === false) {
  $ress= 'Invalid input';
} else {
//  echo $b64; //-> "SGVsbG8gV29ybGQhIQ=="

//this is the authentication login code

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.monnify.com/api/v1/auth/login/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Basic $b64"
));

  $response = curl_exec($ch);
curl_close($ch);

$resp=json_decode($response);



if($resp->requestSuccessful=='true')
{
 $_SESSION['accessToken']= $resp->responseBody->accessToken;
} //end if($resp->requestSuccessful=='true')


 $Bearer=$_SESSION['accessToken'];

if( $Bearer!='')
{


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://api.monnify.com/api/v1/disbursements/account/validate?accountNumber=".$account_number."&bankCode=".$bcode);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

//curl_setopt($ch, CURLOPT_GET, TRUE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Bearer $Bearer"
));

  $response = curl_exec($ch);
curl_close($ch);

$res=json_decode($response);




// echo $accountNumber=htmlspecialchars($res->responseBody->accountNumber);

 //$bankName=htmlspecialchars($res->responseBody->bankName);


if($res->requestSuccessful=='true')
{



 $status='Acc Name: '.$accountName=htmlspecialchars($res->responseBody->accountName).'
Account No: '.$accountNumber=htmlspecialchars($res->responseBody->accountNumber);



} else {

$status=$res->error_description.$res->responseMessage;

}//end if($res->requestSuccessful=='true')

}




} //end if( $Bearer!='')

}





}//end

$resp=array();
array_push($resp, array("title"=>$status));
		echo json_encode(array("kpapi_resp"=>$resp));

?>
