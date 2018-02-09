<?php
                $dev = -1;
                global $dbi;
                include('../sistema/i_connectionstrings.php');
                include('../sistema/mod_varios.php');
                @$dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt)
			or die ('<p style="background: #F0F0F0; border: solid 1px #E0E0E0; border-radius: 3px; font-size: 2rem; text-align: center; text-shadow: 1px 1px 0px #FFF; max-width: 60%; margin: 100px auto; padding: 1.4rem;">No se ha podido establecer la conexión con la base de datos.<br><br><em>Vuelva a intentarlo pasados unos minutos!</em><br><br><a href="javascript: location.reload();" style="text-decoration: none; color: #09F">Recargar</a></p>');
		mysqli_set_charset($dbi, 'utf8');
                
                
		$sql = "SELECT pa.precioextra AS precioextra, pa.precio AS precio FROM bd_producto_atributo AS pa, bd_atributo AS a WHERE pa.idproducto='".$_POST['id']."' AND pa.idatributo = a.id AND a.atributo = '".$_POST['valor']."';";
		$query = mysqli_query($dbi, $sql);

                if(mysqli_num_rows($query)>0){
                    $assoc = mysqli_fetch_assoc($query);
                    if($assoc['precio'] > 0){
                        $dev = ConvertirMoneda($_POST['moneda1'],$_POST['moneda2'],$assoc['precio']);
                        $dev = "t-".$dev;
                    }else if($assoc['precioextra'] >= 0){
                        $dev = ConvertirMoneda($_POST['moneda1'],$_POST['moneda2'],$assoc['precioextra']);
                        $dev = "e-".$dev;
                    }
                        
                }
                
                 if ($dev == -1){
                    $sql = "SELECT precio, iva FROM bd_productos WHERE id='".$_POST['id']."';";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_assoc($query);
                    $dev = $assoc['precio'] * (1 + ($assoc['iva']/100));
                    $dev = 'i-'.$dev;
                }
		
                mysqli_close($dbi)
			or die ('No se ha podido cerrar la conexión con la base de datos.');
                
                

                echo $dev;