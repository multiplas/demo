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
}
else if ($tipo_consulta=='visitas por pais') {
    //Obteniendo cantidad de visitas en la página
    if ($filtro_fecha!='')
        $filtro_fecha = 'WHERE '.$filtro_fecha;
    $n_visitas = $estadistica->GetEstadisticas_count('', 'country', '', '', 1, $filtro_fecha);
    $cv=count($n_visitas);
}
else if ($tipo_consulta=='visitas por links'){
    //Obteniendo cantidad de visitas en la página
    if ($filtro_fecha!='')
        $filtro_fecha = 'WHERE '.$filtro_fecha;
    $n_visitas = $estadistica->GetEstadisticas_count('','pagina_visitada', '', '', 1, $filtro_fecha);
    $cv=count($n_visitas);
}
else if ($tipo_consulta=='visitas por origen'){
    //Obteniendo cantidad de visitas en la página
    $not_in = array();

    $filtro_fecha1 = $filtro_fecha;

    if ($filtro_fecha1!='')
        $filtro_fecha1 = 'WHERE '.$filtro_fecha1;

    $n_visitas = $estadistica->GetEstadisticas_count('','domain', 'ORDER BY total DESC', 'LIMIT 5',1, $filtro_fecha1);
    foreach ($n_visitas as $nv)
        array_push($not_in,"'".$nv['domain']."'");

    $separado_por_comas = implode(",", $not_in);

    if ($filtro_fecha!='')
        $filtro_fecha = 'AND '.$filtro_fecha;

    $n_visitas_otros = $estadistica->GetEstadisticas_count('where domain not in('.$separado_por_comas.')','', '', '',2, $filtro_fecha);
    array_push($n_visitas, $n_visitas_otros);

    $cv=count($n_visitas);
}

?>