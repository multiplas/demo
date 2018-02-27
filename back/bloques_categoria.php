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
                    <form action="bloques_categoria.php?activabloqcat=true" method="post" class="form-horizontal">
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