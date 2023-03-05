<?php 





//this code save the paylog files to the database

$paylog=$_GET['password'];

if($paylog){
//get the url
        $product = $_GET['network'];
        $billersCode = $_GET['billersCode'];
if($billersCode=='') {
$billersCode='null';
}
       $variation_code = $_GET['variation_code'];
    
        $transaction_id = $requestid;
       $phone = $_GET['dest'];
       $email = $_GET['email'];
    
      $amount = $_GET['amount'];
      $status=$respond;
       $rstatus=$status1;
    
	 
if($phone) 


{
$quantity='0';

$sto =$dbc->prepare("INSERT INTO transaction (trans_id,user_id,net,deno,amount,phone,date,billersCode,quantity,bal_bf,bal_af,status,rstatus) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sto->bind_param("iisiissiiiiis", $requestid, $user_id, $product, $amount, $rramount, $phone, $datetime, $billersCode, $quantity, $balance1, $ta, $status, $rstatus);
$sto->execute();
//echo $sto->error;
$sto->close(); 


 
}
}
?>