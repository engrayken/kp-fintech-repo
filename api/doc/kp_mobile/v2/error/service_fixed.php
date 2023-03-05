<?php 
//this code minus the payment item  from the user credit and save the reminder. 
include('../../../../../app/config.php');
//strtolower( str_replace( " ", "_", $item ) );
// and token='$chtoken' 

//file_put_contents('call.txt', json_encode($_GET));

 $vcode=$_GET['variation_code'];

$ph=$_GET['recepient'];

$serviceIDcm=strtolower($_GET['serviceID']);


//$requestid=$_GET['requestid'];
$requestid=substr($_GET['requestid'], 0, 13);
//$requestid=$rid;

$date= date('M/d/Y‎');

 $qun=$_GET['quantity'];

   $limit =1;
    
    $usernnn=$_GET['username'];
$chtoken=$_GET['password'];

$csecpin=$_GET['secpin'];
$chsecpin= md5($csecpin);



$v=$_GET['v'];

if($v=='VerifyYourNumber' || $v=='PleasechecktheSmartcardNumberandTryAgain'){
$result="PLEASE CLICK ON VERIFY To comfirm Your Number";

//$result1='failed';

}
else {


    //get rows
    $query = $dbc->query("SELECT * FROM users WHERE email='$usernnn' ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
$idn=$row['id'];

$balance1= $row['dep_balance'];

$user_id= $row['id'];

$user=$row['username'];
$agent=$row['type'];

if($ph)
{
$phone=$_GET['recepient'];
}else{ $phone=$row['phone']; }

$vtoken= $row['utoken'];
$secpin= $row['secpin'];


}}	


$queryt = $dbc->prepare("SELECT * FROM transaction  where trans_id=? ");
   $queryt->bind_param('s', $requestid);
$queryt->execute();
$rowte=$queryt->get_result();
$rowt=$rowte->fetch_assoc();
$rowte->close();

 $codes=$rowt['trans_id'];
 $codes_sta=$rowt['status'];
$codes_star=$rowt['rstatus'];


if($chtoken==$vtoken && $chsecpin==$secpin) 

{ 

//$amount_name=$variation_code;

//WHERE amount_variationcode='$variation_code'
   //get rows
$limit=1;
    $query = $dbc->query("SELECT * FROM pamount ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 

  $variation_codev=$row['amount_variationcode'];

 


//echo $vcode;

if($variation_codev==$vcode){ 

if($_GET['serviceID']=='WAEC Scratch Card'){
$serviceID='waec';
} else{

$serviceID=strtolower($_GET['serviceID']);
}
   $variation_code=$row['amount_variationcode'];
// check if quantity else display normal amount

if($qun){

$amt= $row['amount']; 
$amt1=$amt*$qun;

$pamount=$amt1;

} else{
  $pamount= $row['amount']; 

}





}
}
}
//this is the code that calculate the form 

$ken=$pamount;

//this code calculate if the amount is less than the user balance let it go 

if($ken<=$balance1) {


  if($pamount)
  {
	 
 $balance2=$pamount;
 $ca=$balance1-$balance2;
  $ta=$balance1-$balance2;




if($codes=='') {
//echo'Not exist<br/>';

include('agent.php');

//include('paylog2.php');

}


$update=$dbc->prepare("update users set dep_balance=? where id=? ");
$update->bind_param('ss', $ca, $idn);
$update->execute();
$update->close();


}

	
    $limit =1;
    //get rows
    $query = $dbc->query("SELECT * FROM payhost ORDER BY id");
    
    if($query->num_rows > 0){ ?>
        
        <?php 
            while($row = $query->fetch_assoc()){ 
$id=$row['id'];
$default=$row['xdefault'];

if($default=='1') {
$url = $row['host'];

 $usernamee  = $row['username'];
$passworde  = $row['password'];

//$usernamee  ='sandbox@vtpass.com';
//$passworde  ='sandbox';
$url='https://sandbox.vtpass.com/api/pay';
}

}
}

if($codes==$requestid) {
 //$status1='transaction id already exist';

 $balance2=$pamount;
$rca=$ca+$balance2;
  $ta=$ca+$balance2;
  
 $update=$dbc->prepare("update users set dep_balance=? where id=? ");
$update->bind_param('ss', $rca, $idn);
$update->execute();
$update->close();

$jsonDecoded=json_decode($codes_star, true);


foreach($jsonDecoded as $key => $value) {
if($key=='purchased_code' || $key=='pin') {
    $apin=$key.': '. $value;

}
}

if($codes_sta==1){
$result='Transaction Successful';
$result1='success';
$result=$codes_sta.': '.$apin;
} else{
$result='Transaction Failed';
$result1='failed';
}




} 
else {

//this code send the form to vtpass website 

if(isset($serviceID)) {



 $username = "$usernamee"; //email address
$password = "$passworde"; //password


$host = "$url";

$data = array(
  'serviceID'=> $serviceID, //integer
    'billersCode' => $_GET['billersCode'],   
    'quantity' => $_GET['quantity'], 
  'variation_code' =>  $variation_code, // integer
  'phone' => $phone, //integer
  'request_id' => $requestid, // unique for every transaction
);

if($serviceIDcm=='neco') {

##### TO MAKE NECO PURCHASE #####


$p='21749ab30b0972adfb8aken';


$phone=$_GET['recepient'];

//$userid='08138442969';
//$p='21749ab30b0972adfb8a';


  $size= $variation_code; // integer

$user_ref=$requestid;

 
 
$smecurl = curl_init(); 
//step2
curl_setopt($smecurl,CURLOPT_URL,"http://mobileairtimeng.com/httpapi/neco?userid=$userid&pass=$p&jsn=json&user_ref=$user_ref");
curl_setopt($smecurl,CURLOPT_RETURNTRANSFER,true);
curl_setopt($smecurl,CURLOPT_HEADER, false); 

}else{

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

}



//this code change the vtpass response to my own 

include"response.php";  

//include('../../../../../functions/dbconnect.php');
//this code check if the vtpass response == success then let it go

if($respond=='1') 
{

  if($pamount)
  {

//this code save the paylog files to the database
//echo'1';
$jsonDecoded=json_decode($status1, true);


foreach($jsonDecoded as $key => $value) {
if($key=='purchased_code' || $key=='pin') {
    $apin=$key.': '. $value;

}
}


$result='successful: '.$apin;
$result1='success';

$tstatus='1';
$tra=$dbc->prepare("update transaction set status=? where trans_id=? ");
$tra->bind_param('ss', $tstatus, $requestid);
$tra->execute();
$tra->close();



$tra=$dbc->prepare("update transaction set rstatus=? where trans_id=? ");
$tra->bind_param('ss', $status1, $requestid);
$tra->execute();
$tra->close();

include('paylog2.php');
}

}


//this code check if the vtpass response == failed then let it stop and reverse the amount to the user account

if($respond=='0')
{ 

  if($pamount && $serviceID)
  {

	 
 $balance2=$pamount;
$rca=$ca+$balance2;
  $ta=$ca+$balance2;
  
$update=$dbc->prepare("update users set dep_balance=? where id=? ");
$update->bind_param('ss', $rca, $idn);
$update->execute();
$update->close();


include('agent.php');



//include('paylog2.php'); 


$result='Failed: We could not place your order, please try again later';

 $result1='failed';

$fstatus='0';
$tra=$dbc->prepare("update transaction set status=? where trans_id=? ");
$tra->bind_param('ss', $fstatus, $requestid);
$tra->execute();
$tra->close();


$tra=$dbc->prepare("update transaction set rstatus=? where trans_id=? ");
$tra->bind_param('ss', $status1, $requestid);
$tra->execute();
$tra->close();



$trbalance=$dbc->prepare("UPDATE transaction SET bal_bf= ? WHERE trans_id= ?");
$trbalance->bind_param("ii", $balance1, $requestid);
$trbalance->execute();
$trbalance->close();

$updtr=$dbc->prepare("UPDATE transaction SET bal_af= ? WHERE trans_id= ?");
$updtr->bind_param("ii", $ta, $requestid);
$updtr->execute();
$updtr->close();



}
//echo'3';
}

} //end check transaction_id

 } 
//this code check if the amount is greater than the user balance let it stop

elseif($ken>$balance1) { 
 $result='failed: insuficient fund'; 
$result1='failed';



//echo'2'; 
 } 



} else{ $result='Your pin is incurrect';
//echo'4';
 } 
}

$resp=array();
array_push($resp, array("returnvalue"=>$result1, "title"=>$result));
		echo json_encode(array("kpapi_resp"=>$resp));

?>