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
                    <div class="muted pull-left">Activar footer copyright barra</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form action="footer_copyright_bar.php?cambcopy=true" method="post" class="form-horizontal">
                            <fieldset>
                                <div>
                                    <legend>Copyright Barra</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="actanu">Activo</label>
                                            <div class="controls">
                                                <select id="p_footer_copyright" name="p_footer_copyright"  class="span6">
                                                    <?php if ($elemento['id'] == "0"): ?>
                                                        <option value="0" <?=$elemento['valor'] == "0" ? 'selected' : ''?>>Desactivado</option>     
                                                        <option value="1" <?=$elemento['valor'] == "1" ? 'selected' : ''?>>Activado</option>  
                                                    <?php endif; ?>
                                                </select><br><br>
                                            </div>
                                            <?php if($elemento['valor'] == "1"): ?>
                                            <label class="control-label" for="p_footer_copyright_text">HTML Copyright</label>
                                            <div class="controls">
                                                <textarea id="p_footer_copyright_text" name="p_footer_copyright_text" class="input-xlarge" maxlength="600" style="width: 810px; height: 200px"><?php echo $elemento['texto'] ?></textarea>
                                            </div>
                                            <div class="controls">
                                                <span>Longitud máxima: 600 caracteres - Caracteres restantes: </span>
                                                <span class="caracteres_actuales">0</span>
                                            </div>
                                            <div class="controls">
                                                Color de la Barra: <input style="width: 50px;" type="color" name="color_barra" id="colorBarPiker" value="<?php echo $elemento['color_barra'] ?>">
                                            </div>
                                            <div class="controls">
                                                Color del texto: <input style="width: 50px;" type="color" name="color_texto" id="colorTextPiker" value="<?php echo $elemento['color_texto'] ?>">
                                            </div>
                                            <?php else: ?>
                                                <input type="hidden" name="p_footer_copyright_text" value="<?php echo $elemento['texto'] ?>"/>
                                                <input type="hidden" name="color_barra" value="<?php echo $elemento['color_barra'] ?>"/>
                                                <input type="hidden" name="color_texto" value="<?php echo $elemento['color_texto'] ?>"/>
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