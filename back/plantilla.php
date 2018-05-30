<?php
require_once('system/personalizacion/execution-personalizar.php');
require_once('blocks/cabecera.php');
?>
<div class="span9" id="content">
    <?php if ($resultaop ){ ?>
    <div class="row-fluid">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Correcto</h4>
            La operación se ha realizado correctamente.
        </div>
    </div>
    <?php }

					if ($resultaop1 || $resultaop2) { ?>
    <div class="row-fluid">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Correcto</h4>
            <?=$_POST['combinacion_top_final']?><br>

        </div>
    </div>
    <?php } ?>

    <style>
        #modal {
            width:100%; /*Toma el 100% del ancho de la página*/
            height:100%; /*Toma el 100% del alto de la página*/
            position:fixed; /*Con este código hacemos que el contenedor se mantenga en la pantalla y para que tome las dimensiones del body y no de la entrada*/
            background-color: rgba(1, 1, 1, 0.9); /*Color de fondo, incluye opacidad del 90%*/
            vertical-align: middle;
            top:0; /*Position superior*/
            left:0; /*Posición lateral*/
            z-index:99999999; /*Evitamos que algún elemento del blog sobreponga la ventana modal*/
        }
        #contenido-interno { 
            margin:2% auto; /*Separación arriba y centrado*/
            vertical-align: middle;
            font-size:12px; /*Tamaño de la fuente*/
            height:auto; /*Ancho del contenedor*/
            width:auto;
            text-align:center; /*Alineación del texto*/
            color:#222; /*Color del texto*/
            background:rgba(255, 255, 255, 0); /*Color de fondo*/
        }
        #myImg{
            width: auto;
            height: 635px;
            border-radius: 25px;
            -webkit-border-radius: 25px;
            -moz-border-radius: 25px;
        }
        .wrongField{
            border: solid red 2px !important;
        }
    </style>

    <script type="text/javascript">
        function mostrareldiv(url) {
                        document.getElementById("modal").style.display = "block" ; // permite asignar display:block al elemento #modal
                        document.getElementById("myImg").src = url;
                        }

                        function ocultareldiv() {
                        document.getElementById("modal").style.display = "none" ; // permite ocultar el contenedor al hacer clic en alguna parte de éste mediante display:none en el elemento #modal
                        }
        function checkInputs(){
            var send = true;
            
            jQuery("form#myform_plantilla input[type=text]").each(function(){
                var input = jQuery(this);
                console.log(input[0].value);
                if(input[0].value == ''){
                    send = false;
                    input.addClass('wrongField');
                }
                else
                    input.removeClass('wrongField');
            });

            if(send == true)
                jQuery('#myform_plantilla').submit();

            else
                alert('Verifique los campos resaltados.');
        }
    </script>

    <script>
        jQuery(document).ready(function() {
            jQuery('#btn-guardar').click(checkInputs);
                            //Ocultando todas las pestañas
                            jQuery(".div-tabs").hide();
                            //Mostrando sólo la pestaña principal
                            jQuery("#body-tab-p1").show();
                            jQuery("#p1").addClass('active');

                            //Mostrando pestaña según selección
                            jQuery(".div-tab-active").on("click",function(){
                                jQuery(".div-tabs").hide();
                                jQuery(".div-tab-active").removeClass('active');
                                jQuery("#body-tab-"+ jQuery(this).attr("id")).show();
                                jQuery("#"+ jQuery(this).attr("id")).addClass('active');

                                //Ocultar botón de enviar en la pestaña de combinaciones
                                if(jQuery(this).attr("id") == 'p6')
                                    jQuery("#btn-guardar").hide();
                                else
                                    jQuery("#btn-guardar").show();
                            });

                            jQuery("#combinacion_top").on("change",function(){

                                //Verificando el tipo de combinación
                                if(jQuery("#combinacion_top").val() == 1){
                                    jQuery("#inicio_top").val(15);//Inicio web: Remax
                                    jQuery("#productos_top").val(4);//galeria de productos: Movement Design template
                                    jQuery("#producto_top").val(4);//Detalle de producto: Movement Design template
                                    jQuery("#cabecera_top").val(15);//Cabecera: Remax
                                    jQuery("#pie_top").val(15);//Pie: Remax

                                    jQuery("#color_fondo_menu_top").val('#ffffff');
                                    jQuery("#color_letras_menu_top").val('#000000');
                                    jQuery("#color_pie_top").val('#ffffff');

                                    jQuery("#pg_ini_img_princimal").val('');
                                    jQuery("#pg_ini_derecha_top").val('');
                                    jQuery("#pg_ini_izquierda_top").val('');

                                    //Buscador Avanzado
                                    jQuery("#buscador_avanzado").val(1);

                                    //Mensaje_combinación
                                    var mensaje_combinacion = "<b>Haz activado la combinación 1</b><br>"+
                                        "<b>*Inicio web:</b> Remax<br>"+
                                        "<b>*Galeria de productos:</b> Movement Design template<br>"+
                                        "<b>*Detalle de producto:</b> Movement Design template<br>"+
                                        "<b>*Cabecera:</b> Remax<br>"+
                                        "<b>*Pie:</b> Remax<br>"+
                                        "<b>*Color fondo menú:</b> #ffffff<br>"+
                                        "<b>*Color letras menú:</b> #000000<br>"+
                                        "<b>*Color pié:</b> #ffffff<br>"+
                                        "<b>*Páginas:</b> Inicio derecha e Izquierda se vaciaron todos los campos(imagenes incluidas)<br>"+
                                        "<b>*Buscador avanzado:</b> Activado<br>";
                                }
                                else if(jQuery("#combinacion_top").val() == 2){

                                    jQuery("#inicio_top").val(4);//Inicio web: Movement design template
                                    jQuery("#productos_top").val(4);//galeria de productos: Movement Design template
                                    jQuery("#producto_top").val(4);//Detalle de producto: Movement Design template
                                    jQuery("#cabecera_top").val(15);//Cabecera: Remax
                                    jQuery("#pie_top").val(15);//Pie.Remax

                                    jQuery("#color_fondo_menu_top").val('FALSE');
                                    jQuery("#color_letras_menu_top").val('FALSE');
                                    jQuery("#color_pie_top").val('FALSE');

                                    jQuery("#pg_ini_img_princimal").val('FALSE');
                                    jQuery("#pg_ini_derecha_top").val('FALSE');
                                    jQuery("#pg_ini_izquierda_top").val('FALSE');

                                    //Buscador Avanzado
                                    jQuery("#buscador_avanzado").val('FALSE');

                                    //Mensaje_combinación
                                    var mensaje_combinacion = "<b>Haz activado la combinación 2</b><br>"+
                                        "<b>*Inicio web:</b> Movement design template<br>"+
                                        "<b>*Galeria de productos:</b> Movement Design template<br>"+
                                        "<b>*Detalle de producto:</b> Movement Design template<br>"+
                                        "<b>*Cabecera:</b> Remax<br>"+
                                        "<b>*Pie:</b> Remax<br>";
                                }
                                else if(jQuery("#combinacion_top").val() == 3){

                                    jQuery("#inicio_top").val(4);//Inicio web: Movement design template
                                    jQuery("#productos_top").val(4);//galeria de productos: Movement Design template
                                    jQuery("#producto_top").val(4);//Detalle de producto: Movement Design template
                                    jQuery("#cabecera_top").val(4);//Cabecera: Movement Design template
                                    jQuery("#pie_top").val(4);//Pie.Movement Design template

                                    jQuery("#color_fondo_menu_top").val('FALSE');
                                    jQuery("#color_letras_menu_top").val('FALSE');
                                    jQuery("#color_pie_top").val('FALSE');

                                    jQuery("#pg_ini_img_princimal").val('FALSE');
                                    jQuery("#pg_ini_derecha_top").val('FALSE');
                                    jQuery("#pg_ini_izquierda_top").val('FALSE');

                                    //Buscador Avanzado
                                    jQuery("#buscador_avanzado").val('FALSE');

                                    var mensaje_combinacion = "<b>Haz activado la combinación 3</b><br>"+
                                        "<b>*Inicio web:</b> Movement design template<br>"+
                                        "<b>*Galeria de productos:</b> Movement Design template<br>"+
                                        "<b>*Detalle de producto:</b> Movement Design template<br>"+
                                        "<b>*Cabecera:</b> Movement Design template<br>"+
                                        "<b>*Pie:</b> Movement Design template<br>";
                                }
                                else if(jQuery("#combinacion_top").val() == 4){

                                    jQuery("#inicio_top").val(13);
                                    jQuery("#productos_top").val(4);//Galería de productos: Movement design template
                                    jQuery("#producto_top").val(2);//Detalle de producto: Blind Design template
                                    jQuery("#cabecera_top").val(10);//Cabecera: Logo max
                                    jQuery("#pie_top").val(4);//Pie.Movement Design template

                                    jQuery("#color_fondo_menu_top").val('FALSE');
                                    jQuery("#color_letras_menu_top").val('FALSE');
                                    jQuery("#color_pie_top").val('FALSE');

                                    jQuery("#pg_ini_img_princimal").val('FALSE');
                                    jQuery("#pg_ini_derecha_top").val('FALSE');
                                    jQuery("#pg_ini_izquierda_top").val('FALSE');

                                    //Buscador Avanzado
                                    jQuery("#buscador_avanzado").val('FALSE');

                                    var mensaje_combinacion = "<b>Haz activado la combinación 4</b><br>"+
                                        "<b>*Inicio web:</b> Categorias (Padre)<br>"+
                                        "<b>*Galeria de productos:</b> Movement Design template<br>"+
                                        "<b>*Detalle de producto:</b> Blind Design template<br>"+
                                        "<b>*Cabecera:</b> Logo max<br>"+
                                        "<b>*Pie:</b> Movement Design template<br>";
                                }

                                jQuery("#combinacion_top_final").val(mensaje_combinacion);
                                //Guardar cambios
                                if (confirm('¿Estas seguro de cambiar a la combinación '+jQuery("#combinacion_top").val()+'?\nCualquier cambio que hayas hecho en este momento en el formulario se perderá.'))
                                    jQuery( "#myForm_combinaciones" ).submit();
                            });
                        });
    </script>

    <div onclick="ocultareldiv()" id="modal" style="display:none">
        <div id="contenido-interno">
            <img id="myImg" src="">
        </div>
    </div>

    <div class="row-fluid">
        <div id="edi" class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Editar línea de estilo</div>
            </div>
            <div class="block-content collapse in">

                <ul class="nav nav-tabs nav-justified">
                    <li id="p1" class="div-tab-active"><a href="#">Inicio web</a></li>
                    <li id="p2" class="div-tab-active"><a href="#">Galeria de productos</a></li>
                    <li id="p3" class="div-tab-active"><a href="#">Detalle de producto</a></li>
                    <li id="p4" class="div-tab-active"><a href="#">Cabecera</a></li>
                    <li id="p5" class="div-tab-active"><a href="#">Pie </a></li>
                    <li id="p6" class="div-tab-active"><a href="#">Combinaciones TOP</a></li>
                </ul>

                <form id="myform_plantilla" action="plantilla.php?configurarplantilla=true" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="span12">
                        <div id="body-tab-p1" class="div-tabs">
                            <fieldset>

                                <legend>Líneas de estilo para la web</legend>

                                <div class="control-group">
                                    <label class="control-label" for="inicio">Inicio web</label>
                                    <div class="controls">
                                        <select id="inicio" name="inicio" class="">
                                                    <option value="0" <?=($elemento['inicio'] == 0 ? ' selected' : '')?>>Default template</option>
                                                    <option value="1" <?=($elemento['inicio'] == 1 ? ' selected' : '')?>>Good Design template</option>
                                                    <option value="2" <?=($elemento['inicio'] == 2 ? ' selected' : '')?>>Double Carousel template</option>
                                                    <option value="3" <?=($elemento['inicio'] == 3 ? ' selected' : '')?>>Direct Products template</option>
                                                    <option value="4" <?=($elemento['inicio'] == 4 ? ' selected' : '')?>>Movement Design template</option>
                                                    <option value="8" <?=($elemento['inicio'] == 8 ? ' selected' : '')?>>Tuc</option>
                                                    <option value="9" <?=($elemento['inicio'] == 9 ? ' selected' : '')?>>Categorías (Hijos)</option>
                                                    <option value="11" <?=($elemento['inicio'] == 11 ? ' selected' : '')?>>Banak</option>
                                                    <option value="13" <?=($elemento['inicio'] == 13 ? ' selected' : '')?>>Categorías (Padre)</option>
                                                    <option value="15" <?=($elemento['inicio'] == 15 ? ' selected' : '')?>>Remax</option>
                                                    <option value="16" <?=($elemento['inicio'] == 16 ? ' selected' : '')?>>Minimal Fixed (Bootstrap)</option>
                                                    <option value="17" <?=($elemento['inicio'] == 17 ? ' selected' : '')?>>Container Responsive (Bootstrap)</option>
                                        </select><br>
                                    </div><br>
                                    <div class="control-group">
                                        <label class="control-label" for="inicio">Efecto</label>
                                        <div class="controls">
                                            <select id="efecto" name="efecto" class="">
                                                    <option value="imghvr-fade" <?=($elemento['efecto'] == 'imghvr-fade' ? ' selected' : '')?>>imghvr-fade</option>
                                                    <option value="imghvr-push-up" <?=($elemento['efecto'] == 'imghvr-push-up' ? ' selected' : '')?>>imghvr-push-up</option>
                                                    <option value="imghvr-push-down" <?=($elemento['efecto'] == 'imghvr-push-down' ? ' selected' : '')?>>imghvr-push-down</option>
                                                    <option value="imghvr-push-left" <?=($elemento['efecto'] == 'imghvr-push-left' ? ' selected' : '')?>>imghvr-push-left</option>
                                                    <option value="imghvr-push-right" <?=($elemento['efecto'] == 'imghvr-push-right' ? ' selected' : '')?>>imghvr-push-right</option>
                                                    <option value="imghvr-slide-up" <?=($elemento['efecto'] == 'imghvr-slide-up' ? ' selected' : '')?>>imghvr-slide-up</option>
                                                    <option value="imghvr-slide-down" <?=($elemento['efecto'] == 'imghvr-slide-down' ? ' selected' : '')?>>imghvr-slide-down</option>
                                                    <option value="imghvr-slide-left" <?=($elemento['efecto'] == 'imghvr-slide-left' ? ' selected' : '')?>>imghvr-slide-left</option>
                                                    <option value="imghvr-slide-right" <?=($elemento['efecto'] == 'imghvr-slide-right' ? ' selected' : '')?>>imghvr-slide-right</option>
                                                    <option value="imghvr-reveal-up" <?=($elemento['efecto'] == 'imghvr-reveal-up' ? ' selected' : '')?>>imghvr-reveal-up</option>
                                                    <option value="imghvr-reveal-down" <?=($elemento['efecto'] == 'imghvr-reveal-down' ? ' selected' : '')?>>imghvr-reveal-down</option>
                                                    <option value="imghvr-reveal-left" <?=($elemento['efecto'] == 'imghvr-reveal-left' ? ' selected' : '')?>>imghvr-reveal-left</option>
                                                    <option value="imghvr-reveal-right" <?=($elemento['efecto'] == 'imghvr-reveal-right' ? ' selected' : '')?>>imghvr-reveal-right</option>
                                                    <option value="imghvr-hinge-up" <?=($elemento['efecto'] == 'imghvr-hinge-up' ? ' selected' : '')?>>imghvr-hinge-up</option>
                                                    <option value="imghvr-hinge-down" <?=($elemento['efecto'] == 'imghvr-hinge-down' ? ' selected' : '')?>>imghvr-hinge-down</option>
                                                    <option value="imghvr-hinge-left" <?=($elemento['efecto'] == 'imghvr-hinge-left' ? ' selected' : '')?>>imghvr-hinge-left</option>
                                                    <option value="imghvr-hinge-right" <?=($elemento['efecto'] == 'imghvr-hinge-right' ? ' selected' : '')?>>imghvr-hinge-right</option>
                                                    <option value="imghvr-flip-horiz" <?=($elemento['efecto'] == 'imghvr-flip-horiz' ? ' selected' : '')?>>imghvr-flip-horiz</option>
                                                    <option value="imghvr-flip-vert" <?=($elemento['efecto'] == 'imghvr-flip-vert' ? ' selected' : '')?>>imghvr-flip-vert</option>
                                                    <option value="imghvr-flip-diag-1" <?=($elemento['efecto'] == 'imghvr-flip-diag-1' ? ' selected' : '')?>>imghvr-flip-diag-1</option>
                                                    <option value="imghvr-flip-diag-2" <?=($elemento['efecto'] == 'imghvr-flip-diag-2' ? ' selected' : '')?>>imghvr-flip-diag-2</option>
                                                    <option value="imghvr-shutter-out-horiz" <?=($elemento['efecto'] == 'imghvr-shutter-out-horiz' ? ' selected' : '')?>>imghvr-shutter-out-horiz</option>
                                                    <option value="imghvr-shutter-out-vert" <?=($elemento['efecto'] == 'imghvr-shutter-out-vert' ? ' selected' : '')?>>imghvr-shutter-out-vert</option>
                                                    <option value="imghvr-shutter-out-diag-1" <?=($elemento['efecto'] == 'imghvr-shutter-out-diag-1' ? ' selected' : '')?>>imghvr-shutter-out-diag-1</option>
                                                    <option value="imghvr-shutter-out-diag-2" <?=($elemento['efecto'] == 'imghvr-shutter-out-diag-2' ? ' selected' : '')?>>imghvr-shutter-out-diag-2</option>
                                                    <option value="imghvr-shutter-in-horiz" <?=($elemento['efecto'] == 'imghvr-shutter-in-horiz' ? ' selected' : '')?>>imghvr-shutter-in-horiz</option>
                                                    <option value="imghvr-shutter-in-vert" <?=($elemento['efecto'] == 'imghvr-shutter-in-vert' ? ' selected' : '')?>>imghvr-shutter-in-vert</option>
                                                    <option value="imghvr-shutter-in-out-horiz" <?=($elemento['efecto'] == 'imghvr-shutter-in-out-horiz' ? ' selected' : '')?>>imghvr-shutter-in-out-horiz</option>
                                                    <option value="imghvr-shutter-in-out-vert" <?=($elemento['efecto'] == 'imghvr-shutter-in-out-vert' ? ' selected' : '')?>>imghvr-shutter-in-out-vert</option>
                                                    <option value="imghvr-shutter-in-out-diag-1" <?=($elemento['efecto'] == 'imghvr-shutter-in-out-diag-1' ? ' selected' : '')?>>imghvr-shutter-in-out-diag-1</option>
                                                    <option value="imghvr-shutter-in-out-diag-2" <?=($elemento['efecto'] == 'imghvr-shutter-in-out-diag-2' ? ' selected' : '')?>>imghvr-shutter-in-out-diag-2</option>
                                                    <option value="imghvr-fold-up" <?=($elemento['efecto'] == 'imghvr-fold-up' ? ' selected' : '')?>>imghvr-fold-up</option>
                                                    <option value="imghvr-fold-down" <?=($elemento['efecto'] == 'imghvr-fold-down' ? ' selected' : '')?>>imghvr-fold-down</option>
                                                    <option value="imghvr-fold-left" <?=($elemento['efecto'] == 'imghvr-fold-left' ? ' selected' : '')?>>imghvr-fold-left</option>
                                                    <option value="imghvr-fold-right" <?=($elemento['efecto'] == 'imghvr-fold-right' ? ' selected' : '')?>>imghvr-fold-right</option>
                                                    <option value="imghvr-zoom-in" <?=($elemento['efecto'] == 'imghvr-zoom-in' ? ' selected' : '')?>>imghvr-zoom-in</option>
                                                    <option value="imghvr-zoom-out" <?=($elemento['efecto'] == 'imghvr-zoom-out' ? ' selected' : '')?>>imghvr-zoom-out</option>
                                                    <option value="imghvr-zoom-out-up" <?=($elemento['efecto'] == 'imghvr-zoom-out-up' ? ' selected' : '')?>>imghvr-zoom-out-up</option>
                                                    <option value="imghvr-zoom-out-down" <?=($elemento['efecto'] == 'imghvr-zoom-out-down' ? ' selected' : '')?>>imghvr-zoom-out-down</option>
                                                    <option value="imghvr-zoom-out-left" <?=($elemento['efecto'] == 'imghvr-zoom-out-left' ? ' selected' : '')?>>imghvr-zoom-out-left</option>
                                                    <option value="imghvr-zoom-out-right" <?=($elemento['efecto'] == 'imghvr-zoom-out-right' ? ' selected' : '')?>>imghvr-zoom-out-right</option>
                                                    <option value="imghvr-zoom-out-flip-horiz" <?=($elemento['efecto'] == 'imghvr-zoom-out-flip-horiz' ? ' selected' : '')?>>imghvr-zoom-out-flip-horiz</option>
                                                    <option value="imghvr-zoom-out-flip-vert" <?=($elemento['efecto'] == 'imghvr-zoom-out-flip-vert' ? ' selected' : '')?>>imghvr-zoom-out-flip-vert</option>
                                                    <option value="imghvr-blur" <?=($elemento['efecto'] == 'imghvr-blur' ? ' selected' : '')?>>imghvr-blur</option>
                                                </select> <span style="color: green; font-size: 0.70rem;">Solo plantilla Categorías. <a target="_blank" href="ejemplo/index.html">Ver Efectos.</a></span><br>
                                        </div><br>

                                        <div class="control-group">
                                            <label class="control-label" for="CFefecto">Color de fondo efecto </label>
                                            <div class="controls">
                                                <input type="text" class="form-control colorpicker" id="CFefecto" name="CFefecto" value="<?=$elemento['CFefecto']?>" required>
                                                <span style="color: green; font-size: 0.70rem;">Solo plantilla Categorías.</span>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="CLefecto">Color de letras efecto</label>
                                            <div class="controls">
                                                <input type="text" class="form-control colorpicker" id="CLefecto" name="CLefecto" value="<?=$elemento['CLefecto']?>" required>
                                                <span style="color: green; font-size: 0.70rem;">Solo plantilla Categorías.</span>
                                            </div>
                                        </div>


                                        <table style="margin-left:55px;">
                                            <tr>
                                                <?php foreach ($inicios AS $inicial){ ?>
                                                <td style="text-align:center;font-weight:bold;">
                                                    <?=$inicial['nombre']?>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <?php foreach ($inicios AS $inicial){ ?>
                                                <td style="width:200px;text-align:center;"><img onclick="mostrareldiv('../temas/<?=$inicial['id']?>/presentacion/inicio.png')" style="width:150px;height:125px;" src="../temas/<?=$inicial['id']?>/presentacion/inicio.png" alt="<?=$inicial['nombre']?>"
                                                    /></td>
                                                <?php } ?>
                                            </tr>
                                        </table>
                                    </div>

                            </fieldset>
                            <hr>
                            </div>

                            <div id="body-tab-p2" class="div-tabs">
                                <fieldset>
                                    <legend>Galeria de productos</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="inicio">Galería de productos</label>
                                        <div class="controls">
                                            <select id="productos" name="productos" class="">
                                                        <option value="0" <?=($elemento['gproductos'] == 0 ? ' selected' : '')?>>Default template</option>
                                                        <option value="4" <?=($elemento['gproductos'] == 4 ? ' selected' : '')?>>Movement Design template</option>
                                                        <option value="5" <?=($elemento['gproductos'] == 5 ? ' selected' : '')?>>Movement Design template - % DES</option>
                                                        <option value="16" <?=($elemento['gproductos'] == 16 ? ' selected' : '')?>>Minimal Fixed (Bootstrap)</option>
                                                        <option value="17" <?=($elemento['gproductos'] == 17 ? ' selected' : '')?>>Container Responsive (Bootstrap)</option>
                                                    
                                                    </select><br>
                                        </div><br>
                                        <table style="margin-left:55px;">
                                            <tr>
                                                <?php foreach ($productos AS $inicial){ ?>
                                                <td style="text-align:center;font-weight:bold;">
                                                    <?=$inicial['nombre']?>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <?php foreach ($productos AS $inicial){ ?>
                                                <td style="width:200px;text-align:center;"><img onclick="mostrareldiv('../temas/<?=$inicial['id']?>/presentacion/productos.png')" style="width:150px;height:125px;" src="../temas/<?=$inicial['id']?>/presentacion/productos.png" alt="<?=$inicial['nombre']?>"
                                                    /></td>
                                                <?php } ?>
                                            </tr>
                                        </table>
                                    </div>
                                </fieldset>
                                <hr>
                            </div>

                            <div id="body-tab-p3" class="div-tabs">
                                <fieldset>
                                    <legend>Detalle producto web</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="producto">Detalle producto web</label>
                                        <div class="controls">
                                            <select id="producto" name="producto" class="">
                                                    <option value="0" <?=($elemento['productos'] == 0 ? ' selected' : '')?>>Default template</option>
                                                    <option value="1" <?=($elemento['productos'] == 1 ? ' selected' : '')?>>Good Design template</option>
                                                    <option value="2" <?=($elemento['productos'] == 2 ? ' selected' : '')?>>Blind Design template</option>
                                                    <option value="4" <?=($elemento['productos'] == 4 ? ' selected' : '')?>>Movement Design template</option>
                                                    <option value="5" <?=($elemento['productos'] == 5 ? ' selected' : '')?>>Movement Design template - % DES</option>
                                                    <option value="16" <?=($elemento['productos'] == 16 ? ' selected' : '')?>>Minimal Fixed (Bootstrap) </option>
                                                    <option value="17" <?=($elemento['productos'] == 17 ? ' selected' : '')?>>Container Responsive (Bootstrap) </option>
                                                </select><br>
                                        </div><br>
                                        <table style="margin-left:55px;">
                                            <tr>
                                                <?php foreach ($producto AS $inicial){ ?>
                                                <td style="text-align:center;font-weight:bold;">
                                                    <?=$inicial['nombre']?>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <?php foreach ($producto AS $inicial){ ?>
                                                <td style="width:200px;text-align:center;"><img onclick="mostrareldiv('../temas/<?=$inicial['id']?>/presentacion/producto.png')" style="width:150px;height:125px;" src="../temas/<?=$inicial['id']?>/presentacion/producto.png" alt="<?=$inicial['nombre']?>"
                                                    /></td>
                                                <?php } ?>
                                            </tr>
                                        </table>
                                    </div>
                                </fieldset>
                                <hr>
                            </div>

                            <div id="body-tab-p4" class="div-tabs">
                                <fieldset>
                                    <legend>Cabecera</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="cabecera">Cabecera</label>
                                        <div class="controls">
                                            <select id="cabecera" name="cabecera" class="">
                                                    <option value="0" <?=($elemento['cabecera'] == 0 ? ' selected' : '')?>>Default template</option>
                                                    <option value="1" <?=($elemento['cabecera'] == 1 ? ' selected' : '')?>>Minimum template</option>
                                                    <option value="4" <?=($elemento['cabecera'] == 4 ? ' selected' : '')?>>Movement Design template</option>
                                                    <option value="5" <?=($elemento['cabecera'] == 5 ? ' selected' : '')?>>Banner (Ancho recomendado: 1060px)</option>
                                                    <option value="6" <?=($elemento['cabecera'] == 6 ? ' selected' : '')?>>No-Top</option>
                                                    <option value="7" <?=($elemento['cabecera'] == 7 ? ' selected' : '')?>>No-Top Extended</option>
                                                    <option value="8" <?=($elemento['cabecera'] == 8 ? ' selected' : '')?>>Tuc</option>
                                                    <option value="10" <?=($elemento['cabecera'] == 10 ? ' selected' : '')?>>Logo max</option>
                                                    <option value="11" <?=($elemento['cabecera'] == 11 ? ' selected' : '')?>>Banak</option>
                                                    <option value="12" <?=($elemento['cabecera'] == 12 ? ' selected' : '')?>>Mega Menú</option>
                                                    <option value="14" <?=($elemento['cabecera'] == 14 ? ' selected' : '')?>>Electro</option>
                                                    <option value="15" <?=($elemento['cabecera'] == 15 ? ' selected' : '')?>>Remax</option>
                                                    <option value="16" <?=($elemento['cabecera'] == 16 ? ' selected' : '')?>>Minimal Fixed (Bootstrap)</option>
                                                    <option value="17" <?=($elemento['cabecera'] == 17 ? ' selected' : '')?>>Container Responsive (Bootstrap)</option>
                                                </select><br>
                                        </div><br>
                                        <label class="control-label" for="cabecera">Fondo en cabecera</label>
                                        <div class="controls">
                                            <input class="input-file uniform_on" id="fcabecera" name="fcabecera" type="file">
                                            <?php
                                                if ($elemento['fcabecera'] != null)
                                                {
                                                   ?>
                                                <a style="color: #09F; font-size: 0.70rem;" href="../source/<?=$elemento['fcabecera']?>" target="_blank">ver imagen actual</a>
                                                <a style="color: red; font-size: 0.70rem;" href="plantilla.php?borrarFondo=true">Eliminar</a>
                                                <?php
                                                }
                                                ?>
                                                    <br><span style="color: #09F; font-size: 0.70rem;">Ancho recomendado: 1920px. El alto varía en función de la cabecera seleccionada. La imagen no se redimensiona, se usa la parte necesaria.</span>
                                        </div><br>
                                        <table style="margin-left:55px;">
                                            <tr>
                                                <?php foreach ($cabecera AS $inicial){ ?>
                                                <td style="text-align:center;font-weight:bold;">
                                                    <?=$inicial['nombre']?>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <?php foreach ($cabecera AS $inicial){ ?>
                                                <td style="width:200px;text-align:center;"><img onclick="mostrareldiv('../temas/<?=$inicial['id']?>/presentacion/cabecera.png')" style="width:150px;height:125px;" src="../temas/<?=$inicial['id']?>/presentacion/cabecera.png" alt="<?=$inicial['nombre']?>"
                                                    /></td>
                                                <?php } ?>
                                            </tr>
                                        </table>
                                    </div>
                                </fieldset>
                                <hr>
                            </div>

                            <div id="body-tab-p5" class="div-tabs">
                                <fieldset>
                                    <legend>Pie</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="Pie">Pie</label>
                                        <div class="controls">
                                            <select id="pie" name="pie" class="">
                                                    <option value="0" <?=($elemento['pie'] == 0 ? ' selected' : '')?>>Default template</option>
                                                    <option value="1" <?=($elemento['pie'] == 1 ? ' selected' : '')?>>Minimum template</option>
                                                    <option value="4" <?=($elemento['pie'] == 4 ? ' selected' : '')?>>Movement Design template</option>
                                                    <option value="8" <?=($elemento['pie'] == 8 ? ' selected' : '')?>>Tuc</option>
                                                    <option value="14" <?=($elemento['pie'] == 14 ? ' selected' : '')?>>Electro</option>
                                                    <option value="15" <?=($elemento['pie'] == 15 ? ' selected' : '')?>>Remax</option>
                                                    <option value="16" <?=($elemento['pie'] == 16 ? ' selected' : '')?>>Minimal Fixed (Bootstrap)</option>
                                                    <option value="17" <?=($elemento['pie'] == 17 ? ' selected' : '')?>>Container Responsive (Bootstrap)</option>
                                                    </select><br>
                                        </div><br>
                                        <table style="margin-left:55px;">
                                            <tr>
                                                <?php foreach ($pie AS $inicial){ ?>
                                                <td style="text-align:center;font-weight:bold;">
                                                    <?=$inicial['nombre']?>
                                                </td>
                                                <?php } ?>
                                            </tr>
                                            <tr>
                                                <?php foreach ($pie AS $inicial){ ?>
                                                <td style="width:200px;text-align:center;"><img onclick="mostrareldiv('../temas/<?=$inicial['id']?>/presentacion/pie.png')" style="width:150px;height:125px;" src="../temas/<?=$inicial['id']?>/presentacion/pie.png" alt="<?=$inicial['nombre']?>" /></td>
                                                <?php } ?>
                                            </tr>
                                        </table>
                                    </div>
                                </fieldset>
                                <hr>
                            </div>
                            <div id="body-tab-p6" class="div-tabs">
                                <fieldset>
                                    <legend>Combinaciones TOP</legend>

                                    <div class="control-group">
                                        <label class="control-label" for="inicio">Combinación</label>
                                        <div class="controls">
                                            <select id="combinacion_top" name="combinacion_top">
                                                            <option value="">Seleccione una Combinación</option>
                                                            <option value="1">Combinación 1</option>
                                                            <option value="2">Combinación 2</option>
                                                            <option value="3">Combinación 3</option>
                                                            <option value="4">Combinación 4</option>
                                                        </select>
                                        </div>
                                        <br>
                                    </div>

                                </fieldset>
                                <hr>
                            </div>
                        </div>


                        <button id="btn-guardar" type="button" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Guardar Cambios</button>
                </form>
                </div>
            </div>
        </div>
        <form id="myForm_combinaciones" action="plantilla.php" method="POST">
            <input type="hidden" id="inicio_top" name="inicio_top">
            <input type="hidden" id="productos_top" name="productos_top">
            <input type="hidden" id="producto_top" name="producto_top">
            <input type="hidden" id="cabecera_top" name="cabecera_top">
            <input type="hidden" id="pie_top" name="pie_top">
            <input type="hidden" id="color_fondo_menu_top" name="color_fondo_menu_top">
            <input type="hidden" id="color_letras_menu_top" name="color_letras_menu_top">
            <input type="hidden" id="color_pie_top" name="color_pie_top">
            <input type="hidden" id="pg_ini_img_princimal" name="pg_ini_img_princimal">
            <input type="hidden" id="pg_ini_derecha_top" name="pg_ini_derecha_top">
            <input type="hidden" id="pg_ini_izquierda_top" name="pg_ini_izquierda_top">
            <input type="hidden" id="buscador_avanzado" name="buscador_avanzado">
            <input type="hidden" id="config_combinaciones" value="TRUE" name="config_combinaciones" value="TRUE">
            <input type="hidden" id="combinacion_top_final" name="combinacion_top_final">
        </form>
    </div>
</div>
<!-- block -->


<!-- block -->
</div>
</div>
<?php require_once('blocks/pie.php'); ?>