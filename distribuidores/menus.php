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
                                <div class="muted pull-left">Crear un Menú</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="menus.php?accion=subirco" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nuevo Menú</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="nnombre">Nombre </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="nnombre" name="nombre" placeholder="Nombre del menú" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="multiSelect2">Menú Padre</label>
                                          <div class="controls">
											<select id="multiSelect2" name="catep" class="chzn-select span4">
												<option value="c-padre" selected>Categoría Padre</option>
												<?php
													foreach ($listados AS $listado)
													{
														if (strtolower($listado['nombre']) != 'inicio')
														{
															?>
																<option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
															<?php
														}
													}
												?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Selecciona el menú del que va a formar parte</span>
										  </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncategoria">Categoría</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" name="categoria" id="ncategoria" value="cat">
                                              Marcar para definir como categoria de productos
                                            </label>
                                          </div>
                                        </div>
										<button type="submit" class="btn btn-primary">Añadir</button>
										<button type="button" onclick="location.href = 'menus.php';" class="btn">Cancelar</button>
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
									<div class="muted pull-left">Editar un Menú</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="menus.php?editarm=<?=$elemento['id']?>" method="post" class="form-horizontal">
										  <fieldset>
											<legend>Editar <?=$elemento['nombre']?></legend>
											<div class="control-group">
											  <label class="control-label" for="nombre">Nombre </label>
											  <div class="controls">
												<input type="text" class="span6" name="nombre" placeholder="Nombre del menú" value="<?=$elemento['nombre']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="multiSelect">Categoría Padre</label>
											  <div class="controls">
												<select id="multiSelect" name="catep" class="chzn-select span4">
													<option value="c-padre">Categoría Padre</option>
													<?php
														foreach ($listados AS $listado)
														{
															if (strtolower($listado['nombre']) != 'inicio')
															{
																?>
																	<option value="<?=$listado['id']?>"<?=($elemento['id_padre'] == $listado['id'] ? ' selected' : '')?>><?=$listado['nombre']?></option>
																<?php
															}
														}
													?>
												</select>
												<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
												<span style="color: #09F; font-size: 0.70rem;">Selecciona el menú del que va a formar parte</span>
											  </div>
											</div>
                                            <div class="control-group">
                                              <label class="control-label" for="categoria">Categoría</label>
                                              <div class="controls">
                                                <label class="uniform">
                                                  <input class="uniform_on" type="checkbox" name="categoria" id="categoria" value="cat"<?=($elemento['categoria'] ? ' checked' : '')?>>
                                                  Marcar para definir como categoria de productos
                                                </label>
                                              </div>
                                            </div>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'menus.php';" class="btn">Cancelar</button>
										  </fieldset>
										</form>
									</div>
								</div>
							</div>
                        </div>
						<?php } ?>
                        <!-- block -->
                     <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Menús</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Añadir Menú <i class="icon-plus icon-white"></i></button></a>
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
													<th>Menú</th>
													<th>Orden</th>
													<th>Menú Padre</th>
													<th>Categoria</th>
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
															<td><?=$listado['nombre']?></td>
															<td><?=$listado['orden']?></td>
															<td><?=$listado['padre']?></td>
															<td><?=$listado['categoria'] ? 'Si' : 'No'?></td>
															<td style="text-align: center;">
																<a href="?editarm=<?=$listado['id']?>">editar</a>
																&#124;
																<a href="?eliminarm=<?=$listado['id']?>" onclick="return confirm('Desea eliminar el menú \'\'#<?=$listado['id']?> - <?=$listado['nombre']?>\'\' de la web?');">eliminar</a>
															</td>
														</tr>
														<?php
													}
												?>
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