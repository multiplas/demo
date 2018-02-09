				<?php require_once('blocks/cabecera.php'); ?>

            <?php if($resultadosfeed) { 
                $file = fopen("feed/galeria.xml", "w");
                fwrite($file, '<?xml version="1.0" encoding="utf-8"?>'. PHP_EOL);
                fwrite($file, '<rss version="2.0">'. PHP_EOL);
                fwrite($file, '<channel>'. PHP_EOL);
                fwrite($file, '<title>Galería</title>'. PHP_EOL);
                for($i = 0; $i <= count($resultadosfeed)-1; $i++){
                    fwrite($file, '<item>'. PHP_EOL);
                    fwrite($file, '<title>'.$resultadosfeed[$i]['nombre'].'</title>'. PHP_EOL);
                    fwrite($file, '<description><![CDATA[<img align="left" hspace="8" width="200px" src="http://atrezza.es/'.$basexml.'imagenes/galeria/'.$resultadosfeed[$i]['imagen'].'"/>]]>'.$resultadosfeed[$i]['nombre'].'</description>'. PHP_EOL);
                    fwrite($file, '<link>http://atrezza.es/'.$basexml.'es/galeria</link>'. PHP_EOL);
                    fwrite($file, '<pubDate>'.date("Y-m-d H:i:s").'</pubDate>'. PHP_EOL);
                    fwrite($file, '</item>'. PHP_EOL);
                }
                fwrite($file, '</channel>'. PHP_EOL);
                fwrite($file, '</rss>');
                fclose($file);
                $resultaop = 1;
            }
                
            ?>
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
                                <div class="muted pull-left">Subir una imagen Galería</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="galeria.php?accion=subirgl" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <div class="control-group">
                                          <label class="control-label" for="ncategoria1">Categoría</label>
                                          <div class="controls">
                                            <select id="ncategoria1" name="categoria1" class="chzn-a span4" required>
                                                <option value="">Selecciona</option>
                                                <?php
                                                    foreach ($listadosCat AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <legend>Nueva imagen Galería</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Imagen</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="imagengaleria" type="file">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="texto">Texto</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="textog" type="text">
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Imagen</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="imagengaleria2" type="file">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="texto">Texto</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="textog2" type="text">
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Imagen</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="imagengaleria3" type="file">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="texto">Texto</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="textog3" type="text">
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Imagen</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="imagengaleria4" type="file">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="texto">Texto</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="textog4" type="text">
                                          </div>
                                        </div>
                                        
                                        <div class="control-group">
                                          <label class="control-label" for="fileInput">Imagen</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="imagengaleria5" type="file">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="texto">Texto</label>
                                          <div class="controls">
                                            <input class="input-file uniform_on" id="fileInput" name="textog5" type="text">
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
                                    var url = "?eliminarg=" + data_id;
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
                                <h4 class="modal-title" id="myModalLabel">ELIMINAR IMAGEN GALERÍA</h4>
                              </div>
                              <div class="modal-body">
                                ¿Esta seguro de que desea eliminar la imagen de la galería con id "<strong><span id="elemento"></span></strong>"?
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
                                <div class="muted pull-left">Listado de Galería</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                       
                                      <div class="btn-group">
                                         <a href="#subirsl" onclick="javascript: $('#add').css('display', 'block');"><button class="btn btn-success">Añadir imagen Galería <i class="icon-plus icon-white"></i></button></a>
                                       </div>
                                       <br><br>
                                       
                                       <div class="btn-group">
                                         <a href="galeria.php?accion=feedG"><button class="btn btn-success">Feed Galería<i class="icon-plus icon-white"></i></button></a>
                                       </div><br><br>
                                       
                                       <form action="galeria.php?accion=actngal" method="post" class="form-horizontal">
                                          <div>
                                              Nombre: <input id="ngaleria" name="ngaleria" value="<?=$nombre['ngaleria']?>"> <input type="submit" value="Guardar" class="btn btn-success">
                                            <br>
                                          </div>
                                       </form>
                                      
                                      <?php foreach ($actgaleria AS $galeria) { ?>
                                       
                                       <form action="galeria.php?accion=actgal" method="post" class="form-horizontal">
                                          <div>
                                            <select id="galeria" name="galeria" onchange="this.form.submit();">
                                                <option value="1" <?=($galeria['galeria'] == 1 ? ' selected' : '')?>>Galería activada en menú</option>
                                                <option value="0" <?=($galeria['galeria'] == 0 ? ' selected' : '')?>>Galería desactivada en menú</option>
                                            </select><br>
                                          </div>
                                       </form>
                                       
                                       
                                       
                                       <?php } ?>
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
															<td><img style="width: 100%;" src="../imagenes/galeria/<?=$listado['imagen']?>" alt="<?=$listado['id']?>"></td>
															<td style="text-align: center;">
                                                                <a class="open-Modal" href="#" data-name="<?=$listado['id']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
																<!--<a href="?eliminarg=<?=$listado['id']?>" onclick="return confirm('Desea eliminar el slider \'\'#<?=$listado['id']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>-->
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