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
                                <div class="muted pull-left">Crear un campo en Pedido</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="extrasPedido.php?accion=subirxp" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nuevo Campo</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="ntitulo">Nombre campo </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="ntitulo" name="ntitulo" placeholder="Nombre tienda" >
                                            <span style="color: red; font-size: 0.70rem;">Obligatorio</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="tipo">Tipo campo </label>
                                          <div class="controls">
                                              <select id="tipo" name="tipo" class="chzn-select span4" required>
                                                <option value="0">Text</option>
                                                <option value="1">Textarea</option>
                                                <option value="2">Archivo</option>
                                            </select>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                          </div>
                                        </div>    
                                        
                                        
                                        <br><br>
                                        <button type="submit" class="btn btn-primary">Añadir</button>
                                        <button type="button" onclick="location.href = 'extrasPedido.php';" class="btn">Cancelar</button>
                                      </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php if (@$elemento != null && $resultaop != 1) { ?>
			<div id="edi" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar un campo en Pedido</div>
                                    </div>
                                    <div class="block-content collapse in">
                                        <div class="span12">
                                            <form action="extrasPedido.php?editaxp=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
						<fieldset>
                                                    <legend>Editar <?=$elemento['nombre']?></legend>
                                                    <div class="control-group">
                                                        <label class="control-label" for="nombre">Nombre </label>
                                                            <div class="controls">
                                                                <input type="text" class="span6" id="nombre" name="nombre" placeholder="Nombre de la tienda" value="<?=$elemento['nombre']?>">
                                                                <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                            </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="tipo">Tipo de producto</label>
                                                      <div class="controls">
                                                          <select id="tipo" name="tipo" class="chzn-select span4" required onchange="cambioTipo();">
                                                            <option value="0" <?=($elemento['tipo'] == 0 || $elemento['tipo'] == '' || $elemento['tipo'] == null) ? 'selected' : ''?>>Text</option>
                                                            <option value="1" <?=($elemento['tipo'] == 1) ? 'selected' : ''?>>Textarea</option>
                                                            <option value="2" <?=($elemento['tipo'] == 2) ? 'selected' : ''?>>Archivo</option>
                                                        </select>
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                                      </div>
                                                    </div>    
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<br><br><button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'extrasPedido.php';" class="btn">Cancelar</button>
										  </fieldset>
										</form>
									</div>
								</div>
							</div>
						<?php } ?>
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Campos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                       <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Crear Campo <i class="icon-plus icon-white"></i></button></a>
                                      </div><br><br>
                                   </div>
									<?php if (count($listados) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Nombre</th>
													<th>Tipo</th>
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
															<td><?=$listado['tipo'] == 0 ? 'Text' : ($listado['tipo'] == 1 ? 'Textarea' : 'Archivo')?></td>
                                                                                                                        <td style="text-align: left;">
																<a href="?editarxp=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                                                                                                                | <a href="?eliminarxp=<?=$listado['id']?>" onclick="return confirm('Desea eliminar el campo \'\'#<?=$listado['id']?> - <?=$listado['nombre']?>\'\' de la web?');">eliminar</a>
                                                              
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay Campos!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>