<?php
	function StockProducto($ref, $talla)
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
			$stock = $assoc['stock_virtual'] != null && $assoc['stock_virtual'] > 3 ? 'stocks.png' : ($assoc['stock_virtual'] != null && $assoc['stock_virtual'] > 0 ? 'stockp.png' : 'stockn.png');
		}
		
		mysqli_close($dbiGestion);
		
		return $stock;*/
	}
	
        function CodigoPromocional($cod, $precio)
	{
		global $dbi;
        
        $promocion = null;
		
		$sql = "SELECT id, promocion, tipo, descuento
				FROM bd_codigos_promocional
				WHERE codigo = '$cod'
				AND min <= $precio
				AND max >= $precio
				AND inicio <= NOW()
				AND caducidad >= NOW()
                LIMIT 1;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
			$promocion = $assoc;
		}
		
		return $promocion;
	}
	
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
        
        
        function CalculaPortesP($precio)
	{
		global $dbi, $Empresa;
		
		$portes[0] = 0;
                $portes[1] = "";
                
                if($_SESSION['usr']['paisEnv'] == 'ESP'){
                    $sql = "SELECT TPGratis, precioP, id, extension FROM bd_portes WHERE precioP != 'NULL' AND disponible = 1 ORDER BY precioP ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TPGratis'] || $assoc['TPGratis'] == NULL){
                        $portes[0] = $assoc['precioP'];
                        if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }else{
                        if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }
                }else if($_SESSION['usr']['paisEnv'] == 'ESX'){
                    $sql = "SELECT TCGratis, precioC, id, extension FROM bd_portes WHERE precioC != 'NULL' AND disponible = 1 ORDER BY precioC ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TCGratis'] || $assoc['TCGratis'] == NULL){
                        $portes[0] = $assoc['precioC'];
                        if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }else{
                         if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }
                }else if($_SESSION['usr']['paisEnv'] == 'ESY'){
                    $sql = "SELECT TBGratis, precioB, id, extension FROM bd_portes WHERE precioB != 'NULL' AND disponible = 1 ORDER BY precioB ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TBGratis'] || $assoc['TBGratis'] == NULL){
                        $portes[0] = $assoc['precioB'];
                        if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }else{
                         if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }
                }else if($_SESSION['usr']['paisEnv'] == 'ESZ'){
                    $sql = "SELECT TCMGratis, precioCM, id, extension FROM bd_portes WHERE precioCM != 'NULL' AND disponible = 1 ORDER BY precioCM ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TCMGratis'] || $assoc['TCMGratis'] == NULL){
                        $portes[0] = $assoc['precioCM'];
                        if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }else{
                         if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }
                }else{
                    $sql = "SELECT Code, LocalName, Continent
                            FROM bd_paises 
                            WHERE Code='".$_SESSION['usr']['paisEnv']."' ORDER BY LocalName, Code ASC;";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($assoc['Continent'] == 'Europe'){
                        $sql = "SELECT TEGratis, precioE, id, extension FROM bd_portes WHERE precioE != 'NULL' AND disponible = 1 ORDER BY precioE ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TEGratis'] || $assoc['TEGratis'] == NULL ){
                        $portes[0] = $assoc['precioE'];
                        if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }else{
                        if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }
                    }else{
                        $sql = "SELECT TIGratis, precioI, id, extension FROM bd_portes WHERE precioI != 'NULL' AND disponible = 1 ORDER BY precioI ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TIGratis'] || $assoc['TIGratis'] == NULL){
                        $portes[0] = $assoc['precioI'];
                        if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }else{
                         if($assoc['extension'] != "")
                            $portes[1] = $assoc['id'].".".$assoc['extension'];
                        else
                            $portes[1] = "";
                    }
                    }
                }

		return $portes;
	}
        
        
        function CalculaPortesKm($precio)
	{
		global $dbi, $Empresa;
		
		$portes[0] = 0;
                $portes[1] = "";
                $totalkm = -1;
                
                if($_SESSION['usr'] != null){
                    $sql = "SELECT * FROM bd_direcciones WHERE idusuario = '".$_SESSION['usr']['id']."'";
                    $query = mysqli_query($dbi, $sql);
                    if (mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_array($query);
                        
                        $sql2 = "SELECT direccion FROM bd_tiendas";
                        $query2 = mysqli_query($dbi, $sql2);
                        if (mysqli_num_rows($query2) > 0){
                            while ($direccionTienda = mysqli_fetch_assoc($query2)) {
                                //Esto por cada tienda.
                                $cadena= "https://maps.googleapis.com/maps/api/distancematrix/json?units=metricl&origins=".str_replace(" ", "+", $direccionTienda['direccion'])."&destinations=".str_replace(" ", "+",($assoc['direccion'].",".$assoc['cp'].",".$assoc['poblacion']))."&key=AIzaSyA74NBJ24I4p9zYvdpXejpCMeKtc1S-59k";
                                $ch = curl_init($cadena);
                                //a true, obtendremos una respuesta de la url, en otro caso, 
                                //true si es correcto, false si no lo es
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                //establecemos el verbo http que queremos utilizar para la petición
                                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                                //obtenemos la respuesta
                                $response = curl_exec($ch);
                                // Se cierra el recurso CURL y se liberan los recursos del sistema
                                curl_close($ch);
                                $response = json_decode($response);
                                //Este no es el status que necesito.
                                
                                if($response->rows[0]->elements[0]->status == 'OK'){
                                    if($totalkm == -1){
                                        $totalkm = $response->rows['0']->elements['0']->distance->value;
                                    }else if($totalkm > $response->rows['0']->elements['0']->distance->value){
                                        $totalkm = $response->rows['0']->elements['0']->distance->value;
                                    }
                                }else{
                                    $portes[0] = -2;
                                }
                            }
                        }else{
                            $portes[0] = -3;
                        }
                        //Fin por cada tienda.
                        
                    }else{
                        $portes[0] = -2;
                    }
                    
                    
                }else{
                    $portes[0] = -1;
                }
                
                if($totalkm > 0){
                    $totalkm = $totalkm/1000;
                    $sql3 = "SELECT * FROM `bd_portes_km` WHERE `hastakm` > '$totalkm' ORDER BY precio ASC";
                    $query3 = mysqli_query($dbi, $sql3);
                    if (mysqli_num_rows($query3) > 0){
                        $assoc3 = mysqli_fetch_array($query3);
                        $portes[0] = $assoc3['precio'];
                        $portes[1] = $assoc3['id'].".".$assoc3['extension'];
                    }
                }
                
                if($portes[0] == -1){
                    $sql3 = "SELECT * FROM `bd_portes_km` ORDER BY precio ASC";
                    $query3 = mysqli_query($dbi, $sql3);
                    if (mysqli_num_rows($query3) > 0){
                        $assoc3 = mysqli_fetch_array($query3);
                        $portes[2] = $assoc3['precio'];
                    }
                }
                
		return $portes;
	}
        
        function CalculaPortesProv($precio)
	{
		global $dbi, $Empresa;
		
		$portes = -4;
                
                    $sql = "SELECT precio
                            FROM bd_portes_provincias
                            WHERE id_provincia = '".$_SESSION['usr']['provinciaidEnv']."'
                            ORDER BY precio ASC";
                    $query = mysqli_query($dbi, $sql);
                    if(mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_array($query);
                        $portes = $assoc['precio']; 
                    }else{
                        $sql2 = "SELECT precio
                            FROM bd_portes_provincias
                            WHERE id_provincia = '0'
                            ORDER BY precio ASC";
                        $query2 = mysqli_query($dbi, $sql2);
                        $assoc2 = mysqli_fetch_array($query2);
                        $portes = $assoc2['precio']; 
                    }

		return $portes;
	}
        
        
        function CalculaPortesProvP($precio, $peso)
	{
		global $dbi, $Empresa;
		
		$portes = -4;
                
                    $sql = "SELECT precio
                            FROM bd_portes_provincias_peso
                            WHERE id_provincia = '".$_SESSION['usr']['provinciaidEnv']."'
                            ORDER BY precio ASC";
                    $query = mysqli_query($dbi, $sql);
                    if(mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_array($query);
                        $portes = $assoc['precio']; 
                        $portes = $portes * $peso;
                    }else{
                        $sql2 = "SELECT precio
                            FROM bd_portes_provincias_peso
                            WHERE id_provincia = '0'
                            ORDER BY precio ASC";
                        $query2 = mysqli_query($dbi, $sql2);
                        $assoc2 = mysqli_fetch_array($query2);
                        $portes = $assoc2['precio']; 
                        $portes = $portes * $peso;
                    }

		return $portes;
	}
        
        
        function CalculaPortesPS($precio)
	{
		global $dbi, $Empresa;
		
		$portes = 0;
                if($_SESSION['compra']['entrega']['paisidE'] == 'ESP'){
                    $sql = "SELECT TPGratis, precioP FROM bd_portes WHERE precioP != 'NULL' AND disponible = 1 ORDER BY precioP ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TPGratis'] || $assoc['TPGratis'] == NULL)
                        $portes = $assoc['precioP'];
                }else if($_SESSION['compra']['entrega']['paisidE'] == 'ESX'){
                    $sql = "SELECT TCGratis, precioC FROM bd_portes WHERE precioC != 'NULL' AND disponible = 1 ORDER BY precioC ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TCGratis'] || $assoc['TCGratis'] == NULL)
                        $portes = $assoc['precioC'];
                }else if($_SESSION['compra']['entrega']['paisidE'] == 'ESY'){
                    $sql = "SELECT TBGratis, precioB FROM bd_portes WHERE precioB != 'NULL' AND disponible = 1 ORDER BY precioB ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TBGratis'] || $assoc['TBGratis'] == NULL)
                        $portes = $assoc['precioB'];
                }else if($_SESSION['compra']['entrega']['paisidE'] == 'ESZ'){
                    $sql = "SELECT TCMGratis, precioCM FROM bd_portes WHERE precioCM != 'NULL' AND disponible = 1 ORDER BY precioCM ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TCMGratis'] || $assoc['TCMGratis'] == NULL)
                        $portes = $assoc['precioCM'];
                }else{
                    $sql = "SELECT Code, LocalName, Continent
                            FROM bd_paises 
                            WHERE Code='".$_SESSION['compra']['entrega']['paisidE']."' ORDER BY LocalName, Code ASC;";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($assoc['Continent'] == 'Europe'){
                        $sql = "SELECT TEGratis, precioE FROM bd_portes WHERE precioE != 'NULL' AND disponible = 1 ORDER BY precioE ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TEGratis'] || $assoc['TEGratis'] == NULL)
                        $portes = $assoc['precioE'];
                    }else{
                        $sql = "SELECT TIGratis, precioI FROM bd_portes WHERE precioI != 'NULL' AND disponible = 1 ORDER BY precioI ASC";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($precio < $assoc['TIGratis'] || $assoc['TIGratis'] == NULL)
                        $portes = $assoc['precioI'];
                    }
                }

		return $portes;
	}
        
        function CalculaPortesKmS($precio)
	{
		global $dbi, $Empresa;
                
                if($_SESSION['usr'] != null){
		
                    $portes[0] = 0;
                    $portes[1] = "";
                    $totalkm = -1;

                    if($_SESSION['usr'] != null){

                        if ($_SESSION['compra']['entrega']['direccionE'] != ''){

                            $sql2 = "SELECT direccion FROM bd_tiendas";
                            $query2 = mysqli_query($dbi, $sql2);
                            if (mysqli_num_rows($query2) > 0){
                                while ($direccionTienda = mysqli_fetch_assoc($query2)) {
                                    //Esto por cada tienda.
                                    $cadena= "https://maps.googleapis.com/maps/api/distancematrix/json?units=metricl&origins=".str_replace(" ", "+", $direccionTienda['direccion'])."&destinations=".str_replace(" ", "+",($_SESSION['compra']['entrega']['direccionE'].",".$_SESSION['compra']['entrega']['cpE'].",".$_SESSION['compra']['entrega']['localidadE']))."&key=AIzaSyA74NBJ24I4p9zYvdpXejpCMeKtc1S-59k";
                                    $ch = curl_init($cadena);
                                    //a true, obtendremos una respuesta de la url, en otro caso, 
                                    //true si es correcto, false si no lo es
                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                    //establecemos el verbo http que queremos utilizar para la petición
                                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
                                    //obtenemos la respuesta
                                    $response = curl_exec($ch);
                                    // Se cierra el recurso CURL y se liberan los recursos del sistema
                                    curl_close($ch);
                                    $response = json_decode($response);

                                    if($response->rows[0]->elements[0]->status == 'OK'){
                                        if($totalkm == -1){
                                            $totalkm = $response->rows['0']->elements['0']->distance->value;
                                        }else if($totalkm > $response->rows['0']->elements['0']->distance->value){
                                            $totalkm = $response->rows['0']->elements['0']->distance->value;
                                        }
                                    }else{
                                        $portes[0] = -2;
                                    }
                                }
                            }else{
                                $portes[0] = -3;
                            }
                            //Fin por cada tienda.

                        }else{
                            $portes[0] = -2;
                        }


                    }else{
                        $portes[0] = -1;
                    }
                     
                    if($totalkm > 0){
                        $totalkm = $totalkm/1000;
                        $sql3 = "SELECT * FROM `bd_portes_km` WHERE `hastakm` > '$totalkm' ORDER BY precio ASC";
                        $query3 = mysqli_query($dbi, $sql3);
                        if (mysqli_num_rows($query3) > 0){
                            $assoc3 = mysqli_fetch_array($query3);
                            $portes[0] = $assoc3['precio'];
                            $portes[1] = $assoc3['id'].".".$assoc3['extension'];
                        }
                    }
                }else{
                    $portes[0] = -1;
                }
                
                return $portes;
	}
        
        function CalculaPortesProvS($precio)
	{
		global $dbi, $Empresa;
		
		$portes = -4;
                
                    $sql = "SELECT precio
                            FROM bd_portes_provincias
                            WHERE id_provincia = '".$_SESSION['compra']['entrega']['provinciaidE']."'
                            ORDER BY precio ASC";
                    $query = mysqli_query($dbi, $sql);
                    if(mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_array($query);
                        $portes = $assoc['precio']; 
                    }else{
                        $sql2 = "SELECT precio
                            FROM bd_portes_provincias
                            WHERE id_provincia = '0'
                            ORDER BY precio ASC";
                        $query2 = mysqli_query($dbi, $sql2);
                        $assoc2 = mysqli_fetch_array($query2);
                        $portes = $assoc2['precio']; 
                    }

		return $portes;
	}
        
        function CalculaPortesProvSP($precio, $peso)
	{
		global $dbi, $Empresa;
		
		$portes = -4;
                
                    $sql = "SELECT precio
                            FROM bd_portes_provincias_peso
                            WHERE id_provincia = '".$_SESSION['compra']['entrega']['provinciaidE']."'
                            ORDER BY precio ASC";
                    $query = mysqli_query($dbi, $sql);
                    if(mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_array($query);
                        $portes = $assoc['precio']; 
			$portes = $portes * $peso;
                    }else{
                        $sql2 = "SELECT precio
                            FROM bd_portes_provincias_peso
                            WHERE id_provincia = '0'
                            ORDER BY precio ASC";
                        $query2 = mysqli_query($dbi, $sql2);
                        $assoc2 = mysqli_fetch_array($query2);
                        $portes = $assoc2['precio']; 
			$portes = $portes * $peso;
                    }

		return $portes;
	}
        
        function OtrosEnvios($precio){
            global $dbi;
            $portes[] = null;
            
            if($_SESSION['compra']['entrega']['paisidE'] == 'ESP'){
                    $sql = "SELECT TPGratis AS Gratis, precioP AS precio, transportista, id, extension FROM bd_portes WHERE precioP != 'NULL' AND disponible = 1 ORDER BY precioP ASC";
                    $portes = mysqli_query($dbi, $sql);
                }else if($_SESSION['compra']['entrega']['paisidE'] == 'ESX'){
                    $sql = "SELECT TCGratis AS Gratis, precioC AS precio, transportista, id, extension FROM bd_portes WHERE precioC != 'NULL' AND disponible = 1 ORDER BY precioC ASC";
                    $portes = mysqli_query($dbi, $sql);
                }else if($_SESSION['compra']['entrega']['paisidE'] == 'ESY'){
                    $sql = "SELECT TBGratis AS Gratis, precioB AS precio, transportista, id, extension FROM bd_portes WHERE precioB != 'NULL' AND disponible = 1 ORDER BY precioB ASC";
                    $portes = mysqli_query($dbi, $sql);
                }else if($_SESSION['compra']['entrega']['paisidE'] == 'ESZ'){
                    $sql = "SELECT TCMGratis AS Gratis, precioCM AS precio, transportista, id, extension FROM bd_portes WHERE precioCM != 'NULL' AND disponible = 1 ORDER BY precioCM ASC";
                    $portes = mysqli_query($dbi, $sql);
                }else{
                    $sql = "SELECT Code, LocalName, Continent
                            FROM bd_paises 
                            WHERE Code='".$_SESSION['compra']['entrega']['paisidE']."' ORDER BY LocalName, Code ASC;";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_array($query);
                    if($assoc['Continent'] == 'Europe'){
                        $sql = "SELECT TEGratis AS Gratis, precioE AS precio, transportista, id, extension FROM bd_portes WHERE precioE != 'NULL' AND disponible = 1 ORDER BY precioE ASC";
                    $portes = mysqli_query($dbi, $sql);
                    }else{
                        $sql = "SELECT TIGratis AS Gratis, precioI AS precio, transportista, id, extension FROM bd_portes WHERE precioI != 'NULL' AND disponible = 1 ORDER BY precioI ASC";
                    $portes = mysqli_query($dbi, $sql);
                    }
                }
            return $portes;
        }
        
        function OtrosEnvios2($precio){
            global $dbi;
            $portes[] = null;
            
            
            $sql = "SELECT p.precio AS precio, t.nombre AS nombre, t.imagen AS extension, t.id AS id
                            FROM bd_portes_provincias p, bd_transportista t
                            WHERE id_provincia = '".$_SESSION['compra']['entrega']['provinciaidE']."'
                            AND t.id = p.id_transp
                            ORDER BY precio ASC";
            $query = mysqli_query($dbi, $sql);
            if(mysqli_num_rows($query) > 0){
                $portes = $query;
            }else{
                $sql = "SELECT p.precio AS precio, t.nombre AS nombre, t.imagen AS extension, t.id AS id
                            FROM bd_portes_provincias p, bd_transportista t
                            WHERE id_provincia = '0'
                            AND t.id = p.id_transp
                            ORDER BY precio ASC";
                $portes = mysqli_query($dbi, $sql);
            }
                    
            return $portes;
        }
        
        function OtrosEnvios3($precio, $peso){
            global $dbi;
            $portes[] = null;
            
            
            $sql = "SELECT p.precio AS precio, t.nombre AS nombre, t.imagen AS extension, t.id AS id
                            FROM bd_portes_provincias_peso p, bd_transportista_peso t
                            WHERE id_provincia = '".$_SESSION['compra']['entrega']['provinciaidE']."'
                            AND t.id = p.id_transp
                            ORDER BY precio ASC";
            $query = mysqli_query($dbi, $sql);
            if(mysqli_num_rows($query) > 0){
                $portes = $query;
            }else{
                $sql = "SELECT p.precio AS precio, t.nombre AS nombre, t.imagen AS extension, t.id AS id
                            FROM bd_portes_provincias_peso p, bd_transportista_peso t
                            WHERE id_provincia = '0'
                            AND t.id = p.id_transp
                            ORDER BY precio ASC";
                $portes = mysqli_query($dbi, $sql);
            }
                    
            return $portes;
        }
        	
	function Compras($usuario)
	{
		global $dbi;
		$compras[] = null;
		
		$sql = "SELECT id, secreto, fecha, precio, CONCAT_WS(', ', direccion, pais, provincia, localidad, cp) AS direccion
				FROM bd_compra, bd_compra_direccion
				WHERE idusuario = $usuario
				AND estado = 'pagado'
				AND bd_compra.id = bd_compra_direccion.idcompra
				ORDER BY fecha DESC;";
		
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
				$productos = array();
				$factura = null;
                                $rma = array();
				
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
                                
                                $sql3 = "SELECT *
						FROM bd_rma
						WHERE secreto='$assoc[secreto]';";
				$query3 = mysqli_query($dbi, $sql3);
				if (mysqli_num_rows($query3) > 0)
				{
					while($assoc3 = mysqli_fetch_assoc($query3)){
                                            array_push($rma, 
                                                array(
                                                    "id" => $assoc3['id'],
                                                    "fecha" => $assoc3['fecha'],
                                                    "estado" => $assoc3['estado'],
                                                    "comentario_vend" => $assoc3['comentario_vend']
                                                )
                                            );
                                        }
                                        $rma = array_values($rma);
				}
				
				array_push($compras, 
					array(
						"id" => $assoc['id'],
						"fecha" => $assoc['fecha'],
						"secreto" => $assoc['secreto'],
						"precio" => $assoc['precio'],
						"direccion" => $assoc['direccion'],
						"factura" => $factura,
                                                "rma" => $rma
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
	
	
	function DescuentoPorCantidad($cantidad, $id)
	{
		global $dbi;
		$des = 0;
		
		$sql = "SELECT descuento
				FROM bd_descuentos
				WHERE cantidad <= $cantidad
                                AND idproducto = $id
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

function Presupuesto($usuario)
	{
		global $dbi;
		$cesta[] = null;
		$desporcan = 0;
        
        $sql = "SELECT pa.id, pa.idatributo, pa.idproducto, pa.precio, a.atributo
        FROM bd_producto_atributo pa, bd_atributo a
        WHERE a.id = pa.idatributo;";
		$query3 = mysqli_query($dbi, $sql);
        
		$sql = "SELECT p.id AS id, p.imagenprincipal AS imagen, p.nombre AS nombre, p.peso AS peso, c.talla AS talla, c.extra AS extra, c.personalizacion AS personalizacion, 
				(p.precio * ((p.iva + 100) / 100)) AS precio, c.cantidad AS cantidad, p.descuento AS descuento, p.descuentoe AS descuentoe , p.referencia AS referencia
				FROM bd_carrito c, bd_productos p
				WHERE c.idproducto=p.id AND c.idusuario=$usuario AND c.pack = 0 AND p.precio = 0 AND c.packid IS NULL GROUP BY p.id, c.talla, c.extra ORDER BY p.nombre ASC;";
		$query = mysqli_query($dbi, $sql);
        
		$sql = "SELECT c.cantidad AS cantidad, c.id AS idl, c.personalizacion AS personalizacion, pkg.id AS id, pkg.unidades AS unidades,
				pkg.nombre AS nombre, pkg.descripcion AS descripcion, pkg.descuento AS descuento, pkg.precio AS precio, pkg.imagen AS imagen
				FROM bd_carrito c, bd_pack pkg
				WHERE c.idproducto=pkg.id 
				AND c.idusuario=$usuario
				AND c.pack=1 
				ORDER BY pkg.nombre ASC;";
		$query2 = mysqli_query($dbi, $sql);
		
		if ((mysqli_num_rows($query) + mysqli_num_rows($query2)) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
                $preciofinal = 0;
                if($assoc['talla'] != null || $assoc['talla'] != ''){
                    while($assoc2 = mysqli_fetch_assoc($query3))
                    {
                        if(strpos($assoc['talla'], ' - ') == false){
                            if(strcmp($assoc2['atributo'], $assoc['talla']) == 0)
                                $preciofinal = $preciofinal + $assoc2['precio'];
                        }else{
                            $porciones = explode(" - ", $assoc['talla']);
                            for($i=0;$i<=count($porciones);$i++){
                                if(strcmp($assoc2['atributo'], $porciones[$i]) == 0)
                                    $preciofinal = $preciofinal + $assoc2['precio'];
                            }
                        }

                    }
                }
				$desporcan += $assoc['cantidad'];
                $precioy = (($assoc['precio'] + $preciofinal) - ($assoc['descuento'] > 0 ? (($assoc['precio'] + $preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                
				array_push($cesta, 
					array(
						"id" => $assoc['id'],
						"nombre" => $assoc['nombre'],
						"imagen" => $assoc['imagen'],
						"peso" => $assoc['peso'],
						"talla" => $assoc['talla'],
						"extra" => $assoc['extra'],
						"precio_ant" => number_format($assoc['precio'], 2, '.', ','),
						"precio" => number_format($precioy, 2, '.', ','),
						"descuento" => $assoc['descuento'],
						"descuentoe" => number_format($assoc['descuentoe'], 2, '.', ','),
						"personalizacion" => number_format($assoc['personalizacion'], 2, '.', ','),
						"cantidad" => $assoc['cantidad'],
						"stock" => StockProducto($assoc['referencia'], str_replace('talla ', '', strtolower($assoc['talla'])))
					)
				);
				$preciototal += ($precioy * $assoc['cantidad']);
                $preciofinal = 0;
			}
			
			if (mysqli_num_rows($query2) > 0)
			{
				while($assoc = mysqli_fetch_assoc($query2))
				{
					$desporcan += $assoc['cantidad'] * $assoc['unidades'];
					$precioy = ($assoc['precio'] - ($assoc['precio'] * ($assoc['descuento'] / 100)));
					array_push($cesta, 
						array(
							"id" => $assoc['id'],
							"nombre" => $assoc['nombre'],
							"imagen" => 'packs.png',
							"peso" => 0,
							"talla" =>  $assoc['descripcion'],
							"color" => '',
							"precio_ant" => number_format($assoc['precio'], 2, '.', ','),
							"precio" => number_format($precioy, 2, '.', ','),
							"descuento" => $assoc['descuento'],
							"personalizacion" => number_format($assoc['personalizacion'], 2, '.', ','),
							"pack" => true,
							"idline" => $assoc['idl'],
							"cantidad" => $assoc['cantidad'],
							'imagen' => $assoc['imagen'],
							"stock" => null
						)
					);
					$preciototal += ($precioy * $assoc['cantidad']);
				}
			}
			
			$desporcan = DescuentoPorCantidad($desporcan);
			if ($desporcan > 0)
				array_push($cesta, 
						array(
							"id" => 0,
							"nombre" => 'Descuento '.$desporcan.'%',
							"imagen" => 'descuentos.png',
							"peso" => 0,
							"talla" => 'Descuento acumulable aplicado por adquirir una determinada cantidad de productos',
							"color" => '',
							"descuento" => '<span style="color: #FFF; font-size: 1.2rem; left: 49%; position: absolute; top: 47%;">'.$desporcan.'%</span>',
							"personalizacion" => null,
							"precio_ant" => '-'.number_format($preciototal * ($desporcan / 100), 2, '.', ','),
							"precio" => '-'.number_format($preciototal * ($desporcan / 100), 2, '.', ','),
							"cantidad" => 1,
							"stock" => null
						)
					);
			
			unset($cesta[0]);
			$cesta = array_values($cesta);
		}
		else
			$cesta = null;
		
		return $cesta;
	}
	
	
	function Cesta($usuario)
	{
		global $dbi;
		$cesta[] = null;
		$desporcan = 0;
                $atributos = array();
        
        
        
		$sql = "SELECT p.id AS id, p.tipo AS tipo, p.aplazame AS aplazame, p.caplazame AS caplazame, p.caplazame1 AS caplazame1, p.imagenprincipal AS imagen, p.nombre AS nombre, p.peso AS peso, c.talla AS talla, c.fechas AS fechas, c.extra AS extra, c.personalizacion AS personalizacion, 
				(p.precio * ((p.iva + 100) / 100)) AS precio, c.cantidad AS cantidad, c.afiliado AS afiliado, p.descuento AS descuento, p.descuentoe AS descuentoe , p.referencia AS referencia, 
                                p.fDirecta AS fDirecta, c.idcuotas AS idcuotas
				FROM bd_carrito c, bd_productos p
				WHERE c.idproducto=p.id AND c.idusuario=$usuario AND c.pack = 0 AND p.precio > 0 AND c.packid IS NULL GROUP BY p.id, c.talla, c.extra ORDER BY p.nombre ASC;";
		$query = mysqli_query($dbi, $sql);
        
		$sql = "SELECT c.cantidad AS cantidad, c.id AS idl, c.personalizacion AS personalizacion, pkg.id AS id, pkg.unidades AS unidades,
				pkg.nombre AS nombre, pkg.descripcion AS descripcion, pkg.descuento AS descuento, pkg.precio AS precio, pkg.imagen AS imagen
				FROM bd_carrito c, bd_pack pkg
				WHERE c.idproducto=pkg.id 
				AND c.idusuario=$usuario
				AND c.pack=1 
				ORDER BY pkg.nombre ASC;";
		$query2 = mysqli_query($dbi, $sql);
		
		if ((mysqli_num_rows($query) + mysqli_num_rows($query2)) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
                $atributos = array();            
                $preciofinal = 0;
                if($assoc['talla'] != null || $assoc['talla'] != ''){
                    $sql = "SELECT pa.id, pa.idatributo, pa.idproducto, pa.precioextra AS precio, pa.precio AS precioT, a.atributo
                    FROM bd_producto_atributo pa, bd_atributo a
                    WHERE a.id = pa.idatributo
                    AND pa.idproducto = '".$assoc['id']."';";
                    
                    $query3 = mysqli_query($dbi, $sql);
                    $tipoPrecio = 'e';
                    while($assoc2 = mysqli_fetch_assoc($query3))
                    {
                        if(strpos($assoc['talla'], ' - ') == false){
                            if(strcmp($assoc2['atributo'], $assoc['talla']) == 0){
                                
                                if($assoc2['precioT'] > 0){
                                    $preciofinal = $preciofinal + $assoc2['precioT'];
                                    $tipoPrecio = 't';
                                }else{
                                    $preciofinal = $preciofinal + $assoc2['precio'];
                                }
                                $atributos[$assoc2['atributo']] = $assoc2['precio'];
                            }
                        }else{
                            $porciones = explode(" - ", $assoc['talla']);
                            for($i=0;$i<=count($porciones);$i++){
                                if(strcmp($assoc2['atributo'], $porciones[$i]) == 0){
                                    if($assoc2['precioT'] > 0){
                                        $preciofinal = $preciofinal + $assoc2['precioT'];
                                        $tipoPrecio = 't';
                                    }else{
                                        $preciofinal = $preciofinal + $assoc2['precio'];
                                    }
                                    $atributos[$assoc2['atributo']] = $assoc2['precio'];
                                }
                            }
                        }
                    }
                }
				$desporcan += $assoc['cantidad'];
                                
                if($assoc['fechas'] != ''){ 
                    $fecha_t = explode(" - ", $assoc['fechas']);
                    $fecha_i = explode("/", $fecha_t['0']);
                    $fecha_i = $fecha_i['2']."-".$fecha_i['1']."-".$fecha_i['0'];
                    $fecha_f = explode("/", $fecha_t['1']);
                    $fecha_f = $fecha_f['2']."-".$fecha_f['1']."-".$fecha_f['0'];

                    $dias = (strtotime($fecha_f)-strtotime($fecha_i))/86400;
                    $dias = $dias;
                    $dias = floor($dias);
                    if ($dias > 0){
                        $sql5 = "SELECT atributoAsociado FROM  bd_productos WHERE id = '".$assoc['id']."'"; 
                        $query5 = mysqli_query($dbi, $sql5);
                        $assoc5 = mysqli_fetch_assoc($query5);

                        if($assoc5['atributoAsociado'] > 0){
                            $sql6 = "SELECT * FROM  bd_atributo WHERE tipoid = '".$assoc5['atributoAsociado']."'";
                            $query6 = mysqli_query($dbi, $sql6);

                            if(mysqli_num_rows($query6)>0){
                                $posibilidades = array();
                                while($assoc6 = mysqli_fetch_assoc($query6)){
                                    $valor_query = explode(" ", $assoc6['atributo']);
                                    $valor_query = $valor_query['1'];                                
                                    array_push($posibilidades, $valor_query);
                                }

                                arsort($posibilidades);

                                $buscado = $posibilidades[count($posibilidades) - 1];

                                foreach($posibilidades as $posibilidadC){
                                    if($posibilidadC >= $dias){
                                        $buscado = $posibilidadC;
                                    }
                                }

                                $sql7 = "SELECT id FROM  bd_atributo WHERE atributo = 'HASTA ".$buscado."'";
                                $query7 = mysqli_query($dbi, $sql7);
                                $assoc7 = mysqli_fetch_assoc($query7);

                                $sql8 = "SELECT precio FROM bd_producto_atributo WHERE idatributo = '".$assoc7['id']."' AND idproducto = '".$assoc['id']."'";
                                $query8 = mysqli_query($dbi, $sql8);
                                if(mysqli_num_rows($query8)>0){
                                    $assoc8 = mysqli_fetch_assoc($query8);
                                    $dev = $dias * $assoc8['precio'];
                                }else{
                                    $dev = $assoc['precio'];
                                }
                            }else{
                                $dev = $assoc['precio'];
                            }
                        }else{
                            $dev = $assoc['precio'];
                        }
                        $precioy = (($dev + $preciofinal) - ($assoc['descuento'] > 0 ? (($dev + $preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                    }else{
                        if($tipoPrecio == 'e'){
                            $precioy = (($assoc['precio'] + $preciofinal) - ($assoc['descuento'] > 0 ? (($assoc['precio'] + $preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                        }else{
                            $precioy = (($preciofinal) - ($assoc['descuento'] > 0 ? (($preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                        }
                    }
                }else{
                    if($tipoPrecio == 'e'){
                        $precioy = (($assoc['precio'] + $preciofinal) - ($assoc['descuento'] > 0 ? (($assoc['precio'] + $preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                    }else{
                        $precioy = (($preciofinal) - ($assoc['descuento'] > 0 ? (($preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                    }
                }
                
                if($precioy == 0){
                    $precioy = $assoc['precio'];
                }
                if($assoc['fDirecta'] == 1){
                    $sql_fd = "SELECT c.meses AS meses, fd.cuota AS cuota FROM bd_productos_fdirecta fd, bd_productos_cuotas c WHERE idproducto = '".$assoc['id']."' AND fd.meses = c.id_c ORDER BY fd.cuota ASC";
                    
                    $query_fd = mysqli_query($dbi, $sql_fd);
                    $assoc_fd = mysqli_fetch_assoc($query_fd);
                    $meses = $assoc_fd['meses'];
                    $cuota = $assoc_fd['cuota'];
                }else{
                    $meses = 0;
                    $cuota = 0;
                }
                 
				array_push($cesta, 
					array(
						"id" => $assoc['id'],
						"nombre" => $assoc['nombre'],
                                                "tipo" => $assoc['tipo'],
						"imagen" => $assoc['imagen'],
						"peso" => $assoc['peso'],
						"talla" => $assoc['talla'],
                                                "fechas" => $assoc['fechas'],
						"extra" => $assoc['extra'],
						"precio_ant" => str_replace(",", "", $assoc['precio']),
						"precio" => str_replace(",", "", $precioy),
						"descuento" => $assoc['descuento'],
						"descuentoe" => number_format($assoc['descuentoe'], 2, '.', ','),
						"personalizacion" => number_format($assoc['personalizacion'], 2, '.', ','),
						"cantidad" => $assoc['cantidad'],
						"stock" => StockProducto($assoc['referencia'], str_replace('talla ', '', strtolower($assoc['talla']))),
                                                "fDirecta" => $assoc['fDirecta'],
                                                "meses" => $meses,
                                                "cuota" => $cuota,
                                                "aplazame" => $assoc['aplazame'],
                                                "caplazame" => $assoc['caplazame'],
                                                "caplazame1" => $assoc['caplazame1'],
                                                "afiliado" => $assoc['afiliado'],
                                                "preciosAtr" => $atributos
					)
				);
				$preciototal += ($precioy * $assoc['cantidad']);
                                $precioCD = ($precioy * $assoc['cantidad']);
                $preciofinal = 0;
                
                $desporcan = DescuentoPorCantidad($desporcan, $assoc['id']);
			if ($desporcan > 0)
				array_push($cesta, 
						array(
							"id" => 0,
							"nombre" => 'Descuento '.$desporcan.'%',
							"imagen" => 'descuentos.png',
							"peso" => 0,
							"talla" => 'Descuento acumulable aplicado por adquirir una determinada cantidad de productos',
							"color" => '',
							"descuento" => '<span style="color: #FFF; font-size: 1.2rem; left: 49%; position: absolute; top: 47%;">'.$desporcan.'%</span>',
							"personalizacion" => null,
							"precio_ant" => '-'.number_format($precioCD * ($desporcan / 100), 2, '.', ','),
							"precio" => '-'.number_format($precioCD * ($desporcan / 100), 2, '.', ','),
							"cantidad" => 1,
							"stock" => null
						)
					);
                        $desporcan = 0;
			}
			
			if (mysqli_num_rows($query2) > 0)
			{
				while($assoc = mysqli_fetch_assoc($query2))
				{
					$desporcan += $assoc['cantidad'] * $assoc['unidades'];
					$precioy = ($assoc['precio'] - ($assoc['precio'] * ($assoc['descuento'] / 100)));
					array_push($cesta, 
						array(
							"id" => $assoc['id'],
							"nombre" => $assoc['nombre'],
                                                        "tipo" => $assoc['tipo'],
							"imagen" => 'packs.png',
							"peso" => 0,
							"talla" =>  $assoc['descripcion'],
							"color" => '',
							"precio_ant" => number_format($assoc['precio'], 2, '.', ','),
							"precio" => number_format($precioy, 2, '.', ','),
							"descuento" => $assoc['descuento'],
							"personalizacion" => number_format($assoc['personalizacion'], 2, '.', ','),
							"pack" => true,
							"idline" => $assoc['idl'],
							"cantidad" => $assoc['cantidad'],
							'imagen' => $assoc['imagen'],
							"stock" => null
						)
					);
					$preciototal += ($precioy * $assoc['cantidad']);
				}
			}
			
			
			
			unset($cesta[0]);
			$cesta = array_values($cesta);
		}
		else
			$cesta = null;
		
		return $cesta;
	}
        
        
        function RMA($pedido){
		global $dbi;
		$rma[] = null;
                
                $sql = "SELECT c.id AS id, c.cambio AS cambio, c.monedaWeb AS monedaWeb, c.monedaUser AS monedaUser, cp.id AS idp, cp.idproducto AS idproducto, cp.cantidad AS cantidad,
                       cp.precio AS precio, p.nombre AS nombre, p.imagenprincipal AS imagenprincipal FROM  bd_compra c, bd_compra_productos cp, bd_productos p WHERE c.secreto = '$pedido' AND c.id = cp.idcompra AND p.id = cp.idproducto";
                
                $query = mysqli_query($dbi, $sql);
                
                if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
                           array_push($rma, 
					array(
						"id" => $assoc['id'],
						"cambio" => $assoc['cambio'],
						"monedaWeb" => $assoc['monedaWeb'],
						"monedaUser" => $assoc['monedaUser'],
						"idp" => $assoc['idp'],
						"idproducto" => $assoc['idproducto'],
						"cantidad" => $assoc['cantidad'],
                                                "precio" => $assoc['precio'],
                                                "nombre" => $assoc['nombre'],
                                                "imagen" => $assoc['imagenprincipal']
					)
				); 
                        }
                        unset($rma[0]);
			$rma = array_values($rma);
                }else{
                    $rma = null;
                }
                
                return $rma;
        }
        
        
        function CestaProceso($usuario)
	{
		global $dbi;
		$cesta[] = null;
		$desporcan = 0;
        
		$sql = "SELECT p.id AS id, p.imagenprincipal AS imagen, p.nombre AS nombre, p.peso AS peso, c.talla AS talla, c.fechas AS fechas, c.extra AS extra, c.personalizacion AS personalizacion, 
				(p.precio * ((p.iva + 100) / 100)) AS precio, c.cantidad AS cantidad, p.descuento AS descuento, p.descuentoe AS descuentoe , p.referencia AS referencia, 
                                c.idcuotas AS idcuotas, c.afiliado AS afiliado
				FROM bd_carrito c, bd_productos p
				WHERE c.idproducto=p.id AND c.idusuario=$usuario AND c.pack = 0 AND p.precio > 0 AND c.packid IS NULL GROUP BY p.id, c.talla, c.extra ORDER BY p.nombre ASC;";
		$query = mysqli_query($dbi, $sql);
        
		$sql = "SELECT c.cantidad AS cantidad, c.id AS idl, c.personalizacion AS personalizacion, pkg.id AS id, pkg.unidades AS unidades, c.idcuotas AS idcuotas
				pkg.nombre AS nombre, pkg.descripcion AS descripcion, pkg.descuento AS descuento, pkg.precio AS precio, pkg.imagen AS imagen
				FROM bd_carrito c, bd_pack pkg
				WHERE c.idproducto=pkg.id 
				AND c.idusuario=$usuario
				AND c.pack=1 
				ORDER BY pkg.nombre ASC;";
		$query2 = mysqli_query($dbi, $sql);
		
		if ((mysqli_num_rows($query) + mysqli_num_rows($query2)) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
                            $sql = "SELECT pa.id, pa.idatributo, pa.idproducto, pa.precioextra AS precio, pa.precio AS precioT, a.atributo
                            FROM bd_producto_atributo pa, bd_atributo a
                            WHERE a.id = pa.idatributo 
                            AND pa.idproducto ='". $assoc['id']."'";
                                                            
                                    $query3 = mysqli_query($dbi, $sql);
                $preciofinal = 0;
                $tipoPrecio2 = 'e';
                if($assoc['talla'] != null || $assoc['talla'] != ''){
                    while($assoc2 = mysqli_fetch_assoc($query3))
                    {
                        if(strpos($assoc['talla'], ' - ') == false){
                            if(strcmp($assoc2['atributo'], $assoc['talla']) == 0){
                                if($assoc2['precioT'] > 0){
                                    $preciofinal = $preciofinal + $assoc2['precioT'];
                                    $tipoPrecio2 = 't';
                                }else{
                                    $preciofinal = $preciofinal + $assoc2['precio'];
                                }
                            }
                        }else{
                            $porciones = explode(" - ", $assoc['talla']);
                            for($i=0;$i<=count($porciones);$i++){
                                if(strcmp($assoc2['atributo'], $porciones[$i]) == 0){
                                    if($assoc2['precioT'] > 0){
                                        $preciofinal = $preciofinal + $assoc2['precioT'];
                                        $tipoPrecio2 = 't';
                                    }else{
                                        $preciofinal = $preciofinal + $assoc2['precio'];
                                    }
                                }
                            }
                        }

                    }
                }
				$desporcan += $assoc['cantidad'];
                if($assoc['fechas'] != ''){ 
                    $fecha_t = explode(" - ", $assoc['fechas']);
                    $fecha_i = explode("/", $fecha_t['0']);
                    $fecha_i = $fecha_i['2']."-".$fecha_i['1']."-".$fecha_i['0'];
                    $fecha_f = explode("/", $fecha_t['1']);
                    $fecha_f = $fecha_f['2']."-".$fecha_f['1']."-".$fecha_f['0'];

                    $dias = (strtotime($fecha_f)-strtotime($fecha_i))/86400;
                    $dias = $dias;
                    $dias = floor($dias);
                    if ($dias > 0){
                        $sql5 = "SELECT atributoAsociado FROM  bd_productos WHERE id = '".$assoc['id']."'";
                        $query5 = mysqli_query($dbi, $sql5);
                        $assoc5 = mysqli_fetch_assoc($query5);

                        if($assoc5['atributoAsociado'] > 0){
                            $sql6 = "SELECT * FROM  bd_atributo WHERE tipoid = '".$assoc5['atributoAsociado']."'";
                            $query6 = mysqli_query($dbi, $sql6);

                            if(mysqli_num_rows($query6)>0){
                                $posibilidades = array();
                                while($assoc6 = mysqli_fetch_assoc($query6)){
                                    $valor_query = explode(" ", $assoc6['atributo']);
                                    $valor_query = $valor_query['1'];                                
                                    array_push($posibilidades, $valor_query);
                                }

                                arsort($posibilidades);

                                $buscado = $posibilidades[count($posibilidades) - 1];

                                foreach($posibilidades as $posibilidadC){
                                    if($posibilidadC >= $dias){
                                        $buscado = $posibilidadC;
                                    }
                                }

                                $sql7 = "SELECT id FROM  bd_atributo WHERE atributo = 'HASTA ".$buscado."'";
                                $query7 = mysqli_query($dbi, $sql7);
                                $assoc7 = mysqli_fetch_assoc($query7);

                                $sql8 = "SELECT precio FROM bd_producto_atributo WHERE idatributo = '".$assoc7['id']."' AND idproducto = '".$assoc['id']."'";
                                $query8 = mysqli_query($dbi, $sql8);
                                if(mysqli_num_rows($query8)>0){
                                    $assoc8 = mysqli_fetch_assoc($query8);
                                    $precioy = ((($dias * $assoc8['precio']) + $preciofinal) - ($assoc['descuento'] > 0 ? (($dias * $assoc8['precio'] + $preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                                }else{
                                    if($tipoPrecio2 == 'e'){
                                        $precioy = (($assoc['precio'] + $preciofinal) - ($assoc['descuento'] > 0 ? (($assoc['precio'] + $preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                                    }else{
                                        $precioy = (($preciofinal) - ($assoc['descuento'] > 0 ? (($preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                                    }
                                }
                            }else{
                                if($tipoPrecio2 == 'e'){
                                    $precioy = (($assoc['precio'] + $preciofinal) - ($assoc['descuento'] > 0 ? (($assoc['precio'] + $preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                                }else{
                                    $precioy = (($preciofinal) - ($assoc['descuento'] > 0 ? (($preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                                }
                            }
                        }else{
                            if($tipoPrecio2 == 'e'){
                                $precioy = (($assoc['precio'] + $preciofinal) - ($assoc['descuento'] > 0 ? (($assoc['precio'] + $preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                            }else{
                                $precioy = (($preciofinal) - ($assoc['descuento'] > 0 ? (($preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                            }
                        }
                    }else{
                        if($tipoPrecio2 == 'e'){
                            $precioy = (($assoc['precio'] + $preciofinal) - ($assoc['descuento'] > 0 ? (($assoc['precio'] + $preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                        }else{
                            $precioy = (($preciofinal) - ($assoc['descuento'] > 0 ? (($preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                        }
                    }
                }else{
                    if($tipoPrecio2 == 'e'){
                        $precioy = (($assoc['precio'] + $preciofinal) - ($assoc['descuento'] > 0 ? (($assoc['precio'] + $preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                    }else{
                        $precioy = (($preciofinal) - ($assoc['descuento'] > 0 ? (($preciofinal) * ($assoc['descuento'] / 100)) : $assoc['descuentoe']));
                    }
                }
                
                
                
				array_push($cesta, 
					array(
						"id" => $assoc['id'],
						"nombre" => $assoc['nombre'],
						"imagen" => $assoc['imagen'],
						"peso" => $assoc['peso'],
						"talla" => $assoc['talla'],
                                                "fechas" => $assoc['fechas'],
						"extra" => $assoc['extra'],
						"precio_ant" => number_format($assoc['precio'], 2, '.', ','),
						"precio" => number_format($precioy, 2, '.', ','),
						"descuento" => $assoc['descuento'],
						"descuentoe" => number_format($assoc['descuentoe'], 2, '.', ','),
						"personalizacion" => number_format($assoc['personalizacion'], 2, '.', ','),
						"cantidad" => $assoc['cantidad'],
						"stock" => StockProducto($assoc['referencia'], str_replace('talla ', '', strtolower($assoc['talla']))),
                                                "idcuotas" => $assoc['idcuotas'],
                                                "afiliado" => $assoc['afiliado']
					)
				);
				$preciototal += ($precioy * $assoc['cantidad']);
                                $precioCD = ($precioy * $assoc['cantidad']);
                $preciofinal = 0;
                
                        $desporcan = DescuentoPorCantidad($desporcan, $assoc['id']);
			if ($desporcan > 0)
				array_push($cesta, 
						array(
							"id" => 0,
							"nombre" => 'Descuento '.$desporcan.'%',
							"imagen" => 'descuentos.png',
							"peso" => 0,
							"talla" => 'Descuento por cantidad',
                                                        "fechas" => '',
							"color" => '',
                                                        "extra" => '<small>('.$desporcan.'% '.$assoc['nombre'].')</small>',
							"descuento" => $desporcan,
							"personalizacion" => null,
							"precio_ant" => '-'.number_format($precioCD * ($desporcan / 100), 2, '.', ','),
							"precio" => '-'.number_format($precioCD * ($desporcan / 100), 2, '.', ','),
							"cantidad" => 1,
							"stock" => null,
                                                        "idcuotas" => $assoc['idcuotas'],
                                                        "afiliado" => $assoc['afiliado']
						)
					);
                        $desporcan = 0;
			}
			
			if (mysqli_num_rows($query2) > 0)
			{
				while($assoc = mysqli_fetch_assoc($query2))
				{
					$desporcan += $assoc['cantidad'] * $assoc['unidades'];
					$precioy = ($assoc['precio'] - ($assoc['precio'] * ($assoc['descuento'] / 100)));
					array_push($cesta, 
						array(
							"id" => $assoc['id'],
							"nombre" => $assoc['nombre'],
							"imagen" => 'packs.png',
							"peso" => 0,
							"talla" =>  $assoc['descripcion'],
							"color" => '',
							"precio_ant" => number_format($assoc['precio'], 2, '.', ','),
							"precio" => number_format($precioy, 2, '.', ','),
							"descuento" => $assoc['descuento'],
							"personalizacion" => number_format($assoc['personalizacion'], 2, '.', ','),
							"pack" => true,
							"idline" => $assoc['idl'],
							"cantidad" => $assoc['cantidad'],
							'imagen' => $assoc['imagen'],
							"stock" => null,
                                                        "idcuotas" => $assoc['idcuotas'],
                                                        "afiliado" => $assoc['afiliado']
						)
					);
					$preciototal += ($precioy * $assoc['cantidad']);
				}
			}
			
			
			
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
                $atributos = array();
		
		if (count($array) > 0)
		{
			foreach($array AS $assoc)
			{
                            $atributos = array();
				if ($assoc['packid'] == 'NULL')
				{
					if ($assoc['pack'] == 0)
					{
                                            $sql = "SELECT pa.id, pa.idatributo, pa.idproducto, pa.precio, pa.precioextra, a.atributo
                                            FROM bd_producto_atributo pa, bd_atributo a
                                            WHERE a.id = pa.idatributo
                                            AND pa.idproducto = '".$assoc['pid']."';";
                                            $preciofinal = 0;

                                            $query3 = mysqli_query($dbi, $sql);
                                            $tipoPrecio = 'e';
                                            while($assoc2 = mysqli_fetch_assoc($query3))
                                            {
                                                if(strpos($assoc['talla'], ' - ') == false){
                                                    if(strcmp($assoc2['atributo'], $assoc['talla']) == 0){
                                                        if($assoc2['precio'] > 0){
                                                            $preciofinal = $preciofinal + $assoc2['precio'];
                                                            $atributos[$assoc2['atributo']] = $assoc2['precio'];
                                                            $tipoPrecio = 't';
                                                        }else{
                                                            $preciofinal = $preciofinal + $assoc2['precioextra'];
                                                            $atributos[$assoc2['atributo']] = $assoc2['precioextra'];
                                                        }
                                                        
                                                    }
                                                }else{
                                                    $porciones = explode(" - ", $assoc['talla']);
                                                    for($i=0;$i<=count($porciones);$i++){
                                                        if(strcmp($assoc2['atributo'], $porciones[$i]) == 0){
                                                            if($assoc2['precio'] > 0){
                                                                $preciofinal = $preciofinal + $assoc2['precio'];
                                                                $atributos[$assoc2['atributo']] = $assoc2['precio'];
                                                                $tipoPrecio = 't';
                                                            }else{
                                                                $preciofinal = $preciofinal + $assoc2['precioextra'];
                                                                $atributos[$assoc2['atributo']] = $assoc2['precioextra'];
                                                            }
                                                            
                                                        }
                                                    }
                                                }

                                            }
                                            $sql = "SELECT fDirecta, aplazame, caplazame, caplazame1, tipo FROM bd_productos WHERE id = '".$assoc['pid']."'";
                                            $query = mysqli_query($dbi, $sql);
                                            $assoc3 = mysqli_fetch_assoc($query);
                                                    
                                            if($assoc3['fDirecta'] == 1){
                                                $sql_fd = "SELECT c.meses AS meses, fd.cuota AS cuota FROM bd_productos_fdirecta fd, bd_productos_cuotas c WHERE id_fd = '".$assoc['idcuotas']."' AND fd.meses = c.id_c";
                                                $query_fd = mysqli_query($dbi, $sql_fd);
                                                $assoc_fd = mysqli_fetch_assoc($query_fd);
                                                $meses = $assoc_fd['meses'];
                                                $cuota = $assoc_fd['cuota'];
                                            }else{
                                                $meses = 0;
                                                $cuota = 0;
                                            }
						$desporcan += $assoc['cantidad'];
						$p = Producto($assoc['pid'], @$assoc['talla']);
						
						
                                                if($assoc['fechas'] != ''){ 
                                                    $fecha_t = explode(" - ", $assoc['fechas']);
                                                    $fecha_i = explode("/", $fecha_t['0']);
                                                    $fecha_i = $fecha_i['2']."-".$fecha_i['1']."-".$fecha_i['0'];
                                                    $fecha_f = explode("/", $fecha_t['1']);
                                                    $fecha_f = $fecha_f['2']."-".$fecha_f['1']."-".$fecha_f['0'];

                                                    $dias = (strtotime($fecha_f)-strtotime($fecha_i))/86400;
                                                    $dias = $dias;
                                                    $dias = floor($dias);
                                                    if ($dias > 0){
                                                        $sql5 = "SELECT atributoAsociado FROM  bd_productos WHERE id = '".$assoc['pid']."'";
                                                        $query5 = mysqli_query($dbi, $sql5);
                                                        $assoc5 = mysqli_fetch_assoc($query5);

                                                        if($assoc5['atributoAsociado'] > 0){
                                                            $sql6 = "SELECT * FROM  bd_atributo WHERE tipoid = '".$assoc5['atributoAsociado']."'"; 
                                                            $query6 = mysqli_query($dbi, $sql6);

                                                            if(mysqli_num_rows($query6)>0){
                                                                $posibilidades = array();
                                                                while($assoc6 = mysqli_fetch_assoc($query6)){
                                                                    $valor_query = explode(" ", $assoc6['atributo']);
                                                                    $valor_query = $valor_query['1'];                                
                                                                    array_push($posibilidades, $valor_query);
                                                                }

                                                                arsort($posibilidades);

                                                                $buscado = $posibilidades[count($posibilidades) - 1];

                                                                foreach($posibilidades as $posibilidadC){
                                                                    if($posibilidadC >= $dias){
                                                                        $buscado = $posibilidadC;
                                                                    }
                                                                }

                                                                $sql7 = "SELECT id FROM  bd_atributo WHERE atributo = 'HASTA ".$buscado."'"; 
                                                                $query7 = mysqli_query($dbi, $sql7);
                                                                $assoc7 = mysqli_fetch_assoc($query7);

                                                                $sql8 = "SELECT precio FROM bd_producto_atributo WHERE idatributo = '".$assoc7['id']."' AND idproducto = '".$assoc['pid']."'";
                                                                $query8 = mysqli_query($dbi, $sql8);
                                                                if(mysqli_num_rows($query8)>0){
                                                                    $assoc8 = mysqli_fetch_assoc($query8);
                                                                    $precioy = $dias * $assoc8['precio']; 
                                                                }else{
                                                                    $precioy = (strpos($assoc['color'], '][') === false ? (strpos($assoc['color'], '[') === false ? $p['precio'] : $p['precio'] + 5) : $p['precio'] + 8);
                                                                }
                                                            }else{
                                                                $precioy = (strpos($assoc['color'], '][') === false ? (strpos($assoc['color'], '[') === false ? $p['precio'] : $p['precio'] + 5) : $p['precio'] + 8);
                                                            }
                                                        }else{
                                                            $precioy = (strpos($assoc['color'], '][') === false ? (strpos($assoc['color'], '[') === false ? $p['precio'] : $p['precio'] + 5) : $p['precio'] + 8);
                                                        }
                                                    }else{
                                                        $precioy = (strpos($assoc['color'], '][') === false ? (strpos($assoc['color'], '[') === false ? $p['precio'] : $p['precio'] + 5) : $p['precio'] + 8);
                                                    }
                                                }else{
                                                    $precioy = (strpos($assoc['color'], '][') === false ? (strpos($assoc['color'], '[') === false ? $p['precio'] : $p['precio'] + 5) : $p['precio'] + 8);
                                                }
                                                
                                                if($tipoPrecio == 'e'){
                                                    $totalT = str_replace(",", "", $precioy)+$preciofinal;
                                                }else{
                                                    $totalT = $preciofinal;
                                                }
						array_push($cesta, 
							array(
								"id" => $assoc['pid'],
								"nombre" => $p['nombre'],
								"imagen" => $p['imagen'],
								"peso" => $p['peso'],
								"personalizacion" => number_format($assoc['personalizacion'], 2, '.', ','),
								"talla" => $assoc['talla'],
                                                                "fechas" => $assoc['fechas'],
								"color" => '',
								"extra" => $assoc['extra'],
								"precio_ant" => str_replace(",", "", $p['precio']),
								"precio" => $totalT,
								"descuento" => $p['descuento'],
								"cantidad" => $assoc['cantidad'],
								"stock" => StockProducto($p['referencia'], str_replace('talla ', '', strtolower($assoc['talla']))),
                                                                "fDirecta" => $assoc['fDirecta'],
                                                                "meses" => $meses,
                                                                "cuota" => $cuota,
                                                                "aplazame" => $assoc3['aplazame'],
                                                                "caplazame" => $assoc3['caplazame'],
                                                                "caplazame1" => $assoc3['caplazame1'],
                                                                "afiliado" => $assoc['afiliado'],
                                                                "preciosAtr" => $atributos,
                                                                "tipo" => $assoc3['tipo']
							)
						);
                                                
						$preciototal += ($precioy * $assoc['cantidad']);
					}
					else
					{
						$p = PackV($assoc['pid']);
						
						$precioy = (strpos($assoc['color'], '][') === false ? (strpos($assoc['color'], '[') === false ? $p['precio'] : $p['precio'] + 5) : $p['precio'] + 8);
						array_push($cesta, 
							array(
								"id" => $assoc['pid'],
								"nombre" => $p['nombre'],
								"imagen" => $p['imagen'],
								"peso" => 0,
								"talla" => $p['descripcion'],
								"color" => '',
								"extra" => $assoc['extra'],
								"precio_ant" => number_format($p['precio'], 2, '.', ','),
								"precio" => number_format($precioy, 2, '.', ','),
								"descuento" => $p['descuento'],
								"personalizacion" => number_format($assoc['personalizacion'], 2, '.', ','),
								"pack" => true,
								"stock" => null,
								"idline" => $assoc['pid'],
								"cantidad" => $assoc['cantidad'],
                                                                "afiliado" => $assoc['afiliado']
							)
						);
						$preciototal += ($precioy * $assoc['cantidad']);
					}
				}
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
	
	
	function CestaAddProduct($pid, $uid, $talla, $fechas, $idcuota, $color, $nombre, $numero, $cantidad, $afiliado = "", $descesses = false)
	{
		global $dbi, $Empresa;
		$insert = -1;
                
                if($Empresa['cestaU'] == 1){
                    $sql = "DELETE FROM bd_carrito 
                            WHERE idusuario=$uid;";
                    $query = mysqli_query($dbi, $sql);
                }
		
		$nombre = mysqli_real_escape_string($dbi, htmlspecialchars($nombre));
		$numero = mysqli_real_escape_string($dbi, htmlspecialchars($numero));
		$color = mysqli_real_escape_string($dbi, htmlspecialchars($color));
                $fechas = mysqli_real_escape_string($dbi, htmlspecialchars($fechas));
		
		if (!$descesses)
		{
			$nombre = $nombre != '' ? '['.$nombre.']' : $nombre;
			$nombre = $numero != '' ? $nombre.'['.$numero.']' : $nombre;
			$nombre = $color != '' ? $nombre.'['.$color.']' : $nombre;
		}
		
		if ($nombre != '' && $color != '')
			$perso = 8;
		else if ($nombre != '')
			$perso = 5;
		else
			$perso = 0;
		
		$sql = "SELECT id
				FROM bd_carrito 
				WHERE idproducto = $pid
                                AND idusuario = $uid
                                AND idcuotas = '$idcuota'
				AND talla = '$talla'
				AND extra = '$nombre';";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
			$sql = "UPDATE bd_carrito
					SET cantidad = cantidad + $cantidad
					WHERE idproducto = $pid
                                        AND idusuario = $uid
                                        AND idcuotas = '$idcuota'
					AND talla = '$talla'
					AND extra = '$nombre'";
		else
			$sql = "INSERT INTO bd_carrito 
					VALUES(null, '$uid', '$pid', '$idcuota', '$talla', '$fechas', '$nombre', $cantidad, $perso, 0, NULL, NOW(), '$afiliado');";
               
		$query = mysqli_query($dbi, $sql);
		if ($query)
			$insert = 1;
		
		return $insert;
	}
	
	
	function CestaAddProductPack($pid, $uid, $talla, $nombre, $extra, $cantidad, $pack = 'NULL')
	{
		global $dbi;
		$insert = -1;
		
		$nombre = mysqli_real_escape_string($dbi, htmlspecialchars($nombre));
		$extra = mysqli_real_escape_string($dbi, htmlspecialchars($extra));
		
		if ($pack != 'NULL')
		{
			$nombre = $nombre != '' ? '['.$nombre.']' : $nombre;
			$nombre = $extra != '' ? $nombre.'['.$extra.']' : $nombre;
		}
		
		if ($nombre != '' && $extra != '' && $pack != 'NULL')
			$perso = 8;
		else if ($nombre != '' && $pack != 'NULL')
			$perso = 5;
		else
			$perso = 0;
		
		$packid = $pack;
		if ($pack != 'NULL')
			$pack = 0;
		else
			$pack = 1;
		
		$sql = "SELECT id
				FROM bd_carrito 
				WHERE idproducto = $pid
				AND talla = '$talla'
				AND extra = '$nombre'
				AND packid = '$packid'
				AND pack = 0;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
			$sql = "UPDATE bd_carrito
					SET cantidad = cantidad + $cantidad
					WHERE idproducto = $pid
					AND talla = '$talla'
					AND extra = '$nombre'
					AND packid = '$packid'
					AND pack = 0;";
		else
			$sql = "INSERT INTO bd_carrito 
					VALUES(null, $uid, '$pid', '$talla', '$nombre', $cantidad, $perso, $pack, $packid);";
		$query = mysqli_query($dbi, $sql);
		if ($query)
		{
			$insert = mysqli_insert_id($dbi);
		}
		
		if ($pack == 'NULL')
		{
			$sql = "UPDATE bd_carrito
				SET personalizacion = (personalizacion + $perso)
				WHERE id = $packid;";
			$query2 = mysqli_query($dbi, $sql);
		}
		
		return $insert;
	}
	
	
	function CestaSessionAddProduct($pid, $uid, $talla, $fechas, $idcuota, $color, $nombre, $numero, $afiliado, $cantidad = 1)
	{
                global $Empresa;
                $insert = -1;
            
                if($Empresa['cestaU'] == 1){
                    $_SESSION['cestases'] = array();
                }
                
		
		$nombre = $nombre != '' ? '['.$nombre.']' : $nombre;
		$nombre = $numero != '' ? $nombre.'['.$numero.']' : $nombre;
		$nombre = $color != '' ? $nombre.'['.$color.']' : $nombre;
		
		if ($nombre != '' && $color != '')
			$perso = 8;
		else if ($nombre != '')
			$perso = 5;
		else
			$perso = 0;
		
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
                                'fechas' => $fechas,
                                'idcuotas' => $idcuota,
				'extra' => $nombre,
				'cantidad' => $cantidad,
                                'afiliado' => $afiliado,
				'personalizacion' => $perso,
				'pack' => 0,
				'packid' => 'NULL'
			);
							
		$insert = 1;
		
		return $insert;
	}
	
	
	function CestaSessionAddProductPack($pid, $uid, $talla, $nombre, $extra, $cantidad = 1, $pack = 'NULL')
	{
		$insert = -1;
		
		$nombre = mysqli_real_escape_string($dbi, htmlspecialchars($nombre));
		$extra = mysqli_real_escape_string($dbi, htmlspecialchars($extra));
		
		if ($pack != 'NULL')
		{
			$nombre = $nombre != '' ? '['.$nombre.']' : $nombre;
			$nombre = $extra != '' ? $nombre.'['.$extra.']' : $nombre;
		}
		
		if ($nombre != '' && $extra != '' && $pack != 'NULL')
			$perso = 8;
		else if ($nombre != '' && $pack != 'NULL')
			$perso = 5;
		else
			$perso = 0;
		
		$packid = $pack;
		if ($pack != 'NULL')
			$pack = 0;
		else
			$pack = 1;
		
		$_SESSION['cestases'][] = array
		(
			'pid' => $pid,
			'usid' => $uid,
			'talla' => $talla,
			'extra' => $nombre,
			'cantidad' => 1,
                        'afiliado' => $afiliado,
			'personalizacion' => $perso,
			'pack' => $pack,
			'packid' => $packid
		);
		
		if ($pack == 'NULL')
		{
			foreach ($_SESSION['cestases'] AS $pkg)
				if ($pkg['pid'] == $packid && $pkg['pack'] == 1)
					$pkg['personalizacion'] += $perso;
		}
							
		$insert = 1;
		
		return $insert;
	}
	
	
	function CestaRemoveProduct($pid, $talla, $color, $uid)
	{
		global $dbi;
		$delete = -1;
		if($talla == 'nada')
            $talla = '';
        
		$sql = "DELETE FROM bd_carrito 
				WHERE (idproducto=$pid AND idusuario=$uid AND talla='$talla' AND extra='$color' AND packid IS NULL) OR (packid=$pid);";
		$query = mysqli_query($dbi, $sql);
		if ($query)
			$delete = 1;
		
		return $delete;
	}
	
    function PresupuestoRemove($uid)
	{
		global $dbi;
        
        $sql = "SELECT p.id AS id, p.imagenprincipal AS imagen, p.nombre AS nombre, p.peso AS peso, c.talla AS talla, c.extra AS extra, c.personalizacion AS personalizacion, 
				(p.precio * ((p.iva + 100) / 100)) AS precio, c.cantidad AS cantidad, p.descuento AS descuento, p.descuentoe AS descuentoe , p.referencia AS referencia
				FROM bd_carrito c, bd_productos p
				WHERE c.idproducto=p.id AND c.idusuario=$uid AND c.pack = 0 AND p.precio = 0 AND c.packid IS NULL GROUP BY p.id, c.talla, c.extra ORDER BY p.nombre ASC;";
		$query = mysqli_query($dbi, $sql);
        
        while($assoc = mysqli_fetch_assoc($query))
        {
            $sql = "DELETE FROM bd_carrito 
                    WHERE idproducto=$assoc[id] AND idusuario=$uid AND talla='$assoc[talla]' AND extra='$assoc[extra]';";
            mysqli_query($dbi, $sql);
        }

        $delete = $sql;
		
		return $delete;
	}
	
	function CestaSessionRemoveProduct($pid, $talla, $color, &$array)
	{
		for ($i = 0; $i < count($array); $i++)
			if ($array[$i]['pid'] == $pid && $array[$i]['talla'] == $talla && $array[$i]['extra'] == $color && $array[$i]['packid'] == 'NULL')
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
				WHERE idproducto=$pid AND idusuario=$uid AND talla='$talla' AND extra='$color' AND packid IS NULL;";
		$query = mysqli_query($dbi, $sql);
		if ($query)
			$delete = 1;
		
		return $delete;
	}
	
	
	function CestaSessionActProduct($pid, $cantidad, $talla, $color, &$array)
	{
		for ($i = 0; $i < count($array); $i++)
			if ($array[$i]['pid'] == $pid && $array[$i]['talla'] == $talla && $array[$i]['extra'] == $color && $array[$i]['packid'] == 'NULL')
			{
				$array[$i]['cantidad'] = $cantidad;
				$delete = 1;
			}
		
		return $delete;
	}
	
	
	function CestaSessionACestaUsuario($uid, &$array)
	{
		for ($i = 0; $i < count($array); $i++)
			$delete = CestaAddProduct($array[$i]['pid'], $uid, $array[$i]['talla'], $array[$i]['fechas'], $array[$i]['extra'], $array[$i]['idcuotas'], '', '', $array[$i]['cantidad'],  $array[$i]['afiliado'], true);
		
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
        
        function NombreDeCompra($secreto)
	{
		global $dbi;
		$direccion = null;
		
		$sql = "SELECT nombre
				FROM bd_compra_direccion
				WHERE idcompra = (SELECT id FROM bd_compra WHERE secreto = '$secreto');";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
			$nombre = $assoc['nombre'];
		}
		
		return $nombre;
	}
        
        function CifDeCompra($secreto)
	{
		global $dbi;
		$direccion = null;
		
		$sql = "SELECT dni
				FROM bd_compra_direccion
				WHERE idcompra = (SELECT id FROM bd_compra WHERE secreto = '$secreto');";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
			$dni = $assoc['dni'];
		}
		
		return $dni;
	}
        
        function DireccionDeEnvio($secreto)
	{
		global $dbi;
		$direccion = null;
                $nombre = null;
                $telefono = null;
		
		$sql = "SELECT CONCAT_WS (', ', direccion, localidad, provincia, pais, cp) AS direccion, nombre, telefono
				FROM bd_compra_direccion_envio
				WHERE idcompra = (SELECT id FROM bd_compra WHERE secreto = '$secreto');";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
			$direccion = $assoc['direccion'];
                        $nombre = $assoc['nombre'];
                        $telefono = $assoc['telefono'];
                        return $nombre .'<br>'.$direccion .'<br>'.$telefono;
		}else{
                    return 'Recogida en Tienda';
                }
                
		
	}
	
	
	function Factura($fsec, $uid)
	{
		global $dbi;
		$factura[] = null;
		
		$sql = "SELECT f.id, f.total, f.subtotal, f.fecha, f.formapago, f.ano, u.nombre AS nombre, u.email AS email, u.RazonSocial AS RazonSocial, u.dni AS dni, u.direccion AS direccion, f.preciotransporte AS portes, f.descuento AS descuento, f.cambio AS cambio, f.monedaWeb AS monedaWeb, f.monedaUser AS monedaUser
				FROM bd_facturas f, bd_users u
				WHERE f.idusuario=u.id AND f.sesion='$fsec' AND u.id=$uid;";
				
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$podireccion = DireccionDeCompra($fsec);
                        $ponombre = NombreDeCompra($fsec);
                        $pocif = CifDeCompra($fsec);
                        $podireccionE = DireccionDeEnvio($fsec);
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
						"nombre" => $ponombre != null ? $ponombre : $assoc['nombre'],
						"direccion" => $podireccion != null ? $podireccion : $assoc['direccion'],
                                                "direccionE" => $podireccionE != null ? $podireccionE : $assoc['direccion'],
						"dni" => $pocif != null ? $pocif : $assoc['dni'],
                                                "cambio" => $assoc['cambio'],
                                                "monedaWeb" => $assoc['monedaWeb'],
                                                "monedaUser" => $assoc['monedaUser'],
                                                "RazonSocial" => $assoc['RazonSocial'],
                                                "email" => $assoc['email']
					)
				);
			unset($factura[0]);
			$factura = array_values($factura);
		}
		else
			$factura = null;
		
		return $factura[0];
	}
        
        function RMA_F($fsec)
	{
		global $dbi;
		$factura[] = null;
		
		$sql = "SELECT f.id, f.precio, f.portes, f.fecha, f.estado, f.comentario, f.comentario_vend, u.nombre AS nombre, u.RazonSocial AS RazonSocial, u.dni AS dni, u.direccion AS direccion
				FROM bd_rma f, bd_users u, bd_facturas ft
				WHERE f.secreto = ft.sesion AND ft.idusuario=u.id AND f.id='$fsec'";
				
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			
			while($assoc = mysqli_fetch_assoc($query))
				array_push($factura, 
					array(
						"id" => $assoc['id'],
						"precio" => number_format($assoc['precio'], 2, '.', ','),
						"portes" => number_format($assoc['portes'], 2, '.', ','),
						"fecha" => $assoc['fecha'],
						"estado" => $assoc['estado'],
						"comentario" => $assoc['comentario'],
                                                "comentario_vend" => $assoc['comentario_vend'],
						"estado" => $assoc['estado'],
						"nombre" => $assoc['nombre'],
                                                "RazonSocial" => $assoc['RazonSocial'],
						"direccion" => $assoc['direccion'],
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
		$productos = array();
		$preciot = 0;
                
		
		$sql = "SELECT p.id AS id, c.idcompra AS idcompra, p.nombre AS nombre, p.referencia AS referencia, p.fDirecta AS fDirecta, c.talla AS talla, c.fechas AS fechas, c.extra AS extra, c.precio AS precio, c.cantidad AS cantidad, c.personalizado AS personalizacion 
				FROM bd_compra_productos c, bd_productos p
				WHERE c.idproducto=p.id
				AND idcompra = (SELECT id FROM bd_compra WHERE secreto='$fsec' AND idusuario=$uid)
				AND c.pack = 0
				AND c.packid IS NULL
				ORDER BY p.nombre ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
                            if($assoc['fDirecta'] == 1){
                                $sql_idc = "SELECT idcuotas FROM bd_compra WHERE id = '".$assoc['idcompra']."'";
                                $query_idc = mysqli_query($dbi, $sql_idc);
                                $assoc_idc = mysqli_fetch_assoc($query_idc);
                                $sql_fd = "SELECT c.meses AS meses, fd.cuota AS cuota FROM bd_productos_fdirecta fd, bd_productos_cuotas c WHERE fd.id_fd = '".$assoc_idc['idcuotas']."' AND c.id_c = fd.meses";
                                $query_fd = mysqli_query($dbi, $sql_fd);
                                $assoc_fd = mysqli_fetch_assoc($query_fd);
                                $meses = $assoc_fd['meses'];
                                $cuota = $assoc_fd['cuota'];
                            }else{
                                $meses = 0;
                                $cuota = 0;
                            }
                            
				array_push($productos, 
					array(
						"nombre" => $assoc['nombre'],
						"talla" => $assoc['talla'],
                                                "fechas" => $assoc['fechas'],
						"extra" => $assoc['extra'],
						"precio" => number_format($assoc['precio'] + $assoc['personalizacion'], 2, '.', ','),
						"cantidad" => $assoc['cantidad'],
						"productos" => array(),
                                                "fDirecta" => $assoc['fDirecta'],
                                                "meses" => $meses,
                                                "cuota" => $cuota,
                                                "referencia" => $assoc['referencia']
					)
				);
				$preciot += ($assoc['precio'] * $assoc['cantidad']);   
			}
		}
                
		$sql = "SELECT p.nombre AS nombre, c.talla AS talla, c.extra AS extra, c.precio AS precio, c.cantidad AS cantidad, c.personalizado AS personalizacion, c.packid AS packid
				FROM bd_compra_productos c, bd_pack p
				WHERE c.idproducto=p.id
				AND idcompra = (SELECT id FROM bd_compra WHERE secreto='$fsec' AND idusuario=$uid)
				AND c.pack = 1
				AND c.packid IS NOT NULL
				ORDER BY p.nombre ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
				$sql2 = "SELECT p.nombre AS nombre, c.talla AS talla, c.extra AS extra, c.precio AS precio, c.cantidad AS cantidad, c.personalizado AS personalizacion 
						FROM bd_compra_productos c, bd_productos p
						WHERE c.idproducto=p.id
						AND idcompra = (SELECT id FROM bd_compra WHERE secreto='$fsec' AND idusuario=$uid)
						AND c.pack = 0
						AND c.packid = $assoc[packid]
						ORDER BY p.nombre ASC;";
				$query2 = mysqli_query($dbi, $sql2);
				$productospkg = array();
				while($assoc2 = mysqli_fetch_assoc($query2))
				{
					array_push($productospkg, 
						array(
							"nombre" => $assoc2['nombre'],
							"talla" => $assoc2['talla'],
							"extra" => $assoc2['extra'],
							"precio" => number_format($assoc2['precio'] + $assoc2['personalizacion'], 2, '.', ','),
							"cantidad" => $assoc2['cantidad']
						)
					);
				}
				
				array_push($productos, 
					array(
						"nombre" => $assoc['nombre'],
						"talla" => $assoc['talla'],
						"extra" => $assoc['extra'],
						"precio" => number_format($assoc['precio'] + $assoc['personalizacion'], 2, '.', ','),
						"cantidad" => $assoc['cantidad'],
						"productos" => $productospkg
					)
				);
				$preciot += ($assoc['precio'] * $assoc['cantidad']);
			}
		}
                
		$sql = "SELECT c.idproducto AS id, c.talla AS talla, c.extra AS extra, c.descuento AS descuento, 
				c.cantidad AS cantidad, precio AS precio
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
						"nombre" => $assoc['talla'],
						"extra" => $assoc['extra'],
						"precio" => '-'.number_format($assoc['precio'], 2, '.', ','),
						"descantidad" => $assoc['descuento'],
						"cantidad" => $assoc['cantidad']
					)
				);
           
		}
                
                $sql = "SELECT c.idproducto AS id, c.talla AS talla, c.extra AS extra, c.descuento AS descuento, 
				c.cantidad AS cantidad, precio AS precio
				FROM bd_compra_productos c
				WHERE idcompra=(SELECT id FROM bd_compra WHERE secreto='$fsec' AND idusuario=$uid)
				AND c.idproducto = -1;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($productos, 
					array(
						"id" => $assoc['id'],
						"nombre" => $assoc['talla'],
						"extra" => $assoc['extra'],
						"precio" => number_format($assoc['precio'], 2, '.', ','),
						"descantidad" => $assoc['descuento'],
						"cantidad" => $assoc['cantidad']
					)
				);
           
		}

		return $productos;
	}
	
        
        function ProductosRMA($fsec)
	{
		global $dbi;
		$productos = array();
		$preciot = 0;
                
		
		$sql = "SELECT rp.id, rp.idrma, rp.idproducto, rp.cantidad, rp.talla, rp.extra, rp.precio, rp.personalizado, p.nombre
				FROM  bd_rma_producto rp, bd_productos p
				WHERE rp.idrma = $fsec
                                AND rp.idproducto = p.id
				ORDER BY p.nombre ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
			{
                            
                            
				array_push($productos, 
					array(
						"id" => $assoc['id'],
						"idrma" => $assoc['idrma'],
						"idproducto" => $assoc['idproducto'],
						"cantidad" => $assoc['cantidad'],
						"talla" => $assoc['talla'],
                                                "extra" => $assoc['extra'],
                                                "precio" => $assoc['precio'],
                                                "personalizado" => $assoc['personalizado'],
                                                "nombre" => $assoc['nombre']
					)
				);
				
			}
		}

		return $productos;
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
	
	
	function CrearUnaCompraPendiente($uid, $penvio, $transp, $secreto, $estado = 'pendiente de pago', $dir = null, $dirE = null, $cambio, $divOr, $divDe)
	{
		global $dbi, $Empresa;
		
		$compraid = -1;
		$pedido = CestaProceso($uid);
		$precio = 0;
		$peso = 0;
		$portes = 0;
                $idcuota = 0;
                
                GuardarExtras($secreto);
                
                
		
		foreach($pedido AS $producto)
		{
			$precio += (str_replace(",", "", $producto['precio']) + $producto['personalizacion']) * $producto['cantidad'];
			$peso += $producto['peso'] * $producto['cantidad']; 
                        $idcuota = $producto['idcuotas'];
                        $afiliado = $producto['afiliado'];
		}     
                
		$abono = Abono(@$uid);
		$precio = $precio - $abono;
                $promo = CodigoPromocional(strtolower($_SESSION['compra']['codpromo']), $precio);
		if($estado != 'tienda'){
                    if($Empresa['tipoportes'] == 0){
                        $portes += CalculaPortesPS($precio); 
                    }else if($Empresa['tipoportes'] == 1){
                        $portes += CalculaPortesKmS($precio); 
                    }else if($Empresa['tipoportes'] == 2){
                        $portes += CalculaPortesProvS($precio); 
                    }else if($Empresa['tipoportes'] == 3){
                        $portes += CalculaPortesProvSP($precio, $peso); 
                    }
                }
                $portes += $penvio;                
                
                if ($promo != null)
                {
                    if ($promo['tipo'] == '€')
                        $descnata = $promo['descuento'];
                    else
                        $descnata = ($precio * ($promo['descuento'] / 100));

                    $precio = $precio - $descnata;
                }

                if($_SESSION['compra']['pago']['pagov'] == 'cre')
                {
                    $precio += $Empresa['contrareembolso'];
                }
                
                $_SESSION['compra']['afiliadopaypal'] = $afiliado;
                
                if($_SESSION['compra']['pago']['pagov'] == 'pay'){
                    if($Empresa['ippaypal'] > 0){
                        $incrPP = ((($precio + $portes)*$Empresa['ippaypal'])/100);
                        $precio += ((($precio + $portes)*$Empresa['ippaypal'])/100);                        
                    }
                    
                    if($Empresa['ifpaypal'] > 0){
                        $precio += $Empresa['ifpaypal'];
                    }
                }
        
		$sql = "INSERT INTO bd_compra 
				VALUES(null, $uid, '$precio', '$portes', '$abono', NOW(), '$secreto', '$estado', '$transp', '$cambio', '$divOr', '$divDe', $idcuota, '$afiliado');";
                
		$query = mysqli_query($dbi, $sql);
		if ($query)
			$compraid = mysqli_insert_id($dbi);
		
		if ($compraid >= 0)
		{
			if (count($pedido) > 0)
			{
				foreach($pedido AS $producto)
				{
                                    
					if (@$producto['pack'] === true)
					{
						$sql = "SELECT *
								FROM bd_carrito
								WHERE packid = $producto[idline];";
						$query = mysqli_query($dbi, $sql);
						while ($assoc = mysqli_fetch_assoc($query))
							$query2 = mysqli_query($dbi, "INSERT INTO bd_compra_productos 
								VALUES(null, $compraid, $assoc[idproducto], $assoc[cantidad], 0, '$assoc[talla]', '$assoc[fechas]', '$assoc[extra]', 0, $producto[idline], 0, $assoc[personalizacion]);");
					}
					
                                        if($producto[precio] >=0)
                                            $precioP = $producto[precio];
                                        else
                                            $precioP = $producto[precio]*-1;
					$sql = "INSERT INTO bd_compra_productos 
								VALUES(null, $compraid, $producto[id], $producto[cantidad], '$producto[descuento]', '$producto[talla]', '$producto[fechas]', '$producto[extra]', ".(@$producto['pack'] === true ? 1 : 0).", ".(@$producto['pack'] === true ? $producto['idline'] : 'NULL').", '$precioP', '$producto[personalizacion]');";
								
					$query = mysqli_query($dbi, $sql);
				}
                                if ($promo != null)
                                {
                                    $sql = "INSERT INTO bd_compra_productos 
                                                                                VALUES(null, $compraid, 0, 1, 0, 'Código Promocional', '', '".$promo['codigo']." ".$promo['promocion']." (".$promo['descuento'].$promo['tipo'].")', 0, NULL, ".($descnata).", 0);";
                                       
                                    $query = mysqli_query($dbi, $sql);
                                }
                                
                                if($_SESSION['compra']['pago']['pagov'] == 'cre')
                                {
                                    $sql = "INSERT INTO bd_compra_productos 
                                                                                VALUES(null, $compraid, 0, 1, 0, 'Tasas Contrareembolso', '', '(Tasas)', 0, NULL, ".$Empresa['contrareembolso'].", 0);";
                                    
                                    $query = mysqli_query($dbi, $sql); 
                                }
			}
			
			if ($dir != null)
			{
				$sql = "INSERT INTO bd_compra_direccion
						VALUES($compraid, '$dir[0]', '$dir[1]', '$dir[2]', '$dir[3]', '$dir[4]', '$dir[5]', '$dir[6]');";
				$query = mysqli_query($dbi, $sql);
			}
                        
                        if ($dirE != null)
			{
				$sql = "INSERT INTO bd_compra_direccion_envio
						VALUES($compraid, '$dirE[0]', '$dirE[1]', '$dirE[2]', '$dirE[3]', '$dirE[4]', '$dirE[5]', '$dirE[6]');";
				$query = mysqli_query($dbi, $sql);
			}
                        
                        if($_SESSION['domiciliacion'] != null){
                            $nentidad = $_SESSION['domiciliacion']['nentidad'];
                            $iban = $_SESSION['domiciliacion']['iban'];
                            $entidad = $_SESSION['domiciliacion']['entidad'];
                            $oficina = $_SESSION['domiciliacion']['oficina'];
                            $dc = $_SESSION['domiciliacion']['dc'];
                            $ccc = $_SESSION['domiciliacion']['ccc'];
                            $ccc2 = $_SESSION['domiciliacion']['ccc2'];
                            $sql = "INSERT INTO bd_domiciliacion 
                                                VALUES(null, $compraid, '$nentidad', '$iban', '$entidad', '$oficina', '$dc', '$ccc', '$ccc2');";
                            $query = mysqli_query($dbi, $sql);
                        }
                        
                        if($_SESSION['tarjeta'] != null){
                            $nombre = $_SESSION['tarjeta']['nombre'];
                            $numero = $_SESSION['tarjeta']['numero'];
                            $fecha = $_SESSION['tarjeta']['fecha'];
                            $cvc = $_SESSION['tarjeta']['cvc'];
                            $sql = "INSERT INTO bd_tarjetas 
                                                VALUES(null, $compraid, '$nombre', '$numero', '$fecha', '$cvc');";
                            $query = mysqli_query($dbi, $sql);
                            unset($_SESSION['tarjeta']);
                        }
			
			if ($compraid >= 0)
			{
				$sql = "UPDATE bd_compra
						SET estado='$estado'
						WHERE id=$compraid;";
				$query = mysqli_query($dbi, $sql);
                                if ($promo != null)
                                {
                                    $sql = "DELETE FROM bd_codigos_promocional
                                            WHERE id=$promo[id] LIMIT 1;";
                                    $query = mysqli_query($dbi, $sql);
                                }
			}
		}
                
                if($_SESSION['compra']['pago']['pagov'] == 'pay'){
                    if($Empresa['ippaypal'] > 0){
                        $sql = "INSERT INTO bd_compra_productos 
                                    VALUES(null, $compraid, '-1', 1, 0, 'Incremento PayPal', '', '(Tasas)', 0, NULL, ".$incrPP.", 0);";
                                    
                        $query = mysqli_query($dbi, $sql); 
                    }
                    
                    if($Empresa['ifpaypal'] > 0){
                        $sql = "INSERT INTO bd_compra_productos 
                                    VALUES(null, $compraid, '-1', 1, 0, 'Incremento PayPal', '', '(Tasas)', 0, NULL, ".$Empresa['ifpaypal'].", 0);";
                                    
                        $query = mysqli_query($dbi, $sql); 
                    }
                }
                
		if ($compraid < 0)
			$precio = -1;
		
		return $precio + $portes;
	}
	
	
	function RealizarCompra($uid, $secreto, $formapago = 'paypal')
	{
		global $dbi, $Empresa;
		
		$facturaid = 1;
                
                
		
		$sql = "UPDATE bd_compra
				SET estado='pagado'
				WHERE secreto='$secreto';";
		$query = mysqli_query($dbi, $sql);
		if (!$query)
			$facturaid = -1;
		
        $sql = "DELETE FROM bd_carrito 
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $sql = "DELETE FROM bd_abono
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
	$sql = "SELECT precio, portes, monedaWeb, monedaUser, cambio 
                    FROM bd_compra 
                    WHERE secreto='$secreto';";
				
	$query = mysqli_query($dbi, $sql);
                
        $sql2 = "SELECT id 
                    FROM bd_direcciones 
                    WHERE idusuario=$uid;";
				
	$query2 = mysqli_query($dbi, $sql2);
                
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
                        $assoc2 = mysqli_fetch_assoc($query2);
			$sql = "INSERT INTO bd_facturas 
					VALUES(null, $assoc2[id], ($assoc[precio] + $assoc[portes]), $assoc[precio], null, ".Abono(@$uid).", $assoc[portes], $uid, NOW(), '$formapago', null, null, null, '$secreto', '', null, null, '".date('Y')."', null, null, null, null, null, '$assoc[cambio]', '$assoc[monedaWeb]', '$assoc[monedaUser]');";
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

		return $facturaid;
	}
	
	
	function PagarConTarjetaTPV($penvio, $transp)
	{
		global $Empresa, $dbi;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
        
                $secreto = time();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $penvio, $transp, $secreto, 'pendiente de pago', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']), array ($_SESSION['compra']['entrega']['nombreE'], $_SESSION['compra']['entrega']['direccionE'], $_SESSION['compra']['entrega']['paisE'], $_SESSION['compra']['entrega']['provinciaE'], $_SESSION['compra']['entrega']['localidadE'], $_SESSION['compra']['entrega']['cpE'], $_SESSION['compra']['entrega']['telefono']), $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		$urlNotificacion = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=pagook&uid='.$_SESSION['usr']['id'].'&ses='.$_SESSION['usr']['sesion'].'&secreto='.$secreto.'&fpago=tpv';
                $urlNotificacion2 = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=return2&uid='.$_SESSION['usr']['id'].'&secreto='.$secreto.'&ses='.$_SESSION['usr']['sesion'].'&fpago=tpv';
		$linkReturn = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=return&uid='.$_SESSION['usr']['id'].'&secreto='.$secreto.'&ses='.$_SESSION['usr']['sesion'];
		$linkReturn = $urlNotificacion;
		$linkCancel = 'http://'.$_SERVER['HTTP_HOST'].'/'.$_SESSION['lenguaje'].'finalizado#contenido';
        
                $_SESSION['finalizacion']['precio'] = $precio;
                

		// Se incluye la librería
		require_once('./componentes/redsys/apiRedsys.php');
                // Se crea Objeto
                $miObj = new RedsysAPI;
                
                $sql = "SELECT url, fuc, ter, mon_tpv, kc FROM bd_empresa WHERE id=1";
                $query = mysqli_query($dbi, $sql);
                $assoc = mysqli_fetch_assoc($query);
                // Entornos
                // TEST
                //$entornoURL="https://sis-t.redsys.es:25443/sis/realizarPago";
                // PRODUCCIÓN
                $entornoURL=$assoc['url'];

                // Valores de entrada
                $fuc=$assoc['fuc'];
                $terminal=$assoc['ter'];
                $moneda=$assoc['mon_tpv'];
                $trans="0";
                $url=$urlNotificacion;
                $urlOK=$urlNotificacion2;
                $urlKO=$linkCancel;
                $id=$secreto;
                $amount=($precio*100);

                // Se Rellenan los campos
                $miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
                $miObj->setParameter("DS_MERCHANT_ORDER",strval($id));
                $miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$fuc);
                $miObj->setParameter("DS_MERCHANT_CURRENCY",$moneda);
                $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$trans);
                $miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
                $miObj->setParameter("DS_MERCHANT_MERCHANTURL",$url);
                $miObj->setParameter("DS_MERCHANT_URLOK",$urlOK);		
                $miObj->setParameter("DS_MERCHANT_URLKO",$urlKO);

                //Datos de configuración
                $version="HMAC_SHA256_V1";
                $kc = $assoc['kc'];//Clave recuperada de CANALES
                // Se generan los parámetros de la petición
                $request = "";
                $params = $miObj->createMerchantParameters();
                $signature = $miObj->createMerchantSignature($kc);
                
                echo '<html lang="es">
                    <head>
                    </head>
                    <body>
                        <form name="frm" action="'.$entornoURL.'" method="POST" target="_self">
                            <!--Ds_Merchant_SignatureVersion--> <input type="hidden" name="Ds_SignatureVersion" value="'.$version.'"/></br>
                            <!--Ds_Merchant_MerchantParameters--> <input type="hidden" name="Ds_MerchantParameters" value="'.$params.'"/></br>
                            <!--Ds_Merchant_Signature--> <input type="hidden" name="Ds_Signature" value="'.$signature.'"/></br>
                            <!--<input type="submit" value="Enviar" >-->Redirigiendo...
                        </form>
                        <script>document.forms["frm"].submit();</script>
                    </body>
                </html>';
	}
        
        
        function PagarConAplazame($penvio, $transp)
	{
		global $Empresa, $dbi;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
                
                $pedido = CestaProceso($_SESSION['usr']['id']);
                foreach($pedido AS $producto)
		{
			$precio += (str_replace(",", "", $producto['precio']) + $producto['personalizacion']) * $producto['cantidad'];
			$peso += /*$producto['peso'] * $producto['cantidad']*/0;
                        $idcuota = $producto['idcuotas'];
                        $afiliado = $producto['afiliado'];
                        $cadenaPro .= '{
                                            "id": "'.$producto['id'].'",
                                            "name": "'.$producto['nombre'].'",
                                            "quantity": '.$producto['cantidad'].',
                                            "price": '.str_replace(",", "", $producto['precio']).',
                                            "url": "http://'.$_SERVER['HTTP_HOST'].'/es/producto/'.$producto['id'].'",
                                            "image_url": "http://'.$_SERVER['HTTP_HOST'].'/imagenesproductos/'.$producto['imagen'].'"
                                        },';
		}
        
                $secreto = uniqid();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $penvio, $transp, $secreto, 'pendiente de pago', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']), array ($_SESSION['compra']['entrega']['nombreE'], $_SESSION['compra']['entrega']['direccionE'], $_SESSION['compra']['entrega']['paisE'], $_SESSION['compra']['entrega']['provinciaE'], $_SESSION['compra']['entrega']['localidadE'], $_SESSION['compra']['entrega']['cpE'], $_SESSION['compra']['entrega']['telefono']), $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		$urlNotificacion = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=pagook2&uid='.$_SESSION['usr']['id'].'&ses='.$_SESSION['usr']['sesion'].'&secreto='.$secreto.'&fpago=aplazame';
                $urlNotificacion2 = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=return2&uid='.$_SESSION['usr']['id'].'&secreto='.$secreto.'&ses='.$_SESSION['usr']['sesion'].'&fpago=aplazame';
		$linkReturn = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=return&uid='.$_SESSION['usr']['id'].'&secreto='.$secreto.'&ses='.$_SESSION['usr']['sesion'];
		$linkReturn = $urlNotificacion;
		$linkCancel = 'http://'.$_SERVER['HTTP_HOST'].'/'.$_SESSION['lenguaje'].'finalizado#contenido';
        
                $_SESSION['finalizacion']['precio'] = $precio;
                $precio2 = str_replace(",", "", $precio)*100;
                
                $sqlpais = "SELECT Code2 FROM bd_paises WHERE Code = '".$_SESSION['compra']['entrega']['paisidE']."'";
                $query = mysqli_query($dbi, $sqlpais);
                $assoc = mysqli_fetch_assoc($query);
                
                if($penvio == "" || $penvio == NULL || !is_numeric($penvio))
                    $penvio = 0;
                
                $cadena = '';
                $cadena .= '<script type="text/javascript" src="https://aplazame.com/static/aplazame.js" data-aplazame="'.$Empresa['aplazamePuK'].'" data-sandbox="false"></script>
                                            <button type="button" data-aplazame-button data-amount="'.$precio.'" data-currency="EUR" data-country="ES"></button>
                                            <script>
                                            aplazame.checkout({
                                                "toc": true,
                                                "order": {
                                                    "id": "'.$secreto.'",
                                                    "currency": "EUR",
                                                    "total_amount": '.$precio2.',
                                                    "articles": [
                                                        '.$cadenaPro.'
                                                    ]
                                                },
                                                "customer": {
                                                    "id": "'.$_SESSION['usr']['id'].'",
                                                    "email": "'.$_SESSION['usr']['email'].'",
                                                    "type": "e",
                                                    "gender": 0,
                                                },
                                                "shipping": {
                                                    "first_name": "'.$_SESSION['compra']['entrega']['nombreE'].'",
                                                    "last_name": "'.$_SESSION['compra']['entrega']['nombreE'].'",
                                                    "street": "'.$_SESSION['compra']['entrega']['direccionE'].'",
                                                    "city": "'.$_SESSION['compra']['entrega']['localidadE'].'",
                                                    "state": "'.$_SESSION['compra']['entrega']['provinciaE'].'",
                                                    "country": "'.$assoc['Code2'].'",
                                                    "postcode": "'.$_SESSION['compra']['entrega']['cpE'].'",
                                                    "name": "'.$Empresa["nombre"].'",
                                                    "price": '.$penvio.',
                                                },
                                                "merchant": {
                                                  "confirmation_url": "'.$urlNotificacion.'",
                                                  "cancel_url": "'.$linkCancel.'",
                                                  "success_url": "'.$urlNotificacion2.'"
                                                }
                                              });
                                              </script>';
                echo $cadena;
	}
	
	
	function PagarConPaypal($penvio, $transp = -1)
	{
		global $Empresa, $dbi;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
                
		$secreto = uniqid();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $penvio, $transp, $secreto, 'pendiente de pago', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']), array ($_SESSION['compra']['entrega']['nombreE'], $_SESSION['compra']['entrega']['direccionE'], $_SESSION['compra']['entrega']['paisE'], $_SESSION['compra']['entrega']['provinciaE'], $_SESSION['compra']['entrega']['localidadE'], $_SESSION['compra']['entrega']['cpE'], $_SESSION['compra']['entrega']['telefono']), $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		
                // CALCULO DE PRECIO Y ASIGNACIÓN DE VARIABLES PAYPAL
		require_once('./componentes/paypal/paypal.class.php');

		$p = new paypal_class;             // initiate an instance of the class
		$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url
                //$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //paypal pruebas

		$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$urlNotificacion = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=pagook3&amp;uid='.$_SESSION['usr']['id'].'&amp;ses='.$_SESSION['usr']['sesion'].'&amp;secreto='.$secreto.'&amp;fpago=paypal';
		$linkReturn = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=return&amp;uid='.$_SESSION['usr']['id'].'&amp;secreto='.$secreto.'&amp;ses='.$_SESSION['usr']['sesion'].'&amp;fpago=paypal';
		$linkReturn2 = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=return2&uid='.$_SESSION['usr']['id'].'&secreto='.$secreto.'&ses='.$_SESSION['usr']['sesion'].'&amp;fpago=paypal';
                $linkCancel = $linkReturn;
		
		// EJECUCIÓN PARA PAYPAL
                $p->add_field('business', $Empresa['paypal']);
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){  
                    $sqlpais = "SELECT paypal, email FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                    $query = mysqli_query($dbi, $sqlpais);
                    if (mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_assoc($query);
                        if($assoc['paypal'] != '')
                            $p->add_field('business', $assoc['paypal']);
                    }
                }
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){ 
                    $empresilla = $_SESSION['compra']['afiliadopaypal'];
                }else{
                    $empresilla = $Empresa['nombre'];
                }
                
		$p->add_field('return', $linkReturn2);
		$p->add_field('cancel_return', $linkCancel);
		$p->add_field('notify_url', $urlNotificacion);
		$p->add_field('item_name', $empresilla.'('.$secreto.')');
		$p->add_field('lc', 'ES');
		$p->add_field('currency_code',$_SESSION['divisa']);
		//$p->add_field('currency_code','USD');
		$p->add_field('amount', ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$precio));
		
		$p->submit_paypal_post();
	}
        
        function PagarConPaypalS($penvio, $transp)
	{
		global $Empresa, $dbi;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
		
		$secreto = uniqid();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $penvio, $transp, $secreto, 'pendiente de pago', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']), array ($_SESSION['compra']['entrega']['nombreE'], $_SESSION['compra']['entrega']['direccionE'], $_SESSION['compra']['entrega']['paisE'], $_SESSION['compra']['entrega']['provinciaE'], $_SESSION['compra']['entrega']['localidadE'], $_SESSION['compra']['entrega']['cpE'], $_SESSION['compra']['entrega']['telefono']), $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		
		$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$urlNotificacion = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=pagook3&amp;uid='.$_SESSION['usr']['id'].'&amp;ses='.$_SESSION['usr']['sesion'].'&amp;secreto='.$secreto.'&amp;fpago=paypalSubscripcion';
		$linkReturn = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=return&amp;uid='.$_SESSION['usr']['id'].'&amp;secreto='.$secreto.'&amp;ses='.$_SESSION['usr']['sesion'];
		$linkReturn2 = 'http://'.$_SERVER['HTTP_HOST'].'/index.php?sys_action=return2&uid='.$_SESSION['usr']['id'].'&secreto='.$secreto.'&ses='.$_SESSION['usr']['sesion'];
                $linkCancel = $linkReturn;
		
                $paypalC = $Empresa['paypal'];
                
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){  
                    $sqlpais = "SELECT paypal FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                    $query = mysqli_query($dbi, $sqlpais);
                    if (mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_assoc($query);
                        if($assoc['paypal'] != '')
                            $paypalC = $assoc['paypal'];
                    }
                }
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){ 
                    $empresilla = $_SESSION['compra']['afiliadopaypal'];
                }else{
                    $empresilla = $Empresa['nombre'];
                }
                
		// EJECUCIÓN PARA PAYPAL
                echo '<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" style="height: 0px; margin-top: 0px; margin-bottom: 0px;">
                <input type="hidden" name="cmd" value="_xclick-subscriptions">
                <input type="hidden" name="business" value="'.$paypalC.'">
                <input type="hidden" name="currency_code" value="'.$_SESSION['divisa'].'">
                    
                <input type="hidden" name="return" value="'.$linkReturn2.'">
                <input type="hidden" name="cancel_return" value="'.$linkCancel.'">
                <input type="hidden" name="notify_url" value="'.$urlNotificacion.'">
                <input type="hidden" name="item_name" value="'.$empresilla.'('.$secreto.')'.'">
                <input type="hidden" name="lc" value="ES">
                
                <input type="hidden" name="no_shipping" value="1">
                <input type="hidden" name="a3" value="'.ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$precio).'">
                <input type="hidden" name="p3" value="1">
                <input type="hidden" name="t3" value="M">
                <input type="hidden" name="src" value="1">
                <input type="hidden" name="sra" value="1">
                </form>
                <script>window.onload = document._xclick.submit();</script>';
	}
	
	
	function PagarConTransferencia($penvio, $transp)
	{
		global $dbi, $Empresa;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){ 
                    $empresilla = $_SESSION['compra']['afiliadopaypal'];
                }else{
                    $empresilla = $Empresa['nombre'];
                }
                
		$secreto = uniqid();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $penvio, $transp, $secreto, 'transferencia', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp']), array ($_SESSION['compra']['entrega']['nombreE'], $_SESSION['compra']['entrega']['direccionE'], $_SESSION['compra']['entrega']['paisE'], $_SESSION['compra']['entrega']['provinciaE'], $_SESSION['compra']['entrega']['localidadE'], $_SESSION['compra']['entrega']['cpE'], $_SESSION['compra']['entrega']['telefono']), $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		$campos['asunto'] = 'Pago para compra de '.$empresilla;
		$campos['mensaje'] = ConstruirMsgTransferencia($_SESSION['usr']['nombre'], $campos['asunto'], $Empresa['cuenta'], ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$precio), $secreto, $Empresa['nombre'], $Empresa['bic_swift']);
		$a = EnviarEmail($_SESSION['usr']['email'], $campos['asunto'], $campos['mensaje']);
		
		$campos['asunto'] = 'Nueva Compra para Gestionar';
		$campos['mensaje'] = AvisarDeCompraAGestionar('ccc', $secreto, $Empresa['url']);
		$a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){  
                    $sqlpais = "SELECT email FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                    $query = mysqli_query($dbi, $sqlpais);
                    if (mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_assoc($query);
                        if($assoc['email'] != ''){
                            $campos['mensaje'] = AvisarDeCompraAGestionarAfil('ccc', $secreto, $Empresa['url']);
                            $a = EnviarEmail($assoc['email'], $campos['asunto'], $campos['mensaje']);       
                        }
                    }
                }
        
                $uid = $_SESSION['usr']['id'];

                $sql = "DELETE FROM bd_carrito 
                        WHERE idusuario=$uid;";
                $query = mysqli_query($dbi, $sql);

                $sql = "DELETE FROM bd_abono
                        WHERE idusuario=$uid;";
                $query = mysqli_query($dbi, $sql);
        
		header('Location: '.$draizp .'/'. $_SESSION['lenguaje'].'transferencia');
	}
	
	
	function PagarContraReembolso($penvio, $transp)
	{
		global $dbi, $Empresa;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){ 
                    $empresilla = $_SESSION['compra']['afiliadopaypal'];
                }else{
                    $empresilla = $Empresa['nombre'];
                }
		
		$secreto = uniqid();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $penvio, $transp, $secreto, 'contrareembolso', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp']), array ($_SESSION['compra']['entrega']['nombreE'], $_SESSION['compra']['entrega']['direccionE'], $_SESSION['compra']['entrega']['paisE'], $_SESSION['compra']['entrega']['provinciaE'], $_SESSION['compra']['entrega']['localidadE'], $_SESSION['compra']['entrega']['cpE'], $_SESSION['compra']['entrega']['telefono']), $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		$campos['asunto'] = 'Pago para compra de '.$empresilla;
		$campos['mensaje'] = ConstruirMsgContraReembolso($_SESSION['usr']['nombre'], $campos['asunto'], $Empresa['cuenta'], ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$precio), $secreto, ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$Empresa['contrareembolso']));
		$a = EnviarEmail($_SESSION['usr']['email'], $campos['asunto'], $campos['mensaje']);

		$campos['asunto'] = 'Nueva Compra para Gestionar';
		$campos['mensaje'] = AvisarDeCompraAGestionar('cre', $secreto, $Empresa['url']);
		$a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){  
                    $sqlpais = "SELECT email FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                    $query = mysqli_query($dbi, $sqlpais);
                    if (mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_assoc($query);
                        if($assoc['email'] != ''){
                            $campos['mensaje'] = AvisarDeCompraAGestionarAfil('cre', $secreto, $Empresa['url']);
                            $a = EnviarEmail($assoc['email'], $campos['asunto'], $campos['mensaje']);       
                        }
                    }
                }
        
        $uid = $_SESSION['usr']['id'];
        
        $sql = "DELETE FROM bd_carrito 
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $sql = "DELETE FROM bd_abono
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
		header('Location: '.$draizp .'/'. $_SESSION['lenguaje'].'contrareembolso');
	}
	
	
	function PagarEnTienda()
	{
		global $dbi, $Empresa;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){ 
                    $empresilla = $_SESSION['compra']['afiliadopaypal'];
                }else{
                    $empresilla = $Empresa['nombre'];
                }
		
		$secreto = uniqid();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], '0', '0', $secreto, 'tienda', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp']), null, $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		$campos['asunto'] = 'Pago para compra de '.$empresilla;
		$campos['mensaje'] = ConstruirMsgTienda($_SESSION['usr']['nombre'], $campos['asunto'], $Empresa['direccion'].'<br>'.$Empresa['localidad'].', '.$Empresa['provincia'].'<br>('.$Empresa['pais'].') '.$Empresa['cp'], ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$precio), $secreto);
		$a = EnviarEmail($_SESSION['usr']['email'], $campos['asunto'], $campos['mensaje']);
		
		$campos['asunto'] = 'Nueva Compra para Gestionar';
		$campos['mensaje'] = AvisarDeCompraAGestionar('tie', $secreto, $Empresa['url']);
		$a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){  
                    $sqlpais = "SELECT email FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                    $query = mysqli_query($dbi, $sqlpais);
                    if (mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_assoc($query);
                        if($assoc['email'] != ''){
                            $campos['mensaje'] = AvisarDeCompraAGestionarAfil('tie', $secreto, $Empresa['url']);
                            $a = EnviarEmail($assoc['email'], $campos['asunto'], $campos['mensaje']);       
                        }
                    }
                }
        
        $uid = $_SESSION['usr']['id'];
        
        $sql = "DELETE FROM bd_carrito 
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $sql = "DELETE FROM bd_abono
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
		header('Location: '.$draizp .'/'. $_SESSION['lenguaje'].'tienda');
	}
        
    function PagarTarjetaSinTPV($penvio, $transp)
	{
		global $dbi, $Empresa;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
		
                if($_SESSION['compra']['afiliadopaypal'] != ''){ 
                    $empresilla = $_SESSION['compra']['afiliadopaypal'];
                }else{
                    $empresilla = $Empresa['nombre'];
                }
                
		$secreto = uniqid();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $penvio, $transp, $secreto, 'tarjeta', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']), array ($_SESSION['compra']['entrega']['nombreE'], $_SESSION['compra']['entrega']['direccionE'], $_SESSION['compra']['entrega']['paisE'], $_SESSION['compra']['entrega']['provinciaE'], $_SESSION['compra']['entrega']['localidadE'], $_SESSION['compra']['entrega']['cpE'], $_SESSION['compra']['entrega']['telefono']), $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		$campos['asunto'] = 'Pago para compra de '.$empresilla;
		$campos['mensaje'] = ConstruirMsgTarjeta($_SESSION['usr']['nombre'], $campos['asunto'], $Empresa['direccion'].'<br>'.$Empresa['direccion2'].'<br>'.$Empresa['localidad'].', '.$Empresa['provincia'].'<br>('.$Empresa['pais'].') '.$Empresa['cp'], ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$precio), $secreto);
                $a = EnviarEmail($_SESSION['usr']['email'], $campos['asunto'], $campos['mensaje']);
		
		$campos['asunto'] = 'Nueva Compra para Gestionar';
		$campos['mensaje'] = AvisarDeCompraAGestionar('tpv', $secreto, $Empresa['url']);
		$a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){  
                    $sqlpais = "SELECT email FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                    $query = mysqli_query($dbi, $sqlpais);
                    if (mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_assoc($query);
                        if($assoc['email'] != ''){
                            $campos['mensaje'] = AvisarDeCompraAGestionarAfil('tpv', $secreto, $Empresa['url']);
                            $a = EnviarEmail($assoc['email'], $campos['asunto'], $campos['mensaje']);       
                        }
                    }
                }
        
        $uid = $_SESSION['usr']['id'];
        
        $sql = "DELETE FROM bd_carrito 
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $sql = "DELETE FROM bd_abono
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $_SESSION['domiciliacion'] = null;
        
		header('Location: '.$draizp .'/'. $_SESSION['lenguaje'].'tarjeta');
	}

    function PagarDomiciliacion($penvio, $transp)
	{
		global $dbi, $Empresa;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){ 
                    $empresilla = $_SESSION['compra']['afiliadopaypal'];
                }else{
                    $empresilla = $Empresa['nombre'];
                }
		
		$secreto = uniqid();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $penvio, $transp, $secreto, 'domiciliacion', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']), array ($_SESSION['compra']['entrega']['nombreE'], $_SESSION['compra']['entrega']['direccionE'], $_SESSION['compra']['entrega']['paisE'], $_SESSION['compra']['entrega']['provinciaE'], $_SESSION['compra']['entrega']['localidadE'], $_SESSION['compra']['entrega']['cpE'], $_SESSION['compra']['entrega']['telefono']), $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		$campos['asunto'] = 'Pago para compra de '.$empresilla;
		$campos['mensaje'] = ConstruirMsgDomiciliacion($_SESSION['usr']['nombre'], $campos['asunto'], $Empresa['direccion'].'<br>'.$Empresa['direccion2'].'<br>'.$Empresa['localidad'].', '.$Empresa['provincia'].'<br>('.$Empresa['pais'].') '.$Empresa['cp'], ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$precio), $secreto);
                $a = EnviarEmail($_SESSION['usr']['email'], $campos['asunto'], $campos['mensaje']);
		
		$campos['asunto'] = 'Nueva Compra para Gestionar';
		$campos['mensaje'] = AvisarDeCompraAGestionar('dom', $secreto, $Empresa['url']);
		$a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){  
                    $sqlpais = "SELECT email FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                    $query = mysqli_query($dbi, $sqlpais);
                    if (mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_assoc($query);
                        if($assoc['email'] != ''){
                            $campos['mensaje'] = AvisarDeCompraAGestionarAfil('dom', $secreto, $Empresa['url']);
                            $a = EnviarEmail($assoc['email'], $campos['asunto'], $campos['mensaje']);       
                        }
                    }
                }
        
        $uid = $_SESSION['usr']['id'];
        
        $sql = "DELETE FROM bd_carrito 
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $sql = "DELETE FROM bd_abono
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $_SESSION['domiciliacion'] = null;
        
		header('Location: '.$draizp .'/'. $_SESSION['lenguaje'].'domiciliacion');
	}
        
        function PagarDomiciliacionM($penvio, $transp)
	{
		global $dbi, $Empresa;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){ 
                    $empresilla = $_SESSION['compra']['afiliadopaypal'];
                }else{
                    $empresilla = $Empresa['nombre'];
                }
		
		$secreto = uniqid();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $penvio, $transp, $secreto, 'domiciliacionSubscripcion', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']), array ($_SESSION['compra']['entrega']['nombreE'], $_SESSION['compra']['entrega']['direccionE'], $_SESSION['compra']['entrega']['paisE'], $_SESSION['compra']['entrega']['provinciaE'], $_SESSION['compra']['entrega']['localidadE'], $_SESSION['compra']['entrega']['cpE'], $_SESSION['compra']['entrega']['telefono']), $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		$campos['asunto'] = 'Pago para compra de '.$empresilla;
		$campos['mensaje'] = ConstruirMsgDomiciliacion($_SESSION['usr']['nombre'], $campos['asunto'], $Empresa['direccion'].'<br>'.$Empresa['direccion2'].'<br>'.$Empresa['localidad'].', '.$Empresa['provincia'].'<br>('.$Empresa['pais'].') '.$Empresa['cp'], ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$precio), $secreto);
                $a = EnviarEmail($_SESSION['usr']['email'], $campos['asunto'], $campos['mensaje']);
		
		$campos['asunto'] = 'Nueva Compra para Gestionar';
		$campos['mensaje'] = AvisarDeCompraAGestionar('domM', $secreto, $Empresa['url']);
		$a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){  
                    $sqlpais = "SELECT email FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                    $query = mysqli_query($dbi, $sqlpais);
                    if (mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_assoc($query);
                        if($assoc['email'] != ''){
                            $campos['mensaje'] = AvisarDeCompraAGestionarAfil('domM', $secreto, $Empresa['url']);
                            $a = EnviarEmail($assoc['email'], $campos['asunto'], $campos['mensaje']);       
                        }
                    }
                }
        
        $uid = $_SESSION['usr']['id'];
        
        $sql = "DELETE FROM bd_carrito 
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $sql = "DELETE FROM bd_abono
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $_SESSION['domiciliacion'] = null;
        
		header('Location: '.$draizp .'/'. $_SESSION['lenguaje'].'dsubscripcion');
	}
        
        function PagarDomiciliacionFD($penvio, $transp)
	{
		global $dbi, $Empresa;
		require_once('./sistema/mod_contacto.php');
                require_once('./sistema/mod_varios.php');
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){ 
                    $empresilla = $_SESSION['compra']['afiliadopaypal'];
                }else{
                    $empresilla = $Empresa['nombre'];
                }
		
		$secreto = uniqid();
                $cambio = ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],1);
		$precio = CrearUnaCompraPendiente($_SESSION['usr']['id'], $penvio, $transp, $secreto, 'financiacionDirecta', array ($_SESSION['compra']['entrega']['nombre'], $_SESSION['compra']['entrega']['dni'], $_SESSION['compra']['entrega']['direccion'], $_SESSION['compra']['entrega']['pais'], $_SESSION['compra']['entrega']['provincia'], $_SESSION['compra']['entrega']['localidad'], $_SESSION['compra']['entrega']['cp'], $_SESSION['compra']['entrega']['paisid']), array ($_SESSION['compra']['entrega']['nombreE'], $_SESSION['compra']['entrega']['direccionE'], $_SESSION['compra']['entrega']['paisE'], $_SESSION['compra']['entrega']['provinciaE'], $_SESSION['compra']['entrega']['localidadE'], $_SESSION['compra']['entrega']['cpE'], $_SESSION['compra']['entrega']['telefono']), $cambio, $Empresa['moneda'], $_SESSION['divisa']);
		$campos['asunto'] = 'Pago para compra de '.$empresilla;
		$campos['mensaje'] = ConstruirMsgDomiciliacion($_SESSION['usr']['nombre'], $campos['asunto'], $Empresa['direccion'].'<br>'.$Empresa['direccion2'].'<br>'.$Empresa['localidad'].', '.$Empresa['provincia'].'<br>('.$Empresa['pais'].') '.$Empresa['cp'], ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$precio), $secreto);
                $a = EnviarEmail($_SESSION['usr']['email'], $campos['asunto'], $campos['mensaje']);
		
		$campos['asunto'] = 'Nueva Compra para Gestionar';
		$campos['mensaje'] = AvisarDeCompraAGestionar('domfd', $secreto, $Empresa['url']);
		$a = EnviarEmail($Empresa['email'], $campos['asunto'], $campos['mensaje']);
                
                if($_SESSION['compra']['afiliadopaypal'] != ''){  
                    $sqlpais = "SELECT email FROM bd_distribuidores WHERE nombre = '".$_SESSION['compra']['afiliadopaypal']."'";
                    $query = mysqli_query($dbi, $sqlpais);
                    if (mysqli_num_rows($query) > 0){
                        $assoc = mysqli_fetch_assoc($query);
                        if($assoc['email'] != ''){
                            $campos['mensaje'] = AvisarDeCompraAGestionarAfil('domfd', $secreto, $Empresa['url']);
                            $a = EnviarEmail($assoc['email'], $campos['asunto'], $campos['mensaje']);       
                        }
                    }
                }
        
        $uid = $_SESSION['usr']['id'];
        
        $sql = "DELETE FROM bd_carrito 
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $sql = "DELETE FROM bd_abono
                WHERE idusuario=$uid;";
        $query = mysqli_query($dbi, $sql);
        
        $_SESSION['domiciliacion'] = null;
        
		header('Location: '.$draizp .'/'. $_SESSION['lenguaje'].'financiacion');
	}
        
    function CondicionesEspeciales($pid, $uid, $idcuota)
    {
        global $dbi;
        $dev = true;
        $especial = 0;
        
        if($pid != ''){
            $sql = "SELECT paypalm, domicim, fDirecta, aplazame FROM bd_productos WHERE id = '$pid'";
            $query = mysqli_query($dbi, $sql);
            if (mysqli_num_rows($query) == 1)
            {
                $assoc = mysqli_fetch_assoc($query);
                $pay1 = $assoc['paypalm'];
                $dom1 = $assoc['domicim'];
                $fdi1 = $assoc['fDirecta'];
                $apl1 = $assoc['aplazame'];
                if($pay1 == 1 ||$dom1 == 1 || $fdi1 == 1 || $apl1 == 1)
                    $especial = 1;
                else
                    $especial = 0;
            }
        }
        
        if($pid != '' && $_SESSION['usr'] != null){
            $sql2 = "SELECT idproducto, idcuotas FROM bd_carrito WHERE idusuario = '$uid'";
            $query2 = mysqli_query($dbi, $sql2);
            if (mysqli_num_rows($query2) > 0){
                while(($assoc2 = mysqli_fetch_assoc($query2)) && $dev){
                    if($assoc2['idcuotas'] != $idcuota && $assoc2['idcuotas'] != 0){
                        $dev = false;
                    }
                    $sql3 = "SELECT paypalm, domicim, fDirecta, aplazame FROM bd_productos WHERE id = '".$assoc2['idproducto']."'";
                    $query3 = mysqli_query($dbi, $sql3);
                    if (mysqli_num_rows($query3) == 1)
                    {
                        $assoc3 = mysqli_fetch_assoc($query3);
                        if($assoc3['paypalm'] == 1 || $assoc3['domicim'] == 1 || $assoc3['fDirecta'] == 1 || $assoc3['aplazame'] == 1){
                            if($especial == 1){
                                if($assoc3['paypalm'] != $pay1 || $assoc3['domicim'] != $dom1 || $assoc3['fDirecta'] != $fdi1 || $assoc3['aplazame'] != $apl1){
                                    $dev = false;
                                }
                            }else{
                                $dev = false;
                            }
                        }else{
                            if($especial == 1){
                                $dev = false;
                            }
                        }
                    }
                }
            } 
        }else if($pid != ''){
            for ($i = 0; $i < count($_SESSION['cestases']); $i++){
                $sql3 = "SELECT paypalm, domicim, fDirecta, aplazame FROM bd_productos WHERE id = '".$_SESSION['cestases'][$i]['pid']."'";
                    $query3 = mysqli_query($dbi, $sql3);
                    if (mysqli_num_rows($query3) == 1)
                    {
                        $assoc3 = mysqli_fetch_assoc($query3);
                        if($assoc3['paypalm'] == 1 || $assoc3['domicim'] == 1 || $assoc3['fDirecta'] == 1 || $assoc3['aplazame'] == 1){
                            if($especial == 1){
                                if($assoc3['paypalm'] != $pay1 || $assoc3['domicim'] != $dom1 || $assoc3['fDirecta'] != $fdi1 || $assoc3['aplazame'] != $apl1)
                                    $dev = false;
                            }else{
                                $dev = false;
                            }
                        }else{
                            if($especial == 1)
                                $dev = false;
                        }
                    }
            }
        }
        return $dev;
    }
    
    function CargarCampos(){
        global $dbi;
        $dev = array();
        
        $sql = "SELECT * FROM bd_campos_pedido"; 
        $query = mysqli_query($dbi, $sql);
        if (mysqli_num_rows($query) > 0)
        {
            while($assoc = mysqli_fetch_assoc($query)){
                array_push($dev, array(
                    'nombre' => $assoc['nombre'],
                    'tipo' => $assoc['tipo']
                ));
            }
        }
        return $dev;
    }
    
    function GuardarExtras($secreto){
        $extras = CargarCampos();
        if(count($extras) > 0){
            foreach ($extras AS $ext1){
                if($ext1['tipo'] == 0 || $ext1['tipo'] == 1)
                    GuardarExtra($ext1['nombre'], $_POST[$ext1['nombre']], $secreto, $ext1['tipo']);
                else if ($ext1['tipo'] == 2)
                    GuardarExtraArchivo($ext1['nombre'], $secreto, $ext1['tipo']);
            }
        }
    }
    
    function GuardarExtra($nombre, $valor, $secreto, $tipo){
        global $dbi;
                
        $sql = "INSERT INTO bd_pedidos_extras VALUES (null, '$nombre', '$valor', '$secreto', '$tipo')";
        $query = mysqli_query($dbi, $sql);
    }
    
    function GuardarExtraArchivo ($nombre, $secreto, $tipo){
        global $dbi;
                
        $dir_subida = 'pedidos_ficheros/'.$secreto.'/';
        mkdir($dir_subida);
        $extension = explode('.', $_FILES[$nombre]['name']);
        $nombre_final = $nombre . "." . $extension[1];
        if($_FILES[$nombre]['size'] > 0){
            $fichero_subido = $dir_subida . $nombre_final;
            $dev = move_uploaded_file($_FILES[$nombre]['tmp_name'], $fichero_subido);
        }
        
        $sql = "INSERT INTO bd_pedidos_extras VALUES (null, '$nombre', '$nombre_final', '$secreto', '$tipo')";
        $query = mysqli_query($dbi, $sql);
    }
    
    function PagosEspeciales($uid){
        global $dbi;
        
        $dev = array();
        $sql = "SELECT idproducto FROM bd_carrito WHERE idusuario = '".$uid."'"; 
        $query = mysqli_query($dbi, $sql);
        if (mysqli_num_rows($query) > 0)
        {
            $assoc = mysqli_fetch_assoc($query);
            $sql3 = "SELECT paypalm, domicim, fDirecta, aplazame, caplazame, caplazame1 FROM bd_productos WHERE id = '".$assoc['idproducto']."'";
            $query3 = mysqli_query($dbi, $sql3);
            $assoc3 = mysqli_fetch_assoc($query3);
            if($assoc3['paypalm'] == 1 || $assoc3['domicim'] == 1 || $assoc3['fDirecta'] == 1 || $assoc3['aplazame'] == 1){
                if($assoc3['fDirecta'] == 1){
                    $sql_fd = "SELECT c.meses AS meses, fd.cuota AS cuota FROM bd_productos_fdirecta fd, bd_productos_cuotas c WHERE idproducto = '".$assoc['idproducto']."' AND fd.meses = c.id_c ORDER BY fd.cuota ASC";
                    
                    $query_fd = mysqli_query($dbi, $sql_fd);
                    $assoc_fd = mysqli_fetch_assoc($query_fd);
                    $meses = $assoc_fd['meses'];
                    $cuota = $assoc_fd['cuota'];
                }else{
                    $meses = 0;
                    $cuota = 0;
                }
                
                $dev['paypalm'] = $assoc3['paypalm'];
                $dev['domicim'] = $assoc3['domicim'];
                $dev['fDirecta'] = $assoc3['fDirecta'];
                $dev['aplazame'] = $assoc3['aplazame'];
                $dev['caplazame'] = $assoc3['caplazame'];
                $dev['caplazame1'] = $assoc3['caplazame1'];
                $dev['meses'] = $meses;
                $dev['cuota'] = $cuota;
            }
                                    
        }
        return $dev;
    }
    
    function GenerarRMA($secreto){
        global $dbi;
        $dev = -1;
        $total = 0;
        
        $sql = "SELECT * FROM bd_compra WHERE secreto = '$secreto' AND idusuario='".$_SESSION['usr']['id']."'";
        $query = mysqli_query($dbi, $sql);
        if (mysqli_num_rows($query) > 0){
            $assoc = mysqli_fetch_assoc($query);
            $sql2 = "SELECT * FROM `bd_compra_productos`WHERE `idcompra` = '".$assoc['id']."'";
            $query2 = mysqli_query($dbi, $sql2);
            if (mysqli_num_rows($query2) > 0){
                $dev = 1;
                $sqlI1 = "INSERT INTO `bd_rma` VALUES (null, '$assoc[id]', 0, '".$_POST['portes']."','".date("Y-m-d H:i:s")."', '$secreto', 'pendiente', '".$_POST['comentario']."', '')";
                $queryI1 = mysqli_query($dbi, $sqlI1);
                $nrma = mysqli_insert_id($dbi);
                while($assoc2 = mysqli_fetch_assoc($query2)){
                    $var = 'cantidad'.$assoc2['id'];
                    $cantidad = $_POST[$var];
                    if($cantidad > 0){
                        $sqlI2 = "INSERT INTO `bd_rma_producto` VALUES (null, '$nrma', '".$assoc2['idproducto']."', $cantidad, '".$assoc2['descuento']."', '".$assoc2['talla']."', '".$assoc2['extra']."', '".$assoc2['pack']."', '".$assoc2['packid']."', '".$assoc2['precio']."', '".$assoc2['personalizado']."')";
                        $queryI2 = mysqli_query($dbi, $sqlI2);
                        $total += $cantidad * $assoc2['precio'];
                    }
                }
                $sqlU1 = "UPDATE `bd_rma` SET precio = '$total' WHERE id = '$nrma'";
                $queryI1 = mysqli_query($dbi, $sqlU1);
            }
        }
        return $dev;
    }
    
    function ObtenerFechaCompra ($id){
        global $dbi;
        $dev = "01-01-1970 00:00";
        $sql = "SELECT fecha FROM bd_facturas WHERE sesion = '$id'";
        $query = mysqli_query($dbi, $sql);
        if (mysqli_num_rows($query) > 0){
            $assoc = mysqli_fetch_assoc($query);
            $dev = date("m-d-Y H:i", strtotime($assoc['fecha']));
        }
        
        return $dev;
    }
    
    
    function ObtenerDatosRMAMail($id){
        global $dbi;
        $sql = "SELECT r.estado, r.comentario_vend, u.nombre, u.email 
                FROM bd_rma r, bd_users u , bd_facturas f
                WHERE r.id = $id
                AND r.secreto = f.sesion
                AND f.idusuario = u.id";
        $query = mysqli_query($dbi, $sql);
        $assoc = mysqli_fetch_assoc($query);
        return $assoc;
    }
    
    function estaDisponibleAnadir($id){
        global $dbi;
        $dev = false;
        $sql = "SELECT unidades, pagotado, agotado FROM bd_productos WHERE id = $id";
        
        $query = mysqli_query($dbi, $sql);
        if (mysqli_num_rows($query) > 0){
            $assoc = mysqli_fetch_assoc($query);
            if($assoc['pagotado'] == 0){
                $dev = true;
            }else{
                if($assoc['agotado'] == 0 && $assoc['unidades'] > 0){
                    $dev = true;
                }
            }
        }
        return $dev;
    }
?>