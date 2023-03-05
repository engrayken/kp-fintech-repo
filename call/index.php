<?php 



//this code minus the payment item  from the users credit and save the reminder. 

// and token='$chtoken' 


require_once("../app/config.php");

//if ($_SERVER['REQUEST_METHOD'] == 'GET') {
 file_put_contents('call.txt', $_GET);

//$requestid=$_GET['requestid'];



$apikey="cc1abd17";
$task="check_status";

//$order_id="1027685";
//$order_id="1027680";

$order_id=$_GET['recharge_id'];

//{"server_message":"Transaction Failed","status":true,"error_code":"1982","data":{"recharge_id":1027685,"amount_charged":"47.65","after_balance":"6528.22","bonus_earned":"2.35","status":"FAILED"},"text_status":"FAILED"}

 $baseurl='https://smartrecharge.ng/api/v2/airtime?api_key='.$apikey.'&order_id='.$order_id.'&task='.$task;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $baseurl); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
      //  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION,true);
    $content1 =curl_exec($ch);
                                    
     $content=json_decode($content1);
                                   
        curl_close($ch);

 $recharge_id=$content->data->recharge_id;

echo $sstatus_id=$content->data->status;


    //$query = mysqli_query($dbc,"SELECT * FROM transaction WHERE trans_id='$recharge_id' ");

$query_ken =$dbc->prepare("SELECT * FROM transaction WHERE request_id= ?");
$query_ken->bind_param("s", $recharge_id);
$query_ken->execute();
$query=$query_ken->get_result();
$query_ken->close();
    
    if($query->num_rows > 0){
while($row = $query->fetch_assoc()){ $user_id=$row['user_id'];
 $user =$row['user_id'];
 $product =$row['net']; 
 
 $trans_id=$row['trans_id'];
      $phone =$row['phone'];
      // $email = $row['email'];
      $date =$row['date'];
      $amount =$row['amount'];
$set_amount=$row['amount'];
 $status =$row['status'];
$bal_bf =$row['bal_bf'];
$bal_af =$row['bal_af'];

}
}

if($status=='1' && $sstatus_id=='COMPLETED')
{ //update status to success

//$tra=mysqli_query($dbc, "UPDATE transaction SET status='1' WHERE trans_id='$trans_id' ")or die();
$iid=1;
$tra=$dbc->prepare("UPDATE transaction SET status= ? WHERE request_id= ?");
$tra->bind_param("ii", $iid, $recharge_id);
$tra->execute();
//$query=$query_ken->get_result();
$tra->close();

echo $sstatus_id=$content->data->status;
} else if($status=='1' && $sstatus_id=='FAILED')
{ //then refund and change the status to refund

  //  $query = mysqli_query($dbc,"SELECT * FROM users WHERE id='$user' ");

$query1_ken =$dbc->prepare("SELECT * FROM users WHERE id= ?");
$query1_ken->bind_param("i", $user);
$query1_ken->execute();
$query1=$query1_ken->get_result();
$query1_ken->close();
    
    if($query1->num_rows > 0){
            while($row = $query1->fetch_assoc()){ 
$idn=$row['id'];

 $balance1= $row['dep_balance'];

 $uuemail= $row['email'];


}}

$balance2=$balance1+$amount;

 // $updated=mysqli_query($dbc,"UPDATE users SET dep_balance='$balance2' WHERE id='$user'")or die();

$updated=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?");
$updated->bind_param("si", $balance2, $user);
$updated->execute();
//$query=$query_ken->get_result();
$updated->close();

//$statuses='2'
$upt=mysqli_query($dbc, "UPDATE transaction SET status='2' WHERE request_id='$recharge_id' ")or die();
/*$uptd=$dbc->prepare("UPDATE transaction SET status= ? WHERE request_id= ?");
$uptd->bind_param("ss", $statuses, $recharge_id);
$uptd->execute();
//$query=$query_ken->get_result();
$uptd->close();
*/

//$uptd=mysqli_query($dbc, "UPDATE transaction SET balance='$ffbalance' WHERE trans_id='$trans_id' ")or die();
$uptd=$dbc->prepare("UPDATE transaction SET bal_bf= ? WHERE request_id= ?");
$uptd->bind_param("ss", $bal_bf, $recharge_id);
$uptd->execute();
//$query=$query_ken->get_result();
$uptd->close();

//$upte=mysqli_query($dbc, "UPDATE transaction SET fbalance='$balance2' WHERE trans_id='$trans_id' ")or die();

$upt=$dbc->prepare("UPDATE transaction SET bal_af= ? WHERE request_id= ?");
$upt->bind_param("ss", $balance2, $recharge_id);
$upt->execute();
//$query=$query_ken->get_result();
$upt->close();


$message='Failed '.$product.' Transsction carried out by you has been successfully reversed. Transaction id: '.$recharge_id.' amount: '.$amount.' ';
$email =$uuemail; //$email;
//$subject = $check_row[1];
$subject ='Reversal';

require '../lib/phpmailer/PHPMailerAutoload.php';

	require_once "../lib/mail/user.php";
	$mail = new PHPMailer(true);                            
	$mail->SMTPDebug = 0;                                
	$mail->isSMTP();                                      
	$mail->Host = $eset['hoste'];; 
	$mail->SMTPAuth = true;                        
	$mail->Username = $eset['username'];                 
	$mail->Password = $eset['password'];                          
	$mail->SMTPSecure = 'ssl';                            
	$mail->Port = $eset['porte'];
	$mail->setFrom($eset['frome'], $set['site_name']);
	$mail->addAddress($email, $set['site_name']);          
	$mail->addReplyTo($eset['reply_to'], $set['site_name']);
	$mail->isHTML(true);                               
	$mail->Subject = $subject;
	$mail->Body=$email_content;
	$mail->AltBody = $set['site_name'];
	if ($mail->send()) {
	
	}
//update newsletter_job


}

?>