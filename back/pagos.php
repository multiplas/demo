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
								<div class="muted pull-left">Personalizar Listado de Pagos</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
                                    
                                    
                                    
                                                                    <form action="pagos.php?pagosConfig=true" method="post" class="form-horizontal" enctype="multipart/form-data">
									  <fieldset>
                                        <div>
										<legend>Listado de Pagos</legend>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="paypal"> PAYPAL</label>
										  <div class="controls">
                                                                                    <input type="text" class="span6" id="paypal" name="paypal" placeholder="PAYPAL" value="<?=$elemento['paypalNombre']?>">  
                                                                                    <span style="color: green; font-size: 0.70rem;">Opcional. Dejar vacio para nombre por defecto.</span><br>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="tpv"> TPV</label>
										  <div class="controls">
                                                                                    <input type="text" class="span6" id="tpv" name="tpv" placeholder="TPV" value="<?=$elemento['tpvNombre']?>">  
                                                                                    <span style="color: green; font-size: 0.70rem;">Opcional. Dejar vacio para nombre por defecto.</span><br>
										  </div>
										</div>                                                                                
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="transfe"> Transferencia Bancaria</label>
										  <div class="controls">
                                                                                    <input type="text" class="span6" id="transfe" name="transfe" placeholder="Transferencia Bancaria" value="<?=$elemento['transfeNombre']?>">  
                                                                                    <span style="color: green; font-size: 0.70rem;">Opcional. Dejar vacio para nombre por defecto.</span><br>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="contra"> Contrareembolso</label>
										  <div class="controls">
                                                                                    <input type="text" class="span6" id="contra" name="contra" placeholder="Contrareembolso" value="<?=$elemento['contraNombre']?>">  
                                                                                    <span style="color: green; font-size: 0.70rem;">Opcional. Dejar vacio para nombre por defecto.</span><br>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="domi"> Domiciliación</label>
										  <div class="controls">
                                                                                    <input type="text" class="span6" id="domi" name="domi" placeholder="Domiciliación" value="<?=$elemento['domiNombre']?>">  
                                                                                    <span style="color: green; font-size: 0.70rem;">Opcional. Dejar vacio para nombre por defecto.</span><br>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="tienda"> En tienda</label>
										  <div class="controls">
                                                                                    <input type="text" class="span6" id="tienda" name="tienda" placeholder="En tienda" value="<?=$elemento['tiendaNombre']?>">  
                                                                                    <span style="color: green; font-size: 0.70rem;">Opcional. Dejar vacio para nombre por defecto.</span><br>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="aplaza"> Aplazame</label>
										  <div class="controls">
                                                                                    <input type="text" class="span6" id="aplaza" name="aplaza" placeholder="Aplazame" value="<?=$elemento['aplazaNombre']?>">  
                                                                                    <span style="color: green; font-size: 0.70rem;">Opcional. Dejar vacio para nombre por defecto.</span><br>
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