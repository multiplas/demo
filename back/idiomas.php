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
								<div class="muted pull-left">Editar los idiomas en la web</div>
							</div>
							<div class="block-content collapse in">
                                <form action="idiomas.php?configuraridiomas=true" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="span12">
									  <fieldset>
                                    
                                          
                                          <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Inglés</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="ingles">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="ingles" name="ingles" class="">
                                                    <option value="1" <?=($elemento[0]['activo'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento[0]['activo'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                    
                                          
                                          <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alemán</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="aleman">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="aleman" name="aleman" class="">
                                                    <option value="1" <?=($elemento[1]['activo'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento[1]['activo'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>

                                          
                                          <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Francés</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="frances">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="frances" name="frances" class="">
                                                    <option value="1" <?=($elemento[2]['activo'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento[2]['activo'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                    
                                          
                                          <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Italiano</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="italiano">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="italiano" name="italiano" class="">
                                                    <option value="1" <?=($elemento[3]['activo'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento[3]['activo'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                    
                                          
                                          <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Portugués</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="portugues">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="portugues" name="portugues" class="">
                                                    <option value="1" <?=($elemento[4]['activo'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento[4]['activo'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                          
                                        <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Catalán</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="catalan">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="catalan" name="catalan" class="">
                                                    <option value="1" <?=($elemento[5]['activo'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento[5]['activo'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                    
                                          
                                        <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ruso</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="ruso">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="ruso" name="ruso" class="">
                                                    <option value="1" <?=($elemento[6]['activo'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento[6]['activo'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                        <br><button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button><br><br>
                                    
                                      </fieldset>
								</div>
                                </form>
							</div>
						</div>
                        <!-- block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>