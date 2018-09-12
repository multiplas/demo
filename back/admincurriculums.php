<?php require_once('blocks/cabecera.php'); ?>

<?php
if(isset($_POST['deletecurri'])){
    $resultado = $System->DeleteCurri($_POST['id']);
    $listados = $System->CargarCurris(10000);
}

?>
                <div class="span9" id="content">
                    
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Administrar Curriculums</h4>
                        <p>En esta sección puedes administrar los curriculums subidos por los usuarios a través de la plataforma.</p>
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
						
                        <!-- block -->
                    
                        <script>
                            $(document).ready(function () {
                                var data_id = '';
                                var data_name = '';
                                
                                $('.open-Modal').click(function () {
                                    if (typeof $(this).data('id') !== 'undefined') {
                                        data_id = $(this).data('id');
                                        data_name = $(this).data('name');
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
                                <div class="muted pull-left">Listado de Curriculums</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">                                   
									<?php if (count($listados) > 0) { ?>
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                                            <thead>
                                                <tr role="row">
                                                                                                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nombre</th>
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
                                                            <td valign="top" class="" ><a href="/ficheros/<?=$listado['nombreFichero']?>" target="_black"><?=$listado['nombre']?></a></td>
															<td valign="top" class=""  style="text-align: center;">
                                                                <form action="" method="post">
                                                                    <input type="hidden" name="deletecurri" value="delete"/>
                                                                    <input type="hidden" name="id" value="<?=$listado['id']?>"/>
                                                                    <button type="submit"><i style="color: red;" class="fa fa-trash-o fa-lg"></i></button>
                                                                </form>
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