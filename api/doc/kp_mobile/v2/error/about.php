<?php
$tr=$_GET['error'];

session_start();
date_default_timezone_set('Africa/Lagos');

$now = date('Y-m-d H:i:s', time());

$page = 'asent_msg';

include('../../../../../app/config.php');

$tr=$_GET['error'];
if($tr=='abt') 
{

/*$gm = new select();
$gm->pick('ppages', 'message', 'type', "'about'", '', 'record', '', '', '=', '');
$gm_row = @mysqli_fetch_row($gm->query);
*/
$type="about";

$gms=$dbc->prepare("SELECT message FROM ppages WHERE type= ?");
$gms->bind_param("s", $type);
$gms->execute();
$gm=$gms->get_result();
$gms->close();

$gm_row = $gm->fetch_assoc();



$cont= str_replace('../', '', stripslashes($gm_row['message']));

}


$resp=array();
array_push($resp, array("title"=>$cont));
		echo json_encode(array("kpapi_resp"=>$resp));

?>


