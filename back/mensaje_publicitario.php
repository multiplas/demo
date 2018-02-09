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
								<div class="muted pull-left">Editar mensaje publicitario</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
                                    
                                    
                                    
									<form action="mensaje_publicitario.php?menspub=true" method="post" class="form-horizontal">
									  <fieldset>
                                        <div>
										<legend>Mensaje Publicitario</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="actanu">Activo</label>
                                        <div class="controls">
                                        <select id="actanu" name="actanu"  class="span6">
                                            <option value="0" <?=$elemento['actanu'] == "0" ? 'selected' : ''?>>Desactivado</option>
                                            <option value="1" <?=$elemento['actanu'] == "1" ? 'selected' : ''?>>Activado</option>                                       
                                        </select><br><br>
                                        </div>
                                        </div>
                                        
                                        <div class="control-group">
                                        <label class="control-label" for="luganu">Mostrar en:</label>
                                        <div class="controls">
                                        <select id="luganu" name="luganu"  class="span6">
                                            <option value="0" <?=$elemento['luganu'] == "0" ? 'selected' : ''?>>Página Principal</option>  
                                            <option value="1" <?=$elemento['luganu'] == "1" ? 'selected' : ''?>>Cualquier sitio</option>  
                                        </select><br><br>
                                        </div>
                                        </div>                                        
                                                                                
                                        <label class="control-label" for="enlvid">Html a mostrar</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="enlvid" name="enlvid" placeholder="Html a mostrar" value="<?=$elemento['enlvid']?>" required>
                                        </div>
                                        <br>
                                        <label class="control-label" for="anchvid">Anchura en %</label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="anchvid" name="anchvid" placeholder="Anchura Pantalla" value="<?=$elemento['anchvid']?>" required>
                                        </div>
                                        <br>
                                        </div>
                                                                                
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        
                                        </div>
                                        
                                        
                                        
                                                                             
                                        
									  </fieldset>
									</form>
								</div>
							</div>
						</div>
                        <script type="text/javascript">
	
                            
	
		               </script>
                        <!-- block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>