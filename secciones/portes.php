<div id="contenido">
	<div id="articulo">
		<img id="textoimga" src="<?=$draizp?>/imagenesproductos/packs.png" />
                <div id="texto">
                    <?php if($Empresa['tipoportes'] == 0){ ?>
                    <!--Normal-->
			<h2>Costes de gastos de envio</h2>
			<p>Estos son los gatos de envio por zona/país al que se envia el pedido. Una vez igualado o superado el coste "portes gratis" en la compra, no se cobrará coste alguno por ello.</p>
			<p>Los portes que se indican como "consultar" es debido a que los costes del transportista son variables y por tanto se debe consultar para saberlo exacto.</p><br>
			<table>
				<tbody>
					<tr>
						<td>Nombre</td>
						<td>Gratis España</td>
						<td>Precio España<?=$_SESSION['moneda']?></td>
						<td>Gratis España Islas</td>
						<td>Precio España Islas<?=$_SESSION['moneda']?></td>
                                                <td>Gratis Europa</td>
						<td>Precio Europa<?=$_SESSION['moneda']?></td>
                                                <td>Gratis Internacional</td>
						<td>Precio Internacional<?=$_SESSION['moneda']?></td>
					</tr>
					<?php
						foreach ($prtss AS $porte)
						{
							?>
								<tr>
									<td><?=$porte['transportista']?></td>
									<td><?=@$porte['TPGratis'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$porte['TPGratis']), 2, ',', '.').$_SESSION['moneda'] : '-'?></td>
									<td><?=@$porte['precioP'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$porte['precioP']), 2, ',', '.').$_SESSION['moneda'] : '-'?></td>
									<td><?=@$porte['TBGratis'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$porte['TBGratis']), 2, ',', '.').$_SESSION['moneda'] : '-'?></td>
									<td><?=@$porte['precioB'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$porte['precioB']), 2, ',', '.').$_SESSION['moneda'] : '-'?></td>
                                                                        <td><?=@$porte['TEGratis'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$porte['TEGratis']), 2, ',', '.').$_SESSION['moneda'] : '-'?></td>
									<td><?=@$porte['precioE'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$porte['precioE']), 2, ',', '.').$_SESSION['moneda'] : '-'?></td>
                                                                        <td><?=@$porte['TIGratis'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$porte['TIGratis']), 2, ',', '.').$_SESSION['moneda'] : '-'?></td>
									<td><?=@$porte['precioI'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$porte['precioI']), 2, ',', '.').$_SESSION['moneda'] : '-'?></td>
								</tr>
							<?php
						}
					?>
				</tbody>
			</table>
                    <?php }else if($Empresa['tipoportes'] == 1){ ?>
                        <!--Por Km-->
                        <h2>Costes de gastos de envio</h2>
			<p>Estos son los gatos de envio por km de distancia a la dirección que se envia el pedido.</p><br>
                        <table>
											<thead>
												<tr>
													<tr>
                                                                                                            <th>Hasta km</th>
                                                                                                            <th>Precio</th>
                                                                                                        </tr>
												</tr>
											</thead>
											<tbody>
												<?php 
													foreach ($listados2 AS $listado)
													{ 
														?>
														<tr>
															<td><?=strtoupper(utf8_encode($listado["hastakm"]))?></td>
                                                                                                                        <?php                                                                                                            
                                                                                                                        if($listado["precio"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["precio"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';
                                                                                                                        ?>
															 
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
                        
                    <?php }else if($Empresa['tipoportes'] == 2){ ?>
                        <!--Por Provincias-->
                        
                        <h2>Costes de gastos de envio</h2>
			<p>Estos son los gatos de envio por provincia/país al que se envia el pedido.</p><br>
			<table>
				<tbody>
					<tr>
						<td>Provincia</td>
                                                <?php
                                                    foreach ($listadoempresas AS $listado){ ?>
                                                        <td><?=$listado['nombre']?></td>
                                                <?php } ?>
						
					</tr>
					<tr>
                                            <td>Por defecto</td>
                                            <?php foreach ($listadoempresas AS $listado11){ ?>
                                                <td><?=$listados3[$listado11['id']]['precio']?>€</td>
                                            <?php } ?>
                                        </tr>
					<?php 
                                            foreach ($listadosprovincias AS $listado){ 
                                        ?>
                                                <tr>
                                                    <td><?=$listado['Name']?></td>
                                                    <?php 
                                                    foreach ($listadoempresas AS $listado11){
                                                        if(isset($listados2[$listado['ID']][$listado11['id']])){
                                                            echo "<td>".$listados2[$listado['ID']][$listado11['id']]['precio']."€ </td>";
                                                        }else{
                                                            echo "<td> - </td>";
                                                        }
                                                    }
                                                    ?>
                                                </tr>
					<?php
                                            }
                                        ?>
				</tbody>
			</table>
                    <?php } ?>
		</div>
	</div>
</div>