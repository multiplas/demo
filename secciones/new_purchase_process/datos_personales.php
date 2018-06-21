<?php
/* this file Display all user info, pay methods, transfer services... */
 $mostraEnvio = MostrarEnvios($_SESSION['usr']['id']);
 include_once $draiz.'/sistema/mod_usuarios.php';

 if(!isset($usuario))
     $usuario = UserLoadData($_SESSION['usr']['id']);
 ?>

<script type="text/javascript">
    var cambiado = false; 
    var oldPorte = 0;
    var isFormValid = true;

    jQuery(window).on('load',function(){        
        var porteOriginal = parseFloat(jQuery('#nuevopenvio').val());
        jQuery('#nuevopenvio').val( jQuery('#nuevopenvio').val() - porteOriginal);      
        jQuery('#nuevotransp').val(jQuery('#nuevotransp2').val()); 

        jQuery( ".pay-form" ).click(function() {
            jQuery('#datosper :input').each(function(){
                if(jQuery.trim(jQuery(this).val()).length == 0){
                    jQuery(this).addClass("highlight");
                    isFormValid = false;
                }
                else{
                    jQuery(this).removeClass("highlight");
                }
            });            
            if(isFormValid == true){
                jQuery( "#pago-form" ).submit();
            }
        });

        jQuery('#pago-form').on('change', function(){
            jQuery('.pay-form').css('display', 'inherit');
        });

        jQuery( ".update-data" ).click(function() {            
                jQuery( "#datosper" ).submit();
        });

        jQuery(" .ultra-update-data").click(function(){
            isFormValid = true;
            jQuery('#datosper2 :input').each(function(){
                if(jQuery.trim(jQuery(this).val()).length == 0){
                    console.log(this);
                    jQuery(this).addClass("highlight");
                    isFormValid = false;
                }
                else{
                    jQuery(this).removeClass("highlight");
                }
            });              
            if(isFormValid == true)
            jQuery( "#datosper2" ).submit();
        });
        jQuery('#email2, #email').focusout(function(){
            if(jQuery('#email').val() != jQuery('#email2').val()){
                if(jQuery('#email').val() != '' && jQuery('#email2').val() != ''){
                    jQuery('#email').addClass("highlight");
                    jQuery('#email2').addClass("highlight");
                    jQuery('#email').removeClass("inputsuccess");
                    jQuery('#email2').removeClass("inputsuccess");
                    jQuery('#email2').val('');
                }
            }
            else{
                jQuery('#email').removeClass("highlight");
                jQuery('#email2').removeClass("highlight");
                jQuery('#email').addClass("inputsuccess");
                jQuery('#email2').addClass("inputsuccess");
            }
        });

        jQuery('input[type=radio][name=penvio]').change(function() {//Script para cambiar el precio total
            base = jQuery('#importeBase').val().replace(',','.');
            if(base == ''){
                base = jQuery('#base_helper').val().replace(',','.');
            }
            total = 0;
            base = parseFloat(base);
            porte = this.value.replace(',','.');
            porte = parseFloat(porte);
            porte = porte + porteOriginal;
            total = base + porte;
            total = (Math.round(total * 100 ) / 100).toFixed(2);
            if(porte == 0)
                jQuery('.portes-text').text('Gratis');
            else{
                jQuery('.portes-text').text(porte.toFixed(2) + ' €');
            }
            jQuery('#importeTotal').val(total);
            jQuery('#nuevopenvio').val(this.value);
            jQuery('.importe-total').text(total);
        });    
        setTimeout(checkVariable, 1000);
    });  

    function checkVariable() {
        if (jQuery('#importeBase').val() == '' && cambiado == false) {
            cambiado = true;
            jQuery('#importeBase').val(jQuery('#base_helper').val());            
        }
    }

    function cambTransp($id){
        document.getElementById("nuevotransp").value = $id;
    }
</script>

<?php
function saveCesta($datos_cesta, $usrID){
    global $dbi;
    for($i = 0 ; $i < count($datos_cesta); $i++){
        if(isset($datos_cesta[$i]['id']) && !empty($datos_cesta[$i]['id'])){
            $sql = "INSERT INTO bd_carrito(id, idusuario, idproducto, idcuotas, talla, fechas, extra, cantidad, personalizacion, pack, packid, fecha, afiliado) VALUES (null,$usrID,'".$datos_cesta[$i]['id']."','".$datos_cesta[$i]['cuota']."','".$datos_cesta[$i]['talla']."','".$datos_cesta[$i]['fechas']."','".$datos_cesta[$i]['extra']."','".$datos_cesta[$i]['cantidad']."','".$datos_cesta[$i]['personalizacion']."',0,null, NOW(),'".$datos_cesta[$i]['afiliado']."')";
            $query = mysqli_query($dbi, $sql );
        }
    }
}

?>
<?php
if(isset($_POST['updateUser']) && !empty($_POST['updateUser'])){
    global $dbi;
    $email = $_POST['emailUltra'];
    $query = mysqli_query($dbi, 'SELECT * FROM bd_users WHERE email = "'.$email.'"');
    $datos_cesta = $_SESSION['datos_cesta'];
    $nombre = $_POST['nombreEUltra'];
    $explode_mail = explode('@', $_POST['emailUltra']);
    $pass = $explode_mail[0].'4455';//Concateno el nombre del mail con el numero 4455        
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccionEUltra'];
    $dni = '';
    if(isset($_POST['dni']) && !empty($_POST['dni']))
        $dni = $_POST['dni'];
    $cp = $_POST['cpEUltra'];
    $localidad = $_POST['localidadEUltra'];
    $provincia = $_POST['provinciaEUltra'];
    $pais = $_POST['paisEUltra'];
    if(mysqli_num_rows($query) == 0){        
        UserSigIn($nombre, $pass, $email, $telefono, $direccion, $dni, $cp, $localidad, $provincia, $pais, '', '', '');//Registramos el usuario
        $query2 = mysqli_query($dbi, 'SELECT * FROM bd_users WHERE email = "'.$email.'"');
        $assoc = mysqli_fetch_assoc($query2);
        $usrID = $assoc['id'];
        saveCesta($datos_cesta, $usrID);//Necesito un helper para guardar la cesta...
    }
    else{
        $updateUser = mysqli_query($dbi, "UPDATE bd_users SET nombre= '$nombre', telefono= '$telefono',direccion='$direccion',cp='$cp',poblacion='$localidad',provincia='$provincia',pais='$pais',dni='$dni' WHERE email = '$email'");
    }
    $query2 = mysqli_query($dbi, 'SELECT * FROM bd_users WHERE email = "'.$email.'"');
    if(mysqli_num_rows($query2) == 1){//Cuando el usuario ya se ha registrado procedo a cargarlo
        $assoc = mysqli_fetch_assoc($query2);
        $usrID = $assoc['id'];
        $usuario = UserLoadData($usrID);
        $factura = 0;//por defecto 0, es decir sin check
        if(isset($_POST['quierofactura']))
            $factura = $_POST['quierofactura'];
        $_SESSION['usr'] = $usuario;
        $_SESSION['compra']['entrega']['nombre'] = $usuario['nombre'];
        $_SESSION['compra']['entrega']['dni'] = $usuario['dni'];
        $_SESSION['compra']['entrega']['telefono'] = $usuario['telefono'];
        $_SESSION['compra']['entrega']['email'] = $usuario['email'];
        $_SESSION['compra']['entrega']['direccion'] = $usuario['direccion'];
        $_SESSION['compra']['entrega']['pais'] =  Pais($usuario['pais']);
        $_SESSION['compra']['entrega']['provincia'] = $usuario['provincia'];
        $_SESSION['compra']['entrega']['paisid'] = $usuario['pais'];
        $_SESSION['compra']['entrega']['provinciaid'] = $usuario['provinciaid'];
        $_SESSION['compra']['entrega']['localidad'] = $usuario['poblacion'];
        $_SESSION['compra']['entrega']['cp'] = $usuario['cp'];
        $_SESSION['compra']['entrega']['nombreE'] = $usuario['nombre'];
        $_SESSION['compra']['entrega']['direccionE'] = $usuario['direccion'];
        $_SESSION['compra']['entrega']['paisE'] = $usuario['pais'];
        $_SESSION['compra']['entrega']['direccionE'] = $usuario['direccion'];
        $_SESSION['compra']['entrega']['paisE'] = Pais($usuario['pais']);
        $_SESSION['compra']['entrega']['provinciaE'] = $usuario['provincia'];
        $_SESSION['compra']['entrega']['paisidE'] = $usuario['pais'];
        $_SESSION['compra']['entrega']['localidadE'] = $usuario['poblacion'];
        $_SESSION['compra']['entrega']['cpE'] = $usuario['cpEnv'];
        $_SESSION['compra']['entrega']['provinciaidE'] = $usuario['provinciaid'];
        $_SESSION['compra']['entrega']['factura'] = $factura;
        $_SESSION['usr']['paisEnv'] = $usuario['pais'];
    }    
}

if(isset($_POST['checksubs'])){
    $getSub = mysqli_query($dbi, "SELECT * FROM bd_suscriptores WHERE email = '".$_SESSION['compra']['entrega']['email']."'");
    if(mysqli_num_rows($getSub) == 0){//No estaba suscrito ya
        $sqlSub = "INSERT INTO bd_suscriptores (nombre, email) VALUES ('".$_SESSION['compra']['entrega']['nombre']."', '".$_SESSION['compra']['entrega']['email']."');";
        $addSub = mysqli_query($dbi, $sqlSub);
    }  
    $userFinded = mysqli_fetch_assoc($getSub);
}

if(empty($_SESSION['compra']['entrega']['direccion']) && isset($_SESSION['usr'])){//Inicializar los valores de entrega a los de facturacion por defecto
    $_SESSION['compra']['entrega']['nombre'] = $_SESSION['usr']['nombre'];
    $_SESSION['compra']['entrega']['dni'] = $_SESSION['usr']['dni'];
    $_SESSION['compra']['entrega']['telefono'] = $_SESSION['usr']['telefono'];
    $_SESSION['compra']['entrega']['email'] = $_SESSION['usr']['email'];
    $_SESSION['compra']['entrega']['direccion'] = $_SESSION['usr']['direccion'];
    $_SESSION['compra']['entrega']['pais'] =  Pais($_SESSION['usr']['pais']);
    $_SESSION['compra']['entrega']['provincia'] = $_SESSION['usr']['provincia'];
    $_SESSION['compra']['entrega']['paisid'] = $_SESSION['usr']['pais'];
    $_SESSION['compra']['entrega']['provinciaid'] = $_SESSION['usr']['provinciaid'];
    $_SESSION['compra']['entrega']['localidad'] = $_SESSION['usr']['poblacion'];
    $_SESSION['compra']['entrega']['cp'] = $_SESSION['usr']['cp'];
    $_SESSION['compra']['entrega']['nombreE'] = $_SESSION['usr']['nombre'];
    $_SESSION['compra']['entrega']['direccionE'] = $_SESSION['usr']['direccion'];
    $_SESSION['compra']['entrega']['paisE'] = $_SESSION['usr']['pais'];
    $_SESSION['compra']['entrega']['direccionE'] = $_SESSION['usr']['direccion'];
    $_SESSION['compra']['entrega']['paisE'] = Pais($_SESSION['usr']['pais']);
    $_SESSION['compra']['entrega']['provinciaE'] = $_SESSION['usr']['provincia'];
    $_SESSION['compra']['entrega']['paisidE'] = $_SESSION['usr']['pais'];
    $_SESSION['compra']['entrega']['localidadE'] = $_SESSION['usr']['poblacion'];
    $_SESSION['compra']['entrega']['cpE'] = $_SESSION['usr']['cpEnv'];
    $_SESSION['compra']['entrega']['provinciaidE'] = $_SESSION['usr']['provinciaid'];
    $_SESSION['compra']['entrega']['factura'] = $factura;
    $_SESSION['usr']['paisEnv'] = $_SESSION['usr']['pais'];
}

?>

<div class="container-fluid">
    <?php   if($purchase_process_type != 4 && $purchase_process_type != 5): ?>
    <form method="post" id="datosper" name="datosper" action="<?=$draizp?>/acc/pago">
        
        <div class="col-xs-12 col-sm-offset-1 col-sm-5 datos-personales-izquierda">
            <div class="row">
                <div class="form-group">
                    <h4><?=$auxdc?></h4>   
                    <div class="row datos-contacto">
                        <div class="col-sm-6">
                            <label for="email">Correo electrónico</label>
                            <input type="text" class="form-control" id="email" name="email" disabled class="dobleF" placeholder="Correo Electrónico" value="<?=$_SESSION['usr']['email']?>"/>       
                        </div>
                        <div class="col-sm-6">
                            <label for="telefono">Teléfono</label>
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="<?=$_SESSION['usr']['telefono']?>" />
                        </div>
                    </div>
                    <h4><?=$auxdp?></h4>
                    <div class="row datos-personales">
                        <?php if($_SESSION['usr']['RazonSocial'] != ''){ ?>
                                <label for="rsocial">Razón social</label>
                                <input type="text" class="form-control" id="rsocial" name="rsocial" placeholder="Razon Social" value="<?=$_SESSION['usr']['RazonSocial']?>" class="dobleF" disabled="">
                        <?php } ?>
                        <div class="col-sm-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre *" value="<?=$_SESSION['usr']['nombre']?>">
                        </div>
                        <div class="col-sm-6">
                            <label for="dni">DNI/CIF</label>
                            <input type="text" class="form-control" id="dni" name="dni" placeholder="DNI *" value="<?=$_SESSION['usr']['dni']?>" />
                        </div>
                    </div>
                    <h4><?=$auxde?></h4>
                    <div class="row datos-facturacion">
                        <div class="col-xs-12">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" required name="direccion" placeholder="Dirección *" value="<?=$_SESSION['usr']['direccion']?>" />
                        </div>
                        <div class="col-sm-4">
                            <label for="pais">País</label>
                            <select class="form-control" id="pais" name="pais" required>
                            <option value="" selected>País</option>
                            <?php
                            foreach($paises as $pais)
                            echo '<option'.($pais['id'] == $_SESSION['usr']['pais'] ? ' selected' : '').' value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
                            ?>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="provincia">Provincia</label>
                            <select id="provincia" name="provincia" required>
                            <option value="" selected>Selecciona primero un país</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="cp">Código Postal</label>
                            <input type="text" id="cp" name="cp" class="form-control" required placeholder="C. Postal *" value="<?=$_SESSION['usr']['cp']?>" />
                        </div>
                        <div class="col-xs-12">
                            <label for="localidad">Localidad</label>
                            <input type="text" class="form-control" id="localidad" name="localidad" required placeholder="Localidad *" value="<?=$_SESSION['usr']['poblacion']?>" />
                        </div>
                        <input type="hidden" id="idpro" name="idpro" value="<?=$_SESSION['usr']['provinciaid']?>" />
                        <span style="display: <?=$mostraEnvio ? 'block' : 'none'?>">
                    </div>
                    <h4><?=$auxdentre?></h4>
                    <div class="row datos-entrega">
                        <div class="col-xs-12">
                            <label for="nombreE">Nombre</label>
                            <input type="text" id="nombreE" name="nombreE" placeholder="Nombre" value="<?=$_SESSION['compra']['entrega']['nombreE']?>">
                        </div>
                        <div class="col-xs-12">
                            <label for="direccionE">Dirección</label>
                            <input type="text" class="" id="direccionE" name="direccionE" placeholder="Dirección *" value="<?=$_SESSION['compra']['entrega']['direccionE']?>" />
                        </div>
                        <div class="col-sm-4">
                            <label for="paisE">País</label>
                            <select id="paisE" name="paisE" required>
                            <option value="" selected>País</option>
                            
                            <?php
                            foreach($paises as $pais)
                            echo '<option'.($pais['nombre'] == $_SESSION['compra']['entrega']['paisE'] ? ' selected' : '').' value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
                            ?>
                            </select> 
                        </div>
                        <div class="col-sm-4">
                            <label for="provinciaE">Provincia</label>
                            <select id="provinciaE" name="provinciaE" required>
                            <option value="" selected>Selecciona primero un país</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label for="cpE">Código Postal</label>
                            <input type="text" id="cpE" name="cpE" placeholder="C. Postal *" value="<?=$_SESSION['compra']['entrega']['cpE']?>" />
                        </div>
                        <div class="col-xs-12">
                            <label for="localidadE">Localidad</label>
                            <input type="text" id="localidadE" name="localidadE" placeholder="Localidad *" value="<?=$_SESSION['compra']['entrega']['localidadE']?>" />
                        </div>
                    </div>
                    <input type="hidden" id="idpro2" name="idpro2" value="<?=$_SESSION['compra']['entrega']['provinciaidE']?>" />  
                    </span>
                    <h5 style="display: inline-block; color: #E81F32; font-style: italic;"><?=$auxcam?></h5>
                </div>
            </div>
        </div>   
        </form>
        <?php else: ?>
        <form method="post" id="datosper2" name="datosper2" action="">
            <input type="hidden" name="updateUser" value="1">
        <div class="col-xs-12 col-sm-offset-1 col-sm-5 datos-personales-izquierda">
            <div class="row">
                <div class="form-group">                                    
                    <h4><?=$auxdentre?></h4>
                    <div class="row datos-entrega">
                        <div class="col-xs-12">
                            <label for="email">Correo electrónico</label>
                            <input type="text" class="form-control" id="email" name="emailUltra" class="dobleF" placeholder="Correo Electrónico *" value="<?=$_SESSION['usr']['email']?>" required/>       
                        </div>
                        <div class="col-xs-12">
                            <label for="email">Repite Correo electrónico</label>
                            <input type="text" class="form-control" id="email2" name="emailUltra2" class="dobleF" placeholder="Correo Electrónico *" value="<?=$_SESSION['usr']['email']?>" required/>       
                        </div>

                        <div class="col-xs-6">
                            <label for="nombreE">Nombre y Apellidos</label>
                            <input type="text" id="nombreE" name="nombreEUltra" placeholder="Nombre y Apellidos *" value="<?=$_SESSION['compra']['entrega']['nombreE']?>" required>
                        </div>
                        <div class="col-xs-6">
                            <label for="telefono">Telefono</label>
                            <input type="text" id="telefono" name="telefono" placeholder="Telefono *" value="<?=$_SESSION['usr']['telefono']?>" required>
                        </div>
                        <div class="col-xs-12">
                        <label for="direccionE">Dirección</label>
                        <input type="text" class="" id="direccionE" name="direccionEUltra" placeholder="Dirección *" value="<?=$_SESSION['compra']['entrega']['direccionE']?>" />
                    </div>
                    <div class="col-sm-4">
                        <label for="paisE">País</label>
                        <select id="paisE" name="paisEUltra" required>
                        <option value="" selected>País</option>
                        
                        <?php
                        foreach($paises as $pais)
                        echo '<option'.($pais['nombre'] == $_SESSION['compra']['entrega']['paisE'] ? ' selected' : '').' value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
                        ?>
                        </select> 
                    </div>
                    <div class="col-sm-4">
                        <label for="provinciaE">Provincia</label>
                        <select id="provinciaE" name="provinciaEUltra" required>
                        <option value="" selected>Selecciona primero un país</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label for="cpE">Código Postal</label>
                        <input type="text" id="cpE" name="cpEUltra" placeholder="C. Postal *" value="<?=$_SESSION['compra']['entrega']['cpE']?>" />
                    </div>
                    <div class="col-xs-12">
                        <label for="localidadE">Localidad</label>
                        <input type="text" id="localidadE" name="localidadEUltra" placeholder="Localidad *" value="<?=$_SESSION['compra']['entrega']['localidadE']?>" />
                    </div>
                <?php if($purchase_process_type == 5){ //Lo guardo como valor DNI ?>
                    <div class="col-xs-12">
                        <label for="dni">CIF</label>
                        <input type="text" id="dni" name="dni" placeholder="CIF *" value="<?=$_SESSION['compra']['entrega']['dni']?>" />
                    </div>
                    <div class="col-xs-12">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="quierofactura" id="quierofactura" <?php if(isset($_SESSION['compra']['entrega']['factura']) && $_SESSION['compra']['entrega']['factura'] == 1)echo 'checked' ?>>                    
                            Quiero factura
                        </div>
                    </div>
                <?php } ?>
                </div>
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" name="checksubs" id="checksubs" <?php echo 'checked' ?>>                    
                        Quiero recibir noticias y ofertas exclusivas
                    </div>
                </div>
                    <?php if(isset($_SESSION['usr'])): ?>
                    <input type="hidden" id="idpro2" name="idpro2" value="<?=$_SESSION['compra']['entrega']['provinciaidE']?>" />  
                    <?php endif; ?>
                    </span>
                    <h5 style="display: inline-block; color: #E81F32; font-style: italic;"><?=$auxcam?></h5>
                </div>
            </div>
        </div>   
        </form>
        <?php endif; ?>

        <div class="col-xs-12 col-sm-5 datos-personales-derecha">
            <?php           
                include_once 'total_calculate_helper.php';

                if (isset($_POST['prm']) && $_POST['prm'] == 1){//Aplicamos el codigo promocional
                    $_SESSION['compra']['codpromo'] = $_POST['codpromo'];
                }
                elseif(isset($_POST['prm']) && $_POST['prm'] == 2){
                    $_SESSION['compra']['codpromo'] = '';
                }
                elseif(isset($_POST['prm']) && $_POST['prm'] == 3){
                    evaluateDataFiles();
                }

                total_calculate_helper($draizp);
            ?>
        </div>
    </div>

<hr>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-offset-1 col-sm-10">
            <div class="col-xs-4 col-sm-4">
                <span id="BtSubmit" type="submit" class="btn btn-primary custom-btn" onclick="location.href='<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta';"><?=$auxvol?></span>
            </div>
            <?php   if($purchase_process_type != 4  && $purchase_process_type != 5): ?>
            <div class="col-xs-4 col-sm-4">
                <span class="btn btn-primary custom-btn update-data">Actualizar datos</span>
            </div>
            <?php else: ?>
            <div class="col-xs-4 col-sm-4">
                <span class="btn btn-primary custom-btn ultra-update-data">Continuar ></span>
            </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['usr'])): ?>
            <div class="col-xs-4 col-sm-4">
                <span class="btn btn-primary custom-btn pay-form" style="float: right; display:none;">Pagar y finalizar el pedido</span>
            </div>
            <?php else: ?>
            <div class="col-xs-4 col-sm-4">
                <span class="btn btn-primary custom-btn pay-form" style="float: right; display:none;" disabled>Pagar y finalizar el pedido</span><br>
                <small>Es necesario actualizar los datos de envio.</small>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>