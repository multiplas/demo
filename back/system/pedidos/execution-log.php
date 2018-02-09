<?php
session_start();
require_once "../back/config_db_cms.php";
require_once "../back/config/conectar_cms.php";
require_once('system/pedidos/functions-log.php');
$urlact = basename($_SERVER['PHP_SELF']);
$Datos_log = new DatosLog("BD_CLIENTE");


switch ($urlact) {
    case 'facturas.php':
        if (@$_GET['estadofact'] != null && @$_GET['estadof'] != null)
            $resultaop_antes = $Datos_log->GetFactura($_GET['estadofact']);
        break;
    case 'log_status_pedidos.php':
        //Obteniendo logs de status de pedidos
        $list_logs = $Datos_log->GetLogStatus();
        break;
}


function SetLogStatus($resultaop_antes,$pedido,$Datos_log){
    $log=$Datos_log->InsertLogStatus($_SESSION['usr']{'id'}, $pedido[0]{'id'}, $pedido[0]{'numero'}, $resultaop_antes['estado'],$pedido{0}{'estado'});
}


?>