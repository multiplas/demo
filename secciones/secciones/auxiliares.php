<?php
/* File to add texts to custom variables */
if(!isset($labelidioma))
    $labelidioma = LabelIdioma('ESP');
if(!isset($nombreidioma))
    $nombreidioma = NombreIdioma('ESP');

 for($i=0; $i<count($labelidioma); $i++){
    if($labelidioma[$i][0] == 'cesta_cesta'){
        $aux0 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'compras_cesta'){
        $aux1 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'titulo_cesta'){
        $aux2 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'no_cesta'){
        $aux3 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'actualizar'){
        $aux4 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'seguir'){
        $aux5 = $nombreidioma[$i][0];
    }
    
    if($labelidioma[$i][0] == 'producto'){
        $aux6 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'cantidad'){
        $aux7 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'preciouni'){
        $aux8 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'total'){
        $aux9 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'gastos'){
        $aux10 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'titulo_gastos'){
        $aux11 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'baseimp'){
        $aux12 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'info'){
        $aux13 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'realizarcompra'){
        $aux14 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'gratis'){
        $aux15 = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'actualizar'){
        $auxactu = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'producto'){
        $auxprod = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'cantidad'){
        $auxcan = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'preciouni'){
        $auxpru = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'total'){
        $auxtot = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'gastos'){
        $auxgas = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'titulo_gastos'){
        $auxtgas = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'baseimp'){
        $auxbas = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'info'){
        $auxinf = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'realizarcompra'){
        $auxreal = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'gratis'){
        $auxgra = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'volver'){
        $auxvol = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'empezar'){
        $auxemp = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'datosp'){
        $auxdp = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'datosc'){
        $auxdc = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'datose'){
        $auxde = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'campos'){
        $auxcam = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'continuar'){
        $auxcon = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'tupedido'){
        $auxped = $nombreidioma[$i][0];
    }

    if($labelidioma[$i][0] == 'forma'){
        $auxfor = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'paypal'){
        $auxpay = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'transferencia'){
        $auxtra = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'domiciliacion'){
        $auxdom = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'contrareembolso'){
        $auxcont = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'tienda'){
        $auxtie = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'pagar'){
        $auxpag = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'campos'){
        $auxcam = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'datosen'){
        $auxden = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'datospa'){
        $auxdpa = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'confirmacion'){
        $auxconf = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'finalizado'){
        $auxfin = $nombreidioma[$i][0];
    }

    if($labelidioma[$i][0] == 'receptor'){
        $auxrec = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'factura'){
        $auxfac = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'dentrega'){
        $auxdentre = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'info2'){
        $auxinfo = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'realizarpago'){
        $auxrea = $nombreidioma[$i][0];
    }
}
?>