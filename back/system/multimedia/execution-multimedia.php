<?php
session_start();
require_once "../back/config_db_cms.php";
require_once "../back/config/conectar_cms.php";
require_once('system/multimedia/functions-multimedia.php');
$urlact = basename($_SERVER['PHP_SELF']);
$multimedia = new Multimedia("BD_CLIENTE");
$directorio_multimedia='../k-content/';
$directorio_multimedia2='k-content/';

switch ($urlact) {
    case 'multimedia-edit.php':
        //Seleccionando archivo a editar
        if (@$_GET['idfile'] != null)
            $elemento = $multimedia->GetFiles('where m.id='.$_GET['idfile'],'');
        break;
    case 'multimedia.php':
        //Añadir Arhivo
        if (isset($_POST{'add'})) {
                foreach ($_FILES["url"]["error"] as $clave => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        //creando nombre dinamico de archivo
                        $info = pathinfo($_FILES["url"]["name"][$clave]);
                        $nnombre = md5(rand().time()).".".$info['extension'];

                        //Registrando datos de archivo en base de datos
                        $resultaop = $multimedia->InsertFiles($nnombre, $_POST['titulo'], $_POST['leyenda'], $_POST['alt'], $_POST['descripcion'], $_SESSION['usr']{'id'});
                        if($resultaop){
                            //Subiendo archivo al servidor
                            $nombre_tmp = $_FILES["url"]["tmp_name"][$clave];
                            $nombre = basename($nnombre);
                            move_uploaded_file($nombre_tmp, $directorio_multimedia.$nombre);
                        }
                    }
                }
        }
        //Modificando archivo
        if (isset($_POST['modif']))
            $resultaop = $multimedia->EditFile($_POST['id'], $_POST['url'], $_POST['titulo'], $_POST['leyenda'], $_POST['alt'], $_POST['descripcion'], $_SESSION['usr']{'id'});
        else if (isset($_GET['eliminarfile'])) {
            $resultaop = $multimedia->DeleteFile($_GET['eliminarfile']);
            if($resultaop)
                unlink($directorio_multimedia.$_GET['url']);
        }
        else if(isset($_GET['eliminarfile_array'])){
            //Obteniendo archivos multimedia a eliminar
            $list_files = $multimedia->GetFiles("WHERE m.id in(".$_GET['eliminarfile_array'].")",'idarray');
            //Eliminando registros de la base de datos
            $resultaop = $multimedia->DeleteFile($_GET['eliminarfile_array']);

            if($resultaop) {
                foreach ($list_files AS $id_elim) {
                    //Eliminando archivos del directorio multimedia
                    unlink($directorio_multimedia.$id_elim['url']);
                }
            }

        }
        //Obteniendo archivos multimedia
        $list_files = $multimedia->GetFiles('','');
        break;
}

//validando tipo de archivo
function obtenerExtensionFichero($str)
{
    return end(explode(".", $str));
}
?>