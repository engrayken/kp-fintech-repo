<?php
include('../../../../../functions/dbConfig.php');
include('../../../../../functions/dbconnect.php');

$hostkey = "";        //replace ur 32 bit secure key , Get your secure key from your Reseller Control panel
    $paystack_secretkey = "sk_live_e53068434a66c4100dc613f3cd9bd8c880dcfbc0";      //replace with your Paystack Integration API Secret Key. Get your API keys from your Paystack Dashboard

    $paystack_base = "https://api.paystack.co/";    



 file_put_contents('call.txt', $_POST);

$now = date('Y-m-d H:i:s', time());

$transId=$_POST['paystack_ref_code'];
$amount=$_POST['amount'];
$time=$_POST['fund_time'];
$chtoken=$_POST['token'];
$user_id=$_POST['user_id'];
$phone=$_POST['phone'];

$product='Credit Wallet';

$reference=$transId;



    $query = $db->query("SELECT * FROM user WHERE id='$user_id' ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
$idn=$row['id'];

$balance1= $row['balance'];

$user_id= $row['id'];

$user=$row['username'];



$vtoken= $row['token'];
$secpin= $row['secpin'];


 
}}	



if($chtoken==$vtoken) 

{

?>	

<?php


        //$transId ='T670348638566813';         //Pass the same transid which was passsed to your Gateway URL at the beginning of the transaction.




        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $paystack_base . "transaction/verify/" . $transId,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => -1, //Maximum number of redirects
            CURLOPT_TIMEOUT => 0, //Timeout for request
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER => true, //Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer "  . $paystack_secretkey,
                "Content-Type: application/json",
            )
        ));

  $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $paymentInfo = json_decode($response);
            if ($paymentInfo->status == true) {
                if ($paymentInfo->data->status == 'success') {
               $status='success';




          
$balance=$amount+$balance1;

  $updated=mysql_query("UPDATE user SET 
	balance='$balance' WHERE id='$idn' ")or die();
  if($updated)
  {


 $sql="INSERT INTO paylog (user_id,user,product,phone,email,billersCode,variation_code,amount,date,transaction_id,status,rstatus) VALUES('$user','$user_id','$product','$phone','$email','$billersCode','$variation_code','$amount','$now','$reference','$status','$rstatus')";
 mysql_query($sql); 
  
  }

echo'1';
                } else {
           
echo'error';

$status='failed';

 $sql="INSERT INTO paylog (user_id,user,product,phone,email,billersCode,variation_code,amount,date,transaction_id,status,rstatus) VALUES('$user','$user_id','$product','$phone','$email','$billersCode','$variation_code','$amount','$now','$reference','$status','$result')";
 mysql_query($sql); 

                }
            } else {
       
echo'error';

$status='failed';

 $sql="INSERT INTO paylog (user_id,user,product,phone,email,billersCode,variation_code,amount,date,transaction_id,status,rstatus) VALUES('$user','$user_id','$product','$phone','$email','$billersCode','$variation_code','$amount','$now','$reference','$status','$result')";
 mysql_query($sql); 

            }
        }

?>


<?php  } ?>
