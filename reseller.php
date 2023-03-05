<?php
$page =addslashes('reseller');
header('X-Frame-Options: Deny');
include('functions/connection.php');
include('functions/error_success.php');
//include('objects/query.php');
//include('objects/sms.php');
include('up.php');

//$gm = new select(); $gm->pick('ppages', 'message', 'type', "'reseller'", '', 'record', '', '', '=', ''); $gm_row = @mysqli_fetch_row($gm->query);
$gm_ken =$dbc->prepare("SELECT message FROM ppages WHERE type= ?");
$gm_ken->bind_param("s", $page);
$gm_ken->execute();
$gm=$gm_ken->get_result();
$gm_ken->close();

$gm_row = $gm->fetch_row();

?>
<!DOCTYPE html>
<html lang="en">

  <body>
  
    
    <?php
	include('body/head.php');
	?>
<br/><br/>


<div class="content">
<div class="transactionpage">
      <h1>Reseller</h1>
  <p><?php echo str_replace('../', '', stripslashes($gm_row[0]));?></p>

</div><!--col-->
</div><!--row-->
  
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