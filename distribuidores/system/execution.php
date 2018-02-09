<?php
	session_start();
	require_once('system/functions.module');	
	
	$System = new MySystem();
	
	$System->ControlDeSesiones();
	$System->Conectar();
	$System->CargarEmpresa();
	
	$resultaop = false;
	$resultaop2 = false;
	
	if (@$_POST['accionad'] == 'entrar' && !$System->ExisteUsuario())
		$System->Entrar(@$_POST['usuario'], @$_POST['password']);
	
	if (@$_GET['accionad'] == 'salir')
		$System->Salir();
	
	if (@$_GET['accion'] == 'subirpack')
		$resultaop = $System->PackNuevo($_POST['nombre'], $_POST['contenido'], $_FILES['imagen'], $_POST['precio'], $_POST['iva'], $_POST['descuento']);
	
	if (@$_GET['accion'] == 'subirpr')
		$resultaop = $System->ProductoNuevo($_POST['nombre'], $_POST['contenido'], $_FILES['imagen'], $_POST['unidades'], $_POST['stock'], $_POST['precio'], $_POST['iva'], $_POST['descuento'], $_POST['descuentoe'], $_POST['peso'], $_POST['referencia'], $_POST['categoria1'], $_POST['categoria2'], $_POST['categoria3'], $_POST['categoria4'], $_POST['categoria5'], @$_POST['disponible']);
	
	if (@$_GET['accion'] == 'subirprre')
		$resultaop = $System->ProductoRelacionadoCrear($_POST['producto'], $_POST['productor']);
	
	if (@$_GET['accion'] == 'subiratrre')
		$resultaop = $System->ProductoAtributoCrear($_POST['producto'], $_POST['atributo'], $_POST['atributod'], $_POST['precio']);
	
	if (@$_GET['accion'] == 'subircatat')
		$resultaop = $System->NuevaCategoriaAtributo($_POST['atributo'], @$_POST['dependiente']);
	
	if (@$_GET['accion'] == 'subirimgpr')
		$resultaop = $System->ImagenProductoNueva($_POST['idm'], $_FILES['imagenpr']);
	
	if (@$_GET['accion'] == 'subirat')
		$resultaop2 = $System->NuevoAtributo($_POST['catea'], $_POST['atributo']);
	
	if (@$_GET['accion'] == 'subirdescu')
		$resultaop2 = $System->NuevoDescuento($_POST['cantidad'], $_POST['descuento']);
	
	if (@$_GET['accion'] == 'subirprt')
		$resultaop2 = $System->NuevoPorte($_POST['region'], $_POST['precio'], $_POST['max']);
	
	if (@$_GET['accion'] == 'subirproductospack' && @$_GET['productospack'] != null && @$_GET['productospack'] != '')
		$resultaop2 = $System->NuevoPacksProductos($_GET['productospack'], $_POST['producto1'], $_POST['producto2'], $_POST['producto3'], $_POST['producto4']);
	
	if (@$_GET['accion'] == 'subirco')
		$resultaop = $System->MenuNuevo($_POST['nombre'], ($_POST['catep'] != 'c-padre' ? $_POST['catep'] : null), @$_POST['categoria']);
	
	if (@$_GET['accion'] == 'subirnot')
		$resultaop = $System->NoticiaNueva($_POST['titulo'], $_POST['contenido'], $_FILES['imagennoticia']);
	
	if (@$_GET['accion'] == 'subircur')
		$resultaop = $System->NuevoCurso($_POST['curso'], $_POST['edicion'], $_POST['contenido'], $_POST['inicio'], $_POST['fin'], $_POST['color'], $_POST['precio']);
	
	if (@$_GET['editarat'] != null && @$_POST['idm'] != null)
		$resultaop2 = $System->ModificarAtributo($_POST['idm'], $_POST['catea'], $_POST['atributo']);
	
	if (@$_GET['editarcatat'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ModificarCategoriaAtributo($_POST['idm'], $_POST['atributo'], @$_POST['dependiente']);
	
	if (@$_GET['estadofact'] != null && @$_GET['estadof'] != null)
		$resultaop = $System->FacturaEstado($_GET['estadofact'], $_GET['estadof']);
	
	if (@$_GET['editarm'] != null && @$_POST['idm'] != null)
		$resultaop = $System->MenuModificar($_POST['idm'], $_POST['nombre'], ($_POST['catep'] != 'c-padre' ? $_POST['catep'] : null), @$_POST['categoria']);
	
	if (@$_GET['editarp'] != null && @$_POST['idm'] != null)
		$resultaop = $System->PaginaModificar($_POST['idm'], $_POST['titulo'], $_POST['contenido'], $_FILES['imagenpagina']);
	
	if (@$_GET['editarn'] != null && @$_POST['idm'] != null)
		$resultaop = $System->NoticiaModificar($_POST['idm'], $_POST['titulo'], $_POST['contenido'], $_FILES['imagennoticia']);
	
	if (@$_GET['editarpack'] != null && @$_POST['idm'] != null)
		$resultaop = $System->PackModificar($_POST['idm'], $_POST['nombre'], $_POST['contenido'], $_FILES['imagen'], $_POST['precio'], $_POST['iva'], $_POST['descuento']);
	
	if (@$_GET['editarpr'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ProductoModificar($_POST['idm'], $_POST['nombre'], $_POST['contenido'], $_FILES['imagen'], $_POST['unidades'], $_POST['stock'], $_POST['precio'], $_POST['iva'], $_POST['descuento'], $_POST['descuentoe'], $_POST['peso'], $_POST['referencia'], $_POST['categoria1'], $_POST['categoria2'], $_POST['categoria3'], $_POST['categoria4'], $_POST['categoria5'], @$_POST['disponible']);
	
	if (@$_GET['editarc'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ModificarCurso($_POST['idm'], $_POST['curso'], $_POST['edicion'], $_POST['contenido'], $_POST['inicio'], $_POST['fin'], $_POST['color'], $_POST['precio']);
	
	if (@$_GET['confirmarcontra'] != null)
		$resultaop = $System->FacturaNueva($_GET['confirmarcontra']);
	
	if (@$_GET['eliminarc'] != null)
		$resultaop = $System->CursoEliminar($_GET['eliminarc']);
	
	if (@$_GET['eliminardescu'] != null)
		$resultaop = $System->DescuentoEliminar($_GET['eliminardescu']);
	
	if (@$_GET['eliminarprt'] != null)
		$resultaop = $System->PortesEliminar($_GET['eliminarprt']);
	
	if (@$_GET['eliminarm'] != null)
		$resultaop = $System->MenuEliminar($_GET['eliminarm']);
	
	if (@$_GET['accion'] == 'subirsl')
		$resultaop = $System->SliderNuevo($_POST['texto'], $_FILES['imagenslider']);
	
	if (@$_GET['eliminars'] != null)
		$resultaop = $System->SliderEliminar($_GET['eliminars']);
	
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
		$resultaop = $System->UsuarioNuevo($_POST['nombre'], $_POST['apellidos'], $_POST['nif'], $_POST['telefono'], $_POST['email'], $_POST['calle'], $_POST['provincia'], $_POST['poblacion'], $_POST['cp'], $_POST['password']);
	
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
			$resultaop = $System->UsuarioModificar($_POST['idm'], $_POST['nombre'], $_POST['apellidos'], $_POST['nif'], $_POST['telefono'], $_POST['email'], $_POST['direccion'], $_POST['provincia'], $_POST['poblacion'], $_POST['cp'], ($_POST['password'] != '' ? $_POST['password'] : null));
	
	if (@$_GET['eliminarimgpr'] != null)
		$resultaop = $System->ImagenProductoEliminar($_GET['eliminarimgpr']);
	
	if (@$_GET['eliminar'] != null)
		$resultaop = $System->UsuarioEliminar($_GET['eliminar']);
	
	if (@$_GET['eliminarcatat'] != null)
		$resultaop = $System->CategoriaAtribuosEliminar($_GET['eliminarcatat']);
	
	if (@$_GET['eliminarat'] != null)
		$resultaop = $System->AtributoEliminar($_GET['eliminarat']);
	
	if (@$_GET['accion'] == 'subircateg')
		$resultaop = $System->CategoriaNueva($_POST['categoria'], $_FILES['imagen'], $_POST['categoria_padre']);
	
	if (@$_GET['editarcate'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ModificarCategoria($_POST['idm'], $_POST['categoria'], $_FILES['imagen'], $_POST['categoria_padre']);
	
	if (@$_GET['eliminarcate'] != null)
		$resultaop = $System->CategoriaEliminar($_GET['eliminarcate']);
	
	if (@$_GET['configurar'] != null)
		$resultaop = $System->ConfiguracionModificar($_POST['empresa'], $_POST['cif'], $_POST['email'], $_POST['telefono'], $_POST['telefono2'], $_POST['fax'],
                            $_POST['horario'], $_POST['facebook'], $_POST['google'], $_POST['twitter'], $_POST['youtube'], $_POST['pinterest'], $_POST['instagram'],
                            $_POST['direccion'], $_POST['direccion2'], $_POST['provincia'], $_POST['localidad'], $_POST['cp'], $_POST['pais'], $_POST['portesgratis'], $_POST['contrareembolso'],
                            $_POST['cuenta'], $_POST['recogida'], $_POST['paypal'], $_POST['msgtop'], $_POST['msgbottom'], $_POST['dominio']);
	
	if (@$_GET['configurarblq'] != null)
		$resultaop = $System->ConfiguracionModificarBloques($_POST['bloques'][0], $_POST['bloques'][1], $_POST['bloques'][2], $_POST['bloques'][3], $_POST['bloques'][4], $_POST['bloques'][5], $_POST['bloques'][6], $_POST['bloques'][7]);
	
    // CONTADORES DEL MENÚ.
	$contadores = $System->CargarContadores();
    
	$urlact = basename($_SERVER['PHP_SELF']);
	$menusel = substr($urlact, 0, -4);
	switch ($urlact)
	{
		case 'index.php':
			$usuarios = $System->CargarUsuarios(10);
			$paginas = $System->CargarPaginas(10);
			break;
		case 'menus.php':
			$listados = $System->CargarMenus(100);
			if (@$_GET['editarm'] != null)
				$elemento = $System->CargarMenu($_GET['editarm']);
			break;
		case 'noticias.php':
			$listados = $System->CargarNoticias(100, 'fecha DESC');
			if (@$_GET['editarn'] != null)
				$elemento = $System->CargarNoticia($_GET['editarn']);
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
			$listadosalt = $System->CargarCategorias(10000);
			$listados = $System->CargarCategoriasAmpliados(10000);
			if (@$_GET['editarcate'] != null)
				$elemento = $System->CargarCategoria($_GET['editarcate']);
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
			$listadosalt = $System->CargarCategorias(10000);
			if (@$_GET['editarpr'] != null)
				$elemento = $System->CargarProducto($_GET['editarpr']);
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
		case 'relacion_atributos.php':
			$listados = $System->CargarProductos(1000000);
			$listados2 = $System->CargarProductosAtributos(10000);
			$listados3 = $System->CargarAtributos(1000000);
			$listados4 = $System->CargarAtributosDependencia(1000000);
			break;
		case 'descuentos.php':
			$listados2 = $System->CargarDescuentos(10000);
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
		case 'sliders.php':
			$listados = $System->CargarSliders(100);
			if (@$_GET['editars'] != null)
				$elemento = $System->CargarSlider($_GET['editars']);
			break;
		case 'distribuidores.php':
			$listados = $System->CargarDistribuidores(100, '"A", "S", "R"');
			$listadosalt = $System->CargarProvincias();
			if (@$_GET['editaru'] != null)
				$elemento = $System->CargarDistribuidor($_GET['editaru']);
			break;
		case 'usuarios.php':
			$listados = $System->CargarUsuarios(100, '"A", "S", "R"');
			$listadosalt = $System->CargarProvincias();
			if (@$_GET['editaru'] != null)
				$elemento = $System->CargarUsuario($_GET['editaru']);
			break;
		case 'configuracion.php':
			$elemento = $System->CargarConfiguracion();
			break;
		case 'bloques_principal.php':
			$elemento = $System->CargarConfiguracion();
			$listados = $System->CargarCategorias(10000);
			break;
	}
	
	$System->Desconectar();
?>