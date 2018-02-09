 <style>
     @media (min-width:940px){
        #grupo-contenido #contenido #panel-izquierdo{
           width: 24% !important;
        }
        #grupo-contenido #contenido #productos{
           width: 74% !important;
        }
     }
                        .descripcion2{
                            font-family: '<?=$fuente2?>',Arial,Helvetica,sans-serif;
                            font-size: 18px;
                            text-align: center; 
                            width: 100%;
                            display: block;
                            color: <?=$colores['nombre_color']?> !important;
                        }
                        .descripcion2:hover{
                            color: <?=$colores['nombre_color_hover']?>;
                            cursor: pointer;
                        }
                        
                        .botoncito{
                            margin-top: 20px;
                            text-align: center;
                            width: 100%;
                        }
                        
                        .vermas3{
                            border: 1px solid #e74e4e;
                            border-radius: 6px;
                            color: <?=$colores['boton_letras']?>;
                            font-size: 1rem;
                            font-weight: bold;
                            height: 1rem;
                            line-height: 1rem;
                            margin: 10px 0 0;
                            max-width: 40%;
                            padding: 4px 15px;
                            transition: border 1s ease 0s, background 1s ease 0s, color 1s ease 0s;
                            width: auto;
                            background-color: <?=$colores['boton_fondo']?>;
                        }
                        
                        .vermas3:hover{
                            background-color: <?=$colores['boton_fondo_hover']?>;
                            color: <?=$colores['boton_letras_hover']?>;
                        }
                        .sale-label{
                            background-color: <?=$colores['oferta_fondo']?>;
                            border-radius: 4px;
                            color: <?=$colores['oferta_letra']?>; !important;
                            float: right;
                            font-size: 12px;
                            font-weight: bold;
                            padding: 2px 4px;
                            text-transform: uppercase;
                            z-index: 10;
                            position: absolute;
                        }
                        
                    </style>

<div id="contenido">
	<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
            <div id="subcategoriaspr">
            <div class="muestra">
                <?php
                    for ($i = 0; $i < count($subcategorias); $i++)
                    {
                        $nombre = strtolower($subcategorias[$i]['nombre']);
                        $nombre = preg_replace('([^A-Za-z0-9])', '_', $nombre);	   
                ?>
                    <div class="producto">
                        <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/productos/<?=$subcategorias[$i]['id']?>/<?=$nombre?>"><img src="<?=$draizp?>/imagenesproductos/<?=$subcategorias[$i]['imagen'] != null ? $subcategorias[$i]['imagen'] : 'no-img-pro.png'?>" alt="<?=$subcategorias[$i]['nombre']?>" /></a>
                        <span class="descripcion"><?=$subcategorias[$i]['nombre']?></span>
                        <span class="precio"><br></span>
                        <a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/productos/<?=$subcategorias[$i]['id']?>/<?=$nombre?>">entrar</a>
                    </div>
                <?php
                    }
                ?>
            </div>
		</div>
             
            <style>
                @media (min-width:768px){
                    .colum1{
                       display: inline-block; height: auto; margin-top: 0; vertical-align: top; width: 29%;
                    }
                    .colum2{
                       display: inline-block; height: auto; margin-top: 0px; vertical-align: top; width: 70%;
                    }
                }
                @media (max-width:768px){
                    .colum1{
                       display: inline-block; height: auto; margin-top: 0; vertical-align: top; width: 95%; text-align: center;
                    }
                    .colum2{
                       display: inline-block; height: auto; margin-top: 0; vertical-align: top; width: 95%; text-align: center;
                    }
                }
                
                #grupo-contenido #contenido #panel-superior div#ordenar {
                    margin-left: 0px;
                }
                
                .tfiltro{
                    color: #efeee9 !important;
                    font-family: Kameron !important;
                    font-size: 96px !important;
                    font-weight: 700 !important;
                    left: 0 !important;
                    line-height: 106px !important;
                    margin: auto !important;
                    right: 0 !important;
                    text-transform: uppercase !important;
                    top: 0 !important;
                    z-index: -1 !important;
                }
                
                .productosMuestra:hover{
                            box-shadow: 3px 3px 3px 3px rgba(216, 217, 221, 0.80);
                            padding: 5px 5px;
                        }
            </style>
            <?php if($Empresa['novedades'] == '1'){ ?>
		<div id="panel-izquierdo">
                        <?php //include('./bloques/menu_prods.php'); ?>
			<?php //include('./bloques/filtros.php'); ?>
			<!-- <span name="BtReset" class="button">Limpiar Filtros</span> -->
                        <?php include('./temas/4/bloques/novedades_lateral.php')?>
		</div>
            <?php } ?>
            <div id="productos" <?=$Empresa['novedades'] == '1' ? '' : 'style="width: auto !important;"'?>>
                   
                    <div id="panel-superior">
                    
			<?php include('./bloques/paginador.php'); ?>
			<?php include('./bloques/ordenador.php'); ?>
		</div>
                <br><br>
                     <div style="height: auto !important; overflow: hidden; position: relative !important; top: -30px; margin-bottom: -60px; visibility: visible !important; width: 100% !important;">
                        <?php
                
                            $sliders = array();

                            $sql="SELECT * FROM bd_slider WHERE idcat = $_GET[productos]";
                            $query = mysqli_query($dbi, $sql);
                            if(mysqli_num_rows($query) >= 1){
                                $slider = mysqli_fetch_array($query);
                                echo '<img style="width: 100%;" src="/back/uploads/'.$slider['imagen'].'">';
                            }

                        ?>
                        <div class="colum1">
                            <?=$imagenCategoria != '' ? '<img style="width: 100%;" src="/imagenesproductos/'.$imagenCategoria.'">' : '' ?>
                        </div>
                        <div class="colum2">
                            <?=$descripcionCategoria?>
                        </div>
                    </div>
                    <br><br>
			<?php
				if (count($productos) < 1) echo 'No hay productos en esta categoría.';
				for ($i = 0; $i < count($productos); $i++)
				{
                                    $nombre = utf8_encode(strtr(utf8_decode($productos[$i]['nombre']), utf8_decode($tofind), $replac));
                                    $nombre = strtolower($nombre);
                                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
                                    $classex = 'producto3';
			?>
                    
                                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productos[$i]['id']?>/<?=$nombre?>/"><div class="productosMuestra <?=$Empresa['ftamano'] == 1 ? 'producto': ''?>" <?=$Empresa['ftamano'] == 1 ? 'style="visibility: visible; border: 1px solid rgb(221, 221, 221);"': 'style="width: 24.7% !important; display: inline-block; text-align: center;"'?> <?=$Empresa['ftamano'] == 1 ? 'producto': ''?>>
                                        
                                        
                                        <img <?=$Empresa['ftamano'] == 1 ? 'class="zoom"': 'style="width: 100%;"'?> src="<?=$draizp?>/imagenesproductos/<?=$productos[$i]['imagen']?>" alt="<?=$productos[$i]['nombre']?>" />
                                        
                                        <div class="descuento" <?=$productos[$i]['descuento'] != 0 ? 'style="position: relative; top: -15px; background-color: white; font-weight: bold; font-size: 14pt; left: 73%; box-shadow: 5px 5px 5px 0px rgba(0, 0, 0, 0.75); height: 30px; line-height: 30px; width: 60px;"' : 'style="position: relative; top: -15px; background-color: transparent; font-weight: bold; font-size: 14pt; left: 73%; height: 30px; line-height: 30px; width: 60px;"'?>><?=$productos[$i]['descuento'] != 0 && $productos[$i]['precio'] != 'Consultar' ? '-'.$productos[$i]['descuento'].' '.$productos[$i]['descuentoe'] : '&nbsp'?></div>
                                        
                                        <hr>
                                        <span class="descripcion"><?=strlen($productos[$i]['nombre']) > 24 ? substr($productos[$i]['nombre'], 0, 47) : $productos[$i]['nombre']?></span><br><br>
                                        
                                        <span class="descripcion"><?=$productos[$i]['referencia']?></span><br><br>
					
                                        <?php if($productos[$i]['descripcion'] != ''){ ?>
                                            <hr>
                                            <span class="descripcion" style="color: red; font-size: 10pt !important;"><b><?=$productos[$i]['descripcion']?></b></span>
                                        <?php }else{ ?>
                                            <hr style="border-color: white">
                                            <span class="descripcion">&nbsp;</span>
                                        <?php } ?> 
                                         
                                            <hr>
                                        <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                                            
                                            <span class="precioa" style="float: left"><del><?=$productos[$i]['descuento'] != 0 && $productos[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></del></span><br>
                    
                                            <span class="precio" style="float: right; margin-top: -25px; font-size: 18pt; color: #b0665d"><b><?=$productos[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['precio']), 2, ',', '.') : 'Consultar'?><?=$productos[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></b></span>
                        
                                            
                                        <?php }else{ ?>
                                            
                                        <?php } ?>
                            
                                        <?php if($productos[$i]['aplazame'] == 1){ ?>
                                            <hr>
                                            <span class="precio" style="max-width: 100%; font-size: 12px; text-align: center;">Financialo con Aplazame por <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['caplazame1']), 2, ',', '.')?><?=$_SESSION['moneda']?> + <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productos[$i]['caplazame']), 2, ',', '.')?><?=$_SESSION['moneda']?> al mes</span>
                                        <?php } ?>
                                            </div></a>
			<?php
				}
			?>
		</div>
		<input type="hidden" name="nofilters" value="nofilters" />
	</form>
	<div id="panel-inferior">
		<?php include('./bloques/paginador.php'); ?>
	</div>
	<?php /*$horientacion = 'hor'; include_once('./bloques/informacion.php'); ?>
	<?php include_once('./bloques/novedades.php'); ?>
	<?php include_once('./bloques/masvendidos.php');*/ ?>
</div>