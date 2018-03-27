<?php require_once('blocks/cabecera.php'); ?>
<?php require_once('system/productos/execution-arbol-categorias.php'); ?>
    <style>
        .chzn-container{
            min-width: 150px !important;
        }
        /* Style the buttons that are used to open and close the accordion panel */
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            text-align: left;
            border: none;
            outline: none;
            transition: 0.4s;
        }

        /* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
        .active, .accordion:hover {
            background-color: #ccc;
        }

        /* Style the accordion panel. Note: hidden by default */
        .panel {
            padding: 0 18px;
            background-color: white;
            display: none;
            overflow: hidden;
        }

        .collapse-button:hover {
            background: #3a87ad;
            color: #fff;
            font-weight: normal;
            text-decoration: none;
        }

        .collapse-button {
            width: 100%;
            text-align: left;
            background: #eee;
            margin-bottom: 5px;
            color: #333;
            font-weight: 500;
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
                var collapsed = '';
                $('.collapse-button').click(function(){
                    if(collapsed != ''){
                        $('#'+collapsed).hide();
                    }
                    $('#'+$(this).attr('data-label')).show();
                    collapsed = $(this).attr('data-label');
                });
                //Ocultando todas las pestañas
                $(".div-tabs").hide();
                //Mostrando sólo la pestaña principal
                $("#body-tab-pe1").show();
                $("#pe1").addClass('active');

                //Mostrando pestaña según selección
                $(".div-tab-active").on("click",function(){
                    $(".div-tabs").hide();
                    $(".div-tab-active").removeClass('active');
                    $("#body-tab-"+ $(this).attr("id")).show();
                    $("#"+ $(this).attr("id")).addClass('active');
                });

                //Validación de campos obligatorios
                $("#registrar-edit").click(function(){

                    var array_campos_required= new Array();
                    if($("#nombre").val() == "")
                        array_campos_required.push('Nombre');
                    if($("#iva").val() == "")
                        array_campos_required.push('IVA');
                    if($("#precio").val() == "")
                        array_campos_required.push('Precio');
                    if($("#peso").val() == "")
                        array_campos_required.push('Peso');
                    if($('input[type=checkbox].checkbox-cat:checked').length == 0)
                        array_campos_required.push('Categoría (Debe seleccionar al menos una categoría)');
                    if($("#unidades").val() == "")
                        array_campos_required.push('Unidades');
                    if($("#stock").val() == "")
                        array_campos_required.push('Stock Mínimo');

                    if(array_campos_required.length>0){
                        var tex_talerta='Los siguientes campos son obligatorios:\n\n';
                        for(var i=0;i<array_campos_required.length;i++)
                            var tex_talerta=tex_talerta+'* '+array_campos_required[i]+'\n';

                        alert(tex_talerta);

                        if(($('input[type=checkbox].checkbox-cat:checked').length == 0)  && ( $("#iva").val() != "" && $("#precio").val() != "" && $("#peso").val() != "")) {

                            $(".div-tabs").hide();
                            $(".div-tab-active").removeClass('active');
                            $("#body-tab-pe15").show();
                            $("#pe15").addClass('active');
                            return false;
                        }
                        else if(($("#unidades").val() == "" || $("#stock").val() == null) &&( $("#iva").val() != "" && $("#precio").val() != "" && $("#peso").val() != "")){

                            $(".div-tabs").hide();
                            $(".div-tab-active").removeClass('active');
                            $("#body-tab-pe14").show();
                            $("#pe14").addClass('active');
                            return false;
                        }
                    }
                    else{
                        $( "#form-edir" ).submit();
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

        <?php if (@$elemento != null && $resultaop != 1) { ?>
            <div class="row-fluid">
                <div id="edi" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Editar un Producto</div>
                    </div>
                    <div class="block-content collapse in">
                        <ul class="nav nav-tabs nav-justified">
                            <li id="pe1" class="div-tab-active" ><a href="#">General - Español</a></li>
                            <li id="pe15" class="div-tab-active"><a href="#">Categorias</a></li>
                            <li id="pe14" class="div-tab-active"><a href="#">Stock</a></li>
                            <li id="pe11" class="div-tab-active"><a href="#">Tipo producto y visibilidad</a></li>
                            <li id="pe9" class="div-tab-active"><a href="#">Atributos</a></li>
                            <li id="pe12" class="div-tab-active"><a href="#">Etiquetas</a></li>
                            <li id="pe13" class="div-tab-active"><a href="#">SEO</a></li>
                            <li id="pe10" class="div-tab-active"><a href="#">F. Pago - Financiación</a></li>
                            <?php
                            foreach ($idiomas AS $idioma)
                            {
                                ?>
                                <li id="pe<?=$idioma['id']?>" class="div-tab-active"><a href="#"><?=$idioma['nombre']?></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                        <div class="span12" style="margin-bottom: 50px;">
                            <form id="form-edir" action="productos.php?editarpr=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div id="body-tab-pe1" class="div-tabs">
                                    <fieldset>
                                        <legend>Editar <?=$elemento['nombre']?></legend>
                                        <div class="control-group">
                                            <label class="control-label" for="nombre">Nombre </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="nombre" name="nombre" value="<?=$elemento['nombre']?>" placeholder="Nombre del producto" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="contenido">Contenido</label>
                                            <div class="controls">
                                                <textarea id="contenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion']?></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="span5">
                                                    <div class="control-group">
                                                        <label class="control-label" for="imagen">Imagen</label>
                                                        <div class="controls">
                                                            <input class="input-file uniform_on" id="imagen" name="imagen" type="file">
                                                            <?php
                                                            if ($elemento['imagenprincipal'] != null)
                                                            {
                                                                ?>
                                                                <a style="color: #09F; font-size: 0.70rem;" href="../imagenesproductos/<?=$elemento['imagenprincipal']?>" target="_blank">ver imagen actual</a>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                    <div class="control-group" style="max-width: 100%;">
                                                        <label class="control-label" for="iva">IVA </label>
                                                        <div class="controls">
                                                            <input type="text" class="span9" id="iva" name="iva" value="<?=$elemento['iva']?>" placeholder="I.V.A. %" required onchange="calcula2()">
                                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group" style="max-width: 100%;">
                                                        <label class="control-label" for="nprecioiva">Precio con IVA </label>
                                                        <div class="controls">
                                                            <input type="text" class="span9" id="precioiva" name="precioiva" value="<?=  number_format($elemento['precio']*(1+($elemento['iva']/100)),2)?>" placeholder="Precio (Con IVA)" onchange="calcula2()">
                                                            <span style="color: red; font-size: 0.70rem;">Opcional</span>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function calcula2(){
                                                            var precio = $('#precioiva').val();
                                                            precio = precio.replace(",",".");
                                                            var iva = $('#iva').val();
                                                            if(iva >= 0 && iva != '' && precio >= 0 && precio != ''){
                                                                var total = parseFloat(precio) / parseFloat(1 + (parseFloat(iva)/100));
                                                                total = total.toFixed(4);
                                                                $('#precio').val(total);
                                                            }else{
                                                                $('#precio').val('');
                                                            }

                                                        }
                                                    </script>
                                                    <div class="control-group" style="max-width: 100%;">
                                                        <label class="control-label" for="precio">Precio </label>
                                                        <div class="controls">
                                                            <input type="text" class="span9" id="precio" name="precio" value="<?=$elemento['precio']?>" onchange="cambiar('precio')" placeholder="Precio (Sin IVA)" required>
                                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group" style="max-width: 100%;">
                                                        <label class="control-label" for="tprecio">Texto Alternativo Precio </label>
                                                        <div class="controls">
                                                            <input type="text" class="span9" id="tprecio" value="<?=$elemento['tprecio']?>" name="tprecio" placeholder="Texto alternativo precio">
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group" style="max-width: 100%;">
                                                        <label class="control-label" for="comprecio">Comentario Precio </label>
                                                        <div class="controls">
                                                            <input type="text" class="span9" id="comprecio" value="<?=$elemento['comprecio']?>" name="comprecio" placeholder="Comentario precio">
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group" style="max-width: 100%;">
                                                        <label class="control-label" for="descuento">Descuento % </label>
                                                        <div class="controls">
                                                            <input type="text" class="span9" id="descuento" name="descuento" value="<?=$elemento['descuento']?>" placeholder="Descuento %" required>
                                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                            <p style="color: #09F; font-size: 0.70rem;">Dejar a 0 para no aplicar</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="span5">
                                                <div class="control-group" style="max-width: 100%;">
                                                    <label class="control-label" for="descuentoe">Descuento € </label>
                                                    <div class="controls">
                                                        <input type="text" class="span9" id="descuentoe" name="descuentoe" value="<?=$elemento['descuentoe']?>" placeholder="Descuento €" required onchange="cambiar('descuentoe')">
                                                        <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                        <p style="color: #09F; font-size: 0.70rem;">Solo se aplica si el descuento % está a 0. Dejar a 0 para no aplicar</p>
                                                    </div>
                                                </div>
                                                <div class="control-group" style="max-width: 100%;">
                                                    <label class="control-label" for="peso">Peso </label>
                                                    <div class="controls">
                                                        <input type="text" class="span9" id="peso" name="peso" value="<?=$elemento['peso']?>" placeholder="Peso KG" required>
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                    </div>
                                                </div>
                                                <div class="control-group" style="max-width: 100%;">
                                                    <label class="control-label" for="referencia">Referencia </label>
                                                    <div class="controls">
                                                        <input type="text" class="span9" id="referencia" name="referencia" value="<?=$elemento['referencia']?>" placeholder="Referencia">
                                                        <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                    </div>
                                                </div>
                                                <div class="control-group" style="max-width: 100%;">
                                                    <label class="control-label" for="disponibilidad">Disponibilidad </label>
                                                    <div class="controls">
                                                        <input type="text" class="span9" id="disponibilidad" name="disponibilidad" value="<?=$elemento['disponibilidad']?>" placeholder="Disponibilidad">
                                                        <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                    </div>
                                                </div>
                                                <div class="control-group" style="max-width: 100%;">
                                                    <label class="control-label" for="plazoEnt">Plazo de Entrega </label>
                                                    <div class="controls">
                                                        <input type="text" class="span9" id="plazoEnt" name="plazoEnt" value="<?=$elemento['plazoEnt']?>" placeholder="Plazo de Entrega">
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
                                                                <option value="<?=$listado['id']?>" <?=$listado['id'] == $elemento['idmarca'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
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
                                            function cambioTipo2(){
                                                if(document.getElementById('tipo2').value == 0 || document.getElementById('tipo2').value == 3 ){
                                                    $("#tranNo2").attr('style', 'display: none;');
                                                    $("#tranSi2").attr('style', 'display: block;');
                                                }else{
                                                    $("#tranSi2").attr('style', 'display: none;');
                                                    $("#tranNo2").attr('style', 'display: block;');
                                                }
                                            }

                                        </script>


                                        <input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
                                        <button id="registrar-edit" class="btn btn-primary" >Modificar</button>
                                        <button type="button" onclick="location.href = 'productos.php';" class="btn">Cancelar</button>
                                    </fieldset>
                                </div>



                                <div id="body-tab-pe15" class="div-tabs">
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


                                                                <input class="form-check-input checkbox-cat" type="checkbox" name="categoria[]" value="<?php echo $master["idcat"]?>" <?=$master["idcat"] == $elemento['idcat'] || $master["idcat"] == $elemento['idcat2'] || $master["idcat"] == $elemento['idcat3'] || $master["idcat"] == $elemento['idcat4'] || $master["idcat"] == $elemento['idcat5'] ? ' checked' : ''?> >

                                                                <?=$master["idcat"]." - ".$elemento['idcat'] ?>

                                                                <a href="#" data-status="<?php echo $have_childrens?>"
                                                                   style="margin: 5px 6px" class="btn btn-default btn-xs btn-folder">
                                                                    <i class="fa fa-folder"></i>
                                                                    <?php if($have_childrens == 1){?>
                                                                        <span class='fa fa-plus-circle'></span>
                                                                    <?php }?>
                                                                    <?php echo $master["categoria"]?></a>
                                                                <?php
                                                                //Llamando función recursiva para mostrar categorias hijas
                                                                echo Tree::nested($childrens, $master["idcat"], $elemento)
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

                                <div id="body-tab-pe14" class="div-tabs">
                                    <fieldset>
                                        <legend>Stock</legend>
                                        <div class="control-group" style="max-width: 60%;">
                                            <label class="control-label" for="unidades">Unidades </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="unidades" name="unidades" value="<?=$elemento['unidades']?>" placeholder="Unidades en stock" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group" style="max-width: 60%;">
                                            <label class="control-label" for="stock">Stock Mínimo </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="stock" name="stock" value="<?=$elemento['stockminimo']?>" placeholder="Stock mínimo" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div id="body-tab-pe11" class="div-tabs">
                                    <div class="control-group">
                                        <label class="control-label" for="tipo">Tipo de producto</label>
                                        <div class="controls">
                                            <select id="tipo2" name="tipo" class="chzn-select span4" required onchange="cambioTipo2();">
                                                <option value="0" <?=($elemento['tipo'] == 0 || $elemento['tipo'] == '' || $elemento['tipo'] == null) ? 'selected' : ''?>>Normal - Venta</option>
                                                <option value="3"  <?=($elemento['tipo'] == 3) ? 'selected' : ''?>>Normal - Alquiler</option>
                                                <option value="1" <?=($elemento['tipo'] == 1) ? 'selected' : ''?>>Descarga</option>
                                                <option value="2" <?=($elemento['tipo'] == 2) ? 'selected' : ''?>>Inscripción</option>
                                            </select>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="mostraretq">Mostrar etiqueta tipo producto</label>
                                        <div class="controls">
                                            <label class="uniform">
                                                <input class="uniform_on" type="checkbox" name="mostraretq" id="mostraretq"<?=$elemento['mostraretq'] == 1 ? ' checked' : ''?> value="dis">
                                                Marcar para definir como visible la etiqueta tipo producto.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="mostraretqAgo">Mostrar etiqueta Agotado</label>
                                        <div class="controls">
                                            <label class="uniform">
                                                <input class="uniform_on" type="checkbox" name="mostraretqAgo" id="mostraretqAgo"<?=$elemento['mostraretqAgo'] == 1 ? ' checked' : ''?> value="dis">
                                                Marcar para mostrar la etiqueta de Agotado.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="pagotado">Producto Agotado</label>
                                        <div class="controls">
                                            <select id="pagotado" name="pagotado" class="chzn-select span4" required>
                                                <option value="0" <?=($elemento['pagotado'] == 0) ? 'selected' : ''?>>Seguir Vendiendo</option>
                                                <option value="1" <?=($elemento['pagotado'] == 1) ? 'selected' : ''?>>Quitar Botón Añadir</option>
                                                <option value="2" <?=($elemento['pagotado'] == 2) ? 'selected' : ''?>>Botón Solicitar Info (Enlazado con contactar)</option>
                                            </select>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="agotado">Marcar Producto como Agotado</label>
                                        <div class="controls">
                                            <select id="agotado" name="agotado" class="chzn-select span4" required>
                                                <option value="0" <?=($elemento['agotado'] == 0) ? 'selected' : ''?>>Disponible</option>
                                                <option value="1" <?=($elemento['agotado'] == 1) ? 'selected' : ''?>>Agotado</option>
                                            </select>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="mostraretqOfe">Mostrar etiqueta Oferta</label>
                                        <div class="controls">
                                            <label class="uniform">
                                                <input class="uniform_on" type="checkbox" name="mostraretqOfe" id="mostraretqOfe"<?=$elemento['mostraretqOfe'] == 1 ? ' checked' : ''?> value="dis">
                                                Marcar para mostrar la etiqueta de Oferta.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="control-group" style="display:<?=$elemento['tipo'] == 0 ? 'none' : 'block'?>" id="tranNo2">
                                        <label class="control-label" for="tipo">Transporte</label>
                                        <div class="controls">
                                            SIN TRANSPORTE.
                                        </div>
                                    </div>
                                    <div class="control-group" style="display: <?=$elemento['tipo'] == 0 ? 'block' : 'none'?>" id="tranSi2">
                                        <label class="control-label" for="tipo">Transporte</label>
                                        <div class="controls">
                                            TRANSPORTE POR DEFECTO.
                                        </div>
                                    </div>
                                    <div class="control-group" style="max-width: 60%;">
                                        <label class="control-label" for="precio_t_i">Precio transporte individual </label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="precio_t_i" name="precio_t_i" value="<?=$elemento['precio_transporte_ind']?>" placeholder="Precio transporte individual">
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="disponible">Visible/Disponible</label>
                                        <div class="controls">
                                            <label class="uniform">
                                                <input class="uniform_on" type="checkbox" name="disponible" id="disponible"<?=$elemento['disponible'] == 1 ? ' checked' : ''?> value="dis">
                                                Marcar para definir como visible/disponible para comprar
                                            </label>
                                        </div>
                                    </div>
                                    <div class="control-group" style="max-width: 60%;">
                                        <label class="control-label" for="orden">Orden </label>
                                        <div class="controls">
                                            <input type="text" class="span6" id="orden" name="orden" value="<?=$elemento['orden']?>" placeholder="Orden">
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                        </div>
                                    </div>
                                    <input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
                                </div>
                                <div id="body-tab-pe12" class="div-tabs">
                                    <fieldset>
                                        <legend>Etiquetas producto</legend>
                                        <div class="control-group">

                                            <table>
                                                <tr>
                                                    <?php
                                                    $i = 0;
                                                    $cont = 0;
                                                    $check = "";
                                                    $precio = "";
                                                    $imagen = "";
                                                    foreach ($elemento4 AS $atr){
                                                    $i++;
                                                    foreach ($elemento44 AS $atra){
                                                        if($atra['idetiqueta'] == $atr['id']){
                                                            $check = "checked";
                                                        }
                                                    }
                                                    if($cont <= 4){
                                                        $cont++;
                                                        ?>
                                                        <td style="width:10%;">
                                                            <div class="control-group">
                                                                <label style="text-align:center;"><b><?=$atr['nombre']?></b></label>
                                                                <div style="text-align:center;"><input type="checkbox" name="dispEtiq[]" id="atr<?=$atr['id']?>" value="<?=$atr['id']?>" <?=$check?>></div>
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
                                                            <div style="text-align:center;"><input type="checkbox" name="dispEtiq[]" id="atr<?=$atr['id']?>" value="<?=$atr['id']?>" <?=$check?>></div>
                                                        </div>

                                                    </td>
                                                    <?php
                                                    }
                                                    $check = "";
                                                    $precio = "";
                                                    $imagen = "";
                                                    }
                                                    ?>
                                                </tr>
                                            </table>
                                        </div>
                                    </fieldset>
                                </div>

                                <div id="body-tab-pe13" class="div-tabs">
                                    <fieldset>
                                        <legend>SEO</legend>
                                        <div class="control-group" style="max-width: 60%;">
                                            <label class="control-label" for="nmetatitulo">Meta título SEO </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="nmetatitulo" name="metatitulo" value="<?=$elemento['meta_titulo']?>" placeholder="Meta del titulo para SEO">
                                            </div>
                                        </div>
                                        <div class="control-group" style="max-width: 60%;">
                                            <label class="control-label" for="nmetadescripcion">Meta descripción SEO </label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="nmetadescripcion" name="metadescripcion" value="<?=$elemento['meta_descripcion']?>" placeholder="Meta de la descripción para SEO">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>

                                <div id="body-tab-pe9" class="div-tabs">
                                    <fieldset>
                                        <legend>Atributos producto</legend>
                                        <div class="control-group">

                                            
                                                    <?php
                                                    $i = 0;
                                                    $cont = 0;
                                                    $check = "";
                                                    $precio = "";
                                                    $imagen = "";
                                                    $atrDefault = 0;
                                                    $atrNombre = '';
                                                    $oldName = '';
                                                    $collapse = 0;
                                                    foreach ($elemento2 AS $atr){
                                                    $i++;
                                                    foreach ($elemento22 AS $atra){
                                                        if($atra['idatributo'] == $atr['ida']){
                                                            $check = "checked";
                                                            $precio = $atra['precio'];
                                                            $precioE = $atra['precioextra'];
                                                            $precioEP = $atra['precioextraporcentaje'];
                                                            $imagen = $atra['imagen'];
                                                            $atrDefault = $atra['atrDefecto'];
                                                        }
                                                    }
                                                    if($atrNombre != $atr['nombre']){
                                                        $collapse++;
                                                        $atrNombre = $atr['nombre'];
                                                        if($atrNombre != ''){
                                                            ?>
                                                            </tr>
                                                            </table>
                                                            </div>
                                                            <?php
                                                        }
                                                        
                                                    ?>
                                                    <div class="btn btn-link collapse-button" data-label="collapseAttr<?=$collapse?>"><?=$atr['nombre']?></div>
                                                    <div id="collapseAttr<?=$collapse?>" style="display:none">
                                                        <table>
                                                        <tr>
                                                    <?php
                                                    }
                                                    if($cont <= 4){
                                                        $cont++;
                                                        ?>
                                                        
                                                        <td style="width:10%;">
                                                            <div class="control-group">
                                                                <label style="text-align:center;"><b><?=$atr['nombre']?>: <?=$atr['atributo']?></b></label>
                                                                <div style="text-align:center;"><input type="checkbox" name="disp[]" id="atr<?=$atr['ida']?>" value="<?=$atr['ida']?>" <?=$check?>></div>
                                                                <label style="text-align:center;margin-top:5px;">Precio</label>
                                                                <div><input style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precio<?=$atr['ida']?>" placeholder="Precio" value="<?=$precio?>" /></div>
                                                                <label style="text-align:center;margin-top:5px;">Precio Extra</label>
                                                                <div><input style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precioE<?=$atr['ida']?>" placeholder="Precio Extra" value="<?=$precioE?>" /></div>
                                                                <label style="text-align:center;margin-top:5px;">Precio Extra (%)</label>
                                                                <div><input style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precioEP<?=$atr['ida']?>" placeholder="Precio Extra (%)" value="<?=$precioEP?>" /></div>
                                                                <div style="text-align: center"><input class="input-file uniform_on" id="imagenAtr_<?=$atr['ida']?>" name="imagenAtr_<?=$atr['ida']?>" type="file">
                                                                    <?php
                                                                    if ($imagen != null && $imagen != '')
                                                                    {
                                                                        ?>
                                                                        <br><a style="color: #09F; font-size: 0.70rem;" href="../imagenesproductosAtr/<?=$imagen?>" target="_blank">ver imagen actual</a>
                                                                        <?php
                                                                    }
                                                                    ?></div>
                                                                <div style="text-align:center">Atributo por defecto:<input type="checkbox" name="atrDef<?=$atr['ida']?>" id="atrDefault" <?php if($atrDefault == 1) echo 'checked'; ?>></div>
                                                            </div>

                                                        </td>
                                                        
                                                        <?php
                                                    }else{
                                                    $cont=1;
                                                    ?>
                                                
                                                <tr>
                                                    <td>
                                                        <div class="control-group">
                                                            <label style="text-align:center;"><b><?=$atr['nombre']?>: <?=$atr['atributo']?></b></label>
                                                            <div style="text-align:center;"><input type="checkbox" name="disp[]" id="atr<?=$atr['ida']?>" value="<?=$atr['ida']?>" <?=$check?>></div>
                                                            <label style="text-align:center;margin-top:5px;">Precio</label>
                                                            <input  style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precio<?=$atr['ida']?>" placeholder="Precio" value="<?=$precio?>" />
                                                            <label style="text-align:center;margin-top:5px;">Precio Extra</label>
                                                            <div><input style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precioE<?=$atr['ida']?>" placeholder="Precio Extra" value="<?=$precioE?>" /></div>
                                                                                                                            <label style="text-align:center;margin-top:5px;">Precio Extra (%)</label>
                                                                <div><input style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precioEP<?=$atr['ida']?>" placeholder="Precio Extra (%)" value="<?=$precioEP?>" /></div>
                                                                <label style="text-align:center;margin-top:5px;">Precio Extra (%)</label>
                                                                <div><input style="width: 50%;text-align: center;margin-left: 22%;" type="text" name="precioEP<?=$atr['ida']?>" placeholder="Precio Extra (%)" value="<?=$precioEP?>" /></div>
                                                            <div style="text-align: center"><input class="input-file uniform_on" id="imagenAtr_<?=$atr['ida']?>" name="imagenAtr_<?=$atr['ida']?>" type="file">
                                                                <?php
                                                                if ($imagen != null && $imagen != '')
                                                                {
                                                                    ?>
                                                                    <br><a style="color: #09F; font-size: 0.70rem;" href="../imagenesproductosAtr/<?=$imagen?>" target="_blank">ver imagen actual</a>
                                                                    <?php
                                                                }
                                                                ?></div>
                                                                <div style="text-align:center">Atributo por defecto: <input type="checkbox" name="atrDef<?=$atr['ida']?>" id="atrDefault" <?php if($atrDefault == 1) echo 'checked'; ?>></div>
                                                            </div>
                                                        
                                                    </td>
                                                    </tr>
                                                    <?php
                                                    }

                                                    $check = "";
                                                    $precio = "";
                                                    $imagen = "";
                                                    $precioE = "";
                                                    $atrDefault = 0;
                                                    }
                                                    ?>                                                
                                                </table>
                                            </div>
                                            <label class="control-label" for="rfentrada">Requerir Fecha de Entrada</label>
                                            <div class="controls">
                                                <label class="uniform">
                                                    <input class="uniform_on" type="checkbox" name="rfentrada" id="rfentrada"<?=$elemento['rfentrada'] == 1 ? ' checked' : ''?> value="dis">
                                                    Marcar para requerir fecha de entrada
                                                </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="rfsalida">Requerir Fecha de Salida</label>
                                            <div class="controls">
                                                <label class="uniform">
                                                    <input class="uniform_on" type="checkbox" name="rfsalida" id="rfsalida"<?=$elemento['rfsalida'] == 1 ? ' checked' : ''?> value="dis">
                                                    Marcar para requerir fecha de salida
                                                </label>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="CatAtriF">Fechas Asociadas con Caegoría de Atributos: </label>
                                            <div class="controls">
                                                <select id="CatAtriF" name="CatAtriF" class="chzn-select span4">
                                                    <option value="0">Selecciona</option>
                                                    <?php
                                                    foreach ($listadoCatAtr AS $listado)
                                                    {
                                                        ?>
                                                        <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['atributoAsociado'] ? ' selected' : ''?>><?=$listado['atributo']?></option>
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
                                                <input type="text" class="span6" id="maximoDias" name="maximoDias" value="<?=$elemento['DiasMax']?>" placeholder="Días máximos permitidos" required>
                                                <span style="color: green; font-size: 0.70rem;">0 para días ilimitados</span><br>
                                            </div>
                                        </div>
                                        <input type="hidden" name="catributos" value="<?=$i?>" />
                                    </fieldset>
                                </div>
                                <div id="body-tab-pe10" class="div-tabs">
                                    <fieldset>
                                        <legend>F. Pagos - Financiación</legend>
                                        <div class="control-group">
                                            <label class="control-label" for="paypalm">Pago mensual Paypal</label>
                                            <div class="controls">
                                                <select id="paypalm" name="paypalm" class="chzn-select span4" required>
                                                    <option value="0" <?=($elemento['paypalm'] == 0) ? 'selected' : ''?>>No</option>
                                                    <option value="1" <?=($elemento['paypalm'] == 1) ? 'selected' : ''?>>Si</option>
                                                </select>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="domicim">Pago mensual Domiciliación</label>
                                            <div class="controls">
                                                <select id="domicim" name="domicim" class="chzn-select span4" required>
                                                    <option value="0" <?=($elemento['domicim'] == 0) ? 'selected' : ''?>>No</option>
                                                    <option value="1" <?=($elemento['domicim'] == 1) ? 'selected' : ''?>>Si</option>
                                                </select>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                            </div>
                                        </div>
                                        <script>
                                            function abrirCuota2(){
                                                if(document.getElementById("aplazame2").value == 0){
                                                    document.getElementById("vcuota2").style.display='none';
                                                }else{
                                                    document.getElementById("vcuota2").style.display='block';
                                                }
                                            }
                                        </script>
                                        <div class="control-group">
                                            <label class="control-label" for="aplazame">Pago Aplazame</label>
                                            <div class="controls">
                                                <select id="aplazame2" name="aplazame" class="chzn-select span4" required onchange="abrirCuota2()">
                                                    <option value="0" <?=($elemento['aplazame'] == 0) ? 'selected' : ''?>>No</option>
                                                    <option value="1" <?=($elemento['aplazame'] == 1) ? 'selected' : ''?>>Si</option>
                                                </select>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                            </div>
                                        </div>
                                        <div id="vcuota2" class="control-group" style="display: <?=($elemento['aplazame'] == 1) ? 'block' : 'none'?>; max-width: 60%;">
                                            <label class="control-label" for="caplazame1">Cuota Inicial Aplazame</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="caplazame111" name="caplazame1" placeholder="Cuota inicial Aplazame" value="<?=$elemento['caplazame1']?>" onchange="cambiar('caplazame111')">
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                            </div><br>
                                            <label class="control-label" for="caplazame">Cuota Aplazame</label>
                                            <div class="controls">
                                                <input type="text" class="span6" id="caplazame222" name="caplazame" placeholder="Cuota mensual Aplazame" value="<?=$elemento['caplazame']?>" onchange="cambiar('caplazame222')">
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                            </div>
                                        </div>
                                        <script>
                                            function abrirFDir2(){
                                                if(document.getElementById("fDirecta2").value == 0){
                                                    document.getElementById("finanDir2").style.display='none';
                                                }else{
                                                    document.getElementById("finanDir2").style.display='block';
                                                }
                                            }
                                        </script>
                                        <div class="control-group">
                                            <label class="control-label" for="fDirecta">Financiación Directa</label>
                                            <div class="controls">
                                                <select id="fDirecta2" name="fDirecta" class="chzn-select span4" required onchange="abrirFDir2()">
                                                    <option value="0" <?=($elemento['fDirecta'] == 0) ? 'selected' : ''?>>No</option>
                                                    <option value="1" <?=($elemento['fDirecta'] == 1) ? 'selected' : ''?>>Si</option>
                                                </select>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                                <p style="color: #09F; font-size: 0.70rem;">La cuota inicial será el precio del producto</p>
                                            </div>
                                        </div>
                                        <div id="finanDir2" class="control-group" style="display: <?=$elemento['fDirecta'] == 0 ? 'none' : 'block'?>;">
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
                                                                <div style="text-align:center;"><input type="checkbox" name="cuotas[]" id="cuo<?=$atr['id_c']?>" value="<?=$atr['id_c']?>" onchange="cambiar('cuo<?=$atr['id_c']?>')" <?=$check?>></div>
                                                                <label style="text-align:center;margin-top:5px;">Precio</label>
                                                                <div><input style="width: 50%;text-align: center;margin-left: 22%;" type="text" id="precioC<?=$atr['id_c']?>" name="precioC<?=$atr['id_c']?>" onchange="cambiar('precioC<?=$atr['id_c']?>')" placeholder="Precio" value="<?=$precio?>" /></div>
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
                                                            <div style="text-align:center;"><input type="checkbox" name="cuotas[]" id="cuo<?=$atr['id_c']?>" value="<?=$atr['id_c']?>" onchange="cambiar('cuo<?=$atr['id_c']?>')" <?=$check?>></div>
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
                                //echo "hola";
                                foreach ($idiomas AS $idioma)
                                {
                                    $cont = 0;
                                    foreach ($idiomasprod AS $idiomam)
                                    {

                                        if($idioma['iniciales'] == $idiomam['idioma']){
                                            $cont = 1;
                                            ?>
                                            <div id="body-tab-pe<?=$idioma['id']?>" class="div-tabs">
                                                <fieldset>
                                                    <legend>Editar Producto en <?=$idioma['nombre']?></legend>
                                                    <div class="control-group">
                                                        <label class="control-label" for="nnombre">Nombre </label>
                                                        <div class="controls">
                                                            <input type="text" class="span6" id="nnombre" name="nombre<?=$idioma['id']?>" placeholder="Nombre del producto" value="<?=$idiomam['nombre']?>">
                                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                        </div>
                                                    </div>
                                                    <div class="control-group">
                                                        <label class="control-label" for="ncontenido">Contenido</label>
                                                        <div class="controls">
                                                            <textarea id="ncontenido" name="contenido<?=$idioma['id']?>" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$idiomam['descripcion']?></textarea>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <?php
                                        }
                                    }
                                    if($cont == 0){
                                        ?>
                                        <div id="body-tab-pe<?=$idioma['id']?>" class="div-tabs">
                                            <fieldset>
                                                <legend>Editar Producto en <?=$idioma['nombre']?></legend>
                                                <div class="control-group">
                                                    <label class="control-label" for="nnombre">Nombre </label>
                                                    <div class="controls">
                                                        <input type="text" class="span6" id="nnombre" name="nombre<?=$idioma['id']?>" placeholder="Nombre del producto" value="">
                                                        <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                    </div>
                                                </div>
                                                <div class="control-group">
                                                    <label class="control-label" for="ncontenido">Contenido</label>
                                                    <div class="controls">
                                                        <textarea id="ncontenido" name="contenido<?=$idioma['id']?>" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
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
        <?php } ?>
        <!-- block -->

    </div>
    </div>
<?php require_once('blocks/pie.php'); ?>