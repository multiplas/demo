<?php
//comprobar estructura de una tabla de la BD del CMS Base
class ImportCsv extends Conexion{
    //conexi�n a base de datos del CMS Base

    public function __construct($cnst_dbn){
        parent::__construct($cnst_dbn);
    }

    function BuscarCat($categoria){
        $categoria = mysqli_real_escape_string($this->conexion, htmlspecialchars($categoria));

        $resultados = array();
        $sql="SELECT id
        FROM bd_categorias WHERE categoria = '$categoria' LIMIT 1";
        $query = mysqli_query($this->conexion, $sql);

            if (mysqli_num_rows($query) > 0){
                while ($assoc = mysqli_fetch_assoc($query)) {
                    $resultados = $assoc;
                }
                return $resultados;
            }
            else{
                return false;
            }

    }

    function InsertCat($categoria){
        $categoria = mysqli_real_escape_string($this->conexion, htmlspecialchars($categoria));

        $sql="INSERT INTO bd_categorias(categoria, idpadre)
VALUES ('$categoria',NULL) ";
        $query = mysqli_query($this->conexion, $sql);

        return $query;
    }

    function UpdateProducto($nombre, $descripcion, $imagen, $precio, $referencia, $categorias){
        $nombre = mysqli_real_escape_string($this->conexion, htmlspecialchars($nombre));
        $descripcion = mysqli_real_escape_string($this->conexion, htmlspecialchars($descripcion));
        $imagen = mysqli_real_escape_string($this->conexion, htmlspecialchars($imagen));
        $precio = mysqli_real_escape_string($this->conexion, htmlspecialchars($precio));
        $referencia = mysqli_real_escape_string($this->conexion, htmlspecialchars($referencia));
        $categorias = mysqli_real_escape_string($this->conexion, htmlspecialchars($categorias));

        $sql="UPDATE bd_productos
         SET nombre = '$nombre', descripcion = '$descripcion', imagenprincipal = '$imagen', precio = $precio, idcat = '$categorias', update_at = NOW()
         WHERE referencia = '$referencia' LIMIT 1";
        $query = mysqli_query($this->conexion, $sql);

        return mysqli_affected_rows($this->conexion);
    }

    function InsertProducto($nombre, $descripcion, $imagen, $precio, $referencia, $categorias){
        $nombre = mysqli_real_escape_string($this->conexion, htmlspecialchars($nombre));
        $descripcion = mysqli_real_escape_string($this->conexion, htmlspecialchars($descripcion));
        $imagen = mysqli_real_escape_string($this->conexion, htmlspecialchars($imagen));
        $precio = mysqli_real_escape_string($this->conexion, htmlspecialchars($precio));
        $referencia = mysqli_real_escape_string($this->conexion, htmlspecialchars($referencia));
        $categorias = mysqli_real_escape_string($this->conexion, htmlspecialchars($categorias));

        $sql = "INSERT INTO bd_productos (nombre, descripcion, imagenprincipal, precio, referencia, idcat)
					VALUES ('$nombre', '$descripcion', '$imagen', $precio, '$referencia', $categorias)";

        $query = mysqli_query($this->conexion, $sql);
        return $query;
    }
}
?>