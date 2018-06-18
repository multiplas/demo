<?php
$enlaceBase = $draizp."/".$_SESSION['lenguaje'];
$enlace1 = array('pedido',$auxprod);
$enlace2 = array('datos_personales',$auxden);
$enlace3 = array('pago',$auxdpa);
$enlace4 = array('confirmacion',$auxconf);
$enlace5 = array('finalizado',$auxconf);
$enlaces = array($enlace1,$enlace2,$enlace3,$enlace4);
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$break_link = explode('/',$actual_link);

$paginacion = '<nav class="breadcrumb container">';
$paginacion .= '<div class="row">';
$paginacion .= '<div class="col-sm-12">';
$active = false;

/*foreach($enlaces as $current_enlace){
    if($current_enlace[0] == $break_link[count($break_link)-1]){
        $paginacion .= ' <span class="breadcrumb-item active">'.$current_enlace[1].'</span> >';
        $active = true;
    }
    elseif($active == true){
        $paginacion .= ' <span class="breadcrumb-item next">'.$current_enlace[1].'</span> >';
    }
    else{
        $paginacion .= ' <a class="breadcrumb-item" href="'.$enlaceBase.$current_enlace[0].'">'.$current_enlace[1].'</a> >';
    }
}*/
$paginacion .= ' <a class="breadcrumb-item" href="'.$enlaceBase.'cesta">Carrito</a>';
$paginacion .= ' <span class="breadcrumb-item active">Datos de entrega</span> >';
$paginacion = substr($paginacion,0,strlen($paginacion)-1);//Elimino el último >
$paginacion .= '</div>';
$paginacion .= '</div>';
$paginacion .= '</nav>';

echo $paginacion;

?>