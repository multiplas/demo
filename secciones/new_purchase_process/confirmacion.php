
        
        <div style="display:none">
        <form method="post" enctype="multipart/form-data" id="confirmacion" name="confirmacion" action="<?=$draizp?>/acc/realizar_pago">
            <div style="margin: auto; max-width: 550px; width: 100%;">
                <?php include 'total_calculate_helper.php'; ?>
                <h2><?=$auxprod?></h2>
                <?php
                if (count($pedido) < 1) echo '<p>No hay productos en tu cesta!</p>';
                else
                {
                    if(!isset($Empresa))
                        global $Empresa;
                    ?>
                        <table id="tcesta" class="alter">
                            <thead>
                                <tr>
                                    <th style="display: none;"></th>
                                    <th style="display: none;"></th>
                                    <th colspan="1"><?=$auxprod?></th>
                                    <th><?=$auxcan?></th>
                                    <th style="display: none;"><?=$auxpru?></th>
                                    <th style="display: none;">Precio/Per</th>
                                    <th><?=$auxtot?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total = $_SESSION['datos_cesta']['totalSinEnvio'];
                                    $peso = 0;                                  
                                       
                                    $portes = calculatePortes($total);                                            
                                    if(($portes > 0 || $Empresa['portes_gratis'] == 0) && $portes != -4){ ?>
                                    <tr>
                                        <td style="display: none;"></td>
                                        <td style="display: none; position: relative;"></td>
                                        <td><span class="enlazado"><?=$auxgas?></span><span><?=$auxtgas?> <?=$_SESSION['compra']['entrega']['provinciaE']?>, <?=$_SESSION['compra']['entrega']['paisE']?></span></td>
                                        <td>
                                            <form method="post" action="#">
                                                <input type="text" class="miniF" name="desertor" value="1" readonly />
                                            </form>
                                        </td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                                                                        <?php if($_SESSION['compra']['pago']['pagov'] != 'tie'){ ?>
                                        <td><?=$portes > 0 ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$portes), 2, ',', '.').$_SESSION['moneda'] : $auxgra?></td>
                                                                                        <?php }else{ ?>
                                                                                        <td><?=$auxgra?></td>
                                                                                        <?php } ?>
                                                                                        
                                                                                            
                                                                                        
                                    </tr>
                                                                            <?php }else if($portes == -4){ ?>
                                                                                    <td style="display: none;"></td>
                                        <td style="display: none; position: relative;"></td>
                                        <td><span class="enlazado"><?=$auxgas?></span><span><?=$auxtgas?> <?=$_SESSION['compra']['entrega']['provinciaE']?>, <?=$_SESSION['compra']['entrega']['paisE']?></span></td>
                                        <td>
                                            <form method="post" action="#">
                                                <input type="text" class="miniF" name="desertor" value="1" readonly />
                                            </form>
                                        </td>
                                                                                        <td>Actualmente no realizamos entrega en la provincia de <?=$_SESSION['compra']['entrega']['provinciaE']?></td>
                                                                                <?php } ?>
                                                                                
                                            <?php if($_SESSION['compra']['pago']['pagov'] == 'cre'){ ?>  
                                                    
                                                                                <tr>
                                        <td style="display: none;"></td>
                                        <td style="display: none; position: relative;"></td>
                                        <td><span class="enlazado">Tasas Contrareembolso</span></td>
                                        <td>
                                            <form method="post" action="#">
                                                <input type="text" class="miniF" name="desertor" value="1" readonly />
                                            </form>
                                        </td>
                                        <td style="display: none;"></td>
                                        <td style="display: none;"></td>
                                        <td><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$Empresa['contrareembolso']), 2, ',', '.').$_SESSION['moneda']?></td>
                                    </tr>
                                                                                
                                            <?php 
                                            $total += $Empresa['contrareembolso'];
                                            } ?>
                                                                                
                                            <?php $incremento1 = 0; $incremento2 = 0;
                                            if($_SESSION['compra']['pago']['pagov'] == 'pay'){ 
                                                if($Empresa['ippaypal'] != 0){ 
                                                    $incremento1 = (($total+ $portes) * $Empresa['ippaypal'])/100;
                                                    ?>
                                                        <tr>
                                                            <td style="display: none;"></td>
                                                            <td style="display: none; position: relative;"></td>
                                                            <td>Incremento PayPal</td>
                                                            <td>1</td>
                                                            <td style="display: none;"></td>
                                                            <td style="display: none;"></td>
                                                            <td><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$incremento1), 2, ',', '.').$_SESSION['moneda']?></td>
                                                        </tr>
                                                <?php } 
                                                
                                                if($Empresa['ifpaypal'] != 0){ 
                                                    $incremento2 = $Empresa['ifpaypal']; ?>
                                                                                <tr>
                                                                                    <td style="display: none;"></td>
                                                                                    <td style="display: none; position: relative;"></td>
                                                                                    <td>Incremento PayPal</td>
                                                                                    <td>1</td>
                                                                                    <td style="display: none;"></td>
                                                                                    <td style="display: none;"></td>
                                                                                    <td><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$Empresa['ifpaypal']), 2, ',', '.').$_SESSION['moneda']?></td>
                                                                                </tr>
                                                <?php } ?>
                                                
                                                                                
                                            <?php } ?>
                                                                            
                                    <tr>
                                        <td colspan="1">
                                            <?php if($Empresa['desglose'] == 1){ ?>
                                                <?=$auxbas?>&nbsp;&nbsp;
                                                <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.').$_SESSION['moneda']?><br>
                                                <!--IVA-->(21%)&nbsp;&nbsp;
                                                <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.').$_SESSION['moneda']?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                            
                            </tbody>
                        </table>
                    <?php
                }
                ?>
        <?php if($Empresa['tipoportes'] == 0 || $Empresa['tipoportes'] == 2 || $Empresa['tipoportes'] == 3){
            if($_SESSION['compra']['pago']['pagov'] != 'tie'){ ?>
                                        <h2>Tipo de envío</h2>
                    
                    <?php
                    if($Empresa['tipoportes'] == 0){
                        @$portes_extras = OtrosEnvios($total);
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
                    ?>
                                <input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=$nporte['precio']-$portes?>"> <?=$nporte['transportista']?> (+<?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$nporte['precio']), 2, ',', '.')?><?=$_SESSION['moneda']?>)                    <?php 
                        }else{
                    ?>
                        <input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=-$portes?>"> <?=$nporte['transportista']?> (0,00<?=$_SESSION['moneda']?>)
                    <?php 
                        }
                        if($nporte['extension'] != ''){ ?>
                        <img src="<?=$draizp?>/logos/<?=$nporte['id']?>.<?=$nporte['extension']?>" style="max-width: 60px; max-height: 30px; float:left" />
                        <?php }?>
                        <br><br>
                        <?php
                    } 
                    foreach ($portes_extras2 AS $nporte){ ?>
                        <input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=$nporte['precio']-$portes?>"> <?=$nporte['transportista']?> (+<?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$nporte['precio']), 2, ',', '.')?><?=$_SESSION['moneda']?>)
                    <?php                                 
                        if($nporte['extension'] != ''){ ?>
                        <img src="<?=$draizp?>/logosProvincias/<?=$nporte['id']?>.<?=$nporte['extension']?>" style="max-width: 60px; max-height: 30px; float:left" />
                        <?php }?>
                        <br><br>
                        <?php
                    } 
                    ?>
                    <?php foreach ($portes_extras3 AS $nporte){ ?>
                        <input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=($nporte['precio']*$peso)-$portes?>"> <?=$nporte['transportista']?> (+<?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($nporte['precio']*$peso)), 2, ',', '.')?><?=$_SESSION['moneda']?>)
                    <?php                                 
                        if($nporte['extension'] != ''){ ?>
                        <img src="<?=$draizp?>/logosProvinciasP/<?=$nporte['id']?>.<?=$nporte['extension']?>" style="max-width: 60px; max-height: 30px; float:left" />
                        <?php }?>
                        <br><br>
                        <?php
                    } 
                    ?>
                        <input type='hidden' id='transp' name='transp' value='<?=$idPT?>'>
                        <script>
                            function cambTransp($id){
                                document.getElementById("transp").value = $id;
                            }
                        </script>
        <?php }else{ ?>
            <input type='hidden' id='transp' name='transp' value='0'>           
        <?php }
        }else{  ?>
            <input type='hidden' id='penvio' name='penvio' value='<?=$portes_ar[0]?>'>
        <?php }
?>
                <h2><?=$auxrec?></h2>
                <input type="text" id="email" name="email" class="dobleF" placeholder="Correo Electrónico" disabled value="<?=@$_SESSION['usr']['email']?>"><br /><br /><br />
                <h2><?=$auxde?></h2>
                                        <?php if($_SESSION['usr']['RazonSocial'] != ''){ ?><input class="dobleF" type="text" id="nombrer" name="nombrer" placeholder="Nombre" disabled value="<?=@$_SESSION['usr']['RazonSocial']?>"><br><?php } ?>
                                        <input type="text" id="nombrer" name="nombrer" placeholder="Nombre" disabled value="<?=@$_SESSION['compra']['entrega']['nombre']?>">
                <input type="text" id="dni" name="dni" placeholder="DNI" value="<?=@$_SESSION['compra']['entrega']['dni']?>" disabled><br />
                <input type="text" class="dobleF" id="direccion" name="direccion" placeholder="Dirección" value="<?=@$_SESSION['compra']['entrega']['direccion']?>" disabled />
                <input type="text" id="paisi" name="paisi" placeholder="País" value="<?=@$_SESSION['compra']['entrega']['pais']?>" disabled>
                <input type="text" disabled="" id="provincia2" name="provincia2" placeholder="Provincia" value="<?=@$_SESSION['compra']['entrega']['provincia']?>"><br />
                <input type="text" id="localidad" name="localidad" placeholder="Localidad" value="<?=@$_SESSION['compra']['entrega']['localidad']?>" disabled>
                <input type="text" id="cp" name="cp" class="mitadF2" placeholder="C. Postal" value="<?=@$_SESSION['compra']['entrega']['cp']?>" disabled /><br /><br />
                <span style="display: <?=$mostraEnvio ? 'block' : 'none'?>">
                                        <h2><?=$auxdentre?></h2>
                                        <input type="text" class="dobleF" id="nombreE" disabled name="nombreE" placeholder="Nombre" value="<?=@$_SESSION['compra']['entrega']['nombreE']?>">
                <input type="text" class="dobleF" id="direccion" disabled name="direccion" placeholder="Dirección *" value="<?=$_SESSION['compra']['entrega']['direccionE']?>" />
                                        <input type="text" id="localidad" name="localidad" disabled placeholder="Localidad *" value="<?=$_SESSION['compra']['entrega']['localidadE']?>" />
                <input type="text" id="provinciaE" name="provinciaE" disabled placeholder="Provincia *" value="<?=$_SESSION['compra']['entrega']['provinciaE']?>" /><br />
                <input type="text" id="cp" name="cp" class="mitadF2" disabled placeholder="C. Postal *" value="<?=$_SESSION['compra']['entrega']['cpE']?>" />
                                        <input type="text" id="pais" name="pais" disabled placeholder="Pais *" value="<?=$_SESSION['compra']['entrega']['paisE']?>" /><br />
                                        <input type="text" id="telefono" name="telefono" placeholder="Teléfono" value="<?=@$_SESSION['compra']['entrega']['telefono']?>" disabled /><br /><br />
                                        </span>
                                        <h2><?=$auxfor?></h2>
                <input type="text" id="fpago" name="fpago" placeholder="Forma de Pago" style="text-align: center;" value="<?=$_SESSION['compra']['pago']['pago']?>" disabled><br /><br />
                                        <?php if($_SESSION['compra']['pago']['pagov'] == 'dom'){ ?><input id="fpago2" name="fpago2" placeholder="Entidad" style="text-align: center;" value="<?=$_SESSION['domiciliacion']['nentidad']?>" disabled="" type="text"><?php } ?>
                                        <?php if($_SESSION['compra']['pago']['pagov'] == 'dom'){ ?><input id="fpago3" name="fpago3" placeholder="IBAN" style="text-align: center;" value="<?=$_SESSION['domiciliacion']['iban']?> <?=$_SESSION['domiciliacion']['entidad']?> <?=$_SESSION['domiciliacion']['oficina']?> <?=$_SESSION['domiciliacion']['dc']?> <?=$_SESSION['domiciliacion']['ccc']?> <?=$_SESSION['domiciliacion']['ccc2']?>" disabled="" type="text"><?php } ?>
                                        <?php if(count($otrosCampos)>0){ ?>
                                            <h2>Otros datos</h2>
                                            <?php foreach($otrosCampos AS $newCampo){ 
                                                if($newCampo['tipo'] == 0){ ?>
                                                    <br><?=$newCampo['nombre']?>: <input class="dobleF" type="text" name="<?=$newCampo['nombre']?>" placeholder="<?=$newCampo['nombre']?>"><br>
                                            <?php }else if($newCampo['tipo'] == 1){ ?>
                                                    <br><?=$newCampo['nombre']?>: <textarea class="dobleF" style="margin: 0px !important" name="<?=$newCampo['nombre']?>" placeholder="<?=$newCampo['nombre']?>"></textarea>
                                            <?php }else if($newCampo['tipo'] == 2){ ?>
                                                    <br><?=$newCampo['nombre']?>: <input type="file" class="dobleF" style="margin: 0px !important" name="<?=$newCampo['nombre']?>"><br>
                                            <?php }
                                            } 
                                        }?>
            </div>
                                <?php if($portes != -4){ ?><span type="submit" class="button" name="BtSubmit" style="float: right;">Realizar Pago</span><?php }?>
                                <span type="submit" class="button" onclick="location.href='/<?=$_SESSION['lenguaje']?>cesta';"><?=$auxvol?></span>&nbsp;&nbsp;&nbsp;
            <h5 style="display: inline-block; color: #E81F32; font-style: italic;"><?=$auxinfo?></h5>
        </form>
        </div>

        <script>
        jQuery(document).ready(function(){
            jQuery("#confirmacion").submit();
        });
        </script>