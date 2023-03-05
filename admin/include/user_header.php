<?php
session_start();
if(!isset($_SESSION['bitcrow_admin'])){
	echo "<script>window.location.href='".$url."/app/admin/logout';</script>";
}
	$admin=mysqli_fetch_array(mysqli_query($dbc, "SELECT * FROM admin WHERE password='".$_SESSION['bitcrow_admin']."'"));
	$username=$admin['username'];
	if($_SESSION['bitcrow_adminpass']!=$admin['password']){
		redirect($url."/app/admin/logout");
	}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?php echo $url; ?>/admin/"/>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../asset/<?php echo $logo['image_link']; ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="../asset/<?php echo $logo['image_link']; ?>">
	<title><?php echo $title.' | '.$set['site_name']; ?></title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="../asset/global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="../asset/user/assets/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="../asset/global_assets/js/main/jquery.min.js"></script>
	<script src="../asset/global_assets/js/main/bootstrap.bundle.min.js"></script>
	<script src="../asset/global_assets/js/plugins/loaders/blockui.min.js"></script>
	<script src="../asset/global_assets/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->

	<script src="../asset/global_assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script src="../asset/global_assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script src="../asset/global_assets/js/plugins/ui/moment/moment.min.js"></script>
	<script src="../asset/global_assets/js/plugins/pickers/daterangepicker.js"></script>
	<script src="../asset/global_assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="../asset/global_assets/js/plugins/ui/prism.min.js"></script>
	<script src="../asset/global_assets/js/plugins/editors/summernote/summernote.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/validation/validate.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/inputs/touchspin.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/selects/select2.min.js"></script>
	<script src="../asset/global_assets/js/plugins/forms/styling/switch.min.js"></script>

	<script src="../asset/user/assets/js/app.js"></script>
	<script src="../asset/global_assets/js/demo_pages/dashboard.js"></script>
	<script src="../asset/global_assets/js/demo_pages/login.js"></script>
	<script src="../asset/global_assets/js/demo_pages/datatables_advanced.js"></script>
	<script src="../asset/global_assets/js/demo_pages/datatables_basic.js"></script>
	<script src="../asset/global_assets/js/demo_pages/form_layouts.js"></script>
	<script src="../asset/global_assets/js/demo_pages/form_select2.js"></script>
	<script src="../asset/global_assets/js/demo_pages/form_checkboxes_radios.js"></script>
	<script src="../asset/global_assets/js/demo_pages/form_validation.js"></script>
	<script src="../lib/tinymce/tinymce.min.js"></script>
	<script src="../lib/tinymce/init-tinymce.js"></script>
	<!-- /theme JS files -->

</head>