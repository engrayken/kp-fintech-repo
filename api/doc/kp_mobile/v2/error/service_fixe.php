<?php 
//this code minus the payment item  from the user credit and save the reminder. 

// and token='$chtoken' 
 file_put_contents('call.txt', $_GET);


ob_start();
   // include('../../../../../functions/dbConfig.php');
include('../../../../../functions/connection.php');

include"../../../../../objects/random.php";

// $requestid=$rid;

$requestid=$_GET['requestid'];

$date= date('M/d/Y‎');


   $limit =1;
    
    $usernnn=$_GET['username'];
$chtoken=$_GET['password'];

$csecpin=$_GET['secpin'];
$chsecpin= md5($csecpin);

$pamount=$_GET['amount'];
$phone=$_GET['recepient'];

$v=$_GET['v'];

if($v=='VerifyYourNumber' || $v=='VerifyYourMeterNumber'){
$result="PLEASE CLICK ON VERIFY To comfirm Your Meter Number";
}
else {

    //get rows
    $query = $db->query("SELECT * FROM user WHERE username='$usernnn' ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
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



   $query = $db->query("SELECT * FROM pidentifier  ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
$_GET['serviceID'];

 $i_nam=str_replace( " ", "", $row['identifier_name']);

 $i_name=str_replace( "+", "", $i_nam);

if($_GET['serviceID']==$i_name) {
 $serviceID=$row['identifier_serviceID'];

}
}
}

$serviceIDcm=$serviceID;

?>	






<?php 
//this is the code that calculate the form 

$ken=$_GET['amount'];

//get transaction_id rows
    $queryt = $db->query("SELECT * FROM paylog  where transaction_id='$requestid' ");
    
   /*WHERE code='$_POST[transaction_id]'*/
   
            while($rowt = $queryt->fetch_assoc()){ 

 $codes=$rowt['transaction_id'];
 $codes_sta=$rowt['status'];
$codes_star=$rowt['rstatus'];
//die('{"code":"09","message":"transaction id already exit"}'); 
}

//this code calculate if the amount is less than the user balance let it go 

if($ken<=$balance1) {
?>

     <?php 


  if(isset($_GET['amount']) && $serviceID)
  {
	 
 $balance2=$_GET['amount'];
$ca=$balance1-$balance2;
$ta=$balance1-$balance2;
  
  
  $updated=mysqli_query($connect,"UPDATE user SET 
	balance='$ca' WHERE id='$idn'")or die();
if($codes!='') {
//echo'exist<br/>';

} else {
//echo'Not exist<br/>';

include('agent.php');

include('paylog2.php');

}



} //else {   $result='Something went wrong'; }
?>





    <?php

	
    $limit =1;
    
    
    //get rows
    $query = $db->query("SELECT * FROM payhost ORDER BY id");
    
     if($query->num_rows > 0){ ?>
        
        <?php 
            while($row = $query->fetch_assoc()){ 
$id=$row['id'];
$default=$row['xdefault'];

if($default=='1') {
$url = $row['host'];


//$usernamee  = $row['username'];
//$passworde  = $row['password'];

$usernamee  ='sandbox@vtpass.com';
$passworde  ='sandbox';
$url='https://sandbox.vtpass.com/api/pay';

}

				
        ?>




<?php

//this code send the form to vtpass website 
if(isset($serviceID)) {

if($codes!='') {

$username = "$usernameenot";

$password = "$passwordenot";

} else {
$username = "$usernamee"; //email address
$password = "$passworde"; //password
}

$host = "$url";
 
$data = array(
 'serviceID'=>  $serviceID, //integer
    'billersCode' => $_GET['billersCode'],   
    'amount' =>  $_GET['amount'],
  'variation_code' =>  $_GET['variation_code'], // integer
  'phone' => $_GET['recepient'], //integer
  'request_id' => $requestid, // unique for every transaction
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



}

 }}?>



<?php

//this code change the vtpass response to my own 

include"../../../../../objects/response.php";  ?>








 <?php

//include('../../../../../functions/dbconnect.php');
//this code check if the vtpass response == success then let it go

if($respond=='success') 
{
//this code save the paylog files to the database
//echo'1';
if($codes!='') {
 //$status1='transaction id already exist';

  if($_GET['amount'])
  {
	 
 $balance2=$_GET['amount'];
$rca=$ca+$balance2;
  $ta=$ca+$balance2;
  
  $updated=mysqli_query($connect,"UPDATE user SET 
	balance='$rca' WHERE id='$idn'")or die();


include('agent1.php');

}


} else {

$jsonDecoded=json_decode($status1, true);


foreach($jsonDecoded as $key => $value) {
if($key=='purchased_code' || $key=='pin') {
    $apin=$key.': '. $value;

}
}



$result='successful: '.$apin;
$result1='success';

$tra=$db->query("UPDATE paylog SET 
	status='success' WHERE transaction_id='$requestid' ")or die();




$tra=$db->query("UPDATE paylog SET 
	rstatus='$status1' WHERE transaction_id='$requestid' ")or die();

//include('paylog2.php');


}
}

//this code check if the vtpass response == failed then let it stop and reverse the amount to the user account

if($respond=='Failed')
{ 



  if(isset($_GET['amount']) && $serviceID)
  {

if($codes!='') {
 //$status1='transaction id already exist';

$jsonDecoded=json_decode($codes_star, true);


foreach($jsonDecoded as $key => $value) {
if($key=='purchased_code' || $key=='pin') {
    $apin=$key.': '. $value;

}
}
//$result='successful: '.$apin;
$result=$codes_sta.': '.$apin;
$result1='success';

}
else

{
	 
 $balance2=$_GET['amount'];
$rca=$ca+$balance2;
  $ta=$ca+$balance2;
  
  $updated=mysqli_query($connect,"UPDATE user SET 
	balance='$rca' WHERE id='$idn'")or die();
 
include('agent1.php');


//include('paylog2.php'); 
$result='Failed: We could not place your order, please try again later';

 $result1='failed';
//echo'3';

$tra=mysqli_query($connect, "UPDATE paylog SET 
	status='Failed' WHERE transaction_id='$requestid' ")or die();


$tra=mysqli_query($connect, "UPDATE paylog SET 
	rstatus='$status1' WHERE transaction_id='$requestid' ")or die();



$trbalance=mysqli_query($connect, "UPDATE paylog SET 
	balance='$balance1' WHERE transaction_id='$requestid' ")or die();

$trfbalance=mysqli_query($connect, "UPDATE paylog SET 
	fbalance='$ta' WHERE transaction_id='$requestid' ")or die();

}
}

}

?>





<?php } 
//this code check if the amount is greater than the user balance let it stop

elseif($ken>$balance1) { 
$result='failed: insuficient fund'; 
//echo'2'; 
 } 



} else{ //echo'4';
 $result='Your pin is incurrect';
 } 
}


$resp=array();
array_push($resp, array("returnvalue"=>$result1, "title"=>$result));
		echo json_encode(array("kpapi_resp"=>$resp));


?>


