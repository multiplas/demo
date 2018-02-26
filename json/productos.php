<?


    $svr = 'mysql2.camaltec-services.com';
    $usr = 'tiendaDemo';
    $pwd = 'TUwYVtYU39b3ADSQ';
    $dbn = 'tiendaDemo_db';
    $prt = '3306';

//$dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);

$dbhost = "$svr";
$username = "$usr";
$password = "$pwd";
$db=mysql_connect ($dbhost, $username, $password);
mysql_select_db ("$dbn",$db);



 $sql="SELECT * FROM bd_productos ";
 $result=MySQL_query($sql,$db); 
 while($myrow1=MySQL_fetch_array($result)) 
{
$id = $myrow1["id"];
$nombre = $myrow1["nombre"];
$descripcion = $myrow1["descripcion"];
$descripcion = str_replace('"', "'", $descripcion);
$imagenprincipal = $myrow1["imagenprincipal"];
$imagenprincipalfinal = 'http://demo.tiendavirtualprofesional.com/imagenesproductos/'.$imagenprincipal;

$precio = $myrow1["precio"];
$idcat = $myrow1["idcat"];
$referencia = $myrow1["referencia"];
$orden = $myrow1["orden"];

$cadafila= '{"id" : '.$id.',"nombre": "'.$nombre.'","descripcion": "'.$descripcion.'","imagenprincipalfinal": "'.$imagenprincipalfinal.'","precio": "'.$precio.'","idcat": "'.$idcat.'","referencia": "'.$referencia.'","orden": "'.$orden.'"},';
    $totalfilas = $totalfilas.$cadafila;

}
                    
$totalfilas = substr($totalfilas, 0, -1);                 
echo $myrow1='['.$totalfilas.']';
 
      
        $myArray = json_encode($myrow1);

?>

