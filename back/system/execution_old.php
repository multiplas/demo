<?php
	session_start();
	require_once('system/functions.module');	
	
	$System = new MySystem();
	
	$System->ControlDeSesiones();
	$System->Conectar();
	$System->CargarEmpresa();
	
	$resultaop = false;
	$resultaop2 = false;
    $soltpv = 0;
	
	if (@$_POST['accionad'] == 'entrar' && !$System->ExisteUsuario()){
		$System->Entrar(@$_POST['usuario'], @$_POST['password']);
        }
	
	if (@$_GET['accionad'] == 'salir')
		$System->Salir();
	
	if (@$_GET['accion'] == 'subirpack')
		$resultaop = $System->PackNuevo($_POST['nombre'], $_POST['contenido'], $_FILES['imagen'], $_POST['precio'], $_POST['iva'], $_POST['descuento']);
	
	if (@$_GET['accion'] == 'subirpr'){
        for($i=0;$i<count($_POST['disp']); $i++) 
        { 
            $num = $i + 1;
            $precio = 'precio'.$num;
            if($_POST[$precio] == null || $_POST[$precio] == "")
                $System->ProductoNuevoAtr($_POST['disp'][$i],0);
            else
                $System->ProductoNuevoAtr($_POST['disp'][$i],$_POST[$precio]);
        }
        for($i=0;$i<count($_POST['cuotas']); $i++) 
        { 
            $num = $i + 1;
            $precio = 'precioC'.$num;
            if($_POST[$precio] == null || $_POST[$precio] == "")
                $System->ProductoNuevoCuota($_POST['cuotas'][$i],0);
            else
                $System->ProductoNuevoCuota($_POST['cuotas'][$i],$_POST[$precio]);
        }
		$resultaop = $System->ProductoNuevo($_POST['nombre'], $_POST['contenido'], $_POST['nombrein'], $_POST['contenidoin'], $_POST['nombrea'], $_POST['contenidoa'], $_POST['nombref'], $_POST['contenidof'], $_POST['nombreit'], $_POST['contenidoit'], $_POST['nombrep'], $_POST['contenidop'], $_POST['nombreca'], $_POST['contenidoca'], $_POST['nombreru'], $_POST['contenidoru'], $_FILES['imagen'], $_POST['metatitulo'], $_POST['metadescripcion'], $_POST['unidades'], $_POST['stock'], $_POST['precio'], $_POST['iva'], $_POST['descuento'], $_POST['descuentoe'], $_POST['peso'], $_POST['referencia'], $_POST['categoria1'], $_POST['categoria2'], $_POST['categoria3'], $_POST['categoria4'], $_POST['categoria5'], $_POST['marca'], $_POST['paypalm'], $_POST['domicim'], $_POST['fDirecta'], $_POST['aplazame'], $_POST['caplazame'], $_POST['caplazame1'], $_POST['tipo'], $_POST['meses'], $_POST['cuota'], @$_POST['disponible']);
    }
	
	if (@$_GET['accion'] == 'subirprre')
		$resultaop = $System->ProductoRelacionadoCrear($_POST['producto'], $_POST['productor']);
	
	if (@$_GET['accion'] == 'subiratrre')
		$resultaop = $System->ProductoAtributoCrear($_POST['producto'], $_POST['atributo']);
	
	if (@$_GET['accion'] == 'subircatat')
		$resultaop = $System->NuevaCategoriaAtributo($_POST['atributo'], @$_POST['dependiente'], @$_POST['obligatorio']);
	
	if (@$_GET['accion'] == 'subirimgpr')
		$resultaop = $System->ImagenProductoNueva($_POST['idm'], $_FILES['imagenpr']);

    if (@$_GET['accion'] == 'subirpag')
		$resultaop = $System->PaginaNueva($_POST['titulo'], $_POST['contenido'], $_FILES['imagenpagina']);
	
	if (@$_GET['accion'] == 'subirat')
		$resultaop2 = $System->NuevoAtributo($_POST['catea'], $_POST['atributo']);
        
        if (@$_GET['accion'] == 'subircuo')
		$resultaop2 = $System->NuevaCuota($_POST['nmeses']);
	
	if (@$_GET['accion'] == 'subirdescu')
		$resultaop2 = $System->NuevoDescuento($_POST['producto'], $_POST['cantidad'], $_POST['descuento']);
	
	if (@$_GET['accion'] == 'subirpromo')
		$resultaop2 = $System->NuevoPromocional($_POST['promo'], $_POST['codigo'], $_POST['descuento'], $_POST['tipo'], $_POST['inicio'], $_POST['fin'], $_POST['min'], $_POST['max'], $_POST['cantidad']);
	
	if (@$_GET['accion'] == 'subirprt'){
                $dir_subida = '../logos/';
                $extension = explode('.', $_FILES['logo']['name']);
		$resultaop2 = $System->NuevoPorte($_POST[nombre], $_POST['gratisE'], $_POST['precioE'], $_POST['gratisB'], $_POST['precioB'], $_POST['gratisEU'], $_POST['precioEU'], $_POST['gratisI'], $_POST['precioI'], $extension[1]);
                if($_FILES['logo']['size'] > 0){
                    $fichero_subido = $dir_subida . $resultaop2 . "." . $extension[1];
                    move_uploaded_file($_FILES['logo']['tmp_name'], $fichero_subido);
                }
        }
	
	if (@$_GET['accion'] == 'subirproductospack' && @$_GET['productospack'] != null && @$_GET['productospack'] != '')
		$resultaop2 = $System->NuevoPacksProductos($_GET['productospack'], $_POST['producto1'], $_POST['producto2'], $_POST['producto3'], $_POST['producto4']);
	
    if (@$_GET['accion'] == 'subirco')
		$resultaop = $System->MenuNuevo($_POST['nombre'], $_POST['nombre2'], $_POST['nombre3'], $_POST['nombre4'], $_POST['nombre5'], $_POST['nombre6'], $_POST['nombre7'], $_POST['nombre8'], ($_POST['catep'] != 'c-padre' ? $_POST['catep'] : null), @$_POST['categoria']);
	
	if (@$_GET['accion'] == 'subirnot')
		$resultaop = $System->NoticiaNueva($_POST['titulo'], $_POST['contenido'], $_POST['titulo2'], $_POST['contenido2'], $_POST['titulo3'], $_POST['contenido3'], $_POST['titulo4'], $_POST['contenido4'], $_POST['titulo5'], $_POST['contenido5'], $_POST['titulo6'], $_POST['contenido6'], $_POST['titulo7'], $_POST['contenido7'], $_POST['titulo8'], $_POST['contenido8'], $_POST['categoria1'], $_FILES['imagennoticia']);
	
	if (@$_GET['accion'] == 'subircur')
		$resultaop = $System->NuevoCurso($_POST['curso'], $_POST['edicion'], $_POST['contenido'], $_POST['inicio'], $_POST['fin'], $_POST['color'], $_POST['precio']);
	
	if (@$_GET['editarat'] != null && @$_POST['idm'] != null)
		$resultaop2 = $System->ModificarAtributo($_POST['idm'], $_POST['catea'], $_POST['atributo']);
        
        if (@$_GET['editarcuo'] != null && @$_POST['idm'] != null)
		$resultaop2 = $System->ModificarCuota($_POST['idm'], $_POST['nmeses']);
	
	if (@$_GET['editarcatat'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ModificarCategoriaAtributo($_POST['idm'], $_POST['atributo'], @$_POST['obligatorio']);
	
	if (@$_GET['estadofact'] != null && @$_GET['estadof'] != null)
		$resultaop = $System->FacturaEstado($_GET['estadofact'], $_GET['estadof']);

    if (@$_GET['estadodist'] != null && @$_GET['estadodist'] != null)
		$resultaop = $System->DistribuidorEstado($_GET['estadodist']);
	
	if (@$_GET['editarm'] != null && @$_POST['idm'] != null)
		$resultaop = $System->MenuModificar($_POST['idm'], $_POST['nombre'], $_POST['nombre2'], $_POST['nombre3'], $_POST['nombre4'], $_POST['nombre5'], $_POST['nombre6'], $_POST['nombre7'], $_POST['nombre8'], ($_POST['catep'] != 'c-padre' ? $_POST['catep'] : null), @$_POST['categoria']);
	
	if (@$_GET['editarp'] != null && @$_POST['idm'] != null)
		$resultaop = $System->PaginaModificar($_POST['idm'], $_POST['titulo'], $_POST['contenido'], $_FILES['imagenpagina']);
	
	if (@$_GET['editarn'] != null && @$_POST['idm'] != null)
		$resultaop = $System->NoticiaModificar($_POST['idm'], $_POST['titulo'], $_POST['contenido'], $_POST['titulo2'], $_POST['contenido2'], $_POST['titulo3'], $_POST['contenido3'], $_POST['titulo4'], $_POST['contenido4'], $_POST['titulo5'], $_POST['contenido5'], $_POST['titulo6'], $_POST['contenido6'], $_POST['titulo7'], $_POST['contenido7'], $_POST['titulo8'], $_POST['contenido8'], $_POST['categoria1'], $_FILES['imagennoticia']);
	
	if (@$_GET['editarpack'] != null && @$_POST['idm'] != null)
		$resultaop = $System->PackModificar($_POST['idm'], $_POST['nombre'], $_POST['contenido'], $_FILES['imagen'], $_POST['precio'], $_POST['iva'], $_POST['descuento']);
	
	if (@$_GET['editarpr'] != null && @$_POST['idm'] != null){
        for($i=0;$i<count($_POST['disp']); $i++) 
        { 
            $num = $i + 1;
            $precio = 'precio'.$_POST['disp'][$i];
            if($_POST[$precio] == null || $_POST[$precio] == "")
                $System->ProductoEditarAtr($_POST['disp'][$i], $_POST['idm'], 0);
            else
                $System->ProductoEditarAtr($_POST['disp'][$i], $_POST['idm'], $_POST[$precio]);
        }
        for($i=0;$i<count($_POST['cuotas']); $i++) 
        { 
            $num = $i + 1;
            $precio = 'precioC'.$_POST['cuotas'][$i];
            if($_POST[$precio] == null || $_POST[$precio] == "")
                $System->ProductoEditarCuota($_POST['cuotas'][$i], $_POST['idm'], 0);
            else
                $System->ProductoEditarCuota($_POST['cuotas'][$i], $_POST['idm'], $_POST[$precio]);
        }
		$resultaop = $System->ProductoModificar($_POST['idm'], $_POST['nombre'], $_POST['contenido'], $_POST['nombre2'], $_POST['contenido2'], $_POST['nombre3'], $_POST['contenido3'], $_POST['nombre4'], $_POST['contenido4'], $_POST['nombre5'], $_POST['contenido5'], $_POST['nombre6'], $_POST['contenido6'], $_POST['nombre7'], $_POST['contenido7'], $_POST['nombre8'], $_POST['contenido8'], $_FILES['imagen'], $_POST['metatitulo'], $_POST['metadescripcion'], $_POST['unidades'], $_POST['stock'], $_POST['precio'], $_POST['iva'], $_POST['descuento'], $_POST['descuentoe'], $_POST['peso'], $_POST['referencia'], $_POST['categoria1'], $_POST['categoria2'], $_POST['categoria3'], $_POST['categoria4'], $_POST['categoria5'], $_POST['marca'], $_POST['paypalm'], $_POST['domicim'], $_POST['fDirecta'], $_POST['aplazame'], $_POST['caplazame'], $_POST['caplazame1'], $_POST['tipo'], @$_POST['disponible']);
    }
	
	if (@$_GET['editarc'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ModificarCurso($_POST['idm'], $_POST['curso'], $_POST['edicion'], $_POST['contenido'], $_POST['inicio'], $_POST['fin'], $_POST['color'], $_POST['precio']);
	
    if (@$_GET['activaru'] != null)
		$resultaop = $System->ActivarUsuario($_GET['activaru']);

    if (@$_GET['accion'] == 'actgal')
		$resultaop = $System->ActivarGaleria($_POST['galeria']);

    if (@$_GET['accion'] == 'actblog')
		$resultaop = $System->ActivarBlog($_POST['blog']);

    if (@$_GET['accion'] == 'actblogin')
		$resultaop = $System->ActivarBlogIn($_POST['blogin']);

	if (@$_GET['confirmarcontra'] != null)
		$resultaop = $System->FacturaNueva($_GET['confirmarcontra']);
	
	if (@$_GET['eliminarc'] != null)
		$resultaop = $System->CursoEliminar($_GET['eliminarc']);
	
	if (@$_GET['eliminardescu'] != null)
		$resultaop = $System->DescuentoEliminar($_GET['eliminardescu']);
	
	if (@$_GET['eliminarcodpromo'] != null)
		$resultaop = $System->PromocionalEliminar($_GET['eliminarcodpromo'], $_GET['tipoeli']);
	
	if (@$_GET['eliminarprt'] != null)
		$resultaop = $System->PortesEliminar($_GET['eliminarprt']);
	
	if (@$_GET['eliminarm'] != null)
		$resultaop = $System->MenuEliminar($_GET['eliminarm']);
	
	if (@$_GET['accion'] == 'subirsl')
		$resultaop = $System->SliderNuevo($_POST['texto'], $_POST['categoria'], $_FILES['imagenslider']);

    if (@$_GET['accion'] == 'subiric')
		$resultaop = $System->ImagenCatNuevo($_POST['categoria'], $_FILES['imagenslider']);

    if (@$_GET['accion'] == 'subirgl')
		$resultaop = $System->GaleriaNuevo($_POST['categoria1'], $_FILES['imagengaleria']);
	
	if (@$_GET['eliminars'] != null)
		$resultaop = $System->SliderEliminar($_GET['eliminars']);

    if (@$_GET['eliminaric'] != null)
		$resultaop = $System->ImagenCatEliminar($_GET['eliminaric']);

    if (@$_GET['eliminarg'] != null)
		$resultaop = $System->GaleriaEliminar($_GET['eliminarg']);
	
	if (@$_GET['estadop'] != null)
		$resultaop = $System->PaginaEstado($_GET['estadop']);
	
	if (@$_GET['estadocur'] != null)
		$resultaop = $System->CursoEstado($_GET['estadocur']);
	
	if (@$_GET['estadon'] != null)
		$resultaop = $System->NoticiaEstado($_GET['estadon']);
	
	if (@$_GET['eliminarp'] != null)
		$resultaop = $System->PaginaEliminar($_GET['eliminarp']);
	
	if (@$_GET['eliminarn'] != null)
		$resultaop = $System->NoticiaEliminar($_GET['eliminarn']);
	
	if (@$_GET['eliminarpack'] != null)
		$resultaop = $System->PackEliminar($_GET['eliminarpack']);
	
	if (@$_GET['eliminarpackb'] != null)
		$resultaop = $System->PacksProductosEliminar($_GET['eliminarpackb'], $_GET['productospack']);
	
	if (@$_GET['eliminarpr'] != null)
		$resultaop = $System->ProductoEliminar($_GET['eliminarpr']);
	
	if (@$_GET['eliminarprre'] != null && @$_GET['eliminarprre2'] != null)
		$resultaop = $System->ProductoRelacionadoEliminar($_GET['eliminarprre'], $_GET['eliminarprre2']);
	
	if (@$_GET['eliminaratrre'] != null)
		$resultaop = $System->ProductoAtributoEliminar($_GET['eliminaratrre']);
	
	if (@$_GET['accion'] == 'subirus')
		$resultaop = $System->UsuarioNuevo($_POST['nombre'], $_POST['nif'], $_POST['telefono'], $_POST['email'], $_POST['calle'], $_POST['provincia'], $_POST['poblacion'], $_POST['cp'], $_POST['password']);

        if (@$_GET['accion'] == 'subirdis')
		$resultaop = $System->DistribuidorNuevo($_POST['nombre'], $_POST['apellidos'], $_POST['rs'], $_POST['nif'], $_POST['telefono'], $_POST['email'], $_POST['calle'], $_POST['provincia'], $_POST['poblacion'], $_POST['cp'], $_POST['password'], $_POST['paypal']);
	
        if (@$_GET['eliminardist'] != null)
		$resultaop = $System->DistribuidorEliminar(@$_GET['eliminardist']);
        
	if (@$_GET['estado'] != null)
		$resultaop = $System->UsuarioEstado($_GET['estado']);
	
	if (@$_GET['estadopais'] != null)
		$resultaop = $System->PaisEstado($_GET['estadopais']);
	
	if (@$_GET['estadopr'] != null)
		$resultaop = $System->ProductoEstado($_GET['estadopr']);
	
	if (@$_GET['destacadopr'] != null)
		$resultaop = $System->ProductoDestacado($_GET['destacadopr']);
	
	if (@$_GET['editaru'] != null && @$_POST['idm'] != null)
		if (@$_POST['password'] == @$_POST['rpassword'])
			$resultaop = $System->UsuarioModificar($_POST['idm'], $_POST['nombre'], $_POST['nif'], $_POST['telefono'], $_POST['email'], $_POST['direccion'], $_POST['provincia'], $_POST['poblacion'], $_POST['cp'], ($_POST['password'] != '' ? $_POST['password'] : null));

    if (@$_GET['editardist'] != null && @$_POST['idm'] != null)
		if (@$_POST['password'] == @$_POST['rpassword'])
			$resultaop = $System->DistribuidorModificar($_POST['idm'], $_POST['nombre'], $_POST['apellidos'], $_POST['rs'], $_POST['nif'], $_POST['telefono'], $_POST['email'], $_POST['direccion'], $_POST['provincia'], $_POST['poblacion'], $_POST['cp'], $_POST['paypal'], ($_POST['password'] != '' ? $_POST['password'] : null));
	
	if (@$_GET['eliminarimgpr'] != null)
		$resultaop = $System->ImagenProductoEliminar($_GET['eliminarimgpr']);
	
	if (@$_GET['eliminar'] != null)
		$resultaop = $System->UsuarioEliminar($_GET['eliminar']);
	
	if (@$_GET['eliminarcatat'] != null)
		$resultaop = $System->CategoriaAtributosEliminar($_GET['eliminarcatat']);
	
	if (@$_GET['eliminarat'] != null)
		$resultaop = $System->AtributoEliminar($_GET['eliminarat']);
        
        if (@$_GET['eliminarcuo'] != null)
		$resultaop = $System->CuotaEliminar($_GET['eliminarcuo']);
	
	if (@$_GET['accion'] == 'subircateg')
		$resultaop = $System->CategoriaNueva($_POST['categoria'], $_POST['categoria_padre'], $_POST['categoria_menu']);
        
        if (@$_GET['accion'] == 'subirmarca'){
                $dir_subida = '../marcas/';
                $extension = explode('.', $_FILES['imagen']['name']);
		$resultaop = $System->MarcaNueva($_POST['categoria'], $_POST['categoria_padre'], $_POST['categoria_menu'], $extension[1]);
                if($_FILES['imagen']['size'] > 0){
                    $fichero_subido = $dir_subida . $resultaop . "." . $extension[1];
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido);
                }
        }

    if (@$_GET['accion'] == 'subircategb')
		$resultaop = $System->CategoriaNuevaBlog($_POST['categoria'], $_POST['categoria2'], $_POST['categoria3'], $_POST['categoria4'], $_POST['categoria5'], $_POST['categoria6'], $_POST['categoria7'], $_POST['categoria8']);

    if (@$_GET['accion'] == 'subircategg')
		$resultaop = $System->CategoriaNuevaGaleria($_POST['categoria'], $_POST['categoria2'], $_POST['categoria3'], $_POST['categoria4'], $_POST['categoria5'], $_POST['categoria6'], $_POST['categoria7'], $_POST['categoria8']);
	
	if (@$_GET['editarcate'] != null && @$_POST['idm'] != null){
                $dir_subida = '../marcas/';
                $extension = explode('.', $_FILES['imagen']['name']);
		$resultaop = $System->ModificarCategoria($_POST['idm'], $_POST['categoria'], $_POST['categoria_padre'], $_POST['categoria_menu'], $extension[1]);
                if($_FILES['imagen']['size'] > 0){
                    $fichero_subido = $dir_subida . $_POST['idm'] . "." . $extension[1];
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido);
                    clearstatcache();
                }
        }	

    if (@$_GET['editarcateb'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ModificarCategoriaBlog($_POST['idm'], $_POST['categoria'], $_POST['categoria2'], $_POST['categoria3'], $_POST['categoria4'], $_POST['categoria5'], $_POST['categoria6'], $_POST['categoria7'], $_POST['categoria8']);

    if (@$_GET['editarcatega'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ModificarCategoriaGaleria($_POST['idm'], $_POST['categoria'], $_POST['categoria2'], $_POST['categoria3'], $_POST['categoria4'], $_POST['categoria5'], $_POST['categoria6'], $_POST['categoria7'], $_POST['categoria8']);
	
	if (@$_GET['eliminarcate'] != null)
		$resultaop = $System->CategoriaEliminar($_GET['eliminarcate']);

    if (@$_GET['eliminarcatega'] != null)
		$resultaop = $System->CategoriaGaleriaEliminar($_GET['eliminarcatega']);

    if (@$_GET['eliminarcateb'] != null)
		$resultaop = $System->CategoriaBlogEliminar($_GET['eliminarcateb']);
	
	if (@$_GET['configurar'] != null){
		$resultaop = $System->ConfiguracionModificar($_POST['empresa'], $_POST['cif'], $_POST['email'], $_POST['telefono'], $_POST['telefono2'], $_POST['fax'],
                            $_POST['horario'], $_POST['facebook'], $_POST['google'], $_POST['twitter'], $_POST['youtube'], $_POST['pinterest'], $_POST['instagram'],
                            $_POST['direccion'], $_POST['provincia'], $_POST['localidad'], $_POST['cp'], $_POST['pais'], $_POST['portesgratis'], $_POST['contrareembolso'],
                            $_POST['msgtop'], $_POST['msgbottom'], $_POST['dominio'], $_POST['imp'], $_POST['desglose'], $_POST['divisa'], $_POST['envmail'], $_POST['mailSmtp'], $_POST['passSmtp'], $_POST['puertoSmtp'], $_POST['hostSmtp'], $_POST['segSmtp'],
                        @$_POST['menu'], @$_POST['registro'], @$_POST['sesion'], $_FILES['logosup'], $_FILES['logoinf'], $_FILES['icono'], $_POST['factura'], $_POST['cestaU'], $_POST['dPedido'], $_POST['condiciones']);
        $num = $_POST['num'];
    }

    if (@$_GET['configuraridiomas'] != null)
		$resultaop = $System->IdiomasModificar($_POST['ingles'], $_POST['aleman'], $_POST['frances'], $_POST['italiano'], $_POST['portugues'], $_POST['catalan'], $_POST['ruso']);
    if (@$_GET['configurardivisas'] != null)
		$resultaop = $System->DivisasModificar($_POST['euro'], $_POST['libra'], $_POST['yen'], $_POST['dolar'], $_POST['fsuizo']);

    if (@$_GET['configurarplantilla'] != null){
		$resultaop = $System->PlantillaModificar($_POST['inicio'], $_POST['producto'], $_POST['cabecera'], $_POST['pie']);
    }

    if (@$_GET['configurarmetodos'] != null){
		$resultaop = $System->MetodosModificar($_POST['cuenta'], $_POST['bic'], $_POST['paypal'], $_POST['ccr'], $_POST['pagotienda'], $_POST['iban'], $_POST['url'], $_POST['fuc'], $_POST['ter'], $_POST['mon_tpv'], $_POST['kc'], $_POST['aplazamePuK'], $_POST['aplazamePrK']);
    }

    if (@$_GET['colorear'] != null)
		$resultaop = $System->ColoresModificar($_POST['colorgaleriamain'], $_POST['colorbotonesmain'], $_POST['colorbotoneshovermain'], $_POST['colorposbarmain'], $_POST['colorenlacemain'], $_POST['colortextomain'],
                            $_POST['colorbordeprodsmain'], $_POST['colortextoprodsmain'], $_POST['colorgeneralinicio'], $_POST['colorbotonform'], $_POST['colorbotonhoverform'], $_POST['colortextobotonform'],
                            $_POST['colorprecioprod'], $_POST['colortextoprod'], $_POST['colorprecioprods'], $_POST['colortextoordenarprods'], $_POST['colortextoprods'], $_POST['enlacesubmenuresp'],
                            $_POST['bordesubmenuhoverresp'], $_POST['fondosubmenuhoverresp'], $_POST['colorgeneralresp'], $_POST['colorgeneralprodsresp'], $_POST['colorlogotop'], $_POST['colorlogobot']);
	
	if (@$_GET['configurarblq'] != null)
		$resultaop = $System->ConfiguracionModificarBloques($_POST['bloques'][0], $_POST['bloques'][1], $_POST['bloques'][2], $_POST['bloques'][3], $_POST['bloques'][4], $_POST['bloques'][5], $_POST['bloques'][6], $_POST['bloques'][7]);
	
    // CONTADORES DEL MENÚ.
	$contadores = $System->CargarContadores();
    
	$urlact = basename($_SERVER['PHP_SELF']);
	$menusel = substr($urlact, 0, -4);
        $tutorial = $System->Ayuda($urlact);
	switch ($urlact)
	{
		case 'index.php':
			$usuarios = $System->CargarUsuarios(5);
			$paginas = $System->CargarPaginas(5);
            $carritos = $System->CargarCarrito(5);
            $facturas = $System->CargarComprasPendientesDePago(5);
            
			break;
		case 'menus.php':
			$listados = $System->CargarMenus(10000);
            $idiomas = $System->CargarIdiomas(1000000);
			if (@$_GET['editarm'] != null){
				$elemento = $System->CargarMenu($_GET['editarm']);
                $idiomasm = $System->CargarIdiomasM($_GET['editarm']);
            }
            break;
		case 'noticias.php':
            $actblog = $System->CargarActBlog();
            $actblogin = $System->CargarActBlogIn();
			$listados = $System->CargarNoticias(100, 'fecha DESC');
            $listadosCat = $System->CargarNoticiasCat(100);
            $idiomas = $System->CargarIdiomas(1000000);
			if (@$_GET['editarn'] != null){
				$elemento = $System->CargarNoticia($_GET['editarn']);
                $idiomasprod = $System->CargarIdNoticia($_GET['editarn']);
            }
			break;
		case 'facturas.php':
			$listados = $System->CargarFacturas(1000000);
			break;
		case 'compras_pendientes.php':
			$listados2 = $System->CargarComprasPendientesDePago(1000000);
			break;
		case 'transferencia.php':
			$listados2 = $System->CargarTransferencias(1000000);
			break;
		case 'contrareembolso.php':
			$listados2 = $System->CargarContrareembolsos(1000000);
			break;
		case 'detalle.php':
			$listados = $System->CargarFactura($_GET['id']);
			break;
		case 'categorias.php':
			$listadosalt = $System->CargarSCategorias(10000);
			$listados = $System->CargarCategoriasAmpliados2(10000, 0);
                        $listadosm = $System->CargarMenusCat(10000);
			if (@$_GET['editarcate'] != null)
				$elemento = $System->CargarCategoria($_GET['editarcate']);
			break;
                case 'marcas.php':
			$listadosalt = $System->CargarMarcas(10000);
			$listados = $System->CargarCategoriasAmpliados2(10000, 1);
                        $listadosm = $System->CargarMenusCat(10000);
			if (@$_GET['editarcate'] != null)
				$elemento = $System->CargarCategoria($_GET['editarcate']);
			break;
        case 'categorias_blog.php':
			$listadosalt = $System->CargarCategoriasBlog(10000);
            $idiomas = $System->CargarIdiomas(1000000);
			if (@$_GET['editarcate'] != null){
				$elemento = $System->CargarCategoriaBlog($_GET['editarcate']);
                $idiomasm = $System->CargarIdiomasCB($_GET['editarcate']);
            }
			break;
         case 'categorias_galeria.php':
			$listadosalt = $System->CargarCategoriasGaleria(10000);
            $idiomas = $System->CargarIdiomas(1000000);
			if (@$_GET['editarcate'] != null){
				$elemento = $System->CargarCategoriaGaleria($_GET['editarcate']);
                $idiomasm = $System->CargarIdiomasCG($_GET['editarcate']);
            }
			break;
		case 'packs.php':
			$listados = $System->CargarPacks(1000000);
			if (@$_GET['editarpack'] != null)
				$elemento = $System->CargarPack($_GET['editarpack']);
			break;
		case 'productos_pack.php':
			$listados = $System->CargarProductos(1000000);
			$listados2 = $System->CargarPacksProductos(@$_GET['productospack'], 1000000);
			break;
		case 'productos.php':
			$listados = $System->CargarProductos(1000000);
                        $idiomas = $System->CargarIdiomas(1000000);
                        $elemento2 = $System->CargarAtributosProds();
                        $elemento3 = $System->CargarCuotas();
			$listadosalt = $System->CargarSCategorias(10000);
                        $listadoMar = $System->CargarMarcas(10000);
                        
			if (@$_GET['editarpr'] != null){
                            $elemento = $System->CargarProducto($_GET['editarpr']);
                            $elemento22 = $System->CargarAtributoProds($_GET['editarpr']);
                            $elemento33 = $System->CargarCuotasProds($_GET['editarpr']);
                            $idiomasprod = $System->CargarIdProducto($_GET['editarpr']);
                        }
            break;
		case 'productos_distribuidores.php':
			$listados = $System->CargarProductosDistribuidores(1000000);
			break;
        case 'galeria.php':
			$listados = $System->CargarGalerias(1000000);
            $actgaleria = $System->CargarActGaleria();
            $listadosCat = $System->CargarGaleriasCat();
			break;
		case 'imagenes_productos.php':
			$listados = $System->CargarImagenesProducto($_GET['imagenespr']);
			break;
		case 'productos_relacionados.php':
			$listados = $System->CargarProductos(1000000);
			$listados2 = $System->CargarProductosRelacionados(10000);
			break;
		case 'noticias.php':
			$listados = $System->CargarNoticias(100, 'fecha DESC');
			if (@$_GET['editarn'] != null)
				$elemento = $System->CargarNoticia($_GET['editarn']);
			break;
		case 'atributoscat.php':
			$listados = $System->CargarCategoriasAtribuos(100);
			$listados2 = $System->CargarAtributos(100);
			if (@$_GET['editarcatat'] != null)
				$elemento = $System->CargarCategoriaAtribuos($_GET['editarcatat']);
			if (@$_GET['editarat'] != null)
				$elemento2 = $System->CargarAtributo($_GET['editarat']);
			break;
                case 'cuotas.php':
			$listados2 = $System->CargarCuotas(100);
			if (@$_GET['editarcuo'] != null)
				$elemento2 = $System->CargarCuota($_GET['editarcuo']);
			break;
		case 'relacion_atributos.php':
			$listados = $System->CargarProductos(1000000);
			$listados2 = $System->CargarProductosAtributos(10000);
			$listados3 = $System->CargarAtributos(1000000);
			$listados4 = $System->CargarAtributosDependencia(1000000);
			break;
		case 'descuentos.php':
            $listados = $System->CargarProductos(1000000);
			$listados2 = $System->CargarDescuentos(10000);
			break;
		case 'promocionales.php':
			$listados2 = $System->CargarPromocionales(10000);
			break;
		case 'portes.php':
			$listados2 = $System->CargarPortes(100);
			$listadosalt = $System->CargarPaises();
			break;
		case 'paginas.php':
			$listados = $System->CargarPaginas(100, 'titulo ASC', '1,0');
			if (@$_GET['editarp'] != null)
				$elemento = $System->CargarPagina($_GET['editarp']);
			break;
		case 'cursos.php':
			$listados = $System->CargarCursos(100, 'fecha DESC');
			if (@$_GET['editarc'] != null)
				$elemento = $System->CargarCurso($_GET['editarc']);
			break;
		case 'paises.php':
			$listados = $System->CargarTodosLosPaises(10000);
			break;
        case 'cat-imagen.php':
			$listados = $System->CargarImagenesCat(100);
            $listadosalt = $System->CargarCategoriasImg(10000);
			if (@$_GET['editars'] != null)
				$elemento = $System->CargarImagenCat($_GET['editars']);
			break;
		case 'sliders.php':
			$listados = $System->CargarSliders(100);
            $listados2 = $System->CargarSlidersInicio(100);
            $listadosalt = $System->CargarMenus(10000);
			if (@$_GET['editars'] != null)
				$elemento = $System->CargarSlider($_GET['editars']);
			break;
		case 'distribuidores.php':
			$listados = $System->CargarDistribuidores(100, '"A", "S", "R"');
			$listadosalt = $System->CargarProvincias();
			if (@$_GET['editardist'] != null)
				$elemento = $System->CargarDistribuidor($_GET['editardist']);
			break;
		case 'usuarios.php':
			$listados = $System->CargarUsuarios(100, '"A", "S", "R"');
			$listadosalt = $System->CargarProvincias();
			if (@$_GET['editaru'] != null)
				$elemento = $System->CargarUsuario($_GET['editaru']);
			break;
		case 'configuracion.php':
			$elemento = $System->CargarConfiguracion();
            $elemento2 = $System->CargarPlantillas();
			break;
        case 'metodospago.php':
			$elemento = $System->CargarConfiguracion();
            if(@$_GET['tpv'] == 1){
                $resultaop = $System->PeticionTPV();
                $soltpv = 1;
            }
			break;
        case 'colores.php':
			$elemento = $System->CargarColores();
			break;
        case 'plantilla.php':
			$elemento = $System->CargarPlantillas();
			break;
        case 'idiomas.php':
			$elemento = $System->CargarConfIdiomas();
			break;
        case 'divisas.php':
			$elemento = $System->CargarConfDivisas();
			break;
        case 'carrito.php':
			$listados = $System->CargarCarrito(10000);
			break;
		case 'bloques_principal.php':
			$elemento = $System->CargarConfiguracion();
			$listados = $System->CargarCategorias(10000);
			break;
	}
	
	$System->Desconectar();
?>