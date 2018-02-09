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
						
                        <!-- block -->
                         
                         <script>
                            $(document).ready(function () {
                                var data_mail = '';
                                var data_telefono = '';
                                var data_direccion = '';
                                var data_poblacion = '';
                                
                                $('.open-Modal2').click(function () {
                                    
                                    var cadena = '';
                                    if (typeof $(this).data('mail') !== 'undefined') {
                                        data_mail = $(this).data('mail');
                                        data_telefono = $(this).data('telefono');
                                        data_direccion = $(this).data('direccion');
                                        data_poblacion = $(this).data('poblacion');
                                        cadena = 'Email: ' + data_mail + ' - Teléfono: ' + data_telefono + ' - Dirección: ' + data_direccion + ' - Población: ' + data_poblacion;                                        
                                    }
                                    $('#elemento').text(cadena);
                                })
                                
                                $('.open-Modal3').click(function () {
                                    
                                    var cadena = '';
                                    if (typeof $(this).data('texto') !== 'undefined') {
                                        data_mail = $(this).data('texto');
                                        cadena = data_mail;                                        
                                    }
                                    $('#elemento3').text(cadena);
                                })
                                
                                $('#btn-eliminar').click(function () {
                                    var url = "?eliminarg=" + data_id;
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
                                <h4 class="modal-title" id="myModalLabel">MÁS INFO</h4>
                              </div>
                              <div class="modal-body">
                                <strong><span id="elemento"></span></strong>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                        
                        <!-- Modal -->
                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">PRESUPUESTO</h4>
                              </div>
                              <div class="modal-body">
                                <strong><span id="elemento3"></span></strong>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                    
                        
                         
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Presupuestos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" style="margin-bottom: 120px;">
                                   <div class="table-toolbar">                                       
                                      
                                      
                                       <?php foreach($presuopc AS $presuopc2){ ?>
                                       <form action="presupuestos.php?accion=preSoli" method="post" class="form-horizontal">
                                          <div>
                                            <select id="preSoli" name="preSoli" onchange="this.form.submit();">
                                                <option value="1" <?=($presuopc2['preSoli'] == 1 ? ' selected' : '')?>>Presupuestos activados</option>
                                                <option value="0" <?=($presuopc2['preSoli'] == 0 ? ' selected' : '')?>>Presupuestos desactivados</option>
                                            </select><br>
                                          </div>
                                       </form>
                                       <form action="presupuestos.php?accion=preRegis" method="post" class="form-horizontal">
                                          <div>
                                            <select id="preRegis" name="preRegis" onchange="this.form.submit();">
                                                <option value="1" <?=($presuopc2['preRegis'] == 1 ? ' selected' : '')?>>Registro previo activado</option>
                                                <option value="0" <?=($presuopc2['preRegis'] == 0 ? ' selected' : '')?>>Registro previo desactivado</option>
                                            </select><br>
                                          </div>
                                       </form>
                                       
                                       <?php } ?>
                                     
                                   </div>
                                    <style>
                                        .chzn-container{
                                            margin-top: 20px !important;
                                        }
                                    </style>
									<?php if (count($listados) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th style="text-align: center;">Fecha</th>
													<th style="text-align: center;">Usuario</th>
                                                                                                        <th style="text-align: center;">Presupuesto</th>
                                                                                                        <th style="text-align: center;">Presupuesto Subido</th>
                                                                                                        <th></th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id']?></td>
															<td style="text-align: center;"><?=date("d-m-Y H:i:s", strtotime($listado['fecha']))?></td>
                                                                                                                        <?php if($listado['nombre'] != '-'){ ?>
                                                                                                                        <td style="text-align: center;"><a class="open-Modal2" href="#" data-mail="<?=$listado['email']?>" data-telefono="<?=$listado['telefono']?>" data-direccion="<?=$listado['direccion']?>" data-poblacion="<?=$listado['poblacion']?>" data-toggle="modal" data-target="#myModal"><?=$listado['nombre']?></a></td>
                                                                                                                        <?php }else{ ?>
                                                                                                                            <td style="text-align: center;"><?=$listado['nombre']?></td>
                                                                                                                        <?php } ?>
                                                                                                                        <td style="text-align: center;"><?=substr($listado['presupuesto'], 0, 30)?> <a class="open-Modal3" href="#" data-texto="<?=$listado['presupuesto']?>" data-toggle="modal" data-target="#myModal3">+</a></td>
                                                                                                                        <td style="text-align: center;">
                                                                                                                            <?php if($listado['presupuestoS'] != ''){ ?>
                                                                                                                                <a href="/presupuestos/<?=$listado['presupuestoS']?>" target="_blank">Ver Presupuesto</a> 
                                                                                                                                <br> <a href="presupuestos.php?EnviarPresuPDF=<?=$listado['id']?>"><i class="fa fa-envelope" style="color: green"> Enviar</i></a> 
                                                                                                                                <br><?php if($listado['enviado'] == 0){ ?><span style="color: red">No Enviado</span><?php }else{ ?><span style="color: blue">Enviado</span><?php } ?>
                                                                                                                            <?php }else{?>
                                                                                                                                <form action="presupuestos.php?subirprePDF=<?=$listado['id']?>" method="post" enctype="multipart/form-data">
                                                                                                                                    <div class="controls">
                                                                                                                                        <input class="input-file uniform_on" id="presupuestoPDF" name="presupuestoPDF" type="file">
                                                                                                                                        <button type="submit" class="btn btn-success">Subir</button>
                                                                                                                                    </div>
                                                                                                                                </form>
                                                                                                                            <?php } ?>
                                                                                                                        </td>
                                                                                                                        <td style="text-align: center;">
                                                                                                                            <form action="#" method="get" style="margin: 0px; margin-top: -25px; position: relative; width: 100px;">
                                                                                                                                <select id="estadop" name="estadop" class="chzn-select span4" required style="width: 150px;" onchange="javascript: $(this).parent().submit();">
                                                                                                                                    <option value="0"<?=$listado['estado'] == 0 ? ' selected' : ''?>>Pendiente de Revisión</option>
                                                                                                                                    <option value="1"<?=$listado['estado'] == 1 ? ' selected' : ''?>>Envío presupuesto formal</option>
                                                                                                                                    <option value="2"<?=$listado['estado'] == 2 ? ' selected' : ''?>>Denegado</option>
                                                                                                                                    <option value="3"<?=$listado['estado'] == 3 ? ' selected' : ''?>>Aceptado</option>
                                                                                                                                </select>
                                                                                                                                <input type="hidden" name="estadopres" value="<?=$listado['id']?>">
                                                                                                                            </form>    
                                                                                                                        </td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay presupuestos!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->           
                    </div>
                </div>


				<?php require_once('blocks/pie.php'); ?>