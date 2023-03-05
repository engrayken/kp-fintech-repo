<?php   
$limited=date('dmy');
if($limited!=$rowv['limited']){
 //update user quantity
 $limitedq='0';
 $upli=$dbc->prepare("UPDATE users SET limiteq= ? WHERE id= ?"); 
 $upli->bind_param("si", $limitedq, $user_id);
 $upli->execute();
 $upli->close();

}
$qstyq=$rowv['limiteq'];
$qsty=$quantity+$qstyq;

if($qsty<$rowv['limite']) {

// call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $chtoken)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
 $arrResponse = json_decode($response, true);
  
// verify the response

if($arrResponse["success"] == '1' && $arrResponse["hostname"] == $kenhost  && $arrResponse["action"] == $temp_ran && isset($_POST['ll'])==$_SESSION['goch'] && isset($_POST['gtoken'])!='' && isset($_POST['user_id'])==$_SESSION['bitcrow_userid'] && $arrResponse["score"] >= 0.5) {
    // valid submission
//if($quantity<$rowv['limit'] || $quantity==$rowv['limit'])

##### TO MAKE AIRTIME PIN PURCHASE #####

$url = 'https://carddispenser.com.ng/mode/http/api/card/index.php?'; //API Url (Do not change)
$email='kennethayogu@gmail.com';  //Replace with your account email address
$pkey='6NrBMcG3gDVn75R2W8z9q4CrQGVmTd';  // Replace with your account username
$skey='75R2W8z9q4CrQGVmTd6NrBMcG3gDVn2718';
$password='k3443+h1992';
$request_id=$token;

$data = array(
   
        'email'=>$email,
        'skey'=>$skey,
        'pkey'=>$pkey,
        'password'=>$password,
        'tid'=>'kp'.$token,
       'network'=>$net,
        'amount'=>$deno, 
        'quan'=>$quantity,
    );
    $curl       = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $data,
    ));
    
   
if($curl)
{
 $status1=curl_exec ($curl); 
$rstatus=$status1;

$json = json_decode($status1);
$resp=$json->status;

//$jo=json_encode($_POST);
 file_put_contents('test.txt', $status1);



if($resp=='s0c') {

 //execute
  $jsonIterator =new RecursiveIteratorIterator(new RecursiveArrayIterator(json_decode($status1, TRUE)),
  RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(!is_array($val)) {
       if($key == "serial"/* || $key =="seria" ||   $key =="descr"*/) {


     echo'<br/>';

        }

       if($key == "pin"/* ||  $key == "seria" ||   $key =="descr"*/)
 {  $bundle=$key.$val.",";
 $bundle=substr_replace($bundle,"",-1);
 


  $exp = explode('
', $bundle);
  
      foreach($exp as $item)
      {
  $xexp = explode('seria', $item);
  
 $pin=str_replace("pin","",$xexp[0]);
 $seria=rand(123456789,987654321);
 //str_replace("seria","",$xexp[1]);
 switch ($json->network) {
    case"airtel";
    $descr='*126*'.$pin.'#';
    break;
    case"mtn";
    $descr='*555*'.$pin.'#';
    break;
    case"glo";
    $descr='*123*'.$pin.'#';
    break;
    case"9mobile";
    $descr='*222*'.$pin.'#';
    break;
  
  }

 // str_replace("descr","",$xexp[2]);

 $sto = mysqli_query($dbc,"INSERT INTO mypin (orderno,user_id,amount,net,deno,pin,seria,descr,date,status)
 VALUES('$token','$user_id','$deno','$json->network','$deno','$pin','$seria','$descr','$datetime','pending');");


} 

}
    } }  //end decode execute 

    //update user quantity
    $upli=$dbc->prepare("UPDATE users SET limiteq= ? WHERE id= ?"); 
    $upli->bind_param("si", $qsty, $user_id);
    $upli->execute();
    $upli->close();

     //update user quantity limite date
     $upli=$dbc->prepare("UPDATE users SET limited= ? WHERE id= ?"); 
     $upli->bind_param("si", $limited, $user_id);
     $upli->execute();
     $upli->close();

    echo json_encode(['code'=>'s0c']);
$status='1';

} else if($resp=='786') {
    echo json_encode(['code'=>'14q']);
$status='0';
$a=$b+$total;
//mysqli_query($dbc,"UPDATE users SET dep_balance='$a' WHERE id='$user_id' "); 
$usf=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?"); 
$usf->bind_param("si", $a, $user_id);
$usf->execute();
$usf->close();
// end Debite customer
}
else {
    echo json_encode(['code'=>'141']);
$status='0';
$a=$b+$total;
//mysqli_query($dbc,"UPDATE users SET dep_balance='$a' WHERE id='$user_id' "); 
$usf=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?"); 
$usf->bind_param("si", $a, $user_id);
$usf->execute();
$usf->close();
// end Debite customer
}


}


} else {

    echo json_encode(['code'=>'141']);
$status='0';
$a=$b+$total;
//mysqli_query($dbc,"UPDATE users SET dep_balance='$a' WHERE id='$user_id' "); 
$usf=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?"); 
$usf->bind_param("ii", $a, $user_id);
$usf->execute();
$usf->close();
// end Debite customer
}

} else {

    echo json_encode(['code'=>'14l']);
$status='0';
$a=$b+$total;
//mysqli_query($dbc,"UPDATE users SET dep_balance='$a' WHERE id='$user_id' "); 
$usf=$dbc->prepare("UPDATE users SET dep_balance= ? WHERE id= ?"); 
$usf->bind_param("ii", $a, $user_id);
$usf->execute();
$usf->close();
// end Debite customer
}
?>