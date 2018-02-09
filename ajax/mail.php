<?php
                global $dbi;
                $dev = true;
                if($_POST['mail'] != ''){
                    include('../sistema/i_connectionstrings.php');
                    @$dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt)
                            or die ('<p style="background: #F0F0F0; border: solid 1px #E0E0E0; border-radius: 3px; font-size: 2rem; text-align: center; text-shadow: 1px 1px 0px #FFF; max-width: 60%; margin: 100px auto; padding: 1.4rem;">No se ha podido establecer la conexión con la base de datos.<br><br><em>Vuelva a intentarlo pasados unos minutos!</em><br><br><a href="javascript: location.reload();" style="text-decoration: none; color: #09F">Recargar</a></p>');
                    mysqli_set_charset($dbi, 'utf8');

                    $sql_1 = "SELECT * FROM bd_log_accessmail WHERE email = '".$_POST['mail']."' AND fecha >= '".date("Y-m-d H:i:s", strtotime ( '-24 hour' , strtotime (date("Y-m-d H:i:s"))))."'";
                    $query_1 = mysqli_query($dbi, $sql_1); 
                    
                    if(mysqli_num_rows($query_1)==0){
                        $ipaddress = '';
                        if (getenv('HTTP_CLIENT_IP'))
                            $ipaddress = getenv('HTTP_CLIENT_IP');
                        else if(getenv('HTTP_X_FORWARDED_FOR'))
                            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
                        else if(getenv('HTTP_X_FORWARDED'))
                            $ipaddress = getenv('HTTP_X_FORWARDED');
                        else if(getenv('HTTP_FORWARDED_FOR'))
                            $ipaddress = getenv('HTTP_FORWARDED_FOR');
                        else if(getenv('HTTP_FORWARDED'))
                           $ipaddress = getenv('HTTP_FORWARDED');
                        else if(getenv('REMOTE_ADDR'))
                            $ipaddress = getenv('REMOTE_ADDR');
                        else
                            $ipaddress = 'UNKNOWN';
        
                        $sql = "INSERT INTO bd_log_accessmail VALUES (null, '".$_POST['mail']."','".date("Y-m-d H:i:s")."', '".$ipaddress."')";
                        $query = mysqli_query($dbi, $sql);  
                    }
                }