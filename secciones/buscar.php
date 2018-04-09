<?php if ($Empresa['det_producto'] == 0){ ?>
<script>
    function openModal() {
        document.getElementById('myModal').style.display = "block";
        document.getElementById('myModal2').style.display = "block";
    }

    function closeModal() {
        document.getElementById('myModal').style.display = "none";
        document.getElementById('myModal2').style.display = "none";
        document.getElementById('myModal3').style.display = "none";
    }
</script>

<style>
    /* The Modal (background) */
.modal {
  display: none;
  position: fixed;
  z-index: 10000000000;
  padding-top: 35px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: black;
  opacity: 0.5;
}

/* Modal Content */
.modal-content {
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  width: 90%;
  max-width: 1020px;
}

/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: -2px;
  right: 5px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
 @media (min-width:940px)
{
    .tamanoG{
        width: auto;
    }

    .timgG{
         height: 100%;
        width: auto
    }
}

 @media (max-width:940px)
 {
    .tamanoG{
        width: 95%;
    }

    .timgG{
        max-height: 100%; 
        width: 100%;
    }
}

</style>
<div id="myModal" class="modal" onclick=""></div>
<div id="myModal2" class="modal tamanoG" onclick="" style="opacity: 1;  height: auto; position: absolute; left: 50%; top: 50%; position: fixed; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); background-color: #C0C0C0">
    <span class="close cursor" onclick="closeModal()">&times;</span>
    <div class="mySlides" style="text-align: center">
        <img class="timgG" id="imagen_modal" src="http://babytravel.es/imagenesproductos/5853d55d9b703_37-home_default.jpg">
        <?php if($Empresa['mcatalogo'] == 1){?><br><a id="nombre_modal" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>contacto/Prueba" class="button" style="min-width: 10px !important;display:none;">Solicitar más información</a><?php } ?>
        <span class="span_quantity">Cantidad:</span> <input id="quantity" class="product_quantity" type="number" min="1" max="50" value="1"/> <br>
        <a id="add_to_cart" onclick="closeModal()" href="#" class="button" style="min-width: 10px !important;">Añadir al Presupuesto</a>
    </div>
</div>
<div id="myModal3" class="modal" onclick="" style="opacity: 1; width: auto; height: auto; position: absolute; left: 50%; top: 50%; position: fixed; transform: translate(-50%, -50%); -webkit-transform: translate(-50%, -50%); background-color: #C0C0C0">
    <span class="close cursor" onclick="">&times;</span>
    <div class="mySlides" style="width: 200px; background-color: white; padding: 25px; font-size: 18px;" id="text_info">
    </div>
</div>
<?php } ?>

<style>
    
        #grupo-contenido #contenido #productos .producto:first-child, #grupo-contenido #contenido #novedades div.muestra div.producto:first-child, #grupo-contenido #contenido #masvendidos div.muestra div.producto:first-child
        {
            margin-left: 0.7%;
            margin-right: 0.7%;
            margin-bottom: 1.6%;
        }

        #grupo-contenido #contenido #productos .producto:not(:first-child), #grupo-contenido #contenido #novedades div.muestra div.producto:not(:first-child), #grupo-contenido #contenido #masvendidos div.muestra div.producto:not(:first-child)
        {
            margin-left: 0.7%;
            margin-right: 0.7%;
            margin-bottom: 1.6%;
        }
        
        #grupo-contenido #contenido #novedades, #grupo-contenido #contenido #bajo{
            padding: 0px 0px;
        }
        
        @media (max-width:940px){
            #grupo-contenido #contenido #productos .producto .descripcion, #grupo-contenido #contenido #novedades div.muestra div.producto .descripcion, #grupo-contenido #contenido #masvendidos div.muestra div.producto .descripcion{
                line-height: 1.7rem;
            }
        }
    
    </style>
<?php if($cabecera != 16): //Lo customizamos para el tema de Bootstrap ?>
    <div id="contenido">
        <div class="container">
            <div id="novedades">
                <span class="tfiltro">Búsqueda de "<b><?=$_POST['buscar'] != '' ? $_POST['buscar']: ($_GET['buscar'] != '' ? str_replace("-", " ", ($_GET['buscar'])) : $nombreBuscarEtq) ?></b>"</span>
                <div class="muestra">
                <!--<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
                    <div id="panel-superior">
                        <?php include('./bloques/paginador.php'); ?>
                        <?php include('./bloques/ordenador.php'); ?>
                    </div>
                    <div id="panel-izquierdo">
                        <?php include('./bloques/filtros.php'); ?>
                        <span name="BtReset" class="button">Limpiar Filtros</span>
                    </div>-->
                        
                        <style>
                            .descripcion{
                                    color: #444444 !important;
                                    display: block !important;
                                    font-family: "Istok Web",Arial,Helvetica,sans-serif !important;
                                    font-size: 18px !important;
                                    text-align: center !important;
                                    width: 100% !important;
                            }
                        </style>
            
                        <?php
                            if (count($productos) < 1) echo 'No se han hayado productos.';
                            for ($i = 0; $i < count($productos); $i++)
                            {
                                $nombre = utf8_encode(strtr(utf8_decode($productos[$i]['nombre']), utf8_decode($tofind), $replac));
                                $nombre = strtolower($nombre);
                                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
                                $classex = 'producto3';
                                $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
                                $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");

                        ?>
                                <div class="producto">
                                    <a href="<?=$draizp?>/producto/<?=$productos[$i]['id']?>/<?=str_replace(".", "", str_replace("--", "-", $nombre))?>/">
                                        <?php if ($Empresa['det_producto'] == 1){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productos[$i]['id']?>/<?=str_replace(".", "", str_replace("--", "-", $nombre))?>/"><?php } ?><img class="zoom" id="imagen_modal2" name="imagen_modal2" data-nombre="<?=preg_replace('([^A-Za-z0-9])', '_', str_replace($no_permitidas, $permitidas, $productos[$i]['nombre']))?>" src="<?=$draizp?>/imagenesproductos/<?=$productos[$i]['imagen']?>" alt="<?=$productos[$i]['nombre']?>" /><?php if ($Empresa['det_producto'] == 1){ ?></a><?php } ?>
                                        <span class="descripcion"><?php if ($Empresa['det_producto'] == 1){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productos[$i]['id']?>/<?=str_replace(".", "", str_replace("--", "-", $nombre))?>/"><?php } ?><?=$productos[$i]['nombre']?><?php if ($Empresa['det_producto'] == 1){ ?></a><?php }?></span>
                                        <?php if ($Empresa['det_producto'] == 1){ ?><span class="descuento"><?=$productos[$i]['descuento'] != 0 ? '-'.$productos[$i]['descuento'].' '.$productos[$i]['descuentoe'] : ''?></span><?php } ?>
                                            <?php if ($Empresa['det_producto'] == 1){ ?><span class="precioa"><?=$productos[$i]['descuento'] != 0 ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br><?php } ?>
                                        <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                                                                <?php if ($Empresa['det_producto'] == 1){ ?><span class="precio"><?=$productos[$i]['tprecio'] != '' ? $productos[$i]['tprecio'] : (number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['precio']), 2, ',', '.'))?> <?=$productos[$i]['tprecio'] != '' ? '' : $_SESSION['moneda']?></span><?php } ?>
                                            <?php if ($Empresa['det_producto'] == 1){ ?><a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productos[$i]['id']?>/<?=str_replace(".", "", str_replace("--", "-", $nombre))?>/">Ver más</a><?php } ?>
                                        <?php }else{ ?>
                                            <?php if ($Empresa['det_producto'] == 1){ ?><a class="vermas" style="width: 83% !important;max-width: 83% !important;text-align:center" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productos[$i]['id']?>/<?=str_replace(".", "", str_replace("--", "-", $nombre))?>/">Ver más</a><?php }?>
                                        <?php } ?>
                                    </a>
                                </div>
                        <?php
                            }
                        ?>
                    
                    <!--<input type="hidden" name="nofilters" value="nofilters" />
                </form>-->
                </div>
                <div id="panel-inferior">
                    <?php include('./bloques/paginador_buscar.php'); ?>
                </div>
                <?php //$horientacion = 'hor'; include_once('./bloques/informacion.php'); ?>
                <?php //include_once('./bloques/novedades.php'); ?>
                <?php //include_once('./bloques/masvendidos.php'); ?>
            </div>
        </div>
    </div>
    <?php if ($Empresa['det_producto'] == 0){ ?>  
    <script>
            jQuery('body').on('click','.zoom',function(){
            window.parent.document.getElementById('imagen_modal').src = jQuery(this).attr("src");
            product_name = jQuery(this).attr("alt");
            window.parent.document.getElementById('nombre_modal').href = '<?=$draizp?>/<?=$_SESSION['lenguaje']?>contacto/'+jQuery(this).attr("data-nombre");
            window.parent.document.getElementById('myModal').style.display = "block";
            window.parent.document.getElementById('myModal2').style.display = "block";
        });
        jQuery('body').on('click','.nozoomf',function(){
            window.parent.document.getElementById('imagen_modal').src = jQuery(this).attr("src");
            window.parent.document.getElementById('nombre_modal').href = '<?=$draizp?>/<?=$_SESSION['lenguaje']?>contacto/'+jQuery(this).attr("data-nombre");
            window.parent.document.getElementById('myModal').style.display = "block";
            window.parent.document.getElementById('myModal2').style.display = "block";
        });
        
    </script>
    <?php } ?>
<?php else: ?>
<?php include_once($draiz.'/temas/'.$cabecera.'/bloques/buscar.php'); ?>
<?php endif; ?>