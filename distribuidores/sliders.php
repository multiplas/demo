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
						<div id="add" class="block" style="display: none;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Subir un Slider</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="sliders.php?accion=subirsl" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nuevo Slider</legend>
										<div class="control-group">
										  <label class="control-label" for="texto">Texto Breve </label>
										  <div class="controls">
											<input type="text" class="span6" id="texto" name="texto" placeholder="Texto Breve">
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Imagen</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="imagenslider" type="file">
                                          </div>
                                        </div>
										<button type="submit" class="btn btn-primary">Subir</button>
										<button type="button" onclick="location.href = 'sliders.php';" class="btn">Cancelar</button>
                                      </fieldset>
									</form>
								</div>
							</div>
						</div>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Sliders</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirsl" onclick="javascript: $('#add').css('display', 'block');"><button class="btn btn-success">Añadir Slider <i class="icon-plus icon-white"></i></button></a>
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
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Imagen</th>
													<th>Orden</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id']?></td>
															<td><img style="width: 100%;" src="./uploads/<?=$listado['imagen']?>" alt="<?=$listado['id']?>"></td>
															<td><?=$listado['orden']?></td>
															<td style="text-align: center;">
																<a href="?eliminars=<?=$listado['id']?>" onclick="return confirm('Desea eliminar el slider \'\'#<?=$listado['id']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay sliders!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>