<?php

require_once "back/config_db_cms.php";
require_once "back/config/conectar_cms.php";
require_once('back/system/estadisticas/functions-visitor.php');
//Obteniendo pagina visitada

//Obteniendo URL
$url_visitada = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if($url_visitada != 'demo.tiendavirtualprofesional.com/source/' && $url_visitada != 'demo.tiendavirtualprofesional.com/icono/') {
//Llamado de la clase visitor
    $visitor = new Visitor("BD_CLIENTE");

    $visitor_referer = $_SERVER['HTTP_REFERER']; // la pagina desde la que viene el visitante
    $visitor_user_agent = $_SERVER['HTTP_USER_AGENT']; //el navegador que utiliza el visitante
    $visitor_remote_addr = $_SERVER['REMOTE_ADDR']; //direccion ip del visitante

    $user_browser = getBrowser($visitor_user_agent);
    $SO = getPlatform($visitor_user_agent);


    session_start();


    if (!$_SESSION['country_code']) {
        // Cogemos la IP del usuario del array que nos pasa el servidor
        $user_ip = $_SERVER['REMOTE_ADDR'];

// Iniciamos el handler de CURL y le pasamos la URL de la API externa
        $ch = curl_init("http://api.hostip.info/get_json.php?ip=$user_ip");

// Con este comando le pedimos a CURL que, en vez de mostrar
// el resultado en pantalla, nos lo devuelva como una variable
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Y simplemente hacemos la petición HTTP.
        $country_code = curl_exec($ch);

// Guardamos la variable en $_SESSION
        $_SESSION['country_code'] = $country_code;
    } else {
        $country_code = $_SESSION['country_code'];
    }
//transformando data en array
    $array_info_country = (array)json_decode($country_code);
//Datos del país del visitante
    $country_name = $array_info_country['country_name'];
    $country_code = $array_info_country['country_code'];
    $country_city = $array_info_country['city'];
//Insertando datos de visitante
    $visitante = $visitor->InsertVisitor($visitor_referer, $visitor_user_agent, $visitor_remote_addr, $SO, $user_browser, $country_name, $country_code, $country_city, $url_visitada);
}

//Detectar naegador del visitante
function getBrowser($user_agent){

    if(strpos($user_agent, 'MSIE') !== FALSE)
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge
        return 'Microsoft Edge';
    elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11
        return 'Internet explorer';
    elseif(strpos($user_agent, 'Opera Mini') !== FALSE)
        return "Opera Mini";
    elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)
        return "Opera";
    elseif(strpos($user_agent, 'Firefox') !== FALSE)
        return 'Mozilla Firefox';
    elseif(strpos($user_agent, 'Chrome') !== FALSE)
        return 'Google Chrome';
    elseif(strpos($user_agent, 'Safari') !== FALSE)
        return "Safari";
    else
        return 'No hemos podido detectar su navegador';


}
//Detectar sistema operativo del visitante
function getPlatform($user_agent) {
    $plataformas = array(
        'Windows 10' => 'Windows NT 10.0+',
        'Windows 8.1' => 'Windows NT 6.3+',
        'Windows 8' => 'Windows NT 6.2+',
        'Windows 7' => 'Windows NT 6.1+',
        'Windows Vista' => 'Windows NT 6.0+',
        'Windows XP' => 'Windows NT 5.1+',
        'Windows 2003' => 'Windows NT 5.2+',
        'Windows' => 'Windows otros',
        'iPhone' => 'iPhone',
        'iPad' => 'iPad',
        'Mac OS X' => '(Mac OS X+)|(CFNetwork+)',
        'Mac otros' => 'Macintosh',
        'Android' => 'Android',
        'BlackBerry' => 'BlackBerry',
        'Linux' => 'Linux',
    );
    foreach($plataformas as $plataforma=>$pattern){
        if (eregi($pattern, $user_agent))
            return $plataforma;
    }
    return 'Otras';
}




?>