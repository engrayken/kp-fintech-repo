<?php
date_default_timezone_set('Africa/Lagos');
$now = date('Y-m-d H:i:s', time());

include('../../../../../functions/error_success.php');
include('../../../../../objects/query.php');
include('../../../../../up.php');

$email = $_GET['email'];
$ok = $_GET['error'];

$xcode = $_GET['xcode'];
$id = $_GET['id'];

$spin = $_GET['spin'];

$val = new validate();

if($ok)
{
	$val->email($email);
	$val->valid($email);
	
	if($val->error_code < 1)
	{
		//check email
		$check = new select();
		$check->pick('user', 'id, username', 'email', "'$email'", '', 'record', '', '', '=', '');
		if($check->error_code > 0)
		{
			$val->error_code = 23;
			$val->error_msg = error($val->error_code);
		}
		else
		{
			$crow = mysqli_fetch_row($check->query);
			//generate random code and input code into database
		$code_box = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'm', 'n', 'p', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 2, 3, 4, 5, 6, 7, 8, 9, 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'm', 'n', 'p', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', 2, 3, 4, 5, 6, 7, 8, 9);
	   $code_shuff = shuffle($code_box);
	   $code = $code_box[0].$code_box[5].$code_box[11].$code_box[16].$code_box[22].$code_box[29].$code_box[37].$code_box[43].$code_box[51].$code_box[53].$code_box[55].$code_box[57].$code_box[59];
	   $pin = new insert();
	   $pin->input('token', 'id, code, date', "0, '$code', '$now'");
	   
	   if($pin->error_code > 0)
	   {
		   while($pin->error_code > 0)
		   {
			   $pin->error_code = 0;
			   
			   $code_shuff = shuffle($code_box);
	    $code = $code_box[0].$code_box[5].$code_box[11].$code_box[17].$code_box[23].$code_box[30].$code_box[38].$code_box[45].$code_box[53].$code_box[55].$code_box[57].$code_box[59].$code_box[61];
	   $pin = new insert();
	   $pin->input('token', 'id, code, date', "0, '$code', '$now'");
		   }
	   }
	   $pin->success_code = 10;
	   $pin->success_msg = success($pin->success_code);
			//send email
			$to = $email;
//$subject = "$csite_name password reset";
$subject = $csite_name;

$headers = "From: " . $cemail . "\r\n";
$headers .= "Reply-To: ". $cemail . "\r\n";
//$headers .= "CC: susan@example.com\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = '<html><body>';
$message .= '<img src="'.$logo_link.'" alt="Logo" />';
$message.= "<p>Hello $crow[1]</p>

<p>To change your password on $csite_name kindly follow the link below:</p>

<p>$csite_url/forgot.php?id=$crow[0]&xcode=$code</p>

<p>This link will be available for 24hr</p>";

$message .= "</body></html>";

mail($to, $subject, $message, $headers);	

$spin=$pin->success_msg;

//header("Location: " . $_SERVER["REQUEST_URI"]."?spin=".$pin->success_msg);
//    exit;
		}
	}
}

if($id != '' && $xcode != '')
{
	//validate code and user
	$xcheck = new select();
	$ucheck = new select();
	$xcheck->pick('token', '*', 'code', "'$xcode'", '', 'record', '', '', '=', '');
	$ucheck->pick('user', 'username', 'id', "$id", '', 'record', '', '', '=', '');
	if($xcheck->count < 1)
	{
		$val->error_code = 24;
		$val->error_msg = error($val->error_code);
	}
	elseif($ucheck->count < 1)
	{
		$val->error_code = 25;
		$val->error_msg = error($val->error_code);
	}
	
	if($val->error_code < 1)
	{
		$ucrow = mysqli_fetch_row($ucheck->query);
		//encrypt code
		$ecode = md5($xcode);
		//update password
		$up = new update();
		$up->up('user', 'password', 'id', "'$id'", "'$ecode'");
		
		if($up->success_code > 0)
		{
			$up->success_code = 5;
			$up->success_msg = success($up->success_code)."<p>Login Details:<br /><br /><strong>USERNAME:</strong> $ucrow[0]<br /><strong>PASSWORD:</strong> $xcode<br /><br />Kindly login to change your password.</p>";
			//delete code from db
			$del = new delete();
			$del->gone('token', 'code', "'$xcode'");
		}
	}
}

?>

    <?php
	if($val->error_code > 0)
	{
	$result=$val->error_msg;
	}
	if($spin != '')
	{
	$result=$spin;
$returnvalue='true';
	}
	if($up->success_code > 0)
	{
	$result=$up->success_msg;


	}
	
