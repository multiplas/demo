 <?php if($Empresa['actanu'] == 1 && $Empresa['luganu'] == 0 && $_SESSION['anuncio'] != 1){ ?>
<script>
    openModal();
</script>
 <?php
$_SESSION['anuncio'] = 1;
 } ?>
<link rel="stylesheet" href="/temas/4/css/animate.css" />
<?php 
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
                        $(document).on("scroll", function(){
                            var desplazamientoActual = $(document).scrollTop();
                            var animacion = $('#textos').offset().top;
                            if(desplazamientoActual >= 200){
                                $('#entrando').attr('style', 'visibility: visible; width: 105%; margin-left: -2.5%;');
                                $('#entrando').addClass('animated bounceIn');
                            }
                            
                            if(desplazamientoActual >= <?=$medida2?>){
                                $('#producto_0').addClass('animated bounceInUp');
                                $('#producto_1').addClass('animated bounceInUp');
                                $('#producto_2').addClass('animated bounceInUp');
                                $('#producto_3').addClass('animated bounceInUp');
                            }
                            
                            if(desplazamientoActual >= 550){
                                $('#productoMV_0').addClass('animated bounceInRight');
                                $('#productoMV_1').addClass('animated bounceInRight');
                                $('#productoMV_2').addClass('animated bounceInRight');
                                $('#productoMV_3').addClass('animated bounceInRight');
                            }
                        });
                    </script>
                
                    <?php if($imagenPrin != ''){ 
                        if($_SESSION['app'] == "NO"){?>
                    
                    <div id="contenido">
                        
                        <img id='entrando' src="<?=$draizp?>/imagenes/<?=$imagenPrin?>" style="visibility: hidden; width: 105%; margin-left: -2.5%;">
                        
                    </div>
                    <?php }
                    } ?>
                        
                        <?php
                
                include_once('./temas/4/bloques/masvendidos.php'); 
                //include_once('./bloques/categorias.php');
                
                
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
                    
                    if($imgizquierda != ''){
                        echo'<div class="muestra3"><div id="izquierda" class="izquierda" style="width: 50%; background-color: #e36b6b; color: #ffffff; float:left; height: 100%; background: rgba(227, 107, 107, 1) url('.$draizp.'/imagenes/'.$imgizquierda.') no-repeat scroll right center; min-height: 425px;">';
                    }else{
                        echo'<div class="muestra3"><div id="izquierda" class="izquierda" style="width: 50%; background-color: #e36b6b; color: #ffffff; float:left; height: 100%; min-height: 425px;">';
                    }
                    
                    ?>
                    
                        <div id='textos' class="publicacion" style="padding: 0px 15px;width: 45%; margin-right:2%; float: right; margin-top: 25px !important; margin-bottom: 25px !important;">
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
                        <div id='textos2' class="publicacion animated bounceInRight" style="padding: 0px 15px;width: 45%; margin-left:2%; margin-top: 25px !important; margin-bottom: 25px !important;">
                                    <?=$derecha?>
                            </div>
                    <?php
                
                echo '</div></div><div id="contenido">';
                include_once('./temas/4/bloques/novedades.php');
                
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
                                        if ($entrada['imagen'] != null)
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

