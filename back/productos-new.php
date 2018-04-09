<?php require_once('blocks/cabecera.php'); ?>
<?php require_once('system/productos/execution-arbol-categorias.php'); ?>
<style>
    .chzn-container{
        min-width: 150px !important;
    }
</style>
<div class="span9" id="content">


    <script>
        function cambiar(nam){
            var cadena = document.getElementById(nam).value;
            document.getElementById(nam).value = cadena.replace(",",".");
        }
    </script>

    <script>
        $(document).ready(function() {

            //Creando textareas con ckeditor v4.8.0_full
            CKEDITOR.replace('ncontenido');

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


    <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>IMÁGENES</h4>
        <p>Se pueden realizar más subidas de imagenés de un producto pinchando en el icono <i style="color: orange;" class="fa fa-picture-o fa-lg"></i> perteneciente al producto del que desea subir más imágenes.</p><p><strong>INFORMACIÓN:</strong> Se raliza de dicha manera para asegurar la subida de la imagen y evitar posibles errores.</p>
    </div>

    <div class="row-fluid" style="display:none;" id="msj_tope_categoria" class="msj_tope_categoria">
        <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Aviso!</h4>
            Ya has seleccionado 5 categorías.
        </div>
    </div>

    <div class="row-fluid">
        <div id="add" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Subir un Producto</div>
            </div>
            <div class="block-content collapse in">
                <ul class="nav nav-tabs nav-justified">
                    <li id="p1" class="div-tab-active" ><a href="#">General - Español</a></li>
                    <li id="p15" class="div-tab-active"><a href="#">Categorias</a></li>
                    <li id="p14" class="div-tab-active"><a href="#">Stock</a></li>
                    <li id="p11" class="div-tab-active"><a href="#">Tipo producto y visibilidad</a></li>
                    <li id="p9" class="div-tab-active"><a href="#">Atributos</a></li>
                    <li id="p12" class="div-tab-active"><a href="#">Etiquetas</a></li>
                    <li id="p13" class="div-tab-active"><a href="#">SEO</a></li>
                    <li id="p10" class="div-tab-active"><a href="#">F. Pago - Financiación</a></li>
                    <?php
                    foreach ($idiomas AS $idioma)
                    {
                        ?>
                        <li id="p<?=$idioma[id]?>" class="div-tab-active"><a href="#"><?=$idioma['nombre']?></a></li>
                        <?php
                    }
                    ?>
                </ul>
                <div class="span12" style="margin-bottom: 50px;">
                    <form id="form-new" action="productos.php?accion=subirpr" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div id="body-tab-p1" class="div-tabs">
                            <fieldset>
                                <legend>Subir Nuevo Producto General - Español</legend>
                                <div class="control-group">
                                    <label class="control-label" for="nnombre">Nombre </label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="nnombre" name="nombre" placeholder="Nombre del producto" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="ncontenido">Contenido</label>
                                    <div class="controls">
                                        <textarea id="ncontenido" name="contenido" class="input-xlarge" style="width: 810px; height: 200px"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="span5">
                                        <div class="control-group">
                                            <label class="control-label" for="nimagen">Imagen</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="nimagen" name="imagen" type="file" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>

                                        <div class="control-group" style="max-width: 100%;">
                                            <label class="control-label" for="niva">IVA </label>
                                            <div class="controls">
                                                <input type="text"  class="span9" id="niva" name="iva" placeholder="I.V.A. %" required onchange="calcula()">
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group" style="max-width: 100%;">
                                            <label class="control-label" for="nprecioiva">Precio con IVA </label>
                                            <div class="controls">
                                                <input type="text" class="span9" id="nprecioiva" name="precioiva" placeholder="Precio (Con IVA)" onchange="calcula()">
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                            </div>
                                        </div>
                                        <script>
                                            function calcula(){
                                                var precio = $('#nprecioiva').val();
                                                precio = precio.replace(",",".");
                                                var iva = $('#niva').val();
                                                if(iva >= 0 && iva != '' && precio >= 0 && precio != ''){
                                                    var total = parseFloat(precio) / parseFloat(1 + (parseFloat(iva)/100));
                                                    total = total.toFixed(4);
                                                    $('#nprecio').val(total);
                                                }else{
                                                    $('#nprecio').val('');
                                                }

                                            }
                                        </script>
                                        <div class="control-group" style="max-width: 100%;">
                                            <label class="control-label" for="nprecio">Precio </label>
                                            <div class="controls">
                                                <input type="text" class="span9" id="nprecio" name="precio" placeholder="Precio (Sin IVA)" onchange="cambiar('nprecio')" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group" style="max-width: 100%;">
                                            <label class="control-label" for="tprecio">Texto Alternativo Precio </label>
                                            <div class="controls">
                                                <input type="text" class="span9" id="tprecio" name="tprecio" placeholder="Texto alternativo precio">
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                            </div>
                                        </div>
                                        <div class="control-group" style="max-width: 100%;">
                                            <label class="control-label" for="comprecio">Comentario Precio </label>
                                            <div class="controls">
                                                <input type="text" class="span9" id="comprecio" name="comprecio" placeholder="Comentario precio">
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                            </div>
                                        </div>
                                        <div class="control-group" style="max-width: 100%;">
                                            <label class="control-label" for="ndescuento">Descuento % </label>
                                            <div class="controls">
                                                <input type="text" class="span9" id="ndescuento" name="descuento" placeholder="Descuento %">
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                <p style="color: #09F; font-size: 0.70rem;">Dejar a 0 para no aplicar</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="span5">
                                        <div class="control-group" style="max-width: 100%;">
                                            <label class="control-label" for="ndescuentoe">Descuento € </label>
                                            <div class="controls">
                                                <input type="text" class="span9" id="ndescuentoe" name="descuentoe" placeholder="Descuento €" onchange="cambiar('ndescuentoe')">
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                <p style="color: #09F; font-size: 0.70rem;">Solo se aplica si el descuento % está a 0. Dejar a 0 para no aplicar</p>
                                            </div>
                                        </div>

                                            <div class="control-group" style="max-width: 100%;">
                                                <label class="control-label" for="npeso">Peso </label>
                                                <div class="controls">
                                                    <input type="text" class="span9" id="npeso" name="peso" placeholder="Peso KG" required>
                                                    <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                </div>
                                            </div>
                                            <div class="control-group" style="max-width: 100%;">
                                                <label class="control-label" for="nreferencia">Referencia </label>
                                                <div class="controls">
                                                    <input type="text" class="span9" id="nreferencia" name="referencia" placeholder="Referencia">
                                                    <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                </div>
                                            </div>
                                            <div class="control-group" style="max-width: 100%;">
                                                <label class="control-label" for="ndisponibilidad">Disponibilidad </label>
                                                <div class="controls">
                                                    <input type="text" class="span9" id="ndisponibilidad" name="disponibilidad" placeholder="Disponibilidad">
                                                    <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                </div>
                                            </div>
                                            <div class="control-group" style="max-width: 100%;">
                                                <label class="control-label" for="nplazo">Plazo de entrega </label>
                                                <div class="controls">
                                                    <input type="text" class="span9" id="nplazo" name="plazoEnt" placeholder="Plazo de entrega">
                                                    <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                </div>
                                            </div>

                                            <div class="control-group">
                                                <label class="control-label" for="marca">Marca</label>
                                                <div class="controls">
                                                    <select id="marca" name="marca" class="chzn-select span4">
                                                        <option value="">Selecciona</option>
                                                        <?php
                                                        foreach ($listadoMar AS $listado)
                                                        {
                                                            ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['categoria']?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <script>
                                    function cambioTipo(){
                                        if(document.getElementById('tipo').value == 0 || document.getElementById('tipo').value == 3){
                                            $("#tranNo").attr('style', 'display: none;');
                                            $("#tranSi").attr('style', 'display: block;');
                                        }else{
                                            $("#tranSi").attr('style', 'display: none;');
                                            $("#tranNo").attr('style', 'display: block;');
                                        }
                                    }

                                </script>

                                <button id="registrar-new" type="submit" class="btn btn-primary" >Subir</button>
                                <button type="button" onclick="location.href = 'productos.php';" class="btn">Cancelar</button>
                            </fieldset>
                        </div>

                        <div id="body-tab-p11" class="div-tabs">
                            <div class="control-group">
                                <label class="control-label" for="tipo">Tipo de producto</label>
                                <div class="controls">
                                    <select id="tipo" name="tipo" class="chzn-select span4" required onchange="cambioTipo();">
                                        <option value="0">Normal - Venta</option>
                                        <option value="3">Normal - Alquiler</option>
                                        <option value="1">Descarga</option>
                                        <option value="2">Inscripción</option>
                                    </select>
                                    <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="mostraretq">Mostrar etiqueta tipo Producto</label>
                                <div class="controls">
                                    <label class="uniform">
                                        <input class="uniform_on" type="checkbox" name="mostraretq" id="mostraretq" checked value="1">
                                        Marcar para definir como visible la etiqueta tipo producto.
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="mostraretqAgo">Mostrar etiqueta Agotado</label>
                                <div class="controls">
                                    <label class="uniform">
                                        <input class="uniform_on" type="checkbox" name="mostraretqAgo" id="mostraretqAgo" value="1">
                                        Marcar para mostrar la etiqueta de Agotado.
                                    </label>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="pagotado">Producto Agotado</label>
                                <div class="controls">
                                    <select id="pagotado" name="pagotado" class="chzn-select span4" required>
                                        <option value="0">Seguir Vendiendo</option>
                                        <option value="1">Quitar Botón Añadir</option>
                                        <option value="2">Botón Solicitar Info (Enlazado con contactar)</option>
                                    </select>
                                    <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="agotado">Marcar Producto como Agotado</label>
                                <div class="controls">
                                    <select id="agotado" name="agotado" class="chzn-select span4" required>
                                        <option value="0">Disponible</option>
                                        <option value="1">Agotado</option>
                                    </select>
                                    <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="mostraretqOfe">Mostrar etiqueta Oferta</label>
                                <div class="controls">
                                    <label class="uniform">
                                        <input class="uniform_on" type="checkbox" name="mostraretqOfe" id="mostraretqOfe" value="1">
                                        Marcar para mostrar la etiqueta de Oferta.
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="display: none" id="tranNo">
                                <label class="control-label" for="tipo">Transporte</label>
                                <div class="controls">
                                    SIN TRANSPORTE.
                                </div>
                            </div>
                            <div class="control-group" style="display: block" id="tranSi">
                                <label class="control-label" for="tipo">Transporte</label>
                                <div class="controls">
                                    TRANSPORTE POR DEFECTO.
                                </div>
                            </div>
                            <div class="control-group" style="max-width: 60%;">
                                <label class="control-label" for="precio_t_i">Precio transporte individual </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="precio_t_i" name="precio_t_i" placeholder="Precio transporte individual">
                                    <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="ndisponible">Visible/Disponible</label>
                                <div class="controls">
                                    <label class="uniform">
                                        <input class="uniform_on" type="checkbox" name="ndisponible" id="ndisponible" checked value="1">
                                        Marcar para definir como visible/disponible para comprar
                                    </label>
                                </div>
                            </div>
                            <div class="control-group" style="max-width: 60%;">
                                <label class="control-label" for="norden">Orden </label>
                                <div class="controls">
                                    <input type="text" class="span6" id="norden" name="orden" placeholder="Orden">
                                    <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                </div>
                            </div>
                        </div>

                        <div id="body-tab-p15" class="div-tabs">
                            <fieldset>
                                <legend>Categorías</legend>
                                <div class="control-group" style="max-width: 60%;">


                                    <div id="nested" style="">
                                        <ul class="autoCheckbox">
                                            <?php
                                            //Mostrando categorías padres
                                            foreach($masters as $master){
                                                //Evaluando si la categoría padre tiene algún hijo
                                                if($master["have_childrens"]>0){
                                                    $have_childrens=1;
                                                }
                                                else{
                                                    $have_childrens=0;
                                                }
                                                ?>
                                                <li style="margin: 5px 0px">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input checkbox-cat" type="checkbox" name="categoria[]" value="<?php echo $master["idcat"]?>">
                                                        <a href="#" data-status="<?php echo $have_childrens?>"
                                                           style="margin: 5px 6px" class="btn btn-default btn-xs btn-folder">
                                                            <i class="fa fa-folder"></i>
                                                            <?php if($have_childrens == 1){?>
                                                                <span class='fa fa-plus-circle'></span>
                                                            <?php }?>
                                                            <?php echo $master["categoria"]?></a>
                                                        <?php
                                                        //Llamando función recursiva para mostrar categorias hijas
                                                        echo Tree::nested($childrens, $master["idcat"])
                                                        ?>
                                                    </div>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <span style="color: #09F; font-size: 0.70rem;">*Debe seleccionar hasta un máximo de 5 categorías</span><br>
                                    <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                </div>
                            </fieldset>
                        </div>
                        <div id="body-tab-p14" class="div-tabs">
                            <fieldset>
                                <legend>Stock</legend>
                                <div class="control-group" style="max-width: 60%;">
                                    <label class="control-label" for="nunidades">Unidades </label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="nunidades" name="unidades" placeholder="Unidades en stock" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                                <div class="control-group" style="max-width: 60%;">
                                    <label class="control-label" for="nstock">Stock Mínimo </label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="nstock" name="stock" placeholder="Stock mínimo" required>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="body-tab-p12" class="div-tabs">
                            <fieldset>
                                <legend>Etiquetas producto</legend>
                                <div class="control-group">

                                    <table>
                                        <tr>
                                            <?php
                                            $i = 0;
                                            $cont = 0;
                                            foreach ($elemento4 AS $atr){
                                            $i++;
                                            if($cont <= 4){
                                                $cont++;
                                                ?>
                                                <td style="width:10%;">
                                                    <div class="control-group">
                                                        <label style="text-align:center;"><b><?=$atr['nombre']?></b></label>
                                                        <div style="text-align:center;"><input type="checkbox" name="dispEtiq[]" id="atr<?=$atr['id']?>" value="<?=$atr['id']?>"></div>
                                                    </div>

                                                </td>
                                                <?php
                                            }else{
                                            $cont=1;
                                            ?>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="control-group">
                                                    <label style="text-align:center;"><b><?=$atr['nombre']?></b></label>
                                                    <div style="text-align:center;"><input type="checkbox" name="dispEtiq[]" id="atr<?=$atr['id']?>" value="<?=$atr['id']?>"></div>
                                                </div>

                                            </td>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                            </fieldset>
                        </div>

                        <div id="body-tab-p13" class="div-tabs">
                            <fieldset>
                                <legend>SEO</legend>
                                <div class="control-group" style="max-width: 60%;">
                                    <label class="control-label" for="nmetatitulo">Meta título SEO </label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="nmetatitulo" name="metatitulo" placeholder="Meta del titulo para SEO">
                                    </div>
                                </div>
                                <div class="control-group" style="max-width: 60%;">
                                    <label class="control-label" for="nmetadescripcion">Meta descripción SEO </label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="nmetadescripcion" name="metadescripcion" placeholder="Meta de la descripción para SEO">
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div id="body-tab-p9" class="div-tabs">
                            <fieldset>
                                <legend>Atributos producto</legend>
                                <div class="control-group">

                                    <table>
                                        <tr>
                                            <?php
                                            $i = 0;
                                            $con = 0;
                                            foreach ($elemento2 AS $atr){
                                            $i++;
                                            if($con <= 3){
                                                $con++;
                                                ?>
                                                <td style="width:10%;">
                                                    <div class="control-group">
                                                        <label style="text-align:center;"><b><?=$atr['nombre']?>: <?=$atr['atributo']?></b></label>
                                                        <div style="text-align:center;"><input type="checkbox" name="disp[]" id="atr<?=$atr['ida']?>" value="<?=$atr['ida']?>"></div>
                                                        <label style="text-align:center;margin-top:5px;">Precio</label>
                                                        <div style="text-align: center"><input style="width: 50%;text-align: center;" type="text" name="precio<?=$atr['ida']?>" placeholder="Precio" value="" />
                                                            <label style="text-align:center;margin-top:5px;">Precio Extra</label>
                                                            <div style="text-align: center"><input style="width: 50%;text-align: center;" type="text" name="precioE<?=$atr['ida']?>" placeholder="Precio Extra" value="" />
                                                                <input class="input-file uniform_on" id="imagenAtr<?=$atr['ida']?>" name="imagenAtr<?=$atr['ida']?>" type="file">
                                                            </div>
                                                        </div>

                                                </td>
                                                <?php
                                            }else{
                                            $con=1;
                                            ?>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="control-group">
                                                    <label style="text-align:center;"><b><?=$atr['nombre']?>: <?=$atr['atributo']?></b></label>
                                                    <div style="text-align:center;"><input type="checkbox" name="disp[]" id="atr<?=$atr['ida']?>" value="<?=$atr['ida']?>"></div>
                                                    <label style="text-align:center;margin-top:5px;">Precio</label>
                                                    <input  style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precio<?=$atr['ida']?>" placeholder="Precio" value="" />
                                                    <label style="text-align:center;margin-top:5px;">Precio Extra</label>
                                                    <div style="text-align: center"><input style="width: 50%;text-align: center;" type="text" name="precioE<?=$atr['ida']?>" placeholder="Precio Extra" value="" />
                                                        <div style="text-align: center"><input class="input-file uniform_on" id="imagenAtr<?=$atr['ida']?>" name="imagenAtr<?=$atr['ida']?>" type="file">
                                                        </div>
                                                    </div>

                                            </td>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </tr>
                                    </table>
                                    <label class="control-label" for="nfentrada">Requerir Fecha de Entrada</label>
                                    <div class="controls">
                                        <label class="uniform">
                                            <input class="uniform_on" type="checkbox" name="nfentrada" id="nfentrada" value="0">
                                            Marcar para requerir fecha de entrada
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="nfsalida">Requerir Fecha de Salida</label>
                                    <div class="controls">
                                        <label class="uniform">
                                            <input class="uniform_on" type="checkbox" name="nfsalida" id="nfsalida" value="0">
                                            Marcar para requerir fecha de salida
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="NCatAtriF">Fechas Asociadas con Caegoría de Atributos: </label>
                                    <div class="controls">
                                        <select id="NCatAtriF" name="NCatAtriF" class="chzn-select span4">
                                            <option value="0">Selecciona</option>
                                            <?php
                                            foreach ($listadoCatAtr AS $listado)
                                            {
                                                ?>
                                                <option value="<?=$listado['id']?>"><?=$listado['atributo']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <span style="color: green; font-size: 0.70rem;">Funcionamiento unido a Fecha de Entrada/Salida.</span><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="CatAtriF">Nº días máximo: </label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="maximoDias" name="maximoDias" value="0"  placeholder="Días máximos permitidos">
                                        <span style="color: green; font-size: 0.70rem;">0 para días ilimitados</span><br>
                                    </div>
                                </div>
                                <input type="hidden" name="catributos" value="<?=$i?>" />
                            </fieldset>
                        </div>
                        <div id="body-tab-p10" class="div-tabs">
                            <fieldset>
                                <legend>F. Pago - Financiación</legend>
                                <div class="control-group">
                                    <label class="control-label" for="tipo">Pago mensual Paypal</label>
                                    <div class="controls">
                                        <select id="tipo" name="paypalm" class="chzn-select span4" required>
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        </select>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="domicim">Pago mensual Domiciliación</label>
                                    <div class="controls">
                                        <select id="domicim" name="domicim" class="chzn-select span4" required>
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        </select>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <script>
                                    function abrirCuota(){
                                        if(document.getElementById("aplazame").value == 0){
                                            document.getElementById("vcuota").style.display='none';
                                        }else{
                                            document.getElementById("vcuota").style.display='block';
                                        }
                                    }
                                </script>
                                <div class="control-group">
                                    <label class="control-label" for="aplazame">Pago Aplazame</label>
                                    <div class="controls">
                                        <select id="aplazame" name="aplazame" class="chzn-select span4" required onchange="abrirCuota()">
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        </select>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                    </div>
                                </div>
                                <div id="vcuota" class="control-group" style="display: none; max-width: 60%;" >
                                    <label class="control-label" for="caplazame1">Cuota Inicial Aplazame</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="caplazame1" name="caplazame1" placeholder="Cuota inicial Aplazame">
                                        <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                    </div><br>
                                    <label class="control-label" for="caplazame">Cuota Aplazame</label>
                                    <div class="controls">
                                        <input type="text" class="span6" id="caplazame" name="caplazame" placeholder="Cuota mensual Aplazame">
                                        <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                    </div>
                                </div>
                                <script>
                                    function abrirFDir(){
                                        if(document.getElementById("fDirecta").value == 0){
                                            document.getElementById("finanDir").style.display='none';
                                        }else{
                                            document.getElementById("finanDir").style.display='block';
                                        }
                                    }
                                </script>
                                <div class="control-group">
                                    <label class="control-label" for="fDirecta">Financiación Directa</label>
                                    <div class="controls">
                                        <select id="fDirecta" name="fDirecta" class="chzn-select span4" required onchange="abrirFDir()">
                                            <option value="0">No</option>
                                            <option value="1">Si</option>
                                        </select>
                                        <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                        <p style="color: #09F; font-size: 0.70rem;">La cuota inicial será el precio del producto</p>
                                    </div>
                                </div>
                                <div id="finanDir" class="control-group" style="display: none;">
                                    <table>
                                        <tr>
                                            <?php
                                            $i = 0;
                                            $cont = 0;
                                            $check = "";
                                            $precio = "";
                                            foreach ($elemento3 AS $atr){
                                            $i++;
                                            foreach ($elemento33 AS $atra){
                                                if($atra['meses'] == $atr['id_c']){
                                                    $check = "checked";
                                                    $precio = $atra['cuota'];
                                                }
                                            }
                                            if($cont <= 4){
                                                $cont++;
                                                ?>
                                                <td style="width:10%;">
                                                    <div class="control-group">
                                                        <label style="text-align:center;"><b><?=$atr['meses']?> meses + Inicial</b></label>
                                                        <div style="text-align:center;"><input type="checkbox" name="cuotas[]" id="cuo<?=$atr['id_c']?>" value="<?=$atr['id_c']?>" <?=$check?>></div>
                                                        <label style="text-align:center;margin-top:5px;">Precio</label>
                                                        <div><input style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precioC<?=$atr['id_c']?>" onchange="cambiar('precioC<?=$atr['id_c']?>')" placeholder="Precio" value="<?=$precio?>" /></div>
                                                    </div>

                                                </td>
                                                <?php
                                            }else{
                                            $cont=1;
                                            ?>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="control-group">
                                                    <label style="text-align:center;"><b><?=$atr['meses']?> meses + Inicial</b></label>
                                                    <div style="text-align:center;"><input type="checkbox" name="cuotas[]" id="cuo<?=$atr['id_c']?>" value="<?=$atr['id_c']?>" <?=$check?>></div>
                                                    <label style="text-align:center;margin-top:5px;">Precio</label>
                                                    <input  style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precioC<?=$atr['id_c']?>" placeholder="Precio" value="<?=$precio?>" />
                                                </div>

                                            </td>
                                            <?php
                                            }
                                            $check = "";
                                            $precio = "";
                                            }
                                            ?>
                                        </tr>
                                    </table>
                                </div>
                            </fieldset>
                        </div>

                        <?php
                        foreach ($idiomas AS $idioma)
                        {
                            if($idioma['id'] == 2){
                                ?>
                                <div id="body-tab-p2" class="div-tabs">
                                    <fieldset>
                                        <legend>Subir Nuevo Producto Inglés</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nnombre">Nombre </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="nnombre" name="nombrein" placeholder="Nombre del producto">
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ncontenido">Contenido</label>
                                            <div class="controls">
                                                <textarea id="ncontenido" name="contenidoin" class="input-xlarge" style="width: 810px; height: 200px"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <?php
                            }

                            if($idioma['id'] == 3){
                                ?>
                                <div id="body-tab-p3" class="div-tabs">
                                    <fieldset>
                                        <legend>Subir Nuevo Producto Alemán</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nnombre">Nombre </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="nnombre" name="nombrea" placeholder="Nombre del producto">
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ncontenido">Contenido</label>
                                            <div class="controls">
                                                <textarea id="ncontenido" name="contenidoa" class="input-xlarge" style="width: 810px; height: 200px"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <?php
                            }

                            if($idioma['id'] == 4){
                                ?>
                                <div id="body-tab-p4">
                                    <fieldset>
                                        <legend>Subir Nuevo Producto Francés</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nnombre">Nombre </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="nnombre" name="nombref" placeholder="Nombre del producto">
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ncontenido">Contenido</label>
                                            <div class="controls">
                                                <textarea id="ncontenido" name="contenidof" class="input-xlarge" style="width: 810px; height: 200px"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <?php
                            }

                            if($idioma['id'] == 5){
                                ?>
                                <div id="body-tab-p5">
                                    <fieldset>
                                        <legend>Subir Nuevo Producto Italiano</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nnombre">Nombre </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="nnombre" name="nombreit" placeholder="Nombre del producto">
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ncontenido">Contenido</label>
                                            <div class="controls">
                                                <textarea id="ncontenido" name="contenidoit" class="input-xlarge" style="width: 810px; height: 200px"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <?php
                            }

                            if($idioma['id'] == 6){
                                ?>
                                <div id="body-tab-p6">
                                    <fieldset>
                                        <legend>Subir Nuevo Producto Portugués</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nnombre">Nombre </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="nnombre" name="nombrep" placeholder="Nombre del producto">
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ncontenido">Contenido</label>
                                            <div class="controls">
                                                <textarea id="ncontenido" name="contenidop" class="input-xlarge" style="width: 810px; height: 200px"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <?php
                            }

                            if($idioma['id'] == 7){
                                ?>
                                <div id="body-tab-p7">
                                    <fieldset>
                                        <legend>Subir Nuevo Producto Catalán</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nnombre">Nombre </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="nnombre" name="nombreca" placeholder="Nombre del producto">
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ncontenido">Contenido</label>
                                            <div class="controls">
                                                <textarea id="ncontenido" name="contenidoca" class="input-xlarge" style="width: 810px; height: 200px"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <?php
                            }

                            if($idioma['id'] == 8){
                                ?>
                                <div id="body-tab-p8">
                                    <fieldset>
                                        <legend>Subir Nuevo Producto Ruso</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nnombre">Nombre </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="nnombre" name="nombreru" placeholder="Nombre del producto">
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="ncontenido">Contenido</label>
                                            <div class="controls">
                                                <textarea id="ncontenido" name="contenidoru" class="input-xlarge" style="width: 810px; height: 200px"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <?php
                            }

                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- block -->

</div>
</div>
<?php require_once('blocks/pie.php'); ?>