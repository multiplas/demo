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
								<div class="muted pull-left">Personalizar Cesta</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
                                    
                                    
                                    
                                                                    <form action="cesta.php?cestaConfig=true" method="post" class="form-horizontal" enctype="multipart/form-data">
									  <fieldset>
                                        <div>
										<legend>Cesta</legend>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="etiqProCesta">Etiqueta tipo de producto </label>
										  <div class="controls">
                                                                                    <select id="etiqProCesta" name="etiqProCesta" class="">
                                                                                        <option value="0" <?=($elemento['etiqProCesta'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                                                        <option value="1" <?=($elemento['etiqProCesta'] == 1 ? ' selected' : '')?>>Activado</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="filaAtrCesta">Fila complementaria atributo </label>
										  <div class="controls">
                                                                                    <select id="filaAtrCesta" name="filaAtrCesta" class="">
                                                                                        <option value="0" <?=($elemento['filaAtrCesta'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                                                        <option value="1" <?=($elemento['filaAtrCesta'] == 1 ? ' selected' : '')?>>Activado</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="mmcesta">Mostrar botones + - </label>
										  <div class="controls">
                                                                                    <select id="mmcesta" name="mmcesta" class="">
                                                                                        <option value="0" <?=($elemento['mmcesta'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                                                        <option value="1" <?=($elemento['mmcesta'] == 1 ? ' selected' : '')?>>Activado</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="itransporte">Icono Transporte
                                                                                     <?php
                                                                                            if ($elemento['transporteIcon'] != null)
                                                                                            {
                                                                                               ?>
                                                                                                <br>
                                                                                                <a style="color: #09F; font-size: 0.70rem;" href="../iconos/<?=$elemento['transporteIcon']?>" target="_blank">
                                                                                                    <img style="max-width: 40px; max-height: 40px;" src="../iconos/<?=$elemento['transporteIcon']?>">
                                                                                                </a>
                                                                                                <br>
                                                                                                <a style="color: red; font-size: 0.70rem;" href="cesta.php?EIR=transporte">Eliminar</a>
                                                                                               <?php
                                                                                            }
                                                                                            ?>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <input class="input-file uniform_on" id="itransporte" name="itransporte" type="file">
                                                                                    <br><br>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="ipromocion">Icono Código Promocional
                                                                                     <?php
                                                                                            if ($elemento['promocionIcon'] != null)
                                                                                            {
                                                                                               ?>
                                                                                                <br>
                                                                                                <a style="color: #09F; font-size: 0.70rem;" href="../iconos/<?=$elemento['promocionIcon']?>" target="_blank">
                                                                                                    <img style="max-width: 40px; max-height: 40px;" src="../iconos/<?=$elemento['promocionIcon']?>">
                                                                                                </a>
                                                                                                <br>
                                                                                                <a style="color: red; font-size: 0.70rem;" href="cesta.php?EIR=promocion">Eliminar</a>
                                                                                               <?php
                                                                                            }
                                                                                            ?>
                                                                                    </label>
                                                                                    <div class="controls">
                                                                                        <input class="input-file uniform_on" id="ipromocion" name="ipromocion" type="file">
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