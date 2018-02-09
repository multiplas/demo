<div id="contenido">
	<form action="#" method="post">
		<div id="panel-izquierdo">
			<p>
				Estos son tus packs, los packs tienen como precio la suma del precio actual de los productos y también se les aplica el descuento por cantidad de compra.
			</p>
			<p>
				Si quieres crear tus propios packs en la web, puedes hacerlo desde la sección PACKS &raquo; Crea Tu Pack del menú o haciendo <a href="<?=$draizp?>/crearpack" style="color: #3A92C2;">click aquí</a>.
			</p>
		</div>
		<div id="productos">
			<?php
				if (count($packs) < 1) echo 'No hay packs en esta categoría.';
				for ($i = 0; $i < count($packs); $i++)
				{
					$classex = 'producto3';
			?>
					<div class="<?=$classex?> producto">
						<a href="<?=$draizp?>/pack/<?=$packs[$i]['id']?>"><img src="<?=$draizp?>/imagenesproductos/<?=$packs[$i]['imagen']?>" alt="<?=$packs[$i]['nombre']?>" /></a>
						<span class="descripcion"><?=$packs[$i]['nombre']?></span>
						<span class="descuento"><?=$packs[$i]['descuento'] != 0 ? '-'.$packs[$i]['descuento'].' %' : ''?></span>
						<span class="precioa"><?=$packs[$i]['descuento'] != 0 ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$packs[$i]['precio']), 2, ',', '.'). $_SESSION['moneda'] : ''?></span><br>
						<span class="precio"><?=$packs[$i]['descuento'] != 0 ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($packs[$i]['precio'] * ((100 - $packs[$i]['descuento']) / 100))), 2, ',', '.') : number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$packs[$i]['precio']), 2, ',', '.')?> <?=$_SESSION['moneda']?></span>
						<a class="vermas" href="<?=$draizp?>/pack/<?=$packs[$i]['id']?>">Ver más</a>
					</div>
			<?php
				}
			?>
		</div>
	</form>
</div>