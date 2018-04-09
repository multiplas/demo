<div id="contenido">
        <div class="container">
            <div id="novedades">
                <span class="tfiltro">Búsqueda de "<b><?=$_POST['buscar'] != '' ? $_POST['buscar']: ($_GET['buscar'] != '' ? str_replace("-", " ", ($_GET['buscar'])) : $nombreBuscarEtq) ?></b>"</span>
                <div class="row">
                <!--<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
                    <div id="panel-superior">
                        <?php include($draizp.'/bloques/paginador.php'); ?>
                        <?php include($draizp.'/bloques/ordenador.php'); ?>
                    </div>
                    <div id="panel-izquierdo">
                        <?php include($draizp.'/bloques/filtros.php'); ?>
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
                            foreach($productos as $producto){
                                $urlProducto = $draizp.'/'.'producto/'.$producto['id'].'/'.$producto['nombre'].'/';
                                $urlImagen = $draizp.'/'.'imagenesproductos/'.$producto['imagen'];
                                ?>
                                <div class="col-sm-3 single-product">
                                    <div class="imagen-producto">
                                        <a href="<?=str_replace(' ','-',strtolower($urlProducto))?>">
                                            <img class="img-responsive" src="<?=$urlImagen?>" alt=""/>
                                        </a>
                                        <div class="interaccion">
                                            <div class="ver-mas-img btn btn-primary estado-inicial"><a href="<?php echo str_replace(' ','-',$urlProducto)?>">Ver más</a></div>
                                            <form action="<?=$draizp?>/acc/anadir/<?=$producto['id']?>" method="post">
                                                <button type="submit" data-product="<?=$producto['id']?>" class="vistazo-rapido estado-inicial btn btn-success">
                                                <i class="fas fa-shopping-cart"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="product-info">
                                        <div class="titulo-producto">
                                            <h4><?=$producto['nombre']?></h4>
                                        </div>
                                        <div class="descripcion-producto">
                                            <?=trim(strip_tags( $producto['descripcion']))?>
                                        </div>
                                        <div class="product-price"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')?> <?=$producto['precio'] > 0 ? $_SESSION['moneda'] : ''?><?=$producto['precio'] == 'Consultar' ? $producto['precio']: ''?></div>
                                    </div>
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