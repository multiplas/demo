<?php
	require_once($draiz.'/sistema/i_connectionstrings.php');
	$dbi = null;
	
	function AbrirConexion()
	{
		global $svr, $usr, $pwd, $dbn, $prt, $dbi;
		@$dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt)
			or die ('<p style="background: #F0F0F0; border: solid 1px #E0E0E0; border-radius: 3px; font-size: 2rem; text-align: center; text-shadow: 1px 1px 0px #FFF; max-width: 60%; margin: 100px auto; padding: 1.4rem;">No se ha podido establecer la conexi&oacute;n con la base de datos.<br><br><em>Vuelva a intentarlo pasados unos minutos!</em><br><br><a href="javascript: location.reload();" style="text-decoration: none; color: #09F">Recargar</a></p>');
		mysqli_set_charset($dbi, 'utf8');
	}
	
	function CerrarConexion()
	{
		global $dbi;
		if ($dbi !== null && $dbi !== false)
			mysqli_close($dbi)
			or die ('No se ha podido cerrar la conexión con la base de datos.');
	}
?>