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
								<div class="muted pull-left">Editar texto html cabecera y pie</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
                                    
                                    
                                    
									<form action="cabpie.php?CabeceraPie=true" method="post" class="form-horizontal">
									  <fieldset>
                                        <div>
										<legend>Html Cabecera y Píe</legend>
                                                                                 <div class="control-group">
                                        <label class="control-label" for="cabecera">Cabecera</label>
                                        <div class="controls">
                                            <textarea id="cabecera" name="cabecera" class="input-xlarge" style="width: 810px; height: 200px"><?=$elemento['cabecera']?></textarea>
                                        <br><br>
                                        </div>
                                        </div>
                                                                                
                                        <label class="control-label" for="pie">Píe Superior (Solo disponible en algunas plantillas)</label>
                                        <div class="controls">
                                            <textarea id="pieS" name="pieS" class="input-xlarge"  style="width: 810px; height: 200px"><?=$elemento['pieS']?></textarea>
                                        <br><br>
                                        </div>
                                        </div>
                                                                              
                                        <label class="control-label" for="pie">Píe Inferior</label>
                                        <div class="controls">
                                            <textarea id="pie" name="pie" class="input-xlarge"  style="width: 810px; height: 200px"><?=$elemento['pie']?></textarea>
                                        <br><br>
                                        </div>
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