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
                                    var url = "?eliminarcuo=" + data_id; 
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
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR CUOTA</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar la cuota "<strong><span id="elemento"></span></strong>"?
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
						<div id="add2" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear una cuota</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="cuotas.php?accion=subircuo" method="post" class="form-horizontal">
                                      <fieldset>
                                        <legend>Nueva Cuota</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="nmeses">Número de meses </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="nmeses" name="nmeses" placeholder="Número de meses" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
					<button type="submit" class="btn btn-primary">Añadir</button>
					<button type="button" onclick="location.href = 'cuotas.php';" class="btn">Cancelar</button>
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
									<div class="muted pull-left">Editar una Cuota</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="cuotas.php?editarcuo=<?=$elemento2['id_c']?>" method="post" class="form-horizontal">
										  <fieldset>
											<legend>Editar <?=$elemento2['meses']?></legend>
											<div class="control-group">
											  <label class="control-label" for="nmeses">Número de meses </label>
											  <div class="controls">
												<input type="text" class="span6" id="nmeses" name="nmeses" placeholder="Número de meses" value="<?=$elemento2['meses']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento2['id_c']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'cuotas.php';" class="btn">Cancelar</button>
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
                                <div class="muted pull-left">Listado de Cuotas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#add2" onclick="javascript: $('#add2').css('height', 'auto'); $('#add2').css('visibility', 'visible');"><button class="btn btn-success">Añadir Cuota <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                   </div>
									<?php if (count($listados2) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Nº Meses</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados2 AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id_c']?></td>
															<td><?=$listado['meses']?></td>
															<td style="text-align: center;">
																<a href="?editarcuo=<?=$listado['id_c']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                                                <a class="open-Modal" href="#" data-valor="1" data-name="<?=$listado['atributo']?>" data-id="<?=$listado['id_c']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
																<!--<a href="?eliminarat=<?=$listado['id_c']?>" onclick="return confirm('Desea eliminar la categoría \'\'#<?=$listado['id_c']?> - <?=$listado['atributo']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>-->
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay cuotas!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>