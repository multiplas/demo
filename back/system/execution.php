﻿<?php
	session_start();
    require_once "../back/config_db_cms.php";
    require_once "../back/config/conectar_cms.php";
	require_once('system/functions.module');	
	
	$System = new MySystem("BD_CLIENTE");
	
	$System->ControlDeSesiones();

	$System->CargarEmpresa();
	
	$resultaop = false;
	$resultaop2 = false;
    $soltpv = 0;
    
    $basexml = '';

    ///////////////////////////////////////////
	
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
            $precio = 'precio'.$_POST['disp'][$i];
            $imagen = 'imagenAtr'.$_POST['disp'][$i];
                if($_FILES[$imagen]['size'] > 0){
                    $nombre = uniqid()."_".$_FILES[$imagen]['name'];
                }else{
                    $nombre = '';
                }
            if($_POST[$precio] == null || $_POST[$precio] == "")
                $System->ProductoNuevoAtr($_POST['disp'][$i],0,$nombre);
            else
                $System->ProductoNuevoAtr($_POST['disp'][$i],$_POST[$precio],$nombre);
            
            //Subir imagen.
            $dir_subida = '../imagenesproductosAtr/';
               
            if($_FILES[$imagen]['size'] > 0){
                    $fichero_subido = $dir_subida . $nombre;
                    move_uploaded_file($_FILES[$imagen]['tmp_name'], $fichero_subido);
            }
        }
        for($i=0;$i<count($_POST['dispEtiq']); $i++) 
        { 
            $System->ProductoEditarEtiq($_POST['dispEtiq'][$i], 0);
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
        if($_POST['precio_t_i']== '')
            $precio_t_i=0;
		$resultaop = $System->ProductoNuevo(@$_POST['ndisponible'], $_POST['nombre'], $_POST['contenido'], $_POST['nombrein'], $_POST['contenidoin'], $_POST['nombrea'], $_POST['contenidoa'], $_POST['nombref'], $_POST['contenidof'], $_POST['nombreit'], $_POST['contenidoit'], $_POST['nombrep'], $_POST['contenidop'], $_POST['nombreca'], $_POST['contenidoca'], $_POST['nombreru'], $_POST['contenidoru'], $_FILES['imagen'], $_POST['metatitulo'], $_POST['metadescripcion'], $_POST['unidades'], $_POST['stock'], $_POST['precio'], $_POST['tprecio'], $_POST['comprecio'], $_POST['iva'], $_POST['descuento'], $_POST['descuentoe'], $_POST['peso'], $_POST['referencia'], $_POST['orden'], $_POST['disponibilidad'], $_POST['plazoEnt'], $_POST['categoria'], $_POST['marca'], $_POST['paypalm'], $_POST['domicim'], $_POST['fDirecta'], $_POST['aplazame'], $_POST['caplazame'], $_POST['caplazame1'], $_POST['pagotado'], $_POST['agotado'], $_POST['tipo'], $_POST['NCatAtriF'], $_POST['nfentrada'], $_POST['nfsalida'], $_POST['mostraretq'], $_POST['mostraretqAgo'], $_POST['mostraretqOfe'], $_POST['maximoDias'], $precio_t_i);
    }
	
	if (@$_GET['accion'] == 'subirprre')
		$resultaop = $System->ProductoRelacionadoCrear($_POST['producto'], $_POST['productor']);
	
	if (@$_GET['accion'] == 'subiratrre')
		$resultaop = $System->ProductoAtributoCrear($_POST['producto'], $_POST['atributo']);
	
	if (@$_GET['accion'] == 'subircatat')
		$resultaop = $System->NuevaCategoriaAtributo($_POST['atributo'], $_POST['mensaje'], @$_POST['obligatorio'], @$_POST['obligatorio2'], @$_POST['desglosado'], @$_POST['oculto'], $_POST['contenido']);
	
	if (@$_GET['accion'] == 'subirimgpr')
		$resultaop = $System->ImagenProductoNueva($_POST['idm'], $_FILES['imagenpr']);
        
        if (@$_GET['accion'] == 'subirimgblog')
		$resultaop = $System->ImagenBlogNueva($_POST['idm'], $_FILES['imagenpr']);

        if (@$_GET['accion'] == 'subirpag')
		$resultaop = $System->PaginaNueva($_POST['titulo'], $_POST['contenido'], $_POST['titulo_en'], $_POST['contenido_en'], $_POST['titulo_al'], $_POST['contenido_al'], $_POST['titulo_fr'], $_POST['contenido_fr'], $_POST['titulo_it'], $_POST['contenido_it'], $_POST['titulo_po'], $_POST['contenido_po'], $_POST['titulo_ca'], $_POST['contenido_ca'], $_POST['titulo_ru'], $_POST['contenido_ru'], $_FILES['imagenpagina']);
	
        if (@$_GET['accion'] == 'subirenl')
		$resultaop = $System->EnlaceNuevo($_POST['nurl'], $_POST['titulo'], $_POST['pagaso'], $_POST['contenido'], $_POST['titulo_en'], $_POST['contenido_en'], $_POST['titulo_al'], $_POST['contenido_al'], $_POST['titulo_fr'], $_POST['contenido_fr'], $_POST['titulo_it'], $_POST['contenido_it'], $_POST['titulo_po'], $_POST['contenido_po'], $_POST['titulo_ca'], $_POST['contenido_ca'], $_POST['titulo_ru'], $_POST['contenido_ru'], $_FILES['imagenpagina']);
	
        if (@$_GET['accion'] == 'subirtie')
		$resultaop = $System->TiendaNueva($_POST['ntitulo'], $_POST['dtienda'], $_POST['ttienda'], $_POST['etienda'], $_POST['descripcion'], $_POST['descripcion_en'], $_POST['descripcion_al'], $_POST['descripcion_fr'], $_POST['descripcion_it'], $_POST['descripcion_po'], $_POST['descripcion_ca'], $_POST['descripcion_ru'], $_FILES['imagenpagina']);
	
	if (@$_GET['accion'] == 'subirxp')
		$resultaop = $System->ExtraNuevo($_POST['ntitulo'], $_POST['tipo']);
	
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
		$resultaop2 = $System->NuevoPorte($_POST[nombre], $_POST['gratisE'], $_POST['precioE'], $_POST['gratisC'], $_POST['precioC'], $_POST['gratisB'], $_POST['precioB'], $_POST['gratisCM'], $_POST['precioCM'], $_POST['gratisEU'], $_POST['precioEU'], $_POST['gratisI'], $_POST['precioI'], $extension[1]);
                if($_FILES['logo']['size'] > 0){
                    $fichero_subido = $dir_subida . $resultaop2 . "." . $extension[1];
                    move_uploaded_file($_FILES['logo']['tmp_name'], $fichero_subido);
                }
        }
        
        if (@$_GET['accion'] == 'subirprt2'){
                $dir_subida = '../logoskm/';
                $extension = explode('.', $_FILES['logo']['name']);
		$resultaop2 = $System->NuevoPorteKm($_POST[km], $_POST['precio'], $extension[1]);
                if($_FILES['logo']['size'] > 0){
                    $fichero_subido = $dir_subida . $resultaop2 . "." . $extension[1];
                    move_uploaded_file($_FILES['logo']['tmp_name'], $fichero_subido);
                }
        }
        
        if (@$_GET['accion'] == 'subirprt3'){
		$resultaop2 = $System->NuevoPorteProvincia($_POST['etransp'], $_POST['prov'], $_POST['precioE']);
        }
        
        if (@$_GET['accion'] == 'subirprt4'){
		$resultaop2 = $System->NuevoPorteProvinciaPeso($_POST['etransp'], $_POST['prov'], $_POST['precioE']);
        }
	
        if (@$_GET['accion'] == 'subiragen3'){
                $dir_subida = '../logosProvincias/';
                $extension = explode('.', $_FILES['logo']['name']);
		$resultaop2 = $System->NuevaAgencia($_POST['nombre'], $_POST['preciod'], $extension[1]);
                if($_FILES['logo']['size'] > 0){
                    $fichero_subido = $dir_subida . $resultaop2 . "." . $extension[1];
                    move_uploaded_file($_FILES['logo']['tmp_name'], $fichero_subido);
                }
        }
        
        if (@$_GET['accion'] == 'subiragen4'){
                $dir_subida = '../logosProvinciasP/';
                $extension = explode('.', $_FILES['logo']['name']);
		$resultaop2 = $System->NuevaAgenciaP($_POST['nombre'], $_POST['preciod'], $extension[1]);
                if($_FILES['logo']['size'] > 0){
                    $fichero_subido = $dir_subida . $resultaop2 . "." . $extension[1];
                    move_uploaded_file($_FILES['logo']['tmp_name'], $fichero_subido);
                }
        }
        
        if (@$_GET['accion'] == 'smodificarpd'){
		$resultaop2 = $System->ModificarPorteProvinciaD($_POST['idt'], $_POST['preciod']);
        }
        
        if (@$_GET['accion'] == 'smodificarpdp'){
		$resultaop2 = $System->ModificarPorteProvinciaDP($_POST['idt'], $_POST['preciod']);
        }
        
	if (@$_GET['accion'] == 'subirproductospack' && @$_GET['productospack'] != null && @$_GET['productospack'] != '')
		$resultaop2 = $System->NuevoPacksProductos($_GET['productospack'], $_POST['producto1'], $_POST['producto2'], $_POST['producto3'], $_POST['producto4']);
	
        if (@$_GET['accion'] == 'subirco')
		$resultaop = $System->MenuNuevo($_POST['nombre'], $_POST['url_enlace'], $_POST['contenido'], $_FILES['imagen'], $_POST['nombre2'], $_POST['nombre3'], $_POST['nombre4'], $_POST['nombre5'], $_POST['nombre6'], $_POST['nombre7'], $_POST['nombre8'], ($_POST['catep'] != 'c-padre' ? $_POST['catep'] : null), @$_POST['categoria']);
	
        if (@$_GET['accion'] == 'ordenarMenu'){
            $listados = $System->CargarMenus(10000);
            $resultaop = 1;
            foreach ($listados AS $listado){
                $resultaop2 = $System->MenuActualizaOrden($listado['id'], $_POST[$listado['id']]);
                if($resultaop2 == 0)
                    $resultaop = 0;
            }
        }
        
        if (@$_GET['accion'] == 'ordenarCategorias'){
            $listados = $System->CargarCategoriasAmpliados2(10000);
            $resultaop = 1;
            foreach ($listados AS $listado){
                $resultaop2 = $System->CategoriasActualizaOrden($listado['id'], $_POST[$listado['id']]);
                if($resultaop2 == 0)
                    $resultaop = 0;
            }
        }
        
	if (@$_GET['accion'] == 'subirnot')
		$resultaop = $System->NoticiaNueva($_POST['titulo'], $_POST['TitleS'], $_POST['DescriptionS'], $_POST['KeyS'], $_POST['contenido'], $_POST['titulo2'], $_POST['contenido2'], $_POST['titulo3'], $_POST['contenido3'], $_POST['titulo4'], $_POST['contenido4'], $_POST['titulo5'], $_POST['contenido5'], $_POST['titulo6'], $_POST['contenido6'], $_POST['titulo7'], $_POST['contenido7'], $_POST['titulo8'], $_POST['contenido8'], $_POST['categoria1'], $_FILES['imagennoticia'], $_FILES['imagenportada']);
	
	if (@$_GET['accion'] == 'subircur')
		$resultaop = $System->NuevoCurso($_POST['curso'], $_POST['edicion'], $_POST['contenido'], $_POST['inicio'], $_POST['fin'], $_POST['color'], $_POST['precio']);
	
	if (@$_GET['editarat'] != null && @$_POST['idm'] != null)
		$resultaop2 = $System->ModificarAtributo($_POST['idm'], $_POST['catea'], $_POST['atributo']);
        
        if (@$_GET['editarcuo'] != null && @$_POST['idm'] != null)
		$resultaop2 = $System->ModificarCuota($_POST['idm'], $_POST['nmeses']);
	
	if (@$_GET['editarcatat'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ModificarCategoriaAtributo($_POST['idm'], $_POST['atributo'], $_POST['mensaje'], @$_POST['obligatorio'], @$_POST['obligatorio2'], @$_POST['desglosado'], @$_POST['oculto'], $_POST['contenido2']);
	
	if (@$_GET['estadofact'] != null && @$_GET['estadof'] != null)
		$resultaop = $System->FacturaEstado($_GET['estadofact'], $_GET['estadof']);
        
        if (@$_GET['estadopres'] != null && @$_GET['estadop'] != null)
		$resultaop = $System->PresupuestoEstado($_GET['estadopres'], $_GET['estadop']);
        
        if (@$_GET['estadoCid'] != null && @$_GET['estadocoment'] != null)
		$resultaop = $System->ComentarioEstado($_GET['estadoCid'], $_GET['estadocoment']);
        
        if (@$_GET['estadorma'] != null && @$_GET['estador'] != null){
		$resultaop = $System->RMAEstado($_GET['estadorma'], $_GET['estador'], $_GET['Comentario']);
                header('Location: '.$draizp.'/acc/rmace/'.$_GET['estadorma']);
        }

        if (@$_GET['estadodist'] != null && @$_GET['estadodist'] != null)
		$resultaop = $System->DistribuidorEstado($_GET['estadodist']);
	
	if (@$_GET['editarm'] != null && @$_POST['idm'] != null)
		$resultaop = $System->MenuModificar($_POST['idm'], $_POST['url_enlace'], $_POST['contenido2'], $_FILES['imagen'], $_POST['nombre'], $_POST['nombre2'], $_POST['nombre3'], $_POST['nombre4'], $_POST['nombre5'], $_POST['nombre6'], $_POST['nombre7'], $_POST['nombre8'], ($_POST['catep'] != 'c-padre' ? $_POST['catep'] : null), @$_POST['categoria']);
	
	if (@$_GET['editarp'] != null && @$_POST['idm'] != null)
		$resultaop = $System->PaginaModificar($_POST['idm'], $_POST['titulo'], $_POST['url'], $_POST['destinoURL'], $_POST['contenido'], $_POST['titulo_en'], $_POST['contenido_en'], $_POST['titulo_al'], $_POST['contenido_al'], $_POST['titulo_fr'], $_POST['contenido_fr'], $_POST['titulo_it'], $_POST['contenido_it'], $_POST['titulo_po'], $_POST['contenido_po'], $_POST['titulo_ca'], $_POST['contenido_ca'], $_POST['titulo_ru'], $_POST['contenido_ru'], $_FILES['imagenpagina'], $_FILES['imagenportada']);
	
        if (@$_GET['desactivarPag'] != null)
		$resultaop = $System->DesactivarPagina($_GET['desactivarPag']);
        
        if (@$_GET['activarPag'] != null)
		$resultaop = $System->ActivarPagina($_GET['activarPag']);
        
        if (@$_GET['desactivarGE'] != null)
		$resultaop = $System->DesactivarGE();
        
        if (@$_GET['activarGE'] != null)
		$resultaop = $System->ActivarGE();
        
        if (@$_GET['editaen'] != null && @$_POST['idm'] != null)
		$resultaop = $System->EnlaceModificar($_POST['idm'], $_POST['url'], $_POST['titulo'], $_POST['pagaso'], $_POST['contenido'], $_POST['titulo_en'], $_POST['contenido_en'], $_POST['titulo_al'], $_POST['contenido_al'], $_POST['titulo_fr'], $_POST['contenido_fr'], $_POST['titulo_it'], $_POST['contenido_it'], $_POST['titulo_po'], $_POST['contenido_po'], $_POST['titulo_ca'], $_POST['contenido_ca'], $_POST['titulo_ru'], $_POST['contenido_ru'], $_FILES['imagenpagina'], $_FILES['imagenportada']);
	
        if (@$_GET['editart'] != null && @$_POST['idm'] != null)
		$resultaop = $System->TiendaModificar($_POST['idm'], $_POST['nombre'], $_POST['dtienda'], $_POST['ttienda'], $_POST['etienda'], $_POST['descripcion'], $_POST['descripcion_en'], $_POST['descripcion_al'], $_POST['descripcion_fr'], $_POST['descripcion_it'], $_POST['descripcion_po'], $_POST['descripcion_ca'], $_POST['descripcion_ru'], $_FILES['imagenpagina']);
	
	if (@$_GET['editaxp'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ExtraModificar($_POST['idm'], $_POST['nombre'], $_POST['tipo']);
	
	if (@$_GET['editarn'] != null && @$_POST['idm'] != null)
		$resultaop = $System->NoticiaModificar($_POST['idm'], $_POST['titulo'], $_POST['TitleS'], $_POST['DescriptionS'], $_POST['KeyS'], $_POST['contenido'], $_POST['titulo2'], $_POST['contenido2'], $_POST['titulo3'], $_POST['contenido3'], $_POST['titulo4'], $_POST['contenido4'], $_POST['titulo5'], $_POST['contenido5'], $_POST['titulo6'], $_POST['contenido6'], $_POST['titulo7'], $_POST['contenido7'], $_POST['titulo8'], $_POST['contenido8'], $_POST['categoria1'], $_FILES['imagennoticia'], $_FILES['imagenportada']);
	
	if (@$_GET['editarpack'] != null && @$_POST['idm'] != null)
		$resultaop = $System->PackModificar($_POST['idm'], $_POST['nombre'], $_POST['contenido'], $_FILES['imagen'], $_POST['precio'], $_POST['iva'], $_POST['descuento']);
	
	if (@$_GET['editarpr'] != null && @$_POST['idm'] != null){
            $datosI = $System->EliminarAtrs($_POST['idm']);
            $System->EliminarEtiquetas($_POST['idm']);
            for($i=0;$i<count($_POST['disp']); $i++) 
            { 
                $num = $i + 1;
                $precio = 'precio'.$_POST['disp'][$i];
                $precioE = 'precioE'.$_POST['disp'][$i];
                $imagen = 'imagenAtr_'.$_POST['disp'][$i];
                if($_FILES[$imagen]['size'] > 0){
                    $nombre = uniqid()."_".$_FILES[$imagen]['name'];
                }else{
                    $nombre = $datosI[$_POST['disp'][$i]];
                }
                if($_POST[$precio] == null || $_POST[$precio] == ""){
                    if($_POST[$precioE] == null || $_POST[$precioE] == "")
                        $System->ProductoEditarAtr($_POST['disp'][$i], $_POST['idm'], 0, 0, $nombre);
                    else
                        $System->ProductoEditarAtr($_POST['disp'][$i], $_POST['idm'], 0, $_POST[$precioE], $nombre);
                }else{
                    if($_POST[$precioE] == null || $_POST[$precioE] == "")
                        $System->ProductoEditarAtr($_POST['disp'][$i], $_POST['idm'], $_POST[$precio], 0, $nombre);
                    else
                        $System->ProductoEditarAtr($_POST['disp'][$i], $_POST['idm'], $_POST[$precio], $_POST[$precioE], $nombre);
                }
                //Subir imagen.
                $dir_subida = '../imagenesproductosAtr/';
               
                if($_FILES[$imagen]['size'] > 0){
                    $fichero_subido = $dir_subida . $nombre;
                    move_uploaded_file($_FILES[$imagen]['tmp_name'], $fichero_subido);
                }
            }
            for($i=0;$i<count($_POST['dispEtiq']); $i++) 
            { 
                $System->ProductoEditarEtiq($_POST['dispEtiq'][$i], $_POST['idm']);
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
                   
      		
		$catmod=$_POST['categoria'];
        if($_POST['precio_t_i']== '')
            $precio_t_i=0;
        else
            $precio_t_i = $_POST['precio_t_i'];
        
		$resultaop = $System->ProductoModificar($_POST['idm'], $_POST['nombre'], $_POST['contenido'], $_POST['nombre2'], $_POST['contenido2'], $_POST['nombre3'], $_POST['contenido3'], $_POST['nombre4'], $_POST['contenido4'], $_POST['nombre5'], $_POST['contenido5'], $_POST['nombre6'], $_POST['contenido6'], $_POST['nombre7'], $_POST['contenido7'], $_POST['nombre8'], $_POST['contenido8'], $_FILES['imagen'], $_POST['metatitulo'], $_POST['metadescripcion'], $_POST['unidades'], $_POST['stock'], $_POST['precio'], $_POST['tprecio'], $_POST['comprecio'], $_POST['iva'], $_POST['descuento'], $_POST['descuentoe'], $_POST['peso'], $_POST['referencia'], $_POST['disponibilidad'], $_POST['plazoEnt'], $catmod[0], $catmod[1], $catmod[2], $catmod[3], $catmod[4], $_POST['marca'], $_POST['orden'], $_POST['paypalm'], $_POST['domicim'], $_POST['fDirecta'], $_POST['aplazame'], $_POST['caplazame'], $_POST['caplazame1'], $_POST['pagotado'], $_POST['agotado'], $_POST['tipo'], $_POST['CatAtriF'], @$_POST['disponible'], $_POST['rfentrada'], $_POST['rfsalida'], $_POST['mostraretq'], $_POST['mostraretqAgo'], $_POST['mostraretqOfe'], $_POST['maximoDias'], $precio_t_i);
	}
	
	if (@$_GET['editarc'] != null && @$_POST['idm'] != null)
		$resultaop = $System->ModificarCurso($_POST['idm'], $_POST['curso'], $_POST['edicion'], $_POST['contenido'], $_POST['inicio'], $_POST['fin'], $_POST['color'], $_POST['precio']);
	
    if (@$_GET['activaru'] != null)
		$resultaop = $System->ActivarUsuario($_GET['activaru']);

    if (@$_GET['accion'] == 'actgal')
		$resultaop = $System->ActivarGaleria($_POST['galeria']);

    if (@$_GET['accion'] == 'actngal')
		$resultaop = $System->ActualizarNGaleria($_POST['ngaleria']);

    if (@$_GET['accion'] == 'actblog')
		$resultaop = $System->ActivarBlog($_POST['blog']);

    if (@$_GET['accion'] == 'actnblog')
		$resultaop = $System->CambiarNBlog($_POST['nblog']);
    
    if (@$_GET['accion'] == 'activarDes')
		$resultaop = $System->ActivarDescuentoPro($_POST['actDes']);
    
    if (@$_GET['accion'] == 'activarPreAnt')
		$resultaop = $System->ActivarPrecioAntPro($_POST['actPreAnt']);
    
    if (@$_GET['accion'] == 'activarPre')
		$resultaop = $System->ActivarPrecioPro($_POST['actPre']);

    if (@$_GET['accion'] == 'actblogin')
		$resultaop = $System->ActivarBlogIn($_POST['blogin']);
    if (@$_GET['accion'] == 'preSoli')
		$resultaop = $System->ActivarPresupuesto($_POST['preSoli']);
    if (@$_GET['accion'] == 'preRegis')
		$resultaop = $System->ActivarRegistroOblPre($_POST['preRegis']);

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
	
        if (@$_GET['eliminarprt2'] != null)
		$resultaop = $System->PortesEliminarKm($_GET['eliminarprt2']);
        
        if (@$_GET['eliminarprt3'] != null)
		$resultaop = $System->PortesEliminarProvin($_GET['eliminarprt3']);
        
        if (@$_GET['eliminarprt4'] != null)
		$resultaop = $System->PortesEliminarProvinP($_GET['eliminarprt4']);
        
        if (@$_GET['eliminartrans4'] != null)
		$resultaop = $System->PortesEliminarTransProvinP($_GET['eliminartrans4']);
        
	if (@$_GET['eliminarm'] != null)
		$resultaop = $System->MenuEliminar($_GET['eliminarm']);
	
	if (@$_GET['accion'] == 'subirsl')
		$resultaop = $System->SliderNuevo($_POST['texto'], $_POST['categoria'], $_POST['texto_en'], $_POST['texto_fr'], $_POST['texto_al'], $_POST['texto_it'], $_POST['texto_po'], $_POST['texto_ca'], $_POST['texto_ru'], $_FILES['imagenslider'], $_POST['titulo'], $_POST['urlslider'], $_POST['destinoURL']);

    if (@$_GET['accion'] == 'subiric')
		$resultaop = $System->ImagenCatNuevo($_POST['categoria'], $_FILES['imagenslider']);

    if (@$_GET['accion'] == 'subirgl')
		$resultaop = $System->GaleriaNuevo($_POST['categoria1'], $_FILES['imagengaleria'], $_POST['textog'], $_FILES['imagengaleria2'], $_POST['textog2'], $_FILES['imagengaleria3'], $_POST['textog3'], $_FILES['imagengaleria4'], $_POST['textog4'], $_FILES['imagengaleria5'], $_POST['textog5']);

    if (@$_GET['accion'] == 'feedG')
		$resultadosfeed = $System->CargarGaleriasFeed(1000000);
    
    if (@$_GET['accion'] == 'feedB')
		$resultadosfeed = $System->CargarNoticiasFeed(1000, 'fecha DESC');
    
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
        
        if (@$_GET['eliminart'] != null)
		$resultaop = $System->TiendaEliminar($_GET['eliminart']);
        
        if (@$_GET['eliminarxp'] != null)
		$resultaop = $System->ExtraEliminar($_GET['eliminarxp']);
        
        if (@$_GET['eliminarpI'] != null)
		$resultaop = $System->PaginaEliminarI($_GET['eliminarpI']);
        
        if (@$_GET['eliminartI'] != null)
		$resultaop = $System->TiendaEliminarI($_GET['eliminartI']);
	
	if (@$_GET['eliminarn'] != null)
		$resultaop = $System->NoticiaEliminar($_GET['eliminarn']);
	
	if (@$_GET['eliminarpack'] != null)
		$resultaop = $System->PackEliminar($_GET['eliminarpack']);
	
	if (@$_GET['eliminarpackb'] != null)
		$resultaop = $System->PacksProductosEliminar($_GET['eliminarpackb'], $_GET['productospack']);
	
	if (@$_GET['eliminarpr'] != null){
		$resultaop = $System->ProductoEliminar($_GET['eliminarpr']);
                $System->EliminarAtrs($_GET['eliminarpr']);
                $System->EliminarEtiquetas($_GET['eliminarpr']);
                
        }
	
	if (@$_GET['eliminarprre'] != null && @$_GET['eliminarprre2'] != null)
		$resultaop = $System->ProductoRelacionadoEliminar($_GET['eliminarprre'], $_GET['eliminarprre2']);
	
	if (@$_GET['eliminaratrre'] != null)
		$resultaop = $System->ProductoAtributoEliminar($_GET['eliminaratrre']);
	
	if (@$_GET['accion'] == 'subirus'){
		$resultaop = $System->UsuarioNuevo($_POST['nombre'], $_POST['nif'], $_POST['telefono'], $_POST['email'], $_POST['calle'], $_POST['provincia'], $_POST['poblacion'], $_POST['cp'], $_POST['password'], $_POST['rol']);
}
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
        
        if (@$_GET['solorelacionadopr'] != null)
		$resultaop = $System->ProductoVisualizado($_GET['solorelacionadopr']);
	
	if (@$_GET['destacadopr'] != null)
		$resultaop = $System->ProductoDestacado($_GET['destacadopr']);
	
	if (@$_GET['editaru'] != null && @$_POST['idm'] != null)
		if (@$_POST['password'] == @$_POST['rpassword'])
			$resultaop = $System->UsuarioModificar($_POST['idm'], $_POST['nombre'], $_POST['nif'], $_POST['telefono'], $_POST['email'], $_POST['direccion'], $_POST['provincia'], $_POST['poblacion'], $_POST['cp'], ($_POST['password'] != '' ? $_POST['password'] : null), $_POST['rol']);

        if (@$_GET['editardist'] != null && @$_POST['idm'] != null)
		if (@$_POST['password'] == @$_POST['rpassword'])
			$resultaop = $System->DistribuidorModificar($_POST['idm'], $_POST['nombre'], $_POST['apellidos'], $_POST['rs'], $_POST['nif'], $_POST['telefono'], $_POST['email'], $_POST['direccion'], $_POST['provincia'], $_POST['poblacion'], $_POST['cp'], $_POST['paypal'], ($_POST['password'] != '' ? $_POST['password'] : null));
	
	if (@$_GET['eliminarimgpr'] != null)
		$resultaop = $System->ImagenProductoEliminar($_GET['eliminarimgpr']);
        
        if (@$_GET['eliminarimgblog'] != null)
		$resultaop = $System->ImagenBlogEliminar($_GET['eliminarimgblog']);
	
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
        
        if (@$_GET['accion'] == 'subirmv')
		$resultaop = $System->MasVendidoNuevo($_POST['mv']);
        
        if (@$_GET['accion'] == 'subirnov')
		$resultaop = $System->NovedadesNuevo($_POST['mv']);
        
        if (@$_GET['accion'] == 'mvopciones')
		$resultaop = $System->MasVendidoOpciones($_POST['mv_act'], $_POST['mvmodo'], $_POST['posicion'], $_POST['textomv']);
        
        if (@$_GET['accion'] == 'novopciones')
		$resultaop = $System->NovedadesOpciones($_POST['novedades'], $_POST['novmodo'], $_POST['posicion'], $_POST['textonov']);
        
        if (@$_GET['accion'] == 'subirmarca'){
                $dir_subida = '../marcas/';
                $extension = explode('.', $_FILES['imagen']['name']);
		$resultaop = $System->MarcaNueva($_POST['categoria'], $_POST['categoria_padre'], $_POST['categoria_menu'], $extension[1]);
                if($_FILES['imagen']['size'] > 0){
                    $fichero_subido = $dir_subida . $resultaop . "." . $extension[1];
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido);
                }
        }
        
        if (@$_GET['accion'] == 'subirfichPro'){
            if($_POST['producto'] > 0 && $_POST['producto'] != ""){    
                $dir_subida = '../ficheros/'.$_POST['producto'].'/';
                if (!file_exists($dir_subida)) {
                    mkdir($dir_subida, 0777, true);
                }
                
                $c_no_v = array("á", "é", "í", "ó", "ú", "ñ", "Á", "É", "Í", "Ó", "Ú", "Ñ", "'");
                $c_val = array("a", "e", "i", "o", "u", "n", "A", "E", "I", "O", "U", "N", "");
                
                $nombre_fichero = str_replace($c_no_v, $c_val, str_replace(" ", "-", $_FILES['imagen']['name']));
		if($_FILES['imagen']['size'] > 0){
                    $fichero_subido = $dir_subida . $nombre_fichero;
                    move_uploaded_file($_FILES['imagen']['tmp_name'], $fichero_subido);
                }
                $resultaop = $System->FicheroNuevo($_POST['producto'], $_POST['nombre'], $nombre_fichero);
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
    
    if (@$_GET['eliminarficher'] != null)
		$resultaop = $System->FicheroEliminar($_GET['eliminarficher']);
    
    if (@$_GET['eliminarmv'] != null)
		$resultaop = $System->MasVendidoEliminar($_GET['eliminarmv']);
    
    if (@$_GET['eliminarnov'] != null)
		$resultaop = $System->NovedadesEliminar($_GET['eliminarnov']);

    if (@$_GET['eliminarcatega'] != null)
		$resultaop = $System->CategoriaGaleriaEliminar($_GET['eliminarcatega']);

    if (@$_GET['eliminarcateb'] != null)
		$resultaop = $System->CategoriaBlogEliminar($_GET['eliminarcateb']);
	
	if (@$_GET['configurar'] != null){
		$resultaop = $System->ConfiguracionModificar($_POST['empresa'], $_POST['compGaleria'], $_POST['cif'], $_POST['email'], $_POST['telefono'], $_POST['telefono2'], $_POST['telefono3'], $_POST['wassap'], $_POST['fax'], $_POST['mapskey'], $_POST['mapszoom'], $_POST['mapscoor'],
                            $_POST['mcatalogo'], $_POST['ordenacion'], $_POST['horario'], $_POST['facebook'], $_POST['google'], $_POST['twitter'], $_POST['youtube'], $_POST['pinterest'], $_POST['instagram'], $_POST['linkedin'], $_POST['etiqpro'], $_POST['etiqAct'], $_POST['tipoportes'],
                            $_POST['direccion'], $_POST['provincia'], $_POST['localidad'], $_POST['cp'], $_POST['pais'], $_POST['portesgratis'], $_POST['det_producto'], $_POST['com_producto'], $_POST['com_blog'], $_POST['com_galeria'], $_POST['contrareembolso'], $_POST['mgfacebook'], $_POST['mgflugar'],
                            $_POST['msgtop'], $_POST['msgbottom'], $_POST['msgdiasmax'], $_POST['dominio'], $_POST['descripcionHTML'], $_POST['vgaleria'], $_POST['imp'], $_POST['desglose'], $_POST['divisa'], $_POST['envmail'], $_POST['mailSmtp'], $_POST['passSmtp'], $_POST['puertoSmtp'], $_POST['hostSmtp'], $_POST['segSmtp'],
                        @$_POST['menu'], @$_POST['registro'], @$_POST['sesion'], @$_POST['httpsAc'], $_FILES['logosup'], $_FILES['logoinf'], $_FILES['logomenu'], $_FILES['icono'], $_FILES['imgfacebookD'], $_POST['factura'], $_POST['cestaU'], $_POST['dPedido'], $_POST['condiciones'], $_POST['nacex'], $_POST['chat'], $_POST['rma'], $_POST['rma_dias'], $_POST['rma_gastos'], $_POST['ftamano'], $_POST['pnovlateral']);
                $resultaop2 = $System->ConfiguracionModificarNacex($_POST['userN'], $_POST['passN'], $_POST['delegacionN'], $_POST['cclienteN']);
                $num = $_POST['num'];
    }

    if (@$_GET['configuraridiomas'] != null)
		$resultaop = $System->IdiomasModificar($_POST['ingles'], $_POST['aleman'], $_POST['frances'], $_POST['italiano'], $_POST['portugues'], $_POST['catalan'], $_POST['ruso']);
    if (@$_GET['configurardivisas'] != null)
		$resultaop = $System->DivisasModificar($_POST['euro'], $_POST['libra'], $_POST['yen'], $_POST['dolar'], $_POST['fsuizo']);

    if (@$_GET['configurarplantilla'] != null){
		$resultaop = $System->PlantillaModificar($_POST['inicio'], $_POST['efecto'], $_POST['CFefecto'], $_POST['CLefecto'], $_POST['productos'], $_POST['producto'], $_POST['cabecera'], $_POST['pie'], $_FILES['fcabecera']);
    }

    if (@$_GET['configurarmetodos'] != null){
		$resultaop = $System->MetodosModificar($_POST['cuenta'], $_POST['bic'], $_POST['paypal'], $_POST['ippaypal'], $_POST['ifpaypal'], $_POST['ccr'], $_POST['pagotienda'], $_POST['iban'], $_POST['url'], $_POST['fuc'], $_POST['ter'], $_POST['mon_tpv'], $_POST['kc'], $_POST['aplazamePuK'], $_POST['aplazamePrK']);
    }

    if (@$_GET['colorear'] != null)
		$resultaop = $System->ColoresModificar($_POST['colorgaleriamain'], $_POST['colorbotonesmain'], $_POST['colorbotoneshovermain'], $_POST['colorposbarmain'], $_POST['colorenlacemain'], $_POST['colortextomain'],
                            $_POST['colorbordeprodsmain'], $_POST['colortextoprodsmain'], $_POST['colorgeneralinicio'], $_POST['colorbotonform'], $_POST['colorbotonhoverform'], $_POST['colortextobotonform'],
                            $_POST['colorprecioprod'], $_POST['colortextoprod'], $_POST['colorprecioprods'], $_POST['colortextoordenarprods'], $_POST['colortextoprods'], $_POST['enlacesubmenuresp'],
                            $_POST['bordesubmenuhoverresp'], $_POST['fondosubmenuhoverresp'], $_POST['colorgeneralresp'], $_POST['colorgeneralprodsresp'], $_POST['colorlogotop'], $_POST['colorlogobot'], 
                            $_POST['oferta_fondo'], $_POST['oferta_letra'], $_POST['precio_color'], $_POST['nombre_color'], $_POST['nombre_color_hover'], $_POST['boton_fondo'], $_POST['boton_letras'], $_POST['boton_fondo_hover'], $_POST['boton_letras_hover'],
                            $_POST['barra_sup'], $_POST['menu'], $_POST['menu_letra'], $_POST['menu_letra_hover'], $_POST['pie'], $_POST['pie_letras'], $_POST['venta_fondo'], $_POST['alquiler_fondo'], $_POST['agotado_fondo'], $_POST['AnaCestaB'], $_POST['AnaCestaT'], $_POST['AnaCestaBH'], $_POST['AnaCestaTH'],
                            $_POST['colordestacado']);

    if (@$_GET['fuentesG'] != null)
        $resultaop = $System->FuentesModificar($_POST['fprinc'], $_POST['fsecun']);
    
    if (@$_GET['CabeceraPie'] != null)
        $resultaop = $System->ModificarCabeceraPie($_POST['cabecera'], $_POST['pie']);
    
    if (@$_GET['menspub'] != null)
        $resultaop = $System->MensajePModificar($_POST['actanu'], $_POST['enlvid'], $_POST['anchvid'], $_POST['luganu']);
    if($_GET['cambprocess'] != null)    
        $resultaop = $System->ProcesoCompraModificar($_POST['p_compra_type']);
    if($_GET['cambfilter'] != null)    
        $resultaop = $System->FiltroProductosModificar($_POST['p_filter']);
    if($_GET['bloqueobarra'] != null)    
        $resultaop = $System->BloqueoBarraModificar($_POST['b_bar']);
    if($_GET['hiddenproduct'] != null)    
        $resultaop = $System->OcultarMostrarProductos($_POST['p_hidden']);   
    if($_GET['cambcopy'] != null)    
        $resultaop = $System->AddFooterCopyright($_POST['p_footer_copyright'], $_POST['p_footer_copyright_text'], $_POST['color_barra'], $_POST['color_texto']);        
    if($_GET['cambbloq'] != null)    
        $resultaop = $System->AddBloqsInfo($_POST['p_bloque1'], $_POST['p_bloque1_text'], $_POST['p_bloque1_color'], $_POST['p_bloque2_text'], $_POST['p_bloque2_color'], $_POST['p_bloque1_color_texto'], $_POST['p_bloque2_color_texto']);        
    if (@$_GET['configurarblq'] != null)
                $resultaop = $System->ConfiguracionModificarBloques($_POST['bloques'][0], $_POST['bloques'][1], $_POST['bloques'][2], $_POST['bloques'][3], $_POST['bloques'][4], $_POST['bloques'][5], $_POST['bloques'][6], $_POST['bloques'][7]);
        
    if (@$_GET['configurarnacex'] != null){
		$resultaop = $System->EnvíoNacex($_POST['id_fact'], $_POST['tservicio'], $_POST['tcobro'], $_POST['tenvio'], $_POST['bultos'], $_POST['kilos'], $_POST['envase'], $_POST['vrecogida'], $_POST['nombreE'], $_POST['direccionE'], $_POST['cpE'], $_POST['localidadE'], $_POST['telefonoE'], $_POST['paisE'], $_POST['Contenido'], $_POST['vdeclarado']);
    }
    
    if (@$_GET['IconosR'] != null){
                $dir_subida = '../iconosRedes/';
		$fc = false; $tw = false; $gp = false; $pi = false; $in = false; $yt = false;
                if($_FILES['facebook']['size'] > 0){
                    $extension = explode('.', $_FILES['facebook']['name']);
                    $fichero_subido = $dir_subida . "facebook." . $extension[1];
                    move_uploaded_file($_FILES['facebook']['tmp_name'], $fichero_subido);
                    $fc = $extension[1];
                }
                if($_FILES['twitter']['size'] > 0){
                    $extension = explode('.', $_FILES['twitter']['name']);
                    $fichero_subido = $dir_subida . "twitter." . $extension[1];
                    move_uploaded_file($_FILES['twitter']['tmp_name'], $fichero_subido);
                    $tw = $extension[1];
                }
                if($_FILES['gplus']['size'] > 0){
                    $extension = explode('.', $_FILES['gplus']['name']);
                    $fichero_subido = $dir_subida . "gplus." . $extension[1];
                    move_uploaded_file($_FILES['gplus']['tmp_name'], $fichero_subido);
                    $gp = $extension[1];
                }
                if($_FILES['pinterest']['size'] > 0){
                    $extension = explode('.', $_FILES['pinterest']['name']);
                    $fichero_subido = $dir_subida . "pinterest." . $extension[1];
                    move_uploaded_file($_FILES['pinterest']['tmp_name'], $fichero_subido);
                    $pi = $extension[1];
                }
                if($_FILES['instagram']['size'] > 0){
                    $extension = explode('.', $_FILES['instagram']['name']);
                    $fichero_subido = $dir_subida . "instagram." . $extension[1];
                    move_uploaded_file($_FILES['instagram']['tmp_name'], $fichero_subido);
                    $in = $extension[1];
                }
                if($_FILES['youtube']['size'] > 0){
                    $extension = explode('.', $_FILES['youtube']['name']);
                    $fichero_subido = $dir_subida . "youtube." . $extension[1];
                    move_uploaded_file($_FILES['youtube']['tmp_name'], $fichero_subido);
                    $yt = $extension[1];
                }
                if($_FILES['linkedin']['size'] > 0){
                    $extension = explode('.', $_FILES['linkedin']['name']);
                    $fichero_subido = $dir_subida . "linkedin." . $extension[1];
                    move_uploaded_file($_FILES['linkedin']['tmp_name'], $fichero_subido);
                    $lk = $extension[1];
                }
                $resultaop2 = $System->GuardarIconos($fc, $tw, $gp, $pi, $in, $yt, $lk);
    }
    
    if (@$_GET['EIR'] != null){
            $resultaop2 = $System->EliminarIconoRed($_GET['EIR']);
    }
    
    if (@$_GET['cestaConfig'] != null){
                $dir_subida = '../iconos/';
		$trans = false; $promo = false;
                if($_FILES['itransporte']['size'] > 0){
                    $extension = explode('.', $_FILES['itransporte']['name']);
                    $fichero_subido = $dir_subida . "transporte." . $extension[1];
                    move_uploaded_file($_FILES['itransporte']['tmp_name'], $fichero_subido);
                    $trans = "transporte." . $extension[1];
                }
                if($_FILES['ipromocion']['size'] > 0){
                    $extension = explode('.', $_FILES['ipromocion']['name']);
                    $fichero_subido = $dir_subida . "promocion." . $extension[1];
                    move_uploaded_file($_FILES['ipromocion']['tmp_name'], $fichero_subido);
                    $promo = "promocion." . $extension[1];
                }
            $resultaop2 = $System->ModificarCesta($_POST['etiqProCesta'], $_POST['filaAtrCesta'], $_POST['mmcesta'], $trans, $promo);
    }

    if (@$_GET['buscadorConfig'] != null){
               
            $resultaop2 = $System->Modificarbuscador($_POST['etiqProCesta']);
    }


    
    if (@$_GET['pedidoConfig'] != null){
        $resultaop2 = $System->ModificarPedido($_POST['permBor'], $_POST['permCant']);
    }
    
    if(@$_GET['pagosConfig'] != null){
        $resultaop2 = $System->ModificarPagos($_POST['paypal'], $_POST['tpv'], $_POST['transfe'], $_POST['contra'], $_POST['domi'], $_POST['tienda'], $_POST['aplaza']);
    }
    
    if (@$_GET['accion'] == 'subiretiqueta')
		$resultaop = $System->EtiquetaNueva($_POST['netiqueta']);
    
    if (@$_GET['editaretiqueta'] != null && @$_POST['idm'] != null){
        $resultaop = $System->ModificarEtiqueta($_POST['idm'], $_POST['etiquetaE']);
    }
    
    if (@$_GET['eliminaretiqueta'] != null)
		$resultaop = $System->EtiquetaEliminar($_GET['eliminaretiqueta']);
    
    if(@$_GET['subirprePDF'] > 0){
        if($_FILES['presupuestoPDF']['size'] > 0){
            $dir_subida = '../presupuestos/';
            $extension = explode('.', $_FILES['presupuestoPDF']['name']);
            $nombreP =  "Presupuesto_". date("Ymd") . "_" . $_GET['subirprePDF'] . "." . $extension[1];
            $fichero_subido = $dir_subida . $nombreP;
            move_uploaded_file($_FILES['presupuestoPDF']['tmp_name'], $fichero_subido);
            $resultaop = $System->SubirPrespuestoPDF($_GET['subirprePDF'], $nombreP);
        }        
    }
    
    if(@$_GET['EnviarPresuPDF'] > 0){
        $resultaop = $System->EnviarPrespuestoPDF($_GET['EnviarPresuPDF']);
    }
    
    if (@$_GET['megamenuConfig'] != null){
        $resultaop2 = $System->ModificarMM($_POST['MM_anchoMax'], $_POST['MM_fondo'], $_POST['MM_divisiones'], $_POST['MM_colores'], $_POST['MM_despliegue'], $_POST['Napartados']);
    }
    
    if (@$_GET['borrarFondo'] != null){
        $resultaop2 = $System->EliminarImgFondo();
    }
    
    if (@$_GET['borrarLogo'] != null){
        $resultaop = $System->EliminarLogo($_GET['borrarLogo']);
    }
    
    if (@$_GET['accion'] == 'tipomegablog'){
		$resultaop = $System->CambiarMMBlog($_POST['MM_blog']);
    }

	if (@$_GET['accion'] == 'subirmultiproducto'){
        if($_POST['categoria1'] > 0){
            for($i=1; $i<=10; $i++){
                $cadena = "nombre".$i;
                $cadena2 = "precio".$i;
                $cadena3 = "referencia".$i;
                if($_POST[$cadena] != ''){
                    $resultaop = $System->SubirProductoRapido($_POST[$cadena], $_POST[$cadena2], $_POST[$cadena3], $_POST['categoria1']);
                }
            }
        }
    }
	//Llamadas Google Merchant
	//Editar la asociación de categoría de la tienda con categoría Merchant
	if (@$_GET['editarcatmerchant'] != null && @$_POST['id'] != null){
		$resultaop = $System->ModificarCatMerchant($_POST['id'], $_POST['idcatmerchant']);
        }
	//Editar la asociación de envío de la tienda con envío Merchant
	if (@$_GET['editarenvmerchant'] != null && @$_POST['id'] != null){
		$resultaop = $System->ModificarEnvMerchant($_POST['id'], $_POST['textomerchant']);
        }
	//Llamadas Google Merchant - END
	//---------------------------------::
	
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
			
        case 'csv.php':
			$resultaop2 = $System->CrearCSVProductos();
			break;
		
		// Carga Google Merchant
		case 'merchant.php':
			if (@$_GET['cargartipos'] != null){
				$resultadocargaenv = $System->ImportarEnviosMerchant();
            }
			if (@$_GET['cargarcats'] != null){
				$resultadocargaenv = $System->ImportarCatsMerchant();
            }
			$resultaop2 = $System->CrearTXTProductos();
			$listados_cat_mer = $System->CargarCategoriasMerchant(10000);
			$listadocatsmerchant = $System->CargarCatsMerchant();
			$listados_env_mer = $System->CargarEnviosMerchant(10000);
			break;
			
		case 'menus.php':
			$listados = $System->CargarMenus(10000);
            $idiomas = $System->CargarIdiomas(1000000);
			if (@$_GET['editarm'] != null){
				$elemento = $System->CargarMenu($_GET['editarm']);
                $idiomasm = $System->CargarIdiomasM($_GET['editarm']);
            }
            break;
            case 'menus_orden.php':
			$listados = $System->CargarMenus(10000);
            break; 
            case 'noticias.php':
                    $nombre = $System->CargarNombreBlog();
            $actblog = $System->CargarActBlog();
            $actblogin = $System->CargarActBlogIn();
            $configuracionP = $System->CargarPlantillas();
			$listados = $System->CargarNoticias(100, 'fecha DESC');
            $listadosCat = $System->CargarNoticiasCat(100);
            $idiomas = $System->CargarIdiomas(1000000);
			if (@$_GET['editarn'] != null){
				$elemento = $System->CargarNoticia($_GET['editarn']);
                $idiomasprod = $System->CargarIdNoticia($_GET['editarn']);
            }
			break;
                case 'masvendidos.php':
                        $listados = $System->CargarMasVendidos(10000);
                        $listadosalt = $System->CargarProductos(1000000);
                        $elemento = $System->CargarConfiguracion();;
                        break;
                case 'novedades.php':
                        $listados = $System->CargarNovedades(10000);
                        $listadosalt = $System->CargarProductos(1000000);
                        $elemento = $System->CargarConfiguracion();;
                        break;
		case 'facturas.php':
			$listados = $System->CargarFacturas(1000000);
                        $nacesSN = $System->NacexSiNo();
			break;
                case 'comentarios.php':
			$listados = $System->CargarComentarios(1000000);
			break;
                case 'rma.php':
			$listados = $System->CargarRMA(1000000);
			break;
                case 'nacex.php':
                        $listados = $System->CargarFacturaNacex($_GET['id']);
                        $elemento = $System->CargarConfiguracion();
                        $estado = $System->CargarEstadoNacex($_GET['id']);
                        $datos = $System->DatosNacex();
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
                        $listado2 = $System->CargarExtrasPedido($_GET['id']);
			break;
                case 'detalle_rma.php':
			$listados = $System->CargarRMA2($_GET['id']);
			break;
                case 'etiquetas.php':
			$listados = $System->CargarEtiquetas(10000);
                        if (@$_GET['editaretiqueta'] != null)
				$elemento = $System->CargarEtiqueta($_GET['editaretiqueta']);
			break;
		case 'categorias.php':
			$listadosalt = $System->CargarSCategorias(10000);
			$listados = $System->CargarCategoriasAmpliados2(10000, 0);
                        $listadosm = $System->CargarMenusCat(10000);
			if (@$_GET['editarcate'] != null)
				$elemento = $System->CargarCategoria($_GET['editarcate']);
			break;
                case 'categorias_orden.php':
			$listados = $System->CargarCategoriasAmpliados2(10000);
                        break; 		
                case 'ficherosProd.php':
			$listados = $System->CargarFichProd(10000);
                        $productos = $System->CargarProductos(1000000);
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
        case 'productos-new.php':
        case 'productos-edit.php':
		case 'productos.php':
			$listados = $System->CargarProductos(1000000);
                        $idiomas = $System->CargarIdiomas(1000000);
                        $elemento2 = $System->CargarAtributosProds();
                        $elemento3 = $System->CargarCuotas();
                        $elemento4 = $System->CargarEtiquetasProds();
                        //$listadosalt = $System->CargarCategoriasPadre(10000);
						$listadosalt = $System->CargarCategorias(10000);
						$listadosCateg2 = $System->CargarSCategorias2(10000);
                        $listadosaltHj = $System->CargarCategoriasHijos(10000);
                        $listadoMar = $System->CargarMarcas(10000);
                        $listadoCatAtr = $System->CargarCategoriasAtribuos(100);
                        
			if (@$_GET['editarpr'] != null){
                            $elemento = $System->CargarProducto($_GET['editarpr']);
                            $elemento22 = $System->CargarAtributoProds($_GET['editarpr']);
                            $elemento33 = $System->CargarCuotasProds($_GET['editarpr']);
                            $elemento44 = $System->CargarEtiquetaProds($_GET['editarpr']);
                            $idiomasprod = $System->CargarIdProducto($_GET['editarpr']);
                        }
                        break;
                case 'productosrapido.php':
                        $listadosalt = $System->CargarSCategorias(10000);
                        break;
                case 'productos_opc.php':
                    $config = $System->CargarConfiguracion();
                    break;
                case 'visualizacion.php':
			$listados = $System->CargarProductos(1000000);
                        $idiomas = $System->CargarIdiomas(1000000);
                        $elemento2 = $System->CargarAtributosProds();
                        $elemento3 = $System->CargarCuotas();
			$listadosalt = $System->CargarSCategorias(10000);
                        $listadoMar = $System->CargarMarcas(10000);
                        $listadoCatAtr = $System->CargarCategoriasAtribuos(100);
                        
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
			$listados = $System->CargarGalerias();
                        $actgaleria = $System->CargarActGaleria();
                        $listadosCat = $System->CargarGaleriasCat();
                        $nombre = $System->CargarNombreGalería();
			break;
                case 'presupuestos.php':
			$listados = $System->CargarPresupuestos(1000000);
                        $presuopc = $System->CargarActPresupuestos();
			break;
		case 'imagenes_productos.php':
			$listados = $System->CargarImagenesProducto($_GET['imagenespr']);
			break;
                case 'imagenes_blog.php':
			$listados = $System->CargarImagenesBlog($_GET['imagenesblog']);
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
			$listados = $System->CargarCategoriasAtribuos(1000);
			$listados2 = $System->CargarAtributos(1000);
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
		case 'portes2.php':
			$listados2 = $System->CargarPortesKm(100);
			break;
                case 'portes3.php':
			$listados2 = $System->CargarPortesProvincias();
                        $listados3 = $System->CargarPortesProvinciasDefecto();
                        $listadoempresas = $System->CargarATransp();
                        $listadosprovincias = $System->CargarProvincias2();
                        if (@$_GET['modificaridt'] != null)
				$elemento = $System->CargarPortesI($_GET['modificaridt']);
			break;
                case 'portes4.php':
			$listados2 = $System->CargarPortesProvinciasPeso();
                        $listados3 = $System->CargarPortesProvinciasPesoDefecto();
                        $listadoempresas = $System->CargarATranspP();
                        $listadosprovincias = $System->CargarProvincias2();
                        if (@$_GET['modificaridtp'] != null)
				$elemento = $System->CargarPortesIP($_GET['modificaridtp']);
			break;
                case 'paginas.php':
                        $GE = $System->estadoGE();
			$listados = $System->CargarPaginas(100, 'titulo ASC', '1,0');
                        $listadosalt = $System->CargarPaginas2(100, 'titulo ASC', '1,0');
                        $elementoI = $System->CargarConfIdiomas();
			if (@$_GET['editarp'] != null)
				$elemento = $System->CargarPagina($_GET['editarp']);
                        if (@$_GET['editaen'] != null)
				$elemento = $System->CargarEnlace($_GET['editaen']);
			break;
                case 'tiendas.php':
			$listados = $System->CargarTiendas(100, 'id ASC');
			if (@$_GET['editart'] != null)
				$elemento = $System->CargarTienda($_GET['editart']);
			break;
                case 'extrasPedido.php':
			$listados = $System->CargarExtras(1000, 'id ASC');
			if (@$_GET['editarxp'] != null)
				$elemento = $System->CargarExtra($_GET['editarxp']);
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
                        $elemento = $System->CargarConfIdiomas();
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
			$listadoRoles = $System->CargarRoles();
			if (@$_GET['editaru'] != null)
				$elemento = $System->CargarUsuario($_GET['editaru']);

			
			break;
		case 'intentoRegistro.php':
			$listados = $System->CargarIntentos(10000);
			break;
		case 'configuracion.php':
			$elemento = $System->CargarConfiguracion();
                        $elemento2 = $System->CargarPlantillas();
                        $elemento3 = $System->CargarNacex();
			break;
                case 'cesta.php':
			$elemento = $System->CargarConfiguracion();
                case 'pedido.php':
			$elemento = $System->CargarConfiguracion();
                case 'pagos.php':
			$elemento = $System->CargarConfiguracion();
                case 'cabpie.php':
			$elemento = $System->CargarConfiguracion();
                case 'iconosRedes.php':
			$elemento = $System->CargarConfiguracion();
        case 'metodospago.php':
			$elemento = $System->CargarConfiguracion();
            if(@$_GET['tpv'] == 1){
                $resultaop = $System->PeticionTPV();
                $soltpv = 1;
            }
			break;
        case 'colores.php':
			$elemento = $System->CargarColores();
                        $elemento2 = $System->CargarColores2();
			break;
        case 'fuentes.php':
			$elemento = $System->CargarFuentes();
			break;
        case 'mensaje_publicitario.php':
			$elemento = $System->CargarMensaje();
            break;
        case 'cambiar_proceso_compra.php':
			$elemento = $System->CargarProcesosCompra();
            break;
        case 'footer_copyright_bar.php':
			$elemento = $System->CargarFooterCopyrightBar();
            break;
        case 'ocultar_productos.php':
			$elemento = $System->CargarProductosMostrados();
            break;                
        case 'buscador.php':
			$elemento = $System->CargarBuscadorStatus();
            break;
        case 'activar_filtro_productos.php':
			$elemento = $System->CargarFilterStatus();
            break;
        case 'activar_bloques.php':
			$elemento = $System->CargarBloquesStatus();
            break;
        case 'bloqueo_barra.php':
			$elemento = $System->CargarBarraStatus();
            break;
        case 'plantilla.php':
			$elemento = $System->CargarPlantillas();
                        $inicios = $System->CargaPosibilidades('inicio');
                        $productos = $System->CargaPosibilidades('productos');
                        $producto = $System->CargaPosibilidades('producto');
                        $cabecera = $System->CargaPosibilidades('cabecera');
                        $pie = $System->CargaPosibilidades('pie');
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
        case 'megaMenu.php':
			$elemento = $System->CargarPlantillas();
			break;
        
	}
	

?>