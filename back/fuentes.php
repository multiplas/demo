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
								<div class="muted pull-left">Editar las fuentes de la Web</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
                                    
                                    
                                    
									<form action="fuentes.php?fuentesG=true" method="post" class="form-horizontal">
									  <fieldset>
                                        <div>
										<legend>Fuentes</legend>
                                                                                 <div class="control-group">
                                        <label class="control-label" for="desglose">Fuente Principal</label>
                                        <div class="controls">
                                        <select id="fprinc" name="fprinc"  class="span6">
                                            <option value="Arial,Helvetica,sans-serif" <?=$elemento['fuente2'] == "Arial,Helvetica,sans-serif" ? 'selected' : ''?>>Arial,Helvetica,sans-serif</option>
                                        <?php 
                                            
                                            $url = "https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyDPXHOz75CqwHUzgViYuku27pRLAizbP2U&sort=alpha";
                                            $data = file_get_contents($url);
                                            $data_array = json_decode($data,true);
                                            
                                            for($i=0; $i<count($data_array[items]); $i++){
                                                $selected = "";
                                                $valor = str_replace(" ", "+", $data_array[items][$i][family]);
                                                if($elemento['fuente1'] == $valor)
                                                    $selected = "selected";
                                                echo "<option value='".$valor."' $selected>" . $data_array[items][$i][family] . "</option>";
                                            }
                                            
                                            
                                        ?>
                                        </select><br><br>
                                        </div>
                                        </div>
                                                                                
                                        <label class="control-label" for="desglose">Fuente Secundaria</label>
                                        <div class="controls">
                                        <select id="fsecun" name="fsecun"  class="span6">
                                            <option value="Arial,Helvetica,sans-serif" <?=$elemento['fuente2'] == "Arial,Helvetica,sans-serif" ? 'selected' : ''?>>Arial,Helvetica,sans-serif</option>
                                        <?php 
                                            
                                            for($i=0; $i<count($data_array[items]); $i++){
                                                $selected = "";
                                                $valor = str_replace(" ", "+", $data_array[items][$i][family]);
                                                if($elemento['fuente2'] == $valor)
                                                    $selected = "selected";
                                                echo "<option value='".$valor."' $selected>" . $data_array[items][$i][family] . "</option>";
                                            }
                                            
                                            
                                        ?>
                                        </select><br><br>
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