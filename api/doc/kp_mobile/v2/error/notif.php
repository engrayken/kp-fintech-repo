<?php

session_start();
date_default_timezone_set('Africa/Lagos');

$now = date('Y-m-d H:i:s', time());

$page = 'asent_msg';

include('../../../../../functions/connection.php');
include('../../../../../functions/error_success.php');
include('../../../../../objects/query.php');
include('../../../../../up.php');

    $q=mysqli_query($connect,"SELECT * FROM notify ");
   
    while($gm_row= $q->fetch_assoc()){ 

$not= str_replace('../', '', stripslashes($gm_row['message']));

}

  $qsp=mysqli_query($connect,"SELECT * FROM gospel ORDER BY RAND() LIMIT 1");
while($gp_row= $qsp->fetch_assoc()){ 

$gosp= str_replace('../', '', stripslashes($gp_row['message']));

} 

 file_put_contents('call1.txt', $_GET);
//$gosp='The lord is king';

//$not='NOTE: that our airtime pin no longer available thanks';


$resp=array();
array_push($resp,array("not"=>$not, "gosp"=>$gosp));
		echo json_encode(array("kpapi_resp"=>$resp));

?>
