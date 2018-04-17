<?php
if(!isset($Empresa))
    global $Empresa;
if($Empresa['tipoportes'] == 0 || $Empresa['tipoportes'] == 2 || $Empresa['tipoportes'] == 3){
    if($_SESSION['compra']['pago']['pagov'] != 'tie'){ ?>
    <div class="col-xs-12">           
    <?php if(isset($_SESSION['usr'])): ?>          
        <h4>Tipo de envío</h4>
    <?php endif; ?>
    <?php
    if($Empresa['tipoportes'] == 0){
        $portes_extras = OtrosEnvios($total);
    }
    if($Empresa['tipoportes'] == 2){
        $portes_extras2 = OtrosEnvios2($total);
    }
    if($Empresa['tipoportes'] == 3){
        $portes_extras3 = OtrosEnvios3($total);
    }

    $output = '';
    $cont = 0;
    $idPT = 0;
    $precioPorte = 0;
    foreach ($portes_extras AS $nporte){            
        if($nporte['Gratis'] > $total || !isset($nporte['Gratis'])){
            $producto_single = Producto($cesta[0]['id']);   //Si el producto tiene envio especial individual
                                
            if(count($cesta) == 1 && !is_null($producto_single['precio_transporte_ind']) && $producto_single['precio_transporte_ind'] != 0 ){
                $portes = $producto_single['precio_transporte_ind'];
                $portes = number_format($portes, 2, ',', '.');
                $precioPorte = str_replace(',', '.', $portes);
            }
            else
                $precioPorte = number_format($nporte['precio'], 2, ',', '.');
            $precioValue = $nporte['precio']-$portes;
            if($cont == 0)
                $output .= "<input type='hidden' id='nuevotransp2' name='nuevotransp' value='".$nporte['id']."'>";
            $output .= '<label class="radio-inline"><input onclick="cambTransp('.$nporte['id'].')" type="radio" id="penvio" name="penvio"';
            if($cont == 0){ 
                $output .= " checked "; 
                $cont++; 
                $idPT=$nporte['id']; 
            }
            $output .=' value="'. $precioValue .'"> '.$nporte['transportista'].' (+'.$precioPorte . $_SESSION['moneda'].')</label>';
        }else{
            if($cont == 0)
                $output .= "<input type='hidden' id='nuevotransp2' name='nuevotransp' value='".$nporte['id']."'>";

            $output .= '<label class="radio-inline"><input onclick="cambTransp('.$nporte['id'].')" type="radio" id="penvio" name="penvio"';
            if($cont == 0){
                $output .= " checked"; 
                $cont++;
                $idPT=$nporte['id'];
            }
            $output .=' value="'.-$portes.'"> '.$nporte['transportista'].' (0,00'.$_SESSION['moneda'].')</label>';

        }
        if($nporte['extension'] != ''){ 
            $output .='<img src="'.$draizp.'/logos/'.$nporte['id'].'.'.$nporte['extension'].'" style="max-width: 60px; max-height: 30px; float:left" />';
        }
        else{
            $output .='<img src="'.$draizp.'/imagenesproductos/'.'default.png" style="max-width: 60px; max-height: 30px; float:left" />';
        } 
        $output .='<br><br>';
    } 
    foreach ($portes_extras2 AS $nporte){
        $precioPorte = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$nporte['precio']), 2, ',', '.');
        $precioValue = $nporte['precio']-$portes;
        if($cont == 0)
            $output .= "<input type='hidden' id='nuevotransp2' name='nuevotransp' value='".$nporte['id']."'>";
         
        $output .='<label class="radio-inline"><input onclick="cambTransp('.$nporte['id'].')" type="radio" id="penvio" name="penvio"';
        if($cont == 0){
            $output .= " checked";
            $cont++;
            $idPT=$nporte['id']; 
        } 
        $output .= ' value="'.$precioValue.'"> '.$nporte['transportista'].' (+'.$precioPorte.$_SESSION['moneda'].')</label>';
                                 
        if($nporte['extension'] != ''){
            $output .= '<img src="'.$draizp.'/logosProvincias/'.$nporte['id'].'.'.$nporte['extension'].'" style="max-width: 60px; max-height: 30px; float:left" />';
        }
        $output .='<br><br>';
    } 
    ?>
    <?php foreach ($portes_extras3 AS $nporte){
        $precioPorte = number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($nporte['precio']*$peso)), 2, ',', '.');
        $precioValue = ($nporte['precio']*$peso)-$portes;
        if($cont == 0)
            $output .= "<input type='hidden' id='nuevotransp2' name='nuevotransp' value='".$nporte['id']."'>";
        
        $output .= '<label class="radio-inline"><input onclick="cambTransp('.$nporte['id'].')" type="radio" id="penvio" name="penvio"';
        if($cont == 0){
            $output .= " checked"; 
            $cont++; 
            $idPT=$nporte['id']; 
        } 
        $output .= ' value="'.$precioValue.'"> '.$nporte['transportista'].' (+'.$precioPorte.''.$_SESSION['moneda'].')</label>';
                            
        if($nporte['extension'] != ''){ 
            $output .='<img src="'.$draizp.'/logosProvinciasP/'.$nporte['id'].'.'.$nporte['extension'].'" style="max-width: 60px; max-height: 30px; float:left" />';
        }
        $output .='<br><br>';
    } 
    if(isset($_SESSION['usr'])){//Mostramos los precios para el usuario registrado
        echo $output;
    }
    else{
        global $dbi;
        $getPortesPrices = mysqli_query($dbi, "SELECT MIN( precioP ) FROM bd_portes");//Damos por hecho que el minimo es para españa
        if(mysqli_num_rows($getPortesPrices) > 0){//Hay portes
            $minPorte = mysqli_fetch_assoc($getPortesPrices);
        }  
        
        echo "Gastos de envío desde:  ".number_format(getMinPortePrice(), 2, ',', '.')." ".$_SESSION['moneda'];
    }
    ?>
            <input type='hidden' id='transp2' name='transp2' value='<?=$idPT?>'>
</div>      
<?php }
}
 ?>