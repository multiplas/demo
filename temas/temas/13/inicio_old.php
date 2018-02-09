 <?php if($Empresa['actanu'] == 1 && $Empresa['luganu'] == 0 && $_SESSION['anuncio'] != 1){ ?>
<script>
    openModal();
</script>
 <?php
$_SESSION['anuncio'] = 1;
 } ?>
<link rel="stylesheet" href="/temas/4/css/animate.css" />
<link rel="stylesheet" href="<?=$draizp?>/css/imagehover/imagehover.min.css">
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
                            if(desplazamientoActual >= <?=$medida1?>){
                                $('#textos').attr('style', 'padding: 0px 15px;width: 45%;display: inline; margin-right:2%; float: right; position: relative; top: 180px;  margin-bottom: 25px; -ms-transform: translateY(-50%); -webkit-transform: translateY(-50%); transform: translateY(-50%);');
                                $('#textos').addClass('animated bounceInLeft');
                                $('#textos2').attr('style', 'padding: 0px 15px;width: 45%; margin-left:2%; position: relative; top: 180px; margin-bottom: 25px; -ms-transform: translateY(-50%); -webkit-transform: translateY(-50%); transform: translateY(-50%);');
                                $('#textos2').addClass('animated bounceInRight');
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
                        
                        <?php
                
                //include_once('./temas/4/bloques/masvendidos.php'); 
                include_once('./temas/13/bloques/categorias.php');
                
                
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
                        <div id='textos2' class="publicacion animated bounceInRight" style="visibility: hidden; padding: 0px 15px;width: 45%;display: none; margin-left:2%; position: relative; margin-top: 25px !important; margin-bottom: 25px !important; -ms-transform: translateY(-50%); -webkit-transform: translateY(-50%); transform: translateY(-50%);">
                                    <?=$derecha?>
                            </div>
                    <?php
                
                echo '</div></div>';
                } 
                echo '<div id="contenido">';
                //include_once('./temas/4/bloques/novedades.php');
                
                echo '</div>';
          
        ?>

                    <script>
                        $(document).ready(function(){
                            t1 = $("#izquierda").outerHeight();
                            t2 = $("#derecha").outerHeight();
                            t1 = t1+30;
                            t2 = t2+30;
                            var ventana_ancho = $(window).width();
                            if(ventana_ancho > 940){
                                if(t1 > t2){
                                    $("#derecha").outerHeight(t1)
                                    $("#izquierda").outerHeight(t1)
                                }else{
                                    $("#izquierda").outerHeight(t2);
                                    $("#derecha").outerHeight(t2);
                                }
                            }else{
                                $("#derecha").attr('style', 'width: 50%; background-color: rgb(51, 51, 51); color: rgb(255, 255, 255); float: left; height: auto; padding-bottom: 25px; opacity: 0.8;');
                                $("#izquierda").attr('style', 'width: 50%; background-color: #e36b6b; color: #ffffff; float:left; height: 100%; background: rgba(227, 107, 107, 1) url('.$draizp.'/imagenes/fondo.jpg) no-repeat scroll right center; padding-bottom: 25px;');
                            }
                        });
                    </script>
