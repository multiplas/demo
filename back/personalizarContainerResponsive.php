<?php require_once('blocks/cabecera.php'); ?>
                <script>
                jQuery(document).ready(function(){
                    jQuery('.add-file').click(function(){
                        jQuery('#addThemeFile').css('display', 'inherit');
                    });
                    jQuery('#fichero_usuario').change(function(){
                        jQuery('#addThemeFile').submit();
                    });
                    jQuery('.delete-file').click(function(){
                        jQuery('#delete-file-id').val($(this).attr("data-file"));
                        jQuery('#delete-image-name').val($(this).attr("data-file-name"));
                        jQuery('#deleteImagesFile').submit();
                    });
                });
                </script>
                <style>
                .fichero-list{
                    width: 60%;
                    padding-left: 25px;
                    line-height: 40px;
                    margin-bottom: 2px;
                    background: whitesmoke;
                    margin-left: 50px;
                }
                span.rol {
                    padding-right: 20px;
                    font-size: 13px;
                }
                .delete-file{
                    float: right;
                    padding-right: 30px;
                    font-weight: bolder;
                    color: red;
                    cursor: pointer;
                }
                .delete-title {
                    margin-top: 50px;
                    margin-bottom: 30px;
                }
                .add-file {
                    background-color: #0088cc;
                    background-image: none;
                    border: none;
                    border-radius: 2px;
                    margin-left: 50px;
                }
                #addThemeFile{
                    display: none;
                }
                .link-file img {
                    max-height: 60px;
                    padding: 5px 10px 5px 0px;
                }
                </style>
                <div class="span9" id="content">
                    
                    <!-- <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>MARCAS</h4>
                        <p>Esta sección se encarga de crear las marcas de cada producto.</p><p><strong>IMPORTANTE:</strong> Se debe relacionar las marcas con una sección del menú para que de acceso a dicha marca y así obtener los productos.</p>
                    </div> -->
                    
					<?php if ($resultaop) { ?>
						<div class="row-fluid">
							<div class="alert alert-success alert-dismissable">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php } ?>
                    <div class="row-fluid">
                        <h4>Imagenes para el Tema Container Responsive</h4>                        
                        <hr>
                    </div>
                     <div class="row-fluid">
                        <div id="edi" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Añadir una imagen</div>
                            </div>
                            <div style="padding-top:10px;" class="block-content collapse in">
                                <div class="span12">
                                    <?php
                                    if(isset($imagenesContainerResponsive) && !empty($imagenesContainerResponsive)){
                                        foreach($imagenesContainerResponsive as $file){
                                            $nombreHumano = '';
                                            if($file['posicion'] == "bannerCabecera") $nombreHumano = 'Banner para Cabecera';
                                            if($file['posicion'] == "imagenLateral1") $nombreHumano = 'Imagen lateral Derecha Superior';
                                            if($file['posicion'] == "imagenLateral2") $nombreHumano = 'Imagen lateral Derecha Medio';
                                            if($file['posicion'] == "imagenLateral3") $nombreHumano = 'Imagen lateral Derecha Inferior';
                                            ?>
                                            <div class="fichero-list">                                            
                                               <span style="margin-right: 100px;">Posición: <?=$nombreHumano?> </span> <a class="link-file" href="../ficheros/<?=$file['valor']?>" target="_blank" ><img src="../ficheros/<?=$file['valor']?>" alt=""> <?=$file['nombre']?></a><span class="delete-file" title="Eliminar archivo" data-file-name="<?=$file['valor']?>" data-file="<?=$file['id']?>">X</span>
                                            </div>
                                            <?php
                                        }
                                    }
                                     ?>                                    
                                    <form enctype="multipart/form-data" id="addThemeFile" class="form-horizontal"  action="personalizarContainerResponsive.php?accion=addThemeImage" method="POST">
                                        <fieldset>
                                            <div class="control-group">
                                                <label class="control-label" for="posicion">Posición de la Imagen</label>
                                                <select name="posicion" id="posicion">
                                                    <option value="bannerCabecera" <?php if($imagenesContainerResponsive['posicion'] == 'bannerCabecera') echo 'selected' ?>>Banner para Cabecera</option>
                                                    <option value="imagenLateral1" <?php if($imagenesContainerResponsive['posicion'] == 'imagenLateral1') echo 'selected' ?>>Imagen lateral Derecha Superior</option>
                                                    <option value="imagenLateral2" <?php if($imagenesContainerResponsive['posicion'] == 'imagenLateral2') echo 'selected' ?>>Imagen lateral Derecha Medio</option>
                                                    <option value="imagenLateral3" <?php if($imagenesContainerResponsive['posicion'] == 'imagenLateral3') echo 'selected' ?>>Imagen lateral Derecha Inferior</option>
                                                </select>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="fichero_usuario">Añadir Imagen</label>
                                                <input class="input-file uniform_on" id="fichero_usuario" name="fichero_usuario" type="file" />
                                            </div>
                                        </fieldset>
                                    </form>
                                    <button type="button" class="btn btn-primary add-file" title="Añadir archivo">+</button>
                                    <form enctype="multipart/form-data" id="deleteImagesFile" class="form-horizontal"  action="personalizarContainerResponsive.php?accion=deleteThemeImage" method="POST">
                                        <input type="hidden" id="delete-image-name" name="delete-image-name" value=""/>
                                        <input type="hidden" id="delete-file-id" name="delete-file-id" value=""/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!-- block -->    
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>