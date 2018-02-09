<?php
    for($i=0; $i<=count($labelidioma); $i++){

        if($labelidioma[$i][0] == 'cuenta'){
            $auxcue = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'desconectar'){
            $auxdes = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'cambiarcon'){
            $auxcc = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'conactual'){
            $auxca = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'nuevacon'){
            $auxnc = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'repcon'){
            $auxrc = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'guardar'){
            $auxgua = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'emailnuevo'){
            $auxen = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'repetiremail'){
            $auxre = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'modificar'){
            $auxmod = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'modificarDE'){
            $auxmodDE = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'cambiar'){
            $auxcamb = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'contrasena'){
            $auxcont = $nombreidioma[$i][0];
        }
        
        if($labelidioma[$i][0] == 'nombre'){
            $auxnom = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'dni'){
            $auxdni = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'telefono'){
            $auxtlf = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'pais'){
            $auxpa = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'selecciona'){
            $auxspa = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'localidad'){
            $auxloc = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'cp'){
            $auxcp = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'direccion'){
            $auxdir = $nombreidioma[$i][0];
        }
    }
?>

<div id="contenido">
	<div id="articulo">
		<form method="post" name="logout" action="<?=$draizp?>/acc/salir" style="float: right; text-align: left;">
			<span style="font-weight: bold;text-transform: uppercase;"><?=$_SESSION['usr']['nombre']?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<span name="BtSubmit" class="button"><?=$auxdes?></span>
		</form>
		<h2><?=$auxcue?></h2>
		<p><?=$auxcc?></p><br />
		<form method="post" id="modpwd" name="modpwd" action="<?=$draizp?>/acc/cambiarpwd">
			<input type="password" id="pass" name="pass" placeholder="<?=$auxca?>" value="" /><br />
			<input type="password" id="npass" name="npass" placeholder="<?=$auxnc?>" value="" />
			<input type="password" id="rnpass" name="rnpass" placeholder="<?=$auxrc?>" value="" /><br />
			<span name="BtSubmit" class="button"><?=$auxgua?></span>
			<div id="LbMessagemodpwd" style=" color: #E81F32;">
				<?=($_GET['cuenta']) == 'pwdno' ? '<p>Contraseña actual erronea!</p>' : '';?>
				<?=($_GET['cuenta']) == 'pwdok' ? '<p style=" color: #006614;">La contraseña se ha cambiado correctamente!</p>' : '';?>
                                <?=($_GET['cuenta']) == 'pwdnodp' ? '<p>Las nueva contraseña y su confirmación no coinciden!</p>' : '';?>
                                <?=($_GET['cuenta']) == 'pwdnoi' ? ' <p>Falta alguna casilla por rellenar!</p>' : '';?>
			</div>
		</form>
		<p><?=$auxcamb?></p><br />
		<form method="post" id="modema" name="modema" action="<?=$draizp?>/acc/cambiarema">
			<input type="text" id="email" name="email" placeholder="Correo Electrónico" value="<?=$usuario['email']?>" readonly /><br />
			<input type="text" id="nemail" name="nemail" placeholder="<?=$auxen?>" value="" />
			<input type="text" id="rnemail" name="rnemail" placeholder="<?=$auxre?>" value="" /><br />
			<input type="password" id="epass" name="epass" placeholder="<?=$auxcont?>" value="" /><br />
			<span name="BtSubmit" class="button"><?=$auxgua?></span>
			<div id="LbMessagemodema" style=" color: #E81F32;">
				<?=($_GET['cuenta']) == 'emano' ? '<p>Contraseña erronea!</p>' : '';?>
				<?=($_GET['cuenta']) == 'emaok' ? '<p style=" color: #006614;">La dirección email se ha cambiado correctamente!</p>' : '';?>
                                <?=($_GET['cuenta']) == 'emanodp' ? '<p>Las nuevas direcciones email no coinciden!</p>' : '';?>
                                <?=($_GET['cuenta']) == 'emanoi' ? '<p>Falta alguna casilla por rellenar!</p>' : '';?>
			</div>
		</form>
		<p><?=$auxmod?></p><br />
		<form method="post" id="moddat" name="moddat" action="<?=$draizp?>/acc/cambiardat">
                        <?php if($usuario['tipo_cliente'] == 'Empresa'){ ?><input type="text" class="dobleF" id="rsocial" name="rsocial" placeholder="Razón Social" value="<?=$usuario['RazonSocial']?>" /><br /><?php } ?>
			<input type="text" class="dobleF" id="nombre" name="nombre" placeholder="Nombre y Apellidos" value="<?=$usuario['nombre']?>" /><br />
			<input type="text" id="dni" name="dni" placeholder="<?=$auxdni?>" value="<?=$usuario['dni']?>" />
			<input type="text" id="telefono" name="telefono" placeholder="<?=$auxtlf?>" value="<?=$usuario['telefono']?>" /><br />
			<input type="text" class="dobleF" id="direccion" name="direccion" placeholder="<?=$auxdir?>" value="<?=$usuario['direccion']?>" /><br />
			<select id="pais" name="pais" required>
				<option value="" selected><?=$auxpa?></option>
				<?php
					foreach($paises as $pais)
						echo '<option'.($pais['id'] == $usuario['pais'] ? ' selected' : '').' value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
				?>
			</select>
			<select id="provincia" name="provincia" disabled required>
				<option value="" selected><?=$auxspa?></option>
			</select><br />
			<input type="text" id="localidad" name="localidad" placeholder="<?=$auxloc?>" value="<?=$usuario['poblacion']?>" />
			<input type="text" id="cp" name="cp" class="mitadF2" placeholder="<?=$auxcp?>" value="<?=$usuario['cp']?>" /><br />
			<input type="password" id="dpass" name="dpass" placeholder="<?=$auxcont?>" value="" /><br /><br /><br />
			<span name="BtSubmit" class="button"><?=$auxgua?></span>
			<div id="LbMessagemoddat" style=" color: #E81F32;">
				<?=($_GET['cuenta']) == 'fatno' ? '<p>Contraseña erronea!</p>' : '';?>
				<?=($_GET['cuenta']) == 'fatok' ? '<p style=" color: #006614;">Los datos personales han sido modificados correctamente!</p>' : '';?>
                                <?=($_GET['cuenta']) == 'fatnoi' ? '<p>Falta alguna casilla por rellenar!</p>' : '';?>
			</div>
			<input type="hidden" id="idpro" name="idpro" value="<?=$usuario['provinciaid']?>" />
		</form>	
                
                <p><?=$auxmodDE?></p><br />
			<form method="post" id="moddate" name="moddate" action="<?=$draizp?>/acc/cambiardatenv">
				<input type="text" class="dobleF" id="nombre" name="nombre" placeholder="Nombre Completo" value="<?=$usuario['nombreE']?>" /><br />
				
                                <select id="paisE" name="paisE">
					<option value="">Pais</option>
					<?php
						foreach($paises as $provincia)
							if ($usuario['paisEnv'] == $provincia['id'])
								echo "<option selected value=".$provincia['id'].">".$provincia['nombre']."</option>";
							else
								echo "<option value=".$provincia['id'].">".$provincia['nombre']."</option>";
					?>
				</select>
				
                                <select id="provinciaE" name="provinciaE" disabled required>
                                    <option value="" selected><?=$auxspa?></option>
                                </select><br />
                                <input type="text" id="localidad" name="localidad" placeholder="Localidad" value="<?=$usuario['poblacionEnv']?>" />
				<input type="text" id="cp" name="cp" class="mitadF2" placeholder="C. Postal" value="<?=$usuario['cpEnv']?>" />
                                <br />
                                <input type="text" class="dobleF" id="direccion" name="direccion" placeholder="Dirección" value="<?=$usuario['direccionEnv']?>" /><br />
				<input type="password" id="depass" name="depass" placeholder="Contraseña" value="" /><br /><br /><br />
				<span name="BtSubmit" class="button">Guardar</span>
				<div id="LbMessagemoddate" style=" color: #E81F32;">
					<?=($_GET['cuenta']) == 'dateno' ? '<p>No se han podido actualizar los datos de envío!</p>' : '';?>
					<?=($_GET['cuenta']) == 'dateok' ? '<p style=" color: #006614;">Los datos de envío han sido modificados correctamente!</p>' : '';?>
				</div>
                                <input type="hidden" id="idpro2" name="idpro2" value="<?=$usuario['provinciaidEnv']?>" />
			</form>	
	</div>
</div>