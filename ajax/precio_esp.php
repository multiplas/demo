<?php
                $dev = 0;
                global $dbi;
                include('../sistema/i_connectionstrings.php');
                include('../sistema/mod_varios.php');
                @$dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt)
			or die ('<p style="background: #F0F0F0; border: solid 1px #E0E0E0; border-radius: 3px; font-size: 2rem; text-align: center; text-shadow: 1px 1px 0px #FFF; max-width: 60%; margin: 100px auto; padding: 1.4rem;">No se ha podido establecer la conexión con la base de datos.<br><br><em>Vuelva a intentarlo pasados unos minutos!</em><br><br><a href="javascript: location.reload();" style="text-decoration: none; color: #09F">Recargar</a></p>');
		mysqli_set_charset($dbi, 'utf8');
                
                //Calcular diferencia de días y buscar el precio. 
                $fecha_i = explode("/", $_POST['fentrada']);
                $fecha_i = $fecha_i['2']."-".$fecha_i['1']."-".$fecha_i['0'];
                $fecha_f = explode("/", $_POST['fsalida']);
                $fecha_f = $fecha_f['2']."-".$fecha_f['1']."-".$fecha_f['0'];
                
                $dias = (strtotime($fecha_f)-strtotime($fecha_i))/86400;
                $dias = $dias;
                $dias = floor($dias);
                
                if ($dias > 0){
                    
                    $sql = "SELECT atributoAsociado, DiasMax FROM  bd_productos WHERE id = '".$_POST['id']."'";
                    $query = mysqli_query($dbi, $sql);
                    $assoc = mysqli_fetch_assoc($query);
                    
                    if($assoc['DiasMax'] >= $dias || $assoc['DiasMax'] == 0 || $assoc['DiasMax'] == ''){
                        
                        if($assoc['atributoAsociado'] > 0){
                            $sql2 = "SELECT * FROM  bd_atributo WHERE tipoid = '".$assoc['atributoAsociado']."'";
                            $query2 = mysqli_query($dbi, $sql2);

                            if(mysqli_num_rows($query2)>0){
                                $posibilidades = array();
                                while($assoc2 = mysqli_fetch_assoc($query2)){
                                    $valor_query = explode(" ", $assoc2['atributo']);
                                    $valor_query = $valor_query['1'];                                
                                    array_push($posibilidades, $valor_query);
                                }

                                arsort($posibilidades);

                                $buscado = $posibilidades[count($posibilidades) - 1];

                                foreach($posibilidades as $posibilidadC){
                                    if($posibilidadC >= $dias){
                                        $buscado = $posibilidadC;
                                    }
                                }

                                $sql3 = "SELECT id FROM  bd_atributo WHERE atributo = 'HASTA ".$buscado."'";
                                $query3 = mysqli_query($dbi, $sql3);
                                $assoc3 = mysqli_fetch_assoc($query3);

                                $sql4 = "SELECT precio FROM bd_producto_atributo WHERE idatributo = '".$assoc3['id']."' AND idproducto = '".$_POST['id']."'";
                                $query4 = mysqli_query($dbi, $sql4);
                                if(mysqli_num_rows($query4)>0){
                                    $assoc4 = mysqli_fetch_assoc($query4);
                                    $dev = $dias * $assoc4['precio'];
                                }else{
                                  $dev = '- ';  
                                }

                                mysqli_close($dbi)
                                    or die ('No se ha podido cerrar la conexión con la base de datos.');

                                echo $dev;
                                exit;

                            }else{
                                $sql = "SELECT pa.precio AS precio, pa.precioextra AS precioextra FROM bd_producto_atributo AS pa, bd_atributo AS a WHERE pa.idproducto='".$_POST['id']."' AND pa.idatributo = a.id AND a.atributo = '".$_POST['valor']."';";
                                $query = mysqli_query($dbi, $sql);

                                if(mysqli_num_rows($query)>0){
                                    $assoc = mysqli_fetch_assoc($query);
                                    if($assoc['precio'] > 0){
                                        $dev = ConvertirMoneda($_POST['moneda1'],$_POST['moneda2'],$assoc['precio']);
                                        $dev = "t-".$dev;
                                    }else if($assoc['precioextra'] > 0){
                                        $dev = ConvertirMoneda($_POST['moneda1'],$_POST['moneda2'],$assoc['precioextra']);
                                        $dev = "e-".$assoc['precio'];
                                    }
                                }

                                 if ($dev == 0){
                                    /*$sql = "SELECT precio, iva FROM bd_productos WHERE id='".$_POST['id']."';";
                                    $query = mysqli_query($dbi, $sql);
                                    $assoc = mysqli_fetch_assoc($query);
                                    $dev = $assoc['precio'] * (1 + ($assoc['iva']/100));*/
                                     $dev = 'e-0';
                                }

                                mysqli_close($dbi)
                                        or die ('No se ha podido cerrar la conexión con la base de datos.');

                                $dev = ConvertirMoneda($_POST['moneda1'],$_POST['moneda2'],$dev);

                                echo $dev;
                                exit;
                            }

                        }else{
                            $sql = "SELECT pa.precio AS precio, pa.precioextra AS precioextra FROM bd_producto_atributo AS pa, bd_atributo AS a WHERE pa.idproducto='".$_POST['id']."' AND pa.idatributo = a.id AND a.atributo = '".$_POST['valor']."';";
                            $query = mysqli_query($dbi, $sql);

                            if(mysqli_num_rows($query)>0){
                                $assoc = mysqli_fetch_assoc($query);
                                if($assoc['precio'] > 0){
                                    $dev = ConvertirMoneda($_POST['moneda1'],$_POST['moneda2'],$assoc['precio']);
                                    $dev = "t-".$dev;
                                }else if($assoc['precioextra'] > 0){
                                    $dev = ConvertirMoneda($_POST['moneda1'],$_POST['moneda2'],$assoc['precioextra']);
                                    $dev = "e-".$assoc['precio'];
                                }
                            }

                             if ($dev == 0){
                                /*$sql = "SELECT precio, iva FROM bd_productos WHERE id='".$_POST['id']."';";
                                $query = mysqli_query($dbi, $sql);
                                $assoc = mysqli_fetch_assoc($query);
                                $dev = $assoc['precio'] * (1 + ($assoc['iva']/100));*/
                                $dev = 'e-0';
                            }

                            mysqli_close($dbi)
                                    or die ('No se ha podido cerrar la conexión con la base de datos.');

                            $dev = ConvertirMoneda($_POST['moneda1'],$_POST['moneda2'],$dev);

                            echo $dev;
                            exit;
                        }
                    }else{
                        echo "--";
                        exit;
                    }

                
                   
                    echo $dias;
                }else{
                    mysqli_close($dbi)
                                or die ('No se ha podido cerrar la conexión con la base de datos.');
                    
                    echo "- ";
                    exit;
                }