				<?php require_once('blocks/cabecera.php'); ?>
<style>
    .chzn-container .chzn-results {
        max-height: 100px !important;
    }
</style>
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
                                    <form action="portes4.php?accion=subirprt4" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nuevo Porte</legend>
                                        <input type="hidden" name="accion" value="anadirPorte" />
                                        <label>Empresa Transporte</label> 
                                            <select id="etransp" name="etransp" class="chzn-select span4" required>
                                                <option value="">Selecciona</option>
                                                <?php
                                                    foreach ($listadoempresas AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        <br /><br />
                                        <label>Provincia</label> 
                                            <select id="prov" name="prov" class="chzn-select span4" required>
                                                <option value="">Selecciona</option>
                                                <?php
                                                    foreach ($listadosprovincias AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['ID']?>"><?=$listado['Name']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        <br /><br />
                                         <label>Precio € por kilo </label> <input type="text" name="precioE" id="precioE" value="" placeholder="Precio"  style="width:35%;" />
                                        <br /><br />
					<button type="submit" class="btn btn-primary">Añadir</button>
					<button type="button" onclick="location.href = 'portes4.php';" class="btn">Cancelar</button>
                                      </fieldset>
									</form>
								</div>
							</div>
						</div>
                    </div>
                        <!-- block -->
                        
                        <div class="row-fluid">
						<div id="add3" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear una Agencia de Transporte</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="portes4.php?accion=subiragen4" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nueva Agencia</legend>
                                        <input type="hidden" name="accion" value="anadirPorte" />
                                        <label>Nombre Agencia Transporte</label> <input type="text" name="nombre" id="nombre" value="" required placeholder="Nombre"  style="width:35%;" />
                                        <br /><br />
                                         <label>Precio por defecto</label> <input type="text" name="preciod" id="preciod" value="" required placeholder="Precio por defecto"  style="width:35%;" />
                                        <br /><br />
                                        <label>Logo</label> <input type="file" name="logo" id="logo" value="" placeholder="Logo"  style="width:35%;" />
                                        <br /><br />
                                         
					<button type="submit" class="btn btn-primary">Añadir</button>
					<button type="button" onclick="location.href = 'portes4.php';" class="btn">Cancelar</button>
                                      </fieldset>
									</form>
								</div>
							</div>
						</div>
                    </div>
                        <!-- block -->
                    
                        <?php if (@$elemento != null && $resultaop != 1 && $_GET['modificaridtp'] != null) { ?>
                    <div class="row-fluid">
						<div id="add4" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Modificar precio por defecto</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="portes4.php?accion=smodificarpdp" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                          <b><?=$elemento['nombre']?></b>
                                        <input type="hidden" name="accion" value="modificarPorte" />
                                        <input type="hidden" name="idt" id="idt" value="<?=$_GET['modificaridtp']?>">
                                        <br /><br />
                                        <label>Precio por defecto</label> <input type="text" name="preciod" id="preciod" value="<?=$elemento['precio']?>" required placeholder="Precio por defecto"  style="width:35%;" />
                                        <br /><br />                                        
					<button type="submit" class="btn btn-primary">Modificar</button>
					<button type="button" onclick="location.href = 'portes4.php';" class="btn">Cancelar</button>
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
                                
                                $('.open-Modal2').click(function () {
                                    
                                    //alert('error 00');
                                    if (typeof $(this).data('id') !== 'undefined') {
                                        data_id2 = $(this).data('id');
                                        data_name2 = $(this).data('name');
                                        //alert('valor: ' + $(this).data('id'));
                                    }
                                    //$('#id-elemento').text(data_id);
                                    $('#elemento2').text(data_name2);
                                })
                                
                                $('#btn-eliminar').click(function () {
                                    var url = "?eliminarprt4=" + data_id;
                                    location.href = url;
                                })
                                
                                $('#btn-eliminar2').click(function () {
                                    var url = "?eliminartrans4=" + data_id2;
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
                        <!-- Modal -->
                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR TRANSPORTISTA</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar el transportista "<strong><span id="elemento2"></span></strong>"?
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button id="btn-eliminar2" type="button" class="btn btn-danger">Eliminar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- -->
                        
                    
                     <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Portes por Provincia y Kilos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#add2" onclick="javascript: $('#add2').css('height', 'auto'); $('#add2').css('visibility', 'visible');"><button class="btn btn-success">Añadir Porte <i class="icon-plus icon-white"></i></button></a>
                                         <a href="#add2" onclick="javascript: $('#add3').css('height', 'auto'); $('#add3').css('visibility', 'visible');"><button class="btn btn-success" style="margin-left: 5px;">Añadir Agencia <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      
                                   </div>
									<?php if (count($listados2) > 0 || count($listados3) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<tr>
                                                                                                            <th></th>
                                                                                                            <?php 
													foreach ($listadoempresas AS $listado)
													{ ?> 
                                                                                                            <th><?=$listado['nombre'] . " <a class='open-Modal2' href='#' data-name='".$listado['nombre']."' data-id='".$listado['id']."' data-toggle='modal' data-target='#myModal2' /><i style='color: red;' class='fa fa-trash-o fa-lg'></i></a>"?></th>
                                                                                                        <?php } ?>
                                                                                                        </tr>
												</tr>
											</thead>
											<tbody>
                                                                                            <tr>
                                                                                                <td>Por defecto</td>
                                                                                                <?php foreach ($listadoempresas AS $listado11){ ?>
                                                                                                <td><?=$listados3[$listado11['id']]['precio']?>€ <a href="?modificaridtp=<?=$listado11['id']?>"><i class="fa fa-pencil fa-lg"></i></a></td>
                                                                                                <?php } ?>
                                                                                            </tr>
												<?php 
                                                                                                
													foreach ($listadosprovincias AS $listado)
													{ 
														?>
                                                                                                                    <tr>
															<td><?=$listado['Name']?></td>
                                                                                                                        <?php 
                                                                                                                            foreach ($listadoempresas AS $listado11){
                                                                                                                                if(isset($listados2[$listado['ID']][$listado11['id']])){
                                                                                                                                    echo "<td>".$listados2[$listado['ID']][$listado11['id']]['precio']."€ <a class='open-Modal' href='#' data-name='".$listados2[$listado['ID']][$listado11['id']]['nombre']."-".$listados2[$listado['ID']][$listado11['id']]['name']."' data-id='".$listados2[$listado['ID']][$listado11['id']]['idp']."' data-toggle='modal' data-target='#myModal' /><i style='color: red;' class='fa fa-trash-o fa-lg'></i></a></td>";
                                                                                                                                }else{
                                                                                                                                    echo "<td> - </td>";
                                                                                                                                }
                                                                                                                            }
                                                                                                                            
                                                                                                                        ?>
                                                                                                                    </tr>
														<?php
													}
                                                                                                        
												?>
                                                                                            
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay portes relacionados!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>