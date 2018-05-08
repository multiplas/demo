<?php
require_once('blocks/cabecera.php');
//require_once('system/herramientas/import-pro-cat/execution-download-log.php');

?>

<style>
    #referencia{
    border-color: red;  background-color: #fff9df;
    }

    .input_sincronizar{
        width:80px;
    }

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
            <h4>Cargando data</h4>

            <progress id="progress_bar" max="100" value="0"></progress>
            <br>Por favor espere...
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
            <script>$('#progress_bar').val('100');</script>
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

    <div class="alert alert-info alert-dismissable" style="display: none">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Descarga de log</h4>
        <p id="msj_download_log"></p>
    </div>

        <?php if (count($array_log_new)>0 || count($array_log_update)>0) { ?>
            <div class="row-fluid">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Log</h4>
                    <hr>
                    <?php if (count($array_log_new)>0) { ?>
                    <table border="1" style="margin: auto; width: 98%">
                        <tr>
                            <td colspan="14" style="text-align: center; font-weight: bold;">Productos Nuevos</td>
                        </tr>
                        <tr style="text-align: center; <?=$atatcc['status_campo'] == 'agregado' ? ' color:#468847;' : ''?> <?=$alertTabla['actualizada']['tabla_cms_base'][$icli]['status_campo'] == 'eliminado' ? ' color:gray;' : ''?>">
                            <td>Nro.</td>
                            <td>Nombre</td>
                            <td>Descripcion</td>
                            <td>Imagen</td>
                            <td>Precio</td>
                            <td>Referencia</td>
                            <td>Categoria</td>
                            <td>Stock</td>
                            <td>Marca</td>
                            <td>Precio Transporte</td>
                            <td>Impuesto</td>
                            <td>PVP c/impuesto</td>
                            <td>Proveedor</td>
                            <td>Visible</td>
                        </tr>
                        <form id="form_new" method="post" action="system/herramientas/import-pro-cat/execution-download-log.php">
                        <?php
                    $count_log_new=0;
                    foreach ($array_log_new AS $log_new)
                    {
                        $count_log_new++;
                        ?>
                        <tr style="text-align: center; <?=$atatcc['status_campo'] == 'agregado' ? ' color:#468847;' : ''?> <?=$alertTabla['actualizada']['tabla_cms_base'][$icli]['status_campo'] == 'eliminado' ? ' color:gray;' : ''?>">
                            <td><?=$count_log_new?></td>
                            <td><?=$log_new['nombre']?></td>
                            <td><?=$log_new['descripcion']?></td>
                            <td><?=$log_new['imagen']?></td>
                            <td><?=$log_new['precio']?></td>
                            <td><?=$log_new['referencia']?></td>
                            <td><?=$log_new['categoria']?></td>
                            <td><?=$log_new['stock']?></td>
                            <td><?=$log_new['marca']?></td>
                            <td><?=$log_new['ptransporte']?></td>
                            <td><?=$log_new['impuesto']?></td>
                            <td><?=$log_new['pvp_impuesto']?></td>
                            <td><?=$log_new['proveedor']?></td>
                            <td><?=$log_new['p_visible']?></td>
                        </tr>
                        <input type="hidden" name="tipo_log" value="productos_nuevos">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['nombre']" value="<?= $log_new['nombre'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['descripcion']" value="<?= $log_new['descripcion'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['imagen']" value="<?= $log_new['imagen'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['precio']" value="<?= $log_new['precio'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['referencia']" value="<?= $log_new['referencia'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['categoria']" value="<?= $log_new['categoria'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['stock']" value="<?= $log_new['stock'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['marca']" value="<?= $log_new['marca'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['ptransporte']" value="<?= $log_new['ptransporte'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['impuesto']" value="<?= $log_new['impuesto'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['pvp_impuesto']" value="<?= $log_new['pvp_impuesto'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['proveedor']" value="<?= $log_new['proveedor'] ?>">
                        <input type="hidden" name="array_log[<?= $count_log_new ?>]['p_visible']" value="<?= $log_new['p_visible'] ?>">
                        <?php
                    } ?>

                        <tr style="text-align: center; <?=$atatcc['status_campo'] == 'agregado' ? ' color:#468847;' : ''?> <?=$alertTabla['actualizada']['tabla_cms_base'][$icli]['status_campo'] == 'eliminado' ? ' color:gray;' : ''?>">
                            <td colspan="14" style="text-align: center; font-weight: bold;">
                                Seleccione la ruta:
                                <!--input type="file" name="path_log"-->
                                <input type="submit" name="descargar_log" value="Descargar log (Nuevos)">
                            </td>
                        </tr>
                        </form>
                    </table>
                    <?php }else{
                        echo"<b>No se registraron nuevos productos</b>";
                    }?>
                    <br><br>
                    <?php if (count($array_log_update)>0) { ?>
                    <table border="1" style="margin: auto; width: 98%">
                        <tr>
                            <td colspan="14" style="text-align: center; font-weight: bold;">Productos Modificados</td>
                        </tr>
                        <tr style="text-align: center; <?=$atatcc['status_campo'] == 'agregado' ? ' color:#468847;' : ''?> <?=$alertTabla['actualizada']['tabla_cms_base'][$icli]['status_campo'] == 'eliminado' ? ' color:gray;' : ''?>">
                            <td>Nro.</td>
                            <td>Nombre</td>
                            <td>Descripcion</td>
                            <td>Imagen</td>
                            <td>Precio</td>
                            <td>Referencia</td>
                            <td>Categoria</td>
                            <td>Stock</td>
                            <td>Marca</td>
                            <td>Precio Transporte</td>
                            <td>Impuesto</td>
                            <td>PVP c/impuesto</td>
                            <td>Proveedor</td>
                            <td>Visible</td>
                        </tr>
                        <form id="form_update" method="post" action="system/herramientas/import-pro-cat/execution-download-log.php">
                        <?php
                        $count_log_update=0;
                        foreach ($array_log_update AS $log_update)
                        {
                            $count_log_update++;
                            ?>
                            <tr style="text-align: center; <?=$atatcc['status_campo'] == 'agregado' ? ' color:#468847;' : ''?> <?=$alertTabla['actualizada']['tabla_cms_base'][$icli]['status_campo'] == 'eliminado' ? ' color:gray;' : ''?>">
                                <td><?=$count_log_update?></td>
                                <td><?=$log_update['nombre']?></td>
                                <td><?=$log_update['descripcion']?></td>
                                <td><?=$log_update['imagen']?></td>
                                <td><?=$log_update['precio']?></td>
                                <td><?=$log_update['referencia']?></td>
                                <td><?=$log_update['categoria']?></td>
                                <td><?=$log_update['stock']?></td>
                                <td><?=$log_update['marca']?></td>
                                <td><?=$log_update['ptransporte']?></td>
                                <td><?=$log_update['impuesto']?></td>
                                <td><?=$log_update['pvp_impuesto']?></td>
                                <td><?=$log_update['proveedor']?></td>
                                <td><?=$log_update['p_visible']?></td>
                            </tr>
                            <input type="hidden" name="tipo_log" value="productos_modificados">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['nombre']" value="<?= $log_update['nombre'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['descripcion']" value="<?= $log_update['descripcion'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['imagen']" value="<?= $log_update['imagen'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['precio']" value="<?= $log_update['precio'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['referencia']" value="<?= $log_update['referencia'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['categoria']" value="<?= $log_update['categoria'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['stock']" value="<?= $log_update['stock'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['marca']" value="<?= $log_update['marca'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['ptransporte']" value="<?= $log_update['ptransporte'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['impuesto']" value="<?= $log_update['impuesto'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['pvp_impuesto']" value="<?= $log_update['pvp_impuesto'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['proveedor']" value="<?= $log_update['proveedor'] ?>">
                            <input type="hidden" name="array_log[<?= $count_log_update ?>]['p_visible']" value="<?= $log_update['p_visible'] ?>">
                            <?php
                        } ?>

                            <tr style="text-align: center; <?=$atatcc['status_campo'] == 'agregado' ? ' color:#468847;' : ''?> <?=$alertTabla['actualizada']['tabla_cms_base'][$icli]['status_campo'] == 'eliminado' ? ' color:gray;' : ''?>">
                               <td colspan="14" style="text-align: center; font-weight: bold;">
                                   Seleccione la ruta:
                                   <!--input type="file" name="path_log"-->
                                   <input type="submit" name="descargar_log" value="Descargar log (Modificados)">
                               </td>
                           </tr>
                        </form>
                    </table>
                    <?php }else{
                        echo"<b>No se modificaron productos</b>";
                    } ?>
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
                        <br><br>
                        <hr>
                        <div class="span5">
                        <div class="span5">
                            <label></label>
                        </div>
                        <div class="span6">
                            Nro. de Columna
                        </div>
                        <div class="span5">
                            <label>Referencia</label>
                        </div>
                        <div class="span6">
                            <input class="input_sincronizar" type="number" name="referencia" id="referencia" value="<?=$c5?>" required>
                        </div>
                    <div class="span5">
                        <label>Nombre del producto</label>
                    </div>
                    <div class="span6">
                        <input class="input_sincronizar" type="number" name="nombre" value="<?=$c1?>">
                    </div>
                    <div class="span5">
                        <label>Descripción</label>
                    </div>
                    <div class="span6">
                        <input class="input_sincronizar" type="number" name="descripcion" value="<?=$c2?>">
                    </div>
                    <div class="span5">
                        <label>Imágen</label>
                    </div>
                    <div class="span6">
                        <input class="input_sincronizar" type="number" name="imagen" id="imagen" value="<?=$c3?>">
                    </div>
                    <div class="span5">
                        <label>Impuestos</label>
                    </div>
                    <div class="span6">
                        <input class="input_sincronizar" type="number" name="impuesto" value="<?=$c7?>">
                    </div>
                        <div class="span5">
                            <label>PVP s/impuestos</label>
                        </div>
                        <div class="span6">
                            <input class="input_sincronizar" type="number" name="precio" value="<?=$c4?>">
                        </div>
                        </div>
                        <div class="span5">
                            <div class="span5">
                                <label></label>
                            </div>
                            <div class="span6">
                                Nro. de Columna
                            </div>
                        <div class="span5">
                            <label>PVP c/impuestos</label>
                        </div>
                        <div class="span6">
                            <input class="input_sincronizar" type="number" name="pvp_impuesto" value="<?=$c8?>">
                        </div>
                        <div class="span5">
                            <label>Categoría</label>
                        </div>
                        <div class="span6">
                            <input class="input_sincronizar" type="number" name="categoria" id="categoria" value="<?=$c6?>">
                        </div>
                        <div class="span5">
                            <label>Precio de Transporte</label>
                        </div>
                        <div class="span6">
                            <input class="input_sincronizar" type="number" name="ptransporte" id="ptransporte" value="<?=$c9?>">
                        </div>
                        <div class="span5">
                            <label>Marca</label>
                        </div>
                        <div class="span6">
                            <input class="input_sincronizar" type="number" name="marca" id="marca" value="<?=$c10?>">
                        </div>
                        <div class="span5">
                            <label>Stock</label>
                        </div>
                        <div class="span6">
                            <input class="input_sincronizar" type="number" name="stock" id="stock" value="<?=$c11?>">
                        </div>
                        <div class="span5">
                            <label>Proveedor</label>
                        </div>
                        <div class="span6">
                            <input class="input_sincronizar" type="number" name="proveedor" id="proveedor" value="<?=$c12?>">
                        </div>
                    </div>
                        <div class="span12">
                        <br>
                        </div>
                    <div class="span12">
                        <div class="span2">
                            <input id="micheckbox_cat" class="micheckbox" type="checkbox" name="subir_cat"  <?=$subir_cat == 'on' ? 'checked' : ''?> >
                            Crear Categorías
                        </div>
                        <div class="span2">
                            <input id="micheckbox_img" class="micheckbox2" type="checkbox" name="subir_img"  <?=$subir_img == 'on' ? 'checked' : ''?> >
                            Subir Imágenes
                        </div>
                        <div class="span2">
                            <input id="micheckbox_marca" class="micheckbox" type="checkbox" name="subir_marca"  <?=$subir_marca == 'on' ? 'checked' : ''?> >
                            Crear Marcas
                        </div>
                        <div class="span2">
                            <input id="micheckbox_proveedor" class="micheckbox" type="checkbox" name="subir_proveedor"  <?=$subir_proveedor == 'on' ? 'checked' : ''?> >
                            Crear Proveedores
                        </div>
                        <div class="span2">
                            <input id="micheckbox_visible" class="micheckbox" type="checkbox" name="visible"  <?=$visible == 'on' ? 'checked' : ''?> >
                            Visible
                        </div>
                        <div class="span12">
                            <br>
                        </div>
                        <div class="span2">
                            <label>Delimitador</label>
                        </div>
                        <div class="span3">
                            <input class="input_sincronizar" id="delimitador" name="delimitador" type="text" value="<?=$delimitador?>">
                        </div>
                        <div class="span2">
                            <label>Sincronizar Hasta</label>
                        </div>
                        <div class="span3">
                            <input class="input_sincronizar" id="limite" name="limite" type="text" value="<?=$limite?>">
                        </div>
                    </div>
                    <div class="span12" style="text-align: center">
                        <br><hr>
                        <input type="hidden" name="import">
                        <button onClick="submit(this)" id="btn-importar" class="btn btn-success">Importar CSV <i class="icon-list-alt icon-white"></i></button>
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



            /* Esta primera parte crea un loader no es necesaria
             $().ajaxStart(function() {
             $('#loading').show();
             $('#result').hide();
             }).ajaxStop(function() {
             $('#loading').hide();
             $('#result').fadeIn('slow');
             });*/
            // Interceptamos el evento submit
            $('#form_new, #form_update').submit(function() {
                // Enviamos el formulario usando AJAX
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    // Mostramos un mensaje con la respuesta de PHP
                    success: function(data) {
                        $('#msj_download_log').html(data.message).show();

                    }
                });
                return false;
            });
            
        });
    </script>


<?php require_once('blocks/pie.php'); ?>