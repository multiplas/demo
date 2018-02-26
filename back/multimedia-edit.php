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
            font-size:small;
            font-weight: bold;
        }

        .box-texto{
            height: auto;
        }

        .img-box-file{
            width: 85%;
        }

        .box-file-img{
            text-align: center;
        }

        .text-small-box{
            font-size: 11px;
        }

    </style>
    <div class="span9" id="content">

        <?php if (isset($_GET['editarfile'])) { ?>
            <div class="row-fluid">
                <div id="edi" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Editar Archivo</div>
                    </div>
                    <div class="block-content collapse in">
                        <fieldset>
                            <legend><?=ucwords($elemento['titulo'])?></legend>
                            <form action="multimedia.php" method="POST" class="form-horizontal">
                            <div class="row">
                                <div class="span7 box-file-img">
                                <?php if(file_exists($directorio_multimedia.$elemento['url'])){?>
                                    <img class="img-box-file" src="<?=$directorio_multimedia?><?=$tipo_file == 'pdf' ? 'is_pdf.png' : $elemento['url']?>">
                                <?php }else{?>
                                    <img class="img-box-file" src="<?=$directorio_multimedia?>no_disponible.png">
                                <?php }?>
                                </div>
                                <div class="span5">
                                            <div class="control-group">
                                                <label class="control-label" for="poblacion">Titulo </label>
                                                <div class="controls">
                                                    <input class="span6 input-text-box" id="titulo" name="titulo" placeholder="Titulo" required value="<?=$elemento['titulo']?>">
                                                    <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="poblacion">Leyenda </label>
                                                <div class="controls">
                                                    <textarea class="span6 text-area-msj2" id="leyenda" name="leyenda" placeholder="Leyenda"><?=$elemento['leyenda']?></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="poblacion">Texto alternativo </label>
                                                <div class="controls">
                                                    <textarea class="span6 text-area-msj2" id="alt" name="alt" placeholder="Texto Alternativo"><?=$elemento['texto_alternativo']?></textarea>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="poblacion">Descripcion </label>
                                                <div class="controls">
                                                    <textarea class="span6 text-area-msj" id="descripcion" name="descripcion" placeholder="Descripcion"><?=$elemento['descripcion']?></textarea>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="<?=$elemento['id']?>">
                                            <input type="hidden" name="url" value="<?=$elemento['url']?>">

                                </div>
                            </div>
                            <br><br>
                            <hr>
                            <div style="text-align: center">
                                <input type="submit" class="btn btn-primary" name="modif" value="Modificar">
                                <button type="button" onclick="location.href = 'multimedia.php';" class="btn">Cancelar</button>
                            </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </div>
        <?php } else if (isset($_GET['verfile'])) {
            $tipo_file = obtenerExtensionFichero($elemento['url']);
            ?>
            <div class="row-fluid">
                <div id="edi" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Detalles del Archivo</div>
                    </div>
                    <div class="block-content collapse in">
                        <fieldset>
                            <legend><?=ucwords($elemento['titulo'])?></legend>
                            <div class="row">
                                <div class="span9 box-file-img">
                                    <span>Permalink: <a class="text-small-box" href="<?=$System->Empresa('dominio')?>/<?=$directorio_multimedia2?><?=$elemento['url']?>"><?=$System->Empresa('dominio')?>/<?=$directorio_multimedia2?><?=$elemento['url']?></a></span>
                                    <br><br>
                                    <?php if(file_exists($directorio_multimedia.$elemento['url'])){?>
                                    <img class="img-box-file" src="<?=$directorio_multimedia?><?=$tipo_file == 'pdf' ? 'is_pdf.png' : $elemento['url']?>">
                                    <?php }else{?>
                                        <img class="img-box-file" src="<?=$directorio_multimedia?>no_disponible.png">
                                    <?php }?>
                                </div>
                                <div class="span3 box-texto">
                                            <div class="control-group">
                                                <label class="control-label title-file" for="leyenda"><i style="color: grey;" class="fa fa-calendar-o fa-lg"></i> Creado el:</label>
                                                <div class="controls text-small-box">
                                                    <?=$elemento['fecha']?>
                                                </div>
                                            </div>
                                            <?php if ($elemento['update_at']!='00-00-0000'){?>
                                            <div class="control-group">
                                                <label class="control-label title-file" for="leyenda"><i style="color: grey;" class="fa fa-calendar-o fa-lg"></i> Ultima Modificacion</label>
                                                <div class="controls text-small-box">
                                                    <?=$elemento['update_at']?>
                                                </div>
                                            </div>
                                            <?php } ?>
                                            <div class="control-group">
                                                <label class="control-label title-file" for="leyenda">URL </label>
                                                <div class="controls text-small-box">
                                                    <input tupe="text" disabled value="<?=$elemento['url']?>">
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label title-file" for="leyenda">Leyenda: </label>
                                                <div class="controls text-small-box">
                                                    <?=$elemento['leyenda']?>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label title-file" for="alt">Texto alternativo: </label>
                                                <div class="controls text-small-box">
                                                    <?=$elemento['texto_alternativo']?>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label title-file" for="descripcion">Descripcion: </label>
                                                <div class="controls text-small-box">
                                                    <?=$elemento['descripcion']?>
                                                </div>
                                            </div>
                                </div>
                            </div>
                            <br><br>
                            <hr>
                            <div style="text-align: center">
                                <button class="btn btn-primary" type="button" onclick="location.href = 'multimedia-edit.php?editarfile&idfile=<?=$elemento['id']?>';" class="btn">Editar</button>
                                <button type="button" onclick="location.href = 'multimedia.php';" class="btn">Volver</button>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- block -->

    </div>
    </div>
<?php require_once('blocks/pie.php'); ?>