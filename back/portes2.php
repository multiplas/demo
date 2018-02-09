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
						<div id="add2" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear un Porte</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="portes2.php?accion=subirprt2" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nuevo Porte</legend>
                                        <input type="hidden" name="accion" value="anadirPorte" />
                                        <label>Hasta Km</label> <input type="text" name="km" id="km" value="" required placeholder="Km de distancia cubiertos por el importe asociado"  style="width:35%;" />
                                        <br /><br />
                                        <label>Precio </label> <input type="text" name="precio" id="precio" value="" required placeholder="Precio del porte"  style="width:35%;" />
                                        <br /><br />
                                        <label>Imagen</label> <input type="file" name="logo" id="logo" value="" placeholder="Logo"  style="width:35%;" />
                                        <br /><br />
					<button type="submit" class="btn btn-primary">Añadir</button>
					<button type="button" onclick="location.href = 'portes.php';" class="btn">Cancelar</button>
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
                                    var url = "?eliminarprt2=" + data_id;
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
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR PORTES</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar los portes "<strong><span id="elemento"></span></strong>"?
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
                                <div class="muted pull-left">Listado de Portes</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#add2" onclick="javascript: $('#add2').css('height', 'auto'); $('#add2').css('visibility', 'visible');"><button class="btn btn-success">Añadir Porte <i class="icon-plus icon-white"></i></button></a>
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
													<tr>
                                                                                                            <th></th>
                                                                                                            <th>Hasta km</th>
                                                                                                            <th>Precio</th>
                                                                                                            <th></th>
                                                                                                        </tr>
												</tr>
											</thead>
											<tbody>
												<?php 
													foreach ($listados2 AS $listado)
													{ 
														?>
														<tr>
															<td style="text-align: center;"><img src="../logoskm/<?=$listado["id"]?>.<?=$listado["extension"]?>" style="width:auto; height: 40px;" /></td>
															<td><?=strtoupper(utf8_encode($listado["hastakm"]))?></td>
                                                                                                                        <?php                                                                                                            
                                                                                                                        if($listado["precio"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["precio"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';
                                                                                                                     
                                                                                                                        echo "<td class='center'>";
                                                                                                                        
                                                                                                                        if($listado['id'] != 0){
                                                                                                                        ?>

                                                                                                                            <a class="open-Modal" href="#" data-name="<?=$listado['Name']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
                                                                                                                                <?php 
                                                                                                                        }
                                                                                                                            echo "</td>";
                                                                                                                        ?>
															 
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay portes!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>