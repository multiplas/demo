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
        
        
            <div class="row-fluid">
            <div id="edi" class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Editar estilo proceso de compra</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form action="cambiar_proceso_compra.php?cambprocess=true" method="post" class="form-horizontal">
                            <fieldset>
                                <div>
                                    <legend>Estilo proceso de compra</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="actanu">Activo</label>
                                            <div class="controls">
                                                <select id="p_compra_type" name="p_compra_type"  class="span6">
                                                    <?php if ($elemento['id'] == "0"): ?>
                                                        <option value="0" <?=$elemento['valor'] == "0" ? 'selected' : ''?>>Normal</option>     
                                                        <option value="3" <?=$elemento['valor'] == "3" ? 'selected' : ''?>>Simplificado</option>  
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