<?php
//Clase de configuración de emails del Back del CMS Base
class ConfigMail extends Conexion{

    public function __construct($cnst_dbn){
        parent::__construct($cnst_dbn);
    }

    function GetMensaje($status=NULL,$id= NULL){
        $resultados = array();
        if (is_null($status) && is_null($id)){
            $sql = "SELECT id,mensaje, tipo_mensaje FROM bd_config_emails WHERE modulo = 'pedidos'";
        }
        else if(is_null($status) && !is_null($id)){
            $id = mysqli_real_escape_string($this->conexion, htmlspecialchars($id));
            $sql = "SELECT id, mensaje, tipo_mensaje FROM bd_config_emails WHERE id =$id AND modulo = 'pedidos' limit 1";
        }
        else {
            $status = mysqli_real_escape_string($this->conexion, htmlspecialchars($status));
            $sql = "SELECT mensaje, tipo_mensaje FROM bd_config_emails WHERE tipo_mensaje ='$status' AND modulo = 'pedidos' limit 1";
        }
        $query = mysqli_query($this->conexion, $sql);
        if (mysqli_num_rows($query) > 0)
            while ($assoc = mysqli_fetch_assoc($query))
                $resultados[] = $assoc;
        return $resultados;
    }

    function UpdateMensaje($id,$mensaje){
        $id = mysqli_real_escape_string($this->conexion, htmlspecialchars($id));
        $mensaje = mysqli_real_escape_string($this->conexion, htmlspecialchars($mensaje));
        $sql = "UPDATE bd_config_emails SET mensaje = '$mensaje' WHERE id=$id AND modulo = 'pedidos'";
        $query = mysqli_query($this->conexion, $sql);
        return $query;
    }

    function GetFactura($id){
        $resultados = array();
        $id = mysqli_real_escape_string($this->conexion, htmlspecialchars($id));
        $sql = "SELECT f.id AS id, CONCAT(f.ano, f.id) AS numero, f.fecha AS fecha, u.nombre AS nombre, u.RazonSocial AS RazonSocial, u.id AS uid, u.dni AS nif, u.telefono AS telefono, u.email, cd.nombre AS nombreF, u.id AS uid, cd.dni AS nifF, cd.direccion AS direccion, cd.provincia AS provincia, cd.localidad AS localidad, cd.cp AS cp,
                    cd.pais AS pais, cde.nombre AS nombreE, cde.direccion AS direccionE, cde.provincia AS provinciaE, cde.localidad AS localidadE, cde.cp AS cpE, cde.pais AS paisE, cde.telefono AS telefonoE, (c.precio + c.portes) AS total, f.sesion AS sesion, f.estado AS estado, f.formapago AS formapago, 
                    p.transportista AS transportista, c.afiliado AS afiliado
					FROM bd_facturas f
					JOIN bd_compra c ON f.sesion = c.secreto
					JOIN bd_compra_direccion cd ON cd.idcompra = c.id
					JOIN bd_compra_direccion_envio cde ON cde.idcompra = c.id
					JOIN bd_users u ON u.id = c.idusuario
					JOIN bd_portes p ON c.transportista = p.id
                    WHERE (cd.idcompra = c.id OR c.id NOT IN (SELECT idcompra FROM bd_compra_direccion))
                    AND (cde.idcompra = c.id OR c.id NOT IN (SELECT idcompra FROM bd_compra_direccion_envio))
                    AND f.id= $id
                    GROUP BY f.id
					ORDER BY f.fecha DESC, f.id DESC
					LIMIT 1;";
        $query = mysqli_query($this->conexion, $sql);
        if (mysqli_num_rows($query) > 0)
            while ($assoc = mysqli_fetch_assoc($query))
                $resultados[] = $assoc;
        return $resultados;
    }

    function GetEmpresa()
    {
        $sql = "SELECT *
					FROM bd_empresa
					WHERE id = 1;";
        $query = mysqli_query($this->conexion, $sql);

        if (mysqli_num_rows($query) == 1)
        {
            while ($assoc = mysqli_fetch_assoc($query))
                $resultados = $assoc;
            return $resultados;
        }
    }

    //Obteniendo log de pedidos
    function GetLogStatus(){
        $resultados = array();
        $sql = "SELECT P.id, U.nombre AS usuario, DATE_FORMAT(P.fecha, \"%d-%m-%Y\") AS fecha, P.hora, P.id_pedido AS pedido, P.estado_actual, P.estado_previo
                FROM bd_log_status_pedidos P
                LEFT JOIN bd_users U ON P.id_usuario = U.id";
        $query = mysqli_query($this->conexion, $sql);
        if (mysqli_num_rows($query) > 0)
            while ($assoc = mysqli_fetch_assoc($query))
                $resultados[] = $assoc;
        return $resultados;
    }
}
?>