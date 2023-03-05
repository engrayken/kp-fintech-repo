 <?php

//this code save the paylog files to the databas

//file_put_contents('call.txt', $to);

$paylog=$_GET['password'];

if($paylog){
//get the url
        $product =strtolower($serviceIDcm);
    $pin = $_GET['pin'];
$deposit = $_GET['deposit'];

        $billersCode = $_GET['billersCode'];
if($billersCode==''){
$billersCode='null';
}
       $variation_code = $variation_code;
     
        $transaction_id = $requestid;
       $phone = $phone;
       $email = $_GET['email'];
      
      $amount = $pamount;
$quantity= $_GET['quantity'];
      //  $status=$respond;
   $status=$respond;
       $rstatus=$status1;
    
	 
if($amount)
{
$quantity='0';
/*$queryt = $dbc->prepare("SELECT * FROM transaction  where trans_id=? ");
   $queryt->bind_param('s', $requestid);
$queryt->execute();
$rowte=$queryt->get_result();
$rowt=$rowte->fetch_assoc();
$rowte->close();

 $codes=$rowt['trans_id'];
 $codes_sta=$rowt['status'];
if($codes==$requestid) {

} else{*/
$sto =$dbc->prepare("INSERT INTO transaction (trans_id,user_id,net,deno,amount,phone,date,billersCode, quantity,bal_bf,bal_af,status,rstatus) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$sto->bind_param("sisiisssiiiis", $transaction_id, $user_id, $product, $amount, $rramount, $phone, $datetime, $billersCode, $quantity, $balance1, $ta, $status, $rstatus);
$sto->execute();
//echo $sto->error;
$sto->close(); 
//}
 
}






}
?>