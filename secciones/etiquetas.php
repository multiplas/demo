<?php //Para colocar los metas correspondientes
        
    if($_GET['afiliado']){
        $nombreEmpresa = $_GET['afiliado'];
        $_SESSION['etiquetaAfil'] = $_GET['afiliado'];
    }else if ($_SESSION['etiquetaAfil'] != "")
        $nombreEmpresa = $_SESSION['etiquetaAfil'];
    else
        $nombreEmpresa = $Empresa['nombre'];
    
    if (isset($_GET['productos'])){

        echo $etiquetaDes."\n";
        echo $etiquetaTit."\n";
        echo $etiquetaRob."\n";
        echo $titul;

    }else if (isset($_GET['producto'])){

        echo $etiquetaDes."\n";
        echo $etiquetaTit."\n";
        echo $etiquetaRob."\n";
        echo $etiquetaCan."\n";
        echo $titul;

    }else if (isset($_GET['allpacks'])){

        echo '<meta name="title" content="Packs - '.$nombreEmpresa.'"/>';
        echo '<meta name="description" content="Packs de los distintos productos que estan a la venta en '.$nombreEmpresa.'"/>';
        echo '<meta name="robots" content="noodp"/>';
        echo '<title>Packs -'.$nombreEmpresa.'</title>';

    }else if (isset($_GET['pack'])){

        echo $etiquetaDes."\n";
        echo $etiquetaTit."\n";
        echo $etiquetaRob."\n";
        echo $etiquetaCan."\n";
        echo $titul;

    }else if (isset($_GET['ofertas']))
        echo '<title>Ofertas - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['buscar']))
        echo '<title>Buscador - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['pagina']) && $_GET['pagina'] !="")
        echo '<title>Articulo - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['privacidad']))
        echo '<title>Política de privacidad - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['devoluciones']))
        echo '<title>Devoluciones - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['portes']))
        echo '<title>Portes - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['blog'])){
        echo '<meta name="title" content="Blog - '.$nombreEmpresa.'"/>';
        echo '<meta name="description" content="Blog de '.$nombreEmpresa.' para consultar nuevas entradas de stock y mucho mas"/>';
        echo '<title>Blog - '.$nombreEmpresa.'</title>';
    }else if (isset($_GET['galeria']))
        echo '<title>Galería - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['contacto']))
        echo '<title>Contacto - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['cuenta']) && $_SESSION['usr'] == null)
        if ($_GET['cuenta'] == 'recovery' || $_GET['cuenta'] == 'recoverys')
        {
            echo '<title>Recuperacion contraseña - '.$nombreEmpresa.'</title>';
        }
        else
        {
            echo '<title>Iniciar sesión - Registro - '.$nombreEmpresa.'</title>';
        }
    else if (isset($_GET['finalizado']) && $_SESSION['usr'] != null)
        echo '<title>Finalizado - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['transferencia']) && $_SESSION['usr'] != null)
        echo '<title>Transferencia - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['contrareembolso']) && $_SESSION['usr'] != null)
        echo '<title>Contrareembolso - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['crearpack']))
        echo '<title>Crear pack - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['cuenta']))
        echo '<title>Mi cuenta - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['cesta']) && ($_SESSION['usr'] != null || @$_SESSION['cestases'] != null))
        echo '<title>Cesta - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['compras']) && $_SESSION['usr'] != null)
        echo '<title>Compra - '.$nombreEmpresa.'</title>';
    else if ((isset($_GET['pedido']) || isset($_GET['datos_personales']) 
            || isset($_GET['pago']) || isset($_GET['confirmacion'])) && ($_SESSION['usr'] != null || $_SESSION['cestases'] != null)
            && isset($_SESSION['compra']['paso']))
        echo '<title>Pedido - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['imprimir_fact']) && ($_SESSION['usr'] != null || $_SESSION['superad'] != null))
        echo '<title>Generar PDF - '.$nombreEmpresa.'</title>';
    else if (isset($_GET['sys_action']) && $_SESSION['usr'] != null)
    {
        if ($_GET['sys_action'] == 'realizar_pago')
            echo '<title>Plataforma - '.$nombreEmpresa.'</title>';
        else
            echo '<title>Error - '.$nombreEmpresa.'</title>';
    }else{
        echo '<meta name="title" content="'.$nombreEmpresa.'"/>';
        echo '<meta name="description" content="'.$Empresa['descripcionHTML'].'"/>';
        echo "<title>".$nombreEmpresa."</title>";
        echo "<meta property='og:image' content='".$draizp."/icono/".$Empresa['icono']."' />";
    }
        
?>