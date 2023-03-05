  <?php

ob_start();
  //  include('../../../../../functions/dbConfig.php');
include('../../../../../functions/connection.php');

$usern=$_GET['username'];
$chtoken=$_GET['password'];





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





if($chtoken==$vtoken) 

{ 
//UPGRADE user tobecome agent
	


		mysqli_query($connect,"update user set type='agent' where username='$user'");
		$result='good';
	}
	else
	{
		$result='failed';
	}

$resp=array();
array_push($resp, array("returnvalue"=>$result, "title"=>$result));
		echo json_encode(array("kpapi_resp"=>$resp));

?>