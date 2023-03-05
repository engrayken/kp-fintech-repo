<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/<?php echo $set['tawk_id']; ?>/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark bg-indigo sidebar-main sidebar-expand-md subbar">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center subbar">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">
				
				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
							<!--a href="#">
								<img src="<?php echo clean($cast);?>" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a-->
			<h6 class="mb-0 text-white text-shadow-dark"><?php if($row['bname']) { echo clean($row['bname']).'<br/> Own By';
 }
?></h6>
							<h6 class="mb-0 text-white text-shadow-dark"><?php echo clean($row['name']);?></h6>

<h6 class="mb-0 text-white text-shadow-dark" title="Account balance"><?php echo $scan2['currency'].number_format($row['dep_balance']);?></h6>

<span class="font-size-sm text-white text-shadow-dark"><?php echo clean($row['country']);?></span>
						</div>
													

<div class="sidebar-user-material-footer">
<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"> <i class="icon-lock"></i><span><b>My account</b></span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="./profile/0" class="nav-link" title="My profile">
									<i class="icon-user-plus"></i>
									<span>My Profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="security/0" class="nav-link" title=" security">
									<i class="icon-lock"></i>
									<span>Security Settings</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="ticket" class="nav-link" title="Help center">
									<i class="icon-bubbles5"></i>
									<span>Help center</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="../app/user/logout" class="nav-link" title="Logout">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->
	
				
				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						<li class="nav-item">
							<a href="./" class="nav-link" title="Dashboard">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
									<!--li class="nav-item">
							<a href="./myproduct" class="nav-link" title="Product records">
								<i class="icon-folder-open2"></i>
								<span>
									My Products
								</span>
							</a>
						</li-->
						<li class="nav-item">
	
<a href="#order" class="nav-link dropdown-toggle" data-toggle="collapse">					<i class="icon-cart-add"></i><span>Order New Product</span></a>

	<div class="collapse" id="order">
						<ul class="nav nav-sidebar">

						<li class="nav-item">
    <a href="myproduct" class="nav-link"><span>My Generated Recharge Card Pins</span></a>
</li>

<?php //get category of buy airtime and rest of them
//$cq =$data = mysqli_query($dbc, "SELECT * FROM pcat ");
$datap = $dbc->prepare("SELECT * FROM pcat ");
$datap->execute();
$cq=$datap->get_result();
$data->close();

if($cq->num_rows > 0){ 

while($cat_row = $cq->fetch_assoc()){
  $cat_name=$cat_row['cat_name'];
 $cat_title=$cat_row['cat_title'];

  ?>



<li class="nav-item">
    <a href="<?php echo $cat_name?>" class="nav-link"><span><?php echo clean($cat_title);?></span></a>
</li>

  <?php
  }
}
  ?>
</ul>
</div>

</li>
			








			<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-credit-card"></i><span>Fund Wallet</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Deposit & withdraw">
								<li class="nav-item"><a href="./fund/0" class="nav-link">Instant wallet funding</a></li>
								<!--li class="nav-item"><a href="#"  data-toggle="modal" data-target="#bitcoin_preview" class="nav-link">Deposit With Card</a></li-->
							</ul>
						</li>
						<li class="nav-item">
							<a href="./transaction" class="nav-link" title="Deposit history">
								<i class="icon-alarm"></i>
								<span>
									Transaction history
								</span>
							</a>
						</li>
									</ul>
						</li-->	
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
 