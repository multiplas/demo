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
								<div class="muted pull-left">Personalizar Productos</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
                                    
                                    
                                    
                                                                    
									  <fieldset>
                                        <div>
										<legend>Galerías Productos</legend>
                                                                                
                                                                                <form action="productos_opc.php?accion=activarDes" method="post" class="form-horizontal">
                                                                                    <div>Mostrar Descuento: 
                                                                                      <select id="actDes" name="actDes" onchange="this.form.submit();">
                                                                                          <option value="1" <?=($config['actDes'] == 1 ? ' selected' : '')?>>Visible</option>
                                                                                          <option value="0" <?=($config['actDes'] == 0 ? ' selected' : '')?>>No visible</option>
                                                                                      </select><br>
                                                                                    </div>
                                                                                 </form>
                                                                                 <form action="productos_opc.php?accion=activarPreAnt" method="post" class="form-horizontal">
                                                                                    <div>Mostrar Precio anterior: 
                                                                                      <select id="actPreAnt" name="actPreAnt" onchange="this.form.submit();">
                                                                                          <option value="1" <?=($config['actPreAnt'] == 1 ? ' selected' : '')?>>Visible</option>
                                                                                          <option value="0" <?=($config['actPreAnt'] == 0 ? ' selected' : '')?>>No visible</option>
                                                                                      </select><br>
                                                                                    </div>
                                                                                 </form>
                                                                                 <form action="productos_opc.php?accion=activarPre" method="post" class="form-horizontal">
                                                                                    <div>Mostrar Precio: 
                                                                                      <select id="actPre" name="actPre" onchange="this.form.submit();">
                                                                                          <option value="1" <?=($config['actPre'] == 1 ? ' selected' : '')?>>Visible</option>
                                                                                          <option value="0" <?=($config['actPre'] == 0 ? ' selected' : '')?>>No visible</option>
                                                                                      </select><br>
                                                                                    </div>
                                                                                 </form>
                                                                                
                                     
                                        
                                        </div>
                                        
                                        
                                        
                                                                             
                                        
									  </fieldset>
									
								</div>
							</div>
						</div>
                        <script type="text/javascript">
	
                            
	
		               </script>
                        <!-- block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>