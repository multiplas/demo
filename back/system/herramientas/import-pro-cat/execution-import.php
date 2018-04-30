<?php
session_start();
require_once "../back/config_db_cms.php";
require_once "../back/config/conectar_cms.php";
require_once('system/functions.module');
require_once('system/herramientas/import-pro-cat/functions-import.php');

$import_csv = new ImportCsv("BD_CLIENTE");

//Importando registros de productos y categorias
if (isset($_POST['import'])) {
    $insert_p_total = 0;
    $insert_p = 0;
    if (!empty($_FILES["import_file"]["name"])) {
        $output = '';
        $allowed_ext = array("csv");
        $extension = end(explode(".", $_FILES["import_file"]["name"]));
        if (in_array($extension, $allowed_ext)) {
            $file_data = fopen($_FILES["import_file"]["tmp_name"], 'r');
            $c1 = $_POST["nombre"];
            $c2 = $_POST["descripcion"];
            $c4 = $_POST["precio"];
            $c5 = $_POST["referencia"];
            $c3 = $_POST["imagen"];
            $c6 = $_POST["categoria"];
            $subir_cat = $_POST["subir_cat"];
            $subir_img = $_POST["subir_img"];
            $subir_marca = $_POST["subir_marca"];
            $c7 = $_POST["impuesto"];
            $c8 = $_POST["pvp_impuesto"];
            $c9 = $_POST["ptransporte"];
            $c10 = $_POST["marca"];
            $c11 = $_POST["stock"];
            if ($_POST["delimitador"]=='')
                $delimitador = '';
            else
                $delimitador = $_POST["delimitador"];

            fgetcsv($file_data);

            //Cantidad de productos a importar
            $archivo_csv=fgetcsv($file_data);
            $countcsv = count($archivo_csv)-3;
            $long_progress=100/$countcsv;
            $count_interno=0;

            while ($row = fgetcsv($file_data, null, $delimitador)) {
echo "<script>
$('#progreso_barra_load').show();
</script>";
                //Campos del archivo .csv
                $nombre = $row[$c1];
                $descripcion = $row[$c2];
                $precio = $row[$c4];
                $referencia = $row[$c5];
                $impuesto = $_POST[$c7];
                $pvp_impuesto = $_POST[$c8];
                $ptransporte = $row[$c9];
                $stock= $row[$c11];

                    //validando si se desea o no subir marca
                    if (isset($_POST["marca"]))
                        $marca = $row[$c10];
                    else
                        $marca = '';

                    //validando si se desea o no subir imagen
                    if (isset($_POST["imagen"]))
                        $imagen = $row[$c3];
                    else
                        $imagen = 'no-img-pro.png';

                    //validando si se desea o no subir categoría
                    if (isset($_POST["imagen"]))
                        $categoria = $row[$c6];
                    else
                        $categoria = '';

                //Si se desea registrar marcas
                if($subir_marca == 'on') {
                    //comprobado si la marca existe
                    $buscar_marca = $import_csv->BuscarMarca($marca);

                    //si no existe la marca la crea
                    if ($buscar_marca == false) {
                        $import_marca = $import_csv->InsertMarca($marca);
                        $buscar_marca = $import_csv->BuscarMarca($marca);
                    }

                    //obteniendo id de marca
                    $marca = $buscar_marca['id'];
                }

                //Si se desea registrar categorías
                if($subir_cat == 'on') {
                    //comprobado si la categoría existe
                    $buscar_cat = $import_csv->BuscarCat($categoria);

                        //si no existe la categoria la crea
                        if ($buscar_cat == false) {
                            $import_cat = $import_csv->InsertCat($categoria);
                            $buscar_cat = $import_csv->BuscarCat($categoria);
                        }

                    //obteniendo id de categoría
                    $categoria = $buscar_cat['id'];
                }
                if($subir_img == 'on') {
                    //Directorio local de imagenes en el CMS
                    $dir = "../imagenesproductos/";
                    //subiendo imagen al directorio local del CMS

                    $imagen = upload_img($imagen, $dir);
                }

                //comprobado si el producto existe
                $buscar_producto = $import_csv->UpdateProducto($nombre, $descripcion, $imagen, $precio, $referencia, $categoria, $stock, $marca, $ptransporte, $impuesto, $pvp_impuesto);

                //si no existe el producto lo crea
                if ($buscar_producto == 0) {
                    $insert_p_total++;
                    $import_producto = $import_csv->InsertProducto($nombre, $descripcion, $imagen, $precio, $referencia, $categoria, $stock, $marca, $ptransporte, $impuesto, $pvp_impuesto);
                    if($import_producto){
                        $insert_p++;
                    }
                }

                if($buscar_producto)
                {
                    $count_interno= $count_interno+$long_progress;
                    echo "<script>
                $('#progress_bar').val($count_interno);
               
                </script>";
                    $buscar_producto=false;
                }
            }
            if ( $insert_p_total ==  $insert_p){
                $resultaop = 'Data importada correctamente';
                $resultaop_tipo = 'success';
                $resultaop_title = 'Correcto';
            }
            else{
                $resultaop = 'Error al importar algunos productos';
                $resultaop_tipo = 'warning';
                $resultaop_title = 'Aviso';
            }
            $_FILES["import_file"]=false;
        } else {
            $error = 'Archivo Inválido!';
        }
    } else {
        $error='Debe seleccionar un archivo .csv';
    }
}


function upload_img($url, $dir){
    //creando nombre unico para imagen
    $img_name = basename($url) . uniqid();
    $archivoFinal = fopen($dir . $img_name, "w");

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
    curl_setopt($ch, CURLOPT_FILE, $archivoFinal);

    fclose($archivoFinal);
    curl_close($ch);
    return $img_name;
}
?>