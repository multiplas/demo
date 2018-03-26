<?php
session_start();
require_once "../back/config_db_cms.php";
require_once "../back/config/conectar_cms.php";
require_once('system/estadisticas/functions-estadisticas.php');
$date_format="DATE_FORMAT(create_at, '%d-%m-%Y')";
//Llamado de la clase estadistica
$estadistica = new Estadistica("BD_CLIENTE");
//Obteniendo tipo de consulta
if (isset($_GET['tipo_consulta']))
    $tipo_consulta = $_GET['tipo_consulta'];
else
    $tipo_consulta = '';

//Búsqueda por fecha
if ((isset($_GET['desde']) && isset($_GET['hasta'])) && ($_GET['desde']!='' && $_GET['hasta']!='')) {
    $desde = $_GET['desde'];
    $hasta = $_GET['hasta'];
    $filtro_fecha = "$date_format BETWEEN '" . $_GET['desde'] . "' AND '" . $_GET['hasta'] . "'";
}
else if (isset($_GET['desde'])) {
    $desde = $_GET['desde'];
    $hasta = $_GET['hasta'];
    $filtro_fecha = "$date_format >= '" . $_GET['desde'] . "'";
}
else if (isset($_GET['hasta'])) {
    $desde = '';
    $hasta = $_GET['hasta'];
    $filtro_fecha = "$date_format <= '" . $_GET['hasta'] . "'";
}
else {
    $desde = '';
    $hasta = '';
    $filtro_fecha = "";
}

//Obteniendo estadisticas
if ($tipo_consulta=='') {
    //listado de visitas
    if ($filtro_fecha!='')
        $filtro_fecha = 'WHERE '.$filtro_fecha;
    $visitas = $estadistica->GetEstadisticas($filtro_fecha);
    //Cantidad de visitas del dia actual
    $vistas_today = $estadistica->GetEstadisticas_count(' WHERE ', '', '', '', 3, " DATE(create_at) = DATE(NOW())");
    //Cantidad de visitas diarias
    $vistas_days = $estadistica->GetEstadisticas_count('WHERE MONTH(create_at) = MONTH(NOW())', 'GROUP BY campo ', '', '', 3, '');
    $cv_days=count($vistas_days);
}
else if ($tipo_consulta=='visitas por pais') {
    //Obteniendo cantidad de visitas en la página
    if ($filtro_fecha!='')
        $filtro_fecha = 'WHERE '.$filtro_fecha;
    $n_visitas = $estadistica->GetEstadisticas_count('', 'country', 'ORDER BY total ASC', '', 1, $filtro_fecha);
    $cv=count($n_visitas);
}
else if ($tipo_consulta=='visitas por links'){
    $where='';
    //Obteniendo cantidad de visitas en la página
    $not_in = array();
    if ($filtro_fecha!='') {
        $filtro_fecha = ' ' . $filtro_fecha;
        $where=' WHERE ';
    }
    //Obteniendo top 10 de links mas visitados
    $n_visitas = $estadistica->GetEstadisticas_count($where,'pagina_visitada', '', 'LIMIT 10', 1, $filtro_fecha);
    $cv=count($n_visitas);
    foreach ($n_visitas as $nv) {
        //Creando array para excluir los elementos del top 10
        array_push($not_in, "'" . $nv['pagina_visitada'] . "'");
    }

    $separado_por_comas = implode(",", $not_in);
    $where2=' where pagina_visitada not in('.$separado_por_comas.')';

    if ($filtro_fecha!='') {
        $filtro_fecha = 'AND ' . $filtro_fecha;
    }
    if($cv == 10) {
        //Creando array de "Otros" (demás dominios que no entran en el top 10)
        $n_visitas_otros = $estadistica->GetEstadisticas_count($where2, '', '', '', 2, $filtro_fecha);
        $text_otros=array('pagina_visitada'=>'Otras');
        $n_visitas_otros=$n_visitas_otros+$text_otros;

        if (count($n_visitas_otros) > 0) {
            //Uniendo array de visitas top 10 con array de "otros"
            array_push($n_visitas, $n_visitas_otros);
        }
    }
    $cv=count($n_visitas);
}
else if ($tipo_consulta=='visitas por origen'){
    //Obteniendo cantidad de visitas en la página
    $not_in = array();
    $filtro_fecha1 = $filtro_fecha;

    if ($filtro_fecha1=='')
        $filtro_fecha0='DATE(create_at) = DATE(NOW())) AND';
    else
        $filtro_fecha0='';
    $where1="WHERE ip in(SELECT DISTINCT ip FROM bd_visitors WHERE ".$filtro_fecha0." domain NOT LIKE 'http://demo.tiendavirtualprofesional.com%'";
    if ($filtro_fecha1!='')
        $filtro_fecha1 = ' AND ' . $filtro_fecha1;
    //Obteniendo top 10 de orígenes de visitas
    $n_visitas = $estadistica->GetEstadisticas_count($where1,'domain', 'ORDER BY total DESC', 'LIMIT 10',1, $filtro_fecha1);
    $cv=count($n_visitas);
    foreach ($n_visitas as $nv) {
        //Creando array para excluir los elementos del top 10
        array_push($not_in, "'" . $nv['domain'] . "'");
    }

    $separado_por_comas = implode(",", $not_in);
    $where2=$where1.'AND domain not in('.$separado_por_comas.')';

    if ($filtro_fecha!='') {
        $filtro_fecha = 'AND ' . $filtro_fecha;
    }
    if($cv == 10) {
        //Creando array de "Otros" (demás dominios que no entran en el top 10)
        $n_visitas_otros = $estadistica->GetEstadisticas_count($where2, '', '', '', 2, $filtro_fecha);
        $text_otros=array('domain'=>'Otros');
        $n_visitas_otros=$n_visitas_otros+$text_otros;

        if (count($n_visitas_otros) > 0) {
            //Uniendo array de visitas top 10 con array de "otros"
            array_push($n_visitas, $n_visitas_otros);
        }
    }
    $cv=count($n_visitas);
}

?>