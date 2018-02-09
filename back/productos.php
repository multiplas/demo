				<?php require_once('blocks/cabecera.php'); ?>
<?php require_once('system/productos/execution-arbol-categorias.php'); ?>
<style>
    .chzn-container{
        min-width: 150px !important;
    }
    
    .dataTables_filter{
        float: right !important;
        margin-right: 20px !important;
    }
</style>
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
                     <script>
                         function cambiar(nam){
                             var cadena = document.getElementById(nam).value;
                             document.getElementById(nam).value = cadena.replace(",",".");
                         }
                     </script>


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
                                    var url = "?eliminarpr=" + data_id;
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
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR PRODUCTO</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar el producto "<strong><span id="elemento"></span></strong>"?
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
                                <div class="muted pull-left">Listado de Productos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12" style="margin-bottom: 50px;">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="productos-new.php"><button class="btn btn-success">Subir Producto <i class="icon-plus icon-white"></i></button></a>
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
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="productosT">
                                            <thead>
                                                <tr role="row">
													<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
                                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ref.</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Producto</th>
                                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Marca</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Categoría Prin.</th>
                                                                                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Precio</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">IVA</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Des.</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">PVP</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Estado</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Destacado</th>
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
                                                            <td valign="top" class="" ><?=$listado['referencia']?></td>
															<td valign="top" class="" ><?=$listado['nombre']?></td>
                                                            <td valign="top" class="" ><?=$listado['categoria']?></td>
															<td valign="top" class="" ><?=$listadosCateg2[$listado['idcat']] != '' ? $listadosCateg2[$listado['idcat']]:'Sin Relación'?></td>
															<td valign="top" class=""  style="text-align: right;"><?=number_format($listado['precio'], 2, ',', '.')?> €</td>
															<td valign="top" class=""  style="color: #D00; text-align: right;"><?=$listado['iva']?> %</td>
															<td valign="top" class=""  style="color: green; text-align: right;"><?=$listado['descuento'] > 0 ? $listado['descuento'].' %' : ($listado['descuentoe'] > 0 ? number_format($listado['descuentoe'], 2, ',', '.').' €' : 'N/A')?></td>
															<td valign="top" class=""  style="color: #06F; text-align: right;"><?=number_format(($listado['precio'] - ($listado['descuento'] > 0 ? ($listado['precio'] * ($listado['descuento'] / 100)) : ($listado['descuentoe'] > 0 ? $listado['descuentoe'] : 0))) * ($listado['iva'] / 100 + 1), 2, ',', '.')?> €</td>
                                                            <td valign="top" class="" ><?=$listado['disponible'] ? 'activo' :  'oculto'?></td>
                                                            <td valign="top" class="" ><?=$listado['destacado'] ? 'si' :  'no'?></td>
															<td valign="top" class=""  style="text-align: center;">
                                                                                                                                <script>
                                                                                                                                   function cambiarEstado(producto){
                                                                                                                                        var cadena = "productos.php?estadopr="+producto;
                                                                                                                                        $.post(cadena, function(){
                                                                                                                                            var camT = "#cambioestado_"+producto;
                                                                                                                                            if($(camT).attr('class') == 'fa fa-eye fa-lg'){
                                                                                                                                                $(camT).attr('class', 'fa fa-eye-slash fa-lg');
                                                                                                                                                $(camT).attr('style', 'color: #999;cursor: pointer;');
                                                                                                                                            }else{
                                                                                                                                                $(camT).attr('class', 'fa fa-eye fa-lg');
                                                                                                                                                $(camT).attr('style', 'color: green;cursor: pointer;');
                                                                                                                                            }
                                                                                                                                        });
                                                                                                                                    }
                                                                                                                                </script>
																<?=$listado['disponible'] ? '<i onclick="cambiarEstado('.$listado['id'].');" id="cambioestado_'.$listado['id'].'" style="color: green;cursor: pointer;" class="fa fa-eye fa-lg"></i>' :  '<i id="cambioestado_'.$listado['id'].'" onclick="cambiarEstado('.$listado['id'].');" style="color: #999;cursor: pointer;" class="fa fa-eye-slash fa-lg"></i>'?>
																<a href="?destacadopr=<?=$listado['id']?>"><?=$listado['destacado'] ? '<i style="color: green;" class="fa fa-check fa-lg"></i>' :  '<i style="color: #C00;" class="fa fa-times fa-lg"></i>'?></a>
																<a href="imagenes_productos.php?imagenespr=<?=$listado['id']?>"><i style="color: orange;" class="fa fa-picture-o fa-lg"></i></a>
																<a href="productos-edit.php?editarpr=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                                                <a class="open-Modal" href="#" data-name="<?=$listado['nombre']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
																<!--<a href="?eliminarpr=<?=$listado['id']?>" onclick="return confirm('Desea eliminar el producto \'\'#<?=$listado['id']?> - <?=$listado['nombre']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>-->
															</td>
														</tr>
														<?php
													}
												?>
                                            </tbody>
                                        </table>
									<?php } else { ?>
										<p>No hay productos!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
                    <?php $inicioTabla = 0; if(isset($_POST['inicioTab'])){ $inicioTabla = $_POST['inicioTab']; } ?>
                    <script>
                        $(document).ready(function() {
                            $('#productosT').DataTable( {
                                "dom": '<"top"lpf<"clear">>rt<"bottom"ip<"clear">>',
                                "displayStart": <?=$inicioTabla?>,
                                "bStateSave": true
                            } ); 
                        } );
                    </script>
				<?php require_once('blocks/pie.php'); ?>