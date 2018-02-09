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
                                <div class="muted pull-left">Crear una Relación de Atributo</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="relacion_atributos.php?accion=subiratrre" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nueva Relación de Atributo</legend>
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
                                        <!--<div class="control-group">
                                          <label class="control-label" for="natributod">Atributo Independiente</label>
                                          <div class="controls">
											<select id="natributod" name="atributod" class="chzn-select span4">
												<option value="c-padre" selected>Seleccione Atributo</option>
												<?php
                                                    $atrcatant = '';
													foreach ($listados4 AS $listado)
													{
                                                        if ($atrcatant != $listado['atributocat'])
                                                        {
                                                            if ($atrcatant != '') { ?></optgroup><?php } ?><optgroup label="<?=$listado['atributocat']?>"><?php
                                                            $atrcatant = $listado['atributocat'];
                                                        }
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['atributo']?></option>
                                                        <?php
													}
												?></optgroup>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
                                        </div>-->
                                        <div class="control-group">
                                          <label class="control-label" for="natributo">Atributo Relacionado</label>
                                          <div class="controls">
											<select id="natributo" name="atributo" class="chzn-select span4" required>
												<option value="c-padre" selected>Seleccione Atributo</option>
												<?php
													foreach ($listados3 AS $listado)
													{
                                                        if ($atrcatant != $listado['atributocat'])
                                                        {
                                                            if ($atrcatant != '') { ?></optgroup><?php } ?><optgroup label="<?=$listado['atributocat']?>"><?php
                                                            $atrcatant = $listado['atributocat'];
                                                        }
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['atributo']?></option>
                                                        <?php
													}
												?>
											</select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
                                        </div>
										<!--<div class="control-group">
										  <label class="control-label" for="nprecio">Precio Especial</label>
										  <div class="controls">
											<input type="text" class="span2" id="nprecio" name="precio" placeholder="Precio especial del producto">
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Rellenar solo si la selección modifica el precio.</span>
										  </div>
										</div>-->
										<button type="submit" class="btn btn-primary">Crear Relación</button>
										<button type="button" onclick="location.href = 'relacion_atributos.php';" class="btn">Cancelar</button>
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
                                <div class="muted pull-left">Listado de Atributos Relacionados</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<?php if (count($listados2) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                                            <thead>
                                                <tr role="row">
													<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Producto</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Categoría/Atributo</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dependencia</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Precio</th>
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
															<td valign="top" class="" style="text-align: center;"><?=$listado['idpa']?></td>
															<td valign="top" class=""><?=$listado['producto']?></td>
															<td valign="top" class=""><?=$listado['atributocat']?>: <?=$listado['atributo']?></td>
															<td valign="top" class=""><?=$listado['idad'] != null ? $listado['atributocatd'].': '.$listado['atributod'] : 'NO-DEPENDIENTE'?></td>
															<td valign="top" class="" style="text-align: right;"><?=$listado['precio'] != null ? number_format($listado['precio'], 2, '.', ',').' €' : ''?></td>
															<td valign="top" class="" style="text-align: center;">
																<a href="?eliminaratrre=<?=$listado['idpa']?>" onclick="return confirm('Desea eliminar la relación (#<?=$listado['idpa']?>) entre el producto \'\'#<?=$listado['idp']?> - <?=$listado['producto']?>\'\' y el atributo relacionado \'\'#<?=$listado['ida']?> - <?=$listado['atributocat']?> <?=$listado['atributo']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay atributos relacionados!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>