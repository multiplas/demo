<div id="contenido">
	<?php
		if ($pack == null)
		{
			echo '<p>El pack indicado no existe!</p>';
		}
		else
		{
			if (@$_SESSION['packconfigurator'] == null)
			{
				?>
				<div id="producto">
					<div class="producto-r">
						<div class="info">
							<h2><?=$pack['nombre']?></h2>
							<span style="text-decoration: none;"><?=$pack['unidades']?> productos</span>
							<span>&nbsp;</span>
							<span><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],@$pack['precio']), 2, ',', '.')?> <?=$_SESSION['moneda']?></span>
						</div>
						<div class="descripcion2">
							<?=$pack['descripcion']?>
						</div>
						<div style="float: right; margin-top: 16px; width: 234px;">
							<span class="fb-share-button" style="float: left; margin-right: 6px;" data-href="http://<?=($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?>" data-layout="button"></span>
							<span class="g-plus" data-action="share" data-annotation="none" data-href="http://<?=($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?>"></span>
							<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="none" data-dnt="true">Twittear</a>
							<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</div>
					</div>
				</div>
				<form action="<?=$draizp?>/pack/<?=$pack['id']?>/2" method="post">
					<div id="productos">
						<h3>Paso 1 de 3: Selección de productos</h3>
						<?php
							$conta = 1;
							foreach ($pack['productos'] AS $productos)
							{
								?>
								<h4><?=$conta++?>. Seleccine uno de estos productos</h4>
								<div class="muestra">
									<?php
									foreach ($productos AS $producto)
									{
										?>
										<div class="producto">
											<a href="<?=$draizp?>/producto/<?=$producto['id']?>"><img src="<?=$draizp?>/imagenesproductos/<?=$producto['imagen']?>" alt="<?=$producto['nombre']?>" /></a>
											<span class="descripcion"><?=$producto['nombre']?></span>
											<span class="descuento"></span>
											<span class="precioa"></span><br>
											<span class="precio"></span>
											<a class="vermas" style="float: left;" href="javascript: void();" onclick="javascript: $('#seleccionadogrupos<?=$conta?>').val('<?=$producto['id']?>'); $(this).parent().siblings().css('border-color', '#BB879D').css('background-color', '#FFF'); $(this).parent().css('background-color', '#F0F0F0'); $(this).parent().css('border-color', '#9B479D');">Seleccionar</a>
											<a class="vermas" target="_blank" href="<?=$draizp?>/producto/<?=$producto['id']?>">Ver más</a>
										</div>
										<?php
									}
									?>
									<input type="hidden" id="seleccionadogrupos<?=$conta?>" name="seleccionadogrupos[]" value="">
								</div>
								<?php
							}
						?>
					</div>
					<a href="<?=$draizp?>/allpacks" class="buttonGray">&laquo; Volver</a>
					<input type="submit" class="button" value="Siguiente &raquo;">
				</form>
			<?php
			}
			else if (@$_SESSION['packconfigurator']['paso'] == 2)
			{ // Personalización.
				?>
				<form action="<?=$draizp?>/pack/<?=$pack['id']?>/3" method="post">
					<div id="productos">
						<h2><?=$pack['nombre']?></h2>
						<h3>Paso 2 de 3: Personalizacice su selección</h3>
						<div class="muestra">
							<?php
							foreach ($_SESSION['packconfigurator']['productos'] AS $producto)
							{
								?>
									<div class="producto">
										<img src="<?=$draizp?>/imagenesproductos/<?=$producto['imagen']?>" alt="<?=$producto['nombre']?>" />
										<span class="descripcion"><?=$producto['nombre']?></span>
										<select name="<?=$producto['id']?>talla">
											<?php
												if (count($producto['tallas']) < 1)
												{
													?>
													<option value="sin-talla" selected>Sin Talla</option>
													<?php
												}
												else
												{
													?>
													<option value="">Elige Talla</option>
													<?php
												}
											?><?php
												foreach ($producto['tallas'] AS $talla)
												{
													?>
													<option value="<?=strtolower($talla)?>"><?=$talla?></option>
													<?php
												}
											?>
										</select>
										<select name="<?=$producto['id']?>persopk" class="persopk" style="display: <?=$producto['personalizable'] != 1 ? 'none;' : 'block'?>; width: 100%;">
											<option value="0">Sin Personalizar</option>
											<option value="1">Nombre y/o número (+number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],5), 2, ',', '.')<?=$_SESSION['moneda']?>)</option>
											<option value="2">Nombre y/o número + bandera (+number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],8), 2, ',', '.')<?=$_SESSION['moneda']?>)</option>
										</select>
										<div class="persopkel" style="display: none; height: 0px; overflow: hidden; width: 100%;">
											<input type="text" name="<?=$producto['id']?>tunombre" placeholder="Nombre;Número Ej: Luís;9" style="width: 100%;" value=""><br>
											<select name="<?=$producto['id']?>bandera">
												<option value="" selected>Sin Bandera</option>
												<?php
													foreach($paises as $pais)
														echo '<option value="'.$pais['nombre'].'">'.$pais['nombre'].'</option>';
												?>
											</select>
										</div>
									</div>
								<?php
							}
							?>
						</div>
						<br>
					</div>
					<a href="<?=$draizp?>/pack/<?=$_GET['pack']?>" class="buttonGray">&laquo; Volver</a>
					<input type="submit" class="button" value="Siguiente &raquo;">
				</form>
				<?php
			}
			else if (@$_SESSION['packconfigurator']['paso'] == 3)
			{ // Confirmación.
				?>
				<form action="<?=$draizp?>/acc/anadirv/<?=$pack['id']?>" method="post">
					<div id="productos">
						<h2><?=$pack['nombre']?></h2>
						<h3>Paso 3 de 3: Confirmación de pack</h3>
						<div class="producto-r">
							<div>
								<div style="background: #FFF; border: solid 1px #DF3B39; padding: 3% 5%; width: auto;">
									<div style="color: #DF3B39; float: right; font-size: 2.2rem; font-weight: bold; margin-top: 3%;"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pack['precio']), 2, ',', '.')?> <?=$_SESSION['moneda']?></div>
									<h2><?=$pack['nombre']?></h2>
									<p><?=$pack['unidades']?> productos</p>
								</div>
								<?php
									$costead = 0;
									foreach ($_SESSION['packconfigurator']['productos'] AS $producto)
									{
										$costead += $producto['peropcion'] == 0 ? 0 : ($producto['peropcion'] == 1 ? 5 : ($producto['peropcion'] == 2 ? 8 : 0));
										?>
										<div style="background: #FFF; border: solid 1px #DF3B39; margin-top: 2%; padding: 3% 5%; width: auto;">
											<div style="color: #DF3B39; float: right; font-size: 2.2rem; font-weight: bold; margin-top: 3%;"><?=$producto['peropcion'] == 0 ? '0,00' . $_SESSION['moneda'] : ($producto['peropcion'] == 1 ? '+ '.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],5), 2, ',', '.') . $_SESSION['moneda'] : ($producto['peropcion'] == 2 ? '+ ' . number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],8),2, ',', '.') . $_SESSION['moneda'] : ''))?></div>
											<h2><?=$producto['nombre']?></h2>
											<p><?=strtoupper($producto['pertalla'])?><br><span style="color: #AB3A72;"><?=$producto['peropcion'] == 0 ? 'SIN-PERSONALIZAR' : ($producto['peropcion'] == 1 ? $producto['pernombre'] : ($producto['peropcion'] == 2 ? $producto['pernombre'].' ['.$producto['perbandera'].']' : ''))?></span></p>
										</div>
										<?php
									}
								?>
								<div style="background: #DF3B39; border-top: solid 10px #BF1B19; color: #FFF; margin-top: 2%; padding: 1% 5%; width: auto;">
									<div style="color: #FFF; float: right; font-size: 2.2rem; font-weight: bold; margin-top: 3%;"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pack['precio'] + $costead), 2, ',', '')?> <?=$_SESSION['moneda']?></div>
									<h2>Total del pack</h2>
									<p><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pack['precio']), 2, ',', '.')?> <?=$_SESSION['moneda']?> + <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$costead), 2, ',', '')?> <?=$_SESSION['moneda']?></p>
								</div>
							</div>
						</div>
					</div>
					<a href="<?=$draizp?>/pack/<?=$_GET['pack']?>/2" class="buttonGray">&laquo; Volver</a>
					<input type="submit" class="button" value="Añadir a la cesta">
				</form>
				<?php
			}
		}
	?>
</div>