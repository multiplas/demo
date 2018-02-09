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
                                <div class="muted pull-left">Crear un Código Promocional</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="promocionales.php?accion=subirpromo" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nuevo Código Promocional</legend>
										<div class="control-group">
										  <label class="control-label" for="promo">Promoción </label>
										  <div class="controls">
											<input type="text" class="span3" id="promo" name="promo" placeholder="Promoción " required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="codigo">Código (sin espacios)</label>
										  <div class="controls">
											<input type="text" class="span3" id="codigo" name="codigo" placeholder="Código " required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="descuento">Descuento </label>
										  <div class="controls">
											<input type="text" class="span3" id="descuento" name="descuento" placeholder="Descuento " required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="tipo">Tipo de descuento</label>
										  <div class="controls">
											<select id="tipo" name="tipo" class="chzn-select span4" required>
												<option value="">Selecciona</option>
												<option value="e">Directo (€)</option>
												<option value="p">Porcentaje (%)</option>
											</select>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="inicio">Fecha inicio </label>
										  <div class="controls">
											<input type="text" class="span3" id="inicio" name="inicio" placeholder="Fecha inicio " required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #06F; font-size: 0.70rem;">dd/mm/aaaa</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="fin">Fecha fin </label>
										  <div class="controls">
											<input type="text" class="span3" id="fin" name="fin" placeholder="Fecha fin " required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #06F; font-size: 0.70rem;">dd/mm/aaaa</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="min">Cantidad mínima € </label>
										  <div class="controls">
											<input type="text" class="span3" id="min" name="min" placeholder="Cantidad mínima € " required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Precio mínimo en la cesta para aplicar el código</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="max">Cantidad máxima € </label>
										  <div class="controls">
											<input type="text" class="span3" id="max" name="max" placeholder="Cantidad máxima €" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Precio máximo en la cesta para aplicar el código</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="cantidad">Cantidad de códigos </label>
										  <div class="controls">
											<input type="text" class="span3" id="cantidad" name="cantidad" placeholder="Cantidad" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Cantidad de códigos</span>
										  </div>
										</div>
										<button type="submit" class="btn btn-primary">Añadir</button>
										<button type="button" onclick="location.href = 'promocionales.php';" class="btn">Cancelar</button>
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
                                <div class="muted pull-left">Listado de Códigos Promocionales</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#add2" onclick="javascript: $('#add2').css('height', 'auto'); $('#add2').css('visibility', 'visible');"><button class="btn btn-success">Añadir Códigos Promocionales <i class="icon-plus icon-white"></i></button></a>
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
                                                    <th>Promoción</th>
                                                    <th>Código</th>
                                                    <th>Descuento</th>
                                                    <th>Inicio</th>
                                                    <th>Fin</th>
                                                    <th>Desde</th>
                                                    <th>Hasta</th>
                                                    <th>Cantidad</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados2 AS $listado)
													{
														?>
														<tr>
															<td><?=$listado['promocion']?></td>
															<td><?=$listado['codigo']?></td>
															<td><?=$listado['descuento']?> <?=$listado['tipo']?></td>
															<td><?=date_format(date_create($listado['inicio']), 'd/m/Y')?></td>
															<td><?=date_format(date_create($listado['caducidad']), 'd/m/Y')?></td>
															<td><?=number_format($listado['min'], 2, ',', '.')?> €</td>
															<td><?=number_format($listado['max'], 2, ',', '.')?> €</td>
															<td><?=$listado['cantidad']?> restantes</td>
															<td style="text-align: center;">
																<a href="?eliminarcodpromo=<?=$listado['codigo']?>&amp;tipoeli=<?=$listado['tipo'] == '€' ? 'e' : 'p'?>" onclick="return confirm('Desea eliminar la promoción \'\'<?=$listado['promocion']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
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