<?php 
//this code save the paylog files to the database

$paylog=$_GET['password'];


 if($paylog){
//get the url
        $product = $_GET['network'];
        $billersCode = $_GET['billersCode'];
       $variation_code = $_GET['variation_code'];
    
        $transaction_id = $requestid;
       $phone = $_GET['dest'];
       $email = $_GET['email'];
    
      $amount = $_GET['amount'];
      $status='success';
       $rstatus=$status1;

	 
if($phone)  

{
 $sql="INSERT INTO paylog (user_id,user,product,phone,email,billersCode,variation_code,amount,amount_charge,date,transaction_id,balance,fbalance,status,rstatus) VALUES('$user','$user_id','$product','$phone','$email','$billersCode','$variation_code','$amount','$rramount','$date','$transaction_id','$balance1','$ta','$status','$rstatus')";
		
 mysqli_query($connect,$sql); 

 
}

}
?>