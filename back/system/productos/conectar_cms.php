<?php  
require_once "config_db_cms.php";
 
class Conexion{ 
    protected $conexion;
    public function __construct(){
        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conexion->connect_errno){
            echo "Error al conectar con el servidor MySql: ". $this->conexion->connect_error;
            return;     
        }
        $this->conexion->set_charset(DB_CHARSET);
    } 
} 
?> 