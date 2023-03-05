






 <div style="position: fixed; top:0px; z-index: 1000; width:99%">

<div class="topnav" id="myTopnav">
<a href="<?php echo $link;?>index.php"><img src="<?php echo $img_link;?>logo.png"  width="200px" height="50px" /></a>

<div class="subnav">
<div class="space"></div>
  <a href="<?php echo $link;?>page.php?pid=5">BUSINESS</a>
  <a href="<?php echo $link;?>page.php?pid=6">PERSONAL</a>
  <a href="<?php echo $link;?>">DEVELOPERS</a>
  <!--a href="<?php echo $link;?>price.php">PRICING </a-->
<!--  <a href="<?php echo $link;?>hosting.php">HOSTING</a>-->
<?php
	  if(@$admin == '' && @$auser == '')
		  {
			  ?>
  <a href="login">LOGIN</a>
  <a href="register">SIGNUP</a>
<?php }
else { ?>
<a href="user"><span class="glyphicon glyphicon-home"></span> Dashboard</a>



<a href="<?php echo $link;?>index.php?out=auser&ouser=<?php echo $auser;?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a>
<?php } ?>
</div>


  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>

</div>

</div>



<br/><br/><br/>