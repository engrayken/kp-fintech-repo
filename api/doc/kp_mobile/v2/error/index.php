<?php
header("Access-Control-Allow-Origin: *");
date_default_timezone_set('Africa/Lagos');

   include('../../../../../app/config.php');
//include('../../../../../functions/dbconnect.php');


// file_put_contents('call.txt', $_GET);


$now = date('Y-m-d H:i:s', time());


$date= date('YmdHis', time());

 $token= md5($date);

$secp='12345';

 $sec= md5($secp);

//Create New Account
if($_GET['error']=='signed')
{
	$name=$_GET['name'];
	$username=$_GET['username'];

$phone=$_GET['phone'];

$email=$_GET['email'];

	$xpassword=$_GET['password'];
$password=md5($xpassword);

$checkuser=mysqli_query($connect,"SELECT *  FROM user WHERE username='$username'");
if(mysqli_num_rows($checkuser)>0)
{
$errors[]="2";
$result='Your username is already in use';
$returnvalue='failed';
}


$checkmail=mysqli_query($connect,"SELECT *  FROM user WHERE email='$email'");
if(mysqli_num_rows($checkmail)>0)
{
$errors[]="2";

$result='Your  email is already in use';
$returnvalue='failed';
}

$checkphone=mysqli_query($connect,"SELECT *  FROM user WHERE phone='$phone'");
if(mysqli_num_rows($checkphone)>0)
{
$errors[]="2";

$result='Your phone number  is already in use';

$returnvalue='failed';

}

if(count($errors)==0)
{//ERROR FREE
//echo "success";
		$q=mysqli_query($connect,"insert into user (date_created,name,username,email,phone,secpin,password) values ('$now','$name','$username','$email','$phone','$sec','$password')");

		if($q)
		{


			//echo "1";
$result='Registration Successful';

$returnvalue='success';
		}
		else
		{
			//echo "3";
$result='We could not sign you up, please try again';

$returnvalue='failed';
		}
	
}//end if(count($errors)==0)




$resp=array();
array_push($resp, array("returnvalue"=>$returnvalue, "title"=>$result));
		echo json_encode(array("kpapi_resp"=>$resp));

} //end if($_GET['error']=='signed')


//Login
if($_GET['error']=='l')
{
	$username=$_GET['username'];
	//$xpassword=$_GET['password'];
//$password=md5($xpassword);
$password=$_GET['password'];

file_put_contents('call.txt', $_GET);

$login=$dbc->prepare("SELECT * FROM users WHERE email=? ");
$login->bind_param("s", $username);
$login->execute();
$getresult=$login->get_result();
$login->close();
$login_row=$getresult->fetch_assoc();

$chpassword=$login_row['password'];

	if(password_verify($password,$chpassword))
	{

$update=$dbc->prepare("update users set utoken=? where email=? ");
$update->bind_param('ss', $token, $username);
$update->execute();
$update->close();

$lupdate=$dbc->prepare("update users set last_login=? where email=? ");
$lupdate->bind_param('ss', $datetime, $username);
$lupdate->execute();
$lupdate->close();



$resp=array();
array_push($resp,array("returnvalue"=>$token, "title"=>"success"));
		echo json_encode(array("kpapi_resp"=>$resp));



	}
	else
	{
		$token="failed";
$resp=array();
array_push($resp,array("returnvalue"=>$token, "title"=>"failed"));
		echo json_encode(array("kpapi_resp"=>$resp));


	}
}

//Change Password
if($_GET['error']=='c')
{



    $usern=$_GET['username'];
$chtoken=$_GET['password'];

$csecpin=$_GET['secpin'];
$chsecpin= md5($csecpin);

$login=$dbc->prepare("SELECT * FROM users WHERE email=? ");
$login->bind_param("s", $usern);
$login->execute();
$getresult=$login->get_result();
$login->close();
$row=$getresult->fetch_assoc();


$username=$row['email'];

$password=$row['password'];


$vtoken= $row['token'];
$secpin= $row['secpin'];


	$old_password=$_GET['old'];
$new_password=$_GET['new'];

if($chtoken==$vtoken && $chsecpin==$secpin) 


{ 

//change password

if($_GET['type']=='CHANGE_PASSWORD')
{


	
	//if($password==$old_password){
	if(password_verify($old_password,$password))
	{
$newpassword=password_hash($new_password, PASSWORD_DEFAULT);

$update=$dbc->prepare("update users set password=? where email=? ");
$update->bind_param('ss', $newpassword, $username);
$update->execute();
$update->close();

		
		//echo "1";
$returnvalue="1";
$result='Password Updated';
	}
	else
	{
		//echo "2";
$result='wrong Password, please try again';
	}

} //end if type==change password

else{




//Change Pin



if($old=md5($old_password)==$secpin) {
	
 file_put_contents('call.txt', $_GET);


$newsecpin=md5($new_password);
$update=$dbc->prepare("update users set secpin=? where email=? ");
$update->bind_param('ss', $newsecpin, $username);
$update->execute();
$update->close();

		//echo "1";
	$result='Pin Updated';
	}
	else
	{
		//echo "2";
$result='wrong Pin, please try again';
	}


}


} else{ $result='Your pin is incurrect'; } 


$resp=array();
array_push($resp, array("returnvalue"=>$returnvalue, "title"=>$result));
		echo json_encode(array("kpapi_resp"=>$resp));

}

// Forget Password
if($_GET['error']=='lost')
{

include'fo.php';

	//$username=$_GET['username'];



$resp=array();
array_push($resp, array("returnvalue"=>$returnvalue, "title"=>$result));
		echo json_encode(array("kpapi_resp"=>$resp));


}


?>

