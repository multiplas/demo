<?php
require_once('blocks/cabecera.php');
require_once('system/multimedia/execution-multimedia.php');
?>
    <style>
        .resaltar-text{
            color: red;
        }

        .input-text-box, .text-area-msj, .text-area-msj2{
            width: 80% !important;
        }

        .text-area-msj{
            height: 200px;
        }

        .text-area-msj2{
            height: 100px;
        }

        .title-file{
            font-size: medium;
            font-weight: bold;
        }

        .box-texto{
            height: 70px;
        }

        .img-box-file{
            width: 80%;
        }

        .box-file-img{
            text-align: center;
        }

    </style>

<script>

    $(window).load(function(){

        $(function() {

            $('#file-input').click(function() {
                $('#imgSalida').attr("src","<?=$directorio_multimedia?>selecciona_archivo.png");
            });

            $('#file-input').change(function(e) {
                addImage(e);
            });

            function addImage(e){
                var file = e.target.files[0],
                    imageType = /image.*/;

              /*  if (!file.type.match(imageType))
                    return;*/

                var reader = new FileReader();
                reader.onload = fileOnload;
                reader.readAsDataURL(file);
            }

            function fileOnload(e) {
                var result=e.target.result;
                var dataurl=e.target.result;
                var data_array = dataurl.split('/');

                if(data_array[0]=='data:application')
                    $('#imgSalida').attr("src","<?=$directorio_multimedia?>multimedia.jpg");
                else
                $('#imgSalida').attr("src",result);
            }
        });
    });


</script>


    <div class="span9" id="content">

            <div class="row-fluid">
                <div id="edi" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Añadir Archivo</div>
                    </div>
                    <div class="block-content collapse in">
                        <form action="multimedia.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="span6 box-file-img">
                            <img id="imgSalida" class="img-box-file" src="<?=$directorio_multimedia?>selecciona_archivo.png">
                            <span class="span-biblio-media">Selecciona un archivo</span>
                            <input class="btn btn-success" name="url[]" id="file-input" type="file" />
                            <br />
                            <!--img id="imgSalida" width="50%" height="50%" src="" /-->
                        </div>
                        <div class="span6">

                                <fieldset>
                                    <legend>Añadir nuevo archivo</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="poblacion">Titulo </label>
                                        <div class="controls">
                                            <input class="span6 input-text-box" id="titulo" name="titulo" placeholder="Titulo" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="poblacion">Leyenda </label>
                                        <div class="controls">
                                            <textarea class="span6 text-area-msj2" id="leyenda" name="leyenda" placeholder="Leyenda"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="poblacion">Texto alternativo </label>
                                        <div class="controls">
                                            <textarea class="span6 text-area-msj2" id="alt" name="alt" placeholder="Texto Alternativo"></textarea>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="poblacion">Descripcion </label>
                                        <div class="controls">
                                            <textarea class="span6 text-area-msj" id="descripcion" name="descripcion" placeholder="Descripcion"></textarea>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary" name="add" value="Guardar">
                                    <button type="button" onclick="location.href = 'multimedia.php';" class="btn">Cancelar</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <!-- block -->

    </div>
    </div>
<?php require_once('blocks/pie.php'); ?>