<?php

    $documentRoot = preg_replace('/ajax/', '', dirname(__FILE__));
    if (!require_once($documentRoot . 'sistema/i_connectionstrings.php')) {
        echo $documentRoot . 'sistema/i_connectionstrings.php ' . PHP_EOL;
        die("Aqui->" . __LINE__);
        echo '<pre>Sin fichero de conexión a bd.</pre>';
    } else {
        $dev = -1;
        global $dbi;
        @$dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt)
                or die('<p style="background: #F0F0F0; border: solid 1px #E0E0E0; border-radius: 3px; font-size: 2rem; text-align: center; text-shadow: 1px 1px 0px #FFF; max-width: 60%; margin: 100px auto; padding: 1.4rem;">No se ha podido establecer la conexión con la base de datos.<br><br><em>Vuelva a intentarlo pasados unos minutos!</em><br><br><a href="javascript: location.reload();" style="text-decoration: none; color: #09F">Recargar</a></p>');
        mysqli_set_charset($dbi, 'utf8');
        if (!empty($_POST['searchAutoCompleteKeyWord'])) {

            $sqlInicio   = "SELECT Id,nombre FROM bd_productos WHERE nombre LIKE '%" . $_POST['searchAutoCompleteKeyWord'] . "%'";
            $queryInicio = mysqli_query($dbi, $sqlInicio) OR DIE("Sin conexión");
            if (mysqli_num_rows($queryInicio) > 0) {
                while ($valueAutoComplete = mysqli_fetch_assoc($queryInicio)) {
                    echo '<p class="resultAutoComplete" onclick="javascript:window.location.replace(\'/producto/'.$valueAutoComplete['Id'].'/\');">' . $valueAutoComplete['nombre'] . '</p>';
                }
            } else {
                echo '<pre>Sin Resultados</pre>';
            }
        }
    }
    exit();
            