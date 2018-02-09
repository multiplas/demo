<script src="<?=$draizp?>/secciones/registro_script.js"></script>


<style>
     @media (max-width: 545px){
        .movilbt{
            width: 100% !important;
            max-width: 545px !important;
        }
     }
</style>
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
    
        
    
	<div id="articulo">
		<h2><?=$aux2?></h2>
                <div id="LbMessagesigin" style=" color: #E81F32;">
				<?=($_GET['registro']) == 'good' ? '<p style=" color: #006614;">Registro completado! Se ha enviado un correo de confirmación a su dirección de email.</p>' : '';?>
                                <?=($_GET['registro']) == 'ebad' ? '<p>Las direcciones de email no coinciden!</p>' : '';?>
                                <?=($_GET['registro']) == 'ebad1' ? '<p>La dirección de email ya ha sido registrada!</p>' : '';?>
                                <?=($_GET['registro']) == 'pbad' ? '<p>La contraseña y su confirmación no coinciden!</p>' : '';?>
                                <?=($_GET['registro']) == 'dbad' ? '<p>Falta algún dato por rellenar!</p>' : '';?>
                                <?=($_GET['registro']) == 'cbad' ? '<p>Tienes que aceptar la política de privacidad para poder registrarte!</p>' : '';?>
                                <?=($_GET['registro']) == 'dni' ? '<p>'.$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'CIF' : $_SESSION['datosregistro']['tipoD'] == 'pass' ? 'Pasaporte' : $_SESSION['datosregistro']['tipoD'] == 'nres' ? 'NIE' : 'DNI' .' incorrecto!</p>' : '';?>
                                <?=($_GET['registro']) == 'sad' ? '<p>Fallo al crear el usuario! Intentenlo de nuevo, por favor.</p>' : '';?>
		</div>
                <p><?=$aux6?></p>
		<form method="post" name="sigin" action="<?=$draizp?>/acc/registrar" onsubmit="return activa2()">
                     <span id="emailinv" name="emailinv" style="display: none; color: red"><b>¡Correo electronico inválido!</b><br></span>
                     <span id="yareg" name="yareg" style="display: none; color: red"><b>¡Correo electronico ya registrado!</b> Logeate <a href="cuenta">aquí</a><br></span>
                     <span id="emailD" name="emailD" style="display: none; color: red"><b>¡Correos electronicos distintos!</b><br></span>
                     <input id="dirValue" type="hidden" value="<?=$draizp?>/ajax/registro.php">
                     <input id="mailValue" type="hidden" value="<?=$draizp?>/ajax/mail.php">
                     <input id="cpValue" type="hidden" value="<?=$draizp?>/ajax/cp.php">
                     
                     
                     <input type="text" class="movilbt" id="email" name="email" placeholder="<?=$aux3?>" value="<?=$_SESSION['datosregistro']['email']?>"  onchange="activa2()"/>
                        <span id="botoncitoCom"  class="button">Comprobar Email</span>
                        <input type="text" class="movilbt" id="cemail" name="cemail" placeholder="<?=$aux17?>" value="<?=$_SESSION['datosregistro']['cemail']?>"  onchange="activa2()" style="visibility: hidden"/>
                        <span style="visibility: hidden" id="botoncitoCof"  class="button">Confirmar Email</span><br />
                        <span id="PassO" name="PassO" style="display: none">
                            
                            <span id="passD" name="emailD" style="display: none; color: red"><b>¡Contraseñas distintas!</b><br></span>
                            <input type="password" class="movilbt" id="password" name="password" placeholder="<?=$aux4?>" value=""  onchange="activa2()"/>
                            <span id="passCB" name="passCB" style="display: none"><input type="password" id="rpassword" class="movilbt" name="rpassword" placeholder="<?=$aux16?>" value=""  onchange="activa2()"/>
                                <span id="botoncitoCofP"  class="button">Confirmar Pass</span></span>
                        <br><br>
                        
                        
                        <span id="CondicionesAcep" style="display: none">
                                <label><input type="checkbox" id="checkp" name="checkp" value="" onchange="activa2()"/>&nbsp;<span name="pcheckp">Acepto la <?=$Empresa['condiciones'] == 1 ? '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/privacidad" target="_blank">'.$aux19.'</a>' : $aux19?></span></label>
                        </span>
                        
                        <span id="datosO" name="datosO" style="display: none">
                        <input type="radio" id="tipoC" name="tipoC" value="Particular" checked=""  onchange="activa2()"> Particular
                        <input type="radio" id="tipoC" name="tipoC" value="Empresa" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'checked=""' : ''?>  onchange="activa2()"> Empresa<br><br>
                        <span id="particular" name="particular" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'style="display: none"' : 'style="display: block"'?>>
                            <input type="radio" id="tipoD" name="tipoD" value="dni" checked=""  onchange="activa2()"> DNI
                            <input type="radio" id="tipoD" name="tipoD" value="pass" <?=$_SESSION['datosregistro']['tipoD'] == 'pass' ? 'checked=""' : ''?>  onchange="activa2()"> Passaporte
                            <input type="radio" id="tipoD" name="tipoD" value="nres" <?=$_SESSION['datosregistro']['tipoD'] == 'nres' ? 'checked=""' : ''?>  onchange="activa2()"> NIE<br><br>
                        </span>
                        
                        <span id="razons" name="razons" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'style="display: block"' : 'style="display: none"'?>>
                            <input type="text" class="movilbt" id="rsocial" name="rsocial" placeholder="Razón Social" value="<?=$_SESSION['datosregistro']['rsocial']?>" style="max-width: 544px;"/>
                        </span>
                        
                        <input type="text" class="movilbt" id="dni" name="dni" placeholder="DNI" value="<?=$_SESSION['datosregistro']['dni']?>"  onchange="activa2()"/>
                        <input type="text" class="movilbt" id="telefono" name="telefono" placeholder="<?=$aux10?>" value="<?=$_SESSION['datosregistro']['telefono']?>"  onchange="activa2()"/><br />
			<input type="text" class="movilbt" id="nombre" name="nombre" placeholder="<?=$aux7?>" value="<?=$_SESSION['datosregistro']['nombre']?>"  onchange="activa2()"/>
			<input type="text" class="movilbt" id="apellidos" name="apellidos" placeholder="<?=$aux8?>" value="<?=$_SESSION['datosregistro']['apellidos']?>"  onchange="activa2()"/><br />
			
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
			
                        <span id="dnierr" name="dnierr" style="display: none; color: red"><b>¡DNI inválido!</b><br></span>
			<input type="text" class="dobleF" id="direccion" name="direccion" placeholder="<?=$aux11?>" value="<?=$_SESSION['datosregistro']['direccion']?>"  onchange="activa2()"/><br />
			<select id="pais" class="movilbt" name="pais" required onchange="activa2()">
				<option value="" selected><?=$aux12?></option>
				<?php
					foreach($paises as $pais){
                                            if($_SESSION['datosregistro']['pais'] == $pais['id'])
                                                echo '<option selected value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
                                            else
                                                echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
                                        }
				?>
			</select>
			<select id="provincia" class="movilbt" name="provincia" disabled required onchange="activa2()">
				<option value="" selected><?=$aux13?></option>
			</select><br />
                        <input type="hidden" id="idpro" name="idpro2" value="<?=$_SESSION['datosregistro']['provincia']?>" />
			<input type="text" class="movilbt" id="localidad" name="localidad" placeholder="<?=$aux14?>" value="<?=$_SESSION['datosregistro']['localidad']?>"  onchange="activa2()"/>
			<input type="text" class="movilbt" id="cp" name="cp" class="mitadF2" placeholder="<?=$aux15?>" value="<?=$_SESSION['datosregistro']['cp']?>" onchange="activa2()"/><br />
                        <span id="cpEr" name="cpEr" style="display: none; color: red"><b>¡El código postal no pertenece a la provincia elegida!</b><br></span>
                        <br /><br />
                        
                       
			<span id="botoncitoCom22" class="button movilbt" style="">Verificar Datos</span>
                        <input type="submit" id="continuar" name="BtSubmit" class="button2 movilbt" disabled="" style="display: none" value="<?=$aux2?>">
                        </span>
                        </span>
                        
                        <b>¿Ya estas registrado?</b> Pincha <a href="cuenta">aquí</a> para acceder a tu cuenta.
			
		</form>
	</div>
</div>