<?php
	function conectaBaseDatos()
	{
		try
		{
			require_once('../sistema/i_connectionstrings.php');
			
			$conexion = new PDO("mysql:host=$svr;port=$prt;dbname=$dbn",
								$usr,
								$pwd,
								array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	 
			$conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
			return $conexion;
		}
		catch (PDOException $e){
			die ("No se puede conectar a la base de datos". $e->getMessage());
		}
	}
	
	function dameMunicipio($estado = '')
	{
		$resultado = false;
		$consulta = "SELECT * FROM bd_city";
	 
		if($estado != ''){
			$consulta .= " WHERE CountryCode = '$estado'";
		}
		
		$consulta .= " ORDER BY Name";
	 
		$conexion = conectaBaseDatos();
		$sentencia = $conexion->prepare($consulta);
		$sentencia->bindParam('estado',$estado);
	 
		try {
			if(!$sentencia->execute()){
				print_r($sentencia->errorInfo());
			}
			$resultado = $sentencia->fetchAll();
			//$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			$sentencia->closeCursor();
		}
		catch(PDOException $e){
			echo "Error al ejecutar la sentencia: \n";
				print_r($e->getMessage());
		}
	 
		return $resultado;
	}
	
	if(isset($_POST['estado']))
	{
		$municipios = dameMunicipio($_POST['estado']);
		$html = '<option value="" selected>Selecciona una provincia/región</option>';
		foreach($municipios as $indice => $registro){
			$html .= '<option'.($registro['ID'] == $_POST['idpro'] ? ' selected' : '').' value="'.$registro['ID'].'">'.$registro['Name'].'</option>';
		}
	 
		$respuesta = array("html"=>$html);
		echo json_encode($respuesta);
	}
?>