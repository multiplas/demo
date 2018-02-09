<?php 
	include "bbdd.php";
	include "baseCode.php";
	include "resize-class.php"; 
	$miDominio = "http://ironhealth.pro";
	 $facturaOk = 0;

	include "datosDeSesion.php";

	$urOk = $_SERVER['REQUEST_URI']; 
	$ar = explode("/",$urOk); 
	$elegido = count($ar);
	$ideal = $elegido - 1;
	$fechaActual = date('Y/m/d'); 
	$fechaHr = date('Y/m/d H:i:s'); 

	if($_POST["accion"] == "subirProducto"):
		if (file_exists($_FILES['imagen']['tmp_name'])) {
				$img = $_FILES['imagen'];
				$extension = end(explode(".", $img['name']));
				$imagen = uniqid().'.'.$extension;
				move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
				$imgU = $imagen;

				$miArchivo = "../imagenesproductos/$imagen";
				if(file_get_contents($miArchivo)):
					$foto = new resize($miArchivo);
	              	$foto->resizeImage(200, auto);
	              	$foto->saveImage('../imagenesproductos/min/'.$imagen);
	            endif;
		}
		$descript = str_replace("'","`",$_POST["descripcion"]);
		$descript_en = str_replace("'","`",$_POST["descripcion_en"]);
		$introduce = mysql_query("INSERT INTO bd_productos(nombre, nombre_en, descripcion, descripcion_en, imagenprincipal, unidades, stockminimo, precio, precioalpormayor, descuento, idmarca, idproveedor, iva, peso, referencia,idcat,idcat2,idcat3,idcat4,idcat5,idcat6,idcat7,idcat8,idcat9,idcat10,disponible) VALUES ('".utf8_decode($_POST['nombre'])."','$_POST[nombre_en]','$descript','$descript_en','$imgU','$_POST[uds]','$_POST[stockMinimo]','$_POST[precio]','$_POST[precioAlPorMayor]','$_POST[descuento]','$_POST[idmarca]','$_POST[proveedor]','$_POST[iva]','$_POST[peso]','$_POST[ref]','$_POST[idcat]','$_POST[idcat2]','$_POST[idcat3]','$_POST[idcat4]','$_POST[idcat5]','$_POST[idcat6]','$_POST[idcat7]','$_POST[idcat8]','$_POST[idcat9]','$_POST[idcat10]','$_POST[disponible]')",$db);

        $laDes = str_replace("'","�",$_POST["tvideo"]);
		$codevideo =  end(explode("?v=", $_POST["video"]));
		$thumb = 'http://img.youtube.com/vi/'.$codevideo.'/0.jpg';
		$cap1 = 'http://img.youtube.com/vi/'.$codevideo.'/1.jpg';
		$cap2 = 'http://img.youtube.com/vi/'.$codevideo.'/2.jpg';
		$cap3 = 'http://img.youtube.com/vi/'.$codevideo.'/3.jpg';
        
		$ultimaId = mysql_insert_id();
		$introduce = mysql_query("INSERT INTO bd_infoalmacen(idalmacen, idproducto, cantidad,fecha) VALUES ('$_POST[idAlmacen]','$ultimaId','$_POST[uds]','$fechaHr')",$db);
        $introduceVideo = mysql_query("INSERT INTO bd_productos_videos(id_producto, titulo, descripcion, url, thumb, cap1, cap2, cap3, fecha, home) VALUES ('$ultimaId','$_POST[tvideo]','$laDes','$_POST[video]','$thumb','$cap1','$cap2','$cap3','$fechaHr',0)",$db);
		$aviso = "<span class='verdeS'>El producto $_POST[nombre] ha sido subido correctamente </span>";


		$cadenaH = "Se ha a�adido un nuevo producto:" . $_POST["nombre"] . ", con la referencia: $_POST[ref] y un total de $_POST[uds] uds.";
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idproducto,registro,fecha,idTipo) VALUES ('$ultimaId','$cadenaH','$fechaHr','3')",$db);
	endif;

	if($_POST["accion"] == "eliminarProducto"):
		$deletear = mysql_query("DELETE FROM bd_productos WHERE id = $_POST[idEli]",$db);
		$aviso = "<span class='rojoS'>El producto $_POST[nombreEli] ha sido eliminado correctamente </span>";

		$cadenaH = "Se ha eliminado el producto: " . $_POST["nombreEli"] . " , con la id: $_POST[idEli]";
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idproducto,registro,fecha,idTipo) VALUES ('$_POST[idEli]','$cadenaH','$fechaHr','4')",$db);
	endif;

	if($_POST["accion"] == "eliminaRelacion"):
		$deletear = mysql_query("DELETE FROM bd_productos_relacionados WHERE id = $_POST[idEli]",$db);
		$aviso = "<span class='rojoS'>La relaci&oacute;n ha sido eliminada correctamente </span>";
	endif;

	if($_POST["accion"] == "subeRel"):
		$insertaHistorial = mysql_query("INSERT INTO bd_productos_relacionados (idproducto1,idproducto2) VALUES ('$_POST[p1]','$_POST[p2]')",$db);
		$aviso = "<span class='rojoS'>La relaci&oacute;n ha sido introducida correctamente </span>";
	endif;


	if($_POST["accion"] == "sqlProducto"):
		if(!empty($_POST["idSql"])):
			if (file_exists($_FILES['imagen']['tmp_name'])) {
				$img = $_FILES['imagen'];
				$extension = end(explode(".", $img['name']));
				$imagen = uniqid().'.'.$extension;
				move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
				$imgU = $imagen;

				$miArchivo = "../imagenesproductos/$imagen";
				//if(file_get_contents($miArchivo)):
					$foto = new resize($miArchivo);
	              	$foto->resizeImage(200, auto);
	              	$foto->saveImage("../imagenesproductos/min/$imagen");
	            //endif;
			}else{
				$imgU = $_POST["imgAnterior"];
			}
			$descript = str_replace("'","`",$_POST["descripcion"]);
			$descript_en = str_replace("'","`",$_POST["descripcion_en"]);

            $laDes = str_replace("'","�",$_POST["tvideo"]);
            $codevideo =  end(explode("?v=", $_POST["video"]));
            $thumb = 'http://img.youtube.com/vi/'.$codevideo.'/0.jpg';
            $cap1 = 'http://img.youtube.com/vi/'.$codevideo.'/1.jpg';
            $cap2 = 'http://img.youtube.com/vi/'.$codevideo.'/2.jpg';
            $cap3 = 'http://img.youtube.com/vi/'.$codevideo.'/3.jpg';
        
            $updateaVideo = mysql_query("UPDATE bd_productos_videos SET titulo = '$_POST[tvideo]', descripcion = '$laDes', url = '$_POST[video]', thumb = '$thumb', cap1 = '$cap1', cap2 = '$cap2', cap3 = '$cap3', fecha = '$fechaHr' WHERE id_producto = $_POST[idSql]",$db);
		
			$updatear = mysql_query("UPDATE bd_productos SET nombre='".utf8_decode($_POST['nombre'])."',nombre_en='$_POST[nombre_en]', descripcion='$descript',descripcion_en='$descript_en', imagenprincipal='$imgU', stockminimo='$_POST[stockMinimo]', precio='$_POST[precio]', precioalpormayor='$_POST[precioAlPorMayor]', descuento='$_POST[descuento]', idmarca='$_POST[idmarca]', idproveedor='$_POST[proveedor]', iva='$_POST[iva]', peso='$_POST[peso]', referencia='$_POST[ref]', idcat='$_POST[idcat]', idcat2='$_POST[idcat2]', idcat3='$_POST[idcat3]', idcat4='$_POST[idcat4]', idcat5='$_POST[idcat5]', idcat6='$_POST[idcat6]', idcat7='$_POST[idcat7]', idcat8='$_POST[idcat8]', idcat9='$_POST[idcat9]', idcat10='$_POST[idcat10]',disponible='$_POST[disponible]' WHERE id = $_POST[idSql]",$db);
			$aviso = "<span class='verdeS'>El producto ha sido modificado correctamente  $miArchivo</span>";

			$cadenaH = "Se ha modificado el producto: $_POST[ref] - $_POST[nombreEli], con la id: $_POST[idSql]";
			$insertaHistorial = mysql_query("INSERT INTO bd_historial (idproducto,registro,fecha,idTipo) VALUES ('$_POST[idSql]','$cadenaH','$fechaHr','10')",$db);
		endif;
	endif;


	if($_POST["accion"] == "changeProd"):
		$updatear = mysql_query("UPDATE bd_productos SET disponible='$_POST[activarOld]' WHERE id = $_POST[idUp]",$db);
		$aviso = "<span class='verdeS'>El producto ha sido modificado correctamente </span>";
	endif;


	if($_POST["accion"] == "anexaFoto"):
		if(!empty($_POST["idF"])):
			if (file_exists($_FILES['imagen']['tmp_name'])):
				$img = $_FILES['imagen'];
				$extension = end(explode(".", $img['name']));
				$imagen = uniqid().'.'.$extension;
				move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
				$imgU = $imagen;

				$miArchivo = "../imagenesproductos/$imagen";
				if(file_get_contents($miArchivo)):
					$foto = new resize($miArchivo);
	              	$foto->resizeImage(200, auto);
	              	$foto->saveImage('../imagenesproductos/min/'.$imagen);
	            endif;
			
				$intr = mysql_query("INSERT INTO bd_fotos (imagen,idproducto) VALUES ('$imgU','$_POST[idF]')",$db);
				$aviso = "<span class='verdeS'>La imagen ha sido subida correctamente </span>";
			endif;
		endif;
	endif;

	if($_POST["accion"] == "eliminarFoto"):
		$deletear = mysql_query("DELETE FROM bd_fotos WHERE id = $_POST[idEli]",$db);
		$aviso = "<span class='rojoS'>La fotograf&iacute;a ha sido eliminada correctamente </span>";
	endif;

	if($_POST["accion"] == "subirMarca"):
		$introduir = mysql_query("INSERT INTO bd_marcas (marca,visible) VALUES ('$_POST[marca]','$_POST[visible]')",$db);
		$ultimaIdMarca = mysql_insert_id();
		$aviso = "<span class='verdeS'>La marca $_POST[marca] ha sido subida correctamente </span>";

		$cadenaH = "Se ha a�adido una nueva marca: " . utf8_decode($_POST["marca"]);
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$ultimaIdMarca','$cadenaH','$fechaHr','15')",$db);
	endif;

	if($_POST["accion"] == "eliminarMarca"):
		$deletear = mysql_query("DELETE FROM bd_marcas WHERE id = $_POST[idEli]",$db);
		$aviso = "<span class='rojoS'>La marca $_POST[nombreEli] ha sido eliminada correctamente </span>";

		$cadenaH = "Se ha eliminado la marca:  " . utf8_decode($_POST["nombreEli"]);
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$_POST[idEli]','$cadenaH','$fechaHr','16')",$db);
	endif;

	if($_POST["accion"] == "visibilidadMarca"):
		if(!empty($_POST["idMarca"])):
			$updatear = mysql_query("UPDATE bd_marcas SET visible='$_POST[invi]' WHERE id = $_POST[idMarca]",$db);
			$aviso = "<span class='verdeS'>La visibilidad de la marca $_POST[nombreEli] ha sido modificada correctamente </span>";
		endif;
	endif;

	if($_POST["accion"] == "subirProveedor"):
		$introduir = mysql_query("INSERT INTO bd_proveedores (proveedor,telefono,personadecontacto,direccion) VALUES ('$_POST[proveedor]','$_POST[tlf]','$_POST[persona]','$_POST[direccion]')",$db);
		$ultimaIdP = mysql_insert_id();
		$aviso = "<span class='verdeS'>El Proveedor $_POST[proveedor] ha sido subido correctamente </span>";

		$cadenaH = "Se ha a�adido un nuevo proveedor:  " . utf8_decode($_POST["proveedor"]);
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$ultimaIdP','$cadenaH','$fechaHr','13')",$db);
	endif;

	if($_POST["accion"] == "eliminarProveedor"):
		$deletear = mysql_query("DELETE FROM bd_proveedores WHERE id = $_POST[idEli]",$db);
		$aviso = "<span class='rojoS'>El Proveedor $_POST[nombreEli] ha sido eliminado correctamente </span>";

		$cadenaH = "Se ha eliminado el proveedor:  " . utf8_decode($_POST["nombreEli"]);
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$_POST[idEli]','$cadenaH','$fechaHr','14')",$db);
	endif;

	if($_POST["accion"] == "sqlProveedor"):
		if(!empty($_POST["idUpd"])):
			$updatear = mysql_query("UPDATE bd_proveedores SET proveedor='$_POST[proveedor]',
			direccion='$_POST[direccion]', telefono = '$_POST[tlf]', personadecontacto = '$_POST[persona]' WHERE id = $_POST[idUpd]",$db);
			$aviso = "<span class='verdeS'>El proveedor $_POST[proveedor] ha sido modificado correctamente </span>";
		endif;
	endif;

	if($_POST["accion"] == "subirAlmacen"):
		$descript = str_replace("'","`",$_POST["descripcion"]);
		$introduir = mysql_query("INSERT INTO bd_almacen (nombre,descripcion) VALUES ('$_POST[nombre]','$descript')",$db);
		$ultimoAl = mysql_insert_id();
		$aviso = "La marca $_POST[marca] ha sido subida correctamente";

		$cadenaH = "Se ha a�adido un nuevo almac�n:  " . utf8_decode($_POST["nombre"]);
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$ultimoAl','$cadenaH','$fechaHr','5')",$db);
	endif;

	if($_POST["accion"] == "sqlAlmacen"):
		if($_POST["prede"]==1):
			$updatear0 = mysql_query("UPDATE bd_almacen SET predeterminado='0'",$db);
		endif;		
		$updatear = mysql_query("UPDATE bd_almacen SET nombre='$_POST[nombre]', descripcion='$_POST[descripcion13]',predeterminado='$_POST[prede]' WHERE id = $_POST[idUpd]",$db);
		$aviso = "El almac&eacute;n $_POST[nombreEli] ha sido modificado correctamente";
	endif;

	if($_POST["accion"] == "eliminarAlmacen"):
		$deletear = mysql_query("DELETE FROM bd_almacen WHERE id = $_POST[idEli]",$db);
		$aviso = "<span class='rojoS'>El Almac&eacute;n $_POST[nombreEli] ha sido eliminado correctamente </span>";

		$cadenaH = "Se ha eliminado el almac�n:  " . utf8_decode($_POST["nombreEli"]);
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$_POST[idEli]','$cadenaH','$fechaHr','6')",$db);
	endif;


	if($_POST["accion"] == "modificarEmpresa"):
		$updatear = mysql_query("UPDATE bd_empresa SET nombre='$_POST[nombre]', telefono = '$_POST[tlf]', tasacontrareembolso = '$_POST[contrareembolso]', paypal = '$_POST[paypal]', email = '$_POST[email]', telefono2 ='$_POST[tlf2]', fax = '$_POST[fax]', direccion = '$_POST[direccion]',tarifatransporte1 ='$_POST[tprecio1]', tarifatransporte2='$_POST[tprecio2]', cuenta='$_POST[cuenta]', bicswift ='$_POST[bic]', costeminimo1 = '$_POST[preciominimo1]', costeminimo2 = '$_POST[preciominimo2]', ivagenerico='$_POST[ivaG]', recargoequivalencia='$_POST[recargoEq]', facebook='$_POST[face]', twitter='$_POST[twitter]',google='$_POST[google]',portesurgentes='$_POST[purgente]',exurgente='$_POST[pexurgente]',execonomico='$_POST[pexeconomico]',msgtop='$_POST[msgtop]',msgbottom='$_POST[msgbottom]', horario='$_POST[horario]', instangram='$_POST[instangram]' WHERE id = 1",$db);
		$aviso = "La informaci&oacute;n de la empresa ha sido modificada correctamente";
	endif;
        
        if($_POST["accion"] == "modificarEmpresa2"):
		$updatear = mysql_query("UPDATE bd_empresa SET envimail='$_POST[envmail]', segSmtp = '$_POST[segSmtp]', mailSmtp = '$_POST[mailSmtp]', passSmtp = '$_POST[passSmtp]', puertoSmtp = '$_POST[puertoSmtp]', hostSmtp = '$_POST[hostSmtp]' WHERE id = 1",$db);
		$aviso = "La informaci&oacute;n de la empresa ha sido modificada correctamente";
	endif;
        
        if($_POST["accion"] == "modificarEmpresa3"):
		$updatear = mysql_query("UPDATE bd_empresa SET nacex='$_POST[nacex]' WHERE id = 1",$db);
                $updatear = mysql_query("UPDATE bd_nacex SET user='$_POST[userN]', pass='$_POST[passN]', delegacion='$_POST[delegacionN]', cliente='$_POST[clienteN]' WHERE id = 1",$db);
		$aviso = "La informaci&oacute;n de la empresa ha sido modificada correctamente";
	endif;
        
        if($_POST["accion"] == "generarEnvioNacex"):
            $idf = $_POST['id_fact'];
            $tservicio = $_POST['tservicio'];
            $tcobro = $_POST['tcobro'];
            $tenvio = $_POST['tenvio'];
            $bultos = $_POST['bultos'];
            $kilos = $_POST['kilos'];
            $envase = $_POST['envase'];
            $vrecogida = $_POST['vrecogida']; 
            $nombreE = $_POST['nombreE'];
            $direccionE = $_POST['direccionE'];
            $cpE = $_POST['cpE'];
            $localidadE = $_POST['localidadE'];
            $telefonoE = $_POST['telefonoE'];
            $paisE = $_POST['paisE'];
            $Contenido = $_POST['Contenido'];
            $vdeclarado = $_POST['vdeclarado'];
            
		if(count($bultos)<3){
                if(count($bultos)==2)
                    $bultos = '0'.$bultos;
                else if(count($bultos)==1)
                    $bultos = '00'.$bultos;
            }
            $fecha=date("d/m/Y");
            
            $sql = "SELECT * FROM bd_nacex WHERE id=1";
            $query = mysqli_query($this->conexion, $sql);
            if (mysqli_num_rows($query) > 0){
		$assoc = mysqli_fetch_assoc($query);
                $usuario = $assoc['user'];
                $pass = md5($assoc['pass']);
                $delegacion = $assoc['delegacion'];
                $ccliente = $assoc['cliente'];
            
                if($Contenido == '' && $vdeclarado == ''){
                    $cadena= "http://gprs.nacex.com/nacex_ws/ws?method=putExpedicion&user=$usuario&pass=$pass&data=del_cli=$delegacion|num_cli=$ccliente|fec=$fecha|tip_ser=$tservicio|tip_cob=$tcobro|tip_env=$tenvio"
                            . "|bul=$bultos|kil=$kilos|nom_ent=".rawurlencode($nombreE)."|dir_ent=".rawurlencode($direccionE)."|pais_ent=".strtoupper(substr(rawurlencode($paisE),0,2))."|cp_ent=".rawurlencode($cpE)."|pob_ent=".rawurlencode($localidad)."|tel_ent=".rawurlencode($telefono);
                }else{
                    $cadena= "http://gprs.nacex.com/nacex_ws/ws?method=putExpedicion&user=$usuario&pass=$pass&data=del_cli=$delegacion|num_cli=$ccliente|fec=$fecha|tip_ser=$tservicio|tip_cob=$tcobro|tip_env=$tenvio"
                            . "|bul=$bultos|kil=$kilos|nom_ent=".rawurlencode($nombreE)."|dir_ent=".rawurlencode($direccionE)."|pais_ent=".strtoupper(substr(rawurlencode($paisE),0,2))."|cp_ent=".rawurlencode($cpE)."|pob_ent=".rawurlencode($localidad)."|tel_ent=".rawurlencode($telefono)."|con=".rawurlencode($Contenido)."|val_dec=".rawurlencode($vdeclarado);
                }
                $cadena; exit;
                
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
		if(!$response) {
		    $aviso = "ERROR EN LA CONEXIÓN CON NACEX";
		}else{
                    $response=utf8_encode($response);
                    $respuesta = explode("|", $response);
                    
                    if($respuesta[0] != "ERROR"){
                        $sql = "INSERT INTO `bd_nacex_envios_ok`(`id`, `id_fact`, `cod_expedicion`, `fecha`, `cad_devuelta`) VALUES (null,$idf,'$respuesta[0]','$respuesta[10]','$response')";
                        $query = mysqli_query($this->conexion, $sql);
                    }else if($respuesta[0] == "ERROR"){
                        $sql = "INSERT INTO `bd_nacex_envios_ko`(`id`, `id_fact`, `cad_devuelta`) VALUES (null,$idf,'$response')";
                        $query = mysqli_query($this->conexion, $sql);
                    }else{
                        $sql = "INSERT INTO `bd_nacex_envios_ko`(`id`, `id_fact`, `cad_devuelta`) VALUES (null,$idf,'ERROR DESCONOCIDO')";
                        $query = mysqli_query($this->conexion, $sql);
                    }
                    
                    $aviso = explode("|", $response);
		}
               
            }else{
                $aviso = "ERROR EN LA CONEXIÓN CON NACEX";
            }
	endif;

	if($_POST["accion"] == "subirLogo"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
				$img = $_FILES['imagen'];
				$extension = end(explode(".", $img['name']));
				$imagen = uniqid().'.'.$extension;
				move_uploaded_file($img['tmp_name'], "logo/$imagen");
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET imagen='$imagen'
		WHERE id = 1",$db);
		$aviso = "El logotipo de la empresa ha sido modificado correctamente";
	endif;

	if($_POST["accion"] == "subirImgMv"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
				$img = $_FILES['imagen'];
				$extension = end(explode(".", $img['name']));
				$imagen = uniqid().'.'.$extension;
				move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET imgmv='$imagen' WHERE id = 1",$db);
		$aviso = "La imagen de m�s vendidos a sido modificado correctamente";
	endif;

	if($_POST["accion"] == "subirImgNo"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
				$img = $_FILES['imagen'];
				$extension = end(explode(".", $img['name']));
				$imagen = uniqid().'.'.$extension;
				move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET imgno='$imagen' WHERE id = 1",$db);
		$aviso = "La imagen de novedades a sido modificado correctamente";
	endif;

	if($_POST["accion"] == "subirImgEnl1"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
            $img = $_FILES['imagen'];
            $extension = end(explode(".", $img['name']));
            $imagen = uniqid().'.'.$extension;
            move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
            $updatear = mysql_query("UPDATE bd_empresa SET img1='$imagen' WHERE id = 1",$db);
            $aviso = "La imagen ha sido modificado correctamente";
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET enl1='$_POST[enlace]' WHERE id = 1",$db);
		$aviso = "El enlace ha sido modificado correctamente";
	endif;


	if($_POST["accion"] == "subirImgEnl2"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
            $img = $_FILES['imagen'];
            $extension = end(explode(".", $img['name']));
            $imagen = uniqid().'.'.$extension;
            move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
            $updatear = mysql_query("UPDATE bd_empresa SET img2='$imagen' WHERE id = 1",$db);
            $aviso = "La imagen ha sido modificado correctamente";
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET enl2='$_POST[enlace]' WHERE id = 1",$db);
		$aviso = "El enlace ha sido modificado correctamente";
	endif;


	if($_POST["accion"] == "subirImgEnl3"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
            $img = $_FILES['imagen'];
            $extension = end(explode(".", $img['name']));
            $imagen = uniqid().'.'.$extension;
            move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
            $updatear = mysql_query("UPDATE bd_empresa SET img3='$imagen' WHERE id = 1",$db);
            $aviso = "La imagen ha sido modificado correctamente";
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET enl3='$_POST[enlace]' WHERE id = 1",$db);
		$aviso = "El enlace ha sido modificado correctamente";
	endif;


	if($_POST["accion"] == "subirImgEnl4"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
            $img = $_FILES['imagen'];
            $extension = end(explode(".", $img['name']));
            $imagen = uniqid().'.'.$extension;
            move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
            $updatear = mysql_query("UPDATE bd_empresa SET img4='$imagen' WHERE id = 1",$db);
            $aviso = "La imagen ha sido modificado correctamente";
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET enl4='$_POST[enlace]' WHERE id = 1",$db);
		$aviso = "El enlace ha sido modificado correctamente";
	endif;
    
    if($_POST["accion"] == "subirImgEnl5"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
            $img = $_FILES['imagen'];
            $extension = end(explode(".", $img['name']));
            $imagen = uniqid().'.'.$extension;
            move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
            $updatear = mysql_query("UPDATE bd_empresa SET img5='$imagen' WHERE id = 1",$db);
            $aviso = "La imagen ha sido modificado correctamente";
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET enl5='$_POST[enlace]' WHERE id = 1",$db);
		$aviso = "El enlace ha sido modificado correctamente";
	endif;
    
    if($_POST["accion"] == "subirImgEnl6"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
            $img = $_FILES['imagen'];
            $extension = end(explode(".", $img['name']));
            $imagen = uniqid().'.'.$extension;
            move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
            $updatear = mysql_query("UPDATE bd_empresa SET img6='$imagen' WHERE id = 1",$db);
            $aviso = "La imagen ha sido modificado correctamente";
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET enl6='$_POST[enlace]' WHERE id = 1",$db);
		$aviso = "El enlace ha sido modificado correctamente";
	endif;
    
    if($_POST["accion"] == "subirImgEnl7"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
            $img = $_FILES['imagen'];
            $extension = end(explode(".", $img['name']));
            $imagen = uniqid().'.'.$extension;
            move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
            $updatear = mysql_query("UPDATE bd_empresa SET img7='$imagen' WHERE id = 1",$db);
            $aviso = "La imagen ha sido modificado correctamente";
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET enl7='$_POST[enlace]' WHERE id = 1",$db);
		$aviso = "El enlace ha sido modificado correctamente";
	endif;
    
    if($_POST["accion"] == "subirImgEnl8"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
            $img = $_FILES['imagen'];
            $extension = end(explode(".", $img['name']));
            $imagen = uniqid().'.'.$extension;
            move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
            $updatear = mysql_query("UPDATE bd_empresa SET img8='$imagen' WHERE id = 1",$db);
            $aviso = "La imagen ha sido modificado correctamente";
		endif;

		$updatear = mysql_query("UPDATE bd_empresa SET enl8='$_POST[enlace]' WHERE id = 1",$db);
		$aviso = "El enlace ha sido modificado correctamente";
	endif;

	if($_POST["accion"] == "subirCliente"):
		$pass_prefix = 'passw::';
		$pass_sufix = '//?@';
		$password = mysqli_real_escape_string($dbi, htmlspecialchars(sha1(md5($pass_prefix.$_POST['pass'].$pass_sufix))));
		$miRegistro = utf8_decode("INSERT INTO bd_users (nombre,nick,telefono,email,pass,rol,dni,mayorista,poblacion,provincia) VALUES ('$_POST[nombre]','$_POST[nick]','$_POST[tlf]','$_POST[email]','$password','$_POST[rol]','$_POST[dni]','$_POST[mayorista]','$_POST[poblacionU]','$_POST[provinciaU]')");
		$subir = mysql_query($miRegistro,$db);
		$miU = mysql_insert_id();
		$aviso = "El usuario se ha sido subido correctamente";

		if($_POST["rol"] == 0):
			$miRol = "Cliente";
		elseif($_POST["rol"] == 1):
			$miRol = "Admin";
		elseif($_POST["rol"] == 2):
			$miRol = "Empleado";
		endif;
		$cadenaH = "Se ha a�adido un nuevo usuario:  " . utf8_decode($_POST["nombre"]) . " |  " . utf8_decode($_POST["nick"]) . " en calidad de $miRol";
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$miU','$cadenaH','$fechaHr','11')",$db);

		if(empty($_POST["direcusu"]) || $_POST["direcusu"]==""):
		else:
		//echo "INSERT INTO bd_direcciones (nombre,idusuario,idpais,idprovincia,poblacion) VALUES ('Principal','$miU','$_POST[idPaisU]','$_POST[provinciaU]','$_POST[poblacionU]')";
			$insertaDireccion = mysql_query("INSERT INTO bd_direcciones (nombre,idusuario,idpais,idprovincia,poblacion,direccion,cp) VALUES ('Principal','$miU','$_POST[idPaisU]','$_POST[provinciaU]','$_POST[poblacionU]','$_POST[direcusu]','$_POST[cpU]')",$db);
			
		endif;

	endif;

	if($_POST["accion"] == "sqlCliente"):
		$miUpdate = utf8_decode("UPDATE bd_users SET nombre= '$_POST[nombre]',nick='$_POST[nick]',email='$_POST[email]',telefono='$_POST[tlf]',rol='$_POST[rol]', dni='$_POST[dni]',mayorista='$_POST[mayorista]',poblacion='$_POST[poblacionU]',provincia='$_POST[provinciaU]' WHERE id = $_POST[idUpd]");
		$updatear = mysql_query($miUpdate,$db);
			
		$aviso = "La informaci&oacute;n del usuario ha sido modificada correctamente";
	endif;

	if($_POST["accion"] == "eliminarCliente"):
		$deletear = mysql_query("DELETE FROM bd_users WHERE id = $_POST[idEli]",$db);
		$aviso = "<span class='rojoS'>El usuario $_POST[nombreEli] ha sido eliminado correctamente</span>";

		$cadenaH = "Se ha eliminado el usuario:  " . utf8_decode($_POST["nombreEli"]);
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$_POST[idEli]','$cadenaH','$fechaHr','12')",$db);
	endif;


	if($_POST["accion3"] == "sqlEntradaStock"):
		$anterior = $_POST["cantidad_old"];
		$sumatorio = $_POST["cantidad"];
		$udsTotales = $_POST["unidades_old"];
		$qTotalSuma = $anterior + $sumatorio;
		$qTotalTotal = $udsTotales + $sumatorio;
		$mPu = mysql_query("SELECT * FROM bd_productos WHERE id=$_POST[idP]",$db);
		$elP = mysql_fetch_array($mPu);

		$mAu = mysql_query("SELECT * FROM bd_almacen WHERE id=$_POST[idA]",$db);
		$elA = mysql_fetch_array($mAu);

		$miE = mysql_query("SELECT * FROM bd_infoalmacen WHERE idalmacen =$_POST[idA] AND idproducto = $_POST[idP]",$db);
		$contadoro = 0;
		while($kk = MySQL_fetch_array($miE)):
			$contadoro ++;
		endwhile;

		if($contadoro>0):
			$updatear = mysql_query("UPDATE bd_infoalmacen SET cantidad='$qTotalSuma', fecha = '$fechaHr' WHERE idalmacen =$_POST[idA] AND idproducto = $_POST[idP]",$db);

			$updatear = mysql_query("UPDATE bd_productos SET unidades='$qTotalTotal' WHERE id = $_POST[idP]",$db);

			$aviso = "El stock ha sido sumado al producto en su almac&eacute;n correspondiente";
		else:
			$aviso = "El resultado es 0";
		endif;

		$cadenaH = "El stock del producto: $elP[referencia] -  " . utf8_decode($elP["nombre"]) . " ha sido aumentado en $sumatorio uds. y almacenadas en el almac�n  " . utf8_decode($elA["nombre"]);
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$_POST[idP]','$cadenaH','$fechaHr','1')",$db);
	endif;

	if($_POST["accion3"] == "sqlDevengarStock"):
		$anterior = $_POST["cantidad_old"];
		$sumatorio = $_POST["cantidad"];
		$udsTotales = $_POST["unidades_old"];
		$qTotalSuma = $anterior - $sumatorio;
		$qTotalTotal = $udsTotales - $sumatorio;
		$motivo = str_replace("'",'`',$_POST["motivo"]);
		$updatear = mysql_query("UPDATE bd_infoalmacen SET cantidad='$qTotalSuma', fecha = '$fechaHr' WHERE idalmacen =$_POST[idA] AND idproducto = $_POST[idP]",$db);

		$updatear = mysql_query("UPDATE bd_productos SET unidades='$qTotalTotal' WHERE id = $_POST[idP]",$db);
		$reUp = mysql_query("INSERT INTO bd_devengos (idproducto,cantidad,motivo,fecha)VALUES('$_POST[idP]','$sumatorio','$motivo','$fechaHr')",$db);
		$aviso = "El stock ha sido restado al producto en su almac&eacute;n correspondiente";
		$iDevengo = mysql_insert_id();
		/* EXTRAER */
		$mPu = mysql_query("SELECT * FROM bd_productos WHERE id=$_POST[idP]",$db);
		$elP = mysql_fetch_array($mPu);
		$mAu = mysql_query("SELECT * FROM bd_almacen WHERE id=$_POST[idA]",$db);
		$elA = mysql_fetch_array($mAu);
		$cadenaH = "El stock del producto: $elP[referencia] -  " . utf8_decode($elP["nombre"]) . " ha sido devengado en $sumatorio uds. y almacenadas en el almac�n  " . utf8_decode($elA["nombre"]) . ". El c�digo del devengo es: $iDevengo";
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$iDevengo','$cadenaH','$fechaHr','9')",$db);
	endif;


	if($_POST["accion"] == "anadirProducto"):
		$jj = mysql_query("SELECT count(*) FROM bd_carrito WHERE idproducto = '$_POST[idProd]' AND sesion = '$_POST[miSesion]' AND idalmacen = '$_POST[idAlmacen]'",$db); 
		$jl = mysql_fetch_array($jj);
		$qSubida = $jl["0"];
		$infoP = getItemByField("bd_productos","id",$_POST["idProd"]);

		//echo "INSERT INTO bd_carrito(idproducto, descuento, sesion,cantidad,idalmacen) VALUES ('$_POST[idProd]','$_POST[descuento]','$_POST[miSesion]','$sumatorio','$_POST[idAlmacen]')";

		if($qSubida == 0):
			$sumatorio = $_POST["carritoQ"];

			$elAl = mysql_query("SELECT * FROM bd_infoalmacen WHERE idalmacen = '$_POST[idAlmacen]' AND idproducto = '$_POST[idProd]' ORDER BY cantidad DESC",$db);
			$cantidu = mysql_fetch_array($elAl);
			$qCa = $cantidu["cantidad"];  
		 
			if($sumatorio <= $qCa):
				$actuality =date("Y:m:d ");
				$carrito = mysql_query("INSERT INTO bd_carrito(idproducto, descuento, sesion,cantidad,idalmacen,fechaCarrito) VALUES ('$_POST[idProd]','$_POST[descuento]','$_POST[miSesion]','$sumatorio','$_POST[idAlmacen]','$fechaHr')" ,$db);
			else:
				$aviso = "<span class='rojoS'>Ha superado el M&aacute;ximo de Unidades para ese producto</span>";
			$aviso.= "<br /> SELECT * FROM bd_infoalmacen WHERE idalmacen = '$_POST[idAlmacen]' AND idproducto = '$_POST[idProd]'";
			endif;
		else:
			 //echo "SELECT * FROM bd_carrito WHERE idproducto = '$_POST[idProd]'  AND  idalmacen = '$_POST[idAlmacen]'  AND sesion = '$sesionActual'";

			$abc = mysql_query("SELECT * FROM bd_carrito WHERE idproducto = '$_POST[idProd]'  AND  idalmacen = '$_POST[idAlmacen]'  AND sesion = '$_POST[miSesion]'",$db); 
			$def = mysql_fetch_array($abc);
			$idCarrito = $def["id"];
			$cant_old = $def["cantidad"];
			
			$elAl2 = mysql_query("SELECT * FROM bd_infoalmacen WHERE idalmacen = '$_POST[idAlmacen]' AND idproducto = '$_POST[idProd]'",$db);
			$cantidu2 = mysql_fetch_array($elAl2);
			$qCa = $cantidu2["cantidad"];  

			$sumatorio = $_POST["carritoQ"];
			$cantidadFinal = $sumatorio + $cant_old;

			if($cantidadFinal <= $_POST["cantidadM"]):
				 
				$updatea = mysql_query("UPDATE bd_carrito SET cantidad='$cantidadFinal',fechaCarrito='$fechaHr' WHERE id=$idCarrito",$db);
				$aviso = "La cesta se ha cargado correctamente";
			else:
				$aviso = "<span class='rojoS'>Has superado el M&aacute;ximo de Unidades en Stock para ese producto </span>";
			endif;
			
			
		endif;	
		//$aviso .= " $cantidadFinal - $_POST[cantidadM] UPDATE bd_carrito SET cantidad='$cantidadFinal' WHERE $idCarrito";
		//$aviso = "El stock ha sido sumado al producto en su almac&eacute;n correspondiente";
		//nombreProd
	endif;

	if($_POST["accion"] == "eliminarCarrito"):
		$deletear = mysql_query("DELETE FROM bd_carrito WHERE id = $_POST[idEli]",$db);
		$aviso = "<span class='rojoS'>El producto ha sido eliminado correctamente de la cesta</span>";
	endif;

	if($_POST["accion"] == "descuentoCarrito"):
		$modif = mysql_query("UPDATE bd_carrito SET descuento='$_POST[qdes]' WHERE id = $_POST[idDesc]",$db);
	endif;



	if($_POST["accion"] == "subirDireccion"):
		$subeDir = mysql_query("INSERT INTO bd_direcciones (idpais,idprovincia,nombre,direccion,idusuario,cp,poblacion) VALUES ('$_POST[paisD]','$_POST[cityD]','$_POST[nombreD]','$_POST[direccionD]','$_POST[idUsuarioD]','$_POST[cpD]','$_POST[poblaD]')",$db);

		$_SESSION["idDireccionF"] = mysql_insert_id();

		$aviso = "La direcci&oacute;n ha sido subida correctamente $_SESSION[idDireccionF]";
	endif;


	/* FINALIZAR COMPRA */
	if($_POST["accion"] == "finalizarCompra"):

		include "comprobarCarrito.php";
		if($esValido == 1):
			include "functionFinalizarCompra.php";
			//$aviso ="CORRECTO $esValido ";
		elseif($esValido==0):
			
            $miCadena = " $nombre1  - Quedan $uds1 uds.<br />";
            
            if(!empty($nombre2)):
                $miCadena .= " $nombre2  - Quedan $uds2 uds.<br />";
            endif;

            if(!empty($nombre3)):
                $miCadena .= " $nombre3  - Quedan $uds3 uds.<br />";
            endif;

            if(!empty($nombre4)):
                $miCadena .= " $nombre4  - Quedan $uds4 uds.<br />";
            endif;


            $aviso = utf8_encode("<span class='rojoS'>�OCURRI� UN PROBLEMA!</span> Los siguientes ar�tuclos han sido comprados mientras realizaba la �peraci�n:<br /> $miCadena");
        
		endif;
	endif;
	/* FINALIZAR COMPRA */



	if($_POST["accion"] == "presupuesto"):
	 	
	 	
	 	$miRecargo = $_POST["recEquivalencia"];
		$miTipoCliente = $_POST["tipoClienteFactur"];

	 	$ilTipo = $miTipoCliente;		

		//$secret = uniqid();
		$secretisimo = substr(date("Y"),2) . "$ilTipo";
		$ultimaIdC = mysql_query("SELECT * FROM bd_facturas ORDER BY id DESC LIMIT 1",$db);
		$laFact = mysql_fetch_array($ultimaIdC);
		if(!empty($laFact["id"])):
			$numeroDeFac = $laFact["id"] + 1;
			$q = strlen($numeroDeFac);
			$qEspacios = 5 - $q;

			$ceros = "";
			for($i = 0; $i < $qEspacios; $i++):
				$ceros .= "0"; 
			endfor;

			$elNumeroDef = "$miTipoCliente"."$ceros"."$numeroDeFac";
		else:
			$elNumeroDef = "$miTipoCliente.00001";
		endif;
		$secret = $elNumeroDef;

		$totalFactura = str_replace(",","",$_POST["totalFactura"]);
		$ivaFactura = str_replace(",","",$_POST["ivaFactura"]);
		$subtotalFactura = str_replace(",","",$_POST["subtotalFactura"]);
		$preciotransporteFactura = str_replace(",","",$_POST["preciotransporteFactura"]);
		//echo "INSERT INTO bd_facturas (total,iva,subtotal,preciotransporte,mayorista,idusuario,iddireccion,fecha,sesion,codigo,estado,presupuesto,recargoequivalencia,tipocliente) VALUES ('$totalFactura ','$ivaFactura','$subtotalFactura','$preciotransporteFactura ','$_POST[tipoUser]','$_POST[idUser]','$_POST[idDir]','$fechaHr','$_POST[miSesion]','$secret','0','1','$miRecargo','$miTipoCliente')";

		$insertarFactura = mysql_query("INSERT INTO bd_facturas (total,iva,subtotal,preciotransporte,mayorista,idusuario,iddireccion,fecha,sesion,codigo,estado,presupuesto,recargoequivalencia,tipocliente) VALUES ('$totalFactura ','$ivaFactura','$subtotalFactura','$preciotransporteFactura ','$_POST[tipoUser]','$_POST[idUser]','$_POST[idDir]','$fechaHr','$_POST[miSesion]','$secret','0','1','$miRecargo'
,'$miTipoCliente')",$db);

		$idFactura = mysql_insert_id();
		$carro = mysql_query("SELECT * FROM bd_carrito WHERE sesion = '$_POST[miSesion]'",$db);
		while($ce = mysql_fetch_Array($carro)):
			$elPro = getItemByField("bd_productos", "id" , $ce["idproducto"]);
			$elAlmacen = $ce["idalmacen"];
			/*$laQ = $ce["cantidad"];
			$udsTotales = $elPro["unidades"] - $laQ;
			$q3 = mysql_query("SELECT * FROM bd_infoalmacen WHERE idproducto='$ce[idproducto]' AND idalmacen = '$ce[idalmacen]'",$db);
			while($qAnterior = mysql_fetch_array($q3)):
				$q_old = $qAnterior["cantidad"];
				$id_info = $qAnterior["id"];
			endwhile;
			$udsAlmacen = $q_old - $laQ;*/

			//$modificoAlmacen = mysql_query("UPDATE bd_infoalmacen SET cantidad = '$udsAlmacen' WHERE id = $id_info",$db);
			$emp = getItemByField("bd_empresa","id","1");
			$modificoCarro = mysql_query("UPDATE bd_carrito SET sesion= 'Compra', idfactura='$idFactura',fecha='$fechaHr' WHERE sesion='$_POST[miSesion]'",$db);

		endwhile;
					$cod = uniqid();
					$nombreP = "facturas/$secret.pdf";
					include("pdf/mpdf.php");
					include "presupuestoPdf.php";
						$wf = date("Y/m/d H:i:s");
						$mpdf=new mPDF();
						$mpdf->WriteHTML($ilPdf);
						$mpdf->Output($nombreP,'F');
					
		$facturaOk = 1;
		$aviso = "El Presupuesto $idFactura ha sido gestionada con &eacute;xito. <a target='_blank' href='facturas/$secret.pdf'>Descargar Presupuesto</a>";

		$cadenaH = "NUEVO PRESUPUESTO: $idFactura - Cod. $secret con un importe final de $totalFactura a fecha: $fechaHr";
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idfactura,registro,fecha,idTipo) VALUES ('$idFactura','$cadenaH','$fechaHr','17')",$db);
	endif;



	// DEVOLUCI�N DE PRODUCTO
	if($_POST["accion"] == "devolucionDeProducto"):
		$item = getItemByField("bd_carrito","id",$_POST["idCarro"]);
		$elProd = getItemByField("bd_productos","id",$item["idproducto"]); 
		$laFac = getItemByField("bd_facturas","id",$_POST["idFuc"]);
		$elAlmacen = getItemByField("bd_almacen","id",$_POST["idAlmacenD"]);
		$qAnterior = $item["cantidad"];
		$menos = $_POST["qD"];
		$qActual = $qAnterior - $menos;
		$qSuma = $elProd["unidades"] + $menos;
		$lugar = $_POST["idAlmacenD"];
		$devCarro = $item["devolucion"];
		if($devCarro == 0):
			$devCarro = $devCarro + $menos;
		endif;
		
		$updateoProd = mysql_query("UPDATE bd_productos SET unidades = '$qSuma' WHERE id='$elProd[id]'",$db);
		//echo "UPDATE bd_productos SET unidades = '$qSuma' WHERE id='$elProd[id]'";

		$cuentaStock = mysql_query("SELECT count(*) FROM bd_infoalmacen WHERE idalmacen = $lugar AND idproducto = $item[idproducto]", $db);
        $ceis = mysql_fetch_array($cuentaStock);
        $numeroTotal = $ceis["0"];      
        		$esNuevo = 0;
              if($numeroTotal == 0):
                    $esNuevo = 1;
                    $uds = $menos;
                    $introduce = mysql_query("INSERT INTO bd_infoalmacen(idalmacen, idproducto, cantidad,fecha) VALUES ('$_POST[idAlmacenD]','$item[idproducto]','$menos','$fechaHr')",$db);
                    //echo "INSERT INTO bd_infoalmacen(idalmacen, idproducto, cantidad,fecha) VALUES ('$_POST[idAlmacenD]','$item[idproducto]','$menos','$fechaHr')";
              else:
                    $esNuevo = 0;
                    $buscaStock = getAll("bd_infoalmacen", "idalmacen = $_POST[idAlmacenD] AND idproducto = $item[idproducto]");
                    foreach($buscaStock as $bs):
                        $udsAnteriores = $bs["cantidad"];
                        $idAlman = $bs["id"];
                    endforeach;

                    $uds = $udsAnteriores + $menos;
                    $updateoAlmacen = mysql_query("UPDATE bd_infoalmacen SET cantidad = $uds WHERE id = '$idAlman'",$db);
                    //echo "UPDATE bd_infoalmacen SET cantidad = $uds WHERE id = '$idAlman'";
              endif;


		

		if($laFac["mayorista"] != 1):
			$precioDev = $elProd["precio"];
		else:
			$precioDev = $elProd["preciomayorista"];
		endif;
		$emp2 = getItemByField("bd_empresa","id","1");
		
		//$precioDev = $precioDev;// + $elIva;

		if($item["descuento"] > 0):
			$disc = ($precioDev * $item["descuento"]) / 100;
			$precioDev = $precioDev - $disc;
		endif;

		$laE = getItemByField("bd_empresa","id","1");
		if($laFac["recargoequivalencia"]>0):
			$elR = $laE["recargoequivalencia"];
		else:
			$ilR = 0;
		endif;
			$precioDev = $precioDev * $menos;
			//echo "<br />";
			$elIva = ($precioDev * $emp2["ivagenerico"])/100;
			//echo "<br />";
			$precioDev -= $elIva;
			//echo "<br />";
			//$elIva = $elIva * $menos;
			//$ivaDev = $precioDev * []
			$precioFinalFactura = $laFac["subtotal"] - $precioDev; 
			//echo "<br />";
			$ivaFinal = $laFac["iva"] - $elIva;
			//echo "<br />";
			//echo $importeFinal = $laFac["total"] - $ivaFinal - $precioDev;
			$importeFinal = $precioFinalFactura + $ivaFinal;
			$recaudacion = ($importeFinal * $elR) / 100;
			$importeFinal += $recaudacion;
			$ilCod = $laFac["codigo"];
			$updateoFactura =  mysql_query("UPDATE bd_facturas SET total = '$importeFinal', iva='$ivaFinal', subtotal = '$precioFinalFactura',recargoequivalencia='$recaudacion' WHERE id = $_POST[idFac]",$db);
			//echo "UPDATE bd_facturas SET total = '$importeFinal', iva='$ivaFinal', subtotal = '$precioFinalFactura' WHERE id = $_POST[idFac]";
			//echo "<br />
			//$laFac[total]";
			
			$updateoCarro = mysql_query("UPDATE bd_carrito SET cantidad = '$qActual', devolucion='$devCarro' WHERE id='$_POST[idCarro]'",$db);
			//echo "UPDATE bd_carrito SET cantidad = '$qActual', devolucion='$devCarro' WHERE id='$_POST[idCarro]'";

				$aviso = utf8_encode("La devoluci�n ha sido tramitada con �xito<br />'");

			/*
			echo "UPDATE bd_producto SET unidades = '$qSuma' WHERE id='$_POST[idCarro]'<br />";
			echo "SELECT count(*) FROM bd_infoalmacen WHERE idalmacen = $lugar AND idproducto = $item[idproducto]<br />";
			"INSERT INTO bd_infoalmacen(idalmacen, idproducto, cantidad,fecha) VALUES ('$_POST[idAlmacenD]','$echo item[idproducto]','$menos','$fechaHr')<br />";
			echo "UPDATE bd_infoalmacen SET cantidad = $uds WHERE id = '$idAlman'<br />";
			echo "UPDATE bd_factura SET total = '$importeFinal', iva='$ivaFinal', subtotal = '$precioFinalFactura' WHERE id = $_POST[idFac]";
			echo "UPDATE bd_carrito SET cantidad = '$qActual', devolucion='$devCarro' WHERE id='$_POST[idCarro]'";
*/		

		$cadenaH = "DEVOLUCI�N EN LA FACTURA: $_POST[idFac] en una cantidad de $menos uds. del producto: $elProd[referencia] -  " . utf8_decode($elProd["nombre"]) . " en el almac�n:  " . utf8_decode($elAlmacen["nombre"]);
		$insertaHistorial = mysql_query("INSERT INTO bd_historial (idnuevo,registro,fecha,idTipo) VALUES ('$idFactura','$cadenaH','$fechaHr','8')",$db);


					$idFactura = $_POST["idFac"];
		 
					$cod = uniqid();
					$nombreP = "facturas/$ilCod.pdf";
					include("pdf/mpdf.php");
					
					include "reFacturaPdf.php";
						$wf = date("Y/m/d H:i:s");
						
						//echo $ilPdf;
						$mpdf2=new mPDF();
						$mpdf2->WriteHTML($ilPdf);
						$mpdf2->Output($nombreP,'F');
						
		$facturaOk = 1;
		$aviso = "La Factura $leF[codigo] ha sido gestionada con &eacute;xito. <a target='_blank' href='facturas/$ilCod.pdf'>Descargar Factura</a>";

	endif;



	if($_POST["accion"] == "pedefearFacturas"):

		$cuento = mysql_query("SELECT count(*) FROM bd_facturas WHERE fecha BETWEEN '$_POST[fecha1] 00:00:00' AND '$_POST[fecha2] 23:59:59' AND presupuesto = 0",$db);
		$mk = mysql_fetch_array($cuento);
		$emp = getItemByField("bd_empresa","id","1");
		if($mk["0"] > 0):

		$cod = uniqid();
					$secret = uniqid();
					$nombreP2 = "informes/$secret.pdf";
					include("pdf/mpdf.php");
					include "informePdf.php";
						$wf = date("Y/m/d H:i:s");
						$mpdf=new mPDF();
						//echo $ilPdf;
						$mpdf->WriteHTML($ilPdf2);
						$mpdf->Output($nombreP2,'F');
					$aviso = "El informe se ha creado con &eacute;xito. <a target='_blank' href='$nombreP2'>Descargar Informe</a>";
		else:
			$aviso = "<span class='rojoS'>SIN REGISTROS PARA EL RANGO DE FECHAS ESTABLECIDO</span>";
		endif;
	endif;


	if($_POST["accion"] == "pedefearTodo"):
		$cuento = mysql_query("SELECT count(*) FROM bd_historial WHERE fecha BETWEEN '$_POST[fecha1] 00:00:00' AND '$_POST[fecha2] 23:59:59'",$db);
		$mk = mysql_fetch_array($cuento);
		$emp = getItemByField("bd_empresa","id","1");
		if($mk["0"] > 0):

		 
					$secret1 = uniqid();
					$nombreP3 = "informes/$secret1.pdf";
					include("pdf/mpdf.php");
					include "informePdf.php";
						$wf = date("Y/m/d H:i:s");
						$mpdf=new mPDF();
						//echo $ilPdf;
						$ilPdf3 = utf8_encode($ilPdf3);
						$mpdf->WriteHTML($ilPdf3);
						$mpdf->Output($nombreP3,'F');
					$aviso = "El informe se ha creado con &eacute;xito. <a target='_blank' href='$nombreP3'>Descargar Informe</a>";
		else:
			$aviso = "<span class='rojoS'>SIN REGISTROS PARA EL RANGO DE FECHAS ESTABLECIDO</span>";
		endif;
	endif;


	
	if($_POST["accion"] == "cajaDiaria"):
		if($_POST["accion2"] == "pedefearHoy"):
			$miDiaDeHoy = date("Y-m-d");
		elseif($_POST["accion2"] == "pedefearFecha"):
			$miDiaDeHoy = $_POST["fechaLim"];
		endif;
	//echo "SELECT count(*) FROM bd_historial WHERE fecha BETWEEN '$miDiaDeHoy 00:00:00' AND '$miDiaDeHoy 23:59:59'"; 
		$cuento = mysql_query("SELECT count(*) FROM bd_facturas WHERE fecha BETWEEN '$miDiaDeHoy 00:00:00' AND '$miDiaDeHoy 23:59:59' AND presupuesto = 0",$db);
		$mk = mysql_fetch_array($cuento);
		$emp = getItemByField("bd_empresa","id","1");
		if($mk["0"] > 0):
					$secret2 = uniqid();
					$nombreP4 = "informes/$miDiaDehoy$secret2.pdf";
					include("pdf/mpdf.php");
					include "informePdfDiario.php";
						$wf = date("Y/m/d H:i:s");
						$mpdf=new mPDF();
						//echo $ilPdf;
						$ilPdf4 = utf8_encode($ilPdf4);
						$mpdf->WriteHTML($ilPdf4);
						$mpdf->Output($nombreP4,'F');
					$aviso = "El informe se ha creado con &eacute;xito. <a target='_blank' href='$nombreP4'>Descargar Informe</a>";
		else:
			$aviso = "<span class='rojoS'>SIN REGISTROS PARA EL RANGO DE FECHAS ESTABLECIDO</span>";
		endif;
	endif;




	$sql = "SELECT * FROM bd_users Where sesion='$sesionActual' and rol='1'";
    $result=queryProcessor($sql,$db); 
    $numeroTotal = mysql_num_rows($result);

    if($numeroTotal > 0):
	    while($myrow1=MySQL_fetch_array($result)):
		    $idclienteregistrado = $myrow1["id"];
		    $nombreclienteregistrado = $myrow1["nombre"];
		    $apellidosclienteregistrado = $myrow1["apellidos"];
		    $emailclienteregistrado = $myrow1["email"];
                    $_SESSION['usr'] = $myrow1;
	    endwhile;
	endif;
	//FIN DE LA B�SQUEDA DE SESION

	if(empty($idclienteregistrado)):
		echo "<script language='javascript'>document.location='login.php'</script>";
	endif;

    if($_POST["accion"]=="login")
    {
       
        if(!empty($userEmail)){
            $EMAIL = $userEmail;
        }

      
		$pass_prefix = 'passw::';
		$pass_sufix = '//?@';
		$password = $pass_prefix.$_POST["passwo2"].$pass_sufix;
      

    $sql1 = "UPDATE bd_users SET sesion = '$sesionActual' WHERE email='$email' and pass='$password' and rol='1'";
	
    $resultado1=queryProcessor($sql1);

    $sql = "SELECT * FROM bd_users Where sesion='$sesionActual' and rol='1'";
    $result=queryProcessor($sql,$db); 
    if(mysql_num_rows($result) > 0):
        while($myrow1=MySQL_fetch_array($result)):
            $u_id = $myrow1["id"];
        endwhile;

        echo "<script language='javascript'>document.location='index.php'</script>";
    else:
        $avisoFail = "<span class='ro'>Usuario o contrase�a son incorrectos</span>";
    endif;
    }

    if($_GET["a"]=="exit"):
        $sql1 = "UPDATE bd_users SET sesion = 'Desconectado' WHERE sesion = '$sesionActual'";
        $resultado1=mysql_query($sql1, $db);
		unset($_SESSION['superad']);
                unset($_SESSION['usr']);
        echo "<script language='javascript'>document.location='login.php'</script>";
    endif;


    if($_POST["accion"] == "subirRegalo"):
    
        if (file_exists($_FILES['imagen']['tmp_name'])) {
            $img = $_FILES['imagen'];
            $extension = end(explode(".", $img['name']));
            $imagen = uniqid().'.'.$extension;
            move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
            $imgU = $imagen;

            $miArchivo = "../imagenesproductos/$imagen";
            if(file_get_contents($miArchivo)):
                $foto = new resize($miArchivo);
                $foto->resizeImage(200, auto);
                $foto->saveImage('../imagenesproductos/min/'.$imagen);
            endif;
		}
    
    	$ins = "INSERT INTO bd_regalos VALUES(null, '$_POST[idCatP]', '".utf8_decode($_POST['regalo'])."', '$imgU', '$_POST[unidades]', '$_POST[disponible]')";
    	$sub = mysql_query($ins,$db);
    	$aviso = "<span class=''>El regalo $_POST[regalo] ha sido introducido correctamente</span>";
    endif;

	if($_POST["accion"] == "sqlRegalo"):
    
        if (file_exists($_FILES['imagen']['tmp_name'])) {
            $img = $_FILES['imagen'];
            $extension = end(explode(".", $img['name']));
            $imagen = uniqid().'.'.$extension;
            move_uploaded_file($img['tmp_name'], "../imagenesproductos/$imagen");
            $imgU = $imagen;
            echo $imgU;
            $miArchivo = "../imagenesproductos/$imagen";
            //if(file_get_contents($miArchivo)):
                $foto = new resize($miArchivo);
                $foto->resizeImage(200, auto);
                $foto->saveImage("../imagenesproductos/min/$imagen");
            //endif;
        }else{
            $imgU = $_POST["imgAnterior"];
        }
 
		$updatearCat = mysql_query("UPDATE bd_regalos SET regalo='".utf8_decode($_POST['ncat'])."', idcat='$_POST[idModP]', unidades='$_POST[unidades]', disponible='$_POST[disponible]', imagen='$imgU' WHERE id='$_POST[idUpd]'",$db);
		$aviso = "El regalo ha sido modificado correctamente";
	endif;


    if($_POST["accion"] == "eliminarRegalo"):
		$del = mysql_query("DELETE FROM bd_regalos WHERE id= '$_POST[idEli]'",$db);
		$aviso = "El regalo $_POST[regalo] ha sido eliminado con correctamente";
	endif;


    if($_POST["accion"] == "subirCategoriaR"):
    	$ins = "INSERT INTO bd_categorias_regalos VALUES(null, '$_POST[categoria]','$_POST[pmin]','$_POST[pmax]')";
    	$sub = mysql_query($ins,$db);
    	$aviso = "<span class=''>La categor&iacute;a $_POST[categoria] ha sido introducida correctamente</span>";
    endif;

	if($_POST["accion"] == "sqlCatR"):
		$updatearCat = mysql_query("UPDATE bd_categorias_regalos SET categoria='$_POST[ncat]', preciomin='$_POST[pmin]', preciomax='$_POST[pmax]' WHERE id='$_POST[idUpd]'",$db);
		$aviso = "La categor&iacute;a ha sido modificada correctamente";
	endif;


    if($_POST["accion"] == "eliminarCategoriaR"):
		$del = mysql_query("DELETE FROM bd_categorias_regalos WHERE id= '$_POST[idEli]'",$db);
		$aviso = "La categor&iacute;a $_POST[nombreEli] ha sido eliminada con correctamente";
	endif;


    if($_POST["accion"] == "subirCategoria"):
    	$ins = "INSERT INTO bd_categorias (categoria,categoria_en,idpadre,orden) VALUES('$_POST[categoria]','$_POST[categoria_en]','$_POST[idCatP]','$_POST[orden]')";
    	$sub = mysql_query($ins,$db);
    	$aviso = "<span class=''>La categor&iacute;a $_POST[categoria] ha sido introducida correctamente</span>";
    endif;


    if($_POST["accion"] == "eliminarCategoria"):
		$del = mysql_query("DELETE FROM bd_categorias WHERE id= '$_POST[idEli]'",$db);
		$aviso = "La categor&iacute;a $_POST[nombreEli] ha sido eliminada con correctamente";
	endif;

	if($_POST["accion"] == "sqlCat"):
		$updatearCat = mysql_query("UPDATE bd_categorias SET categoria='$_POST[ncat]', categoria_en='$_POST[ncat_en]',idpadre='$_POST[idModP]',orden=$_POST[orden] WHERE id='$_POST[idUpd]'",$db);
		$aviso = "La categor&iacute;a ha sido modificada correctamente";
	endif;
	

	if($_POST["accion"] == "modificaNombre"):
	//echo "UPDATE bd_carrito SET nombre='$_POST[nombreP]' WHERE id=$_POST[idCarro]";
		$upd = mysql_query("UPDATE bd_carrito SET nombre='$_POST[nombreP]' WHERE id=$_POST[idCarro]",$db);
	endif;

	//echo $_POST["accion"];
	$totalSum = mysql_query("SELECT count(*) FROM bd_productos",$db);
	$suma = mysql_fetch_Array($totalSum);
	$numeroT = $suma["0"];
	
	if($_POST["accion"] == "exportarProductosPdf"):

		$code1 = uniqid();
		$nombreP = "listados/".$code1.".pdf";
		include("pdf/mpdf.php");
		
 
		   $ilPdf = '<div style="width: 780px; padding-left: 30px;padding-right: 30px;text-align: left;
		    background-color: #fff; padding-top: 25px;padding-bottom: 30px;filter: alpha(opacity = 90);font-family: arial;color: #808080;
		    font-size: 13px;">';

		    /*$ilPdf .= "
		    <div style='float:left; width:30%;'>
		      <img style='max-width:250px; float: left;' src='$miDominio/logo/$emp[imagen]' />
		    </div>";*/

		     
		    $ilPdf .= "<div style='float:left; width:70%;' border-radius:5px; border:1px solid #ccc;>
		     LISTADO DE PRODUCTOS<br />
		      Fecha: <strong> $fechaHr </strong><br />
		      Total:  <strong>$numeroT prods.</strong>
		    </div>
		    <br style='clear:both;' />

		    <div style='float: left; width:15%;'>
		    	<strong>Cod.</strong>
		    </div>

		    <div style='float: left; width:40%;'>
		     <strong>Producto</strong>
			</div>

		    <div style='float: left; width:20%;'>
		    <strong> Marca</strong>
			</div>		     

		    <div style='float: left; width:25%;'>
		    <strong> Precio</strong>
		    </div>
		   <div style='height:2px; background-color:#ccc; width: 100%; float: left;'>
		    </div>			    <br style='clear:both;' />";
		    
		    $prods = getAll("bd_productos"," id > 0 ORDER BY nombre ASC");
		    foreach($prods as $ps):
		    		$laM = getItemByField("bd_marcas","id","$ps[idmarca]");

		    					  if(empty($ps["referencia"])):
		    				        $laRe = "S/D";
		    				      else:
		    				      	$laRe = $ps["referencia"];  
		    				      endif;
		    		$ilPdf .= " <div style='float: left; width:15%;'>
		    				    	 $laRe
		    				    </div>
		    		
		    				    <div style='float: left; width:40%;'>
		    				     $ps[nombre] 
		    					</div>
		    		
		    				    <div style='float: left; width:20%;'>";
		    				      
		    				      if(empty($laM["marca"])):
		    				        $laMa = "S/M";
		    				      else:
		    				      	$laMa = $laM["marca"];  
		    				      endif;
		    					
		    					$ilPdf .= "$laMa</div>		     
		    		
		    				    <div style='float: left; width:25%;'>
		    				     $ps[precio]
		    				    </div> <br style='clear:both;' />

		    <div style='height:1px; background-color:#ccc; width: 100%; float: left;'>
		    </div>			    <br style='clear:both;' />";
					 
		    endforeach;



		    $ilPdf .= "</div>";

			$wf = date("Y/m/d H:i:s");
			
			//echo $ilPdf;
			$mpdf2=new mPDF();
			$mpdf2->WriteHTML($ilPdf);
			$mpdf2->Output($nombreP,'F');

			$aviso = "El listado ha sido creado con &eacute;xito. <a target='_blank' href='$nombreP'>Descargar Listado</a>";
	endif;




	if($_POST["accion"] == "transpasoAlmacen"):
		if($_POST["qAnteriorDestino"]==0):
		else:
			$nuevaCantidad = $_POST["qAnteriorDestino"] - $_POST["numberOf"];
			$anteriorAlmacen = mysql_query("UPDATE bd_infoalmacen SET cantidad = $nuevaCantidad WHERE idalmacen = '$_POST[idAlmacen]' AND idproducto = '$_POST[idproducto]'",$db);
			//$aviso = "UPDATE bd_infoalmacen SET cantidad = $nuevaCantidad WHERE idalmacen = '$_POST[idAlmacen]' AND idproducto = '$_POST[idproducto]'";
			$qDestino = mysql_query("SELECT * FROM bd_infoalmacen WHERE idalmacen = '$_POST[idAlmacenDestino]' AND idproducto = '$_POST[idproducto]'",$db);
			$miCantidad = 0;
			$eseC = 0;
			while($qqq = MySQL_fetch_array($qDestino)):
				$miCantidad = $qqq["cantidad"];
				$elId = $qqq["id"];
				$eseC ++;
			endwhile;
			if($eseC > 0):
				$miCantidad = $miCantidad + $_POST["numberOf"];
				$almacenDestino = mysql_query("UPDATE bd_infoalmacen SET cantidad = $miCantidad WHERE id = '$elId'",$db);
				//$aviso .= "UPDATE bd_infoalmacen SET cantidad = $miCantidad WHERE id = '$elId' <br /> $miCantidad";
			elseif($miCantidad == 0):
				$insertamos = mysql_query("INSERT INTO bd_infoalmacen (idalmacen,idproducto,cantidad) VALUES ('$_POST[idAlmacenDestino]','$_POST[idproducto]','$_POST[numberOf]')",$db);
      			//$aviso .= "INSERT INTO bd_infoalmacen (idalmacen,idproducto,cantidad) VALUES ('$_POST[idAlmacenDestino]','$_POST[idproducto]','$_POST[numberOf]')";
			endif;
		endif;
		//$_POST["numberOf"]
		
		/*$_POST["idproducto"]
		$_POST["idAlmacen"]*/

	endif;


	if($_POST["accion"]=="modificarPagina"):
		$upd = mysql_query("UPDATE bd_paginas SET contenido='$_POST[contenido]',contenido_en='$_POST[contenido_en]' WHERE id = $_POST[idS]",$db);
		$aviso = "La secci&oacute;n ha sido modificada con &eacute;xito.";
	endif;

	if($_POST["accion"] == "subirLogoPag"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
				$img = $_FILES['imagen'];
				$extension = end(explode(".", $img['name']));
				$imagen = uniqid().'.'.$extension;
				move_uploaded_file($img['tmp_name'], "../uploads/$imagen");

				$miArchivo = "../uploads/$imagen";
				if(file_get_contents($miArchivo)):
					$foto = new resize($miArchivo);
	              	$foto->resizeImage(200, auto);
	              	$foto->saveImage('../uploads/min/'.$imagen);
	            endif;
		endif;

		$updatear = mysql_query("UPDATE bd_paginas SET imagen='$imagen'
		WHERE id = $_POST[idS]",$db);
		$aviso = "La imagen ha sido modificada correctamente";
	endif;
	
	
	if($_POST["accion"] == "eliminarFactura"):
		$del = mysql_query("DELETE FROM bd_facturas WHERE id= '$_POST[idEli]'",$db);
		$aviso = "La factura $_POST[nombreEli] ha sido eliminada con correctamente";
	endif;



	if($_POST["accion"] == "eliminarOferta"):
		$del = mysql_query("DELETE FROM bd_oferta WHERE idproducto= '$_POST[idUp]' AND tipo=0",$db);
	endif;

	if($_POST["accion"] == "eliminarTop"):
		$del = mysql_query("DELETE FROM bd_oferta WHERE idproducto= '$_POST[idUp]' AND tipo=1",$db);
	endif;

	if($_POST["accion"] == "hacerOferta"):
		$del = mysql_query("INSERT INTO bd_oferta (idproducto,tipo) VALUES ('$_POST[idUp]','0')",$db);
	endif;

	if($_POST["accion"] == "hacerTop"):
		$del = mysql_query("INSERT INTO bd_oferta (idproducto,tipo) VALUES ('$_POST[idUp]','1')",$db);
	endif;


	if($_POST["accion"]=="subirPagina"):
		if (file_exists($_FILES['imagen']['tmp_name'])):
				$img = $_FILES['imagen'];
				$extension = end(explode(".", $img['name']));
				$imagen = uniqid().'.'.$extension;
				move_uploaded_file($img['tmp_name'], "../uploads/$imagen");
				$imgU = $imagen;
				include "../resize-class.php";
 				$foto = new resize('../uploads/'.$imagen);
	            $foto->resizeImage(400, auto);
	            $foto->saveImage('../uploads/min/'.$imagen);
		else:
			$imgU = "";
		endif;
		
		$laDes = str_replace("'","�",$_POST["des"]);
		

		//echo "INSERT INTO bd_page (titulo,descripcion,imagen,titulo_en,titulo_eu,descripcion_en,descripcion_eu) VALUES ('$_POST[nombre]','$laDes','$imgU','$_POST[nombre_en]','$_POST[nombre_eu]','$laDes_en','$laDes_eu')";
		$intr = mysql_query("INSERT INTO bd_paginas (nombre,contenido,imagen,noticia) VALUES ('$_POST[nombre]','$laDes','$imgU','$_POST[esNoticia]')",$db);
		$aviso = utf8_encode("<span class='verdeS'>La p�gina ha sido subida correctamente </span>");
		
	endif;


	if($_POST["accion"]=="modificarPagina"):
		if(file_exists($_FILES['imagen']['tmp_name'])):
				$img = $_FILES['imagen'];
				$extension = end(explode(".", $img['name']));
				$imagen = uniqid().'.'.$extension;
				move_uploaded_file($img['tmp_name'], "../uploads/$imagen");
				$imgU = $imagen;
				include "../resize-class.php";
 				$foto = new resize('../uploads/'.$imagen);
	            $foto->resizeImage(400, auto);
	            $foto->saveImage('../uploads/min/'.$imagen);
		else:
			$imgU = $_POST["imagenAnterior"];
		endif;

		$upd = mysql_query("UPDATE bd_paginas SET nombre='".utf8_decode($_POST['nombre'])."', contenido='$_POST[descripcion]',imagen='$imgU', noticia='$_POST[esNoticia]' WHERE id = $_POST[idUpd]",$db);
		$aviso = "La secci&oacute;n ha sido modificada con &eacute;xito.";
	endif;

	
	if($_POST["accion"]=="eliminarPage"):
		mysql_query("DELETE FROM bd_paginas WHERE id=$_POST[idEli]",$db);
		$aviso = utf8_encode("<span class='verdeS'>La p�gina ha sido eliminada correctamente </span>");
	endif;


	if($_POST["accion"]=="subirVideo"):
		
		$laDes = str_replace("'","�",$_POST["des"]);
		$codevideo =  end(explode("?v=", $_POST["url"]));
		$thumb = 'http://img.youtube.com/vi/'.$codevideo.'/0.jpg';
		$cap1 = 'http://img.youtube.com/vi/'.$codevideo.'/1.jpg';
		$cap2 = 'http://img.youtube.com/vi/'.$codevideo.'/2.jpg';
		$cap3 = 'http://img.youtube.com/vi/'.$codevideo.'/3.jpg';
		

		//echo "INSERT INTO bd_page (titulo,descripcion,imagen,titulo_en,titulo_eu,descripcion_en,descripcion_eu) VALUES ('$_POST[nombre]','$laDes','$imgU','$_POST[nombre_en]','$_POST[nombre_eu]','$laDes_en','$laDes_eu')";
		$ptusql = "INSERT INTO bd_videos VALUES (NULL, '".mysql_real_escape_string(utf8_decode($_POST['nombre']))."','".mysql_real_escape_string(utf8_decode($laDes))."','".mysql_real_escape_string(utf8_decode($_POST['url']))."','".mysql_real_escape_string(utf8_decode($thumb))."','".mysql_real_escape_string(utf8_decode($cap1))."','".mysql_real_escape_string(utf8_decode($cap2))."','".mysql_real_escape_string(utf8_decode($cap3))."', NOW(), 0)";
        $intr = mysql_query($ptusql ,$db);
		$aviso = utf8_encode("<span class='verdeS'>El video ha sido subido correctamente </span>");
	endif;


	if($_POST["accion"]=="modificarVideo"):
		$laDes = str_replace("'","�",$_POST["descripcion"]);
		$codevideo =  end(explode("?v=", $_POST["url"]));
		$thumb = 'http://img.youtube.com/vi/'.$codevideo.'/0.jpg';
		$cap1 = 'http://img.youtube.com/vi/'.$codevideo.'/1.jpg';
		$cap2 = 'http://img.youtube.com/vi/'.$codevideo.'/2.jpg';
		$cap3 = 'http://img.youtube.com/vi/'.$codevideo.'/3.jpg';
		
		$upd = mysql_query("UPDATE bd_videos SET titulo='".mysql_real_escape_string(utf8_decode($_POST['titulo']))."', descripcion='".mysql_real_escape_string(utf8_decode($laDes))."',url='".mysql_real_escape_string(utf8_decode($_POST['url']))."',thumb='".mysql_real_escape_string(utf8_decode($thumb))."',cap1='".mysql_real_escape_string(utf8_decode($cap1))."',cap2='".mysql_real_escape_string(utf8_decode($cap2))."',cap3='".mysql_real_escape_string(utf8_decode($cap3))."' WHERE id = $_POST[idUpd]",$db);
		$aviso = "La secci&oacute;n ha sido modificada con &eacute;xito.";
	endif;


	if($_POST["accion"]=="changeVideo"):
		
		$upd = mysql_query("UPDATE bd_videos SET home = 0 WHERE 1",$db);
		$upd = mysql_query("UPDATE bd_videos SET home = 1 WHERE id = $_POST[idUp]",$db);
		$aviso = "El video se ha convertido en el principal de la home correctamente.";
	endif;


	if($_POST["accion"]=="subirVideopA"):
		
		$laDes = str_replace("'","�",$_POST["des"]);
		$codevideo =  end(explode("?v=", $_POST["url"]));
		$thumb = 'http://img.youtube.com/vi/'.$codevideo.'/0.jpg';
		$cap1 = 'http://img.youtube.com/vi/'.$codevideo.'/1.jpg';
		$cap2 = 'http://img.youtube.com/vi/'.$codevideo.'/2.jpg';
		$cap3 = 'http://img.youtube.com/vi/'.$codevideo.'/3.jpg';
		

		//echo "INSERT INTO bd_page (titulo,descripcion,imagen,titulo_en,titulo_eu,descripcion_en,descripcion_eu) VALUES ('$_POST[nombre]','$laDes','$imgU','$_POST[nombre_en]','$_POST[nombre_eu]','$laDes_en','$laDes_eu')";
		$ptusql = "INSERT INTO bd_productos_videos VALUES (".mysql_real_escape_string(utf8_decode($_POST['idpv'])).", '".mysql_real_escape_string(utf8_decode($_POST['nombre']))."','".mysql_real_escape_string(utf8_decode($laDes))."','".mysql_real_escape_string(utf8_decode($_POST['url']))."','".mysql_real_escape_string(utf8_decode($thumb))."','".mysql_real_escape_string(utf8_decode($cap1))."','".mysql_real_escape_string(utf8_decode($cap2))."','".mysql_real_escape_string(utf8_decode($cap3))."', NOW(), 0)";
        $intr = mysql_query($ptusql ,$db);
		$aviso = utf8_encode("<span class='verdeS'>El video ha sido subido correctamente </span>");
	endif;


	if($_POST["accion"]=="modificarVideopA"):
		$laDes = str_replace("'","�",$_POST["descripcion"]);
		$codevideo =  end(explode("?v=", $_POST["url"]));
		$thumb = 'http://img.youtube.com/vi/'.$codevideo.'/0.jpg';
		$cap1 = 'http://img.youtube.com/vi/'.$codevideo.'/1.jpg';
		$cap2 = 'http://img.youtube.com/vi/'.$codevideo.'/2.jpg';
		$cap3 = 'http://img.youtube.com/vi/'.$codevideo.'/3.jpg';
		
		$upd = mysql_query("UPDATE bd_productos_videos SET titulo='".mysql_real_escape_string(utf8_decode($_POST['titulo']))."', descripcion='".mysql_real_escape_string(utf8_decode($laDes))."',url='".mysql_real_escape_string(utf8_decode($_POST['url']))."',thumb='".mysql_real_escape_string(utf8_decode($thumb))."',cap1='".mysql_real_escape_string(utf8_decode($cap1))."',cap2='".mysql_real_escape_string(utf8_decode($cap2))."',cap3='".mysql_real_escape_string(utf8_decode($cap3))."' WHERE id_producto = ".mysql_real_escape_string(utf8_decode($_POST['idUpd'])).";",$db);
		$aviso = "La secci&oacute;n ha sido modificada con &eacute;xito.";
	endif;

	
	if($_POST["accion"]=="eliminarVideopA"):
		mysql_query("DELETE FROM bd_productos_videos WHERE id_producto=".mysql_real_escape_string(utf8_decode($_POST['idEli']))."",$db);
		$aviso = utf8_encode("<span class='verdeS'>El video ha sido eliminado correctamente </span>");
	endif;


	if($_POST["accion"]=="subeTipoCrema"):
		if(strlen($_POST["p1"])>0):
			mysql_query("INSERT INTO bd_tipo_cremas (dianoche,edad1,edad2,idproducto,tipopiel) VALUES ('$_POST[dianoche]','$_POST[edad1]','$_POST[edad2]','$_POST[p1]','$_POST[tPiel]')",$db);
			$aviso = utf8_encode("<span class='verdeS'>El producto ha sido ampliado correctamente</span>");
		else:
			$aviso = utf8_encode("<span class='rojoS'>ERROR! Debe elegir un producto para anexarlo</span>");
		endif;
	endif;

	if($_POST["accion"]=="eliminaTipoCrema"):
		mysql_query("DELETE FROM bd_tipo_cremas WHERE id=$_POST[idEli]",$db);
		$aviso = utf8_encode("<span class='verdeS'>Eliminado correctamente </span>");
	endif;

	if($_POST["accion"]=="subeTipoPiel" && strlen($_POST["tipoP"])>0):
		mysql_query("INSERT INTO bd_tipoPiel (tipo) VALUES ('$_POST[tipoP]')",$db);
		$aviso = utf8_encode("<span class='verdeS'>Tipo de Piel introducida correctamente </span>");
	endif;

	if($_POST["accion"]=="eliminaTipoPiel"):
		mysql_query("DELETE FROM bd_tipoPiel WHERE id=$_POST[idEli]",$db);
		$aviso = utf8_encode("<span class='verdeS'>Eliminado correctamente </span>");
	endif;

?> 

<?php //MIS FUNCIONES
 function calcular_tiempo_trasnc($hora1,$hora2){ 
    $separar[1]=explode(':',$hora1); 
    $separar[2]=explode(':',$hora2); 

$total_minutos_trasncurridos[1] = ($separar[1][0]*60)+$separar[1][1]; 
$total_minutos_trasncurridos[2] = ($separar[2][0]*60)+$separar[2][1]; 
$total_minutos_trasncurridos = $total_minutos_trasncurridos[1]-$total_minutos_trasncurridos[2]; 
if($total_minutos_trasncurridos<=59) return($total_minutos_trasncurridos); 
elseif($total_minutos_trasncurridos>59){ 
$HORA_TRANSCURRIDA = round($total_minutos_trasncurridos/60); 
if($HORA_TRANSCURRIDA<=9) $HORA_TRANSCURRIDA='0'.$HORA_TRANSCURRIDA; 
$MINUITOS_TRANSCURRIDOS = $total_minutos_trasncurridos%60; 
if($MINUITOS_TRANSCURRIDOS<=9) $MINUITOS_TRANSCURRIDOS='0'.$MINUITOS_TRANSCURRIDOS; 
return ($MINUITOS_TRANSCURRIDOS); 
} 
}
?> 