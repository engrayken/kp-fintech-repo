  <?php

ob_start();
 //   include('../../../../../functions/dbConfig.php');
include('../../../../../functions/connection.php');
include"../../../../../objects/random.php";

$now = date('Y-m-d H:i:s', time());

 file_put_contents('call.txt', $_GET);

$usern=$_GET['username'];
$cname=$_GET['cname'];
$chtoken=$_GET['password'];
$amount=$_GET['amount'];
$cvr=$_GET['vr'];
$amountf=$_GET['amount'];

$cov='50';
$amount_cov=$amountf+$cov;

$bname=$_GET['bank_name'];
$bname=$_GET['paylog'];

$account_number=$_GET['account_number'];

$account_number=$_GET['billersCode'];

$account_name=$_GET['account_name'];
$paylog=$_GET['paylog'];

$csecpin=$_GET['secpin'];

$chsecpin= md5($csecpin);

$transaction_id=$rid;


 


  //get rows
    $query = $db->query("SELECT * FROM user WHERE username='$usern' ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
$idn=$row['id'];

$balance= $row['balance'];
$earning= $row['earning'];
$user_id= $row['id'];

$user=$row['username'];

$agent= $row['type'];
$vtoken= $row['token'];
$secpin= $row['secpin'];


}}	




if($agent=="agent")
{
if($chtoken==$vtoken && $chsecpin==$secpin) 

{ 

//transfer earning to wallet
if($_GET['paylog']=="Transfer_From_Earning_To_Wallet")
{

if($amount>$earning) {
	//echo"2";
$result='Your Earning  Is Too Low';
}
else if($amount<=$earning)
{ 
$balance1=$amount+$balance;

$earning1=$earning-$amount;
$status="success";

		mysqli_query($connect,"update user set balance=balance+$amount where username='$user' ");

mysqli_query($connect,"update user set earning=earning-$amount where username='$user' ");


 $sql="INSERT INTO paylog (user_id,user,product,pin,deposit,billersCode,variation_code,phone,email,amount,quantity,date,transaction_id,status,rstatus,fix) VALUES('$user','$user_id','tran-earning-wallet','$pin','$deposit','$account_number','$variation_code','$billersCode','$email','$amount','$quantity','$now','$transaction_id','$status','$rstatus','$fix')";
 mysqli_query($connect,$sql); 

		//echo "1";
$result='Transfer earning to wallet successful';

	}
	else
	{
		//echo "3";
$result='Something is wrong Please try again';
	}
}
// end transfer earning to wallet



else if($_GET['paylog']=="Transfer_From_Wallet_To_Bank")
{
if($cvr=='Verify_Your_Account_Number' || $cvr=='Could_not_verify_account_name._Check_Account_Number_or_try_again') {  $result='Please verify Your Account';

} else{

if($amount_cov>$balance) {
	//echo"2";
$result='Your Balance  Is Too Low: you need to have atleast N50 above the actual amount';

}
else if($amount_cov<=$balance)
{ 
include'bank_transfer.php';


$earning1=$earning-$amount;



if($payres->requestSuccessful=='true') {

$rstatus=$payres->responseMessage;
$status='success';

$reference=$payres->reference;

$value=$payres->status;

$result='Transfer wallet to bank successful';

mysqli_query($connect,"update user set balance=balance-$amount_cov where username='$user' ");


} else {
$status="Failed";
$value="Failed";

$result='Transfer wallet to bank Failed';

$reference=$transaction_id;
}

 $sql="INSERT INTO paylog (user_id,user,product,pin,deposit,billersCode,variation_code,phone,email,amount,quantity,date,transaction_id,status,rstatus,fix) VALUES('$user','$user_id','tran-fund-bank','$pin','$deposit','$billersCode','$variation_code','$billersCode','$email','$amount','$quantity','$now','$reference','$status','$payresponse','$fix')";
		
 mysqli_query($connect,$sql); 

		//echo "1";

	}
	else
	{
		//echo "3";
$result='Something went wrong Please try again';
	} //end if($amount_cov>$balance)


} //end if($cvr=='Verify_Your_Account_Number')

}

else if($_GET['paylog']=="Transfer_From_Wallet_To_Other_Customer")
{

if($amount>$balance) {
	//echo"2";
$result='Your Wallet  Is Too Low';
}
else if($amount<=$balance)
{ 
  //get rows
    $cquery = $db->query("SELECT * FROM user WHERE username='$cname' ");
    
    if($cquery->num_rows > 0){ ?>
        
        <?php
            while($crow = $cquery->fetch_assoc()){ 
//$idn=$crow['id'];

$cbalance= $crow['balance'];
$earning= $crow['earning'];

$cuname= $crow['username'];

}
}

if($cname==$cuname)
{
if($cname==$user) 
{
$result='You cant  transfer money to your self';
}

else
{


$balance1=$amount-$balance;

$cbalance1=$cbalance+$amount;
$status="success";

		mysqli_query($connect,"update user set balance=balance-$amount where username='$user' ");

mysqli_query($connect,"update user set balance=balance+$amount where username='$cuname' ");


 $sql="INSERT INTO paylog (user_id,user,product,pin,deposit,billersCode,variation_code,phone,email,amount,quantity,date,transaction_id,status,rstatus,fix) VALUES('$user','$user_id','tran-earning-wallet','$pin','$deposit','$account_number','$variation_code','$billersCode','$email','$amount','$quantity','$now','$transaction_id','$status','$rstatus','$fix')";
 mysqli_query($connect,$sql); 

$result='Transfer wallet to customer successful';


} //end if($cname==$user) 

} else{
$result='The Username does not Exist';


} //end if($cname==$cuname)

}//end if($amount>$balance) 

} else {

$result='Something Went wrong Please try again';

}

// end transfering earning to bank


} else { //echo'4'; 

$result='Your Pin  Is incorrect';
}  //end checking of pin

} else if($agent!="agent")
{ //echo '5';

$result='This method is only available to registered agent';

 }//end checking of agent

$resp=array();
array_push($resp, array("returnvalue"=>$value, "title"=>$result));
		echo json_encode(array("kpapi_resp"=>$resp));
?>