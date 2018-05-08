<?php
session_start();
require_once "../back/config_db_cms.php";
require_once "../back/config/conectar_cms.php";
require_once('system/functions.module');
require_once('system/herramientas/import-pro-cat/functions-import.php');
// si el usuario cierra el navegador, el script sigue ejecutándose
//ignore_user_abort(true);
// cancela el límite de tiempo de ejecución de php
set_time_limit(0);

$import_csv = new ImportCsv("BD_CLIENTE");

//inicializando variables de checkbox
$subir_cat='on';
$subir_img='on';
$subir_marca='on';
$subir_proveedor='on';
$visible='on';

//Importando registros de productos y categorias
if (isset($_POST['import'])) {
    $insert_p_total = 0;
    $insert_p = 0;

//trayendo campos del formulario
    $c1 = $_POST["nombre"];
    $c2 = $_POST["descripcion"];
    $c3 = $_POST["imagen"];
    $c4 = $_POST["precio"];
    $c5 = $_POST["referencia"];
    $c6 = $_POST["categoria"];
    $c7 = $_POST["impuesto"];
    $c8 = $_POST["pvp_impuesto"];
    $c9 = $_POST["ptransporte"];
    $c10 = $_POST["marca"];
    $c11 = $_POST["stock"];
    $c12 = $_POST["proveedor"];
    //checkboxs
    $subir_cat = $_POST["subir_cat"];
    $subir_img = $_POST["subir_img"];
    $subir_marca = $_POST["subir_marca"];
    $subir_proveedor = $_POST["subir_proveedor"];
    $visible = $_POST["visible"];
    $error_ejec = false;

    //validando campos dependientes
    if (($subir_cat == 'on' && $c6 == '') || ($subir_img == 'on' && $c3 == '') || ($subir_marca == 'on' && $c10 == '') || ($subir_proveedor == 'on' && $c12 == ''))
        $error_ejec = true;

    if (!$error_ejec){
        if (!empty($_FILES["import_file"]["name"])) {
            $output = '';
            $allowed_ext = array("csv");
            $extension = end(explode(".", $_FILES["import_file"]["name"]));
            if (in_array($extension, $allowed_ext)) {
                $file_data = fopen($_FILES["import_file"]["tmp_name"], 'r');

                $array_log_new = array();
                $array_log_update = array();

                if ($_POST["delimitador"] == '')
                    $delimitador = '';
                else
                    $delimitador = $_POST["delimitador"];

                fgetcsv($file_data);

                if ($_POST["limite"] == '') {//Si no hay limite de filas a importar
                    $limite = 99999999999999999;
                    //Cantidad de productos a importar
                    $archivo_csv = fgetcsv($file_data);
                    $countcsv = count($archivo_csv) - 3;
                } else {//Si hay limite de filas a importar
                    $limite = $_POST["limite"];
                    //indicar Cantidad de productos a importar
                    $countcsv = $limite;
                }

                //estableciendo valores para barra de progreso
                $long_progress = 100 / $countcsv;
                //contador para barra de progreso
                $count_interno = 0;
                //contador de filas
                $cantidad_filas = -1;
                //Reorriendo filas
                while ($row = fgetcsv($file_data, null, $delimitador)) {
                    //incrementando contador de filas
                    $cantidad_filas++;
                    //romper cico si hay un limite de filas establecido
                    if ($cantidad_filas >= $limite)
                        break;
                    //estableciendo un limite para evitar llegar al tiempo maximo de ejecucion
                    set_time_limit(1000);
                    //si es la primera vuelta del ciclo, mostrar la barra de progreso
                    if ($insert_p_total == 0) {
                        echo "<script>$('#progreso_barra_load').show();</script>";
                    }
                    //Incrementando contador para barra de progreso
                    if ($count_interno + 5 < 100)
                        $count_interno = $count_interno + $long_progress;

                    //Campos del archivo .csv
                    $nombre = $row[$c1];
                    $descripcion = $row[$c2];
                    $precio = $row[$c4];
                    $referencia = $row[$c5];
                    $impuesto = $_POST[$c7];
                    $pvp_impuesto = $_POST[$c8];
                    $ptransporte = $row[$c9];
                    $stock = $row[$c11];

                    //Si se desea colocar el producto visible en la tienda
                    if ($visible == 'on') {
                        $p_visible = 1;
                    } else {
                        $p_visible = 0;
                    }

                    //Si se desea registrar proveedores
                    if ($subir_proveedor == 'on') {
                        $proveedor = $row[$c12];
                        //comprobado si el proveedor existe
                        $buscar_proveedor = $import_csv->BuscarProveedor($proveedor);

                        //si no existe el proveedor lo crea
                        if ($buscar_proveedor == false) {
                            $import_proveedor = $import_csv->InsertProveedor($proveedor);
                            $buscar_proveedor = $import_csv->BuscarProveedor($proveedor);
                        }

                        //obteniendo id del proveedor
                        $proveedor = $buscar_proveedor['id'];
                    } else
                        $proveedor = '';

                    //Si se desea registrar marcas
                    if ($subir_marca == 'on') {
                        $marca = $row[$c10];
                        //comprobado si la marca existe
                        $buscar_marca = $import_csv->BuscarMarca($marca);

                        //si no existe la marca la crea
                        if ($buscar_marca == false) {
                            $import_marca = $import_csv->InsertMarca($marca);
                            $buscar_marca = $import_csv->BuscarMarca($marca);
                        }

                        //obteniendo id de marca
                        $marca = $buscar_marca['id'];
                    } else
                        $marca = '';

                    //Si se desea registrar categorías
                    if ($subir_cat == 'on') {
                        $categoria = $row[$c6];
                        //comprobado si la categoría existe
                        $buscar_cat = $import_csv->BuscarCat($categoria);

                        //si no existe la categoria la crea
                        if ($buscar_cat == false) {
                            $import_cat = $import_csv->InsertCat($categoria);
                            $buscar_cat = $import_csv->BuscarCat($categoria);
                        }

                        //obteniendo id de categoría
                        $categoria = $buscar_cat['id'];
                    } else
                        $categoria = '';

                    //Si se desea subir imagenes
                    if ($subir_img == 'on') {
                        $imagen = $row[$c3];
                        if ($imagen == '') {
                            $imagen = 'no-img-pro.png';
                            echo "<script>$('#progress_bar').val($count_interno);</script>";
                        } else {
                            //Directorio local de imagenes en el CMS
                            $dir = "../imagenesproductos/";
                            //subiendo imagen al directorio local del CMS
                            $imagen = upload_img($imagen, $count_interno, $long_progress);
                        }
                    } else {
                        $imagen = 'no-img-pro.png';
                        echo "<script>$('#progress_bar').val($count_interno);</script>";
                    }

                    //comprobado si el producto existe
                    $buscar_producto = $import_csv->UpdateProducto($nombre, $descripcion, $imagen, $precio, $referencia, $categoria, $stock, $marca, $ptransporte, $impuesto, $pvp_impuesto, $proveedor, $p_visible);

                    //si no existe el producto lo crea
                    if ($buscar_producto == 0) {
                        $insert_p_total++;
                        $import_producto = $import_csv->InsertProducto($nombre, $descripcion, $imagen, $precio, $referencia, $categoria, $stock, $marca, $ptransporte, $impuesto, $pvp_impuesto, $proveedor, $p_visible);
                        if ($import_producto) {
                            $insert_p++;
                            //Log de productos nuevos
                            array_push($array_log_new, array('nombre' => $nombre, 'descripcion' => $descripcion, 'imagen' => $imagen, 'precio' => $precio, 'referencia' => $referencia, 'categoria' => $categoria, 'stock' => $stock, 'marca' => $marca, 'ptransporte' => $ptransporte, 'impuesto' => $impuesto, 'pvp_impuesto' => $pvp_impuesto, 'proveedor' => $proveedor, 'p_visible' => $p_visible));
                        }
                    } else {
                        //Log de productos nuevos
                        array_push($array_log_update, array('nombre' => $nombre, 'descripcion' => $descripcion, 'imagen' => $imagen, 'precio' => $precio, 'referencia' => $referencia, 'categoria' => $categoria, 'stock' => $stock, 'marca' => $marca, 'ptransporte' => $ptransporte, 'impuesto' => $impuesto, 'pvp_impuesto' => $pvp_impuesto, 'proveedor' => $proveedor, 'p_visible' => $p_visible));
                    }
                }
                if ($insert_p_total == $insert_p) {
                    $resultaop = 'Data importada correctamente';
                    $resultaop_tipo = 'success';
                    $resultaop_title = 'Correcto';
                } else {
                    $resultaop = 'Error al importar algunos productos';
                    $resultaop_tipo = 'warning';
                    $resultaop_title = 'Aviso';
                }
                $_FILES["import_file"] = false;
            } else {
                $error = 'Archivo Inválido!';
            }
        } else {
            $error = 'Debe seleccionar un archivo .csv';
        }
    }else
        $error = 'Al marcar un campo checkbox debe indicar el valor de su columna correspondiente';
}

function upload_img($url, $count_interno, $long_progress){
    date_default_timezone_set('UTC');
    $fechaActual = date("d-m-Y");
    $extension_img = end(explode(".", basename($url)));
    //creando nombre unico para imagen
    $img_name = $fechaActual .'-'. uniqid() .'.'. $extension_img;

    //para consultar solo http
    $url = str_replace('https://','http://',$url);
    //Upload de imagen
    //Si se carga la imagen, incrementar la barra de progreso
    if(copy($url, '../imagenesproductos/'.$img_name))
    {
        echo "<script>$('#progress_bar').val($count_interno);</script>";
    }
    return $img_name;
}
?>