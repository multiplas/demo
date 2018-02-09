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
        countChar2();
        jQuery("#p_bloque1_text").keyup(function (){
            countChar();
        });
        jQuery("#p_bloque2_text").keyup(function (){
            countChar();
        });
    });
    function countChar() {
        var len = jQuery('#p_bloque1_text').val().length;
        if (len > 3000) {
            jQuery('#p_bloque1_text').val(jQuery('#p_bloque1_text').val().substring(0, 3000));
        } else {
        jQuery('.caracteres_actuales').text(3000 - len);
        }
    }

    function countChar2() {
        var len = jQuery('#p_bloque2_text').val().length;
        if (len > 600) {
            jQuery('#p_bloque2_text').val(jQuery('#p_bloque2_text').val().substring(0, 3000));
        } else {
        jQuery('.caracteres_actuales2').text(3000 - len);
        }
    }
    </script>
    
    
        <div class="row-fluid">
        <div id="edi" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Activar bloques</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <form action="activar_bloques.php?cambbloq=true" method="post" class="form-horizontal">
                        <fieldset>
                            <div>
                                <legend>Activar Bloques</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="actanu">Activo</label>
                                        <div class="controls">
                                            <select id="p_bloque1" name="p_bloque1"  class="span6">
                                                <?php if ($elemento['id'] == "0"): ?>
                                                    <option value="0" <?=$elemento['valor'] == "0" ? 'selected' : ''?>>Desactivado</option>     
                                                    <option value="1" <?=$elemento['valor'] == "1" ? 'selected' : ''?>>Activado</option>  
                                                <?php endif; ?>
                                            </select><br><br>
                                        </div>
                                        <?php if($elemento['valor'] == "1"): ?>
                                        <label class="control-label" for="p_bloque1_text">HTML Bloque 1</label>
                                        <div class="controls">
                                            <textarea id="p_bloque1_text" name="p_bloque1_text" class="input-xlarge" maxlength="3000" style="width: 810px; height: 200px"><?php echo $elemento['bloque1_texto'] ?></textarea>
                                        </div>
                                        <div class="controls">
                                            <span>Longitud máxima: 3000 caracteres - Caracteres restantes: </span>
                                            <span class="caracteres_actuales">0</span>
                                        </div>
                                        <div class="controls">
                                            Color Bloque 1: <input style="width: 50px;" type="color" name="p_bloque1_color" id="colorBarPiker" value="<?php echo $elemento['p_bloque1_color'] ?>">
                                        </div>
                                        <div class="controls">
                                            Color Texto Bloque 1: <input style="width: 50px;" type="color" name="p_bloque1_color_texto" id="p_bloque1_color_texto" value="<?php echo $elemento['p_bloque1_color_texto'] ?>">
                                        </div>
                                    <label class="control-label" for="p_bloque2_text">HTML Bloque 2</label>
                                        <div class="controls">
                                            <textarea id="p_bloque2_text" name="p_bloque2_text" class="input-xlarge" maxlength="3000" style="width: 810px; height: 200px"><?php echo $elemento['bloque2_texto'] ?></textarea>
                                        </div>
                                        <div class="controls">
                                            <span>Longitud máxima: 3000 caracteres - Caracteres restantes: </span>
                                            <span class="caracteres_actuales2">0</span>
                                        </div>
                                        <div class="controls">
                                            Color Bloque 2: <input style="width: 50px;" type="color" name="p_bloque2_color" id="colorTextPiker" value="<?php echo $elemento['p_bloque2_color'] ?>">
                                        </div>
                                        <div class="controls">
                                            Color Texto Bloque 2: <input style="width: 50px;" type="color" name="p_bloque2_color_texto" id="p_bloque2_color_texto" value="<?php echo $elemento['p_bloque2_color_texto'] ?>">
                                        </div>
                                        <?php else: ?>
                                        <input type="hidden" name="p_bloque1_text" value="<?php echo $elemento['bloque1_texto'] ?>"/>
                                        <input type="hidden" name="p_bloque2_text" value="<?php echo $elemento['bloque2_texto'] ?>"/>
                                        <input type="hidden" name="p_bloque1_color" value="<?php echo $elemento['p_bloque1_color'] ?>"/>
                                        <input type="hidden" name="p_bloque2_color" value="<?php echo $elemento['p_bloque2_color'] ?>"/>
                                        <input type="hidden" name="p_bloque1_color_texto" value="<?php echo $elemento['p_bloque1_color_texto'] ?>"/>
                                        <input type="hidden" name="p_bloque2_color_texto" value="<?php echo $elemento['p_bloque2_color_texto'] ?>"/>
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