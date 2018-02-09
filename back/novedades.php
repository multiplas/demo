				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
                    
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Novedades</h4>
                        <p>Esta sección se encarga de los artículos marcados como novedades. Puede activarlos para que se muestren o desactivarlos, puede elegir automático o manual y seleccionar las novedades.</p>
                    </div>
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Esta sección se muestra abajo de más vendidos.</h4>
                    </div>
                    
					<?php if ($resultaop) { ?>
						<div class="row-fluid">
							<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php } ?>
                     <div class="row-fluid">
						<div id="add" class="block" style="height: 0px; visibility: hidden;">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Añadir artículo a novedades</div>
							</div>
							<div style="padding-bottom:250px;" class="block-content collapse in">
								<div class="span12">
									<form action="novedades.php?accion=subirnov" method="post" class="form-horizontal" enctype="multipart/form-data">
									  <fieldset>
										<legend>Añadir artículo a novedades</legend>
										<div class="control-group">
										  <label class="control-label" for="mv">Artículo </label>
										  <div class="controls">
											<select id="mv" name="mv" class="chzn-select span4">
                                                                                            <option value="">Artículo</option>
                                                                                            <?php
                                                                                                foreach ($listadosalt AS $listado)
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
                                        
                                        
                                                                                <button type="submit" class="btn btn-primary" style="position: absolute; bottom: 0px;">Añadir</button>
                                                                                <button type="button" onclick="location.href = 'novedades.php';" class="btn" style="position: absolute; bottom: 0px; left: 80px">Cancelar</button>
									  </fieldset>
									</form>
								</div>
							</div>
						</div>
                    </div>
						
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
                                    var url = "?eliminarnov=" + data_id;
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
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR NOVEDAD</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar el producto "<strong><span id="elemento"></span></strong>" de la lista?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button id="btn-eliminar" type="button" class="btn btn-danger">Eliminar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                        
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Opciones</div>
                            </div>
                            <form action="novedades.php?accion=novopciones" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <div class="block-content collapse in">
                                <div class="control-group">
                                    <label class="control-label" for="novedades">Mostrar</label>
                                    <div class="controls">
                                        <select id="novedades" name="novedades" class="">
                                            <option value="0" <?=($elemento['novedades'] == 0 ? ' selected' : '')?>>No</option>
                                            <option value="1" <?=($elemento['novedades'] == 1 ? ' selected' : '')?>>Sí</option>
                                        </select><br>
                                        <span style="color: #09F; font-size: 0.70rem;">Mostrar o no las novedades en la web.</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="novmodo">Modo</label>
                                    <div class="controls">
                                        <select id="novmodo" name="novmodo" class="">
                                            <option value="0" <?=($elemento['novmodo'] == 0 ? ' selected' : '')?>>Automático</option>
                                            <option value="1" <?=($elemento['novmodo'] == 1 ? ' selected' : '')?>>Manual</option>
                                        </select><br>
                                        <span style="color: #09F; font-size: 0.70rem;">Elija el modo en que desea que funcione. Para elegir los productos que se mostrarán use Manual.</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="posicion">Posición</label>
                                    <div class="controls">
                                        <select id="posicion" name="posicion" class="">
                                            <option value="0" <?=($elemento['novposicion'] == 0 ? ' selected' : '')?>>Debajo Slider</option>
                                            <option value="1" <?=($elemento['novposicion'] == 1 ? ' selected' : '')?>>Encima Slider</option>
                                        </select><br>
                                        <span style="color: #09F; font-size: 0.70rem;">Elija la posición en que desea que se muestre.</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="textonov">Texto Novedades</label>
                                    <div class="controls">
                                        <input class="span6" type="text" name="textonov" id="textonov" value="<?=$elemento['textonov']?>" placeholder="Texto Novedades"><br>
                                        <span style="color: #09F; font-size: 0.70rem;">Texto que se mostrará en la cabecera de novedades. Para usar texto por defecto dejar en blanco.</span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" style="position: absolute; bottom: 0px;">Guardar</button>
                                <button type="button" onclick="location.href = 'novedades.php';" class="btn" style="position: absolute; bottom: 0px; left: 80px">Cancelar</button>
                            </div>
                            </form>
                        </div>
                    
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Novedades</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Añadir a Novedades <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      
                                   </div>
									<?php if (count($listados) > 0) { ?>
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                                            <thead>
                                                <tr role="row">
													<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Producto</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
												<?php
													foreach ($listados AS $listado)
													{
                                                        if (@$lineapi != 'odd')
                                                            $lineapi = 'odd';
                                                        else
                                                            $lineapi = 'even';
														?>
														<tr class="<?=$lineapi?>">
															<td valign="top" class=""  style="text-align: center;"><?=$listado['id']?></td>
															<td valign="top" class="" ><?=$listado['nombre']?></td>
															<td valign="top" class=""  style="text-align: center;">
                                                                                                                            <a class="open-Modal" href="#" data-name="<?=$listado['nombre']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
                                            </tbody>
                                        </table>
									<?php } else { ?>
										<p>No hay productos!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>