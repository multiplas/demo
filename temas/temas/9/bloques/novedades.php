<?php if($Empresa['novedades'] == 1){ ?>

<div id="novedades" style="border: 1px solid rgb(221, 221, 221); padding: 15px;">
    
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
                <?=$Empresa['ftamano'] == 1 ? 'height: 100% !important;': 'height: auto !important;'?> 
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
        
        .precio{
            color: #290000;
            display: inline-block;
            font-size: 1.1rem;
            font-weight: bold;
            height: 1.1rem;
            line-height: 1.1rem;
            margin: 0px;
            max-width: 50%;
            padding: 10px 0px 0px 0px;
            width: auto;
        }
        
        .vermas{
            border: solid 1px #290000;
            border-radius: 6px;
            color: #290000;
            font-size: 0.75rem;
            font-weight: bold;
            height: 0.75rem;
            line-height: 0.75rem;
            margin: 0px;
            margin-left: 5px;
            max-width: 40%;
            padding: 1px 12px;
            transition: border 1s, background 1s, color 1s;
            width: auto;
            top: -2px;
        }
        
        .vermas:hover{
            background-color: #000000;
            color: #ffffff;
        }
        
        .descuento{
            color: #000;
            display: inline-block;
            font-size: 1.1rem;
            font-weight: bold;
            height: 1.1rem;
            line-height: 1.1rem;
            margin: 0px;
            margin-right: 10px;
            max-width: 40%;
            padding: 10px 0px;
            width: auto;
        }
        
        .precioa{
            color: #666;
            display: inline-block;
            font-size: 0.75rem;
            font-weight: bold;
            height: 0.75rem;
            line-height: 0.75rem;
            margin: 0px;
            max-width: 40%;
            padding: 10px 0px;
            width: auto;
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
        if($Empresa['textonov'] != ''){
           echo $Empresa['textonov']; 
        }else{
            for($i=0; $i<=count($labelidioma); $i++){
                if($labelidioma[$i][0] == 'novedades'){
                    echo $nombreidioma[$i][0];
                }
                if($labelidioma[$i][0] == 'sin_productos'){
                    $aux = $nombreidioma[$i][0];
                }
                if($labelidioma[$i][0] == 'ver_mas'){
                    $aux1 = $nombreidioma[$i][0];
                }
            }
        }
        ?></span>
	<div class="muestra" style="text-align: center">
		<?php
			if (count($productosMN) < 1) echo 'No hay productos disponibles.';
			for ($i = 0; $i < count($productosMN); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMN[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
		?>
				<div id='producto_<?=$i?>' <?=$Empresa['ftamano'] == 1 ? '': 'style="width: 24.6%; display: inline-block;"'?>  class="<?=$Empresa['ftamano'] == 1 ? 'producto': ''?>" style="border: 1px solid rgb(221, 221, 221); padding: 15px; -webkit-animation-delay: <?=$i*0.2?>s; -moz-animation-delay: <?=$i*0.2?>s;">
                                    <?=$Empresa['etiqpro'] == 1 ? ($productosMN[$i]['mostraretq'] == 1 ? (($productosMN[$i]['tipo_prod'] == 0 ? '<span class="venta-label">Venta</span>' : ($productosMN[$i]['tipo_prod'] == 3 ? '<span class="alquiler-label">Alquiler</span>' : ''))) : '') : '' ?>	
                                    <?=$productosMN[$i]['mostraretqAgo'] == 1 ? '<span class="agotado-label">¡Agotado!</span>' : ''?>
                                    <?=$productosMN[$i]['mostraretqOfe'] == 1 ? '<span class="sale-label">¡Oferta!</span>' : ''?>
                                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMN[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/"><img <?=$Empresa['ftamano'] == 1 ? 'class="zoom"': 'style="width: 100%;"'?> src="<?=$draizp?>/imagenesproductos/<?=$productosMN[$i]['imagen']?>" alt="<?=$productosMN[$i]['nombre']?>" /></a>
                                        <br><span class="descripcion"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMN[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/"><?=$productosMN[$i]['nombre']?></a></span>
					<?=$productosMN[$i]['descuento'] != 0 && $productosMN[$i]['precio'] != 'Consultar' ? '<br>' : '' ?><span class="descuento"><?=$productosMN[$i]['descuento'] != 0 && $productosMN[$i]['precio'] != 'Consultar' ? '-'.$productosMN[$i]['descuento'].' '.$productosMN[$i]['descuentoe'] : ''?></span>
					<span class="precioa"><?=$productosMN[$i]['descuento'] != 0 && $productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                        <span class="precio"><?=$productosMN[$i]['tprecio'] != '' ? $productosMN[$i]['tprecio'] : ($productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio']), 2, ',', '.') : 'Consultar')?><?=$productosMN[$i]['precio'] != 'Consultar' ? $productosMN[$i]['tprecio'] != '' ? '' : $_SESSION['moneda'] : ''?></span>
                        <a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMN[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/">Ver más</a>
                    <?php }else{ ?>
                        <a class="vermas" style="width: 83% !important;max-width: 83% !important;text-align:center" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMN[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/">Ver más</a>
                    <?php } ?>
				</div>
		<?php
			}
		?>
	</div>
    
    <div class="muestra2" style="text-align: center;">
		<?php
			if (count($productosMN) < 1) echo 'No hay productos disponibles.';
                        if(count($productosMN) > 0){ echo '<div id="sli" style="width: 100% !important;margin: 0 auto;padding-top: 0em;">
                        <div class="fotorama" data-width="100%" data-click="true" data-ratio="16/9" data-minwidth="10" data-maxwidth="2000" data-minheight="10" data-maxheight="60%" data-loop="true" data-autoplay="true" data-arrows="true" data-click="false" data-fit="cover" data-nav="dots" data-swipe="true">'; }
			for ($i = 0; $i < count($productosMN); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMN[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
		?>
        
        
        <img src="<?=$draizp?>/imagenesproductos/<?=$productosMN[$i]['imagen']?>" width="100%" data-caption="<span style='color: white;'><?=substr($productosMN[$i]['nombre'],0,40)?> <br><?=$productosMN[$i]['tprecio'] != '' ? $productosMN[$i]['tprecio'] : ($productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio']), 2, ',', '.') : 'Consultar')?><?=$productosMN[$i]['precio'] != 'Consultar' ? $productosMN[$i]['tprecio'] != '' ? '' : $_SESSION['moneda'] : ''?></span> <br><a class='vermas3' style='color: #ffffff; top:8px;' href='<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMN[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/'><i class='fa fa-eye'></i> Ver más</a><br><?=$Empresa['etiqpro'] == 1 ? ($productosMN[$i]['tipo_prod'] == 0 ? "<span class='venta-label' style='position: relative; top: -200px;'>Venta</span>": ($productosMN[$i]['tipo_prod'] == 3 ? "<span class='alquiler-label' style='position: relative; top: -200px;'>Alquiler</span>" : "")) : ''?><?=$productosMN[$i]['mostraretqAgo'] == 1 ? "<span class='agotado-label' style='position: relative; top: -200px;'>¡Agotado!</span>" : "" ?><?=$productosMN[$i]['mostraretqOfe'] == 1 ? "<span class='sale-label'  style='position: relative; top: -200px;'>¡Oferta!</span>" : "" ?>" />
    
				<br><br>
		<?php
			}
		?>
	</div>	</div>	</div>


    
</div>

<?php } ?>