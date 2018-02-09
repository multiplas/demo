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
                        <h4>IMÁGENES CATEGORÍAS</h4>
                        <p>Se recomienda poner imágenes con cualquier resolución pero cuadrada</p><p><strong>IMPORTANTE:</strong> Si pone imágenes que no sea cuadrada, la imagen no se mostrará de forma adecuada.</p>
                    </div>
                    
                     <div class="row-fluid">
						<div id="add" class="block" style="display: none;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Subir una imagen</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="cat-imagen.php?accion=subiric" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nueva imagen de categoría</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Imagen</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="imagenslider" type="file">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncategoria">Categoría</label>
                                          <div class="controls">
                                            <select id="ncategoria" name="categoria" class="chzn-a span7" >
                                                <?php
                                                    foreach ($listadosalt AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                          </div>
                                        </div>
										<button type="submit" class="btn btn-primary">Subir</button>
										<button type="button" onclick="location.href = 'cat-imagen.php';" class="btn">Cancelar</button>
                                      </fieldset>
									</form>
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
                                    var url = "?eliminaric=" + data_id;
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
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR IMAGEN SLIDER</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar la imagen de categoría con id "<strong>#<span id="elemento"></span></strong>"?
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
                                <div class="muted pull-left">Listado de Imágenes</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirsl" onclick="javascript: $('#add').css('display', 'block');"><button class="btn btn-success">Añadir Imagen Categoría <i class="icon-plus icon-white"></i></button></a>
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
									<?php if (count($listados) > 0 || count($listados2) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Imagen</th>
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
															<td><img style="width: 100%;" src="../imagenesproductos/<?=$listado['imagen']?>" alt="<?=$listado['id']?>"></td>                                         
                                                            <td style="text-align:center;"><?=$listado['nombre']?></td>
															<td style="text-align: center;">
                                                                <a class="open-Modal" href="#" data-name="<?=$listado['id']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
																<!--<a href="?eliminars=<?=$listado['id']?>" onclick="return confirm('Desea eliminar el slider \'\'#<?=$listado['id']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>-->
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay sliders!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>