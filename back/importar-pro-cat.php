<?php
require_once('blocks/cabecera.php');
require_once('system/herramientas/import-pro-cat/execution-import.php');

?>
    <div class="span9" id="content">
        <div class="loader"></div>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Herramientas</h4>
            <p>Importa categorías y productos de forma fácil y rápida, por medio de un archivo .csv</p>
        </div>

        <?php if ($resultaop) { ?>
            <div class="row-fluid">
                <div class="alert alert-<?=$resultaop_tipo?>">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4><?=$resultaop_title?></h4>
                    <?=$resultaop?>
                </div>
            </div>
        <?php }?>

        <?php if ($error) { ?>
            <div class="row-fluid">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Aviso!</h4>
                    <?=$error?>
                </div>
            </div>
        <?php }?>

        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Importar CSV</div>
            </div>
            <div class="block-content collapse in">
                <form id="upload_csv" method="post" enctype="multipart/form-data">
                <div class="span12">
                    <div class="row-fluid">

                    <div class="span12">
                        <label>Agregar productos</label>
                        <input type="file" name="import_file" style="margin-top:15px;" />
                    </div>

                    <div class="span3">
                        <label>Nombre del producto</label>
                    </div>
                    <div class="span8">
                        <select name="nombre">
                            <option value="0" selected>Columna 1</option>
                            <option value="1">Columna 2</option>
                            <option value="2">Columna 3</option>
                            <option value="3">Columna 4</option>
                            <option value="4">Columna 5</option>
                            <option value="5">Columna 6</option>
                        </select>
                    </div>
                    <div class="span3">
                        <label>Descripción</label>
                    </div>
                    <div class="span8">
                        <select name="descripcion">
                            <option value="0">Columna 1</option>
                            <option value="1" selected>Columna 2</option>
                            <option value="2">Columna 3</option>
                            <option value="3">Columna 4</option>
                            <option value="4">Columna 5</option>
                            <option value="5">Columna 6</option>
                        </select>
                    </div>
                    <div class="span3">
                        <label>Imágen</label>
                    </div>
                    <div class="span8">
                        <select name="imagen" id="imagen">
                            <option value="0">Columna 1</option>
                            <option value="1">Columna 2</option>
                            <option value="2" selected>Columna 3</option>
                            <option value="3">Columna 4</option>
                            <option value="4">Columna 5</option>
                            <option value="5">Columna 6</option>
                        </select>
                    </div>
                    <div class="span3">
                        <label>Precio</label>
                    </div>
                    <div class="span8">
                        <select name="precio">
                            <option value="0">Columna 1</option>
                            <option value="1">Columna 2</option>
                            <option value="2">Columna 3</option>
                            <option value="3" selected>Columna 4</option>
                            <option value="4">Columna 5</option>
                            <option value="5">Columna 6</option>
                        </select>
                    </div>
                    <div class="span3">
                        <label>Referencia</label>
                    </div>
                    <div class="span8">
                        <select name="referencia">
                            <option value="0">Columna 1</option>
                            <option value="1">Columna 2</option>
                            <option value="2">Columna 3</option>
                            <option value="3">Columna 4</option>
                            <option value="4" selected>Columna 5</option>
                            <option value="5">Columna 6</option>
                        </select>
                    </div>
                        <div class="span3">
                            <label>Categoría</label>
                        </div>
                        <div class="span8">
                            <select name="categoria" id="categoria">
                                <option value="0">Columna 1</option>
                                <option value="1">Columna 2</option>
                                <option value="2">Columna 3</option>
                                <option value="3">Columna 4</option>
                                <option value="4">Columna 5</option>
                                <option value="5" selected>Columna 6</option>
                            </select>
                        </div>
                        <div class="span3">
                            <input id="micheckbox_cat" class="micheckbox" type="checkbox" name="subir_cat" checked>
                            Crear Categorías
                        </div>
                        <div class="span8">
                            <input id="micheckbox_img" class="micheckbox2" type="checkbox" name="subir_img" checked>
                            Subir imágenes
                        </div>
                    <div class="span12">
                        <input type="hidden" name="import">
                        <button onClick="submit(this)" id="btn-eliminar" class="btn btn-success">Importar CSV <i class="icon-list-alt icon-white"></i></button>
                    </div>
                    </div>


                </div>
                </form>
            <br /><br /><br />
            </div>
        </div>
        <!-- /block -->
    </div>

    <script>
        //Envío de formulario por Ajax
        $(document).ready(function(){

            $('#upload_csv').on("submit", function(e){
                e.preventDefault();
                $.ajax({
                    url:"?",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success: function(data){

                    }
                })
            });

            $( '.micheckbox' ).on( 'click', function() {
                if( $('#micheckbox_cat').prop('checked') ) {
                    $("#categoria").prop('disabled', false);
                }
                else {
                    $("#categoria").prop('disabled', true);
                }
            });
            $( '.micheckbox2' ).on( 'click', function() {
                if( $('#micheckbox_img').prop('checked') ) {
                    $("#imagen").prop('disabled', false);
                }
                else {
                    $("#imagen").prop('disabled', true);
                }
            });
        });
    </script>

<?php require_once('blocks/pie.php'); ?>