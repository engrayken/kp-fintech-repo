<?php
$dashboard = 'dashboard';

$page = 'dash board';

include('../../../../../app/config.php');

$usern=$_GET['username'];
$chtoken=$_GET['password'];
$offset=$_GET['offset'];
$status1=$_GET['trans_type'];
$csecpin=$_GET['secpin'];
$chsecpin= md5($csecpin);
$tr=$_GET['error'];

$login=$dbc->prepare("select * from users where email=? ");
$login->bind_param("s",$usern);
$login->execute();
$login_result=$login->get_result();
$login->close();
$row=$login_result->fetch_assoc();



$idn=$row['id'];

 $balance1= $row['dep_balance'];

$user_id= $row['id'];

 $user=$row['username'];


$vtoken= $row['utoken'];
$secpin= $row['secpin'];
/*
   $query = $db->query("SELECT * FROM user WHERE username='$usern' ");
    
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

*/


 

if($chtoken==$vtoken && $tr=='tran') { 

file_put_contents('call.txt', $_GET);
 
 if (!$_GET['records'])
{
	$records = 2;
} else {
$records = $_GET['records'];
}
if (!$_GET['start'])
{
$start = 0;
}
else
{
$start = $_GET['start']+$records;
}



$data=array();
    $query= $dbc->query("SELECT net,phone,amount,trans_id,id,date,status,billersCode,deno FROM transaction WHERE user_id='$idn' ORDER BY id desc LIMIT $records ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($tut = $query->fetch_assoc()){ 
 $data[]=$tut;
 }
}

}

$next=array();
array_push($next,array("start"=>$start, "records"=>$records));
echo json_encode(array("kpapi_resp"=>$data,"next"=>$next));


?>