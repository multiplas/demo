<?php
//Clase visitor
class Visitor extends Conexion{

    public function __construct($cnst_dbn){
        parent::__construct($cnst_dbn);
    }

    //Insertando datos del visitante
    function InsertVisitor($domain, $user_agent, $ip, $user_os, $user_browser, $country, $country_code, $city, $pagina_visitada){
        $domain = mysqli_real_escape_string($this->conexion, htmlspecialchars($domain));
        $user_agent = mysqli_real_escape_string($this->conexion, htmlspecialchars($user_agent));
        $ip = mysqli_real_escape_string($this->conexion, htmlspecialchars($ip));
        $user_os = mysqli_real_escape_string($this->conexion, htmlspecialchars($user_os));
        $user_browser = mysqli_real_escape_string($this->conexion, htmlspecialchars($user_browser));
        $country = mysqli_real_escape_string($this->conexion, htmlspecialchars($country));
        $country_code = mysqli_real_escape_string($this->conexion, htmlspecialchars($country_code));
        $city = mysqli_real_escape_string($this->conexion, htmlspecialchars($city));
        $pagina_visitada = mysqli_real_escape_string($this->conexion, htmlspecialchars($pagina_visitada));

        $sql="INSERT INTO bd_visitors 
          (domain, user_agent, ip, user_os, user_browser, country, country_code, city, pagina_visitada, create_at)
          VALUES ('$domain', '$user_agent', '$ip', '$user_os', '$user_browser', '$country', '$country_code', '$city', '$pagina_visitada', CURRENT_TIMESTAMP);";
        $query = mysqli_query($this->conexion, $sql);
        return $query;
    }
}
?>