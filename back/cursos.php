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
                     <div class="row-fluid">
                        <div id="add" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear un Curso</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="cursos.php?accion=subircur" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nuevo Curso</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="ncurso">Nombre del Curso </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="ncurso" name="curso" placeholder="Nombre del Curso" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="nedicion">Edición del Curso </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="nedicion" name="edicion" placeholder="Edición del Curso" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ninicio">Fecha Inicio</label>
                                          <div class="controls">
                                            <input type="text" class="input-xlarge datepicker" id="ninicio" placeholder="Fecha inicio curso" name="inicio" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="nfin">Fecha Fin</label>
                                          <div class="controls">
                                            <input type="text" class="input-xlarge datepicker" id="nfin" placeholder="Fecha fin curso" name="fin" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="nprecio">Precio del Curso </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="nprecio" name="precio" placeholder="Precio de la Curso, Ej: 2500" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncolor">Color del Curso </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="ncolor" name="color" placeholder="Color de la Curso" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            <p style="color: #06F; font-size: 0.70rem;">El color para la tabla, debe estar en hexadecimal (AB0BC9)</p>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncontenido">Contenido</label>
                                          <div class="controls">
                                            <textarea id="ncontenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Publicar</button>
                                        <button type="button" onclick="location.href = 'cursos.php';" class="btn">Cancelar</button>
                                      </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
						<?php if (@$elemento != null && $resultaop != 1) { ?>
                     <div class="row-fluid">
							<div id="edi" class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Editar un Curso</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="cursos.php?editarc=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
										  <fieldset>
											<legend>Editar <?=$elemento['curso']?></legend>
                                            <div class="control-group">
                                              <label class="control-label" for="curso">Nombre del Curso </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="curso" name="curso" value="<?=$elemento['curso']?>" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="edicion">Edición del Curso </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="edicion" name="edicion" value="<?=$elemento['edicion']?>" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="inicio">Fecha Inicio</label>
                                              <div class="controls">
                                                <input type="text" class="input-xlarge datepicker" id="inicio" value="<?=date_format(date_create($elemento['inicio']), 'm/d/Y')?>" name="inicio" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="fin">Fecha Fin</label>
                                              <div class="controls">
                                                <input type="text" class="input-xlarge datepicker" id="fin" value="<?=date_format(date_create($elemento['fin']), 'm/d/Y')?>" name="fin" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="precio">Precio del Curso </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="precio" name="precio" value="<?=$elemento['precio']?>" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="color">Color del Curso </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="color" name="color" value="<?=$elemento['color']?>" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                <p style="color: #06F; font-size: 0.70rem;">El color para la tabla, debe estar en hexadecimal (AB0BC9)</p>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="contenido">Contenido</label>
                                              <div class="controls">
                                                <textarea id="contenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion']?></textarea>
                                              </div>
                                            </div>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'cursos.php';" class="btn">Cancelar</button>
										  </fieldset>
										</form>
									</div>
								</div>
							</div>
                        </div>
						<?php } ?>
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Cursos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Nuevo Curso <i class="icon-plus icon-white"></i></button></a>
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
									<?php if (count($listados) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Curso</th>
													<th>Inicio</th>
													<th>Fin</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id']?></td>
															<td><?=$listado['curso']?> (<?=$listado['edicion']?>a ED)</td>
                                                            <td><?=date_format(date_create($listado['inicio']), 'd-m-Y')?></td>
                                                            <td><?=date_format(date_create($listado['fin']), 'd-m-Y')?></td>
															<td><?=$listado['visible'] == 1 ? 'visible' : 'oculto'?></td>
															<td style="text-align: center;">
																<a href="?estadocur=<?=$listado['id']?>"><?=$listado['visible'] == 1 ? 'ocultar' : 'mostrar'?></a>
																&#124;
																<a href="?editarc=<?=$listado['id']?>">editar</a>
																&#124;
																<a href="?eliminarc=<?=$listado['id']?>" onclick="return confirm('Desea eliminar el curso \'\'#<?=$listado['id']?> - <?=$listado['curso']?> <?=$listado['edicion']?>a ED\'\' de la web?');">eliminar</a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay cursos!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>