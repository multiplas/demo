 <?php if($Empresa['actanu'] == 1 && $Empresa['luganu'] == 0 && $_SESSION['anuncio'] != 1){ ?>
<script>
    openModal();
</script>
 <?php
$_SESSION['anuncio'] = 1;
 } ?>
<?php                 
    if (count($sliders) > 0) { 
            //include_once('./componentes/slider3.php'); 
        } 
        ?>

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

    .imagen1{
        background-image: url(<?=$draizp?>/back/uploads/<?=$sliders['0']['imagen']?>);
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        position: relative;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-attachment: scroll;
        height: 500px;
    }
    .imagen2{
        background-image: url(<?=$draizp?>/back/uploads/<?=$sliders['1']['imagen']?>);
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        position: relative;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-attachment: scroll;
        height: 500px;
    }
    .imagen3{
        background-image: url(<?=$draizp?>/back/uploads/<?=$sliders['2']['imagen']?>);
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
        position: relative;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background-attachment: scroll;
        height: 500px;
    }
    </style>
    
    <div class="imagen1">
        <?php if($sliders['0']['titulo'] != '' || $sliders['0']['contenido'] != ''){ ?>
        <div style="position: relative;top: 50px;left: 50px;width: 250px;background-color: rgba(255,255,255, 0.7);padding: 10px;">
        <?php if($sliders['0']['titulo'] != ''){ ?><b><big><?=$sliders['0']['titulo']?></big></b><br><?php } ?>
            <?=$sliders['0']['contenido']?>
        </div>
        <?php } ?>
    </div>

                  
                <div id="masvendidos"  style="border: 1px solid rgb(221, 221, 221);">


<style>
        @media (max-width:940px){
            .muestra{
                display: inline;
            }
            .fotorama__caption__wrap{
                font-size: 10pt !important;
            }
            .fotorama__stage{
                height: 230px !important;
            }
            .fotorama__caption__wrap{
                min-height: 80px !important;
            }
            .fotorama__img{
                height: 100% !important;
                top: -2px !important;
            }
            .vermas3{
                            border: 1px solid #e74e4e;
                            border-radius: 6px;
                            color: <?=$colores['boton_letras']?>;
                            font-size: 1rem;
                            font-weight: bold;
                            height: 1rem;
                            line-height: 1rem;
                            margin: 10px 0 0;
                            max-width: 40%;
                            padding: 4px 15px;
                            transition: border 1s ease 0s, background 1s ease 0s, color 1s ease 0s;
                            width: auto;
                            background-color: <?=$colores['boton_fondo']?>;
                        }
                        
                        .vermas3:hover{
                            background-color: <?=$colores['boton_fondo_hover']?>;
                            color: <?=$colores['boton_letras_hover']?>;
                        }
            
        }
        
        @media (min-width:940px){
            .muestra{
                display: inline;
            }
            .muestra2{
                display: none;
            }
        }
        
        .sale-label{
                            background-color: <?=$colores['oferta_fondo']?>;
                            border-radius: 4px;
                            color: <?=$colores['oferta_letra']?>; !important;
                            float: right;
                            font-size: 12px;
                            font-weight: bold;
                            padding: 2px 4px;
                            text-transform: uppercase;
                            z-index: 10;
                            position: relative !important;
                            margin-left: 2px;
                        }
                        
                        .venta-label{
                            background-color: <?=$colores['venta_fondo']?>;
                            border-radius: 4px;
                            color: <?=$colores['oferta_letra']?>; !important;
                            float: right;
                            font-size: 12px;
                            font-weight: bold;
                            padding: 2px 4px;
                            text-transform: uppercase;
                            z-index: 10;
                            position: relative !important;
                            margin-left: 2px;
                        }
                        
                        .alquiler-label{
                            background-color: <?=$colores['alquiler_fondo']?>;
                            border-radius: 4px;
                            color: <?=$colores['oferta_letra']?>; !important;
                            float: right;
                            font-size: 12px;
                            font-weight: bold;
                            padding: 2px 4px;
                            text-transform: uppercase;
                            z-index: 10;
                            position: relative !important;
                            margin-left: 2px;
                        }
                        
                        .agotado-label{
                            background-color: <?=$colores['agotado_fondo']?>;
                            border-radius: 4px;
                            color: <?=$colores['oferta_letra']?>; !important;
                            float: right;
                            font-size: 12px;
                            font-weight: bold;
                            padding: 2px 4px;
                            text-transform: uppercase;
                            z-index: 10;
                            position: relative !important;
                            margin-left: 2px;
                        }
                        
                        .fotorama__caption__wrap {
                            padding: 0px 10px !important;
                        }
                        .vermas{
                            display: inline-block;
                            font-size: 12px;
                            padding: 13px 31px 13px 31px !important;
                            font-style: normal !Important;
                            text-align: center;
                            vertical-align: middle;
                            margin-top: 1px;
                            margin-bottom: 1px;
                            cursor: pointer;
                            background-image: none;
                            border: 1px solid;
                                border-top-color: currentcolor;
                                border-right-color: currentcolor;
                                border-bottom-color: currentcolor;
                                border-left-color: currentcolor;
                            border-radius: 2px;
                            outline: none;
                            white-space: pre-wrap;
                            -webkit-text-stroke: 0px;
                            -webkit-transition: all 200ms ease-in-out;
                            -moz-transition: all 200ms ease-in-out;
                            -o-transition: all 200ms ease-in-out;
                            transition: all 200ms ease-in-out;
                            -moz-user-select: none;
                            -webkit-user-select: none;
                            -ms-user-select: none;
                            background-color: #000000;
                            color: #ffffff;
                            font-weight: bold;
                        }
                        
                        @media (max-width:768px){
                            .resp{
                                width: 100% !important;
                            }
                            
                            .muestra{
                                display: block !important;
                            }
                            
                            .pie00-bloqfot_one p, ul, li, a{
                                font-size: 1rem !important;
                            }
                        }
    </style>  
    
	<div class="muestra" style="text-align: center; display: flex">
		<?php
                        
			
			for ($i = 0; $i < 3; $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMV[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                //$nombre = str_replace(" ", "_", $nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	     					
                
		?>
				<div id='productoMV_<?=$i?>' <?=$Empresa['ftamano'] == 1 ? 'style="visibility: visible; border: 1px solid rgb(221, 221, 221);height:500px;background-image:url('.$draizp.'imagenesproductos/'.$productosMV[$i]['imagen'].');background-position: center center;background-size: cover;"': 'style="width: 33.3%; display: inline-block;height:500px;background-image:url('.$draizp.'imagenesproductos/'.$productosMV[$i]['imagen'].');background-position: center center;background-size: cover;"'?> class="<?=$Empresa['ftamano'] == 1 ? 'producto resp': 'resp'?>" style="border: 1px solid rgb(221, 221, 221); padding: 15px; -webkit-animation-delay: <?=$i*0.2?>s; -moz-animation-delay: <?=$i*0.2?>s; visibility: hidden">
                                   
                                    <div class="descripcion" style="position: relative;margin-top: 50px;margin-left: 50px;background-color: rgba(255,255,255, 0.7);width: 40%;padding: 10px;text-align:left">
                                        <b><big><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/"><?=$productosMV[$i]['nombre']?></a></big></b>
                                        <br>
                                        <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/"><?=substr($productosMV[$i]['descripcion'], 0, 50)?></a>
                                        <br>
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>                                           
                        <a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/">Ver más</a>
                    <?php }else{ ?>
                        <a class="vermas" style="width: 83% !important;max-width: 83% !important;text-align:center;" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/">Ver más</a>
                    <?php } ?>
                                    </div>
				</div>
		<?php
			}
                ?>
		
	</div>
        
        
        
        <?php if(count($productosMV) > 0){ echo '</div></div>'; } ?>


</div>
    
    
    <div class="imagen2">
        <?php if($sliders['1']['titulo'] != '' || $sliders['1']['contenido'] != ''){ ?>
        <div style="position: relative;top: 50px;left: 50px;width: 250px;background-color: rgba(255,255,255, 0.7);padding: 10px;">
             <?php if($sliders['0']['titulo'] != ''){ ?><b><big><?=$sliders['1']['titulo']?></big></b><br><?php } ?>
            <?=$sliders['1']['contenido']?>
        </div>
        <?php } ?>
    </div>
    <div class="imagen3">
        <?php if($sliders['2']['titulo'] != '' || $sliders['2']['contenido'] != ''){ ?>
        <div style="position: relative;top: 50px;left: 50px;width: 250px;background-color: rgba(255,255,255, 0.7);padding: 10px;">
                 <?php if($sliders['0']['titulo'] != ''){ ?><b><big><?=$sliders['2']['titulo']?></big></b><br><?php } ?>
                <?=$sliders['2']['contenido']?>
        </div>
        <?php } ?>
    </div>