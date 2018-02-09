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
                                <div class="muted pull-left">Crear un Porte</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="portes.php?accion=subirprt" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nuevo Porte</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="region">País / Región</label>
                                          <div class="controls">
											<select id="region" name="region" class="chzn-select span4" required>
												<option value="c-padre" selected>Seleccione País/Región</option>
												<?php
													foreach ($listadosalt AS $listado)
													{
                                                        ?>
                                                            <option value="<?=$listado['codigo']?>">(<?=$listado['codigo']?>) <?=$listado['pais']?></option>
                                                        <?php
													}
												?>
											</select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
                                        </div>
										<div class="control-group">
										  <label class="control-label" for="precio">Precio </label>
										  <div class="controls">
											<input type="text" class="span6" id="precio" name="precio" placeholder="Precio del porte" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="max">Gratis desde </label>
										  <div class="controls">
											<input type="text" class="span6" id="max" name="max" placeholder="Gratis desde precio" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<button type="submit" class="btn btn-primary">Añadir</button>
										<button type="button" onclick="location.href = 'portes.php';" class="btn">Cancelar</button>
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
                                <div class="muted pull-left">Listado de Portes</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#add2" onclick="javascript: $('#add2').css('height', 'auto'); $('#add2').css('visibility', 'visible');"><button class="btn btn-success">Añadir Porte <i class="icon-plus icon-white"></i></button></a>
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
													<th>País</th>
													<th>Coste</th>
													<th>Gratis desde</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados2 AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['codigo']?></td>
															<td><?=$listado['pais']?></td>
															<td style="text-align: right;"><?=number_format($listado['precio'], 2, ',', '.')?> €</td>
															<td style="text-align: right;"><?=number_format($listado['max'], 2, ',', '.')?> €</td>
															<td style="text-align: center;">
																<a href="?eliminarprt=<?=$listado['codigo']?>" onclick="return confirm('Desea eliminar los portes de \'\'#<?=$listado['codigo']?> - <?=$listado['pais']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
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