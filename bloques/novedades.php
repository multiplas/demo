<?php if($Empresa['novedades'] == 1){ ?>

<div id="novedades">
    
    <?php 
    
       if($inicio == 1){
       $urlimg = '/temporal/imagenesproductos/56bdade7a833d.jpg';

        ?>
    <style>
    
        .contenedor {
          position: relative;
          height: 230px;
          transition: box-shadow 0.5s ease-in-out;
        }
        
        .contenedor a img {
          position: absolute;
          left: 0;
          transition: opacity 0.5s ease-in-out;
        }

        .contenedor a img.top:hover {
          opacity: 0;
        }
        
        .vermas2{
            margin-right: 1.5em !important;
            margin-bottom: 1.5em !important;
        }
        
        .vermas3{
            margin-right: 1px !important;
            margin-bottom: 2px !important;
        }
        
        .producto{
            text-align:center;
            width:23% !important;
            padding:0px !important;
        }
        
        @media (max-width:593px)
        {
            
            .contenedor{
                height: 700px;
            }
        }
        
        @media (max-width:950px)
        {
            .producto{

                width:48% !important;

            }
            
            .contenedor{
                height: 425px;
            }
        }
    
    </style>
    <?php
           
    ?>
    <span class="tfiltro2"><span class="decor">Novedades</span></span>
	<div class="muestra">
		<?php
			if (count($productosMN) < 1) echo 'No hay productos disponibles.';
			for ($i = 0; $i < count($productosMN); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMN[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
                $idPI = $productosMN[$i]['id'];
                $sql = "SELECT imagen FROM bd_fotos WHERE idproducto=$idPI LIMIT 1;";
			    $query = mysqli_query($dbi, $sql);
                if(mysqli_num_rows($query)>0){
                    $assoc = mysqli_fetch_array($query);
                    $imagen = $assoc['imagen'];
                }else
                    $imagen = $productosMN[$i]['imagen'];
		?>
				<div class="producto" style="border: none !important;">
                    <div class="contenedor"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/"><img src="<?=$draizp?>/imagenesproductos/<?=$imagen?>" alt="<?=$productosMN[$i]['nombre']?>" /><img class="top" src="<?=$draizp?>/imagenesproductos/<?=$productosMN[$i]['imagen']?>" alt="<?=$productosMN[$i]['nombre']?>" /></a></div>
					<span class="descripcion2"><?=$productosMN[$i]['nombre']?></span>
					<span class="descuento"><?=$productosMN[$i]['descuento'] != 0 && $productosMN[$i]['precio'] != 'Consultar' ? '-'.$productosMN[$i]['descuento'].' '.$productosMN[$i]['descuentoe'] : ''?></span>
					<span class="precioa"><?=$productosMN[$i]['descuento'] != 0 && $productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                        <span class="precio"><?=$productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productosMN[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span>
                        <a class="vermas2" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/">Ver más</a>
                    <?php }else{ ?>
                        <a class="vermas2 vermas3" style="width: 83% !important;max-width: 83% !important;text-align:center" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/">Ver más</a>
                    <?php } ?>
				</div>
		<?php
			}
		?>
	</div>
    
    <?php }else if($inicio == 3){ 
            $productosMN = ProductosConCriterio(8, 'novedades');
    ?>
    
    <style>
    
        #grupo-contenido #contenido #productos .producto:first-child, #grupo-contenido #contenido #novedades div.muestra div.producto:first-child, #grupo-contenido #contenido #masvendidos div.muestra div.producto:first-child
        {
            margin-left: 0.7%;
            margin-right: 0.7%;
            margin-bottom: 1.6%;
        }

        #grupo-contenido #contenido #productos .producto:not(:first-child), #grupo-contenido #contenido #novedades div.muestra div.producto:not(:first-child), #grupo-contenido #contenido #masvendidos div.muestra div.producto:not(:first-child)
        {
            margin-left: 0.7%;
            margin-right: 0.7%;
            margin-bottom: 1.6%;
        }
        
        #grupo-contenido #contenido #novedades, #grupo-contenido #contenido #bajo{
            padding: 0px 0px;
        }
    
    </style>
    
    <span class="tfiltro">Novedades</span>
	<div class="muestra">
		<?php
			if (count($productosMN) < 1) echo 'No hay productos disponibles.';
			for ($i = 0; $i < count($productosMN); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMN[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
		?>
				<div class="producto">
					<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/"><img class="zoom" src="<?=$draizp?>/imagenesproductos/<?=$productosMN[$i]['imagen']?>" alt="<?=$productosMN[$i]['nombre']?>" /></a>
					<span class="descripcion"><?=$productosMN[$i]['nombre']?></span>
					<span class="descuento"><?=$productosMN[$i]['descuento'] != 0 && $productosMN[$i]['precio'] != 'Consultar' ? '-'.$productosMN[$i]['descuento'].' '.$productosMN[$i]['descuentoe'] : ''?></span>
					<span class="precioa"><?=$productosMN[$i]['descuento'] != 0 && $productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                        <span class="precio"><?=$productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productosMN[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span>
                        <a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/">Ver más</a>
                    <?php }else{ ?>
                        <a class="vermas" style="width: 83% !important;max-width: 83% !important;text-align:center" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/">Ver más</a>
                    <?php } ?>
				</div>
		<?php
			}
		?>
	</div>
    
    <?php }else{ ?>
    
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
	<div class="muestra">
		<?php
			if (count($productosMN) < 1) echo $aux;
			for ($i = 0; $i < count($productosMN); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMN[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
		?>
				<div class="producto">
					<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/"><img class="zoom" src="<?=$draizp?>/imagenesproductos/<?=$productosMN[$i]['imagen']?>" alt="<?=$productosMN[$i]['nombre']?>" /></a>
					<span class="descripcion"><?=$productosMN[$i]['nombre']?></span>
					<span class="descuento"><?=$productosMN[$i]['descuento'] != 0 && $productosMN[$i]['precio'] != 'Consultar' ? '-'.$productosMN[$i]['descuento'].' '.$productosMN[$i]['descuentoe'] : ''?></span>
					<span class="precioa"><?=$productosMN[$i]['descuento'] != 0 && $productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                        <span class="precio"><?=$productosMN[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMN[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productosMN[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span>
                        <a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/"><?=$aux1?></a>
                    <?php }else{ ?>
                        <a class="vermas" style="width: 83% !important;max-width: 83% !important;text-align:center" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/"><?=$aux1?></a>
                    <?php } ?>
				</div>
		<?php
			}
		?>
	</div>
    <?php } ?>
</div>
<hr>

<?php } ?>