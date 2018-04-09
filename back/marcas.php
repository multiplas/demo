<?php require_once('blocks/cabecera.php'); ?>
<script>
jQuery(document).ready(function(){
    jQuery('#formMarcaStatus').change(function(){
        jQuery('#formMarcaStatus').submit();
    });
    jQuery('.add-file').click(function(){
        jQuery('#addMarcasFile').css('display', 'inherit');
    });
    jQuery('#fichero_usuario').change(function(){
        jQuery('#addMarcasFile').submit();
    });
    jQuery('.delete-file').click(function(){
        jQuery('#delete-file-id').val($(this).attr("data-file"));
        jQuery('#delete-file-name').val($(this).attr("data-file-name"));
        jQuery('#deleteMarcasFile').submit();
    });
});
</script>
<script>
    function cambiar(nam){
        var cadena = document.getElementById(nam).value;
        document.getElementById(nam).value = cadena.replace(",",".");
    }
</script>

<script>
    $(document).ready(function() {

        //Creando textareas con ckeditor v4.8.0_full
        CKEDITOR.replace('textoMarca');
        CKEDITOR.replace('textoMarca2');

        //Ocultando todas las pestañas
        $(".div-tabs").hide();
        //Mostrando sólo la pestaña principal
        $("#body-tab-p1").show();
        $("#p1").addClass('active');

        //Mostrando pestaña según selección
        $(".div-tab-active").on("click",function(){
            $(".div-tabs").hide();
            $(".div-tab-active").removeClass('active');
            $("#body-tab-"+ $(this).attr("id")).show();
            $("#"+ $(this).attr("id")).addClass('active');
        });

        //Validación de campos obligatorios
        $("#registrar-new").click(function(){
            var array_campos_required= new Array();
            if($("#nnombre").val() == "")
                array_campos_required.push('Nombre');
            if($("#nimagen").val() == "")
                array_campos_required.push('Imágen');
            if($("#niva").val() == "")
                array_campos_required.push('IVA');
            if($("#nprecio").val() == "")
                array_campos_required.push('Precio');
            if($("#npeso").val() == "")
                array_campos_required.push('Peso');
            if($('input[type=checkbox].checkbox-cat:checked').length == 0)
                array_campos_required.push('Categoría (Debe seleccionar al menos una categoría)');
            if($("#nunidades").val() == "")
                array_campos_required.push('Unidades');
            if($("#nstock").val() == "")
                array_campos_required.push('Stock Mínimo');

            if(array_campos_required.length>0){
                var tex_talerta='Los siguientes campos son obligatorios:\n\n';
                for(var i=0;i<array_campos_required.length;i++)
                    var tex_talerta=tex_talerta+'* '+array_campos_required[i]+'\n';


                alert(tex_talerta);


                if(($('input[type=checkbox].checkbox-cat:checked').length == 0) &&($("#nnombre").val() != "" && $("#nimagen").val() != "" && $("#niva").val() != "" && $("#nprecio").val() != "" && $("#npeso").val() != "")) {

                    $(".div-tabs").hide();
                    $(".div-tab-active").removeClass('active');
                    $("#body-tab-p15").show();
                    $("#p15").addClass('active');
                    return false;
                }
                else if(($("#nunidades").val() == "" || $("#nstock").val() == null) &&($("#nnombre").val() != "" && $("#nimagen").val() != "" && $("#niva").val() != "" && $("#nprecio").val() != "" && $("#npeso").val() != "")){
                    $("#myModal").show();

                    $(".div-tabs").hide();
                    $(".div-tab-active").removeClass('active');
                    $("#body-tab-p14").show();
                    $("#p14").addClass('active');
                    return false;
                }
            }
            else{
                $( "#form-new" ).submit();
            }
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
</style>
<div class="span9" id="content">
    
    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>MARCAS</h4>
        <p>Esta sección se encarga de crear las marcas de cada producto.</p><p><strong>IMPORTANTE:</strong> Se debe relacionar las marcas con una sección del menú para que de acceso a dicha marca y así obtener los productos.</p>
    </div>
    
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
        <div id="add" class="block" style="height: 0px; visibility: hidden;">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Subir un Marca</div>
            </div>
            <div style="padding-bottom:150px;" class="block-content collapse in">
                <div class="span12">
                    <form action="marcas.php?accion=subirmarca" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                        <legend>Subir Nueva Marca</legend>
                        <div class="control-group">
                            <label class="control-label" for="ncategoria">Marca </label>
                            <div class="controls">
                            <input type="text" class="span6" id="ncategoria" name="categoria" placeholder="Nombre de la marca" required>
                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="ncategoria_padre">Marca 1</label>
                            <div class="controls">
                            <select id="ncategoria_padre" name="categoria_padre" class="chzn-select span4">
                                <option value="">Marca Padre</option>
                                <?php
                                    foreach ($listadosalt AS $listado)
                                    {
                                        ?>
                                            <option value="<?=$listado['id']?>"><?=$listado['categoria']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                            <span style="color: #09F; font-size: 0.70rem;">Marca a la que va a pertenecer esta subcatedoría. No seleccionar para ser marca padre.</span>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="ncategoria_padre">Marca menú</label>
                            <div class="controls">
                            <select id="categoria_menu" name="categoria_menu" class="chzn-select span4" required>
                                <option value="0">Ninguna</option>
                                <?php
                                    foreach ($listadosm AS $listado)
                                    {
                                        ?>
                                            <option value="<?=$listado['id']?>"><?=$listado['nombre']?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                            <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                            <span style="color: #09F; font-size: 0.70rem;">Menú a la que va a pertenecer esta marca.</span>
                            </div>
                        </div>
                        <div class="control-group">
                                <label class="control-label" for="categoria">Titulo Seo </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="tituloSeo" name="tituloSeo" placeholder="Titulo SEO" value="<?=$elemento['tituloSeo']?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="categoria">Descripcion SEO </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="descripcionSeo" name="descripcionSeo" placeholder="Nombre de la marca" value="<?=$elemento['descripcionSeo']?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="categoria">Meta Keys </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="metaKeys" name="metaKeys" placeholder="Nombre de la marca" value="<?=$elemento['metaKeys']?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textoMarca">Contenido</label>
                                <div class="controls">
                                    <textarea id="textoMarca" name="textoMarca" class="input-xlarge" style="width: 810px; height: 200px"></textarea>
                                </div>
                            </div>
                        <div class="control-group">
                            <label class="control-label" for="nimagen">Imagen</label>
                            <div class="controls">
                                <input class="input-file uniform_on" id="nimagen" name="imagen" type="file">
                            </div>
                                <?php
                                if (!empty($elemento['extension']) && $elemento['extension'] != null)
                                {
                                    ?>
                                    <a style="color: #09F; font-size: 0.70rem;" href="../marcas/<?=$elemento['id']?>.<?=$elemento['extension']?>" target="_blank">ver imagen actual</a>
                                    <?php
                                }
                                ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Subir</button>
                        <button type="button" onclick="location.href = 'marcas.php';" class="btn">Cancelar</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <h4>Carrousel de marcas en la home</h4>
        <form id="formMarcaStatus" action="marcas.php?accion=updateMarcaStatus" method="post" class="form-horizontal" enctype="multipart/form-data">
            <select name="marcaStatus" id="marcaStatus">
                <option value="0" <?php if($marcaStatus['valor'] == 0) echo 'selected' ?>>Desactivado</option>
                <option value="1" <?php if($marcaStatus['valor'] == 1) echo 'selected' ?>>Activado</option>
            </select>
        </form>
        <hr>
    </div>
        <?php if (@$elemento != null && $resultaop != 1) { ?>
        <div class="row-fluid">
        <div id="edi" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Editar una Marca</div>
            </div>
            <div style="padding-bottom:150px;" class="block-content collapse in">
                <div class="span12">
                    <form action="marcas.php?editarcate=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>
                            <legend>Editar
                                <?=$elemento['categoria']?>
                            </legend>
                            <div class="control-group">
                                <label class="control-label" for="categoria">Marca </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="categoria" name="categoria" placeholder="Nombre de la marca" value="<?=$elemento['categoria']?>" required>
                                    <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="categoria_padre">Marca 1</label>
                                <div class="controls">
                                    <select id="ncategoria_padre" name="categoria_padre" class="chzn-select span4">
                                                        <option value="">Marca Padre</option>
                                                        <?php
                                                            foreach ($listadosalt AS $listado)
                                                            {
                                                                ?>
                                                                    <option value="<?=$listado['id']?>"<?=$elemento['idpadre'] == $listado['id'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                                <?php
                                                            }
                                                        ?>
                                                    </select>
                                    <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                    <span style="color: #09F; font-size: 0.70rem;">Marca a la que va a pertenecer esta subcatedoría. No seleccionar para ser marca padre.</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="ncategoria_padre">Marca menú</label>
                                <div class="controls">
                                    <select id="categoria_menu" name="categoria_menu" class="chzn-select span4" required>
                                                            <?php
                                                                foreach ($listadosm AS $listado)
                                                                {
                                                                    ?>
                                                                        <option value="<?=$listado['id']?>"<?=$elemento['idmenu'] == $listado['id'] ? ' selected' : ''?>><?=$listado['nombre']?></option>
                                                                    <?php
                                                                }
                                                            ?>
                                                        </select>
                                    <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    <span style="color: #09F; font-size: 0.70rem;">Menú a la que va a pertenecer esta categoria.</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="categoria">Titulo Seo </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="tituloSeo" name="tituloSeo" placeholder="Titulo SEO" value="<?=$elemento['tituloSeo']?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="categoria">Descripcion SEO </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="descripcionSeo" name="descripcionSeo" placeholder="Nombre de la marca" value="<?=$elemento['descripcionSeo']?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="categoria">Meta Keys </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="metaKeys" name="metaKeys" placeholder="Nombre de la marca" value="<?=$elemento['metaKeys']?>">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="textoMarca">Contenido</label>
                                <div class="controls">
                                    <textarea id="textoMarca2" name="textoMarca" class="input-xlarge" style="width: 810px; height: 200px"></textarea>
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="nimagen">Imagen</label>
                                <div class="controls">
                                    <input class="input-file uniform_on" id="nimagen" name="imagen" type="file">
                                    <?php
                                        if (!empty($elemento['extension']) && $elemento['extension'] != null)
                                        {
                                            ?>
                                            <a style="color: #09F; font-size: 0.70rem;" href="../marcas/<?=$elemento['id']?>.<?=$elemento['extension']?>" target="_blank">ver imagen actual</a>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <input type="hidden" class="span6" name="old_extension" value="<?=$elemento['extension']?>">
                            <input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
                            <button type="submit" class="btn btn-primary">Modificar</button>
                            <button type="button" onclick="location.href = 'marcas.php';" class="btn">Cancelar</button>
                        </fieldset>
                    </form>
                    <h4 class="delete-title">Ficheros adjuntos a <?=$elemento['categoria']?></h4>
                    <?php
                    if(isset($marcaFiles) && !empty($marcaFiles)){
                        foreach($marcaFiles as $file){
                            ?>
                            <div class="fichero-list">                                            
                                <span class="rol">Rol: <?=$System->GetUserByRol($file['rol'])?></span><a class="link-file" href="../ficheros/<?=$file['fichero']?>" target="_blank" ><?=$file['fichero']?></a><span class="delete-file" title="Eliminar archivo" data-file-name="<?=$file['fichero']?>" data-file="<?=$file['id']?>">X</span>
                            </div>
                            <?php
                        }
                    }
                        ?>
                    <form enctype="multipart/form-data" id="addMarcasFile" class="form-horizontal"  action="marcas.php?accion=addMarcasFile" method="POST">
                        <fieldset>
                            <label class="control-label" for="rol">Rol de Usuario </label>
                            <div class="control-group">
                                <select name="rol" id="rol">
                                    <?php foreach($roles as $rol){ ?>
                                    <option value="<?=$rol['id']?>"><?=$rol['rol']?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="fichero_usuario">Añadir Fichero</label>
                                <input class="input-file uniform_on" id="fichero_usuario" name="fichero_usuario" type="file" />
                            </div>
                            <input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
                        </fieldset>
                    </form>
                    <button type="button" class="btn btn-primary add-file" title="Añadir archivo">+</button>
                    <form enctype="multipart/form-data" id="deleteMarcasFile" class="form-horizontal"  action="marcas.php?accion=deleteMarcasFile" method="POST">
                        <input type="hidden" id="delete-file-name" name="delete-file-name" value=""/>
                        <input type="hidden" id="delete-file-id" name="delete-file-id" value=""/>
                        <input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
        <?php } ?>
        <!-- block -->
    
        <script>
            $(document).ready(function () {
                var data_id = '';
                var data_name = '';
                
                $('.open-Modal').click(function () {
                    
                    //alert('error 00');
                    if (typeof $(this).data('id') !== 'undefined') {
                        data_id = $(this).data('id');
                        data_name = $(this).data('name');
                        //alert('valor: ' + $(this).data('id'));
                    }
                    //$('#id-elemento').text(data_id);
                    $('#elemento').text(data_name);
                })
                
                $('#btn-eliminar').click(function () {
                    var url = "?eliminarcate=" + data_id;
                    location.href = url;
                })
                
            });
        </script>
    
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">ELIMINAR MARCA</h4>
                </div>
                <div class="modal-body">
                ¿Esta seguro de que desea eliminar la marca "<strong><span id="elemento"></span></strong>"?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="btn-eliminar" type="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
            </div>
        </div>
        <!-- -->
    
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Listado de Marcas</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Subir Marca <i class="icon-plus icon-white"></i></button></a>
                        </div>
                        <!--<div class="btn-group pull-right">
                            <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                            <li><a href="#">Print</a></li>
                            <li><a href="#">Save as PDF</a></li>
                            <li><a href="#">Export to Excel</a></li>
                            </ul>
                        </div>-->
                    </div>
                    <?php if (count($listados) > 0) { ?>
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;"></th>
                                                                                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Marca</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Padre</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">Opciones</th>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php
                                    foreach ($listados AS $listado)
                                    {
                                        if (@$lineapi != 'odd')
                                            $lineapi = 'odd';
                                        else
                                            $lineapi = 'even';
                                        ?>
                                        <tr class="<?=$lineapi?>">
                                                                                                    <td style="width: 110px;" valign="top" class=""  style="text-align: center;"><img src="../marcas/<?=$listado['id']?>.<?=$listado['extension']?>" style="max-height: 50px; max-width: 100px;"></td>
                                            <td valign="top" class=""  style="text-align: center;"><?=$listado['id']?></td>
                                            <td valign="top" class="" ><?=$listado['categoria']?></td>
                                            <td valign="top" class="" ><?=$listado['categoriap'] != null ? $listado['categoriap'] : '<b>PADRE</b>'?></td>
                                            <td valign="top" class=""  style="text-align: center;">
                                                <a href="?editarcate=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                                <a class="open-Modal" href="#" data-name="<?=$listado['categoria']?>" data-id="<?=$listado['id']?>" data-toggle="modal" data-target="#myModal" /><i style="color: red;" class="fa fa-trash-o fa-lg"></i></a>
                                                <!--<a href="?eliminarcate=<?=$listado['id']?>" onclick="return confirm('Desea eliminar la marca \'\'#<?=$listado['id']?> - <?=$listado['categoria']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>-->
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p>No hay marca!</p>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
</div>
<?php require_once('blocks/pie.php'); ?>