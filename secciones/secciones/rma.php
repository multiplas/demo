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
            <form method="post" name="cesta" action="<?=$draizp?>/acc/rmafin">
		<span type="submit" class="button2G"><?=$aux0?></span>
                <?php if($_SESSION['usr'] != null){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>compras"><span type="submit" class="button2"><?=$aux1?></span></a> <?php } ?>
		<br /><br />
		<h2>Devolución</h2>
		<?php
			if (count($cesta) < 1) echo '<p>No hay productos en tu cesta!</p>';
			else
			{
		?>
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
							foreach ($cesta AS $micesta)
							{
								$total -= $micesta['precio'] * $micesta['cantidad'] * $micesta['cambio'];
								
                                $nombre = utf8_encode(strtr(utf8_decode($micesta['nombre']), utf8_decode($tofind), $replac));
                                $nombre = strtolower($nombre);
                                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
						?>
                                            
                                                                                    <?php 
                                                                                        $urlImagen = $draizp;
                                                                                        if($micesta['pack'] != true )
                                                                                            $urlArticulo = "<a href='".$draizp."/".$_SESSION['lenguaje']."/producto/".$micesta['idp']."'>".$micesta['nombre']."</a>";
                                                                                        else
                                                                                            $urlArticulo = "<a href='".$draizp."/".$_SESSION['lenguaje']."/pack/".$micesta['idp']."'>".$micesta['nombre']."</a>";
                                                                                    ?>
								<tr>
									<td></td>
									<td style="position: relative;">
										<?=is_numeric($micesta['descuento']) ? '' : $micesta['descuento']?>
										<img src="<?=$urlImagen?>/imagenesproductos/<?=$micesta['imagen']?>" alt="<?=$micesta['nombre']?>">
										<?php if ($micesta['stock'] != null) { ?><img style="position: absolute; right: 0px;" src="<?=$draizp?>/source/<?=$micesta['stock']?>" alt=""><?php } ?>
									</td>
									<td>
										<span class="enlazado"><?=$micesta['nombre']?></span>
									</td>
									<td>
										
											<input type="text" class="miniF" id="cantidad<?=$micesta['idp']?>" name="cantidad<?=$micesta['idp']?>" value="<?=$micesta['cantidad']?>"<?=$micesta['idproducto'] > 0 ? '' : ' readonly'?> />
										
									</td>
									<td>
										<?=number_format(($micesta['precio']*$micesta['cambio']), 2, ',', '.')?> <?=$_SESSION['moneda']?>
									</td>
									<td></td>
									<td><?=number_format(($micesta['precio'] * $micesta['cambio'] * $micesta['cantidad']), 2, ',', '.')?> <?=$_SESSION['moneda']?></td>
								</tr>
						<?php
							}
							
							
                                                            
							?>
                                                            
                            <?php
                                                        
                                                        
                                                        
							 ?>
							<tr>
								<td></td>
								<td style="position: relative;"><img src="<?=$draizp?>/imagenesproductos/portes.png" alt="<?=$micesta['nombre']?>"></td>
								<td><span class="enlazado">Gastos Devolución</span></td>
								<td>
									<form method="post" action="#">
										<input type="text" class="miniF" name="desertor" value="1" readonly />
									</form>
								</td>
								<td><?=number_format($Empresa['rma_gastos'], 2, ',', '.').$_SESSION['moneda']?></td>
								<td></td>
								<td><?=number_format($Empresa['rma_gastos'], 2, ',', '.').$_SESSION['moneda']?></td>
							</tr>
                                                        <?php $total += ConvertirMoneda($Empresa['monedaWeb'], $Empresa['monedaUser'], $Empresa['rma_gastos']); ?>
                                                        
							<tr>
								<td></td>
								<td colspan="3">
                                    
								</td>
								<td colspan="3"></td>
							</tr>
					</tbody>
				</table>
				<p><em>Para cambiar la cantidad haga clic sobre el número, cambie a la cantidad deseada.</em></p>
                                <br><br>
                               
                                <textarea name="comentario" placeholder="Introduzca aquí su comentario o motivos para la devolución." style="min-width: 100%;"></textarea>
		
				<?php
				}
				
				if (count($cesta) > 0)
				{
					?>
					<span type="submit" class="button" style="float: right;" name="BtSubmit">Procesar Devolución</span>
					<?php
				}
			?>
                                        <input type="hidden" name="idrma" value="<?=$_GET['rma']?>">
                                        <input type="hidden" name="portes" value="<?=$Empresa['rma_gastos']?>">
		</form>
	</div>
</div>