<?php
header("Access-Control-Allow-Origin: *");

//   include('../../../../../functions/dbConfig.php');
include('../../../../../functions/connection.php');



//Change Password
if($_POST['error']=='c')
{


	$username=$_POST['username'];

	$xold_password=$_POST['old_password'];
	$old_password=md5($xold_password);

	$xnew_password=$_POST['new_password'];
             $new_password=md5($xnew_password);

	  //get rows
    $query = $db->query("SELECT * FROM user WHERE username='$username' ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
$idn=$row['id'];



$user_id= $row['id'];

$user=$row['username'];


$vtoken= $row['token'];
$lpass= $row['password'];


}}	





if($old_password==$lpass) 

{ 

//Change Password
	


		mysqli_query($connect,"update user set password='$new_password' where username='$user'");
		echo "1";
	}
	else
	{
		echo "2";
	}
}




?>

