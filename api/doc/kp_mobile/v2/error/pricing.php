<?php
file_put_contents('call.txt', $_GET);
include('../../../../../app/config.php');

$pname=$_GET['productname'];

   $am= $dbc->query("SELECT * FROM pamount WHERE amount_identifier='$data' ");
    
$am=$dbc->prepare("SELECT * FROM pamount WHERE amount_name=? ");
$am->bind_param("s", $pname);
$am->execute();
$getresult=$am->get_result();
$am->close();
$row1=$getresult->fetch_assoc();

 $name=$row1['amount_name'];   $amount=$row1['amount'];
$variationcode=$row1['amount_variationcode'];
$amount_identifier=$row1['amount_identifier'];
$l=1;
    $am= $dbc->query("SELECT * FROM pidentifier WHERE identifier_id='$amount_identifier'  ");
    while($row1= $am->fetch_assoc()){ 
$identifier_id=$row1['identifier_id'];   
$serviceIDcm=$row1['identifier_serviceID']; }
$balance2=$amount;
include'agent.php';


 $resp=array();
array_push($resp,array("amount"=>$amount,"variation"=>$variationcode, "amountpay"=>$rramount));

	echo json_encode(array("kpapi_resp"=>$resp));
?>