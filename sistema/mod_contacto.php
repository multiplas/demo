<?php
	function FiltrarCampos($nombre, $telefono, $email, $consulta)
	{
		global $dbi;
		
		$nombre = mysqli_real_escape_string($dbi, htmlspecialchars($nombre));
		$telefono = mysqli_real_escape_string($dbi, htmlspecialchars($telefono));
		$email = mysqli_real_escape_string($dbi, htmlspecialchars($email));
		$consulta = mysqli_real_escape_string($dbi, htmlspecialchars($consulta));
		
		return array (
						'nombre' => $nombre,
						'telefono' => $telefono,
						'email' => $email,
						'consulta' => $consulta,
						'para' => $email,
						'asunto' => '',
						'mensaje' => ''
						);
	}
        
        function FiltrarCampos2($consulta)
	{
		global $dbi;
		
		$consulta = mysqli_real_escape_string($dbi, htmlspecialchars($consulta));
		
		return array (
						'consulta' => $consulta,
						'asunto' => 'Presupuesto',
						'mensaje' => ''
						);
	}
	
    function FiltrarCamposPresupuesto($empresa, $nombre, $poblacion, $telefono, $fax, $email, $consulta)
	{
		global $dbi;
		
		$nombre = mysqli_real_escape_string($dbi, htmlspecialchars($nombre));
		$telefono = mysqli_real_escape_string($dbi, htmlspecialchars($telefono));
		$email = mysqli_real_escape_string($dbi, htmlspecialchars($email));
		$consulta = mysqli_real_escape_string($dbi, htmlspecialchars($consulta));
        $empresa = mysqli_real_escape_string($dbi, htmlspecialchars($empresa));
		$poblacion = mysqli_real_escape_string($dbi, htmlspecialchars($poblacion));
		$fax = mysqli_real_escape_string($dbi, htmlspecialchars($fax));
		
		return array (
						'nombre' => $nombre,
						'telefono' => $telefono,
						'email' => $email,
						'consulta' => $consulta,
                        'fax' => $fax,
						'empresa' => $empresa,
						'poblacion' => $poblacion,
						'para' => $email
						);
	}
	
	function ConstruirMsgRecuperacion($pass)
	{
		global $dbi;
		
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>Recuperación Contraseña</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<h2>Recuperación Contraseña</h2>
								<p>
									Esta es tu nueva contraseña: <br />
									'.$pass.'<br />
								</p>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
		
		return $mensaje;
	}
	
	
	function ConstruirMsgRegistrado($nombre, $asunto, $url)
	{
		global $dbi;
		
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>'.$asunto.'</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<h2>'.$asunto.'</h2>
								<p>
									Hola '.$nombre.',<br />
									Te damos la bienvenida a nuestra web!<br />
								</p>
								<p>
									Por favor haz click en el siguiente enlace para poder activar tu cuenta y poder verificar tu correo!<br />
									<a href="'.$url.'" target="_blank">'.$url.'</a>
								</p>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
		
		return $mensaje;
	}
	
	
	function ConstruirMsgRegistradoParaComprar($nombre, $asunto, $url)
	{
		global $dbi;
		
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>'.$asunto.'</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<h2>'.$asunto.'</h2>
								<p>
									Hola '.$nombre.',<br />
									Te damos la bienvenida a nuestra web!<br />
								</p>
								<p>
									Tu cuenta ha sido activada de forma correcta! Puedes entrar para seguir comprando o ver tus pedidos desde:<br />
									<a href="'.$url.'" target="_blank">'.$url.'</a>
								</p>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
		
		return $mensaje;
	}
	
	
	function ConstruirMsg($nombre, $telefono, $email, $consulta, $asunto)
	{
		global $dbi;
		
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>'.$asunto.'</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<p>
									Buenos días,<br />
									Su mensaje ha sido enviado correctamente. Le dejamos una copia del mensaje, que en breve le responderemos!<br />
								</p>
								<h2>'.$asunto.'</h2>
								<table style="text-align: left;">
									<tr>
										<td>Nombre:</td><td>'.$nombre.'</td>
										<td>Teléfono:</td><td>'.$telefono.'</td>
										<td>Email:</td><td>'.$email.'</td>
										<td>Consulta:</td><td></td>
										<td colspan="2" style="text-align: justify;">
											<p>
												'.$consulta.'
											</p>
										</td>
									</tr>
								</table>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
		
		return $mensaje;
	}
        
        function ConstruirMsgPresManual($consulta, $asunto, $nombre)
	{
		global $dbi;
		
        if($nombre != ''){
            $nombre = '<b>'.$nombre.'</b>';
        }
        if($_SESSION['usr'] != null){
            global $dbi;

            $sql = "SELECT * FROM `bd_users` WHERE `id` like ". $_SESSION['usr']['id'];
            $query = mysqli_query($dbi, $sql);

            if (mysqli_num_rows($query) == 1)//Solo debe retornar uno
            {
                $assoc = mysqli_fetch_assoc($query);
                $telefono = $assoc['telefono'];
                $direccion = $assoc['direccion'];
                $poblacion = $assoc['poblacion'];
                $email = $assoc['email'];
                $dni = $assoc['dni'];
                $pais = $assoc['pais'];
            }
        }
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>'.$asunto.'</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
								<h2>'.$asunto.'</h2>
								<p>
									Buenos días,<br />
									Acaban de envíar una petición de presupuesto '.$nombre.'<br />
                                    Información de '.$nombre.': <br /><br />

                                    Email: '.$email.'<br />
                                    DNI: '.$dni.'<br />
                                    Teléfono: '.$telefono.'<br />
                                    Dirección: '.$direccion.'<br />
                                    Población: '.$poblacion.'<br />
                                    País: '.$pais.'<br />
								</p>
								<table style="text-align: left;">
									<tr>
										<td>Petición:</td><td></td>
										<td colspan="2" style="text-align: justify;">
											<p>
												'.$consulta.'
											</p>
										</td>
									</tr>
								</table>
								<p>
									Recuerde que podrá ver esta petición en el back de su web.<br>Un cordial saludo.
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder.<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
        
		return $mensaje;
	}

    function ConstruirMsgPresupuesto($empresa, $nombre, $poblacion, $telefono, $fax, $email, $consulta, $asunto)
	{
		global $dbi;
		
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>Presupuesto</title>
						</head>
						<body>
							<div>
                                <h3>Datos solicitante</h3>
                                <p><b>Empresa:</b> '.$empresa.'</p>
                                <p><b>Nombre:</b> '.$nombre.'</p>
                                <p><b>Población:</b> '.$poblacion.'</p>
                                <p><b>Teléfono:</b> '.$telefono.'</p>
                                <p><b>Fax:</b> '.$fax.'</p>
                                <p><b>Email:</b> '.$email.'</p>
                                <p><b>Consulta:</b><br> '.$consulta.'</p>
							</div>'
		;
		
		return $mensaje;
	}
	
	
	function ConstruirMsgTransferencia($nombre, $asunto, $ccc, $eur, $secreto, $nempresa, $bic = null)
	{
		global $dbi, $Empresa;
        $draiz = getcwd();    
        include $draiz.'/secciones/auxiliares.php';     
        require_once('mod_cestaycompra.php');
        $productos = ProductosComprados($secreto, $_SESSION['usr']['id']);
        $cad_prid = '';
        $peso = 0;
        $portes = 0;

        foreach ($productos AS $producto){
            $portes = $producto['portescompra'];
            $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp;'.$producto['cantidad'] .' - ' .$producto['nombre'] .'<br>';           
            $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp; Total - ' .$producto['precio'] .'€<br>';
        }
        if($Empresa['factura'] == 1)
            $text = "la <strong>FACTURA</strong>";
        else
            $text = "el <strong>ALBARÁN</strong>";
            
        /* Extrae el precio desglosado */
        $totalSinEnvio = $eur - $portes;
        $baseImpText = $aux12;
        $baseImpPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.');
        $iva = $Empresa['impuesto'];
        $ivaPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.');
		
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>'.$asunto.'</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<h2>'.$asunto.'</h2>
								<p>
									Hola '.$nombre.',<br />
									Debes realizar una transferencia bancaria indicando los siguientes datos para finalizar tu compra!<br />
								</p>
								<p>
									<strong>NOMBRE DEL BENEFICIARIO/NAME OF BENEFICIARY</strong>: '.$nempresa.'<br />
									<strong style="text-transform:uppercase;">'.$aux12.'</strong>:'.$baseImpPrice.' '.$_SESSION['moneda'].'<br />
                                    <strong>IVA ('.$iva.')%</strong>:'.$ivaPrice.' '.$_SESSION['moneda'].'<br />
                                    <strong>COSTE DEL ENVIO</strong>:'.number_format($portes, 2, ',', '.').' '.$_SESSION['moneda'].'<br />
									<strong>IMPORTE TOTAL</strong>: '.number_format($eur, 2, ',', '.').' '. $_SESSION['moneda'].'<br /><br />
									<strong>NÚMERO CUENTA DESTINO/DESTINATION ACCOUNT NUMBER</strong>: '.$ccc.'<br />
                                                                        '.(@$bic != '' ? '<strong>CÓDIGO BIC/SWIFT</strong>: '.$bic.'<br />' : '').'<br />
                                                                        <strong>PRODUCTOS/PRODUCTS</strong>: <br> '.$cad_prid.'
								</p>
                                                                <p>
                                                                        Podrá descargar '.$text.' de nuestra web una vez procesado el pedido.
                                                                </p>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
		
		return $mensaje;
	}
	
	function ConstruirMsgTienda($nombre, $asunto, $dir, $eur, $secreto)
	{
		global $dbi, $Empresa;

        $draiz = getcwd();    
        include $draiz.'/secciones/auxiliares.php';     
        require_once('mod_cestaycompra.php');
        $productos = ProductosComprados($secreto, $_SESSION['usr']['id']);
        $cad_prid = '';
        $peso = 0;
        $portes = 0;

        foreach ($productos AS $producto){
            $portes = $producto['portescompra'];
            $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp;'.$producto['cantidad'] .' - ' .$producto['nombre'] .'<br>';           
            $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp; Total - ' .$producto['precio'] .'€<br>';
        }
        if($Empresa['factura'] == 1)
            $text = "la <strong>FACTURA</strong>";
        else
            $text = "el <strong>ALBARÁN</strong>";
            
        /* Extrae el precio desglosado */
        $totalSinEnvio = $eur - $portes;
        $baseImpText = $aux12;
        $baseImpPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.');
        $iva = $Empresa['impuesto'];
        $ivaPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.');
		
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>'.$asunto.'</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<h2>'.$asunto.'</h2>
								<p>
									Hola '.$nombre.',<br />
									Has realizado una compra en la que realizarás el pago al recoger el pedido en nuestra tienda!<br />
								</p>
								<p>
									<strong>REFERENCIA</strong>: '.$secreto.'<br />
									<strong style="text-transform:uppercase;">'.$aux12.'</strong>:'.$baseImpPrice.' '.$_SESSION['moneda'].'<br />
                                    <strong>IVA ('.$iva.')%</strong>:'.$ivaPrice.' '.$_SESSION['moneda'].'<br />
                                    <strong>COSTE DEL ENVIO</strong>:'.number_format($portes, 2, ',', '.').' '.$_SESSION['moneda'].'<br />
									<strong>IMPORTE TOTAL</strong>: '.number_format($eur, 2, ',', '.').' '. $_SESSION['moneda'].'<br /><br />
									<strong>TIENDA</strong>:'.$dir.'<br />
                                                                        <strong>PRODUCTOS</strong>: <br> '.$cad_prid.'
								</p>
                                                                <p>
                                                                        Podrá descargar '.$text.' de nuestra web una vez procesado el pedido.
                                                                </p>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
        
        
		
		return $mensaje;
	}

    function ConstruirMsgTarjeta($nombre, $asunto, $dir, $eur, $secreto)
	{
		global $dbi, $Empresa;
        $draiz = getcwd();    
        include $draiz.'/secciones/auxiliares.php';     
        require_once('mod_cestaycompra.php');
        $productos = ProductosComprados($secreto, $_SESSION['usr']['id']);
        $cad_prid = '';
        $peso = 0;
        $portes = 0;

        foreach ($productos AS $producto){
            $portes = $producto['portescompra'];
            $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp;'.$producto['cantidad'] .' - ' .$producto['nombre'] .'<br>';           
            $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp; Total - ' .$producto['precio'] .'€<br>';
        }
        if($Empresa['factura'] == 1)
            $text = "la <strong>FACTURA</strong>";
        else
            $text = "el <strong>ALBARÁN</strong>";
            
        /* Extrae el precio desglosado */
        $totalSinEnvio = $eur - $portes;
        $baseImpText = $aux12;
        $baseImpPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.');
        $iva = $Empresa['impuesto'];
        $ivaPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.');
		
        $mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>'.$asunto.'</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<h2>'.$asunto.'</h2>
								<p>
									Hola '.$nombre.',<br />
									Has realizado una compra en la que realizarás el pago mediante tarjeta.<br />
								</p>
								<p>
									<strong>REFERENCIA</strong>: '.$secreto.'<br />
                                    <strong style="text-transform:uppercase;">'.$aux12.'</strong>:'.$baseImpPrice.' '.$_SESSION['moneda'].'<br />
                                    <strong>IVA ('.$iva.')%</strong>:'.$ivaPrice.' '.$_SESSION['moneda'].'<br />
                                    <strong>COSTE DEL ENVIO</strong>:'.number_format($portes, 2, ',', '.').' '.$_SESSION['moneda'].'<br />
									<strong>IMPORTE TOTAL</strong>: '.number_format($eur, 2, ',', '.').' '. $_SESSION['moneda'].'<br /><br />
                                                                        <strong>PRODUCTOS</strong>: <br> '.$cad_prid.'<br /><br />
								</p>
                                                                <p>
                                                                        Podrá descargar '.$text.' de nuestra web una vez procesado el pedido.
                                                                </p>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
        
        
		return $mensaje;
	}
        
        
    function ConstruirMsgDomiciliacion($nombre, $asunto, $dir, $eur, $secreto)
	{
		global $dbi, $Empresa;
        $draiz = getcwd();    
        include $draiz.'/secciones/auxiliares.php';     
        require_once('mod_cestaycompra.php');
        $productos = ProductosComprados($secreto, $_SESSION['usr']['id']);
        $cad_prid = '';
        $peso = 0;
        $portes = 0;

        foreach ($productos AS $producto){
            $portes = $producto['portescompra'];
            $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp;'.$producto['cantidad'] .' - ' .$producto['nombre'] .'<br>';           
            $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp; Total - ' .$producto['precio'] .'€<br>';
        }
        if($Empresa['factura'] == 1)
            $text = "la <strong>FACTURA</strong>";
        else
            $text = "el <strong>ALBARÁN</strong>";
            
        /* Extrae el precio desglosado */
        $totalSinEnvio = $eur - $portes;
        $baseImpText = $aux12;
        $baseImpPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.');
        $iva = $Empresa['impuesto'];
        $ivaPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.');
		
                $nentidad = $_SESSION['domiciliacion']['nentidad'];
                $iban = $_SESSION['domiciliacion']['iban'];
                $entidad = $_SESSION['domiciliacion']['entidad'];
                $oficina = $_SESSION['domiciliacion']['oficina'];
                $dc = $_SESSION['domiciliacion']['dc'];
                $ccc = $_SESSION['domiciliacion']['ccc'];
                $ccc2 = $_SESSION['domiciliacion']['ccc2'];
		
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>'.$asunto.'</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<h2>'.$asunto.'</h2>
								<p>
									Hola '.$nombre.',<br />
									Has realizado una compra en la que realizarás el pago mediante una domiciliación.<br />
								</p>
								<p>
									<strong>REFERENCIA</strong>: '.$secreto.'<br />
									<strong style="text-transform:uppercase;">'.$aux12.'</strong>:'.$baseImpPrice.' '.$_SESSION['moneda'].'<br />
                                    <strong>IVA ('.$iva.')%</strong>:'.$ivaPrice.' '.$_SESSION['moneda'].'<br />
                                    <strong>COSTE DEL ENVIO</strong>:'.number_format($portes, 2, ',', '.').' '.$_SESSION['moneda'].'<br />
									<strong>IMPORTE TOTAL</strong>: '.number_format($eur, 2, ',', '.').' '. $_SESSION['moneda'].'<br /><br />
                                                                        <strong>PRODUCTOS</strong>: <br> '.$cad_prid.'<br /><br />
                                                                        <h4>DATOS DE LA CUENTA</h4>
									<strong>ENTIDAD</strong>: '.$nentidad.'<br />
                                                                        <strong>NÚMERO</strong>: '.$iban.' '.$entidad.' '.$oficina.' '.$dc.' '.$ccc.' '.$ccc2.'<br />
								</p>
                                                                <p>
                                                                        Podrá descargar '.$text.' de nuestra web una vez procesado el pedido.
                                                                </p>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
        
        
		return $mensaje;
	}
	
	
	function ConstruirMsgContraReembolso($nombre, $asunto, $ccc, $eur, $secreto, $tasas)
	{
		global $dbi, $Empresa;
        $draiz = getcwd();    
        include $draiz.'/secciones/auxiliares.php';     
        require_once('mod_cestaycompra.php');
        $productos = ProductosComprados($secreto, $_SESSION['usr']['id']);
        $cad_prid = '';
        $peso = 0;
        $portes = 0;

        foreach ($productos AS $producto){
            $portes = $producto['portescompra'];
            $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp;'.$producto['cantidad'] .' - ' .$producto['nombre'] .'<br>';           
            $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp; Total - ' .$producto['precio'] .'€<br>';
        }
        if($Empresa['factura'] == 1)
            $text = "la <strong>FACTURA</strong>";
        else
            $text = "el <strong>ALBARÁN</strong>";
            
        /* Extrae el precio desglosado */
        $totalSinEnvio = $eur - $portes;
        $baseImpText = $aux12;
        $baseImpPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.');
        $iva = $Empresa['impuesto'];
        $ivaPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.');
		
		//number_format(($eur+$tasas), 2, ',', '.')
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>'.$asunto.'</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<h2>'.$asunto.'</h2>
								<p>
									Hola '.$nombre.',<br />
									Has realizado una compra con el método contrareembolso, por tanto, deberás pagar al momento de la entrega!<br />
								</p>
								<p>
									<strong>REFERENCIA</strong>: '.$secreto.'<br />
									<strong style="text-transform:uppercase;">'.$aux12.'</strong>:'.$baseImpPrice.' '.$_SESSION['moneda'].'<br />
                                    <strong>IVA ('.$iva.')%</strong>:'.$ivaPrice.' '.$_SESSION['moneda'].'<br />
                                    <strong>COSTE DEL ENVIO</strong>:'.number_format($portes, 2, ',', '.').' '.$_SESSION['moneda'].'<br />
									<strong>TASAS CONTRAREEMBOLSO</strong>: '.number_format($tasas, 2, ',', '.').' '. $_SESSION['moneda'].'<br />
									<strong>TOTAL A ABONAR</strong>: '.number_format($eur, 2, ',', '.').' '. $_SESSION['moneda'].'<br />
                                                                        <strong>PRODUCTOS/PRODUCTS</strong>: <br> '.$cad_prid.'
								</p>
                                                                <p>
                                                                        Podrá descargar '.$text.' de nuestra web una vez procesado el pedido.
                                                                </p>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
        
        
		return $mensaje;
	}
	
	
	function AvisarDeCompraAGestionar($tipoc, $secreto, $url)
	{
		global $dbi;
		
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>Nueva Compra para Gestionar</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<h2>Nueva Compra para Gestionar</h2>
								<p>
									Se ha realizado una compra con el método '.($tipoc == 'tie' ? 'EN TIENDA' : ($tipoc == 'ccc' ? 'TRANSFERENCIA' : ($tipoc == 'cre' ? 'CONTRAREEMBOLSO' : ($tipoc == 'dom' ? 'DOMICILIACIÓN' : ($tipoc == 'tpv' ? 'TARJETA' : ($tipoc == 'domfd' ? 'FINANCIACIÓN DIRECTA' : ($tipoc == 'domM' ? 'DOMICILIACIÓN MENSUAL' : 'PAYPAL/CRÉDITO/DÉBITO'))))))).', por tanto, deberás revisar el pedido en la administración de la tienda!<br />
								</p>
								<p>
									<strong>REFERENCIA</strong>: '.$secreto.'
								</p>
                                                                <p>
                                                                        Puede gestionar el pedido pinchando<strong> <a href="'.$url.'/back/compras_pendientes.php">aquí</a></strong>
                                                                </p>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
		
		return $mensaje;
	}
        
        
        function AvisarDeCompraAGestionarAfil($tipoc, $secreto, $url)
	{
		global $dbi;
		
		$mensaje = 
					'<!Doctype html>
					<html>
						<head>
							<meta charset="utf-8">
							<title>Nueva Compra para Gestionar</title>
						</head>
						<body>
							<div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
								<h2>Nueva Compra</h2>
								<p>
									Se ha realizado una compra con el método '.($tipoc == 'tie' ? 'EN TIENDA' : ($tipoc == 'ccc' ? 'TRANSFERENCIA' : ($tipoc == 'cre' ? 'CONTRAREEMBOLSO' : ($tipoc == 'dom' ? 'DOMICILIACIÓN' : ($tipoc == 'tpv' ? 'TARJETA' : ($tipoc == 'domfd' ? 'FINANCIACIÓN DIRECTA' : ($tipoc == 'domM' ? 'DOMICILIACIÓN MENSUAL' : 'PAYPAL/CRÉDITO/DÉBITO'))))))).'!<br />
								</p>
								<p>
									<strong>REFERENCIA</strong>: '.$secreto.'
								</p>
								<p>
									Cordiales saludos!
								</p>
								<p>
									Este es un mensaje enviado automáticamente, por favor, no responder!<br />
									Las respuestas a este mensaje no serán leídas por nadie.
								</p>
							</div>
						</body>
					</html>'
		;
		
		return $mensaje;
	}
        
        
        function ConstruirMsgCompra($nombre, $asunto, $eur, $secreto, $fpago)
        {
            global $dbi, $Empresa;
            $draiz = getcwd();    
            include $draiz.'/secciones/auxiliares.php';     
            require_once('mod_cestaycompra.php');
            $productos = ProductosComprados($secreto, $_SESSION['usr']['id']);
            $cad_prid = '';
            $peso = 0;
            $portes = 0;

            foreach ($productos AS $producto){
                $portes = $producto['portescompra'];
                $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp;'.$producto['cantidad'] .' - ' .$producto['nombre'] .'<br>';           
                $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp; Total - ' .$producto['precio'] .'€<br>';
            }
            if($Empresa['factura'] == 1)
                $text = "la <strong>FACTURA</strong>";
            else
                $text = "el <strong>ALBARÁN</strong>";
                
            /* Extrae el precio desglosado */
            $totalSinEnvio = $eur - $portes;
            $baseImpText = $aux12;
            $baseImpPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.');
            $iva = $Empresa['impuesto'];
            $ivaPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.');
		

            $mensaje = 
                        '<!Doctype html>
                        <html>
                            <head>
                                <meta charset="utf-8">
                                <title>'.$asunto.'</title>
                            </head>
                            <body>
                                <div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
                                    <h2>'.$asunto.'</h2>
                                    <p>
                                        Hola '.$nombre.',<br />
                                        Se ha realizado el cobro mediante '.$fpago.' de '.$eur.' €<br />
                                        Detalles de la compra:<br>
                                    </p>
                                    <p>
                                        <strong>REFERENCIA</strong>: '.$secreto.'<br />
                                        <strong style="text-transform:uppercase;">'.$aux12.'</strong>:'.$baseImpPrice.' '.$_SESSION['moneda'].'<br />
                                        <strong>IVA ('.$iva.')%</strong>:'.$ivaPrice.' '.$_SESSION['moneda'].'<br />
                                        <strong>COSTE DEL ENVIO</strong>:'.number_format($portes, 2, ',', '.').' '.$_SESSION['moneda'].'<br />
                                        <strong>IMPORTE TOTAL</strong>: '.number_format($eur, 2, ',', '.').' '. $_SESSION['moneda'].'<br /><br />
                                        <strong>PRODUCTOS</strong>: <br> '.$cad_prid.'
                                    </p>
                                    <p>
                                        Descargase '.$text.' pinchando<strong> <a href="'.$Empresa['url'].'/'.$_SESSION['lenguaje'].'imprimir_fact/'.$secreto.'">aquí</a></strong>
                                    </p>
                                    <p>
                                        Cordiales saludos!
                                    </p>
                                    <p>
                                        Este es un mensaje enviado automáticamente, por favor, no responder.<br />
                                        Las respuestas a este mensaje no serán leídas por nadie.
                                    </p>
                                </div>
                            </body>
                        </html>'
            ;
        
        
            return $mensaje;
        }
        
        
        function ConstruirMsgCompraPaypal($id, $nombre, $asunto, $eur, $secreto, $fpago)
        {
            global $dbi, $Empresa;
            $draiz = getcwd();    
            include $draiz.'/secciones/auxiliares.php';     
            require_once('mod_cestaycompra.php');
            $productos = ProductosComprados($secreto, $_SESSION['usr']['id']);
            $cad_prid = '';
            $peso = 0;
            $portes = 0;

            foreach ($productos AS $producto){
                $portes = $producto['portescompra'];
                $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp;'.$producto['cantidad'] .' - ' .$producto['nombre'] .'<br>';           
                $cad_prid .= '&nbsp;&nbsp;&nbsp;&nbsp; Total - ' .$producto['precio'] .'€<br>';
            }
            if($Empresa['factura'] == 1)
                $text = "la <strong>FACTURA</strong>";
            else
                $text = "el <strong>ALBARÁN</strong>";
                
            /* Extrae el precio desglosado */
            $totalSinEnvio = $eur - $portes;
            $baseImpText = $aux12;
            $baseImpPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.');
            $iva = $Empresa['impuesto'];
            $ivaPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($totalSinEnvio / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.');
            
            $mensaje = 
                        '<!Doctype html>
                        <html>
                            <head>
                                <meta charset="utf-8">
                                <title>'.$asunto.'</title>
                            </head>
                            <body>
                                <div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
                                    <h2>'.$asunto.'</h2>
                                    <p>
                                        Hola '.$nombre.',<br />
                                        Se ha realizado el cobro mediante '.$fpago.' de '.$eur.' €<br />
                                        Detalles de la compra:<br>
                                    </p>
                                    <p>
                                        <strong>REFERENCIA</strong>: '.$secreto.'<br />
                                        <strong style="text-transform:uppercase;">'.$aux12.'</strong>:'.$baseImpPrice.' '.$_SESSION['moneda'].'<br />
                                        <strong>IVA ('.$iva.')%</strong>:'.$ivaPrice.' '.$_SESSION['moneda'].'<br />
                                        <strong>COSTE DEL ENVIO</strong>:'.number_format($portes, 2, ',', '.').' '.$_SESSION['moneda'].'<br />
                                        <strong>IMPORTE TOTAL</strong>: '.number_format($eur, 2, ',', '.').' '. $_SESSION['moneda'].'<br /><br />
                                        <strong>PRODUCTOS</strong>: <br> '.$cad_prid.'
                                    </p>
                                    <p>
                                        Descargase '.$text.' pinchando<strong> <a href="'.$Empresa['url'].'/'.$_SESSION['lenguaje'].'imprimir_fact/'.$secreto.'">aquí</a></strong>
                                    </p>
                                    <p>
                                        Cordiales saludos!
                                    </p>
                                    <p>
                                        Este es un mensaje enviado automáticamente, por favor, no responder.<br />
                                        Las respuestas a este mensaje no serán leídas por nadie.
                                    </p>
                                </div>
                            </body>
                        </html>'
            ;
        
        
            return $mensaje;
        }
        
        
        function ConstruirMsgTPVVenta($nombre, $asunto, $eur, $secreto)
        {
            global $dbi, $Empresa;
            
            $mensaje = 
                        '<!Doctype html>
                        <html>
                            <head>
                                <meta charset="utf-8">
                                <title>'.$asunto.'</title>
                            </head>
                            <body>
                                <div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
                                    <h2>'.$asunto.'</h2>
                                    <p>
                                       Hola Administrador,<br />
                                       Han realizado el pago mediante TPV Virtual de '.$eur.' €<br />
                                       Detalles de la compra:<br>
                                    </p>
                                    <p>
                                        <strong>USUARIO</strong>: '.$nombre.'<br />
                                        <strong>REFERENCIA</strong>: '.$secreto.'<br />
                                        <strong>CANTIDAD</strong>: '.$eur.' €
                                    </p>
                                    <p>
                                        Puede gestionar el pedido pinchando<strong> <a href="'.$Empresa['url'].'/back/facturas.php">aquí</a></strong>
                                    </p>
                                    <p>
                                        Cordiales saludos!
                                    </p>
                                    <p>
                                        Este es un mensaje enviado automáticamente, por favor, no responder<br />
                                        Las respuestas a este mensaje no serán leídas por nadie.
                                    </p>
                                </div>
                            </body>
                        </html>'
            ;

            return $mensaje;
        }
        
        
        function ConstruirMsgAplazame($nombre, $asunto, $eur, $secreto)
        {
            global $dbi, $Empresa;
            
            $mensaje = 
                        '<!Doctype html>
                        <html>
                            <head>
                                <meta charset="utf-8">
                                <title>'.$asunto.'</title>
                            </head>
                            <body>
                                <div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
                                    <h2>'.$asunto.'</h2>
                                    <p>
                                       Hola Administrador,<br />
                                       Han realizado el pago mediante Aplazame de '.$eur.' €<br />
                                       Detalles de la compra:<br>
                                    </p>
                                    <p>
                                        <strong>USUARIO</strong>: '.$nombre.'<br />
                                        <strong>REFERENCIA</strong>: '.$secreto.'<br />
                                        <strong>CANTIDAD</strong>: '.$eur.' €
                                    </p>
                                    <p>
                                        Puede gestionar el pedido pinchando<strong> <a href="'.$Empresa['url'].'/back/facturas.php">aquí</a></strong>
                                    </p>
                                    <p>
                                        Cordiales saludos!
                                    </p>
                                    <p>
                                        Este es un mensaje enviado automáticamente, por favor, no responder<br />
                                        Las respuestas a este mensaje no serán leídas por nadie.
                                    </p>
                                </div>
                            </body>
                        </html>'
            ;

            return $mensaje;
        }
        
        
        function ConstruirMsgPaypalVenta($nombre, $asunto, $eur, $secreto)
        {
            global $dbi, $Empresa;

            $mensaje = 
                        '<!Doctype html>
                        <html>
                            <head>
                                <meta charset="utf-8">
                                <title>'.$asunto.'</title>
                            </head>
                            <body>
                                <div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
                                    <h2>'.$asunto.'</h2>
                                    <p>
                                       Hola Administrador,<br />
                                       Han realizado el pago mediante Paypal de '.$eur.' €<br />
                                       Detalles de la compra:<br>
                                    </p>
                                    <p>
                                        <strong>USUARIO</strong>: '.$nombre.'<br />
                                        <strong>REFERENCIA</strong>: '.$secreto.'<br />
                                        <strong>CANTIDAD</strong>: '.$eur.' €
                                    </p>
                                    <p>
                                        Puede gestionar el pedido pinchando<strong> <a href="'.$Empresa['url'].'/back/facturas.php">aquí</a></strong>
                                    </p>
                                    <p>
                                        Cordiales saludos!
                                    </p>
                                    <p>
                                        Este es un mensaje enviado automáticamente, por favor, no responder<br />
                                        Las respuestas a este mensaje no serán leídas por nadie.
                                    </p>
                                </div>
                            </body>
                        </html>'
            ;

            return $mensaje;
        }
        
        
        function ConstruirMsgRMA($asunto)
        {
            global $dbi, $Empresa;

            $mensaje = 
                        '<!Doctype html>
                        <html>
                            <head>
                                <meta charset="utf-8">
                                <title>'.$asunto.'</title>
                            </head>
                            <body>
                                <div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
                                    <h2>'.$asunto.'</h2>
                                    <p>
                                       Hola Administrador,<br />
                                       Han realizado una petición RMA<br />
                                    </p>
                                    <p>
                                        Puede gestionar el RMA pinchando<strong> <a href="'.$Empresa['url'].'/back/rma.php">aquí</a></strong>
                                    </p>
                                    <p>
                                        Cordiales saludos!
                                    </p>
                                    <p>
                                        Este es un mensaje enviado automáticamente, por favor, no responder<br />
                                        Las respuestas a este mensaje no serán leídas por nadie.
                                    </p>
                                </div>
                            </body>
                        </html>'
            ;

            return $mensaje;
        }
        
        
        function ConstruirCambioEstadoRMA($asunto, $estado, $cliente, $comentario = null)
        {
            global $dbi, $Empresa;
            
            if($comentario != ''){
                $com_a = '<p>El administrador ha añadido el siguiente comentario: <b>'.$comentario.'</b></p>';
            }

            $mensaje = 
                        '<!Doctype html>
                        <html>
                            <head>
                                <meta charset="utf-8">
                                <title>'.$asunto.'</title>
                            </head>
                            <body>
                                <div style="width: 100%; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
                                    <h2>'.$asunto.'</h2>
                                    <p>
                                       Hola '.$cliente.',<br />
                                       El estado de su petición RMA ha cambiado a <b>'.$estado.'</b><br />
                                    </p>
                                    '.$com_a.'
                                    <p>
                                        Cordiales saludos!
                                    </p>
                                    <p>
                                        Este es un mensaje enviado automáticamente, por favor, no responder<br />
                                        Las respuestas a este mensaje no serán leídas por nadie.
                                    </p>
                                </div>
                            </body>
                        </html>'
            ;

            return $mensaje;
        }
	
	
	function EnviarEmail($para, $asunto, $mensaje)
	{
		global $Empresa;
		if($Empresa['envimail'] == 0){
                    require_once('./scripts/PHPMailerAutoload.php');

                    $mail = new PHPMailer;
                    $mail->isSendmail();

                    //$mail->setFrom(implode(';', $para), 'First Last');
                    //$mail->addReplyTo($cc, '');
                    $mail->addAddress($para);
                    $mail->setFrom("$Empresa[email]", "$Empresa[nombre]");

                    $mail->Subject = $asunto;
                    $mail->IsHTML(true);
                    $mail->CharSet = "UTF-8";
                    $mail->msgHTML($mensaje);

                    if (!$mail->send())
                            return $mail->ErrorInfo;
                    else
                            return true;
                }else{
                    require_once('./scripts/class.phpmailer.php');
                    require_once('./scripts/class.smtp.php');

                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->Timeout=30;
                    $mail->CharSet = "UTF-8";

                    if ($Empresa['segSmtp'] == 0)
                        $seg = 'tls';
                    else
                        $seg = 'ssl';
        
                    $mail->SMTPSecure = $seg;
                    $mail->Host = $Empresa['hostSmtp'];
                    $mail->Port = $Empresa['puertoSmtp'];
                    $mail->Username   = $Empresa['mailSmtp'];
                    $mail->Password   = $Empresa['passSmtp'];

                    $mail->SetFrom("$Empresa[email]", "$Empresa[nombre]");
                    $mail->AddReplyTo("$Empresa[email]","$Empresa[nombre]");
                    $mail->AddAddress($para);

                    $mail->Subject = "$asunto";
                    $mail->AltBody = $mensaje;
                    $mail->MsgHTML("$mensaje.");
                    
                    $exito = $mail->send();

                    $intentos=1; 
                     while ((!$exito) && ($intentos < 2)) {
                            $exito = $mail->send();
                            $intentos=$intentos+1;    
                   }
                   if(!$exito)
                    {
                        //echo $mail->Host ." - ". $mail->Port ." - ". $mail->Username ." - ". $mail->Password."<br>";
                        //echo "Problemas enviando correo electrónico a ".$valor;
                        //echo "<br/>".$mail->ErrorInfo;  exit;
                        return $mail->ErrorInfo;
                    }
                    else
                    {
                        //echo "Mensaje enviado correctamente..."; exit;
                        return true;
                    }
                }
	}

	function EnviarEmailPresupuesto($para, $asunto, $mensaje, $de)
	{
		global $Empresa;
		if($Empresa['envimail'] == 0){
                    require_once('./scripts/PHPMailerAutoload.php');

                    $mail = new PHPMailer;
                    $mail->isSendmail();

                    //$mail->setFrom(implode(';', $para), 'First Last');
                    //$mail->addReplyTo($cc, '');
                    $mail->addAddress($para);
                    $mail->setFrom("$Empresa[email]", "$Empresa[nombre]");

                    $mail->Subject = $asunto;
                    $mail->IsHTML(true);
                    $mail->CharSet = "UTF-8";
                    $mail->msgHTML($mensaje);

                    if (!$mail->send())
                            return $mail->ErrorInfo;
                    else
                            return true;
                }else{
                    require_once('./scripts/class.phpmailer.php');
                    require_once('./scripts/class.smtp.php');

                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->Timeout=30;
                    $mail->CharSet = "UTF-8";

                    if ($Empresa['segSmtp'] == 0)
                        $seg = 'tls';
                    else
                        $seg = 'ssl';
        
                    $mail->SMTPSecure = $seg;
                    $mail->Host = $Empresa['hostSmtp'];
                    $mail->Port = $Empresa['puertoSmtp'];
                    $mail->Username   = $Empresa['mailSmtp'];
                    $mail->Password   = $Empresa['passSmtp'];

                    $mail->SetFrom("$Empresa[email]", "$Empresa[nombre]");
                    $mail->AddReplyTo("$Empresa[email]","$Empresa[nombre]");
                    $mail->AddAddress($para);

                    $mail->Subject = "$asunto";
                    $mail->AltBody = $mensaje;
                    $mail->MsgHTML("$mensaje.");
                    
                    $exito = $mail->send();

                    $intentos=1; 
                     while ((!$exito) && ($intentos < 2)) {
                            $exito = $mail->send();
                            $intentos=$intentos+1;    
                   }
                   if(!$exito)
                    {
                        //echo $mail->Host ." - ". $mail->Port ." - ". $mail->Username ." - ". $mail->Password."<br>";
                        //echo "Problemas enviando correo electrónico a ".$valor;
                        //echo "<br/>".$mail->ErrorInfo;  exit;
                        return $mail->ErrorInfo;
                    }
                    else
                    {
                        //echo "Mensaje enviado correctamente..."; exit;
                        return true;
                    }
                }
	}	
?>