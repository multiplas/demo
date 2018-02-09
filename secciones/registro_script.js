//&& comprobarDNI(document.getElementById("dni").value
function activa2(){
        var dev = false;
        if(document.getElementById("nombre").value != '' && document.getElementById("apellidos").value != '' && document.getElementById("dni").value != '' 
            && document.getElementById("telefono").value != '' && document.getElementById("direccion").value != '' && document.getElementById("pais").value != '' 
            && document.getElementById("provincia").value != '' && document.getElementById("localidad").value != '' && document.getElementById("cp").value != '' 
            && document.getElementById("email").value != '' && document.getElementById("cemail").value != '' && emailsIgu(document.getElementById("email").value, document.getElementById("cemail").value)
            && document.getElementById("password").value != '' && document.getElementById("rpassword").value != '' && document.getElementById("checkp").checked 
            && compruebaSiOK(document.getElementById("dni").value) && PassIgu(document.getElementById("password").value, document.getElementById("rpassword").value) && comprobarCP()){
            jQuery("#botoncitoCom22").attr('style', 'display: none');
            jQuery("#nombre").attr('style', '');
            jQuery("#apellidos").attr('style', '');
            jQuery("#telefono").attr('style', 'border-width: 0px;');
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


    jQuery(document).on("click", "#botoncitoCom22", function(){
        if(document.getElementById("nombre").value == ''){
            jQuery("#nombre").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
        }else{
            jQuery("#nombre").attr('style', '');
        }
        
        if(document.getElementById("apellidos").value == ''){
            jQuery("#apellidos").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
        }else{
            jQuery("#apellidos").attr('style', '');
        }
        
        if(document.getElementById("dni").value == ''){
            jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
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
                   }
                  break;
          }
        }
        
        if(document.getElementById("telefono").value == ''){
            jQuery("#telefono").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
        }else{
            jQuery("#telefono").attr('style', '');
        }
        
        if(document.getElementById("direccion").value == ''){
            jQuery("#direccion").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
        }else{
            jQuery("#direccion").attr('style', '');
        }
        
        if(document.getElementById("pais").value == ''){
            jQuery("#pais").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
        }else{
            jQuery("#pais").attr('style', '');
        }
        
        if(document.getElementById("provincia").value == ''){
            jQuery("#provincia").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
        }else{
            jQuery("#provincia").attr('style', '');
        }
        
        if(document.getElementById("localidad").value == ''){
            jQuery("#localidad").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
        }else{
            jQuery("#localidad").attr('style', '');
        }
        
        if(document.getElementById("cp").value == ''){
            jQuery("#cp").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
        }else{
            comprobarCP();
        }
    });

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
    
    jQuery(document).ready(function(){ 
        if(jQuery("#email").val() != '')
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
        if($em1 != $em2){
            jQuery("#emailD").attr('style', 'display: block; color: red');
            jQuery("#PassO").attr('style', 'display: none;');
            jQuery("#botoncitoCof").attr('style', '');
            dev = false;
        }else{
            jQuery("#emailD").attr('style', 'display: none; color: red');
            jQuery("#PassO").attr('style', 'display: block;');
            jQuery("#botoncitoCof").attr('style', 'display: none;');
            jQuery.post(jQuery('#mailValue').val(), {mail: $em1}, function(){});
        }
        return dev;
    }
    
    function PassIgu($em1, $em2){
        var dev = true;
        if($em1 != $em2){
            jQuery("#passD").attr('style', 'display: block; color: red');
            jQuery("#CondicionesAcep").attr('style', 'display: none;');
            jQuery("#botoncitoCofP").attr('style', '');
            dev = false;
        }else{
            jQuery("#passD").attr('style', 'display: none; color: red');
            jQuery("#CondicionesAcep").attr('style', 'display: block;');
            jQuery("#botoncitoCofP").attr('style', 'display: none;');
        }
        return dev;
    }
    
    function comprobar(){
        if(jQuery("#email").val() != ''){
            jQuery.post(jQuery('#dirValue').val(), {mail: jQuery("#email").val()}, function(respuesta){ 
                if(respuesta.trim() == 'true'){
                    jQuery("#botoncitoCof").attr('style', 'visibility: hidden;');
                    jQuery("#emailinv").attr('style', 'display: none; color: red');
                    jQuery("#yareg").attr('style', 'display: block; color: red');
                    jQuery("#PassO").attr('style', 'display: none;');
                    jQuery("#datosO").attr('style', 'display: none;');
                    jQuery("#cemail").attr('style', 'visibility: hidden;');
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
            jQuery("#botoncitoCom").attr('style', '');
        }
    }
    
    function comprobarCP(){
        if(jQuery("#cp").val() != ''){
            if(jQuery("#provincia").val() != ''){
                jQuery.ajaxSetup({async: false});
                jQuery.post(jQuery('#cpValue').val(), {cp: jQuery("#cp").val(), city: jQuery("#provincia").val(), pais: jQuery("#pais").val()}, function(respuesta){ 
                     if(respuesta){
                         jQuery("#cpEr").attr('style', 'display: none; color: red');
                         jQuery("#cp").attr('style', '');
                         mensaje = true;
                     }else{
                         jQuery("#cpEr").attr('style', 'display: block; color: red');
                         jQuery("#cp").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
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
        jQuery("#dni").attr('style', '');
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
                                }
               break;
       }
    });
    
    jQuery(document).on("change", "#tipoD", function(){
       jQuery("#dnierr").attr('style', 'display: none; color: red');
       jQuery("#dni").attr('style', '');
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
        
        if(dni.length >= 9){
            if(expresion_regular_dni.test (dni) == true){
               numero = dni.substr(0,dni.length-1);
               letr = dni.substr(dni.length-1,1);
               numero = numero % 23;
               letra='TRWAGMYFPDXBNJZSQVHLCKET';
               letra=letra.substring(numero,numero+1);
                if (letra!=letr.toUpperCase()){
                    jQuery("#dnierr").html('<b>¡DNI erroneo!</b>');
                    jQuery("#dnierr").attr('style', 'display: block; color: red');
                    jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');                    
                }else{
                    jQuery("#dnierr").html('<b>¡DNI erroneo!</b>');
                    jQuery("#dnierr").attr('style', 'display: none; color: red');
                    jQuery("#dni").attr('style', '');
                    dev = true;
                }
            }
        }else{
            jQuery("#dnierr").html('<b>¡DNI erroneo!</b>');
            jQuery("#dnierr").attr('style', 'display: block; color: red');
            jQuery("#cp").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
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
                jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
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
               jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
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
                                jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
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
                                        jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
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
                                jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
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
                                        jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
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
                                jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
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
                                        jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
				}				
			}
		}
		else
		{
			dev = false;
                        jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                        jQuery("#dnierr").attr('style', 'display: block; color: red');
                        jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
		}		
	}else if (a.length==14){//14 caracteres, los 2 primeros letras
		var temp1=temp.substr(0,2);
		if (isAlphabetic(temp1)!=true)	
			{
                            dev = false;
                            jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                            jQuery("#dnierr").attr('style', 'display: block; color: red');
                            jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
			}
	}
	else
	{
			dev = false;
                        jQuery("#dnierr").html('<b>¡NIE erroneo!</b>');
                        jQuery("#dnierr").attr('style', 'display: block; color: red');
                        jQuery("#dni").attr('style', 'border-color: red; border-style: solid; border-width: 3px;');
 
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
                                }
               break;
       }
       return dev;
    }
