<script>
    $(document).ready(function(){
    });
</script>
<?php 
include_once './sistema/mod_varios.php';//Necesario para mostrar las categorias en bloque
if($inicio == 3){
    echo '<div id="contenido">';

    $ip = $_SERVER['REMOTE_ADDR']; // the IP address to query
    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    if($query && $query['status'] == 'success') {
      echo '<p><b>Tu ubicación:</b> '.$query['city'].'</p><br>';
    } else {
      echo 'Unable to get location';
    }

    include_once('./bloques/novedades.php');
    include_once('./bloques/masvendidos.php');
    echo '</div>';
}else{
    if (count($sliders) > 0) { 
                if($inicio == 2){
                    //echo '<div id="contenido" style="max-width:1100px !important;padding-top:0px;">'; 
                }
            include_once('./componentes/slider3.php'); 
        } ?>

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


    </style>
    <!--
    <?php
        $prefijo_img = $draizp.'/back/uploads/';

        if (count($sliders) > 0)
        {
    ?>

    <div id="captioned-gallery">
        <figure class="slider">
            <?php
                foreach ($sliders AS $slider)
                {
                ?>
                    <figure>
                        <img src="<?=$prefijo_img.$slider['imagen']?>" alt="<?=$slider['contenido']?>">
                        <figcaption><?=$slider['contenido']?></figcaption>
                    </figure>
                <?php
                }
            ?>
        </figure>
    </div>

    <?php }?>
    -->
    <?php 
        if($inicio == 2){
    ?>
        <div>
    <?php 
        }else{      
    ?>
        <div id="contenido">
    <?php 
        }
    ?>
        <!--<div id="productos">
            <a href="<?=$draizp?>/productos/115" class="superpr">
                <img src="<?=$draizp?>/source/ejemplo_banner1.jpg" src="">
                <span>
                    Lorem ipsum dolor sit<em>Ver más</em>
                </span>
            </a>
            <a href="<?=$draizp?>/productos/118" class="superpr">
                <img src="<?=$draizp?>/source/ejemplo_banner2.jpg" src="">
                <span>
                    Lorem ipsum dolor sit aemet<em>Ver más</em>
                </span>
            </a>
        </div>-->
        <?php 
            if($inicio == 2){
                $productosMN = ProductosConCriterio(8, 'novedades');
        ?>
        <div style="width:100% !important;margin:0 !important;">
            <div class="slider4">
                <?php
                for ($i = 0; $i < count($productosMN); $i++)
                {
                    $nombre = utf8_encode(strtr(utf8_decode($productosMN[$i]['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
                ?>
                <div class="slide" style="text-align:center;"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/"><span style="position:absolute;top:75%;right:2%;background:rgba(0, 0, 0, 0.54);color:white;padding:5px;width:92%;"><?=strtoupper($productosMN[$i]['nombre'])?></span><img src="<?=$draizp?>/imagenesproductos/<?=$productosMN[$i]['imagen']?>"></a></div>
                <?php
                }
                ?>
            </div>
        </div>
            </div>
        <script src="<?=$darizp?>/componentes/jquery.bxslider/jquery.bxslider.js"></script>
        <script>
            $(document).ready(function(){
              $('.slider4').bxSlider({
                slideWidth: 300,
                minSlides: 4,
                maxSlides: 4,
                moveSlides: 1,
                slideMargin: 40,
                pager: false,
                responsive: true,
                controls: false,
                auto: true,
                autoHover: true
              });
            });
        </script>
            <div>
        <?php
                include_once('./componentes/slider2.php');
                echo '</div>';
                $entradas = Noticia(2);
        ?>
                <style>

                    .publicacion{
                        width:46% !important;
                        display:inline-block;
                        margin:0px 10px;
                    }

                    @media screen and (max-width: 990px) { 
                    .publicacion {
                        width:415px !important;
                    }
                    }

                    @media screen and (max-width: 970px) { 
                    .publicacion {
                        width:96.4% !important;
                    }
                        }

                </style>
                <div id="contenido">
                <span class="tfiltro"><h2 style="margin-left:-20px;">ÚLTIMAS NOTICIAS</h2></span>
                    <hr>
                <div class="muestra">
        <?php
                foreach ($entradas AS $entrada){

                        $texto_size = 40;
                        $text = $entrada['contenido'];
                        $text = strip_tags($text);
                        $textlen = strlen($text);
                        $pos = 0;
                        $espacios = 0;
                        while ($espacios < $texto_size && $pos < $textlen)
                        {
                            if ($text[$pos] == ' ')
                                $espacios++;
                            if ($espacios < $texto_size && $pos < $textlen)
                                $pos++;
                        }
                        $pos--;
                        $sppos = strpos($text, ' ', $pos);
                        if ($sppos < 1) $sppos = $textlen - 1;
                        if (strlen($text) > $sppos)
                        {
                            $descripcion = str_replace("\r\n", '<br>', substr($text, 0, $sppos));
                            if (strlen($text) > $sppos)
                                $descripcion .= '...';
                        }
        ?>
                    <div class="publicacion">
                            <a href="<?=$draizp?>/pagina/<?=$entrada['id']?>" title="Ver &laquo;<?=$entrada['nombre']?>&raquo;">
                                <h2><?=utf8_decode($entrada['nombre'])?></h2>
                                <?php
                                    if ($entrada['imagen'] != null)
                                    {
                                        ?>
                                        <span style="display: block; margin-bottom: 10px; max-height: 170px; overflow: hidden; text-align: center; width: 100%;">
                                            <img class="zoom" src="<?=$draizp?>/imagenesproductos/<?=$entrada['imagen']?>" alt="<?=$entrada['nombre']?>">
                                        </span>
                                        <?php
                                    }
                                ?>
                            </a>
                            <p><?=$descripcion?></p>

                            <span style="float: left; font-size: 10px; font-style: italic; line-height: 32px;"><?=date_format(date_create($entrada['fecha']), 'd-m-Y')?></span>

                        </div>
            <?php
                }
            ?>
                </div>
            </div>
        <?php
            }else{
                
                ?>
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
    <div class="container">
    <div id="vistazo-rapido-container">
        
    </div>
    <?php
    $resultado = categoryBloqStatus();
    if(!is_null($resultado) && $resultado['valor'] == 1) //Esta activado
        include_once('./temas/16/bloques/categorias.php');           //Comento lo de abajo 
    ?>
    <div class="row">
        <h3 class="col-sm-12 text-center" style="color: <?=$principalColors['colordestacado']?> ">Top Ventas</h3>
    <?php
    $ultimosProductos = ProductosConCriterio(12,'ventas');
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
}
}
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