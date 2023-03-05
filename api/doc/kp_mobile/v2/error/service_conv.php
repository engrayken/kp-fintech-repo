<?php 
//this code minus the payment item  from the user credit and save the reminder. 

// and token='$chtoken' 



ob_start();
 //   include('../../../../../functions/dbConfig.php');
include('../../../../../functions/connection.php');

include"../../../../../objects/random.php";


if($_POST['serviceID']=='airtime-pin-converter')
{
$pin=$_POST['recepient'];

} else{ $recepient=$_POST['recepient']; }




$variation_code=$_POST['variation_code'];



$requestid=$rid;

$date= date('M/d/Y‎');


   $limit =1;
    
    $usernnn=$_POST['username'];
$chtoken=$_POST['token'];

$csecpin=$_POST['secpin'];
$chsecpin= md5($csecpin);


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
?>	






<?php 





   //get rows
    $query = $db->query("SELECT * FROM pamount WHERE amount_variationcode='$variation_code' ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 


$pamount= $row['amount']; 

}
}
//this is the code that calculate the form 

$ken=$pamount;

$deposit=70/100*$pamount; 

//this code calculate if the amount is less than the user balance let it go 


?>






    <?php
    //this code collect the vtpass link from database 
//    include('../../../../../functions/dbConfig.php');
	
    $limit =1;
    
    //get rows
    $query = $db->query("SELECT * FROM payhost ORDER BY  id");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
$id=$row['id'];

$default=$row['id'];

if($default=='2')
{
$url = $row['host'];
$publicKey  = $row['username'];
$privateKey  = $row['password'];
}

				
        ?>




<?php

//this code send the form to vtpass website 
if(isset($_POST['serviceID'])) {

$host="$url";

$data = array(
  'amount'=> $pamount, //integer
  'private_key' => $privateKey,  //private key
  'public_key' => $publicKey, //public key
  'phone' =>  $recepient, // depositor phone number
  'pin' => $pin, //pin
  'network' => $_POST['network'], //network
  'order_id' => $requestid, // unique id for every transaction
);

    $curl_conv = curl_init();
     curl_setopt_array($curl_conv, array(
     CURLOPT_URL => $host,           


      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
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

if($rrespond=='pending') 
{
//this code save the paylog files to the database
echo'1';

include('paylog3.php');


}


//this code check if the vtpass response == failed then let it stop and reverse the amount to the user account

if($rrespond=='Failed')
{ 



include('paylog3.php'); 

echo'3';
}


?>





<?php 



} else{ echo'4'; } 
?>


