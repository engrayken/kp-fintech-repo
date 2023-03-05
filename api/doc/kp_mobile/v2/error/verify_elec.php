<?php


include('../../../../../app/config.php');




   // $query = $dbc->query("SELECT * FROM pidentifier ");

    $query = $dbc->prepare("SELECT * FROM pidentifier where identifier_name=? ");
$query->bind_param("s", $_GET['serviceID']);
$query->execute();
$queryr=$query->get_result();
$row=$queryr->fetch_assoc();
$queryr->close();
 $serviceID=$row['identifier_serviceID'];

    


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
$api_host = $apirow['host'];

}

}



$host='https://sandbox.vtpass.com/api/merchant-verify';

//$host=$url;

//this code collect and send the form to vtpass website 



if(isset($_GET['serviceID'])) {

$username = "$api_username"; //email address
$password = "$api_password"; //password

$data = array(
  'serviceID'=> $serviceID, //integer
      
    'billersCode' =>  $_GET['billersCode'], 
  
  'type' =>  strtolower($_GET['type']), 
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

file_put_contents('call.txt', $json_data);
 


$json = json_decode($json_data);

if($json->code=='000') {

$status=$json->content->Customer_Name.' '.$json->content->error;


} else{
$status=$json->content->error;
}




$resp=array();
array_push($resp, array("title"=>$status));
		echo json_encode(array("kpapi_resp"=>$resp));


?>