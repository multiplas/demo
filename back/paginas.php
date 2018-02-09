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
                                <div class="muted pull-left">Crear una Página</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="paginas.php?accion=subirpag" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nueva Página</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nfileInput">Imagen</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="nfileInput" name="imagenpagina" type="file">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ntitulo">Título </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="ntitulo" name="titulo" placeholder="Título de la página" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncontenido">Contenido</label>
                                          <div class="controls">
                                            <textarea id="ncontenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
                                        
                                        <?php if($elementoI[0]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_en">Título Inglés </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_en" name="titulo_en" placeholder="Título de la página" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_en">Contenido Inglés</label>
											  <div class="controls">
												<textarea id="ncontenido_en" name="contenido_en" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[1]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_al">Título Alemán </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_al" name="titulo_al" placeholder="Título de la página" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_al">Contenido Alemán</label>
											  <div class="controls">
												<textarea id="ncontenido_al" name="contenido_al" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[2]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_fr">Título Francés </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_fr" name="titulo_fr" placeholder="Título de la página" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_fr">Contenido Francés</label>
											  <div class="controls">
												<textarea id="ncontenido_fr" name="contenido_fr" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[3]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_it">Título Italiano </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_it" name="titulo_it" placeholder="Título de la página" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_it">Contenido Italiano</label>
											  <div class="controls">
												<textarea id="ncontenido_it" name="contenido_it" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[4]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_po">Título Portugués </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_po" name="titulo_po" placeholder="Título de la página" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_po">Contenido Portugués</label>
											  <div class="controls">
												<textarea id="ncontenido_po" name="contenido_po" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[5]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_ca">Título Catalán </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_ca" name="titulo_ca" placeholder="Título de la página" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_ca">Contenido Catalán</label>
											  <div class="controls">
												<textarea id="ncontenido_ca" name="contenido_ca" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[6]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_ru">Título Ruso </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_ru" name="titulo_ru" placeholder="Título de la página" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_ru">Contenido Ruso</label>
											  <div class="controls">
												<textarea id="ncontenido_ru" name="contenido_ru" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                        
                                        <button type="submit" class="btn btn-primary">Publicar</button>
                                        <button type="button" onclick="location.href = 'paginas.php';" class="btn">Cancelar</button>
                                      </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
						<?php if (@$elemento != null && $resultaop != 1 && $_GET['editarp'] != null) { ?>
							<div id="edi" class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Editar una Página</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="paginas.php?editarp=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
										  <fieldset>
											<legend>Editar <?=$elemento['titulo']?></legend>
											<div class="control-group">
                                                                                            <label class="control-label" for="fileInput">Imagen</label>
                                                                                            <div class="controls">
                                                                                                <input class="input-file uniform_on" id="fileInput" name="imagenpagina" type="file">
                                                                                                <?php
                                                                                                if ($elemento['imagen'] != null)
                                                                                                {
                                                                                                   ?>
                                                                                                    <a style="color: #09F; font-size: 0.70rem;" href="../imagenes/<?=$elemento['imagen']?>" target="_blank">ver imagen actual</a>
                                                                                                    <a style="color:red;  font-size: 0.70rem;" href="?eliminarpI=<?=$elemento['id']?>" onclick="return confirm('Desea eliminar la página \'\'#<?=$elemento['id']?> - <?=$elemento['titulo']?>\'\' de la web?');">eliminar</a>
                                                                                                   <?php
                                                                                                }
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo">Título </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo" name="titulo" placeholder="Título de la página" value="<?=$elemento['titulo']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido">Contenido</label>
											  <div class="controls">
												<textarea id="contenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido']?></textarea>
											  </div>
											</div>
                                            <?php if($elementoI[0]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_en">Título Inglés </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_en" name="titulo_en" placeholder="Título de la página" value="<?=$elemento['titulo_en']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_en">Contenido Inglés</label>
											  <div class="controls">
												<textarea id="contenido_en" name="contenido_en" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_en']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[1]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_al">Título Alemán </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_al" name="titulo_al" placeholder="Título de la página" value="<?=$elemento['titulo_al']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_al">Contenido Alemán</label>
											  <div class="controls">
												<textarea id="contenido_al" name="contenido_al" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_al']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[2]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_fr">Título Francés </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_fr" name="titulo_fr" placeholder="Título de la página" value="<?=$elemento['titulo_fr']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_fr">Contenido Francés</label>
											  <div class="controls">
												<textarea id="contenido_fr" name="contenido_fr" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_fr']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[3]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_it">Título Italiano </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_it" name="titulo_it" placeholder="Título de la página" value="<?=$elemento['titulo_it']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_it">Contenido Italiano</label>
											  <div class="controls">
												<textarea id="contenido_it" name="contenido_it" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_it']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[4]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_po">Título Portugués </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_po" name="titulo_po" placeholder="Título de la página" value="<?=$elemento['titulo_po']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_po">Contenido Portugués</label>
											  <div class="controls">
												<textarea id="contenido_po" name="contenido_po" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_po']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[5]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_ca">Título Catalán </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_ca" name="titulo_ca" placeholder="Título de la página" value="<?=$elemento['titulo_ca']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_ca">Contenido Catalán</label>
											  <div class="controls">
												<textarea id="contenido_ca" name="contenido_ca" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_ca']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[6]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_ru">Título Ruso </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_ru" name="titulo_ru" placeholder="Título de la página" value="<?=$elemento['titulo_ru']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_ru">Contenido Ruso</label>
											  <div class="controls">
												<textarea id="contenido_ru" name="contenido_ru" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_ru']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                                                                        <div class="control-group" style="display: <?=$elemento['id'] == '20016' ? 'block':'none'?>">
											  <label class="control-label" for="titulo">Url </label>
											  <div class="controls">
												<input type="text" class="span6" id="url" name="url" placeholder="Url" value="<?=$elemento['url']?>">
												<span style="color: green; font-size: 0.70rem;">Opcional</span>
											  </div>
											</div>
                                                                                        <div class="control-group" style="display: <?=$elemento['id'] == '20016' ? 'block':'none'?>">
                                                                                            <label class="control-label" for="destinoURL">Destino Url</label>
                                                                                                <div class="controls">
                                                                                                    <select id="destinoURL" name="destinoURL" class="">
                                                                                                        <option value="0" <?=($elemento['url'] == 0 ? ' selected' : '')?>>Nueva ventana</option>
                                                                                                        <option value="1" <?=($elemento['url'] == 1 ? ' selected' : '')?>>Misma ventana</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                        </div>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'paginas.php';" class="btn">Cancelar</button>
										  </fieldset>
										</form>
									</div>
								</div>
							</div>
						<?php } ?>
                    
                    
                    <!-- Enlaces -->
                    
                    
                    <div class="row-fluid">
                        <div id="add2" class="block" style="height: 0px; visibility: hidden;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Crear un Enlace</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="paginas.php?accion=subirenl" method="post" class="form-horizontal" enctype="multipart/form-data">
                                      <fieldset>
                                        <legend>Nuevo Enlace</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nfileInput">Imagen</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="nfileInput" name="imagenpagina" type="file">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="nurl">URL </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="nurl" name="nurl" placeholder="URL del enlace" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="pagaso">Página asociada</label>
                                          <div class="controls">
                                            <select id="pagaso" name="pagaso" class="chzn-select span4" required>
                                                <option value="">Selecciona</option>
                                                <?php
                                                    foreach ($listadosalt AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['titulo']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ntitulo">Título </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="ntitulo" name="titulo" placeholder="Título del enlace" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncontenido">Descripción</label>
                                          <div class="controls">
                                            <textarea id="ncontenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
                                        
                                        <?php if($elementoI[0]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_en">Título Inglés </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_en" name="titulo_en" placeholder="Título del enlace" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_en">Descripción Inglés</label>
											  <div class="controls">
												<textarea id="ncontenido_en" name="contenido_en" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[1]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_al">Título Alemán </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_al" name="titulo_al" placeholder="Título del enlace" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_al">Descripción Alemán</label>
											  <div class="controls">
												<textarea id="ncontenido_al" name="contenido_al" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[2]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_fr">Título Francés </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_fr" name="titulo_fr" placeholder="Título del enlace" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_fr">Descripción Francés</label>
											  <div class="controls">
												<textarea id="ncontenido_fr" name="contenido_fr" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[3]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_it">Título Italiano </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_it" name="titulo_it" placeholder="Título del enlace" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_it">Descripción Italiano</label>
											  <div class="controls">
												<textarea id="ncontenido_it" name="contenido_it" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[4]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_po">Título Portugués </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_po" name="titulo_po" placeholder="Título del enlace" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_po">Descripción Portugués</label>
											  <div class="controls">
												<textarea id="ncontenido_po" name="contenido_po" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[5]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_ca">Título Catalán </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_ca" name="titulo_ca" placeholder="Título del enlace" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_ca">Descripción Catalán</label>
											  <div class="controls">
												<textarea id="ncontenido_ca" name="contenido_ca" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[6]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_ru">Título Ruso </label>
											  <div class="controls">
												<input type="text" class="span6" id="ntitulo_ru" name="titulo_ru" placeholder="Título del enlace" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_ru">Descripción Ruso</label>
											  <div class="controls">
												<textarea id="ncontenido_ru" name="contenido_ru" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                        
                                        <button type="submit" class="btn btn-primary">Publicar</button>
                                        <button type="button" onclick="location.href = 'paginas.php';" class="btn">Cancelar</button>
                                      </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
						<?php if (@$elemento != null && $resultaop != 1 && $_GET['editaen'] != null) { ?>
							<div id="edi" class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Editar un Enlace</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="paginas.php?editaen=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
										  <fieldset>
											<legend>Editar <?=$elemento['titulo']?></legend>
											<div class="control-group">
                                                                                            <label class="control-label" for="fileInput">Imagen</label>
                                                                                            <div class="controls">
                                                                                                <input class="input-file uniform_on" id="fileInput" name="imagenpagina" type="file">
                                                                                                <?php
                                                                                                if ($elemento['imagen'] != null)
                                                                                                {
                                                                                                   ?>
                                                                                                    <a style="color: #09F; font-size: 0.70rem;" href="../imagenes/<?=$elemento['imagen']?>" target="_blank">ver imagen actual</a>
                                                                                                    <a style="color:red;  font-size: 0.70rem;" href="?eliminarpI=<?=$elemento['id']?>" onclick="return confirm('Desea eliminar la página \'\'#<?=$elemento['id']?> - <?=$elemento['titulo']?>\'\' de la web?');">eliminar</a>
                                                                                                   <?php
                                                                                                }
                                                                                                ?>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="control-group">
											  <label class="control-label" for="url">URL </label>
											  <div class="controls">
												<input type="text" class="span6" id="url" name="url" placeholder="URL del enlace" value="<?=$elemento['url']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
                                                                                        <div class="control-group">
                                                                                            <label class="control-label" for="pagaso">Categoría 1</label>
                                                                                            <div class="controls">
                                                                                              <select id="pagaso" name="pagaso" class="chzn-select span4" required>
                                                                                                  <option value="">Selecciona</option>
                                                                                                  <?php
                                                                                                      foreach ($listadosalt AS $listado)
                                                                                                      {
                                                                                                          ?>
                                                                                                              <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['categoria_pag'] ? ' selected' : ''?>><?=$listado['titulo']?></option>
                                                                                                          <?php
                                                                                                      }
                                                                                                  ?>
                                                                                              </select>
                                                                                              <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                                                                              <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                                                                            </div>
                                                                                          </div>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo">Título </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo" name="titulo" placeholder="Título de la página" value="<?=$elemento['titulo']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido">Contenido</label>
											  <div class="controls">
												<textarea id="contenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido']?></textarea>
											  </div>
											</div>
                                            <?php if($elementoI[0]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_en">Título Inglés </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_en" name="titulo_en" placeholder="Título de la página" value="<?=$elemento['titulo_en']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_en">Contenido Inglés</label>
											  <div class="controls">
												<textarea id="contenido_en" name="contenido_en" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_en']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[1]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_al">Título Alemán </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_al" name="titulo_al" placeholder="Título de la página" value="<?=$elemento['titulo_al']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_al">Contenido Alemán</label>
											  <div class="controls">
												<textarea id="contenido_al" name="contenido_al" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_al']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[2]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_fr">Título Francés </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_fr" name="titulo_fr" placeholder="Título de la página" value="<?=$elemento['titulo_fr']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_fr">Contenido Francés</label>
											  <div class="controls">
												<textarea id="contenido_fr" name="contenido_fr" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_fr']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[3]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_it">Título Italiano </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_it" name="titulo_it" placeholder="Título de la página" value="<?=$elemento['titulo_it']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_it">Contenido Italiano</label>
											  <div class="controls">
												<textarea id="contenido_it" name="contenido_it" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_it']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[4]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_po">Título Portugués </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_po" name="titulo_po" placeholder="Título de la página" value="<?=$elemento['titulo_po']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_po">Contenido Portugués</label>
											  <div class="controls">
												<textarea id="contenido_po" name="contenido_po" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_po']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[5]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_ca">Título Catalán </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_ca" name="titulo_ca" placeholder="Título de la página" value="<?=$elemento['titulo_ca']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_ca">Contenido Catalán</label>
											  <div class="controls">
												<textarea id="contenido_ca" name="contenido_ca" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_ca']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
                                            <?php if($elementoI[6]['activo'] == 1){ ?>
                                                                                        <div class="control-group">
											  <label class="control-label" for="titulo_ru">Título Ruso </label>
											  <div class="controls">
												<input type="text" class="span6" id="titulo_ru" name="titulo_ru" placeholder="Título de la página" value="<?=$elemento['titulo_ru']?>" required>
												<span style="color: red; font-size: 0.70rem;">Requerido</span>
											  </div>
											</div>
											<div class="control-group">
											  <label class="control-label" for="contenido_ru">Contenido Ruso</label>
											  <div class="controls">
												<textarea id="contenido_ru" name="contenido_ru" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['contenido_ru']?></textarea>
											  </div>
											</div>
                                            <?php } ?>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'paginas.php';" class="btn">Cancelar</button>
										  </fieldset>
										</form>
									</div>
								</div>
							</div>
						<?php } ?>
                    
                    
                    
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Páginas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                       <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Crear Página <i class="icon-plus icon-white"></i></button></a>
                                         <a href="#subiren" onclick="javascript: $('#add2').css('height', 'auto'); $('#add2').css('visibility', 'visible');" style="margin-left: 10px"><button class="btn btn-success">Crear Enlace <i class="icon-plus icon-white"></i></button></a>
                                      </div><br><br>
                                      <!--<div class="btn-group">
                                         <a href="#"><button class="btn btn-success">Añadir Página <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <div class="btn-group pull-right">
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
													<th>Visibilidad</th>
													<th>Fecha Actualización</th>
													<th style="text-align: center;">Opciones</th>
												</tr>
											</thead>
											<tbody>
                                                                                        <td style="text-align: center"> - </td>
                                                                                        <td>Gastos de Envío</td>
                                                                                        <td><?=$GE == 1 ? 'visible' : 'oculto'?></td>
                                                                                        <td></td>
                                                                                        <td><?=$GE == 1 ? '<a href="?desactivarGE=1"><i class="fa fa-eye fa-lg" style="color:red"></i></a>' : '<a href="?activarGE=1"><i class="fa fa-eye-slash fa-lg" style="color:gray"></i></a>'?></td>
												<?php
													foreach ($listados AS $listado)
													{
														?>
														<tr>
															<td style="text-align: center;"><?=$listado['id']?></td>
															<td><?=$listado['titulo']?></td>
															<td><?=$listado['visible'] == 1 ? 'visible' : 'oculto'?></td>
															<td><?=date_format(date_create($listado['fecha']), 'd/m/Y H:i')?></td>
															<td style="text-align: left;">
																<!--<a href="?estadop=<?=$listado['id']?>"><?=$listado['visible'] == 1 ? 'ocultar' : 'activar'?></a>
																&#124;-->
                                                                                                                                <?php if($listado['noticia'] == 0){ ?><a href="?editarp=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a><?php if($listado['id'] == 20001 || $listado['id'] == 20002){ if($listado['visible'] == 1){ ?> <a href="?desactivarPag=<?=$listado['id']?>"><i class="fa fa-eye fa-lg" style="color:red"></i></a><?php }else{ ?> <a href="?activarPag=<?=$listado['id']?>"><i class="fa fa-eye-slash fa-lg" style="color:gray"></i></a><?php } } }else{ ?><a href="?editaen=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a><?php } ?>
                                                                <?php if($listado['id'] == 20000 ||$listado['id'] == 20001 || $listado['id'] == 20002 || $listado['id'] == 20012 || $listado['id'] == 20013 || $listado['id'] == 20016){}else{ ?>
																     | <a href="?eliminarp=<?=$listado['id']?>" onclick="return confirm('Desea eliminar la página \'\'#<?=$listado['id']?> - <?=$listado['titulo']?>\'\' de la web?');">eliminar</a>
                                                                <?php } ?>
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