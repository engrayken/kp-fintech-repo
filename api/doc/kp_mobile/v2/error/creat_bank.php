<?php

session_start();

include('../../../../../functions/connection.php');
//include('../../../../../functions/dbconnect.php');
include'../../../../../rsev_acc/concat.php';

include'../../../../../objects/random.php';

//    $usernnn=$_GET['username'];
//$chtoken=$_GET['token'];

$csecpin=$_GET['secpin'];
$chsecpin= md5($csecpin);

file_put_contents('call.txt', $_GET);

include('update.php');


	$username=$_GET['username'];
	$password=$_GET['password'];
//$password=md5($xpassword);

	$login=mysqli_query($connect,"select * from user where username='$username' ");

  while($login_row= $login->fetch_assoc()){

$chpassword=$login_row['token'];

$chusername=$login_row['username'];
$auserr=$login_row['id'];

}

if($username==$chusername && $_GET['error']=='rsv')
{


	if($chpassword==$password)
	{

	


if ($b64 === false) {
  $ress= 'Invalid input';
} else {
//  echo $b64; //-> "SGVsbG8gV29ybGQhIQ=="

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://app.monnify.com/api/v1/auth/login/");
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

$query_rec = mysqli_query($connect,"SELECT * FROM user where id='$auserr' ");
			
$user=mysqli_fetch_array($query_rec);

$aname=$user['name'];

$ausername=$user['username'];

 $aemail=$user['email'];

$bankName2=$user['bankName'];

$customerName2=$user['customerName'];

$accountNumber2=$user['accountNumber'];

if($bankName2=='' && $customerName2=='' && $accountNumber2=='')
{


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://app.monnify.com/api/v1/bank-transfer/reserved-accounts");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HEADER, FALSE);

curl_setopt($ch, CURLOPT_POST, TRUE);

curl_setopt($ch, CURLOPT_POSTFIELDS, '{
  "accountName": "'.$aname.'",
  "accountReference": "'.$ausername.$rid.'",
  "currencyCode": "NGN",
  "contractCode": "'.$contractCode.'",
  "customerName": "'.$aname.'",
  "customerEmail": "'.$aemail.'"}');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  "Content-Type: application/json",
  "Authorization: Bearer $Bearer"
));

 $response = curl_exec($ch);
curl_close($ch);

$res=json_decode($response);

$customerName=htmlspecialchars($res->responseBody->customerName);




 $accountNumber=htmlspecialchars($res->responseBody->accountNumber);

 $bankName=htmlspecialchars($res->responseBody->bankName);


if($res->requestSuccessful=='true')
{

 $ref=$ausername.$rid;


$bankName1 = mysqli_query($connect, "UPDATE user SET bankName='$bankName' WHERE id='$auserr' ");

$customerName1 = mysqli_query($connect, "UPDATE user SET customerName='$customerName' WHERE id='$auserr' ");



$accountNumber1 = mysqli_query($connect, "UPDATE user SET accountNumber='$accountNumber' WHERE id='$auserr' ");

$reference = mysqli_query($connect, "UPDATE user SET reference='$ref' WHERE id='$auserr' ");



$ress=$res->error_description.$res->responseMessage;

 $_SESSION['accessToken']="";


} else {

$ress=$res->error_description.$res->responseMessage;

 $_SESSION['accessToken']="";
}//end if($res->requestSuccessful=='true')

}

else {
$ress=' error occure while creating account';

} // end if($bankName2=='' && $customerName2=='' && $accountNumber2=='')






} //end if( $Bearer!='')

}



} else { $ress='error occure'; }
}



$resp=array();
array_push($resp, array("returnvalue"=>$ress->error_description, "title"=>$ress));
		echo json_encode(array("kpapi_resp"=>$resp));

?>