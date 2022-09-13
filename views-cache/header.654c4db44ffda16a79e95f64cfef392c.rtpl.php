<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
		<meta name="description" content="Spruha -  Admin Panel HTML Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin,dashboard,panel,bootstrap admin template,bootstrap dashboard,dashboard,themeforest admin dashboard,themeforest admin,themeforest dashboard,themeforest admin panel,themeforest admin template,themeforest admin dashboard,cool admin,it dashboard,admin design,dash templates,saas dashboard,dmin ui design">

		<!-- Favicon -->
		<link rel="icon" href="res/img/brand/favicon.ico" type="image/x-icon"/>

		<!-- Title -->
		<title>Etarp - Automação e Informática</title>

		<!-- Bootstrap css-->
		<link href="res/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"/>

		<!-- Icons css-->
		<link href="res/plugins/web-fonts/icons.css" rel="stylesheet"/>
		<link href="res/plugins/web-fonts/font-awesome/font-awesome.min.css" rel="stylesheet">
		<link href="res/plugins/web-fonts/plugin.css" rel="stylesheet"/>



		<!-- Internal DataTables css-->
		<link href="res/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />
		<link href="res/plugins/datatable/responsivebootstrap4.min.css" rel="stylesheet" />
		<link href="res/plugins/datatable/fileexport/buttons.bootstrap4.min.css" rel="stylesheet" />

		<!-- Internal Sweet-Alert css-->
		<link href="res/plugins/sweet-alert/sweetalert.css" rel="stylesheet">

		<!-- Style css-->
		<link href="res/css/style.css" rel="stylesheet">
		<link href="res/css/skins.css" rel="stylesheet">
		<link href="res/css/dark-style.css" rel="stylesheet">
		<link href="res/css/colors/default.css" rel="stylesheet">

		<!-- Color css-->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="res/css/colors/color.css">

		<!-- Select2 css-->
		<link href="res/plugins/select2/css/select2.min.css" rel="stylesheet">

		<!-- Mutipleselect css-->
		<link rel="stylesheet" href="res/plugins/multipleselect/multiple-select.css">

		<!-- Sidemenu css-->

		<link href="res/css/sidemenu/sidemenu.css" rel="stylesheet">
		<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />

	
		<link href="res/plugins/select2/css/select2.min.css" rel="stylesheet">
	</head>

	<body class="main-body leftmenu">

		<!-- Loader -->
		<div id="global-loader">
			<img src="res/img/loader.svg" class="loader-img" alt="Loader">
		</div>
		<!-- End Loader -->
		<?php require $this->checkTemplate("side-menu");?>