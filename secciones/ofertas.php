<div id="contenido">
	<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
		<div id="panel-superior">
			<?php include('./bloques/paginador.php'); ?>
			<?php include('./bloques/ordenador.php'); ?>
		</div>
		<div id="panel-izquierdo">
			<?php include('./bloques/filtros.php'); ?>
			<span name="BtReset" class="button">Limpiar Filtros</span>
		</div>
		<div id="productos">
			<?php
				if (count($productos) < 1) echo 'No hay productos en esta categoría.';
				for ($i = 0; $i < count($productos); $i++)
				{
					$classex = 'producto3';
			?>
					<div class="<?=$classex?> producto">
						<a href="<?=$draizp?>/producto/<?=$productos[$i]['id']?>"><img src="<?=$draizp?>/imagenesproductos/<?=$productos[$i]['imagen']?>" alt="<?=$productos[$i]['nombre']?>" /></a>
						<span class="descripcion"><?=$productos[$i]['nombre']?></span>
						<span class="descuento"><?=$productos[$i]['descuento'] != 0 && $productos[$i]['precio'] != 'Consultar' ? '-'.$productos[$i]['descuento'].' '.$productos[$i]['descuentoe'] : ''?></span>
						<span class="precioa"><?=$productos[$i]['descuento'] != 0 && $productos[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
						<span class="precio"><?=$productos[$i]['precio']?><?=$productos[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span>
						<a class="vermas" href="<?=$draizp?>/producto/<?=$productos[$i]['id']?>">Ver más</a>
					</div>
			<?php
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