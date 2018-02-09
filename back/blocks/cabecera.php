<!DOCTYPE html>
<?php require_once('system/execution.php'); ?>
<html class="no-js">
    <head>
		<meta charset="utf-8" />
        <title>Admin Home Page</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
		<link href="assets/DT_bootstrap.css" rel="stylesheet" media="screen">
        <link href="vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="pickercolor/jquery.minicolors.css">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <script src="vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script type="text/javascript" src="js/jquery.PrintArea.js"></script>
        <script type="text/javascript" src="pickercolor/jquery.minicolors.min.js"></script>
                
	</head>
    
    <body>
        <?php require_once('blocks/menuSuperior.php'); ?>
		<div id="subirco" class="container-fluid">
            <div class="row-fluid">
            <div class="cerrar" id="contraer"></div>
				<?php require_once('blocks/menu.php'); ?>