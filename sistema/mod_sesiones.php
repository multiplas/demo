<?php
	session_start();
	
	if (!isset($_SESSION['usr']))
		$_SESSION['usr'] = null;
	
	if (!isset($_SESSION['filtros']))
		$_SESSION['filtros'] = null;
	
	if (!isset($_POST['checks']) and isset($_POST['nofilters']))
		$_SESSION['checks'] = null;
	
	if (isset($_POST['OrdenarPor']))
		$_SESSION['OrdenarPor'] = $_POST['OrdenarPor'];
	
	if (isset($_POST['checks']))
		$_SESSION['checks'] = $_POST['checks'];
?>