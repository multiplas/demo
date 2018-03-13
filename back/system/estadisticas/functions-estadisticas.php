<?php
//Clase para archivos multimedia
class Estadistica extends Conexion{

    public function __construct($cnst_dbn){
        parent::__construct($cnst_dbn);
    }

    //Obteniendo listado de visitas
    function GetEstadisticas($filtro_fecha)
    {
        $resultados = array();
        $sql = "SELECT domain, ip, user_os, user_browser, user_agent, country, country_code, city, pagina_visitada, DATE_FORMAT(create_at, '%d-%m-%Y') AS fecha
				FROM bd_visitors $filtro_fecha ORDER BY create_at DESC";
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

    //Obteniendo cantidad de visitas
    function GetEstadisticas_count($where, $group, $orden, $limit, $tipo, $filtro_fecha)
    {
        $resultados = array();
        if ($tipo==1) {
            $sql = "SELECT COUNT(id) AS total, $group
				FROM bd_visitors $where $filtro_fecha
				GROUP BY $group $orden $limit";
        }else{
            $sql = "SELECT COUNT(id) AS total, 'Otros' AS domain
				FROM bd_visitors $where $filtro_fecha";
        }
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
}
?>