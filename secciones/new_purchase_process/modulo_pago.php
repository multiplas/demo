<form method="post" id="pago-form" name="pago" action="<?=$draizp?>/acc/onepagecheckout">
<?php include $draiz.'/secciones/auxiliares.php'; ?>
    <div style="margin: auto; width: 100%;">
        <?php if(isset($_SESSION['usr'])): ?>  
        <h4><?=$auxfor?></h4>
        <input type="hidden" id="importeBase" name="importeBase" value="<?=$_SESSION['datos_cesta']['totalSinEnvio']?>">
        <input type="hidden" id="importeTotal" name="importeTotal" value="<?=$_SESSION['datos_cesta']['ImporteTotal']?>"/>
        <input type="hidden" id="nuevopenvio" name="nuevopenvio" value="<?=calculatePortes($_SESSION['datos_cesta']['totalSinEnvio'])?>"/>
        <input type='hidden' id='nuevotransp' name='nuevotransp' value='0'>
        <select id="pagarcon" name="pagarcon" onchange="activa()">
            <option value="" selected><?=$auxpag?> *</option>
            <?php
            $actual = "http://".$_SERVER["HTTP_HOST"];
            
            $pagosEspeciales = PagosEspeciales($_SESSION['usr']['id']);
            
            if((($pagosEspeciales['aplazame'] == 1 || $pagosEspeciales['fDirecta'] == 1) && $pagosEspeciales['domicim'] == 0 && $pagosEspeciales['paypalm'] == 0) || count($pagosEspeciales) == 0){
                if (strlen($Empresa['paypal']) > 0){
                    //if($actual == $Empresa['url'] || $activoPayDis == 1)
                    $totalpaypal = $_SESSION['compra']['total'];
                    
                    if($Empresa['ippaypal'] != 0){
                        $totalpaypal = $totalpaypal + (($totalpaypal*$Empresa['ippaypal'])/100);
                    }
                    if($Empresa['ifpaypal'] != 0){
                        $totalpaypal = $totalpaypal + $Empresa['ifpaypal'];
                    }
                    if($Empresa['ifpaypal'] != 0){
                        echo '<option value="pay">(PAYPAL) '.$auxpay.' (+'.$Empresa['ifpaypal'].')</option>';
                    }
                    elseif($Empresa['paypalNombre'] == ''){
                        echo '<option value="pay">(PAYPAL) '.$auxpay.' (+'.$Empresa['ippaypal'].'%)</option>';
                    }
                    else{
                        echo '<option value="pay"> '.$Empresa['paypalNombre'].' (+'.$Empresa['ippaypal'].'%)</option>';
                    }
                }
                if ($Empresa['tpv'] > 0){
                    if($Empresa['tpvNombre'] == ''){
                        echo '<option value="tar">(TARJETA) Débito/Crédito</option>';
                    }else{
                        echo '<option value="tar"> '.$Empresa['tpvNombre'].'</option>';
                    }
                }
                if ($Empresa['tpv2'] > 0){
                    if($actual != $Empresa['url']){
                        if($Empresa['tpvNombre'] == ''){
                            echo '<option value="tpv">(TARJETA) Débito/Crédito </option>';
                        }else{
                            echo '<option value="tpv"> '.$Empresa['tpvNombre'].'</option>';
                        }
                    }
                }
                if (strlen($Empresa['cuenta']) > 0){
                    if($Empresa['transfeNombre'] == ''){
                        echo '<option value="ccc">(TRANSFER) '.$auxtra.' </option>';
                    }else{
                        echo '<option value="ccc"> '.$Empresa['transfeNombre'].' </option>';
                    }
                }
                if ($Empresa['iban'] > 0){
                    if($Empresa['transfeNombre'] == ''){
                        echo '<option value="dom">(DOMIC) '.$auxdom.'</option>';
                    }else{
                        echo '<option value="dom"> '.$Empresa['transfeNombre'].'</option>';                                       
                    }
                }
                if ($Empresa['contrareembolso'] > 0){
                    if($Empresa['contraNombre'] == ''){
                        echo '<option value="cre">(CONTRAR) '.$auxcont.'</option>';
                    }else{
                        echo '<option value="cre"> '.$Empresa['contraNombre'].'</option>';
                    }
                }
                if ($Empresa['entienda'] > 0){
                    if($Empresa['tiendaNombre'] == ''){
                        echo '<option value="tie">(TIENDA) '.$auxtie.'</option>';
                    }else{
                        echo '<option value="tie"> '.$Empresa['tiendaNombre'].'</option>';                                        
                    }
                }
                if($pagosEspeciales['fDirecta'] == 1)
                    echo '<option value="fdir">(FIN.DIR.) Financiación Directa ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['cuota']), 2, ',', '.').$_SESSION['moneda'].' x '.$pagosEspeciales['meses'].' meses)</option>';
                if($pagosEspeciales['aplazame'] == 1){
                    if($Empresa['aplazaNombre'] == ''){
                        echo '<option value="fapl">(FIN.APL.) Financiación Aplazame ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame1']), 2, ',', '.').$_SESSION['moneda'].' + '.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame']), 2, ',', '.').$_SESSION['moneda'].'/mes)</option>';
                    }else{
                        echo '<option value="fapl"> '.$Empresa['aplazaNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame1']), 2, ',', '.').$_SESSION['moneda'].' + '.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame']), 2, ',', '.').$_SESSION['moneda'].'/mes)</option>';
                    }
                }
            }else{
                if($pagosEspeciales['paypalm'] == 1){
                    $totalpaypal = $_SESSION['compra']['total'];
                    if($Empresa['ippaypal'] != 0){
                        $totalpaypal = $totalpaypal + (($totalpaypal*$Empresa['ippaypal'])/100);
                    }
                    if($Empresa['ifpaypal'] != 0){
                        $totalpaypal = $totalpaypal + $Empresa['ifpaypal'];
                    }
                        echo '<option value="paym">(PAYPAL) Paypal Subscripción ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$totalpaypal), 2, ',', '.').$_SESSION['moneda'].')</option>';
                }
                if($pagosEspeciales['domicim'] == 1)
                    echo '<option value="domm">(DOMIC) Domiciliación Subscripción ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                if($pagosEspeciales['fDirecta'] == 1)
                    echo '<option value="fdir">(FIN.DIR.) Financiación Directa ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['cuota']), 2, ',', '.').$_SESSION['moneda'].' x '.$pagosEspeciales['meses'].' meses)</option>';
                if($pagosEspeciales['aplazame'] == 1){
                    if($Empresa['aplazaNombre'] == ''){
                        echo '<option value="fapl">(FIN.APL.) Financiación Aplazame ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame']), 2, ',', '.').$_SESSION['moneda'].'/mes)</option>';
                    }else{
                        echo '<option value="fapl"> '.$Empresa['aplazaNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame']), 2, ',', '.').$_SESSION['moneda'].'/mes)</option>';
                    }
                }
            }
            ?>
        </select>
        <?php endif; ?>
            <br /><br />
            <div id="divpagarcon" style="display: none;">
            <input id="nentidad" name="nentidad" placeholder="Entidad" class="dobleF" value="" type="text" onchange="activa()">
            <span style="color:blue"><small>Nombre de su banco</small></span><br><br>
            <input id="iban" name="iban" placeholder="ESXX" value="" pattern="[A-Za-z]{2}[0-9]{2}" maxlength="4" type="text" onchange="activa()">
            <input id="entidad" name="entidad" placeholder="XXXX" value="" pattern="[0-9]{4}" maxlength="4"  type="text" onchange="activa()"><br>
            <span style="color:blue;"><small>Código IBAN (ES00) y primeros 4 dígitos de su cuenta</small></span><br><br>
            <input id="oficina" name="oficina" placeholder="XXXX" value="" pattern="[0-9]{4}" maxlength="4"  type="text" onchange="activa()">
            <input id="dc" name="dc" placeholder="XXXX" value="" pattern="[0-9]{4}" type="text" maxlength="4"  onchange="activa()"><br>
            <span style="color:blue;"><small>8 siguientes dígitos de su cuenta</small></span><br><br>
            <input id="ccc" name="ccc" placeholder="XXXX" value="" pattern="[0-9]{4}" type="text" maxlength="4" onchange="activa()">
            <input id="ccc2" name="ccc2" placeholder="XXXX" value="" pattern="[0-9]{4}" type="text" maxlength="4"  onchange="activa()"><br>
            <span style="color:blue;"><small>Últimos 8 dígitos de su cuenta</small></span><br><br>
            <span id='ncuentaEr' style="color:red; display: none"><b>¡Nº de cuenta erroneo!</b></span>
            <!--<label>El continuar con el proceso indica que usted acepta las <a style="text-transform: uppercase;" href="/source/Terminos_y_Condiciones_del_Contrato.pdf" target="_blank">condiciones de contratación</a>.</label>-->
            <br><br><br>
        </div>
            
            <div id="divpagarcon2" style="display: none;">
            <img src="<?=$draizp?>/source/pagoseguro.jpg" style="float: left ! important; width: 150px ! important; margin-bottom: 20px ! important;">
            <input id="nombre" name="nombre" placeholder="Nombre" class="dobleF" value="" type="text" onchange="activa()"><br><br>
            <input id="numero" name="numero" placeholder="Nº Tarjeta" class="dobleF" value="" pattern="[0-9]{16}" type="text" maxlength="16" onchange="activa()"><br><br>
            <input id="fecha" name="fecha" placeholder="Fecha caducidad (MM/YY)" value="" pattern="[0-9]{2}[/][0-9]{2}" maxlength="5" type="text" onchange="activa()">
            <input id="cvc" name="cvc" placeholder="CVC" value="" pattern="[0-9]{3}" type="text" maxlength="3" onchange="activa()"><br><br>
            <br><br><br>
        </div>
    </div>
</form>