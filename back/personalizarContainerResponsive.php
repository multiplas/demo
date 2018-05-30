<?php require_once('blocks/cabecera.php'); ?>
                <script>
                jQuery(document).ready(function(){
                    jQuery('#formImageStatus').change(function(){
                        jQuery('#formImageStatus').submit();
                    });
                    jQuery('.add-file').click(function(){
                        jQuery('#addMarcasFile').css('display', 'inherit');
                    });
                    jQuery('#fichero_usuario').change(function(){
                        jQuery('#addMarcasFile').submit();
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
                #addMarcasFile{
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
                        <h4>Mostrar Imagenes de Banco en Carrito</h4>
                        <form id="formImageStatus" action="imagenes_carrito.php?accion=updateImagesStatus" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <select name="imageStatus" id="imageStatus">
                                <option value="0" <?php if($imagenesCarritoStatus['valor'] == '0') echo 'selected' ?>>Desactivado</option>
                                <option value="1" <?php if($imagenesCarritoStatus['valor'] == '1') echo 'selected' ?>>Activado</option>
                            </select>
                        </form>
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
                                    if(isset($imagenesCarrito) && !empty($imagenesCarrito)){
                                        foreach($imagenesCarrito as $file){
                                            ?>
                                            <div class="fichero-list">                                            
                                               <a class="link-file" href="../ficheros/<?=$file['valor']?>" target="_blank" ><img src="../ficheros/<?=$file['valor']?>" alt=""> <?=$file['nombre']?></a><span class="delete-file" title="Eliminar archivo" data-file-name="<?=$file['valor']?>" data-file="<?=$file['id']?>">X</span>
                                            </div>
                                            <?php
                                        }
                                    }
                                     ?>                                    
                                    <form enctype="multipart/form-data" id="addMarcasFile" class="form-horizontal"  action="imagenes_carrito.php?accion=addCartImage" method="POST">
                                        <fieldset>
                                            <div class="control-group">
                                                <label class="control-label" for="fichero_usuario">Añadir Imagen</label>
                                                <input class="input-file uniform_on" id="fichero_usuario" name="fichero_usuario" type="file" />
                                            </div>
                                        </fieldset>
                                    </form>
                                    <button type="button" class="btn btn-primary add-file" title="Añadir archivo">+</button>
                                    <form enctype="multipart/form-data" id="deleteImagesFile" class="form-horizontal"  action="imagenes_carrito.php?accion=deleteImagesFile" method="POST">
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