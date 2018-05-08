<?php
//comprobar estructura de una tabla de la BD del CMS Base
class ImportCsv extends Conexion{
    //conexi�n a base de datos del CMS Base

    public function __construct($cnst_dbn){
        parent::__construct($cnst_dbn);
    }

    function BuscarProveedor($proveedor){
        $proveedor = mysqli_real_escape_string($this->conexion, htmlspecialchars($proveedor));

        $resultados = array();
        $sql="SELECT id
        FROM bd_proveedores WHERE proveedor = '$proveedor' LIMIT 1";
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

    function InsertProveedor($proveedor){
        $proveedor = mysqli_real_escape_string($this->conexion, htmlspecialchars($proveedor));

        $sql="INSERT INTO bd_proveedores(proveedor)
VALUES ('$proveedor') ";
        $query = mysqli_query($this->conexion, $sql);

        return $query;
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

    function UpdateProducto($nombre, $descripcion, $imagen, $precio, $referencia, $categorias, $stock, $marca, $ptransporte, $impuesto, $pvp_impuesto, $proveedor, $visible){
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
        $proveedor = mysqli_real_escape_string($this->conexion, htmlspecialchars($proveedor));
        $visible = mysqli_real_escape_string($this->conexion, htmlspecialchars($visible));

        $select_query='';
        if($nombre != '')
            $select_query .= "nombre = '$nombre'";

        if($descripcion != '') {
            if ($select_query != '')
                $select_query .= ',';

            $select_query .= "descripcion = '$descripcion'";
        }
        if($imagen != '') {
            if ($select_query != '')
                $select_query .= ',';

            $select_query .= "imagenprincipal = '$imagen'";
        }

        if($precio != '') {
            if ($select_query != '')
                $select_query .= ',';

            $select_query .= "precio = '$precio'";
        }

        if($categorias != '') {
            if ($select_query != '')
                $select_query .= ',';

            $select_query .= "idcat = '$categorias'";
        }

        if($stock != '') {
            if ($select_query != '')
                $select_query .= ',';

            $select_query .= "unidades = '$stock'";
        }

        if($marca != '') {
            if ($select_query != '')
                $select_query .= ',';

            $select_query .= "idmarca = '$marca'";
        }

        if($ptransporte != '') {
            if ($select_query != '')
                $select_query .= ',';

            $select_query .= "precio_transporte_ind ='$ptransporte'";
        }

        if($impuesto != '') {
            if ($select_query != '')
                $select_query .= ',';

            $select_query .= "iva = '$impuesto'";
        }

        if($proveedor != '') {
            if ($select_query != '')
                $select_query .= ',';

            $select_query .= "idproveedor = '$proveedor'";
        }

        if($visible != '') {
            if ($select_query != '')
                $select_query .= ',';

            $select_query .= "disponible = '$visible'";
        }

        if($select_query != '')
            $select_query .=',';


        $sql="UPDATE bd_productos
         SET $select_query update_at = NOW()
         WHERE referencia = '$referencia' LIMIT 1";
        $query = mysqli_query($this->conexion, $sql);

        return mysqli_affected_rows($this->conexion);
    }

    function InsertProducto($nombre, $descripcion, $imagen, $precio, $referencia, $categorias, $stock, $marca, $ptransporte, $impuesto, $pvp_impuesto, $proveedor, $visible){
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
        $proveedor = mysqli_real_escape_string($this->conexion, htmlspecialchars($proveedor));
        $visible = mysqli_real_escape_string($this->conexion, htmlspecialchars($visible));

        $sql = "INSERT INTO bd_productos (nombre, descripcion, imagenprincipal, precio, referencia, idcat, unidades, idmarca, precio_transporte_ind, iva, idproveedor, disponible)
					VALUES ('$nombre', '$descripcion', '$imagen', '$precio', '$referencia', '$categorias', '$stock', '$marca', '$ptransporte', '$impuesto', '$proveedor', '$visible')";

        $query = mysqli_query($this->conexion, $sql);
        return $query;
    }
}
?>