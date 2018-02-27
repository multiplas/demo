<style>
    #grupo-contenido{
        text-align: center !important;
    }
</style> 

<?php if($Empresa['actanu'] == 1 && $Empresa['luganu'] == 0 && $_SESSION['anuncio'] != 1){ ?>
<script>
    openModal();
</script>
 <?php
 include_once './sistema/mod_varios.php';//Necesario para mostrar las categorias en bloque
 
$_SESSION['anuncio'] = 1;
 } ?>
<link rel="stylesheet" href="/temas/11/css/animate.css" />
<?php 
    if (count($sliders) > 0) { 
            include_once('./componentes/slider3.php'); 
        } ?>

<div style="margin-top: -150px; position: relative;">
                        
                        <img id='' src="<?=$draizp?>/imagenes/slider_img.png">
                       
                        
</div>

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
                        #grupo-contenido #contenido{
                            padding: 10px 22px !important;
                        }
                        
                        .productosMuestra:hover{
                            box-shadow: 3px 3px 3px 3px rgba(216, 217, 221, 0.80);
                            padding: 5px 5px;
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
                    
                    <?php if($imagenPrin != ''){ 
                        if($_SESSION['app'] == "NO"){?>
                    
                    <div id="contenido">
                        
                        <img id='' src="<?=$draizp?>/temas/11/img/izq.jpg" style="width: 31%;">
                        <img id='' src="<?=$draizp?>/temas/11/img/cen.jpg" style="width: 31%; margin-left: 2%;">
                        <img id='' src="<?=$draizp?>/temas/11/img/der.jpg" style="width: 31%; margin-left: 2%;">
                        
                    </div>
                    <?php }
                    } ?>
                        
                        <?php
                
                include_once('./temas/11/bloques/masvendidos.php'); 
                //include_once('./bloques/categorias.php');

                $resultado = categoryBloqStatus();
                if(!is_null($resultado) && $resultado['valor'] == 1) //Esta activado
                    include_once('./temas/15/bloques/categorias.php');     //Comento lo de abajo
                
                
                    echo '</div>'; ?>
                    
                    <div id="contenido">
                        
                        <img id='' src="<?=$draizp?>/imagenes/imgizq.jpg" style="width: 48%;">
                        <img id='' src="<?=$draizp?>/imagenes/imgder.jpg" style="width: 48%; margin-left: 2%;">
                        
                    </div>
                    
                    <div id="contenido">
                        
                        <img id='' src="<?=$draizp?>/imagenes/imgcentral.jpg" style="width: 98%;">
                        
                    </div>
                    
                    <div id="contenido">
                        
                        <img id='' src="<?=$draizp?>/imagenes/imgizq2.jpg" style="width: 48%;">
                        <img id='' src="<?=$draizp?>/imagenes/imgder2.jpg" style="width: 48%; margin-left: 2%;">
                        
                    </div>
                    
                    <div id="contenido">
                        
                        <img id='' src="<?=$draizp?>/imagenes/infizq.jpg" style="width: 35.2%;">
                        <img id='' src="<?=$draizp?>/imagenes/infcen.jpg" style="width: 26.5%;">
                        <img id='' src="<?=$draizp?>/imagenes/infder.jpg" style="width: 35.2%;">
                        
                    </div>
                        
               <?php
                
                echo '<div id="contenido">';
                include_once('./temas/11/bloques/novedades.php');
                
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
                                jQuery("#derecha").attr('style', 'width: 50%; color: rgb(255, 255, 255); float: left; height: auto; padding-bottom: 25px; opacity: 0.8;');
                                jQuery("#izquierda").attr('style', 'width: 50%; color: #ffffff; float:left; height: 100%; padding-bottom: 25px');
                                jQuery('#derecha').css('background','rgba(227, 107, 107, 1) url(<?=$draizp?>/imagenes/<?=$imgderecha?>) no-repeat scroll right center');
                                jQuery('#izquierda').css('background','rgba(0, 0, 0, 0) url(<?=$draizp?>/imagenes/<?=$imgizquierda?>) no-repeat scroll right center');
                            }
                        });
                    </script>
