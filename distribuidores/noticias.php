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
                        <div id="add" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear una Noticia</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="noticias.php?accion=subirnot" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nueva Noticia</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="ntitulo">Título </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="ntitulo" name="titulo" placeholder="Título de la página" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="nfileInput">Imagen</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="nfileInput" name="imagennoticia" type="file">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncontenido">Contenido</label>
                                          <div class="controls">
                                            <textarea id="ncontenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Publicar</button>
                                        <button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
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
									<div class="muted pull-left">Editar una Noticia</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="noticias.php?editarn=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
										  <fieldset>
											<legend>Editar <?=$elemento['nombre']?></legend>
											<div class="control-group">
											  <label class="control-label" for="titulo">Título </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo" name="titulo" placeholder="Título de la página" value="<?=$elemento['nombre']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
                                            <div class="control-group">
                                                <label class="control-label" for="fileInput">Imagen</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="fileInput" name="imagennoticia" type="file">
                                                    <?php
                                                    if ($elemento['imagen'] != null)
                                                    {
                                                       ?>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../imagenesproductos/<?=$elemento['imagen']?>" target="_blank">ver imagen actual</a>
                                                       <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
											<div class="control-group">
											  <label class="control-label" for="contenido">Contenido</label>
											  <div class="controls">
												<textarea id="contenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido']?></textarea>
											  </div>
											</div>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'noticias.php';" class="btn">Cancelar</button>
										  </fieldset>
										</form>
									</div>
								</div>
							</div>
                        </div>
						<?php } ?>
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Noticias</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Crear Noticia <i class="icon-plus icon-white"></i></button></a>
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
													<th>Título</th>
													<th>Publicado</th>
													<th>Fecha</th>
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
															<td><?=$listado['nombre']?></td>
															<td><?=$listado['visible'] == 1 ? 'publicada' : 'oculto'?></td>
															<td><?=date_format(date_create($listado['fecha']), 'd/m/Y H:i')?></td>
															<td style="text-align: center;">
																<a href="?estadon=<?=$listado['id']?>"><?=$listado['visible'] == 1 ? '<i style="color: #999;" class="fa fa-eye-slash fa-lg"></i>' : '<i style="color: green;" class="fa fa-eye fa-lg"></i>'?></a>
																<a href="?editarn=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
																<a href="?eliminarn=<?=$listado['id']?>" onclick="return confirm('Desea eliminar la noticia \'\'#<?=$listado['id']?> - <?=$listado['nombre']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay páginas!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>