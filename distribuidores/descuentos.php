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
                                <div class="muted pull-left">Crear un Descuento</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="descuentos.php?accion=subirdescu" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nuevo Descuento</legend>
										<div class="control-group">
										  <label class="control-label" for="descuento">Descuento % </label>
										  <div class="controls">
											<input type="text" class="span3" id="descuento" name="descuento" placeholder="Descuento en % " required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="cantidad">Cantidad desde </label>
										  <div class="controls">
											<input type="text" class="span3" id="cantidad" name="cantidad" placeholder="Cantidad" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Cantidad de productos mínima en la cesta para aplicar el descuento</span>
										  </div>
										</div>
										<button type="submit" class="btn btn-primary">Añadir</button>
										<button type="button" onclick="location.href = 'descuentos.php';" class="btn">Cancelar</button>
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
                                <div class="muted pull-left">Listado de Descuentos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#add2" onclick="javascript: $('#add2').css('height', 'auto'); $('#add2').css('visibility', 'visible');"><button class="btn btn-success">Añadir Descuento <i class="icon-plus icon-white"></i></button></a>
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
													<th>Cantidad</th>
													<th>Descuento</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados2 AS $listado)
													{
														?>
														<tr>
															<td><?=$listado['cantidad']?> productos / <?=$listado['cantidad']?> unidades</td>
															<td>-<?=$listado['descuento']?> %</td>
															<td style="text-align: center;">
																<a href="?eliminardescu=<?=$listado['cantidad']?>" onclick="return confirm('Desea eliminar el descuento de \'\'<?=$listado['cantidad']?> productos / <?=$listado['cantidad']?> unidades (<?=$listado['descuento']?> %)\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay descuentos!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>