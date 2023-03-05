<?php


include('../../../../../app/config.php');




$serviceID='bank-transfer';


if($serviceID)
{


    //get rows
    $q= $db->query("SELECT * FROM pidentifier WHERE identifier_serviceID='$serviceID' ");
   


    while($row= $q->fetch_assoc()){ 




 $data=$row['identifier_id'];
}


echo'<option value="select">Select bank </option>';



  //get rows
    $am= $db->query("SELECT * FROM pamount WHERE amount_identifier='$data' ");
    


    while($row1= $am->fetch_assoc()){ 




 $name=$row1['amount_name'];   $amount=$row1['amount'];
$variationcode=$row1['bcode'];
?>






<option value="<?php echo $variationcode; ?>"><?php echo $name; ?></option>

<?php
}

}


?>

