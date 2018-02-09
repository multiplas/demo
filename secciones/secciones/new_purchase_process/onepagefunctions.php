<?php
function onePageCheckOut($numeroTarjeta = null, $caducidadTarjeta = null, $cvv = null, $metodoPago = null, $nombre = null, $fecha = null, $cvc = null, $nentidad = null, $iban = null, $entidad = null, $oficina = null, $dc = null, $ccc = null, $ccc2 = null, $apellidos = null, $dni = null, $importeTotal = null, $nuevopenvio = null, $nuevotransp = null){
    $_SESSION['compra']['paso'] = 3;
    $tarjeta = array(
        'numero' => $numeroTarjeta, 
        'caducidad' => $caducidadTarjeta.'/'.$caducidadTarjeta, 
        'cvv' => $cvv
    );
    
    //$_SESSION['domiciliacion'] = null;
    switch ($metodoPago)
    {
        case 'tar':
            $pagarocon = 'TARJETA';
            $_SESSION['domiciliacion'] = null;
            break;
        case 'pay':
            $pagarocon = 'PAYPAL';
            $_SESSION['domiciliacion'] = null;
            break;
        case 'ccc':
            $pagarocon = 'TRANSFERENCIA';
            $_SESSION['domiciliacion'] = null;
            break;
        case 'cre':
            $pagarocon = 'CONTRAREEMBOLSO';
            $_SESSION['domiciliacion'] = null;
            break;
        case 'tpv':
            $pagarocon = 'TARJETA';
            $_SESSION['tarjeta'] = array(
                'nombre' => $nombre,
                'numero' => $numeroTarjeta,
                'fecha' => $fecha,
                'cvc' => $cvc
            );
            break;
        case 'dom':
            $pagarocon = 'DOMICILIACIÓN';
            $_SESSION['domiciliacion'] = array(
                'nentidad' => $nentidad,
                'iban' => $iban,
                'entidad' => $entidad,
                'oficina' => $oficina,
                'dc' => $dc,
                'ccc' => $ccc,
                'ccc2' => $ccc2
            );
            break;
        case 'domm':
            $pagarocon = 'DOMICILIACIÓN SUBSCRIPCIÓN';
            $_SESSION['domiciliacion'] = array(
                'nentidad' => $nentidad,
                'iban' => $iban,
                'entidad' => $entidad,
                'oficina' => $oficina,
                'dc' => $dc,
                'ccc' => $ccc,
                'ccc2' => $ccc2
            );
            break;
        case 'fdir':
            $pagarocon = 'FINANCIACIÓN DIRECTA';
            $_SESSION['domiciliacion'] = array(
                'nentidad' => $nentidad,
                'iban' => $iban,
                'entidad' => $entidad,
                'oficina' => $oficina,
                'dc' => $dc,
                'ccc' => $ccc,
                'ccc2' => $ccc2
            );
            break;
        case 'paym':
            $pagarocon = 'PAYPAL SUBSCRIPCIÓN';
            $_SESSION['domiciliacion'] = null;
            break;
        case 'tie':
            $pagarocon = 'EN TIENDA';
            $_SESSION['domiciliacion'] = null;
            break;
        case 'fapl':
            $pagarocon = 'FINANCIACIÓN APLAZAME';
            $_SESSION['domiciliacion'] = null;
            break;
            $_SESSION['domiciliacion'] = null;
            break;
        default:
            $pagarocon = 'ERROR';
            $_SESSION['domiciliacion'] = null;
            break;
    }
    $_SESSION['compra']['pago'] = array(
        'nombre' => $nombre,
        'apellidos' => $apellidos,
        'dni' => $dni,
        'pago' => $pagarocon,
        'pagov' => $metodoPago,
        'tarjeta' => $tarjeta
    );

    if(!is_null($importeTotal)){
        $_SESSION['compra']['pago']['importe'] = $importeTotal;//Variables de onepagecheckout
    }
    if(!is_null($nuevopenvio)){
        $_SESSION['compra']['pago']['penvio'] = $nuevopenvio;//Variables de onepagecheckout
    }
    if(!is_null($nuevotransp)){
        $_SESSION['compra']['pago']['transp'] = $nuevotransp;//Variables de onepagecheckout
    }			
    
}

function realizarPago($penvio = null, $transp = null, $draiz){
    if(isset($_SESSION['compra']['pago']['penvio']))
        $penvio = $_SESSION['compra']['pago']['penvio'];
    else
        $penvio = $penvio;
    if(isset($_SESSION['compra']['pago']['transp']))
        $transp = $_SESSION['compra']['pago']['transp'];
    else
        $transp = $transp;
    $penvio = floatval($penvio);
    
   
    $_SESSION['compra']['paso'] = 4;
    require_once($draiz.'/sistema/mod_cestaycompra.php');
    
    if ($_SESSION['compra']['pago']['pagov'] == 'ccc')
        PagarConTransferencia($penvio, $transp);
    else if ($_SESSION['compra']['pago']['pagov'] == 'cre')
        PagarContraReembolso($penvio, $transp);
                    else if ($_SESSION['compra']['pago']['pagov'] == 'tie')
        PagarEnTienda();
                    else if ($_SESSION['compra']['pago']['pagov'] == 'tpv')
        PagarTarjetaSinTPV($penvio, $transp);
                    else if ($_SESSION['compra']['pago']['pagov'] == 'dom')
        PagarDomiciliacion($penvio, $transp);
                    else if ($_SESSION['compra']['pago']['pagov'] == 'domm')
        PagarDomiciliacionM($penvio, $transp);
                    else if ($_SESSION['compra']['pago']['pagov'] == 'fdir')
        PagarDomiciliacionFD($penvio, $transp);
    else if ($_SESSION['compra']['pago']['pagov'] == 'tar')
        PagarConTarjetaTPV($penvio, $transp);
                    else if ($_SESSION['compra']['pago']['pagov'] == 'paym')
        PagarConPaypalS($penvio, $transp);
                    else if ($_SESSION['compra']['pago']['pagov'] == 'fapl')
        PagarConAplazame($penvio, $transp);
    else
        PagarConPaypal($penvio, $transp);
}

?>