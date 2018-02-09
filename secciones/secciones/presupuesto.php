<?php

        for($i=0; $i<=count($labelidioma); $i++){
            if($labelidioma[$i][0] == 'cesta_cesta'){
                $aux0 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'compras_cesta'){
                $aux1 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'titulo_cesta'){
                $aux2 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'no_cesta'){
                $aux3 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'actualizar'){
                $aux4 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'seguir'){
                $aux5 = $nombreidioma[$i][0];
            }
            
            if($labelidioma[$i][0] == 'producto'){
                $aux6 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'cantidad'){
                $aux7 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'preciouni'){
                $aux8 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'total'){
                $aux9 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'gastos'){
                $aux10 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'titulo_gastos'){
                $aux11 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'baseimp'){
                $aux12 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'info'){
                $aux13 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'realizarcompra'){
                $aux14 = $nombreidioma[$i][0];
            }
            if($labelidioma[$i][0] == 'gratis'){
                $aux15 = $nombreidioma[$i][0];
            }
        }
    ?>

<div id="contenido">
	<div id="articulo">
		<h2>Presupuesto</h2>
		<?php
			if (count($cesta) < 1) echo '<p>No hay productos en tu cesta!</p>';
			else
			{
		?>
            <form action="<?=$draizp?>/acc/enviarpresupuesto" method="post">
				<table id="tcesta">
					<thead>
						<tr>
							<th></th>
							<th colspan="2"><?=$aux6?></th>
							<th><?=$aux7?></th>
							<th><?=$aux8?></th>
							<th>Precio/Per</th>
							<th><?=$aux9?></th>
						</tr>
					</thead>
					<tbody>
						<?php
							$total = 0;
							$peso = 0;
                            $i = 0;
							foreach ($cesta AS $micesta)
							{
								$total += ($micesta['precio'] + $micesta['personalizacion']) * $micesta['cantidad'];
								$peso += ($micesta['peso'] * $micesta['cantidad']);
                                $nombre = utf8_encode(strtr(utf8_decode($micesta['nombre']), utf8_decode($tofind), $replac));
                                $nombre = strtolower($nombre);
                                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
						?>
								<tr>
									<td><?php if ($micesta['id'] > 0) { ?><a href="<?=$draizp?>/acc/quitar/<?=$micesta['id']?>/<?=$micesta['talla'] != null ? $micesta['talla'] : 'nada'?>/<?=$micesta['pack'] !== true ? $micesta['extra'] : 'null'?>" onclick="return confirm('Seguro que desea elminar el <?=$micesta['pack'] !== true ? 'producto' : 'pack'?> `<?=$micesta['nombre']?><?=($micesta['talla']!=null ? ' ('.$micesta['talla'].')' : '(nada)')?><?=($micesta['color']!=null ? ' ('.$micesta['color'].')' : '')?>` de su cesta?');">X</a><?php } ?></td>
									<td style="position: relative;">
                                        <input type="hidden" name="prod<?=$i?>" value="<?=$micesta['nombre']?>" />
                                        <input type="hidden" name="atr<?=$i?>" value="<?=$micesta['talla']?>" />
                                        <input type="hidden" name="can<?=$i?>" value="<?=$micesta['cantidad']?>" />
										<?=is_numeric($micesta['descuento']) ? '' : $micesta['descuento']?>
										<img src="<?=$draizp?>/imagenesproductos/<?=$micesta['imagen']?>" alt="<?=$micesta['nombre']?>">
										<?php if ($micesta['stock'] != null) { ?><img style="position: absolute; right: 0px;" src="<?=$draizp?>/source/<?=$micesta['stock']?>" alt=""><?php } ?>
									</td>
									<td>
										<?php if(is_numeric($micesta['descuento'])) { ?><a href="<?=$draizp?>/<?=$micesta['pack'] !== true ? 'producto' : 'pack'?>/<?=$micesta['id']?>/<?=$nombre?>/"><?=$micesta['nombre']?></a><?php } else { ?><span class="enlazado"><?=$micesta['nombre']?></span><?php } ?>
										<span><?=($micesta['talla']!=null ? $micesta['talla'] : '')?> <?=($micesta['color']!=null ? ' ('.$micesta['color'].')' : '')?><?=($micesta['extra']!=null ? $micesta['extra'] : '')?></span>
									</td>
									<td>
										<form method="post" name="cesta<?=$micesta['id']?>" action="<?=$draizp?>/acc/actualizar/<?=$micesta['id']?>">
											<input type="text" class="miniF" id="cantidad<?=$micesta['id']?>" name="cantidad" value="<?=$micesta['cantidad']?>"<?=$micesta['id'] > 0 ? '' : ' readonly'?> />
											<input type="hidden" id="htalla<?=$micesta['id']?>" name="htalla" value="<?=$micesta['pack'] !== true ? $micesta['talla'] : 'null'?>" />
											<input type="hidden" id="hcolor<?=$micesta['id']?>" name="hcolor" value="<?=$micesta['pack'] !== true ? $micesta['extra'] : 'null'?>" />
										</form>
									</td>
									<td>
										-
									</td>
									<td><?=$micesta['personalizacion'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['personalizacion']), 2, ',', '.').$_SESSION['moneda'] : 'N/A'?></td>
									<td>-</td>
								</tr>
						<?php
                            $i++;
							}
                        ?>
                            <input type="hidden" name="total" value="<?=$i?>" />
                        <?php
							
							$portes = CalculaPortes($peso, $total, @$_SESSION['usr']['pais']);
							$abono = Abono(@$_SESSION['usr']['id']);
							$total = $total - $abono;
							
							if ($abono > 0)
							{
								?>
									<tr>
										<td></td>
										<td style="position: relative;"><span style="color: #FFF; font-size: 1.6rem; left: 43%; position: absolute; top: 45%;"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$abono), 2, ',', '.')?><?=$_SESSION['moneda']?></span><img src="<?=$draizp?>/imagenesproductos/abonos.png" alt="<?=$micesta['nombre']?>"></td>
										<td><span class="enlazado">Abonos acumulados</span><span>Descuentos acumulables por opinar</span></td>
										<td>
											<form method="post" action="#">
												<input type="text" class="miniF" name="desertor" value="1" readonly />
											</form>
										</td>
										<td>- <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$abono), 2, ',', '.')?> <?=$_SESSION['moneda']?></td>
										<td>N/A</td>
										<td>- <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$abono), 2, ',', '.')?> <?=$_SESSION['moneda']?></td>
									</tr>
								<?php
							}
							?>
							<tr>
								<td></td>
								<td colspan="4">
								</td>
								<td colspan="2"></td>
							</tr>
					</tbody>
				</table>
				<!--<p><em><?=$aux13?></em></p>-->
				<?php
				}
			?>
			<span type="submit" class="button" onclick="location.href='/<?=$_SESSION['lenguaje']?>presupuesto';"><?=$aux4?></span>
			<span type="submit" class="button" onclick="location.href='/<?=$_SESSION['lenguaje']?>';"><?=$aux5?></span>
            <div class="fcenter">
                        <h2>Datos de envío:</h2>
						<input type="text" id="empresa" name="empresa" placeholder="* Empresa" required/>
                        <input type="text" id="nombre" name="nombre" placeholder="* Persona de contacto" required/><br>
                        <input type="text" id="poblacion" name="poblacion" placeholder="* Población" required/>
                        <input type="text" id="email" name="email" placeholder="* Correo electrónico" required/><br>
						<input type="text" id="telefono" name="telefono" placeholder="* Teléfono" required/>
						<input type="text" id="fax" name="fax" placeholder="Fax" value="" /><br>
						<textarea id="consulta" name="consulta" class="dobleF" placeholder="<?=$auxcons?>"><?=@$_POST['consulta']?><?=@$_GET['contacto'] != null ? 'Consulta sobre el precio del producto con '.$_GET['contacto'].' '.$_POST['Tamaño'].".\r\n" : ''?></textarea><br />
						<label><input type="checkbox" id="checkp" name="checkp" <?=(isset($_POST['consulta'])) ? 'checked ' : '';?>/>&nbsp;He leido y entiendo la <a href="<?=$draizp?>/privacidad" target="_blank">Ley de protección de datos</a></label>
						<span type="submit" class="button" name="BtSubmit">Solicitar presupuesto</span>
					</div>
		</form>
	</div>
</div>