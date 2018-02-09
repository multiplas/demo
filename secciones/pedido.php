<script>

function activa(){
	if(document.getElementById("pagarcon").value != ''){
            if(document.getElementById("pagarcon").value != 'dom' && document.getElementById("pagarcon").value != 'tpv' && document.getElementById("pagarcon").value != 'fdir'
                    && document.getElementById("pagarcon").value != 'domm'){
		document.getElementById("BtSubmit").disabled = false;
                document.getElementById("BtSubmit").className = 'button';
            }else{
                var ncuentaC = document.getElementById("entidad").value + document.getElementById("oficina").value + document.getElementById("dc").value + document.getElementById("ccc").value + document.getElementById("ccc2").value;
                var iban = document.getElementById("iban").value;
                if(document.getElementById("nentidad").value != '' && document.getElementById("iban").value != '' && document.getElementById("entidad").value != '' 
                        && document.getElementById("oficina").value != '' && document.getElementById("dc").value != '' && document.getElementById("ccc").value != ''
                         && document.getElementById("ccc2").value != '' && document.getElementById("pagarcon").value != 'tpv' && compruebaIBAN(iban, ncuentaC)){
                    document.getElementById("BtSubmit").disabled = false;
                    document.getElementById("BtSubmit").className = 'button';
                }else if(document.getElementById("nombre").value != '' && document.getElementById("numero").value != '' && document.getElementById("fecha").value != '' 
                        && document.getElementById("cvc").value != '' && document.getElementById("pagarcon").value == 'tpv'){
                    document.getElementById("BtSubmit").disabled = false;
                    document.getElementById("BtSubmit").className = 'button';
                }else{
                    document.getElementById("BtSubmit").disabled = true;
                    document.getElementById("BtSubmit").className = 'button2';
                }
            }
	}else{
		document.getElementById("BtSubmit").disabled = true;
                document.getElementById("BtSubmit").className = 'button2';
	}
}
function activa2(){
    var dev = false;
	if(document.getElementById("email").value != '' && document.getElementById("cemail").value != '' && emailsIgu(document.getElementById("email").value, document.getElementById("cemail").value)
                && document.getElementById("nombre").value != '' && document.getElementById("apellidos").value != '' && document.getElementById("dni").value != '' 
                && document.getElementById("telefono").value != '' && document.getElementById("direccion").value != '' && document.getElementById("pais").value != '' 
                && document.getElementById("provincia").value != '' && document.getElementById("localidad").value != '' && document.getElementById("cp").value != ''
                && document.getElementById("password").value != '' && document.getElementById("rpassword").value != '' && document.getElementById("checkp").checked 
                && compruebaSiOK(document.getElementById("dni").value) && PassIgu(document.getElementById("password").value, document.getElementById("rpassword").value) && comprobarCP()){
		jQuery("#botoncitoCom22").attr('style', 'display: none');
                jQuery("#nombre").attr('style', '');
                jQuery("#apellidos").attr('style', '');
                jQuery("#telefono").attr('style', 'border-width: 1px;');
                jQuery("#direccion").attr('style', '');
                jQuery("#pais").attr('style', '');
                jQuery("#provincia").attr('style', '');
                jQuery("#localidad").attr('style', '');
                document.getElementById("continuar").disabled = false;
                jQuery("#continuar").attr('style', 'float: right; -webkit-appearance: none; display: block');
                document.getElementById("continuar").className = 'button movilbt';
                dev = true;
	}else{
		document.getElementById("continuar").disabled = true;
                document.getElementById("continuar").className = 'button2';
                jQuery("#continuar").attr('style', 'display: none; float: right; -webkit-appearance: none;');
                jQuery("#botoncitoCom22").attr('style', 'float: right;');
                dev = false;
	}
        return dev;
}

function compruebaIBAN(iban, ncuenta){
    var dev = false; 
    var ccc = iban + ncuenta;
    dev = fn_ValidateIBAN(ccc);
    if(dev)
        dev = validaCCC(ncuenta);
    if(document.getElementById("nentidad").value != '' && document.getElementById("iban").value != '' && document.getElementById("entidad").value != '' 
                        && document.getElementById("oficina").value != '' && document.getElementById("dc").value != '' && !dev){
        jQuery("#ncuentaEr").attr('style', 'display: block; color: red');
    }else{
        jQuery("#ncuentaEr").attr('style', 'display: none; color: red');
    }
    return dev;
}

function fn_ValidateIBAN(IBAN) {
    //Se pasa a Mayusculas
    IBAN = IBAN.toUpperCase();
    //Se quita los blancos de principio y final.
    IBAN = IBAN.trim();
    IBAN = IBAN.replace(/\s/g, ""); //Y se quita los espacios en blanco dentro de la cadena
    
    var letra1,letra2,num1,num2;
    var isbanaux;
    var numeroSustitucion;
    //La longitud debe ser siempre de 24 caracteres
    if (IBAN.length != 24) {
        return false;
    }

    // Se coge las primeras dos letras y se pasan a números
    letra1 = IBAN.substring(0, 1);
    letra2 = IBAN.substring(1, 2);
    num1 = getnumIBAN(letra1);
    num2 = getnumIBAN(letra2);
    //Se sustituye las letras por números.
    isbanaux = String(num1) + String(num2) + IBAN.substring(2);
    // Se mueve los 6 primeros caracteres al final de la cadena.
    isbanaux = isbanaux.substring(6) + isbanaux.substring(0,6);

    //Se calcula el resto, llamando a la función modulo97, definida más abajo
    resto = modulo97(isbanaux);
    if (resto == 1){
        return true;
    }else{
        return false;
    }
}

function modulo97(iban) {
    var parts = Math.ceil(iban.length/7);
    var remainer = "";

    for (var i = 1; i <= parts; i++) {
        remainer = String(parseFloat(remainer+iban.substr((i-1)*7, 7))%97);
    }

    return remainer;
}

function getnumIBAN(letra) {
    ls_letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return ls_letras.search(letra) + 10;
}

function validaCCC(val){
    var banco = val.substring(0,4);
    var sucursal = val.substring(4,8);
    var dc = val.substring(8,10);
    var cuenta=val.substring(10,20);
    var CCC = banco+sucursal+dc+cuenta;
    if (!/^[0-9]{20}$/.test(banco+sucursal+dc+cuenta)){
        return false;
    }
    else
    {
        valores = new Array(1, 2, 4, 8, 5, 10, 9, 7, 3, 6);
        control = 0;
        for (i=0; i<=9; i++)
        control += parseInt(cuenta.charAt(i)) * valores[i];
        control = 11 - (control % 11);
        if (control == 11) control = 0;
        else if (control == 10) control = 1;
        if(control!=parseInt(dc.charAt(1))) {
            return false;
        }
        control=0;
        var zbs="00"+banco+sucursal;
        for (i=0; i<=9; i++)
            control += parseInt(zbs.charAt(i)) * valores[i];
        control = 11 - (control % 11);
        if (control == 11) control = 0;
            else if (control == 10) control = 1;
        if(control!=parseInt(dc.charAt(0))) {
            return false;
        }
        return true;
    }
}


jQuery(document).on("click", "#botoncitoCom22", function(){
        if(document.getElementById("nombre").value == ''){
            jQuery("#nombre").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
        }else{
            jQuery("#nombre").attr('style', '');
        }
        
        if(document.getElementById("apellidos").value == ''){
            jQuery("#apellidos").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
        }else{
            jQuery("#apellidos").attr('style', '');
        }
        
        if(document.getElementById("dni").value == ''){
             jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
        }else{
            var dni = jQuery("#dni").val();
            dni = dni.trim();
            dni = dni.replace(/[.*+?^${}()|[\]\\\-]/g,"");
            dni = dni.toUpperCase();
            jQuery("#dni").val(dni);
            switch(jQuery('input[name=tipoC]:checked').attr('value')){
              case 'Empresa': comprobarCIF(jQuery("#dni").val());
                  break;
              case 'Particular':
                  switch(jQuery('input[name=tipoD]:checked').attr('value')){
                       case 'dni': comprobarDNI(jQuery("#dni").val());
                           break;
                       case 'pass': comprobarPASS(jQuery("#dni").val());
                           break;
                       case 'nres': comprobarNIE(jQuery("#dni").val());
                           break;
                       case 'otro': true;
                           break;
                   }
                  break;
          }    
        }
        
        if(document.getElementById("telefono").value == ''){
            jQuery("#telefono").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
        }else{
            jQuery("#telefono").attr('style', 'border-width: 1px;');
        }
        
        if(document.getElementById("direccion").value == ''){
            jQuery("#direccion").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
        }else{
            jQuery("#direccion").attr('style', '');
        }
        
        if(document.getElementById("pais").value == ''){
            jQuery("#pais").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
        }else{
            jQuery("#pais").attr('style', '');
        }
        
        if(document.getElementById("provincia").value == ''){
            jQuery("#provincia").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
        }else{
            jQuery("#provincia").attr('style', '');
        }
        
        if(document.getElementById("localidad").value == ''){
            jQuery("#localidad").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
        }else{
            jQuery("#localidad").attr('style', '');
        }
        
        if(document.getElementById("cp").value == ''){
            jQuery("#cp").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
        }else{
            comprobarCP();
        }
    });
</script>

<script>
    var mensaje = false;
    
    jQuery(document).on("change", "#cp", function(){  
        comprobarCP();
    });
    
    jQuery(document).on("change", "#email", function(){  
        comprobar();
    });
    
    jQuery(document).on("change", "#cemail", function(){  
        emailsIgu(jQuery("#cemail").val(), jQuery("#email").val());
    });
    
    jQuery(document).on("click", "#botoncitoCom", function(){  
        comprobar();
    });
    
    jQuery(document).on("click", "#botoncitoCof", function(){  
        emailsIgu(jQuery("#cemail").val(), jQuery("#email").val());
    });
    
    jQuery(document).on("click", "#botoncitoCofP", function(){  
        PassIgu(jQuery("#rpassword").val(), jQuery("#password").val());
    });
    
    jQuery(document).ready(function(){ 
        if(jQuery("#email").val() != '' && jQuery("#cemail").val() != '')
            emailsIgu(jQuery("#cemail").val(), jQuery("#email").val());
    });
    
    jQuery(document).on("change", "#rpassword", function(){  
        PassIgu(jQuery("#rpassword").val(), jQuery("#password").val());
    });
    
    jQuery(document).ready(function(){
        jQuery("#password").keypress(function(){
            jQuery("#passCB").attr('style', '');
        });
    });
    
    jQuery(document).on("change", "#password", function(){
        if(jQuery("#password").val() != '')
            jQuery("#passCB").attr('style', '');
        if(jQuery("#rpassword").val() != '')
            PassIgu(jQuery("#rpassword").val(), jQuery("#password").val());
    });
    
    function emailsIgu($em1, $em2){
        var dev = true;
        if(typeof $em1 != 'undefined')
        if($em1.trim() != '' && $em2.trim() != ''){
            if($em1.trim() != $em2.trim()){
                jQuery("#emailD").attr('style', 'display: block; color: red');
                jQuery("#PassO").attr('style', 'display: none;');
                jQuery("#botoncitoCof").attr('style', '');
                dev = false;
            }else{
                jQuery("#emailD").attr('style', 'display: none; color: red');
                jQuery("#PassO").attr('style', 'display: block;');
                jQuery("#botoncitoCof").attr('style', 'display: none;');
                jQuery.post("<?=$draizp?>/ajax/mail.php", {mail: $em1}, function(){});
            }
        }
        return dev;
    }
    
    function PassIgu($em1, $em2){
        var dev = true;
        if($em1.trim() != '' && $em2.trim() != ''){
            if($em1 != $em2){
                jQuery("#passD").attr('style', 'display: block; color: red');
                jQuery("#CondicionesAcep").attr('style', 'display: none;');
                jQuery("#botoncitoCofP").attr('style', '');
                dev = false;
            }else{
                jQuery("#passD").attr('style', 'display: none; color: red');
                jQuery("#CondicionesAcep").attr('style', 'display: block;');
                jQuery("#botoncitoCofP").attr('style', 'display: none;');
                if(document.getElementById("msgInfo") != null){
                    jQuery("#msgInfo").css("display","inherit");
                }
            }
        }
        return dev;
    }
    
    function comprobar(){
        if(jQuery("#email").val() != ''){
            jQuery.post("<?=$draizp?>/ajax/registro.php", {mail: jQuery("#email").val()}, function(respuesta){ 
                if(respuesta.trim() == 'true'){
                    jQuery("#botoncitoCof").attr('style', 'visibility: hidden;');
                    jQuery("#emailinv").attr('style', 'display: none; color: red');
                    jQuery("#yareg").attr('style', 'display: block; color: red');
                    jQuery("#PassO").attr('style', 'display: none;');
                    jQuery("#datosO").attr('style', 'display: none;');
                    jQuery("#cemail").attr('style', 'visibility: hidden;');
                    jQuery("#rEmailForm").attr('style', 'visibility: hidden;');
                    jQuery("#botoncitoCom").attr('style', '');
                }else{
                    var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
                    if (regex.test(jQuery('#email').val().trim())) {
                        jQuery("#yareg").attr('style', 'display: none; color: red');
                        jQuery("#emailinv").attr('style', 'display: none; color: red');
                        //jQuery("#PassO").attr('style', 'display: block;');
                        jQuery("#botoncitoCom").attr('style', 'display: none;');
                        jQuery("#botoncitoCof").attr('style', 'visibility: visible;');
                        jQuery("#cemail").attr('style', 'visibility: visible;');
                        jQuery("#rEmailForm").attr('style', 'visibility: visible;');                        
                        if(jQuery("#checkp").prop('checked')){
                        jQuery("#datosO").attr('style', 'display: block;');
                        }
                    }else{
                        jQuery("#botoncitoCof").attr('style', 'visibility: hidden;');
                        jQuery("#emailinv").attr('style', 'display: block; color: red');
                        jQuery("#yareg").attr('style', 'display: none; color: red');
                        jQuery("#PassO").attr('style', 'display: none;');
                        jQuery("#datosO").attr('style', 'display: none;');
                        jQuery("#cemail").attr('style', 'visibility: hidden;');
                        jQuery("#rEmailForm").attr('style', 'visibility: hidden;');
                        jQuery("#botoncitoCom").attr('style', '');
                    }
                }
            });
        }else{
            jQuery("#botoncitoCof").attr('style', 'visibility: hidden;');
            jQuery("#emailinv").attr('style', 'display: none; color: red');
            jQuery("#yareg").attr('style', 'display: none; color: red');
            jQuery("#PassO").attr('style', 'display: none;');
            jQuery("#datosO").attr('style', 'display: none;');
            jQuery("#cemail").attr('style', 'visibility: hidden;');
            jQuery("#rEmailForm").attr('style', 'visibility: hidden;');
            jQuery("#botoncitoCom").attr('style', '');
        }
    }
    
    function comprobarCP(){
        if(jQuery("#cp").val() != ''){
            if(jQuery("#provincia").val() != ''){
                jQuery.ajaxSetup({async: false});
                jQuery.post("<?=$draizp?>/ajax/cp.php", {cp: jQuery("#cp").val(), city: jQuery("#provincia").val(), pais: jQuery("#pais").val()}, function(respuesta){ 
                     if(respuesta){
                         jQuery("#cpEr").attr('style', 'display: none; color: red');
                         jQuery("#cp").attr('style', '');
                         mensaje = true;
                     }else{
                         jQuery("#cpEr").attr('style', 'display: block; color: red');
                         jQuery("#cp").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
                         mensaje = false;
                     }
                 });
                jQuery.ajaxSetup({async: true});
            }
        }
        return mensaje;
    }
    
    jQuery(document).on("change", "#checkp", function(){
        if(jQuery("#checkp").prop('checked')){
            jQuery("#datosO").attr('style', 'display: block;');
        }else{
            jQuery("#datosO").attr('style', 'display: none;');
        }
    });
    
    jQuery(document).on("change", "#tipoC", function(){
        jQuery("#dnierr").attr('style', 'display: none; color: red');
         switch(jQuery('input[name=tipoC]:checked').attr('value')){
           case 'Empresa': jQuery("#particular").attr('style', 'display: none;');
                           jQuery("#razons").attr('style', 'display: block;');
                           jQuery("#dni").attr('placeholder', 'CIF');
                           comprobarCIF(jQuery("#dni").val());
               break;
           case 'Particular': jQuery("#particular").attr('style', 'display: block;');
                              jQuery("#razons").attr('style', 'display: none;');
                              switch(jQuery('input[name=tipoD]:checked').attr('value')){
                                    case 'dni': jQuery("#dni").attr('placeholder', 'DNI');
                                                comprobarDNI(jQuery("#dni").val());
                                        break;
                                    case 'pass': jQuery("#dni").attr('placeholder', 'Pasaporte');
                                                 comprobarPASS(jQuery("#dni").val());
                                        break;
                                    case 'nres': jQuery("#dni").attr('placeholder', 'Nº Residente');
                                                 comprobarNIE(jQuery("#dni").val());
                                        break;
                                    case 'otro': jQuery("#dni").attr('placeholder', 'Documento');
                                        break;
                                }
               break;
       }
    });
    
    jQuery(document).on("change", "#tipoD", function(){
       jQuery("#dnierr").attr('style', 'display: none; color: red');
       switch(jQuery('input[name=tipoD]:checked').attr('value')){
           case 'dni': jQuery("#dni").attr('placeholder', 'DNI');
                       comprobarDNI(jQuery("#dni").val());
               break;
           case 'pass': jQuery("#dni").attr('placeholder', 'Pasaporte');
                        comprobarPASS(jQuery("#dni").val());
               break;
           case 'nres': jQuery("#dni").attr('placeholder', 'NIE');
                        comprobarNIE(jQuery("#dni").val());
               break;
            case 'otro': jQuery("#dni").attr('placeholder', 'Documento');
               break;
       }
    });
    
    jQuery(document).on("change", "#dni", function(){
        var dni = jQuery("#dni").val();
         dni = dni.trim();
         dni = dni.replace(/[.*+?^${}()|[\]\\\-]/g,"");
         dni = dni.toUpperCase();
         jQuery("#dni").val(dni);
         switch(jQuery('input[name=tipoC]:checked').attr('value')){
           case 'Empresa': comprobarCIF(jQuery("#dni").val());
               break;
           case 'Particular':
               switch(jQuery('input[name=tipoD]:checked').attr('value')){
                    case 'dni': comprobarDNI(jQuery("#dni").val());
                        break;
                    case 'pass': comprobarPASS(jQuery("#dni").val());
                        break;
                    case 'nres': comprobarNIE(jQuery("#dni").val());
                        break;
                    case 'otro': true;
                        break;
                }
               break;
       }    
    });

    function validar_dni_nif_nie(value){ 
        var validChars = 'TRWAGMYFPDXBNJZSQVHLCKET';
        var nifRexp = /^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/i;
        var nieRexp = /^[XYZ]{1}[0-9]{7}[TRWAGMYFPDXBNJZSQVHLCKET]{1}$/i;
        var str = value.toString().toUpperCase();

        if (!nifRexp.test(str) && !nieRexp.test(str)) return false;

        var nie = str
            .replace(/^[X]/, '0')
            .replace(/^[Y]/, '1')
            .replace(/^[Z]/, '2');

        var letter = str.substr(-1);
        var charIndex = parseInt(nie.substr(0, 8)) % 23;

        if (validChars.charAt(charIndex) === letter) return true;

        return false;
    }
    
    function comprobarDNI(dni){
        var dev = false;
        validar_dni_nif_nie(dni);
        if(validar_dni_nif_nie(jQuery("#dni").val())){
            dev = true;
            jQuery("#dnierr").attr('style', 'display: none;');
            jQuery("#dni").attr('style', 'border-color: #ccc; border-style: solid; border-width: 1px;');    
        }else{
            jQuery("#dnierr").html('<b>¡DNI erroneo!</b>');
            jQuery("#dnierr").attr('style', 'display: block; color: red');
            jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');    
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
                jQuery("#dnierr").html('<b>¡CIF erroneo!</b>');
                jQuery("#dnierr").attr('style', 'display: none; color: red');
                jQuery("#dni").attr('style', '');
            }else{
                dev = false; 
                jQuery("#dnierr").html('<b>¡CIF erroneo!</b>');
                jQuery("#dnierr").attr('style', 'display: block; color: red');
                jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
            }
       }
        return dev;
    }
    
    function comprobarPASS(dni){
        var dev = true;
        var regular = new RegExp(/^[\w]+$/);
           if (!regular.exec(dni)){ 
               dev = false;
               jQuery("#dnierr").html('<b>¡Pasaporte erroneo!</b>');
               jQuery("#dnierr").attr('style', 'display: block; color: red');
               jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
           }else{
               jQuery("#dnierr").attr('style', 'display: none; color: red');
               jQuery("#dni").attr('style', '');
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
        jQuery("#dnierr").attr('style', 'display: none; color: red');
        jQuery("#dni").attr('style', '');
        
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
                                jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                                jQuery("#dnierr").attr('style', 'display: block; color: red');
                                jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
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
                                        jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                                        jQuery("#dnierr").attr('style', 'display: block; color: red');
                                        jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
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
                                jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                                jQuery("#dnierr").attr('style', 'display: block; color: red');
                                jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
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
                                        jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                                        jQuery("#dnierr").attr('style', 'display: block; color: red');
                                        jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
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
                                jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                                jQuery("#dnierr").attr('style', 'display: block; color: red');
                                jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
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
                                        jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                                        jQuery("#dnierr").attr('style', 'display: block; color: red');
                                        jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
				}				
			}
		}
		else
		{
			dev = false;
                        jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                        jQuery("#dnierr").attr('style', 'display: block; color: red');
                        jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
		}		
	}else if (a.length==14){//14 caracteres, los 2 primeros letras
		var temp1=temp.substr(0,2);
		if (isAlphabetic(temp1)!=true)	
			{
                            dev = false;
                            jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                            jQuery("#dnierr").attr('style', 'display: block; color: red');
                            jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
			}
	}
	else
	{
			dev = false;
                        jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                        jQuery("#dnierr").attr('style', 'display: block; color: red');
                        jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 1px;');
 
	}
        return dev;
    }
    
    function compruebaSiOK(dni){
        var dev = false;
        switch(jQuery('input[name=tipoC]:checked').attr('value')){
           case 'Empresa': dev = comprobarCIF(jQuery("#dni").val());
               break;
           case 'Particular': 
                              switch(jQuery('input[name=tipoD]:checked').attr('value')){
                                    case 'dni': dev = comprobarDNI(jQuery("#dni").val());
                                        break;
                                    case 'pass': dev = comprobarPASS(jQuery("#dni").val());
                                        break;
                                    case 'nres': dev = comprobarNIE(jQuery("#dni").val());
                                        break;
                                    case 'otro': dev = true;
                                        break;
                                }
               break;
       }
       return dev;
    }
    
</script>
<style>
     @media (max-width: 545px){
        .movilbt{
            width: 100% !important;
            max-width: 545px !important;
        }
     }
</style>
<?php
for($i=0; $i<=count($labelidioma); $i++){

    if($labelidioma[$i][0] == 'actualizar'){
        $auxactu = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'producto'){
        $auxprod = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'cantidad'){
        $auxcan = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'preciouni'){
        $auxpru = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'total'){
        $auxtot = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'gastos'){
        $auxgas = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'titulo_gastos'){
        $auxtgas = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'baseimp'){
        $auxbas = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'info'){
        $auxinf = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'realizarcompra'){
        $auxreal = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'gratis'){
        $auxgra = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'volver'){
        $auxvol = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'empezar'){
        $auxemp = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'datosp'){
        $auxdp = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'datosc'){
        $auxdc = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'datose'){
        $auxde = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'campos'){
        $auxcam = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'continuar'){
        $auxcon = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'tupedido'){
        $auxped = $nombreidioma[$i][0];
    }

    if($labelidioma[$i][0] == 'forma'){
        $auxfor = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'paypal'){
        $auxpay = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'transferencia'){
        $auxtra = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'domiciliacion'){
        $auxdom = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'contrareembolso'){
        $auxcont = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'tienda'){
        $auxtie = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'pagar'){
        $auxpag = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'campos'){
        $auxcam = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'datosen'){
        $auxden = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'datospa'){
        $auxdpa = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'confirmacion'){
        $auxconf = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'finalizado'){
        $auxfin = $nombreidioma[$i][0];
    }

    if($labelidioma[$i][0] == 'receptor'){
        $auxrec = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'factura'){
        $auxfac = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'dentrega'){
        $auxdentre = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'info2'){
        $auxinfo = $nombreidioma[$i][0];
    }
    if($labelidioma[$i][0] == 'realizarpago'){
        $auxrea = $nombreidioma[$i][0];
    }

}
?>
<?php include_once('new_purchase_process/verify_purchase_process_type.php'); ?>
<?php 
if($purchase_process_type == 3): //Nuevo proceso de compra
    include_once('new_purchase_process/principal_page.php');        
else: //Antiguo Proceso de compra
?>
<div id="contenido">
	<div id="articulo">
		<?php
			if (isset($_GET['confirmacion']) && $_SESSION['compra']['paso'] >= 3)
			{
				?>
				<table id="comprabar">
					<tr id="comprabarn">
						<td><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pedido"><?=$auxprod?></a></td>
						<td><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>datos_personales"><?=$auxden?></a></td>
						<td><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pago"><?=$auxdpa?></a></td>
						<td><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>confirmacion"><?=$auxconf?></a></td>
						<td><?=$auxfin?></td>
					</tr>
					<tr id="comprabarc">
						<td class="realizado"></td>
						<td class="realizado"></td>
						<td class="realizado"></td>
						<td class="actual"></td>
						<td></td>
					</tr>
				</table><br />
				<form method="post" enctype="multipart/form-data" name="confirmacion" action="<?=$draizp?>/acc/realizar_pago">
					<div style="margin: auto; max-width: 550px; width: 100%;">
						<h2><?=$auxprod?></h2>
						<?php
						if (count($pedido) < 1) echo '<p>No hay productos en tu cesta!</p>';
						else
						{
							?>
								<table id="tcesta" class="alter">
									<thead>
										<tr>
											<th style="display: none;"></th>
											<th style="display: none;"></th>
											<th colspan="1"><?=$auxprod?></th>
											<th><?=$auxcan?></th>
											<th style="display: none;"><?=$auxpru?></th>
											<th style="display: none;">Precio/Per</th>
											<th><?=$auxtot?></th>
										</tr>
									</thead>
									<tbody>
										<?php
											$total = 0;
											$peso = 0;
											foreach ($pedido AS $micesta)
											{
												$total += ($micesta['precio'] + $micesta['personalizacion']) * $micesta['cantidad'];
												$peso += ($micesta['peso'] * $micesta['cantidad']);
										?>
                                                                            
                                                                            <?php if($micesta['afiliado'] != ''){
                                                                                        $urlArticulo = $micesta['nombre'];
                                                                                    }else{
                                                                                        if($micesta['pack'] != true )
                                                                                            $urlArticulo = "<a href='".$draizp."/".$_SESSION['lenguaje']."producto/".$micesta['id']."'>".$micesta['nombre']."</a>";
                                                                                        else
                                                                                            $urlArticulo = "<a href='".$draizp."/".$_SESSION['lenguaje']."pack/".$micesta['id']."'>".$micesta['nombre']."</a>";
                                                                                    } ?>
												<tr>
													<td style="display: none;"></td>
													<td style="display: none; position: relative;">
													</td>
													<td style="width: 60% !important;">
														<?php if(is_numeric($micesta['descuento'])) { ?><?=$urlArticulo?><?php } else { ?><span class="enlazado"><?=$micesta['nombre']?></span><?php } ?>
														<?php if($micesta['fDirecta'] == '1') { ?><span>+ <?=number_format($micesta['cuota'],2,',','.')?>€/mes x <?=$micesta['meses']?>meses</span><?php } ?>
                                                                                                                <span><?=($micesta['talla']!=null ? $micesta['talla'] : '')?> <?=($micesta['color']!=null ? ' ('.$micesta['color'].')' : '')?><?=($micesta['extra']!=null ? $micesta['extra'] : '')?></span>
                                                                                                                <?php if($micesta['aplazame'] == 1){ ?>
                                                                                                                    <span>Financialo con Aplazame por <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['caplazame1']), 2, ',', '.')?><?=$_SESSION['moneda']?> + <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['caplazame']), 2, ',', '.')?><?=$_SESSION['moneda']?> al mes</span>
                                                                                                                <?php } ?>
													</td>
													<td>
														<form method="post" action="#">
															<input type="text" class="miniF" id="cantidad<?=$micesta['id']?>" name="cantidad" value="<?=$micesta['cantidad']?>" readonly />
														</form>
													</td>
													<td style="display: none;"></td>
													<td style="display: none;"></td>
													<td style="width: 30% !important;"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($micesta['precio'] + $micesta['personalizacion']) * $micesta['cantidad'])), 2, ',', '.')?> <?=$_SESSION['moneda']?></td>
												</tr>
										<?php
											}
											
											if($Empresa['tipoportes'] == 0){
                                                                                            $portes = number_format(CalculaPortesPS($total), 2, ',', '.');
                                                                                            $portes = str_replace(',', '.', $portes);
                                                                                        }else if($Empresa['tipoportes'] == 1){
                                                                                            $portes_ar = CalculaPortesKmS($total);
                                                                                            //$logoPortes = $portes_ar[1];
                                                                                            $portes = $portes_ar[0];
                                                                                            $portes = str_replace(',', '.', $portes);
                                                                                            if($portes_ar[0] < 0){
                                                                                                echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$draizp.'/'.$_SESSION['lenguaje'].'/cesta">';
                                                                                                exit;
                                                                                            }
                                                                                        }else if($Empresa['tipoportes'] == 2){
                                                                                            $portes = CalculaPortesProvS($total);
                                                                                            if($portes >= 0){
                                                                                                $portes = number_format($portes, 2, ',', '.');
                                                                                                $portes = str_replace(',', '.', $portes);
                                                                                            }else{
                                                                                                $portes = -4;
                                                                                            }
                                                                                        }else if($Empresa['tipoportes'] == 3){
                                                                                            $portes = CalculaPortesProvSP($total, $peso);
                                                                                            if($portes >= 0){
                                                                                                $portes = number_format($portes, 2, ',', '.');
                                                                                                $portes = str_replace(',', '.', $portes);
                                                                                            }else{
                                                                                                $portes = -4;
                                                                                            }
                                                                                        }
                                                                                        
                                                                                        $abono = Abono(@$_SESSION['usr']['id']);
                                                                                        $total = $total - $abono;
											
											if ($abono > 0)
											{
												?>
													<tr>
														<td style="display: none;"></td>
														<td style="display: none; position: relative;"><span style="color: #FFF; font-size: 1.6rem; left: 43%; position: absolute; top: 45%;"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$abono), 2, ',', '.')?><?=$_SESSION['moneda']?></span><img src="<?=$draizp?>/imagenesproductos/abonos.png" alt="<?=$micesta['nombre']?>"></td>
														<td><span class="enlazado">Abonos acumulados</span><span>Descuentos acumulables por opinar</span></td>
														<td>
															<form method="post" action="#">
																<input type="text" class="miniF" name="desertor" value="1" readonly />
															</form>
														</td>
														<td style="display: none;"></td>
														<td style="display: none;"></td>
														<td>- <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$abono, 2, ',', '.'))?> <?=$_SESSION['moneda']?></td>
													</tr>
												<?php
											}
                                                                                        
                                                                                        if (@$_SESSION['compra']['codpromo'] != null && @$_SESSION['compra']['codpromo'] != '')
											{
                                                $pcode = CodigoPromocional(strtolower($_SESSION['compra']['codpromo']), $total);
                                                if ($pcode != null)
                                                {
                                                    if ($pcode['tipo'] == '€')
                                                        $total = $total - $pcode['descuento'];
                                                    else
                                                        $total = $total - ($total * ($pcode['descuento'] / 100));
                                                    
                                                    //echo $total;
                                                    ?>
                                                        <tr>
                                                            <td style="display: none;"></td>
                                                            <td style="display: none; position: relative;"><span style="color: #FFF; font-size: 1.6rem; left: 43%; position: absolute; top: 45%;"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$abono), 2, ',', '.')?><?=$_SESSION['moneda']?></span><img src="<?=$Empresa['promocionIcon'] != '' ? 'iconos/'.$Empresa['promocionIcon'] : '/imagenesproductos/descuentos.png'?>" alt="Código Promocional"></td>
                                                            <td><span class="enlazado">Código Promocional</span><span><?=strtoupper($_SESSION['compra']['codpromo'])?><br><?=$pcode['promocion']?></span></td>
                                                            <td>
                                                                <form method="post" action="#">
                                                                    <input type="text" class="miniF" name="desertor" value="1" readonly />
                                                                </form>
                                                            </td>
                                                            <td style="display: none;"></td>
                                                            <td style="display: none;"></td>
                                                            <td>-<?=number_format($pcode['descuento'], 2, ',', '.')?> <?=$pcode['tipo']?></td>
                                                        </tr>
                                                    <?php
                                                }
											}
                                                                                        
											if(($portes > 0 || $Empresa['portes_gratis'] == 0) && $portes != -4){ ?>
											<tr>
												<td style="display: none;"></td>
												<td style="display: none; position: relative;"></td>
												<td><span class="enlazado"><?=$auxgas?></span><span><?=$auxtgas?> <?=$_SESSION['compra']['entrega']['provinciaE']?>, <?=$_SESSION['compra']['entrega']['paisE']?></span></td>
												<td>
													<form method="post" action="#">
														<input type="text" class="miniF" name="desertor" value="1" readonly />
													</form>
												</td>
												<td style="display: none;"></td>
												<td style="display: none;"></td>
                                                                                                <?php if($_SESSION['compra']['pago']['pagov'] != 'tie'){ ?>
												<td><?=$portes > 0 ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$portes), 2, ',', '.').$_SESSION['moneda'] : $auxgra?></td>
                                                                                                <?php }else{ ?>
                                                                                                <td><?=$auxgra?></td>
                                                                                                <?php } ?>
                                                                                                
                                                                                                    
                                                                                                
											</tr>
                                                                                        <?php }else if($portes == -4){ ?>
                                                                                            <td style="display: none;"></td>
												<td style="display: none; position: relative;"></td>
												<td><span class="enlazado"><?=$auxgas?></span><span><?=$auxtgas?> <?=$_SESSION['compra']['entrega']['provinciaE']?>, <?=$_SESSION['compra']['entrega']['paisE']?></span></td>
												<td>
													<form method="post" action="#">
														<input type="text" class="miniF" name="desertor" value="1" readonly />
													</form>
												</td>
                                                                                                <td>Actualmente no realizamos entrega en la provincia de <?=$_SESSION['compra']['entrega']['provinciaE']?></td>
                                                                                        <?php } ?>
                                                                                        
                                                    <?php if($_SESSION['compra']['pago']['pagov'] == 'cre'){ ?>  
                                                            
                                                                                        <tr>
												<td style="display: none;"></td>
												<td style="display: none; position: relative;"></td>
												<td><span class="enlazado">Tasas Contrareembolso</span></td>
												<td>
													<form method="post" action="#">
														<input type="text" class="miniF" name="desertor" value="1" readonly />
													</form>
												</td>
												<td style="display: none;"></td>
												<td style="display: none;"></td>
												<td><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$Empresa['contrareembolso']), 2, ',', '.').$_SESSION['moneda']?></td>
											</tr>
                                                                                        
                                                    <?php 
                                                    $total += $Empresa['contrareembolso'];
                                                    } ?>
                                                                                        
                                                    <?php $incremento1 = 0; $incremento2 = 0;
                                                    if($_SESSION['compra']['pago']['pagov'] == 'pay'){ 
                                                        if($Empresa['ippaypal'] != 0){ 
                                                            $incremento1 = (($total+ $portes) * $Empresa['ippaypal'])/100;
                                                            ?>
                                                                                        <tr>
                                                                                            <td style="display: none;"></td>
                                                                                            <td style="display: none; position: relative;"></td>
                                                                                            <td>Incremento PayPal</td>
                                                                                            <td>1</td>
                                                                                            <td style="display: none;"></td>
                                                                                            <td style="display: none;"></td>
                                                                                            <td><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$incremento1), 2, ',', '.').$_SESSION['moneda']?></td>
                                                                                        </tr>
                                                        <?php } 
                                                        
                                                        if($Empresa['ifpaypal'] != 0){ 
                                                             $incremento2 = $Empresa['ifpaypal']; ?>
                                                                                        <tr>
                                                                                            <td style="display: none;"></td>
                                                                                            <td style="display: none; position: relative;"></td>
                                                                                            <td>Incremento PayPal</td>
                                                                                            <td>1</td>
                                                                                            <td style="display: none;"></td>
                                                                                            <td style="display: none;"></td>
                                                                                            <td><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$Empresa['ifpaypal']), 2, ',', '.').$_SESSION['moneda']?></td>
                                                                                        </tr>
                                                        <?php } ?>
                                                        
                                                                                        
                                                    <?php } ?>
                                                                                      
											<tr>
												<td colspan="1">
                                                    <?php if($Empresa['desglose'] == 1){ ?>
                                                        <?=$auxbas?>&nbsp;&nbsp;
                                                        <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.').$_SESSION['moneda']?><br>
                                                        <!--IVA-->(21%)&nbsp;&nbsp;
                                                        <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.').$_SESSION['moneda']?>
                                                    <?php } ?>
												</td>
                                                                                                <?php if($_SESSION['compra']['pago']['pagov'] != 'tie'){ ?>
												<td colspan="2" style="display: table-cell !important;"><strong><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($total+ $portes+ $incremento1 + $incremento2)), 2, ',', '.')?> <?=$_SESSION['moneda']?></strong></td>
                                                                                                <?php }else{ ?>
                                                                                                <td colspan="2" style="display: table-cell !important;"><strong><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($total+ $incremento1 + $incremento2)), 2, ',', '.')?> <?=$_SESSION['moneda']?></strong></td>
                                                                                                <?php } ?>
											</tr>
                                                    
									</tbody>
								</table>
							<?php
						}
						?>
                <?php if($Empresa['tipoportes'] == 0 || $Empresa['tipoportes'] == 2 || $Empresa['tipoportes'] == 3){
                    if($_SESSION['compra']['pago']['pagov'] != 'tie'){ ?>
                                                <h2>Tipo de envío</h2>
                            
                            <?php
                            if($Empresa['tipoportes'] == 0){
                                @$portes_extras = OtrosEnvios($total);
                            }
                            if($Empresa['tipoportes'] == 2){
                                $portes_extras2 = OtrosEnvios2($total);
                            }
                            if($Empresa['tipoportes'] == 3){
                                $portes_extras3 = OtrosEnvios3($total);
                            }
                            
                            $cont = 0;
                            $idPT = 0;
                            
                            foreach ($portes_extras AS $nporte){
                                if($nporte['Gratis'] > $total || !isset($nporte['Gratis'])){
                            ?>
                                <input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=$nporte['precio']-$portes?>"> <?=$nporte['transportista']?> (+<?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$nporte['precio']), 2, ',', '.')?><?=$_SESSION['moneda']?>)
                            <?php 
                                }else{
                            ?>
                                 <input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=-$portes?>"> <?=$nporte['transportista']?> (0,00<?=$_SESSION['moneda']?>)
                            <?php 
                                }
                                if($nporte['extension'] != ''){ ?>
                                 <img src="<?=$draizp?>/logos/<?=$nporte['id']?>.<?=$nporte['extension']?>" style="max-width: 60px; max-height: 30px; float:left" />
                                <?php }?>
                                 <br><br>
                                 <?php
                            } 
                            foreach ($portes_extras2 AS $nporte){ ?>
                                <input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=$nporte['precio']-$portes?>"> <?=$nporte['transportista']?> (+<?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$nporte['precio']), 2, ',', '.')?><?=$_SESSION['moneda']?>)
                            <?php                                 
                                if($nporte['extension'] != ''){ ?>
                                 <img src="<?=$draizp?>/logosProvincias/<?=$nporte['id']?>.<?=$nporte['extension']?>" style="max-width: 60px; max-height: 30px; float:left" />
                                <?php }?>
                                 <br><br>
                                 <?php
                            } 
                            ?>
                            <?php foreach ($portes_extras3 AS $nporte){ ?>
                                <input onclick="cambTransp(<?=$nporte['id']?>)" type="radio" id="penvio" name="penvio" <?php if($cont == 0){ echo "checked"; $cont++; $idPT=$nporte['id']; } ?> value="<?=($nporte['precio']*$peso)-$portes?>"> <?=$nporte['transportista']?> (+<?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($nporte['precio']*$peso)), 2, ',', '.')?><?=$_SESSION['moneda']?>)
                            <?php                                 
                                if($nporte['extension'] != ''){ ?>
                                 <img src="<?=$draizp?>/logosProvinciasP/<?=$nporte['id']?>.<?=$nporte['extension']?>" style="max-width: 60px; max-height: 30px; float:left" />
                                <?php }?>
                                 <br><br>
                                 <?php
                            } 
                            ?>
                                 <input type='hidden' id='transp' name='transp' value='<?=$idPT?>'>
                                 <script>
                                     function cambTransp($id){
                                         document.getElementById("transp").value = $id;
                                     }
                                 </script>
                <?php }else{ ?>
                      <input type='hidden' id='transp' name='transp' value='0'>           
                <?php }
                }else{ ?>
                    <input type='hidden' id='penvio' name='penvio' value='<?=$portes_ar[0]?>'>
                <?php }
?>
						<h2><?=$auxrec?></h2>
						<input type="text" id="email" name="email" class="dobleF" placeholder="Correo Electrónico" disabled value="<?=@$_SESSION['usr']['email']?>"><br /><br /><br />
						<h2><?=$auxde?></h2>
                        <?php if($_SESSION['usr']['RazonSocial'] != ''){ ?><input class="dobleF" type="text" id="nombrer" name="nombrer" placeholder="Nombre" disabled value="<?=@$_SESSION['usr']['RazonSocial']?>"><br><?php } ?>
                        <input type="text" id="nombrer" name="nombrer" placeholder="Nombre" disabled value="<?=@$_SESSION['compra']['entrega']['nombre']?>">
						<input type="text" id="dni" name="dni" placeholder="DNI" value="<?=@$_SESSION['compra']['entrega']['dni']?>" disabled><br />
						<input type="text" class="dobleF" id="direccion" name="direccion" placeholder="Dirección" value="<?=@$_SESSION['compra']['entrega']['direccion']?>" disabled />
						<input type="text" id="paisi" name="paisi" placeholder="País" value="<?=@$_SESSION['compra']['entrega']['pais']?>" disabled>
						<input type="text" disabled="" id="provincia2" name="provincia2" placeholder="Provincia" value="<?=@$_SESSION['compra']['entrega']['provincia']?>"><br />
						<input type="text" id="localidad" name="localidad" placeholder="Localidad" value="<?=@$_SESSION['compra']['entrega']['localidad']?>" disabled>
						<input type="text" id="cp" name="cp" class="mitadF2" placeholder="C. Postal" value="<?=@$_SESSION['compra']['entrega']['cp']?>" disabled /><br /><br />
						<span style="display: <?=$mostraEnvio ? 'block' : 'none'?>">
                                                <h2><?=$auxdentre?></h2>
                                                <input type="text" class="dobleF" id="nombreE" disabled name="nombreE" placeholder="Nombre" value="<?=@$_SESSION['compra']['entrega']['nombreE']?>">
						<input type="text" class="dobleF" id="direccion" disabled name="direccion" placeholder="Dirección *" value="<?=$_SESSION['compra']['entrega']['direccionE']?>" />
                                                <input type="text" id="localidad" name="localidad" disabled placeholder="Localidad *" value="<?=$_SESSION['compra']['entrega']['localidadE']?>" />
						<input type="text" id="provinciaE" name="provinciaE" disabled placeholder="Provincia *" value="<?=$_SESSION['compra']['entrega']['provinciaE']?>" /><br />
						<input type="text" id="cp" name="cp" class="mitadF2" disabled placeholder="C. Postal *" value="<?=$_SESSION['compra']['entrega']['cpE']?>" />
                                                <input type="text" id="pais" name="pais" disabled placeholder="Pais *" value="<?=$_SESSION['compra']['entrega']['paisE']?>" /><br />
                                                <input type="text" id="telefono" name="telefono" placeholder="Teléfono" value="<?=@$_SESSION['compra']['entrega']['telefono']?>" disabled /><br /><br />
                                                </span>
                                                <h2><?=$auxfor?></h2>
						<input type="text" id="fpago" name="fpago" placeholder="Forma de Pago" style="text-align: center;" value="<?=$_SESSION['compra']['pago']['pago']?>" disabled><br /><br />
                                                <?php if($_SESSION['compra']['pago']['pagov'] == 'dom'){ ?><input id="fpago2" name="fpago2" placeholder="Entidad" style="text-align: center;" value="<?=$_SESSION['domiciliacion']['nentidad']?>" disabled="" type="text"><?php } ?>
                                                <?php if($_SESSION['compra']['pago']['pagov'] == 'dom'){ ?><input id="fpago3" name="fpago3" placeholder="IBAN" style="text-align: center;" value="<?=$_SESSION['domiciliacion']['iban']?> <?=$_SESSION['domiciliacion']['entidad']?> <?=$_SESSION['domiciliacion']['oficina']?> <?=$_SESSION['domiciliacion']['dc']?> <?=$_SESSION['domiciliacion']['ccc']?> <?=$_SESSION['domiciliacion']['ccc2']?>" disabled="" type="text"><?php } ?>
                                                <?php if(count($otrosCampos)>0){ ?>
                                                    <h2>Otros datos</h2>
                                                    <?php foreach($otrosCampos AS $newCampo){ 
                                                        if($newCampo['tipo'] == 0){ ?>
                                                            <br><?=$newCampo['nombre']?>: <input class="dobleF" type="text" name="<?=$newCampo['nombre']?>" placeholder="<?=$newCampo['nombre']?>"><br>
                                                    <?php }else if($newCampo['tipo'] == 1){ ?>
                                                            <br><?=$newCampo['nombre']?>: <textarea class="dobleF" style="margin: 0px !important" name="<?=$newCampo['nombre']?>" placeholder="<?=$newCampo['nombre']?>"></textarea>
                                                    <?php }else if($newCampo['tipo'] == 2){ ?>
                                                            <br><?=$newCampo['nombre']?>: <input type="file" class="dobleF" style="margin: 0px !important" name="<?=$newCampo['nombre']?>"><br>
                                                    <?php }
                                                    } 
                                                }?>
					</div>
                                        <?php if($portes != -4){ ?><span type="submit" class="button" name="BtSubmit" style="float: right;">Realizar Pago</span><?php }?>
                                       	<span type="submit" class="button" onclick="location.href='/<?=$_SESSION['lenguaje']?>cesta';"><?=$auxvol?></span>&nbsp;&nbsp;&nbsp;
					<h5 style="display: inline-block; color: #E81F32; font-style: italic;"><?=$auxinfo?></h5>
				</form>
				<?php
			}
			else if (isset($_GET['datos_personales']) && $_SESSION['compra']['paso'] >= 1)
			{
				?>
				<table id="comprabar">
					<tr id="comprabarn">
						<td><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pedido"><?=$auxprod?></a></td>
						<td><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>datos_personales"><?=$auxde?></a></td>
						<td>Datos de Pago</td>
						<td>Confirmación</td>
						<td>Finalizado</td>
					</tr>
					<tr id="comprabarc">
						<td class="realizado"></td>
						<td class="actual"></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table><br />
				<?php
				if ($_SESSION['usr'] != null)
				{
                    
					?>
					<form method="post" name="datosper" action="<?=$draizp?>/acc/pago">
						<div style="margin: auto; max-width: 550px; width: 100%;">
							<h2><?=$auxdp?></h2>
                                                        <?php if($_SESSION['usr']['RazonSocial'] != ''){ ?><input type="text" id="rsocial" name="rsocial" placeholder="Razon Social" value="<?=$_SESSION['usr']['RazonSocial']?>" class="dobleF" disabled=""><br><?php } ?>
							<input type="text" id="nombre" name="nombre" placeholder="Nombre *" value="<?=$_SESSION['usr']['nombre']?>">
							<input type="text" id="dni" name="dni" placeholder="DNI *" value="<?=$_SESSION['usr']['dni']?>" /><br /><br />
							<h2><?=$auxdc?></h2>
							<input type="text" id="telefono" name="telefono" placeholder="Teléfono" value="<?=$_SESSION['usr']['telefono']?>" /><br />
							<input type="text" id="email" name="email" disabled class="dobleF" placeholder="Correo Electrónico" value="<?=$_SESSION['usr']['email']?>"><br /><br />
							<h2><?=$auxde?></h2>
							<input type="text" class="dobleF" id="direccion" required name="direccion" placeholder="Dirección *" value="<?=$_SESSION['usr']['direccion']?>" />
							<select id="pais" name="pais" required>
								<option value="" selected>País</option>
								<?php
									foreach($paises as $pais)
										echo '<option'.($pais['id'] == $_SESSION['usr']['pais'] ? ' selected' : '').' value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
								?>
							</select>
							<select id="provincia" name="provincia" required>
								<option value="" selected>Selecciona primero un país</option>
							</select><br />
                                                        <input type="text" id="localidad" name="localidad" required placeholder="Localidad *" value="<?=$_SESSION['usr']['poblacion']?>" />
							<input type="text" id="cp" name="cp" class="mitadF2" required placeholder="C. Postal *" value="<?=$_SESSION['usr']['cp']?>" /><br /><br />
							<input type="hidden" id="idpro" name="idpro" value="<?=$_SESSION['usr']['provinciaid']?>" />
                                                        <span style="display: <?=$mostraEnvio ? 'block' : 'none'?>">
                                                        <h2><?=$auxdentre?></h2>
                                                        <input type="text" id="nombreE" name="nombreE" placeholder="Nombre" value="<?=@$_SESSION['usr']['nombreE']?>">
                                                        <input type="text" class="dobleF" id="direccionE" name="direccionE" placeholder="Dirección *" value="<?=$_SESSION['usr']['direccionEnv']?>" />
                                                        <select id="paisE" name="paisE" required>
								<option value="" selected>País</option>
								<?php
									foreach($paises as $pais)
										echo '<option'.($pais['id'] == $_SESSION['usr']['paisEnv'] ? ' selected' : '').' value="'.$pais['id'].'">'.$pais['nombre'].'</option>';
								?>
							</select> 
                                                        <select id="provinciaE" name="provinciaE" required>
								<option value="" selected>Selecciona primero un país</option>
							</select><br />
                                                        <input type="text" id="localidadE" name="localidadE" placeholder="Localidad *" value="<?=$_SESSION['usr']['poblacionEnv']?>" />
                                                        
                                                        <input type="text" id="cpE" name="cpE" placeholder="C. Postal *" value="<?=$_SESSION['usr']['cpEnv']?>" />
                                                        <br /><br />
                                                        <input type="hidden" id="idpro2" name="idpro2" value="<?=$_SESSION['usr']['provinciaidEnv']?>" />  
                                                        </span>
						</div>
						<span type="submit" class="button" name="BtSubmit" style="float: right;"><?=$auxcon?></span>
						<span type="submit" class="button" onclick="location.href='/<?=$_SESSION['lenguaje']?>cesta';"><?=$auxvol?></span>&nbsp;&nbsp;&nbsp;
						<h5 style="display: inline-block; color: #E81F32; font-style: italic;"><?=$auxcam?></h5>
					</form>
					<?php
				}
				else if ($_SESSION['cestases'] != null)
				{
					?>
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
                                                                                                                            
                                    jQuery(document).on("change", "#pais", function(){
                                        if(jQuery("#pais").val() == 'ESP' || jQuery("#pais").val() == 'ESX' || jQuery("#pais").val() == 'AND'){
                                            jQuery("#cp").attr('pattern', '[0-9A-Z]{5}');
                                        }else{
                                            jQuery("#cp").removeAttr('pattern');
                                        }
                                    });
                                                                                                                            
                                </script>
					<form method="post" name="datosper" action="<?=$draizp?>/acc/pago" onsubmit="return activa2()">
						<h2>Rellena el siguiente formulario para tramitar la compra</h2>
                                                <span id="emailinv" name="emailinv" style="display: none; color: red"><b>¡Correo electronico inválido!</b><br></span>
                                                <span id="yareg" name="yareg" style="display: none; color: red"><b>¡Correo electronico ya registrado!</b> Logeate <a href="cuenta">aquí</a><br></span>
                                                <span id="emailD" name="emailD" style="display: none; color: red"><b>¡Correos electronicos distintos!</b><br></span>
                                                <input type="email" class="movilbt" id="email" name="email" placeholder="Correo Electrónico" required value="<?=$_SESSION['datosregistro']['email']?>" onchange="activa2()">
                                                <span id="botoncitoCom"  class="button">Comprobar Email</span>
						<input type="email" class="movilbt" id="cemail" name="cemail" placeholder="Repite Correo Electrónico" required value="<?=$_SESSION['datosregistro']['cemail']?>" onchange="activa2()" style="visibility: hidden">
                                                <span style="visibility: hidden" id="botoncitoCof"  class="button">Confirmar Email</span><br />
                                                <p>¿Ya tienes cuenta? <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cuenta/logcompra">Accede desde aquí!</a></p><br />
						<span id="PassO" name="PassO" style="display: none">
                                                <span id="passD" name="emailD" style="display: none; color: red"><b>¡Contraseñas distintas!</b><br></span>
                                                <input type="password" class="movilbt" id="password" name="password" placeholder="Contraseña" required value="" onchange="activa2()">
                                                <span id="passCB" name="passCB" style="display: none"><input type="password" id="rpassword" class="movilbt" name="rpassword" placeholder="Repite Contraseña" required value="" onchange="activa2()">
                                                <span id="botoncitoCofP"  class="button">Confirmar Pass</span></span>
                                                <br /><br />
                                                
                                                
                                                <span id="CondicionesAcep" style="display: none">
                                                    <label><input type="checkbox" id="checkp" name="checkp" value="" required onchange="activa2()">&nbsp;<span name="pcheckp">He leído y entiendo la <?=$Empresa['condiciones'] == 1 ? '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/privacidad" target="_blank">Política de Privacidad</a>' : 'Política de Privacidad'?></span></label>
                                                </span>
                                                
                                                <span id="datosO" name="datosO" style="display: none">
                                                    <input type="radio" id="tipoC" name="tipoC" value="Particular" checked="" onchange="activa2()"> Particular
                                                    <input type="radio" id="tipoC" name="tipoC" value="Empresa" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'checked=""' : ''?> onchange="activa2()"> Empresa<br><br>
                                                    <span id="particular" name="particular" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'style="display: none"' : 'style="display: block"'?>>
                                                        <input type="radio" id="tipoD" name="tipoD" value="dni" checked="" onchange="activa2()"> DNI
                                                        <input type="radio" id="tipoD" name="tipoD" value="pass" <?=$_SESSION['datosregistro']['tipoD'] == 'pass' ? 'checked=""' : ''?> onchange="activa2()"> Passaporte
                                                        <input type="radio" id="tipoD" name="tipoD" value="nres" <?=$_SESSION['datosregistro']['tipoD'] == 'nres' ? 'checked=""' : ''?> onchange="activa2()"> NIE
                                                        <input type="radio" id="tipoD" name="tipoD" value="otro" <?=$_SESSION['datosregistro']['tipoD'] == 'otro' ? 'checked=""' : ''?> onchange="activa2()"> Otro<br><br>
                                                    </span>
                                                    
                                                    <span id="razons" name="razons" <?=$_SESSION['datosregistro']['tipoC'] == 'Empresa' ? 'style="display: block"' : 'style="display: none"'?>>
                                                        <input type="text" class="movilbt" id="rsocial" name="rsocial" placeholder="Razón Social" value="<?=$_SESSION['datosregistro']['rsocial']?>" style="max-width: 544px;"/>
                                                    </span>
                                                    
                                                    <input type="text" class="movilbt" id="dni" name="dni" placeholder="DNI" value="<?=$_SESSION['datosregistro']['dni']?>" required onchange="activa2()">
                                                    <input type="tel" class="movilbt" id="telefono" name="telefono" placeholder="Teléfono" required value="<?=$_SESSION['datosregistro']['telefono']?>" onchange="activa2()"/><br />
                                                    <input type="text" class="movilbt" id="nombre" name="nombre" placeholder="Nombre" required value="<?=$_SESSION['datosregistro']['nombre']?>" onchange="activa2()">
                                                    <input type="text" class="movilbt" id="apellidos" name="apellidos" placeholder="Apellidos" required value="<?=$_SESSION['datosregistro']['apellidos']?>" onchange="activa2()"><br />
                                                    
                                                    <span id="dnierr" name="dnierr" style="display: none; color: red"><b>¡DNI inválido!</b><br></span>
                                                    <input type="text" class="dobleF" id="direccion" name="direccion" placeholder="Dirección" required value="<?=$_SESSION['datosregistro']['direccion']?>" onchange="activa2()"><br />
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
                                                    <select id="provincia" class="movilbt" name="provincia" disabled required onchange="activa2()">
                                                            <option value="" selected>Selecciona primero un país</option>
                                                    </select><br />
                                                    <input type="hidden" id="idpro" name="idpro2" value="<?=$_SESSION['datosregistro']['provincia']?>" onchange="activa2()"/>
                                                    <input type="text" class="movilbt" id="localidad" name="localidad" placeholder="Localidad" value="<?=$_SESSION['datosregistro']['localidad']?>" required onchange="activa2()">
                                                    <input type="text" class="movilbt" id="cp" name="cp" class="mitadF2" pattern="[0-9A-Z]{5}" placeholder="C. Postal" required value="<?=$_SESSION['datosregistro']['cp']?>" onchange="activa2()"><br />
                                                    <span id="cpEr" name="cpEr" style="display: none; color: red"><b>¡El código postal no pertenece a la provincia elegida!</b><br></span><br /><br />


                                                    <div id="LbMessagesigin" style=" color: #E81F32;">
                                                            <?=($_GET['cuenta']) == 'sad' ? '<p>Ha ocurrido un problema con el registro, revisa los campos introducidos, y vuelve a intentarlo!</p>' : '';?>
                                                            <?=($_GET['cuenta']) == 'good' ? '<p style=" color: #006614;">Registro completado! Se ha enviado un correo de confirmación a su dirección de email.</p>' : '';?>
                                                    </div>
                                                    <span id="botoncitoCom22" class="button movilbt" style="float: right">Verificar Datos</span>
                                                    <input type="submit" id="continuar" class="button2 movilbt" style="float: right; -webkit-appearance: none; display: none" value="Continuar" disabled="">
                                                    <input type="hidden" name="registrar" value="1">
                                                    
                                                    <h5 style="display: inline-block; color: #E81F32; font-style: italic;">Todos los campos son obligatorios!</h5>
                                                </span>
                                            </span>
					</form>
					<?php
				}
			}
			else if (isset($_GET['pago']) && $_SESSION['compra']['paso'] >= 2)
			{
				?>
				<table id="comprabar">
					<tr id="comprabarn">
						<td><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pedido"><?=$auxprod?></a></td>
						<td><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>datos_personales"><?=$auxden?></a></td>
						<td><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pago"><?=$auxdpa?></a></td>
						<td><?=$auxconf?></td>
						<td><?=$auxfin?></td>
					</tr>
					<tr id="comprabarc">
						<td class="realizado"></td>
						<td class="realizado"></td>
						<td class="actual"></td>
						<td></td>
						<td></td>
					</tr>
				</table><br />
				<form method="post" name="pago" action="<?=$draizp?>/acc/confirmacion">
					<div style="margin: auto; max-width: 550px; width: 100%;">
						<h2><?=$auxfor?></h2>
						<select id="pagarcon" name="pagarcon" onchange="activa()">
							<option value="" selected><?=$auxpag?> *</option>
                            <?php
                            $actual = "http://".$_SERVER["HTTP_HOST"];
                            
                            
                            if((($pagosEspeciales['aplazame'] == 1 || $pagosEspeciales['fDirecta'] == 1) && $pagosEspeciales['domicim'] == 0 && $pagosEspeciales['paypalm'] == 0) || count($pagosEspeciales) == 0){
                                if (strlen($Empresa['paypal']) > 0){
                                    //if($actual == $Empresa['url'] || $activoPayDis == 1)
                                    $totalpaypal = $_SESSION['compra']['total'];
                                    if($Empresa['ippaypal'] != 0){
                                        $totalpaypal = $totalpaypal + (($totalpaypal*$Empresa['ippaypal'])/100);
                                    }
                                    if($Empresa['ifpaypal'] != 0){
                                        $totalpaypal = $totalpaypal + $Empresa['ifpaypal'];
                                    }
                                    if($Empresa['paypalNombre'] == ''){
                                        echo '<option value="pay">(PAYPAL) '.$auxpay.' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$totalpaypal), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                    }else{
                                        echo '<option value="pay"> '.$Empresa['paypalNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$totalpaypal), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                    }
                                }
                                if ($Empresa['tpv'] > 0){
                                    if($Empresa['tpvNombre'] == ''){
                                        echo '<option value="tar">(TARJETA) Débito/Crédito ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                    }else{
                                        echo '<option value="tar"> '.$Empresa['tpvNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                    }
                                }
                                if ($Empresa['tpv2'] > 0){
                                    if($actual != $Empresa['url']){
                                        if($Empresa['tpvNombre'] == ''){
                                            echo '<option value="tpv">(TARJETA) Débito/Crédito ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                        }else{
                                            echo '<option value="tpv"> '.$Empresa['tpvNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                        }
                                    }
                                }
                                if (strlen($Empresa['cuenta']) > 0){
                                    if($Empresa['transfeNombre'] == ''){
                                        echo '<option value="ccc">(TRANSFER) '.$auxtra.' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                    }else{
                                        echo '<option value="ccc"> '.$Empresa['transfeNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                    }
                                }
                                if ($Empresa['iban'] > 0){
                                    if($Empresa['transfeNombre'] == ''){
                                        echo '<option value="dom">(DOMIC) '.$auxdom.' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                    }else{
                                        echo '<option value="dom"> '.$Empresa['transfeNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';                                       
                                    }
                                }
                                if ($Empresa['contrareembolso'] > 0){
                                    if($Empresa['contraNombre'] == ''){
                                        echo '<option value="cre">(CONTRAR) '.$auxcont.' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                    }else{
                                        echo '<option value="cre"> '.$Empresa['contraNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                    }
                                }
                                if ($Empresa['entienda'] > 0){
                                    if($Empresa['tiendaNombre'] == ''){
                                        echo '<option value="tie">(TIENDA) '.$auxtie.' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                    }else{
                                        echo '<option value="tie"> '.$Empresa['tiendaNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';                                        
                                    }
                                }
                                 if($pagosEspeciales['fDirecta'] == 1)
                                    echo '<option value="fdir">(FIN.DIR.) Financiación Directa ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['cuota']), 2, ',', '.').$_SESSION['moneda'].' x '.$pagosEspeciales['meses'].' meses)</option>';
                                if($pagosEspeciales['aplazame'] == 1){
                                    if($Empresa['aplazaNombre'] == ''){
                                        echo '<option value="fapl">(FIN.APL.) Financiación Aplazame ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame1']), 2, ',', '.').$_SESSION['moneda'].' + '.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame']), 2, ',', '.').$_SESSION['moneda'].'/mes)</option>';
                                    }else{
                                        echo '<option value="fapl"> '.$Empresa['aplazaNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame1']), 2, ',', '.').$_SESSION['moneda'].' + '.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame']), 2, ',', '.').$_SESSION['moneda'].'/mes)</option>';
                                    }
                                }
                            }else{
                                if($pagosEspeciales['paypalm'] == 1){
                                    $totalpaypal = $_SESSION['compra']['total'];
                                    if($Empresa['ippaypal'] != 0){
                                        $totalpaypal = $totalpaypal + (($totalpaypal*$Empresa['ippaypal'])/100);
                                    }
                                    if($Empresa['ifpaypal'] != 0){
                                        $totalpaypal = $totalpaypal + $Empresa['ifpaypal'];
                                    }
                                        echo '<option value="paym">(PAYPAL) Paypal Subscripción ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$totalpaypal), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                }
                                if($pagosEspeciales['domicim'] == 1)
                                    echo '<option value="domm">(DOMIC) Domiciliación Subscripción ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$_SESSION['compra']['total']), 2, ',', '.').$_SESSION['moneda'].')</option>';
                                if($pagosEspeciales['fDirecta'] == 1)
                                    echo '<option value="fdir">(FIN.DIR.) Financiación Directa ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['cuota']), 2, ',', '.').$_SESSION['moneda'].' x '.$pagosEspeciales['meses'].' meses)</option>';
                                if($pagosEspeciales['aplazame'] == 1){
                                    if($Empresa['aplazaNombre'] == ''){
                                        echo '<option value="fapl">(FIN.APL.) Financiación Aplazame ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame']), 2, ',', '.').$_SESSION['moneda'].'/mes)</option>';
                                    }else{
                                        echo '<option value="fapl"> '.$Empresa['aplazaNombre'].' ('.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$pagosEspeciales['caplazame']), 2, ',', '.').$_SESSION['moneda'].'/mes)</option>';
                                    }
                                }
                            }
                            ?>
						</select>
                            <br /><br />
                            <div id="divpagarcon" style="display: none;">
                            <input id="nentidad" name="nentidad" placeholder="Entidad" class="dobleF" value="" type="text" onchange="activa()">
                            <span style="color:blue"><small>Nombre de su banco</small></span><br><br>
                            <input id="iban" name="iban" placeholder="ESXX" value="" pattern="[A-Za-z]{2}[0-9]{2}" maxlength="4" type="text" onchange="activa()">
                            <input id="entidad" name="entidad" placeholder="XXXX" value="" pattern="[0-9]{4}" maxlength="4"  type="text" onchange="activa()"><br>
                            <span style="color:blue;"><small>Código IBAN (ES00) y primeros 4 dígitos de su cuenta</small></span><br><br>
                            <input id="oficina" name="oficina" placeholder="XXXX" value="" pattern="[0-9]{4}" maxlength="4"  type="text" onchange="activa()">
                            <input id="dc" name="dc" placeholder="XXXX" value="" pattern="[0-9]{4}" type="text" maxlength="4"  onchange="activa()"><br>
                            <span style="color:blue;"><small>8 siguientes dígitos de su cuenta</small></span><br><br>
                            <input id="ccc" name="ccc" placeholder="XXXX" value="" pattern="[0-9]{4}" type="text" maxlength="4" onchange="activa()">
                            <input id="ccc2" name="ccc2" placeholder="XXXX" value="" pattern="[0-9]{4}" type="text" maxlength="4"  onchange="activa()"><br>
                            <span style="color:blue;"><small>Últimos 8 dígitos de su cuenta</small></span><br><br>
                            <span id='ncuentaEr' style="color:red; display: none"><b>¡Nº de cuenta erroneo!</b></span>
                            <!--<label>El continuar con el proceso indica que usted acepta las <a style="text-transform: uppercase;" href="/source/Terminos_y_Condiciones_del_Contrato.pdf" target="_blank">condiciones de contratación</a>.</label>-->
                            <br><br><br>
                        </div>
                            
                            <div id="divpagarcon2" style="display: none;">
                            <img src="<?=$draizp?>/source/pagoseguro.jpg" style="float: left ! important; width: 150px ! important; margin-bottom: 20px ! important;">
                            <input id="nombre" name="nombre" placeholder="Nombre" class="dobleF" value="" type="text" onchange="activa()"><br><br>
                            <input id="numero" name="numero" placeholder="Nº Tarjeta" class="dobleF" value="" pattern="[0-9]{16}" type="text" maxlength="16" onchange="activa()"><br><br>
                            <input id="fecha" name="fecha" placeholder="Fecha caducidad (MM/YY)" value="" pattern="[0-9]{2}[/][0-9]{2}" maxlength="5" type="text" onchange="activa()">
                            <input id="cvc" name="cvc" placeholder="CVC" value="" pattern="[0-9]{3}" type="text" maxlength="3" onchange="activa()"><br><br>
                            <br><br><br>
                        </div>
					</div>
                                    <input type="submit" class="button2" name="BtSubmit" id="BtSubmit" style="float: right; -webkit-appearance: none;" value="<?=$auxcon?>" disabled="">
                                        
					<span type="submit" class="button" onclick="location.href='<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta';">Anterior</span>&nbsp;&nbsp;&nbsp;
					<h5 style="display: inline-block; color: #E81F32; font-style: italic;">Los campos marcados con * son obligatorios!</h5>
				</form>
				<?php
			}
			else if (isset($_GET['pedido']) && $_SESSION['compra']['paso'] >= 0)
			{
				?>
				<table id="comprabar">
					<tr id="comprabarn">
						<td><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pedido"><?=$auxprod?></a></td>
						<td><?=$auxden?></td>
						<td><?=$auxdpa?></td>
						<td><?=$auxconf?></td>
						<td><?=$auxfin?></td>
					</tr>
					<tr id="comprabarc">
						<td class="actual"></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table><br />
				<h2>Tu Pedido</h2>
				
				<?php
				if(count($pedido)<1){ echo '<p>No hay productos en tu cesta!</p>';
                                }else
				{
					?>
                                <style>
                                    @media (min-width:1050px)
                                    {
                                        .SMXS{
                                            display: none;
                                        }
                                    }
                                    @media (max-width:1050px)
                                    {
                                        .MDLG{
                                            display: none;
                                        }
                                    }
                                </style>
					<table id="tcesta">
						<thead>
							<tr>
								<th <?=$Empresa['permBor'] == 0 ? 'style="display:none"':''?>></th>
                                                                <th colspan="2" class="MDLG"><?=$auxprod?></th>
                                                                <th colspan="1" class="SMXS"><?=$auxprod?></th>
								<th><?=$auxcan?></th>
								<th>Precio/Und.</th>
								<th>Precio/Per</th>
								<th><?=$auxtot?></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$total = 0;
								$peso = 0;
								foreach ($pedido AS $micesta)
								{
									$total += ($micesta['precio'] + $micesta['personalizacion']) * $micesta['cantidad'];
									$peso += ($micesta['peso'] * $micesta['cantidad']);
							?>
									<tr>
										<?php if($Empresa['permBor'] == 1){ ?><td style="text-align: center"><?php if($Empresa['etiqProCesta'] == 1){ ?><?=$Empresa['etiqpro'] == 1 ? ($micesta['tipo'] == 0 ? '<span class="venta-label">Venta</span><br>' : ($micesta['tipo'] == 3 ? '<span class="alquiler-label">Alquiler</span><br>' : '')) : '' ?><?php } ?><?php if ($micesta['id'] > 0) { ?><a href="<?=$draizp?>/acc/quitarp/<?=$micesta['id']?>/<?=$micesta['talla'] != null ? $micesta['talla'] : 'nada'?>/<?=$micesta['pack'] !== true ? $micesta['extra'] : 'null'?>" onclick="return confirm('Seguro que desea elminar el <?=$micesta['pack'] !== true ? 'producto' : 'pack'?> `<?=$micesta['nombre']?><?=($micesta['talla']!=null ? ' ('.$micesta['talla'].')' : '(nada)')?><?=($micesta['color']!=null ? ' ('.$micesta['color'].')' : '')?>` de su cesta?');">X</a><?php } ?></td>
                                                                                <?php }else{ ?><td style="display: none"></td><?php } ?>
										<td style="position: relative;">
                                                                                    <?php if($micesta['afiliado'] != ''){
                                                                                        $urlImagen = "http://tienda.camaltec.es";
                                                                                        $urlArticulo = $micesta['nombre'];
                                                                                    }else{
                                                                                        $urlImagen = $draizp;
                                                                                        if($micesta['pack'] != true )
                                                                                            $urlArticulo = "<a href='".$draizp."/".$_SESSION['lenguaje']."producto/".$micesta['id']."'>".$micesta['nombre']."</a>";
                                                                                        else
                                                                                            $urlArticulo = "<a href='".$draizp."/".$_SESSION['lenguaje']."pack/".$micesta['id']."'>".$micesta['nombre']."</a>";
                                                                                    } ?>
											<img src="<?=$urlImagen?>/imagenesproductos/<?=$micesta['imagen']?>" alt="<?=$micesta['nombre']?>">
											<?php if ($micesta['stock'] != null) { ?><img style="position: absolute; right: 0px;" src="<?=$draizp?>/source/<?=$micesta['stock']?>" alt=""><?php } ?>
										</td>
										<td>
                                                                                    
											<?php if(is_numeric($micesta['descuento'])) { ?><?=$urlArticulo?><?php } else { ?><span class="enlazado"><?=$micesta['nombre']?></span><?php } ?>
											<?php if($micesta['fDirecta'] == '1') { ?><span>+ <?=number_format($micesta['cuota'],2,',','.')?>€/mes x <?=$micesta['meses']?>meses</span><?php } ?>
                                                                                        <span><?=($micesta['talla']!=null ? $micesta['talla'] : '')?> <?=($micesta['color']!=null ? ' ('.$micesta['color'].')' : '')?><?=($micesta['extra']!=null ? $micesta['extra'] : '')?></span>
                                                                                        <?php if($micesta['aplazame'] == 1){ ?>
                                                                                            <span>Financialo con Aplazame por <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['caplazame1']), 2, ',', '.')?><?=$_SESSION['moneda']?> + <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['caplazame']), 2, ',', '.')?><?=$_SESSION['moneda']?> al mes</span>
                                                                                        <?php } ?>
										</td>
										<td style="min-width: 130px;">
                                                                                    <?php if($Empresa['permCant'] == 1){ ?>
                                                                                        <script>
                                                                                            function sumar(producto){
                                                                                                producto = '#'+producto;
                                                                                                jQuery(producto).val(parseInt(jQuery(producto).val())+1);
                                                                                            }
                                                                                            function restar(producto){
                                                                                                producto = '#'+producto;
                                                                                                if((parseInt(jQuery(producto).val())-1) > 0)
                                                                                                    jQuery(producto).val(parseInt(jQuery(producto).val())-1);
                                                                                            }
                                                                                        </script>
                                                                                        <form method="post" name="cesta<?=$micesta['id']?>" action="<?=$draizp?>/acc/actualizarp/<?=$micesta['id']?>">
                                                                                            <button style="padding: 3px;background-color: <?=$colores2['colorbotonform']?>;color: white;margin-top: 6px;" onclick="sumar('cantidad<?=$micesta['id']?>')">+</button>
                                                                                                <input type="text" class="miniF" id="cantidad<?=$micesta['id']?>" name="cantidad" value="<?=$micesta['cantidad']?>"<?=$micesta['id'] > 0 ? '' : ' readonly'?> />
                                                                                            <button style="padding: 3px;background-color: <?=$colores2['colorbotonform']?>;color: white;margin-top: 6px;" onclick="restar('cantidad<?=$micesta['id']?>')">-</button>
                                                                                                <input type="hidden" id="htalla<?=$micesta['id']?>" name="htalla" value="<?=$micesta['pack'] !== true ? $micesta['talla'] : 'null'?>" />
                                                                                                <input type="hidden" id="hcolor<?=$micesta['id']?>" name="hcolor" value="<?=$micesta['pack'] !== true ? $micesta['extra'] : 'null'?>" />
                                                                                        </form>
                                                                                    <?php }else{ ?>
                                                                                        <form method="post" action="#">
												<input type="text" class="miniF" id="cantidad<?=$micesta['id']?>" name="cantidad" value="<?=$micesta['cantidad']?>" readonly />
											</form>
                                                                                    <?php } ?>
										</td>
										<td>
											<?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['precio']), 2, ',', '.')?> <?=$_SESSION['moneda']?>
											<?=($micesta['descuento'] > 0 ? '<span>-'.$micesta['descuento'].'%</span>' : ($micesta['descuentoe'] > 0 ? '<span>-'.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['descuentoe']), 2, ',', '.'). $_SESSION['moneda'].'</span>' : ''))?>
											<?=($micesta['precio'] < $micesta['precio_ant'] ? '<span style="text-decoration: line-through;">'.number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['precio_ant']), 2, ',', '.'). $_SESSION['moneda'].'</span>' : '')?>
										</td>
										<td><?=$micesta['personalizacion'] != null ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$micesta['personalizacion']), 2, ',', '.').$_SESSION['moneda'] : 'N/A'?></td>
										<td><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($micesta['precio'] + $micesta['personalizacion']) * $micesta['cantidad'])), 2, ',', '.')?> <?=$_SESSION['moneda']?></td>
									</tr>
							<?php
								}
								
								if($Empresa['tipoportes'] == 0){
                                                                    $portes = CalculaPortesP($total);
                                                                    $portes = str_replace(',', '.', $portes[0]);                                                                    
                                                                }else if($Empresa['tipoportes'] == 1){
                                                                    $portes_ar = CalculaPortesKm($total);
                                                                    $logoPortes = $portes_ar[1];
                                                                    $portes = $portes_ar[0];
                                                                    $portes = str_replace(',', '.', $portes);
                                                                    if($portes_ar[0]<0){
                                                                        echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$draizp.'/'.$_SESSION['lenguaje'].'/cesta">';
                                                                        exit;
                                                                     }
                                                                }else if($Empresa['tipoportes'] == 2){
                                                                    $portes = CalculaPortesProv($total);
                                                                    if($portes >= 0){
                                                                        $portes = number_format($portes, 2, ',', '.');
                                                                        $portes = str_replace(',', '.', $portes);
                                                                    }else{
                                                                        $portes = -4;
                                                                    }
                                                                }else if($Empresa['tipoportes'] == 3){
                                                                    $portes = CalculaPortesProvP($total, $peso);
                                                                    if($portes >= 0){
                                                                        $portes = number_format($portes, 2, ',', '.');
                                                                        $portes = str_replace(',', '.', $portes);
                                                                    }else{
                                                                        $portes = -4;
                                                                    }
                                                                }
								
                                                                $abono = Abono(@$_SESSION['usr']['id']);
								$total = $total - $abono;
								
								if ($abono > 0)
								{
									?>
										<tr>
											<?php if($Empresa['permBor'] == 1){ ?><td></td><?php }else{ ?><td style="display: none"></td><?php } ?>
											<td style="position: relative;"><img src="<?=$draizp?>/imagenesproductos/abonos.png" alt="<?=$micesta['nombre']?>"></td>
											<td><span class="enlazado">Abonos acumulados</span><span>Descuentos acumulables por opinar</span></td>
											<td>
												<form method="post" action="#">
													<input type="text" class="miniF" name="desertor" value="1" readonly />
												</form>
											</td>
											<td>- <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$abono), 2, ',', '.')?> <?=$_SESSION['moneda']?></td>
											<td>N/A</td>
											<td>- <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$abono), 2, ',', '.')?> <?=$_SESSION['moneda']?></td>
										</tr>
									<?php
								}
                                                 
                                                if (isset($_POST['prm'])){
                                                    @$_SESSION['compra']['codpromo'] = $_POST['codpromo'];
                                                }
                                                                
                                                if (@$_SESSION['compra']['codpromo'] != null && @$_SESSION['compra']['codpromo'] != '')
						{
                                                $pcode = CodigoPromocional(strtolower($_SESSION['compra']['codpromo']), $total);
                                                if ($pcode != null)
                                                {
                                                    if ($pcode['tipo'] == $_SESSION["moneda"])
                                                        $total = $total - $pcode['descuento'];
                                                    else
                                                        $total = $total - ($total * ($pcode['descuento'] / 100));
                                                    
                                                    //echo $total;
                                                    ?>
                                                        <tr>
                                                            <?php if($Empresa['permBor'] == 1){ ?><td></td><?php }else{ ?><td style="display: none"></td><?php } ?>
                                                            <td style="position: relative;"><img src="<?=$Empresa['promocionIcon'] != '' ? 'iconos/'.$Empresa['promocionIcon'] : '/imagenesproductos/descuentos.png'?>" alt="Código Promocional"></td>
                                                            <td><span class="enlazado">Código Promocional</span><span><?=strtoupper($_SESSION['compra']['codpromo'])?><br><?=$pcode['promocion']?></span></td>
                                                            <td>
                                                                <form method="post" action="#">
                                                                    <input type="text" class="miniF" name="desertor" value="1" readonly />
                                                                </form>
                                                            </td>
                                                            <td>-<?=number_format($pcode['descuento'], 2, ',', '.')?> <?=$pcode['tipo']?></td>
                                                            <td></td>
                                                            <td>-<?=number_format($pcode['descuento'], 2, ',', '.')?> <?=$pcode['tipo']?></td>
                                                        </tr>
                                                    <?php
                                                }
											}
                                if($_SESSION['usr'] != null || $Empresa['portes_gratis'] == 0){
                                    if(($portes > 0 || $Empresa['portes_gratis'] == 0) && $portes != -4){ //Para portes gratis
                                    ?>
                                    <tr>
                                        <?php if($Empresa['permBor'] == 1){ ?><td></td><?php }else{ ?><td style="display: none"></td><?php } ?>
                                        <td style="position: relative;"><img src="<?=$Empresa['transporteIcon'] != '' ? 'iconos/'.$Empresa['transporteIcon'] : $draizp.'/imagenesproductos/portes.png'?>" alt="<?=$micesta['nombre']?>"></td>
                                        <td><span class="enlazado"><?=$auxgas?></span><span><?=$auxtgas?> <?=$_SESSION['usr']['provinciaEnv']?>, <?=$_SESSION['usr']['paisEnvN']?></span></td>
                                        <td>
                                            <form method="post" action="#">
                                                <input type="text" class="miniF" name="desertor" value="1" readonly />
                                            </form>
                                        </td>
                                        <td><?=$portes > 0 ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$portes), 2, ',', '.') : $auxgra?></td>
                                        <td>N/A</td>
                                        <td><?=$portes > 0 ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$portes), 2, ',', '.').$_SESSION['moneda'] : $auxgra?></td>
                                    </tr>
                                                                    <?php }else if($portes == -4){ ?>
                                                                        <tr>
                                        <?php if($Empresa['permBor'] == 1){ ?><td></td><?php }else{ ?><td style="display: none"></td><?php } ?>
                                        <td style="position: relative;"><img src="<?=$Empresa['transporteIcon'] != '' ? 'iconos/'.$Empresa['transporteIcon'] : $draizp.'/imagenesproductos/portes.png'?>" alt="<?=$micesta['nombre']?>"></td>
                                        <td><span class="enlazado"><?=$auxgas?></span><span><?=$auxtgas?> <?=$_SESSION['usr']['provinciaEnv']?>, <?=$_SESSION['usr']['paisEnvN']?></span></td>
                                        <td>
                                            <form method="post" action="#">
                                                <input type="text" class="miniF" name="desertor" value="1" readonly />
                                            </form>
                                        </td>
                                                                            <td colspan="3">Actualmente no realizamos entrega en la provincia de <?=$_SESSION['usr']['provinciaEnv']?></td>
                                    </tr>
                                    <?php } 
                                } ?>

								<tr>
                                                                    
									<?php if($Empresa['permBor'] == 1){ ?><td></td><?php }else{ ?><td style="display: none"></td><?php } ?>
                                                                        <td></td>
									<td colspan="2" style="height: 55px">
                                        <?php if($Empresa['desglose'] == 1){ ?>
                                            Base Imp.&nbsp;&nbsp;
                                            <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * 100)), 2, ',', '.').$_SESSION['moneda']?>&nbsp;&nbsp;-&nbsp;
                                            <!--IVA-->(21%)&nbsp;&nbsp;
                                            <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],(($total / (100+$Empresa['impuesto'])) * $Empresa['impuesto'])), 2, ',', '.').$_SESSION['moneda']?>
                                        <?php } ?>
									</td>
									<td colspan="2">Total&nbsp;&nbsp;<strong><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],($total+ $portes)), 2, ',', '.')?> <?=$_SESSION['moneda']?></strong></td>
								</tr>
						</tbody>
					</table>
				<?php
                                $_SESSION['compra']['total'] = $total+ $portes;
				
                                
                                if ($pcode == null){
                                ?>
                                
                                <form method="post" name="cesta" action="/<?=$_SESSION['lenguaje']?>pedido">
                                    <table><tr><td>Código promocional:</td><td><input type="text" class="dobleF" id="codpromo" name="codpromo" placeholder="Código Promocional" value="" /></td>
                                    <td style="text-align:right;"><span type="submit" class="button" name="BtSubmit">Aplicar promoción</span></td></tr></table>
                                    <input type="hidden" name="prm" value="1" />
                                </form>
                                    
                                <?php
                                    }
                                    }
                                ?>
				<form method="post" name="pedido" action="<?=$draizp?>/acc/datos_personales">
					<?php if($portes != -4){ ?><span type="submit" class="button" style="float: right;" name="BtSubmit"><?=$auxemp?></span><?php } ?>
                                        <img id="csegura" src="<?=$draizp?>/source/csegura.png" style="margin-top: 18px; float: left;">
					<!--<span type="submit" class="button" onclick="location.href='/<?=$_SESSION['lenguaje']?>pedido';"><?=$auxactu?></span>
					<span type="submit" class="button" onclick="location.href='/<?=$_SESSION['lenguaje']?>cesta';"><?=$auxvol?></span> -->
				</form>
				<?php
			}
			else
				echo '<script>window.location="/error404";</script>';
            endif;
		?>
	</div>
</div>