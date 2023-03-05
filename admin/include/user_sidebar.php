	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-dark sidebar-main bg-indigo sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
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
							<a href="#">
								<img src="<?php echo $cast2;?>" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark"><?php echo $set['site_name'];?></h6>
							<span class="font-size-sm text-white text-shadow-dark"><?php echo $set['title'];?></span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="security/0" class="nav-link">
									<i class="icon-lock"></i>
									<span>Account information</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="../app/admin/logout" class="nav-link">
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

						<!-- Main -->
						<li class="nav-item">
							<a href="./dashboard" class="nav-link">
								<i class="icon-home4"></i>
								<span>
									Dashboard
								</span>
							</a>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-user-plus"></i> <span>User Manangement</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="User Manangement">
								<li class="nav-item"><a href="./users" class="nav-link"><i class="icon-user"></i> Client accounts</a></li>
								<li class="nav-item"><a href="./transfers" class="nav-link"><i class="icon-paperplane"></i>Internal Transfer</a></li>
								<li class="nav-item"><a href="./ticket" class="nav-link"><i class="icon-bubbles5"></i>Customer service</a></li>
								<li class="nav-item"><a href="./promotion_emails" class="nav-link"><i class="icon-envelope"></i>Promotional Emails</a></li>
								<li class="nav-item"><a href="./messages" class="nav-link"><i class="icon-bubbles5"></i>Messages</a></li>
								<li class="nav-item"><a href="./reviews"class="nav-link"><i class="icon-clipboard6"></i>Platform Review</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-cogs"></i> <span>System configuration</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="System configuration">
								<li class="nav-item"><a href="./settings" class="nav-link"><i class="icon-hammer-wrench"></i>General Settings</a></li>
								<li class="nav-item"><a href="./email_settings"class="nav-link"><i class="icon-envelope"></i>SMTP configuration</a></li>
								<li class="nav-item"><a href="./pages" class="nav-link"><i class="icon-stack"></i>Webpages</a></li>
								<li class="nav-item"><a href="./currency" class="nav-link"><i class="icon-coin-euro"></i>Currency</a></li>
								<li class="nav-item"><a href="./faq" class="nav-link"><i class="icon-question4"></i>FAQs</a></li>
								<li class="nav-item"><a href="./about" class="nav-link"><i class="icon-file-check"></i>Terms & Condition</a></li>
								<li class="nav-item"><a href="./social" class="nav-link"><i class="icon-share2"></i>Social Links</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-credit-card"></i><span>Product & History</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Deposit & withdraw">
											<li class="nav-item"><a href="./product" class="nav-link"><i class="icon-share"></i>Add Product</a></li>
								<li class="nav-item"><a href="./approve_transaction"class="nav-link"><i class="icon-cash"></i>Approve Transaction</a></li>

		<li class="nav-item"><a href="./custoproduct" class="nav-link"><i class="icon-coins"></i>Customer Product</a></li>
			
								<li class="nav-item"><a href="./transaction"class="nav-link"><i class="icon-coins"></i>All Transaction History</a></li>
								<!--li class="nav-item"><a href="./withdraw_cash" class="nav-link"><i class="icon-cash"></i>Cash withdraw History</a></li>
								<li class="nav-item"><a href="./withdraw_bitcoin" class="nav-link"><i class="icon-coins"></i>Bitcoin withdraw History</a></li>
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-bag"></i> <span>Bitcoin offers</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="Bitcoin offers">
								<li class="nav-item"><a href="./offers"class="nav-link"><i class="icon-cart4"></i>Offers</a></li>
								<li class="nav-item"><a href="./bitcoinorder" class="nav-link"><i class="icon-cart-remove"></i> Bitcoin order history</a></li-->
							</ul>
						</li>
						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-magazine"></i> <span>News Section</span></a>

							<ul class="nav nav-group-sub" data-submenu-title="News Section">
								<li class="nav-item"><a href="./cblog" class="nav-link"><i class="icon-quill4"></i>New Post</a></li>
								<li class="nav-item"><a href="./ar" class="nav-link"><i class="icon-newspaper"></i>Articles</a></li>
								<li class="nav-item"><a href="./category"class="nav-link"><i class="icon-clipboard6"></i>Category</a></li>
							</ul>
						</li>
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>