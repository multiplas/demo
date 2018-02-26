<?php
//Clase para archivos multimedia
class Multimedia extends Conexion{

    public function __construct($cnst_dbn){
        parent::__construct($cnst_dbn);
    }

    //Obteniendo archivos multimedia
    function GetFiles($where,$tipo_sql)
    {
        $resultados = array();
        $where = mysqli_real_escape_string($this->conexion, htmlspecialchars($where));
        $sql = "SELECT m.id AS id, m.url, m.leyenda, m.titulo, m.texto_alternativo, m.descripcion, m.create_by, DATE_FORMAT(m.update_at, '%d-%m-%Y') AS update_at, DATE_FORMAT(m.create_at, '%d-%m-%Y') AS fecha, u.nombre AS nombre, u.id AS uid
				FROM bd_multimedia m
				JOIN bd_users u ON u.id = m.create_by
				$where;";
        $query = mysqli_query($this->conexion, $sql);
        if (mysqli_num_rows($query) > 0)
            while ($assoc = mysqli_fetch_assoc($query)) {
                if($where==''||$tipo_sql=='idarray')
                    $resultados[] = $assoc;
                else
                    $resultados = $assoc;
            }
        return $resultados;
    }

    function InsertFiles($url, $titulo, $leyenda, $alt, $descripcion, $id_usuario){
        $url = mysqli_real_escape_string($this->conexion, htmlspecialchars($url));
        $titulo = mysqli_real_escape_string($this->conexion, htmlspecialchars($titulo));
        $leyenda = mysqli_real_escape_string($this->conexion, htmlspecialchars($leyenda));
        $alt = mysqli_real_escape_string($this->conexion, htmlspecialchars($alt));
        $descripcion = mysqli_real_escape_string($this->conexion, htmlspecialchars($descripcion));
        $id_usuario = mysqli_real_escape_string($this->conexion, htmlspecialchars($id_usuario));

        $sql="INSERT INTO bd_multimedia 
          (url, titulo, leyenda, texto_alternativo, descripcion, create_by, update_by, update_at, create_at) 
          VALUES ('$url', '$titulo', '$leyenda', '$alt', '$descripcion', $id_usuario, $id_usuario,'0000-00-00 00:00:00', CURRENT_TIMESTAMP);";
        $query = mysqli_query($this->conexion, $sql);
        return $query;
    }

    function EditFile($id, $url, $titulo, $leyenda, $alt, $descripcion, $id_usuario){
        $id = mysqli_real_escape_string($this->conexion, htmlspecialchars($id));
        $url = mysqli_real_escape_string($this->conexion, htmlspecialchars($url));
        $titulo = mysqli_real_escape_string($this->conexion, htmlspecialchars($titulo));
        $leyenda = mysqli_real_escape_string($this->conexion, htmlspecialchars($leyenda));
        $alt = mysqli_real_escape_string($this->conexion, htmlspecialchars($alt));
        $descripcion = mysqli_real_escape_string($this->conexion, htmlspecialchars($descripcion));
        $id_usuario = mysqli_real_escape_string($this->conexion, htmlspecialchars($id_usuario));

        $sql="UPDATE bd_multimedia SET 
          url= '$url', titulo = '$titulo', leyenda = '$leyenda', texto_alternativo = '$alt', descripcion = '$descripcion', update_by = '$id_usuario', update_at = NOW() 
          WHERE id=$id";
        $query = mysqli_query($this->conexion, $sql);
        return $query;
    }

    function DeleteFile($id){
        $id = mysqli_real_escape_string($this->conexion, htmlspecialchars($id));

        $sql="DELETE FROM bd_multimedia WHERE id in($id)";
        $query = mysqli_query($this->conexion, $sql);
        return $query;
    }
}
?>