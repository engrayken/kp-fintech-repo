<?php
 file_put_contents('call.txt', $_GET);
$username=$_GET['username'];
$password=$_GET['password'];

//$recipient=$_GET['dest'];
//$csecpin=$_GET['secpin'];
//$serviceIDcm=$_GET['network'];
//$amount=$_GET['amount'];



/*$url = "https://kenspay.com.ng/api/doc/kp_mobile/v2/error/airtime.php?username=$username&password=$password&secpin=$csecpin&amount=".str_replace(" ","",$amount)."&dest=$recipient&network=".str_replace("_","",$serviceIDcm);

$headers = array(
    'Content-Type: application/json',
);
$ch = curl_init();

// Set the url, number of GET vars, GET data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true );

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
*/
if($_GET['network']) {
$host="https://kenspay.com.ng/api/doc/kp_mobile/v2/error/airtime.php";
$data = array(
  'username'=> $username, //integer
  'password'=> $password, //integer
  'amount'=>$_GET['amount'], //integer
 // 'private_key' => $privateKey,  //private key
  //'public_key' => $publicKey, //public key

'secpin' => $_GET['secpin'], // sender id of sms

  'dest' =>  $_GET['dest'], // depositor phone number

//'sender' =>  $_POST['sender'], // sender id of sms
//'msg' => $_POST['msg'], // message been sent
 // 'pin' => $_POST['pin'], //pin
  'network' => $_GET['network'], //network
//  'billersCode' =>  $_POST['billersCode'], // depositor phone number
//  'variation_code' => $_POST['variation_code'], //network
//  'email' => $_POST['email'], //email
//  'transaction_id' => $_POST['transaction_id'], // unique id for every transaction
);

    $curl = curl_init();
     curl_setopt_array($curl, array(
     CURLOPT_URL => $host,           
	
      CURLOPT_RETURNTRANSFER => false,
      CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "POST",
     CURLOPT_POSTFIELDS => $data,
));

// Execute request
echo $json = curl_exec($curl);

//$result=json_decode($json);


//echo $result->title;

// Close connection
curl_close($curl);

}



?>