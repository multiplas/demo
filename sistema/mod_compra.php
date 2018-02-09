<?php
	function CalculaPortes($peso, $precio, $reg)
	{
		global $dbi;
		
		if ($reg == null || $reg == '')
			$reg = 'ESP';
		
		$portes = 0;
		
		$sql = "SELECT MIN(precio) AS portes, max
				FROM bd_portes 
				WHERE region = '$reg'
				AND max > $precio;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
			$portes = $assoc['portes'] != null ? $assoc['portes'] : ($assoc['max'] > $precio ? 'Consultar' : 0);
		}
		
		return $portes;
	}
	
	
	function DescuentoPorCantidad($cantidad)
	{
		global $dbi;
		$des = 0;
		
		$sql = "SELECT descuento
				FROM bd_descuentos
				WHERE cantidad <= $cantidad
				ORDER BY descuento DESC
				LIMIT 1;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			$assoc = mysqli_fetch_assoc($query);
			$des = $assoc['descuento'];
		}
		
		return $des;
	}
	
	
	function Abono($usuario)
	{
		global $dbi;
		$abono = 0;
		
		if ($_SESSION['usr'] != null)
		{
			$sql = "SELECT abono
					FROM bd_abono
					WHERE idusuario=$usuario;";
			$query = mysqli_query($dbi, $sql);
			if (mysqli_num_rows($query) > 0)
			{
				while($assoc = mysqli_fetch_assoc($query))
					$abono += $assoc['abono'];
			}
		}
		
		return $abono;
	}
	
	
	function Pedido($usuario)
	{
		global $dbi;
		$cesta[] = null;
		$desporcan = 0;
		
		$sql = "SELECT p.id AS id, p.imagenprincipal AS imagen, p.nombre AS nombre, p.peso AS peso, c.talla AS talla, c.color AS color, 
				(p.precio * ((p.iva + 100) / 100) - (p.precio * (p.descuento / 100))) AS precio, SUM(c.cantidad) AS cantidad, p.descuentoe AS descuentoe 
				FROM bd_carrito c, bd_productos p
				WHERE c.idproducto=p.id AND idusuario=$usuario GROUP BY p.id, c.talla, c.color ORDER BY c.fecha, p.nombre ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
				$desporcan += $assoc['cantidad'];
				$precioy = ($assoc['precio'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0));
				$precioy = (strpos($assoc['color'], '][') === false ? (strpos($assoc['color'], '[') === false ? $precioy : $precioy + 5) : $precioy + 8);
				array_push($cesta, 
					array(
						"id" => $assoc['id'],
						"nombre" => $assoc['nombre'],
						"imagen" => $assoc['imagen'],
						"peso" => $assoc['peso'],
						"talla" => $assoc['talla'],
						"color" => $assoc['color'],
						"precio" => number_format($precioy, 2, '.', ','),
						"cantidad" => $assoc['cantidad'],
						"descuento" => 0
					)
				);
				$preciototal += ($precioy * $assoc['cantidad']);
			}
			
			$desporcan = DescuentoPorCantidad($desporcan);
			if ($desporcan > 0)
				array_push($cesta, 
						array(
							"id" => 0,
							"nombre" => 'Descuento por cantidad -'.$desporcan.'%',
							"imagen" => 'des'.$desporcan.'px.png',
							"peso" => 0,
							"talla" => '',
							"color" =>'',
							"precio" => '-'.number_format($preciototal * ($desporcan / 100), 2, '.', ','),
							"cantidad" => 1,
							"descuento" => 0
						)
					);
			
			unset($cesta[0]);
			$cesta = array_values($cesta);
		}
		else
			$cesta = null;
		
		return $cesta;
	}
	
	
	function CrearUnaCompraPendiente($uid, $secreto, $estado = 'pendiente de pago', $dir = null)
	{
		global $dbi, $Empresa;
		
		$compraid = -1;
		$pedido = Pedido($uid);
		$precio = 0;
		$peso = 0;
		$portes = 0;
		
		foreach($pedido AS $producto)
		{
			$precio += $producto['precio'] * $producto['cantidad'];
			$peso += /*$producto['peso'] * $producto['cantidad']*/0;
		}
		
		$precio = $precio - Abono(@$uid);
		$portes += CalculaPortes($peso, $precio, $dir[5]);
		
		$sql = "INSERT INTO bd_compra 
				VALUES(null, $uid, '$precio', '$portes', NOW(), '$secreto', '');";
		$query = mysqli_query($dbi, $sql);
		if ($query)
			$compraid = mysqli_insert_id($dbi);
		
		if ($compraid >= 0)
		{
			if (count($pedido) > 0)
			{
				foreach($pedido AS $producto)
				{
					$sql = "INSERT INTO bd_compra_productos 
							VALUES(null, $compraid, $producto[id], $producto[cantidad], $producto[descuento], '$producto[talla]', '$producto[color]');";
					$query = mysqli_query($dbi, $sql);
					if (!$query)
						$precio = -1;
				}
			}
			
			if ($dir != null)
			{
				$sql = "INSERT INTO bd_compra_direccion
						VALUES($compraid, '$dir[0]', '$dir[1]', '$dir[2]', '$dir[3]', '$dir[4]');";
				$query = mysqli_query($dbi, $sql);
			}
			
			if ($compraid >= 0)
			{
				$sql = "DELETE FROM bd_carrito 
						WHERE idusuario=$uid;";
				$query = mysqli_query($dbi, $sql);
				$sql = "DELETE FROM bd_abono
						WHERE idusuario=$uid;";
				$query = mysqli_query($dbi, $sql);
				$sql = "UPDATE bd_compra
						SET estado='$estado'
						WHERE id=$compraid;";
				$query = mysqli_query($dbi, $sql);
			}
		}
		if ($compraid < 0)
			$precio = -1;
		
		return $precio + $portes;
	}
	
	
	function RealizarCompra($uid, $secreto)
	{
		global $dbi, $Empresa;
		
		$facturaid = 1;
		
		$sql = "UPDATE bd_compra
				SET estado='pagado'
				WHERE secreto='$secreto';";
		$query = mysqli_query($dbi, $sql);
		if (!$query)
			$facturaid = -1;
		
		$sql = "SELECT precio, portes 
				FROM bd_compra 
				WHERE secreto='$secreto';";
				
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
			$sql = "INSERT INTO bd_facturas 
					VALUES(null, null, ($assoc[precio] + $assoc[portes]), $assoc[precio], null, ".Abono(@$uid).", $assoc[portes], $uid, NOW(), 'paypal', null, null, null, '$secreto', '', null, null, '".date('Y')."', null, null, null, null, null);";
			$query = mysqli_query($dbi, $sql);
			if (!$query)
				$facturaid = -1;
			else
				$facturaid = mysqli_insert_id($dbi);
			
			$sql = "SELECT idproducto, cantidad 
					FROM bd_compra_productos 
					WHERE idcompra=(
						SELECT id 
						FROM bd_compra 
						WHERE secreto='$secreto'
					);";
			$query = mysqli_query($dbi, $sql);
			if (mysqli_num_rows($query) > 0)
				while($assoc = mysqli_fetch_assoc($query))
				{
					$sql2 = "UPDATE bd_productos
							SET unidades=unidades-$assoc[cantidad]
							WHERE id=$assoc[idproducto];";
					$query2 = mysqli_query($dbi, $sql2);
					$sql3 = "INSERT INTO bd_productos_vendidos 
							VALUES($assoc[idproducto], $assoc[cantidad]);";
					$query3 = mysqli_query($dbi, $sql3);
					$sql4 = "UPDATE bd_productos_vendidos
							SET ventas=ventas+$assoc[cantidad]
							WHERE id_producto=$assoc[idproducto];";
					$query4 = mysqli_query($dbi, $sql4);
					
					if (!$query2 || !$query3 || !$query4)
						$prod = -1;
				}
		}
		else
			$facturaid = -1;
		
		if ($facturaid != -1)
		{
			$campos['asunto'] = 'Nueva Compra para Gestionar';
			$campos['mensaje'] = AvisarDeCompraAGestionar('pyp', $secreto);
			$a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
		}
		
		return $facturaid;
	}
	
	
	function PagarConTarjetaTPV()
	{
		global $Empresa;
		require_once('./sistema/mod_contacto.php');
		
		$secreto = str_pad($_SESSION['usr']['id'], 4, '0', STR_PAD_LEFT).substr(microtime(), -8);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $secreto, 'pendiente de pago', array ($_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']));
		$urlNotificacion = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=pagook&uid='.$_SESSION['usr']['id'].'&ses='.$_SESSION['usr']['sesion'].'&secreto='.$secreto;
		$linkReturn = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=return&uid='.$_SESSION['usr']['id'].'&secreto='.$secreto.'&ses='.$_SESSION['usr']['sesion'];
		$linkCancel = $linkReturn;

		// Valores constantes del comercio
		//$url_tpvv='https://sis.redsys.es/sis/realizarPago'; // URL REAL
		$url_tpvv='https://sis-t.redsys.es:25443/sis/realizarPago'; // URL DE PRUEBAS
		
		//$clave='240045542abc';
		$clave='qwertyasdf0123456789';

		$name='PROFUTBOL S.L.';
		$code='046083960';
		$terminal='1';
		$order = $secreto;
		//NUMERO SIN DECIMALES MULTIPLICADO POR 100 CON 2 DECIMALES
		//$amount=$_POST["totalfactura"];
		$amount=$precio;
		$amount = $amount*100;
		$currency='978';
		$transactionType='0';
		$urlSi = $linkReturn;
		$urlNo = $linkCancel;

		$urlMerchant=$urlNotificacion;

		echo "<form name=compra action='$url_tpvv' id=\"tpvpfrsys\" name=\"tpvpfrsys\" method=post>";
		?>
			  <input name="totalfactura" type="hidden" id="totalfactura" value=<?php echo "\"$totalfactura\""; ?> />

		<?php 
		echo "<input type=hidden name=Ds_Merchant_Amount value='$amount'>
		<input type=hidden name=Ds_Merchant_MerchantCode value='$code'>
		<input type=hidden name=Ds_Merchant_Currency value='$currency'>
		<input type=hidden name=Ds_Merchant_Order  value='$order'>
		<input type=hidden name=Ds_Merchant_Terminal value='$terminal'>
		<input type=hidden name=Ds_Merchant_TransactionType value='$transactionType'>
		<input type=hidden name=Ds_Merchant_MerchantURL value='$urlMerchant'>";

		echo '<input type="hidden" name="Ds_Merchant_UrlOK" value="'.$urlSi.'" />
		<input type="hidden" name="Ds_Merchant_UrlKO" value="'.$urlNo.'" />';
		 
		// Compute hash to sign form data
		// $signature=sha1_hex($amount,$order,$code,$currency,$clave);
		$message = $amount.$order.$code.$currency.$transactionType.$urlMerchant.$clave;
		$signature = strtoupper(sha1($message));

		echo "<input type=hidden name=Ds_Merchant_MerchantSignature value='$signature'>
		 <!--<input type='submit' id=\"submitButton\" value='Realizar el pago de $precio &euro;' style=\"width: 180px; height:40px;float: left; padding:10px;\"></a> -->
		 
		</form>";
		echo '<script>document.forms["tpvpfrsys"].submit();</script>';
	}
	
	
	function PagarConPaypal()
	{
		global $Empresa;
		require_once('./sistema/mod_contacto.php');
		
		$secreto = uniqid();
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $secreto, 'pendiente de pago', array ($_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']));
		
		// CALCULO DE PRECIO Y ASIGNACIÓN DE VARIABLES PAYPAL
		require_once('./componentes/paypal/paypal.class.php');

		$p = new paypal_class;             // initiate an instance of the class
		$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url

		$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$urlNotificacion = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=pagook&amp;uid='.$_SESSION['usr']['id'].'&amp;ses='.$_SESSION['usr']['sesion'].'&amp;secreto='.$secreto;
		$linkReturn = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=return&amp;uid='.$_SESSION['usr']['id'].'&amp;secreto='.$secreto.'&amp;ses='.$_SESSION['usr']['sesion'];
		$linkCancel = $linkReturn;
		
		// EJECUCIÓN PARA PAYPAL
		$p->add_field('business', $Empresa['paypal']);
		$p->add_field('return', $linkReturn);
		$p->add_field('cancel_return', $linkCancel);
		$p->add_field('notify_url', $urlNotificacion);
		$p->add_field('item_name', $Empresa['nombre'].'('.$secreto.')');
		$p->add_field('lc', 'ES');
		$p->add_field('currency_code','EUR');
		//$p->add_field('currency_code','USD');
		$p->add_field('amount', $precio);
		
		$p->submit_paypal_post();
	}
	
	
	function PagarConTransferencia()
	{
		global $Empresa;
		require_once('./sistema/mod_contacto.php');
		
		$secreto = uniqid();
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $secreto, 'transferencia', array ($_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']));
		$campos['asunto'] = 'Pago para compra de '.$Empresa['nombre'];
		$campos['mensaje'] = ConstruirMsgTransferencia($_SESSION['usr']['nombre'], $campos['asunto'], $Empresa['cuenta'], $precio, $secreto);
		$a = EnviarEmail($_SESSION['usr']['email'], $campos['asunto'], $campos['mensaje']);
		
		$campos['asunto'] = 'Nueva Compra para Gestionar';
		$campos['mensaje'] = AvisarDeCompraAGestionar('ccc', $secreto);
		$a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
		header('Location: /transferencia');
	}
	
	
	function PagarContraReembolso()
	{
		global $Empresa;
		require_once('./sistema/mod_contacto.php');
		
		$secreto = uniqid();
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $secreto, 'contrareembolso', array ($_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']));
		$campos['asunto'] = 'Pago para compra de '.$Empresa['nombre'];
		$campos['mensaje'] = ConstruirMsgContraReembolso($_SESSION['usr']['nombre'], $campos['asunto'], $Empresa['cuenta'], $precio, $secreto, $Empresa['contrareembolso']);
		$a = EnviarEmail($_SESSION['usr']['email'], $campos['asunto'], $campos['mensaje']);

		$campos['asunto'] = 'Nueva Compra para Gestionar';
		$campos['mensaje'] = AvisarDeCompraAGestionar('cre', $secreto);
		$a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
		header('Location: /contrareembolso');
	}
?>