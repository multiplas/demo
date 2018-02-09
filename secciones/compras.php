<div id="contenido">
    <div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=@$_GET['compras'] == 'rma_yes' ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; width: 50%; z-index: 99999;">
		<h2>Petición de Devolución procesada correctamente</h2>
		<p>Recibirá un e-mail con la contestación a su petición en las próximas horas.</p>
                <p>También puede comprobar el estado de su petición en este listado.</p>
                <p>Una vez aprobada, podrá proceder a la devolución de la mercancia.</p>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">X</a>
	</div>
    
    <div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=@$_GET['compras'] == 'rma_no' ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; width: 50%; z-index: 99999;">
		<h2>No se ha podido procesar correctamente su petición de Devolución.</h2>
		<p>Inténtelo de nuevo pasado unos minutos.</p>
                <p>Si ya ha efectuado varios intentos con la misma respuesta, contacte con nosotros.</p>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">X</a>
	</div>
    
	<div id="articulo">
		<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta"><span type="submit" class="button2">Cesta</span></a>
		<span type="submit" class="button2G">Compras</span>
		<br /><br />
		<h2>Tu Lista de Compras</h2>
		<?php
			if (count($compras) < 1) echo '<p>No hay productos en tu lista!</p>';
			else
			{
				foreach ($compras AS $compra)
				{
		?>
					<table id="tcesta">
						<thead>
							<tr>
								<th colspan="3" style="text-align: left;">
									<em><?=date('d-m-Y H:i', strtotime($compra['factura']['fecha']))?><em>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. <?php if($Empresa['factura'] == 1){ ?>Factura:<?php }else{ ?>Albarán:<?php } ?>&nbsp;&nbsp;
									<em><?=$compra['factura']['numero']?><em>
								</th>
							</tr>
							<tr>
								<th>Precio</th>
								<th>Dirección</th>
								<th></th>
							</tr>
						</thead>
						<tbody  style="background-color: #000000; color: #ffffff">
							<tr>
								<td><?=$compra['precio']?> &euro;</td>
								<td style="display: table-cell; font-size: inherit !important; text-align: left !important;"><?=$compra['direccion']?></td>
								<td></td>
							</tr>
                                                        
                                                    <?php foreach ($compra['rma'] AS $crma){ ?>
                                                        
                                                        <tr style="background-color: #000000; color: #ffffff;">
                                                            <td style="background-color: #000000;">Nº Id RMA: <?=date("Y", strtotime($crma['fecha']))?><?=$crma['id']?></td>
                                                            <td style="background-color: #000000;"><small>Estado: <?=strtoupper($crma['estado'])?></small></td>
                                                            <td style="background-color: #000000; text-align: left !important;"><small><?=$crma['comentario_vend']?></small></td>
                                                        </tr>
                                                        
                                                    <?php } ?>
						</tbody>
					</table>
					<form method="post" name="cesta" action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>imprimir_fact/<?=$compra['secreto']?>">
						<?php if($Empresa['factura'] == 1){ ?>
                                                    <span style="float: left" type="submit" class="button" name="BtSubmit">Ver Factura</span>
                                                <?php }else{ ?>
                                                    <span style="float: left" type="submit" class="button" name="BtSubmit">Ver Albarán</span>
                                                <?php } ?>
					</form>
                
                                                <?php if($Empresa['rma'] == 1 && date('Y-m-d', strtotime('- '.$Empresa['rma_dias'].' days')) <= date('Y-m-d', strtotime($compra['factura']['fecha'])) && count($compra['rma']) == 0){ ?>
                                                    <a style="float: left; margin-left: 10px;" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>rma/<?=$compra['secreto']?>"><span type="submit" class="button" name="BtSubmit">Devolución</span></a>
                                                <?php } ?>
					<br /><br />
					<?php
				}
			}
		?>
	</div>
</div>