<?php
    $sliders = array();

    $sql="SELECT * FROM bd_slider WHERE idcat = $_GET[productos]";
    $query = mysqli_query($dbi, $sql);
    if(mysqli_num_rows($query) >= 1){
        include_once('./componentes/slider2.php');
    }

	function get_product_url($draizp, $language, $product_id, $name){
		//Right Way to Generate Product URL
		$product_url = $draizp;
		if($language)//Add language
			$product_url .= '/'.$language;
		if($product_id)//Add product
			$product_url .= '/producto/'.$product_id;
		if($name)//Add name
			$product_url .= '/'.$name.'/';
		return $product_url;
	}

?>
<div id="contenido">
	<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
		<div id="subcategoriaspr">
            <div class="muestra">
                <?php
                    for ($i = 0; $i < count($subcategorias); $i++)
                    {
                        $nombre = strtolower($subcategorias[$i]['nombre']);
                        $nombre = preg_replace('([^A-Za-z0-9])', '_', $nombre);	   
                ?>
                    <div class="producto">
                        <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/productos/<?=$subcategorias[$i]['id']?>/<?=$nombre?>"><img src="<?=$draizp?>/imagenesproductos/<?=$subcategorias[$i]['imagen'] != null ? $subcategorias[$i]['imagen'] : 'no-img-pro.png'?>" alt="<?=$subcategorias[$i]['nombre']?>" /></a>
                        <span class="descripcion"><?=$subcategorias[$i]['nombre']?></span>
                        <span class="precio"><br></span>
                        <a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/productos/<?=$subcategorias[$i]['id']?>/<?=$nombre?>">entrar</a>
                    </div>
                <?php
                    }
                ?>
            </div>
		</div>
		<div id="panel-superior">
			<?php include('./bloques/paginador.php'); ?>
			<?php include('./bloques/ordenador.php'); ?>
		</div>
		<div id="panel-izquierdo">
                        <?php //include('./bloques/menu_prods.php'); ?>
			<?php include('./bloques/filtros.php'); ?>
			<span name="BtReset" class="button">Limpiar Filtros</span>
		</div>
		<div id="productos">
			<?php
				if (count($productos) < 1) echo 'No hay productos en esta categoría.';
				else{
					for ($i = 0; $i < count($productos); $i++)
					{
						$nombre = utf8_encode(strtr(utf8_decode($productos[$i]['nombre']), utf8_decode($tofind), $replac));
						$nombre = strtolower($nombre);
						$nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
						$classex = 'producto3';
						$product_url = get_product_url($draizp, $_SESSION['lenguaje'], $productos[$i]['id'], $nombre);					
				?>
						<div class="<?=$classex?> producto">
							<a href="<?=$product_url?>"><img class="zoom" src="<?=$draizp?>/imagenesproductos/<?=$productos[$i]['imagen']?>" alt="<?=$productos[$i]['nombre']?>" /></a>
							<span class="descripcion"><?=$productos[$i]['nombre']?></span>
							<span class="descuento"><?=$productos[$i]['descuento'] != 0 ? '-'.$productos[$i]['descuento'].' '.$productos[$i]['descuentoe'] : ''?></span>
							<span class="precioa"><?=$productos[$i]['descuento'] != 0 ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
							<?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
							<span class="precio"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['precio']), 2, ',', '.')?> <?=$productos[$i]['precio'] > 0 ? $_SESSION['moneda'] : ''?><?=$productos[$i]['precio'] == 'Consultar' ? $productos[$i]['precio'] : ''?><!--<?=$productosMN[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?>--></span>
								<a class="vermas" href="<?=$product_url?>">Ver más</a>
							<?php }else{ ?>
								<a class="vermas" style="width: 83% !important;max-width: 83% !important;text-align:center" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productos[$i]['id']?>/<?=$nombre?>/">Ver más</a>
							<?php } ?>
								<?php if($productos[$i]['aplazame'] == 1){ ?>
									<span class="precio" style="max-width: 100%;">Financialo con Aplazame por <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['caplazame1']), 2, ',', '.')?><?=$_SESSION['moneda']?> + <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['caplazame']), 2, ',', '.')?><?=$_SESSION['moneda']?> al mes</span>
								<?php } ?>
						</div>
				<?php
					}
				}
			?>
		</div>
		<input type="hidden" name="nofilters" value="nofilters" />
	</form>
	<div id="panel-inferior">
		<?php include('./bloques/paginador.php'); ?>
	</div>
	<?php /*$horientacion = 'hor'; include_once('./bloques/informacion.php'); ?>
	<?php include_once('./bloques/novedades.php'); ?>
	<?php include_once('./bloques/masvendidos.php');*/ ?>
</div>