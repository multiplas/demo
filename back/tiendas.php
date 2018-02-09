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
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Google Api</h4>
                        <p>Para mostrar las tiendas sobre el mapa es necesario obtener una clave de la api de google maps. Puede solicitarla <b><a href="https://developers.google.com/maps/documentation/geocoding/get-api-key?hl=es-419" target="_blank">AQUÍ</a></b></p>
                    </div>
                        <div class="row-fluid">
                        <div id="add" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear una Tienda</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="tiendas.php?accion=subirtie" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nueva Tienda</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nfileInput">Imagen</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="nfileInput" name="imagenpagina" type="file">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ntitulo">Nombre tienda </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="ntitulo" name="ntitulo" placeholder="Nombre tienda" >
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="dtienda">Dirección tienda </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="dtienda" name="dtienda" placeholder="Dirección tienda" required>
                                            <span style="color: red; font-size: 0.70rem;">Obligatorio</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ttienda">Teléfono/s tienda </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="ttienda" name="ttienda" placeholder="Teléfonos tienda" >
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="etienda">E-mail tienda </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="etienda" name="etienda" placeholder="E-mail tienda" >
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="descripcion">Descripción</label>
                                          <div class="controls">
                                            <textarea id="descripcion" name="descripcion" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
                                        
                                        <?php if($elementoI[0]['activo'] == 1){ ?>
											<div class="control-group">
											  <label class="control-label" for="descripcion_en">Descripción Inglés</label>
											  <div class="controls">
												<textarea id="descripcion_en" name="descripcion_en" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[1]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_al">Descripción Alemán</label>
											  <div class="controls">
												<textarea id="descripcion_al" name="descripcion_al" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[2]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_fr">Descripción Francés</label>
											  <div class="controls">
												<textarea id="descripcion_fr" name="descripcion_fr" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[3]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_it">Descripción Italiano</label>
											  <div class="controls">
												<textarea id="descripcion_it" name="descripcion_it" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[4]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_po">Descripción Portugués</label>
											  <div class="controls">
												<textarea id="descripcion_po" name="descripcion_po" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[5]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_ca">Descripción Catalán</label>
											  <div class="controls">
												<textarea id="descripcion_ca" name="descripcion_ca" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[6]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_ru">Descripción Ruso</label>
											  <div class="controls">
												<textarea id="descripcion_ru" name="descripcion_ru" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                        
                                        <button type="submit" class="btn btn-primary">Publicar</button>
                                        <button type="button" onclick="location.href = 'tiendas.php';" class="btn">Cancelar</button>
                                      </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
						<?php if (@$elemento != null && $resultaop != 1) { ?>
							<div id="edi" class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Editar una Tienda</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="tiendas.php?editart=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
										  <fieldset>
											<legend>Editar <?=$elemento['nombre']?></legend>
											<div class="control-group">
                                                                                            <label class="control-label" for="fileInput">Imagen</label>
                                                                                            <div class="controls">
                                                                                                <input class="input-file uniform_on" id="fileInput" name="imagenpagina" type="file">
                                                                                                <?php
                                                                                                if ($elemento['imagen'] != null)
                                                                                                {
                                                                                                   ?>
                                                                                                    <a style="color: #09F; font-size: 0.70rem;" href="../imagenesTiendas/<?=$elemento['imagen']?>" target="_blank">ver imagen actual</a>
                                                                                                    <a style="color:red;  font-size: 0.70rem;" href="?eliminartI=<?=$elemento['id']?>" onclick="return confirm('Desea eliminar la página \'\'#<?=$elemento['id']?> - <?=$elemento['nombre']?>\'\' de la web?');">eliminar</a>
                                                                                                   <?php
                                                                                                }
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="control-group">
											  <label class="control-label" for="nombre">Nombre </label>
											  <div class="controls">
												<input type="text" class="span6" id="nombre" name="nombre" placeholder="Nombre de la tienda" value="<?=$elemento['nombre']?>">
												<span style="color: green; font-size: 0.70rem;">Opcional</span>
											  </div>
											</div>
                                                                                        <div class="control-group">
                                                                                            <label class="control-label" for="dtienda">Dirección tienda </label>
                                                                                            <div class="controls">
                                                                                              <input type="text" class="span6" id="dtienda" name="dtienda" placeholder="Dirección tienda" value="<?=$elemento['direccion']?>" required>
                                                                                              <span style="color: red; font-size: 0.70rem;">Obligatorio</span>
                                                                                            </div>
                                                                                          </div>
                                                                                          <div class="control-group">
                                                                                            <label class="control-label" for="ttienda">Teléfono/s tienda </label>
                                                                                            <div class="controls">
                                                                                              <input type="text" class="span6" id="ttienda" name="ttienda" placeholder="Teléfonos tienda" value="<?=$elemento['telefonos']?>">
                                                                                              <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                                                            </div>
                                                                                          </div>
                                                                                          <div class="control-group">
                                                                                            <label class="control-label" for="etienda">E-mail tienda </label>
                                                                                            <div class="controls">
                                                                                              <input type="text" class="span6" id="etienda" name="etienda" placeholder="E-mail tienda" value="<?=$elemento['email']?>">
                                                                                              <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                                                            </div>
                                                                                          </div>
											<div class="control-group">
											  <label class="control-label" for="descripcion">Descripción</label>
											  <div class="controls">
												<textarea id="descripcion" name="descripcion" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion']?></textarea>
											  </div>
											</div>
                                            <?php if($elementoI[0]['activo'] == 1){ ?>
                                                                                        </div>
											<div class="control-group">
											  <label class="control-label" for="descripcion_en">Descripción Inglés</label>
											  <div class="controls">
												<textarea id="descripcion_en" name="descripcion_en" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion_en']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[1]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_al">Descripción Alemán</label>
											  <div class="controls">
												<textarea id="descripcion_al" name="descripcion_al" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion_al']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[2]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_fr">Descripción Francés</label>
											  <div class="controls">
												<textarea id="descripcion_fr" name="descripcion_fr" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion_fr']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[3]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_it">Descripción Italiano</label>
											  <div class="controls">
												<textarea id="descripcion_it" name="descripcion_it" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion_it']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[4]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_po">Descripción Portugués</label>
											  <div class="controls">
												<textarea id="descripcion_po" name="descripcion_po" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion_po']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[5]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="descripcion_ca">Descripción Catalán</label>
											  <div class="controls">
												<textarea id="descripcion_ca" name="descripcion_ca" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion_ca']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[6]['activo'] == 1){ ?>
											<div class="control-group">
											  <label class="control-label" for="descripcion_ru">Descripción Ruso</label>
											  <div class="controls">
												<textarea id="descripcion_ru" name="descripcion_ru" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion_ru']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'tiendas.php';" class="btn">Cancelar</button>
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
                                <div class="muted pull-left">Listado de Tiendas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                       <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Crear Tienda <i class="icon-plus icon-white"></i></button></a>
                                      </div><br><br>
                                   </div>
									<?php if (count($listados) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Nombre</th>
													<th>Dirección</th>
													<th>Teléfonos - E-mails</th>
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
															<td><?=$listado['direccion']?></td>
															<td><?=$listado['telefonos'] . " - " . $listado['email']?></td>
															<td style="text-align: left;">
																<a href="?editart=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                                                                                                                | <a href="?eliminart=<?=$listado['id']?>" onclick="return confirm('Desea eliminar la tienda \'\'#<?=$listado['id']?> - <?=$listado['nombre']?> - <?=$listado['direccion']?>\'\' de la web?');">eliminar</a>
                                                              
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay tiendas!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>