<?php  

 
class Conexion{ 
    protected $conexion;
    public function __construct($db_name){
        if(is_null($db_name)) {
            $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        }
        else {
            $this->conexion = new mysqli(DB_HOST_CLI, DB_USER_CLI, DB_PASS_CLI, DB_NAME_CLI);
        }
        if ($this->conexion->connect_errno){
            echo "Error al conectar con el servidor MySql: ". $this->conexion->connect_error;
            return;     
        }
        $this->conexion->set_charset(DB_CHARSET);
    } 
} 
?> 