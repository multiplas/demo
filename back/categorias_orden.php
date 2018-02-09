				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
					
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>CATEGORÍAS</h4>
                        <p>Esta sección se encarga de ordenar las categorías que se visualizará en la parte frontal de la web. </p>
                    </div>
                    
                     <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Categorías</div>
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
													<th>Categoría</th>
													<th>Orden</th>
													<th>Menú Padre</th>
												</tr>
											</thead>
											<tbody>
                                                                                        <form action="categorias.php?accion=ordenarCategorias" method="post" class="form-horizontal" enctype="multipart/form-data">
												<?php
													foreach ($listados AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id']?></td>
															<td><?=$listado['categoria']?></td>
                                                                                                                        <td><input name="<?=$listado['id']?>" type="text" value="<?=$listado['orden']?>"</td>
															<td><?=$listado['categoriap'] != null ? $listado['categoriap'] : '<b>PADRE</b>'?></td>
															
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