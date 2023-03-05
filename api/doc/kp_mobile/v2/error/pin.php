  <?php

ob_start();
  //  include('../../../../../functions/dbConfig.php');
include('../../../../../functions/connection.php');

$usern=$_POST['username'];
$chtoken=$_POST['token'];

$lpin=$_POST['lpin'];
$old_pin= md5($lpin);

$npin=$_POST['npin'];
$new_pin= md5($npin);


  //get rows
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





if($chtoken==$vtoken && $old_pin==$secpin) 

{ 

//Change Password
if($_POST['npin']==$npin)
{

if($old_pin==$secpin) {
	


		mysqli_query($connect,"update user set secpin='$new_pin' where username='$user'");
		echo "1";
	}
	else
	{
		echo "2";
	}
}


?>

<?php } else{ echo'4'; }
?>