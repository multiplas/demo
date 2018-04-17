<?php
	$paginas = 1;
	
	
	function Abonar($uid, $cantidad)
	{
		global $dbi;
		$insert = -1;
		
		$sql = "SELECT idusuario
				FROM bd_abono
				WHERE idusuario = $uid;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
			$sql = "UPDATE bd_abono
					SET abono = abono + $cantidad
					WHERE idusuario = $uid";
		else
			$sql = "INSERT INTO bd_abono
					VALUES($uid, $cantidad);";
		$query = mysqli_query($dbi, $sql);
		if ($query)
			$insert = 1;
		
		return $insert;
	}
	
	
	function Opinar($pid, $uid, $opinion, $nombre)
	{
		global $dbi;
		$insert = -1;
		
		$opinion = mysqli_real_escape_string($dbi, htmlspecialchars($opinion));
		$pid = mysqli_real_escape_string($dbi, htmlspecialchars($pid));
		
		$sql = "INSERT INTO bd_producto_opinion
				VALUES($pid, $uid, NOW(), '$opinion', '$nombre', 0);";
		$query = mysqli_query($dbi, $sql);
		if ($query)
		{
			$insert = 1;
			Abonar($uid, 1);
		}
		
		return $insert;
	}
	
	
	function CrearPack($des, $nombre, $prs, $uid)
	{
		global $dbi;
		$insert = -1;
		
		for ($i = 0; $i < count($prs); $i++)
			$prs[$i] = $prs[$i] != null ? $prs[$i] : 'null';
		
		$des = mysqli_real_escape_string($dbi, htmlspecialchars($des));
		$nombre = mysqli_real_escape_string($dbi, htmlspecialchars($nombre));
		
		$sql = "INSERT INTO bd_pack
				VALUES(null, '$nombre', '$des', $prs[0], $prs[1], $prs[2], $prs[3], $prs[4], $prs[5], $prs[6], $prs[7], $prs[8], $prs[9], 0, $uid);";
		$query = mysqli_query($dbi, $sql);
		if ($query)
		{
			$insert = 1;
			Abonar($uid, 1);
		}
		
		return $insert;
	}
	
	
	function CrearPackSession($des, $nombre, $prs, &$packarr)
	{
		global $dbi;
		include_once ('./sistema/mod_cesta.php');
		$insert = -1;
		
		$desporcan = 0;
		for ($i = 0; $i < 10; $i++)
			if ($prs[$i] != null)
				$desporcan++;
			
		$ids = '';
		$precio = 0;
		$productos = Array();
		
		for ($i = 0; $i < 10; $i++)
			if ($prs[$i] != null)
				$ids .=  ','.$prs[$i];
			
		$ids = strlen($ids) > 0 ? substr($ids, 1) : '';
				
		$aridr = split(',', $ids);
		$ari = array();
		for ($i = 0; $i < count($aridr); $i++)
		{
			$con = 0;
			for ($j = 0; $j < count($aridr); $j++)
				if ($aridr[$i] == $aridr[$j])
					$con++;
			$ari[$aridr[$i]] = $con;
		}

		$sql2 = "SELECT id, nombre, precio * ((100 - descuento) / 100) * (iva / 100 + 1) AS precio
				FROM bd_productos
				WHERE id IN ($ids);";
		$query2 = mysqli_query($dbi, $sql2);
		if (mysqli_num_rows($query2) > 0)
		{
			while ($assoc2 = mysqli_fetch_assoc($query2))
			{
				$precio += ($assoc2['precio']) * $ari[$assoc2['id']];
				$productos[] = Array ('id' => $assoc2['id'], 'nombre' => $assoc2['nombre'].'<span style="color: #C00; margin-left: 15px;">x'.$ari[$assoc2['id']].'</span>');
			}
		}
		
		$packarr[] = array
		(
			'id' => count($packarr) + 1,
			'nombre' => $nombre,
			'descripcion' => $des,
			'productos' => $productos,
			'idpr1' => $prs[0],
			'idpr2' => $prs[1],
			'idpr3' => $prs[2],
			'idpr4' => $prs[3],
			'idpr5' => $prs[4],
			'idpr6' => $prs[5],
			'idpr7' => $prs[6],
			'idpr8' => $prs[7],
			'idpr9' => $prs[8],
			'idpr10' => $prs[9],
			'descuento' => DescuentoPorCantidad($desporcan),
			'precio_ant' => floatval($precio),
			'precio' => $precio
		);
		
		$insert = 1;
		return $insert;
	}
	
	
	function Packs($page = 0)
	{
		global $dbi;
		include_once ('./sistema/mod_cesta.php');
		
		$page--;
		if ($page < 0)
			$page = 0;
		
		$page *= 9;
		
		$packs = Array();
		$sql = "SELECT *
				FROM bd_pack
				ORDER BY nombre ASC
				LIMIT $page, 10;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while ($assoc = mysqli_fetch_assoc($query))
			{
				array_push($packs,
					Array
					(
						'id' => $assoc['id'],
						'nombre' => $assoc['nombre'],
						'descripcion' => $assoc['descripcion'],
						'unidades' => $assoc['unidades'],
						'descuento' => DescuentoPorCantidad($assoc['unidades']),
						'precio' => $assoc['precio'],
						'imagen' => $assoc['imagen']
					)
				);
			}
		}
		return $packs;
	}
	
	
	function PacksP($uid)
	{
		global $dbi;
		include_once ('./sistema/mod_cesta.php');
		
		$packs = Array();
		$sql = "SELECT *
				FROM bd_pack
				WHERE uid = $uid
				ORDER BY id DESC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while ($assoc = mysqli_fetch_assoc($query))
			{
				$ids = '';
				$precio = 0;
				
				for ($i = 1; $i < 11; $i++)
					if ($assoc['idpr'.$i] != null)
						$ids .=  ','.$assoc['idpr'.$i];
					
				$ids = strlen($ids) > 0 ? substr($ids, 1) : '';
				
				$aridr = split(',', $ids);
				$ari = array();
				for ($i = 0; $i < count($aridr); $i++)
				{
					$con = 0;
					for ($j = 0; $j < count($aridr); $j++)
						if ($aridr[$i] == $aridr[$j])
							$con++;
					$ari[$aridr[$i]] = $con;
				}
				
				$sql2 = "SELECT id, precio * ((100 - descuento) / 100) * (iva / 100 + 1) AS precio
						FROM bd_productos
						WHERE id IN ($ids);";
				$query2 = mysqli_query($dbi, $sql2);
				if (mysqli_num_rows($query2) > 0)
				{
					while ($assoc2 = mysqli_fetch_assoc($query2))
						$precio += ($assoc2['precio']) * $ari[$assoc2['id']];
				}
				
				$desporcan = 0;
				for ($i = 1; $i <= 10; $i++)
					if ($assoc['idpr'.$i] != null)
						$desporcan++;
				
				array_push($packs,
					Array
					(
						'id' => $assoc['id'],
						'nombre' => $assoc['nombre'],
						'descripcion' => $assoc['descripcion'],
						'idpr1' => $assoc['idpr1'],
						'idpr2' => $assoc['idpr2'],
						'idpr3' => $assoc['idpr3'],
						'idpr4' => $assoc['idpr4'],
						'idpr5' => $assoc['idpr5'],
						'idpr6' => $assoc['idpr6'],
						'idpr7' => $assoc['idpr7'],
						'idpr8' => $assoc['idpr8'],
						'idpr9' => $assoc['idpr9'],
						'idpr10' => $assoc['idpr10'],
						'descuento' => DescuentoPorCantidad($desporcan),
						'uid' => $assoc['uid'],
						'precio' => $precio
					)
				);
			}
		}
		return $packs;
	}
	
	
	function PackV($pid)
	{
		global $dbi, $draiz;
		include_once($draiz.'/sistema/mod_cestaycompra.php');
		
		$packs = null;
		$sql = "SELECT *
				FROM bd_pack
				WHERE id = $pid;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$productos = array();
			$assoc = mysqli_fetch_assoc($query);
			
			$sql2 = "SELECT pd.id AS id, pd.nombre AS nombre, pk.id AS idp, pd.imagenprincipal AS imagenprincipal
					FROM bd_pack_productos pk, bd_productos pd
					WHERE pd.id IN (idpro1, idpro2, idpro3, idpro4)
					AND pk.idpack = $pid;";
			$query2 = mysqli_query($dbi, $sql2);
			while ($assoc2 = mysqli_fetch_assoc($query2))
				$productos['p'.$assoc2['idp']][] = Array
				(
					'id' => $assoc2['id'],
					'nombre' => $assoc2['nombre'],
					'imagen' => $assoc2['imagenprincipal']
				);
			
			$packs = Array
			(
				'id' => $assoc['id'],
				'nombre' => $assoc['nombre'],
				'descripcion' => $assoc['descripcion'],
				'productos' => $productos,
				'descuento' => DescuentoPorCantidad($assoc['unidades']),
				'unidades' => $assoc['unidades'],
				'precio' => floatval($assoc['precio'] * ((100 - $assoc['descuento']) / 100)),
				'imagen' => $assoc['imagen']
			);
		}
		return $packs;
	}

	
	function LoadFilterStatus()
	{
		global $dbi;

		$resultado = null;
		
		$sql = "SELECT * FROM bd_productfilter WHERE id = 0";
				
		$query = mysqli_query($dbi, $sql);
		
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
			$resultado = $assoc;
		}

		return $resultado;
	}

	function addProductAttributes($idProduct, $atributos){
		global $dbi;

		$sql = "SELECT idatributo, bd_atributo.atributo nombre, tipoid, bd_atributo_tipo.atributo tipo FROM bd_producto_atributo, bd_atributo, bd_atributo_tipo WHERE bd_producto_atributo.idatributo = bd_atributo.id AND tipoid = bd_atributo_tipo.id AND idproducto = $idProduct";	
		$query = mysqli_query($dbi, $sql);
		$tot_atributos = count($atributos);

		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
				$add_category = true;
				
				foreach($atributos as $atributo){//Eliminamos duplicados
					if($atributo['id'] == $assoc['idatributo'])
						$encontrado = true;
					foreach($categorias as $categoria)//Si la categoria no existe en el array la insertamos
						if($categoria == $assoc['tipo'])
							$add_category = false;
				}
				if(!$encontrado){
					$atributos[$tot_atributos]['id'] = $assoc['idatributo'];
					$atributos[$tot_atributos]['categoria'] = $assoc['tipo'];
					$atributos[$tot_atributos]['atributo'] = $assoc['nombre'];
					$tot_atributos++;
					if($add_category)
						$categorias[] = $assoc['tipo'];
				}
			}					
		}

		$categorias_rastreadas = array();
		$nuevo_atributos = array();
		$i = 0;
		$j = 0;
		do{//Ordenamos los atributos por el tipo de atributo que es
			foreach ($atributos as $atributo) {
				if(!in_array($atributo['categoria'], $categorias_rastreadas)){
					$categorias_rastreadas[$i] = $atributo['categoria'];
					$i++;
				}
				if($atributo['categoria'] == $categorias_rastreadas[$j]){
					$nuevo_atributos[] = $atributo;
				}				
			}
			$j++;
		}
		while($j < count($categorias_rastreadas));

		
		return $nuevo_atributos;
	}

	function extractAttributeType($atributosString){
		$atributos_exploded = explode('-',$atributosString);
		$todosAtributos = Atributos();
		$result = '';
		foreach($atributos_exploded as $atributo){
			foreach($todosAtributos as $current){
				// echo $current['atributo'] . '!=' . trim($atributo) .'<br>';
				if($current['atributo'] == trim($atributo)){
					$result .= $current['categoria'] .': '. trim($atributo) .' ';
				}
			}
		}
		return $result;
	}
	
	
	function Atributos($idpadre = 0)
	{
		global $dbi;
		$atributos[] = null;
		$ids = CategoriasId($idpadre);
		
		$ids .= $idpadre;

		$sql = "SELECT a.id AS aid, a.atributo AS nombre, at.obligatorio AS obligatorio, at.atributo AS categoria, pa.precio AS precio
				FROM bd_atributo_tipo at, bd_atributo a, bd_producto_atributo pa, bd_productos p 
				WHERE p.id=pa.idproducto 
				AND pa.idatributo=a.id 
				AND a.tipoid=at.id 
				AND (p.idcat IN ($ids) OR p.idcat2 IN ($ids) OR p.idcat3 IN ($ids) OR p.idcat4 IN ($ids) OR p.idcat5 IN ($ids)) 
				GROUP BY at.id, a.id 
				ORDER BY at.id, at.atributo, a.atributo ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($atributos, 
					array(
						'id' => $assoc['aid'],
						'categoria' => $assoc['categoria'],
						'atributo' => $assoc['nombre'],
                                                'obligatorio' => $assoc['obligatorio'],
                                                'precio' => $assoc['precio']
					)
				);
			unset($atributos[0]);
			$atributos = array_values($atributos);
		}
		else
			$atributos = null;
		
		return $atributos; 
	}
	
	
	function Opiniones($pid)
	{
		global $dbi;
		
		$opiniones = Array();

		$sql = "SELECT *
				FROM bd_producto_opinion
				WHERE idproducto = $pid
				AND publicada = 1
				ORDER BY fecha DESC
				LIMIT 10;";
		$query = mysqli_query($dbi, $sql);
		
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($opiniones, 
					array(
						'idusuario' => $assoc['idusuario'],
						'nombre' => $assoc['nombre'],
						'descripcion' => $assoc['descripcion'],
						'fecha' => $assoc['fecha']
					)
				);
		}
		
		return $opiniones;
	}
	
	
	function Paginas($cantidad, $where)
	{
		global $dbi, $paginas;

		$sql = "SELECT COUNT(id) AS cid, (precio * ((iva + 100) / 100) - (precio * (descuento / 100))) AS preciot 
				FROM bd_productos 
				WHERE $where;";
		
		$query = mysqli_query($dbi, $sql);
		$assoc = mysqli_fetch_assoc($query);
		$paginas = ceil($assoc['cid'] / $cantidad);
	}
	
	
	function Paginacion($pagina, $cantidad, $where)
	{
		global $dbi, $paginas;
		
		Paginas($cantidad, $where);
		
		if ($pagina > $paginas)
			$pagina = $paginas;
		if ($pagina < 1)
			$pagina = 1;
		$pagina--;
		$inicial = $pagina * $cantidad;
		
		return $inicial;
	}
	
	
	function ProductosAleatorios($cantidad)
	{
		global $dbi;
		$productos[] = null;
		
		$sql = "SELECT id, nombre, descripcion, imagenprincipal, (precio * ((iva + 100) / 100) - (precio * (descuento / 100))) AS preciot, descuento, descuentoe, (precio * (iva + 100) / 100) AS precio_ant 
				FROM bd_productos 
				WHERE disponible=1 ORDER BY RAND() ASC LIMIT $cantidad;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($productos, 
					array(
						'id' => $assoc['id'],
						'nombre' => $assoc['nombre'],
						'descripcion' => $assoc['descripcion'],
						'precio' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['preciot'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0))),
						'descuento' => $assoc['descuento'] > 0 ? $assoc['descuento'] : ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0),
						'descuentoe' => $assoc['descuento'] > 0 ? '%' : '€',
						'imagen' => $assoc['imagenprincipal'],
						'precio_ant' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['precio_ant']))
					)
				);
			unset($productos[0]);
			$productos = array_values($productos);
		}
		else
			$productos = null;
		
		return $productos;
	}
	
	
	function Productos($cantidad, $idcat, $pagina = 1, $filtro = '')
	{
		global $dbi;
		$productos[] = null;
        
        $sql = "SELECT menu 
				FROM bd_empresa;";
        $menuselect = mysqli_query($dbi, $sql);
        $menufinal = mysqli_fetch_array($menuselect);

        if($menufinal['menu'] == 1){
            $ids = CategoriasMenu($idcat);
        }else{
            $ids = CategoriasId($idcat);
        }
        
		if($filtro != ''){
                    $filtro .= ', orden ASC';
                }else{
                    $filtro = 'ORDER BY orden ASC';
                }
		$inicial = 1;
		if($idcat == 'all')
			$where = "disponible=1";
		else
			$where = "disponible=1 AND soloR = 0 AND (idcat IN ($ids) OR idcat2 IN ($ids) OR idcat3 IN ($ids) OR idcat4 IN ($ids) OR idcat5 IN ($ids))";
		
		$inicial = Paginacion($pagina, $cantidad, $where.' '.$filtro);
		
		$sql = "SELECT id, nombre, descripcion, aplazame, caplazame, caplazame1, tipo, mostraretq, mostraretqAgo, mostraretqOfe, imagenprincipal, tprecio, comprecio, (precio * ((iva + 100) / 100) - (precio * ((iva +100) /100 ) * (descuento / 100))) AS preciot, descuento, descuentoe, (precio * (iva + 100) / 100) AS precio_ant 
				FROM bd_productos 
				WHERE $where $filtro LIMIT $inicial, $cantidad;";
                
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                
                $sql = "SELECT * FROM bd_producto_idioma WHERE id_producto = $assoc[id] AND idioma = '$_SESSION[idioma]'";
                //echo $sql;
                $query1 = mysqli_query($dbi, $sql);
                $assoc1 = mysqli_fetch_array($query1);
                    $producto_idioma =
                        array(
                            'nombre' => $assoc1['nombre'],
                            'descripcion' => $assoc1['descripcion']
                        );
                array_push($productos, 
                        array(
                            'id' => $assoc['id'],
                            'nombre' => $assoc['nombre'],
                            'descripcion' => $assoc['descripcion'],
                            'precio' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['preciot'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0))),
                            'tprecio' => $assoc['tprecio'],
                            'comprecio' => $assoc['comprecio'],
                            'descuento' => $assoc['descuento'] > 0 ? $assoc['descuento'] : ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0),
                            'descuentoe' => $assoc['descuento'] > 0 ? '%' : '€',
                            'pack' => $assoc['pack'],
                            'imagen' => $assoc['imagenprincipal'],
                            'precio_ant' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['precio_ant'])),
                            'aplazame' => $assoc['aplazame'],
                            'caplazame' => $assoc['caplazame'],
                            'caplazame1' => $assoc['caplazame1'],
                            'tipo_prod' => $assoc['tipo'],
                            'mostraretq' => $assoc['mostraretq'],
                            'mostraretqAgo' => $assoc['mostraretqAgo'],
                            'mostraretqOfe' => $assoc['mostraretqOfe']
                        )
                    );
                /*if($_SESSION['idioma'] == 'ESP')
                    array_push($productos, 
                        array(
                            'id' => $assoc['id'],
                            'nombre' => $assoc['nombre'],
                            'descripcion' => $assoc['descripcion'],
                            'precio' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['preciot'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0))),
                            'descuento' => $assoc['descuento'] > 0 ? $assoc['descuento'] : ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0),
                            'descuentoe' => $assoc['descuento'] > 0 ? '%' : '€',
                            'pack' => $assoc['pack'],
                            'imagen' => $assoc['imagenprincipal'],
                            'precio_ant' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['precio_ant']))
                        )
                    );
                else
                    if(mysqli_num_rows($query1) > 0)
                        array_push($productos, 
                        array(
                            'id' => $assoc['id'],
                            'nombre' => $producto_idioma['nombre'],
                            'descripcion' => $producto_idioma['descripcion'],
                            'precio' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['preciot'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0))),
                            'descuento' => $assoc['descuento'] > 0 ? $assoc['descuento'] : ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0),
                            'descuentoe' => $assoc['descuento'] > 0 ? '%' : '€',
                            'pack' => $assoc['pack'],
                            'imagen' => $assoc['imagenprincipal'],
                            'precio_ant' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['precio_ant']))
                        )
                    );*/
            }
								
			unset($productos[0]);
			$productos = array_values($productos);
		}
		else
			$productos = null;
		
		return $productos;
	}
	
	
	function ProductosBuscados($cantidad, $busqueda, $pagina = 1, $filtro = '')
	{
		global $dbi;
		$productos[] = null;
		$inicial = 1;
		$where = "disponible=1 AND soloR = 0 AND (p.nombre LIKE '%$busqueda%' OR referencia LIKE '%$busqueda%' OR (e.nombre LIKE '%$busqueda%' AND e.id=pe.idetiqueta AND pe.idproducto=p.id))";
		$inicial = Paginacion($pagina, $cantidad, $where);
                if($filtro != ''){
                    $filtro .= ', orden ASC';
                }else{
                    $filtro = 'ORDER BY orden ASC';
                }
		$sql = "SELECT p.id, p.nombre, descripcion, imagenprincipal, tprecio, (precio * ((iva + 100) / 100) - (precio * ((iva +100) /100 ) * (descuento / 100))) AS preciot, descuento, descuentoe, (precio * (iva + 100) / 100) AS precio_ant 
				FROM bd_productos p, bd_producto_etiqueta pe, bd_etiquetas e
				WHERE $where 
                                GROUP BY p.id $filtro
                                LIMIT $inicial, $cantidad";
								
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($productos, 
					array(
						'id' => $assoc['id'],
						'nombre' => $assoc['nombre'],
						'descripcion' => $assoc['descripcion'],
						'precio' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['preciot'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0))),
                                                'tprecio' => $assoc['tprecio'],
						'descuento' => $assoc['descuento'] > 0 ? $assoc['descuento'] : ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0),
						'descuentoe' => $assoc['descuento'] > 0 ? '%' : '€',
						'imagen' => $assoc['imagenprincipal'],
						'precio_ant' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['precio_ant']))
					)
				);
			unset($productos[0]);
			$productos = array_values($productos);
		}
		else{//Si no encuentra buscando en las 3 tablas, que al menos encuentre el producto
			$where = "disponible=1 AND soloR = 0 AND (p.nombre LIKE '%$busqueda%' OR referencia LIKE '%$busqueda%')";
			$sql = "SELECT p.id, p.nombre, descripcion, imagenprincipal, tprecio, (precio * ((iva + 100) / 100) - (precio * ((iva +100) /100 ) * (descuento / 100))) AS preciot, descuento, descuentoe, (precio * (iva + 100) / 100) AS precio_ant 
				FROM bd_productos p
				WHERE $where 
                                GROUP BY p.id $filtro
                                LIMIT $inicial, $cantidad";

			$query = mysqli_query($dbi, $sql);
			if (mysqli_num_rows($query) > 0)
			{
				while($assoc = mysqli_fetch_assoc($query))
					array_push($productos, 
						array(
							'id' => $assoc['id'],
							'nombre' => $assoc['nombre'],
							'descripcion' => $assoc['descripcion'],
							'precio' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['preciot'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0))),
													'tprecio' => $assoc['tprecio'],
							'descuento' => $assoc['descuento'] > 0 ? $assoc['descuento'] : ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0),
							'descuentoe' => $assoc['descuento'] > 0 ? '%' : '€',
							'imagen' => $assoc['imagenprincipal'],
							'precio_ant' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['precio_ant']))
						)
					);
				unset($productos[0]);
				$productos = array_values($productos);
			}
			else{
				$productos = null;
			}
		}			
		
		return $productos;
	}
        
        
        function EtiquetassBuscadas($cantidad, $busqueda, $pagina = 1, $filtro = '')
	{
		global $dbi;
		$productos[] = null;
		$inicial = 1;
		$where = "disponible=1 AND soloR = 0 AND (pe.idetiqueta=$busqueda AND pe.idproducto=p.id)";
		$inicial = Paginacion($pagina, $cantidad, $where);
                if($filtro != ''){
                    $filtro .= ', orden ASC';
                }else{
                    $filtro = 'ORDER BY orden ASC';
                }
		
		$sql = "SELECT p.id, p.nombre, descripcion, imagenprincipal, tprecio, (precio * ((iva + 100) / 100) - (precio * ((iva +100) /100 ) * (descuento / 100))) AS preciot, descuento, descuentoe, (precio * (iva + 100) / 100) AS precio_ant 
				FROM bd_productos p, bd_producto_etiqueta pe
				WHERE $where 
                                GROUP BY p.id
                                $filtro
                                LIMIT $inicial, $cantidad";
		
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($productos, 
					array(
						'id' => $assoc['id'],
						'nombre' => $assoc['nombre'],
						'descripcion' => $assoc['descripcion'],
						'precio' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['preciot'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0))),
                                                'tprecio' => $assoc['tprecio'],
						'descuento' => $assoc['descuento'] > 0 ? $assoc['descuento'] : ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0),
						'descuentoe' => $assoc['descuento'] > 0 ? '%' : '€',
						'imagen' => $assoc['imagenprincipal'],
						'precio_ant' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['precio_ant']))
					)
				);
			unset($productos[0]);
			$productos = array_values($productos);
		}
		else
			$productos = null;
		
		return $productos;
	}
	
	
	function ProductosConCriterio($cantidad, $criterio, $clave = false)
	{
		global $dbi;
		$productos[] = null;
		
		if ($criterio == 'novedades')
			$criterio = "ORDER BY id DESC";
		else if ($criterio == 'ofertas')
			$criterio = "AND (descuento > 0 OR descuentoe > 0)";
		else if ($criterio == 'ventas')
		{
			$ids = '';
			$sql = "SELECT id_producto FROM bd_productos_vendidos ORDER BY ventas DESC LIMIT $cantidad;";
			$query = mysqli_query($dbi, $sql);
			while($assoc = mysqli_fetch_array($query))
				$ids .= $assoc['id_producto'].',';
			if (strlen($ids) > 0) $ids = substr($ids, 0, strlen($ids) - 1);
			if (strlen($ids) > 0)
				$criterio = "AND id IN ($ids) ORDER BY id DESC";
			else
				$criterio = '';
		}
		else if ($criterio > 0)
		{
			$ids = '';
			$sql = "SELECT idproducto2 FROM bd_productos_relacionados pre, bd_productos p WHERE pre.idproducto2=p.id AND idproducto1=$criterio ORDER BY idproducto2 DESC LIMIT $cantidad;";
                        
			$query = mysqli_query($dbi, $sql);
			while($assoc = mysqli_fetch_array($query))
				$ids .= $assoc['idproducto2'].',';
			if (strlen($ids) > 0) $ids = substr($ids, 0, strlen($ids) - 1);
			if (strlen($ids) > 0)
				$criterio = "AND id IN ($ids) ORDER BY id DESC";
			else
				$criterio = '';
		}
		else
			$criterio = '';
		
                if($clave){
                    $sql = "SELECT id, nombre, descripcion, tipo, mostraretq, mostraretqAgo, mostraretqOfe, imagenprincipal, tprecio, (precio * ((iva + 100) / 100) - (precio * ((iva + 100) / 100) * (descuento / 100))) AS preciot, descuento, descuentoe, (precio * (iva + 100) / 100) AS precio_ant 
				FROM bd_productos 
				WHERE disponible=1 $criterio LIMIT $cantidad;";
                }else{
                    $sql = "SELECT id, nombre, descripcion, tipo, mostraretq, mostraretqAgo, mostraretqOfe, imagenprincipal, tprecio, (precio * ((iva + 100) / 100) - (precio * ((iva + 100) / 100) * (descuento / 100))) AS preciot, descuento, descuentoe, (precio * (iva + 100) / 100) AS precio_ant 
				FROM bd_productos 
				WHERE disponible=1 AND soloR = 0 $criterio LIMIT $cantidad;";
                }
                
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
                    while($assoc = mysqli_fetch_assoc($query)){
                        $sql = "SELECT * FROM bd_producto_idioma WHERE id_producto = $assoc[id] AND idioma = '$_SESSION[idioma]'";
                        //echo $sql;
                        $query1 = mysqli_query($dbi, $sql);
                        if(mysqli_num_rows($assoc1) > 0){
                            $assoc1 = mysqli_fetch_array($query1);
                            $producto_idioma =
                                array(
                                    'nombre' => $assoc1['nombre'],
                                    'descripcion' => $assoc1['descripcion']
                                );
                        }else{
                            $producto_idioma =
                                array(
                                    'nombre' => $assoc['nombre'],
                                    'descripcion' => $assoc['descripcion']
                                );
                        }
                        
                        if($_SESSION['idioma'] == 'ESP'){
                            array_push($productos, 
                                array(
                                    'id' => $assoc['id'],
                                    'nombre' => $assoc['nombre'],
                                    'descripcion' => $assoc['descripcion'],
                                    'precio' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : (floatval($assoc['preciot'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0)))),
                                    'tprecio' => $assoc['tprecio'],
                                    'descuento' => $assoc['descuento'] > 0 ? $assoc['descuento'] : ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0),
                                    'descuentoe' => $assoc['descuento'] > 0 ? '%' : '€',
                                    'imagen' => $assoc['imagenprincipal'],
                                    'precio_ant' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['precio_ant'])),
                                    'tipo_prod' => $assoc['tipo'],
                                    'mostraretq' => $assoc['mostraretq'],
                                    'mostraretqAgo' => $assoc['mostraretqAgo'],
                                    'mostraretqOfe' => $assoc['mostraretqOfe']
                                )
                            );
                        }else{
                                array_push($productos, 
                                array(
                                    'id' => $assoc['id'],
                                    'nombre' => $producto_idioma['nombre'],
                                    'descripcion' => $producto_idioma['descripcion'],
                                    'precio' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : (floatval($assoc['preciot'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0)))),
                                    'tprecio' => $assoc['tprecio'],
                                    'descuento' => $assoc['descuento'] > 0 ? $assoc['descuento'] : ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0),
                                    'descuentoe' => $assoc['descuento'] > 0 ? '%' : '€',
                                    'imagen' => $assoc['imagenprincipal'],
                                    'precio_ant' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['precio_ant'])),
                                    'tipo_prod' => $assoc['tipo'],
                                    'mostraretq' => $assoc['mostraretq'],
                                    'mostraretqAgo' => $assoc['mostraretqAgo'],
                                    'mostraretqOfe' => $assoc['mostraretqOfe']
                                )
                            );
                        } 

                    }
                    unset($productos[0]);
                    $productos = array_values($productos);
		}else
                    $productos = null;
		
            return $productos;
	}
        
        
        function ProductosMasVendidosM($cantidad){
            global $dbi;
            $productos[] = null;
            
            $sql = "SELECT id_producto FROM bd_mas_vendidos WHERE id_producto NOT LIKE 0 ORDER BY id DESC LIMIT $cantidad;";
            $query = mysqli_query($dbi, $sql);
           
            while($assoc = mysqli_fetch_array($query)){
                $sql4 = "SELECT id, nombre, descripcion, imagenprincipal, tprecio, tipo, mostraretq, mostraretqAgo, mostraretqOfe, (precio * ((iva + 100) / 100) - (precio * ((iva + 100) / 100) * (descuento / 100))) AS preciot, descuento, descuentoe, (precio * (iva + 100) / 100) AS precio_ant 
				FROM bd_productos 
				WHERE disponible=1 AND soloR = 0 AND id = $assoc[id_producto]";
				
		$query4 = mysqli_query($dbi, $sql4);
		if (mysqli_num_rows($query4) > 0)
		{
                    while($assoc4 = mysqli_fetch_assoc($query4)){
                        $sql = "SELECT * FROM bd_producto_idioma WHERE id_producto = $assoc[id_producto] AND idioma = '$_SESSION[idioma]'";
                        //echo $sql; exit;
                        $query1 = mysqli_query($dbi, $sql);
                        if(mysqli_num_rows($assoc1) > 0){
                            $assoc1 = mysqli_fetch_array($query1);
                            $producto_idioma =
                                array(
                                    'nombre' => $assoc1['nombre'],
                                    'descripcion' => $assoc1['descripcion']
                                );
                        }else{
                            $producto_idioma =
                                array(
                                    'nombre' => $assoc4['nombre'],
                                    'descripcion' => $assoc4['descripcion']
                                );
                        }
                        if($_SESSION['idioma'] == 'ESP')
                            array_push($productos, 
                                array(
                                    'id' => $assoc4['id'],
                                    'nombre' => $assoc4['nombre'],
                                    'descripcion' => $assoc4['descripcion'],
                                    'precio' => ($assoc4['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc4['preciot'] - ($assoc4['descuentoe'] > 0 ? $assoc4['descuentoe'] : 0))),
                                    'tprecio' => $assoc4['tprecio'],
                                    'descuento' => $assoc4['descuento'] > 0 ? $assoc4['descuento'] : ($assoc4['descuentoe'] > 0 ? $assoc4['descuentoe'] : 0),
                                    'descuentoe' => $assoc4['descuento'] > 0 ? '%' : '€',
                                    'imagen' => $assoc4['imagenprincipal'],
                                    'precio_ant' => ($assoc4['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc4['precio_ant'])),
                                    'tipo_prod' => $assoc4['tipo'],
                                    'mostraretq' => $assoc4['mostraretq'],
                                    'mostraretqAgo' => $assoc4['mostraretqAgo'],
                                    'mostraretqOfe' => $assoc4['mostraretqOfe']
                                )
                            );
                        else
                                array_push($productos, 
                                array(
                                    'id' => $assoc4['id'],
                                    'nombre' => $producto_idioma['nombre'],
                                    'descripcion' => $producto_idioma['descripcion'],
                                    'precio' => ($assoc4['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc4['preciot'] - ($assoc4['descuentoe'] > 0 ? $assoc4['descuentoe'] : 0))),
                                    'tprecio' => $assoc4['tprecio'],
                                    'descuento' => $assoc4['descuento'] > 0 ? $assoc4['descuento'] : ($assoc4['descuentoe'] > 0 ? $assoc4['descuentoe'] : 0),
                                    'descuentoe' => $assoc4['descuento'] > 0 ? '%' : '€',
                                    'imagen' => $assoc4['imagenprincipal'],
                                    'precio_ant' => ($assoc4['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc4['precio_ant'])),
                                    'tipo_prod' => $assoc4['tipo'],
                                    'mostraretq' => $assoc4['mostraretq'],
                                    'mostraretqAgo' => $assoc4['mostraretqAgo'],
                                    'mostraretqOfe' => $assoc4['mostraretqOfe']
                                )
                            );

                    }
                    
		}
            }
            unset($productos[0]);
            $productos = array_values($productos);
                // print_r($productos);
            return $productos;
        }
        
        
        function ProductosNovedadesM($cantidad){
            global $dbi;
            $productos[] = null;
            
            $sql = "SELECT id_producto FROM bd_novedades ORDER BY id DESC LIMIT $cantidad;";
            $query = mysqli_query($dbi, $sql);
            
            while($assoc = mysqli_fetch_array($query)){
                $sql4 = "SELECT id, nombre, descripcion, imagenprincipal, tipo, mostraretq, mostraretqAgo, mostraretqOfe, tprecio, (precio * ((iva + 100) / 100) - (precio * ((iva + 100) / 100) * (descuento / 100))) AS preciot, descuento, descuentoe, (precio * (iva + 100) / 100) AS precio_ant 
				FROM bd_productos 
				WHERE disponible=1 AND soloR = 0 AND id = $assoc[id_producto]";
                
		$query4 = mysqli_query($dbi, $sql4);
		if (mysqli_num_rows($query4) > 0)
		{
                    while($assoc4 = mysqli_fetch_assoc($query4)){
                        $sql = "SELECT * FROM bd_producto_idioma WHERE id_producto = $assoc[id_producto] AND idioma = '$_SESSION[idioma]'";
                        //echo $sql; exit;
                        $query1 = mysqli_query($dbi, $sql);
                        if(mysqli_num_rows($assoc1) > 0){
                            $assoc1 = mysqli_fetch_array($query1);
                            $producto_idioma =
                                array(
                                    'nombre' => $assoc1['nombre'],
                                    'descripcion' => $assoc1['descripcion']
                                );
                        }else{
                            $producto_idioma =
                                array(
                                    'nombre' => $assoc4['nombre'],
                                    'descripcion' => $assoc4['descripcion']
                                );
                        }
                        if($_SESSION['idioma'] == 'ESP')
                            array_push($productos, 
                                array(
                                    'id' => $assoc4['id'],
                                    'nombre' => $assoc4['nombre'],
                                    'descripcion' => $assoc4['descripcion'],
                                    'precio' => ($assoc4['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc4['preciot'] - ($assoc4['descuentoe'] > 0 ? $assoc4['descuentoe'] : 0))),
                                    'tprecio' => $assoc4['tprecio'],
                                    'descuento' => $assoc4['descuento'] > 0 ? $assoc4['descuento'] : ($assoc4['descuentoe'] > 0 ? $assoc4['descuentoe'] : 0),
                                    'descuentoe' => $assoc4['descuento'] > 0 ? '%' : '€',
                                    'imagen' => $assoc4['imagenprincipal'],
                                    'precio_ant' => ($assoc4['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc4['precio_ant'])),
                                    'tipo_prod' => $assoc4['tipo'],
                                    'mostraretq' => $assoc4['mostraretq'],
                                    'mostraretqAgo' => $assoc4['mostraretqAgo'],
                                    'mostraretqOfe' => $assoc4['mostraretqOfe']
                                )
                            );
                        else
                                array_push($productos, 
                                array(
                                    'id' => $assoc4['id'],
                                    'nombre' => $producto_idioma['nombre'],
                                    'descripcion' => $producto_idioma['descripcion'],
                                    'precio' => ($assoc4['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc4['preciot'] - ($assoc4['descuentoe'] > 0 ? $assoc4['descuentoe'] : 0))),
                                    'tprecio' => $assoc4['tprecio'],
                                    'descuento' => $assoc4['descuento'] > 0 ? $assoc4['descuento'] : ($assoc4['descuentoe'] > 0 ? $assoc4['descuentoe'] : 0),
                                    'descuentoe' => $assoc4['descuento'] > 0 ? '%' : '€',
                                    'imagen' => $assoc4['imagenprincipal'],
                                    'precio_ant' => ($assoc4['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc4['precio_ant'])),
                                    'tipo_prod' => $assoc4['tipo'],
                                    'mostraretq' => $assoc4['mostraretq'],
                                    'mostraretqAgo' => $assoc4['mostraretqAgo'],
                                    'mostraretqOfe' => $assoc4['mostraretqOfe']
                                )
                            );

                    }
                    
		}
            }
            unset($productos[0]);
            $productos = array_values($productos);
                
            return $productos;
        }
        
        
        function EtiquetasCargar(){
            global $dbi;
            $etiquetas[] = null;
            
            $sql = "SELECT * FROM bd_etiquetas ORDER BY nombre DESC";
            $query = mysqli_query($dbi, $sql);
            
            if (mysqli_num_rows($query) > 0)
            {
                while($assoc = mysqli_fetch_assoc($query)){
                    array_push($etiquetas, 
                        array(
                            'id' => $assoc['id'],
                            'nombre' => $assoc['nombre']
                            ));
                }
            }
            
            return $etiquetas;
        }
	
	
	function ImagenesProducto($id)
	{
		global $dbi;
		$imgsproducto = array();
		
		$sql = "SELECT imagen
				FROM bd_fotos 
				WHERE idproducto=$id;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while ($assoc = mysqli_fetch_array($query))
				array_push($imgsproducto, $assoc['imagen']);
		}
		
		return $imgsproducto;
	}
	
	
	function StockProductoPrAddCesta($ref, $talla)
	{
		/*$dbiGestion = mysqli_connect('82.98.136.248', 'profutboluser', 'bFEk623M5SdAD1', 'profutbol', '3306');
		
		$sql = "SELECT ESR.pk_producto, ESR.prod_referencia, ESR.prod_nombre, ESR.pk_talla, ESR.ta_nombre, ESR.ta_orden,
                            SUM(COALESCE(ESR.cantidad_entradas,0)) as entradas,
                            SUM(COALESCE(ESR.cantidad_salidas,0)) as salidas, 
                            SUM(COALESCE(ESR.cantidad_reservas,0)) as reservas,
                            SUM(COALESCE(ESR.cantidad_entradas,0)-COALESCE(ESR.cantidad_salidas,0)) as stock_real,
                            SUM(COALESCE(ESR.cantidad_entradas,0)-COALESCE(ESR.cantidad_salidas,0)-COALESCE(ESR.cantidad_reservas,0)) as stock_virtual
					FROM (SELECT P.pk_producto, P.prod_referencia, P.prod_nombre, T.pk_talla, T.ta_nombre, T.ta_orden,
													  SUM(COALESCE(E.ent_cantidad,0)) as cantidad_entradas,
													  0 as cantidad_salidas,
													  0 as cantidad_reservas
								   FROM stock_entrada E
								   INNER JOIN producto P ON P.pk_producto=E.fk_producto AND P.prod_activo=1 AND P.prod_borrado=0
								   INNER JOIN talla T ON T.pk_talla=E.fk_talla AND T.ta_activo=1 AND T.ta_borrado=0
									WHERE T.ta_nombre = '$talla'
								   GROUP BY 1,2,3,4,5,6
								   UNION ALL
								   SELECT P.pk_producto, P.prod_referencia, P.prod_nombre, T.pk_talla, T.ta_nombre, T.ta_orden,
													  0 as cantidad_entradas,
													  SUM(COALESCE(S.sal_cantidad,0)) as cantidad_salidas,
													  0 as cantidad_reservas
								   FROM stock_salida S
								   INNER JOIN producto P ON P.pk_producto=S.fk_producto AND P.prod_activo=1 AND P.prod_borrado=0
								   INNER JOIN talla T ON T.pk_talla=S.fk_talla AND T.ta_activo=1 AND T.ta_borrado=0
								   GROUP BY 1,2,3,4,5,6
								   UNION ALL
								   SELECT P.pk_producto, P.prod_referencia, P.prod_nombre, T.pk_talla, T.ta_nombre, T.ta_orden,
													  0 as cantidad_entradas,
													  0 as cantidad_salidas,
													  SUM(COALESCE(R.res_cantidad,0)) as cantidad_reservas
								   FROM stock_reserva R
								   INNER JOIN producto P ON P.pk_producto=R.fk_producto AND P.prod_activo=1 AND P.prod_borrado=0
								   INNER JOIN talla T ON T.pk_talla=R.fk_talla AND T.ta_activo=1 AND T.ta_borrado=0
								   GROUP BY 1,2,3,4,5,6) as ESR
					WHERE ESR.prod_referencia='$ref'
					GROUP BY 1,2,3,4,5,6
					ORDER BY ESR.ta_orden;";
		$query = mysqli_query($dbiGestion, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			$assoc = mysqli_fetch_assoc($query);
			$stock = $assoc['stock_virtual'];
		}
		
		mysqli_close($dbiGestion);
		
		return $stock;*/
	}
	
	
	function ReferenciPr($id)
	{
		global $dbi;
		$referencia = null;
		
		$sql = "SELECT referencia
				FROM bd_productos 
				WHERE disponible=1 AND id=$id;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_array($query);
			$referencia = $assoc['referencia'];
		}
		
		return $referencia;
	}
	
	
	function TallasProducto($id)
	{
		global $dbi;
		$tallas = array();
		$ref = ReferenciPr($id);
		
		$sql = "SELECT a.atributo AS talla
				FROM bd_productos p, bd_producto_atributo pa, bd_atributo a, bd_atributo_tipo at
				WHERE pa.idproducto=p.id 
				AND pa.idatributo=a.id
				AND a.tipoid=at.id
				AND LOWER(at.atributo) LIKE '%talla%'
				AND p.id=$id;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while ($assoc = mysqli_fetch_array($query))
				//if (StockProductoPrAddCesta($ref, str_replace('talla ', '', strtolower($assoc['talla']))) > 0)
					array_push($tallas, $assoc['talla']);
		}
		
		return $tallas;
	}
	
	
	function ColoresProducto($id)
	{
		global $dbi;
		$colores = array();
		
		$sql = "SELECT a.atributo AS color
				FROM bd_productos p, bd_producto_atributo pa, bd_atributo a, bd_atributo_tipo at
				WHERE pa.idproducto=p.id 
				AND pa.idatributo=a.id
				AND a.tipoid=at.id
				AND LOWER(at.atributo)='colores'
				AND p.id=$id;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while ($assoc = mysqli_fetch_array($query))
				array_push($colores, $assoc['color']);
		}
		
		return $colores;
	}

    function AtributosProducto($id)
	{
		global $dbi;
		$atributo[] = null;
		
		$sql = "SELECT a.atributo AS atributo, at.atributo AS nombre, pa.atrDefecto AS defecto, at.mensaje AS mensaje, at.obligatorio AS obligatorio, at.oculto AS oculto, pa.precio AS precio, at.descripcion AS descripcion
				FROM bd_productos p, bd_producto_atributo pa, bd_atributo a, bd_atributo_tipo at
				WHERE pa.idproducto=p.id 
				AND pa.idatributo=a.id
				AND a.tipoid=at.id
				AND p.id=$id;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
            while($assoc = mysqli_fetch_assoc($query))
				array_push($atributo, 
					array(
						'atributo' => $assoc['atributo'],
							'nombre' => $assoc['nombre'],
							'obligatorio' => $assoc['obligatorio'],
							'precio' => $assoc['precio'],
							'descripcion' => $assoc['descripcion'],
							'oculto' => $assoc['oculto'],
							'mensaje' => $assoc['mensaje'],
							'defecto' => $assoc['defecto']
					)
				);
								
			unset($atributo[0]);
			$atributo = array_values($atributo);

		}else{
            $atributo = null;
        }
        
		
		return $atributo;
	}
        
        
        function EtiquetasProducto($id)
	{
		global $dbi;
		$atributo[] = null;
		
		$sql = "SELECT e.nombre AS nombre, e.id AS id
				FROM bd_producto_etiqueta pe, bd_etiquetas e
				WHERE pe.idetiqueta=e.id 
                                AND pe.idproducto=$id;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
            while($assoc = mysqli_fetch_assoc($query))
				array_push($atributo, 
					array(
                                                'nombre' => $assoc['nombre'],
                                                'id' => $assoc['id']
					)
				);
								
			unset($atributo[0]);
			$atributo = array_values($atributo);

		}else{
            $atributo = null;
        }
        
		
		return $atributo;
	}
        
        
        function FicherosProducto($id)
	{
		global $dbi;
		$fichero[] = null;
		
		$sql = "SELECT *
				FROM bd_productos_ficheros
				WHERE idproducto=$id;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
            while($assoc = mysqli_fetch_assoc($query))
				array_push($fichero, 
					array(
						'fichero' => $assoc['fichero'],
                                                'nombre' => $assoc['nombre'],
                                                'idproducto' => $assoc['idproducto']
					)
				);
								
			unset($fichero[0]);
			$fichero = array_values($fichero);

		}else{
            $fichero = null;
        }
        
		return $fichero;
	}
	
	
	function Producto($id)
	{
		global $dbi;
		$producto = null;
        $producto_idioma = null;
        
        $sql = "SELECT * FROM bd_producto_idioma WHERE id_producto = $id AND idioma = '$_SESSION[idioma]'";
        $query1 = mysqli_query($dbi, $sql);
        $assoc1 = mysqli_fetch_array($query1);
			$producto_idioma =
				array(
					'nombre' => $assoc1['nombre'],
					'descripcion' => $assoc1['descripcion']
                );
        
		$sql = "SELECT id, comprecio, nombre, descripcion, pagotado, agotado, unidades, tipo, mostraretq, mostraretqAgo, precio_transporte_ind, mostraretqOfe, imagenprincipal, personalizable, referencia AS referencia, disponibilidad, plazoEnt, aplazame, caplazame, caplazame1, fDirecta, rfentrada, rfsalida,
				(precio * ((iva + 100) / 100) - (precio * ((iva + 100) / 100) * (descuento / 100))) AS preciot, descuento, descuentoe, (precio * (iva + 100) / 100) AS precio_ant 
				FROM bd_productos 
				WHERE disponible=1 AND id=$id;";
		$query = mysqli_query($dbi, $sql);
        $sql = "UPDATE bd_productos SET visitas = visitas + 1
					WHERE id=$id;";
		mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_array($query);
			$producto =
				array(
					'id' => $assoc['id'],
					'nombre' => $producto_idioma['nombre'] != null ? $producto_idioma['nombre'] : $assoc['nombre'],
					'descripcion' => $producto_idioma['descripcion'] != null ? $producto_idioma['descripcion'] : $assoc['descripcion'],
					'precio' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['preciot'] - ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0))),
					'descuento' => $assoc['descuento'] > 0 ? $assoc['descuento'] : ($assoc['descuentoe'] > 0 ? $assoc['descuentoe'] : 0),
					'descuentoe' => $assoc['descuento'] > 0 ? '%' : '€',
					'personalizable' => $assoc['personalizable'],
					'imagen' => $assoc['imagenprincipal'],
					'imagenes' => ImagenesProducto($id),
					'tallas' => TallasProducto($id),
					'colores' => ColoresProducto($id),
					'referencia' => $assoc['referencia'],
					'precio_transporte_ind' => $assoc['precio_transporte_ind'],
					'precio_ant' => ($assoc['precio_ant'] <= 0 ? 'Consultar' : floatval($assoc['precio_ant'])),
                                        'aplazame' => $assoc['aplazame'],
                                        'caplazame' => $assoc['caplazame'],
                                        'caplazame1' => $assoc['caplazame1'],
                                        'fDirecta' => $assoc['fDirecta'],
                                        'rfentrada' => $assoc['rfentrada'],
                                        'rfsalida' => $assoc['rfsalida'],
                                        'tipo' => $assoc['tipo'],
                                        'mostraretq' => $assoc['mostraretq'],
                                        'mostraretqAgo' => $assoc['mostraretqAgo'],
                                        'mostraretqOfe' => $assoc['mostraretqOfe'],
                                        'comprecio' => $assoc['comprecio'],
                                        'disponibilidad' => $assoc['disponibilidad'],
                                        'plazoEnt' => $assoc['plazoEnt'],
                                        'pagotado' => $assoc['pagotado'],
                                        'agotado' => $assoc['agotado'],
                                        'unidades' => $assoc['unidades']
				);
		}
		
		return $producto;
	}
        
        function CuotasProducto($id)
	{
		global $dbi;
		$atributo[] = null;
		
		$sql = "SELECT fd.id_fd AS id, fd.cuota AS cuota, c.meses AS meses
				FROM bd_productos_fdirecta fd, bd_productos_cuotas c
				WHERE fd.meses = c.id_c
				AND fd.idproducto=$id;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
            while($assoc = mysqli_fetch_assoc($query))
				array_push($atributo, 
					array(
						'id' => $assoc['id'],
                                                'precio' => $assoc['cuota'],
                                                'meses' => $assoc['meses']
					)
				);
								
			unset($atributo[0]);
			$atributo = array_values($atributo);

		}else{
            $atributo = null;
        }
		
		return $atributo;
	}
        
        function AtributosDesglosados(){
            
            global $dbi;
            $atributo[] = null;
            
            $sql = "SELECT a.id AS id, a.atributo AS atributo, at.atributo AS tipo
				FROM bd_atributo_tipo at, bd_atributo a
				WHERE at.desglosado = 'Si'
                                AND a.tipoid = at.id;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
            while($assoc = mysqli_fetch_assoc($query))
				array_push($atributo, 
					array(
                                            'id' => $assoc['id'],
                                            'atributo' => $assoc['atributo'],
                                            'tipo' => $assoc['tipo']
					)
				);
								
			unset($atributo[0]);
			$atributo = array_values($atributo);

		}else{
            $atributo = null;
        }
		
		return $atributo;
        }
?>