<?php
header('X-Frame-Options: Deny');
$page =addslashes('services');
include('functions/connection.php');
include('functions/error_success.php');
//include('objects/query.php');
//include('objects/sms.php');
include('up.php');



$pid =(int)$_GET['pid'];
//page info
//$gm = new select(); $gm->pick('cpages', 'message, title', 'id', "$pid", '', 'record', '', '', '=', ''); $gm_row = @mysqli_fetch_row($gm->query);


$gm_ken =$dbc->prepare("SELECT message, title FROM cpages WHERE id= ?");
$gm_ken->bind_param("i", $pid);
$gm_ken->execute();
$gm=$gm_ken->get_result();
$gm_ken->close();

$gm_row = $gm->fetch_row();

//$page = $gm_row[1];

?>
<!DOCTYPE html>
<html lang="en">

  <body>
  
    
    <?php
	include('body/head.php');
	?>
<br/><br/>


<div class="none-log-content">



      <h1><?php echo $gm_row[1];?></h1>
   <p><?php echo str_replace('../', '', stripslashes($gm_row[0]));?></p>

</div><!--col-->

    <?php
	include('body/foot.php');
	?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>