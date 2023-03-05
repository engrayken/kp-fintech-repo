<?php


$aut_host = 'localhost';//e.g localhost
$aut_user = 'kenspayc_p';
$aut_pass = 'C95FiXf[-95ojN';
$aut_db = 'kenspayc_pay';

$connect = mysqli_connect($aut_host, $aut_user, $aut_pass, $aut_db);

// Create database connection
$db = new mysqli($aut_host, $aut_user, $aut_pass, $aut_db);

$xtzone = mysqli_query($connect,"SET time_zone = 'Africa/Lagos'");
//mysqli_select_db($aut_db);

/*$aut_host = 'localhost';//e.g localhost
$aut_user = 'root';
$aut_pass = '';
$aut_db = 'vsms';*/

//$connect = mysql_pconnect('localhost', 'root', '');
//mysql_select_db('vsms');


//Username of the Administrator
$admin='mark';

if($page != 'setup')
{
//global:$connect;
//get num
$con_num = mysqli_query($connect,"select tell, sid, surl, sname, email, description, style from info where id = 1");
$dbc=$connect;

$con_num_row = mysqli_fetch_row($con_num);

$mynumber = "$con_num_row[0]";
$csite_name = $con_num_row[3];
$csenderid = $con_num_row[1];
$csite_url = $con_num_row[2];
$cemail = $con_num_row[4];
$logo_link = $csite_url.'/images/logo.png';
$cdescription = $con_num_row[5];
$cstyle = $con_num_row[6];
}

// Create database connection
$db = new mysqli($aut_host, $aut_user, $aut_pass, $aut_db);

// Check connection
if ($db->connect_error) {
    die(" Maintenance is on going please check back later ");
}

 //error_reporting(E_ALL ^ E_STRICT);

error_reporting( E_ALL & ~E_DEPRECATED & ~E_NOTICE );
if(!mysqli_connect("$aut_host","$aut_user","$aut_pass","$aut_db"))
{
	die('oops connection problem ! --> '.mysqli_error());
}
/*if(!mysqli_select_db("$aut_db"))
{
	die('oops database selection problem ! --> '.mysqli_error());
}*/


?>
