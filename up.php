<?php 
@$admin = $_COOKIE['admin'];
//@$auser = $_COOKIE['auser'];
//@$xhome = 'yes';
/*check setup
$setup = mysqli_query($connect, "select stat from info where id ='1'");
if(mysqli_num_rows($setup) > 0)
{
$setup_row =mysqli_fetch_row($setup);
if($setup_row[0]== 'setup')
{
header("location: setup.php");
exit;
}
}
else
{
header("location: setup.php");
exit;
}

$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';
$xpassword = md5($password);
$login = isset($_POST['login']) ? $_POST['login'] : '';

//$large = new large(@$bud);

if($login)
{
	$check = new select();
	$check->pick('user', 'id', 'username,password', "'$username','$xpassword'", '', 'record', '', '', '=,=', 'and');
	if($check->count > 0)
	{
		$crow =mysqli_fetch_row($check->query);
		//update log date
		$upd = new update();
		$upd->up('user', 'log_date', 'id', "$crow[0]", "'$now'");
		
setcookie('auser', $crow[0], time()+86400, '/');
header('location: dashboard/index.php');
	}
	else
	{
		$error = error(13);
	}
}
*/
?>