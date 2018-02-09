<?php
session_start();
require_once "../back/config_db_cms.php";
require_once "../back/config/conectar_cms.php";
require_once('system/pedidos/functions-pedidos.php');
$urlact = basename($_SERVER['PHP_SELF']);
$System = new MySystem("BD_CLIENTE");
$MensajeConfig = new ConfigMail("BD_CLIENTE");
$System->ControlDeSesiones();

switch ($urlact) {
    case 'facturas.php':
        if ($resultaop) {

            if ($_GET['estadof'] == 1)
                $status = 'Pendiente';
            else if ($_GET['estadof'] == 2)
                $status = 'Procesando';
            else if ($_GET['estadof'] == 3)
                $status = 'Procesado';
            else if ($_GET['estadof'] == 4)
                $status = 'Enviado';
            else if ($_GET['estadof'] == 5)
                $status = 'Entregado';
            else if ($_GET['estadof'] == 6)
                $status = 'Stock';
            else if ($_GET['estadof'] == 7)
                $status = 'Cancelado';

            //Obteniendo datos primordiales del pedido
            $pedido = $MensajeConfig->GetFactura($_GET['estadofact']);
            //Insertando en el log
            SetLogStatus($resultaop_antes,$pedido,$Datos_log);
            //Obteniendo mensaje para el email al momento de cambiar el estatus del pedido
            $msj_config = $MensajeConfig->GetMensaje($status);
            $msj_c = $msj_config[0];
            $datos_pedido = $pedido[0];
            //Reemplazando variables-cadenas html
            $mensaje_resultado = str_replace("[[NombreU]]", "<b>" . $datos_pedido['nombre'] . "</b>", $msj_config[0]['mensaje']);
            $mensaje_resultado = str_replace("[[NumPedido]]", "<b>" . $datos_pedido['numero'] . "</b>", $mensaje_resultado);
            $mensaje_resultado = str_replace("[[EstadoPedido]]", "<b>" . $status . "</b>", $mensaje_resultado);
            //Obteniendo datos de la empresa
            $empresa_msj=$MensajeConfig->GetEmpresa();
            //destinatario
            $para=$datos_pedido['email'];
            //Enviando email al cliente
            enviar_mail_status($mensaje_resultado, $System, $para,$empresa_msj);
        }
        break;
    case 'config_msj_pedido.php':
        if($_GET['editarmsj']){
            $elemento = $MensajeConfig->GetMensaje(NULL, $_GET['editarmsj'] );
            $elemento=$elemento[0];
        }
        if($_POST['id']){
            $resultaop = $MensajeConfig->UpdateMensaje($_POST['id'], $_POST['mensaje']);
        }
        //Obteniendo mensaje para el email al momento de cambiar el estatus del pedido
        $list_msj_config = listar_mensajes($MensajeConfig);
        break;
}
//Función para enviar email con la información del cambio de estatus de un pedido
function enviar_mail_status($mensajeE,$System, $para, $empresa){
    $msj_color='#F9F7F6';
    $asunto="Notificacion de estatus de pedido";
    $encabezado='<img src="http://demo.tiendavirtualprofesional.com/source/'.$empresa['logosup'].'"><br><br><br>';
    $pie='<div style="width: 100%; background-color:'.$msj_color.'">'.$empresa['nombre'].',<br>
            Web: '.$empresa['dominio'].'<br>
            Direccion: '.$empresa['direccion'].', '.$empresa['localidad'].', '.$empresa['provincia'].'.<br>
            Telefonos; '.$empresa['telefono'].' - '.$empresa['telefono2'].' - '.$empresa['telefono3'].'<br>
            Correo: '.$empresa['email'].' - Fax: '.$empresa['fax'].'</div>';
    $mensajeE=$encabezado.$mensajeE.'<br><br><br>'.$pie;
    $envio_mail= $System->EnviarEmail($para, $asunto, $mensajeE);
}
//Funcion para listar mensajes de emails
function listar_mensajes($MensajeConfig){
    $list = $MensajeConfig->GetMensaje();
    $nombre = 'Nombre_del_cliente';
    $numpedido = '123456';
    $list_msj_config = array();

    foreach ($list as $msj) {
        $status = $msj['tipo_mensaje'];
        //Reemplazando variables-cadenas html
        $msj['mensaje'] = str_replace("[[NombreU]]", "<b>" . $nombre . "</b>", $msj['mensaje']);
        $msj['mensaje'] = str_replace("[[NumPedido]]", "<b>" . $numpedido . "</b>", $msj['mensaje']);
        $msj['mensaje'] = str_replace("[[EstadoPedido]]", "<b>" . $status . "</b>", $msj['mensaje']);
        //Creando nuevo array con lista de emails
        $list_msj_config[] = array('id' => $msj['id'], 'mensaje' => $msj['mensaje'], 'tipo_mensaje' => $msj['tipo_mensaje']);
    }
    return $list_msj_config;
}
?>