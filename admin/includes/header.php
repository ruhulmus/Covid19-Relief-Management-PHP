<?php
session_start();
$logged = $_SESSION['loggedin'];
if ($logged == false) {
    header('Location: ../admin/login.php');
}
?>
<!DOCTYPE html>
	<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="text/html; charset=UTF-8; IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title><?= isset($PageTitle) ? $PageTitle : "Relief Manager| Dashboard"?></title>

		<!-- Custom fonts for this template-->
		<link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="assets/css/sb-admin-2.css" rel="stylesheet">
		  <!-- Custom styles for this page -->
  		<link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

		<?php if (function_exists('customPageHeader')){
		  	customPageHeader();
		}?>
		<style>

			.sidebar-brand .sidebar-brand-icon .logo-icon{
			  width: 60px !important;
			}

			.bg-gradient-primary{
				 background-color: #8060CA;
  				background: linear-gradient(90deg, rgba(103,62,199,1) 0%, rgba(103,60,205,1) 46%, rgba(103,62,199,1) 100%);



			}
			.stick_notification{
				font size:20px;
				text-align: center;
				width: 100%;
				color:#36b9cc;
				margin-top: 10px;
				font-size:16px;
			}
			.stick_notification span {
				color:red;
				font-weight: 600;
				font-size:20px;

			}
			.txt-bold{
				font-weight: 600;
				font-size:15px;
			}
		</style>
	</head>

	<body id="page-top">
	  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include_once('includes/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">