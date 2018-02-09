<div id="LbMessagesigin" style=" color: #E81F32;">
    <?=($_GET['datos_personales']) == 'sad' ? '<p>E-mail ya registrado!</p>' : '';?>
    <?=($_GET['datos_personales']) == 'good' ? '<p style=" color: #006614;">Registro completado! Se ha enviado un correo de confirmación a su dirección de email.</p>' : '';?>
    <?=($_GET['datos_personales']) == 'ebad' ? '<p>Las direcciones de email no coinciden!</p>' : '';?>
    <?=($_GET['datos_personales']) == 'pbad' ? '<p>La contraseña y su confirmación no coinciden!</p>' : '';?>
    <?=($_GET['datos_personales']) == 'dbad' ? '<p>Falta algún dato por rellenar!</p>' : '';?>
    <?=($_GET['datos_personales']) == 'cbad' ? '<p>Tienes que aceptar la política de privacidad para poder registrarte!</p>' : '';?>
    <?=($_GET['registro']) == 'dni' ? '<p>'.$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'CIF' : $_SESSION['datosregistro']['tipoD'] == 'pass' ? 'Pasaporte' : $_SESSION['datosregistro']['tipoD'] == 'nres' ? 'NIE' : $_SESSION['datosregistro']['tipoD'] == 'otro' ? 'Documento' :'DNI' .' incorrecto!</p>' : '';?>
    
</div>
<script>
    jQuery(document).ready(function(){
        jQuery("#password").change(function() {
            jQuery(".repitePass").css("display","inherit");
        });    
        jQuery("#checkp").click(function(){
            if(jQuery("#dni").val() == '')
                jQuery("#msgInfo").css("display","none");
        });  
        
        jQuery(document).on("change", "#tipoC", function(){
            if(jQuery('input[name=tipoC]:checked').attr('value') == "Empresa"){
                jQuery(".particular-div").css("display","none");
                jQuery(".options").attr('class',"col-xs-12 options");
            }
            else{
                jQuery(".particular-div").css("display","inherit");
                jQuery(".options").attr('class',"col-xs-12 col-sm-6 options");
            }
        });
    });
    jQuery(document).on("change", "#pais", function(){
        if(jQuery("#pais").val() == 'ESP' || jQuery("#pais").val() == 'ESX' || jQuery("#pais").val() == 'AND'){
            jQuery("#cp").attr('pattern', '[0-9A-Z]{5}');
        }else{
            jQuery("#cp").removeAttr('pattern');
        }
    });
                                                                                            
</script>        
<form method="post" id="register_form_3" name="datosper" action="<?=$draizp?>/acc/pago" onsubmit="return activa2()" autocomplete="off">
    <h4>Rellena el siguiente formulario para tramitar la compra</h4>
    <div class="row">
        <div class="col-xs-12">
            <span id="emailinv" name="emailinv" style="display: none; color: red"><b>¡Correo electronico inválido!</b><br></span>
            <span id="yareg" name="yareg" style="display: none; color: red"><b>¡Correo electronico ya registrado!</b> Logeate <a href="cuenta">aquí</a><br></span>
            <span id="emailD" name="emailD" style="display: none; color: red"><b>¡Correos electronicos distintos!</b><br></span>
            <span id="passD" name="emailD" style="display: none; color: red"><b>¡Contraseñas distintas!</b></span>
        </div> 
        <div class="col-xs-12 col-sm-6">
            <label for="email">Email</label>
            <input type="email" class="movilbt" id="email" name="email" placeholder="Correo Electrónico" required value="<?=$_SESSION['datosregistro']['email']?>" onchange="activa2()">
            <span id="botoncitoCom" autocomplete="off"  class="btn btn-primary custom-btn">Comprobar Email</span>
        </div> 
        <div class="col-xs-12 col-sm-6">
            <label for="cemail" id="rEmailForm" style="visibility:hidden">Repetir email</label>
            <input type="email" autocomplete="off" class="movilbt" id="cemail" name="cemail" placeholder="Repite Correo Electrónico" required value="<?=$_SESSION['datosregistro']['cemail']?>" onchange="activa2()" style="visibility: hidden">
        </div> 
        <div class="col-xs-12 col-sm-6">
            <span style="visibility: hidden" id="botoncitoCof"  class="btn btn-primary custom-btn">Confirmar Email</span>
            <span id="PassO" name="PassO" style="display: none">
            <label for="cemail">Contraseña</label>
            <input type="password" class="movilbt" id="password" name="password" placeholder="Contraseña" required value="" onchange="activa2()">
            <span id="passCB" name="passCB" style="display: none">
        </div> 
        <div class="col-xs-12 col-sm-6 repitePass">
            <label for="rpassword">Repite Contraseña</label>
            <input type="password" id="rpassword" class="movilbt" name="rpassword" placeholder="Repite Contraseña" required value="" onchange="activa2()">
            <span id="botoncitoCofP" class="btn btn-primary custom-btn">Confirmar Pass</span></span>
        </div> 
        <div class="col-xs-12">
            <p>¿Ya tienes cuenta? <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cuenta/logcompra">Accede desde aquí!</a></p>
        </div>    
        <div id="msgInfo" class="col-xs-12" style="display: none">
            <span>Para continuar es necesario que acepte nuestra <?=$Empresa['condiciones'] == 1 ? '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/privacidad" target="_blank">Política de Privacidad</a>' : 'Política de Privacidad'?></span>
        </div>

        <div id="CondicionesAcep" class="col-xs-12" style="display: none">
            <input type="checkbox" id="checkp" name="checkp" value="" required onchange="activa2()">&nbsp;<span name="pcheckp">He leído y entiendo la <?=$Empresa['condiciones'] == 1 ? '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/privacidad" target="_blank">Política de Privacidad</a>' : 'Política de Privacidad'?></span>
        </div>
    </div>
    <div class="row" id="datosO" name="datosO" style="display: none">
        <div class="col-xs-12 col-sm-6 options">
            <input type="radio" id="tipoC" name="tipoC" value="Particular" checked="" onchange="activa2()"> Particular
            <input type="radio" id="tipoC" name="tipoC" value="Empresa" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'checked=""' : ''?> onchange="activa2()"> Empresa<br><br>
        </div>
        <div class="col-xs-12 col-sm-6 particular-div">
            <span id="particular" name="particular" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'style="display: none"' : 'style="display: block"'?>>
                <input type="radio" id="tipoD" name="tipoD" value="dni" checked="" onchange="activa2()"> DNI
                <input type="radio" id="tipoD" name="tipoD" value="pass" <?=$_SESSION['datosregistro']['tipoD'] == 'pass' ? 'checked=""' : ''?> onchange="activa2()"> Passaporte
                <input type="radio" id="tipoD" name="tipoD" value="nres" <?=$_SESSION['datosregistro']['tipoD'] == 'nres' ? 'checked=""' : ''?> onchange="activa2()"> NIE
                <input type="radio" id="tipoD" name="tipoD" value="otro" <?=$_SESSION['datosregistro']['tipoD'] == 'otro' ? 'checked=""' : ''?> onchange="activa2()"> Otro<br><br>
            </span>
        </div>
        <div class="col-xs-12 col-sm-4" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'style="display: block"' : 'style="display: none"'?>>    
            <span id="razons" name="razons" >
                <input type="text" class="movilbt" id="rsocial" name="rsocial" placeholder="Razón Social" value="<?=$_SESSION['datosregistro']['rsocial']?>" style="max-width: 544px;"/>
            </span>
        </div>
        <div class="col-xs-12 col-sm-4">
            <label for="dni">DNI</label>
            <input type="text" class="movilbt" id="dni" name="dni" placeholder="DNI" value="<?=$_SESSION['datosregistro']['dni']?>" required onchange="activa2()">
        </div>
        <div class="col-xs-12 col-sm-4">
            <label for="telefono">Teléfono</label>
            <input type="tel" class="movilbt" id="telefono" name="telefono" placeholder="Teléfono" required value="<?=$_SESSION['datosregistro']['telefono']?>" onchange="activa2()"/><br />
        </div>
        <div class="col-xs-12 col-sm-4">
            <label for="nombre">Nombre</label>
            <input type="text" class="movilbt" id="nombre" name="nombre" placeholder="Nombre" required value="<?=$_SESSION['datosregistro']['nombre']?>" onchange="activa2()">
        </div>
        <div class="col-xs-12 col-sm-6">
            <label for="apellidos">Apellidos</label>
            <input type="text" class="movilbt" id="apellidos" name="apellidos" placeholder="Apellidos" required value="<?=$_SESSION['datosregistro']['apellidos']?>" onchange="activa2()"><br />
        </div>
        <div class="col-xs-12 col-sm-6">
            <label for="direccion">Dirección</label>
            <input type="text" class="dobleF" id="direccion" name="direccion" placeholder="Dirección" required value="<?=$_SESSION['datosregistro']['direccion']?>" onchange="activa2()"><br />
        </div>
        <div class="col-xs-12 col-sm-3">
            <label for="pais">País</label>
            <select id="pais" class="movilbt" name="pais" required onchange="activa2()">
                <option value="" selected>País</option>
                <?php
                
                        foreach($paises as $pais){
                            if($_SESSION['datosregistro']['pais'] == $pais['id'])
                                echo '<option selected value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
                            else
                                echo '<option value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
                        }
                ?>
            </select>
        </div>
        <div class="col-xs-12 col-sm-3">
            <label for="provincia">Provincia</label>
            <select id="provincia" class="movilbt" name="provincia" disabled required onchange="activa2()">
                    <option value="" selected>Selecciona primero un país</option>
            </select>
        </div>
        <input type="hidden" id="idpro" name="idpro2" value="<?=$_SESSION['datosregistro']['provincia']?>" onchange="activa2()"/>
        
        <div class="col-xs-12 col-sm-3">
            <label for="localidad">Localidad</label>
            <input type="text" class="movilbt" id="localidad" name="localidad" placeholder="Localidad" value="<?=$_SESSION['datosregistro']['localidad']?>" required onchange="activa2()">
        </div>
        <div class="col-xs-12 col-sm-3">
            <label for="cp">Código Postal</label>
            <input type="text" class="movilbt" id="cp" name="cp" class="mitadF2" pattern="[0-9A-Z]{5}" placeholder="C. Postal" required value="<?=$_SESSION['datosregistro']['cp']?>" onchange="activa2()"><br />
        </div>
        <div class="col-xs-12 col-sm-6">
            <span id="cpEr" name="cpEr" style="display: none; color: red"><b>¡El código postal no pertenece a la provincia elegida!</b><br></span><br /><br />
        </div>
        <div class="col-xs-12 col-sm-6" id="LbMessagesigin" style=" color: #E81F32;">
            <?=($_GET['cuenta']) == 'sad' ? '<p>Ha ocurrido un problema con el registro, revisa los campos introducidos, y vuelve a intentarlo!</p>' : '';?>
            <?=($_GET['cuenta']) == 'good' ? '<p style=" color: #006614;">Registro completado! Se ha enviado un correo de confirmación a su dirección de email.</p>' : '';?>
        </div>
        <div class="col-xs-12">
            <span style="display: inline-block; color: #E81F32; font-style: italic;">Todos los campos son obligatorios!</span>
            <span id="dnierr" name="dnierr" style="display: none; color: red"><b>¡DNI inválido!</b><br></span>
        </div>
        <div class="col-xs-12">
            <span id="botoncitoCom22" class="button movilbt btn btn-primary custom-btn" style="float: right">Verificar Datos</span>
            <input type="submit" id="continuar" class="button2 movilbt btn btn-primary custom-btn" style="float: right; -webkit-appearance: none; display: none" value="Continuar" disabled="">
            <input type="hidden" name="registrar" value="1">
        </div>
    </div>
</form>