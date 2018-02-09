				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
					
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>MENÚS</h4>
                        <p>Esta sección se encarga de ordenar el menú que se visualizará en la parte frontal de la web. </p><p><strong>IMPORTANTE:</strong> Esta sección muestra el menú que quedará en la parte frontal, pero para que de acceso a los productos, se debe relacionar las categorías de los productos, que se realiza en la sección categorías, con las partes de este menú.</p>
                    </div>
                    
                     <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Menús</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">                                      
                                   </div>
									<?php if (count($listados) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Menú</th>
													<th>Orden</th>
													<th>Menú Padre</th>
													<th>Categoria</th>
												</tr>
											</thead>
											<tbody>
                                                                                        <form action="menus.php?accion=ordenarMenu" method="post" class="form-horizontal" enctype="multipart/form-data">
												<?php
													foreach ($listados AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id']?></td>
															<td><?=$listado['nombre']?></td>
                                                                                                                        <td><input name="<?=$listado['id']?>" type="text" value="<?=$listado['orden']?>"</td>
															<td><?=$listado['padre']?></td>
															<td><?=$listado['categoria'] ? 'Si' : 'No'?></td>
															
														</tr>
														<?php
													}
												?>
                                                                                                                <tr><td colspan="5"><input class="btn btn-success" type="submit" value="Guardar"></td></tr>
                                                                                            </form>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay menús!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>