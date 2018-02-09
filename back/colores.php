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
    <script>
        function cambiarpestana(valor){
                            
                            if(valor == '1'){
                                document.getElementById("1").style.display='block';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p1").classList.add('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active');
                                document.getElementById("p6").classList.remove('active');
                                document.getElementById("p7").classList.remove('active');
                            }else if(valor == '2'){
                                document.getElementById("2").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.add('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active');
                                document.getElementById("p6").classList.remove('active');
                                document.getElementById("p7").classList.remove('active');
                            }else if(valor == '3'){
                                document.getElementById("3").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.add('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active');
                                document.getElementById("p6").classList.remove('active');
                                document.getElementById("p7").classList.remove('active');
                            }else if(valor == '4'){
                                document.getElementById("4").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.add('active');
                                document.getElementById("p5").classList.remove('active');
                                document.getElementById("p6").classList.remove('active');
                                document.getElementById("p7").classList.remove('active');
                            }
                            else if(valor == '5'){
                                document.getElementById("5").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("6").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.add('active'); 
                                document.getElementById("p6").classList.remove('active');
                                document.getElementById("p7").classList.remove('active');
                            }
                            else if(valor == '6'){
                                document.getElementById("6").style.display='block';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("7").style.display='none';
                                document.getElementById("p1").classList.remove('active'); 
                                document.getElementById("p2").classList.remove('active'); 
                                document.getElementById("p3").classList.remove('active'); 
                                document.getElementById("p4").classList.remove('active'); 
                                document.getElementById("p5").classList.remove('active'); 
                                document.getElementById("p6").classList.add('active'); 
                                document.getElementById("p7").classList.remove('active');
                            }
                            else if(valor == '7'){
                                document.getElementById("6").style.display='none';
                                document.getElementById("1").style.display='none';
                                document.getElementById("2").style.display='none';
                                document.getElementById("3").style.display='none';
                                document.getElementById("4").style.display='none';
                                document.getElementById("5").style.display='none';
                                document.getElementById("7").style.display='block';
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
                <div class="muted pull-left">Editar los colores de la Web</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                    <ul class="nav nav-tabs nav-justified">
                        <li id="p1" class="active"><a onclick="javascript:cambiarpestana('1')" href="#">Colores principales</a></li>
                        <li id="p7"><a onclick="javascript:cambiarpestana('7')" href="#">Botones</a></li>
                        <li id="p6"><a onclick="javascript:cambiarpestana('6')" href="#">Menú y Pie</a></li>
                        <li id="p2"><a href="#" onclick="javascript:cambiarpestana('2')">Colores responsive</a></li>
                        <li id="p3"><a href="#" onclick="javascript:cambiarpestana('3')">Colores de inicio y formulario</a></li>
                        <li id="p4"><a href="#" onclick="javascript:cambiarpestana('4')">Colores producto y productos</a></li>
                        <li id="p5"><a href="#" onclick="javascript:cambiarpestana('5')">Colores galería productos</a></li>
                    </ul>

                    <form action="colores.php?colorear=true" method="post" class="form-horizontal">
                        <fieldset>
                            <div id="1">
                                <legend>Colores principales</legend>
                                <div class="control-group">
                                    <label class="control-label" for="empresa">Color redes sociales cabecera </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="empresa" name="colorlogotop" value="<?=$elemento['colorlogotop']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="empresa">Color redes sociales pie </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="empresa" name="colorlogobot" value="<?=$elemento['colorlogobot']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="empresa">Color galería </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="empresa" name="colorgaleriamain" value="<?=$elemento['colorgaleriamain']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="telefono">Color barra menú posicion </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="telefono" name="colorposbarmain" value="<?=$elemento['colorposbarmain']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="telefono2">Color enlaces principal </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="telefono2" name="colorenlacemain" value="<?=$elemento['colorenlacemain']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="fax">Colores texto principal </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="fax" name="colortextomain" value="<?=$elemento['colortextomain']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="horario">Color borde productos principal </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="horario" name="colorbordeprodsmain" value="<?=$elemento['colorbordeprodsmain']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
																	<label class="control-label" for="horario">Color texto productos principal </label>
																	<div class="controls">
																			<input type="text" class="form-control colorpicker" id="horario" name="colortextoprodsmain" value="<?=$elemento['colortextoprodsmain']?>" required>
																			<span style="color: red; font-size: 0.70rem;">Requerido</span>
																	</div>
																</div>
																<div class="control-group">
                                    <label class="control-label" for="horario">Color destacado (aplicable para bordes, inputs...) </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="destacado" name="colordestacado" value="<?=$elemento['colordestacado']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
														<button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                            </div>
                            <div id="2" style="display:none;">
                                <legend>Colores responsive</legend>

                                <div class="control-group">
                                    <label class="control-label" for="direccion">Color enlace submenu</label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="direccion" name="enlacesubmenuresp" value="<?=$elemento['enlacesubmenuresp']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="localidad">Color borde submenu</label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="localidad" name="bordesubmenuhoverresp" value="<?=$elemento['bordesubmenuhoverresp']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="provincia">Color fondo submenu con foco</label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="provincia" name="fondosubmenuhoverresp" value="<?=$elemento['fondosubmenuhoverresp']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="pais">Color general</label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="pais" name="colorgeneralresp" value="<?=$elemento['colorgeneralresp']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="pais">Color general productos</label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="pais" name="colorgeneralprodsresp" value="<?=$elemento['colorgeneralprodsresp']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                            </div>
                            <div id="3" style="display:none;">
                                <legend>Colores de inicio y formulario</legend>

                                <div class="control-group">
                                    <label class="control-label" for="facebook">Color general de Inicio </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="facebook" name="colorgeneralinicio" value="<?=$elemento['colorgeneralinicio']?>" requiredç>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>

                                <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                            </div>
                            <div id="4" style="display:none;">
                                <legend>Colores producto y productos</legend>

                                <div class="control-group">
                                    <label class="control-label" for="portesgratis">Color precio producto </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="portesgratis" name="colorprecioprod" value="<?=$elemento['colorprecioprod']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="contrareembolso">Color texto producto </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="contrareembolso" name="colortextoprod" value="<?=$elemento['colortextoprod']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="cuenta">Color precio productos </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="cuenta" name="colorprecioprods" value="<?=$elemento['colorprecioprods']?>">
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="paypal">Color texto ordenar productos </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="paypal" name="colortextoordenarprods" value="<?=$elemento['colortextoordenarprods']?>">
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="msgtop">Color texto productos </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="msgtop" name="colortextoprods" value="<?=$elemento['colortextoprods']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                <!--
										<div class="control-group">
                                            <h5 style="margin: 3% 0px 0px 0px; padding: 0px 10%;">Personalización de la Web</h5>
										</div>
                                        
                                        
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                        -->
                            </div>

                            <div id="5" style="display:none;">
                                <legend>Colores galería productos</legend>

                                <div class="control-group">
                                    <label class="control-label" for="portesgratis">Color fondo Oferta </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="oferta_fondo" name="oferta_fondo" value="<?=$elemento2['oferta_fondo']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="venta_fondo">Color fondo Venta </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="venta_fondo" name="venta_fondo" value="<?=$elemento2['venta_fondo']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="alquiler_fondo">Color fondo Alquiler </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="alquiler_fondo" name="alquiler_fondo" value="<?=$elemento2['alquiler_fondo']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="agotado_fondo">Color fondo Agotado </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="agotado_fondo" name="agotado_fondo" value="<?=$elemento2['agotado_fondo']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="contrareembolso">Color texto oferta </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="contrareembolso" name="oferta_letra" value="<?=$elemento2['oferta_letra']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="cuenta">Color precio </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="cuenta" name="precio_color" value="<?=$elemento2['precio_color']?>">
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="paypal">Color nombre </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="paypal" name="nombre_color" value="<?=$elemento2['nombre_color']?>">
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="msgtop">Color nombre cursor </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="msgtop" name="nombre_color_hover" value="<?=$elemento2['nombre_color_hover']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>

                                <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                            </div>

                            <div id="6" style="display:none;">
                                <legend>Colores Menú y Pie</legend>

                                <div class="control-group">
                                    <label class="control-label" for="portesgratis">Color barra superior </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="barra_sup" name="barra_sup" value="<?=$elemento2['barra_sup']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="contrareembolso">Color fondo menú </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="menu" name="menu" value="<?=$elemento2['menu']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="cuenta">Color letras menú </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="menu_letra" name="menu_letra" value="<?=$elemento2['menu_letra']?>">
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="paypal">Color letras menú señaladas ratón </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="menu_letra_hover" name="menu_letra_hover" value="<?=$elemento2['menu_letra_hover']?>">
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="msgtop">Color pie </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="pie" name="pie" value="<?=$elemento2['pie']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="msgtop">Color pie letras </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="pie_letras" name="pie_letras" value="<?=$elemento2['pie_letras']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                            </div>

                            <div id="7" style="display:none;">
                                <legend>Botones</legend>

                                <div class="control-group">
                                    <label class="control-label" for="cif">Color botones principal </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="cif" name="colorbotonesmain" value="<?=$elemento['colorbotonesmain']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="email">Color botones principal con foco </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="email" name="colorbotoneshovermain" value="<?=$elemento['colorbotoneshovermain']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="google">Color boton formulario </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="google" name="colorbotonform" value="<?=$elemento['colorbotonform']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="twitter">Color boton formulario con foco </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="twitter" name="colorbotonhoverform" value="<?=$elemento['colorbotonhoverform']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="youtube">Color texto boton </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="youtube" name="colortextobotonform" value="<?=$elemento['colortextobotonform']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="msgtop">Color fondo botones </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="msgtop" name="boton_fondo" value="<?=$elemento2['boton_fondo']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="msgtop">Color texto botones </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="msgtop" name="boton_letras" value="<?=$elemento2['boton_letras']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="msgtop">Color fondo botones curso </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="msgtop" name="boton_fondo_hover" value="<?=$elemento2['boton_fondo_hover']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="msgtop">Color texto botones cursor </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="msgtop" name="boton_letras_hover" value="<?=$elemento2['boton_letras_hover']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="AnaCestaB">Color botón Añadir a la cesta </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="AnaCestaB" name="AnaCestaB" value="<?=$elemento['AnaCestaB']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="AnaCestaT">Color texto Añadir a la cesta </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="AnaCestaT" name="AnaCestaT" value="<?=$elemento['AnaCestaT']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="AnaCestaBH">Color botón con foco Añadir a la cesta </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="AnaCestaBH" name="AnaCestaBH" value="<?=$elemento['AnaCestaBH']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="AnaCestaTH">Color texto con foco Añadir a la cesta </label>
                                    <div class="controls">
                                        <input type="text" class="form-control colorpicker" id="AnaCestaTH" name="AnaCestaTH" value="<?=$elemento['AnaCestaTH']?>" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
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