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
                                <form action="divisas.php?configurardivisas=true" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="span12">
									  <fieldset>
                                    
                                          <?php //print_r($elemento); ?>
                                          <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Euro</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="uero">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="euro" name="euro" class="">
                                                    <option value="1" <?=($elemento['EUR'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento['EUR'] != 1 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              
                                          </div>
                                        </div>
                                    
                                          
                                          <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dolar</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="dolar">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="dolar" name="dolar" class="">
                                                    <option value="1" <?=($elemento['USD'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento['USD'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              
                                          </div>
                                        </div>

                                          
                                          <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yen</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="yen">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="yen" name="yen" class="">
                                                    <option value="1" <?=($elemento['JPY'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento['JPY'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              
                                          </div>
                                        </div>
                                          
                                        
                                          <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Libra</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="libra">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="libra" name="libra" class="">
                                                    <option value="1" <?=($elemento['GBP'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento['GBP'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              
                                          </div>
                                        </div>
                                          
                                          
                                          <legend>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Franco Suizo</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="fsuizo">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="fsuizo" name="fsuizo" class="">
                                                    <option value="1" <?=($elemento['CHF'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento['CHF'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              
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