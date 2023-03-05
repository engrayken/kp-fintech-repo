<?php 



   
   //this row fetch the reseller balance.
    $rquery1 = $db->query("SELECT * FROM user WHERE id='$user_id' ");
    
    if($rquery1->num_rows > 0){ ?>
        
        <?php
            while($rrow1 = $rquery1->fetch_assoc()){ 


$rbalance1= $rrow1['earning'];



}}	 
 

$ramount1=$ramount-$set_amount;






$rupdated=mysqli_query($connect,"UPDATE user SET 
	earning='$ramount1' WHERE id='$user_id' ")or die();
  if($rupdated)
  {

  
  }
?>


