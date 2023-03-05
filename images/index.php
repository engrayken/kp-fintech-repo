
<?php
date_default_timezone_set('Africa/Lagos');
$now = date('Y-m-d H:i:s', time());

$page = 'home';

$bud = isset($_GET['bud']) ? $_GET['bud'] : '';
include('functions/connection.php');
include('functions/error_success.php');
include('objects/query.php');
include('up.php');

$out = isset($_GET['out']) ? $_GET['out'] : '';
$ouser = isset($_GET['ouser']) ? $_GET['ouser'] : '';

if($out != '')
{
	setcookie($out, $ouser, time()-96400, '/');
	$admin = '';
	$auser = '';
	header('location: index.php');
}


$gm = new select();
$gm->pick('pages', 'message', 'type', "'home'", '', 'record', '', '', '=', '');
$gm_row = @mysql_fetch_row($gm->query);
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<?php
include('geturl.php');
?>
   

<title>BULK SMS</title>




<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="content-type" content="text/html; charset=us-ascii" />
<link rel="stylesheet" href="blue.css" type="text/css" media="screen,projection" />
</head>
<body>
<?php 

  $yourdomain = $_SERVER['HTTP_HOST'];
  $yourdomain = preg_replace('/^www\./' , '' , $yourdomain);
  ?>
<div id="wrapper" class="fluid">

<?php include ("header.php"); ?>

<?php include ("nav.php"); ?>

<?php include ("sidebar_right.php");?>

<?php include ("container.php"); ?>


<br/>
<br/><br/><br/><br/>




 





<?php include ("footer.php"); ?>

<br/>
<br/><br/><br/><br/> 
<br/>
<br/><br/>
</div>
</body>



<br/>
<br/><br/><br/><br/>






 
  <div class="bloga_resize">
    <div class="bloga_resizee">
      <div class="bloga">
<br/> <br/>
        <h2>GSM Connect sms</h2>
        <img src="images/phone.png" alt="picture" width="51" height="89" />
        <p> Send bulk SMS Messages via our premium high quality SMS 
        gateway to cell phones on GSM and CDMA networks, Glo, MTN, Zain, Etisalat,
         Starcomms, Visafone in Nigeria and Globally. </p>
        <p><a href="register.php"><strong><?php echo "$yourdomain"; ?></strong></a></p>
      </div>
      <div class="bloga">
        <h2>Reseller SMS</h2>
        <img src="images/blackbery.jpg" alt="picture" width="51" height="89" />
        <p> N1.90 for high quality Reseller SMS, SMS Resellers are Wanted!
No setup fee, Free Brandable SMS Website, a minimum initial purchase of only 5,000
 SMS credits is required for Reseller SMS accounts. </p>
        <p><a href="reseller.php"><strong>Reseller account</strong></a></p>
      </div>
      <div class="bloga">
        <h2>Web hosting Services</h2>
                <img src="images/img_top_2.png" alt="picture" width="51" height="89" />
 <p>Welcome to our free & premium hosting service.
We are providing professional, fast PHP & MySQL hosting, sponsored by <?php echo"$config->site"; ?> world-famous clustered bulk sms system.

We invite you to <a href='<?php echo"$config->url2"; ?>'>SIGN UP</a> for a free hosting or premium account and get your own website on the internet in seconds!
Accounts are activated instantly so you don't need to wait around for an account..
<br/>
      </div>
    </div></div>
  
  
  
  
   <div class="footer">
    <div class="footer_resize">
 <p class="leftt">© <?php echo "$yourdomain"; ?> <?php echo date('Y', time());?> . All Rights Reserved<br/>
   </p>

   
   
   
   
   
   
   
   
 <?php
		//get social
		$fsocial = mysql_query("select facebook, twitter from social where id = 1");
		$fsocial_row = @mysql_fetch_row($fsocial);
		?>

<center><table><tr><td><a href="<?php echo $fsocial_row[1];?>"><img src="images/twitter.png" alt="facebook" class="img-responsive"></a> </td><td>  <a href="<?php echo $fsocial_row[0];?>"><img src="images/facebook.png" alt="facebook" class="img-responsive"></a></td></tr></table></center>

</div></div>



</html>
