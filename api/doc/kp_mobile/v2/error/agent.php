<?php 


$service_get=$serviceIDcm;

//if($agent=='agent') {


    //get rows
    $querycm = $dbc->query("SELECT * FROM apcommission ORDER BY id");
    
    
            while($rowcm = $querycm->fetch_assoc()){ 


 $servID=$rowcm['serviceID'];
 $pc=$rowcm['percent'];
 $amP=$rowcm['amount'];

 
  //this code add the agent commission //

if($servID=="$service_get") {
if($pc) {
$cal=$pc/100; $cal1=$cal*$balance2;
$set_amount=$cal1; } elseif ($amP) { $cal=$amP; $cal1=$cal; $set_amount=$cal1; } else { $set_amount=''; }
}


} 
 


$rramount=$balance2-$set_amount;







//} else { }

?>


