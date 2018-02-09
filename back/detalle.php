				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
					<?php if ($resultaop) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php } ?>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Productos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<?php if (count($listados) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Producto</th>
													<th>Definición</th>
													<th>Cantidad</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['numero']?></td>
															<td>#<?=$listado['idp']?> - <?=$listado['nombre']?></td>
															<td><?=$listado['talla']?><br><?=$listado['extra']?></td>
															<td><?=$listado['cantidad']?></td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay detalles de los productos en la factura indicada!</p>
									<?php } ?>
                                                                                
                                    <button type="button" onclick="location.href = 'facturas.php';" class="btn">Volver</button>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                        
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Extras</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									
                                                                                
                                          <?php if (count($listado2) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th>Nombre</th>
													<th>Datos</th>
													<th>Tipo</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listado2 AS $listado)
													{
														?>
														<tr>
															<td><?=$listado['nombre']?></td>
															<td><?=$listado['tipo'] == 2 ? '<a href="../pedidos_ficheros/'.$listado['secreto'].'/'.$listado['valor'].'" target="_blank">'.$listado['valor'].'</a>' : $listado['valor']?></td>
															<td><?=$listado['tipo'] == 0 ? 'Text' : ($listado['tipo'] == 1 ? 'Textarea' : 'Fichero') ?></td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay detalles extras en la factura indicada!</p>
									<?php } ?>
                                                                                
                                    <button type="button" onclick="location.href = 'facturas.php';" class="btn">Volver</button>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>