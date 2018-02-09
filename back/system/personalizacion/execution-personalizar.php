<?php
session_start();
if (isset($_POST['config_combinaciones'])) {
    require_once "../back/config_db_cms.php";
    require_once "../back/config/conectar_cms.php";
    require_once('system/personalizacion/functions-personalizar.php');

    $personalizar = new Personalizar("BD_CLIENTE");
    $set='';
    $set_colores='';
        //Línea de estilos
        if($_POST['inicio_top']!='FALSE')
            $set .= "inicio = ".$_POST['inicio_top'];
        if($_POST['productos_top']!='FALSE') {
            if($set!='')
                $set.=", ";
            $set .= " gproductos =" . $_POST['productos_top'];
        }
        if($_POST['producto_top']!='FALSE') {
            if($set!='')
                $set.=", ";
            $set .= "productos = " . $_POST['producto_top'];
        }
        if($_POST['cabecera_top']!='FALSE') {
            if($set!='')
                $set.=", ";
            $set .= "cabecera =" . $_POST['cabecera_top'];
        }
        if($_POST['pie_top']!='FALSE') {
            if($set!='')
                $set.=", ";
            $set .= "pie =" . $_POST['pie_top'];
        }

        //Colores
        if($_POST['color_fondo_menu_top']!='FALSE')
            $set_colores .= "menu = '".$_POST['color_fondo_menu_top']."'";
        if($_POST['color_letras_menu_top']!='FALSE') {
            if($set!='')
                $set_colores.=", ";
            $set_colores .= "menu_letra = '" . $_POST['color_letras_menu_top'] . "'";
        }
        if($_POST['color_pie_top']!='FALSE') {
            $set_colores.=", ";
            $set_colores .= "pie = '" . $_POST['color_pie_top'] . "'";
        }

        //páginas
        if($_POST['pg_ini_derecha_top']!='FALSE' && $_POST['pg_ini_derecha_top']=='') {
            $set_paginas1 = "url = '', contenido = '', contenido_en='', imagen = '', noticia = 0, visible = 0 ";
            $resultaop_pg1 = $personalizar->ModificarCombinacion('bd_paginas', $set_paginas1, "nombre = 'IMAGEN PRINCIPAL'");
        }
        if($_POST['pg_ini_derecha_top']!='FALSE' && $_POST['pg_ini_derecha_top']=='') {
            $set_paginas2 = "url = '', contenido = '', contenido_en='', imagen = '', noticia = 0, visible = 0  ";
            $resultaop_pg2 = $personalizar->ModificarCombinacion('bd_paginas', $set_paginas2, "nombre = 'INICIO DERECHA'");
        }
        if($_POST['pg_ini_derecha_top']!='FALSE' && $_POST['pg_ini_derecha_top']=='') {
            $set_paginas3 = "url = '', contenido = '', contenido_en='', imagen = '', noticia = 0, visible = 0  ";
            $resultaop_pg3 = $personalizar->ModificarCombinacion('bd_paginas', $set_paginas2, "nombre = 'INICIO IZQUIERDA'");
        }

        //Buscador Avanzado
        if($_POST['buscador_avanzado']!='FALSE') {
            $set_buscador = "activo = ".$_POST['buscador_avanzado'];
            $resultaop_buscador = $personalizar->ModificarCombinacion('bd_buscadoravanzado', $set_buscador, 'id = 1');
        }

        if($set!='')
            $resultaop1 = $personalizar->ModificarCombinacion('bd_configuracion', $set, 'id = 1');
        if($set_colores!='')
            $resultaop2 = $personalizar->ModificarCombinacion('bd_colores_productos', $set_colores, 'id = 1');
}
?>