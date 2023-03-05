<?php
file_put_contents('call.txt', $_GET);
include('../../../../../app/config.php');
 //get rows of link that send the payment
    $apiquery = $dbc->query("SELECT * FROM payhost ORDER BY id");
while($apirow = $apiquery->fetch_assoc()){ 
$id=$apirow['id'];

$default=$apirow['xdefault'];



if($default=='1')
{

//$url= $row['host'];

$api_username  = $apirow['username'];
$api_password  = $apirow['password'];
 $host = $apirow['host'];

}

}



$host='https://vtpass.com/api/merchant-verify';

//$host=$url;

//this code collect and send the form to vtpass website 

$serv=strtolower($_GET['serviceID']);

if(isset($serv)) {

$username = "$api_username"; //email address
$password = "$api_password"; //password

$data = array(
  'serviceID'=> strtolower($_GET['serviceID']), //integer
      
    'billersCode' =>  $_GET['billersCode'], 
  
  'type' =>  $_GET['type'], 
);
$curl       = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => $host,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_USERPWD => $username.":" .$password,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $data,
));

 $json_data= $m=curl_exec ($curl); 

}// end the form that is been sent to vtpass

//file_put_contents('call.txt', $json_data);



$json = json_decode($json_data);

if($json->code=='000') {

if($_GET['serviceID']==STARTIMES){
if($json->content->error==''){
$status=$json->content->Customer_Name.', Balance: '.$json->content->Balance;}
else{
$status=$json->content->error;
}

} else{
if($json->content->error==''){
$status=$json->content->Customer_Name.', Status: '.$json->content->Status.', Due_Date: '.$json->content->Due_Date;
} else{
$status=$json->content->error;
}

}


} 


$resp=array();
array_push($resp, array("title"=>$status));
		echo json_encode(array("kpapi_resp"=>$resp));


?>