
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
    //include_once('breadcrumb.php'); //No necesario en onepageCheckout
    ?>
    
    <?php
    if ($_SESSION['usr'] != null)
    {            
        include_once('datos_personales.php');
    }
    else if ($_SESSION['cestases'] != null)
    {
        ?>
                        
        <?php
        include_once('start_session_form.php');
    }
}
else
    echo '<script>window.location="/error404";</script>';
    ?>
    </div>
</div>