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
    </style>
    

    
	<span class="tfiltro"><?php
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
				<div id='producto_<?=$i?>' class="<?=$Empresa['ftamano'] == 1 ? 'producto': ''?>" style="border: none !important; -webkit-animation-delay: <?=$i*0.2?>s; -moz-animation-delay: <?=$i*0.2?>s; width: 100% !important">
                                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/"><img <?=$Empresa['ftamano'] == 1 ? 'class="zoom"': 'style="width: 100%;"'?> src="<?=$draizp?>/imagenesproductos/<?=$productosMN[$i]['imagen']?>" alt="<?=$productosMN[$i]['nombre']?>" /></a>
                                    <span class="descripcion"><?=$productosMN[$i]['nombre']?></span>
                                    
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                        <span class="precio"><?=$productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productosMN[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span><br><br>
                        
                    <?php }else{ ?>
                        
                    <?php } ?>
                        <a class="vermas3" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productos[$i]['id']?>/<?=$nombre?>/"><i class="fa fa-eye"></i> Ver más</a>
                                </div><br><br>
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
        
        
        <img src="<?=$draizp?>/imagenesproductos/<?=$productosMN[$i]['imagen']?>" width="100%" data-caption="<span style='color: white;'><?=substr($productosMN[$i]['nombre'],0,40)?> <br><?=$productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productosMN[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span> <br><a class='vermas3' style='color: #ffffff; top:8px;' href='<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productos[$i]['id']?>/<?=$nombre?>/'><i class='fa fa-eye'></i> Ver más</a>" />
    
				<br><br>
		<?php
			}
		?>
	</div>
        <?php if (count($productosMN) > 0) echo '</div></div>'; ?>
    
</div>

<?php } ?>