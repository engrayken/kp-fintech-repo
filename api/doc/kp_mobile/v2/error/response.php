<?php
//this code change the vtpass response to my own 


if($curl)
{
//$rstatus=curl_exec ($curl); 

  $status1=curl_exec ($curl); 
//file_put_contents('call.txt', $status1);

$rstatus=$status1;
//$status2= substr($status1, 9, 3);

$vt_resp=json_decode($status1);

$status2=$vt_resp->code;

 //$request_id='error';

/* if($codes==$requestid) {
if($codes_sta==1){
$result='Transaction Successful';
$result1='success';
} else{
$result='Transaction Failed';
$result1='failed';
}
} else{*/

$sscode='000';


if($status2==' ')
{ 
$respond='1'; } 
else if($status2=='')
{ 
$respond='1'; }
else if($status2==$sscode)
{ 
$respond='1'; }

else { 

 $respond='0'; 

} 

} 





//this code fetch response for sme data

if($smecurl)
{
  $status1=curl_exec ($smecurl); 

//$smestatus= substr($status1, 0, 3);
$smecoder = json_decode($status1);

$smestatus=$smecoder->{'code'};

$smecode2= substr($status1, 0, 3);

$smecode='100';






if($smecode==$smestatus)
{ $respond='1'; }

elseif($smecode==$smecode2)
{ $respond='1'; }

else { $respond='0'; }

}

//this code fetch response for estoresms for airtime pin
if($ch)
{

 $status1=curl_exec ($ch); 


$json = json_decode($status1);
$resp=$json->{'response'};




if($resp=='OK') {
$respond='1';
} else {
$respond='0';
}



}






//this code change response code and decode the cheetahpay json and save the file on database


if($curl_conv)
{

 $d=curl_exec ($curl_conv); 

$da = json_decode($d);


$succss_message= $da->{'message'}; 

$succss= substr($d, 11, 4);



if($succss=='true')
{
$rrespond='pending';

} else { $rrespond='0'; }

}

?>