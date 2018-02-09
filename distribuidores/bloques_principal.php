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
						<div id="edi" class="block">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Editar los Bloques de la Página Principal de la Web</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
									<form action="bloques_principal.php?configurarblq=true" method="post" class="form-horizontal">
									  <fieldset>
										<legend>Editar Bloques</legend>
                                        
										<div class="control-group">
                                            <h5 style="margin: 0px 0px 0px 0px; padding: 0px 10%;">Bloque 1 de 8</h5>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="recogida">Categoría del bloque</label>
                                          <div class="controls">
											<select id="recogida" name="bloques[]" class="chzn-select span4">
												<option value="">Sin Categoría Asignada</option>
                                                <?php
                                                    foreach ($listados AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcate1'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Si no se asigna categoría el bloque no aparecerá.</span>
										  </div>
                                        </div>
                                        
										<div class="control-group">
                                            <h5 style="margin: 0px 0px 0px 0px; padding: 0px 10%;">Bloque 2 de 8</h5>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="recogida">Categoría del bloque</label>
                                          <div class="controls">
											<select id="recogida" name="bloques[]" class="chzn-select span4">
												<option value="">Sin Categoría Asignada</option>
                                                <?php
                                                    foreach ($listados AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcate2'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Si no se asigna categoría el bloque no aparecerá.</span>
										  </div>
                                        </div>
                                        
										<div class="control-group">
                                            <h5 style="margin: 0px 0px 0px 0px; padding: 0px 10%;">Bloque 3 de 8</h5>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="recogida">Categoría del bloque</label>
                                          <div class="controls">
											<select id="recogida" name="bloques[]" class="chzn-select span4">
												<option value="">Sin Categoría Asignada</option>
                                                <?php
                                                    foreach ($listados AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcate3'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Si no se asigna categoría el bloque no aparecerá.</span>
										  </div>
                                        </div>
                                        
										<div class="control-group">
                                            <h5 style="margin: 0px 0px 0px 0px; padding: 0px 10%;">Bloque 4 de 8</h5>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="recogida">Categoría del bloque</label>
                                          <div class="controls">
											<select id="recogida" name="bloques[]" class="chzn-select span4">
												<option value="">Sin Categoría Asignada</option>
                                                <?php
                                                    foreach ($listados AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcate4'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Si no se asigna categoría el bloque no aparecerá.</span>
										  </div>
                                        </div>
                                        
										<div class="control-group">
                                            <h5 style="margin: 0px 0px 0px 0px; padding: 0px 10%;">Bloque 5 de 8</h5>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="recogida">Categoría del bloque</label>
                                          <div class="controls">
											<select id="recogida" name="bloques[]" class="chzn-select span4">
												<option value="">Sin Categoría Asignada</option>
                                                <?php
                                                    foreach ($listados AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcate5'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Si no se asigna categoría el bloque no aparecerá.</span>
										  </div>
                                        </div>
                                        
										<div class="control-group">
                                            <h5 style="margin: 0px 0px 0px 0px; padding: 0px 10%;">Bloque 6 de 8</h5>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="recogida">Categoría del bloque</label>
                                          <div class="controls">
											<select id="recogida" name="bloques[]" class="chzn-select span4">
												<option value="">Sin Categoría Asignada</option>
                                                <?php
                                                    foreach ($listados AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcate6'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Si no se asigna categoría el bloque no aparecerá.</span>
										  </div>
                                        </div>
                                        
										<div class="control-group">
                                            <h5 style="margin: 0px 0px 0px 0px; padding: 0px 10%;">Bloque 7 de 8</h5>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="recogida">Categoría del bloque</label>
                                          <div class="controls">
											<select id="recogida" name="bloques[]" class="chzn-select span4">
												<option value="">Sin Categoría Asignada</option>
                                                <?php
                                                    foreach ($listados AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcate7'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Si no se asigna categoría el bloque no aparecerá.</span>
										  </div>
                                        </div>
                                        
										<div class="control-group">
                                            <h5 style="margin: 0px 0px 0px 0px; padding: 0px 10%;">Bloque 8 de 8</h5>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="recogida">Categoría del bloque</label>
                                          <div class="controls">
											<select id="recogida" name="bloques[]" class="chzn-select span4">
												<option value="">Sin Categoría Asignada</option>
                                                <?php
                                                    foreach ($listados AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcate8'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
											</select>
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #06F; font-size: 0.70rem;">Si no se asigna categoría el bloque no aparecerá.</span>
										  </div>
                                        </div><br><br><br><br><br>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
									  </fieldset>
									</form>
								</div>
							</div>
						</div>
                        <!-- block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>