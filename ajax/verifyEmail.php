<?php
    global $dbi;
    include('../sistema/i_connectionstrings.php');    
    if($_POST['email'] != ''){
        $dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt)
        or die ('<p style="background: #F0F0F0; border: solid 1px #E0E0E0; border-radius: 3px; font-size: 2rem; text-align: center; text-shadow: 1px 1px 0px #FFF; max-width: 60%; margin: 100px auto; padding: 1.4rem;">No se ha podido establecer la conexión con la base de datos.<br><br><em>Vuelva a intentarlo pasados unos minutos!</em><br><br><a href="javascript: location.reload();" style="text-decoration: none; color: #09F">Recargar</a></p>');
        $sql = "SELECT * FROM bd_users WHERE email = '".$_POST['email']."'";
        $query = mysqli_query($dbi, $sql);
        
        if(mysqli_num_rows($query) >= 1){
            echo "true";//El email Existe
        }
        else{
            echo "false";
        }
    }
?>