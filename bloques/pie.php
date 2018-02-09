<?php 
if($_SESSION['app'] == "NO"){
    include_once($draiz.'/temas/'.$pie.'/bloques/pie.php');
}else{
    include_once($draiz.'/temas/app/bloques/pie.php');
}
?>
