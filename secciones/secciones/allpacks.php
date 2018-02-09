<div id="contenido">
	<form action="#" method="post">
		<div id="panel-izquierdo">
			<p>
				Estos son todos los packs de la web, los packs contienen una selección de producto a elegir con un precio especial.
			</p>
			<p>
				Debes elegir entre varias opciones de producto por cada linea de producto para añadir el pack a la cesta.
			</p>
		</div>
		<div id="productos">
			<?php
				if (count($packs) < 1) echo 'No hay packs en esta categoría.';
				$max = count($packs) < 9 ? count($packs) : 9;
				for ($i = 0; $i < $max; $i++)
				{
					$classex = 'producto3';
			?>
					<div class="<?=$classex?> producto">
						<a href="<?=$draizp?>/pack/<?=$packs[$i]['id']?>"><img src="<?=$draizp?>/imagenesproductos/<?=$packs[$i]['imagen']?>" alt="<?=$packs[$i]['nombre']?>" /></a>
						<span class="descripcion" style="font-size: 1rem;"><?=$packs[$i]['nombre']?></span>
						<span class="descuento">Elige <?=$packs[$i]['unidades']?> productos</span>
						<span class="precioa"></span><br>
						<span class="precio"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$packs[$i]['precio']), 2, ',', '.')?> <?=$_SESSION['moneda']?></span>
						<a class="vermas" href="<?=$draizp?>/pack/<?=$packs[$i]['id']?>">Ver más</a>
					</div>
			<?php
				}
			?><br><br>
			<?php if ($_GET['allpacks'] > 1) { ?><a class="button" href="<?=$draizp?>/allpacks/<?=$_GET['allpacks']-1?>">Ver packs más recientes</a><?php } ?>
			<?php if (count($packs) > 9) { ?><a class="button" href="<?=$draizp?>/allpacks/<?=$_GET['allpacks']+1?>" style="float: right;">Ver packs más antiguos</a><?php } ?>
		</div>
	</form>
</div>