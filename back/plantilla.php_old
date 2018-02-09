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
                    
                    <style>
                        #modal {
                            width:100%; /*Toma el 100% del ancho de la página*/
                            height:100%; /*Toma el 100% del alto de la página*/
                            position:fixed; /*Con este código hacemos que el contenedor se mantenga en la pantalla y para que tome las dimensiones del body y no de la entrada*/
                            background-color: rgba(1, 1, 1, 0.9); /*Color de fondo, incluye opacidad del 90%*/
                            vertical-align: middle;
                            top:0; /*Position superior*/
                            left:0; /*Posición lateral*/
                            z-index:99999999; /*Evitamos que algún elemento del blog sobreponga la ventana modal*/
                        }
                        #contenido-interno { 
                            margin:2% auto; /*Separación arriba y centrado*/
                            vertical-align: middle;
                            font-size:12px; /*Tamaño de la fuente*/
                            height:auto; /*Ancho del contenedor*/
                            width:auto;
                            text-align:center; /*Alineación del texto*/
                            color:#222; /*Color del texto*/
                            background:rgba(255, 255, 255, 0); /*Color de fondo*/
                        }
                        #myImg{
                            width: auto;
                            height: 635px;
                            border-radius: 25px;
                            -webkit-border-radius: 25px;
                            -moz-border-radius: 25px;
                        }
                    </style>
                    
                    <script type="text/javascript">
                        function mostrareldiv(url) {
                        document.getElementById("modal").style.display = "block" ; // permite asignar display:block al elemento #modal
                        document.getElementById("myImg").src = url;
                        }

                        function ocultareldiv() {
                        document.getElementById("modal").style.display = "none" ; // permite ocultar el contenedor al hacer clic en alguna parte de éste mediante display:none en el elemento #modal
                        }
                    </script>
                    
                    <div onclick="ocultareldiv()" id="modal" style="display:none">
                        <div id="contenido-interno">
                        <img id="myImg" src="" >
                    </div></div>
                    
                     <div class="row-fluid">
						<div id="edi" class="block">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Editar línea de estilo</div>
							</div>
							<div class="block-content collapse in">
                                <form action="plantilla.php?configurarplantilla=true" method="post" class="form-horizontal" enctype="multipart/form-data">
								<div class="span12"> 
									  <fieldset>
                                                                              <div>
                                        <legend>Líneas de estilo para la web</legend>
                                        
										<div class="control-group">
                                          <label class="control-label" for="inicio">Inicio web</label>
                                          <div class="controls">
                                                <select id="inicio" name="inicio" class="">
                                                    <?php foreach ($inicios AS $inicial){ ?>
                                                        <option value="<?=$inicial['id']?>" <?=($elemento['inicio'] == $inicial['id'] ? ' selected' : '')?>><?=$inicial['nombre']?></option>
                                                    <?php } ?>
                                                    
                                                </select><br>
                                          </div><br>
                                          <div class="control-group">
                                          <label class="control-label" for="inicio">Efecto</label>
                                          <div class="controls">
                                                <select id="efecto" name="efecto" class="">
                                                    <option value="imghvr-fade" <?=($elemento['efecto'] == 'imghvr-fade' ? ' selected' : '')?>>imghvr-fade</option>
                                                    <option value="imghvr-push-up" <?=($elemento['efecto'] == 'imghvr-push-up' ? ' selected' : '')?>>imghvr-push-up</option>
                                                    <option value="imghvr-push-down" <?=($elemento['efecto'] == 'imghvr-push-down' ? ' selected' : '')?>>imghvr-push-down</option>
                                                    <option value="imghvr-push-left" <?=($elemento['efecto'] == 'imghvr-push-left' ? ' selected' : '')?>>imghvr-push-left</option>
                                                    <option value="imghvr-push-right" <?=($elemento['efecto'] == 'imghvr-push-right' ? ' selected' : '')?>>imghvr-push-right</option>
                                                    <option value="imghvr-slide-up" <?=($elemento['efecto'] == 'imghvr-slide-up' ? ' selected' : '')?>>imghvr-slide-up</option>
                                                    <option value="imghvr-slide-down" <?=($elemento['efecto'] == 'imghvr-slide-down' ? ' selected' : '')?>>imghvr-slide-down</option>
                                                    <option value="imghvr-slide-left" <?=($elemento['efecto'] == 'imghvr-slide-left' ? ' selected' : '')?>>imghvr-slide-left</option>
                                                    <option value="imghvr-slide-right" <?=($elemento['efecto'] == 'imghvr-slide-right' ? ' selected' : '')?>>imghvr-slide-right</option>
                                                    <option value="imghvr-reveal-up" <?=($elemento['efecto'] == 'imghvr-reveal-up' ? ' selected' : '')?>>imghvr-reveal-up</option>
                                                    <option value="imghvr-reveal-down" <?=($elemento['efecto'] == 'imghvr-reveal-down' ? ' selected' : '')?>>imghvr-reveal-down</option>
                                                    <option value="imghvr-reveal-left" <?=($elemento['efecto'] == 'imghvr-reveal-left' ? ' selected' : '')?>>imghvr-reveal-left</option>
                                                    <option value="imghvr-reveal-right" <?=($elemento['efecto'] == 'imghvr-reveal-right' ? ' selected' : '')?>>imghvr-reveal-right</option>
                                                    <option value="imghvr-hinge-up" <?=($elemento['efecto'] == 'imghvr-hinge-up' ? ' selected' : '')?>>imghvr-hinge-up</option>
                                                    <option value="imghvr-hinge-down" <?=($elemento['efecto'] == 'imghvr-hinge-down' ? ' selected' : '')?>>imghvr-hinge-down</option>
                                                    <option value="imghvr-hinge-left" <?=($elemento['efecto'] == 'imghvr-hinge-left' ? ' selected' : '')?>>imghvr-hinge-left</option>
                                                    <option value="imghvr-hinge-right" <?=($elemento['efecto'] == 'imghvr-hinge-right' ? ' selected' : '')?>>imghvr-hinge-right</option>
                                                    <option value="imghvr-flip-horiz" <?=($elemento['efecto'] == 'imghvr-flip-horiz' ? ' selected' : '')?>>imghvr-flip-horiz</option>
                                                    <option value="imghvr-flip-vert" <?=($elemento['efecto'] == 'imghvr-flip-vert' ? ' selected' : '')?>>imghvr-flip-vert</option>
                                                    <option value="imghvr-flip-diag-1" <?=($elemento['efecto'] == 'imghvr-flip-diag-1' ? ' selected' : '')?>>imghvr-flip-diag-1</option>
                                                    <option value="imghvr-flip-diag-2" <?=($elemento['efecto'] == 'imghvr-flip-diag-2' ? ' selected' : '')?>>imghvr-flip-diag-2</option>
                                                    <option value="imghvr-shutter-out-horiz" <?=($elemento['efecto'] == 'imghvr-shutter-out-horiz' ? ' selected' : '')?>>imghvr-shutter-out-horiz</option>
                                                    <option value="imghvr-shutter-out-vert" <?=($elemento['efecto'] == 'imghvr-shutter-out-vert' ? ' selected' : '')?>>imghvr-shutter-out-vert</option>
                                                    <option value="imghvr-shutter-out-diag-1" <?=($elemento['efecto'] == 'imghvr-shutter-out-diag-1' ? ' selected' : '')?>>imghvr-shutter-out-diag-1</option>
                                                    <option value="imghvr-shutter-out-diag-2" <?=($elemento['efecto'] == 'imghvr-shutter-out-diag-2' ? ' selected' : '')?>>imghvr-shutter-out-diag-2</option>
                                                    <option value="imghvr-shutter-in-horiz" <?=($elemento['efecto'] == 'imghvr-shutter-in-horiz' ? ' selected' : '')?>>imghvr-shutter-in-horiz</option>
                                                    <option value="imghvr-shutter-in-vert" <?=($elemento['efecto'] == 'imghvr-shutter-in-vert' ? ' selected' : '')?>>imghvr-shutter-in-vert</option>
                                                    <option value="imghvr-shutter-in-out-horiz" <?=($elemento['efecto'] == 'imghvr-shutter-in-out-horiz' ? ' selected' : '')?>>imghvr-shutter-in-out-horiz</option>
                                                    <option value="imghvr-shutter-in-out-vert" <?=($elemento['efecto'] == 'imghvr-shutter-in-out-vert' ? ' selected' : '')?>>imghvr-shutter-in-out-vert</option>
                                                    <option value="imghvr-shutter-in-out-diag-1" <?=($elemento['efecto'] == 'imghvr-shutter-in-out-diag-1' ? ' selected' : '')?>>imghvr-shutter-in-out-diag-1</option>
                                                    <option value="imghvr-shutter-in-out-diag-2" <?=($elemento['efecto'] == 'imghvr-shutter-in-out-diag-2' ? ' selected' : '')?>>imghvr-shutter-in-out-diag-2</option>
                                                    <option value="imghvr-fold-up" <?=($elemento['efecto'] == 'imghvr-fold-up' ? ' selected' : '')?>>imghvr-fold-up</option>
                                                    <option value="imghvr-fold-down" <?=($elemento['efecto'] == 'imghvr-fold-down' ? ' selected' : '')?>>imghvr-fold-down</option>
                                                    <option value="imghvr-fold-left" <?=($elemento['efecto'] == 'imghvr-fold-left' ? ' selected' : '')?>>imghvr-fold-left</option>
                                                    <option value="imghvr-fold-right" <?=($elemento['efecto'] == 'imghvr-fold-right' ? ' selected' : '')?>>imghvr-fold-right</option>
                                                    <option value="imghvr-zoom-in" <?=($elemento['efecto'] == 'imghvr-zoom-in' ? ' selected' : '')?>>imghvr-zoom-in</option>
                                                    <option value="imghvr-zoom-out" <?=($elemento['efecto'] == 'imghvr-zoom-out' ? ' selected' : '')?>>imghvr-zoom-out</option>
                                                    <option value="imghvr-zoom-out-up" <?=($elemento['efecto'] == 'imghvr-zoom-out-up' ? ' selected' : '')?>>imghvr-zoom-out-up</option>
                                                    <option value="imghvr-zoom-out-down" <?=($elemento['efecto'] == 'imghvr-zoom-out-down' ? ' selected' : '')?>>imghvr-zoom-out-down</option>
                                                    <option value="imghvr-zoom-out-left" <?=($elemento['efecto'] == 'imghvr-zoom-out-left' ? ' selected' : '')?>>imghvr-zoom-out-left</option>
                                                    <option value="imghvr-zoom-out-right" <?=($elemento['efecto'] == 'imghvr-zoom-out-right' ? ' selected' : '')?>>imghvr-zoom-out-right</option>
                                                    <option value="imghvr-zoom-out-flip-horiz" <?=($elemento['efecto'] == 'imghvr-zoom-out-flip-horiz' ? ' selected' : '')?>>imghvr-zoom-out-flip-horiz</option>
                                                    <option value="imghvr-zoom-out-flip-vert" <?=($elemento['efecto'] == 'imghvr-zoom-out-flip-vert' ? ' selected' : '')?>>imghvr-zoom-out-flip-vert</option>
                                                    <option value="imghvr-blur" <?=($elemento['efecto'] == 'imghvr-blur' ? ' selected' : '')?>>imghvr-blur</option>
                                                </select> <span style="color: green; font-size: 0.70rem;">Solo plantilla Categorías. <a target="_blank" href="ejemplo/index.html">Ver Efectos.</a></span><br>
                                          </div><br>
                                          
                                          <div class="control-group">
										  <label class="control-label" for="CFefecto">Color de fondo efecto </label>
										  <div class="controls">
											<input type="text" class="form-control colorpicker" id="CFefecto" name="CFefecto" value="<?=$elemento['CFefecto']?>" required>
											<span style="color: green; font-size: 0.70rem;">Solo plantilla Categorías.</span>
										  </div>
										</div>
                                        <div class="control-group">
										  <label class="control-label" for="CLefecto">Color de letras efecto</label>
										  <div class="controls">
											<input type="text" class="form-control colorpicker" id="CLefecto" name="CLefecto" value="<?=$elemento['CLefecto']?>" required>
											<span style="color: green; font-size: 0.70rem;">Solo plantilla Categorías.</span>
										  </div>
										</div>
                                          
                                          
                                            <table style="margin-left:55px;">
                                                <tr>
                                                    <?php foreach ($inicios AS $inicial){ ?>
                                                        <td style="text-align:center;font-weight:bold;"><?=$inicial['nombre']?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php foreach ($inicios AS $inicial){ ?>
                                                        <td style="width:200px;text-align:center;"><img onclick="mostrareldiv('../temas/<?=$inicial['id']?>/presentacion/inicio.png')" style="width:150px;height:125px;" src="../temas/<?=$inicial['id']?>/presentacion/inicio.png" alt="<?=$inicial['nombre']?>" /></td>
                                                    <?php } ?>
                                                </tr>
                                            </table>
                                        </div>
                                            <hr>
                                        <div class="control-group">
                                          <label class="control-label" for="inicio">Galería de productos</label>
                                          <div class="controls">
                                                <select id="productos" name="productos" class="">
                                                    <?php foreach ($productos AS $inicial){ ?>
                                                        <option value="<?=$inicial['id']?>" <?=($elemento['gproductos'] == $inicial['id'] ? ' selected' : '')?>><?=$inicial['nombre']?></option>
                                                    <?php } ?>
                                                    
                                                </select><br>
                                          </div><br>
                                            <table style="margin-left:55px;">
                                                <tr>
                                                    <?php foreach ($productos AS $inicial){ ?>
                                                        <td style="text-align:center;font-weight:bold;"><?=$inicial['nombre']?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php foreach ($productos AS $inicial){ ?>
                                                        <td style="width:200px;text-align:center;"><img onclick="mostrareldiv('../temas/<?=$inicial['id']?>/presentacion/productos.png')" style="width:150px;height:125px;" src="../temas/<?=$inicial['id']?>/presentacion/productos.png" alt="<?=$inicial['nombre']?>" /></td>
                                                    <?php } ?>
                                                </tr>
                                            </table>
                                        </div>
                                            <hr>
                                        <div class="control-group">
                                          <label class="control-label" for="producto">Detalle producto web</label>
                                          <div class="controls">
                                                <select id="producto" name="producto" class="">
                                                    <?php foreach ($producto AS $inicial){ ?>
                                                        <option value="<?=$inicial['id']?>" <?=($elemento['productos'] == $inicial['id'] ? ' selected' : '')?>><?=$inicial['nombre']?></option>
                                                    <?php } ?>
                                                </select><br>
                                          </div><br>
                                            <table style="margin-left:55px;">
                                                <tr>
                                                    <?php foreach ($producto AS $inicial){ ?>
                                                        <td style="text-align:center;font-weight:bold;"><?=$inicial['nombre']?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php foreach ($producto AS $inicial){ ?>
                                                        <td style="width:200px;text-align:center;"><img onclick="mostrareldiv('../temas/<?=$inicial['id']?>/presentacion/producto.png')" style="width:150px;height:125px;" src="../temas/<?=$inicial['id']?>/presentacion/producto.png" alt="<?=$inicial['nombre']?>" /></td>
                                                    <?php } ?>
                                                </tr>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="control-group">
                                          <label class="control-label" for="cabecera">Cabecera</label>
                                          <div class="controls">
                                                <select id="cabecera" name="cabecera" class="">
                                                     <?php foreach ($cabecera AS $inicial){ ?>
                                                        <option value="<?=$inicial['id']?>" <?=($elemento['cabecera'] == $inicial['id'] ? ' selected' : '')?>><?=$inicial['nombre']?></option>
                                                    <?php } ?>
                                                </select><br>
                                          </div><br>
                                          <label class="control-label" for="cabecera">Fondo en cabecera</label>
                                          <div class="controls">
                                                <input class="input-file uniform_on" id="fcabecera" name="fcabecera" type="file">
                                                <?php
                                                if ($elemento['fcabecera'] != null)
                                                {
                                                   ?>
                                                    <a style="color: #09F; font-size: 0.70rem;" href="../source/<?=$elemento['fcabecera']?>" target="_blank">ver imagen actual</a>
                                                    <a style="color: red; font-size: 0.70rem;" href="plantilla.php?borrarFondo=true">Eliminar</a>
                                                   <?php
                                                }
                                                ?>
                                                <br><span style="color: #09F; font-size: 0.70rem;">Ancho recomendado: 1920px. El alto varía en función de la cabecera seleccionada. La imagen no se redimensiona, se usa la parte necesaria.</span>
                                          </div><br>
                                            <table style="margin-left:55px;">
                                                <tr>
                                                     <?php foreach ($cabecera AS $inicial){ ?>
                                                        <td style="text-align:center;font-weight:bold;"><?=$inicial['nombre']?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php foreach ($cabecera AS $inicial){ ?>
                                                        <td style="width:200px;text-align:center;"><img onclick="mostrareldiv('../temas/<?=$inicial['id']?>/presentacion/cabecera.png')" style="width:150px;height:125px;" src="../temas/<?=$inicial['id']?>/presentacion/cabecera.png" alt="<?=$inicial['nombre']?>" /></td>
                                                    <?php } ?>
                                                </tr>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="control-group">
                                          <label class="control-label" for="Pie">Pie</label>
                                          <div class="controls">
                                                <select id="pie" name="pie" class="">
                                                     <?php foreach ($pie AS $inicial){ ?>
                                                        <option value="<?=$inicial['id']?>" <?=($elemento['pie'] == $inicial['id'] ? ' selected' : '')?>><?=$inicial['nombre']?></option>
                                                    <?php } ?>
                                                    
                                                </select><br>
                                          </div><br>
                                            <table style="margin-left:55px;">
                                                <tr>
                                                    <?php foreach ($pie AS $inicial){ ?>
                                                        <td style="text-align:center;font-weight:bold;"><?=$inicial['nombre']?></td>
                                                    <?php } ?>
                                                </tr>
                                                <tr>
                                                    <?php foreach ($pie AS $inicial){ ?>
                                                        <td style="width:200px;text-align:center;"><img onclick="mostrareldiv('../temas/<?=$inicial['id']?>/presentacion/pie.png')" style="width:150px;height:125px;" src="../temas/<?=$inicial['id']?>/presentacion/pie.png" alt="<?=$inicial['nombre']?>" /></td>
                                                    <?php } ?>
                                                </tr>
                                            </table>
                                        </div>
                                        <hr>
                                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                    </div>
								</div>
                                </form>
							</div>
						</div>
                        <!-- block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>