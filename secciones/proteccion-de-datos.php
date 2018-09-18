<?php
$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹",",",".",":",";");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","","","","");

function getTextoLegal($limit = 10000)
{
    global $dbi;
    $resultados = array();
    
    $sql = "SELECT * FROM bd_texto_legal ORDER BY id ASC LIMIT $limit;";
    $query = mysqli_query($dbi, $sql);
    
    if (mysqli_num_rows($query) > 0){
        while ($assoc = mysqli_fetch_assoc($query))
            $resultados[] = $assoc;
    }
    else{
        $this->CreateTableTextoLegal();
    }	

    return $resultados;
}

function CreateTableLegalText(){        
    global $dbi;
    
    $sql = "CREATE TABLE IF NOT EXISTS `bd_texto_legal` (
        `id` int NOT NULL AUTO_INCREMENT ,
        `texto` TEXT,
        UNIQUE KEY `id` (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1;";

    $query = mysqli_query($dbi, $sql);
    
    $sqlInsertData = "INSERT INTO `bd_texto_legal` (`id`, `texto`) VALUES (1, '' );";
    
    $query = mysqli_query($dbi, $sqlInsertData);
}

CreateTableLegalText();

?>
<div id="contenido" class="proteccion-de-datos">
    <div class="container">
        <?php
        $textoLegal = getTextoLegal();
        if(isset($textoLegal[0]['texto']) && !empty($textoLegal[0]['texto'])){
            echo $textoLegal[0]['texto'];
        }
        ?>
    </div>
</div>
<script type="text/javascript">
(function($) {
    $("a.groupgalery").fancybox();
 })(jQuery);   
</script>