				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
					<?php if ($resultaop > 0) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.<br>Se ha generado correctamente la FACTURA con número <b><?=date('Y').$resultaop?></b>.
							</div>
						</div>
					<?php } ?>
                        <!-- block -->
                     <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Compras Transferencia</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<?php if (count($listados2) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Cliente</th>
													<th>Identificador</th>
													<th>Fecha</th>
													<th>Precio</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados2 AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id']?></td>
															<td><?=$listado['apellidos']?>, <?=$listado['nombre']?></td>
															<td><?=strtoupper($listado['secreto'])?></td>
															<td><?=date_format(date_create($listado['fecha']), 'd/m/Y H:i:s')?></td>
															<td><?=number_format($listado['precio'], 2, ',', '.')?></td>
															<td style="text-align: center;">
																<a href="?confirmarcontra=<?=$listado['id']?>" onclick="return confirm('Desea confirmar la compra por el método contrareembolo \'\'#<?=$listado['id']?> - <?=strtoupper($listado['secreto'])?>\'\'?');">confirmar</a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay compras pendientes de transferencia!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>