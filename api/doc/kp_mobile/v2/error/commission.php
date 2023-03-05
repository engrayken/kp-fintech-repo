<?php
session_start();
date_default_timezone_set('Africa/Lagos');

$now = date('Y-m-d H:i:s', time());

$page = 'asent_msg';

include('../../../../../app/config.php');

 file_put_contents('call.txt', $_GET);

$tr=$_GET['error'];

$usern=$_GET['username'];
$chtoken=$_GET['password'];
$offset=$_GET['offset'];
$status1=$_GET['trans_type'];
$csecpin=$_GET['secpin'];
$chsecpin= md5($csecpin);
//$tr=$_GET['error'];


   $query = $dbc->query("SELECT * FROM users WHERE email='$usern' ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
$idn=$row['id'];

$balance1= $row['balance'];

$user_id= $row['id'];

$type= $row['type'];

$user=$row['username'];


$vtoken= $row['token'];
$secpin= $row['secpin'];


}}	





//if($chtoken==$vtoken && $tr=='com') {

$data=array();

if($type=='agent') {
    //get rows
    $q=mysqli_query($dbc,"SELECT * FROM apcommission ");
   
} else {
    $q=mysqli_query($dbc,"SELECT * FROM apcommission ");
   
} 
    while($row= $q->fetch_assoc()){ 
 $data[]=$row;
}




//}

echo json_encode(array("kpapi_resp"=>$data));




?>


