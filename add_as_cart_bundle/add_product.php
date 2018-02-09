<?php
$q = $_REQUEST["q"];//get_parameter
$quantity = $_REQUEST["quantity"];//get_parameter

if(session_id() == '') {//Check if session started
    session_start();
}

if (isset($_SESSION['usr']) && !empty($_SESSION['usr'])){//Verifica que el usuario esté logueado
    $result = array('quantity' => $quantity, 'name' => $q);
    if ( !isset($_SESSION['carrito']) ) {    
        $_SESSION['carrito'] = array();
        $_SESSION['carrito'][] = $result;
    }
    else{
        $encontrado = false;
        for($i = 0; $i < count($_SESSION['carrito']); $i++){
            if($_SESSION['carrito'][$i]['name']== $q){
                $encontrado = true;
                $_SESSION['carrito'][$i]['quantity'] = $_SESSION['carrito'][$i]['quantity']+ $quantity;
            }
        }
        if(!$encontrado)
            $_SESSION['carrito'][] = $result;
    }
}
else{
    echo "not registered";
}

 ?>