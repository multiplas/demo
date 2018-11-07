<script>
    $(document).ready(function(){
    });
</script>
    <style>
        @import url(http://fonts.googleapis.com/css?family=Istok+Web);
        @keyframes slidy {
            0% { left: 0%; }
            25% { left: 0%; }
            30% { left: -100%; }
            55% { left: -100%; }
            60% { left: -200%; }
            85% { left: -200%; }
            100% { left: -400%; }
        }
        div#captioned-gallery {
        width: 100%;
        overflow: hidden;
        }
        figure { margin: 0; }
        figure.slider {
            position: relative;
            width: 500%;
            font-size: 0;
            animation: 25s slidy infinite; 
        }
        figure.slider figure { 
            width: 20%;
            height: auto;
            display: inline-block;
            position: inherit; 
        }
        figure.slider img {
        width: 100%;
        height: auto;
        }
        figure.slider figure figcaption {
            position: absolute;
            bottom: 0;
            background: rgba(0,0,0,0.3);
            color: #fff;
            width: 100%;
            font-size: 2rem;
            padding: .6rem;
            text-align: center;
        }
        .contact-bar .logos_sociales{
            float: right;
            padding-top: 5px;
        }
        .subscribe-text{
            padding-top: 5px;
        }

        @media screen and (max-width: 500px) { 
        figure.slider figure figcaption {
            font-size: 1.2rem;
        }


    }

    /* Estilo personalizado plantilla 17 */

    .imagenes-panel-derecho ul{
        list-style: none;
    }

    .imagenes-panel-derecho li {
        margin: 0 0px 10px 0px;
        max-height: 130px;
        max-width: 300px;
        overflow: hidden;
    }


    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 cabecera-slider">
                <?php 
                include_once './sistema/mod_varios.php';//Necesario para mostrar las categorias en bloque
            
                if (count($sliders) > 0) { 
                    include_once('./componentes/slider3.php'); 
                } ?>
            </div>
            <div class="col-sm-4 imagenes-panel-derecho">
                <ul>
                    <li>
                        <?php if(empty($direccionImageSuperior)): ?>
                            <img src="<?=$urlImageSuperior?>" alt="">
                        <?php else: ?>
                            <a href="<?=$direccionImageSuperior?>"><img src="<?=$urlImageSuperior?>" alt=""></a>
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if(empty($direccionImageMedio)): ?>
                            <img src="<?=$urlImageMedio?>" alt="">
                        <?php else: ?>
                            <a href="<?=$direccionImageMedio?>"><img src="<?=$urlImageMedio?>" alt=""></a>
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if(empty($direccionImageInferior)): ?>
                            <img src="<?=$urlImageInferior?>" alt="">
                        <?php else: ?>
                            <a href="<?=$direccionImageInferior?>"><img src="<?=$urlImageInferior?>" alt=""></a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>    
    </div>
    <!-- Empieza el contenido  -->
    <div id="contenido" >
    <style>
        @media (max-width:940px)
        {

            .publicacion {
                width: auto !important;
                margin: 0 !important;
                margin-bottom: 3% !important;
                display: block !important;
            }
        }
    </style>
    <div class="container contenido-tema-container">
    <div id="vistazo-rapido-container">
        
    </div>
    <?php
    $resultado = categoryBloqStatus();
    if(!is_null($resultado) && $resultado['valor'] == 1) //Esta activado
        include_once('./temas/16/bloques/categorias.php');           //Comento lo de abajo 
    ?>
    <!-- PRODUCTOS MAS VENDIDOS -->
    <div class="row">
        <h3 class="col-sm-12 text-center top-ventas-titulo" style="color: <?=$principalColors['colordestacado']?> "> 
        <?php if(empty($direccionMasVendidos)): ?>
            <img src="<?=$urlIconoMasVendidos?>" alt="">
        <?php else: ?>
            <a href="<?=$direccionMasVendidos?>"><img src="<?=$urlIconoMasVendidos?>" alt=""></a>
        <?php endif; ?>
        
        LOS MÁS VENDIDOS</h3>
    <?php
    if($Empresa['mvmodo'] == 0)
        $ultimosProductos = ProductosConCriterio(8,'ventas');
    else
        $ultimosProductos = ProductosMasVendidosM(8);
    
    foreach($ultimosProductos as $producto){
        $productoNombreUrl = str_replace(' ','-',strtolower($producto['nombre']));
        $productoNombreUrl = utf8_encode($productoNombreUrl);
        $productoNombreUrl = strtolower($productoNombreUrl);
        $productoNombreUrl = preg_replace('([^A-Za-z0-9])', '-', $productoNombreUrl);	  
        $urlProducto = $draizp.'/'.'producto/'.$producto['id'].'/'.$productoNombreUrl.'/';
        $urlImagen = $draizp.'/'.'imagenesproductos/'.$producto['imagen'];
        ?>
        <div class="col-sm-3 single-product">
            <div class="imagen-producto text-center">
                <a href="<?=$urlProducto?>">
                    <img class="img-responsive" src="<?=$urlImagen?>" alt=""/>
                </a>
                <div class="interaccion">
                    <div class="ver-mas-img btn btn-primary estado-inicial"><a href="<?php echo str_replace(' ','-',$urlProducto)?>">Ver más</a></div>
                    <form action="<?=$draizp?>/acc/anadir/<?=$producto['id']?>" method="post">
                        <button type="submit" data-product="<?=$producto['id']?>" class="vistazo-rapido estado-inicial btn btn-success">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="product-info">
                <div class="titulo-producto">
                    <h4><?=$producto['nombre']?></h4>
                </div>
                <div class="descripcion-producto">
                    <?=trim(strip_tags( $producto['descripcion']))?>
                </div>
                <?php if(number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio_ant']), 2, ',', '.') != number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')): ?>
                <div class="product-price product-old">Antes:  <span style="text-decoration: line-through;"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio_ant']), 2, ',', '.')?> <?=$producto['precio_ant'] > 0 ? $_SESSION['moneda'] : ''?><?=$producto['precio_ant'] == 'Consultar' ? $producto['precio_ant']: ''?></span></div>
                <?php endif; ?>
                <div class="product-price"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')?> <?=$producto['precio'] > 0 ? $_SESSION['moneda'] : ''?><?=$producto['precio'] == 'Consultar' ? $producto['precio']: ''?></div>
            </div>
        </div>

    <?php
    }
    ?>
    </div>
    <!-- ULTIMAS NOVEDADES -->
    <div class="row">
        <h3 class="col-sm-12 text-center top-ventas-titulo" style="color: <?=$principalColors['colordestacado']?> ">
        <?php if(empty($direccionNovedades)): ?>
            <img src="<?=$urlIconoNovedades?>" alt="">
        <?php else: ?>
            <a href="<?=$direccionNovedades?>"><img src="<?=$urlIconoNovedades?>" alt=""></a>
        <?php endif; ?>
        ÚLTIMAS NOVEDADES DE LA COLECCIÓN</h3>
    <?php
    $ultimosProductos = ProductosConCriterio(8,'novedades');
    foreach($ultimosProductos as $producto){
        $productoNombreUrl = str_replace(' ','-',strtolower($producto['nombre']));
        $productoNombreUrl = utf8_encode($productoNombreUrl);
        $productoNombreUrl = strtolower($productoNombreUrl);
        $productoNombreUrl = preg_replace('([^A-Za-z0-9])', '-', $productoNombreUrl);	  
        $urlProducto = $draizp.'/'.'producto/'.$producto['id'].'/'.$productoNombreUrl.'/';
        $urlImagen = $draizp.'/'.'imagenesproductos/'.$producto['imagen'];
        ?>
        <div class="col-sm-3 single-product">
            <div class="imagen-producto text-center">
                <a href="<?=$urlProducto?>">
                    <img class="img-responsive" src="<?=$urlImagen?>" alt=""/>
                </a>
                <div class="interaccion">
                    <div class="ver-mas-img btn btn-primary estado-inicial"><a href="<?php echo str_replace(' ','-',$urlProducto)?>">Ver más</a></div>
                    <form action="<?=$draizp?>/acc/anadir/<?=$producto['id']?>" method="post">
                        <button type="submit" data-product="<?=$producto['id']?>" class="vistazo-rapido estado-inicial btn btn-success">
                        <i class="fas fa-shopping-cart"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="product-info">
                <div class="titulo-producto">
                    <h4><?=$producto['nombre']?></h4>
                </div>
                <div class="descripcion-producto">
                    <?=trim(strip_tags( $producto['descripcion']))?>
                </div>
                <?php if(number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio_ant']), 2, ',', '.') != number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')): ?>
                <div class="product-price product-old">Antes: <span style="text-decoration: line-through;"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio_ant']), 2, ',', '.')?> <?=$producto['precio_ant'] > 0 ? $_SESSION['moneda'] : ''?><?=$producto['precio_ant'] == 'Consultar' ? $producto['precio_ant']: ''?></span></div>
                <?php endif; ?>
                <div class="product-price"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')?> <?=$producto['precio'] > 0 ? $_SESSION['moneda'] : ''?><?=$producto['precio'] == 'Consultar' ? $producto['precio']: ''?></div>
            </div>
        </div>

    <?php
    }
    ?>
    </div>
    </div>
    <?php
    
    
    
    // include_once('./bloques/categorias.php');
    
    //include_once('./bloques/novedades.php');
    //include_once('./bloques/masvendidos.php'); 
    echo '</div>';

?>

<?php

if(session_id() == '') {
    session_start();
}

if(isset($_SESSION['suscrito']) && $_SESSION['suscrito'] == 1){
    ?>
    <div class="col-sm-12">
        <div class="alert alert-success" role="alert">
            Te has suscrito. Se te informará con nuevos productos y ofertas.
        </div>
    </div>
    <?php
     $_SESSION['suscrito'] = 0;
}

?>
<div class="col-sm-12 contact-bar">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 contact-bar-text">                
                <form action="<?=$draizp?>/acc/subscribe" method="post">
                    <div class="row">
                        <div class="col-sm-2 subscribe-text">
                            <span>BOLETÍN</span> 
                        </div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                        </div>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-success" value="Suscribirme">
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-4 pull-right">
                 <?php include($draiz.'/bloques/logos_sociales.php'); ?>
            </div>
        </div>
    </div>
</div>