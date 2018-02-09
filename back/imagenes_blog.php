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
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Imagenes del blog</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="imagenes_blog.php?accion=subirimgblog&amp;imagenesblog=<?=$_GET['imagenesblog']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Imagen</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="imagenpr" type="file">
                                          </div>
                                        </div>
										<input type="hidden" name="idm" value="<?=$_GET['imagenesblog']?>">
										<button type="submit" class="btn btn-primary">Subir</button>
                                      </fieldset>
									</form>
									<?php if (count($listados) > 0) { ?>
										<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
											<thead>
												<tr>
													<th style="text-align: center;">#</th>
													<th>Imagen</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($listados AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id'] != null ? $listado['id'] : 'PR'?></td>
															<td><img style="width: 200px;" src="../imagenes/<?=@$listado['imagenprincipal']?><?=@$listado['imagen']?>" alt="<?=$listado['id']?>"></td>
															<td style="text-align: center;">
																<?=$listado['id'] != null ? '<a href="?eliminarimgblog='.$listado['id'].'&amp;imagenesblog='.$_GET['imagenesblog'].'" onclick="return confirm(\'Desea eliminar la imagen?\');">eliminar</a>' : ''?>
															</td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p>No hay imagenes!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>