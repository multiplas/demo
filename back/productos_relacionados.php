				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
					<?php if ($resultaop || $resultaop2) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php } ?>
                     <div class="row-fluid">
						<div id="add2" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear una Relación de Producto</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="productos_relacionados.php?accion=subirprre" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nueva Relación de Producto</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="nproducto">Producto</label>
                                          <div class="controls">
											<select id="nproducto" name="producto" class="chzn-select span4" required>
												<option value="c-padre" selected>Seleccione Producto</option>
												<?php
													foreach ($listados AS $listado)
													{
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                        <?php
													}
												?>
											</select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="nproductor">Producto Relacionado</label>
                                          <div class="controls">
											<select id="nproductor" name="productor" class="chzn-select span4" required>
												<option value="c-padre" selected>Seleccione Producto</option>
												<?php
													foreach ($listados AS $listado)
													{
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                        <?php
													}
												?>
											</select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
                                        </div>
										<button type="submit" class="btn btn-primary">Crear Relación</button>
										<button type="button" onclick="location.href = 'productos_relacionados.php';" class="btn">Cancelar</button>
                                      </fieldset>
									</form>
								</div>
							</div>
						</div>
                    </div>
                        <!-- block -->
                     <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Productos Relacionados</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#add2" onclick="javascript: $('#add2').css('height', 'auto'); $('#add2').css('visibility', 'visible');"><button class="btn btn-success">Crear Relación <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <!--<div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div>-->
                                   </div>
									<?php if (count($listados2) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Producto</th>
													<th style="text-align: center;">#</th>
													<th>Producto Relacionado</th>
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
															<td><?=$listado['nombre']?></td>
															<td style="text-align: center;"><?=$listado['id2']?></td>
															<td><?=$listado['nombre2']?></td>
															<td style="text-align: center;">
																<a href="?eliminarprre=<?=$listado['id']?>&amp;eliminarprre2=<?=$listado['id2']?>" onclick="return confirm('Desea eliminar la relación entre el producto \'\'#<?=$listado['id']?> - <?=$listado['nombre']?>\'\' y el producto relacionado \'\'#<?=$listado['id2']?> - <?=$listado['nombre2']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay productos relacionados!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>