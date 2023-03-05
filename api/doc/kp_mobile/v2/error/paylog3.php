 <?php

//this code save the paylog files to the database


$paylog=$_POST['paylog'];

if($paylog){
//get the url
        $product = $_POST['serviceID'];
    $pin = $pin;
$deposit = $deposit;
        $billersCode = $_POST['billersCode'];
       $variation_code = $_POST['variation_code'];
        
        $transaction_id = $requestid;
       $phone = $recepient;
       $email = $_POST['email'];
      
      $amount = $pamount;
$quantity= $_POST['quantity'];
        $status=$rrespond;
       $rstatus=$d;
       $fix='yes';
    
	 
if($paylog)


{
 $sql="INSERT INTO paylog (user_id,user,product,pin,deposit,billersCode,variation_code,phone,email,amount,quantity,date,transaction_id,balance,fbalance,status,rstatus,fix) VALUES('$user','$user_id','$product','$pin','$deposit','$billersCode','$variation_code','$phone','$email','$amount','$quantity','$date','$transaction_id','$balance1','$ta','$status','$rstatus','$fix')";
		
 mysqli_query($connect,$sql); 

 
}




}
?>