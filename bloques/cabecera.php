<?php
require_once('back/system/estadisticas/execution-visitor.php');
if($_SESSION['app'] == "NO"){
    include_once($draiz.'/temas/'.$cabecera.'/bloques/cabecera.php');
}else{
    include_once($draiz.'/temas/app/bloques/cabecera.php');
}
?>

