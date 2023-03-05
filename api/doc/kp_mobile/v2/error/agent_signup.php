<?php
//header("Access-Control-Allow-Origin: *");

//   include('../../../../../functions/dbConfig.php');
include('../../../../../functions/connection.php');


 file_put_contents('call.txt', $_GET);


$now = date('Y-m-d H:i:s', time());

$usern=$_GET['username'];

$csecpin=$_GET['secpin'];

 $token=$_GET['password'];

    //get rows
    $query = $db->query("select * FROM user WHERE username='$usern' ");
    
    if($query->num_rows > 0){ ?>
        
        <?php
            while($row = $query->fetch_assoc()){ 
$idn=$row['id'];

$balance1= $row['bonus_balance'];

$user_id= $row['id'];

$user=$row['username'];
$aagent=$row['type'];

$vtoken= $row['token'];
$secpin= $row['secpin'];


}
}	


//&& $chsecpin==$secpin  && $chsecpin!=''


if($token==$vtoken) 

{

if($aagent=='agent') {

//Create New Account
if($_GET['signup']=='signed')
{
$name=$_GET['name'];
$bname=$_GET['bname'];
$address=$_GET['address'];
$username=$_GET['ausername'];

$phone=$_GET['phone'];

$email=$_GET['email'];
$agent='agent';
$xpassword='12345';
$password=md5($xpassword);


$checkuser=mysqli_query($connect,"SELECT *  FROM user WHERE username='$username' ");
if(mysqli_num_rows($checkuser)>0)
{
$errors[]="2";
$result='Your username is already in use';
} //end $checkuser
	

$checkmail=mysqli_query($connect,"SELECT *  FROM user WHERE email='$email'");
if(mysqli_num_rows($checkmail)>0)
{
$errors[]="2";
$result='Your  email is already in use';

} //end $checkmail


$checkphone=mysqli_query($connect,"SELECT *  FROM user WHERE phone='$phone'");
if(mysqli_num_rows($checkphone)>0)
{
$errors[]="2";

$result='Your phone number  is already in use';
} //end $checkphone

$rr=count($errors);

if($rr==0)
{//ERROR FREE
//echo "success";
		$q=mysqli_query($connect,"insert into `user` (`date_created`,`name`,`username`,`email`,`phone`,`bname`,`address`,`type`,`ragent`,`secpin`,`password`) values ('$now','$name','$username','$email','$phone','$bname','$address','$agent','$user_id','$password','$password')");

		if($q)
		{
$balance2='500';

$bonus_balance=$balance1+$balance2;

  $updated=mysqli_query($connect,"UPDATE user SET 
	bonus_balance='$bonus_balance' WHERE id='$user_id'");

			//echo "1";
$result='Registration Successful';
		}
		else
		{
			//echo "3";
$result='We could not sign you up, please try again';
		} //end if($q)


	
	//echo mysqli_error();

} //end if(count($errors)==0)

} else {

$result='You are not authorise to view this page';


} //end if($_GET['signup']=='signed')

} else { //echo'4'; 
$result='This process is only available for registered agent, please try again';

} //end if($aagent=='agent') 

 } else { //echo'4'; 
$result='We could not sign you up, please try again, logout and re login';




} // end if($token==$vtoken) 

$resp=array();
array_push($resp, array("returnvalue"=>$result, "title"=>$result));
		echo json_encode(array("kpapi_resp"=>$resp));

?>

