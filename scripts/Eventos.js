var abierto = false;

$(document).ready(
	function()
	{
		$('.producto img').css('height', $('.producto img').width() + 'px');
		$('div[name="slides-res"]').css('height', $('div[name="slides-res"]').width() + 'px');
		$('div[name="slides-res"] img').css('width', $('div[name="slides-res"]').width() + 'px');
		$('div#slider3_container').css('height', $('div[name="slides-res"]').width() + 'px');
        
        $('#grupo-submenu').scrollToFixed();
        $('#grupo-submenu').bind('fixed.ScrollToFixed', function()
        {
            $(this).css('background-color', '#696d75');
        });
        $('#grupo-submenu').bind('unfixed.ScrollToFixed', function()
        {
            $(this).css('background', 'transparent');
        });
		
		$('a#menu-op').click(
			function ()
			{
				if($('#grupo-menu').height() > 45)
				{
					$('#grupo-menu').css('height', '45px');
				}
				else
				{
					$('#grupo-menu').css('height', 'auto');
				}
			}
		);

	    
		$('a#submenu-op').click(
			function ()
			{
				if(!abierto)
				{
					AbrirMenu();
					abierto = true;
				}
				else
				{
					CerrarMenu();
					abierto = false;
				}
			}
		);

	    
		$('span.submenu-op').click(
			function ()
			{
				if($(this).siblings('ul').css('display') == 'none')
				{
					$(this).siblings('ul').css('display', 'block');
					$(this).text('-');
				}
				else
				{
					$(this).siblings('ul').css('display', 'none');
					$(this).text('+');
				}
			}
		);

	    $('select[name="talla"]').change(
			function ()
			{
                if ($(this).siblings('select[name="color"]').children('option.'+$(this).find('option:selected').attr('id')).length < 1)
                {
                    $(this).siblings('select[name="color"]').css('display', 'none');
                    $('span[name="BtSubmit"]').css('display', 'block');
                }
                else
                {
                    $(this).siblings('select[name="color"]').css('display', 'inline-block');
                    $(this).siblings('select[name="color"]').css('visibility', 'visible');
                    $(this).siblings('select[name="color"]').children('option').css('display', 'none');
                    $(this).siblings('select[name="color"]').children('option.'+$(this).find('option:selected').attr('id')).css('display', 'block');
                    $(this).siblings('select[name="color"]').children('option:first-child').css('display', 'block');
                    $(this).siblings('select[name="color"]').children('option:first-child').attr('selected', 'selected');
                    $('span[name="BtSubmit"]').css('display', 'none');
                }
                
                if($(this).children('option:selected').val() != '')
                {
                    var num = parseFloat($(this).children('option:selected').text());
                    n = num.toFixed(2);
                    $('span#preciopr').text(n+' €');
                }
                else
                {
                    $('span#preciopr').text($('input#defaultvalue').val()+' €');
                    $('span[name="BtSubmit"]').css('display', 'none');
                }
			}
		);

	    $('select[name="color"]').change(
			function ()
			{
                if($(this).children('option:selected').val() != '')
                {
                    var num = parseFloat($(this).children('option:selected').text());
                    n = num.toFixed(2);
                    $('span#preciopr').text(n+' €');
                    $('span[name="BtSubmit"]').css('display', 'block');
                }
                else
                {
                    $('span#preciopr').text($('input#defaultvalue').val()+' €');
                    $('span[name="BtSubmit"]').css('display', 'none');
                }
			}
		);

	    $('span[name="BtSubmit"]').click(
			function ()
			{
				/*var validado = false;
				var validado = ValidarFormularios($(this).parents('form:first').attr('name'));*/
				
				//if($(this).parents('form:first').validate())
					$(this).parents('form:first').submit();
			}
		);

	    $('a[name="BtSubmit"]').click(
			function ()
			{
				var validado = false;
				var validado = ValidarFormularios($(this).parents('form:first').attr('name'));
				
				if(validado)
					$(this).parents('form:first').submit();
			}
		);

	    $('span[name="BtCancel"]').click(
			function ()
			{
			    // Aquí la orden de cancelación.
			}
		);

	    $('span[name="BtReset"]').click(
			function ()
			{
			    $('input[type="checkbox"]').removeAttr('checked');
			    $('select[name="OrdenarPor"]').prop('selectedIndex', 0);
			    $(this).parents('form:first').submit();
			}
		);

	    $('span[name="pcheckp"]').click(
			function ()
			{
			    $('input[name="checkp"]').attr('checked');
			}
		);

	    $('select#perso-r').change(
			function ()
			{
			    if ($(this).val() == '0')
				{
					$('#personalicesug').css('height', '0px');
					$('#personalicesug').css('display', 'none');
					$('#preciopr').text($('#precioparapr').val() + ' €');
				}
				else if ($(this).val() == '1')
				{
					$('#personalicesug').css('height', '40px');
					$('#personalicesug').css('display', 'block');
					result = parseFloat($('#precioparapr').val()) + 5.00;
					$('#preciopr').text(result.toFixed(2) + ' €');
				}
				else
				{
					$('#personalicesug').css('height', 'auto');
					$('#personalicesug').css('display', 'block');
					result = parseFloat($('#precioparapr').val()) + 8.00;
					$('#preciopr').text(result.toFixed(2) + ' €');
				}
			}
		);

	    $('select.persopk').change(
			function ()
			{
			    if ($(this).val() == '0')
				{
					$(this).siblings('.persopkel').css('height', '0px');
					$(this).siblings('.persopkel').css('display', 'none');
				}
				else if ($(this).val() == '1')
				{
					$(this).siblings('.persopkel').css('height', '45px');
					$(this).siblings('.persopkel').css('display', 'block');
				}
				else
				{
					$(this).siblings('.persopkel').css('height', 'auto');
					$(this).siblings('.persopkel').css('display', 'block');
				}
			}
		);

	    $('select[name="OrdenarPor"]').change(
			function ()
			{
			    $(this).parents('form:first').submit();
			}
		);

	    $('.panel-izquierdo input[type="checkbox"]').change(
			function ()
			{
			    $(this).parents('form:first').submit();
			}
		);

	    $('span#recogert').click(
			function ()
			{
			    $('span#recogertn').css('display', 'block');
			    $('span#recogert').css('display', 'none');
			    $('td.tachable1').addClass('tachado');
			    $('td.tachable2').removeClass('tachado');
                var num = parseFloat($('td#totalcp strong').text()) - parseFloat($('input#portes').val());
                num = num.toFixed(2);
			    $('td#totalcp strong').text(num + ' €');
			    $('input#entienda').val('1');
			}
		);

	    $('span#recogertn').click(
			function ()
			{
			    $('span#recogert').css('display', 'block');
			    $('span#recogertn').css('display', 'none');
			    $('td.tachable2').addClass('tachado');
			    $('td.tachable1').removeClass('tachado');
                var num = parseFloat($('td#totalcp strong').text()) + parseFloat($('input#portes').val());
                num = num.toFixed(2);
			    $('td#totalcp strong').text(num + ' €');
			    $('input#entienda').val('0');
			}
		);
		
		$( "#pais" ).change(function()
		{
			CargaDeProvincias();
		});
                
                $( "#paisE" ).change(function()
		{
			CargaDeProvincias2();
		});
		
		if ($( "#pais" ).val() != '' && $( "#pais" ).val() != null)
			CargaDeProvincias();
                    
                if ($( "#paisE" ).val() != '' && $( "#paisE" ).val() != null)
			CargaDeProvincias2();
		
		if ($(window).width() <= 850)
			$('#tcesta:not(.alter) tr th[colspan="2"]').attr('colspan', 1);
	}
);


$(window).resize(
	function()
	{
		$('.producto img').css('height', $('.producto img').width() + 'px');
		if ($(window).width() <= 850)
			$('#tcesta:not(.alter) tr th[colspan="2"]').attr('colspan', 1);
		else
			$('#tcesta:not(.alter) tr th[colspan="1"]').attr('colspan', 2);
	}
);