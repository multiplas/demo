<?php
session_start();
require_once "../back/config_db_cms.php";
require_once "../back/config/conectar_cms.php";
require_once('./system/functions.module');	

$System = new MySystem("BD_CLIENTE");

$System->ControlDeSesiones();

$System->CargarEmpresa();

$emailEnviado = $System->EnviarEmail($_POST['emailDestino'], 'Email de Prueba', 'Este es un email de prueba autogenerado para verificar que la configuración de las notificaciones es correcta', 1);

print_r($emailEnviado);

?>