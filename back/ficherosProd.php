				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
                    
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Ficheros Productos</h4>
                        <p>Esta sección se encarga de relacionar productos con ficheros.</p>
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
								<div class="muted pull-left">Subir un Fichero relacionado a Producto</div>
							</div>
							<div style="padding-bottom:150px;" class="block-content collapse in">
								<div class="span12">
									<form action="ficherosProd.php?accion=subirfichPro" method="post" class="form-horizontal" enctype="multipart/form-data">
									  <fieldset>
										<legend>Subir un Fichero relacionado a Producto</legend>
										
                                                                                    <div class="control-group">
                                                                                      <label class="control-label" for="producto">Producto</label>
                                                                                      <div class="controls">
                                                                                        <select id="producto" name="producto" class="chzn-select span4" required="">
                                                                                            <option value="">Producto</option>
                                                                                            <?php
                                                                                                foreach ($productos AS $listado)
                                                                                                {
                                                                                                    ?>
                                                                                                        <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                                                                    <?php
                                                                                                }
                                                                                            ?>
                                                                                        </select>
                                                                                        <span style="color: green; font-size: 0.70rem;">Requerido</span><br>
                                                                                        <span style="color: #09F; font-size: 0.70rem;">Producto que se va a relacionar con el fichero adjunto.</span>
                                                                                      </div>
                                                                                    </div>
                                                                                
                                                                                <div class="control-group" style="max-width: 60%;">
										  <label class="control-label" for="nombre">Nombre </label>
										  <div class="controls">
											<input type="text" class="span6" id="nombre" name="nombre" placeholder="Nombre fichero front" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
                                        
                                                                                    <div class="control-group">
                                                                                        <label class="control-label" for="nimagen">Fichero</label>
                                                                                        <div class="controls">
                                                                                            <input class="input-file uniform_on" id="nimagen" name="imagen" type="file" required="">
                                                                                        </div>
                                                                                    </div>
										<button type="submit" class="btn btn-primary">Subir</button>
										<button type="button" onclick="location.href = 'ficherosProd.php';" class="btn">Cancelar</button>
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
                                    var url = "?eliminarficher=" + data_id;
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
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR FICHERO RELACIONADO</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar el fichero relacionado "<strong><span id="elemento"></span></strong>"?
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
                                <div class="muted pull-left">Listado de Ficheros relacionados</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Subir Fichero Relacionado <i class="icon-plus icon-white"></i></button></a>
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
                                                <tr role="row">
                                                                                                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Producto</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Fichero</th>
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
															<td valign="top" class="" ><?=$listado['pnombre']?></td>
                                                                                                                        <td valign="top" class="" ><a href="/ficheros/<?=$listado['idproducto']?>/<?=$listado['fichero']?>" target="_black"><?=$listado['nombre']?></a></td>
															<td valign="top" class=""  style="text-align: center;">
                                                                <a class="open-Modal" href="#" data-name="<?=$listado['id']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
                                            </tbody>
                                        </table>
									<?php } else { ?>
										<p>No hay ficheros!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>