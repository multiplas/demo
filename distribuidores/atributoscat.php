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
						<div id="add" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear una Categoría de Atrbutos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="atributoscat.php?accion=subircatat" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nueva Categoría de Atrbutos</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="natributo">Nombre </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="natributo" name="atributo" placeholder="Nombre de la Categoría" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="dependiente">Dependiente</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" name="dependiente" id="dependiente" value="dependiente">
                                              Marcar para definir como dependiente de otra categoría
                                            </label>
                                          </div>
                                        </div>
										<button type="submit" class="btn btn-primary">Añadir</button>
										<button type="button" onclick="location.href = 'atributoscat.php';" class="btn">Cancelar</button>
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
									<div class="muted pull-left">Editar una Categoría de Atrbutos</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="atributoscat.php?editarcatat=<?=$elemento['id']?>" method="post" class="form-horizontal">
										  <fieldset>
											<legend>Editar <?=$elemento['atributo']?></legend>
											<div class="control-group">
											  <label class="control-label" for="atributo">Nombre </label>
											  <div class="controls">
												<input type="text" class="span6" id="atributo" name="atributo" placeholder="Nombre de la Categoría" value="<?=$elemento['atributo']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
                                            <div class="control-group">
                                              <label class="control-label" for="dependiente2">Dependiente</label>
                                              <div class="controls">
                                                <label class="uniform">
                                                  <input class="uniform_on" type="checkbox" name="dependiente" id="dependiente2"<?=$elemento['dependiente'] > 0 ? ' checked' : ''?> value="dependiente">
                                                  Marcar para definir como dependiente de otra categoría
                                                </label>
                                              </div>
                                            </div>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'atributoscat.php';" class="btn">Cancelar</button>
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
                                <div class="muted pull-left">Listado de Categorías de Atrbutos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Añadir Categoría <i class="icon-plus icon-white"></i></button></a>
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
													<th>Categoría</th>
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
															<td><?=$listado['atributo']?></td>
															<td style="text-align: center;">
																<a href="?editarcatat=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
																<a href="?eliminarcatat=<?=$listado['id']?>" onclick="return confirm('Desea eliminar la categoría \'\'#<?=$listado['id']?> - <?=$listado['atributo']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay categorías!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                     <div class="row-fluid">
						<div id="add2" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear un Atributo</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="atributoscat.php?accion=subirat" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nuevo Atributo</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="natributo">Nombre </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="natributo" name="atributo" placeholder="Nombre de la Categoría" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncatea">Categoría</label>
                                          <div class="controls">
											<select id="ncatea" name="catea" class="chzn-select span4" required>
												<option value="c-padre" selected>Categoría</option>
												<?php
													foreach ($listados AS $listado)
													{
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['atributo']?></option>
                                                        <?php
													}
												?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Requerido</span>
										  </div>
                                        </div>
										<button type="submit" class="btn btn-primary">Añadir</button>
										<button type="button" onclick="location.href = 'atributoscat.php';" class="btn">Cancelar</button>
                                      </fieldset>
									</form>
								</div>
							</div>
						</div>
                    </div>
						<?php if (@$elemento2 != null && $resultaop2 != 1) { ?>
                     <div class="row-fluid">
							<div id="edi" class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Editar un Atributo</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="atributoscat.php?editarat=<?=$elemento2['id']?>" method="post" class="form-horizontal">
										  <fieldset>
											<legend>Editar <?=$elemento2['atributo']?></legend>
											<div class="control-group">
											  <label class="control-label" for="atributo">Nombre </label>
											  <div class="controls">
												<input type="text" class="span6" id="atributo" name="atributo" placeholder="Nombre de la Categoría" value="<?=$elemento2['atributo']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
                                            <div class="control-group">
                                              <label class="control-label" for="catea">Categoría</label>
                                              <div class="controls">
                                                <select id="catea" name="catea" class="chzn-select span4" required>
                                                    <option value="c-padre" selected>Categoría</option>
                                                    <?php
                                                        foreach ($listados AS $listado)
                                                        {
                                                            ?>
                                                                <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento2['tipoid'] ? ' selected' : ''?>><?=$listado['atributo']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span style="color: green; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento2['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'atributoscat.php';" class="btn">Cancelar</button>
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
                                <div class="muted pull-left">Listado de Atributos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#add2" onclick="javascript: $('#add2').css('height', 'auto'); $('#add2').css('visibility', 'visible');"><button class="btn btn-success">Añadir Atributo <i class="icon-plus icon-white"></i></button></a>
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
													<th>Categoría</th>
													<th>Atributo</th>
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
															<td><?=$listado['atributocat']?></td>
															<td><?=$listado['atributo']?></td>
															<td style="text-align: center;">
																<a href="?editarat=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
																<a href="?eliminarat=<?=$listado['id']?>" onclick="return confirm('Desea eliminar la categoría \'\'#<?=$listado['id']?> - <?=$listado['atributo']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay atributos!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>