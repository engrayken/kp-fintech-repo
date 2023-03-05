<?php
$tr=$_GET['error'];

session_start();
date_default_timezone_set('Africa/Lagos');

$now = date('Y-m-d H:i:s', time());

$page = 'asent_msg';

include('../../../../../functions/connection.php');
include('../../../../../functions/error_success.php');
include('../../../../../objects/query.php');
include('../../../../../up.php');

$tr=$_GET['error'];
if($tr=='agent') 
{
$pid='3';
$gm = new select();
$gm->pick('cpages', 'message, title', 'id', "$pid", '', 'record', '', '', '=', '');
$gm_row = @mysqli_fetch_row($gm->query);

//$page = $gm_row[1];

$cont= str_replace('../', '', stripslashes($gm_row[0]));

}


$resp=array();
array_push($resp, array("title"=>$cont));
		echo json_encode(array("kpapi_resp"=>$resp));

mysqli_close($connect);
?>


