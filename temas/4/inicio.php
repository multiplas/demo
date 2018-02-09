 <?php if($Empresa['actanu'] == 1 && $Empresa['luganu'] == 0 && $_SESSION['anuncio'] != 1){ ?>
<script>
    openModal();
</script>
 <?php
$_SESSION['anuncio'] = 1;
 } ?>
<link rel="stylesheet" href="/temas/4/css/animate.css" />
<?php 
    if($Empresa['mvposicion'] == 1){
        echo '<div id="contenido">';
        include_once('./temas/4/bloques/masvendidos.php'); 
        echo '</div>';
    }
    
    if($Empresa['novposicion'] == 1){
        echo '<div id="contenido">';
        include_once('./temas/4/bloques/novedades.php');
        echo "</div>";
    }
                
    if (count($sliders) > 0) { 
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

        @media screen and (max-width: 500px) { 
        figure.slider figure figcaption {
            font-size: 1.2rem;
        }
    }
    #grupo-contenido #contenido #productos .producto .descripcion, #grupo-contenido #contenido #novedades div.muestra div.producto .descripcion, #grupo-contenido #contenido #masvendidos div.muestra div.producto .descripcion {
        line-height: 1.75rem !important;
    }


    </style>
<div id="contenido">

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
                    <?php if($imagenPrin != ''){
                        $medida1= 1300;
                        $medida2 = 1500;
                    }else{
                        $medida1= 300;
                        $medida2 = 500;
                    }
                    ?>
                    
                    <script>
                        jQuery(document).on("scroll", function(){
                            var desplazamientoActual = jQuery(document).scrollTop();
                            var animacion = jQuery('#textos').offset().top;
                            if(desplazamientoActual >= <?=$medida1?>){
                                jQuery('#textos').css('display', 'inherit');
                                jQuery('#textos').css('visibility', 'visible');
                                jQuery('#textos').css('width', 'auto');                                
                                jQuery('#textos').css('margin-right', '0px');                                
                                jQuery('#textos').css('border', 'none');                                
                                jQuery('#textos').css('float', 'inherit');                                
                                jQuery('#textos').addClass('animated bounceInLeft');
                                jQuery('#textos2').css('display', 'inherit');
                                jQuery('#textos2').css('visibility', 'visible');
                                jQuery('#textos2').css('width', 'auto');                                
                                jQuery('#textos2').css('margin-right', '0px');                                
                                jQuery('#textos2').css('border', 'none');                                
                                jQuery('#textos2').css('float', 'inherit');                                
                                jQuery('#textos2').addClass('animated bounceInRight');
                            }
                            
                            if(desplazamientoActual >= <?=$medida2?>){
                                jQuery('#producto_0').addClass('animated bounceInUp');
                                jQuery('#producto_1').addClass('animated bounceInUp');
                                jQuery('#producto_2').addClass('animated bounceInUp');
                                jQuery('#producto_3').addClass('animated bounceInUp');
                            }
                            
                            if(desplazamientoActual >= 550){
                                jQuery('#productoMV_0').addClass('animated bounceInLeft');
                                jQuery('#productoMV_1').addClass('animated bounceInLeft');
                                jQuery('#productoMV_2').addClass('animated bounceInLeft');
                                jQuery('#productoMV_3').addClass('animated bounceInLeft');
                            }
                        });
                    </script>
                
                    <?php if($imagenPrin != '' || $imagenPrinContenido != ''){ 
                        if($_SESSION['app'] == "NO"){?>
                    
                    <div id="contenido">
                        
                        <?php if($imagenPrin != ''){ ?><?php if($imagenPrinURL != ''){ ?><a href="<?=$imagenPrinURL?>" target="<?=$imagenPrinDestino == 0 ? '_blank':'_self'?>"><?php } ?><img title="<?=$imagenPrinTitulo?>" id='entrando' src="<?=$draizp?>/imagenes/<?=$imagenPrin?>" style="visibility: visible; width: 105%; margin-left: -2.5%;"><?php if($imagenPrinURL != ''){ ?></a><?php } } ?>                        
                        <?php if($imagenPrinContenido != ''){ echo '<div id="textoE" style="display:visible">'.$imagenPrinContenido.'</div>'; } ?>
                    </div>
                    <?php }
                    } ?>
                        
                        <?php
                
                if($Empresa['mvposicion'] == 0){
                include_once('./temas/4/bloques/masvendidos.php'); 
                //include_once('./bloques/categorias.php');
                }
                
                
                    echo '</div>'; ?>
                    
                    <style>
                        @media (max-width:940px)
                        {

                            .derecha {
                                width: 100% !important;
                            }
                            
                            .izquierda {
                                width: 100% !important;
                            }
                            
                        }
                    </style>
                    
                    <?php
                    if($imgizquierda != '' || $izquierda != '' || $imgderecha != '' || $derecha != ''){
                    if($imgizquierda != ''){
                        echo'<div class="muestra3"><div id="izquierda" class="izquierda" style="width: 50%; background-color: #e36b6b; color: #ffffff; float:left; height: 100%; background: rgba(227, 107, 107, 1) url('.$draizp.'/imagenes/'.$imgizquierda.') no-repeat scroll right center; min-height: 425px;">';
                    }else{
                        echo'<div class="muestra3"><div id="izquierda" class="izquierda" style="width: 50%; background-color: #e36b6b; color: #ffffff; float:left; height: 100%; min-height: 425px;">';
                    }
                    
                    ?>
                    
                        <div id='textos' class="publicacion" style="visibility: hidden; border: #bebebe 2px solid;padding: 0px 15px;width: 45%;display: none; margin-right:2%; float: right; position: relative; margin-top: 25px !important; margin-bottom: 25px !important; -ms-transform: translateY(-50%); -webkit-transform: translateY(-50%); transform: translateY(-50%);">
                                    <?=$izquierda?>
                            </div>
                    <?php
                    
                    echo '</div>';
                   if($imgderecha != ''){
                        echo'<div id="derecha" class="derecha" style="width: 50%; background-color: #333333; color: #ffffff; float:left; height: 100%; background: rgba(0, 0, 0, 0) url('.$draizp.'/imagenes/'.$imgderecha.') no-repeat scroll right center; min-height: 425px; opacity: 0.8;">';
                    }else{
                        echo'<div id="derecha" class="derecha" style="width: 50%; background-color: #333333; color: #ffffff; float:left; height: 100%; min-height: 425px; opacity: 0.8;">';
                    }
                    
                    ?>
                        <div id='textos2' class="publicacion" style="display: none">
                                    <?=$derecha?>
                            </div>
                    <?php
                
                    echo '</div></div>';
                    } 
                echo '<div id="contenido">';
                if($Empresa['novposicion'] == 0){
                    include_once('./temas/4/bloques/novedades.php');
                    echo "</div>";
                }
                
                if($Empresa['blogin'] == 1){
                    echo '<br><br><div id="grupo-contenido"><div id="contenido"><h1>Últimas publicaciones</h1><br>';
                    $i=0;
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
							
							if($i%2 == 0 && $i>0){ echo '<br><br>'; }
                    ?>
                        <div class="publicacion" style="border: #bebebe 2px solid;padding: 0px 15px;width: 45%;display: inline-block;vertical-align: top; <?=(($i % 2) == 0) ? 'margin-right:2%;' : '' ?>">
                                <a href="<?=$draizp?><?=$_SESSION['lenguaje']?>/pagina/<?=$entrada['id']?>" title="Ver &laquo;<?=$entrada['nombre']?>&raquo;">
                                    <h2 style="height: 65px;"><?=substr($entrada['nombre'], 0, 90)?><?=strlen($entrada['nombre']) > 90 ? '...' : ''?></h2>
                                    <?php
                                        if ($entrada['imagenportada'] != null)
                                        {
                                            ?>
                                            <span style="display: block; margin-bottom: 10px; max-height: 170px; overflow: hidden; text-align: center; width: 100%;">
                                                <img class="zoom" src="<?=$draizp?>/imagenes/<?=$entrada['imagenportada']?>" alt="<?=$entrada['nombre']?>">
                                            </span>
                                            <?php
                                        }
                                        elseif ($entrada['imagen'] != null)
                                        {
                                            ?>
                                            <span style="display: block; margin-bottom: 10px; max-height: 170px; overflow: hidden; text-align: center; width: 100%;">
                                                <img class="zoom" src="<?=$draizp?>/imagenes/<?=$entrada['imagen']?>" alt="<?=$entrada['nombre']?>">
                                            </span>
                                            <?php
                                        }
                                    ?>
                                </a>
                                <p style="height: 88px;"><?=$descripcion?></p>

                                <span style="font-size: 10pt; font-style: italic; line-height: 32px;"><?=date_format(date_create($entrada['fecha']), 'd-m-Y')?></span>

                            </div>
                    <?php
                        $i++;
                    } 
                }
                
                echo '</div></div>';
          
        ?>

                    <script>
                        var mayor = 0;
                        jQuery(document).ready(function(){
                            if(jQuery("#textos").length > 0) { //Evalua si hay un div que se llama textos
                                resizeDivs();
                                
                                jQuery( window ).resize(resizeDivs);

                                var ventana_ancho = jQuery(window).width();
                                if(ventana_ancho < 940){
                                    jQuery("#derecha").attr('style', 'width: 50%; float: left; height: '+mayor+'px; padding-bottom: 25px; opacity: 0.8;');
                                    jQuery("#izquierda").attr('style', 'width: 50%; color: #ffffff; float:left; height:'+mayor+'px; padding-bottom: 25px');
                                    jQuery("#izquierda").css('min-height', '200px');
                                    jQuery('#derecha').css('background','url(<?=$draizp?>/imagenes/<?=$imgderecha?>) no-repeat scroll right center');
                                    jQuery('#derecha').css('background-color','#333333');
                                    jQuery('#derecha').css('color','#fff');
                                    jQuery("#derecha").css('min-height', '200px');
                                    jQuery('#izquierda').css('background','url(<?=$draizp?>/imagenes/<?=$imgizquierda?>) no-repeat scroll right center');
                                }
                            }    
                        });

                        function resizeDivs(){
                            textos = jQuery("#textos").height();
                            textos2 = jQuery("#textos2").height();

                            if(textos > textos2)
                                mayor = textos;
                            else
                                mayor = textos2;
                            mayor = mayor + 30;
                            jQuery("#izquierda").height(mayor);
                            jQuery("#derecha").height(mayor);
                        }
                    </script>
