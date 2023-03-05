<script type="text/javascript">
function AlertIt() {
var answer = confirm ("Login to access functionality or sign up!")
if (answer)
window.location="index.php";
}
</script>


<?php

date_default_timezone_set('Africa/Lagos');
$now = date('Y-m-d H:i:s', time());


  
				  $img_link = 'images/';
				  $home_link = 'index.php';

  $link = '';
			
		  ?>


<head>

<meta name="viewport" content="initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no, width = device-width">

<meta name="keywords" content=" Airtime & Bill payment" />
<meta name="description" content=" kenspay airtime, data,bill & educational payment, generate data pin" />

<link rel="shortcut icon" href="<?php echo $link; ?>assets/ico/favicon.jpg" type="image/x-icon">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>kenspay airtime, data & bill payment</title>


    <link href="<?php echo $link; ?>dist/css/<?php echo $cstyle;?>" rel="stylesheet">


<?php


 include'dist/js/service_js.php';  include'dist/js/api_js.php';
?>

<script src="<?php echo $link; ?>dist/js/kpnav.js" type="text/javascript"></script>




<script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js" type="text/javascript"></script>
       










</head>

<?php 

 include'nav.php'; 

 ?>
