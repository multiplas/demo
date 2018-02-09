<?php
//Clase para el Log de estado de los pedidos
class DatosLog extends Conexion{

    public function __construct($cnst_dbn){
        parent::__construct($cnst_dbn);
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
                $resultados = $assoc;
        return $resultados;
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

    function InsertLogStatus($id_usuario, $id_pedido, $id_pedido_concat, $tado_antes, $estado_actual){

        $sql="INSERT INTO bd_log_status_pedidos 
          (id_usuario, fecha, hora, id_pedido, id_pedido_original, estado_actual, estado_previo, update_at, create_at) 
          VALUES ($id_usuario, NOW(), NOW(), $id_pedido_concat, $id_pedido, $estado_actual, $tado_antes, '0000-00-00 00:00:00', CURRENT_TIMESTAMP);";
        $query = mysqli_query($this->conexion, $sql);
        return $query;
    }
}
?>