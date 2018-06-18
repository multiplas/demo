<?php
                
    $sliders = array();

    $sql="SELECT * FROM bd_slider WHERE idcat = $_GET[productos]";
    $query = mysqli_query($dbi, $sql);
    if(mysqli_num_rows($query) >= 1){
        include_once('./componentes/slider2.php');
    }

?>
<style>
	#grupo-contenido {
		max-width: 1060px !important;
	}

	#grupo-contenido #contenido #productos .producto a.vermas{
		height: 1.5rem;
		text-decoration: none;
	}
</style>
<div id="contenido" class="container">
	<div class="row">
		<div class="col-sm-3">
			<form action="<?=$_SERVER['REQUEST_URI']?>" class="" method="post">
				<div id="subcategoriaspr">
					<div class="muestra">
						<?php
							for ($i = 0; $i < count($subcategorias); $i++)
							{
								$nombre = strtolower($subcategorias[$i]['nombre']);
								$nombre = preg_replace('([^A-Za-z0-9])', '_', $nombre);	   
						?>
							<div class="producto">
								<a href="<?=$draizp?>/productos/<?=$subcategorias[$i]['id']?>/<?=$nombre?>"><img src="<?=$draizp?>/imagenesproductos/<?=$subcategorias[$i]['imagen'] != null ? $subcategorias[$i]['imagen'] : 'no-img-pro.png'?>" alt="<?=$subcategorias[$i]['nombre']?>" /></a>
								<span class="descripcion"><?=$subcategorias[$i]['nombre']?></span>
								<span class="precio"><br></span>
								<a class="vermas" href="<?=$draizp?>/productos/<?=$subcategorias[$i]['id']?>/<?=$nombre?>">entrar</a>
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
					<?php include('./bloques/filtros.php'); 
					if (count($atributos) > 0):	?>
						<span name="BtReset" class="button">Limpiar Filtros</span>
					<?php endif; ?>
				</div>
				<input type="hidden" name="nofilters" value="nofilters" />
			</form>
		</div>
		<div class="col-sm-9">
			<div class="row">
			<?php
				if (count($productos) < 1) echo 'No hay productos en esta categoría.';
				foreach($productos as $producto){
					$productoNombreUrl = str_replace(' ','-',strtolower($producto['nombre']));
					$productoNombreUrl = utf8_encode($productoNombreUrl);
					$productoNombreUrl = strtolower($productoNombreUrl);
					$productoNombreUrl = preg_replace('([^A-Za-z0-9])', '-', $productoNombreUrl);
					$urlProducto = $draizp.'/'.'producto/'.$producto['id'].'/'.$productoNombreUrl.'/';
					$urlImagen = $draizp.'/'.'imagenesproductos/'.$producto['imagen'];
					?>
					<div class="col-sm-4 single-product">
						<div class="imagen-producto text-center">
							<a href="<?=str_replace(' ','-',strtolower($urlProducto))?>">
								<img class="img-responsive" src="<?=$urlImagen?>" alt=""/>
							</a>
							<div class="interaccion">
								<div class="ver-mas-img btn btn-primary estado-inicial"><a href="<?php echo str_replace(' ','-',$urlProducto)?>">Ver más</a></div>
								<form action="<?=$draizp?>/acc/anadir/<?=$producto['id']?>" method="post">
									<button type="submit" data-product="<?=$producto['id']?>" class="vistazo-rapido estado-inicial btn btn-success">
									<i class="fas fa-shopping-cart"></i>
									</button>
								</form>
							</div>
						</div>
						<div class="product-info">
							<div class="titulo-producto">
								<h4><?=$producto['nombre']?></h4>
							</div>
							<div class="descripcion-producto">
								<?=trim(strip_tags( $producto['descripcion']))?>
							</div>
							<div class="product-price"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')?> <?=$producto['precio'] > 0 ? $_SESSION['moneda'] : ''?><?=$producto['precio'] == 'Consultar' ? $producto['precio']: ''?></div>
						</div>
					</div>
			
				<?php
				}
				?>
			</div>
		</div>
	</div>	
	<div id="panel-inferior" class="row">
		<?php include('./bloques/paginador.php'); ?>
	</div>
	<?php /*$horientacion = 'hor'; include_once('./bloques/informacion.php'); ?>
	<?php include_once('./bloques/novedades.php'); ?>
	<?php include_once('./bloques/masvendidos.php');*/ ?>
</div>