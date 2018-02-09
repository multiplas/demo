<?php
if(!isset($Empresa))
    global $Empresa;
if($Empresa['tipoportes'] == 0 || $Empresa['tipoportes'] == 2 || $Empresa['tipoportes'] == 3){
    if($_SESSION['compra']['pago']['pagov'] != 'tie'){ ?>
    <div class="col-xs-12">                     
    <h4>Tipo de envío</h4>
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

    $cont = 0;
    $idPT = 0;
    foreach ($portes_extras AS $nporte){        
    
        if($nporte['Gratis'] > $total || !isset($nporte['Gratis'])){
            if($cont == 0)
                echo "<input type='hidden' id='nuevotransp2' name='nuevotransp' value='".$nporte['id']."'>";
    ?>
        <label class="radio-inline"><input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=$nporte['precio']-$portes?>"> <?=$nporte['transportista']?> (+<?=number_format($nporte['precio'], 2, ',', '.')?><?=$_SESSION['moneda']?>)</label>
    <?php 
        }else{
            if($cont == 0)
                echo "<input type='hidden' id='nuevotransp2' name='nuevotransp' value='".$nporte['id']."'>";
    ?>
            <label class="radio-inline"><input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=-$portes?>"> <?=$nporte['transportista']?> (0,00<?=$_SESSION['moneda']?>)</label>
    <?php 
        }
        if($nporte['extension'] != ''){ ?>
            <img src="<?=$draizp?>/logos/<?=$nporte['id']?>.<?=$nporte['extension']?>" style="max-width: 60px; max-height: 30px; float:left" />
        <?php }
        else{ ?>
            <img src="<?php echo $draizp.'/imagenesproductos/'.'default.png' ?>" style="max-width: 60px; max-height: 30px; float:left" />
        <?php } ?>
            <br><br>
            <?php
    } 
    foreach ($portes_extras2 AS $nporte){
        if($cont == 0)
                echo "<input type='hidden' id='nuevotransp2' name='nuevotransp' value='".$nporte['id']."'>";
         ?>
        <label class="radio-inline"><input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=$nporte['precio']-$portes?>"> <?=$nporte['transportista']?> (+<?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$nporte['precio']), 2, ',', '.')?><?=$_SESSION['moneda']?>)</label>
    <?php                                 
        if($nporte['extension'] != ''){ ?>
            <img src="<?=$draizp?>/logosProvincias/<?=$nporte['id']?>.<?=$nporte['extension']?>" style="max-width: 60px; max-height: 30px; float:left" />
        <?php }?>
            <br><br>
            <?php
    } 
    ?>
    <?php foreach ($portes_extras3 AS $nporte){
        if($cont == 0)
                echo "<input type='hidden' id='nuevotransp' name='nuevotransp' value='".$nporte['id']."'>";
         ?>
        <label class="radio-inline"><input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=($nporte['precio']*$peso)-$portes?>"> <?=$nporte['transportista']?> (+<?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($nporte['precio']*$peso)), 2, ',', '.')?><?=$_SESSION['moneda']?>)</label>
    <?php                                 
        if($nporte['extension'] != ''){ ?>
            <img src="<?=$draizp?>/logosProvinciasP/<?=$nporte['id']?>.<?=$nporte['extension']?>" style="max-width: 60px; max-height: 30px; float:left" />
        <?php }?>
            <br><br>
            <?php
    } 
    ?>
            <input type='hidden' id='transp2' name='transp2' value='<?=$idPT?>'>
</div>      
<?php }
}
 ?>