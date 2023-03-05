<?php 
//this code minus the payment item  from the user credit and save the reminder. 

// and token='$chtoken' 

//kenneth271882604787b06a7f261b634504d13be2e7384410008138442969mtnapkp0095880025082409670971234470595586908807

date_default_timezone_set('Africa/Lagos');
$now = date('Y-m-d H:i:s', time());

ob_start();

include('../../../../../functions/connection.php');
include"../../../../../objects/random.php";

//if ($_SERVER['REQUEST_METHOD'] == 'GET') {
 file_put_contents('call.txt', $_GET);

$requestid=$_GET['requestid'];

$date= date('M/d/Y‎ H:i:s', time());


   $limit =1;
    
    $usernnn=$_GET['username'];
$chtoken=$_GET['password'];

$csecpin=$_GET['secpin'];
$chsecpin= md5($csecpin);

$serviceIDcm=$_GET['network'];

 



    //get rows
    $query = $db->query("SELECT * FROM user WHERE username='$usernnn' ");
    
    if($query->num_rows > 0){ 

            while($row = $query->fetch_assoc()){ 
$idn=$row['id'];

$balance1= $row['balance'];

$user_id= $row['id'];

$user=$row['username'];
$agent=$row['type'];

$vtoken= $row['token'];
$secpin= $row['secpin'];


}}	





if($chtoken==$vtoken && $chsecpin==$secpin) 

{ 




//this is the code that calculate the form 

$ken=$_GET['amount'];

//this code calculate if the amount is less than the user balance let it go 

if($ken<=$balance1 && $ken>49) {



  //get transaction_id rows
    $queryt = $db->query("SELECT * FROM paylog  where transaction_id='$requestid' ");
    
   /*WHERE code='$_POST[transaction_id]'*/
   
            while($rowt = $queryt->fetch_assoc()){ 

 $codes=$rowt['transaction_id'];


//die('{"code":"09","message":"transaction id already exit"}'); 
}

  if(isset($_GET['amount']))
  {
	 
 $balance2=$_GET['amount'];
$ca=$balance1-$balance2;
  $ta=$balance1-$balance2;


if($codes!='') {

} else {

include('agent.php');

include('paylogsm.php');

}
  
  $updated=mysqli_query($connect,"UPDATE user SET 
	balance='$ca' WHERE id='$idn'")or die();
  if($updated)
  {

  
  }


}

    //this code collect the vtpass link from database 
 //   include('../../../../../functions/dbConfig.php');
	
    $limit =1;
    
    
    //get rows
    $query = $db->query("SELECT * FROM payhost ORDER BY id");
    
    if($query->num_rows > 0){ 
        
        
            while($row = $query->fetch_assoc()){ 
$id=$row['id'];

$default=$row['xdefault'];

//$default1=$row['id'];

 

 if($default=='1') {
$url = $row['host'];

//$usernamee  = $row['username'];
//$passworde  = $row['password'];

$usernamee  ='kenspaytechnology@gmail.com';
$passworde  ='k3nn3+h1992';
}

			
      

//this code send the form to vtpass website 
if(isset($_GET['network'])) {

//$codes check if transaction id exist
$murl="https://smartrecharge.ng/api/v2/airtime/";



if($codes!='') {

 $musername="cc1abd17not";

} else {

$musername="cc1abd17";
}

$callback='https://kenspay.com.ng/call/index.php';




if($_GET['network']=='mtn')
{
$product_code='mtn_custom';
}
else if($_GET['network']=='airtel')
{
$product_code='airtel_custom';
} else if($_GET['network']=='glo')
{
$product_code='glo_custom';
} else if($_GET['network']=='etisalat')
{
$product_code='9mobile_custom';
}
//echo $product_code;


$mhost = "$murl";
$data = array(

'api_key'=>$musername,

  'product_code'=> $product_code, //integer
      
    'amount' =>  $_GET['amount'], 
  
  'phone' => $_GET['dest'], //integer

  'callback' => $callback, // unique for every transaction
);
$curl       = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $mhost,           
	
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => "POST",
     CURLOPT_POSTFIELDS => $data,
));


/*
$host = "$url";
$data = array(
  'serviceID'=> $_GET['network'], //integer
      
    'amount' =>  $_GET['amount'], 
  
  'phone' => $_GET['dest'], //integer

  'request_id' => $requestid, // unique for every transaction
);
$curl       = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => $host,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_USERPWD => $username.":" .$password,
	CURLOPT_TIMEOUT => 60,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => $data,
)); */



}

 }}

//this code change the vtpass response to my own 

include"../../../../../objects2/response.php";  

//include('../../../../../functions/dbconnect.php');
//this code check if the vtpass response == success then let it go

/*
$tran = $db->query("SELECT * FROM paylog WHERE transaction_id='$requestid' ");

while($trrow = $tran->fetch_assoc()){ 
$tranid=$trrow['transaction_id'];

$statu=$trrow['status'];

}

if($requestid!=$tranid) {
} else{

$result=$statu;
$result1='success';
}//end if($requestid!=$tranid) 

*/



if($respond=='success') 
{

if($codes!='') {
 //$status1='transaction id already exist';

 $balance2=$_GET['amount'];
$rca=$ca+$balance2;

$ta=$ca+$balance2;
  
  
  $updated=mysqli_query($connect,"UPDATE user SET 
	balance='$rca' WHERE id='$idn'")or die();

include('agent1.php');

}
else {
//this code save the paylog files to the database
$result='successful';
$result1='success';

$repl=str_replace( "'", '',$status1);

$tra=$db->query("UPDATE paylog SET 
	status='Delivered' WHERE transaction_id='$requestid' ")or die();




$tra=$db->query("UPDATE paylog SET 
	rstatus='$repl' WHERE transaction_id='$requestid' ")or die();

$dstatus=json_decode($status1);
$request_id=$dstatus->data->recharge_id;

$trq=$db->query("UPDATE paylog SET 
	request_id='$request_id' WHERE transaction_id='$requestid' ")or die();

//include('paylog.php');
}




}


//this code check if the vtpass response == failed then let it stop and reverse the amount to the user account

 if($respond=='Failed')
{ 

  if(isset($_GET['amount']))
  {
	 
if($codes!='') {
 //$status1='transaction id already exist';


}
else

{
 $balance2=$_GET['amount'];
$rca=$ca+$balance2;

$ta=$ca+$balance2;
  
  
  $updated=mysqli_query($connect,"UPDATE user SET 
	balance='$rca' WHERE id='$idn'")or die();

include('agent1.php');

}

}

//include('paylog.php'); 

if($codes!='') {
 //$status1='transaction id already exist';

$result='Transaction successful';
$result1='success';



} else {

$result='Failed: We could not place your order, please try again later';

$result1='failed';

$tra=mysqli_query($connect, "UPDATE paylog SET 
	status='Failed' WHERE transaction_id='$requestid' ")or die();


$tra=mysqli_query($connect, "UPDATE paylog SET 
	rstatus='$status1' WHERE transaction_id='$requestid' ")or die();



$trbalance=mysqli_query($connect, "UPDATE paylog SET 
	balance='$balance1' WHERE transaction_id='$requestid' ")or die();

$trfbalance=mysqli_query($connect, "UPDATE paylog SET 
	fbalance='$ta' WHERE transaction_id='$requestid' ")or die();

$dstatus=json_decode($status1);
$request_id=$dstatus->data->recharge_id;

$trq=$db->query("UPDATE paylog SET 
	request_id='$request_id' WHERE transaction_id='$requestid' ")or die();

}

}

/**/

 } 
//this code check if the amount is greater than the user balance let it stop

else//if($ken>$balance1) 
{ $result='failed: insuficient fund';  

 } 



} else{ $result='Your pin is incurrect';

 } 




$resp=array();
array_push($resp, array("returnvalue"=>$result1, "title"=>$result));
		echo json_encode(array("kpapi_resp"=>$resp));

//}
?>