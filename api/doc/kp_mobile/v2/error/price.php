<?php


include('../../../../../functions/dbConfig.php');
include('../../../../../functions/dbconnect.php');




$serviceID=$_POST['serviceID'];

$variation_code=$_POST['variation_code'];

if($variation_code)
{


    //get rows
    $qp= $db->query("SELECT * FROM pamount WHERE amount_variationcode='$variation_code' ");
   


    while($rowp= $qp->fetch_assoc()){ 




 $datap=$rowp['amount_identifier'];
}






  //get rows
    $amp= $db->query("SELECT * FROM pidentifier WHERE identifier_id='$datap' ");
    


    while($row1p= $amp->fetch_assoc()){ 




 $cat=$row1p['identifier_cat']; 

}



echo'<option value="select">Select </option>';



  //get rows
    $am= $db->query("SELECT * FROM pidentifier WHERE identifier_cat='$cat' ");
    


    while($row1= $am->fetch_assoc()){ 




 $name=$row1['identifier_name'];   
$serviceID=$row1['identifier_serviceID'];
?>






<option value="<?php echo $serviceID; ?>"><?php echo $name; ?></option>

<?php
}

}
else if($serviceID)
{


    //get rows
    $q= $db->query("SELECT * FROM pidentifier WHERE identifier_serviceID='$serviceID' ");
   


    while($row= $q->fetch_assoc()){ 




 $data=$row['identifier_id'];
}


echo'<option value="select">Select </option>';



  //get rows
    $am= $db->query("SELECT * FROM pamount WHERE amount_identifier='$data' ");
    


    while($row1= $am->fetch_assoc()){ 




 $name=$row1['amount_name'];   $amount=$row1['amount'];
$variationcode=$row1['amount_variationcode'];
?>






<option value="<?php echo $variationcode; ?>"><?php echo $name; echo' ₦';  echo $amount; ?></option>

<?php
}

}


?>

