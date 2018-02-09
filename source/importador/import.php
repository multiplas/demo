<?
//exit();

////////////////////Conexion
$dbhost = "milpeques.com";
$username = "milpeques";
$password = "hg2AaR5@";
$dbname="milpeques_db";

//$dbhost = "electrotenerife.es";
//$username = "electrotenerife";
//$password = "kenmZKN2#";
//$dbname="electrotenerife_db";


$db=mysql_connect ($dbhost, $username, $password);
mysql_select_db ("$dbname",$db);




////////////////Compruebo conexion

$dbuser="$username";
$dbpass="$password";
$chandle = mysql_connect($dbhost, $dbuser, $dbpass) or die("Error conectando a la BBDD");
echo "Conectado correctamente
";
mysql_select_db($dbname, $chandle) or die ($dbname . " Base de datos no encontrada." . $dbuser);
echo "Base de datos " . $database . " seleccionada";
mysql_close($chandle);

echo "<hr>";

$nombredelfichero="csv2.csv";

if (($fichero = fopen("$nombredelfichero", "r")) !== FALSE) {
    while (($datos = fgetcsv($fichero, 5000)) !== FALSE) {

        $contadordelineas = $contadordelineas+1;
        // Procesar los datos.
        //echo "En".$datos[0]."está el valor del primer campo, <br>";
        // en $datos[1] está el valor del segundo campo, etc...

        ////////////Defino Campos
        $refenciafichero = $datos[3];
        //$nombrefichero = $datos[1];
        //$disponiblesfichero = $datos[2];
        $pvpsiniva = $datos[7];
        $pvpsiniva = str_replace("0.000", "", $pvpsiniva);
        //$pvpsiniva = str_replace(",", "", $pvpsiniva);
        //$imagenreferencia = $refenciafichero.".jpg";
        $iva = "21";
        $disponible ="1"; //0=nodisponible

        //echo $imagen = "http://cedecasa.dyndns.org:81/fotos/$imagenreferencia"."<br>";


        ///////////////////////////Incrementos por %
        ///importe < 1 € le calcularemos un 150 %, a los  > 1€ y < 5€  le calculamos 100% y a  los > 5 € un 100%

        //if ($pvpsiniva<=1){$porcenjateplus = 150;}
       // if ($pvpsiniva==1 and $pvpsiniva<=5){$porcenjateplus = 100;}
       // if ($pvpsiniva>=5){$porcenjateplus = 100;}
        

        //$porciento =  number_format($pvpsiniva*$porcenjateplus/100 ,2);

       // $pvp = $pvpsiniva + $porciento;
        $pvp = $pvpsiniva;
        


         $sql1 = "UPDATE bd_productos SET iva = '21', precio='$pvpsiniva' WHERE referencia='$refenciafichero'  ";
         $resultado1=MySQL_query($sql1,$db); 

      ///if ($contadordelineas=="1"){

       echo "$contadordelineas .- $refenciafichero - Pvp: $pvpsiniva Euros <br>";

      /*  $sql = "INSERT INTO bd_productos
                    VALUES ('', '$nombrefichero', '$nombrein', '$descripcion', '$descripcionin', '$imagenreferencia', '$disponiblesfichero', '$disponiblesfichero', '$precio', '$tprecio', '$comprecio', '0', '$descuento', '$descuentoe', '$cat1', '$cat2', '$cat3', '$cat4', '$cat5', '$marca', '0', '$peso', '$refenciafichero', '$iva', '$disponible', '0', '0', '$metatitulo', '$metadescripcion', '0', '$tipo', '$paypalm', '$domicim', '$fDirecta', '$aplazame', '$caplazame', '$caplazame1', '$nfentrada', '$nfsalida', '$NCatAtriF', '0', '$mostraretq', '$mostraretqAgo', '$mostraretqOfe', '$maxDias', '$disponibilidad', '$plazoEnt', '$orden', '$pagotado', '$agotado');";*/
                                                
       //     $result=MySQL_query($sql,$db); 
              ///                   }


    }
}

?>