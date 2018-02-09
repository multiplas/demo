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
                    
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Mega Menú</h4>
                        <p>Para utilizar este tipo de menú, seleccionarlo en Personalizar->Línea de Estilo->Cabecera.</p>
                    </div>
                    
                     <div class="row-fluid">
						<div id="edi" class="block">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Personalizar Mega Menú</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
                                    
                                    
                                    
                                                                    <form action="megaMenu.php?megamenuConfig=true" method="post" class="form-horizontal" enctype="multipart/form-data">
									  <fieldset>
                                        <div>
										<legend>Mega Menú</legend>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="MM_anchoMax">Ancho completo menú </label>
										  <div class="controls">
                                                                                    <select id="MM_anchoMax" name="MM_anchoMax" class="">
                                                                                        <option value="0" <?=($elemento['MM_anchoMax'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                                                        <option value="1" <?=($elemento['MM_anchoMax'] == 1 ? ' selected' : '')?>>Activado</option>
                                                                                    </select>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="MM_fondo">Fondo activado </label>
										  <div class="controls">
                                                                                    <select id="MM_fondo" name="MM_fondo" class="">
                                                                                        <option value="0" <?=($elemento['MM_fondo'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                                                        <option value="1" <?=($elemento['MM_fondo'] == 1 ? ' selected' : '')?>>Activado</option>
                                                                                    </select>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="MM_divisiones">Divisiones en el menú </label>
										  <div class="controls">
                                                                                    <select id="MM_divisiones" name="MM_divisiones" class="">
                                                                                        <option value="0" <?=($elemento['MM_divisiones'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                                                        <option value="1" <?=($elemento['MM_divisiones'] == 1 ? ' selected' : '')?>>Activado</option>
                                                                                    </select>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="MM_colores">Combinación de colores </label>
										  <div class="controls">
                                                                                      <style>
                                                                                          .ruby-menu-demo-color-1 {
                                                                                                background: #1aad86;
                                                                                          }
                                                                                          .ruby-menu-demo-color-2 {
                                                                                            background: #0c67c2;
                                                                                          }

                                                                                          .ruby-menu-demo-color-3 {
                                                                                            background: #ce0661;
                                                                                          }

                                                                                          .ruby-menu-demo-color-4 {
                                                                                            background: #ea7500;
                                                                                          }

                                                                                          .ruby-menu-demo-color-5 {
                                                                                            background: #74ba27;
                                                                                          }

                                                                                          .ruby-menu-demo-color-6 {
                                                                                            background: #ff3264;
                                                                                          }

                                                                                          .ruby-menu-demo-color-7 {
                                                                                            background: #fad814;
                                                                                          }

                                                                                          .ruby-menu-demo-color-8 {
                                                                                            background: #ccc;
                                                                                          }

                                                                                          .ruby-menu-demo-color-9 {
                                                                                            background: #111;
                                                                                            border-color: #ccc;
                                                                                          }

                                                                                          .ruby-menu-demo-color-10 {
                                                                                            background: #036de2;
                                                                                            border-color: #489efd;
                                                                                          }

                                                                                          .ruby-menu-demo-color-11 {
                                                                                            background: #f85252;
                                                                                            border-color: #444;
                                                                                          }

                                                                                          .ruby-menu-demo-color-12 {
                                                                                            background: #ca79d0;
                                                                                            border-color: #f2def3;
                                                                                          }

                                                                                          .ruby-menu-demo-color-13 {
                                                                                            background: #efefef;
                                                                                            border-color: #222;
                                                                                          }

                                                                                          .ruby-menu-demo-color-14 {
                                                                                            background: #ccc;
                                                                                          }
                                                                                                                                                                                      .ruby-menu-demo-circle {
                                                                                                border-radius: 50%;
                                                                                                width: 12px;
                                                                                                height: 12px;
                                                                                                border: 3px solid #222;
                                                                                                display: inline-block;
                                                                                                margin: 0;
                                                                                            }
                                                                                      </style>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='1' <?=$elemento['MM_colores'] == 1 ? 'checked': ''?>> Black/Green <div class="ruby-menu-demo-circle ruby-menu-demo-color-1"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='2' <?=$elemento['MM_colores'] == 2 ? 'checked': ''?>> Black/Blue <div class="ruby-menu-demo-circle ruby-menu-demo-color-2"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='3' <?=$elemento['MM_colores'] == 3 ? 'checked': ''?>> Black/Violet <div class="ruby-menu-demo-circle ruby-menu-demo-color-3"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='4' <?=$elemento['MM_colores'] == 4 ? 'checked': ''?>> Black/Orange <div class="ruby-menu-demo-circle ruby-menu-demo-color-4"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='5' <?=$elemento['MM_colores'] == 5 ? 'checked': ''?>> Black/Pistachio <div class="ruby-menu-demo-circle ruby-menu-demo-color-5"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='6' <?=$elemento['MM_colores'] == 6 ? 'checked': ''?>> Black/Pink <div class="ruby-menu-demo-circle ruby-menu-demo-color-6"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='7' <?=$elemento['MM_colores'] == 7 ? 'checked': ''?>> Black/Yellow <div class="ruby-menu-demo-circle ruby-menu-demo-color-7"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='8' <?=$elemento['MM_colores'] == 8 ? 'checked': ''?>> Black/Gray <div class="ruby-menu-demo-circle ruby-menu-demo-color-8"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='9' <?=$elemento['MM_colores'] == 9 ? 'checked': ''?>> Black <div class="ruby-menu-demo-circle ruby-menu-demo-color-9"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='10' <?=$elemento['MM_colores'] == 10 ? 'checked': ''?>> Blue <div class="ruby-menu-demo-circle ruby-menu-demo-color-10"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='11' <?=$elemento['MM_colores'] == 11 ? 'checked': ''?>> Gray/Red <div class="ruby-menu-demo-circle ruby-menu-demo-color-11"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='12' <?=$elemento['MM_colores'] == 12 ? 'checked': ''?>> Light Purple <div class="ruby-menu-demo-circle ruby-menu-demo-color-12"></div><br>
                                                                                      <input type="radio" name="MM_colores" id="MM_colores" value='13' <?=$elemento['MM_colores'] == 13 ? 'checked': ''?>> White <div class="ruby-menu-demo-circle ruby-menu-demo-color-13"></div><br>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="MM_despliegue">Tipo Despliegue </label>
										  <div class="controls">
                                                                                    <select id="MM_despliegue" name="MM_despliegue" class="">
                                                                                        <option value="0" <?=($elemento['MM_despliegue'] == 0 ? ' selected' : '')?>>Classic</option>
                                                                                        <option value="5" <?=($elemento['MM_despliegue'] == 5 ? ' selected' : '')?>>Shop -> Clothing</option>
                                                                                        <option value="6" <?=($elemento['MM_despliegue'] == 6 ? ' selected' : '')?>>Shop -> Outerwear</option>
                                                                                        <option value="7" <?=($elemento['MM_despliegue'] == 7 ? ' selected' : '')?>>Shop -> Bags&Shoes</option>
                                                                                        <option value="8" <?=($elemento['MM_despliegue'] == 8 ? ' selected' : '')?>>Shop -> Accessoriest</option>
                                                                                        <option value="9" <?=($elemento['MM_despliegue'] == 9 ? ' selected' : '')?>>Shop -> Collections</option>
                                                                                    </select>
										  </div>
										</div>
                                                                                
                                                                                <div class="control-group">
										  <label class="control-label" for="Napartados">Nº de categorías en el menú</label>
                                                                                  <div class="controls">
                                                                                      <select id="Napartados" name="Napartados" class="">
                                                                                        <option value="1" <?=($elemento['Napartados'] == 1 ? ' selected' : '')?>>1</option>
                                                                                        <option value="2" <?=($elemento['Napartados'] == 2 ? ' selected' : '')?>>2</option>
                                                                                        <option value="3" <?=($elemento['Napartados'] == 3 ? ' selected' : '')?>>3</option>
                                                                                        <option value="4" <?=($elemento['Napartados'] == 4 ? ' selected' : '')?>>4</option>
                                                                                        <option value="5" <?=($elemento['Napartados'] == 5 ? ' selected' : '')?>>5</option>
                                                                                        <option value="6" <?=($elemento['Napartados'] == 6 ? ' selected' : '')?>>6</option>
                                                                                        <option value="7" <?=($elemento['Napartados'] == 7 ? ' selected' : '')?>>7</option>
                                                                                        <option value="8" <?=($elemento['Napartados'] == 8 ? ' selected' : '')?>>8</option>
                                                                                        <option value="9" <?=($elemento['Napartados'] == 9 ? ' selected' : '')?>>9</option>
                                                                                        <option value="10" <?=($elemento['Napartados'] == 10 ? ' selected' : '')?>>10</option>
                                                                                        <option value="11" <?=($elemento['Napartados'] == 11 ? ' selected' : '')?>>11</option>
                                                                                        <option value="12" <?=($elemento['Napartados'] == 12 ? ' selected' : '')?>>12</option>
                                                                                        <option value="13" <?=($elemento['Napartados'] == 13 ? ' selected' : '')?>>13</option>
                                                                                        <option value="14" <?=($elemento['Napartados'] == 14 ? ' selected' : '')?>>14</option>
                                                                                        <option value="15" <?=($elemento['Napartados'] == 15 ? ' selected' : '')?>>15</option>
                                                                                    </select>
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