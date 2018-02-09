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
                        <h4>SLIDER</h4>
                        <p>Se recomienda poner imágenes con una resolución de 1500x500 o equivalente</p><p><strong>IMPORTANTE:</strong> Si pone imágenes de diferentes resoluciones, el slider al cambiar de imagen, cambiará de tamaño, por ello se aconseja una resolución de imagen de 1500x500 o equivalente, para evitar estos problemas.</p>
                    </div>
                    
                     <div class="row-fluid">
						<div id="add" class="block" style="display: none;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Subir un Slider</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="sliders.php?accion=subirsl" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nuevo Slider</legend>
                                            <div class="control-group">
                                                <label class="control-label" for="texto">Texto Breve </label>
                                                    <div class="controls">
                                                            <input type="text" class="span6" id="texto" name="texto" placeholder="Texto Breve">
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                    </div>
                                            </div>
                                        <?php if($elemento[0]['activo'] == 1){ ?>
                                            <div class="control-group">
                                                <label class="control-label" for="texto">Texto Breve Inglés </label>
                                                    <div class="controls">
                                                            <input type="text" class="span6" id="texto_en" name="texto_en" placeholder="Texto Breve Inglés">
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                    </div>
                                            </div>
                                        <?php } ?>
                                        <?php if($elemento[2]['activo'] == 1){ ?>
                                            <div class="control-group">
                                                <label class="control-label" for="texto">Texto Breve Francés </label>
                                                    <div class="controls">
                                                            <input type="text" class="span6" id="texto_fr" name="texto_fr" placeholder="Texto Breve">
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                    </div>
                                            </div>
                                        <?php } ?>
                                        <?php if($elemento[1]['activo'] == 1){ ?>
                                            <div class="control-group">
                                                <label class="control-label" for="texto">Texto Breve Alemán </label>
                                                    <div class="controls">
                                                            <input type="text" class="span6" id="texto_al" name="texto_al" placeholder="Texto Breve">
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                    </div>
                                            </div>
                                        <?php } ?>
                                        <?php if($elemento[3]['activo'] == 1){ ?>
                                            <div class="control-group">
                                                <label class="control-label" for="texto">Texto Breve Italiano </label>
                                                    <div class="controls">
                                                            <input type="text" class="span6" id="texto_it" name="texto_it" placeholder="Texto Breve">
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                    </div>
                                            </div>
                                        <?php } ?>
                                        <?php if($elemento[4]['activo'] == 1){ ?>
                                            <div class="control-group">
                                                <label class="control-label" for="texto">Texto Breve Portugués </label>
                                                    <div class="controls">
                                                            <input type="text" class="span6" id="texto_po" name="texto_po" placeholder="Texto Breve">
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                    </div>
                                            </div>
                                        <?php } ?>
                                        <?php if($elemento[5]['activo'] == 1){ ?>
                                            <div class="control-group">
                                                <label class="control-label" for="texto">Texto Breve Catalán </label>
                                                    <div class="controls">
                                                            <input type="text" class="span6" id="texto_ca" name="texto_ca" placeholder="Texto Breve">
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                    </div>
                                            </div>
                                        <?php } ?>
                                        <?php if($elemento[6]['activo'] == 1){ ?>
                                            <div class="control-group">
                                                <label class="control-label" for="texto">Texto Breve Ruso </label>
                                                    <div class="controls">
                                                            <input type="text" class="span6" id="texto_ru" name="texto_ru" placeholder="Texto Breve">
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                    </div>
                                            </div>
                                        <?php } ?>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Imagen</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="imagenslider" type="file">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncategoria">Sección menú</label>
                                          <div class="controls">
                                            <select id="ncategoria" name="categoria" class="chzn-a span7" >
                                                <option value="0">Inicio</option>
                                                <?php
                                                    foreach ($listadosalt AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <br><span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría, se mostrara el slider con la imagen en dicha categoría</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="titulo">Título</label>
                                          <div class="controls">
                                            <input class="span6" id="titulo" name="titulo" type="text">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="urlslider">Url enlace</label>
                                          <div class="controls">
                                            <input class="span6" id="urlslider" name="urlslider" type="text">
                                          </div>
                                        </div>                                        
                                        <div class="control-group">
                                            <label class="control-label" for="destinoURL">Destino Url</label>
                                                <div class="controls">
                                                    <select id="destinoURL" name="destinoURL" class="">
                                                        <option value="0">Nueva ventana</option>
                                                        <option value="1">Misma ventana</option>
                                                    </select>
						</div>
					</div>
										<button type="submit" class="btn btn-primary">Subir</button>
										<button type="button" onclick="location.href = 'sliders.php';" class="btn">Cancelar</button>
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
                                    var url = "?eliminars=" + data_id;
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
                                ¿Esta seguro de que desea eliminar la imagen del slider con id "<strong>#<span id="elemento"></span></strong>"?
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
                                <div class="muted pull-left">Listado de Sliders</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirsl" onclick="javascript: $('#add').css('display', 'block');"><button class="btn btn-success">Añadir Slider <i class="icon-plus icon-white"></i></button></a>
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
													<th>Orden</th>
                                                                                                        <th>Categoría</th>
                                                                                                        <th>Título</th>
                                                                                                        <th>Url</th>
                                                                                                        <th>Destino</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
                                                    foreach ($listados2 AS $listado2)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado2['id']?></td>
															<td><img style="width: 100%;" src="./uploads/<?=$listado2['imagen']?>" alt="<?=$listado2['id']?>"></td>
															<td><?=$listado2['orden']?></td>                                           
                                                            <td style="text-align:center;">Inicio</td>
                                                            <td style="text-align:center;"><?=$listado2['titulo']?></td>
                                                            <td style="text-align:center;"><?=$listado2['url']?></td>
                                                            <td style="text-align:center;"><?=$listado2['destino'] == 0 ? 'Nueva Ventana' : 'Misma Ventana'?></td>								
                                                            <td style="text-align: center;">
                                                                <a class="open-Modal" href="#" data-name="<?=$listado2['id']?>" data-id="<?=$listado2['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
																<!--<a href="?eliminars=<?=$listado2['id']?>" onclick="return confirm('Desea eliminar el slider \'\'#<?=$listado2['id']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>-->
															</td>
														</tr>
														<?php
													}
													foreach ($listados AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id']?></td>
															<td><img style="width: 100%;" src="./uploads/<?=$listado['imagen']?>" alt="<?=$listado['id']?>"></td>
															<td><?=$listado['orden']?></td>                                           
                                                            <td style="text-align:center;"><?=$listado['nombre']?></td>
                                                            <td style="text-align:center;"><?=$listado['titulo']?></td>
                                                            <td style="text-align:center;"><?=$listado['url']?></td>
                                                            <td style="text-align:center;"><?=$listado['destino'] == 0 ? 'Nueva Ventana' : 'Misma Ventana'?></td>
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