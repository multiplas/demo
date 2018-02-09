<?php
$_SESSION['datos_cesta'] = array();
include_once 'auxiliares.php';
    ?>

<style>
.sale-label{
    background-color: <?=$colores['oferta_fondo']?>;
    border-radius: 4px;
    color: <?=$colores['oferta_letra']?>; !important;
    
    font-size: 12px;
    font-weight: bold;
    padding: 2px 4px;
    text-transform: uppercase;
    z-index: 10;
    
}

.venta-label{
    background-color: <?=$colores['venta_fondo']?>;
    border-radius: 4px;
    color: <?=$colores['oferta_letra']?>; !important;
    
    font-size: 12px;
    font-weight: bold;
    padding: 2px 4px;
    text-transform: uppercase;
    z-index: 10;
    
}

.alquiler-label{
    background-color: <?=$colores['alquiler_fondo']?>;
    border-radius: 4px;
    color: <?=$colores['oferta_letra']?>; !important;
    
    font-size: 12px;
    font-weight: bold;
    padding: 2px 4px;
    text-transform: uppercase;
    z-index: 10;
    
}
</style>

<div id="contenido" style="color: #333;">
	<div id="articulo">
		<span type="submit" class="button2G"><?=$aux0?></span>
                <?php if($_SESSION['usr'] != null){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>compras"><span type="submit" class="button2"><?=$aux1?></span></a> <?php } ?>
		<br /><br />
		<h2><?=$aux2?></h2>
		<?php
			if (count($cesta) < 1) echo '<p>No hay productos en tu cesta!</p>';
			else
			{
		?>              
				<table id="tcesta">
					<thead>
						<tr>
							<th></th>
                                                        <th colspan="2" class="MDLG"><?=$aux6?></th>
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
                                $_SESSION['datos_cesta'][$i] = $micesta;
								$total += ($micesta['precio'] + $micesta['personalizacion']) * $micesta['cantidad'];
								$peso += ($micesta['peso'] * $micesta['cantidad']);
                                $nombre = utf8_encode(strtr(utf8_decode($micesta['nombre']), utf8_decode($tofind), $replac));
                                $nombre = strtolower($nombre);
                                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
						?>
                                            
                                <?php if($micesta['afiliado'] != ''){
                                    $urlImagen = "http://tienda.camaltec.es";
                                    $urlArticulo = $micesta['nombre'];
                                }else{
                                    $urlImagen = $draizp;
                                    if($micesta['pack'] != true )
                                        $urlArticulo = "<a href='".$draizp."/".$_SESSION['lenguaje']."producto/".$micesta['id']."'>".$micesta['nombre']."</a>";
                                    else
                                        $urlArticulo = "<a href='".$draizp."/".$_SESSION['lenguaje']."pack/".$micesta['id']."'>".$micesta['nombre']."</a>";
                                } 
                                
                                $cad_extra = "";
                                $totalAtrDesgl = 0;
                                if($Empresa['filaAtrCesta'] == 1){
                                    foreach ($atrDesglosados as $atributoDes){
                                        $resultado = strpos($micesta['talla'], $atributoDes['atributo']);
                                        if($resultado !== FALSE){
                                            if($atributoDes['tipo'] != $atributoDes['atributo']){
                                                $cad_extra .= "<tr><td></td><td><img src='/source/desglose.png' style='max-width: 29px;'></td><td>".$atributoDes['tipo'] .": ". $atributoDes['atributo'] . " <small style='top: 3px;'>(".$micesta['nombre'].")</small></td><td>".$micesta['cantidad']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['preciosAtr'][$atributoDes['atributo']]), 2, ',', '.')." ".$_SESSION['moneda']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['preciosAtr'][$atributoDes['atributo']]), 2, ',', '.')." ".$_SESSION['moneda']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($micesta['preciosAtr'][$atributoDes['atributo']])*$micesta['cantidad'])), 2, ',', '.')." ".$_SESSION['moneda']."</td></tr>";
                                            }else{
                                                $cad_extra .= "<tr><td></td><td><img src='/source/desglose.png' style='max-width: 29px;'></td><td>".$atributoDes['atributo'] . " <small style='top: 3px;'>(".$micesta['nombre'].")</small></td><td>".$micesta['cantidad']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['preciosAtr'][$atributoDes['atributo']]), 2, ',', '.')." ".$_SESSION['moneda']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['preciosAtr'][$atributoDes['atributo']]), 2, ',', '.')." ".$_SESSION['moneda']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($micesta['preciosAtr'][$atributoDes['atributo']])*$micesta['cantidad'])), 2, ',', '.')." ".$_SESSION['moneda']."</td></tr>";
                                            }
                                            $totalAtrDesgl += $micesta['preciosAtr'][$atributoDes['atributo']];
                                        }
                                    }
                                }
                                
                                ?>
								<tr>
                                                        <td style="text-align: center"><?php if($Empresa['etiqProCesta'] == 1){ ?><?=$Empresa['etiqpro'] == 1 ? ($micesta['tipo'] == 0 ? '<span class="venta-label">Venta</span><br>' : ($micesta['tipo'] == 3 ? '<span class="alquiler-label">Alquiler</span><br>' : '')) : '' ?><?php } ?><?php if ($micesta['id'] > 0) { ?><a href="<?=$draizp?>/acc/quitar/<?=$micesta['id']?>/<?=$micesta['talla'] != null ? $micesta['talla'] : 'nada'?>/<?=$micesta['pack'] !== true ? $micesta['extra'] : 'null'?>" onclick="return confirm('Seguro que desea elminar el <?=$micesta['pack'] !== true ? 'producto' : 'pack'?> `<?=$micesta['nombre']?><?=($micesta['talla']!=null ? ' ('.$micesta['talla'].')' : '(nada)')?><?=($micesta['color']!=null ? ' ('.$micesta['color'].')' : '')?>` de su cesta?');">X</a><?php } ?></td>
									<td style="position: relative;">
										<?=is_numeric($micesta['descuento']) ? '' : $micesta['descuento']?>
										<img src="<?=$urlImagen?>/imagenesproductos/<?=$micesta['imagen']?>" alt="<?=$micesta['nombre']?>">
										<?php if ($micesta['stock'] != null) { ?><img style="position: absolute; right: 0px;" src="<?=$draizp?>/source/<?=$micesta['stock']?>" alt=""><?php } ?>
									</td>
									<td>
										<?php if(is_numeric($micesta['descuento'])) { ?><?=$urlArticulo?><?php } else { ?><span class="enlazado"><?=$micesta['nombre']?></span><?php } ?>
                                                                                <?php if($micesta['fDirecta'] == '1') { ?><span>+ <?=number_format($micesta['cuota'],2,',','.')?>€/mes x <?=$micesta['meses']?>meses</span><?php } ?>
                                                                                <span><?=($micesta['talla']!=null ? $micesta['talla'] : '')?> <?=($micesta['fechas']!=null ? '('.$micesta['fechas'].')' : '')?> <?=($micesta['color']!=null ? ' ('.$micesta['color'].')' : '')?><?=($micesta['extra']!=null ? $micesta['extra'] : '')?></span>
                                                                                <?php if($micesta['aplazame'] == 1){ ?>
                                                                                    <span>Financialo con Aplazame por <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['caplazame1']), 2, ',', '.')?><?=$_SESSION['moneda']?> + <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['caplazame']), 2, ',', '.')?><?=$_SESSION['moneda']?> al mes</span>
                                                                                <?php } ?>
									</td>
									<td style="min-width: 130px;">
                                                                            <?php if($Empresa['mmcesta'] == 1){ ?>
                                                                            <script>
                                                                                function sumar(producto){
                                                                                    producto = '#'+producto;
                                                                                    jQuery(producto).val(parseInt(jQuery(producto).val())+1);
                                                                                }
                                                                                function restar(producto){
                                                                                    producto = '#'+producto;
                                                                                    if((parseInt(jQuery(producto).val())-1) > 0)
                                                                                        jQuery(producto).val(parseInt(jQuery(producto).val())-1);
                                                                                }
                                                                            </script>
                                                                            <?php } ?>
										<form method="post" name="cesta<?=$micesta['id']?>" action="<?=$draizp?>/acc/actualizar/<?=$micesta['id']?>">
                                                                                    <?php if($Empresa['mmcesta'] == 1){ ?><button style="padding: 3px;background-color: <?=$colores2['colorbotonform']?>;color: white;margin-top: 6px;" onclick="sumar('cantidad<?=$micesta['id']?>')">+</button><?php } ?>
                                                                                        <input type="text" class="miniF" id="cantidad<?=$micesta['id']?>" name="cantidad" value="<?=$micesta['cantidad']?>"<?=$micesta['id'] > 0 ? '' : ' readonly'?> />
                                                                                    <?php if($Empresa['mmcesta'] == 1){ ?><button style="padding: 3px;background-color: <?=$colores2['colorbotonform']?>;color: white;margin-top: 6px;" onclick="restar('cantidad<?=$micesta['id']?>')">-</button><?php } ?>
											<input type="hidden" id="htalla<?=$micesta['id']?>" name="htalla" value="<?=$micesta['pack'] !== true ? $micesta['talla'] : 'null'?>" />
											<input type="hidden" id="hcolor<?=$micesta['id']?>" name="hcolor" value="<?=$micesta['pack'] !== true ? $micesta['extra'] : 'null'?>" />
										</form>
									</td>
									<td>
										<?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($micesta['precio']-$totalAtrDesgl)), 2, ',', '.')?> <?=$_SESSION['moneda']?>
										<?=($micesta['descuento'] > 0 ? '<span>-'.$micesta['descuento'].'%</span>' : ($micesta['descuentoe'] > 0 ? '<span>-'.$micesta['descuentoe'].' &euro;</span>' : ''))?>
										<?=($micesta['precio'] < $micesta['precio_ant'] ? '<span style="text-decoration: line-through;">'.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],round($micesta['precio_ant'],2)), 2, ',', '.').' &euro;</span>' : '')?>
									</td>
                                    <td><?=$micesta['personalizacion'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['personalizacion']), 2, ',', '.').$_SESSION['moneda'] : 'N/A'?></td>
                                    <?php $_SESSION['datos_cesta'][$i]['precioTot'] = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($micesta['precio'] + $micesta['personalizacion']-$totalAtrDesgl) * $micesta['cantidad'])), 2, ',', '.') . $_SESSION['moneda'] ?>
                                    <td><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($micesta['precio'] + $micesta['personalizacion']-$totalAtrDesgl) * $micesta['cantidad'])), 2, ',', '.')?> <?=$_SESSION['moneda']?></td>
								</tr>
                                                                
                                                                <?php echo $cad_extra; ?>
                        <?php
                                $i++;
							}
							
							if($Empresa['tipoportes'] == 0){
                                $portes_ar = CalculaPortesP($total);
                                $logoPortes = $portes_ar[1];
                                $portes = $portes_ar[0];
                                $portes = str_replace(',', '.', $portes);
                            }else if($Empresa['tipoportes'] == 1){
                                $portes_ar = CalculaPortesKm($total);
                                $logoPortes = $portes_ar[1];
                                if($portes_ar[0] >= 0){
                                    $portes = $portes_ar[0];
                                    $portes2 = 0;
                                    $_SESSION['datos_cesta']['portes2'] = $portes2;
                                }else{
                                    $portes = $portes_ar[2];
                                    $portes2 = $portes_ar[0];
                                    $_SESSION['datos_cesta']['portes2'] = $portes2;
                                }
                                $portes = str_replace(',', '.', $portes);
                            }else if($Empresa['tipoportes'] == 2){
                                $portes = CalculaPortesProv($total);
                                if($portes >= 0){
                                    $portes = number_format($portes, 2, ',', '.');
                                    $portes = str_replace(',', '.', $portes);
                                }else{
                                    $portes2 = -4;
                                    $_SESSION['datos_cesta']['portes2'] = $portes2;
                                }
                            }else if($Empresa['tipoportes'] == 3){
                                $portes = CalculaPortesProvP($total, $peso);
                                if($portes >= 0){
                                    $portes = number_format($portes, 2, ',', '.');
                                    $portes = str_replace(',', '.', $portes);
                                }else{
                                    $portes2 = -4;
                                    $_SESSION['datos_cesta']['portes2'] = $portes2;
                                }
                            }
                                                        
                                                                                        
							$abono = Abono(@$_SESSION['usr']['id']);
							$total = $total - $abono;
							
							if ($abono > 0)
							{
								?>
									<tr>
										<td></td>
										<td style="position: relative;"><span style="color: #FFF; font-size: 1.6rem; left: 49%; position: absolute; top: 45%;"><?=$abono?><?=$_SESSION['moneda']?></span><img src="<?=$draizp?>/imagenesproductos/abonos.png" alt="<?=$micesta['nombre']?>"></td>
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
                                                        
                                                        
                                                        if (isset($_POST['prm'])){
                                                            @$_SESSION['compra']['codpromo'] = $_POST['codpromo'];
                                                        }
                                                            $pcode = CodigoPromocional(strtolower(@$_SESSION['compra']['codpromo']), $total);
                                                            //$total2 = 0;
                                                            if ($pcode != null)
                                                            {
                                                                if ($pcode['tipo'] == $_SESSION["moneda"]){
                                                                    $total2 = $total - $pcode['descuento'];
                                                                    $total2 = $total - $total2;
                                                                    $total = $total - $pcode['descuento'];
                                                                }else{
                                                                    $total2 = $total - ($total * ($pcode['descuento'] / 100));
                                                                    $total2 = $total - $total2;
                                                                    $total = $total - ($total * ($pcode['descuento'] / 100)); 
                                                                }
                                                            
							?>
                                                            <tr>
                                                                <td></td>
                                                                <td style="position: relative;"><span style="color: #FFF; font-size: 1.6rem; left: 49%; position: absolute; top: 45%;"></span><img src="<?=$Empresa['promocionIcon'] != '' ? 'iconos/'.$Empresa['promocionIcon'] : '/imagenesproductos/descuentos.png'?>" alt="Descuento promoción"></td>
                                                                <td><span class="enlazado">Código promocional</span><span>Descuento que se realiza por el código promocional</span></td>
                                                                <td>1</td><td>- <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$total2), 2, ',', '.')?> <?=$_SESSION['moneda']?></td><td>N/A</td><td>- <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$total2), 2, ',', '.')?> <?=$_SESSION['moneda']?></td>
                                                            </tr>
                            <?php
                                                        }
                                                        
                                                        if($_SESSION['usr'] != null){
                                                            if(($portes > 0 || $Empresa['portes_gratis'] == 0) && $portes2 != -1 && $portes2 != -2 && $portes2 != -3 && $portes2 != -4){ ?>
                                                                <tr  style="display:none;">
                                                                    <td></td>
                                                                    <td style="position: relative;"><img src="<?=$draizp?>/<?=$logoPortes != "" && $logoPortes != "." ? ($Empresa['tipoportes'] == 0 ? 'logos/' : 'logoskm/').$logoPortes : ($Empresa['transporteIcon'] != '' ? 'iconos/'.$Empresa['transporteIcon'] : 'imagenesproductos/portes.png')?>" alt="<?=$micesta['nombre']?>"></td>
                                                                    <td><span class="enlazado"><?=$aux10?></span><span><?=$aux11?> <?=$_SESSION['usr']['provinciaEnv']?>, <?=$_SESSION['usr']['paisEnvN']?></span></td>
                                                                    <td>
                                                                            <form method="post" action="#">
                                                                                    <input type="text" class="miniF" name="desertor" value="1" readonly />
                                                                            </form>
                                                                    </td>
                                                                    <td><?=$portes > 0 ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$portes), 2, ',', '.').$_SESSION['moneda'] : $aux15?></td>
                                                                    <td>N/A</td>
                                                                    <td><?=$portes > 0 ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$portes), 2, ',', '.').$_SESSION['moneda'] : $aux15?></td>
                                                                </tr>
                                                            <?php }else if($portes2 == -1){ ?>
                                                                <tr  style="display:none;">
                                                                    <td></td>
                                                                    <td style="position: relative;"><img src="<?=$draizp?>/<?=$logoPortes != "" && $logoPortes != "." ? ($Empresa['tipoportes'] == 0 ? 'logos/' : 'logoskm/').$logoPortes : 'imagenesproductos/portes.png'?>" alt="<?=$micesta['nombre']?>"></td>
                                                                    <td><span class="enlazado"><?=$aux10?></span><span><?=$aux11?> <?=$_SESSION['usr']['provinciaEnv']?>, <?=$_SESSION['usr']['paisEnvN']?></span></td>
                                                                    <td>
                                                                            <form method="post" action="#">
                                                                                    <input type="text" class="miniF" name="desertor" value="1" readonly />
                                                                            </form>
                                                                    </td>
                                                                    <td>Desde <?=$portes?>€</td>
                                                                    <td>N/A</td>
                                                                    <td>Desde <?=$portes?>€</td>
                                                                </tr>
                                                            <?php }else if($portes2 == -2){ ?>
                                                                <tr style="display:none;">
                                                                    <td></td>
                                                                    <td style="position: relative;"><img src="<?=$draizp?>/<?=$logoPortes != "" && $logoPortes != "." ? ($Empresa['tipoportes'] == 0 ? 'logos/' : 'logoskm/').$logoPortes : 'imagenesproductos/portes.png'?>" alt="<?=$micesta['nombre']?>"></td>
                                                                    <td><span class="enlazado"><?=$aux10?></span><span><?=$aux11?> <?=$_SESSION['usr']['provinciaEnv']?>, <?=$_SESSION['usr']['paisEnvN']?></span></td>
                                                                    <td>
                                                                            <form method="post" action="#">
                                                                                    <input type="text" class="miniF" name="desertor" value="1" readonly />
                                                                            </form>
                                                                    </td>
                                                                    <td colspan="3"><small>No hemos podido calcular los portes usando su dirección de entrega. Modifíquela o pongase en contacto con nosotros.</small></td>
                                                                </tr>
                                                            <?php }else if($portes2 == -3){ ?>
                                                                <tr style="display:none;">
                                                                    <td></td>
                                                                    <td style="position: relative;"><img src="<?=$draizp?>/<?=$logoPortes != "" && $logoPortes != "." ? ($Empresa['tipoportes'] == 0 ? 'logos/' : 'logoskm/').$logoPortes : 'imagenesproductos/portes.png'?>" alt="<?=$micesta['nombre']?>"></td>
                                                                    <td><span class="enlazado"><?=$aux10?></span><span><?=$aux11?> <?=$_SESSION['usr']['provinciaEnv']?>, <?=$_SESSION['usr']['paisEnvN']?></span></td>
                                                                    <td>
                                                                            <form method="post" action="#">
                                                                                    <input type="text" class="miniF" name="desertor" value="1" readonly />
                                                                            </form>
                                                                    </td>
                                                                    <td colspan="3"><small>Por problemas técnicos no podemos calcular en estos momentos el importe de los gastos de envío. Pongase en contacto con nosotros para poder indicarles los gastos de envío.</small></td>
                                                                </tr>
                                                            <?php }else if($portes2 == -4){ ?>
                                                                <tr style="display:none;">
                                                                    <td></td>
                                                                    <td style="position: relative;"><img src="<?=$draizp?>/<?=$logoPortes != "" && $logoPortes != "." ? ($Empresa['tipoportes'] == 0 ? 'logos/' : 'logoskm/').$logoPortes : 'imagenesproductos/portes.png'?>" alt="<?=$micesta['nombre']?>"></td>
                                                                    <td><span class="enlazado"><?=$aux10?></span><span><?=$aux11?> <?=$_SESSION['usr']['provinciaEnv']?>, <?=$_SESSION['usr']['paisEnvN']?></span></td>
                                                                    <td>
                                                                            <form method="post" action="#">
                                                                                    <input type="text" class="miniF" name="desertor" value="1" readonly />
                                                                            </form>
                                                                    </td>
                                                                    <td colspan="3"><small>Actualmente no realizamos entrega en la provincia de <?=$_SESSION['usr']['provinciaEnv']?></small></td>
                                                                </tr>
                                                            <?php }
                                                        } ?>
							<tr  style="display:none;">
								<td></td>
								<td colspan="2">
                                    <?php if($Empresa['desglose'] == 1){ ?>
                                        <?php $_SESSION['datos_cesta']['baseImp'] = $aux12 . " " . number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.'). " " .$_SESSION['moneda'] . " " . "(" .$Empresa['impuesto']."%)"."<span class='pull-right'>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.').$_SESSION['moneda'] ."</span>" ?>
                                        <?=$aux12?>&nbsp;&nbsp;
                                        <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.').$_SESSION['moneda']?>&nbsp;&nbsp;-&nbsp;
                                        <!--IVA-->(<?=$Empresa['impuesto']?>%)&nbsp;&nbsp;
                                        <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.').$_SESSION['moneda']?>
                                    <?php } ?>
								</td>
                                                                <style>
                                    @media (min-width:1050px)
                                    {
                                        .SMXS{
                                            display: none;
                                        }
                                    }
                                    </style>
                                                                <td class="SMXS"></td>
                                <?php $_SESSION['datos_cesta']['ImporteTotal'] = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($total+ $portes)), 2, ',', '.') . $_SESSION['moneda']?>
								<td colspan="3">Total&nbsp;&nbsp;<strong><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($total+ $portes)), 2, ',', '.')?> <?=$_SESSION['moneda']?></strong></td>
							</tr>
					</tbody>
				</table>
				<p><em><?=$aux13?></em></p>
                                
                                <form method="post" name="cesta" action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta">
                        <table><tr><td>Código promocional:</td><td><input type="text" class="dobleF" id="codpromo" name="codpromo" placeholder="Código Promocional" value="" /></td>
                        <td style="text-align:right;"><span type="submit" class="button" name="BtSubmit">Aplicar promoción</span></td></tr></table>
                        <input type="hidden" name="prm" value="1" />
                    </form>
                                
		<form method="post" name="cesta" action="<?=$draizp?>/acc/pedido">
				<?php
				}
				
				if (count($cesta) > 0)
				{
					if($portes2 >= 0) {?>
                                            <span type="submit" class="button" style="float: right;" name="BtSubmit"><?=$aux14?></span>
					<?php
                                        }else if($portes2 == -1){ ?>
                                            <span type="submit" class="button" style="float: right;" onclick="location.href='/<?=$_SESSION['lenguaje']?>cuenta';">Registro</span>
                                        <?php }
				}
			?>
			<span type="submit" class="button" onclick="location.href='/<?=$_SESSION['lenguaje']?>cesta';"><?=$aux4?></span>
			<span type="submit" class="button" onclick="location.href='/<?=$_SESSION['lenguaje']?>';"><?=$aux5?></span>
		</form>
	</div>
</div>