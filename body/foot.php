


        <?php

		//get social
		//$fsocial = mysqli_query($connect, "select facebook, twitter from psocial where id = 1");
$iid=1;
$fsocial_ken =$connect->prepare("select * from psocial where id = ?");
$fsocial_ken->bind_param("i", $iid);
$fsocial_ken->execute();
$fsocial=$fsocial_ken->get_result();
$fsocial_ken->close();

		$fsocial_row =$fsocial->fetch_assoc();
		?>





<div class="footer">


        
<div class="left-content">

<div style="width:50%">
<img src="<?php echo $img_link;?>logo.png"  width="200px" height="50px" /><br/>
<small>
<i>
KensPay is a user-friendly online payment platform that allows you to send /pay and receive payment easily from anyone, in any currency. Accept payment through Card transaction and Bank transfers.
</i>
</small>
</div>

        <table align="left" cellpadding="5">
        <tr>
        <td><a href="<?php echo $fsocial_row['facebook'];?>"><img src="<?php echo"$img_link"; ?>facebook.png" alt="facebook" class="img-responsive"></a></td>
        <td><a href="<?php echo $fsocial_row['twitter'];?>"><img src="<?php echo"$img_link"; ?>twitter.png" alt="facebook" class="img-responsive"></a></td>
         <td><img src="<?php echo"$img_link"; ?>payments.png" alt="payments logo" class="img-responsive"></td>
        </tr>
        </table>
</div>

<div class="right-content">
<table cellpadding="15"> <tr><th><font color="white">About</font></th><th><font color="white">Support</font></th></tr>
<td>
<p><a href="<?php echo"$link"; ?>page.php?pid=5">BUSINESS</a></p>
<p><a href="<?php echo"$link"; ?>page.php?pid=6">PERSONAL</a></p>
<p><a href="<?php echo"$link"; ?>reseller.php">RESELLER</a></p>
<p><a href="<?php echo"$link"; ?>page.php?pid=3">AGENT</a></p>
<p><a href="<?php echo"$link"; ?>">PRICING</a><p/>
<p><a href="<?php echo"$link"; ?>about.php">ABOUT US</a></p>
</td>
<td>


<p><a href="<?php echo"$link"; ?>contact.php">CONTACT</a></p>

<p><a href="<?php
//document
 echo"$link"; ?>">DOCUMENTATION</a></p>

<p><a href="<?php echo"$link"; ?>privacy.php">TERMS & PRIVACY POLICY</a></p>

<p><font color="white">Tel: +234 8126216200</font></p>

<p><font color="white">SUPPORT@KENSPAY.COM.NG</font></p>
</td></tr></table>

</div>


   <br/>
  <p style="position:center width:100%; text-align: center;">Copyright <?php echo $csite_name;?> 2015-<?php echo date('Y');?>. All Rights Reserved.</p>


<br/>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d2619f822d70e36c2a51fc8/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
