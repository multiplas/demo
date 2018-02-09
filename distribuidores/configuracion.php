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
								<div class="muted pull-left">Editar la Configuración de la Web</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
									<form action="configuracion.php?configurar=true" method="post" class="form-horizontal">
									  <fieldset>
										<legend>Editar Configuración</legend>
                                        
										<div class="control-group">
                                            <h5 style="margin: 0px 0px 0px 0px; padding: 0px 10%;">Información Básica de la Empresa</h5>
										</div>
                                        
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
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        
										<div class="control-group">
                                            <h5 style="margin: 3% 0px 0px 0px; padding: 0px 10%;">Dirección Postal/Dirección Física</h5>
										</div>
                                        
										<div class="control-group">
										  <label class="control-label" for="direccion">Dirección</label>
										  <div class="controls">
											<input type="text" class="span6" id="direccion" name="direccion" placeholder="Dirección" value="<?=$elemento['direccion']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br><br>
											<input type="text" class="span6" id="direccion2" name="direccion2" placeholder="Adicional (Ej: Entresuelo A)" value="<?=$elemento['direccion2']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="localidad">Localidad</label>
										  <div class="controls">
											<input type="text" class="span6" id="localidad" name="localidad" placeholder="Localidad" value="<?=$elemento['localidad']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="provincia">Provincia</label>
										  <div class="controls">
											<input type="text" class="span6" id="provincia" name="provincia" placeholder="Provincia" value="<?=$elemento['provincia']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="pais">País</label>
										  <div class="controls">
											<input type="text" class="span6" id="pais" name="pais" placeholder="País" value="<?=$elemento['pais']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="cp">Código Postal </label>
										  <div class="controls">
											<input type="text" class="span2" id="cp" name="cp" placeholder="Código Postal de la Empresa" value="<?=$elemento['cp']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        
										<div class="control-group">
                                            <h5 style="margin: 3% 0px 0px 0px; padding: 0px 10%;">Redes Sociales</h5>
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
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        
										<div class="control-group">
                                            <h5 style="margin: 3% 0px 0px 0px; padding: 0px 10%;">Configuración de la Web</h5>
										</div>
                                        
										<div class="control-group">
										  <label class="control-label" for="portesgratis">Portes Gratis desde </label>
										  <div class="controls">
											<input type="text" class="span6" id="portesgratis" name="portesgratis" placeholder="Portes Gratis desde €" value="<?=$elemento['portesgratis']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #09F; font-size: 0.70rem;">Dejar a 0 para no aplicar</span>
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
										<div class="control-group">
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
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="recogida">Recogida en Tienda</label>
                                          <div class="controls">
											<select id="recogida" name="recogida" class="chzn-select span4" required>
												<option value="0"<?=$elemento['recogida'] != 1 ? ' selected' : ''?>>No permitir</option>
												<option value="1"<?=$elemento['recogida'] >= 1 ? ' selected' : ''?>>Si, permitir</option>
											</select>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
                                        </div>
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
										  <label class="control-label" for="dominio">Dominio </label>
										  <div class="controls">
											<input type="text" class="span6" id="dominio" name="dominio" placeholder="Dominio de la web ''midominio.es''" value="<?=$elemento['dominio']?>" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span><br>
											<span style="color: #09F; font-size: 0.70rem;">El de la URL: http://www.MIDOMINIO/</span>
										  </div>
										</div>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        <!--
										<div class="control-group">
                                            <h5 style="margin: 3% 0px 0px 0px; padding: 0px 10%;">Personalización de la Web</h5>
										</div>
                                        
                                        
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        -->
									  </fieldset>
									</form>
								</div>
							</div>
						</div>
                        <!-- block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>