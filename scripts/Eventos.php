<?php 
	require_once($draiz.'../sistema/i_connectionstrings.php');
	require_once($draiz.'../sistema/mod_varios.php');

    $dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);

    $sql="SELECT * FROM bd_colores";
    $query = mysqli_query($dbi, $sql);
	$colores = mysqli_fetch_array($query);
	
	$barStatus = getBarraInfo();

    $colortextogen = $colores['colortextomain'];
	header('Content-Type: application/javascript');
	
?>

var abierto = false;

jQuery(document).ready(
	function()
	{
		if (jQuery(window).width() <= 583)
                    jQuery('.producto img').css('height', '100%');
                else if (jQuery(window).width() <= 920)
                    jQuery('.producto img').css('height', jQuery('.producto img').width()*1.5 + 'px');
                else
                    jQuery('.producto img').css('height', jQuery('.producto img').width() + 'px');
		jQuery('div[name="slides-res"]').css('height', jQuery('div[name="slides-res"]').width() + 'px');
		jQuery('div[name="slides-res"] img').css('width', jQuery('div[name="slides-res"]').width() + 'px');
		jQuery('div#slider3_container').css('height', jQuery('div[name="slides-res"]').width() + 'px');
        
        //jQuery('#grupo-submenu').scrollToFixed();
        jQuery('#grupo-submenu').bind('fixed.ScrollToFixed', function()
        {
            jQuery(this).css('background-color', '<?php echo $colortextogen; ?>');
        });
        jQuery('#grupo-submenu').bind('unfixed.ScrollToFixed', function()
        {
            jQuery(this).css('background', '<?php echo $colortextogen; ?>');
        });

		<?php if ($barStatus['valor'] == "1")://activado ?>
			jQuery( window ).scroll(function() {
				if(jQuery( window ).scrollTop() > 130 && jQuery('#grupo-submenu').length > 0 && jQuery( window ).width() > 768){
					jQuery('#grupo-submenu').addClass('fixed-bar-top');
				}
				else{
					jQuery('#grupo-submenu').removeClass('fixed-bar-top');
				}
			});
		<?php endif; ?>

		
		jQuery('a#menu-op').click(
			function ()
			{
				if(jQuery('#grupo-menu').height() > 45)
				{
					jQuery('#grupo-menu').css('height', '45px');
				}
				else
				{
					jQuery('#grupo-menu').css('height', 'auto');
				}
			}
		);

	    
		jQuery('a#submenu-op').click(
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

	    
		jQuery('span.submenu-op').click(
			function ()
			{
				if(jQuery(this).siblings('ul').css('display') == 'none')
				{
					jQuery(this).siblings('ul').css('display', 'block');
					jQuery(this).text('-');
				}
				else
				{
					jQuery(this).siblings('ul').css('display', 'none');
					jQuery(this).text('+');
				}
			}
		);

	    jQuery('select[name="talla"]').change(
			function ()
			{
                if (jQuery(this).siblings('select[name="color"]').children('option.'+jQuery(this).find('option:selected').attr('id')).length < 1)
                {
                    jQuery(this).siblings('select[name="color"]').css('display', 'none');
                    jQuery('span[name="BtSubmit"]').css('display', 'block');
                }
                else
                {
                    jQuery(this).siblings('select[name="color"]').css('display', 'inline-block');
                    jQuery(this).siblings('select[name="color"]').css('visibility', 'visible');
                    jQuery(this).siblings('select[name="color"]').children('option').css('display', 'none');
                    jQuery(this).siblings('select[name="color"]').children('option.'+jQuery(this).find('option:selected').attr('id')).css('display', 'block');
                    jQuery(this).siblings('select[name="color"]').children('option:first-child').css('display', 'block');
                    jQuery(this).siblings('select[name="color"]').children('option:first-child').attr('selected', 'selected');
                    jQuery('span[name="BtSubmit"]').css('display', 'none');
                }
                
                /*if(jQuery(this).children('option:selected').val() != '')
                {
                    var num = parseFloat(jQuery(this).children('option:selected').text());
                    n = num.toFixed(2);
                    jQuery('span#preciopr').text(n+' €');
                }
                else
                {
                    jQuery('span#preciopr').text(jQuery('input#defaultvalue').val()+' €');
                    jQuery('span[name="BtSubmit"]').css('display', 'none');
                }*/
			}
		);

	    jQuery('select[name="color"]').change(
			function ()
			{
                if(jQuery(this).children('option:selected').val() != '')
                {
                    var num = parseFloat(jQuery(this).children('option:selected').text());
                    n = num.toFixed(2);
                    jQuery('span#preciopr').text(n+' €');
                    jQuery('span[name="BtSubmit"]').css('display', 'block');
                }
                else
                {
                    jQuery('span#preciopr').text(jQuery('input#defaultvalue').val()+' €');
                    jQuery('span[name="BtSubmit"]').css('display', 'none');
                }
			}
		);

	    jQuery('span[name="BtSubmit"]').click(
			function ()
			{
				/*var validado = false;
				var validado = ValidarFormularios(jQuery(this).parents('form:first').attr('name'));*/
				
				//if(jQuery(this).parents('form:first').validate())
					jQuery(this).parents('form:first').submit();
			}
		);

	    jQuery('a[name="BtSubmit"]').click(
			function ()
			{
				var validado = false;
				var validado = ValidarFormularios(jQuery(this).parents('form:first').attr('name'));
				
				if(validado)
					jQuery(this).parents('form:first').submit();
			}
		);

	    jQuery('span[name="BtCancel"]').click(
			function ()
			{
			    // Aquí la orden de cancelación.
			}
		);

	    jQuery('span[name="BtReset"]').click(
			function ()
			{
			    jQuery('input[type="checkbox"]').removeAttr('checked');
			    jQuery('select[name="OrdenarPor"]').prop('selectedIndex', 0);
			    jQuery(this).parents('form:first').submit();
			}
		);

	    jQuery('span[name="pcheckp"]').click(
			function ()
			{
			    jQuery('input[name="checkp"]').attr('checked');
			}
		);

	    jQuery('select#perso-r').change(
			function ()
			{
			    if (jQuery(this).val() == '0')
				{
					jQuery('#personalicesug').css('height', '0px');
					jQuery('#personalicesug').css('display', 'none');
					jQuery('#preciopr').text(jQuery('#precioparapr').val() + ' €');
				}
				else if (jQuery(this).val() == '1')
				{
					jQuery('#personalicesug').css('height', '40px');
					jQuery('#personalicesug').css('display', 'block');
					result = parseFloat(jQuery('#precioparapr').val()) + 5.00;
					jQuery('#preciopr').text(result.toFixed(2) + ' €');
				}
				else
				{
					jQuery('#personalicesug').css('height', 'auto');
					jQuery('#personalicesug').css('display', 'block');
					result = parseFloat(jQuery('#precioparapr').val()) + 8.00;
					jQuery('#preciopr').text(result.toFixed(2) + ' €');
				}
			}
		);

	    jQuery('select.persopk').change(
			function ()
			{
			    if (jQuery(this).val() == '0')
				{
					jQuery(this).siblings('.persopkel').css('height', '0px');
					jQuery(this).siblings('.persopkel').css('display', 'none');
				}
				else if (jQuery(this).val() == '1')
				{
					jQuery(this).siblings('.persopkel').css('height', '45px');
					jQuery(this).siblings('.persopkel').css('display', 'block');
				}
				else
				{
					jQuery(this).siblings('.persopkel').css('height', 'auto');
					jQuery(this).siblings('.persopkel').css('display', 'block');
				}
			}
		);

	    jQuery('select[name="OrdenarPor"]').change(
			function ()
			{
			    jQuery(this).parents('form:first').submit();
			}
		);

	    jQuery('.panel-izquierdo input[type="checkbox"]').change(
			function ()
			{
			    jQuery(this).parents('form:first').submit();
			}
		);

	    jQuery('span#recogert').click(
			function ()
			{
			    jQuery('span#recogertn').css('display', 'block');
			    jQuery('span#recogert').css('display', 'none');
			    jQuery('td.tachable1').addClass('tachado');
			    jQuery('td.tachable2').removeClass('tachado');
                var num = parseFloat(jQuery('td#totalcp strong').text()) - parseFloat(jQuery('input#portes').val());
                num = num.toFixed(2);
			    jQuery('td#totalcp strong').text(num + ' €');
			    jQuery('input#entienda').val('1');
			}
		);

	    jQuery('span#recogertn').click(
			function ()
			{
			    jQuery('span#recogert').css('display', 'block');
			    jQuery('span#recogertn').css('display', 'none');
			    jQuery('td.tachable2').addClass('tachado');
			    jQuery('td.tachable1').removeClass('tachado');
                var num = parseFloat(jQuery('td#totalcp strong').text()) + parseFloat(jQuery('input#portes').val());
                num = num.toFixed(2);
			    jQuery('td#totalcp strong').text(num + ' €');
			    jQuery('input#entienda').val('0');
			}
		);
		
        jQuery('select#pagarcon').change(
			function ()
			{
			    if (jQuery(this).val() != 'dom' && jQuery(this).val() != 'domm' && jQuery(this).val() != 'fdir')
					jQuery('div#divpagarcon').css('display', 'none');
                            else
					jQuery('div#divpagarcon').css('display', 'block');
                            
                            if (jQuery(this).val() != 'tpv')
					jQuery('div#divpagarcon2').css('display', 'none');
                            else
					jQuery('div#divpagarcon2').css('display', 'block');
                        }
		);
                                                                                                                                       
		jQuery( "#pais" ).change(function()
		{
			CargaDeProvincias();
		});
                
                jQuery( "#paisE" ).change(function()
		{
			CargaDeProvincias2();
		});
		
		if (jQuery( "#pais" ).val() != '' && jQuery( "#pais" ).val() != null)
			CargaDeProvincias();
                
                if (jQuery( "#paisE" ).val() != '' && jQuery( "#paisE" ).val() != null)
			CargaDeProvincias2();
		
		if (jQuery(window).width() <= 850)
			jQuery('#tcesta:not(.alter) tr th[colspan="2"]').attr('colspan', 1);
	}
);


jQuery(window).resize(
	function()
	{
		if (jQuery(window).width() <= 583)
                    jQuery('.producto img').css('height', '100%');
                else if (jQuery(window).width() <= 920)
                    jQuery('.producto img').css('height', jQuery('.producto img').width()*1.5 + 'px');
                else
                    jQuery('.producto img').css('height', jQuery('.producto img').width() + 'px');
		if (jQuery(window).width() <= 850)
			jQuery('#tcesta:not(.alter) tr th[colspan="2"]').attr('colspan', 1);
		else
			jQuery('#tcesta:not(.alter) tr th[colspan="1"]').attr('colspan', 2);
	}
);
