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
                                    <form action="portes.php?accion=subirprt" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nuevo Porte</legend>
                                        <input type="hidden" name="accion" value="anadirPorte" />
                                        <label>Nombre</label> <input type="text" name="nombre" id="nombre" value="" required placeholder="Nombre"  style="width:35%;" />
                                        <br /><br />
                                        <label>Gratis España desde € </label> <input type="text" name="gratisE" id="gratisE" value="" placeholder="Gratis España desde"  style="width:35%;" />
                                        <br /><br />
                                         <label>Precio España € </label> <input type="text" name="precioE" id="precioE" value="" placeholder="Precio España"  style="width:35%;" />
                                        <br /><br />
                                        <label>Gratis Islas Canarias desde € </label> <input type="text" name="gratisC" id="gratisC" value="" placeholder="Gratis Canarias desde"  style="width:35%;" />
                                        <br /><br />
                                        <label>Precio Islas Canarias € </label> <input type="text" name="precioC" id="precioC" value="" placeholder="Precio Canarias"  style="width:35%;" />
                                        <br /><br />
                                        <label>Gratis Islas Baleares desde € </label> <input type="text" name="gratisB" id="gratisB" value="" placeholder="Gratis Baleares desde"  style="width:35%;" />
                                        <br /><br />
                                         <label>Precio Islas Baleares € </label> <input type="text" name="precioB" id="precioB" value="" placeholder="Precio Baleares"  style="width:35%;" />
                                        <br /><br />
                                        <label>Gratis Ceuta-Melilla desde € </label> <input type="text" name="gratisCM" id="gratisCM" value="" placeholder="Gratis Ceuta-Melilla desde"  style="width:35%;" />
                                        <br /><br />
                                         <label>Precio Ceuta-Melilla € </label> <input type="text" name="precioCM" id="precioCM" value="" placeholder="Precio Ceuta-Melilla"  style="width:35%;" />
                                        <br /><br />
                                        <label>Gratis Europa desde € </label> <input type="text" name="gratisEU" id="gratisEU" value="" placeholder="Gratis Europa desde"  style="width:35%;" />
                                        <br /><br />
                                         <label>Precio Europa € </label> <input type="text" name="precioEU" id="precioEU" value="" placeholder="Precio Europa"  style="width:35%;" />
                                        <br /><br />
                                        <label>Gratis Internacional desde € </label> <input type="text" name="gratisI" id="gratisI" value="" placeholder="Gratis Internacional desde"  style="width:35%;" />
                                        <br /><br />
                                         <label>Precio Internacional € </label> <input type="text" name="precioI" id="precioI" value="" placeholder="Precio Internacional"  style="width:35%;" />
                                        <br /><br />
                                        <label>Logo</label> <input type="file" name="logo" id="logo" value="" placeholder="Logo"  style="width:35%;" />
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
                                    var url = "?eliminarprt=" + data_id;
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
                                                                                                            <th>Nombre</th>
                                                                                                            <th>Gratis Esp</th>
                                                                                                            <th>Precio Esp</th>
                                                                                                            <th>Gratis I. Canarias</th>
                                                                                                            <th>Precio I. Canarias</th>
                                                                                                            <th>Gratis I. Baleares</th>
                                                                                                            <th>Precio I. Baleares</th>
                                                                                                            <th>Gratis Ceuta-Melilla</th>
                                                                                                            <th>Precio Ceuta-Melilla</th>
                                                                                                            <th>Gratis Eur</th>
                                                                                                            <th>Precio Eur</th>
                                                                                                            <th>Gratis Int</th>
                                                                                                            <th>Precio Int</th>
                                                                                                        </tr>
												</tr>
											</thead>
											<tbody>
												<?php 
													foreach ($listados2 AS $listado)
													{ 
														?>
														<tr>
															<td style="text-align: center;"><img src="../logos/<?=$listado["id"]?>.<?=$listado["extension"]?>" style="width:20px; height: 10px;" /></td>
															<td><?=strtoupper(utf8_encode($listado["transportista"]))?></td>
                                                                                                                        <?php
                                                                                                                        if($listado["TPGratis"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["TPGratis"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';
                                                                                                                        
                                                                                                                        if($listado["precioP"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["precioP"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';


                                                                                                                        if($listado["TCGratis"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["TCGratis"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';


                                                                                                                        if($listado["precioC"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["precioC"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';
                                                                                                                        
                                                                                                                        
                                                                                                                        if($listado["TBGratis"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["TBGratis"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';


                                                                                                                        if($listado["precioB"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["precioB"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';
                                                                                                                        
                                                                                                                        
                                                                                                                        if($listado["TCMGratis"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["TCMGratis"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';


                                                                                                                        if($listado["precioCM"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["precioCM"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';


                                                                                                                        if($listado["TEGratis"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["TEGratis"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';


                                                                                                                        if($listado["precioE"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["precioE"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';


                                                                                                                        if($listado["TIGratis"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["TIGratis"])).' €</td>';
                                                                                                                        else
                                                                                                                            echo '<td class="center"> - </td>';


                                                                                                                        if($listado["precioI"] != NULL)
                                                                                                                            echo '<td class="center">'.strtoupper(utf8_encode($listado["precioI"])).' €</td>';
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
										<p>No hay productos relacionados!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>