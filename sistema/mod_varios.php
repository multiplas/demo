<?php
	function DatosEmpresa($ide)
	{
		global $dbi;
		$datos[] = null;
		
		$sql = "SELECT * 
				FROM bd_empresa 
				WHERE id=$ide;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
			array_push($datos, 
				array(
					"nombre" => $assoc['nombre'],
					"cif" => $assoc['cif'],
					"imagen" => $assoc['imagen'],
					"email" => $assoc['email'],
					"tw" => $assoc['twitter'],
					"gp" => $assoc['google'],
					"fb" => $assoc['facebook'],
                                        "pt" => $assoc['pinterest'],
					"in" => $assoc['instagram'],
                                        "yt" => $assoc['youtube'],
                                        "localidad" => $assoc['localidad'],
					"provincia" => $assoc['provincia'],
					"direccion" => $assoc['direccion'],
                                        "cp" => $assoc['cp'],
                                        "pais" => $assoc['pais'],
					"telefono" => $assoc['telefono'],
                                        "telefono2" => $assoc['telefono2'],
                                        "telefono3" => $assoc['telefono3'],
					"portes_gratis" => $assoc['portesgratis'],
					"paypal" => $assoc['paypal'],
					"cuenta" => $assoc['cuenta'],
                                        "bic_swift" => $assoc['bicswift'],
					"contrareembolso" => $assoc['tasacontrareembolso'],
                                        "entienda" => $assoc['entienda'],
                                        "iban" => $assoc['iban'],
                                        "tpv" => $assoc['tpv'],
                                        "tpv2" => $assoc['tpv2'],
					"msgtop" => $assoc['msgtop'],
                                        "msgbottom" => $assoc['msgbottom'],
                                        "icono" => $assoc['icono'],
                                        "url" => $assoc['dominio'],
                                        "galeria" => $assoc['galeria'],
                                        "blog" => $assoc['blog'],
                                        "blogin" => $assoc['blogin'],
                                        "impuesto" => $assoc['impuesto'],
                                        "registro" => $assoc['registro'],
                                        "desglose" => $assoc['desglose'],
					"horario" => $assoc['horario'],
                                        "moneda" => $assoc['moneda'],
                                        "envimail" => $assoc['envimail'],
                                        "mailSmtp" => $assoc['mailSmtp'],
                                        "passSmtp" => $assoc['passSmtp'],
                                        "puertoSmtp" => $assoc['puertoSmtp'],
                                        "hostSmtp" => $assoc['hostSmtp'],
                                        "segSmtp" => $assoc['segSmtp'],
                                        "factura" => $assoc['factura'],
                                        "cestaU" => $assoc['cestaU'],
                                        "dPedido" => $assoc['dPedido'],
                                        "condiciones" => $assoc['condiciones'],
                                        "aplazamePuK" => $assoc['aplazamePuK'],
                                        "chat" => $assoc['chat'],
                                        "masvendido" => $assoc['masvendido'],
                                        "mvmodo" => $assoc['mvmodo'],
                                        "novedades" => $assoc['novedades'],
                                        "novmodo" => $assoc['novmodo'],
                                        "wassap" => $assoc['wassap'],
                                        "rma" => $assoc['rma'],
                                        "rma_dias" => $assoc['rma_dias'],
                                        "rma_gastos" => $assoc['rma_gastos'],
                                        "ftamano" => $assoc['ftamano'],
                                        "com_producto" => $assoc['com_producto'],
                                        "com_blog" => $assoc['com_blog'],
                                        "com_galeria" => $assoc['com_galeria'],
                                        "pnovlateral" => $assoc['pnovlateral'],
                                        "vgaleria" => $assoc['vgaleria'],
                                        "textonov" => $assoc['textonov'],
                                        "textomv" => $assoc['textomv'],
                                        "etiqpro" => $assoc['etiqpro'],
                                        "mapskey" => $assoc['mapskey'],
                                        "mapszoom" => $assoc['mapszoom'],
                                        "mapscoor" => $assoc['mapscoor'],
                                        "tipoportes" => $assoc['tipoportes'],
                                        "actanu" => $assoc['actanu'],
                                        "enlvid" => $assoc['enlvid'],
                                        "anchvid" => $assoc['anchvid'],
                                        "luganu" => $assoc['luganu'],
                                        "pie" => $assoc['pie'],
                                        "cabecera" => $assoc['cabecera'],
                                        "msgdiasmax"  => $assoc['msgdiasmax'],
                                        "logoinf" => $assoc['logoinf'],
                                        "mgfacebook" => $assoc['mgfacebook'],
                                        "mgflugar" => $assoc['mgflugar'],
                                        "ngaleria" => $assoc['ngaleria'],
                                        "nblog" => $assoc['nblog'],
                                        "det_producto" => $assoc['det_producto'],
                                        "mcatalogo" => $assoc['mcatalogo'],
                                        "ippaypal" => $assoc['ippaypal'],
                                        "ifpaypal" => $assoc['ifpaypal'],
                                        "facebookIcon" => $assoc['facebookIcon'],
                                        "twitterIcon" => $assoc['twitterIcon'],
                                        "gplusIcon" => $assoc['gplusIcon'],
                                        "pinterestIcon" => $assoc['pinterestIcon'],
                                        "instagramIcon" => $assoc['instagramIcon'],
                                        "youtubeIcon" => $assoc['youtubeIcon'],
                                        "desactivarGE" => $assoc['desactivarGE'],
                                        "descripcionHTML" => $assoc['descripcionHTML'],
                                        "compGaleria" => $assoc['compGaleria'],
                                        "imgfacebookD" => $assoc['imgfacebookD'],
                                        "httpsAc" => $assoc['httpsAc'],
                                        "etiqProCesta" => $assoc['etiqProCesta'],
                                        "filaAtrCesta" => $assoc['filaAtrCesta'],
                                        "etiqAct" => $assoc['etiqAct'],
                                        "lk" => $assoc['linkedin'],
                                        "linkedinIcon" => $assoc['linkedinIcon'],
                                        "preSoli" => $assoc['preSoli'],
                                        "preRegis" => $assoc['preRegis'],
                                        "mvposicion" => $assoc['mvposicion'],
                                        "novposicion" => $assoc['novposicion'],
                                        "ordenacion" => $assoc['ordenacion'],
                                        "actDes" => $assoc['actDes'],
                                        "actPreAnt" => $assoc['actPreAnt'],
                                        "actPre" => $assoc['actPre'],
                                        "transporteIcon" => $assoc['transporteIcon'],
                                        "promocionIcon" => $assoc['promocionIcon'],
                                        "paypalNombre" => $assoc['paypalNombre'],
                                        "tpvNombre" => $assoc['tpvNombre'],
                                        "transfeNombre" => $assoc['transfeNombre'],
                                        "contraNombre" => $assoc['contraNombre'],
                                        "domiNombre" => $assoc['domiNombre'],
                                        "tiendaNombre" => $assoc['tiendaNombre'],
                                        "aplazaNombre" => $assoc['aplazaNombre'],
                                        "permBor" => $assoc['permBor'],
                                        "permCant" => $assoc['permCant'],
                                        "mmcesta" => $assoc['mmcesta'],
                                        "pieS" => $assoc['pieS']
				)
			);
			unset($datos[0]);
			$datos = array_values($datos);
		}
		else
			$datos = null;
		
		return $datos[0];
	}
        
        function DivisaPrincipal(){
            global $dbi;
            $dev = 'EUR';
            
            $sql = "SELECT moneda 
				FROM bd_empresa 
				WHERE id=1";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) == 1)
		{
			$assoc = mysqli_fetch_assoc($query);
                        $dev = $assoc['moneda'];
                }
            return $dev;
        }


    function LabelIdioma($idioma)
	{
		global $dbi;
		$datos[] = null;
		
		$sql = "SELECT * 
				FROM bd_bloque_idioma
				WHERE idioma='$idioma';";
        
		$query = mysqli_query($dbi, $sql);
        while($assoc = mysqli_fetch_assoc($query)){
            array_push($datos, 
                array(
                    $assoc['label']
                )
            );
        }
			unset($datos[0]);
			$datos = array_values($datos);
		
		return $datos;
	}

    function Idiomas()
	{
		global $dbi;
		$datos[] = null;
		
		$sql = "SELECT * 
				FROM bd_idiomas
				WHERE activo=1;";
        
		$query = mysqli_query($dbi, $sql);
        while($assoc = mysqli_fetch_assoc($query)){
            array_push($datos, 
                array(
                    $assoc['iniciales']
                )
            );
        }
			unset($datos[0]);
			$datos = array_values($datos);
		
		return $datos;
	}   
        
    function Divisas()
	{
		global $dbi;
		$datos[] = null;
		
		$sql = "SELECT * 
				FROM bd_divisa
				WHERE Activa=1";
        
		$query = mysqli_query($dbi, $sql);
        while($assoc = mysqli_fetch_assoc($query)){
            $datos[$assoc['Codigo']] = 1;
        }		
		return $datos;
	}

    function NombreIdioma($idioma)
	{
		global $dbi;
		$datos[] = null;
		
		$sql = "SELECT * 
				FROM bd_bloque_idioma
				WHERE idioma='$idioma';";
        
		$query = mysqli_query($dbi, $sql);
        while($assoc = mysqli_fetch_assoc($query)){
            array_push($datos, 
                array(
                    $assoc['nombre']
                )
            );
        }
			unset($datos[0]);
			$datos = array_values($datos);
		
		return $datos;
	}
        
        function CalcularPath($producto = null, $draizp)
	{
            
            global $dbi;
            
            $sql = "SELECT nombre, idcat FROM bd_productos WHERE id = $producto";
            $consql = mysqli_query($dbi, $sql);
            $resultsql = mysqli_fetch_array($consql);
            
            
            $sql = "SELECT idmenu FROM bd_categorias WHERE id = '".$resultsql['idcat']."'";
            $consql = mysqli_query($dbi, $sql);
            $resultsql2 = mysqli_fetch_array($consql);
            
            if(CalculoPathMenu($resultsql2['idmenu'], $draizp) != '')
                $path = CalculoPathMenu($resultsql2['idmenu'], $draizp);
            else
                $path = CalculoCategoryPath($resultsql['idcat']);
            
            $path .= " > " .$resultsql['nombre'];
            
            return $path;
            
        }

        function CalculoCategoryPath($idCat, $draizp){
            global $dbi;
            $result = '';

            $no_permitidas= array ("'","/","!","¡","?","¿","\"","$","%","&","(",")","=","[","]","{","}","+","*",",",";",":","·",">","<","á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹", " ");
            $permitidas= array ("","","","","","","","","","","","","","","","","","","","","","","","","","a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","-");

            $sql = "SELECT * FROM  bd_categorias WHERE id = $idCat";
            $consql = mysqli_query($dbi, $sql);
            $resultsql = mysqli_fetch_array($consql);

            if(!empty($resultsql['categoria']))
                return " > <a href='".$draizp."/".$_SESSION['lenguaje']."productos/".$resultsql['id']."/".strtolower(str_replace(" ", "-", str_replace($no_permitidas, $permitidas , $resultsql['categoria'])))."'/>". $resultsql['categoria'] . "</a>";
            else
                return $result;
        }
        
        function CalculoPathMenu($padre, $draizp){
            
            global $dbi;
            $result = '';
            
            $no_permitidas= array ("'","/","!","¡","?","¿","\"","$","%","&","(",")","=","[","]","{","}","+","*",",",";",":","·",">","<","á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹", " ");
            $permitidas= array ("","","","","","","","","","","","","","","","","","","","","","","","","","a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","-");

            
            $sql = "SELECT * FROM  bd_menu WHERE id = $padre";
            $consql = mysqli_query($dbi, $sql);
            $resultsql = mysqli_fetch_array($consql);
            
            if($resultsql['id_padre'] == NULL && (!empty($resultsql['nombre']))){
                return " > <a href='".$draizp."/".$_SESSION['lenguaje']."productos/".$resultsql['id']."/".strtolower(str_replace(" ", "-", str_replace($no_permitidas, $permitidas , $resultsql['nombre'])))."'/>". $resultsql['nombre'] . "</a>";
            }elseif(!empty($resultsql['nombre'])){
                $result .= CalculoPathMenu($resultsql['id_padre'], $draizp);
                return $result . " > <a href='".$draizp."/".$_SESSION['lenguaje']."productos/".$resultsql['id']."/".strtolower(str_replace(" ", "-", str_replace($no_permitidas, $permitidas , $resultsql['nombre'])))."'/>". $resultsql['nombre'] . "</a>";
            }            
            else
                return $result;
        }
	
	function Categorias($idpadre = null)
	{
		global $dbi;
		$categorias[] = null;
        
        if ($idpadre != null)
            $idpadre = '= '.$idpadre;
        else
            $idpadre = 'IS null';
		
        $sql = "SELECT menu 
				FROM bd_empresa;";
        $menuselect = mysqli_query($dbi, $sql);
        $menufinal = mysqli_fetch_array($menuselect);

        if($menufinal['menu'] == 1){
            
            $sql = "SELECT id, nombre, imagen, url, descripcion, url_target
				FROM bd_menu 
				WHERE id_padre $idpadre ORDER BY orden, nombre ASC;";
            
        }else{
            
            $sql = "SELECT id, categoria AS nombre
				FROM bd_categorias 
				WHERE idpadre $idpadre AND marca = 0 ORDER BY orden, nombre ASC;";
        }
        
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                $sql = "SELECT * FROM bd_categoria_idioma WHERE idcategoria = $assoc[id] AND idioma = '$_SESSION[idioma]'";
                //echo $sql;
                $query1 = mysqli_query($dbi, $sql);
                $assoc1 = mysqli_fetch_array($query1);
                    $categoria_idioma =
                        array(
                            'nombre' => $assoc1['nombre']
                        );
                
                array_push($categorias, 
                        array(
                            "id" => $assoc['id'],
                            "nombre" => $assoc['nombre'],
                            "categorias" => Categorias($assoc['id']),
                            "imagen" => $assoc['imagen'],
                            "url" => $assoc['url'],
                            "descripcion" => $assoc['descripcion'],
                            "url_target" => $assoc['url_target']
                        )
                    );
                
                /*if($_SESSION['idioma'] == 'ESP')
                    array_push($categorias, 
                        array(
                            "id" => $assoc['id'],
                            "nombre" => $assoc['nombre'],
                            "categorias" => Categorias($assoc['id'])
                        )
                    );
                else
                    if(mysqli_num_rows($query1) > 0)
                        array_push($categorias, 
                            array(
                                "id" => $assoc['id'],
                                "nombre" => $categoria_idioma['nombre'],
                                "categorias" => Categorias($assoc['id'])
                            )
                        );*/
            }
			unset($categorias[0]);
			$categorias = array_values($categorias);
		}
		else
			$categorias = null;
		
		return $categorias;
	}

    function GetGaleryName(){
        global $dbi;
        $sql = "SELECT * FROM bd_categoria_galeria WHERE id = 1";

        $query = mysqli_query($dbi, $sql);
        $assoc = mysqli_fetch_assoc($query);
        return $assoc['nombre'];
    }

    function CategoriasMenuPadre($idmenupadre){
        global $dbi;
        $categorias[] = null;
        $conditions = '';
        if($idmenupadre != 0)
            $conditions = "WHERE id_padre = $idmenupadre";
        

        $sql = "SELECT id, nombre, imagen, url, descripcion 
				FROM bd_menu 
				$conditions ORDER BY orden, nombre ASC;";
        $query = mysqli_query($dbi, $sql);

        if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                $sql = "SELECT * FROM bd_categoria_idioma WHERE idcategoria = $assoc[id] AND idioma = '$_SESSION[idioma]'";
                //echo $sql;
                $query1 = mysqli_query($dbi, $sql);
                $assoc1 = mysqli_fetch_array($query1);
                $categoria_idioma = array('nombre' => $assoc1['nombre']);
                
                array_push($categorias, 
                        array(
                            "id" => $assoc['id'],
                            "nombre" => $assoc['nombre'],
                            "categorias" => Categorias($assoc['id']),
                            "imagen" => $assoc['imagen'],
                            "url" => $assoc['url'],
                            "descripcion" => $assoc['descripcion']
                        )
                    );
            }
			unset($categorias[0]);
			$categorias = array_values($categorias);
		}
		else
			$categorias = null;
		
		return $categorias;
    }
        
        
        function CategoriasNP($idpadre = null)
	{
		global $dbi;
		$categorias[] = null;
        
        
        $idpadre = 'IS NOT null';
		
        $sql = "SELECT menu 
				FROM bd_empresa;";
        $menuselect = mysqli_query($dbi, $sql);
        $menufinal = mysqli_fetch_array($menuselect);

        if($menufinal['menu'] == 1){
            
            $sql = "SELECT id, nombre, imagen, url, descripcion 
				FROM bd_menu 
				WHERE id_padre $idpadre AND id NOT IN (SELECT id_padre FROM bd_menu WHERE id_padre IS NOT NULL)  ORDER BY orden, nombre ASC;";
            
        }else{
            
            $sql = "SELECT id, categoria AS nombre 
				FROM bd_categorias 
				WHERE idpadre $idpadre AND marca = 0 AND id NOT IN (SELECT idpadre FROM bd_categorias WHERE idpadre IS NOT NULL)  ORDER BY orden, nombre ASC;";
        }
        ;
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                $sql = "SELECT * FROM bd_categoria_idioma WHERE idcategoria = $assoc[id] AND idioma = '$_SESSION[idioma]'";
                //echo $sql;
                $query1 = mysqli_query($dbi, $sql);
                $assoc1 = mysqli_fetch_array($query1);
                    $categoria_idioma =
                        array(
                            'nombre' => $assoc1['nombre']
                        );
                
                array_push($categorias, 
                        array(
                            "id" => $assoc['id'],
                            "nombre" => $assoc['nombre'],
                            "categorias" => Categorias($assoc['id']),
                            "imagen" => $assoc['imagen'],
                            "url" => $assoc['url'],
                            "descripcion" => $assoc['descripcion']
                        )
                    );
            }
			unset($categorias[0]);
			$categorias = array_values($categorias);
		}
		else
			$categorias = null;
		
		return $categorias;
	}
        
        
        function CategoriasBlog()
	{
		global $dbi;
		$categorias[] = null;
                $sql = "SELECT id, nombre 
				FROM bd_categoria_blog 
				ORDER BY nombre ASC;";
            
      
        
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                
                
                array_push($categorias, 
                        array(
                            "id" => $assoc['id'],
                            "nombre" => $assoc['nombre']
                        )
                    );
                
               
            }
			unset($categorias[0]);
			$categorias = array_values($categorias);
		}
		else
			$categorias = null;
		
		return $categorias;
	}
        
        
        function CategoriasBlogN($id)
	{
		global $dbi;
		$categorias[] = null;
                $path = "<a href='".$draizp."/".$_SESSION['lenguaje']."/blog'>Blog</a> > ";
                $sql = "SELECT id, nombre, idcat
				FROM bd_paginas 
                                WHERE id = $id
				ORDER BY nombre ASC;";
            
      
        
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			$assoc = mysqli_fetch_assoc($query);
                        $sql2 = "SELECT id, nombre FROM bd_categoria_blog WHERE id = '".$assoc['idcat']."'";
                        $query2 = mysqli_query($dbi, $sql2);
                        if (mysqli_num_rows($query2) > 0)
                        {
                            $assoc2 = mysqli_fetch_assoc($query2);
                            $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
                            $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
                            if(isset($_SESSION['lenguaje']) && !empty($_SESSION['lenguaje']))
                                $path .= "<a href='".$draizp."/".$_SESSION['lenguaje']."/entradas/".$assoc2['id']."/".str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$assoc2['nombre']))."'>". $assoc2['nombre'] ."</a> > <a href='".$draizp."/".$_SESSION['lenguaje']."/pagina/".$assoc['id']."/".str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$assoc['nombre']))."'>". $assoc['nombre'] . "</a>";
                            else
                            $path .= "<a href='".$draizp."/entradas/".$assoc2['id']."/".str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$assoc2['nombre']))."'>". $assoc2['nombre'] ."</a> > <a href='".$draizp."/pagina/".$assoc['id']."/".str_replace('Ñ','N',str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$assoc['nombre'])))."'>". $assoc['nombre'] . "</a>";
                        }	
		}
		else
			$path = "";
		
		return $path;
	}
        
        
        function OtrasImagenesBlog($id){
            global $dbi;
            $imagenes[] = null;
            $sql = "SELECT imagen FROM bd_fotos_blog WHERE idblog = $id";
            $query = mysqli_query($dbi, $sql);
            if (mysqli_num_rows($query) > 0)
            {
                while($assoc = mysqli_fetch_assoc($query)){
                    array_push($imagenes, 
                            array(
                                "imagen" => $assoc['imagen']
                            )
                        );
                }
                unset($imagenes[0]);
                $imagenes = array_values($imagenes);
            }
            else
                $imagenes = null;
		
            return $imagenes;
        }
        
        
        function CategoriasGaleria()
	{
		global $dbi;
		$categorias[] = null;
                $sql = "SELECT id, nombre 
				FROM bd_categoria_galeria 
				ORDER BY nombre ASC;";
            
      
        
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                
                
                array_push($categorias, 
                        array(
                            "id" => $assoc['id'],
                            "nombre" => $assoc['nombre']
                        )
                    );
                
               
            }
			unset($categorias[0]);
			$categorias = array_values($categorias);
		}
		else
			$categorias = null;
		
		return $categorias;
	}
        
	
	function Provincia($pid)
	{
		global $dbi;
		$provincia = null;
		
		$sql = "SELECT ID, Name 
				FROM bd_city 
				WHERE ID=$pid ORDER BY Name, ID ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			$assoc = mysqli_fetch_assoc($query);
			$provincia = $assoc['Name'];
		}
		
		return $provincia;
	}
	
	
	function Provincias()
	{
		global $dbi;
		$provincias[] = null;
		
		$sql = "SELECT ID, Name 
				FROM bd_city 
				WHERE CountryCode='ESP' ORDER BY Name, ID ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($provincias, 
					array(
						"id" => $assoc['ID'],
						"nombre" => $assoc['Name'],
					)
				);
			unset($provincias[0]);
			$provincias = array_values($provincias);
		}
		else
			$provincias = null;
		
		return $provincias;
	}
	
	
	function Paises()
	{
		global $dbi;
		$paises[] = null;
		
		$sql = "SELECT Code, LocalName 
				FROM bd_paises 
				WHERE activo=1 ORDER BY LocalName, Code ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($paises, 
					array(
						"id" => $assoc['Code'],
						"nombre" => $assoc['LocalName'],
					)
				);
			unset($paises[0]);
			$paises = array_values($paises);
		}
		else
			$paises = null;
		
		return $paises;
	}
	
	
	function PaisesTodos()
	{
		global $dbi;
		$paises[] = null;
		
		$sql = "SELECT Code, LocalName 
				FROM bd_paises 
				ORDER BY LocalName, Code ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($paises, 
					array(
						"id" => $assoc['Code'],
						"nombre" => $assoc['LocalName'],
					)
				);
			unset($paises[0]);
			$paises = array_values($paises);
		}
		else
			$paises = null;
		
		return $paises;
	}
	
	
	function Pais($idp)
	{
		global $dbi;
		$pais = null;
		
		$sql = "SELECT Code, LocalName 
				FROM bd_paises 
				WHERE Code = '$idp' AND activo=1 ORDER BY LocalName, Code ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			$assoc = mysqli_fetch_assoc($query);
			$pais = $assoc['LocalName'];
		}
		
		return $pais;
	}
	
	
	function Pagina($idp)
	{
		global $dbi;
		$pagina = null;
		
		$sql = "SELECT id, nombre, imagen, contenido , noticia, tituloS, descripcionS, `keyS` 
				FROM bd_paginas 
				WHERE id=$idp;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				$pagina = array
				(
					"id" => $assoc['id'],
					"nombre" => $assoc['nombre'],
					"imagen" => $assoc['imagen'],
					"contenido" => $assoc['contenido'],
                                        "noticia" => $assoc['noticia'],
                                        "tituloS" => $assoc['tituloS'],
                                        "descripcionS" => $assoc['descripcionS'],
                                        "palabrasK" => $assoc['keyS']
				);
		}
		
		return $pagina;
	}

    function PaginasP()
	{
		global $dbi;
		$pagina[] = null;
		
		$sql = "SELECT id, nombre, imagen, contenido 
				FROM bd_paginas 
				WHERE noticia=0
                AND id <> 20001 AND id <> 20002 AND id <> 20012 AND id <> 20013 AND id <> 20016;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($pagina, 
					array(
					"id" => $assoc['id'],
					"nombre" => $assoc['nombre'],
					"imagen" => $assoc['imagen'],
					"contenido" => $assoc['contenido']
                    )
				);
            unset($pagina[0]);
			$pagina = array_values($pagina);
		}else{
            $pagina = null;
        }
		
		return $pagina;
	}
        
        
        function PaginasE()
	{
		global $dbi;
		$pagina[] = null;
		
		$sql = "SELECT id, nombre, imagen, contenido , visible
				FROM bd_paginas 
				WHERE noticia=0
                AND id = 20001 OR id = 20002";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
                            $pagina[$assoc['id']] = $assoc['visible'];
                        
            
		}else{
            $pagina = null;
        }
		
		return $pagina;
	}
        
        
        function EnlacesP()
	{
		global $dbi;
		$pagina[] = null;
		
		$sql = "SELECT *
				FROM bd_paginas_categorias";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($pagina, 
					array(
					"id" => $assoc['id'],
					"nombre" => $assoc['nombre']
                    )
				);
            unset($pagina[0]);
			$pagina = array_values($pagina);
		}else{
            $pagina = null;
        }
		
		return $pagina;
	}
        
        
        function EnlacesP2($id)
	{
		global $dbi;
		$pagina[] = null;
		
		$sql = "SELECT id, url, nombre, imagen, contenido 
				FROM bd_paginas 
				WHERE noticia=2
                                AND categoria_pag = '$id'
                AND id <> 20001 AND id <> 20002 AND id <> 20012 AND id <> 20013 AND id <> 20016;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($pagina, 
					array(
					"id" => $assoc['id'],
                                        "url" => $assoc['url'],
					"nombre" => $assoc['nombre'],
					"imagen" => $assoc['imagen'],
					"contenido" => $assoc['contenido']
                    )
				);
            unset($pagina[0]);
			$pagina = array_values($pagina);
		}else{
            $pagina = null;
        }
		
		return $pagina;
	}
	
	
	function Noticia($n = 1)
	{
		global $dbi;
		$noticia = array();
		
		$sql = "SELECT id, nombre, imagen, fecha, contenido, imagenportada
				FROM bd_paginas 
				WHERE noticia=1 ORDER BY fecha DESC LIMIT $n;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                $sql = "SELECT * FROM bd_blog_idioma WHERE idblog = $assoc[id] AND idioma = '$_SESSION[idioma]'";
                //echo $sql;
                $query1 = mysqli_query($dbi, $sql);
                $assoc1 = mysqli_fetch_array($query1);
                    $categoria_idioma =
                        array(
                            'nombre' => $assoc1['nombre'],
                            'contenido' => $assoc1['descripcion']
                        );
                if($_SESSION['idioma'] == 'ESP')
                    $noticia[] = array
                    (
                        "id" => $assoc['id'],
                        "nombre" => $assoc['nombre'],
                        "imagen" => $assoc['imagen'],
                        "imagenportada" => $assoc['imagenportada'],
                        "fecha" => $assoc['fecha'],
                        "contenido" => $assoc['contenido']
                    );
                else
                    if(mysqli_num_rows($query1) > 0)
                        $noticia[] = array
                        (
                            "id" => $assoc['id'],
                            "nombre" => $categoria_idioma['nombre'],
                            "imagen" => $assoc['imagen'],
                            "imagenportada" => $assoc['imagenportada'],
                            "fecha" => $assoc['fecha'],
                            "contenido" => $categoria_idioma['contenido']
                        );
            }
		}
		
		return $noticia;
	}
	
    function MenuCategorias()
	{
		global $dbi;
		$menu = array();
		
		$sql = "SELECT * 
				FROM bd_categoria_blog
				ORDER BY id ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                $sql = "SELECT * FROM bd_catblog_idioma WHERE idcatblog = $assoc[id] AND idioma = '$_SESSION[idioma]'";
                //echo $sql;
                $query1 = mysqli_query($dbi, $sql);
                $assoc1 = mysqli_fetch_array($query1);
                    $categoria_idioma =
                        array(
                            'nombre' => $assoc1['nombre']
                        );
                $menu[] = array
                    (
                        "id" => $assoc['id'],
                        "nombre" => $assoc['nombre']
                    );
                /*if($_SESSION['idioma'] == 'ESP')
                    $menu[] = array
                    (
                        "id" => $assoc['id'],
                        "nombre" => $assoc['nombre']
                    );
                else
                    if(mysqli_num_rows($query1) > 0)
                        $menu[] = array
                        (
                            "id" => $assoc['id'],
                            "nombre" => $categoria_idioma['nombre']
                        );*/
            }
		}else{
            $menu = null;
        }
		
		return $menu;
	}

function MenuCategoriasGal()
	{
		global $dbi;
		$menu = array();
		
		$sql = "SELECT * 
				FROM bd_categoria_galeria
				ORDER BY id ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                $sql = "SELECT * FROM bd_catgaleria_idioma WHERE idcatgaleria = $assoc[id] AND idioma = '$_SESSION[idioma]'";
                //echo $sql;
                $query1 = mysqli_query($dbi, $sql);
                $assoc1 = mysqli_fetch_array($query1);
                    $categoria_idioma =
                        array(
                            'nombre' => $assoc1['nombre']
                        );
                $menu[] = array
                    (
                        "id" => $assoc['id'],
                        "nombre" => $assoc['nombre']
                    );
                /*if($_SESSION['idioma'] == 'ESP')
                    $menu[] = array
                    (
                        "id" => $assoc['id'],
                        "nombre" => $assoc['nombre']
                    );
                else
                    if(mysqli_num_rows($query1) > 0)
                        $menu[] = array
                        (
                            "id" => $assoc['id'],
                            "nombre" => $categoria_idioma['nombre']
                        );*/
            }
		}else{
            $menu = null;
        }
		
		return $menu;
	}

    function NoticiaCat($n = 1, $idp)
	{
		global $dbi;
		$noticia = array();
		
		$sql = "SELECT id, nombre, imagen, fecha, contenido, imagenportada 
				FROM bd_paginas 
				WHERE noticia=1 AND idcat = $idp ORDER BY fecha, id DESC LIMIT $n;";

		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				$noticia[] = array
				(
					"id" => $assoc['id'],
					"nombre" => $assoc['nombre'],
                    "imagen" => $assoc['imagen'],
                    "imagenportada" => $assoc['imagenportada'],
					"fecha" => $assoc['fecha'],
					"contenido" => $assoc['contenido']
				);
		}

		return $noticia;
	}
	

        function Slider()
	{
		global $dbi;
		$sli[] = null;
		
		$sql = "SELECT imagen, contenido 
				FROM bd_slider
                WHERE idcat = 0
				ORDER BY orden, id ASC;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				array_push($sli, 
					array(
						"imagen" => $assoc['imagen'],
						"contenido" => utf8_decode($assoc['contenido']),
					)
				);
			unset($sli[0]);
			$sli = array_values($sli);
		}
		else
			$sli = null;
		
		return $sli;
	}
	
	
	function CategoriasId($idpadre)
	{
		global $dbi;
		$ids = '';
		
		$sql = "SELECT id 
				FROM bd_categorias
				WHERE id=$idpadre;";
		
		$cont = 1;
		$query = mysqli_query($dbi, $sql);
        $total = mysqli_num_rows($query);
		if (mysqli_num_rows($query) > 0){
			while($assoc = mysqli_fetch_assoc($query)){
				if($cont == $total)
                    $ids .= $assoc['id'];
                else
                    $ids .= $assoc['id'].',';
                $cont++;
            }
        }
		
		return $ids;
	}

    function CategoriasMenu($idmenu)
	{
		global $dbi;
		$ids = '';
		
        $sql2 = "SELECT * FROM bd_menu WHERE id_padre = $idmenu";
        $query2 = mysqli_query($dbi, $sql2);
        if( mysqli_num_rows($query2) > 0){
            while($assoc = mysqli_fetch_assoc($query2)){
                $ids .= CategoriasMenu($assoc['id']);
                if(CategoriasMenu($assoc['id']) != "" && substr(CategoriasMenu($assoc['id']), strlen(CategoriasMenu($assoc['id']))-1, 1) != ","){
                    $ids .= ",";
                }
            }
        }
                
		$sql = "SELECT id 
				FROM bd_categorias
                WHERE idmenu=$idmenu;";
        
		$cont = 1;
		$query = mysqli_query($dbi, $sql);
        $total = mysqli_num_rows($query);
		if (mysqli_num_rows($query) > 0){
			while($assoc = mysqli_fetch_assoc($query)){
		if($cont == $total)
                    $ids .= $assoc['id'];
                else
                    $ids .= $assoc['id'].',';
                $cont++;
            }
        }
        else{
            $sql3 = "SELECT id FROM bd_categorias WHERE categoria like (SELECT nombre FROM bd_menu WHERE id = $idmenu)";
            $cont = 1;
            $query = mysqli_query($dbi, $sql3);
            $total = mysqli_num_rows($query);
            if (mysqli_num_rows($query) > 0){
                while($assoc = mysqli_fetch_assoc($query)){
            if($cont == $total)
                        $ids .= $assoc['id'];
                    else
                        $ids .= $assoc['id'].',';
                    $cont++;
                }
            }
        }
		return $ids;
	}
	
	
	function InfoPortes()
	{
		global $dbi, $Empresa;
		
		$portes = array();
		
		/*$sql = "SELECT pa.Code AS code, pa.LocalName AS region, po.precio AS precio, po.max AS max
				FROM bd_portes po , bd_paises pa
				WHERE code = po.region;";*/
                $sql = "SELECT *
				FROM bd_portes;";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query))
				$portes[] = array(
						'transportista' => $assoc['transportista'],
						'TPGratis' => $assoc['TPGratis'],
						'precioP' => $assoc['precioP'],
						'TBGratis' => $assoc['TBGratis'],
						'precioB' => $assoc['precioB'],
                                                'TEGratis' => $assoc['TEGratis'],
						'precioE' => $assoc['precioE'],
                                                'TIGratis' => $assoc['TIGratis'],
						'precioI' => $assoc['precioI']
					);
		}
	
		return $portes;
	}
        
        function CargarATransp($limit = 10000)
	{
            
                        global $dbi, $Empresa;
                        
			$resultados = array();
			
			$sql = "SELECT *
					FROM bd_transportista
					ORDER BY nombre ASC
					LIMIT $limit;";
			$query = mysqli_query($dbi, $sql);
			
			if (mysqli_num_rows($query) > 0)
				while ($assoc = mysqli_fetch_assoc($query))
					$resultados[] = $assoc;

			return $resultados;
        }
                
                
        function CargarProvincias2($limit = 10000)
	{
			global $dbi, $Empresa;
                        
                        $resultados = array();
			
			$sql = "SELECT ID, Name
					FROM bd_city
					WHERE CountryCode IN (SELECT code FROM `bd_paises` WHERE activo = 1)
					ORDER BY CountryCode ASC, Name ASC, ID ASC
					LIMIT $limit;";
			$query = mysqli_query($dbi, $sql);
			
			if (mysqli_num_rows($query) > 0)
				while ($assoc = mysqli_fetch_assoc($query))
					$resultados[] = $assoc;

			return $resultados;
	}
        
        function CargarPortesProvincias($limit = 10000)
	{
			
			global $dbi, $Empresa;
			
			$resultados = array();
			
			
                        $sql = "SELECT p.id AS idp, p.precio AS precio, t.nombre AS nombre, c.Name AS name, c.ID AS idc, t.id AS idt
                                FROM bd_portes_provincias p, bd_transportista t, bd_city c 
                                WHERE p.id_transp = t.id AND p.id_provincia = c.id";
			$query = mysqli_query($dbi, $sql);
			
			if (mysqli_num_rows($query) > 0)
				while ($assoc = mysqli_fetch_assoc($query))
					$resultados[$assoc['idc']][$assoc['idt']] = $assoc;

			return $resultados;
	}
        
        function CargarPortesProvinciasDefecto($limit = 10000)
	{
            
            global $dbi, $Empresa;
            
			$resultados = array();
			
			
                        $sql = "SELECT p.id AS idp, p.precio AS precio, t.nombre AS nombre, t.id AS idt
                                FROM bd_portes_provincias p, bd_transportista t
                                WHERE p.id_transp = t.id AND p.id_provincia = 0";
			$query = mysqli_query($dbi, $sql);
			
			if (mysqli_num_rows($query) > 0)
				while ($assoc = mysqli_fetch_assoc($query))
					$resultados[$assoc['idt']] = $assoc;

			return $resultados;
	}
        
        function CargarPortesKm($limit = 10000)
	{
			global $dbi, $Empresa;
                        
                        $resultados = array();
			
			
                        $sql = "SELECT * FROM bd_portes_km ORDER BY hastakm ASC";
			$query = mysqli_query($dbi, $sql);
			
			if (mysqli_num_rows($query) > 0)
				while ($assoc = mysqli_fetch_assoc($query))
					$resultados[] = $assoc;

			return $resultados;
	}
                
        function ConvertirMoneda($monedaOrigen,$monedaDestino,$importe) 
        {
            if($monedaOrigen != $monedaDestino){
                $valor = file_get_contents("https://www.google.com/finance/converter?a=$importe&from=$monedaOrigen&to=$monedaDestino");
                $valor = explode("<span class=bld>",$valor);
                $valor = explode("</span>",$valor[1]);  
                return preg_replace("/[^0-9\.]/", null, $valor[0]);
            }else{
                return $importe;
            }
        }
        
        function validarDNI($dni, $tipoC, $tipoD){
            $validacionDNI = 0;
            $dni = strtoupper($dni);
            switch ($tipoC){
                                                        case 'Empresa':
                                                            $cif = strtoupper($dni);
     
                                                            $cifRegEx1 = '/^[ABEH][0-9]{8}$/i';
                                                            $cifRegEx2 = '/^[KPQS][0-9]{7}[A-J]$/i';
                                                            $cifRegEx3 = '/^[CDFGJLMNRUVW][0-9]{7}[0-9A-J]$/i';

                                                            if (preg_match($cifRegEx1, $cif) || preg_match($cifRegEx2, $cif) || preg_match($cifRegEx3, $cif)) {
                                                                $control = $cif[strlen($cif) - 1];
                                                                $suma_A = 0;
                                                                $suma_B = 0;

                                                                for ($i = 1; $i < 8; $i++) {
                                                                    if ($i % 2 == 0) $suma_A += intval($cif[$i]);
                                                                    else {
                                                                        $t = (intval($cif[$i]) * 2);
                                                                        $p = 0;

                                                                        for ($j = 0; $j < strlen($t); $j++) {
                                                                            $p += substr($t, $j, 1);
                                                                        }
                                                                        $suma_B += $p;
                                                                    }
                                                                }

                                                                $suma_C = (intval($suma_A + $suma_B)) . "";
                                                                $suma_D = (10 - intval($suma_C[strlen($suma_C) - 1])) % 10;

                                                                $letras = "JABCDEFGHI";

                                                                if ($control >= "0" && $control <= "9"){ $validacionDNI = ($control == $suma_D); }
                                                                else{ $validacionDNI = (strtoupper($control) == $letras[$suma_D]);  }
                                                            }
                                                            else{ 
                                                                $validacionDNI = 0;
                                                            }
                                                            
                                                            
                                                            break;
                                                        case 'Particular': 
                                                            switch ($tipoD){
                                                                case 'dni':
                                                                    $letra = substr($dni, -1);
                                                                    $numeros = substr($dni, 0, -1);
                                                                    if ( substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros%23, 1) == $letra && strlen($letra) == 1 && strlen ($numeros) == 8 ){
                                                                            $validacionDNI = 1;
                                                                    }else{
                                                                            $validacionDNI = 0;
                                                                    }
                                                                    break;
                                                                case 'pass':
                                                                    	if(!preg_match("/^\w+$/", $val))
                                                                        {
                                                                                $validacionDNI = 0;
                                                                        }else{
                                                                            $validacionDNI = 1;
                                                                        }
                                                                    break;
                                                                case 'nres':
                                                                    $dni = strtoupper($dni);
                                                                    $letra = substr($dni, -1, 1);
                                                                    $numero = substr($dni, 0, 8);

                                                                    // Si es un NIE hay que cambiar la primera letra por 0, 1 ó 2 dependiendo de si es X, Y o Z.
                                                                    $numero = str_replace(array('X', 'Y', 'Z'), array(0, 1, 2), $numero);	

                                                                    $modulo = $numero % 23;
                                                                    $letras_validas = "TRWAGMYFPDXBNJZSQVHLCKE";
                                                                    $letra_correcta = substr($letras_validas, $modulo, 1);

                                                                    if($letra_correcta!=$letra) {
                                                                            $validacionDNI = 0;
                                                                    }
                                                                    else {
                                                                            $validacionDNI = 1;
                                                                    }
                                                                    break;
                                                                case 'otro': $validacionDNI = 1;
                                                                    break;
                                                            }
                                                            break;
                                                    }
            return $validacionDNI;
        }
        
        function MostrarEnvios($id){
            
            global $dbi, $Empresa;
            
            $dev = false;
            
            $sql = "SELECT * FROM bd_carrito WHERE idusuario = '$id';";
            $query = mysqli_query($dbi, $sql);
            
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                            $sql1 = "SELECT tipo FROM  bd_productos WHERE id = '".$assoc["idproducto"]."';";
                            $query1 = mysqli_query($dbi, $sql1);
                            $assoc1 = mysqli_fetch_assoc($query1);
                            if($assoc1['tipo'] == 0 || $assoc1['tipo'] == 3){
                                $dev = true;
                            }
                        }
                }
                return $dev;
        }
        
        //Obtener ip visitante.
        function getRealIP()
        {

            if (isset($_SERVER["HTTP_CLIENT_IP"]))
            {
                return $_SERVER["HTTP_CLIENT_IP"];
            }
            elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
            {
                return $_SERVER["HTTP_X_FORWARDED_FOR"];
            }
            elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
            {
                return $_SERVER["HTTP_X_FORWARDED"];
            }
            elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
            {
                return $_SERVER["HTTP_FORWARDED_FOR"];
            }
            elseif (isset($_SERVER["HTTP_FORWARDED"]))
            {
                return $_SERVER["HTTP_FORWARDED"];
            }
            else
            {
                return $_SERVER["REMOTE_ADDR"];
            }

        }

        //Guardar el estado durante el proceso de compra en la bd.
        function guardarEstadoPC($estado, $carrito, $session = null){
            
            global $dbi;
            
            $ip = getRealIP();
            $pais = file("http://www.geoplugin.net/json.gp?ip=".$ip);
            $pais = explode(':', $pais[9]); 
            $pais = str_replace(",","",$pais);
            $pais = str_replace('"',"",$pais);
            if ($_SESSION['usr'] != null)
                $user = $_SESSION['usr'];
            else
                $user = 'Sin registrar';
            $fecha = date("d-m-Y H:i:s");
            $sql = 'INSERT INTO `bd_proceso_pago`(`id`, `fecha`, `carrito`, `ip`, `pais`, `ult_paso`, `id_usuario`) VALUES(null, "'.$fecha.'", "'.$carrito.'", "'.$ip.'", "'.$pais.'", "'.$estado.'", "'.$user.'",) ON DUPLICATE KEY UPDATE name="A", age=19';
            
        }
        
        function ProcesarComentario($nombre, $mail, $comentario, $idaso, $tipo){
            
            global $dbi;
            
            $fecha = date("Y-m-d H:i:s");
            $sql = "INSERT INTO `bd_comentarios` VALUES (null, '$fecha', $idaso, '$tipo', 0, '$mail', '$nombre', '$comentario')";
            $query = mysqli_query($dbi, $sql);
            
            return $query;
            
        }
        
        function ObtenerComentario($id, $tipo){
            
            global $dbi;
            
            $coment[] = null;
            
            $sql = "SELECT * FROM `bd_comentarios`
                    WHERE tipo = '$tipo'
                    AND Activo = 1
                    AND idasociado = $id
                    LIMIT 0 , 30";
            $query = mysqli_query($dbi, $sql);
            if (mysqli_num_rows($query) > 0)
            {
                while($assoc = mysqli_fetch_assoc($query))
                    array_push($coment, 
                            array(
                                "nombre" => $assoc['nombre'],
                                "comentario" => $assoc['comentario'],
                                "fecha" => $assoc['fecha']
                            )
                    );
                    unset($coment[0]);
                    $coment = array_values($coment);
            }else
                $coment = null;
                
            return $coment; 
        }
        
        function Tiendas()
	{
		global $dbi;
		$pagina[] = null;
		
		$sql = "SELECT * FROM bd_tiendas";
		$query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
		{
			while($assoc = mysqli_fetch_assoc($query)){
                               /* if($_SESSION['lenguaje'] == 'es')
                                    $direccion = $assoc['descripcion'];
                                else if($_SESSION['lenguaje'] = 'fr')
                                    $direccion = $assoc['descripcion_fr'];
                                else if($_SESSION['lenguaje'] = 'de')
                                    $direccion = $assoc['descripcion_al'];
                                else if($_SESSION['lenguaje'] = 'en')
                                    $direccion = $assoc['descripcion_en'];
                                else if($_SESSION['lenguaje'] = 'pr')
                                    $direccion = $assoc['descripcion_po'];
                                else if($_SESSION['lenguaje'] = 'it')
                                    $direccion = $assoc['descripcion_it'];
                                else if($_SESSION['lenguaje'] = 'ca')
                                    $direccion = $assoc['descripcion_ca'];
                                else if($_SESSION['lenguaje'] = 'ru')
                                    $direccion = $assoc['descripcion_ru'];*/
                                    
				array_push($pagina, array
                                    (
					"nombre" => $assoc['nombre'],
					"direccion" => $assoc['direccion'],
					"telefonos" => $assoc['telefonos'],
					"descripcion" => $assoc['descripcion'],
                                        "imagen" => $assoc['imagen']
                                    )
                                );
                                unset($pagina[0]);
                                
                        }
		}
		
		return $pagina;
	}
        
        function GuardarPresupuestoManual($texto, $user, $fecha){
            global $dbi;
            
            $sql = "INSERT INTO `bd_presupuestos` VALUES (null, '$fecha', $user, '$texto', 0, '', 0)";
            $query = mysqli_query($dbi, $sql);
            
            return $query;
        }

    /* Extract Info for Home Bloqs from BD*/
    function getBloqsInfo(){ 
        global $dbi;
        
        $resultado = null;
        
        $sql = "SELECT * FROM bd_home_bloqs WHERE id = 0;";
                
        $query = mysqli_query($dbi, $sql);
        
        if (mysqli_num_rows($query) == 1)
        {
            $assoc = mysqli_fetch_assoc($query);
            $resultado = $assoc;
        }

        return $resultado;
    }

    /* Extract Info for Home Bloqs from BD*/
    function getBarraInfo(){ 
        global $dbi;
        
        $resultado = null;
        
        $sql = "SELECT * FROM bd_barra_status WHERE id = 0;";
                
        $query = mysqli_query($dbi, $sql);
        
        if (mysqli_num_rows($query) == 1)
        {
            $assoc = mysqli_fetch_assoc($query);
            $resultado = $assoc;
        }

        return $resultado;
    }

    function footerCopyrightStatus()
    {
        global $dbi;

        $resultado = null;
        
        $sql = "SELECT * FROM bd_footer_copyright WHERE id = 0;";
                
        $query = mysqli_query($dbi, $sql);
        
        if (mysqli_num_rows($query) == 1)
        {
            $assoc = mysqli_fetch_assoc($query);
            $resultado = $assoc;
        }
        
        return $resultado;
    }

    function categoryBloqStatus(){
        global $dbi;

        $resultado = null;
        
        $sql = "SELECT * FROM bd_bloques_categorias WHERE id = 0;";
                
        $query = mysqli_query($dbi, $sql);
        
        if (mysqli_num_rows($query) == 1)
        {
            $assoc = mysqli_fetch_assoc($query);
            $resultado = $assoc;
        }
        
        return $resultado;
    }

    function insertarSuscriptor($nombre, $email){
        global $dbi;

        $resultado = false;
        
        $sql = "INSERT INTO bd_suscriptores (nombre, email) VALUES ('$nombre', '$email');";

        $query = mysqli_query($dbi, $sql);

        $resultado = true;        

        header('Location: //' . $_SERVER['SERVER_NAME']);
        
        return $resultado;
    }

    function getColors(){
        global $dbi;
                
        $sql="SELECT * FROM bd_colores";
        $query = mysqli_query($dbi, $sql);
        $colores = mysqli_fetch_array($query);
    
        return $colores;
    }

    function getBrands(){
        global $dbi;

        $resultado = array(); 

        $sql="SELECT * FROM bd_categorias WHERE extension<>''";
        $query = mysqli_query($dbi, $sql);
        
        if (mysqli_num_rows($query) >= 1)
        {
            while($assoc = mysqli_fetch_assoc($query)){
                $resultado[] = $assoc;
            }
        }
        
        return $resultado;
    }

    function getMarcasStatus()
    {
        global $dbi;

        $resultado = null;
        
        $sql = "SELECT * FROM bd_marcas_status WHERE id = 0;";
                
        $query = mysqli_query($dbi, $sql);
        
        if (mysqli_num_rows($query) == 1)
        {
            $assoc = mysqli_fetch_assoc($query);
            $resultado = $assoc;
        }

        return $resultado;
    }

    function getCartImages(){
        global $dbi;
        $resultado = array();
        $sql = "SELECT * FROM bd_imagenes_carrito WHERE id NOT LIKE '1'";
        $query = mysqli_query($dbi, $sql);
        if (mysqli_num_rows($query) > 0)			
            while ($assoc = mysqli_fetch_assoc($query))
                $resultado[] = $assoc;	

        return $resultado;
    }

    function loadImagesStatus(){
        global $dbi;
        $resultado = '';

        $sql = "SELECT * FROM bd_imagenes_carrito WHERE id = '1'";
        $query = mysqli_query($dbi, $sql);
        if (mysqli_num_rows($query) == 1)
        {
            $assoc = mysqli_fetch_assoc($query);
            $resultado = $assoc;
        }

        return $resultado;
    }
?>