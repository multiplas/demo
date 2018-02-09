<?php
//comprobar estructura de una tabla de la BD del CMS Base
class MyTableCMSBase extends Conexion{
		//conexi�n a base de datos del CMS Base

    public function __construct($cnst_dbn){
        parent::__construct($cnst_dbn);
    }

	function ListarTablasCMSBase($max_fechas){
        $resultados = array();
        //$sql="SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA= '".DB_NAME."' AND CREATE_TIME >= '".$max_fechas['create_time']."' AND UPDATE_TIME >= '".$max_fechas['update_time']."' ORDER BY TABLE_NAME ASC";
        $sql="SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA= '".DB_NAME."' ORDER BY TABLE_NAME ASC";
        $query = mysqli_query($this->conexion, $sql);
			if (mysqli_num_rows($query) > 0)
				while ($assoc = mysqli_fetch_assoc($query))
					$resultados[] = $assoc['TABLE_NAME'];
			return $resultados;
    }

	function ComprobarEstructuraTabla($tabla){
        $tabla = mysqli_real_escape_string($this->conexion, htmlspecialchars($tabla));
        $resultados = array();
        $sql = "DESCRIBE $tabla";
        $query = mysqli_query($this->conexion, $sql);
			if($query) {
                if (mysqli_num_rows($query) > 0)
                    while ($assoc = mysqli_fetch_assoc($query))
                        $resultados[] = $assoc;
            }
			return $resultados;
    }
}

//creaci�n de array de tabla bd_user CMS Cliente
class MyTableCliente extends Conexion{
        //conexi�n a base de datos del Cliente
        public function __construct($cnst_dbn){
                parent::__construct($cnst_dbn);
        }

        function getMaxFechas(){
            $sql="SELECT MAX(CREATE_TIME) AS create_time, MAX(UPDATE_TIME) AS update_time FROM information_schema.tables WHERE TABLE_SCHEMA = '".DB_NAME_CLI."'";
            $query = mysqli_query($this->conexion, $sql);
            if (mysqli_num_rows($query) > 0)
                $assoc = mysqli_fetch_assoc($query);
            $resultado = $assoc;
            return $resultado;
        }

        function ListarTablasCliente(){
            $resultados = array();
            $sql="SELECT TABLE_NAME FROM information_schema.tables WHERE TABLE_SCHEMA = '".DB_NAME_CLI."' ORDER BY TABLE_NAME ASC";
            $query = mysqli_query($this->conexion, $sql);
                if (mysqli_num_rows($query) > 0)
                    while ($assoc = mysqli_fetch_assoc($query))
                        $resultados[] = $assoc['TABLE_NAME'];
                return $resultados;
        }

        function ArrayTablaUsuario($tabla){
            $tabla = mysqli_real_escape_string($this->conexion, htmlspecialchars($tabla));
            $resultados = array();
            $sql = "DESCRIBE $tabla";
            $query = mysqli_query($this->conexion, $sql);
            if($query) {
                if (mysqli_num_rows($query) > 0)
                    while ($assoc = mysqli_fetch_assoc($query))
                        $resultados[] = $assoc;
            }
            return $resultados;
        }
}
?>