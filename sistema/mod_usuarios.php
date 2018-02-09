<?php
	$pass_prefix = '@CamaltecFiltros!';
	$pass_sufix = '?Cierre</>@';
	
	
	function UserLoadData($uid)
	{
		global $dbi;
		$usuario = null;
		
		$sql = "SELECT * FROM bd_users WHERE id=$uid;";
		$query = mysqli_query($dbi, $sql);
                $sql2 = "SELECT * FROM bd_direcciones WHERE idusuario=$uid;";
		$query2 = mysqli_query($dbi, $sql2);
                
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_array($query);
                        $assoc2 = mysqli_fetch_array($query2);
			$usuario = array(
				'id' => $assoc['id'],
				'nombre' => $assoc['nombre'],
				'rol' => $assoc['rol'],
				'email' => $assoc['email'],
				'telefono' => $assoc['telefono'],
				'direccion' => $assoc['direccion'],
				'sesion' => $assoc['sesion'],
				'dni' => $assoc['dni'],
				'cp' => $assoc['cp'],
				'poblacion' => $assoc['poblacion'],
				'provincia' => Provincia($assoc['provincia']),
				'provinciaid' => $assoc['provincia'],
				'pais' => $assoc['pais'],
                                'nombreE' => $assoc2['nombre'],
                                'direccionEnv' => $assoc2['direccion'],
                                'cpEnv' => $assoc2['cp'],
				'poblacionEnv' => $assoc2['poblacion'],
				'provinciaEnv' => Provincia($assoc2['idprovincia']),
				'provinciaidEnv' => $assoc2['idprovincia'],
				'paisEnvN' => Pais($assoc2['idpais']),
                                'paisEnv' => $assoc2['idpais'],
                                'tipo_cliente' => $assoc['tipo_cliente'],
                                'RazonSocial' => $assoc['RazonSocial']
			);
		}
                
		return $usuario;
	}
	
    function Geolocaliza($uid, $longitud, $latitud, $ciudad, $pais){
        
        global $dbi;
        
        $sql = "SELECT * FROM bd_gps WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        if (mysqli_num_rows($query) > 0)
		{
            $sql = "UPDATE bd_gps SET longitud=$longitud, latitud=$latitud, ciudad='$ciudad', pais='$pais' WHERE idusuario=$uid;";
            mysqli_query($dbi, $sql);
        }else{
            $sql = "INSERT INTO bd_gps VALUES(null, $uid, $longitud, $latitud, $ciudad, $pais, NOW());";
            mysqli_query($dbi, $sql);
        }
        
    }

    function GeolocalizaReg($longitud, $latitud, $ciudad, $pais){
        
        global $dbi;
        
        $sql = "SELECT MAX(id) AS id FROM bd_users";
        $query = mysqli_query($dbi, $sql);
        $id = mysqli_fetch_array($query);
        
        $sql = "INSERT INTO bd_gps VALUES(null, $id[id], $longitud, $latitud, $ciudad, $pais, NOW());";
        mysqli_query($dbi, $sql);
        
    }
	
	function UserLogIn($usuario, $password)
	{
		global $dbi, $pass_prefix, $pass_sufix;
		$userex = 0;
		$ses = uniqid();
		
		$usuario = mysqli_real_escape_string($dbi, htmlspecialchars($usuario));
		$password = mysqli_real_escape_string($dbi, htmlspecialchars(sha1(md5($pass_prefix.$password.$pass_sufix))));
		
		$sql = "SELECT id, sesion, nombre FROM bd_users WHERE email='$usuario' AND pass='$password' AND sesion NOT LIKE 'emval%' AND activo NOT LIKE 'C';";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_array($query);
			$sql = "UPDATE bd_users SET sesion='$ses' WHERE email='$usuario' AND pass='$password' AND sesion NOT LIKE 'emval%' AND activo NOT LIKE 'C';";
			$query = mysqli_query($dbi, $sql);
			
			$usuario = array(
				'id' => $assoc['id'],
				'sesion' => $ses,
				'nombre'   => $assoc['nombre']
			);
			$_SESSION['usr'] = UserLoadData($usuario['id']);
			$userex = 1;
		}
                $sql = "SELECT id FROM bd_users WHERE email='$usuario' AND pass='$password' AND sesion LIKE 'emval%' AND activo NOT LIKE 'C';";
		$query = mysqli_query($dbi, $sql);
                if (mysqli_num_rows($query) == 1)
		{
                    $userex = -1;
                }
		
		return $userex;
	}
	
	
	function UserLogOut()
	{
		$_SESSION['usr'] = null;
	}
	
	
	function UserLogOne($usuario, $sesion)
	{
		global $dbi;
		
		$sql = "SELECT id FROM bd_users WHERE id='$usuario' AND sesion='$sesion';";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) < 1)
			UserLogOut();
	}
	
	function UserSigIn($nombre, $pass, $email, $telefono, $direccion, $dni, $cp, $poblacion,
					   $provincia, $pais='ESP', $tipoC, $tipoD, $rsocial, $sesion='[CONFIRMACION]')
	{
		global $dbi, $pass_prefix, $pass_sufix;
		$userid = -1;
        
        $sql = "SELECT registro FROM bd_empresa;";
        $query = mysqli_query($dbi, $sql);
        $registro = mysqli_fetch_array($query);
        if ($registro['registro'] == 1)
          $reg = "A";
        else
          $reg = "B";
		
		$nombre = mysqli_real_escape_string($dbi, htmlspecialchars($nombre));
		$pass = mysqli_real_escape_string($dbi, htmlspecialchars(sha1(md5($pass_prefix.$pass.$pass_sufix))));
		$email = mysqli_real_escape_string($dbi, htmlspecialchars($email));
		$telefono = mysqli_real_escape_string($dbi, htmlspecialchars($telefono));
		$direccion = mysqli_real_escape_string($dbi, htmlspecialchars($direccion));
		
                if($registro['registro'] == 1){
                    $sesion = 'welcome';
                }else{
                    $sesion = 'emval'.uniqid();
                }
		
                
                $dni = mysqli_real_escape_string($dbi, htmlspecialchars($dni));
		$cp = mysqli_real_escape_string($dbi, htmlspecialchars($cp));
		$poblacion = mysqli_real_escape_string($dbi, htmlspecialchars($poblacion));
		$provincia = mysqli_real_escape_string($dbi, htmlspecialchars($provincia));
		$pais = mysqli_real_escape_string($dbi, htmlspecialchars($pais));
                $tipoC = mysqli_real_escape_string($dbi, htmlspecialchars($tipoC));
                $tipoD = mysqli_real_escape_string($dbi, htmlspecialchars($tipoD));
                $rsocial = mysqli_real_escape_string($dbi, htmlspecialchars($rsocial));
                
                if($tipoC == 'Empresa'){
                    $tipoD = 'CIF';
                }
                
                $dni = strtoupper($dni);
                $tipoD = strtoupper($tipoD);
				
		$sql = "INSERT INTO bd_users 
				VALUES(null, '$nombre', '$rsocial', '$pass', 3, '$email', '$telefono', '$direccion', '', '$sesion', '$dni', '$cp', 
				'$poblacion', '$provincia', '$pais', 0, '$reg', '$tipoC', '$tipoD');";
		$query = mysqli_query($dbi, $sql);
                
                $idd = mysqli_insert_id($dbi);
                
                if($idd>0){
                    $sql2 = "INSERT INTO bd_direcciones
                                    VALUES(null, '$nombre', '$idd', '$direccion', '$pais', '$provincia', '$cp', '$poblacion');";
                    $query2 = mysqli_query($dbi, $sql2);
                }
                
		if ($query){
			$userid = $sesion;
                        if($Empresa['registro'] == 1)
                            $userid = 0;
                }
		
		return $userid;
	}
	
	
	function UserVal($code)
	{
		global $dbi;
		$change = 0;
		
		$code = mysqli_real_escape_string($dbi, $code);
				
		$sql = "UPDATE bd_users 
				SET sesion='welcome' WHERE sesion='$code';";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_affected_rows($dbi))
			$change = 1;
		
		return $change;
	}
	
	
	function UserChangePass($uid, $pass, $npass)
	{
		global $dbi, $pass_prefix, $pass_sufix;
		$change = 0;
		
		$pass = mysqli_real_escape_string($dbi, htmlspecialchars((sha1(md5($pass_prefix.$pass.$pass_sufix)))));
		$npass = mysqli_real_escape_string($dbi, htmlspecialchars((sha1(md5($pass_prefix.$npass.$pass_sufix)))));
				
		$sql = "UPDATE bd_users 
				SET pass='$npass' WHERE id=$uid AND pass='$pass';";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_affected_rows($dbi))
			$change = 1;
		
		return $change;
	}
	
	
	function UserChangeEmail($uid, $pass, $nemail)
	{
		global $dbi, $pass_prefix, $pass_sufix;
		$change = 0;
		
		$email = mysqli_real_escape_string($dbi, htmlspecialchars($nemail));
		$pass = mysqli_real_escape_string($dbi, htmlspecialchars((sha1(md5($pass_prefix.$pass.$pass_sufix)))));
				
		$sql = "UPDATE bd_users 
				SET email='$email' WHERE id=$uid AND pass='$pass';";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_affected_rows($dbi))
		{
			$change = 1;
			$_SESSION['usr'] = UserLoadData($uid);
		}
		
		return $change;
	}
	
	
	function UserChangeData($uid, $pass, $nombre, $rsocial, $telefono, $direccion, $dni, $cp, $poblacion, $provincia, $pais)
	{
		global $dbi, $pass_prefix, $pass_sufix;
		$change = 0;
		
		$nombre = mysqli_real_escape_string($dbi, htmlspecialchars($nombre));
		$telefono = mysqli_real_escape_string($dbi, htmlspecialchars($telefono));
		$direccion = mysqli_real_escape_string($dbi, htmlspecialchars($direccion));
		$dni = mysqli_real_escape_string($dbi, htmlspecialchars($dni));
		$cp = mysqli_real_escape_string($dbi, htmlspecialchars($cp));
		$poblacion = mysqli_real_escape_string($dbi, htmlspecialchars($poblacion));
		$provincia = mysqli_real_escape_string($dbi, htmlspecialchars($provincia));
		$pais = mysqli_real_escape_string($dbi, htmlspecialchars($pais));
                $rsocial = mysqli_real_escape_string($dbi, htmlspecialchars($rsocial));
		
		$pass = mysqli_real_escape_string($dbi, htmlspecialchars((sha1(md5($pass_prefix.$pass.$pass_sufix)))));
				
		$sql = "UPDATE bd_users 
				SET nombre='$nombre', RazonSocial = '$rsocial', telefono='$telefono', direccion='$direccion', dni='$dni', cp='$cp',
				poblacion='$poblacion', provincia='$provincia', pais='$pais'
				WHERE id=$uid AND pass='$pass';";
				
		$query = mysqli_query($dbi, $sql);
		
		if (mysqli_affected_rows($dbi))
		{
			$change = 1;
			$_SESSION['usr'] = UserLoadData($uid);
		}
		
		return $change;
	}
	
        
        function UserChangeDataEnv($uid, $pass, $nombre, $direccion, $cp, $poblacion, $provincia, $pais)
	{
		global $dbi, $pass_prefix, $pass_sufix;
		$change = 0;
		
                $pass = mysqli_real_escape_string($dbi, htmlspecialchars(sha1(md5($pass_prefix.$pass.$pass_sufix))));
                $sql = "SELECT pass FROM bd_users WHERE id = '". $_SESSION['usr']['id'] ."'";
                $query = mysqli_query($dbi, $sql);
		
                if (mysqli_num_rows($query) == 1)
		{
                    $assoc = mysqli_fetch_array($query);
                        
                    if($assoc['pass'] == $pass){
                        $nombre = mysqli_real_escape_string($dbi, htmlspecialchars($nombre));
                        $direccion = mysqli_real_escape_string($dbi, htmlspecialchars($direccion));
                        $cp = mysqli_real_escape_string($dbi, htmlspecialchars($cp));
                        $poblacion = mysqli_real_escape_string($dbi, htmlspecialchars($poblacion));
                        $provincia = mysqli_real_escape_string($dbi, htmlspecialchars($provincia));

                        $_SESSION['usr']['nombreE'] = $nombre;
                        $_SESSION['usr']['direccionEnv'] = $direccion;
                        $_SESSION['usr']['provinciaEnv'] = Provincia($provincia);
                        $_SESSION['usr']['poblacionEnv'] = $poblacion;
                        $_SESSION['usr']['cpEnv'] = $cp;
                        $_SESSION['usr']['paisEnv'] = $pais;
                        $_SESSION['usr']['paisEnvN'] = Pais($pais);

                        $pass = mysqli_real_escape_string($dbi, htmlspecialchars(sha1(md5($pass_prefix.$pass.$pass_sufix))));

                        $sql = "UPDATE bd_direcciones 
                                        SET nombre='$nombre', direccion='$direccion', cp='$cp',
                                        poblacion='$poblacion', idprovincia='$provincia', idpais='$pais'
                                        WHERE idusuario=$uid;";
                                        
                        $query = mysqli_query($dbi, $sql);
                        
                        if (mysqli_affected_rows($dbi))
                        {
                            $change = 1;
                            $_SESSION['usr'] = UserLoadData($uid);
                        }
                    }
                }
		return $change;
	}
        
	
	function UserRecovery($email)
	{
		global $dbi, $pass_prefix, $pass_sufix;
		$pass = uniqid();
		$npass = (sha1(md5($pass_prefix.$pass.$pass_sufix)));
				
		$sql = "UPDATE bd_users 
				SET pass='$npass' WHERE email='$email';";
		$query = mysqli_query($dbi, $sql);
		if (!$query)
			$pass = -1;
		
		return $pass;
	}
        
        
        function EsAdmin($id){
            global $dbi;
            $dev = 0;
            
            $sql = "SELECT rol FROM bd_users WHERE id = $id";
            $query = mysqli_query($dbi, $sql);
            if (mysqli_num_rows($query) == 1)
            {
                $assoc = mysqli_fetch_array($query);
                if($assoc['rol'] == 1) 
                    $dev = 1;
            }
            return $dev;
        }
?>