<?php if($Empresa['masvendido'] == 1){ ?>

<div id="masvendidos">
    
    <?php 
    
       if($inicio == 1){
    
    ?>
    
    <span class="tfiltro2"><span class="decor2">Más Vendidos</span></span>
	<div class="muestra">
		<?php
			if (count($productosMV) < 1) echo 'No hay productos disponibles.';
			for ($i = 0; $i < count($productosMV); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMV[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                //$nombre = str_replace(" ", "_", $nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	
                
                $idPI = $productosMV[$i]['id'];
                $sql = "SELECT imagen FROM bd_fotos WHERE idproducto=$idPI LIMIT 1;";
			    $query = mysqli_query($dbi, $sql);
                if(mysqli_num_rows($query)>0){
                    $assoc = mysqli_fetch_array($query);
                    $imagen = $assoc['imagen'];
                }else
                    $imagen = $productosMV[$i]['imagen'];
                
		?>
				<div class="producto" style="border: none !important;">
                    <div class="contenedor"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/"><img src="<?=$draizp?>imagenesproductos/<?=$imagen?>" alt="<?=$productosMV[$i]['nombre']?>" /><img class="top" src="<?=$draizp?>/imagenesproductos/<?=$productosMV[$i]['imagen']?>" alt="<?=$productosMV[$i]['nombre']?>" /></a></div>
                    <span class="descripcion2"><?=$productosMV[$i]['nombre']?></span>
					<span class="descuento"><?=$productosMV[$i]['descuento'] != 0 && $productosMV[$i]['precio'] != 'Consultar' ? '-'.$productosMV[$i]['descuento'].' '.$productosMV[$i]['descuentoe'] : ''?></span>
					<span class="precioa"><?=$productosMV[$i]['descuento'] != 0 && $productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
					   <span class="precio"><?=$productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productosMV[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span>
                        <a class="vermas2" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/">Ver más</a>
                    <?php }else{ ?>
                        <a class="vermas2 vermas3" style="width: 83% !important;max-width: 83% !important;text-align:center;" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/">Ver más</a>
                    <?php } ?>
					
				</div>
		<?php
			}
		?>
	</div>
    
    <?php 
    
        }else if($inicio == 3){
            $productosMV = ProductosConCriterio(8, 'ventas');
    ?>
    
    <span class="tfiltro"><?php
            for($i=0; $i<=count($labelidioma); $i++){
                if($labelidioma[$i][0] == 'vendidos'){
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
			if (count($productosMV) < 1) echo $aux;
			for ($i = 0; $i < count($productosMV); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMV[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                //$nombre = str_replace(" ", "_", $nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	     					
                
		?>
				<div class="producto">
					<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/"><img class="zoom" src="<?=$draizp?>/imagenesproductos/<?=$productosMV[$i]['imagen']?>" alt="<?=$productosMV[$i]['nombre']?>" /></a>
					<span class="descripcion"><?=$productosMV[$i]['nombre']?></span>
					<span class="descuento"><?=$productosMV[$i]['descuento'] != 0 && $productosMV[$i]['precio'] != 'Consultar' ? '-'.$productosMV[$i]['descuento'].' '.$productosMV[$i]['descuentoe'] : ''?></span>
					<span class="precioa"><?=$productosMV[$i]['descuento'] != 0 && $productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
					   <span class="precio"><?=$productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productosMV[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span>
                        <a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/"><?=$aux1?></a>
                    <?php }else{ ?>
                        <a class="vermas" style="width: 83% !important;max-width: 83% !important;text-align:center;" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/"><?=$aux1?></a>
                    <?php } ?>
					
				</div>
		<?php
			}
		?>
	</div>
    
    <?php }else{ ?>
    
	<span class="tfiltro">Más Vendidos</span>
	<div class="muestra">
		<?php
			if (count($productosMV) < 1) echo 'No hay productos disponibles.';
			for ($i = 0; $i < count($productosMV); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($productosMV[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                //$nombre = str_replace(" ", "_", $nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	     					
                
		?>
				<div class="producto">
					<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/"><img class="zoom" src="<?=$draizp?>/imagenesproductos/<?=$productosMV[$i]['imagen']?>" alt="<?=$productosMV[$i]['nombre']?>" /></a>
					<span class="descripcion"><?=$productosMV[$i]['nombre']?></span>
					<span class="descuento"><?=$productosMV[$i]['descuento'] != 0 && $productosMV[$i]['precio'] != 'Consultar' ? '-'.$productosMV[$i]['descuento'].' '.$productosMV[$i]['descuentoe'] : ''?></span>
					<span class="precioa"><?=$productosMV[$i]['descuento'] != 0 && $productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
					   <span class="precio"><?=$productosMV[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosMV[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productosMV[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span>
                        <a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/">Ver más</a>
                    <?php }else{ ?>
                        <a class="vermas" style="width: 83% !important;max-width: 83% !important;text-align:center;" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosMV[$i]['id']?>/<?=$nombre?>/">Ver más</a>
                    <?php } ?>
					
				</div>
		<?php
			}
		?>
	</div>
    <?php } ?>
</div>

<?php } ?>