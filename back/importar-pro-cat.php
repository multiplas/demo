<?php
require_once('blocks/cabecera.php');
?>

<style>
    progress[value] {
        /* Eliminamos la apariencia por defecto */
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        /* Quitamos el borde que aparece en Firefox */
        border: none;

        /* Aplicamos las dimensiones */
        width: 100%;
        height: 20px;

        /* Aplicamos color a la barra */
        color: blue;
    }

    /* Compatibilidad de color en Firefox y Chrome */
    progress::-moz-progress-bar { background: #0063a6; }
    progress::-webkit-progress-value { background: #0063a6
</style>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $("#progreso_barra_load").fadeOut(1500);
            },3000);
        });
    </script>


<div class="span9" id="content">
        <div class="loader"></div>

        <div class="alert alert-info alert-dismissable" id="progreso_barra_load" style="display: none">
            <button type="button" class="close" data-dismiss="alert">&times;</button>

            <progress id="progress_bar" max="100" value="0"></progress>
        </div>
        <?php
            require_once('system/herramientas/import-pro-cat/execution-import.php');
        ?>
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
                        <input type="number" name="nombre">
                    </div>
                    <div class="span3">
                        <label>Descripción</label>
                    </div>
                    <div class="span8">
                        <input type="number" name="descripcion">
                    </div>
                    <div class="span3">
                        <label>Imágen</label>
                    </div>
                    <div class="span8">
                        <input type="number" name="imagen" id="imagen">
                    </div>
                    <div class="span3">
                        <label>Impuestos</label>
                    </div>
                    <div class="span8">
                        <input type="number" name="impuesto">
                    </div>
                        <div class="span3">
                            <label>PVP s/impuestos</label>
                        </div>
                        <div class="span8">
                            <input type="number" name="precio">
                        </div>
                        <div class="span3">
                            <label>PVP c/impuestos</label>
                        </div>
                        <div class="span8">
                            <input type="number" name="pvp_impuesto">
                        </div>
                    <div class="span3">
                        <label>Referencia</label>
                    </div>
                    <div class="span8">
                        <input type="number" name="referencia" id="referencia" required>
                    </div>
                        <div class="span3">
                            <label>Categoría</label>
                        </div>
                        <div class="span8">
                            <input type="number" name="categoria" id="categoria">
                        </div>
                        <div class="span3">
                            <label>Precio de Transporte</label>
                        </div>
                        <div class="span8">
                            <input type="number" name="ptransporte" id="ptransporte">
                        </div>
                        <div class="span3">
                            <label>Marca</label>
                        </div>
                        <div class="span8">
                            <input type="number" name="marca" id="marca">
                        </div>
                        <div class="span3">
                            <label>Stock</label>
                        </div>
                        <div class="span8">
                            <input type="number" name="stock" id="stock">
                        </div>
                        <div class="span3">
                            <input id="micheckbox_cat" class="micheckbox" type="checkbox" name="subir_cat" checked>
                            Crear Categorías
                        </div>
                        <div class="span3">
                            <input id="micheckbox_img" class="micheckbox2" type="checkbox" name="subir_img" checked>
                            Subir Imágenes
                        </div>
                        <div class="span5">
                            <input id="micheckbox_marca" class="micheckbox" type="checkbox" name="subir_marca" checked>
                            Crear Marcas
                        </div>
                        <div class="span3">
                            <label>Delimitador</label>
                        </div>
                        <div class="span3">
                            <input id="delimitador" name="delimitador" type="text">
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

            //validando envio de formulario



                $('#upload_csv').on("submit", function(e) {
                    //validando envio de formulario
                    if ($("#referencia").val()=='') {
                        alert("Debe indicar la columna de la referencia");
                        return false;
                    }else{

                    e.preventDefault();
                    $.ajax({
                        url: "?",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (data) {

                        }
                    });
                }
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