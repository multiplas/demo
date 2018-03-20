
<link rel="stylesheet" type="text/css" href="<?=$draizp?>/css/bootstrap.min.css" /> <!-- css to repair problems -->
<div id="contenido" class="purchase-process container-fluid">
	<div id="articulo" class="row">
<?php

if(empty($_SESSION['datos_cesta']))
    echo '<script>
window.location.href = "'.$draizp.'/cesta'.'";
</script>';
if(!isset($paises))
    $paises = Paises();
if (isset($_GET['confirmacion']) && $_SESSION['compra']['paso'] >= 3)
    {
        include_once('confirmacion.php');
    }
else if (isset($_GET['datos_personales']) && $_SESSION['compra']['paso'] >= 1 || isset($_GET['pedido']) && $_SESSION['compra']['paso'] >= 0 || isset($_GET['pago']) && $_SESSION['compra']['paso'] >= 2)
{
    $usuario = UserLoadData($_SESSION['usr']['id']);
   
    //include_once('breadcrumb.php'); //No necesario en onepageCheckout
    if(!isset($_SESSION['compra']['entrega'])){
        $_SESSION['compra']['entrega'] = array(
            'nombre' => $usuario['nombre'],
            'dni' => $usuario['dni'],
            'telefono' => $usuario['telefono'],
            'email' => $usuario['email'],
            'direccion' => $usuario['direccion'],
            'pais' => Pais($usuario['pais']),
            'provincia' => $usuario['provincia'],
            'paisid' => $usuario['pais'],
            'provinciaid' => $usuario['provinciaid'],
            'localidad' => $usuario['poblacion'],
            'cp' => $usuario['cp'],
            'provinciaid' => $usuario['provinciaid'],
            'nombreE' => $usuario['nombreE'],
            'direccionE' => $usuario['direccionEnv'],
            'paisE' => $usuario['paisEnvN'],
            'provinciaE' => $usuario['provinciaEnv'],
            'paisidE' => $usuario['paisEnv'],
            'localidadE' => $usuario['poblacionEnv'],
            'cpE' => $usuario['cpEnv'],
            'provinciaidE' => $usuario['provinciaidEnv']
        );
    }
    if ($_SESSION['usr'] != null)
    {            
        include_once('datos_personales.php');
    }
    else if ($_SESSION['cestases'] != null)//Iniciar sesion
    {
        if($purchase_process_type != 4)
            include_once('start_session_form.php');
    }
}
else
    echo '<script>window.location="/error404";</script>';
    ?>
    </div>
</div>