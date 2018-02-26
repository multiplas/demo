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

        <script type="text/javascript">
        jQuery(document).ready(function(){
            countChar();
            jQuery("#p_footer_copyright_text").keyup(function (){
                countChar();
            });
        });
        function countChar() {
            var len = jQuery('#p_footer_copyright_text').val().length;
            if (len > 600) {
                jQuery('#p_footer_copyright_text').val(jQuery('#p_footer_copyright_text').val().substring(0, 600));
            } else {
            jQuery('.caracteres_actuales').text(600 - len);
            }
        }
        </script>
        
        
            <div class="row-fluid">
            <div id="edi" class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Activa Imagen portada</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form action="imagen_portada.php?imgportada=true" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <fieldset>
                                <div>
                                    <legend>Imagen portada</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="actanu">Activo</label>
                                            <div class="controls">
                                                <select id="p_footer_copyright" name="valor"  class="span6">
                                                    <?php if ($elemento['id'] == "0"): ?>
                                                        <option value="0" <?=$elemento['valor'] == "0" ? 'selected' : ''?>>Desactivado</option>     
                                                        <option value="1" <?=$elemento['valor'] == "1" ? 'selected' : ''?>>Activado</option>  
                                                    <?php endif; ?>
                                                </select><br><br>
                                            </div>
                                            <?php if($elemento['valor'] == "1"): ?>
                                            <div class="control-group">
                                            <label class="control-label" for="imagenHomePortada">Imagen</label>
                                            <div class="controls">
                                                    <input class="input-file uniform_on" type="file" name="imagenHomePortada" />
                                                    <?php
                                                    if ($elemento['imagen'] != null)
                                                    {
                                                            ?>
                                                            <a style="color: #09F; font-size: 0.70rem;" href="../imagenes/<?=$elemento['imagen']?>" target="_blank">ver imagen actual</a>
                                                            <!-- <a style="color:red;  font-size: 0.70rem;" href="?eliminarpI=<?=$elemento['id']?>" onclick="return confirm('Desea eliminar la página \'\'#<?=$elemento['id']?> - <?=$elemento['titulo']?>\'\' de la web?');">eliminar</a> -->
                                                            <?php
                                                    }
                                                    ?>
                                            </div>
                                        </div>
                                            <label class="control-label" for="titulo">Titulo: </label>
                                            <div class="controls">
                                                <input type="text" name="nombre" value="<?=$elemento['nombre']?>">
                                            </div>                                            
                                            <label class="control-label" for="p_footer_copyright_text">Contenido: </label>
                                            <div class="controls">
                                                <textarea id="p_footer_copyright_text" name="contenido" class="input-xlarge" maxlength="600" style="width: 810px; height: 200px"><?php echo $elemento['contenido'] ?></textarea>
                                            </div>
                                            <div class="controls">
                                                <span>Longitud máxima: 600 caracteres - Caracteres restantes: </span>
                                                <span class="caracteres_actuales">0</span>
                                            </div>
                                            <label class="control-label" for="url">URL: </label>
                                            <div class="controls">
                                                <input type="text" name="url" value="<?=$elemento['url']?>">
                                            </div> 
                                            <div class="control-group">
                                                <label class="control-label" for="destino">Destino Url</label>
                                                <div class="controls">
                                                    <select id="destino" name="destino" class="">
                                                        <option value="0" <?=($elemento['destino'] == 0 ? ' selected' : '')?>>Nueva ventana</option>
                                                        <option value="1" <?=($elemento['destino'] == 1 ? ' selected' : '')?>>Misma ventana</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <?php else: ?>
                                                <input type="hidden" name="nombre" value="<?=$elemento['nombre']?>">
                                                <input type="hidden" name="contenido" value="<?=$elemento['contenido']?>">
                                                <input type="hidden" name="url" value="<?=$elemento['url']?>">
                                                <input type="hidden" name="destino" value="<?=$elemento['destino']?>">
                                            <?php endif; ?>

                                        </div>                              
                                    <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('blocks/pie.php'); ?>