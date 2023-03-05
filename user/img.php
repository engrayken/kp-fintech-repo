<?php
require_once("../app/config.php");


$net=addslashes($_POST['net']);

 //$q=mysqli_query($dbc, "SELECT * FROM pidentifier WHERE identifier_serviceID='$net' ");

$qim = $dbc->prepare("SELECT * FROM pidentifier where identifier_serviceID= ?");
$qim->bind_param("s", $net);
$qim->execute();
$q=$qim->get_result();
   


    while($row= $q->fetch_assoc()){ 




 $data=$row['identifier_img'];
}
$qim->close();


echo'<img src="../asset/images/dashboard/'.$data.'" height="100" width="100" />';

?>