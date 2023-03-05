<?php
header('X-Frame-Options: Deny');

date_default_timezone_set('Africa/Lagos');
$now = date('Y-m-d H:i:s', time());

$page =addslashes('privacy');

$bud = isset($_GET['bud']) ? $_GET['bud'] : '';
include('functions/connection.php');
include('functions/error_success.php');
//nclude('objects/query.php');
include('up.php');




//$gm = new select(); $gm->pick('ppages', 'message', 'type', "'privacy'", '', 'record', '', '', '=', ''); $gm_row = @mysqli_fetch_row($gm->query);

$gm_ken =$dbc->prepare("SELECT message FROM ppages WHERE type= ?");
$gm_ken->bind_param("s", $page);
$gm_ken->execute();
$gm=$gm_ken->get_result();
$gm_ken->close();

$gm_row = $gm->fetch_row();
?>

<!DOCTYPE html>



<body>


<?php include'body/head.php'; ?>



<!-- begin nostyle 
<?php include'slide.php'; ?>
-->

<div class="none-log-content">

      <h1 style="text-color:white">Privacy Policy</h1>
  <?php echo str_replace('../', '', stripslashes($gm_row[0]));?>
 
</div>

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