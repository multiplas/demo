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
	
	
	function Compras($usuario)
	{
		global $dbi;
		$compras[] = null;
		
		$sql = "SELECT id, secreto, fecha
				FROM bd_compra
				WHERE idusuario=$usuario AND estado='pagado' ORDER BY fecha ASC;";
		
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
				$productos = array();
				$factura = null;
				$sql2 = "SELECT p.id AS id, p.imagenprincipal AS imagen, p.nombre AS nombre, p.peso AS peso, c.color AS color, c.talla AS talla, 
						c.cantidad AS cantidad 
						FROM bd_compra_productos c, bd_productos p
						WHERE c.idproducto=p.id AND c.idcompra=$assoc[id] ORDER BY p.nombre ASC;";
				$query2 = mysqli_query($dbi, $sql2);
				
				if (mysqli_num_rows($query) > 0)
				{
					while($assoc2 = mysqli_fetch_assoc($query2))
					{
						array_push($productos, 
							array(
								"id" => $assoc2['id'],
								"nombre" => $assoc2['nombre'],
								"imagen" => $assoc2['imagen'],
								"peso" => $assoc2['peso'],
								"talla" => ($assoc2['talla'] != null) ? $assoc2['talla'] : 'SIN TALLA',
								"color" => ($assoc2['color'] != null) ? $assoc2['color'] : 'SIN COLOR',
								"cantidad" => $assoc2['cantidad']
							)
						);
					}
					
				}
				
				$sql2 = "SELECT CONCAT(ano, id) AS numero, fecha
						FROM bd_facturas
						WHERE sesion='$assoc[secreto]';";
				$query2 = mysqli_query($dbi, $sql2);
				if (mysqli_num_rows($query2) > 0)
				{
					$assoc2 = mysqli_fetch_assoc($query2);
					$factura = array
					(
						"numero" => $assoc2['numero'],
						"fecha" => $assoc2['fecha']
					);
				}
				
				array_push($compras, 
					array(
						"id" => $assoc['id'],
						"fecha" => $assoc['fecha'],
						"secreto" => $assoc['secreto'],
						"productos" => $productos,
						"factura" => $factura
					)
				);
			}
			
			unset($compras[0]);
			$compras = array_values($compras);
			
			
		}
		else
			$compras = null;
		
		return $compras;
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
	
	
	function Cesta($usuario)
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
						"cantidad" => $assoc['cantidad']
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
							"cantidad" => 1
						)
					);
			
			unset($cesta[0]);
			$cesta = array_values($cesta);
		}
		else
			$cesta = null;
		
		return $cesta;
	}
	
	
	function CestaSession($array)
	{
		global $dbi;
		$cesta[] = null;
		$desporcan = 0;
		
		if (count($array) > 0)
		{
			foreach($array AS $assoc)
			{
				$desporcan += $assoc['cantidad'];
				$p = Producto($assoc['pid'], @$assoc['talla']);
				
				$precioy = (strpos($assoc['color'], '][') === false ? (strpos($assoc['color'], '[') === false ? $p['precio'] : $p['precio'] + 5) : $p['precio'] + 8);
				array_push($cesta, 
					array(
						"id" => $assoc['pid'],
						"nombre" => $p['nombre'],
						"imagen" => $p['imagen'],
						"peso" => $p['peso'],
						"talla" => $assoc['talla'],
						"color" => $assoc['color'],
						"precio" => number_format($precioy, 2, '.', ','),
						"cantidad" => $assoc['cantidad']
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
							"cantidad" => 1
						)
					);
			unset($cesta[0]);
			$cesta = array_values($cesta);
		}
		else
			$cesta = null;
		
		return $cesta;
	}
	
	
	function CestaAddProduct($pid, $uid, $talla, $color, $nombre, $numero, $cantidad = 1, $descesses = false)
	{
		global $dbi;
		$insert = -1;
		
		$nombre = mysqli_real_escape_string($dbi, htmlspecialchars($nombre));
		$numero = mysqli_real_escape_string($dbi, htmlspecialchars($numero));
		$color = mysqli_real_escape_string($dbi, htmlspecialchars($color));
		
		if (!$descesses)
		{
			$nombre = $nombre != '' ? '['.$nombre.']' : $nombre;
			$nombre = $numero != '' ? $nombre.'['.$numero.']' : $nombre;
			$nombre = $color != '' ? $nombre.'['.$color.']' : $nombre;
		}
		
		$sql = "SELECT id
				FROM bd_carrito 
				WHERE idproducto = $pid
				AND talla = '$talla'
				AND color = '$nombre';";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
			$sql = "UPDATE bd_carrito
					SET cantidad = cantidad + $cantidad
					WHERE idproducto = $pid
					AND talla = '$talla'
					AND color = '$nombre'";
		else
			$sql = "INSERT INTO bd_carrito 
					VALUES(null, 0, '$pid', 0, '', $cantidad, 0, 0, '', '', NOW(), 
					NOW(), $uid, '', '$talla', '$nombre');";
		$query = mysqli_query($dbi, $sql);
		if ($query)
			$insert = 1;
		
		return $insert;
	}
	
	
	function CestaSessionAddProduct($pid, $uid, $talla, $color, $nombre, $numero, $cantidad = 1)
	{
		$insert = -1;
		
		$nombre = $nombre != '' ? '['.$nombre.']' : $nombre;
		$nombre = $numero != '' ? $nombre.'['.$numero.']' : $nombre;
		$nombre = $color != '' ? $nombre.'['.$color.']' : $nombre;
		
		$dupli = false;
		for ($i = 0; $i < count($_SESSION['cestases']); $i++)
			if ($_SESSION['cestases'][$i]['pid'] == $pid && $_SESSION['cestases'][$i]['talla'] == $talla && $_SESSION['cestases'][$i]['color'] == $nombre)
			{
				$_SESSION['cestases'][$i]['cantidad'] += $cantidad;
				$dupli = true;
				break;
			}
		
		if (!$dupli)
			$_SESSION['cestases'][] = array
			(
				'pid' => $pid,
				'usid' => $uid,
				'talla' => $talla,
				'color' => $nombre,
				'cantidad' => $cantidad
			);
							
		$insert = 1;
		
		return $insert;
	}
	
	
	function CestaRemoveProduct($pid, $talla, $color, $uid)
	{
		global $dbi;
		$delete = -1;
		
		$sql = "DELETE FROM bd_carrito 
				WHERE idproducto=$pid AND idusuario=$uid AND talla='$talla' AND color='$color';";
		$query = mysqli_query($dbi, $sql);
		if ($query)
			$delete = 1;
		
		return $delete;
	}
	
	
	function CestaSessionRemoveProduct($pid, $talla, $color, &$array)
	{
		for ($i = 0; $i < count($array); $i++)
			if ($array[$i]['pid'] == $pid && $array[$i]['talla'] == $talla && $array[$i]['color'] == $color)
			{
				unset($array[$i]);
				$delete = 1;
			}
			$array = array_values($array);
		return $delete;
	}
	
	
	function CestaActProduct($pid, $cantidad, $talla, $color, $uid)
	{
		global $dbi;
		$delete = -1;
		
		$sql = "UPDATE bd_carrito 
				SET cantidad=$cantidad
				WHERE idproducto=$pid AND idusuario=$uid AND talla='$talla' AND color='$color';";
				echo $sql;
		$query = mysqli_query($dbi, $sql);
		if ($query)
			$delete = 1;
		
		return $delete;
	}
	
	
	function CestaSessionActProduct($pid, $cantidad, $talla, $color, &$array)
	{
		for ($i = 0; $i < count($array); $i++)
			if ($array[$i]['pid'] == $pid && $array[$i]['talla'] == $talla && $array[$i]['color'] == $color)
			{
				$array[$i]['cantidad'] = $cantidad;
				$delete = 1;
			}
		
		return $delete;
	}
	
	
	function CestaSessionACestaUsuario($uid, &$array)
	{
		for ($i = 0; $i < count($array); $i++)
			$delete = CestaAddProduct($array[$i]['pid'], $uid, $array[$i]['talla'], $array[$i]['color'], '', '', $array[$i]['cantidad'], true);
		
		if ($delete)
			$array = null;
		
		return $delete;
	}
	
	
	function PacksSessionAPacksUsuario($uid, &$array)
	{
		foreach ($array AS $arr)
			$delete = CrearPack($arr['descripcion'], $arr['nombre'], Array($arr['prs1'], $arr['prs2'], $arr['prs3'], $arr['prs4'], $arr['prs5'], $arr['prs6'], $arr['prs7'], $arr['prs8'], $arr['prs9'], $arr['prs10']), $uid);
		
		if ($delete)
			$array = null;
		return $delete;
	}
		
	
	
	function DireccionDeCompra($secreto)
	{
		global $dbi;
		$direccion = null;
		
		$sql = "SELECT CONCAT_WS (', ', direccion, localidad, provincia, pais, cp) AS direccion
				FROM bd_compra_direccion
				WHERE idcompra = (SELECT id FROM bd_compra WHERE secreto = '$secreto');";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
			$direccion = $assoc['direccion'];
		}
		
		return $direccion;
	}
	
	
	function Factura($fsec, $uid)
	{
		global $dbi;
		$factura[] = null;
		
		$sql = "SELECT f.id, f.total, f.subtotal, f.fecha, f.formapago, f.ano, u.nombre AS nombre, u.dni AS dni, u.direccion AS direccion, f.preciotransporte AS portes, f.descuento AS descuento
				FROM bd_facturas f, bd_users u
				WHERE f.idusuario=u.id AND f.sesion='$fsec' AND u.id=$uid;";
				
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$podireccion = DireccionDeCompra($fsec);
			while($assoc = mysqli_fetch_assoc($query))
				array_push($factura, 
					array(
						"id" => $assoc['id'],
						"total" => number_format($assoc['total'], 2, '.', ','),
						"subtotal" => number_format($assoc['subtotal'], 2, '.', ','),
						"descuento" => number_format($assoc['descuento'], 2, '.', ','),
						"fecha" => $assoc['fecha'],
						"forma" => $assoc['formapago'],
						"ano" => $assoc['ano'],
						"portes" => number_format($assoc['portes'], 2, '.', ','),
						"nombre" => $assoc['nombre'],
						"direccion" => $podireccion != null ? $podireccion : $assoc['direccion'],
						"dni" => $assoc['dni']
					)
				);
			unset($factura[0]);
			$factura = array_values($factura);
		}
		else
			$factura = null;
		
		return $factura[0];
	}
	
	
	function ProductosComprados($fsec, $uid)
	{
		global $dbi;
		$productos[] = null;
		$preciot = 0;
		
		$sql = "SELECT p.id AS id, p.nombre AS nombre, c.talla AS talla, c.color AS color, c.descuento AS descuento, 
				(p.precio * ((p.iva + 100) / 100) - (p.precio * (p.descuento / 100))) AS precio, c.cantidad AS cantidad 
				FROM bd_compra_productos c, bd_productos p
				WHERE c.idproducto=p.id AND idcompra=(SELECT id FROM bd_compra WHERE secreto='$fsec' AND idusuario=$uid) ORDER BY p.nombre ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
				array_push($productos, 
					array(
						"id" => $assoc['id'],
						"nombre" => $assoc['nombre'],
						"extra" => $assoc['descuento'] > 0 ? ' <em style="color: #D55; font-size: 9px;">('.$assoc['descuento'].'% descuento)</em>' : null,
						"talla" => $assoc['talla'],
						"color" => $assoc['color'],
						"precio" => number_format($assoc['precio'] * ((100 - $assoc['descuento']) / 100), 2, '.', ','),
						"descantidad" => $assoc['descuento'],
						"cantidad" => $assoc['cantidad']
					)
				);
				$preciot += number_format(($assoc['precio'] * ((100 - $assoc['descuento']) / 100)) * $assoc['cantidad'], 2, '.', ',');
			}
			unset($productos[0]);
			$productos = array_values($productos);
		}
		else
			$productos = null;
		
		$sql = "SELECT c.idproducto AS id, c.talla AS talla, c.color AS color, c.descuento AS descuento, 
				c.cantidad AS cantidad 
				FROM bd_compra_productos c
				WHERE idcompra=(SELECT id FROM bd_compra WHERE secreto='$fsec' AND idusuario=$uid)
				AND c.idproducto = 0;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($productos, 
					array(
						"id" => $assoc['id'],
						"nombre" => 'Descuento por cantidad',
						"extra" => $assoc['descuento'] > 0 ? ' <em style="color: #D55; font-size: 9px;">('.$assoc['descuento'].'% descuento)</em>' : null,
						"talla" => $assoc['talla'],
						"color" => $assoc['color'],
						"precio" => '-'.number_format($preciot * (($assoc['descuento']) / 100), 2, '.', ','),
						"descantidad" => $assoc['descuento'],
						"cantidad" => $assoc['cantidad']
					)
				);
		}
		
		return $productos;
	}
?>