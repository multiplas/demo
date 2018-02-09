				<?php include "cabecera.php"; ?>
                <div class="span9" id="content">
					<?php if ($resultaop == "ERROR EN LA CONEXIÓN CON NACEX") { ?>
						<div class="row-fluid">
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Error</h4>
								No se ha podido conectar con Nacex. Intentelo de nuevo más tarde.
							</div>
						</div>
					<?php }else if(count($resultaop)>0 && $resultaop[0]=="ERROR") { ?>
						<div class="row-fluid">
							<div class="alert alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Error</h4>
								<?=$resultaop[1]?>
							</div>
						</div>
                                        <?php }else if($resultaop) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php }?> 
                     
                         
		<div id="datosempresa" class="grid_10">
                   <div class="box round first">



               
            <h2> Envío Nacex
            </h2>
								
							
							
                                <?php if($estado == 0){ ?>
                                                            <form action="nacex.php?id=<?=$_GET['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
								
                                        <input type="hidden" id="id_fact" name="id_fact" value="<?=$_GET['id']?>">
                                          
                                        <br><br>
					
                                          <label>Tipo Servicio</label>
                                          <select id="tservicio" name="tservicio" class="" required="">
                                                    <option value="E">EURONACEX TERRESTRE</option>
                                                    <option value="E">SERVICIO AEREO</option>
                                                    <option value="E">EURONACEX ECONOMY</option>
                                                    <option value="E">PLUSPACK EUROPA</option>
                                                    <option value="01">NACEX 10:00H</option>
                                                    <option value="02">NACEX 12:00H</option>
                                                    <option value="03">INTERDIA</option>
                                                    <option value="04">PLUS BAG 1</option>
                                                    <option value="05">PLUS BAG 2</option>
                                                    <option value="06">VALIJA</option>
                                                    <option value="07">VALIJA IDA Y VUELTA</option>
                                                    <option value="08" selected="">NACEX 19:00H</option>
                                                    <option value="09">PUENTE URBANO</option>
                                                    <option value="10">DEVOLUCION ALBARAN CLIENTE</option>
                                                    <option value="11">NACEX 08:30H</option>
                                                    <option value="12">DEVOLUCION TALON</option>
                                                    <option value="14">DEVOLUCION PLUS BAG 1</option>
                                                    <option value="15">DEVOLUCION PLUS BAG 2</option>
                                                    <option value="17">DEVOLUCION E-NACEX</option>
                                                    <option value="21">NACEX SABADO</option>
                                                    <option value="22">CANARIAS MARITIMO</option>
                                                    <option value="24">CANARIAS 24H</option>
                                                    <option value="26">PLUS PACK</option>
                                                    <option value="27">E-NACEX</option>
                                                    <option value="28">PREMIUM</option>
                                                    <option value="29">NX-SHOP VERDE</option>
                                                    <option value="30">NX-SHOP NARANJA</option>
                                                    <option value="31">E-NACEX SHOP</option>
                                                    <option value="33">C@MBIO</option>
                                                    <option value="48">CANARIAS 48H</option>
                                                    <option value="88">INMEDIATO</option>
                                                    <option value="90">NACEX.SHOP</option>
                                                    <option value="91">SWAP</option>
                                                    <option value="95">RETORNO SWAP</option>
                                                    <option value="96">DEV. ORIGEN</option>
                                                </select>
                                          <br><br>
                                          
                                    
                                          
                                        
										
                                          <label>Tipo de Cobro</label>
                                          <select id="tcobro" name="tcobro" class="" required="">
                                                    <option value="O" selected>Origen</option>
                                                    <option value="D">Destino</option>
                                                    <option value="T">Tercero</option>
                                                </select><br><br>
                                         

                                          
                                         
                                        
										
                                          <label>Tipo de Envío</label>
                                            <select id="tenvio" name="tenvio" class="" required="">
                                                    <option value="0">Documentos (ESP-POR-AND)</option>
                                                    <option value="1">Bolsa (ESP-POR-AND)</option>
                                                    <option value="1" selected="">Paqueta (ESP-POR-AND)</option>
                                                    <option value="D">Documentos (INT)</option>
                                                    <option value="M">Muestras (INT)</option>
                                                </select><br>
                                              <span style="color: #09F; font-size: 0.70rem;">ESP->España, POR->Portugal, AND->Andorra, INT->Internacional</span>
                                              <br><br>
                                    
                             
                                        
										
                                          <label>Nº Bultos</label>
                                            <input type="text" class="span6" id="bultos" name="bultos" placeholder="Nº Bultos" value="" required="">
                                          <br><br>
                                    
                                          
                                         
                                        
										
                                          <label>Kilos</label>
                                               <input type="text" class="span6" id="kilos" name="kilos" placeholder="Peso en Kg" value="" required="">
                                          <br><br>
                                          
                                 
                                          <label>Envase</label>
                                          <input type="text" class="span6" id="envase" name="envase" placeholder="Envase" value="" required="">
                                          <br><br>
                                          
                                        
                                          <label>Vehículo Recogida</label>
                                                <select id="vrecogida" name="vrecogida" class="" required="">
                                                    <option value="C" selected>Coche</option>
                                                    <option value="M">Moto</option>
                                                </select><br>
                                          <br><br>  
                                       
                                          <?php $da2 = mysql_query("SELECT d.nombre AS nombre, d.direccion AS direccion, d.idpais AS pais, d.cp AS cp, d.poblacion AS poblacion, u.telefono AS telefono "
                                                  . "FROM bd_direcciones d, bd_facturas f, bd_users u "
                                                  . "WHERE f.id=".$_GET['id']." AND d.idusuario = f.idusuario AND u.id = f.idusuario",$db);
                                          $pp2 = mysql_fetch_Array($da2); ?>
                                        
                                          <label>Datos Envío</label>
                                              <input type="text" class="span6" id="nombreE" name="nombreE" placeholder="Nombre" value="<?=$pp2['nombre']?>" required="">
                                              <input type="text" class="span6" id="direccionE" name="direccionE" placeholder="Direccion" value="<?=$pp2['direccion']?>" required=""><br>
                                              <label>&nbsp;</label><input type="text" class="span6" id="cpE" name="cpE" placeholder="CP" value="<?=$pp2['cp']?>" required="">
                                              <input type="text" class="span6" id="localidadE" name="localidadE" placeholder="Poblacion" value="<?=$pp2['poblacion']?>" required=""><br>
                                              <label>&nbsp;</label><input type="text" class="span6" id="telefonoE" name="telefonoE" placeholder="Telefono" value="<?=$pp2['telefono']?>" required="">
                                              <input type="text" class="span6" id="paisE" name="paisE" placeholder="Pais" value="<?=$pp2['pais']?>" required="">
                                          <br><br>
                                          
                                       
                                          <label>Internacional</label>
                                         
                                               <input type="text" class="span6" id="Contenido" name="Contenido" placeholder="Contenido" value="">
                                               <input type="text" class="span6" id="vdeclarado" name="vdeclarado" placeholder="Valor declarado" value="">
                                               <br><span style="color: #09F; font-size: 0.70rem;">Rellenado obligatorio para envíos internacionales</span>
                                          <br><br>
                                          
                                      <input type='hidden' name='accion' id='accion' value='generarEnvioNacex' />
                                        
										
                                        <br><button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Procesar Envío</button><br><br>
                                    
                            
								</div>
                                </form>
                                <?php }else{ ?>
                                                            <b>Código de la expedición:</b> <?=$estado['cod_expedicion']?><br>
                                                            <b>Fecha prevista de entrega:</b> <?=$estado['fecha']?><br>
                                                            <b>Devolución completa Nacex:</b> <?=$estado['cad_devuelta']?><br>
                                                            <a href="http://gprs.nacex.com/nacex_ws/ws?method=getEtiqueta&user=<?=$datos['user']?>&pass=<?=md5($datos['pass'])?>&data=codexp=<?=$estado['cod_expedicion']?>|modelo=IMAGEN" target="_blank"><button>Imprimir Etiqueta</button></a>
                                <?php } ?>
							</div>
						</div>
                        <!-- block -->
                    </div>
                </div>
				<?php include "pie.php"; ?>