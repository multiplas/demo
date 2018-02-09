<?php
//Clase para el Log de estado de los pedidos
class Personalizar extends Conexion{

    public function __construct($cnst_dbn){
        parent::__construct($cnst_dbn);
    }

    function ModificarCombinacion($tabla, $set, $where)
    {
        $sql = "UPDATE $tabla
					SET $set
					WHERE $where;";

        $query = mysqli_query($this->conexion, $sql);
        return $query;

    }
}
?>