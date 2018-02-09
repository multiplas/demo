<div id="contenido">
    
    <?php
                for($i=0; $i<=count($labelidioma); $i++){
                    if($labelidioma[$i][0] == 'entrar'){
                        $aux0 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'accede'){
                        $aux1 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'registrar'){
                        $aux2 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'correo'){
                        $aux3 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'contrasena'){
                        $aux4 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'rec_contrasena'){
                        $aux5 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'nuevo_usuario'){
                        $aux6 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'nombre'){
                        $aux7 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'apellidos'){
                        $aux8 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'dni'){
                        $aux9 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'telefono'){
                        $aux10 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'direccion'){
                        $aux11 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'pais'){
                        $aux12 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'selecciona'){
                        $aux13 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'localidad'){
                        $aux14 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'cp'){
                        $aux15 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'repite_contrasena'){
                        $aux16 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'repite_correo'){
                        $aux17 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'politica_privacidad'){
                        $aux18 = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'enlace_politicas'){
                        $aux19 = $nombreidioma[$i][0];
                    }
                }
            ?>
    
        <div id="LbMessagesigin" style=" color: #E81F32;">
				<?=($_GET['cuenta']) == 'actok' ? '<p style=" color: #006614;">Activación realizada correctamente!</p>' : '';?>
				<?=($_GET['cuenta']) == 'actko' ? '<p>La activación ya se ha realizado anteriormente!</p>' : '';?>    
                                <?=($_GET['cuenta']) == 'bad' ? '<p>El usuario y/o contraseña indicados no son correctos!<br /><br /></p>' : '';?>
                                <?=($_GET['cuenta']) == 'bada' ? '<p>El usuario aún no está activado!<br /><br /></p>' : '';?>
                                <?=($_GET['cuenta']) == 'badv' ? '<p>Falta algún dato por rellenar!<br /><br /></p>' : '';?>
                                <?=($_GET['cuenta']) == 'good' ? ($Empresa['registro'] == 1 ? '<p style=" color: #006614;">Registro completado!</p>' : '<p style=" color: #006614;">Registro completado! Se ha enviado un correo de confirmación a su dirección de email.</p>') : '';?>
			</div>
    
	<div id="articulo">
		<h2><?=$aux0?></h2>
		<p><?=$aux1?></p><br />
		<form method="post" name="login" action="<?=$draizp?>/acc/entrar<?=isset($_GET['logcompra']) ? '/logcompra' : ''?>">
			<input type="text" id="user" name="user" placeholder="<?=$aux3?>" value="" /><br />
			<input type="password" id="pass" name="pass" placeholder="<?=$aux4?>" value="" /><br />
			<span name="BtSubmit" class="button"><?=$aux0?></span>&nbsp;&nbsp;&nbsp;<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cuenta/recovery"><?=$aux5?></a>
			
            <?php
                $ip = $_SERVER['REMOTE_ADDR']; // the IP address to query
                $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
                if($query && $query['status'] == 'success') {
                    echo '<input type="hidden" id="lon" name="lon"  value="'.$query['lon'].'" />';
                    echo '<input type="hidden" id="lat" name="lat"  value="'.$query['lat'].'" />';
                    echo '<input type="hidden" id="ciu" name="ciu"  value="'.$query['city'].'" />';
                    echo '<input type="hidden" id="pai" name="pai"  value="'.$query['country'].'" />';
                } else {
                    echo '<input type="hidden" id="lon" name="lon"  value="0" />';
                    echo '<input type="hidden" id="lat" name="lat"  value="0" />';
                    echo '<input type="hidden" id="ciu" name="ciu"  value="" />';
                    echo '<input type="hidden" id="pai" name="pai"  value="" />';
                }
            ?>
		</form>
                <p><b>¿No tienes cuenta? Registrate <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>registro">aquí</a></b></p>
	</div>
</div>