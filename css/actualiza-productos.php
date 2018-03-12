<?php
include_once '../sistema/mod_productos.php';
require_once('../sistema/i_connectionstrings.php');

function updateAttr($id, $value){
    include '../sistema/i_connectionstrings.php';
    
    $dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);
    $conn = new mysqli($svr, $usr, $pwd);
    $sql = "UPDATE  bd_producto_atributo SET precio = 0, precioextra = $value WHERE id = $id";
    $query = mysqli_query($dbi, $sql);
    if(mysqli_affected_rows($query) == 1 ){
        return true;
    }
}

function setNewValue($productID){
    include '../sistema/i_connectionstrings.php';
    $actualizados = 0;
    
    $dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);
    $conn = new mysqli($svr, $usr, $pwd);

    $sql = "SELECT * FROM  bd_producto_atributo WHERE idproducto = $productID";
    $query = mysqli_query($dbi, $sql);
    $atributos = array();
    if (mysqli_num_rows($query) > 0)
    {
        while($assoc = mysqli_fetch_assoc($query)){
            $atributos[] = $assoc; 
        }
    }
    foreach($atributos as $atributo){
        if($atributo['precio'] != 0 && $atributo['precioextra'] == 0){
            if(updateAttr($atributo['id'], $atributo['precio']) == true);
                $actualizados++;
        }
    }
    return $actualizados;
}

$dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);
$sql="SELECT * FROM bd_productos";
$query = mysqli_query($dbi, $sql);
$productos = array();
$totalActualizados = 0;
if (mysqli_num_rows($query) > 0)
{
    while($assoc = mysqli_fetch_assoc($query)){
        $productos[] = $assoc;
    }
}

foreach($productos as $current){
    $totalActualizados += setNewValue($current['id']);
}

echo "El total de actualizados es $totalActualizados";

?>