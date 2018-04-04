<?php header('Content-type: text/html; charset=utf-8');
	// Declaraciones, librerias y inicializaciones básicas.
	/*error_reporting(E_ALL);
	ini_set('display_errors', '1');*/
	$draiz = getcwd();
	$draizp = '';
    // $draizp = '//localhost/demo';//eliminar
	require_once($draiz.'/sistema/mod_sesiones.php');
	require_once($draiz.'/sistema/mod_conexion.php');
	require_once($draiz.'/sistema/mod_productos.php');
	require_once($draiz.'/sistema/mod_usuarios.php');
	require_once($draiz.'/sistema/mod_varios.php');

    if(session_id() == '') {//Check if session started
        session_start();
    }



        $tofind = "ÀÁÂÄÅàáâäÒÓÔÖòóôöÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ";
        $replac = "AAAAAaaaaOOOOooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn";    
        
        $no_permitidas= array ("'","/","!","¡","?","¿","\"","$","%","&","(",")","=","[","]","{","}","+","*",",",";",":","·",">","<","á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","Ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹", " ");
        $permitidas= array ("","","","","","","","","","","","","","","","","","","","","","","","a","e","i","o","u","n","N","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","-");

    
	if (isset($_GET['back']) || $_GET['lng'] == 'back')
	{ // Backend!
		header('Location: '.$draizp.'/back/index.php');
	}

    if (isset($_GET['distribuidores']) || $_GET['lng'] == 'distribuidores')
	{ // Backend!
		header('Location: '.$draizp.'/distribuidores/index.php');
	}
	
	AbrirConexion();				// Abre la conexión con la base de datos indicada en el fichero strings.
	// Valida la cuenta de usuario para que solo haya una conexión al mismo tiempo.
	UserLogOne($_SESSION['usr']['id'], $_SESSION['usr']['sesion']);
        
        $Empresa = DatosEmpresa(1);  // Obtiene los datos de perfil del empresa (el identificador de la linea SQL).
        if($Empresa['httpsAc'] == 1){
            if(!isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] != "on"){
                header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
                exit;
            }
        }else{
            if(isset($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] == "on"){
                header("Location: //" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
                exit;
            }
        }
        
        if(!isset($_SESSION['app'])){
            if($_GET['app'] == 'activo'){
                $_SESSION['app'] = "YES";
            }else{
                $_SESSION['app'] = "NO";
            }
        }
        
        
    if(isset($_POST['idioma'])){
        $_SESSION['idioma'] = $_POST['idioma'];
        if($_POST['idioma'] == 'ESP')
            $_SESSION['lenguaje'] = 'es/';
        else if($_POST['idioma'] == 'FRA')
            $_SESSION['lenguaje'] = 'fr/';
        else if($_POST['idioma'] == 'DEU')
            $_SESSION['lenguaje'] = 'de/';
        else if($_POST['idioma'] == 'UK')
            $_SESSION['lenguaje'] = 'en/';
        else if($_POST['idioma'] == 'POR')
            $_SESSION['lenguaje'] = 'pr/';
        else if($_POST['idioma'] == 'ITA')
            $_SESSION['lenguaje'] = 'it/';
        else if($_POST['idioma'] == 'CAT')
            $_SESSION['lenguaje'] = 'ca/';
        else if($_POST['idioma'] == 'RUS')
            $_SESSION['lenguaje'] = 'ru/';
    }
    
    if(!isset($_SESSION['idioma'])){
        $_SESSION['idioma'] = 'ESP';
        $_SESSION['lenguaje'] = 'es/';
    }
    
    $idiomas = Idiomas();
        $divisas = Divisas();
    
    if(count($idiomas) < 2){
        $_SESSION['lenguaje'] = '';
    }
    
    
    if(isset($_POST['divisa'])){
        $_SESSION['divisa'] = $_POST['divisa'];
        if($_SESSION['divisa'] == 'EUR')
            $_SESSION['moneda'] = '€';
        if($_SESSION['divisa'] == 'USD')
            $_SESSION['moneda'] = '$';
        if($_SESSION['divisa'] == 'JPY')
            $_SESSION['moneda'] = '¥';
        if($_SESSION['divisa'] == 'GBP')
            $_SESSION['moneda'] = '£';
        if($_SESSION['divisa'] == 'CHF')
            $_SESSION['moneda'] = '₣';
    }
    
    
    if(!isset($_SESSION['divisa'])){
        $_SESSION['divisa'] = DivisaPrincipal();
        if($_SESSION['divisa'] == 'EUR')
        $_SESSION['moneda'] = '€';
        if($_SESSION['divisa'] == 'USD')
            $_SESSION['moneda'] = '$';
        if($_SESSION['divisa'] == 'JPY')
            $_SESSION['moneda'] = '¥';
        if($_SESSION['divisa'] == 'GBP')
            $_SESSION['moneda'] = '£';
        if($_SESSION['divisa'] == 'CHF')
            $_SESSION['moneda'] = '₣';
    }
    
    
    
    $labelidioma = LabelIdioma('ESP');
    $nombreidioma = NombreIdioma('ESP');

    
    
    $sql="SELECT * FROM  bd_colores_productos WHERE id='1'";
                $query = mysqli_query($dbi, $sql);
                $colores = mysqli_fetch_array($query);
                
    $sql2="SELECT * FROM  bd_colores WHERE id='1'";
                $query2 = mysqli_query($dbi, $sql2);
                $colores2 = mysqli_fetch_array($query2);

	
	$categorias = Categorias();
        $categorias2 = CategoriasNP();
	if($Empresa['mvmodo'] == 0)
            $productosMV = ProductosConCriterio(4, 'ventas');
        else
            $productosMV = ProductosMasVendidosM(4);
        
        if($Empresa['novmodo'] == 0)
            $productosMN = ProductosConCriterio(4, 'novedades');
        else
            $productosMN = ProductosNovedadesM(4);
        
        $etiquetasMuesta = EtiquetasCargar();
        
        $sqlInicio = "SELECT * FROM bd_paginas WHERE nombre = 'INICIO DERECHA'";
        $queryInicio = mysqli_query($dbi, $sqlInicio);
        if(mysqli_num_rows($queryInicio) > 0){
            $consultaInicio = mysqli_fetch_array($queryInicio);
            $derecha = $consultaInicio['contenido'];
            $imgderecha = $consultaInicio['imagen'];
        }else{
            $derecha = '';
            $imgderecha = '';
        }
        
        $sqlInicio = "SELECT * FROM bd_paginas WHERE nombre = 'INICIO IZQUIERDA'";
        $queryInicio = mysqli_query($dbi, $sqlInicio);
        if(mysqli_num_rows($queryInicio) > 0){
            $consultaInicio = mysqli_fetch_array($queryInicio);
            $izquierda = $consultaInicio['contenido'];
            $imgizquierda = $consultaInicio['imagen'];
        }else{
            $izquierda = '';
            $imgizquierda = '';
        }
        
        $imagenPrin = '';
        $imagenPrinDestino = '';
        $imagenPrinTitulo = '';
        $imagenPrinURL = '';
        $imagenPrinContenido = '';

        $sqlInicio = "SELECT * FROM bd_home_image WHERE id = 0";
        $queryInicio = mysqli_query($dbi, $sqlInicio);
        if(mysqli_num_rows($queryInicio) > 0){
            $consultaInicio = mysqli_fetch_array($queryInicio);
            if($consultaInicio['valor'] == 1){//Si esta activado
                $imagenPrin = $consultaInicio['imagen'];
                $imagenPrinDestino = $consultaInicio['destino'];
                $imagenPrinTitulo = $consultaInicio['nombre'];
                $imagenPrinURL = $consultaInicio['url'];
                $imagenPrinContenido = $consultaInicio['contenido'];
            }
        }
        
        $sqlInicio = "SELECT * FROM bd_fuentes WHERE id = '1'";
        $queryInicio = mysqli_query($dbi, $sqlInicio);
        if(mysqli_num_rows($queryInicio) > 0){
            $consultaInicio = mysqli_fetch_array($queryInicio);
            $fuente1 = $consultaInicio['fuente1'];
            $fuente2 = $consultaInicio['fuente2'];
        }
	
	$bar = -1;

    $paginasP = PaginasP();
    $paginasE = PaginasE();
    
    $barpath = '';


	$filtro = '';
	$idspa = '';

    $sql="SELECT * FROM bd_configuracion";
    $query2 = mysqli_query($dbi, $sql);
    $consulta = mysqli_fetch_array($query2);
    $inicio=$consulta['inicio'];
    $vistaprod=$consulta['productos'];
    $vistaprod2=$consulta['gproductos'];
    $conectado=$consulta['conectado'];
    $cabecera=$consulta['cabecera'];
    $pie = $consulta['pie'];
    $efecto = $consulta['efecto'];
    $CFefecto = $consulta['CFefecto'];
    $CLefecto = $consulta['CLefecto'];
    $fCabecera = $consulta['fcabecera'];
    $MM_anchoMax = $consulta['MM_anchoMax'];
    $MM_fondo = $consulta['MM_fondo'];
    $MM_divisiones = $consulta['MM_divisiones'];
    $MM_colores = $consulta['MM_colores'];
    $MM_despliegue = $consulta['MM_despliegue'];
    $MM_blog = $consulta['MM_blog'];
    $Napartados = $consulta['Napartados'];
    
    $pieTiendas = 0;
    $sql77="SELECT id FROM bd_tiendas";
    $query77 = mysqli_query($dbi, $sql77);
    if(mysqli_num_rows($query77) > 0){
        $pieTiendas = 1;
    }

    $sql="SELECT * FROM bd_empresa";
    $query2 = mysqli_query($dbi, $sql);
    $logo = mysqli_fetch_array($query2);

    $logoSup=$logo['logosup'];
    $logoMenu=$logo['logomenu'];

	if (isset($_SESSION['checks']))
	{ // Filtros de poductos y busqueda.
		foreach ($_SESSION['checks'] AS $checks)
			foreach ($checks AS $check)
					$idspa .= 'idatributo='.$check.';';
					
		if (strlen($idspa) > 0)
		{
			if ($idspa[strlen($idspa) - 1] == ';')
				$idspa = substr($idspa, 0, strlen($idspa) - 1);
			
			$idspa = str_replace(';', ' OR ', $idspa);
			if (strlen($idspa) > 0)
				$filtro .= "AND id IN (SELECT idproducto FROM bd_producto_atributo WHERE $idspa)";
		}
	}
	
	if (isset($_SESSION['OrdenarPor'])){
		switch ($_SESSION['OrdenarPor'])
		{ // Desplegable de Ordenar Por de poductos y busqueda.
            case 'rel':
				$filtro .= " ORDER BY visitas DESC";
				break;
			case 'fea':
				$filtro .= " ORDER BY id DESC";
				break;
			case 'fed':
				$filtro .= " ORDER BY id ASC";
				break;
			case 'noa':
				$filtro .= " ORDER BY nombre ASC";
				break;
			case 'nod':
				$filtro .= " ORDER BY nombre DESC";
				break;
			case 'pra':
				$filtro .= " ORDER BY preciot ASC";
				break;
			case 'prd':
				$filtro .= " ORDER BY preciot DESC";
				break;
				
			default:
				$filtro .= "";
				break;
		}
        }else{
            switch ($Empresa['ordenacion'])
		{ // Desplegable de Ordenar Por de poductos y busqueda.
            case 'rel':
				$filtro .= " ORDER BY visitas DESC";
				break;
			case 'fea':
				$filtro .= " ORDER BY id DESC";
				break;
			case 'fed':
				$filtro .= " ORDER BY id ASC";
				break;
			case 'noa':
				$filtro .= " ORDER BY nombre ASC";
				break;
			case 'nod':
				$filtro .= " ORDER BY nombre DESC";
				break;
			case 'pra':
				$filtro .= " ORDER BY preciot ASC";
				break;
			case 'prd':
				$filtro .= " ORDER BY preciot DESC";
				break;
				
			default:
				$filtro .= "";
				break;
		}
        }
	
	if (isset($_GET['sys_action']))
	{ // Acciones de formularios que ejecutan SQL o codigos extensos.
		switch ($_GET['sys_action'])
		{
			case 'entrar':		// Login del usuario.
				if (isset($_POST['user']) && isset($_POST['pass'])
                                        && $_POST['user'] != '' && $_POST['pass'] != '')
				{
					require_once($draiz.'/sistema/mod_usuarios.php');
					require_once($draiz.'/sistema/mod_cestaycompra.php');
					$login = UserLogIn($_POST['user'], $_POST['pass']);
                                    if ($_SESSION['cestases'] != null && $_SESSION['usr'] != null)
					{
						CestaSessionACestaUsuario($_SESSION['usr']['id'], $_SESSION['cestases']);
						PacksSessionAPacksUsuario($_SESSION['usr']['id'], $_SESSION['packsses']);
					}
                    
                                    if($_SESSION['usr'] != null){
                                        Geolocaliza($_SESSION['usr']['id'], $_POST['lon'], $_POST['lat'], $_POST['ciu'], $_POST['pai']);
                                    }
					
                                    if ($login){
                                        if($login == 1){
                                            $_SESSION['datosregistro'] = array();
                                            $query = mysqli_query($dbi, "SELECT idusuario FROM bd_carrito WHERE idusuario = '".$_SESSION['usr']['id']."'");
                                            if(mysqli_num_rows($query) > 0){
                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'pedido');
                                            }else{
                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
                                            }
                                        }else
                                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/bada');
                                    }else{
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/bad');
                                    }
				}else{
                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/badv');
                                }
				break;
			case 'recuperar':		// Recuperación del usuario.
				if (isset($_POST['user']))
				{
                                    $query = mysqli_query($dbi, "SELECT email FROM bd_users WHERE email = '".$_POST['user']."'");
                                    if(mysqli_num_rows($query) > 0){
					require_once($draiz.'/sistema/mod_usuarios.php');
					$pass = UserRecovery($_POST['user']);
					require_once($draiz.'/sistema/mod_contacto.php');
					$msg = ConstruirMsgRecuperacion($pass);
					EnviarEmail(htmlspecialchars($_POST['user']), 'Recuperación de Contraseña!', $msg);
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/recoverys');
                                    }else{
                                        header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/recoveryE');
                                    }
				}
				break;
			case 'cambiarpwd':		// Recuperación del usuario.
				if (isset($_POST['pass']) && isset($_POST['npass']) && isset($_POST['rnpass']) 
                                        && $_POST['pass'] != '' && $_POST['npass'] != '' && $_POST['rnpass'] != '')
				{
                                    if(strcmp($_POST['npass'], $_POST['rnpass']) == 0){
					require_once($draiz.'/sistema/mod_usuarios.php');
					$pass = UserChangePass($_SESSION['usr']['id'], $_POST['pass'], $_POST['npass']);
					if ($pass)
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/pwdok');
					else
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/pwdno');
                                    }else{
                                        header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/pwdnodp');
                                    }
				}else{
                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/pwdnoi');
                                }
				break;
			case 'cambiarema':		// Recuperación del usuario.
				if (isset($_POST['epass']) && isset($_POST['nemail']) && isset($_POST['rnemail'])
                                        && $_POST['epass'] != '' && $_POST['nemail'] != '' && $_POST['rnemail'] != '')
				{
					require_once($draiz.'/sistema/mod_usuarios.php');
                                        if(strcmp($_POST['nemail'], $_POST['rnemail']) == 0){
                                            $email = UserChangeEmail($_SESSION['usr']['id'], $_POST['epass'], $_POST['nemail']);
                                            if ($email)
                                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/emaok');
                                            else
                                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/emano');
                                        }else{
                                             header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/emanodp');
                                        }
				}else{
                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/emanoi');
                                }
				break;
			case 'cambiardat':		// Recuperación del usuario.
				if (isset($_POST['dpass']) && isset($_POST['nombre']) && isset($_POST['dni'])
					&& isset($_POST['telefono']) && isset($_POST['direccion']) && isset($_POST['provincia']) 
                                        && isset($_POST['pais']) && isset($_POST['localidad']) && isset($_POST['cp'])
                                        && $_POST['dpass'] != '' && $_POST['nombre'] != '' && $_POST['dni'] != ''
                                        && $_POST['telefono'] != '' && $_POST['direccion'] != '' && $_POST['provincia'] != '' 
                                        && $_POST['pais'] != '' && $_POST['localidad'] != '' && $_POST['cp'] != '')
				{
					require_once($draiz.'/sistema/mod_usuarios.php');
                                        if(isset($_POST['rsocial'])){
                                            $rs = $_POST['rsocial'];
                                        }else{
                                            $rs = '';
                                        }
					$data = UserChangeData($_SESSION['usr']['id'], $_POST['dpass'], $_POST['nombre'], $rs, $_POST['telefono']
					, $_POST['direccion'], $_POST['dni'], $_POST['cp'], $_POST['localidad'], $_POST['provincia'], $_POST['pais']);
					if ($data)
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/fatok');
					else
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/fatno');
				}else{
                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/fatnoi');
                                }
				break;
                case 'cambiardatenv':
                            
				if (isset($_POST['depass']) && isset($_POST['nombre'])
					&& isset($_POST['direccion']) && isset($_POST['provinciaE'])
					&& isset($_POST['localidad']) && isset($_POST['cp']) && isset($_POST['paisE']))
				{
					require_once($draiz.'/sistema/mod_usuarios.php');
					$data = UserChangeDataEnv($_SESSION['usr']['id'], $_POST['depass'], $_POST['nombre'], 
                                                $_POST['direccion'], $_POST['cp'], $_POST['localidad'], $_POST['provinciaE'], $_POST['paisE']);

					if ($data)
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/dateok');
					else
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/dateno');
				}
				break;
			case 'registrar':	// Registro del usuario.
                            $_SESSION['datosregistro'] = array(
                                "nombre" => $_POST['nombre'],
                                "apellidos" => $_POST['apellidos'],
                                "email" => $_POST['email'],
                                "cemail" => $_POST['cemail'],
                                "telefono" => $_POST['telefono'],
                                "direccion" => $_POST['direccion'],
                                "dni" => $_POST['dni'],
                                "cp" => $_POST['cp'],
                                "localidad" => $_POST['localidad'],
                                "provincia" => $_POST['provincia'],
                                "pais" => $_POST['pais'],
                                "tipoC" => $_POST['tipoC'],
                                "tipoD" => $_POST['tipoD'],
                                "rsocial" => $_POST['rsocial']
                                
                            );

                            if(isset($_POST['checkp'])){
                                if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['password']) && isset($_POST['rpassword'])
                                        && isset($_POST['email']) && isset($_POST['cemail']) && isset($_POST['telefono']) && isset($_POST['direccion']) 
                                        && isset($_POST['dni']) &&  isset($_POST['cp']) && isset($_POST['localidad']) && isset($_POST['provincia']) && isset($_POST['pais']) 
                                        && $_POST['nombre'] != '' && $_POST['apellidos'] != '' && $_POST['password'] != '' && $_POST['rpassword'] != ''
                                        && $_POST['email'] != '' && $_POST['cemail'] != '' && $_POST['telefono'] != '' && $_POST['direccion'] != ''
                                        && $_POST['dni'] != '' && $_POST['cp'] != '' && $_POST['localidad'] != '' && $_POST['provincia'] != '' && $_POST['pais'] != '')
				{
                                    if(strcmp($_POST['password'], $_POST['rpassword']) == 0){
                                        if(strcmp($_POST['email'], $_POST['cemail']) == 0){
                                            //Validar email
                                            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                                            //Comprobar que email no existe
                                                $query = mysqli_query($dbi, 'SELECT email FROM bd_users WHERE email = "'.$_POST['email'].'"');
                                                if(mysqli_num_rows($query1) == 0){
                                                //Validar DNI, CIF, PASAPORTE, NIE
                                                    require_once($draiz.'/sistema/mod_varios.php');
                                                    $validacionDNI = validarDNI($_POST['dni'], $_POST['tipoC'], $_POST['tipoD']);
                                                    if($validacionDNI == true){
                                                        require_once($draiz.'/sistema/mod_usuarios.php');
                                                        $uid = UserSigIn($_POST['nombre'].' '.$_POST['apellidos'], $_POST['password'], $_POST['email'], $_POST['telefono'],
                                                                          $_POST['direccion'], $_POST['dni'], $_POST['cp'], $_POST['localidad'], $_POST['provincia'], $_POST['pais'],$_POST['tipoC'],
                                                                $_POST['tipoD'], $_POST['rsocial']);

                                                        if ($uid == -1)
                                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'registro/sad');
                                                        else
                                                        {
                                                                GeolocalizaReg($_POST['lonr'], $_POST['latr'], $_POST['ciur'], $_POST['pair']);
                                                                require_once($draiz.'/sistema/mod_contacto.php');
                                                                if($Empresa["registro"] == 2){
                                                                    $msg = ConstruirMsgRegistrado(htmlspecialchars($_POST['nombre']), 'Bienvenido!', '//'.$_SERVER['HTTP_HOST'].'/acc/activar/'.$uid);
                                                                }else{
                                                                    $msg = ConstruirMsgRegistradoParaComprar(htmlspecialchars($_POST['nombre']), 'Bienvenido!', '//'.$_SERVER['HTTP_HOST'].'/'.$_SESSION['lenguaje'].'cuenta');
                                                                }
                                                                EnviarEmail(htmlspecialchars($_POST['email']), 'Bienvenido!', $msg);
                                                                $_SESSION['datosregistro'] = array();
                                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/good');
                                                        }
                                                    }else{
                                                        header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'registro/dni');
                                                    }
                                                }else{
                                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'registro/ebad1');
                                                }
                                            }else{
                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'registro/ebad');
                                            }
                                        }else{
                                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'registro/ebad');
                                        }
                                    }else{
                                        header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'registro/pbad');
                                    }
				}else{
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'registro/dbad');
                                }
                            }else{
                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'registro/cbad');
                            }
				break;
			case 'salir':		// Logout del usuario.
				if ($_SESSION['usr'] !== null)
				{
					require_once($draiz.'/sistema/mod_usuarios.php');
					UserLogOut();
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
				}
                                else
                                {
                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'');
                                }
				break;
			case 'activar':		// Logout del usuario.
				if ($_GET['activador'] != '')
				{
					require_once($draiz.'/sistema/mod_usuarios.php');
					$act = UserVal($_GET['activador']);
                                        if($act)
                                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/actok');
                                        else
                                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/actko');
				}
				break;
			case 'opinar':		// Logout del usuario.
				if (@$_POST['miopinar'] != null && @$_POST['idp'] != null && @$_SESSION['usr']['id'] != null)
				{
					require_once($draiz.'/sistema/mod_productos.php');
					Opinar($_POST['idp'], $_SESSION['usr']['id'], $_POST['miopinar'], $_SESSION['usr']['nombre']);
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'producto/'.$_POST['idp']);
				}
				break;
			case 'crearpack':		// Logout del usuario.
				if (@$_POST['descripcion'] != null && @$_POST['nombre'] != null)
				{
					require_once($draiz.'/sistema/mod_productos.php');
					if (@$_SESSION['usr'] != null)
						CrearPack($_POST['descripcion'], $_POST['nombre'], $_POST['art'], $_SESSION['usr']['id']);
					else
					{
						if (@$_SESSION['packsses'] == null)
							$_SESSION['packsses'] = array();
						CrearPackSession($_POST['descripcion'], $_POST['nombre'], $_POST['art'], $_SESSION['packsses']);
					}
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'packs');
				}
                break;
            case 'subscribe':
                $suscrito = insertarSuscriptor($_POST['nombre'], $_POST['email']);
            break;
			case 'anadir':		// Añadir producto al carrito.
                            require_once($draiz.'/sistema/mod_cestaycompra.php');
                            $sepuedeAnadir = 'Si';
                            $faltaAtr = '';
                            
                            if($Empresa['cestaU'] == 1 || CondicionesEspeciales($_GET['addcart'], $_SESSION['usr']['id'], $_POST['financiacion'])){
                                
                                if(isset($_GET['afiliado'])){
                                    $afiliado = $_GET['afiliado'];
                                }else{
                                    $afiliado = "";
                                }
                                    
                                if(isset($_POST['financiacion'])){
                                    $idcuota = $_POST['financiacion'];
                                }else{
                                    $idcuota = 0;
                                }
                                    
                                if($_GET['addcart'] != '' && $_SESSION['usr'] != null)
				{
                                    $sql = "SELECT * FROM bd_atributo_tipo;";
                                    $query = mysqli_query($dbi, $sql);
                                    $atributos = null;
                                    $fechas = null; 
                                    
                                    while ($assoc = mysqli_fetch_assoc($query))
                                    {
                                        $nom = str_replace(" ", "_", preg_replace("[^A-Za-z0-9]", "", $assoc['atributo']));
                                        if ($_POST[$nom] != ''){
                                            $atributos .= $_POST[$nom].' - ';
                                        }
                                        
                                        if($assoc['obligatorio2'] == 'Si' && $_POST[$nom] == ''){
                                            $sqlPosibles = "SELECT id FROM bd_atributo WHERE tipoid = '".$assoc['id']."'";
                                            $queryPosibles = mysqli_query($dbi, $sqlPosibles);
                                            $posibilidades = '0';
                                            while ($assocPosibles = mysqli_fetch_assoc($queryPosibles)){
                                                $posibilidades .= ', '.$assocPosibles['id'];
                                                
                                            }
                                            
                                            $sqlContenido = "SELECT * FROM bd_producto_atributo WHERE idatributo IN (".$posibilidades.") AND idproducto ='".$_GET['addcart']."'";
                                            $queryContenido = mysqli_query($dbi, $sqlContenido);
                                            if(mysqli_num_rows($queryContenido) > 0){
                                                $sepuedeAnadir = 'No';
                                                if($faltaAtr == ''){
                                                    $faltaAtr .= $nom;
                                                }else{
                                                    $faltaAtr .= ' - ';
                                                    $faltaAtr .= $nom;
                                                }  
                                            }
                                        }
                                    }
                                    
                                    if($_POST['fentrada'] != ""){
                                        $fechas .= $_POST['fentrada'].' - ';
                                    }
                                    
                                    if($_POST['fsalida'] != ""){
                                        $fechas .= $_POST['fsalida'];
                                    }
                                    
                                    $atributos = substr($atributos, 0, -3);
                                    
                                    if(isset($_GET['cantidad']))
                                        $cantidad = $_GET['cantidad'];
                                    else
                                        $cantidad = $_POST['cantidadmuliselect'];
                                    
                                    if(estaDisponibleAnadir($_GET['addcart'])){
                                        if($sepuedeAnadir == 'Si'){
                                            $resultaddc = CestaAddProduct($_GET['addcart'], $_SESSION['usr']['id'], $atributos, $fechas, $idcuota, strtoupper(str_replace('/', '-', $_POST['color'])), strtoupper($_POST['tunombre']), strtoupper($_POST['tunumero']), $cantidad, $afiliado, false);
                                            $sql = "SELECT * FROM bd_productos WHERE id = $_GET[addcart];";
                                            $query2 = mysqli_query($dbi, $sql);
                                            $assoc2 = mysqli_fetch_assoc($query2);
                                            if($Empresa['dPedido'] == 0){
                                                if($assoc2['precio'] == 0){
                                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'producto/'.$_GET['addcart'].($resultaddc > 0 ? '/yesp' : ''));
                                                }else{
                                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'producto/'.$_GET['addcart'].($resultaddc > 0 ? '/yes' : ''));
                                                }
                                            }else{
                                                $_SESSION['compra']['paso'] = 0;
                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'pedido');
                                            }
                                        }else{
                                             header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'producto/'.$_GET['addcart'].'/not/'.str_replace($no_permitidas, $permitidas , $faltaAtr));
                                        }
                                    }else{
                                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'producto/'.$_GET['addcart'].'/notp/');
                                    }
					
				}
				else if ($_GET['addcart'] != '')
				{
                                    
					if (@$_SESSION['cestases'] == null)
						$_SESSION['cestases'] = array();
                                        
                                        $sql = "SELECT * FROM bd_atributo_tipo;";
                                        $query = mysqli_query($dbi, $sql);
                                        $atributos = null;
                                        $fechas = null;
                                        while ($assoc = mysqli_fetch_assoc($query))
                                        {
                                            $nom = str_replace(" ", "_", preg_replace("[^A-Za-z0-9]", "", $assoc['atributo']));
                                            if ($_POST[$nom] != ''){
                                                $atributos .= $_POST[$nom].' - ';
                                            }
                                            if($assoc['obligatorio2'] == 'Si' && $_POST[$nom] == ''){
                                                $sqlPosibles = "SELECT id FROM bd_atributo WHERE tipoid = '".$assoc['id']."'";
                                                $queryPosibles = mysqli_query($dbi, $sqlPosibles);
                                                $posibilidades = '0';
                                                while ($assocPosibles = mysqli_fetch_assoc($queryPosibles)){
                                                    $posibilidades .= ', '.$assocPosibles['id'];

                                                }

                                                $sqlContenido = "SELECT * FROM bd_producto_atributo WHERE idatributo IN (".$posibilidades.") AND idproducto ='".$_GET['addcart']."'";
                                                $queryContenido = mysqli_query($dbi, $sqlContenido);
                                                if(mysqli_num_rows($queryContenido) > 0){
                                                    $sepuedeAnadir = 'No';
                                                    if($faltaAtr == ''){
                                                        $faltaAtr .= $nom;
                                                    }else{
                                                        $faltaAtr .= ' - ';
                                                        $faltaAtr .= $nom;
                                                    }              
                                                }
                                            }
                                        }
                                        if($_POST['fentrada'] != ""){
                                            $fechas .= $_POST['fentrada'].' - ';
                                        }

                                        if($_POST['fsalida'] != ""){
                                            $fechas .= $_POST['fsalida'];
                                        }
                                    
                                        $atributos = substr($atributos, 0, -3);
                                        
                                        if(isset($_GET['cantidad']))
                                            $cantidad = $_GET['cantidad'];
                                        else
                                            $cantidad = $_POST['cantidadmuliselect'];
					
                                        if(estaDisponibleAnadir($_GET['addcart'])){
                                            if($sepuedeAnadir == 'Si'){
                                                if ($_POST['color'] != ''){
                                                    $resultaddc = CestaSessionAddProduct($_GET['addcart'], session_id(), $atributos, $fechas, $idcuota, strtoupper(str_replace('/', '-', $_POST['color'])), strtoupper($_POST['tunombre']), strtoupper($_POST['tunumero']), $afiliado, $cantidad);
                                                }else{
                                                    $resultaddc = CestaSessionAddProduct($_GET['addcart'], session_id(), $atributos, $fechas, $idcuota, '', strtoupper($_POST['tunombre']), strtoupper($_POST['tunumero']), $afiliado, $cantidad);
                                                }
                                                if($Empresa['dPedido'] == 0){
                                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'producto/'.$_GET['addcart'].($resultaddc > 0 ? '/yes' : ''));
                                                }else{
                                                    $_SESSION['compra']['paso'] = 0;
                                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'pedido');
                                                }
                                            }else{
                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'producto/'.$_GET['addcart'].'/not/'.$faltaAtr);
                                            }
                                        }else{
                                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'producto/'.$_GET['addcart'].'/notp/');
                                        }
				}
				else
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
                            }else{
                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'producto/'.$_GET['addcart']. '/no');
                            }
			break;
			case 'anadirv':		// Añadir producto al carrito.
				require_once($draiz.'/sistema/mod_productos.php');
				
				if ($_GET['addcart'] != '')
				{
					if ($_SESSION['usr'] != null)
					{
						require_once($draiz.'/sistema/mod_cestaycompra.php');
						$packidins = CestaAddProductPack($_GET['addcart'], $_SESSION['usr']['id'], 'null', 'null', 'null', 1);
						foreach ($_SESSION['packconfigurator']['productos'] AS $producto)
							CestaAddProductPack($producto['id'], $_SESSION['usr']['id'], $producto['pertalla'], $producto['pernombre'], $producto['perbandera'], 1, $packidins);
						header('Location: '.$draizp.'/cesta');
					}
					else
					{
						require_once($draiz.'/sistema/mod_cestaycompra.php');
						$packidins = CestaSessionAddProductPack($_GET['addcart'], $_SESSION['usr']['id'], 'null', 'null', 'null', 1);
						foreach ($_SESSION['packconfigurator']['productos'] AS $producto)
							CestaSessionAddProductPack($producto['id'], $_SESSION['usr']['id'], $producto['pertalla'], $producto['pernombre'], $producto['perbandera'], 1, $_GET['addcart']);
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cesta');
					}
				}
				else
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
				break;
			case 'actualizar':		// Quitar producto al carrito.
				if ($_GET['prodact'] != '')
				{
					if ($_POST['cantidad'] > 0 && $_POST['cantidad'] < 100)
					{
						require_once($draiz.'/sistema/mod_cestaycompra.php');
						if ($_SESSION['usr'] != null)
							CestaActProduct($_GET['prodact'], $_POST['cantidad'], $_POST['htalla'], $_POST['hcolor'], $_SESSION['usr']['id']);
						else
							CestaSessionActProduct($_GET['prodact'], $_POST['cantidad'], $_POST['htalla'], $_POST['hcolor'], $_SESSION['cestases']);
					}
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cesta');
				}
				break;
			case 'actualizarp':		// Quitar producto al carrito.
				if ($_GET['prodact'] != '')
				{
					if ($_POST['cantidad'] > 0 && $_POST['cantidad'] < 100)
					{
						require_once($draiz.'/sistema/mod_cestaycompra.php');
						if ($_SESSION['usr'] != null)
							CestaActProduct($_GET['prodact'], $_POST['cantidad'], $_POST['htalla'], $_POST['hcolor'], $_SESSION['usr']['id']);
						else
							CestaSessionActProduct($_GET['prodact'], $_POST['cantidad'], $_POST['htalla'], $_POST['hcolor'], $_SESSION['cestases']);
					}
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'pedido');
				}
				break;
			case 'quitar':		// Quitar producto al carrito.
				if ($_GET['removecart'] != '')
				{
					require_once($draiz.'/sistema/mod_cestaycompra.php');
					
					if (@$_SESSION['usr'] != null){
                                            if($_GET['talla'] == 'nada'){
                                                if($_GET['color'] == 'nada'){
                                                    CestaRemoveProduct($_GET['removecart'], '', '', $_SESSION['usr']['id']);
                                                }else{
                                                    CestaRemoveProduct($_GET['removecart'], '', $_GET['color'], $_SESSION['usr']['id']);
                                                }
                                            }else if($_GET['color'] == 'nada'){
                                                if($_GET['talla'] == 'nada'){
                                                    CestaRemoveProduct($_GET['removecart'], '', '', $_SESSION['usr']['id']);
                                                }else{
                                                    CestaRemoveProduct($_GET['removecart'], $_GET['talla'], '', $_SESSION['usr']['id']);
                                                }
                                             }else{
                                                CestaRemoveProduct($_GET['removecart'], $_GET['talla'], $_GET['color'], $_SESSION['usr']['id']);
                                            }
                                        }else{
                                            if($_GET['talla'] == 'nada'){
                                                if($_GET['color'] == 'nada'){
                                                    CestaSessionRemoveProduct($_GET['removecart'], '', '', $_SESSION['cestases']);
                                                }else{
                                                    CestaSessionRemoveProduct($_GET['removecart'], '', $_GET['color'], $_SESSION['cestases']);
                                                }
                                            }else if($_GET['color'] == 'nada'){
                                                if($_GET['talla'] == 'nada'){
                                                    CestaSessionRemoveProduct($_GET['removecart'], '', '', $_SESSION['cestases']);
                                                }else{
                                                    CestaSessionRemoveProduct($_GET['removecart'], $_GET['talla'], '', $_SESSION['cestases']);
                                                }
                                            }else{
                                                CestaSessionRemoveProduct($_GET['removecart'], $_GET['talla'], $_GET['color'], $_SESSION['cestases']);
                                            }
                                        }
                                        
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cesta');
				}
				break;
                        case 'quitarp':		// Quitar producto al pedido.
				if ($_GET['removecart'] != '')
				{
					require_once($draiz.'/sistema/mod_cestaycompra.php');
					
					if (@$_SESSION['usr'] != null){
                                            if($_GET['talla'] == 'nada'){
                                                if($_GET['color'] == 'nada'){
                                                    CestaRemoveProduct($_GET['removecart'], '', '', $_SESSION['usr']['id']);
                                                }else{
                                                    CestaRemoveProduct($_GET['removecart'], '', $_GET['color'], $_SESSION['usr']['id']);
                                                }
                                            }else if($_GET['color'] == 'nada'){
                                                if($_GET['talla'] == 'nada'){
                                                    CestaRemoveProduct($_GET['removecart'], '', '', $_SESSION['usr']['id']);
                                                }else{
                                                    CestaRemoveProduct($_GET['removecart'], $_GET['talla'], '', $_SESSION['usr']['id']);
                                                }
                                             }else{
                                                CestaRemoveProduct($_GET['removecart'], $_GET['talla'], $_GET['color'], $_SESSION['usr']['id']);
                                            }
                                        }else{
                                            if($_GET['talla'] == 'nada'){
                                                if($_GET['color'] == 'nada'){
                                                    CestaSessionRemoveProduct($_GET['removecart'], '', '', $_SESSION['cestases']);
                                                }else{
                                                    CestaSessionRemoveProduct($_GET['removecart'], '', $_GET['color'], $_SESSION['cestases']);
                                                }
                                            }else if($_GET['color'] == 'nada'){
                                                if($_GET['talla'] == 'nada'){
                                                    CestaSessionRemoveProduct($_GET['removecart'], '', '', $_SESSION['cestases']);
                                                }else{
                                                    CestaSessionRemoveProduct($_GET['removecart'], $_GET['talla'], '', $_SESSION['cestases']);
                                                }
                                            }else{
                                                CestaSessionRemoveProduct($_GET['removecart'], $_GET['talla'], $_GET['color'], $_SESSION['cestases']);
                                            }
                                        }
                                        
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'pedido');
				}
				break;
                        case 'rmafin':
                                if($Empresa['rma'] == 1){
                                    require_once($draiz.'/sistema/mod_cestaycompra.php');
                                    $fecha_pedido = ObtenerFechaCompra($_POST['idrma']);
                                    if(date('m-d-Y', strtotime('- '.$Empresa['rma_dias'].' days')) <= $fecha_pedido){
                                        if($_SESSION['usr'] != null && $_POST['idrma'] != ""){
                                            $dev_rma = GenerarRMA($_POST['idrma']);
                                            if($dev_rma == 1){
                                                require_once($draiz.'/sistema/mod_contacto.php');
                                                $msg = ConstruirMsgRMA(htmlspecialchars('Petición RMA'));
                                                EnviarEmail(htmlspecialchars($Empresa['email']), 'Petición RMA', $msg);
                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'compras/rma_yes');
                                            }else
                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'compras/rma_no');

                                        }else{
                                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'compras/rma_no');
                                        }
                                    }else{
                                        header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'compras/rma_no');
                                    }
                                }else{
                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'compras/rma_no');
                                }
                                break;
                        case 'rmace':
                                require_once($draiz.'/sistema/mod_contacto.php');
                                require_once($draiz.'/sistema/mod_usuarios.php');
                                $admin = EsAdmin($_SESSION['usr']['id']);
                                if($admin){
                                    require_once($draiz.'/sistema/mod_cestaycompra.php');
                                    $datos_rma = ObtenerDatosRMAMail($_GET['id']);
                                    $msg = ConstruirCambioEstadoRMA('Petición RMA', $datos_rma['estado'], $datos_rma['nombre'], $datos_rma['comentario_vend']);
                                    EnviarEmail(htmlspecialchars($datos_rma['email']), 'Petición RMA. Estado Actualizado.', $msg);
                                    header('Location: '.$draizp.'/back/rma.php');
                                }else{
                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje']);
                                }
                                    
                                break;
			case 'enviar':		// Enviar el formulario de contacto.
				if ($_POST['nombre'] != '' && $_POST['telefono'] != '' && $_POST['email'] != '' && $_POST['consulta'] != '' && isset($_POST['checkp']))
				{
					require_once($draiz.'/sistema/mod_contacto.php');
					$campos = FiltrarCampos($_POST['nombre'], $_POST['telefono'], $_POST['email'], $_POST['consulta']);
					$campos['asunto'] = 'Contacto desde '.$Empresa['nombre'];
					$campos['mensaje'] = ConstruirMsg($campos['nombre'], $campos['telefono'], $campos['email'], $campos['consulta'], $campos['asunto']);
					$a = EnviarEmail($campos['para'], $campos['asunto'], $campos['mensaje']);
					$b = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
					
					if ($a && $b)
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'contacto/well');
					else
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'contacto/bad');
				}
				break;
                        case 'enviarPre':		// Enviar el formulario de contacto.
				if ($_POST['consulta_pre'] != '' && isset($_POST['checkp']))
				{
					require_once($draiz.'/sistema/mod_contacto.php');
					$campos = FiltrarCampos2($_POST['consulta_pre']);
					$campos['asunto'] = 'Presupuesto desde '.$Empresa['nombre'];
					if($_SESSION['usr'] != null){
                        $campos['mensaje'] = ConstruirMsgPresManual($campos['consulta'], $campos['asunto'], $_SESSION['usr']['nombre']);
                    }else{
                        $campos['mensaje'] = ConstruirMsgPresManual($campos['consulta'], $campos['asunto'], '');
                    }
					$b = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
                                        
                                        if($_SESSION['usr'] != null){
                                            GuardarPresupuestoManual($campos['consulta'], $_SESSION['usr']['id'], date("Y-m-d H:i:s"));
                                        }else{
                                            GuardarPresupuestoManual($campos['consulta'], 0, date("Y-m-d H:i:s"));
                                        }
					
					if ($b)
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'presupuesto_cont/well');
					else
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'presupuesto_cont/bad');
				}else{
                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'presupuesto_cont/bad');
                                }
				break;
            case 'enviarpresupuesto':		// Enviar el formulario de contacto.
				if ($_POST['nombre'] != '' && $_POST['telefono'] != '' && $_POST['email'] != '' && $_POST['consulta'] != '' && isset($_POST['checkp']))
				{
                    $datos = '<hr><h3>Productos a presupuestar</h3>';
                    for($i=0;$i<$_POST['total'];$i++){
                        $num = 'prod'.$i;
                        $datos .= '<p><b>Producto:</b> '.$_POST[$num].'</p>';
                        $num = 'can'.$i;
                        $datos .= '<p><b>Cantidad:</b> '.$_POST[$num];
                        $num = 'atr'.$i;
                        $datos .= ' '.$_POST[$num].'</p>';
                    }
                    $datos .= '</body></html>';
					require_once($draiz.'/sistema/mod_contacto.php');
					$campos = FiltrarCamposPresupuesto($_POST['empresa'], $_POST['nombre'], $_POST['poblacion'], $_POST['telefono'], $_POST['fax'], $_POST['email'], $_POST['consulta']);
					$campos['asunto'] = 'Presupuesto para '.$_POST['empresa'];
					$campos['mensaje'] = ConstruirMsgPresupuesto($campos['empresa'], $campos['nombre'], $campos['poblacion'], $campos['telefono'], $campos['fax'], $campos['email'], $campos['consulta'], $campos['asunto']);
                    $mensaje = $campos['mensaje'];
                    $mensaje .= $datos;
					//$a = EnviarEmail($campos['para'], $campos['asunto'], $campos['mensaje']);
					$b = EnviarEmailPresupuesto('josefrancisco@camaltec.es', $campos['asunto'], $mensaje, $campos['para']);
					
                    //$limpiar = PresupuestoRemove($_SESSION['usr']['id']);
                    
					if ($b)
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje']);
                    else
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje']);
				}else
                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'error');
				break;
			case 'pedido':	// Pasos para la compra de los productos.
                                require_once($draiz.'/sistema/mod_cestaycompra.php');
                                if ($_SESSION['usr'] != null)
                                        $cesta = Cesta($_SESSION['usr']['id']);
                                else
                                        $cesta = CestaSession($_SESSION['cestases']);
                                guardarEstadoPC('pedido',$cesta);
                                
				$_SESSION['compra']['paso'] = 0;
				header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'pedido');
				break;
			case 'datos_personales':
				$_SESSION['compra']['paso'] = 1;
				header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'datos_personales');
				break;
			case 'pago':
				if (isset($_POST['registrar']))
				{
                                $_SESSION['datosregistro'] = array(
                                    "nombre" => $_POST['nombre'],
                                    "apellidos" => $_POST['apellidos'],
                                    "email" => $_POST['email'],
                                    "cemail" => $_POST['cemail'],
                                    "telefono" => $_POST['telefono'],
                                    "direccion" => $_POST['direccion'],
                                    "dni" => $_POST['dni'],
                                    "cp" => $_POST['cp'],
                                    "localidad" => $_POST['localidad'],
                                    "provincia" => $_POST['provincia'],
                                    "pais" => $_POST['pais'],
                                    "tipoC" => $_POST['tipoC'],
                                    "tipoD" => $_POST['tipoD'],
                                    "rsocial" => $_POST['rsocial']
                                );
                                 
                                    if(isset($_POST['checkp'])){ 
					if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['password']) && isset($_POST['rpassword'])
                                            && isset($_POST['email']) && isset($_POST['cemail']) && isset($_POST['telefono']) && isset($_POST['direccion']) 
                                            && isset($_POST['dni']) &&  isset($_POST['cp']) && isset($_POST['localidad']) && isset($_POST['provincia']) && isset($_POST['pais']) 
                                            && $_POST['nombre'] != '' && $_POST['apellidos'] != '' && $_POST['password'] != '' && $_POST['rpassword'] != ''
                                            && $_POST['email'] != '' && $_POST['cemail'] != '' && $_POST['telefono'] != '' && $_POST['direccion'] != ''
                                            && $_POST['dni'] != '' && $_POST['cp'] != '' && $_POST['localidad'] != '' && $_POST['provincia'] != '' && $_POST['pais'] != '')
					{ 
                                            if(strcmp($_POST['password'], $_POST['rpassword']) == 0){
                                                if(strcmp($_POST['email'], $_POST['cemail']) == 0){ 
                                                    //Validar email
                                                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { 
                                                    //Comprobar que email no existe
                                                        $query = mysqli_query($dbi, 'SELECT email FROM bd_users WHERE email = "'.$_POST['email'].'"');
                                                        if(mysqli_num_rows($query) == 0){ 
                                                        //Validar DNI, CIF, PASAPORTE, NIE
                                                            require_once($draiz.'/sistema/mod_varios.php');
                                                            $validacionDNI = validarDNI($_POST['dni'], $_POST['tipoC'], $_POST['tipoD']);
                                                            if($validacionDNI == '1'){
                                                                require_once($draiz.'/sistema/mod_usuarios.php');
                                                                $uid = UserSigIn($_POST['nombre'].' '.$_POST['apellidos'], $_POST['password'], $_POST['email'], $_POST['telefono'],
                                                                          $_POST['direccion'], $_POST['dni'], $_POST['cp'], $_POST['localidad'], $_POST['provincia'], $_POST['pais'], $_POST['tipoC'],
                                                                        $_POST['tipoD'], $_POST['rsocial']);

                                                                if ($uid == -1)
                                                                        header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'datos_personales');
                                                                else
                                                                {
                                                                        require_once($draiz.'/sistema/mod_contacto.php');
                                                                        require_once($draiz.'/sistema/mod_cestaycompra.php');
                                                                        //UserVal($uid);
                                                                        if($Empresa['registro'] == 2){
                                                                            $msg = ConstruirMsgRegistrado(htmlspecialchars($_POST['nombre']), 'Bienvenido!', '//'.$_SERVER['HTTP_HOST'].'/acc/activar/'.$uid);
                                                                        }else{
                                                                            $msg = ConstruirMsgRegistradoParaComprar(htmlspecialchars($_POST['nombre']), 'Bienvenido!', '//'.$_SERVER['HTTP_HOST'].'/'.$_SESSION['lenguaje'].'cuenta');
                                                                            UserLogIn($_POST['email'], $_POST['password']);
                                                                        }
                                                                        EnviarEmail(htmlspecialchars($_POST['email']), 'Bienvenido!', $msg);
                                                                        $_SESSION['datosregistro'] = array();
                                                                        if($Empresa['registro'] == 2){
                                                                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta/good');
                                                                            exit;
                                                                        }
                                                                        if ($_SESSION['cestases'] != null && $_SESSION['usr'] != null)
                                                                        {
                                                                                CestaSessionACestaUsuario($_SESSION['usr']['id'], $_SESSION['cestases']);
                                                                        }
                                                                        $_SESSION['compra']['paso'] = 2;
                                                                        $_SESSION['compra']['entrega'] = array(
                                                                                        'nombre' => $_POST['nombre'],
                                                                                        'dni' => $_POST['dni'],
                                                                                        'telefono' => $_POST['telefono'],
                                                                                        'email' => $_POST['email'],
                                                                                        'direccion' => $_POST['direccion'],
                                                                                        'pais' => Pais($_POST['pais']),
                                                                                        'provincia' => Provincia($_POST['provincia']),
                                                                                        'paisid' => $_POST['pais'],
                                                                                        'provinciaid' => $_POST['provincia'],
                                                                                        'localidad' => $_POST['localidad'],
                                                                                        'cp' => $_POST['cp'],
                                                                                        'provinciaid' => $_POST['provincia'],
                                                                                        'nombreE' => $_POST['nombre'],
                                                                                        'direccionE' => $_POST['direccion'],
                                                                                        'paisE' => Pais($_POST['pais']),
                                                                                        'provinciaE' => Provincia($_POST['provincia']),
                                                                                        'paisidE' => $_POST['pais'],
                                                                                        'localidadE' => $_POST['localidad'],
                                                                                        'cpE' => $_POST['cp'],
                                                                                        'provinciaidE' => $_POST['provincia']
                                                                                );
                                                                }
                                                            }else{
                                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'datos_personales/dni');
                                                                exit;
                                                            }
                                                        }else{
                                                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'datos_personales/ebad1');
                                                            exit;
                                                        }
                                                    }else{
                                                        header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'datos_personales/ebad');
                                                        exit;
                                                    }
                                                }else{
                                                    header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'datos_personales/ebad');
                                                    exit;
                                                }
                                            }else{
                                                header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'datos_personales/pbad');
                                                exit;
                                            }
					}else{
						header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'datos_personales/dbad');
                                                exit;
                                        }
                                    }else{
                                        header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'datos_personales/cbad');
                                        exit;
                                    }
				}else{                               

				$_SESSION['compra']['paso'] = 2;
				$_SESSION['compra']['entrega'] = array(
						'nombre' => $_POST['nombre'],
						'dni' => $_POST['dni'],
						'telefono' => $_POST['telefono'],
						'email' => $_POST['email'],
						'direccion' => $_POST['direccion'],
						'pais' => Pais($_POST['pais']),
						'provincia' => Provincia($_POST['provincia']),
						'paisid' => $_POST['pais'],
						'provinciaid' => $_POST['provincia'],
						'localidad' => $_POST['localidad'],
						'cp' => $_POST['cp'],
						'provinciaid' => $_POST['provincia'],
                        'nombreE' => !empty($_POST['nombreE']) ? $_POST['nombreE'] : $_POST['nombre'],
                        'direccionE' => !empty($_POST['direccionE']) ? $_POST['direccionE'] : $_POST['direccion'],
						'paisE' => !empty($_POST['paisE']) ? Pais($_POST['paisE']): Pais($_POST['pais']),
						'provinciaE' => !empty($_POST['provinciaE']) ? Provincia($_POST['provinciaE']) : Provincia($_POST['provincia']),
                        'paisidE' => !empty($_POST['paisE']) ? $_POST['paisE'] : $_POST['pais'],
						'localidadE' => !empty($_POST['localidadE']) ? $_POST['localidadE'] : $_POST['localidad'],
						'cpE' => !empty($_POST['cpE']) ? $_POST['cpE'] : $_POST['cp'],
                        'provinciaidE' => !empty($_POST['provinciaE']) ? $_POST['provinciaE'] : $_POST['provinciaE']
					);
                                }
				header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'pago');
				break;
            case 'onepagecheckout':
                include_once ('secciones/new_purchase_process/onepagefunctions.php');
                
                
                //Establecemos la compra
                onePageCheckOut($_POST['numero'],$_POST['mescad'], $_POST['cvv'], $_POST['pagarcon'], $_POST['nombre'], $_POST['fecha'], $_POST['cvc'], $_POST['nentidad'],$_POST['iban'], $_POST['entidad'],$_POST['oficina'],$_POST['dc'],$_POST['ccc'],$_POST['ccc2'],$_POST['apellidos'],$_POST['dni'],$_POST['importeTotal'],$_POST['nuevopenvio'],$_POST['nuevotransp']);
                //Vamos al pago
                realizarPago($_POST['nuevopenvio'], $_POST['nuevotransp'], $draiz);
            break;
			case 'confirmacion':
				$_SESSION['compra']['paso'] = 3;
				$tarjeta = array(
						'numero' => $_POST['numero'], 
						'caducidad' => $_POST['mescad'].'/'.$_POST['mescad'], 
						'cvv' => $_POST['cvv']
					);
				//$_SESSION['domiciliacion'] = null;
				switch ($_POST['pagarcon'])
				{
					case 'tar':
						$pagarocon = 'TARJETA';
                        $_SESSION['domiciliacion'] = null;
						break;
					case 'pay':
						$pagarocon = 'PAYPAL';
                        $_SESSION['domiciliacion'] = null;
						break;
					case 'ccc':
						$pagarocon = 'TRANSFERENCIA';
                        $_SESSION['domiciliacion'] = null;
						break;
					case 'cre':
						$pagarocon = 'CONTRAREEMBOLSO';
                        $_SESSION['domiciliacion'] = null;
						break;
                                        case 'tpv':
						$pagarocon = 'TARJETA';
                        $_SESSION['tarjeta'] = array(
                            'nombre' => $_POST['nombre'],
                            'numero' => $_POST['numero'],
                            'fecha' => $_POST['fecha'],
                            'cvc' => $_POST['cvc']
                        );
						break;
                                        case 'dom':
						$pagarocon = 'DOMICILIACIÓN';
                        $_SESSION['domiciliacion'] = array(
                            'nentidad' => $_POST['nentidad'],
                            'iban' => $_POST['iban'],
                            'entidad' => $_POST['entidad'],
                            'oficina' => $_POST['oficina'],
                            'dc' => $_POST['dc'],
                            'ccc' => $_POST['ccc'],
                            'ccc2' => $_POST['ccc2']
                        );
						break;
                                        case 'domm':
						$pagarocon = 'DOMICILIACIÓN SUBSCRIPCIÓN';
                        $_SESSION['domiciliacion'] = array(
                            'nentidad' => $_POST['nentidad'],
                            'iban' => $_POST['iban'],
                            'entidad' => $_POST['entidad'],
                            'oficina' => $_POST['oficina'],
                            'dc' => $_POST['dc'],
                            'ccc' => $_POST['ccc'],
                            'ccc2' => $_POST['ccc2']
                        );
						break;
                                        case 'fdir':
						$pagarocon = 'FINANCIACIÓN DIRECTA';
                        $_SESSION['domiciliacion'] = array(
                            'nentidad' => $_POST['nentidad'],
                            'iban' => $_POST['iban'],
                            'entidad' => $_POST['entidad'],
                            'oficina' => $_POST['oficina'],
                            'dc' => $_POST['dc'],
                            'ccc' => $_POST['ccc'],
                            'ccc2' => $_POST['ccc2']
                        );
						break;
                                         case 'paym':
						$pagarocon = 'PAYPAL SUBSCRIPCIÓN';
                        $_SESSION['domiciliacion'] = null;
						break;
                                        case 'tie':
						$pagarocon = 'EN TIENDA';
                        $_SESSION['domiciliacion'] = null;
						break;
                                        case 'fapl':
						$pagarocon = 'FINANCIACIÓN APLAZAME';
                        $_SESSION['domiciliacion'] = null;
                                                break;
                        $_SESSION['domiciliacion'] = null;
						break;
					default:
						$pagarocon = 'ERROR';
                        $_SESSION['domiciliacion'] = null;
						break;
				}
                $_SESSION['compra']['pago'] = array(
                    'nombre' => $_POST['nombre'],
                    'apellidos' => $_POST['apellidos'],
                    'dni' => $_POST['dni'],
                    'pago' => $pagarocon,
                    'pagov' => $_POST['pagarcon'],
                    'tarjeta' => $tarjeta
                );
					 
                if(isset($_POST['importeTotal'])){
                    $_SESSION['compra']['pago']['importe'] = $_POST['importeTotal'];//Variables de onepagecheckout
                }
                if(isset($_POST['nuevopenvio'])){
                    $_SESSION['compra']['pago']['penvio'] = $_POST['nuevopenvio'];//Variables de onepagecheckout
                }
                if(isset($_POST['nuevotransp'])){
                    $_SESSION['compra']['pago']['transp'] = $_POST['nuevotransp'];//Variables de onepagecheckout
                }
				header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'confirmacion');
				break;
			case 'realizar_pago':
                if(isset($_SESSION['compra']['pago']['penvio']))
                    $penvio = $_SESSION['compra']['pago']['penvio'];
                else
                    $penvio = $_POST[penvio];
                if(isset($_SESSION['compra']['pago']['transp']))
                    $transp = $_SESSION['compra']['pago']['transp'];
                else
                    $transp = $_POST[transp];
                $penvio = floatval($penvio);

				$_SESSION['compra']['paso'] = 4;
				require_once($draiz.'/sistema/mod_cestaycompra.php');
				
				if ($_SESSION['compra']['pago']['pagov'] == 'ccc')
					PagarConTransferencia($penvio, $transp);
				else if ($_SESSION['compra']['pago']['pagov'] == 'cre')
					PagarContraReembolso($penvio, $transp);
                                else if ($_SESSION['compra']['pago']['pagov'] == 'tie')
					PagarEnTienda();
                                else if ($_SESSION['compra']['pago']['pagov'] == 'tpv')
					PagarTarjetaSinTPV($penvio, $transp);
                                else if ($_SESSION['compra']['pago']['pagov'] == 'dom')
					PagarDomiciliacion($penvio, $transp);
                                else if ($_SESSION['compra']['pago']['pagov'] == 'domm')
					PagarDomiciliacionM($penvio, $transp);
                                else if ($_SESSION['compra']['pago']['pagov'] == 'fdir')
					PagarDomiciliacionFD($penvio, $transp);
				else if ($_SESSION['compra']['pago']['pagov'] == 'tar')
					PagarConTarjetaTPV($penvio, $transp);
                                else if ($_SESSION['compra']['pago']['pagov'] == 'paym')
					PagarConPaypalS($penvio, $transp);
                                else if ($_SESSION['compra']['pago']['pagov'] == 'fapl')
					PagarConAplazame($penvio, $transp);
				else
					PagarConPaypal($penvio, $transp);
				break;
			case 'pagook':
				if (isset($_GET['uid']) && isset($_GET['ses']) && isset($_GET['secreto']) && isset($_GET['fpago']))
				{
                                    require_once('./componentes/redsys/apiRedsys.php');
                                    
                                    $miObj = new RedsysAPI;
                                    
                                    $version = $_POST['Ds_SignatureVersion'];
                                    $params = $_POST['Ds_MerchantParameters'];
                                    $signature = $_POST['Ds_Signature'];
                                    
                                    $decodec = $miObj->decodeMerchantParameters($params);
                                    
                                    $codigoRespuesta = $miObj->getParameter('Ds_Response');
                                    
                                    $sqlBK = "SELECT kc FROM bd_empresa WHERE id=1";
                                    $queryBK = mysqli_query($dbi, $sqlBK);
                                    $assocBK = mysqli_fetch_assoc($queryBK);
                
                                    $signatureCalculada = $miObj->createMerchantSignatureNotif($assocBK['kc'], $params);
                                        
                                   
                                    
                                    if($signatureCalculada == $signature){
                                        if(intval($codigoRespuesta) >= 0 && intval($codigoRespuesta) <= 99){
                                            require_once($draiz.'/sistema/mod_cestaycompra.php');
                                            $_SESSION['compra']['paso'] = 5;
                                            $pagoF = $_GET['fpago'] == 'tpv' ? 'tpv virtual' : 'paypal';
                                            $_SESSION['factura'] = RealizarCompra($_GET['uid'], $_GET['secreto'], $pagoF);
                                            $_SESSION['fsecreto'] = $_GET['secreto'];
                                            CerrarConexion();
                                            exit;
                                        }else{
                                            exit;
                                        }
                                    }else{
                                        exit;
                                    }
                                    
					
				}
				break;
                        case 'pagook2': 
                                
				if (isset($_GET['uid']) && isset($_GET['ses']) && isset($_GET['secreto']) && isset($_GET['fpago']))
				{
                                        $request = json_decode( file_get_contents('php://input') );
                                        
                                        $orderId = $request->checkout_token;
                                       
                                        //Si existe la compra pendiente ($orderId) true, sino error. Si true, entonces procesar el pedido aquí
                                        if($orderId == $_GET['secreto'])
                                            $order = true;
                                        else
                                            $order = false;
                                        
                                        if( !$order ) {
                                            http_response_code(404);
                                            return;
                                        }

                                        $sql = "SELECT aplazamePrK FROM bd_empresa WHERE id = 1;";
                                        $query1 = mysqli_query($dbi, $sql);
                                        $clavePri = mysqli_fetch_array($query1);
                                        
                                        $request = json_decode( file_get_contents('php://input') );
                                        $orderId = $request->checkout_token;

                                        $order = true;
                                        if( !$order ) {
                                            http_response_code(404);
                                            return;
                                        }else{
                                            require_once($draiz.'/sistema/mod_cestaycompra.php');
                                            $_SESSION['compra']['paso'] = 5;
                                            $pagoF = $_GET['fpago'] == 'aplazame' ? 'aplazame' : 'error';
                                            $_SESSION['factura'] = RealizarCompra($_GET['uid'], $_GET['secreto'], $pagoF);
                                            $_SESSION['fsecreto'] = $_GET['secreto'];
                                        }
                                        
                                        /*echo "POST /orders/:".$orderId."/authorize HTTP/1.1
                                        Accept: application/vnd.aplazame.v1+json
                                        Authorization: Bearer ".$clavePri['aplazamePrK']."
                                        Host: api.aplazame.com";
                                        
                                        http_response_code(204);*/
                                        
                                        $ch = curl_init();
 
                                        // definimos la URL a la que hacemos la petición
                                        curl_setopt($ch, CURLOPT_URL,"https://api.aplazame.com/orders/".$orderId."/authorize");
                                        // indicamos el tipo de petición: POST
                                        curl_setopt($ch, CURLOPT_POST, TRUE);
                                        // definimos cada uno de los parámetros
                                        //curl_setopt($ch, CURLOPT_POSTFIELDS, "Accept=application/vnd.aplazame.v1+json&Authorization=Bearer".$clavePri['aplazamePrK']);
                                        $data = array("Accept" => "application/vnd.aplazame.v1+json", "Authorization" => "Bearer ".$clavePri['aplazamePrK']);
                                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                                        // recibimos la respuesta y la guardamos en una variable
                                       // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        $remote_server_output = curl_exec ($ch);

                                        // cerramos la sesión cURL
                                        curl_close ($ch);

					CerrarConexion();
                                        exit;
				}
				break;
			case 'pagook3':
                                require_once($draiz.'/sistema/mod_cestaycompra.php');
                                
                                 // Primera comprobación. Cerraremos este if más adelante
                                if($_POST){
                                    // Obtenemos los datos en formato variable1=valor1&variable2=valor2&...
                                    $raw_post_data = file_get_contents('php://input');

                                    // Los separamos en un array
                                    $raw_post_array = explode('&',$raw_post_data);

                                    // Separamos cada uno en un array de variable y valor
                                    $myPost = array();
                                    foreach($raw_post_array as $keyval){
                                        $keyval = explode("=",$keyval);
                                        if(count($keyval) == 2)
                                            $myPost[$keyval[0]] = urldecode($keyval[1]);
                                    }

                                    // Nuestro string debe comenzar con cmd=_notify-validate
                                    $req = 'cmd=_notify-validate';
                                    if(function_exists('get_magic_quotes_gpc')){
                                        $get_magic_quotes_exists = true;
                                    }
                                    foreach($myPost as $key => $value){
                                        // Cada valor se trata con urlencode para poder pasarlo por GET
                                        if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                                            $value = urlencode(stripslashes($value)); 
                                        } else {
                                            $value = urlencode($value);
                                        }

                                        //Añadimos cada variable y cada valor
                                        $req .= "&$key=$value";
                                    }
                                    
                                    $ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');   // Esta URL debe variar dependiendo si usamos SandBox o no. Si lo usamos, se queda así.
                                    //$ch = curl_init('//www.paypal.com/cgi-bin/webscr');         // Si no usamos SandBox, debemos usar esta otra linea en su lugar.
                                    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                                    curl_setopt($ch, CURLOPT_POST, 1);
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
                                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
                                    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
                                    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));

                                    if( !($res = curl_exec($ch)) ) {
                                        // Ooops, error. Deberiamos guardarlo en algún log o base de datos para examinarlo después.
                                        curl_close($ch);
                                        exit;
                                    }
                                    curl_close($ch);
                                    if (strcmp ($res, "VERIFIED") == 0) {    
                                        if($_POST["payment_status"] == 'Completed'){
                                                    $_SESSION['compra']['paso'] = 5;
                                                    $pagoF = 'paypal';
                                                    $_SESSION['factura'] = RealizarCompra($_GET['uid'], $_GET['secreto'], $pagoF);
                                                    $_SESSION['fsecreto'] = $_GET['secreto'];
                                                    
                                                    require_once($draiz.'/sistema/mod_cestaycompra.php');   
                                                    require_once($draiz.'/sistema/mod_contacto.php');
                                                    $_SESSION['factura'] = Factura($_GET['secreto'], $_GET['uid']);
                                                    $pagoF = 'Paypal';
                                                    
                                                    $sqluser = "SELECT nombre, email FROM bd_users WHERE id = '".$_GET['uid']."'";
                                                    $queryuser = mysqli_query($dbi, $sqluser);
                                                    $user = mysqli_fetch_assoc($queryuser);
                                                    
                                                    $campos['asunto'] = 'Pago mediante '.$pagoF.' para compra en '.$Empresa['nombre'];
                                                    
                                                    $campos['mensaje'] = ConstruirMsgCompraPaypal($_GET['uid'], $user['nombre'], $campos['asunto'], ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['factura']['total']), $_GET['secreto'], $pagoF);
                                                    $a = EnviarEmail($user['email'], $campos['asunto'], $campos['mensaje']);

                                                    $campos['asunto'] = 'Nueva venta realizada mediante '.$pagoF;
                                    
                                                    $pago = 'paypal';
                                                    $campos['mensaje'] = ConstruirMsgPaypalVenta($user['nombre'], $campos['asunto'], $_SESSION['factura']['total'], $_GET['secreto']);
                                    
                                                    $a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
                                    
                                    
                                   /*if($_SESSION['compra']['afiliadopaypal'] != ''){  
                                        $sqlpais = "SELECT email FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                                        $query = mysqli_query($dbi, $sqlpais);
                                        if (mysqli_num_rows($query) > 0){
                                            $assoc = mysqli_fetch_assoc($query);
                                            if($assoc['email'] != ''){
                                                $campos['mensaje'] = AvisarDeCompraAGestionarAfil($pago, $secreto, $Empresa['url']);
                                                $a = EnviarEmail($assoc['email'], $campos['asunto'], $campos['mensaje']);       
                                            }
                                        }
                                    }*/
                                    
                                                    CerrarConexion();
                                        }        
                                    }
                                }
                                        exit;
			case 'return':
				if (isset($_GET['uid']) && isset($_GET['ses']) && isset($_GET['secreto']))
				{
					$factura = '';
					if (isset($_SESSION['factura']))
					{
						$factura = '/'.$_SESSION['fsecreto'];
						unset($_SESSION['factura']);
						unset($_SESSION['fsecreto']);
					}
					
					unset($_SESSION['compra']);
					
					header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'finalizado'.$factura);
				}
				break;
                        case 'return2':
                       
				if (isset($_GET['uid']) && isset($_GET['ses']) && isset($_GET['secreto']) && isset($_GET['fpago']))
				{
                                    
                        require_once($draiz.'/sistema/mod_cestaycompra.php');   
                        require_once($draiz.'/sistema/mod_contacto.php');
                        $_SESSION['factura'] = RealizarCompra($_GET['uid'], $_GET['secreto'], $_GET['fpago']);
                        if($_GET['fpago'] == 'tpv'){
                            $pagoF = 'TPV Virtual';
                        }else if($_GET['fpago'] == 'aplazame'){
                            $pagoF = 'Aplazame';
                        }else{
                            $pagoF = 'Paypal';
                        }
                        if($pagoF != 'Paypal'){
                            $campos['asunto'] = 'Pago mediante '.$pagoF.' para compra en '.$Empresa['nombre'];
                            $campos['mensaje'] = ConstruirMsgCompra($_SESSION['usr']['nombre'], $campos['asunto'], ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['factura']['total']), $_GET['secreto'], $pagoF);
                            $a = EnviarEmail($_SESSION['usr']['email'], $campos['asunto'], $campos['mensaje']);

                            $campos['asunto'] = 'Nueva venta realizada mediante '.$pagoF;
                            if ($_GET['fpago'] == 'tpv'){
                                $pago = 'tpv';
                                $campos['mensaje'] = ConstruirMsgTPVVenta($_SESSION['usr']['nombre'], $campos['asunto'], $_SESSION['factura']['total'], $_GET['secreto']);
                            }else if ($_GET['fpago'] == 'aplazame'){
                                $pago = 'aplazame';
                                $campos['mensaje'] = ConstruirMsgAplazame($_SESSION['usr']['nombre'], $campos['asunto'], $_SESSION['factura']['total'], $_GET['secreto']);
                            }else{
                                $pago = 'paypal';
                                $campos['mensaje'] = ConstruirMsgPaypalVenta($_SESSION['usr']['nombre'], $campos['asunto'], $_SESSION['factura']['total'], $_GET['secreto']);
                            }
                            $a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
                        }else{
                            //Borrar cesta si ha llegado hasta aquí, se presupone pago ok.
                            $sqlB = "DELETE FROM bd_carrito WHERE idusuario='".$_GET['uid']."'";
                            $queryB = mysqli_query($dbi, $sqlB);
                        }
                        
                        
                        if($_SESSION['compra']['afiliadopaypal'] != ''){  
                            $sqlpais = "SELECT email FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                            $query = mysqli_query($dbi, $sqlpais);
                            if (mysqli_num_rows($query) > 0){
                                $assoc = mysqli_fetch_assoc($query);
                                if($assoc['email'] != ''){
                                    $campos['mensaje'] = AvisarDeCompraAGestionarAfil($pago, $secreto, $Empresa['url']);
                                    $a = EnviarEmail($assoc['email'], $campos['asunto'], $campos['mensaje']);       
                                }
                            }
                        }
                        
                        $factura = '/'.$_GET['secreto'];
                        if($pagoF != 'Paypal'){
                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'finalizado'.$factura);
                        }else{
                            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'finalizado2'.$factura);
                        }
                    }
                break;
				
			default:			// Caso por defecto!
				echo '';
				break;
		}
	}
	else if (isset($_GET['imprimir_fact']) && $_SESSION['usr'] != null)
	{ // Elementos de cesta logueado en página.
        $sql = "SELECT * FROM bd_empresa;";
        $query1 = mysqli_query($dbi, $sql);
        $logo = mysqli_fetch_array($query1);
        
                
        
		require_once($draiz.'/sistema/mod_cestaycompra.php');
                if(isset($_GET['imprimir_fact_adm_uid']))
                    $idfact = $_GET['imprimir_fact_adm_uid'];
                else
                    $idfact = $_SESSION['usr']['id'];
		$_SESSION['factura'] = Factura($_GET['imprimir_fact'], $idfact);
		$_SESSION['factura']['cif'] = $Empresa['cif'];
		$_SESSION['factura']['empresa'] = $Empresa['nombre'];
		$_SESSION['factura']['logo'] = $draiz.'/source/'.$logo[logosup];
		$_SESSION['productos'] = ProductosComprados($_GET['imprimir_fact'], $idfact);
	}
        else if (isset($_GET['imprimir_rma']) && $_SESSION['usr'] != null)
	{ // Elementos de cesta logueado en página.
        
        $sql = "SELECT * FROM bd_empresa;";
        $query1 = mysqli_query($dbi, $sql);
        $logo = mysqli_fetch_array($query1);
        
                
        
		require_once($draiz.'/sistema/mod_cestaycompra.php');
                if(isset($_GET['imprimir_rma']))
                    $idfact = $_GET['imprimir_rma'];
                else
                    $idfact = $_SESSION['usr']['id'];
		$_SESSION['factura'] = RMA_F($_GET['imprimir_rma']);
		$_SESSION['factura']['cif'] = $Empresa['cif'];
		$_SESSION['factura']['empresa'] = $Empresa['nombre'];
		$_SESSION['factura']['logo'] = $draiz.'/source/'.$logo[logosup];
		$_SESSION['productos'] = ProductosRMA($_GET['imprimir_rma']);
	}
	else if (isset($_GET['crearpack']))
	{ // Elementos de cesta logueado en página.
		require_once($draiz.'/sistema/mod_productos.php');
		$productos = Productos(10000, 0, 1, null);
	}
	else if (isset($_GET['cesta']) && ($_SESSION['usr'] != null || $_SESSION['cestases'] != null))
	{ // Elementos de cesta logueado en página.
		require_once($draiz.'/sistema/mod_cestaycompra.php');
                require_once($draiz.'/sistema/mod_productos.php');
		if ($_SESSION['usr'] != null)
			$cesta = Cesta($_SESSION['usr']['id']);
		else
			$cesta = CestaSession($_SESSION['cestases']);
                
                $atrDesglosados = AtributosDesglosados();
	}
        else if (isset($_GET['rma']) && ($_SESSION['usr'] != null))
	{ // Elementos de cesta logueado en página.
		require_once($draiz.'/sistema/mod_cestaycompra.php');
		if ($_GET['rma'] != '')
			$cesta = RMA($_GET['rma']);
	}
    else if (isset($_GET['presupuesto']) && $_SESSION['usr'] != null)
	{ // Elementos de cesta logueado en página.
		require_once($draiz.'/sistema/mod_cestaycompra.php');
		if ($_SESSION['usr'] != null)
			$cesta = Presupuesto($_SESSION['usr']['id']);
	}
	else if (isset($_GET['compras']) && $_SESSION['usr'] != null)
	{ // Elementos de cesta logueado en página.
		require_once($draiz.'/sistema/mod_cestaycompra.php');
		$compras = Compras($_SESSION['usr']['id']);
	}
	else if ((isset($_GET['pedido']) || isset($_GET['datos_personales']) 
			|| isset($_GET['pago']) || isset($_GET['confirmacion'])) && ($_SESSION['usr'] != null || $_SESSION['cestases'] != null))
	{ // Elementos de pedido logueado en página.
            require_once($draiz.'/sistema/mod_cestaycompra.php');
            $pagosEspeciales = PagosEspeciales($_SESSION['usr']['id']);
            $otrosCampos = CargarCampos();
            if(isset($_GET['pedido']))
                $_SESSION['datosregistro'] = array();
		
		if (isset($_GET['datos_personales']))
		{
			$provincias = Provincias();
			$paises = Paises();
                        require_once($draiz.'/sistema/mod_varios.php');
                        $mostraEnvio = MostrarEnvios($_SESSION['usr']['id']);
		}
		
		if (isset($_GET['pedido']) || isset($_GET['confirmacion']))
			if ($_SESSION['usr'] != null)
			{
				$pedido = Cesta($_SESSION['usr']['id']);
			}
			else
			{
				$pedido = CestaSession($_SESSION['cestases']);
			}
                
                if (isset($_GET['pago'])){
                    if($_SESSION['compra']['afiliadopaypal'] != ''){  
                        $sqlpais = "SELECT paypal FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                        $query = mysqli_query($dbi, $sqlpais);
                        if (mysqli_num_rows($query) > 0){
                            $assoc = mysqli_fetch_assoc($query);
                            if($assoc['paypal'] != '')
                                $activoPayDis = 1;
                        }
                    }else{
                        $activoPayDis = 0;
                    }
                }
                        
                if (isset($_GET['confirmacion']))
                    $mostraEnvio = MostrarEnvios($_SESSION['usr']['id']);    
	}
	else if (isset($_GET['cesta']))
	{ // Elementos de cesta en página.
		header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
	}
        else if (isset($_GET['presupuesto_cont']))
	{ // Presupuestos manuales.
            if($Empresa['preSoli'] == 1){
                if($Empresa['preRegis'] == 1){
                    if($_SESSION['usr'] == null){
                        header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
                    }
                }
            }else{
                header('Location: '.$draizp.'/'.$_SESSION['lenguaje']);
            }
		
	}
	else if (isset($_GET['cuenta']) && $_SESSION['usr'] != null)
	{ // Elementos de cuenta logueado en página.
		require_once($draiz.'/sistema/mod_usuarios.php');
		//$provincias = Provincias();
		$paises = Paises();
		$usuario = UserLoadData($_SESSION['usr']['id']);
	}
	else if (isset($_GET['cuenta']))
	{ // Elementos de cuenta en página.
		//$provincias = Provincias();
		$paises = Paises();
	}
        else if (isset($_GET['registro']))
	{ // Elementos de cuenta en página.
		//$provincias = Provincias();
		$paises = Paises();
	}
	else if (isset($_GET['pack']))
	{ // Elementos de productos en página.
		require_once($draiz.'/sistema/mod_productos.php');
		if (is_numeric($_GET['pack']))
			$pack = PackV($_GET['pack']);
		if (isset($_GET['pagina']))
			$_SESSION['packconfigurator']['paso'] = $_GET['pagina'];
		else
			$_SESSION['packconfigurator'] = null;
		
		if ($_SESSION['packconfigurator']['paso'] == 2)
		{
			$_SESSION['packconfigurator']['productos'] = array();
			$paises = PaisesTodos();
			foreach ($_POST['seleccionadogrupos'] AS $producto)
				$_SESSION['packconfigurator']['productos'][] = Producto($producto);
		}
		
		if ($_SESSION['packconfigurator']['paso'] == 3)
		{
			for ($i = 0; $i < count($_SESSION['packconfigurator']['productos']); $i++)
			{
				$_SESSION['packconfigurator']['productos'][$i]['pertalla'] = $_POST[$_SESSION['packconfigurator']['productos'][$i]['id'].'talla'];
				$_SESSION['packconfigurator']['productos'][$i]['peropcion'] = $_POST[$_SESSION['packconfigurator']['productos'][$i]['id'].'persopk'];
				$_SESSION['packconfigurator']['productos'][$i]['pernombre'] = $_POST[$_SESSION['packconfigurator']['productos'][$i]['id'].'tunombre'];
				$_SESSION['packconfigurator']['productos'][$i]['perbandera'] = $_POST[$_SESSION['packconfigurator']['productos'][$i]['id'].'bandera'];
			}
		}
        
        // DESARROLLAR LAS ETIQUETAS CORRESPONDIENTES AL PACK
        
        $sql="SELECT * FROM bd_pack WHERE id='$_GET[pack]'";
        $query = mysqli_query($dbi, $sql);
        $meta = mysqli_fetch_array($query);
        $rest = strip_tags($meta['descripcion']);
        $desc = substr($rest, 0, 120);
        $desc = utf8_encode($desc);
        $desc = html_entity_decode($desc, ENT_QUOTES, "UTF-8");
        $url = '/pack/'.$_GET['pack'];
        $etiquetaDes = '<meta name="description" content="'.$desc.'"/>';
        $etiquetaTit = '<meta name="title" content="'.$meta['nombre'].'"/>';
        $titul = '<title>'.$meta['nombre'].' - '.$Empresa['nombre'].'</title>';
        $etiquetaRob = '<meta name="robots" content="noodp"/>';
        $etiquetaCan = '<link rel="canonical" href="'.$Empresa['url'].''.$url.'" />';
        
        // **************************************************
        
	}
	else if (isset($_GET['packs']))
	{ // Elementos de productos en página.
		require_once($draiz.'/sistema/mod_productos.php');
		$packs = @$_SESSION['usr'] == null ? $_SESSION['packsses'] : PacksP($_SESSION['usr']['id']);
	}
	else if (isset($_GET['allpacks']))
	{ // Elementos de productos en página.
		require_once($draiz.'/sistema/mod_productos.php');
		if ($_GET['allpacks'] == '' || !is_numeric($_GET['allpacks']))
			$_GET['allpacks'] = 1;
		
		$packs = Packs($_GET['allpacks']);
	}
	else if (isset($_GET['productos']))
	{ // Elementos de productos en página.
        if ($_SESSION['usr'] == null && $conectado == 1)
            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
            
		if ($_GET['productos'] == "")
		{
			$_GET['productos'] = 0;
		}
		
		$pagina = 1;
		$grupo = $_SESSION['lenguaje'].'productos/'.$_GET['productos'];
		$url = "/$grupo/";
        $idP=$_GET['productos'];
        $_SESSION['papa'] = $idP;
		
        // DESARROLLAR LAS ETIQUETAS CORRESPONDIENTES A LA CATEGORIA
        
        $sql = "SELECT menu 
				FROM bd_empresa;";
        $menuselect = mysqli_query($dbi, $sql);
        $menufinal = mysqli_fetch_array($menuselect);

        if($menufinal['menu'] == 1){
            $sql="SELECT * FROM bd_menu WHERE id='$idP'";
            $query = mysqli_query($dbi, $sql);
            $meta = mysqli_fetch_array($query);
        }else{
            $sql="SELECT categoria AS nombre FROM bd_categorias WHERE id='$idP'";
            $query = mysqli_query($dbi, $sql);
            $meta = mysqli_fetch_array($query);
        }

        //echo "<script>alert('".$meta['categoria']."');</script>";
        $etiquetaDes = '<meta name="description" content="'.$meta['nombre'].'"/>';
        $etiquetaTit = '<meta name="title" content="'.$meta['nombre'].'"/>';
        $titul = '<title>'.$meta['nombre'].' - '.$Empresa['nombre'].'</title>';
        $etiquetaCan = '<link rel="canonical" href="'.$Empresa['url'].''.$url.'" />';
        
        // *********************************************************
        
		if (isset($_GET['pagina']))
			if (ctype_digit($_GET['pagina']))
				$pagina = $_GET['pagina'];
			
		if($Empresa['vgaleria'] == 0){
                    $productos = Productos(12, $_GET['productos'], $pagina, $filtro);
                }else{
                    $productos = Productos(1000, $_GET['productos'], $pagina, $filtro);
                }
                
                $sql="SELECT * FROM  bd_colores_productos WHERE id='1'";
                $query = mysqli_query($dbi, $sql);
                $colores = mysqli_fetch_array($query);
                
                $sql="SELECT * FROM bd_menu WHERE id='$idP'";
                $query = mysqli_query($dbi, $sql);
                $meta = mysqli_fetch_array($query);
                $imagenCategoria = $meta['imagen'];
                $descripcionCategoria = $meta['descripcion'];
		
                $bar = $_GET['productos'];
		$atributos = Atributos($_GET['productos']);
        //$subcategorias = Categorias($_GET['productos']);
        
        // EVITAR DUPLICAR LA ETIQUETA ROBOTS EN LAS SIGUIENTES PAGINAS
        
        if($pagina == 1)
            $etiquetaRob = '<meta name="robots" content="noodp"/>';
        else
            $etiquetaRob = '<meta name="robots" content="noindex,follow,noodp"/>';
        
        // ************************************************************
        
	}
    else if(isset($_GET['marca'])){
        $resultado = null;
        $brand_name = str_replace('-',' ',$_GET['marca']);
		$sql="SELECT * FROM bd_categorias WHERE categoria LIKE '$brand_name'";
		$query = mysqli_query($dbi, $sql);
        
        if (mysqli_num_rows($query) == 1)
        {
            $resultado = mysqli_fetch_assoc($query);
        }
        $etiquetaDes = '<meta name="description" content="'.$resultado['descripcionSeo'].'"/>';
        $etiquetaTit = '<meta name="title" content="'.$resultado['tituloSeo'].'"/>';
        $titul = '<title>'.$resultado['tituloSeo'].' - '.$Empresa['nombre'].'</title>';
        $etiquetaCan = '<link rel="canonical" href="'.$Empresa['url'].''.$url.'" />';
        //echo '<meta name="keywords" content="'.$resultado['metaKeys'].'"/>';
    }
	else if (isset($_POST['buscar']))
	{ // Elementos de buscar en página.
        //echo "<script>alert('".$_POST['buscar']."');</script>";
        if ($_SESSION['usr'] == null && $conectado == 1)
            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
        
		if ($_POST['buscar'] != "")
		{
			$pagina = 1;
			$grupo = '?buscar='.$_POST['buscar'];
			
			
			if (isset($_GET['pagina']))
				if (ctype_digit($_GET['pagina']))
					$pagina = $_GET['pagina'];
                        
                        $buscar_url = str_replace(" ", "-", (rtrim($_POST['buscar'])));     
                        
                        $url = "buscar/".$buscar_url."/";
				
			$productos = ProductosBuscados(12, $_POST['buscar'], $pagina, $filtro);
			$atributos = Atributos();
		}
		else
		{
			$productos = null;
		}
        //header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'buscar');
        //$barpath .= " Busqueda"
	}else if (isset($_GET['enlaces']))
	{ //Cargar enlaces
            $enlacesP2 = EnlacesP2($_GET['enlaces']);
            
        }else if (isset($_GET['buscar']))
	{ // Elementos de buscar en página.
        //echo "<script>alert('".$_POST['buscar']."');</script>";
        if ($_SESSION['usr'] == null && $conectado == 1)
            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
        
		if ($_GET['buscar'] != "")
		{
			$pagina = 1;
			$grupo = '?buscar='.$_GET['buscar'];
			
			
			if (isset($_GET['pagina']))
				if (ctype_digit($_GET['pagina']))
					$pagina = $_GET['pagina'];
                                
                        $buscar_url = str_replace(" ", "-", (rtrim($_GET['buscar'])));
                        
                        $url = "buscar/".$buscar_url."/";
			
                        $buscar_deco = str_replace("-", " ", ($_GET['buscar']));
			$productos = ProductosBuscados(12, $buscar_deco, $pagina, $filtro);
			$atributos = Atributos();
		}
		else
		{
			$productos = null;
		}
        //header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'buscar');
        //$barpath .= " Busqueda"
	}else if (isset($_GET['buscarEtq']))
	{
            if ($_SESSION['usr'] == null && $conectado == 1)
            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
        
		if ($_GET['buscarEtq'] != "")
		{
			$pagina = 1;
			$grupo = '?buscarEtq='.$_GET['buscarEtq'];
			
			
			if (isset($_GET['pagina']))
				if (ctype_digit($_GET['pagina']))
					$pagina = $_GET['pagina'];
                                
                        $buscar_url = str_replace(" ", "-", (rtrim($_GET['buscarEtq'])));
                        
                        $url = "buscarEtq/".$buscar_url."/";
                        
                        $sql1="SELECT nombre FROM bd_etiquetas WHERE id='".$_GET['buscarEtq']."'";
                        $query1 = mysqli_query($dbi, $sql1);
                        $pare22 = mysqli_fetch_array($query1);
                        $nombreBuscarEtq = $pare22['nombre'];
			
			$productos = EtiquetassBuscadas(12, $_GET['buscarEtq'], $pagina, $filtro);
		}
		else
		{
			$productos = null;
		}
        }
	else if (isset($_GET['producto']))
	{ // Elementos de producto en página.
        if ($_SESSION['usr'] == null && $conectado == 1)
            header('Location: '.$draizp.'/'.$_SESSION['lenguaje'].'cuenta');
		if ($_GET['producto'] != "")
		{
			$producto = Producto($_GET['producto']);
                        $atributos = AtributosProducto($_GET['producto']);
                        $etiquetasProducto = EtiquetasProducto($_GET['producto']);
                        $ficheros = FicherosProducto($_GET['producto']);
                        $cuotas = CuotasProducto($_GET['producto']);
			$opiniones = Opiniones($_GET['producto']);
			$productosRE = ProductosConCriterio(4, $_GET['producto'], true);
			$paises = PaisesTodos();
			$bar = $_GET['producto'];
                        $comentarios = ObtenerComentario($_GET['producto'], 'Producto');
                            if($_POST['envcom'] == 1){
                                if(trim($_POST['nombre']) != "" && trim($_POST['email']) != "" && trim($_POST['comentario']) != ""){
                                    $vdev = ProcesarComentario($_POST['nombre'], $_POST['email'], $_POST['comentario'], $_GET['producto'], 'Producto');
                                    $coment_anadido = true;
                                }else{
                                    $coment_anadido = false;
                                }
                            }
            
            session_start();
            $papa = $_SESSION['papa'];
            $sql1="SELECT categoria AS nombre, id FROM bd_categorias WHERE idmenu='$papa' OR id='$papa'";
            $query1 = mysqli_query($dbi, $sql1);
            $pare = mysqli_fetch_array($query1);
            
            
            // DESARROLLAR LAS ETIQUETAS CORRESPONDIENTES AL PRODUCTO
            
            $url = "/producto/".$_GET['producto'];
            $sql="SELECT * FROM bd_productos WHERE id='$bar'";
            $query = mysqli_query($dbi, $sql);
            $meta = mysqli_fetch_array($query);
            $nombre = utf8_encode(strtr(utf8_decode($pare['nombre']), utf8_decode($tofind), $replac));
            $nombre = strtolower($nombre);
            $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
            if(!empty($_SESSION['lenguaje']))
                $barpath = "<a href='".$draizp.'/'.$_SESSION['lenguaje']."productos/".$papa."/".$nombre."/'>".$pare['nombre']."</a> &gt; ".$meta['nombre'];
            else
                $barpath = "<a href='".$draizp.'/'."productos/".$papa."/".$nombre."/'>".$pare['nombre']."</a> &gt; ".$meta['nombre'];
            $rest = strip_tags($meta['descripcion']);
            $desc = substr($rest, 0, 120);
            $desc = utf8_encode($desc);
            $desc = html_entity_decode($desc, ENT_QUOTES, "UTF-8");
            $nombreC = utf8_encode(strtr(utf8_decode($meta['nombre']), utf8_decode($tofind), $replac));
            $nombreC = strtolower($nombreC);
            //$nombre = str_replace(" ", "_", $nombre);
            $nombreC = preg_replace('([^A-Za-z0-9])', '-', $nombreC);	 
            $url2 = "producto/".$_GET['producto']."/".$nombreC."/";
            
            if($meta['meta_titulo'] != "" || $meta['meta_titulo'] != null){
                $etiquetaTit = '<meta name="title" content="'.$meta['meta_titulo'].'"/>';
                $titul = '<title>'.$meta['meta_titulo'].' - '.$Empresa['nombre'].'</title>';
            }else{
                $etiquetaTit = '<meta name="title" content="'.$meta['nombre'].'"/>';
                $titul = '<title>'.$meta['nombre'].' - '.$Empresa['nombre'].'</title>';
            }
            
            if($meta['meta_descripcion'] != "" || $meta['meta_descripcion'] != null){
                $etiquetaDes = '<meta name="description" content="'.$meta[meta_descripcion].'"/>';
            }else{
                $etiquetaDes = '<meta name="description" content="'.$desc.'"/>';
            }
            
            $etiquetaRob = '<meta name="robots" content="noodp"/>';
            $etiquetaCan = '<link rel="canonical" href="'.$Empresa['url'].''.$url2.'" />';
            
            $producto_bath = 1;
            $producto_ruta = CalcularPath($_GET['producto'], $draizp);
            
            // ******************************************************
		}
	}
	else if (isset($_GET['pagina']))
	{ // Elementos de paginas en página.
		if ($_GET['pagina'] != "")
		{
                    $enlacesP2 = EnlacesP2($_GET['pagina']);
			$pagina = Pagina($_GET['pagina']);
                        if($pagina['noticia'] == 1){
                            $barpath = CategoriasBlogN($_GET['pagina']);
                            $imagenes = OtrasImagenesBlog($_GET['pagina']);
                            $comentarios = ObtenerComentario($_GET['pagina'], 'Blog');
                            if($_POST['envcom'] == 1){
                                if(trim($_POST['nombre']) != "" && trim($_POST['email']) != "" && trim($_POST['comentario']) != ""){
                                    $vdev = ProcesarComentario($_POST['nombre'], $_POST['email'], $_POST['comentario'], $_GET['pagina'], 'Blog');
                                    $coment_anadido = true;
                                }else{
                                    $coment_anadido = false;
                                }
                            }
                        }
		}
	}
        else if (isset($_GET['tiendas']))
	{//Carga las tiendas
            $tiendas = Tiendas();
        }
        else if (isset($_GET['nosotros']))
	{ // Elementos de paginas en página.
		$pagina = Pagina(20000);
	}
	else if (isset($_GET['privacidad']))
	{ // Elementos de paginas en página.
		$pagina = Pagina(20001);
	}
	else if (isset($_GET['devoluciones']))
	{ // Elementos de paginas en página.
		$pagina = Pagina(20002);
	}
	else if (isset($_GET['portes']))
	{ // Elementos de paginas en página.
            if($Empresa['tipoportes'] == 0){
                $prtss = InfoPortes();
            }else if($Empresa['tipoportes'] == 1){
                $listados2 = CargarPortesKm(100);
            }else if($Empresa['tipoportes'] == 2){
                $listados2 = CargarPortesProvincias();
                $listados3 = CargarPortesProvinciasDefecto();
                $listadoempresas = CargarATransp();
                $listadosprovincias = CargarProvincias2();
            }
                
                
	}
	else if (isset($_GET['blog']))
	{ // Elementos de paginas en página.
		$entradas22 = Noticia(1000);
                $categoriasBlog = CategoriasBlog();
                $bar = 'B';
                $menu = MenuCategorias();
                //$menu = null;
	}
    else if (isset($_GET['entradas']))
	{ // Elementos de paginas en página.
		$entradas = NoticiaCat(10, $_GET['entradas']);
                $categoriasBlog = CategoriasBlog();
                $bar = $_GET['entradas'];
                $menu = MenuCategorias();
                //$menu = null;
	}
	else if (isset($_GET['ofertas']))
	{ // Elementos de paginas en página.
		$productos = ProductosConCriterio(1000, 'ofertas');
        $atributos = Atributos();
	}
	else if (isset($_GET['galeria']))
	{ // Elementos de paginas en página.
        $menu = MenuCategoriasGal();
        $categoriasGalerias = CategoriasGaleria();
        $bar = 'G';
        
        $galeria = array();
        $sql="SELECT * FROM bd_galeria ORDER BY id DESC";
        $query = mysqli_query($dbi, $sql);
        while($gal = mysqli_fetch_array($query)){
                $sql = "SELECT * FROM bd_catgaleria_idioma WHERE idcatgaleria = $gal[idcat] AND idioma = '$_SESSION[idioma]'";
                $query1 = mysqli_query($dbi, $sql);
                if($_SESSION['idioma'] == 'ESP')
                    array_push($galeria, array('imagen' => $gal['imagen'], 'descripcion' => $gal['descripcion']));
                else
                    if(mysqli_num_rows($query1) > 0)
                         array_push($galeria, array('imagen' => $gal['imagen'], 'descripcion' => $gal['descripcion']));

        }
        //$galeria = scandir('imagenes/galeria');
	}
    else if (isset($_GET['galeriasecc']))
	{ // Elementos de paginas en página.
        $menu = MenuCategoriasGal();
        $categoriasGalerias = CategoriasGaleria();
        $bar = $_GET['galeriasecc'];
        $galeria = array();
        
        $comentarios = ObtenerComentario($_GET['galeriasecc'], 'Galería');
                            if($_POST['envcom'] == 1){
                                if(trim($_POST['nombre']) != "" && trim($_POST['email']) != "" && trim($_POST['comentario']) != ""){
                                    $vdev = ProcesarComentario($_POST['nombre'], $_POST['email'], $_POST['comentario'], $_GET['galeriasecc'], 'Galería');
                                    $coment_anadido = true;
                                }else{
                                    $coment_anadido = false;
                                }
                            }
        
        $sql="SELECT * FROM bd_galeria WHERE idcat = $_GET[galeriasecc] ORDER BY id DESC";
        $query = mysqli_query($dbi, $sql);
        while($gal = mysqli_fetch_array($query)){
            
            array_push($galeria, array('imagen' => $gal['imagen'], 'descripcion' => $gal['descripcion']));

        }
        //$galeria = scandir('imagenes/galeria');
	}
	else if (!$_GET)
	{ // Elementos de inicio en página.
		$productos = ProductosAleatorios(9);
		$pagina = Noticia(1);
		$sliders = Slider();
	}

    require_once($draiz.'/sistema/mod_cestaycompra.php');

    if ($_SESSION['usr'] != null){
        $cestanum = Cesta($_SESSION['usr']['id']);
        $presupuestonum = Presupuesto($_SESSION['usr']['id']);
    }else{
        $cestanum = CountUnitsCestaSession($_SESSION['cestases']);
    }

    $entradas = Noticia(2);
    $sliders = Slider();
    $blogMenu = Noticia(9);

?>

<!DOCTYPE html>
<html><!-- Estructura HTML5 principal (cambios dinamicos con PHP) -->
	<head>
		<meta charset="UTF-8">
        <?php if($_GET['producto']){
            $nombre = strtolower($producto['nombre']);
            $nombre = preg_replace('([^A-Za-z0-9Á-Úá-ú])', '-', $nombre);	
            $nombre = str_replace("á", "a", $nombre);
            $nombre = str_replace("é", "e", $nombre);
            $nombre = str_replace("í", "i", $nombre);
            $nombre = str_replace("ó", "o", $nombre);
            $nombre = str_replace("ú", "u", $nombre);
            $nombre = str_replace("ñ", "n", $nombre);
            $nombre = str_replace("--", "-", $nombre);
        ?>  
                
            <meta property="og:url" content="<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>producto/<?=$producto['id']?>/<?=$nombre?>">
            <meta property="og:title" content="<?=$producto['nombre']?>">
            <meta property="og:description" content="<?=strip_tags(str_replace("<br>", " ", $producto['descripcion']))?>">
            <meta property="og:type" content="article">
            <meta property="og:image" content="<?=$Empresa['url']?>/imagenesproductos/<?=$producto['imagen']?>">
        <?php } ?>
            
            <?php if($_GET['productos']){
            $nombre = strtolower($meta['nombre']);
            $nombre = preg_replace('([^A-Za-z0-9Á-Úá-ú])', '-', $nombre);	
            $nombre = str_replace("á", "a", $nombre);
            $nombre = str_replace("é", "e", $nombre);
            $nombre = str_replace("í", "i", $nombre);
            $nombre = str_replace("ó", "o", $nombre);
            $nombre = str_replace("ú", "u", $nombre);
            $nombre = str_replace("ñ", "n", $nombre);
            $nombre = str_replace("--", "-", $nombre);
        ?>  
                
            <meta property="og:url" content="<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>productos/<?=$_GET['productos']?>/<?=$meta['nombre']?>">
            <meta property="og:title" content="<?=$meta['nombre']?>">
            <meta property="og:description" content="<?=strip_tags(str_replace("<br>", " ", $meta['descripcion']))?>">
            <meta property="og:type" content="article">
            <!-- Si tiene imagen la cargamos y sino cargamos la principal -->
            <?php if ($imagenCategoria != 'null' && $imagenCategoria != ''){ ?>
                <meta property="og:image" content="<?=$Empresa['url']?>/imagenesproductos/<?=$imagenCategoria?>">
            <?php }else{ ?>
                <meta property="og:image" content="<?=$Empresa['url']?>/source/<?=$Empresa['imgfacebookD']?>">
            <?php } ?>
        <?php } ?>
            
            <?php if($_GET['pagina']){
            $nombre = strtolower($pagina['nombre']);
            $nombre = preg_replace('([^A-Za-z0-9Á-Úá-ú])', '-', $nombre);	
            $nombre = str_replace("á", "a", $nombre);
            $nombre = str_replace("é", "e", $nombre);
            $nombre = str_replace("í", "i", $nombre);
            $nombre = str_replace("ó", "o", $nombre);
            $nombre = str_replace("ú", "u", $nombre);
            $nombre = str_replace("ñ", "n", $nombre);
            $nombre = str_replace("--", "-", $nombre);
            $nombre = str_replace("!", "", $nombre);
            $nombre = str_replace("¡", "", $nombre);
            $nombre = str_replace("?", "", $nombre);
            $nombre = str_replace("¿", "", $nombre);
        ?>  
                
            <meta property="og:url" content="<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pagina['id']?>/<?=$nombre?>">
            <meta property="og:title" content="<?=$pagina['nombre']?>">
            <meta property="og:description" content="<?=strip_tags(str_replace("<br>", " ", $pagina['contenido']))?>">
            <meta property="og:type" content="article">
            <?php if($pagina['imagen'] != ''){ ?>
                <meta property="og:image" content="<?=$Empresa['url']?>/imagenes/<?=$pagina['imagen']?>">
            <?php }else{ ?>
                <meta property="og:image" content="<?=$Empresa['url']?>/source/<?=$logoSup?>">
            <?php } ?>
            
            <?php if($pagina['tituloS'] != '') { ?>
            <meta name="title" content="<?=$pagina['tituloS']?>">
            <?php }
            if($pagina['descripcionS'] != ''){ ?>
            <meta name="description" content="<?=$pagina['descripcionS']?>">
            <?php }
            if($pagina['palabrasK'] != ''){ ?>
            <meta name="keywords" content="<?=$pagina['palabrasK']?>">
            <?php } ?>
        <?php } ?>
        
        <?php
        
            if($fuente1 != 'Arial,Helvetica,sans-serif'){
                echo '<link href="https://fonts.googleapis.com/css?family='.$fuente1.'" rel="stylesheet">';
                $fuente1 = str_replace("+", " ", $fuente1);
            }
            if($fuente2 != 'Arial,Helvetica,sans-serif'){
                echo '<link href="https://fonts.googleapis.com/css?family='.$fuente2.'" rel="stylesheet">';
                $fuente2 = str_replace("+", " ", $fuente2);
            }
        
        ?>
		    
        <?php //Include del bloque que analiza los metas que se deben mostrar
        
            include_once($draiz.'/secciones/etiquetas.php');
            
            
        
        ?> 
		<link rel="icon" href="<?=$draizp?>/icono/<?=$Empresa['icono']?>" type="image/png" />
		<meta name="viewport" content="width=device-width, initial-scale=0.8, maximum-scale=1.0, user-scalable=no" />
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<style type="text/css">
            .goog-te-banner-frame.skiptranslate{display:none!important;}
            body{top:0px!important;}
		</style>
		<link rel="stylesheet" type="text/css" href="<?=$draizp?>/css/fuentes.php" />
		<link rel="stylesheet" type="text/css" href="<?=$draizp?>/css/main.php" />
		<link rel="stylesheet" type="text/css" href="<?=$draizp?>/css/formularios.php" />
		<script type="text/javascript" src="<?=$draizp?>/scripts/jquery.js"></script>
		<script type="text/javascript">jQuery.noConflict();</script>
		<script type="text/javascript" src="<?=$draizp?>/scripts/Javas.js"></script>
		<script type="text/javascript" src="<?=$draizp?>/scripts/Eventos.php"></script>
        <script src="<?=$draizp?>/scripts/jquery.cookie.js"></script>	
        <script src="<?=$draizp?>/scripts/jquery-scrolltofixed-min.js" type="text/javascript"></script>
		<?php // Estilos según sección.
			if (isset($_POST['buscar']) || isset($_GET['buscar']) || isset($_GET['buscarEtq']) || (isset($_GET['productos'])) || (isset($_GET['ofertas'])) || (isset($_GET['packs'])) || (isset($_GET['allpacks'])))
				echo '<link rel="stylesheet" type="text/css" href="'.$draizp.'/css/productos.php" />';
			else if ((isset($_GET['producto']) && $_GET['producto'] != "") || (isset($_GET['pack']) && $_GET['pack'] != ""))
				echo '<link rel="stylesheet" type="text/css" href="'.$draizp.'/css/producto.php" />';
			else
				echo '<link rel="stylesheet" type="text/css" href="'.$draizp.'/css/inicio.php" />';
		?>
		<link rel="stylesheet" type="text/css" href="<?=$draizp?>/css/responsive.php" />
		<script src="https://apis.google.com/js/platform.js" async defer>
		  {lang: 'es'}
		</script>
		<script src="<?=$draizp?>/componentes/slippry-1.3.0/dist/slippry.min.js"></script>
		<script src="<?=$draizp?>//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
		<link rel="stylesheet" href="<?=$draizp?>/componentes/slippry-1.3.0/demo/demo.css">
		<link rel="stylesheet" href="<?=$draizp?>/componentes/slippry-1.3.0/dist/slippry.css">
        <link rel="stylesheet" href="<?=$draizp?>/componentes/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
        <script type="text/javascript" src="<?=$draizp?>/componentes/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <link rel="stylesheet" href="<?=$draizp?>/componentes/social-buttons/social-buttons.css">
        <link rel="stylesheet" href="<?=$draizp?>/css/simple-slideshow-styles.css">
        <link rel="stylesheet" href="<?=$draizp?>/componentes/jquery.bxslider/jquery.bxslider.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="<?=$draizp?>/css/custom_css.css" /> <!-- css to repair problems -->
        <script type="text/javascript">
           function get_geolocation() {
              if (navigator.geolocation) {
                document.getElementById("myLocation").innerHTML = "Ready to retrieve location details.";
                var geo = navigator.geolocation;
                geo.getCurrentPosition(showLocation, showError);
              }
              else {
                document.getElementById("myLocation").innerHTML = "Geolocation not supported in this browser.";

              }
            }      

            function showLocation(position) {
              var lng = position.coords.longitude;
              var lat = position.coords.latitude;
              document.getElementById("myLocation").innerHTML = "Lat: " + lat + ", Long: " + lng;
            }

            function showError(error) { 
              //alert("There has been an error");
            }
            
            function closeModal() {
                document.getElementById("myModal3").innerHTML="";
                document.getElementById('myModal').style.display = "none";
                document.getElementById('myModal3').style.display = "none";
            }
            
             function openModal() {
                document.getElementById('myModal').style.display = "block";
                document.getElementById('myModal3').style.display = "block";
            }
        </script>
        <style>
                        #modal {
                            width:100%; /*Toma el 100% del ancho de la página*/
                            height:100%; /*Toma el 100% del alto de la página*/
                            position:fixed; /*Con este código hacemos que el contenedor se mantenga en la pantalla y para que tome las dimensiones del body y no de la entrada*/
                            background-color: rgba(1, 1, 1, 0.9); /*Color de fondo, incluye opacidad del 90%*/
                            vertical-align: middle;
                            top:0; /*Position superior*/
                            left:0; /*Posición lateral*/
                            z-index:99999999; /*Evitamos que algún elemento del blog sobreponga la ventana modal*/
                        }
        </style>
        <style>
            /* The Modal (background) */
            .modal {
              display: none;
              position: fixed;
              z-index: 10000000000;
              padding-top: 35px;
              left: 0;
              top: 0;
              width: 100%;
              height: 100%;
              overflow: auto;
              background-color: black;
              opacity: 0.5;
            }

            /* Modal Content */
            .modal-content {
              position: relative;
              background-color: #fefefe;
              margin: auto;
              padding: 0;
              width: 90%;
              max-width: 1020px;
            }

            /* The Close Button */
            .close {
              color: white;
              position: absolute;
              top: -2px;
              right: 5px;
              font-size: 35px;
              font-weight: bold;
            }

            .close:hover,
            .close:focus {
              color: black;
              text-decoration: none;
              cursor: pointer;
            }
            
            @media (max-width:940px){
                .modal-xs{
                    width: 100% !important;
                }
                
                .video-container {
                    position: relative;
                    padding-bottom: 52% !important;
                    padding-top: 30px; height: 0; overflow: hidden;
                }
            }
            
            @media (max-width:470px){
                               
                .video-container {
                    position: relative;
                    padding-bottom: 50% !important;
                    padding-top: 30px; height: 0; overflow: hidden;
                }
            }
            
            .video-container {
                position: relative;
                padding-bottom: 53.40%;
                padding-top: 30px; height: 0; overflow: hidden;
            }

            .video-container iframe,
            .video-container object,
            .video-container embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100% !important;
                height: 100% !important;
            }
        </style>
        
        <?php if($Empresa['cabecera'] != ''){ 
            echo $Empresa['cabecera'];
        } ?>
	</head>
	<body>
        <?php require_once('add_as_cart_bundle/start.php'); //Bundle para añadir productos como si fuera un carrito          ?>
        <div id="added_to_cart">
            <div class="product_added_box">
                <div id="cart_product_name"><span id="product_quantity"></span> <span id="product_name"></span> agregado al presupuesto.</div>
                <div id="close_cart">Seguir Comprando</div>
                <div class="presupuesto_button"><a href="<?=$draizp?>/presupuesto_cont">Ir a Presupuesto</a> </div>
            </div>
        </div>

            <?=$Empresa['chat'];?>
            
            <?php if($Empresa['actanu'] == 1 && $_SESSION['anuncio'] != 1){ ?>
            <div id="myModal" class="modal" onclick="closeModal()"></div>
            <div id="myModal3" class="modal modal-xs" onclick="closeModal()" style="opacity: 1; width: <?=$Empresa['anchvid']?>%; height: auto; position: absolute; left: 50%; top: 50%; position: fixed; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); background-color: transparent; ">
                <span class="close cursor" onclick="closeModal()">&times;</span>
                <div class="mySlides video-container" style="width: auto; background-color: transparent; font-size: 18px;  text-align: center; " id="text_info">
                    <?=html_entity_decode($Empresa['enlvid']);?>
                </div>
            </div>
            
            <?php } ?>
            
            <?php if($Empresa['actanu'] == 1 && $Empresa['luganu'] == 1 && $_SESSION['anuncio'] != 1){ ?>
                <script>
                    openModal();
                </script>
             <?php
                $_SESSION['anuncio'] = 1;
            }else if($_SESSION['anuncio'] == 1){?>
                <script>
                    //document.getElementById("myModal3").innerHTML="";
                </script>    
            <?php }else if(count($_GET)>1 && $Empresa['luganu'] == 0){ ?>
                <script>
                    //document.getElementById("myModal3").innerHTML="";
                </script> 
            <?php } ?>
        
    <script type="text/javascript">
		jQuery.cookie('googtrans', '/en/<?=$_SESSION['lenguaje']?>');
    </script> 
    
    
    <div id="google_translate_element" style="display: none"></div>
    <script>
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
          pageLanguage: 'ES', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, multilanguagePage: false
      }, 'google_translate_element');
    }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    
    
        
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
		<?php // Bloques fijos.
			include_once($draiz.'/bloques/cabecera.php');
			include_once($draiz.'/bloques/menu.php');
		?>
		<div id="Messages"></div>
		<?php if ($barpath != '') include_once('./temas/'.$cabecera.'/bloques/barraposicion.php'); ?>
		<div id="grupo-contenido">
            
			<?php // Contenidos según sección.
            if(isset($_GET['lng'])){
               
                if (isset($_GET['pack']))
					include_once($draiz.'/secciones/pack.php');
				else if (isset($_GET['allpacks']))
                    include_once($draiz.'/secciones/allpacks.php');
                else if (isset($_GET['error'])){
                    echo '<div style="background: #E6E7E9; border: solid 2px #EEE; left: 20%; padding: 3% 5%; position: absolute; top: 25%; width: 50%; z-index: 99999;">
                        <h2>Error al enviar el presupuesto</h2>
                        <p>No ha introducido todos los datos necesarios para poder enviar una peticion de presupuesto.</p>
                        <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'presupuesto" class="button">volver a intentar</a>
                        <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'" class="button buttonGray" style="min-width: 10px !important;">X</a>
                    </div>';
                    include_once($draiz.'/secciones/inicio.php');
                }
                else if (isset($_POST['buscar']))
					include_once($draiz.'/secciones/buscar.php');
				else if (isset($_GET['productos']))
					include_once($draiz.'/secciones/productos.php');
				else if (isset($_GET['ofertas']))
					include_once($draiz.'/secciones/ofertas.php');
				else if (isset($_GET['buscar']))
					include_once($draiz.'/secciones/buscar.php');
                else if (isset($_GET['buscarEtq']))
					include_once($draiz.'/secciones/buscar.php');
				else if (isset($_GET['producto']) && $_GET['producto'] !="")
					include_once($draiz.'/secciones/producto.php');
                                else if (isset($_GET['tiendas']))
					include_once($draiz.'/secciones/tiendas.php');
				else if (isset($_GET['pagina']) && $_GET['pagina'] !="")
					include_once($draiz.'/secciones/articulo.php');
				else if (isset($_GET['nosotros']))
					include_once($draiz.'/secciones/articulo.php');
                                else if (isset($_GET['privacidad']))
					include_once($draiz.'/secciones/articulo.php');
				else if (isset($_GET['devoluciones']))
					include_once($draiz.'/secciones/articulo.php');
				else if (isset($_GET['portes']))
					include_once($draiz.'/secciones/portes.php');
                else if (isset($_GET['empresa']))
					include_once($draiz.'/secciones/empresa.php');
				else if (isset($_GET['blog']))
					include_once($draiz.'/secciones/blog.php');
                                else if (isset($_GET['enlaces']))
					include_once($draiz.'/secciones/enlaces.php');
                else if (isset($_GET['entradas']))
					include_once($draiz.'/secciones/entradas.php');
				else if (isset($_GET['galeria']))
					include_once($draiz.'/secciones/galeria.php');
                else if (isset($_GET['galeriasecc']))
					include_once($draiz.'/secciones/galeriasecc.php');
				else if (isset($_GET['contacto']))
					include_once($draiz.'/secciones/contacto.php');
                                else if (isset($_GET['presupuesto_cont']))
					include_once($draiz.'/secciones/presupuesto_cont.php');
				else if (isset($_GET['cuenta']) && $_SESSION['usr'] == null)
					if ($_GET['cuenta'] == 'recovery' || $_GET['cuenta'] == 'recoverys' || $_GET['cuenta'] == 'recoveryE')
					{
						include_once($draiz.'/secciones/rpass.php');
					}
					else
					{
						include_once($draiz.'/secciones/login.php');
					}
                                else if (isset($_GET['registro']) && $_SESSION['usr'] == null)
                                        include_once($draiz.'/secciones/registro.php');
				else if (isset($_GET['finalizado']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/finalizado.php');
                                else if (isset($_GET['finalizado2']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/finalizado2.php');
				else if (isset($_GET['transferencia']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/transferencia.php');
				else if (isset($_GET['contrareembolso']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/contrareembolso.php');
                else if (isset($_GET['tienda']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/tienda.php');
                else if (isset($_GET['domiciliacion']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/domiciliacion.php');
                else if (isset($_GET['tarjeta']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/tarjeta.php');
                 else if (isset($_GET['financiacion']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/financiacion.php');
                  else if (isset($_GET['dsubscripcion']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/dsubscripcion.php');
				else if (isset($_GET['crearpack']))
					include_once($draiz.'/secciones/crearpack.php');
				else if (isset($_GET['cuenta']))
					include_once($draiz.'/secciones/cuenta.php');
				else if (isset($_GET['cesta']) && ($_SESSION['usr'] != null || @$_SESSION['cestases'] != null))
					include_once($draiz.'/secciones/cesta.php');
                                else if (isset($_GET['rma']) && ($_SESSION['usr'] != null))
					include_once($draiz.'/secciones/rma.php');
                else if (isset($_GET['presupuesto']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/presupuesto.php');
				else if (isset($_GET['compras']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/compras.php');
				else if ((isset($_GET['pedido']) || isset($_GET['datos_personales']) 
						|| isset($_GET['pago']) || isset($_GET['confirmacion']))){
                                     if(($_SESSION['usr'] != null || $_SESSION['cestases'] != null) && isset($_SESSION['compra']['paso']))
                                         include_once($draiz.'/secciones/pedido.php');
                                     else
                                         include_once($draiz.'/secciones/pedido.php');
                                }else if (isset($_GET['imprimir_fact']) && ($_SESSION['usr'] != null || $_SESSION['superad'] != null))
					include_once($draiz.'/secciones/generarPdf.php');
                                else if (isset($_GET['imprimir_rma']) && ($_SESSION['usr'] != null || $_SESSION['superad'] != null))
					include_once($draiz.'/secciones/generarPdfRMA.php');
				else if (isset($_GET['sys_action']) && $_SESSION['usr'] != null)
				{
					if ($_GET['sys_action'] == 'realizar_pago')
						include_once($draiz.'/secciones/plataforma.php');
					else
						include_once($draiz.'/secciones/error404.html');
				}
                                else if (isset($_GET['app']))
                                    include_once($draiz.'/secciones/inicio.php');
				else
					include_once($draiz.'/secciones/inicio.php');
            }else{
                                if (isset($_POST['buscar']))
					include_once($draiz.'/secciones/buscar.php');
				else if (!$_GET || $_POST['idioma'])
					include_once($draiz.'/secciones/inicio.php');
				else if (isset($_GET['pack']))
					include_once($draiz.'/secciones/pack.php');
				else if (isset($_GET['allpacks']))
					include_once($draiz.'/secciones/allpacks.php');
				else if (isset($_GET['marca']))
					include_once($draiz.'/secciones/marca.php');
                else if (isset($_GET['productos']))
					include_once($draiz.'/secciones/productos.php');
				else if (isset($_GET['ofertas']))
					include_once($draiz.'/secciones/ofertas.php');
				else if (isset($_GET['buscar']))
					include_once($draiz.'/secciones/buscar.php');
                               else if (isset($_GET['buscarEtq']))
					include_once($draiz.'/secciones/buscar.php');
				else if (isset($_GET['producto']) && $_GET['producto'] !="")
					include_once($draiz.'/secciones/producto.php');
				else if (isset($_GET['tiendas']))
					include_once($draiz.'/secciones/tiendas.php');
				else if (isset($_GET['pagina']) && $_GET['pagina'] !="")
					include_once($draiz.'/secciones/articulo.php');
                                else if (isset($_GET['nosotros']))
					include_once($draiz.'/secciones/articulo.php');
				else if (isset($_GET['privacidad']))
					include_once($draiz.'/secciones/articulo.php');
				else if (isset($_GET['devoluciones']))
					include_once($draiz.'/secciones/articulo.php');
				else if (isset($_GET['portes']))
					include_once($draiz.'/secciones/portes.php');
                else if (isset($_GET['empresa']))
					include_once($draiz.'/secciones/empresa.php');
				else if (isset($_GET['blog']))
					include_once($draiz.'/secciones/blog.php');
                                else if (isset($_GET['enlaces']))
					include_once($draiz.'/secciones/enlaces.php');
                else if (isset($_GET['entradas']))
					include_once($draiz.'/secciones/entradas.php');
				else if (isset($_GET['galeria']))
					include_once($draiz.'/secciones/galeria.php');
                else if (isset($_GET['galeriasecc']))
					include_once($draiz.'/secciones/galeriasecc.php');
				else if (isset($_GET['contacto']))
					include_once($draiz.'/secciones/contacto.php');
                                else if (isset($_GET['presupuesto_cont']))
					include_once($draiz.'/secciones/presupuesto_cont.php');
				else if (isset($_GET['cuenta']) && $_SESSION['usr'] == null)
					if ($_GET['cuenta'] == 'recovery' || $_GET['cuenta'] == 'recoverys' || $_GET['cuenta'] == 'recoveryE')
					{
						include_once($draiz.'/secciones/rpass.php');
					}
					else
					{
						include_once($draiz.'/secciones/login.php');
					}
                                else if (isset($_GET['registro']) && $_SESSION['usr'] == null)
                                        include_once($draiz.'/secciones/registro.php');
				else if (isset($_GET['finalizado']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/finalizado.php');
                                else if (isset($_GET['finalizado2']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/finalizado2.php');
				else if (isset($_GET['transferencia']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/transferencia.php');
				else if (isset($_GET['contrareembolso']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/contrareembolso.php');
                else if (isset($_GET['tienda']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/tienda.php');
                else if (isset($_GET['domiciliacion']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/domiciliacion.php');
                else if (isset($_GET['tarjeta']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/tarjeta.php');
				else if (isset($_GET['crearpack']))
					include_once($draiz.'/secciones/crearpack.php');
				else if (isset($_GET['cuenta']))
					include_once($draiz.'/secciones/cuenta.php');
				else if (isset($_GET['cesta']) && ($_SESSION['usr'] != null || @$_SESSION['cestases'] != null))
					include_once($draiz.'/secciones/cesta.php');
                                else if (isset($_GET['rma']) && ($_SESSION['usr'] != null))
					include_once($draiz.'/secciones/rma.php');
                else if (isset($_GET['presupuesto']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/presupuesto.php');
				else if (isset($_GET['compras']) && $_SESSION['usr'] != null)
					include_once($draiz.'/secciones/compras.php');
				else if ((isset($_GET['pedido']) || isset($_GET['datos_personales']) 
						|| isset($_GET['pago']) || isset($_GET['confirmacion']))){
                                    if (($_SESSION['usr'] != null || $_SESSION['cestases'] != null) && isset($_SESSION['compra']['paso']))
					include_once($draiz.'/secciones/pedido.php');
                                    else
                                        include_once($draiz.'/secciones/pedido.php');
                                }else if (isset($_GET['imprimir_fact']) && ($_SESSION['usr'] != null || $_SESSION['superad'] != null))
					include_once($draiz.'/secciones/generarPdf.php');
                                else if (isset($_GET['imprimir_rma']) && ($_SESSION['usr'] != null || $_SESSION['superad'] != null))
					include_once($draiz.'/secciones/generarPdfRMA.php');
				else if (isset($_GET['sys_action']) && $_SESSION['usr'] != null)
				{
					if ($_GET['sys_action'] == 'realizar_pago')
						include_once($draiz.'/secciones/plataforma.php');
					else
						include_once($draiz.'/secciones/error404.html');
				}
                                else if (isset($_GET['app']))
                                    include_once($draiz.'/secciones/inicio.php');
				else
					include_once($draiz.'/secciones/error404.html');
            }
			?>
		</div>
        <style>
            .ir-arriba {
                width: 30px;
                height: 30px;
                display:none;
                background:rgba(253, 253, 253, 0) url(<?=$draizp?>/imagenes/flechaArriba.png) no-repeat center;
                background-size: 30px;
                color:#fff;
                cursor:pointer;
                position: fixed;
                bottom:20px;
                right:20px;
                z-index: 999999;
            }
        </style>
        <script>
            jQuery(document).ready(function(){

                jQuery('.ir-arriba').click(function(){
                    jQuery('body, html').animate({
                        scrollTop: '0px'
                    }, 300);
                });

                jQuery(window).scroll(function(){
                    if( jQuery(this).scrollTop() > 0 ){
                        jQuery('.ir-arriba').slideDown(300);
                    } else {
                        jQuery('.ir-arriba').slideUp(300);
                    }
                });

            });
        </script>
        <span class="ir-arriba"></span>
		<?php // Píe.
		if(!isset($_GET['imprimir_fact']))	
                    include_once($draiz.'/bloques/pie.php');
        /* Truco para no tener que buscar el archivo tema por tema */
        // print_r(get_included_files ());
        // print_r(get_defined_vars ());
        // die;
		?>
	</body>
</html>
<?php // Cierre de conexiónde base de datos.
	 CerrarConexion();
?>