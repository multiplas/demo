<?php

if (isset($_POST['array_log'])) {
    $tipo_log = $_POST['tipo_log'];
    $array_log = $_POST['array_log'];

    //descargar .csv
    function download_log($tipo_log, $array_log)
    {
        $i = 0;
        do {

            $archivo_csv = "logs_import/log_".$tipo_log."_$i.csv";
            $i++;
        } while (file_exists($archivo_csv));

        $csv = fopen($archivo_csv, 'x+');
        fputcsv($csv, array('Nombre', 'Descripcion', 'Imagen', 'Precio', 'Referencia', 'Categoria', 'Stock', 'Marca', 'Precio de Transporte', 'Impursto', 'PVP c/impuesto', 'Proveedor', 'Visible'));

        if (count($array_log) > 0) {

            foreach ($array_log AS $log) {
                fputcsv($csv, $log);
            }
        }

        fclose($csv);

    }

    //Descargando log
    $log_result = download_log($tipo_log, $array_log);
}

$jsondata = array();
$jsondata['tipo_alert'] = 'success';
$jsondata['message'] = 'Archivo descargado correctamente!.';
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();