<?php 
require_once('blocks/cabecera.php'); 
require_once('system/herramientas/execution-confirmar-tabla.php');

?>
                <div class="span9" id="content">
			
<div class="loader"></div>


 			<div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Herramientas</h4>
                        <p>Mantente al tanto de las actualizaciones que esten disponibles para tu CMS.</p>
                    	</div>





					<?php if ($resultaop) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php } 
					if(isset($_POST['comprobarsql'])){
					 if ($alert_actualizar) { ?>
						<div class="row-fluid">
							<div class="alert alert-error">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>¡Aviso!</h4>
								<br><b>Las siguientes tablas ya cuentan con modificaciones disponibles:</b><br><br>
								<?php
								foreach ($alert_actualizar as $alertTabla ) {
								if($alertTabla['actualizada']==TRUE) 
								echo "- ".$alertTabla['mensaje']."<br>";
								}
								?>
								<br><br>Por favor consulte con su soporte para realizar las actualizaciones correspondientes!
							</div>
						</div>
					<?php } 
						else{ ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Todo bien!</h4>
								No hay actualizaciones disponibles!
							</div>
						</div>
					<?php } 
					}?>
					
                    
                   
                    <!--
                     <div class="row-fluid">
			<div id="add" class="block" style="display: none;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Actualizaciones SQL</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    hola
				</div>
			    </div>
			</div>-->
                        <!-- block -->
                
                         
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Herramientas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
					
                                        <form action="?" method="POST">
					<input type="hidden" name="comprobarsql">
					<button onClick="submit(this)" id="btn-eliminar" class="btn btn-success">Comprobar Tablas SQL <i class="icon-list-alt icon-white"></i></button>
					</form>
                                      
					</div>
                                   </div>	
					<p>Pulsa para buscar actualizaciones.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>