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
                                <div class="muted pull-left">Crear una Categoría de Atributos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="atributoscat.php?accion=subircatat" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nueva Categoría de Atributos</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="natributo">Nombre </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="natributo" name="atributo" placeholder="Nombre de la Categoría" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="mensaje">Mensaje </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="mensaje" name="mensaje" placeholder="Mensaje a mostrar como primera opción del atributo.">
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
                                            <br><span style="color: green; font-size: 0.70rem;">Mensaje a mostrar como primera opción del atributo.</span>
                                          </div>
                                        </div>
                                        <!-- <div class="control-group">
                                          <label class="control-label" for="dependiente">Dependiente</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" name="dependiente" id="dependiente" value="dependiente">
                                              Marcar para definir como dependiente de otra categoría
                                            </label>
                                          </div>
                                        </div> -->
                                        <div class="control-group">
                                          <label class="control-label" for="obligatorio">Obligatorio</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" name="obligatorio" id="obligatorio" value="obligatorio">
                                              Marcar para definir como atributo obligatorio de compra
                                            </label>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="obligatorio2">Obligatorio (Selección)</label>
                                            <div class="controls">
                                                <label class="uniform">
                                                    <input class="uniform_on" type="checkbox" name="obligatorio2" id="obligatorio2" value="obligatorio2">
                                                    Marcar para definir como atributo de selección obligatoria para añadir a la cesta
                                                </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="desglosado">Desglosado</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" name="desglosado" id="desglosado" value="desglosado">
                                              Marcar para definir como atributo desglosado en el pedido de una compra
                                            </label>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="oculto">Oculto</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" name="oculto" id="oculto" value="oculto">
                                              Marcar para definir como atributo oculto en la ficha de producto
                                            </label>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncontenido">Descripción</label>
                                          <div class="controls">
                                            <textarea id="ncontenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
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
									<div class="muted pull-left">Editar una Categoría de Atributos</div>
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
                                                                                            <label class="control-label" for="mensaje">Mensaje </label>
                                                                                            <div class="controls">
                                                                                              <input type="text" class="span6" id="mensaje" name="mensaje" placeholder="Mensaje a mostrar como primera opción del atributo." value="<?=$elemento['mensaje']?>">
                                                                                                                                          <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                                                              <br><span style="color: green; font-size: 0.70rem;">Mensaje a mostrar como primera opción del atributo.</span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="control-group">
                                                                                            <label class="control-label" for="obligatorio">Obligatorio</label>
                                                                                            <div class="controls">
                                                                                              <label class="uniform">
                                                                                                <input class="uniform_on" type="checkbox" name="obligatorio" id="obligatorio" value="obligatorio" <?=@$elemento['obligatorio'] == 'Si' ? 'checked' : ''?>=>
                                                                                                Marcar para definir como atributo obligatorio de compra sin elección
                                                                                              </label>
                                                                                            </div>
                                                                                          </div>
                                                                                         <div class="control-group">
                                                                                            <label class="control-label" for="obligatorio2">Obligatorio (Selección)</label>
                                                                                            <div class="controls">
                                                                                              <label class="uniform">
                                                                                                <input class="uniform_on" type="checkbox" name="obligatorio2" id="obligatorio2" value="obligatorio2" <?=@$elemento['obligatorio2'] == 'Si' ? 'checked' : ''?>=>
                                                                                                Marcar para definir como atributo de selección obligatoria para añadir a la cesta
                                                                                              </label>
                                                                                            </div>
                                                                                          </div>
                                                                                        <div class="control-group">
                                                                                            <label class="control-label" for="desglosado">Desglosado</label>
                                                                                            <div class="controls">
                                                                                              <label class="uniform">
                                                                                                <input class="uniform_on" type="checkbox" name="desglosado" id="desglosado" value="desglosado" <?=@$elemento['desglosado'] == 'Si' ? 'checked' : ''?>>
                                                                                                Marcar para definir como atributo desglosado en el pedido de una compra
                                                                                              </label>
                                                                                            </div>
                                                                                          </div>
                                                                                        <div class="control-group">
                                                                                            <label class="control-label" for="oculto">Oculto</label>
                                                                                            <div class="controls">
                                                                                              <label class="uniform">
                                                                                                <input class="uniform_on" type="checkbox" name="oculto" id="oculto" value="oculto" <?=@$elemento['oculto'] == 'Si' ? 'checked' : ''?>>
                                                                                                Marcar para definir como atributo oculto en la ficha de producto
                                                                                              </label>
                                                                                            </div>
                                                                                         </div>
                                                                                        <div class="control-group">
                                                                                            <label class="control-label" for="ncontenido">Descripción</label>
                                                                                            <div class="controls">
                                                                                              <textarea id="ncontenido" name="contenido2" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion']?></textarea>
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
                    
                    <script>
                            $(document).ready(function () {
                                var data_id = '';
                                var data_name = '';
                                var data_valor = '';
                                
                                $('.open-Modal').click(function () {
                                    
                                    //alert('error 00');
                                    if (typeof $(this).data('id') !== 'undefined') {
                                        data_id = $(this).data('id');
                                        data_name = $(this).data('name');
                                        data_valor = $(this).data('valor');
                                        //alert('valor: ' + $(this).data('id'));
                                    }
                                    //$('#id-elemento').text(data_id);
                                    $('#elemento').text(data_name);
                                })
                                
                                $('#btn-eliminar').click(function () {
                                    if(data_valor == '0')
                                        var url = "?eliminarcatat=" + data_id;
                                    else
                                        var url = "?eliminarat=" + data_id;
                                        
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
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR CATEGORÍA/ATRIBUTO</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar la categoría/atributo "<strong><span id="elemento"></span></strong>"?
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
                                <div class="muted pull-left">Listado de Categorías de Atributos</div>
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
                                                                                                        <th>Mensaje</th>
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
                                                                                                                        <td><?=$listado['mensaje']?></td>
															<td style="text-align: center;">
																<a href="?editarcatat=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                                                <a class="open-Modal" href="#" data-valor="0" data-name="<?=$listado['atributo']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
																<!--<a href="?eliminarcatat=<?=$listado['id']?>" onclick="return confirm('Desea eliminar la categoría \'\'#<?=$listado['id']?> - <?=$listado['atributo']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>-->
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
                                                                <a class="open-Modal" href="#" data-valor="1" data-name="<?=$listado['atributo']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
																<!--<a href="?eliminarat=<?=$listado['id']?>" onclick="return confirm('Desea eliminar la categoría \'\'#<?=$listado['id']?> - <?=$listado['atributo']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>-->
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