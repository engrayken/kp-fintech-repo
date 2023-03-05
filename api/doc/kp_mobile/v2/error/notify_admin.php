<?php
header("Access-Control-Allow-Origin: *");



include('../../../../../functions/connection.php');
include('../../../../../functions/error_success.php');
include('../../../../../objects/query.php');
include('../../../../../objects/sms.php');





$now = date('Y-m-d H:i:s', time());

$date= date('YmdHis', time());

 $token= md5($date);





if($_POST['notify_kp']=="true") 
{

 file_put_contents('call.txt', $_POST);


$amount=$_POST['amount'];
$bank=$_POST['bank'];
$username=$_POST['user_name'];
$phone=$_POST['phone'];

$msg=" i deposit $amount for wallet topup to your $bank my username is $username phone: $phone  time:  $now";

$otell='08138442969';
$sender='kp user'; 


$xsend = new process();

$xsend->sendsms($sender, $otell, $msg);


				echo"1"; 



} else { echo"2"; }

?>

