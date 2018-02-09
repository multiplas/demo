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
                                <div class="muted pull-left">Crear un Bloque de Productos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="productos_pack.php?productospack=<?=$_GET['productospack']?>&amp;accion=subirproductospack" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nuevo Bloque de Productos</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="nproducto1">Producto 1</label>
                                          <div class="controls">
											<select id="nproducto1" name="producto1" class="chzn-select span4" required>
												<option value="" selected>Seleccione Producto</option>
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
                                          <label class="control-label" for="nproducto2">Producto 2</label>
                                          <div class="controls">
											<select id="nproducto2" name="producto2" class="chzn-select span4">
												<option value="" selected>Seleccione Producto</option>
												<?php
													foreach ($listados AS $listado)
													{
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                        <?php
													}
												?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="nproducto3">Producto 3</label>
                                          <div class="controls">
											<select id="nproducto3" name="producto3" class="chzn-select span4">
												<option value="" selected>Seleccione Producto</option>
												<?php
													foreach ($listados AS $listado)
													{
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                        <?php
													}
												?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="nproducto4">Producto 4</label>
                                          <div class="controls">
											<select id="nproducto4" name="producto4" class="chzn-select span4">
												<option value="" selected>Seleccione Producto</option>
												<?php
													foreach ($listados AS $listado)
													{
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                        <?php
													}
												?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
                                        </div>
                                        <br><br><br><br><br>
										<button type="submit" class="btn btn-primary">Crear Bloque</button>
										<button type="button" onclick="location.href = 'productos_pack.php';" class="btn">Cancelar</button>
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
                                <div class="muted pull-left">Listado de Productos del Pack</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#add2" onclick="javascript: $('#add2').css('height', 'auto'); $('#add2').css('visibility', 'visible');"><button class="btn btn-success">Crear Bloque <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                   </div>
									<?php if (count($listados2) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                                            <thead>
                                                <tr role="row">
													<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Productos</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
												<?php
													foreach ($listados2 AS $listado)
													{
														if (@$lineapi != 'odd')
                                                            $lineapi = 'odd';
                                                        else
                                                            $lineapi = 'even';
														?>
														<tr class="<?=$lineapi?>">
															<td valign="top" class="" style="text-align: center;"><?=$_GET['productospack']?>-<?=$listado['id']?></td>
															<td valign="top" class=""><?=str_replace(', ', '<br>', $listado['productos'])?></td>
															<td valign="top" class="" style="text-align: center;">
																<a href="?productospack=<?=$_GET['productospack']?>&amp;eliminarpackb=<?=$listado['id']?>" onclick="return confirm('Desea eliminar el bloque (#<?=$_GET['productospack']?>-<?=$listado['id']?>) del pack \'\'#<?=$_GET['productospack']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay productos del pack!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>