<?php
function getMinPortePrice(){
    global $dbi;
    $getPortesPrices = mysqli_query($dbi, "SELECT MIN( precioP ) FROM bd_portes");//Damos por hecho que el minimo es para españa
    if(mysqli_num_rows($getPortesPrices) > 0){//Hay portes
        $minPorte = mysqli_fetch_assoc($getPortesPrices);
    }  
    return $minPorte['MIN( precioP )'];
}
function total_calculate_helper($draizp){
    global $Empresa;

    if ($_SESSION['usr'] != null)
        $cesta = Cesta($_SESSION['usr']['id']);
    else
        $cesta = CestaSession($_SESSION['cestases']);

    guardarEstadoPC('pedido',$cesta);

    $draiz = getcwd();

    include $draiz.'/secciones/auxiliares.php';

    $total = 0;
    $urlArticulo = '';
    $urlImagen = '';
    $imageSrc = '';
    $cantidad = '';
    $precioProducto = '';
    $currency = $_SESSION['moneda'];
    $descPorcentaje = '';
    $descEuro = '';
    $precioTotalProducto = 0;
    $precioTotalConEnvio = 0;
    $portes = 0;
    $nombre = '';
    $peso = 0;

    $atrDesglosados = AtributosDesglosados();

    if (count($cesta) < 1) echo '<p>No hay productos en tu cesta!</p>';
    else
    {
        foreach ($cesta AS $micesta)
        {            
            //Inicializamos las variables
            $cantidad = $micesta['cantidad'];
            $descPorcentaje = $micesta['descuento'];
            $descEuro = $micesta['descuentoe'];
            $nombre = $micesta['nombre'];
            $peso += ($micesta['peso'] * $micesta['cantidad']);

            //Se acumula el total de cada producto
            $total += ($micesta['precio'] + $micesta['personalizacion']) * $micesta['cantidad'];
            $total = floatval ($total);

            //Sacamos la url y la imagen del producto
            if($micesta['afiliado'] != ''){
                $urlImagen = "http://tienda.camaltec.es";
                $urlArticulo = $micesta['nombre'];
            }else{
                $urlImagen = $draizp;
                if($micesta['pack'] != true )
                    $urlArticulo = "<a href='".$draizp."/".$_SESSION['lenguaje']."producto/".$micesta['id']."'>".$micesta['nombre']."</a>";
                else
                    $urlArticulo = "<a href='".$draizp."/".$_SESSION['lenguaje']."pack/".$micesta['id']."'>".$micesta['nombre']."</a>";
            } 

            //Evalua si la cesta tiene algun atributo - No entiendo su uso
            $cad_extra = "";
            $totalAtrDesgl = 0;
            if($Empresa['filaAtrCesta'] == 1){
                foreach ($atrDesglosados as $atributoDes){
                    $resultado = strpos($micesta['talla'], $atributoDes['atributo']);
                    if($resultado !== FALSE){
                        if($atributoDes['tipo'] != $atributoDes['atributo']){
                            $cad_extra .= "<tr><td></td><td><img src='/source/desglose.png' style='max-width: 29px;'></td><td>".$atributoDes['tipo'] .": ". $atributoDes['atributo'] . " <small style='top: 3px;'>(".$micesta['nombre'].")</small></td><td>".$micesta['cantidad']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['preciosAtr'][$atributoDes['atributo']]), 2, ',', '.')." ".$_SESSION['moneda']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['preciosAtr'][$atributoDes['atributo']]), 2, ',', '.')." ".$_SESSION['moneda']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($micesta['preciosAtr'][$atributoDes['atributo']])*$micesta['cantidad'])), 2, ',', '.')." ".$_SESSION['moneda']."</td></tr>";
                        }else{
                            $cad_extra .= "<tr><td></td><td><img src='/source/desglose.png' style='max-width: 29px;'></td><td>".$atributoDes['atributo'] . " <small style='top: 3px;'>(".$micesta['nombre'].")</small></td><td>".$micesta['cantidad']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['preciosAtr'][$atributoDes['atributo']]), 2, ',', '.')." ".$_SESSION['moneda']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['preciosAtr'][$atributoDes['atributo']]), 2, ',', '.')." ".$_SESSION['moneda']."</td><td>".number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($micesta['preciosAtr'][$atributoDes['atributo']])*$micesta['cantidad'])), 2, ',', '.')." ".$_SESSION['moneda']."</td></tr>";
                        }
                        $totalAtrDesgl += $micesta['preciosAtr'][$atributoDes['atributo']];
                    }
                }
            }

            

            //Imagen del producto
            $imageSrc = $urlImagen.'/imagenesproductos/'.$micesta['imagen'];
            
            //Verifica que descuento sea numerico para mostrar la url o el nombre alternativamente
            if(is_numeric($micesta['descuento'])) { 
                //echo $urlArticulo; 
            } 
            else { 
                //echo '<span class="enlazado">'.$micesta['nombre'].'</span>'; 
            }

            //Precio individual de cada producto
            $precioProducto = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($micesta['precio']-$totalAtrDesgl)), 2, ',', '.');

            //Examinamos si hay descuento
            if($descPorcentaje > 0) { 
                //echo '<span>-'.$descPorcentaje.'%</span>';
            }
            elseif ($descEuro > 0) {
                //echo'<span>-'.$descEuro.' &euro;</span>';
            }             
            $precioTotalProducto = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($micesta['precio'] + $micesta['personalizacion']-$totalAtrDesgl) * $micesta['cantidad'])), 2, ',', '.');
            muestraDatosSuperior($imageSrc, $draizp, $nombre, $cantidad, $precioProducto, $currency, $micesta);
        }

        $total = round(floatval ($total),2);

        //codigo promocional
        if(isset($_SESSION['compra']['codpromo']) && !empty($_SESSION['compra']['codpromo'])){
            $pcode = CodigoPromocional(strtolower(@$_SESSION['compra']['codpromo']), $total);
            $pcode = CodigoPromocional(strtolower(@$_SESSION['compra']['codpromo']), $total);
                                                        //$total2 = 0;
            if ($pcode != null)
            {
                if ($pcode['tipo'] == $_SESSION["moneda"]){
                    $total2 = $total - $pcode['descuento'];
                    $total2 = $total - $total2;
                    $total = $total - $pcode['descuento'];
                }else{
                    $total2 = $total - ($total * ($pcode['descuento'] / 100));
                    $total2 = $total - $total2;
                    $total = $total - ($total * ($pcode['descuento'] / 100)); 
                }
            ?>                   
            <?php
            }
            $_SESSION['datos_cesta']['total2'] = $total2;
        }
        $portes = calculatePortes($total, false, $peso);
        $precioTotalConEnvio = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($total + $portes)), 2, ',', '.');
        
        ?>
        <div class="row transporte-gastos">
            <?php  include_once 'tipo_envio.php'; ?>
        </div>
        <hr>
        <?php muestraDesglose($total, $draizp, $peso); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-9"><span class="importe-title">Total</span></div>
            <?php if(isset($_SESSION['usr'])): ?>       
                <div class="col-xs-12 col-sm-3 text-right"><span class="importe-total"><?php echo $precioTotalConEnvio ?></span> <?=$currency?> </div>
            <?php else: 
                $precioEnvioEstimado = number_format($total + getMinPortePrice(), 2, ',', '.') ;
                ?>   

                <div class="col-xs-12 col-sm-3 text-right"><span class="importe-total"><?php echo $precioEnvioEstimado ?> </span> <?=$currency?></div>
            <?php endif; ?>
        </div>
        <hr>
        <?php  include_once 'modulo_pago.php'; ?>
        <?php
        //Guardo el resultado en una variable
        $_SESSION['datos_cesta']['ImporteTotal'] = $precioTotalConEnvio;
        $_SESSION['datos_cesta']['totalSinEnvio'] = $total;
    }
}

function muestraDatosSuperior($imageSrc, $draizp, $nombre, $cantidad, $precioProducto, $currency, $micesta){
    ?>
    <div class="row bag-item">
        <div class="col-sm-3 hidden-xs">
            <img src="<?php echo (!empty($imageSrc)) ? $imageSrc : $draizp.'/imagenesproductos/'.'default.png' ?>" alt=""/>
        </div>
        <div class="col-xs-6">
            <span><?php echo $nombre ?></span><br>
            <?php if($micesta['fDirecta'] == '1') { ?><span>+ <?=number_format($micesta['cuota'],2,',','.')?>€/mes x <?=$micesta['meses']?>meses</span><?php } ?>
            <span><?=($micesta['talla']!=null ? extractAttributeType($micesta['talla']) : '')?> <?=($micesta['fechas']!=null ? '('.$micesta['fechas'].')' : '')?> <?=($micesta['color']!=null ? ' ('.$micesta['color'].')' : '')?><?=($micesta['extra']!=null ? $micesta['extra'] : '')?></span>
            <?php if($micesta['aplazame'] == 1){ ?>
                <span>Financialo con Aplazame por <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['caplazame1']), 2, ',', '.')?><?=$_SESSION['moneda']?> + <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['caplazame']), 2, ',', '.')?><?=$_SESSION['moneda']?> al mes</span>
            <?php } ?>
        </div>
        <div class="col-xs-6 col-sm-3 price text-right">
            <?php echo $cantidad ." x ". $precioProducto . $currency ?>
        </div>
        <div class="col-xs-12">

        </div>
    </div>
<?php
}

function calculatePortes($total, $showPortes = false, $peso){
    global $Empresa;
    if($Empresa['tipoportes'] == 0){
        $portes_ar = CalculaPortesP($total);
        $logoPortes = $portes_ar[1];
        $portes = $portes_ar[0];
        $portes = str_replace(',', '.', $portes);
    }else if($Empresa['tipoportes'] == 1){
        $portes_ar = CalculaPortesKm($total);
        $logoPortes = $portes_ar[1];
        if($portes_ar[0] >= 0){
            $portes = $portes_ar[0];
            $portes2 = 0;
        }else{
            $portes = $portes_ar[2];
            $portes2 = $portes_ar[0];
        }
        $portes = str_replace(',', '.', $portes);
    }else if($Empresa['tipoportes'] == 2){
        $portes = CalculaPortesProv($total);
        if($portes >= 0){
            $portes = number_format($portes, 2, ',', '.');
            $portes = str_replace(',', '.', $portes);
        }else{
            $portes2 = -4;
        }
    }else if($Empresa['tipoportes'] == 3){
        $portes = CalculaPortesProvP($total, $peso);
        if($portes >= 0){
            $portes = number_format($portes, 2, ',', '.');
            $portes = str_replace(',', '.', $portes);
        }else{
            $portes2 = -4;
        }
    }    
    if($showPortes === true)
        muestraPortes($portes, $portes2, $logoPortes);

    return $portes;
}

function evaluateDataFiles(){
    $draiz = getcwd();

    $dir = $draiz.'/secciones/new_purchase_process/';
    $files = scandir($dir);

    foreach($files as $f){
        if(is_file($dir.$f))
            unlink($dir.$f);
    }
}

function muestraPortes($portes, $portes2, $logoPortes = null){
    global $Empresa;

    $provinciaEnvio = $_SESSION['usr']['provinciaEnv'];
    $paisEnv = $_SESSION['usr']['paisEnvN'];
    $totalPortes = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$portes), 2, ',', '.');
    $msgError = 'Por problemas técnicos no podemos calcular en estos momentos el importe de los gastos de envío. Pongase en contacto con nosotros para poder indicarles los gastos de envío.';

    if($_SESSION['usr'] != null){
        //Si tiene portes o los portes son gratis
        if(($portes > 0 || $Empresa['portes_gratis'] == 0) && $portes2 != -1 && $portes2 != -2 && $portes2 != -3 && $portes2 != -4){           

        }
        else 
            echo $msgError; 
    } 
}

function muestraDesglose($total, $draizp, $peso){
    global $Empresa;

    $draiz = getcwd();
    
    include $draiz.'/secciones/auxiliares.php';

    $baseImpText = $aux12;
    $baseImpPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.');
    $iva = $Empresa['impuesto'];
    $ivaPrice = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.');

    if($Empresa['desglose'] == 1){
    ?>
        <div class="row">
            <div class="col-xs-12"><?php echo $baseImpText . '<span class="pull-right">'. $baseImpPrice .' ' .$_SESSION['moneda'] .'</span>' ?></div>
            <div class="col-xs-12"><?php echo ' ('.$iva.')% <span class="pull-right">'. $ivaPrice .' ' .$_SESSION['moneda'] .'</span>' ?></div>
            <?php if(isset($_SESSION['usr'])): ?>       
            <div class="col-xs-9">Envío</div>
            <div class="col-xs-3 text-right portes-text"><?php echo number_format (calculatePortes($total, false, $peso),2 ) ?> €</div>
            <?php endif; ?>
            <input type="hidden" id="base_helper" value="<?php echo round($total,2) ?>"/>
            <?php if(isset($_SESSION['compra']['codpromo']) && !empty($_SESSION['compra']['codpromo'])): ?>
            <div class="col-xs-12">Descuento que se realiza por el código promocional<?php echo ' <span class="pull-right">-'. number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['datos_cesta']['total2']), 2, ',', '.').' ' .$_SESSION['moneda'] .'</span>' ?></div>
            <div class="col-xs-12">
                <form method="post" class="codigo_promocional" name="cesta" action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pedido">
                    <span type="submit" class="codigo_promocional_text clickable" name="BtSubmit">Eliminar código</span> 
                    <input type="hidden" name="prm" value="2" />
                </form>
            </div>
            <?php else: ?>
            <hr>
            <div class="col-xs-12">
                <form method="post" class="codigo_promocional" name="cesta" action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pedido">
                    <div class="row">
                        <div class="col-xs-3 codigo_promocional_text">Código promocional:</div>
                        <div class="col-xs-5"><input type="text" class="dobleF" id="codpromo" name="codpromo" placeholder="Código Promocional" value="" /></div>
                        <div class="col-xs-4"><span type="submit" class="btn btn-primary" name="BtSubmit">Aplicar cupón</span></div>
                        <input type="hidden" name="prm" value="1" />
                    </div>
                </form>
            </div>
            
            <?php endif; ?>
        </div>
        <hr>        
    <?php
    }
}
 ?>