// JavaScript Document

var $draiz = '';//eliminar

function CargaDeProvincias()
{
	estado = jQuery("#pais").val();
	idpro = jQuery("#idpro").val();
	idioma = 'Elige un país';
 
	if(estado == ""){		
		jQuery("#provincia").prop('disabled', 'disabled');
	}
	else {
		jQuery("#provincia").prop('disabled', false);
		jQuery.ajax({
			type:  'POST',
			dataType: "json",
			data: {"estado": estado, "idpro": idpro, "idioma": idioma},
			url:   $draiz + '/scripts/ciudades.php',
			beforeSend: function(){
				//Lo que se hace antes de enviar el formulario
				},
			success: function(respuesta){
				//lo que se si el destino devuelve algo
				jQuery("#provincia").html(respuesta.html);
			},
			error:    function(xhr,err){
				alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
			}
		})
		.done(function( data, textStatus, jqXHR ) {
			if ( console && console.log ) {
				console.log( "La solicitud se ha completado correctamente." );
			}
		})
		.fail(function( jqXHR, textStatus, errorThrown ) {
			if ( console && console.log ) {
				console.log( "La solicitud a fallado: " +  textStatus);
			}
		});
	}
}

function CargaDeProvincias2()
{
	$estado = jQuery("#paisE").val();
	$idpro = jQuery("#idpro2").val();
	$idioma = 'Elige un país';
 
	if($estado == ""){
		jQuery("#provinciaE").prop('disabled', 'disabled');
	}
	else {
		jQuery("#provinciaE").prop('disabled', false);
		jQuery.ajax({
			dataType: "json",
			data: {"estado": $estado, "idpro": $idpro, "idioma": $idioma},
			url:   $draiz + '/scripts/ciudades.php',
			type:  'post',
			beforeSend: function(){
				//Lo que se hace antes de enviar el formulario
				},
			success: function(respuesta){
				//lo que se si el destino devuelve algo
				jQuery("#provinciaE").html(respuesta.html);
			},
			error:    function(xhr,err){
				//alert("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\n \n responseText: "+xhr.responseText);
			}
		});
	}
}

function AbrirMenu()
{ // Marca del color por defecto para errores de formulario los que no se han validado.
    jQuery('#grupo-submenu #submenu-r').addClass('menuabierto');
    jQuery('#grupo-submenu #submenu-op').addClass('menuabiertobt');
	jQuery('ul#despl').css('display', 'block');
    /*jQuery('#grupo-submenu #submenu-r ul').addClass('menuabierto');*/
}


function CerrarMenu()
{ // Marca del color por defecto para errores de formulario los que no se han validado.
    jQuery('#grupo-submenu #submenu-r').removeClass('menuabierto');
    jQuery('#grupo-submenu #submenu-op').removeClass('menuabiertobt');
	jQuery('ul#despl').css('display', 'none');
    /*jQuery('#grupo-submenu #submenu-r ul').removeClass('menuabierto');*/
}


function ValidarFormularios(formulario)
{
	var valido = true;
	var campos = '';
	var comprobar;
    var mensajeserr = [];
	
	switch (formulario)
	{
		case 'login':
			
			jQuery('input[name="user"]').removeClass("noValido");
			comprobar = jQuery('input[name="user"]').val();
			if(comprobar.length < 8)
			{
				campos += 'input:user;';
				mensajeserr.push( 'El correo electrónico debe tener mínimo 8 caracteres.' );
				valido = false;
			}
			
			jQuery('input[name="pass"]').removeClass("noValido");
			comprobar = jQuery('input[name="pass"]').val();
			if(comprobar.length < 4)
			{
				campos += 'input:pass;';
				mensajeserr.push( 'La contraseña debe tener mínimo 4 caracteres.' );
				valido = false;
			}
			
			break;
		
		case 'modpwd':
			
			jQuery('input[name="pass"]').removeClass("noValido");
			comprobar = jQuery('input[name="pass"]').val();
			if(comprobar.length < 4)
			{
				campos += 'input:pass;';
				mensajeserr.push( 'Hay que rellenar la contraseña actual para poder verfificar los cambios.' );
				valido = false;
			}
			
			jQuery('input[name="npass"]').removeClass("noValido");
			comprobar = jQuery('input[name="npass"]').val();
			if(comprobar.length < 4)
			{
				campos += 'input:npass;';
				mensajeserr.push( 'La contraseña debe tener mínimo 4 caracteres.' );
				valido = false;
			}
			
			jQuery('input[name="rnpass"]').removeClass("noValido");
			comprobar = jQuery('input[name="rnpass"]').val();
			if(comprobar.length < 4 || comprobar != jQuery('input[name="npass"]').val())
			{
				campos += 'input:rnpass;';
				mensajeserr.push( 'La contraseña debe tener mínimo 4 caracteres y deben coincidir en ambos campos.' );
				valido = false;
			}
			
			break;
		
		case 'modema':
			
			jQuery('input[name="nemail"]').removeClass("noValido");
			comprobar = jQuery('input[name="nemail"]').val();
			if(comprobar.length < 8)
			{
				campos += 'input:nemail;';
				mensajeserr.push( 'El correo electrónico debe tener mínimo 8 caracteres.' );
				valido = false;
			}
			
			jQuery('input[name="rnemail"]').removeClass("noValido");
			comprobar = jQuery('input[name="rnemail"]').val();
			if(comprobar.length < 8 || comprobar != jQuery('input[name="nemail"]').val())
			{
				campos += 'input:rnemail;';
				mensajeserr.push( 'El correo electrónico debe tener mínimo 8 caracteres y deben coincidir en ambos campos.' );
				valido = false;
			}
			
			jQuery('input[name="epass"]').removeClass("noValido");
			comprobar = jQuery('input[name="epass"]').val();
			if(comprobar.length < 4)
			{
				campos += 'input:epass;';
				mensajeserr.push( 'Hay que rellenar la contraseña actual para poder verfificar los cambios.' );
				valido = false;
			}
			
			break;
			
		case 'moddat':
			
			jQuery('input[name="nombre"]').removeClass("noValido");
			comprobar = jQuery('input[name="nombre"]').val();
			if(comprobar.length < 3)
			{
				campos += 'input:nombre;';
				mensajeserr.push( 'El nombre debe tener mínimo 4 caracteres.' );
				valido = false;
			}
			
			jQuery('input[name="dni"]').removeClass("noValido");
			comprobar = jQuery('input[name="dni"]').val();
			if(comprobar.length < 9)
			{
				campos += 'input:dni;';
				mensajeserr.push( 'El DNI tiene que ser valido.' );
				valido = false;
			}
			
			jQuery('input[name="telefono"]').removeClass("noValido");
			comprobar = jQuery('input[name="telefono"]').val();
			if(comprobar.length < 9)
			{
				campos += 'input:telefono;';
				mensajeserr.push( 'El telefono tiene que ser valido.' );
				valido = false;
			}
			
			jQuery('input[name="direccion"]').removeClass("noValido");
			comprobar = jQuery('input[name="direccion"]').val();
			if(comprobar.length < 4)
			{
				campos += 'input:direccion;';
				mensajeserr.push( 'La dirección debe tener mínimo 4 caracteres.' );
				valido = false;
			}
			
			jQuery('select[name="provincia"]').removeClass("noValido");
			comprobar = jQuery('select[name="provincia"]').val();
			if(comprobar.length < 1)
			{
				campos += 'select:provincia;';
				mensajeserr.push( 'Debe seleccionar una provincia.' );
				valido = false;
			}
                        
                        jQuery('select[name="provinciaE"]').removeClass("noValido");
			comprobar = jQuery('select[name="provinciaE"]').val();
			if(comprobar.length < 1)
			{
				campos += 'select:provinciaE;';
				mensajeserr.push( 'Debe seleccionar una provincia.' );
				valido = false;
			}
			
			jQuery('input[name="localidad"]').removeClass("noValido");
			comprobar = jQuery('input[name="localidad"]').val();
			if(comprobar.length < 3)
			{
				campos += 'input:localidad;';
				mensajeserr.push( 'Debe rellenar la localidad.' );
				valido = false;
			}
			
			jQuery('input[name="cp"]').removeClass("noValido");
			comprobar = jQuery('input[name="cp"]').val();
			if(comprobar.length < 5)
			{
				campos += 'input:cp;';
				mensajeserr.push( 'El código postal debe estar relleno.' );
				valido = false;
			}
			
			jQuery('input[name="dpass"]').removeClass("noValido");
			comprobar = jQuery('input[name="dpass"]').val();
			if(comprobar.length < 8)
			{
				campos += 'input:dpass;';
				mensajeserr.push( 'Hay que rellenar la contraseña actual para poder verfificar los cambios.' );
				valido = false;
			}
			
			break;
			
		case 'sigin':
			
			jQuery('input[name="nombre"]').removeClass("noValido");
			comprobar = jQuery('input[name="nombre"]').val();
			if(comprobar.length < 3)
			{
				campos += 'input:nombre;';
				mensajeserr.push( 'El nombre debe tener mínimo 4 caracteres.' );
				valido = false;
			}
			
			jQuery('input[name="apellidos"]').removeClass("noValido");
			comprobar = jQuery('input[name="apellidos"]').val();
			if(comprobar.length < 3)
			{
				campos += 'input:apellidos;';
				mensajeserr.push( 'El/los apellidos deben tener mínimo 4 caracteres.' );
				valido = false;
			}
			
			jQuery('input[name="dni"]').removeClass("noValido");
			comprobar = jQuery('input[name="dni"]').val();
			if(comprobar.length < 9)
			{
				campos += 'input:dni;';
				mensajeserr.push( 'El DNI tiene que ser valido.' );
				valido = false;
			}
			
			jQuery('input[name="telefono"]').removeClass("noValido");
			comprobar = jQuery('input[name="telefono"]').val();
			if(comprobar.length < 9)
			{
				campos += 'input:telefono;';
				mensajeserr.push( 'El DNI telefono que ser valido.' );
				valido = false;
			}
			
			jQuery('input[name="direccion"]').removeClass("noValido");
			comprobar = jQuery('input[name="direccion"]').val();
			if(comprobar.length < 4)
			{
				campos += 'input:direccion;';
				mensajeserr.push( 'La dirección debe tener mínimo 4 caracteres.' );
				valido = false;
			}
			
			jQuery('select[name="provincia"]').removeClass("noValido");
			comprobar = jQuery('select[name="provincia"]').val();
			if(comprobar.length < 1)
			{
				campos += 'select:provincia;';
				mensajeserr.push( 'Debe seleccionar una provincia.' );
				valido = false;
			}
                        
                        jQuery('select[name="provinciaE"]').removeClass("noValido");
			comprobar = jQuery('select[name="provinciaE"]').val();
			if(comprobar.length < 1)
			{
				campos += 'select:provinciaE;';
				mensajeserr.push( 'Debe seleccionar una provincia.' );
				valido = false;
			}
			
			jQuery('input[name="localidad"]').removeClass("noValido");
			comprobar = jQuery('input[name="localidad"]').val();
			if(comprobar.length < 3)
			{
				campos += 'input:localidad;';
				mensajeserr.push( 'Debe indicar una localidad.' );
				valido = false;
			}
			
			jQuery('input[name="cp"]').removeClass("noValido");
			comprobar = jQuery('input[name="cp"]').val();
			if(comprobar.length < 5)
			{
				campos += 'input:cp;';
				mensajeserr.push( 'Debe indicar un código postal.' );
				valido = false;
			}
			
			jQuery('input[name="email"]').removeClass("noValido");
			comprobar = jQuery('input[name="email"]').val();
			if(comprobar.length < 8)
			{
				campos += 'input:email;';
				mensajeserr.push( 'El correo electrónico debe tener mínimo 8 caracteres.' );
				valido = false;
			}
			
			jQuery('input[name="cemail"]').removeClass("noValido");
			comprobar = jQuery('input[name="cemail"]').val();
			if(comprobar.length < 8 || comprobar != jQuery('input[name="email"]').val())
			{
				campos += 'input:cemail;';
				mensajeserr.push( 'El correo electrónico debe tener mínimo 8 caracteres y deben coincidir en ambos campos.' );
				valido = false;
			}
			
			jQuery('input[name="password"]').removeClass("noValido");
			comprobar = jQuery('input[name="password"]').val();
			if(comprobar.length < 4)
			{
				campos += 'input:password;';
				mensajeserr.push( 'La contraseña debe tener mínimo 4 caracteres.' );
				valido = false;
			}
			
			jQuery('input[name="rpassword"]').removeClass("noValido");
			comprobar = jQuery('input[name="rpassword"]').val();
			if(comprobar.length < 4 || comprobar != jQuery('input[name="password"]').val())
			{
				campos += 'input:rpassword;';
				mensajeserr.push( 'La contraseña debe tener mínimo 4 caracteres y deben coincidir en ambos campos.' );
				valido = false;
			}
			
			jQuery('span[name="pcheckp"]').removeClass("noValido");
			if(!jQuery('input[name="checkp"]').prop('checked'))
			{
				campos += 'span:pcheckp;';
				mensajeserr.push( 'Debe marcar la casilla de He leído y entiendo la Política de Privacidad.' );
				valido = false;
			}
			
			break;
		
		case 'recovery':
			
			jQuery('input[name="user"]').removeClass("noValido");
			comprobar = jQuery('input[name="user"]').val();
			if(comprobar.length < 8)
			{
				campos += 'input:user;';
				mensajeserr.push( 'El correo electrónico debe tener mínimo 8 caracteres.' );
				valido = false;
			}
			
			break;
	}
	
	if (campos.length > 0)
		campos = campos.substring(0, campos.length-1);
	
	if (!valido)
	{
		marcarCamposNoValidos(campos);
		mostrarMensajeF(mensajeserr, formulario);
	}
	
	return valido;
}


function CloseMsg(me)
{
    jQuery(me).parent().remove();
}


function mostrarMensaje(tipo, titulo, mensaje)
{ // Muestra el mensaje correspondiente.
    var msg = "";
    var id = "LbMessage";

    switch (tipo)
    {
        case "c": id = "LbMessage"; break;
        case "a": id = "LbMessageWarning"; break;
        case "e": id = "LbMessageError"; break;
    }

    msg = '<div id="' + id + '">' +
			'<span class="BtClose" onclick="CloseMsg(this);">x</span>' +
			'<span class="title">' + titulo + '</span>' +
			'' + mensaje +
		'</div>';

    jQuery("#Messages").html(msg);
}


function mostrarMensajeF(mensajes, lb)
{ // Muestra el mensaje correspondiente.
    var msg = "";
    var id = "LbMessage" + lb;
	
	msg += '<br /><ul type="square">';
	for (i = 0; i < mensajes.length; i++)
	{
		msg += '<li>'+mensajes[i]+'</li>';
	}
	msg += '</ul>';
	
    jQuery('#'+id).html(msg);
}


function marcarCamposNoValidos(marcarCampos)
{ // Marca del color por defecto para errores de formulario los que no se han validado.
    var lista = marcarCampos.split(';');
	var campo;

    for (i = 0; i < lista.length; i++)
	{
		campo = lista[i].split(':');
        jQuery('' + campo[0] + '[name="' + campo[1] + '"]').addClass("noValido");
	}
}