<?php
require_once('blocks/cabecera.php');
require_once('system/multimedia/execution-multimedia.php');
?>
    <style>
        .resaltar-text{
            color: red;
        }

        .text-area-msj{
            height: 200px;
        }

        .img-bliblio-media{
            height: 140px !important;
            width: 100% !important;

        }

        .img-bliblio-media-list{
            height: 60px !important;
            width: 80px !important;
        }

        .box-file{
            margin-top:10px;
            padding: 0px;
            text-align: center;
        }

        @media (max-width: 700px) {
            .img-bliblio-media{
                height: auto !important;

            }
        }

        @media (min-width: 2824px) {
            .img-bliblio-media{
                height: 350px !important;

            }
        }
        
    </style>
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
        <script>
            function cambiar(nam){
                var cadena = document.getElementById(nam).value;
                document.getElementById(nam).value = cadena.replace(",",".");
            }
        </script>


        <!-- block -->

        <script>
            $(document).ready(function () {
                var data_id = '';
                var data_name = '';

                $('.open-Modal').click(function () {
                    data_type = $(this).data('type');
                    //alert('error 00');
                    if (typeof $(this).data('id') !== 'undefined') {
                            data_url = $(this).data('url');
                            data_id = $(this).data('id');
                            data_name = 'el archivo "'+$(this).data('name')+'"';
                    }else {
                        data_name = 'los archivos seleccionados';
                    }
                    $('#elemento').text(data_name);
                })

                $('#btn-eliminar').click(function () {
                    if (data_type== 'eliminar_uno') {
                        var url = "?eliminarfile=" + data_id + "&url=" + data_url;
                    }
                    else {
                        var file_e = new Array();
                        $('.micheckbox:checked').each(
                            function() {
                                file_e.push($(this).val());
                            }
                        );

                        var url = "?eliminarfile_array=" + file_e;
                    }
                    location.href = url;
                })

                //seleccionar todos los checkbox
                $(".btn-elim-all").hide();
                $("#select_all").change(function () {
                    $("input:checkbox").prop('checked', $(this).prop("checked"));

                    var contador=0;

                    // Recorremos todos los checkbox para contar los que estan seleccionados
                    $("input[type=checkbox].micheckbox").each(function(){
                        if($(this).is(":checked"))
                            contador++;
                    });

                    if(contador>0)
                        $(".btn-elim-all").show();
                    else
                        $(".btn-elim-all").hide();
                });

                //seleccionar un checkbox
                $(".micheckbox").change(function () {
                    var contador=0;

                    // Recorremos todos los checkbox para contar los que estan seleccionados
                    $("input[type=checkbox].micheckbox").each(function(){
                        if($(this).is(":checked"))
                            contador++;
                    });

                    if(contador>0)
                        $(".btn-elim-all").show();
                    else {
                        $("#select_all").prop('checked', false);
                        $(".btn-elim-all").hide();
                    }
                });

            });
        </script>

        <!-- Modal Eliminar -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">ELIMINAR ARCHIVO</h4>
                    </div>
                    <div class="modal-body">
                        ¿Esta seguro de que desea eliminar <span id="elemento"></span>?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button id="btn-eliminar" type="button" class="btn btn-danger">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- -->



        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Biblioteca multimedia</h4>
            <p>Esta es la sección de subida múltiple de archivos. Agrega los archivos multimedia que desees utilizar posteriormente en la plataforma.</p>
        </div>

        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted">Multimedia
                    <?php if (count($list_files) > 0){?>
                    <a href="?lista"><i style="color: grey;" class="pull-right fa fa-th-list fa-lg"></i></a> <a href="?mosaico"><i style="color: grey;" class="pull-right fa fa-th fa-lg"></i></a>
                    <?php } ?>
                </div>
            </div>

            <div class="block-content collapse in">

                <div class="span12">
                    <div class="btn-group">
                        <a href="multimedia-new.php"><button class="btn btn-success">Añadir nuevo <i class="icon-plus icon-white"></i></button></a>
                    </div>
                    <div id="example_wrapper" style="margin-bottom:150px;" class="dataTables_wrapper form-inline" role="grid">
                        <?php  if (count($list_files) > 0) {
                            if(!isset($_GET['lista'])){
                                ?>
                        <div class="row">
                                <?php
                                $num_file=0;
                                foreach ($list_files AS $listado)
                                {
                                    $tipo_file = obtenerExtensionFichero($listado['url']);
                                        if($num_file==6){
                                            $num_file=0;
                                            ?>
                                            </div>
                                            <div class="row">
                                            <?php
                                        }
                                    ?>
                                    <div class="span2 box-file alert alert-info" data-id="<?=$listado['id']?>">
                                        <div class="pull-left">
                                            <input style="margin: auto 5px" title="Seleccionar" class="micheckbox" type="checkbox" name="check_eliminar[]" value="<?=$listado['id']?>">
                                        </div>
                                        <div class="pull-right">
                                            <a title="Ver información" href="multimedia-edit.php?verfile&idfile=<?=$listado['id']?>"><i style="color: orange;" class="fa fa-picture-o fa-lg"></i></a>
                                            <a title="Ediar" href="multimedia-edit.php?editarfile&idfile=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                            <a title="Eliminar" class="open-Modal" href="#" data-name="<?=$listado['titulo']?>" data-type="eliminar_uno" data-id="<?=$listado['id']?>" data-url="<?=$listado['url']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>

                                        </div>
                                        <a href="multimedia-edit.php?verfile&idfile=<?=$listado['id']?>">
                                            <?php if(file_exists($directorio_multimedia.$listado['url'])){?>
                                                 <img class="img-bliblio-media" src="<?=$directorio_multimedia?><?=$tipo_file == 'pdf' ? 'is_pdf.png' : $listado['url']?>">
                                            <?php }else{?>
                                                <img class="img-bliblio-media" src="<?=$directorio_multimedia?>no_disponible.png">
                                            <?php }?>
                                                <span class="span-biblio-media"><?=ucwords($listado['titulo'])?></span>



                                        </a>
                                    </div>
                                    <?php
                                    $num_file++;
                                }
                                ?>
                        </div>

                                <div>
                                    <hr>
                                    <div>
                                        <input title="Seleccionar Todo" type="checkbox" id="select_all" name="select_all" value="select_all">
                                    </div>
                                    <div>
                                        <a id="btn-elim-all" title="Eliminar seleccionados" class="open-Modal pull-right btn-elim-all" href="#" data-type="eliminar_todos"  data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
                                    </div>
                                </div>
                        <?php
                        }else{
                                ?>
                                <div class="row" style="display: none;">
                                    <div class="span6">
                                        <div id="example_length" class="dataTables_length">
                                            <label>
                                                <select size="1" name="example_length" aria-controls="example">
                                                    <option value="10" selected="selected">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                </select>
                                                records per page</label>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        <div class="dataTables_filter" id="example_filter">
                                            <label>Search: <input type="text" aria-controls="example"></label>
                                        </div>
                                    </div>
                                </div>
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">Id</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" colspan="2" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Archivo</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Leyenda</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Texto Alternativo</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Descripcion</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Autor:</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Fecha</th>
                                            <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Opciones</th>
                                        </tr>
                                        </thead>
                                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php
                                        foreach ($list_files AS $listado)
                                        {
                                            $tipo_file = obtenerExtensionFichero($listado['url']);
                                            if (@$lineapi != 'odd')
                                                $lineapi = 'odd';
                                            else
                                                $lineapi = 'even';
                                            ?>
                                            <tr class="<?=$lineapi?>">
                                                <td valign="top" class=""  style="text-align: center;"><input class="micheckbox" type="checkbox" name="check_eliminar[]" value="<?=$listado['id']?>"></td>
                                                <td valign="top" class="" ><img class="img-bliblio-media-list" src="<?=$directorio_multimedia?><?=$tipo_file == 'pdf' ? 'is_pdf.png' : $listado['url']?>"></td>
                                                <td valign="top" class="" ><a href=""><?=$listado['titulo']?></a><br><?=$listado['url']?></td>
                                                <td valign="top" class="" ><?=$listado['leyenda']?></td>
                                                <td valign="top" class="" ><?=$listado['texto_alternativo']?></td>
                                                <td valign="top" class="" ><?=$listado['descripcion']?></td>
                                                <td valign="top" class="" ><?=$listado['nombre']?></td>
                                                <td valign="top" class="" ><?=$listado['fecha']?></td>
                                                <td>
                                                    <a title="Ver información" href="multimedia-edit.php?verfile&idfile=<?=$listado['id']?>"><i style="color: orange;" class="fa fa-picture-o fa-lg"></i></a>
                                                    <a title="Ediar" href="multimedia-edit.php?editarfile&idfile=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                                    <a title="Eliminar" class="open-Modal" href="#" data-name="<?=$listado['titulo']?>" data-type="eliminar_uno" data-id="<?=$listado['id']?>" data-url="<?=$listado['url']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>

                                        <tr>
                                            <td colspan="1">
                                                <input title="Seleccionar Todo" type="checkbox" id="select_all" name="select_all" value="select_all">
                                            </td>
                                            <td colspan="8">
                                                <a title="Eliminar seleccionados" class="open-Modal pull-right btn-elim-all" href="#" data-type="eliminar_todos"  data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
                                            </td>
                                        </tr>
                                    </table>
                                <?php
                            }
                        }else { ?>
                            <p>No hay archivos!</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
    </div>
<?php require_once('blocks/pie.php'); ?>