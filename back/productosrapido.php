				<?php require_once('blocks/cabecera.php'); ?>
<style>
    .chzn-container{
        min-width: 150px !important;
    }
    
    .dataTables_filter{
        float: right !important;
        margin-right: 20px !important;
    }
</style>
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
						<div id="add" class="block">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Subir un Producto</div>
							</div>
							<div class="block-content collapse in">
                               
                                              
							    
								<div class="span12" style="margin-bottom: 50px;">
                                    <form action="productosrapido.php?accion=subirmultiproducto" method="post" class="form-horizontal" enctype="multipart/form-data">
								    <div id="1">
									  <fieldset>
										<legend>Subida Rápida de Productos</legend>
                                                                                
                                                                                <div class="control-group">
                                                                                    <label class="control-label" for="ncategoria1">Categoría</label>
                                                                                    <div class="controls">
                                                                                      <select id="ncategoria1" name="categoria1" class="chzn-select span4" required>
                                                                                          <option value="">Selecciona</option>
                                                                                          <?php
                                                                                              foreach ($listadosalt AS $listado)
                                                                                              {
                                                                                                  ?>
                                                                                                      <option value="<?=$listado['id']?>"><?=$listado['categoria']?></option>
                                                                                                  <?php
                                                                                              }
                                                                                          ?>
                                                                                      </select>
                                                                                      <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                                                                      <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                                                                    </div>
                                                                                  </div>
                                                                                
										<?php for($i=1; $i<=10; $i++){ ?>
                                                                                <div class="control-group">
										    <?=$i?>.- 
                                                                                    <input type="text" class="span6" id="nnombre<?=$i?>" name="nombre<?=$i?>" placeholder="Nombre del producto" style="width: 40%;">
                                                                                    <input type="text" class="span6" id="nprecio<?=$i?>" name="precio<?=$i?>" placeholder="Precio (Sin IVA)" style="width: 10%;">
                                                                                    <input type="text" class="span6" id="nreferencia<?=$i?>" name="referencia<?=$i?>" placeholder="Referencia" style="width: 10%;">
										</div>
                                                                                <?php } ?>
                                                                                
										<button type="submit" class="btn btn-primary">Subir todos los productos</button>
									
									  </fieldset>
                                    </div>
                                      
                                    </form>  
                                    
                                        <div id="14" style="display: none">
                                            <fieldset>
						<legend>Stock</legend>
                                                    <div class="control-group" style="max-width: 60%;">
                                                        <label class="control-label" for="nunidades">Unidades </label>
                                                        <div class="controls">
                                                          <input type="text" class="span6" id="nunidades" name="unidades" placeholder="Unidades en stock" required>
                                                          <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                        </div>
                                                      </div>
                                                      <div class="control-group" style="max-width: 60%;">
                                                        <label class="control-label" for="nstock">Stock Mínimo </label>
                                                        <div class="controls">
                                                          <input type="text" class="span6" id="nstock" name="stock" placeholder="Stock mínimo" required>
                                                          <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                        </div>
                                                      </div>                                                                           
                                        </fieldset>
                                        <button type="submit" class="btn btn-primary">Modificar</button>
					<button type="button" onclick="location.href = 'productos.php';" class="btn">Cancelar</button>                                
                                        </div>
                                        <div id="12" style="display: none">
                                            <fieldset>
										<legend>Etiquetas producto</legend>
                                                                                <div class="control-group">
                                                                                
                                            <table>
                                            <tr>
                                        <?php 
                                            $i = 0;
                                            $cont = 0;
                                            foreach ($elemento4 AS $atr){ 
                                                $i++;
                                                if($cont <= 4){
                                                    $cont++;
                                                ?>
                                                    <td style="width:10%;">
                                                    <div class="control-group">
                                                        <label style="text-align:center;"><b><?=$atr['nombre']?></b></label>
                                                        <div style="text-align:center;"><input type="checkbox" name="dispEtiq[]" id="atr<?=$atr['id']?>" value="<?=$atr['id']?>"></div>
                                                    </div>
                                                    
                                                    </td>
                                                <?php
                                                    }else{
                                                        $cont=1;
                                                ?>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="control-group">
                                                            <label style="text-align:center;"><b><?=$atr['nombre']?></b></label>
                                                            <div style="text-align:center;"><input type="checkbox" name="dispEtiq[]" id="atr<?=$atr['id']?>" value="<?=$atr['id']?>"></div>
                                                        </div>

                                                    </td>
                                                <?php
                                                }
                                            }
                                            ?>
                                            </tr>
                                        </table>
                                        </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-primary">Modificar</button>
					<button type="button" onclick="location.href = 'productos.php';" class="btn">Cancelar</button>                                
                                        </div>
                                        
                                        <div id="13" style="display: none">
                                            <fieldset>
						<legend>SEO</legend>
                                                <div class="control-group" style="max-width: 60%;">
                                                    <label class="control-label" for="nmetatitulo">Meta título SEO </label>
                                                    <div class="controls">
                                                      <input type="text" class="span6" id="nmetatitulo" name="metatitulo" placeholder="Meta del titulo para SEO">
                                                    </div>
                                                  </div>
                                                  <div class="control-group" style="max-width: 60%;">
                                                    <label class="control-label" for="nmetadescripcion">Meta descripción SEO </label>
                                                    <div class="controls">
                                                      <input type="text" class="span6" id="nmetadescripcion" name="metadescripcion" placeholder="Meta de la descripción para SEO">
                                                    </div>
                                              </div>                                                                                
                                        </fieldset>
                                        <button type="submit" class="btn btn-primary">Modificar</button>
					<button type="button" onclick="location.href = 'productos.php';" class="btn">Cancelar</button>                                
                                        </div>
                                    <div id="9" style="display:none;">
                                        <fieldset>
										<legend>Atributos producto</legend>
                                                                                <div class="control-group">
                                          
                                        <table>
                                            <tr>
                                        <?php 
                                            $i = 0;
                                            $con = 0; 
                                            foreach ($elemento2 AS $atr){ 
                                                $i++;
                                                if($con <= 3){
                                                    $con++;
                                            ?>
                                                <td style="width:10%;">
                                                    <div class="control-group">
                                                        <label style="text-align:center;"><b><?=$atr['nombre']?>: <?=$atr['atributo']?></b></label>
                                                        <div style="text-align:center;"><input type="checkbox" name="disp[]" id="atr<?=$atr['ida']?>" value="<?=$atr['ida']?>"></div>
                                                        <label style="text-align:center;margin-top:5px;">Precio</label>
                                                        <div style="text-align: center"><input style="width: 50%;text-align: center;" type="text" name="precio<?=$atr['ida']?>" placeholder="Precio" value="" />
                                                        <label style="text-align:center;margin-top:5px;">Precio Extra</label>
                                                        <div style="text-align: center"><input style="width: 50%;text-align: center;" type="text" name="precioE<?=$atr['ida']?>" placeholder="Precio Extra" value="" />
                                                        <input class="input-file uniform_on" id="imagenAtr<?=$atr['ida']?>" name="imagenAtr<?=$atr['ida']?>" type="file">
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                            <?php
                                                }else{
                                                    $con=1;
                                            ?>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="control-group">
                                                        <label style="text-align:center;"><b><?=$atr['nombre']?>: <?=$atr['atributo']?></b></label>
                                                        <div style="text-align:center;"><input type="checkbox" name="disp[]" id="atr<?=$atr['ida']?>" value="<?=$atr['ida']?>"></div>
                                                        <label style="text-align:center;margin-top:5px;">Precio</label>
                                                        <input  style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precio<?=$atr['ida']?>" placeholder="Precio" value="" />
                                                        <label style="text-align:center;margin-top:5px;">Precio Extra</label>
                                                        <div style="text-align: center"><input style="width: 50%;text-align: center;" type="text" name="precioE<?=$atr['ida']?>" placeholder="Precio Extra" value="" />
                                                        <div style="text-align: center"><input class="input-file uniform_on" id="imagenAtr<?=$atr['ida']?>" name="imagenAtr<?=$atr['ida']?>" type="file">
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                            <?php
                                                }
                                            }
                                            ?>
                                            </tr>
                                        </table>
                                        <label class="control-label" for="nfentrada">Requerir Fecha de Entrada</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" name="nfentrada" id="nfentrada" value="0">
                                              Marcar para requerir fecha de entrada
                                            </label>
                                          </div>
                                        </div> 
                                        <div class="control-group">
                                          <label class="control-label" for="nfsalida">Requerir Fecha de Salida</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" name="nfsalida" id="nfsalida" value="0">
                                              Marcar para requerir fecha de salida
                                            </label>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="NCatAtriF">Fechas Asociadas con Caegoría de Atributos: </label>
                                          <div class="controls">
                                                <select id="NCatAtriF" name="NCatAtriF" class="chzn-select span4">
                                                    <option value="0">Selecciona</option>
                                                    <?php
                                                        foreach ($listadoCatAtr AS $listado)
                                                        {
                                                            ?>
                                                                <option value="<?=$listado['id']?>"><?=$listado['atributo']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span style="color: green; font-size: 0.70rem;">Funcionamiento unido a Fecha de Entrada/Salida.</span><br>
                                              </div>
                                        </div>
                                        <div class="control-group">
                                                <label class="control-label" for="CatAtriF">Nº días máximo: </label>
                                                <div class="controls">
                                                      <input type="text" class="span6" id="maximoDias" name="maximoDias" value="0"  placeholder="Días máximos permitidos">
                                                      <span style="color: green; font-size: 0.70rem;">0 para días ilimitados</span><br>
                                                    </div>
                                        </div>                                                
                                                                                
                                        <input type="hidden" name="catributos" value="<?=$i?>" />
                                        <button type="submit" class="btn btn-primary" onclick="return (if ($('#passwordc').val() != $('#rpasswordc').val()) { false; } else { true; });">Subir</button>
                                        </fieldset>
                                    </div>
                                    <div id="10" style="display:none;">
                                        <fieldset>
                                            <legend>F. Pago - Financiación</legend>
                                            <div class="control-group">
                                          <label class="control-label" for="tipo">Pago mensual Paypal</label>
                                          <div class="controls">
                                            <select id="tipo" name="paypalm" class="chzn-select span4" required>
                                                <option value="0">No</option>
                                                <option value="1">Si</option>
                                            </select>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                              <label class="control-label" for="domicim">Pago mensual Domiciliación</label>
                                              <div class="controls">
                                                <select id="domicim" name="domicim" class="chzn-select span4" required>
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                              </div>
                                            </div>
                                            <script>
                                                function abrirCuota(){
                                                    if(document.getElementById("aplazame").value == 0){
                                                        document.getElementById("vcuota").style.display='none';
                                                    }else{
                                                        document.getElementById("vcuota").style.display='block';
                                                    }
                                                }
                                            </script>
                                        <div class="control-group">
                                              <label class="control-label" for="aplazame">Pago Aplazame</label>
                                              <div class="controls">
                                                  <select id="aplazame" name="aplazame" class="chzn-select span4" required onchange="abrirCuota()">
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                              </div>
                                            </div>
                                            <div id="vcuota" class="control-group" style="display: none; max-width: 60%;" >
                                              <label class="control-label" for="caplazame1">Cuota Inicial Aplazame</label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="caplazame1" name="caplazame1" placeholder="Cuota inicial Aplazame">
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                              </div><br>
                                              <label class="control-label" for="caplazame">Cuota Aplazame</label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="caplazame" name="caplazame" placeholder="Cuota mensual Aplazame">
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                              </div>
                                            </div>
                                            <script>
                                                function abrirFDir(){
                                                    if(document.getElementById("fDirecta").value == 0){
                                                        document.getElementById("finanDir").style.display='none';
                                                    }else{
                                                        document.getElementById("finanDir").style.display='block';
                                                    }
                                                }
                                            </script>
                                        <div class="control-group">
                                              <label class="control-label" for="fDirecta">Financiación Directa</label>
                                              <div class="controls">
                                                <select id="fDirecta" name="fDirecta" class="chzn-select span4" required onchange="abrirFDir()">
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                                <p style="color: #09F; font-size: 0.70rem;">La cuota inicial será el precio del producto</p>
                                              </div>
                                            </div>
                                        <div id="finanDir" class="control-group" style="display: none;">
                                        <table>
                                            <tr>
                                        <?php 
                                            $i = 0;
                                            $cont = 0;
                                            $check = "";
                                            $precio = "";
                                            foreach ($elemento3 AS $atr){ 
                                                $i++;
                                                foreach ($elemento33 AS $atra){ 
                                                    if($atra['meses'] == $atr['id_c']){
                                                        $check = "checked";
                                                        $precio = $atra['cuota'];
                                                    }
                                                }
                                                if($cont <= 4){
                                                    $cont++;
                                                ?>
                                                    <td style="width:10%;">
                                                    <div class="control-group">
                                                        <label style="text-align:center;"><b><?=$atr['meses']?> meses + Inicial</b></label>
                                                        <div style="text-align:center;"><input type="checkbox" name="cuotas[]" id="cuo<?=$atr['id_c']?>" value="<?=$atr['id_c']?>" <?=$check?>></div>
                                                        <label style="text-align:center;margin-top:5px;">Precio</label>
                                                        <div><input style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precioC<?=$atr['id_c']?>" onchange="cambiar('precioC<?=$atr['id_c']?>')" placeholder="Precio" value="<?=$precio?>" /></div>
                                                    </div>
                                                    
                                                    </td>
                                                <?php
                                                    }else{
                                                        $cont=1;
                                                ?>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="control-group">
                                                            <label style="text-align:center;"><b><?=$atr['meses']?> meses + Inicial</b></label>
                                                            <div style="text-align:center;"><input type="checkbox" name="cuotas[]" id="cuo<?=$atr['id_c']?>" value="<?=$atr['id_c']?>" <?=$check?>></div>
                                                            <label style="text-align:center;margin-top:5px;">Precio</label>
                                                            <input  style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precioC<?=$atr['id_c']?>" placeholder="Precio" value="<?=$precio?>" />
                                                        </div>

                                                    </td>
                                                <?php
                                                }
                                                $check = "";
                                                $precio = "";
                                            }
                                            ?>
                                            </tr>
                                        </table>
                                        </div>
                                            <button type="submit" class="btn btn-primary" onclick="return (if ($('#passwordc').val() != $('#rpasswordc').val()) { false; } else { true; });">Subir</button>
                                            <button type="button" onclick="location.href = 'productos.php';" class="btn">Cancelar</button>
                                        </fieldset>
                                    </div>
                                        
                                    <?php
                                    foreach ($idiomas AS $idioma)
                                    {
                                        if($idioma['id'] == 2){
                                            ?>
                                                <div id="2" style="display:none;">
                                                  <fieldset>
                                                    <legend>Subir Nuevo Producto Inglés</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="nnombre">Nombre </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="nnombre" name="nombrein" placeholder="Nombre del producto">
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                      <div class="controls">
                                                        <textarea id="ncontenido" name="contenidoin" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 3){
                                            ?>
                                                <div id="3" style="display:none;">
                                                  <fieldset>
                                                    <legend>Subir Nuevo Producto Alemán</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="nnombre">Nombre </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="nnombre" name="nombrea" placeholder="Nombre del producto">
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                      <div class="controls">
                                                        <textarea id="ncontenido" name="contenidoa" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 4){
                                            ?>
                                                <div id="4">
                                                  <fieldset>
                                                    <legend>Subir Nuevo Producto Francés</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="nnombre">Nombre </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="nnombre" name="nombref" placeholder="Nombre del producto">
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                      <div class="controls">
                                                        <textarea id="ncontenido" name="contenidof" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 5){
                                            ?>
                                                <div id="5" style="display:none;">
                                                  <fieldset>
                                                    <legend>Subir Nuevo Producto Italiano</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="nnombre">Nombre </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="nnombre" name="nombreit" placeholder="Nombre del producto">
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                      <div class="controls">
                                                        <textarea id="ncontenido" name="contenidoit" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 6){
                                            ?>
                                                <div id="6" style="display:none;">
                                                  <fieldset>
                                                    <legend>Subir Nuevo Producto Portugués</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="nnombre">Nombre </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="nnombre" name="nombrep" placeholder="Nombre del producto">
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                      <div class="controls">
                                                        <textarea id="ncontenido" name="contenidop" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 7){
                                            ?>
                                                <div id="7" style="display:none;">
                                                  <fieldset>
                                                    <legend>Subir Nuevo Producto Catalán</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="nnombre">Nombre </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="nnombre" name="nombreca" placeholder="Nombre del producto">
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                      <div class="controls">
                                                        <textarea id="ncontenido" name="contenidoca" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                        
                                        if($idioma['id'] == 8){
                                            ?>
                                                <div id="8" style="display:none;">
                                                  <fieldset>
                                                    <legend>Subir Nuevo Producto Ruso</legend>
                                                    <div class="control-group">
                                                      <label class="control-label" for="nnombre">Nombre </label>
                                                      <div class="controls">
                                                        <input type="text" class="span6" id="nnombre" name="nombreru" placeholder="Nombre del producto">
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="ncontenido">Contenido</label>
                                                      <div class="controls">
                                                        <textarea id="ncontenido" name="contenidoru" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </div>
                                            <?php
                                        }
                                    
                                    }
                                ?>
                                    
								</div>
							</div>
						</div>
                    </div>
						
                     
                    
                        
                    </div>
                </div>
                   
				<?php require_once('blocks/pie.php'); ?>