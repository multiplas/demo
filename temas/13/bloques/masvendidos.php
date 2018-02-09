<?php if($Empresa['masvendido'] == 1){ ?>

<div id="masvendidos"  style="border: 1px solid rgb(221, 221, 221); padding: 15px;">


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
    </style>    
    
	<span class="tfiltro"><?php
        if($Empresa['textomv'] != ''){
           echo $Empresa['textomv']; 
        }else{
            echo "MÁS VENDIDOS";
        }
        ?></span>
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
				<div id='productoMV_<?=$i?>' <?=$Empresa['ftamano'] == 1 ? 'style="visibility: visible; border: 1px solid rgb(221, 221, 221);"': 'style="width: 23.6%; display: inline-block;"'?> class="<?=$Empresa['ftamano'] == 1 ? 'producto': ''?>" style="border: 1px solid rgb(221, 221, 221); padding: 15px; -webkit-animation-delay: <?=$i*0.2?>s; -moz-animation-delay: <?=$i*0.2?>s; visibility: hidden">
                                    <?=$Empresa['etiqpro'] == 1 ? ($productosMV[$i]['mostraretq'] == 1 ? (($productosMV[$i]['tipo_prod'] == 0 ? '<span class="venta-label">Venta</span>' : ($productosMV[$i]['tipo_prod'] == 3 ? '<span class="alquiler-label">Alquiler</span>' : ''))) : '') : '' ?>	
                                    <?=$productosMV[$i]['mostraretqAgo'] == 1 ? '<span class="agotado-label">¡Agotado!</span>' : ''?>
                                    <?=$productosMV[$i]['mostraretqOfe'] == 1 ? '<span class="sale-label">¡Oferta!</span>' : ''?>
                                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMV[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/"><img <?=$Empresa['ftamano'] == 1 ? 'class="zoom"': 'style="width: 100%;"'?> src="<?=$draizp?>/imagenesproductos/<?=$productosMV[$i]['imagen']?>" alt="<?=$productosMV[$i]['nombre']?>" /></a>
                                        <span class="descripcion"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMV[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/"><?=$productosMV[$i]['nombre']?></a></span>
					<span class="descuento"><?=$productosMV[$i]['descuento'] != 0 && $productosMV[$i]['precio'] != 'Consultar' ? '-'.$productosMV[$i]['descuento'].' '.$productosMV[$i]['descuentoe'] : ''?></span>
					<span class="precioa"><?=$productosMV[$i]['descuento'] != 0 && $productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
					   <span class="precio"><?=$productosMV[$i]['tprecio'] != '' ? $productosMV[$i]['tprecio'] : ($productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio']), 2, ',', '.') : 'Consultar')?><?=$productosMV[$i]['precio'] != 'Consultar' ? $productosMV[$i]['tprecio'] != '' ? '' : $_SESSION['moneda'] : ''?></span>
                        <a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMV[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/">Ver más</a>
                    <?php }else{ ?>
                        <a class="vermas" style="width: 83% !important;max-width: 83% !important;text-align:center;" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMV[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/">Ver más</a>
                    <?php } ?>
					
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
        
        
        <img src="<?=$draizp?>/imagenesproductos/<?=$productosMV[$i]['imagen']?>" width="100%" data-caption="<span style='color: white;'><?=substr($productosMV[$i]['nombre'],0,40)?> <br><?=$productosMV[$i]['tprecio'] != '' ? $productosMV[$i]['tprecio'] : ($productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio']), 2, ',', '.') : 'Consultar')?><?=$productosMV[$i]['precio'] != 'Consultar' ? $productosMV[$i]['tprecio'] != '' ? '' : $_SESSION['moneda'] : ''?></span> <br><a class='vermas3' style='color: #ffffff; top:8px;' href='<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMV[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/'><i class='fa fa-eye'></i> Ver más</a><br><?=$Empresa['etiqpro'] == 1 ? ($productosMV[$i]['tipo_prod'] == 0 ? "<span class='venta-label' style='position: relative; top: -200px;'>Venta</span>": ($productosMV[$i]['tipo_prod'] == 3 ? "<span class='alquiler-label' style='position: relative; top: -200px;'>Alquiler</span>" : "")) : ''?><?=$productosMV[$i]['mostraretqAgo'] == 1 ? "<span class='agotado-label' style='position: relative; top: -200px;'>¡Agotado!</span>" : "" ?><?=$productosMV[$i]['mostraretqOfe'] == 1 ? "<span class='sale-label'  style='position: relative; top: -200px;'>¡Oferta!</span>" : "" ?>" />
    
				<br><br>
		<?php
			}
		?>
	</div>
        
        <?php if(count($productosMV) > 0){ echo '</div></div>'; } ?>


</div>

<?php } ?>