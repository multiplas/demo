<script>
    //&& comprobarDNI(document.getElementById("dni").value
function activa2(){
    var dev = false;
	if(document.getElementById("nombre").value != '' && document.getElementById("apellidos").value != '' && document.getElementById("dni").value != '' 
                && document.getElementById("telefono").value != '' && document.getElementById("direccion").value != '' && document.getElementById("pais").value != '' 
                && document.getElementById("provincia").value != '' && document.getElementById("localidad").value != '' && document.getElementById("cp").value != '' 
                && document.getElementById("email").value != '' && document.getElementById("cemail").value != '' && emailsIgu(document.getElementById("email").value, document.getElementById("cemail").value)
                && document.getElementById("password").value != '' && document.getElementById("rpassword").value != '' && document.getElementById("checkp").checked 
                && compruebaSiOK(document.getElementById("dni").value) && PassIgu(document.getElementById("password").value, document.getElementById("rpassword").value) && comprobarCP()){
		document.getElementById("continuar").disabled = false;
                document.getElementById("continuar").className = 'button';
                dev = true;
	}else{
		document.getElementById("continuar").disabled = true;
                document.getElementById("continuar").className = 'button2';
                dev = false;
	}
        return dev;
}
</script>
<script>
    var mensaje = false;
    
    $(document).on("change", "#cp", function(){  
        comprobarCP();
    });
    
    
    $(document).on("change", "#email", function(){  
        comprobar();
    });
    
    $(document).on("change", "#cemail", function(){  
        emailsIgu($("#cemail").val(), $("#email").val());
    });
    
    $(document).on("click", "#botoncitoCom", function(){  
        comprobar();
    });
    
    $(document).on("click", "#botoncitoCof", function(){  
        emailsIgu($("#cemail").val(), $("#email").val());
    });
    
    $(document).ready(function(){ 
        if($("#email").val() != '')
            emailsIgu($("#cemail").val(), $("#email").val());
    });
    
    $(document).on("change", "#rpassword", function(){  
        PassIgu($("#rpassword").val(), $("#password").val());
    });
    
    $(document).ready(function(){
        $("#password").keypress(function(){
            $("#passCB").attr('style', '');
        });
    });
    
    $(document).on("change", "#password", function(){  
        if($("#rpassword").val() != '')
            PassIgu($("#rpassword").val(), $("#password").val());
    });
    
    function emailsIgu($em1, $em2){
        var dev = true;
        if($em1 != $em2){
            $("#emailD").attr('style', 'display: block; color: red');
            $("#PassO").attr('style', 'display: none;');
            dev = false;
        }else{
            $("#emailD").attr('style', 'display: none; color: red');
            $("#PassO").attr('style', 'display: block;');
        }
        return dev;
    }
    
    function PassIgu($em1, $em2){
        var dev = true;
        if($em1 != $em2){
            $("#passD").attr('style', 'display: block; color: red');
            $("#CondicionesAcep").attr('style', 'display: none;');
            dev = false;
        }else{
            $("#passD").attr('style', 'display: none; color: red');
            $("#CondicionesAcep").attr('style', 'display: block;');
        }
        return dev;
    }
    
    function comprobar(){
        if($("#email").val() != ''){
            $.post("/ajax/registro.php", {mail: $("#email").val()}, function(respuesta){ 
                if(respuesta){
                    $("#botoncitoCof").attr('style', 'visibility: hidden;');
                    $("#emailinv").attr('style', 'display: none; color: red');
                    $("#yareg").attr('style', 'display: block; color: red');
                    $("#PassO").attr('style', 'display: none;');
                    $("#datosO").attr('style', 'display: none;');
                    $("#cemail").attr('style', 'visibility: hidden;');
                    $("#botoncitoCom").attr('style', '');
                }else{
                    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
                    if (regex.test($('#email').val().trim())) {
                        $("#yareg").attr('style', 'display: none; color: red');
                        $("#emailinv").attr('style', 'display: none; color: red');
                        //$("#PassO").attr('style', 'display: block;');
                        $("#botoncitoCom").attr('style', 'display: none;');
                        $("#botoncitoCof").attr('style', 'visibility: visible;');
                        $("#cemail").attr('style', 'visibility: visible;');
                        if($("#checkp").prop('checked')){
                            $("#datosO").attr('style', 'display: block;');
                        }
                    }else{
                        $("#botoncitoCof").attr('style', 'visibility: hidden;');
                        $("#emailinv").attr('style', 'display: block; color: red');
                        $("#yareg").attr('style', 'display: none; color: red');
                        $("#PassO").attr('style', 'display: none;');
                        $("#datosO").attr('style', 'display: none;');
                        $("#cemail").attr('style', 'visibility: hidden;');
                        $("#botoncitoCom").attr('style', '');
                    }
                }
            });
        }else{
            $("#botoncitoCof").attr('style', 'visibility: hidden;');
            $("#emailinv").attr('style', 'display: none; color: red');
            $("#yareg").attr('style', 'display: none; color: red');
            $("#PassO").attr('style', 'display: none;');
            $("#datosO").attr('style', 'display: none;');
            $("#cemail").attr('style', 'visibility: hidden;');
            $("#botoncitoCom").attr('style', '');
        }
    }
    
    function comprobarCP(callback){
        if($("#cp").val() != ''){
            if($("#provincia").val() != ''){
                $.ajaxSetup({async: false});
                $.post("/ajax/cp.php", {cp: $("#cp").val(), city: $("#provincia").val(), pais: $("#pais").val()}, function(respuesta){ 
                     if(respuesta){
                         $("#cpEr").attr('style', 'display: none; color: red');
                         mensaje = true;
                     }else{
                         $("#cpEr").attr('style', 'display: block; color: red');
                         mensaje = false;
                     }
                 });
                $.ajaxSetup({async: true});
            }
        }
        alert(mensaje);
        return mensaje;
    }
    
    $(document).on("change", "#checkp", function(){
        if($("#checkp").prop('checked')){
            $("#datosO").attr('style', 'display: block;');
        }else{
            $("#datosO").attr('style', 'display: none;');
        }
    });
    
    $(document).on("change", "#tipoC", function(){
        $("#dnierr").attr('style', 'display: none; color: red');
         switch($('input[name=tipoC]:checked').attr('value')){
           case 'Empresa': $("#particular").attr('style', 'display: none;');
                           $("#razons").attr('style', 'display: block;');
                           $("#dni").attr('placeholder', 'CIF');
                           comprobarCIF($("#dni").val());
               break;
           case 'Particular': $("#particular").attr('style', 'display: block;');
                              $("#razons").attr('style', 'display: none;');
                              switch($('input[name=tipoD]:checked').attr('value')){
                                    case 'dni': $("#dni").attr('placeholder', 'DNI');
                                                comprobarDNI($("#dni").val());
                                        break;
                                    case 'pass': $("#dni").attr('placeholder', 'Pasaporte');
                                                 comprobarPASS($("#dni").val());
                                        break;
                                    case 'nres': $("#dni").attr('placeholder', 'Nº Residente');
                                                 comprobarNIE($("#dni").val());
                                        break;
                                }
               break;
       }
    });
    
    $(document).on("change", "#tipoD", function(){
       $("#dnierr").attr('style', 'display: none; color: red');
       switch($('input[name=tipoD]:checked').attr('value')){
           case 'dni': $("#dni").attr('placeholder', 'DNI');
                       comprobarDNI($("#dni").val());
               break;
           case 'pass': $("#dni").attr('placeholder', 'Pasaporte');
                        comprobarPASS($("#dni").val());
               break;
           case 'nres': $("#dni").attr('placeholder', 'NIE');
                        comprobarNIE($("#dni").val());
               break;
       }
    });
    
    $(document).on("change", "#dni", function(){
         var dni = $("#dni").val();
         dni = dni.trim();
         dni = dni.replace(/[.*+?^${}()|[\]\\\-]/g,"");
         dni = dni.toUpperCase();
         $("#dni").val(dni);
         switch($('input[name=tipoC]:checked').attr('value')){
           case 'Empresa': comprobarCIF($("#dni").val());
               break;
           case 'Particular':
               switch($('input[name=tipoD]:checked').attr('value')){
                    case 'dni': comprobarDNI($("#dni").val());
                        break;
                    case 'pass': comprobarPASS($("#dni").val());
                        break;
                    case 'nres': comprobarNIE($("#dni").val());
                        break;
                }
               break;
       }    
    });
    
    function comprobarDNI(dni){
        var numero
        var letr
        var letra
        var expresion_regular_dni
        var dev = false;

        expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
        
        if(dni.length > 9){
            if(expresion_regular_dni.test (dni) == true){
               numero = dni.substr(0,dni.length-1);
               letr = dni.substr(dni.length-1,1);
               numero = numero % 23;
               letra='TRWAGMYFPDXBNJZSQVHLCKET';
               letra=letra.substring(numero,numero+1);
                if (letra!=letr.toUpperCase()){
                    $("#dnierr").html('<b>¡DNI erroneo!</b>');
                    $("#dnierr").attr('style', 'display: block; color: red');
                }else{
                    $("#dnierr").html('<b>¡DNI erroneo!</b>');
                    $("#dnierr").attr('style', 'display: none; color: red');
                    dev = true;
                }
            }
        }
        return dev;
    }
    
    function comprobarCIF(dni){
        var pares = 0;
        var impares = 0;
        var suma;
        var ultima;
        var unumero;
        var uletra = new Array("J", "A", "B", "C", "D", "E", "F", "G", "H", "I");
        var xxx;
        var dev = false;
        
        if(dni.length <= 9){
            dni = dni.toUpperCase();

            var regular = new RegExp(/^[ABCDEFGHKLMNPQS]\d\d\d\d\d\d\d[0-9,A-J]$/g);
            if (!regular.exec(dni)) dev = false;

            ultima = dni.substr(8,1);

            for (var cont = 1 ; cont < 7 ; cont ++){
                xxx = (2 * parseInt(dni.substr(cont++,1))).toString() + "0";
                impares += parseInt(xxx.substr(0,1)) + parseInt(xxx.substr(1,1));
                pares += parseInt(dni.substr(cont,1));
            }
            xxx = (2 * parseInt(dni.substr(cont,1))).toString() + "0";
            impares += parseInt(xxx.substr(0,1)) + parseInt(xxx.substr(1,1));

            suma = (pares + impares).toString();
            unumero = parseInt(suma.substr(suma.length - 1, 1));
            unumero = (10 - unumero).toString();
            if(unumero == 10) unumero = 0;

            if ((ultima == unumero) ||  (ultima == uletra[unumero])){
                dev = true;
                $("#dnierr").html('<b>¡CIF erroneo!</b>');
                $("#dnierr").attr('style', 'display: none; color: red');
            }else{
                dev = false; 
                $("#dnierr").html('<b>¡CIF erroneo!</b>');
                $("#dnierr").attr('style', 'display: block; color: red');
            }
        }
        return dev;
    }
    
    function comprobarPASS(dni){
        var dev = true;
        var regular = new RegExp(/^[\w]+$/);
           if (!regular.exec(dni)){ 
               dev = false;
               $("#dnierr").html('<b>¡Pasaporte erroneo!</b>');
               $("#dnierr").attr('style', 'display: block; color: red');
           }else{
               $("#dnierr").attr('style', 'display: none; color: red');
           }
           return dev;
    }
    
    function comprobarNIE(dni){
        var a=dni;		
	var temp=a.toUpperCase();
	var cadenadni="TRWAGMYFPDXBNJZSQVHLCKET";
	var v1 = new Array(0,2,4,6,8,1,3,5,7,9);
	var posicion=0;
	var letra=" ";
        var dev = true;
        $("#dnierr").attr('style', 'display: none; color: red');
        
        if(dni == '')
            return false;
	
	//Residente en España	
	if (a.length==9)
	{
		if (temp.substr(0,1)=="X")
		{
			var temp1=temp.substr(1,7);
 
			posicion = temp1 % 23; /*Resto de la division entre 23 es la posicion en la cadena*/
			letra = cadenadni.substring(posicion,posicion+1);
			if (!/^[A-Za-z0-9]{9}$/.test(temp))
			{ 
				dev = false;	
                                $("#dnierr").html('<b>¡NIE erroneo!</b>');
                                $("#dnierr").attr('style', 'display: block; color: red');
			}
			else
			{ 
				//Tiene los 9 dígitos, comprobamos si la letra esta bien
				var temp1=temp.substr(1,7);
				posicion = temp1 % 23; /*Resto de la division entre 23 es la posicion en la cadena*/
				letra = cadenadni.charAt(posicion);
				var letranie=temp.charAt(8);
				if (letra != letranie){			
					dev = false;
                                        $("#dnierr").html('<b>¡NIE erroneo!</b>');
                                        $("#dnierr").attr('style', 'display: block; color: red');
				}				
			}
		} else if (temp.substr(0,1)=="Y")
		{
			var temp1="1"+temp.substr(1,7);
 
			posicion = temp1 % 23; /*Resto de la division entre 23 es la posicion en la cadena*/
			letra = cadenadni.substring(posicion,posicion+1);
			if (!/^[A-Za-z0-9]{9}$/.test(temp))
			{ 
				dev = false;	
                                $("#dnierr").html('<b>¡NIE erroneo!</b>');
                                $("#dnierr").attr('style', 'display: block; color: red');
			}
			else
			{ 
				//Tiene los 9 dígitos, comprobamos si la letra esta bien
				var temp1="1"+temp.substr(1,7);
				posicion = temp1 % 23; /*Resto de la division entre 23 es la posicion en la cadena*/
				letra = cadenadni.charAt(posicion);
				var letranie=temp.charAt(8);
				if (letra != letranie){			
					dev = false;
                                        $("#dnierr").html('<b>¡NIE erroneo!</b>');
                                        $("#dnierr").attr('style', 'display: block; color: red');
				}				
			}
		} else if (temp.substr(0,1)=="Z")
		{
			var temp1="2"+temp.substr(1,7);
 
			posicion = temp1 % 23; /*Resto de la division entre 23 es la posicion en la cadena*/
			letra = cadenadni.substring(posicion,posicion+1);
			if (!/^[A-Za-z0-9]{9}$/.test(temp))
			{ 
				dev = false;	
                                $("#dnierr").html('<b>¡NIE erroneo!</b>');
                                $("#dnierr").attr('style', 'display: block; color: red');
			}
			else
			{ 
				//Tiene los 9 dígitos, comprobamos si la letra esta bien
				var temp1="2"+temp.substr(1,7);
				posicion = temp1 % 23; /*Resto de la division entre 23 es la posicion en la cadena*/
				letra = cadenadni.charAt(posicion);
				var letranie=temp.charAt(8);
				if (letra != letranie){			
					dev = false;
                                        $("#dnierr").html('<b>¡NIE erroneo!</b>');
                                        $("#dnierr").attr('style', 'display: block; color: red');
				}				
			}
		}
		else
		{
			dev = false;
                        $("#dnierr").html('<b>¡NIE erroneo!</b>');
                        $("#dnierr").attr('style', 'display: block; color: red');
		}		
	}else if (a.length==14){//14 caracteres, los 2 primeros letras
		var temp1=temp.substr(0,2);
		if (isAlphabetic(temp1)!=true)	
			{
                            dev = false;
                            $("#dnierr").html('<b>¡NIE erroneo!</b>');
                            $("#dnierr").attr('style', 'display: block; color: red');
			}
	}
	else
	{
			dev = false;
                        $("#dnierr").html('<b>¡NIE erroneo!</b>');
                        $("#dnierr").attr('style', 'display: block; color: red');
 
	}
        return dev;
    }
    
    function compruebaSiOK(dni){
        var dev = false;
        switch($('input[name=tipoC]:checked').attr('value')){
           case 'Empresa': dev = comprobarCIF($("#dni").val());
               break;
           case 'Particular': 
                              switch($('input[name=tipoD]:checked').attr('value')){
                                    case 'dni': dev = comprobarDNI($("#dni").val());
                                        break;
                                    case 'pass': dev = comprobarPASS($("#dni").val());
                                        break;
                                    case 'nres': dev = comprobarNIE($("#dni").val());
                                        break;
                                }
               break;
       }
       return dev;
    }
    
</script>
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
                     
                        <input type="text" id="email" name="email" placeholder="<?=$aux3?>" value="<?=$_SESSION['datosregistro']['email']?>"  onchange="activa2()"/>
                        <span id="botoncitoCom"  class="button">Comprobar Email</span>
                        <input type="text" id="cemail" name="cemail" placeholder="<?=$aux17?>" value="<?=$_SESSION['datosregistro']['cemail']?>"  onchange="activa2()" style="visibility: hidden"/>
                        <span style="visibility: hidden" id="botoncitoCof"  class="button">Confirmar Email</span><br />
                        <span id="PassO" name="PassO" style="display: none">
                            
                            <span id="passD" name="emailD" style="display: none; color: red"><b>¡Contraseñas distintas!</b><br></span>
                            <input type="password" id="password" name="password" placeholder="<?=$aux4?>" value=""  onchange="activa2()"/>
                            <span id="passCB" name="passCB" style="display: none"><input type="password" id="rpassword" name="rpassword" placeholder="<?=$aux16?>" value=""  onchange="activa2()"/>
                                <span id="botoncitoCofP"  class="button">Confirmar Pass</span></span>
                        <br><br>
                        
                        
                        <span id="CondicionesAcep" style="display: none">
                                <label><input type="checkbox" id="checkp" name="checkp" value="" onchange="activa2()"/>&nbsp;<span name="pcheckp">Acepto la <?=$Empresa['condiciones'] == 1 ? '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/privacidad" target="_blank">'.$aux19.'</a>' : $aux19?></span></label>
                        </span>
                        
                        <span id="datosO" name="datosO" style="display: none">
                        <input type="radio" id="tipoC" name="tipoC" value="Particular" checked=""> Particular
                        <input type="radio" id="tipoC" name="tipoC" value="Empresa" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'checked=""' : ''?>> Empresa<br><br>
                        <span id="particular" name="particular" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'style="display: none"' : 'style="display: block"'?>>
                            <input type="radio" id="tipoD" name="tipoD" value="dni" checked=""> DNI
                            <input type="radio" id="tipoD" name="tipoD" value="pass" <?=$_SESSION['datosregistro']['tipoD'] == 'pass' ? 'checked=""' : ''?>> Passaporte
                            <input type="radio" id="tipoD" name="tipoD" value="nres" <?=$_SESSION['datosregistro']['tipoD'] == 'nres' ? 'checked=""' : ''?>> NIE<br><br>
                        </span>
                        
                        <span id="razons" name="razons" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'style="display: block"' : 'style="display: none"'?>>
                            <input type="text" id="rsocial" name="rsocial" placeholder="Razón Social" value="<?=$_SESSION['datosregistro']['rsocial']?>" style="max-width: 544px;"/>
                        </span>
                        
                        <input type="text" id="dni" name="dni" placeholder="DNI" value="<?=$_SESSION['datosregistro']['dni']?>"  onchange="activa2()"/>
                        <input type="text" id="telefono" name="telefono" placeholder="<?=$aux10?>" value="<?=$_SESSION['datosregistro']['telefono']?>"  onchange="activa2()"/><br />
			<input type="text" id="nombre" name="nombre" placeholder="<?=$aux7?>" value="<?=$_SESSION['datosregistro']['nombre']?>"  onchange="activa2()"/>
			<input type="text" id="apellidos" name="apellidos" placeholder="<?=$aux8?>" value="<?=$_SESSION['datosregistro']['apellidos']?>"  onchange="activa2()"/><br />
			
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
			<select id="pais" name="pais" required onchange="activa2()">
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
			<select id="provincia" name="provincia" disabled required onchange="activa2()">
				<option value="" selected><?=$aux13?></option>
			</select><br />
                        <input type="hidden" id="idpro" name="idpro2" value="<?=$_SESSION['datosregistro']['provincia']?>" />
			<input type="text" id="localidad" name="localidad" placeholder="<?=$aux14?>" value="<?=$_SESSION['datosregistro']['localidad']?>"  onchange="activa2()"/>
			<input type="text" id="cp" name="cp" class="mitadF2" placeholder="<?=$aux15?>" value="<?=$_SESSION['datosregistro']['cp']?>" onchange="activa2()"/><br />
                        <span id="cpEr" name="cpEr" style="display: none; color: red"><b>¡El código postal no pertenece a la provincia elegida!</b><br></span>
                        <br /><br />
                        
                       
			
                        <input type="submit" id="continuar" name="BtSubmit" class="button2" disabled="" value="<?=$aux2?>">
                        </span>
                        </span>
                        
                        <b>¿Ya estas registrado?</b> Pincha <a href="cuenta">aquí</a> para acceder a tu cuenta.
			
		</form>
	</div>
</div>