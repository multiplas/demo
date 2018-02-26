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



 $sql="SELECT * FROM bd_categorias ";
 $result=MySQL_query($sql,$db); 
 while($myrow1=MySQL_fetch_array($result)) 
{
$id = $myrow1["id"];
$categoria = $myrow1["categoria"];
$idpadre = $myrow1["idpadre"];
$orden = $myrow1["orden"];

$cadafila= '{"id" : '.$id.',"categoria": "'.$categoria.'","idpadre": "'.$idpadre.'","orden": "'.$orden.'"},';
    $totalfilas = $totalfilas.$cadafila;

}
                    
$totalfilas = substr($totalfilas, 0, -1);                 
echo $myrow1='['.$totalfilas.']';
 
      
        $myArray = json_encode($myrow1);

?>

