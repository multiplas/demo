$(document).ready(function(){
    $('#contraer').click(function(){
		$(this).toggleClass('abrir cerrar');
		$('#sidebar').toggleClass('fuera');
		$('#content').toggleClass('span9 span12');
		
		});
    });
