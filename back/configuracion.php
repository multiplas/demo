				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
                    <div id="info" style="display:none;" class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>CONFIGURACIÓN</h4>
                        <p><strong>Tipo menú:</strong> Seleccione el menú personalizado para mostrar el menú creado en la pestaña Menús. En caso contrario se mostrará un menú en base a las categorías creadas.</p><p><strong>IMPORTANTE:</strong> Si se selecciona el menú por defecto, se visualizarán las categorias conforme se hayan creado.</p><hr>
                        <p><strong>Tipo registro:</strong> Seleccione el registro normal para que el usuario este activo cuando valide su email. Seleccione el registro exhaustivo para que el usuario este activo cuando valide su email y el administrador lo active.</p><hr>
                        <p><strong>Exigir inicio de sesión:</strong> Seleccione "Exigir" si desea que para poder visualizar los productos que se ofrecen en la web, el usuario debe estar registrado y haber iniciado sesión en la web. En caso contrario, los productos podrán se vizualizados por todos.</p>
                    </div>
					<?php if ($resultaop) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php } ?>
                    
                    <script>
                        
                        <?php
                            if(isset($num)){
                                //echo"alert('".$num."');";
                                if($num==1){
                                    
                                    ?>
                                    document.getElementById("1").style.display='block';
                                    document.getElementById("2").style.display='none';
                                    document.getElementById("3").style.display='none';
                                    document.getElementById("4").style.display='none';
                                    document.getElementById("p1").classList.add('active'); 
                                    document.getElementById("p2").classList.remove('active'); 
                                    document.getElementById("p3").classList.remove('active'); 
                                    document.getElementById("p4").classList.remove('active'); 
                                    <?php
                                    
                                }else if($num==2){
                                    
                                    ?>
                                    document.getElementById("2").style.display='block';
                                    document.getElementById("1").style.display='none';
                                    document.getElementById("3").style.display='none';
                                    document.getElementById("4").style.display='none';
                                    document.getElementById("p1").classList.remove('active'); 
                                    document.getElementById("p2").classList.add('active'); 
                                    document.getElementById("p3").classList.remove('active'); 
                                    document.getElementById("p4").classList.remove('active');
                                    <?php
                                    
                                }else if($num==3){
                                    
                                    ?>
                                    document.getElementById("3").style.display='block';
                                    document.getElementById("1").style.display='none';
                                    document.getElementById("2").style.display='none';
                                    document.getElementById("4").style.display='none';
                                    document.getElementById("p1").classList.remove('active'); 
                                    document.getElementById("p2").classList.remove('active'); 
                                    document.getElementById("p3").classList.add('active'); 
                                    document.getElementById("p4").classList.remove('active'); 
                                    <?php
                                    
                                }else if($num==4){
                                    
                                    ?>
                                    document.getElementById("4").style.display='block';
                                    document.getElementById("1").style.display='none';
                                    document.getElementById("2").style.display='none';
                                    document.getElementById("3").style.display='none';
                                    document.getElementById("p1").classList.remove('active'); 
                                    document.getElementById("p2").classList.remove('active'); 
                                    document.getElementById("p3").classList.remove('active'); 
                                    document.getElementById("p4").classList.add('active');  
                                    <?php
                                    
                                }
                            }
                            $n = 2;
                        ?>
                        function cambiarpestana(valor){
                            
                            if(valor == '1'){
                                document.getElementById("1").style.display='block';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("8").style.display='none';
                                document.getElementById("9").style.display='none';
                                document.getElementById("info").style.display='none';
                                document.getElementById("p1").classList.add('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active');
                                document.getElementById("p6").classList.remove('active');
                                document.getElementById("p7").classList.remove('active'); 
                                document.getElementById("p8").classList.remove('active'); 
                                document.getElementById("p9").classList.remove('active');
                            }else if(valor == '2'){
                                document.getElementById("2").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("8").style.display='none';
                                document.getElementById("9").style.display='none';
                                document.getElementById("info").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.add('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active');
                                document.getElementById("p6").classList.remove('active');
                                document.getElementById("p7").classList.remove('active'); 
                                document.getElementById("p8").classList.remove('active'); 
                                document.getElementById("p9").classList.remove('active');
                            }else if(valor == '3'){
                                document.getElementById("3").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("8").style.display='none';
                                document.getElementById("9").style.display='none';
                                document.getElementById("info").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.add('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active');
                                document.getElementById("p6").classList.remove('active');
                                document.getElementById("p7").classList.remove('active'); 
                                document.getElementById("p8").classList.remove('active'); 
                                document.getElementById("p9").classList.remove('active');
                            }else if(valor == '4'){
                                document.getElementById("4").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("8").style.display='none';
                                document.getElementById("9").style.display='none';
                                document.getElementById("info").style.display='block';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.add('active'); 
                                document.getElementById("p5").classList.remove('active');
                                document.getElementById("p6").classList.remove('active');
                                document.getElementById("p7").classList.remove('active'); 
                                document.getElementById("p8").classList.remove('active'); 
                                document.getElementById("p9").classList.remove('active');
                            }else if(valor == '5'){
                                document.getElementById("5").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("8").style.display='none';
                                document.getElementById("9").style.display='none';
                                document.getElementById("info").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.add('active'); 
                                document.getElementById("p6").classList.remove('active');
                                document.getElementById("p7").classList.remove('active'); 
                                document.getElementById("p8").classList.remove('active'); 
                                document.getElementById("p9").classList.remove('active');
                            }else if(valor == '6'){
                                document.getElementById("6").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("8").style.display='none';
                                document.getElementById("9").style.display='none';
                                document.getElementById("info").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active'); 
                                document.getElementById("p6").classList.add('active'); 
                                document.getElementById("p7").classList.remove('active'); 
                                document.getElementById("p8").classList.remove('active');  
                                document.getElementById("p9").classList.remove('active');
                            }else if(valor == '7'){
                                document.getElementById("7").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("8").style.display='none';
                                document.getElementById("9").style.display='none';
                                document.getElementById("info").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active'); 
                                document.getElementById("p6").classList.remove('active'); 
                                document.getElementById("p7").classList.add('active'); 
                                document.getElementById("p8").classList.remove('active'); 
                                document.getElementById("p9").classList.remove('active');
                            }else if(valor == '8'){
                                document.getElementById("8").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("9").style.display='none';
                                document.getElementById("info").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active'); 
                                document.getElementById("p6").classList.remove('active'); 
                                document.getElementById("p7").classList.remove('active');
                                document.getElementById("p8").classList.add('active'); 
                                document.getElementById("p9").classList.remove('active');
                            }else if(valor == '9'){
                                document.getElementById("9").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("8").style.display='none';
                                document.getElementById("info").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active'); 
                                document.getElementById("p6").classList.remove('active'); 
                                document.getElementById("p7").classList.remove('active');
                                document.getElementById("p8").classList.remove('active');
                                document.getElementById("p9").classList.add('active'); 
                            }
                        }
                    
                    </script>
                    
                     <div class="row-fluid">
						<div id="edi" class="block">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Editar la Configuración de la Web</div>
							</div>
							<div class="block-content collapse in">
                                <form action="configuracion.php?configurar=true" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="span12">
                                    <ul class="nav nav-tabs nav-justified">
                                      <li id="p1" class="active" ><a onclick="javascript:cambiarpestana('1')" href="#">Información básica</a></li>
                                      <li id="p2" ><a href="#" onclick="javascript:cambiarpestana('2')">Dirección física</a></li>
                                      <li id="p3" ><a href="#" onclick="javascript:cambiarpestana('3')">Redes Sociales</a></li>
                                      <li id="p4" ><a href="#" onclick="javascript:cambiarpestana('4')">Configuración web</a></li>
                                      <li id="p5" ><a href="#" onclick="javascript:cambiarpestana('5')">Notificaciones</a></li>
                                      <li id="p6" ><a href="#" onclick="javascript:cambiarpestana('6')">Nacex</a></li>
                                      <li id="p7" ><a href="#" onclick="javascript:cambiarpestana('7')">Chat</a></li>
                                      <li id="p8" ><a href="#" onclick="javascript:cambiarpestana('8')">RMA</a></li>
                                      <li id="p9" ><a href="#" onclick="javascript:cambiarpestana('9')">Google Maps</a></li>
                                    </ul>
									  <fieldset>
                                        <div id="1">
                                        <legend>Información Básica de la Empresa</legend>
                                        
										<div class="control-group">
										  <label class="control-label" for="empresa">Empresa </label>
										  <div class="controls">
											<input type="text" class="span6" id="empresa" name="empresa" placeholder="Nombre de la Empresa" value="<?=$elemento['nombre']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="cif">C.I.F./N.I.F. </label>
										  <div class="controls">
											<input type="text" class="span6" id="cif" name="cif" placeholder="C.I.F./N.I.F. de la Empresa" value="<?=$elemento['cif']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="email">Email </label>
										  <div class="controls">
											<input type="text" class="span6" id="email" name="email" placeholder="Email de la Empresa" value="<?=$elemento['email']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="telefono">Teléfono </label>
										  <div class="controls">
											<input type="text" class="span6" id="telefono" name="telefono" placeholder="Teléfono de la Empresa" value="<?=$elemento['telefono']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="telefono2">Teléfono 2 </label>
										  <div class="controls">
											<input type="text" class="span6" id="telefono2" name="telefono2" placeholder="Segundo Teléfono de la Empresa" value="<?=$elemento['telefono2']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="telefono3">WhatsApp </label>
										  <div class="controls">
											<input type="text" class="span6" id="telefono3" name="telefono3" placeholder="WhatsApp de la Empresa" value="<?=$elemento['telefono3']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
										</div>
                                                                                <div class="control-group">
                                                                                  <label class="control-label" for="desglose">Activar WhatsApp </label>
                                                                                  <div class="controls">
                                                                                        <select id="wassap" name="wassap"  class="span6">
                                                                                            <option value="0" <?=($elemento['wassap'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                                                            <option value="1" <?=($elemento['wassap'] == 1 ? ' selected' : '')?>>Activado</option>
                                                                                        </select><br>
                                                                                  </div>
                                                                                </div>
										<div class="control-group">
										  <label class="control-label" for="fax">Fax </label>
										  <div class="controls">
											<input type="text" class="span6" id="fax" name="fax" placeholder="Fax de la Empresa" value="<?=$elemento['fax']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="horario">Horario </label>
										  <div class="controls">
											<input type="text" class="span6" id="horario" name="horario" placeholder="Horario de la Empresa" value="<?=$elemento['horario']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="imp">Impuesto </label>
										  <div class="controls">
											<input type="text" class="span6" id="imp" name="imp" placeholder="Porcentaje de impuesto para las compras" value="<?=$elemento['impuesto']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="divisa">Moneda Principal</label>
                                          <div class="controls">
                                                <select id="divisa" name="divisa"  class="span6">
                                                    <option value="EUR" <?=($elemento['moneda'] == 'EUR' ? ' selected' : '')?>>Euro</option>
                                                    <option value="USD" <?=($elemento['moneda'] == 'USD' ? ' selected' : '')?>>Dolar</option>
                                                    <option value="JPY" <?=($elemento['moneda'] == 'JPY' ? ' selected' : '')?>>Yen</option>
                                                    <option value="GBP" <?=($elemento['moneda'] == 'GBP' ? ' selected' : '')?>>Libra</option>
                                                    <option value="CHF" <?=($elemento['moneda'] == 'CHF' ? ' selected' : '')?>>Franco Suizo</option>
                                                </select>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="desglose">Desglose precio pedido</label>
                                          <div class="controls">
                                                <select id="desglose" name="desglose"  class="span6">
                                                    <option value="0" <?=($elemento['desglose'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                    <option value="1" <?=($elemento['desglose'] == 1 ? ' selected' : '')?>>Activado</option>
                                                </select><br><br>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="factura">Factura o Albarán</label>
                                          <div class="controls">
                                                <select id="factura" name="factura"  class="span6">
                                                    <option value="0" <?=($elemento['factura'] == 0 ? ' selected' : '')?>>Alabarán</option>
                                                    <option value="1" <?=($elemento['factura'] == 1 ? ' selected' : '')?>>Factura</option>
                                                </select><br><br>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="cestaU">Sólo un producto en la cesta</label>
                                          <div class="controls">
                                                <select id="cestaU" name="cestaU"  class="span6">
                                                    <option value="0" <?=($elemento['cestaU'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                    <option value="1" <?=($elemento['cestaU'] == 1 ? ' selected' : '')?>>Activado</option>
                                                </select><br><br>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="dPedido">Directo a Pedido tras añadir</label>
                                          <div class="controls">
                                                <select id="dPedido" name="dPedido"  class="span6">
                                                    <option value="0" <?=($elemento['dPedido'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                    <option value="1" <?=($elemento['dPedido'] == 1 ? ' selected' : '')?>>Activado</option>
                                                </select><br><br>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="condiciones">URL Condiciones</label>
                                          <div class="controls">
                                                <select id="condiciones" name="condiciones"  class="span6">
                                                    <option value="0" <?=($elemento['condiciones'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                    <option value="1" <?=($elemento['condiciones'] == 1 ? ' selected' : '')?>>Activado</option>
                                                </select><br><br>
                                          </div>
                                        </div>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        </div>
                                        <div id="2" style="display:none;">
                                            
                                            <legend>Dirección Postal/Dirección Física</legend>
                                        
										<div class="control-group">
										  <label class="control-label" for="direccion">Dirección</label>
										  <div class="controls">
											<input type="text" class="span6" id="direccion" name="direccion" placeholder="Dirección" value="<?=$elemento['direccion']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="localidad">Localidad</label>
										  <div class="controls">
											<input type="text" class="span6" id="localidad" name="localidad" placeholder="Localidad" value="<?=$elemento['localidad']?>"  required>
                                              <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="provincia">Provincia</label>
										  <div class="controls">
											<input type="text" class="span6" id="provincia" name="provincia" placeholder="Provincia" value="<?=$elemento['provincia']?>" required>
                                              <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="pais">País</label>
										  <div class="controls">
											<input type="text" class="span6" id="pais" name="pais" placeholder="País" value="<?=$elemento['pais']?>" required>
                                              <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="cp">Código Postal </label>
										  <div class="controls">
											<input type="text" class="span2" id="cp" name="cp" placeholder="Código Postal de la Empresa" value="<?=$elemento['cp']?>" required>
                                              <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>

                                        </div>
                                        <div id="3" style="display:none;">
                                            
                                        <legend>Redes Sociales</legend>
                                                                                <div class="control-group">
										  <label class="control-label" for="compGaleria">Compartir en Categorías y subcategorías</label>
										  <div class="controls">
                                                                                    <select id="compGaleria" name="compGaleria" class="">
                                                                                        <option value="0" <?=($elemento['compGaleria'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                                                        <option value="1" <?=($elemento['compGaleria'] == 1 ? ' selected' : '')?>>Activado</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="imgfacebookD">Imagen por defecto compartir en facebook</label>
                                                                                    <div class="controls">
                                                                                        <input class="input-file uniform_on" id="imgfacebookD" name="imgfacebookD" type="file">
                                                                                        <?php
                                                                                        if ($elemento['imgfacebookD'] != null)
                                                                                        {
                                                                                           ?>
                                                                                            <a style="color: #09F; font-size: 0.70rem;" href="../source/<?=$elemento['imgfacebookD']?>" target="_blank">ver imagen actual</a>
                                                                                           <?php
                                                                                        }
                                                                                        ?>
                                                                                    </div>
                                                                                </div>
										<div class="control-group">
										  <label class="control-label" for="facebook">Facebook </label>
										  <div class="controls">
											<input type="text" class="span6" id="facebook" name="facebook" placeholder="Facebook de la Empresa" value="<?=$elemento['facebook']?>"> 
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="google">Google Plus </label>
										  <div class="controls">
											<input type="text" class="span6" id="google" name="google" placeholder="Google Plus de la Empresa" value="<?=$elemento['google']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="twitter">Twitter </label>
										  <div class="controls">
											<input type="text" class="span6" id="twitter" name="twitter" placeholder="Twitter de la Empresa" value="<?=$elemento['twitter']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="youtube">Youtube </label>
										  <div class="controls">
											<input type="text" class="span6" id="youtube" name="youtube" placeholder="Youtube de la Empresa" value="<?=$elemento['youtube']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="pinterest">Pinterest </label>
										  <div class="controls">
											<input type="text" class="span6" id="pinterest" name="pinterest" placeholder="Pinterest de la Empresa" value="<?=$elemento['pinterest']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="instagram">Instagram </label>
										  <div class="controls">
											<input type="text" class="span6" id="instagram" name="instagram" placeholder="Instagram de la Empresa" value="<?=$elemento['instagram']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="linkedin">LinkedIn </label>
										  <div class="controls">
											<input type="text" class="span6" id="linkedin" name="linkedin" placeholder="LinkedIn de la Empresa" value="<?=$elemento['linkedin']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
										  </div>
										</div>
                                        <br>
                                        <legend>Plugin Facebook Me Gusta</legend>
                                            <div class="control-group">
                                                <label class="control-label" for="mgfacebook">Facebook Me Gusta </label>
                                                <div class="controls">
                                                    <input type="text" class="span6" id="mgfacebook" name="mgfacebook" placeholder="Facebook de la Empresa" value="<?=$elemento['mgfacebook']?>"> 
                                                    <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                                    <span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
                                                </div>
                                            </div>
                                            <div class="control-group">
						<label class="control-label" for="mgflugar">Mostrar en</label>
                                                <div class="controls">
                                                    <select id="mgflugar" name="mgflugar" class="">
                                                        <option value="0" <?=($elemento['mgflugar'] == 0 ? ' selected' : '')?>>Pie</option>
                                                        <option value="1" <?=($elemento['mgflugar'] == 1 ? ' selected' : '')?>>Encima de Novedades</option>
                                                        <option value="2" <?=($elemento['mgflugar'] == 2 ? ' selected' : '')?>>Ambos sitios</option>
                                                    </select>
                                                    <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
						</div>
                                            </div>
                                        
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>

                                      </div>
                                      <div id="4" style="display:none;">
                                          
                                          <legend>Configuración de la Web</legend>
                                        
										<div class="control-group">
										  <label class="control-label" for="ordenacion">Criterio Ordenación Productos</label>
										  <div class="controls">
                                                                                    <select id="ordenacion" name="ordenacion" class="">
                                                                                        <option value="rel" <?=($elemento['ordenacion'] == 'rel' ? ' selected' : '')?>>Relevancia</option>
                                                                                        <option value="fea" <?=($elemento['ordenacion'] == 'fea' ? ' selected' : '')?>>Fecha (Nuevos primero)</option>
                                                                                        <option value="fed" <?=($elemento['ordenacion'] == 'fed' ? ' selected' : '')?>>Fecha (Antiguos primero)</option>
                                                                                        <option value="noa" <?=($elemento['ordenacion'] == 'noa' ? ' selected' : '')?>>Nombre (Ascendente)</option>
                                                                                        <option value="nod" <?=($elemento['ordenacion'] == 'nod' ? ' selected' : '')?>>Nombre (Descendente)</option>
                                                                                        <option value="pra" <?=($elemento['ordenacion'] == 'pra' ? ' selected' : '')?>>Precio (Más barato primero)</option>
                                                                                        <option value="prd" <?=($elemento['ordenacion'] == 'prd' ? ' selected' : '')?>>Precio (Más caro primero)</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="mcatalogo">Modo Catálogo</label>
										  <div class="controls">
                                                                                    <select id="mcatalogo" name="mcatalogo" class="">
                                                                                        <option value="0" <?=($elemento['mcatalogo'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                                                        <option value="1" <?=($elemento['mcatalogo'] == 1 ? ' selected' : '')?>>Activado</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="tipoportes">Tipo de Portes</label>
										  <div class="controls">
                                                                                    <select id="tipoportes" name="tipoportes" class="">
                                                                                        <option value="0" <?=($elemento['tipoportes'] == 0 ? ' selected' : '')?>>Normal</option>
                                                                                        <option value="1" <?=($elemento['tipoportes'] == 1 ? ' selected' : '')?>>Por Km</option>
                                                                                        <option value="2" <?=($elemento['tipoportes'] == 2 ? ' selected' : '')?>>Por Provincias</option>
                                                                                        <option value="3" <?=($elemento['tipoportes'] == 3 ? ' selected' : '')?>>Por Provincias y Km</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="portesgratis">Mostrar Portes Gratis Pedido</label>
										  <div class="controls">
                                                                                    <select id="portesgratis" name="portesgratis" class="">
                                                                                        <option value="0" <?=($elemento['portesgratis'] == 0 ? ' selected' : '')?>>Mostrar</option>
                                                                                        <option value="1" <?=($elemento['portesgratis'] == 1 ? ' selected' : '')?>>No mostrar</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="vgaleria">Visualización de la Galería</label>
                                                                                    <div class="controls">
                                                                                          <select id="vgaleria" name="vgaleria" class="">
                                                                                              <option value="0" <?=($elemento['vgaleria'] == 0 ? ' selected' : '')?>>Paginada</option>
                                                                                              <option value="1" <?=($elemento['vgaleria'] == 1 ? ' selected' : '')?>>En una sola pantalla</option>
                                                                                          </select><br>
                                                                                        <span style="color: #09F; font-size: 0.70rem;">Seleccione la manera de visualizar las galerías de productos.</span>
                                                                                    </div>
                                                                                  </div>
                                                                                <div class="control-group">
										  <label class="control-label" for="det_producto">Mostrar detalles Productos</label>
										  <div class="controls">
                                                                                    <select id="det_producto" name="det_producto" class="">
                                                                                        <option value="0" <?=($elemento['det_producto'] == 0 ? ' selected' : '')?>>No</option>
                                                                                        <option value="1" <?=($elemento['det_producto'] == 1 ? ' selected' : '')?>>Sí</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div><div class="control-group">
										  <label class="control-label" for="com_producto">Permitir comentarios Productos</label>
										  <div class="controls">
                                                                                    <select id="com_producto" name="com_producto" class="">
                                                                                        <option value="0" <?=($elemento['com_producto'] == 0 ? ' selected' : '')?>>No</option>
                                                                                        <option value="1" <?=($elemento['com_producto'] == 1 ? ' selected' : '')?>>Sí</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="com_blog">Permitir comentarios Blog</label>
										  <div class="controls">
                                                                                    <select id="com_blog" name="com_blog" class="">
                                                                                        <option value="0" <?=($elemento['com_blog'] == 0 ? ' selected' : '')?>>No</option>
                                                                                        <option value="1" <?=($elemento['com_blog'] == 1 ? ' selected' : '')?>>Sí</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="com_galeria">Permitir comentarios Galerías</label>
										  <div class="controls">
                                                                                    <select id="com_galeria" name="com_galeria" class="">
                                                                                        <option value="0" <?=($elemento['com_galeria'] == 0 ? ' selected' : '')?>>No</option>
                                                                                        <option value="1" <?=($elemento['com_galeria'] == 1 ? ' selected' : '')?>>Sí</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="ftamano">Forzar tamaño imagen</label>
										  <div class="controls">
                                                                                    <select id="ftamano" name="ftamano" class="">
                                                                                        <option value="0" <?=($elemento['ftamano'] == 0 ? ' selected' : '')?>>No</option>
                                                                                        <option value="1" <?=($elemento['ftamano'] == 1 ? ' selected' : '')?>>Si</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="pnovlateral">Posición Novedades y Etiquetas en las categorías</label>
										  <div class="controls">
                                                                                    <select id="pnovlateral" name="pnovlateral" class="">
                                                                                        <option value="0" <?=($elemento['pnovlateral'] == 0 ? ' selected' : '')?>>Izquierda</option>
                                                                                        <option value="1" <?=($elemento['pnovlateral'] == 1 ? ' selected' : '')?>>Arriba</option>
                                                                                        <option value="2" <?=($elemento['pnovlateral'] == 2 ? ' selected' : '')?>>Derecha</option>
                                                                                        <option value="3" <?=($elemento['pnovlateral'] == 3 ? ' selected' : '')?>>Abajo</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="etiqAct">Activar Etiquetas</label>
										  <div class="controls">
                                                                                    <select id="etiqAct" name="etiqAct" class="">
                                                                                        <option value="0" <?=($elemento['etiqAct'] == 0 ? ' selected' : '')?>>No</option>
                                                                                        <option value="1" <?=($elemento['etiqAct'] == 1 ? ' selected' : '')?>>Si</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="etiqpro">Mostrar Etiqueta tipo Producto</label>
										  <div class="controls">
                                                                                    <select id="etiqpro" name="etiqpro" class="">
                                                                                        <option value="0" <?=($elemento['etiqpro'] == 0 ? ' selected' : '')?>>No</option>
                                                                                        <option value="1" <?=($elemento['etiqpro'] == 1 ? ' selected' : '')?>>Sí</option>
                                                                                    </select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="contrareembolso">Precio Envio Contrareembolso </label>
										  <div class="controls">
											<input type="text" class="span6" id="contrareembolso" name="contrareembolso" placeholder="Precio Envio Contrareembolso €" value="<?=$elemento['tasacontrareembolso']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Coste adicional que se cobra por la gestión del contrareembolso. Dejar a 0 para no aplicar</span>
										  </div>
										</div>
										<!--<div class="control-group">
										  <label class="control-label" for="cuenta">Número de Cuenta </label>
										  <div class="controls">
											<input type="text" class="span6" id="cuenta" name="cuenta" placeholder="IBAN ENTX OFIX DCNN NNNN NNNN" value="<?=$elemento['cuenta']?>">
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #09F; font-size: 0.70rem;">El número de cuenta a mostrar en el pago por transferencia. Dejar vacio para no aplicar</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="paypal">Cuenta Paypal </label>
										  <div class="controls">
											<input type="text" class="span6" id="paypal" name="paypal" placeholder="Cuenta Paypal" value="<?=$elemento['paypal']?>">
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Cuenta usuario (email) para pago por paypal. Dejar vacio para no aplicar</span>
										  </div>
										</div>-->
										<div class="control-group">
										  <label class="control-label" for="msgtop">Mensaje Superior </label>
										  <div class="controls">
											<input type="text" class="span6" id="msgtop" name="msgtop" placeholder="Mensaje Superior" value="<?=$elemento['msgtop']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="msgbottom">Mensaje Inferior </label>
										  <div class="controls">
											<input type="text" class="span6" id="msgbottom" name="msgbottom" placeholder="Mensaje Inferior" value="<?=$elemento['msgbottom']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="msgbottom">Mensaje Días máximos </label>
										  <div class="controls">
											<input type="text" class="span6" id="msgdiasmax" name="msgdiasmax" placeholder="Mensaje Días máximos" value="<?=$elemento['msgdiasmax']?>">
											<span style="color: green; font-size: 0.70rem;">Opcional</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar vacio para no mostrar</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="dominio">Dominio </label>
										  <div class="controls">
											<input type="text" class="span6" id="dominio" name="dominio" placeholder="Dominio de la web ''midominio.es''" value="<?=$elemento['dominio']?>" ><br>
											<span style="color: #09F; font-size: 0.70rem;">El de la URL: http://www.MIDOMINIO/</span>
										  </div>
										</div>
                                                                                <div class="control-group">
										  <label class="control-label" for="descripcionHTML">Descripción HTML </label>
										  <div class="controls">
											<input type="text" class="span6" id="descripcionHTML" name="descripcionHTML" placeholder="Descripción de la web" value="<?=$elemento['descripcionHTML']?>" ><br>
											<span style="color: #09F; font-size: 0.70rem;">Info para descripción de la web en la página principal.</span>
										  </div>
										</div>
                                        <div class="control-group">
                                            <label class="control-label" for="logosup">Logo superior</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="logosup" name="logosup" type="file">
                                                <?php
                                                if ($elemento['logosup'] != null)
                                                {
                                                   ?>
                                                    <a style="color: #09F; font-size: 0.70rem;" href="../source/<?=$elemento['logosup']?>" target="_blank">ver imagen actual</a>
                                                    <a style="color: red; font-size: 0.70rem;" href="configuracion.php?borrarLogo=logosup">Eliminar</a>
                                                   <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="logoinf">Logo inferior</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="logoinf" name="logoinf" type="file">
                                                <?php
                                                if ($elemento['logoinf'] != null)
                                                {
                                                   ?>
                                                    <a style="color: #09F; font-size: 0.70rem;" href="../source/<?=$elemento['logoinf']?>" target="_blank">ver imagen actual</a>
                                                    <a style="color: red; font-size: 0.70rem;" href="configuracion.php?borrarLogo=logoinf">Eliminar</a>
                                                   <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="logoinf">Logo menú</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="logomenu" name="logomenu" type="file">
                                                <?php
                                                if ($elemento['logomenu'] != null)
                                                {
                                                   ?>
                                                    <a style="color: #09F; font-size: 0.70rem;" href="../source/<?=$elemento['logomenu']?>" target="_blank">ver imagen actual</a>
                                                    <a style="color: red; font-size: 0.70rem;" href="configuracion.php?borrarLogo=logomenu">Eliminar</a>
                                                    
                                                   <?php
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="icono">Icono pestaña</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="icono" name="icono" type="file">
                                                <?php
                                                if ($elemento['icono'] != null)
                                                {
                                                   ?>
                                                    <a style="color: #09F; font-size: 0.70rem;" href="../icono/<?=$elemento['icono']?>" target="_blank">ver imagen actual</a>
                                                    <a style="color: red; font-size: 0.70rem;" href="configuracion.php?borrarLogo=icono">Eliminar</a>
                                                   <?php
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                          <label class="control-label" for="menus">Tipo de menú</label>
                                          <div class="controls">
                                                <select id="menu" name="menu" class="">
                                                    <option value="0" <?=($elemento['menu'] == 0 ? ' selected' : '')?>>Menú por defecto</option>
                                                    <option value="1" <?=($elemento['menu'] == 1 ? ' selected' : '')?>>Menú personalizado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Seleccione el menú personalizado para mostrar el menú creado en la pestaña Menús. En caso contrario se mostrará un menú en base a las categorías padre.</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="registro">Tipo de registro</label>
                                          <div class="controls">
                                                <select id="registro" name="registro" class="">
                                                    <option value="1" <?=($elemento['registro'] == 1 ? ' selected' : '')?>>Registro normal</option>
                                                    <option value="2" <?=($elemento['registro'] == 2 ? ' selected' : '')?>>Registro exhaustivo</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Seleccione el tipo de registro para los usuarios.</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="sesion">Exigir inicio de sesión</label>
                                          <div class="controls">
                                                <select id="sesion" name="sesion" class="">
                                                    <option value="0" <?=($elemento2['conectado'] == 0 ? ' selected' : '')?>>No exigir</option>
                                                    <option value="1" <?=($elemento2['conectado'] == 1 ? ' selected' : '')?>>Exigir</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Seleccione si desea que para ver los productos se debe estar conectado.</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="httpsAc">Https</label>
                                          <div class="controls">
                                                <select id="httpsAc" name="httpsAc" class="">
                                                    <option value="0" <?=($elemento['httpsAc'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                    <option value="1" <?=($elemento['httpsAc'] == 1 ? ' selected' : '')?>>Activado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Seleccione si desea forzar por https o no.</span>
                                          </div>
                                        </div>
                                        
                                        <input type="hidden" class="span6" name="num" value="<?=$n?>">
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        <!--
										<div class="control-group">
                                            <h5 style="margin: 3% 0px 0px 0px; padding: 0px 10%;">Personalización de la Web</h5>
										</div>
                                        
                                        
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        -->
                                        </div>
                                        
                                       <div id="5" style="display:none;">
                                          
                                          <legend>Notificaciones</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="envmail">Envío Email</label>
                                          <div class="controls">
                                                <select id="envmail" name="envmail" class="">
                                                    <option value="0" <?=($elemento['envimail'] == 0 ? ' selected' : '')?>>Normal</option>
                                                    <option value="1" <?=($elemento['envimail'] == 1 ? ' selected' : '')?>>Smtp</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Tipo de envío de notificaciones por email</span>
                                          </div>
                                        </div>
                                          <div class="control-group">
                                          <label class="control-label" for="envmail">Seguridad SMTP</label>
                                              <div class="controls">
                                                <select id="segSmtp" name="segSmtp" class="">
                                                    <option value="0" <?=($elemento['segSmtp'] == 0 ? ' selected' : '')?>>TLS</option>
                                                    <option value="1" <?=($elemento['segSmtp'] == 1 ? ' selected' : '')?>>SSL</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Sólo necesario en caso de elegir Envío Email por smtp</span>
                                          </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label" for="mailSmtp">Email Smtp</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="mailSmtp" name="mailSmtp" placeholder="Email para envío por smtp" value="<?=$elemento['mailSmtp']?>" ><br>
                                                <span style="color: #09F; font-size: 0.70rem;">Sólo necesario en caso de elegir Envío Email por smtp</span>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label" for="passSmtp">Contraseña Email Smtp</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="passSmtp" name="passSmtp" placeholder="Contraseña email para envío por smtp" value="<?=$elemento['passSmtp']?>" ><br>
                                                <span style="color: #09F; font-size: 0.70rem;">Sólo necesario en caso de elegir Envío Email por smtp</span>
                                            </div>
                                          </div>
                                           <div class="control-group">
                                            <label class="control-label" for="puertoSmtp">Puerto Smtp</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="puertoSmtp" name="puertoSmtp" placeholder="Contraseña email para envío por smtp" value="<?=$elemento['puertoSmtp']?>" ><br>
                                                <span style="color: #09F; font-size: 0.70rem;">Sólo necesario en caso de elegir Envío Email por smtp</span>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label" for="hostSmtp">Host Smtp</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="hostSmtp" name="hostSmtp" placeholder="Contraseña email para envío por smtp" value="<?=$elemento['hostSmtp']?>" ><br>
                                                <span style="color: #09F; font-size: 0.70rem;">Sólo necesario en caso de elegir Envío Email por smtp</span>
                                            </div>
                                          </div>
                                        
                                        <input type="hidden" class="span6" name="num" value="<?=$n?>">
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        <!--
										<div class="control-group">
                                            <h5 style="margin: 3% 0px 0px 0px; padding: 0px 10%;">Personalización de la Web</h5>
										</div>
                                        
                                        
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        -->
                                        </div>
                                         
                                       <div id="6" style="display:none;">
                                          
                                          <legend>Nacex</legend>
                                          <div class="control-group">
                                          <label class="control-label" for="nacex">Activado</label>
                                          <div class="controls">
                                                <select id="nacex" name="nacex" class="">
                                                    <option value="0" <?=($elemento['nacex'] == 0 ? ' selected' : '')?>>No</option>
                                                    <option value="1" <?=($elemento['nacex'] == 1 ? ' selected' : '')?>>Si</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Activación modulo Nacex para poder ejecutar la petición de envío a través de ellos</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="envmail">Usuario</label>
                                          <div class="controls">
                                                <input type="text" class="span6" id="userN" name="userN" placeholder="Contraseña email para envío por smtp" value="<?=$elemento3['user']?>" ><br>
                                          </div>
                                        </div>
                                          <div class="control-group">
                                          <label class="control-label" for="envmail">Password</label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="passN" name="passN" placeholder="Contraseña email para envío por smtp" value="<?=$elemento3['pass']?>" ><br>
                                          </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label" for="mailSmtp">Delegación</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="delegacionN" name="delegacionN" placeholder="Email para envío por smtp" value="<?=$elemento3['delegacion']?>" ><br>
                                            </div>
                                          </div>
                                          <div class="control-group">
                                            <label class="control-label" for="passSmtp">Código Cliente</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="cclienteN" name="cclienteN" placeholder="Contraseña email para envío por smtp" value="<?=$elemento3['cliente']?>" ><br>
                                            </div>
                                          </div>
                                           
                                         
                                        
                                        <input type="hidden" class="span6" name="num" value="<?=$n?>">
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        </div>
                                                                              
                                        <div id="7" style="display:none;">
                                          
                                          <legend>Chat</legend>
                                         
                                            <div class="control-group">
                                              <label class="control-label" for="chat">Código Chat</label>
                                              <div class="controls">
                                                  <textarea type="text" class="span6" id="chat" name="chat"><?=$elemento['chat']?></textarea><br>
                                              </div>
                                            </div>
                                            <input type="hidden" class="span6" name="num" value="<?=$n?>">
                                            <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        </div>
                                                                              
                                        <div id="8" style="display:none;">
                                          
                                          <legend>RMA</legend>
                                          <div class="control-group">
                                          <label class="control-label" for="nacex">Activado</label>
                                          <div class="controls">
                                                <select id="rma" name="rma" class="">
                                                    <option value="0" <?=($elemento['rma'] == 0 ? ' selected' : '')?>>No</option>
                                                    <option value="1" <?=($elemento['rma'] == 1 ? ' selected' : '')?>>Si</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Activación modulo Nacex para poder ejecutar la petición de envío a través de ellos</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="rma_dias">Días RMA</label>
                                          <div class="controls">
                                                <input type="text" class="span6" id="rma_dias" name="rma_dias" placeholder="Días RMA" value="<?=$elemento['rma_dias']?>" ><br>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="rma_gastos">Gastos RMA</label>
                                          <div class="controls">
                                                <input type="text" class="span6" id="rma_gastos" name="rma_gastos" placeholder="Días RMA" value="<?=$elemento['rma_gastos']?>" ><br>
                                          </div>
                                        </div>
                                        <input type="hidden" class="span6" name="num" value="<?=$n?>">
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        </div>
                                                                              
                                        <div id="9" style="display:none;">
                                          
                                          <legend>Google Maps</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="mapskey">Api key</label>
                                          <div class="controls">
                                                <input type="text" class="span6" id="mapskey" name="mapskey" placeholder="Google Maps Api key" value="<?=$elemento['mapskey']?>" ><br>
                                          </div>
                                        </div>
                                          <div class="control-group">
                                          <label class="control-label" for="mapszoom">Zoom</label>
                                          <div class="controls">
                                                <input type="text" class="span6" id="mapszoom" name="mapszoom" placeholder="Google Maps Zoom" value="<?=$elemento['mapszoom']?>" ><br>
                                          </div>
                                        </div>
                                          <div class="control-group">
                                          <label class="control-label" for="mapscoor">Coordenadas Centro</label>
                                          <div class="controls">
                                                <input type="text" class="span6" id="mapscoor" name="mapscoor" placeholder="Google Maps Coordenadas Centro (39.9661442, -3.8107248)" value="<?=$elemento['mapscoor']?>" ><br>
                                          </div>
                                        </div>
                                        <input type="hidden" class="span6" name="num" value="<?=$n?>">
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        </div>
                                                                              
                                      </fieldset>
								</div>
                                </form>
							</div>
						</div>
                        <!-- block -->
                    </div>
                    
                    
                </div>
				<?php require_once('blocks/pie.php'); ?>