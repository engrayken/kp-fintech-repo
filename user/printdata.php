<?php
include('../functions/connection.php');
include('../functions/error_success.php');
include('../objects/query.php');
include('up.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <title>Print</title>

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/<?php echo $cstyle;?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
  </head>

<body onLoad="javscript:window.close( window.print() )">
<?php
$new_ticket = new select();
	$new_ticket->pick('voucher', 'pin, value, dname, seria', 'stat', "'new'", '', 'record', '', '', '=', '');
	if($new_ticket->count > 0)
	{
  ?>
  <table width="100%">
    <tr>
    <td>
    <form id="form1" name="form1" method="post" action="voucher.php">
    <table class="mystyle" cellpadding="5" width="100%">
   <?php
	$no = 0;
	while($ticket_row = mysqli_fetch_row($new_ticket->query))
	{
		if($no == 0)
		{
		?>
        <tr>
        <?php
		}
		?>
        <td>
   <?php echo"<small class='text-danger'> N".number_format($ticket_row[1])."</small><br/>"; ?>
<img src="../images/logo.png" width="50" height="20"> kenspay.com<br />
<?php echo $ticket_row[2];?><br/>
        <?php
		echo "<strong>Pin: </strong>".$ticket_row[0]."<br />

<small style='font-size:12px'>
Serial No: ".$ticket_row[3]."<br />
sms *pin*phone number# to 08058905888 eg *1234455555*08126216200# send to 08058905888 Valid 30 Days <br/>
wait 10 to 15 munite then<br/>
Check Data Balance: *461*2*3#<br/>
CUSTOMER CARE: 08126216200</small>";
		$no = $no + 1;
		?>
        <br />
        <br />
        </td>
        <?php
		if($no == 3)
		{
		?>
        </tr>
        <?php
		$no = 0;
		}
	}
    ?>
      </table>
      </form>
      </td>
    </tr>
    </table>
  <br />
  <?php
	}
	?>
</body>
</html>