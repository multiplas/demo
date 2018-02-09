				<?php require_once('blocks/cabecera.php'); 
                
                    if($soltpv == 1){

                    //$destinatario = "info@zumadia.com"; 
                    $destinatario = "josefrancisco@camaltec.es"; 
                    $asunto = "Solicitud de TPV"; 
                    $cuerpo = ' 
                    <html> 
                    <head> 
                       <title>TPV</title> 
                    </head> 
                    <body>  
                    <h2>Solicitud de TPV</h2>
                    <p><strong>Nombre cliente:</strong> '.$elemento[nombre].'</p>
                    <p><strong>Email cliente:</strong> '.$elemento[email].'</p>
                    <p><strong>Teléfono cliente:</strong> '.$elemento[telefono].'</p>
                    <p><strong>Dominio cliente:</strong> '.$elemento[dominio].'</p>
                    </body> 
                    </html> 
                    '; 

                    //para el envío en formato HTML 
                    $headers = "MIME-Version: 1.0\r\n"; 
                    $headers .= "Content-type: text/html; charset=utf-8\r\n"; 

                    //dirección del remitente 
                    $headers .= "From: <".$elemento[email].">\r\n"; 

                    //dirección de respuesta, si queremos que sea distinta que la del remitente 
                    $headers .= "Reply-To: ".$elemento[email]."\r\n"; 

                    //ruta del mensaje desde origen a destino 
                    $headers .= "Return-path:\r\n"; 

                    //direcciones que recibirán copia 
                    $headers .= "Cc:\r\n"; 

                    //direcciones que recibirán copia oculta 
                    $headers .= "Bcc:\r\n"; 

                    //mail($destinatario,$asunto,$cuerpo,$headers);

                }

                ?>
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
                                document.getElementById("p6").classList.remove('active'); 
                                document.getElementById("p1").classList.add('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active');
                                document.getElementById("p5").classList.remove('active'); 
                                document.getElementById("p7").classList.remove('active'); 
                            }else if(valor == '2'){
                                document.getElementById("2").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p6").classList.remove('active'); 
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.add('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active');
                                document.getElementById("p5").classList.remove('active'); 
                                document.getElementById("p7").classList.remove('active'); 
                            }else if(valor == '3'){
                                document.getElementById("3").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p6").classList.remove('active'); 
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.add('active'); 
                                document.getElementById("p4").classList.remove('active');
                                document.getElementById("p5").classList.remove('active'); 
                                document.getElementById("p7").classList.remove('active'); 
                            }else if(valor == '4'){
                                document.getElementById("4").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p6").classList.remove('active'); 
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.add('active');
                                document.getElementById("p5").classList.remove('active'); 
                                document.getElementById("p7").classList.remove('active'); 
                            }else if(valor == '5'){
                                document.getElementById("5").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p6").classList.remove('active'); 
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active');
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.add('active'); 
                                document.getElementById("p7").classList.remove('active'); 
                            }else if(valor == '6'){
                                document.getElementById("6").style.display='block';
                                document.getElementById("5").style.display='none';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active');
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active');
                                document.getElementById("p6").classList.add('active'); 
                                document.getElementById("p7").classList.remove('active'); 
                            }else if(valor == '7'){
                                document.getElementById("7").style.display='block';
                                document.getElementById("5").style.display='none';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active');
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active');
                                document.getElementById("p6").classList.remove('active'); 
                                document.getElementById("p7").classList.add('active'); 
                            }
                        }
                    
                    </script>
                    
                     <div class="row-fluid">
						<div id="edi" class="block">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Editar los métodos de pago</div>
							</div>
							<div class="block-content collapse in">
                                <form action="metodospago.php?configurarmetodos=true" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="span12">
                                    <ul class="nav nav-tabs nav-justified">
                                      <li id="p1" class="active" ><a onclick="javascript:cambiarpestana('1')" href="#">Paypal</a></li>
                                      <li id="p2" ><a href="#" onclick="javascript:cambiarpestana('2')">TPV</a></li>
                                      <li id="p3" ><a href="#" onclick="javascript:cambiarpestana('3')">Transferencia Bancaria</a></li>
                                      <li id="p4" ><a href="#" onclick="javascript:cambiarpestana('4')">Contrarembolso</a></li>
                                      <li id="p5" ><a href="#" onclick="javascript:cambiarpestana('5')">Domiciliación</a></li>
                                      <li id="p6" ><a href="#" onclick="javascript:cambiarpestana('6')">En tienda</a></li>
                                      <li id="p7" ><a href="#" onclick="javascript:cambiarpestana('7')">Aplazame</a></li>
                                        
                                    </ul>
									  <fieldset>
                                        <div id="1">
                                        <legend>Pagos con Paypal</legend>
                                        
										<div class="control-group">
										  <label class="control-label" for="paypal">Cuenta Paypal </label>
										  <div class="controls">
											<input type="text" class="span6" id="paypal" name="paypal" placeholder="Cuenta Paypal" value="<?=$elemento['paypal']?>">
											<br><span style="color: #09F; font-size: 0.70rem;">Cuenta usuario (email) para pago por paypal. Dejar vacio para no aplicar</span>
										  </div>
										</div>
                                        <div class="control-group">
										  <label class="control-label" for="ippaypal">Porcetanje incremento precio pago con Paypal </label>
										  <div class="controls">
											<input type="text" class="span6" id="ippaypal" name="ippaypal" placeholder="Porcetanje incremento precio pago con Paypal" value="<?=$elemento['ippaypal']?>">
											<br><span style="color: #09F; font-size: 0.70rem;">Dejar a 0 para no aplicar</span>
										  </div>
										</div>
                                        <div class="control-group">
										  <label class="control-label" for="ifpaypal">Importe fijo incremento precio pago con Paypal </label>
										  <div class="controls">
											<input type="text" class="span6" id="ifpaypal" name="ifpaypal" placeholder="Importe fijo incremento precio pago con Paypal" value="<?=$elemento['ifpaypal']?>">
											<br><span style="color: #09F; font-size: 0.70rem;">Dejar a 0 para no aplicar</span>
										  </div>
										</div>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        </div>
                                        <div id="2" style="display:none;">
                                            
                                            <legend>Pagos con TPV</legend>
                                        
                                                <div class="control-group">
                                                    <label class="control-label" for="tpv">URL </label>
                                                    <div class="controls">
                                                        <input type="text" class="span6" id="url" name="url" placeholder="URL TPV" value="<?=$elemento['url']?>">
                                                    </div><br>
                                                    <label class="control-label" for="tpv">Nº Comercio FUC </label>
                                                    <div class="controls">
                                                        <input type="text" class="span6" id="fuc" name="fuc" placeholder="Nª Comercio FUC" value="<?=$elemento['fuc']?>">
                                                    </div><br>
                                                    <label class="control-label" for="tpv">Terminal </label>
                                                    <div class="controls">
                                                        <input type="text" class="span6" id="ter" name="ter" placeholder="Terminal" value="<?=$elemento['ter']?>">
                                                    </div><br>
                                                    <label class="control-label" for="tpv">Nº Moneda TPV </label>
                                                    <div class="controls">
                                                        <input type="text" class="span6" id="mon_tpv" name="mon_tpv" placeholder="Nª Moneda TPV" value="<?=$elemento['mon_tpv']?>">
                                                    </div><br>
                                                    <label class="control-label" for="tpv">Clave Secreta </label>
                                                    <div class="controls">
                                                        <input type="text" class="span6" id="kc" name="kc" placeholder="Clave Secreta" value="<?=$elemento['kc']?>">
                                                    </div>
                                                </div>
                                                <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                          </div>
                                          <div id="3" style="display:none;">
                                            
                                        <legend>Pagos con transferencia bancaria</legend>
                                        
										<div class="control-group">
										  <label class="control-label" for="cuenta">Número de Cuenta </label>
										  <div class="controls">
											<input type="text" class="span6" id="cuenta" name="cuenta" placeholder="IBAN ENTX OFIX DCNN NNNN NNNN" value="<?=$elemento['cuenta']?>">
                                                                                        <br><span style="color: #09F; font-size: 0.70rem;">El número de cuenta a mostrar en el pago por transferencia. Dejar vacio para no aplicar</span><br>
										  </div>
                                                                                  <label class="control-label" for="cuenta">BIC/SWIFT </label>
                                                                                  <div class="controls">
											<input type="text" class="span6" id="bic" name="bic" placeholder="ABCD EFGH" value="<?=$elemento['bicswift']?>">
											<br><span style="color: #09F; font-size: 0.70rem;">El número de bic/swift a mostrar en el pago por transferencia.</span>
										  </div>
										</div>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>

                                      </div>
                                      <div id="4" style="display:none;">
                                          
                                          <legend>Pagos con contrarembolso</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="ccr">Tasa contrareembolso</label>
                                          <div class="controls">
											<input type="text" class="span6" id="ccr" name="ccr" placeholder="2.5" value="<?=$elemento['tasacontrareembolso']?>">
											<br><span style="color: #09F; font-size: 0.70rem;">Tasa de contrareembolso. Dejar vacio para no aplicar</span>
										  </div>
                                        </div>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        </div>
                                    <div id="5" style="display:none;">
                                          
                                          <legend>Domiciliación</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="iban">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="iban" name="iban" class="">
                                                    <option value="1" <?=($elemento['iban'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento['iban'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                    </div>
                                      <div id="6" style="display:none;">
                                          
                                          <legend>Pagos en tienda</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="pagotienda">Activar/Desactivar</label>
                                          <div class="controls">
                                                <select id="pagotienda" name="pagotienda" class="">
                                                    <option value="1" <?=($elemento['entienda'] == 1 ? ' selected' : '')?>>Activado</option>
                                                    <option value="0" <?=($elemento['entienda'] == 0 ? ' selected' : '')?>>Desactivado</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">Opcional</span>
                                          </div>
                                        </div>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                    </div>
                                    <div id="7" style="display:none;">
                                            
                                        <legend>Pagos con Aplazame</legend>
                                        
										<div class="control-group">
										  <label class="control-label" for="cuenta">Clave Pública </label>
										  <div class="controls">
											<input type="text" class="span6" id="aplazamePuK" name="aplazamePuK" placeholder="Clave Pública" value="<?=$elemento['aplazamePuK']?>">
                                                                                        <br><span style="color: #09F; font-size: 0.70rem;">Clave Pública que encontrará en el panel de control de Aplazame</span><br>
										  </div>
                                                                                  <label class="control-label" for="cuenta">Clave Privada </label>
                                                                                  <div class="controls">
											<input type="text" class="span6" id="aplazamePrK" name="aplazamePrK" placeholder="Clave Privada" value="<?=$elemento['aplazamePrK']?>">
											<br><span style="color: #09F; font-size: 0.70rem;">Clave Privada que encontrará en el panel de control de Aplazame</span>
										  </div>
										</div>
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