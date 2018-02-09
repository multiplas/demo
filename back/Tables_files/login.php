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
	</div>
    
	<div id="articulo">
		<h2><?=$aux0?> / <?=$aux2?></h2>
		<p><?=$aux1?></p><br />
		<form method="post" name="login" action="<?=$draizp?>/acc/entrar<?=isset($_GET['logcompra']) ? '/logcompra' : ''?>">
			<input type="text" id="user" name="user" placeholder="<?=$aux3?>" value="" /><br />
			<input type="password" id="pass" name="pass" placeholder="<?=$aux4?>" value="" /><br />
			<span name="BtSubmit" class="button"><?=$aux0?></span>&nbsp;&nbsp;&nbsp;<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/cuenta/recovery"><?=$aux5?></a>
			<div id="LbMessagelogin" style=" color: #E81F32;">
				<?=($_GET['cuenta']) == 'bad' ? '<p>El usuario y/o contraseña indicados no son correctos!<br /><br /></p>' : '';?>
                                <?=($_GET['cuenta']) == 'bada' ? '<p>El usuario aún no está activado!<br /><br /></p>' : '';?>
                                <?=($_GET['cuenta']) == 'badv' ? '<p>Falta algún dato por rellenar!<br /><br /></p>' : '';?>
			</div>
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
                <div id="LbMessagesigin" style=" color: #E81F32;">
				<?=($_GET['cuenta']) == 'sad' ? '<p>E-mail ya registrado!</p>' : '';?>
				<?=($_GET['cuenta']) == 'good' ? '<p style=" color: #006614;">Registro completado! Se ha enviado un correo de confirmación a su dirección de email.</p>' : '';?>
                                <?=($_GET['cuenta']) == 'ebad' ? '<p>Las direcciones de email no coinciden!</p>' : '';?>
                                <?=($_GET['cuenta']) == 'pbad' ? '<p>La contraseña y su confirmación no coinciden!</p>' : '';?>
                                <?=($_GET['cuenta']) == 'dbad' ? '<p>Falta algún dato por rellenar!</p>' : '';?>
                                <?=($_GET['cuenta']) == 'cbad' ? '<p>Tienes que aceptar la política de privacidad para poder registrarte!</p>' : '';?>
		</div>
		<p><?=$aux6?></p><br />
		<form method="post" name="sigin" action="<?=$draizp?>/acc/registrar">
			<input type="text" id="nombre" name="nombre" placeholder="<?=$aux7?>" value="" />
			<input type="text" id="apellidos" name="apellidos" placeholder="<?=$aux8?>" value="" /><br />
			<input type="text" id="dni" name="dni" placeholder="<?=$aux9?>" value="" />
            <?php
                $ip = $_SERVER['REMOTE_ADDR']; // the IP address to query
                $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
                if($query && $query['status'] == 'success') {
                    echo '<input type="hidden" id="lonr" name="lonr"  value="'.$query['lon'].'" />';
                    echo '<input type="hidden" id="latr" name="latr"  value="'.$query['lat'].'" />';
                    echo '<input type="hidden" id="ciur" name="ciur"  value="'.$query['city'].'" />';
                    echo '<input type="hidden" id="pair" name="pair"  value="'.$query['country'].'" />';
                } else {
                    echo '<input type="hidden" id="lonr" name="lonr"  value="0" />';
                    echo '<input type="hidden" id="latr" name="latr"  value="0" />';
                    echo '<input type="hidden" id="ciur" name="ciur"  value="" />';
                    echo '<input type="hidden" id="pair" name="pair"  value="" />';
                }
            ?>
			<input type="text" id="telefono" name="telefono" placeholder="<?=$aux10?>" value="" /><br />
			<input type="text" class="dobleF" id="direccion" name="direccion" placeholder="<?=$aux11?>" value="" /><br />
			<select id="pais" name="pais" required>
				<option value="" selected><?=$aux12?></option>
				<?php
					foreach($paises as $pais)
						echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
				?>
			</select>
			<select id="provincia" name="provincia" disabled required>
				<option value="" selected><?=$aux13?></option>
			</select><br />
			<input type="text" id="localidad" name="localidad" placeholder="<?=$aux14?>" value="" />
			<input type="text" id="cp" name="cp" class="mitadF2" placeholder="<?=$aux15?>" /><br /><br /><br />
			<input type="text" id="email" name="email" placeholder="<?=$aux3?>" value="" />
			<input type="text" id="cemail" name="cemail" placeholder="<?=$aux16?>" value="" /><br />
			<input type="password" id="password" name="password" placeholder="<?=$aux4?>" value="" />
			<input type="password" id="rpassword" name="rpassword" placeholder="<?=$aux17?>" value="" /><br /><br />
			<label><input type="checkbox" id="checkp" name="checkp" value="" />&nbsp;<span name="pcheckp"><?=$aux18?> <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/privacidad" target="_blank"><?=$aux19?></a></span></label>
			<span name="BtSubmit" class="button"><?=$aux2?></span>
			
		</form>
	</div>
</div>