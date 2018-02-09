<?php if($Empresa['novedades'] == 1){ ?>

    <?php if($Empresa['mgfacebook'] != '' && ($Empresa['mgflugar'] == 1 || $Empresa['mgflugar'] == 2)){ ?>
<style>
    @media (min-width:1120px){
        .facemg{
            float: left;
        }
        
        .artifmg{
            float: right;
            max-width: 770px !important;  
        }
    }
    
    @media (min-width:1050px) and (max-width:1119px){
        .facemg{
            float: left;
        }
        
        .artifmg{
            float: right;
            max-width: 700px !important;  
        }
    }
    
    @media (min-width:1000px) and (max-width:1049px){
        .facemg{
            float: left;
        }
        
        .artifmg{
            float: right;
            max-width: 650px !important;  
        }
    }
    
    @media (min-width:940px) and (max-width:999px){
        .facemg{
            float: left;
        }
        
        .artifmg{
            float: right;
            max-width: 585px !important;  
        }
    }
</style>
<div class="facemg" style="margin-left: auto; margin-right: auto; width: 255px">
            <iframe src="https://www.facebook.com/plugins/page.php?href=<?=$Empresa['mgfacebook']?>&tabs=&width=255&height=230&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="230" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
        </div>
    <?php } ?>

<div id="novedades" class="artifmg" style="border: 1px solid rgb(221, 221, 221); padding: 15px;">
    
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
			if (count($productosMN) < 1) echo $aux;
			for ($i = 0; $i < count($productosMN); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMN[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
		?>
				<div id='producto_<?=$i?>' class="<?=$Empresa['ftamano'] == 1 ? 'producto': ''?>" style="border: none !important; -webkit-animation-delay: <?=$i*0.2?>s; -moz-animation-delay: <?=$i*0.2?>s; width: 24% !important; display: inline-table;">
                                    <?=$Empresa['etiqpro'] == 1 ? ($productosMN[$i]['mostraretq'] == 1 ? (($productosMN[$i]['tipo_prod'] == 0 ? '<span class="venta-label">Venta</span>' : ($productosMN[$i]['tipo_prod'] == 3 ? '<span class="alquiler-label">Alquiler</span>' : ''))) : '') : '' ?>	
                                    <?=$productosMN[$i]['mostraretqAgo'] == 1 ? '<span class="agotado-label">¡Agotado!</span>' : ''?>
                                    <?=$productosMN[$i]['mostraretqOfe'] == 1 ? '<span class="sale-label">¡Oferta!</span>' : ''?>
                                    <?php if ($Empresa['det_producto'] == 1){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/"><?php } ?><img <?=$Empresa['ftamano'] == 1 ? 'class="zoom"': 'style="width: 100%;"'?> src="<?=$draizp?>/imagenesproductos/<?=$productosMN[$i]['imagen']?>" alt="<?=$productosMN[$i]['nombre']?>" /><?php if ($Empresa['det_producto'] == 1){ ?></a><?php } ?>
                                    <span class="descripcion"><?php if ($Empresa['det_producto'] == 1){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/"><?php } ?><?=$productosMN[$i]['nombre']?><?php if ($Empresa['det_producto'] == 1){ ?></a><?php } ?></span>
                                    
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                                    <?php if ($Empresa['det_producto'] == 1){ ?><span class="precio"><?=$productosMN[$i]['tprecio'] != '' ? $productosMN[$i]['tprecio'] : ($productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio']), 2, ',', '.') : 'Consultar')?><?=$productosMN[$i]['precio'] != 'Consultar' ? $productosMN[$i]['tprecio'] != '' ? '' : $_SESSION['moneda'] : ''?></span><br><?php } ?>
                        
                    <?php }else{ ?>
                        
                    <?php } ?>
                        <?php if ($Empresa['det_producto'] == 1){ ?><a class="vermas3" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/"><i class="fa fa-eye"></i> Ver más</a><?php } ?>
                                </div>
		<?php
			}
		?>
	</div>
    
    <div class="muestra2" style="text-align: center;">
		<?php
			if (count($productosMN) < 1) echo $aux;
                        if(count($productosMN) > 0){ echo '<div id="sli" style="width: 100% !important;margin: 0 auto;padding-top: 0em;">
                        <div class="fotorama" data-width="100%" data-click="true" data-ratio="16/9" data-minwidth="10" data-maxwidth="2000" data-minheight="10" data-maxheight="60%" data-loop="true" data-autoplay="true" data-arrows="true" data-click="false" data-fit="cover" data-nav="dots" data-swipe="true">'; }
			for ($i = 0; $i < count($productosMN); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMN[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
		?>
        
        
        <img src="<?=$draizp?>/imagenesproductos/<?=$productosMN[$i]['imagen']?>" width="100%" data-caption="<span style='color: white;'><?=substr($productosMN[$i]['nombre'],0,40)?> <br> <?php if ($Empresa['det_producto'] == 1){ ?><?=$productosMN[$i]['tprecio'] != '' ? $productosMN[$i]['tprecio'] : ($productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio']), 2, ',', '.') : 'Consultar')?><?=$productosMN[$i]['precio'] != 'Consultar' ? $productosMN[$i]['tprecio'] != '' ? '' : $_SESSION['moneda'] : ''?></span> <br><a class='vermas3' style='color: #ffffff; top:8px;' href='<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productos[$i]['id']?>/<?=str_replace("--", "-", $nombre)?>/'><i class='fa fa-eye'></i> Ver más</a><br><?php } ?><?=$Empresa['etiqpro'] == 1 ? ($productosMN[$i]['tipo_prod'] == 0 ? "<span class='venta-label' style='position: relative; top: -200px;'>Venta</span>": ($productosMN[$i]['tipo_prod'] == 3 ? "<span class='alquiler-label' style='position: relative; top: -200px;'>Alquiler</span>" : "")) : ''?><?=$productosMN[$i]['mostraretqAgo'] == 1 ? "<span class='agotado-label' style='position: relative; top: -200px;'>¡Agotado!</span>" : "" ?><?=$productosMN[$i]['mostraretqOfe'] == 1 ? "<span class='sale-label'  style='position: relative; top: -200px;'>¡Oferta!</span>" : "" ?>" />
    
				<br><br>
		<?php
			}
		?>
	</div>
        <?php if (count($productosMN) > 0) echo '</div></div>'; ?>
    
</div>

<?php } ?>