<?php if($Empresa['masvendido'] == 1){ ?>

<div id="masvendidos">


<style>
        @media (max-width:940px){
            .muestra{
                display: none;
            }
            .muestra2{
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
        
        .tfiltro{
            color: #efeee9 !important;
            font-family: Kameron !important;
            font-size: 96px !important;
            font-weight: 700 !important;
            left: 0 !important;
            line-height: 106px !important;
            margin: auto !important;
            right: 0 !important;
            text-transform: uppercase !important;
            top: 0 !important;
            z-index: -1 !important;
        }
    </style>    
    
	<span class="tfiltro">RECOMENDACIONES</span>
	<div class="muestra" style="text-align: center">
		<?php
                
			if (count($productosMV) < 1) echo 'No hay productos disponibles.';
			for ($i = 0; $i < count($productosMV); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMV[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                //$nombre = str_replace(" ", "_", $nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	     					
                
		?>
				<div id='productoMV_<?=$i?>' <?=$Empresa['ftamano'] == 1 ? 'style="visibility: visible; border: 1px solid rgb(221, 221, 221);"': 'style="width: 24.7%; display: inline-block;"'?> class="productosMuestra <?=$Empresa['ftamano'] == 1 ? 'producto': ''?>" style="border: 1px solid rgb(221, 221, 221); padding: 15px; -webkit-animation-delay: <?=$i*0.2?>s; -moz-animation-delay: <?=$i*0.2?>s; visibility: hidden">
				
                                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/"><img <?=$Empresa['ftamano'] == 1 ? 'class="zoom"': 'style="width: 100%;"'?> src="<?=$draizp?>/imagenesproductos/<?=$productosMV[$i]['imagen']?>" alt="<?=$productosMV[$i]['nombre']?>" /></a>
                                    
                                   <div class="descuento" <?=$productosMV[$i]['descuento'] != 0 ? 'style="position: relative; top: -15px; background-color: white; font-weight: bold; font-size: 14pt; left: 73%; box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.75); height: 30px; line-height: 30px; width: 60px;"' : 'style="position: relative; top: -15px; background-color: transparent; font-weight: bold; font-size: 14pt; left: 73%; height: 30px; line-height: 30px; width: 60px;"'?>><?=$productosMV[$i]['descuento'] != 0 && $productosMV[$i]['precio'] != 'Consultar' ? '-'.$productosMV[$i]['descuento'].' '.$productosMV[$i]['descuentoe'] : '&nbsp'?></div>
                                    
                                    <hr>
                                    <span class="descripcion"><b><?=$productosMV[$i]['nombre']?></b></span><br><br>
                                    
                                    <span class="descripcion"><?=$productosMV[$i]['referencia']?></span><br><br>
                                    
                                    <?php if($productosMV[$i]['descripcion'] != ''){ ?>
                                        <hr>
                                        <span class="descripcion" style="color: red; font-size: 10pt !important;"><b><?=$productosMV[$i]['descripcion']?></b></span>
                                    <?php }else{ ?>
                                        <hr style="border-color: white">
                                        <span class="descripcion">&nbsp;</span>
                                    <?php } ?>
                                    
                                    <hr>
                                    <span class="precioa" style="float: left"><del><?=$productosMV[$i]['descuento'] != 0 && $productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></del></span><br>
                    
                                    <span class="precio" style="float: right; margin-top: -25px; font-size: 18pt; color: #b0665d"><b><?=$productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productosMV[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></b></span>
                        
                   
					
				</div>
		<?php
			}
                ?>
		
	</div>
        
        <div class="muestra2" style="text-align: center;">
		<?php
                        if (count($productosMV) < 1){ echo 'No hay productos disponibles.'; }
                        if(count($productosMV) > 0){ echo '<div id="sli" style="width: 100% !important;margin: 0 auto;padding-top: 0em;">
                        <div class="fotorama" data-width="100%" data-click="true" data-ratio="16/9" data-minwidth="10" data-maxwidth="2000" data-minheight="10" data-maxheight="60%" data-loop="true" data-autoplay="true" data-arrows="true" data-click="false" data-fit="cover" data-nav="dots" data-swipe="true">'; }
			for ($i = 0; $i < count($productosMV); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMV[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
		?>
        
        
        <img src="<?=$draizp?>/imagenesproductos/<?=$productosMV[$i]['imagen']?>" width="100%" data-caption="<span style='color: white;'><?=substr($productosMV[$i]['nombre'],0,40)?> <br><?=$productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productosMV[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span> <br><a class='vermas3' style='color: #ffffff; top:8px;' href='<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/'><i class='fa fa-eye'></i> Ver más</a>" />
    
				<br><br>
		<?php
			}
		?>
	</div>
        
        <?php if(count($productosMV) > 0){ echo '</div></div>'; } ?>


</div>

<?php } ?>