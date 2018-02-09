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
                        <h4>MENÚS</h4>
                        <p>Esta sección se encarga de crear el menú que se visualizará en la parte frontal de la web. Se debe crear el menú en su totalidad, con sus posibles submenús.</p><p><strong>IMPORTANTE:</strong> Esta sección muestra el menú que quedará en la parte frontal, pero para que de acceso a los productos, se debe relacionar las categorías de los productos, que se realiza en la sección categorías, con las partes de este menú.</p>
                    </div>
                     <div class="row-fluid">
						<div id="add" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear un Menú</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="menus.php?accion=subirco" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nuevo Menú</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="nnombre">Nombre en Español</label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="nnombre" name="nombre" placeholder="Nombre del menú" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>                     
                                        <?php
                                            foreach ($idiomas AS $idioma)
                                            {
                                                ?>
                                                    <div class="control-group">
                                                      <label class="control-label" for="nnombre">Nombre en <?=$idioma['nombre']?></label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="nnombre" name="nombre<?=$idioma['id']?>" placeholder="Nombre del menú">
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                <?php
                                            }
                                        ?>
                                        <div class="control-group">
                                          <label class="control-label" for="nnombre">Url</label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="url_enlace" name="url_enlace" placeholder="Url">
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
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
                                          <div class="control-group">
                                          <label class="control-label" for="ncontenido">Descripción</label>
                                          <div class="controls">
                                            <textarea id="ncontenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="nimagen">Imagen</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="nimagen" name="imagen" type="file">
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
										<form action="menus.php?editarm=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
										  <fieldset>
											<legend>Editar <?=$elemento['nombre']?></legend>
											<div class="control-group">
											  <label class="control-label" for="nombre">Nombre en Español </label>
											  <div class="controls">
												<input type="text" class="span6" name="nombre" placeholder="Nombre del menú" value="<?=$elemento['nombre']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
                                            <?php
                                                foreach ($idiomas AS $idiom)
                                                {
                                                    $cont = 0;
                                                    foreach ($idiomasm AS $idioma)
                                                    {
                                                        
                                                        if($idiom['iniciales'] == $idioma['idioma']){
                                                            $cont = 1;
                                                        ?>
                                                            <div class="control-group">
                                                              <label class="control-label" for="nnombre">Nombre en <?=$idiom['nombre']?></label>
                                                              <div class="controls">
                                                                <input type="text" class="span6" id="nnombre" name="nombre<?=$idiom['id']?>" placeholder="Nombre del menú" value="<?=$idioma['nombre']?>">
                                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                              </div>
                                                            </div>
                                                        <?php
                                                        }
                                                    }
                                                    if($cont == 0){
                                                    ?>
                                                        <div class="control-group">
                                                          <label class="control-label" for="nnombre">Nombre en <?=$idiom['nombre']?></label>
                                                          <div class="controls">
                                                            <input type="text" class="span6" id="nnombre" name="nombre<?=$idiom['id']?>" placeholder="Nombre del menú" value="">
                                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                          </div>
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                            ?>
                                                                                        <div class="control-group">
                                          <label class="control-label" for="nnombre">Url</label>
                                          <div class="controls">
                                              <input type="text" class="span6" id="url_enlace" name="url_enlace" placeholder="Url" value="<?=$elemento['url']?>">
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
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
                                          <div class="control-group">
                                          <label class="control-label" for="ncontenido">Descripción</label>
                                          <div class="controls">
                                            <textarea id="ncontenido" name="contenido2" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion']?></textarea>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                                <label class="control-label" for="imagen">Imagen</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="imagen" name="imagen" type="file">
                                                    <?php
                                                    if ($elemento['imagen'] != null)
                                                    {
                                                       ?>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../imagenesproductos/<?=$elemento['imagen']?>" target="_blank">ver imagen actual</a>
                                                       <?php
                                                    }
                                                    ?>
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
                    
                        <script>
                            $(document).ready(function () {
                                var data_id = '';
                                var data_name = '';
                                
                                $('.open-Modal').click(function () {
                                    
                                    //alert('error 00');
                                    if (typeof $(this).data('id') !== 'undefined') {
                                        data_id = $(this).data('id');
                                        data_name = $(this).data('name');
                                        //alert('valor: ' + $(this).data('id'));
                                    }
                                    //$('#id-elemento').text(data_id);
                                    $('#elemento').text(data_name);
                                })
                                
                                $('#btn-eliminar').click(function () {
                                    var url = "?eliminarm=" + data_id;
                                    location.href = url;
                                })
                                
                            });
                        </script>
                    
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR MENÚ</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar el menú "<strong><span id="elemento"></span></strong>"?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button id="btn-eliminar" type="button" class="btn btn-danger">Eliminar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                    
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
                                         <a href="menus_orden.php"><button style="margin-left: 5px;" class="btn btn-success">Ordenar Menú <i class="icon-refresh icon-white"></i></button></a>
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
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
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
                                                                <a class="open-Modal" href="#" data-name="<?=$listado['nombre']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
																<!--<a href="?eliminarm=<?=$listado['id']?>" onclick="return confirm('Desea eliminar el menú \'\'#<?=$listado['id']?> - <?=$listado['nombre']?>\'\' de la web?');">eliminar</a>-->
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