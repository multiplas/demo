				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Productos</div>
                            </div>
                            <script>
                            $(document).ready(function () {
                                var data_id = '';
                                var data_name = '';
                                var data_direccion = '';
                                var data_telefono = '';
                                var data_fecha = '';
                                
                                $('.open-Modal').click(function () {
                                    
                                    //alert('error 00');
                                    if (typeof $(this).data('id') !== 'undefined') {
                                        data_id = $(this).data('id');
                                        data_name = $(this).data('name');
                                        data_direccion = $(this).data('direccion');
                                        data_telefono = $(this).data('telefono');
                                        data_fecha = $(this).data('fecha');
                                        //alert('valor: ' + $(this).data('id'));
                                    }
                                    //$('#id-elemento').text(data_id);
                                    $('#usuario').text(data_name);
                                    $('#email').text(data_id);
                                    $('#telefono').text(data_telefono);
                                    $('#direccion').text(data_direccion);
                                    //$('#fecha').text(data_fecha);
                                })
                                
                                $('#btn-eliminar').click(function () {
                                    var url = "?eliminar=" + data_id;
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
                                    <h4 class="modal-title" id="myModalLabel">DATOS DEL USUARIO</h4>
                                  </div>
                                  <div class="modal-body">
                                      <strong>Usuario:</strong> <span id="usuario"></span><br>
                                      <strong>Correo Electrónico:</strong> <span id="email"></span><br>
                                      <strong>Teléfono:</strong> <span id="telefono"></span><br>
                                      <strong>Dirección:</strong> <span id="direccion"></span><br>
                                      <!--<strong>Fecha:</strong> <span id="fecha"></span>-->
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
                                    <!--<button id="btn-eliminar" type="button" class="btn btn-danger">Eliminar</button>-->
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- -->
                            
                            <div class="block-content collapse in">
                                <div class="span12">
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                                            <thead>
                                                <tr role="row">
													<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Usuario</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Producto</th>
                                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Fecha</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Atributos</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
												<?php
													foreach ($listados AS $listado)
													{
                                                        $date = date('d/m/Y', strtotime($listado['fechaC']));
                                                        if (@$lineapi != 'odd')
                                                            $lineapi = 'odd';
                                                        else
                                                            $lineapi = 'even';
														?>
														<tr class="<?=$lineapi?>">
														    <td valign="top" class=""  style="text-align: center;"><?=$listado['idC']?></td>
                                                            <td valign="top" class="" ><a class="open-Modal" href="#" data-name="<?=$listado['nombreU']?>" data-id="<?=$listado['emailU']?>" data-telefono="<?=$listado['telefonoU']?>" data-direccion="<?=$listado['direccionU']?>" data-fecha="<?=$date?>" data-toggle="modal" data-target="#myModal"><?=$listado['nombreU']?></a></td>
															<td valign="top" class="" ><?=$listado['nombreP']?></td>
                                                            <td valign="top" class="" ><?=$date?></td>
															<td valign="top" class=""  style="text-align: center;"><?=$listado['tallaC']?></td>
															<td valign="top" class=""  style="text-align: center;"><?=$listado['cantidadC']?></td>
														</tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                </div>
				<?php require_once('blocks/pie.php'); ?>