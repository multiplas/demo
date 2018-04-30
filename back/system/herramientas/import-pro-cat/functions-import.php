<?php
//comprobar estructura de una tabla de la BD del CMS Base
class ImportCsv extends Conexion{
    //conexi�n a base de datos del CMS Base

    public function __construct($cnst_dbn){
        parent::__construct($cnst_dbn);
    }

    function BuscarMarca($marca){
        $marca = mysqli_real_escape_string($this->conexion, htmlspecialchars($marca));

        $resultados = array();
        $sql="SELECT id
        FROM bd_marcas WHERE marca = '$marca' LIMIT 1";
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

    function InsertMarca($marca){
        $marca = mysqli_real_escape_string($this->conexion, htmlspecialchars($marca));

        $sql="INSERT INTO bd_marcas(marca, visible)
VALUES ('$marca',1) ";
        $query = mysqli_query($this->conexion, $sql);

        return $query;
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

    function UpdateProducto($nombre, $descripcion, $imagen, $precio, $referencia, $categorias, $stock, $marca, $ptransporte, $impuesto, $pvp_impuesto){
        $nombre = mysqli_real_escape_string($this->conexion, htmlspecialchars($nombre));
        $descripcion = mysqli_real_escape_string($this->conexion, htmlspecialchars($descripcion));
        $imagen = mysqli_real_escape_string($this->conexion, htmlspecialchars($imagen));
        $precio = mysqli_real_escape_string($this->conexion, htmlspecialchars($precio));
        $referencia = mysqli_real_escape_string($this->conexion, htmlspecialchars($referencia));
        $categorias = mysqli_real_escape_string($this->conexion, htmlspecialchars($categorias));
        $stock = mysqli_real_escape_string($this->conexion, htmlspecialchars($stock));
        $marca = mysqli_real_escape_string($this->conexion, htmlspecialchars($marca));
        $ptransporte = mysqli_real_escape_string($this->conexion, htmlspecialchars($ptransporte));
        $impuesto = mysqli_real_escape_string($this->conexion, htmlspecialchars($impuesto));
        $pvp_impuesto = mysqli_real_escape_string($this->conexion, htmlspecialchars($pvp_impuesto));

        $sql="UPDATE bd_productos
         SET nombre = '$nombre', descripcion = '$descripcion', imagenprincipal = '$imagen', precio = $precio, idcat = '$categorias', unidades = '$stock', idmarca = '$marca', precio_transporte_ind ='$ptransporte', iva = '$impuesto', update_at = NOW()
         WHERE referencia = '$referencia' LIMIT 1";
        $query = mysqli_query($this->conexion, $sql);

        return mysqli_affected_rows($this->conexion);
    }

    function InsertProducto($nombre, $descripcion, $imagen, $precio, $referencia, $categorias, $stock, $marca, $ptransporte, $impuesto, $pvp_impuesto){
        $nombre = mysqli_real_escape_string($this->conexion, htmlspecialchars($nombre));
        $descripcion = mysqli_real_escape_string($this->conexion, htmlspecialchars($descripcion));
        $imagen = mysqli_real_escape_string($this->conexion, htmlspecialchars($imagen));
        $precio = mysqli_real_escape_string($this->conexion, htmlspecialchars($precio));
        $referencia = mysqli_real_escape_string($this->conexion, htmlspecialchars($referencia));
        $categorias = mysqli_real_escape_string($this->conexion, htmlspecialchars($categorias));
        $stock = mysqli_real_escape_string($this->conexion, htmlspecialchars($stock));
        $marca = mysqli_real_escape_string($this->conexion, htmlspecialchars($marca));
        $ptransporte = mysqli_real_escape_string($this->conexion, htmlspecialchars($ptransporte));
        $impuesto = mysqli_real_escape_string($this->conexion, htmlspecialchars($impuesto));
        $pvp_impuesto = mysqli_real_escape_string($this->conexion, htmlspecialchars($pvp_impuesto));

        $sql = "INSERT INTO bd_productos (nombre, descripcion, imagenprincipal, precio, referencia, idcat, unidades, idmarca, precio_transporte_ind, iva)
					VALUES ('$nombre', '$descripcion', '$imagen', $precio, '$referencia', '$categorias', '$stock', '$marca', '$ptransporte', '$impuesto')";

        $query = mysqli_query($this->conexion, $sql);
        return $query;
    }
}
?>