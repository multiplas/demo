<?php
$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹",",",".",":",";");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","","","","");

function AddCurri($nombre, $nombreFichero) //Si url es 0 se entiende que es un fichero
{
    global $dbi;
    
    $sql = "INSERT INTO bd_curriculums VALUES (null, '$nombre', '$nombreFichero')";
    
    $query = mysqli_query($dbi, $sql);
    
    if (!$query) {
        die('No se ha podido agregar el curriculum, intentelo de nuevo más tarde: ' . mysql_error());
    }
    else{
        echo 'Curriculum subido con éxito.';
    }   
}

function CreateTableCurri(){        
    global $dbi;
    
    $sql = "CREATE TABLE IF NOT EXISTS `bd_curriculums` (
        `id` int NOT NULL AUTO_INCREMENT ,
        `nombre` TEXT,
        `nombreFichero` TEXT,
        UNIQUE KEY `id` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

    $query = mysqli_query($dbi, $sql);
}

CreateTableCurri();

if(isset($_POST['insert_fichero'])){
    if(isset($_FILES['fichero_usuario']['name']) && !empty($_FILES['fichero_usuario']['name'])){
        $dir_subida = $_SERVER['DOCUMENT_ROOT'] . '/ficheros/';
        $fecha_subida = date("Y-m-d-H-i-s");
        $fecha_format = str_replace('-','',$fecha_subida);
        $nombre_fichero = 'curriculum_'.$fecha_format.'_'.$_FILES['fichero_usuario']['name'];
        // $fichero_subido = $dir_subida . basename($nombre_fichero);
        
        if (is_dir($dir_subida) && is_writable($dir_subida)) {
            // do upload logic here
            if(move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], "$dir_subida/$nombre_fichero")){
                AddCurri($_POST['nombre'], $nombre_fichero);
                echo "Curriculum entregado. Nuestro equipo le contactará en el menor tiempo posible. Muchas gracias.";
            }
            else 
                echo "Error. No se ha podido entregar el curriculum. Por favor, póngase en contacto con nuestro equipo técnico.";
        } else {
            echo 'Upload directory is not writable, or does not exist.';
        }
    }        
}


?>
<div id="contenido" class="curriculum-contenido">
    <div class="container">
        <form enctype="multipart/form-data" id="addCurriculum" class="form-horizontal signup"  action="" method="POST">          
            <div class="header">
                
                <h3>Entrega de Currículum</h3>
                
                <p>Entrega tu currículum a través de este formulario.</p>
                
            </div>
            <div class="sep"></div>
            <div class="inputs">
        
                <label class="" for="nombre">Nombre y Apellidos: </label> <input type="text" name="nombre" id="nombre" autofocus required>
            
                <label class="" for="fichero_usuario">Añadir Fichero</label>
                <input class="input-file uniform_on" id="fichero_usuario" name="fichero_usuario" type="file" />
                
                <div class="checkboxy">
                    <input name="cecky" id="checky" value="1" type="checkbox" required/><label class="terms">He leído y acepto la política de <a href="/protecciondedatos">protección de datos</a></label>
                </div>
                
                <input type="hidden" class="span6" name="insert_fichero" value="1">
                <input type="submit" class="btn btn-primary add-file" title="Añadir Curriculum" value="Entregar Curriculum">
            
            </div>            
    </form>
    </div>
</div>
<script type="text/javascript">
(function($) {
    $("a.groupgalery").fancybox();
 })(jQuery);   
</script>