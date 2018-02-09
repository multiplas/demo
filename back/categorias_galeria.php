				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>CATEGORIAS GALERÍA</h4>
                        <p>Esta sección se encarga de crear las categorías a las que pertenecerán las fotos de las galerías.</p>
                    </div>
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
						<div id="add" class="block" style="height: 0px; visibility: hidden;">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Subir una Categoría</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
									<form action="categorias_galeria.php?accion=subircategg" method="post" class="form-horizontal" enctype="multipart/form-data">
									  <fieldset>
										<legend>Subir Nueva Categoría</legend>
										<div class="control-group">
										  <label class="control-label" for="ncategoria">Categoría nombre </label>
										  <div class="controls">
											<input type="text" class="span6" id="ncategoria" name="categoria" placeholder="Nombre de la categoría" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
                                        <?php
                                            foreach ($idiomas AS $idioma)
                                            {
                                            ?>
                                                <div class="control-group">
                                                  <label class="control-label" for="ncategoria">Categoría nombre <?=$idioma['nombre']?></label>
                                                  <div class="controls">
                                                    <input type="text" class="span6" id="ncategoria" name="categoria<?=$idioma['id']?>" placeholder="Nombre de la categoría">
                                                    <span style="color: #006cff; font-size: 0.70rem;">Opcional</span>
                                                  </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
										<button type="submit" class="btn btn-primary">Subir</button>
										<button type="button" onclick="location.href = 'categorias_galeria.php';" class="btn">Cancelar</button>
									  </fieldset>
									</form>
								</div>
							</div>
						</div>
                    </div>
						<?php if (@$elemento != null && $resultaop != 1) { ?>
                     <div class="row-fluid">
							<div id="edi" class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Editar un Producto</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="categorias_galeria.php?editarcatega=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
										  <fieldset>
											<legend>Editar <?=$elemento['nombre']?></legend>
                                            <div class="control-group">
                                              <label class="control-label" for="categoria">Categoría nombre </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="categoria" name="categoria" placeholder="Nombre de la categoría" value="<?=$elemento['nombre']?>" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <?php
                                                foreach ($idiomas AS $idiom)
                                                {
                                                    $cont = 0;
                                                    foreach ($idiomasm AS $idioma)
                                                    {
                                                        
                                                        if($idiom['iniciales'] == $idioma['idioma']){
                                                            $cont = 1;
                                                        ?>
                                                            <div class="control-group">
                                                              <label class="control-label" for="nnombre">Categoría nombre en <?=$idiom['nombre']?></label>
                                                              <div class="controls">
                                                                <input type="text" class="span6" id="nnombre" name="categoria<?=$idiom['id']?>" placeholder="Nombre del menú" value="<?=$idioma['nombre']?>">
                                                                <span style="color: #006cff; font-size: 0.70rem;">Opcional</span>
                                                              </div>
                                                            </div>
                                                        <?php
                                                        }
                                                    }
                                                    if($cont == 0){
                                                    ?>
                                                        <div class="control-group">
                                                          <label class="control-label" for="nnombre">Categoría nombre en <?=$idiom['nombre']?></label>
                                                          <div class="controls">
                                                            <input type="text" class="span6" id="nnombre" name="categoria<?=$idiom['id']?>" placeholder="Nombre del menú" value="">
                                                            <span style="color: #006cff; font-size: 0.70rem;">Opcional</span>
                                                          </div>
                                                        </div>
                                                    <?php
                                                    }
                                                }
                                            ?>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'categorias_galeria.php';" class="btn">Cancelar</button>
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
                                
                                $('#btn-eliminar').click(function () {
                                    var url = "?eliminarcatega=" + data_id;
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
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR CATEGORÍA GALERÍA</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar la categoría de la galería "<strong><span id="elemento"></span></strong>"?
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
                                <div class="muted pull-left">Listado de Categorías</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Subir Categoría <i class="icon-plus icon-white"></i></button></a>
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
									<?php if (count($listadosalt) > 0) { ?>
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
													foreach ($listadosalt AS $listado)
													{
                                                        if (@$lineapi != 'odd')
                                                            $lineapi = 'odd';
                                                        else
                                                            $lineapi = 'even';
														?>
														<tr class="<?=$lineapi?>">
															<td valign="top" class=""  style="text-align: center;"><?=$listado['id']?></td>
															<td valign="top" class="" ><?=$listado['nombre']?></td>
															<td valign="top" class=""  style="text-align: center;">
																<a href="?editarcate=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                                                <a class="open-Modal" href="#" data-name="<?=$listado['nombre']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
																<!--<a href="?eliminarcatega=<?=$listado['id']?>" onclick="return confirm('Desea eliminar la categoría \'\'#<?=$listado['id']?> - <?=$listado['categoria']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>-->
															</td>
														</tr>
														<?php
													}
												?>
                                            </tbody>
                                        </table>
									<?php } else { ?>
										<p>No hay categoría!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>