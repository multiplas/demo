<?php
for($i=0; $i<=count($labelidioma); $i++){
        if($labelidioma[$i][0] == 'consulta'){
            $auxcons = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'contacto'){
            $auxcont = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'contacta'){
            $auxconta = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'nombre'){
            $auxnom = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'telefono'){
            $auxtlf = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'correo'){
            $auxema = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'politicas'){
            $auxpol = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'enviar'){
            $auxenv = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'enlace_politicas'){
            $auxpolen = $nombreidioma[$i][0];
        }
    }
?>

<div id="contenido">
	<div id="articulo">
		<h2>Presupuesto</h2>
		<?php
			if ($_GET['presupuesto_cont'] != 'well')
			{
				if ($_GET['presupuesto_cont'] == 'bad')
				{
					?>
					<p style="color: #CD0505;"><strong>Ha habido un problema al enviar el mensaje!</strong> Por favor revisalo los campos para evitar caracteres extraños, problematicos o confusos. Y no olvides aceptar la política de privacidad!</p><br />
					<?php
				}
				else
				{
					?>
					<p>Pidanos su presupuesto escribiendo a través de esta sección de nuestra web.</p><br />
					<?php
				}

				if(isset($_POST['vaciarPresupuesto']) && $_POST['vaciarPresupuesto'] == 1){
					unset($_SESSION['carrito']);
				}

				if(!empty( $_POST['consulta_pre']))
					$contact_text = $_POST['consulta_pre'];
				else 
					$contact_text = 'Pidanos su presupuesto sobre: ';
				if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){//Check if cart exists
					if(count($_SESSION['carrito']) == 1)
						$contact_text .= ' ' . $_SESSION['carrito'][0]['quantity'] .' Cantidad: '. $_SESSION['carrito'][0]['name'];
					else{
						foreach ($_SESSION['carrito'] as $current_item){//Recorre los productos en el carrito
							$contact_text .= " Producto: " .$current_item['name'] . " Cantidad: " . $current_item['quantity'] . ",";
						}
						$contact_text = substr($contact_text, 0, -1);//Elimina la ultima coma
						$contact_text .= ".\r\n";
					}
				}
				
				?>
				<form action="<?=$draizp?>/acc/enviarPre" method="post">
					<div class="fcenter">
                                                <textarea id="consulta_pre" name="consulta_pre" class="dobleF" placeholder="Pidanos su presupuesto"><?=$contact_text?></textarea><br />
						<label><input type="checkbox" id="checkp" name="checkp" <?=(isset($_POST['consulta'])) ? 'checked ' : '';?>/>&nbsp;<?=$auxpol?> <a href="<?=$draizp?>/privacidad" target="_blank"><?=$auxpolen?></a></label>
						<span type="submit" class="button" name="BtSubmit"><?=$auxenv?></span>
					</div>
				</form>
				<form action="" class="vaciar_form" method="post">
					<input type="hidden" name="vaciarPresupuesto" value="1"/>
					<input type="submit" class="vaciar_presupuesto" value="Vaciar Presupuesto"/>
				</form>
				<?php
			}
			else
			{
				?>
					<p style="color: #078616;"><strong>Mensaje enviado correctamente!</strong> En breve recibirá una respuesta de nuestro equipo.</p>
					<p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>presupuesto_cont">Enviar otro presupuesto</a>&nbsp;|&nbsp;<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>">Volver al inicio</a></p>
				<?php
			}
		?>
	</div>
	<?php $horientacion = 'hor'; include_once('./bloques/informacion.php'); ?>
	<?php //include_once('./bloques/novedades.php'); ?>
	<?php //include_once('./bloques/masvendidos.php'); ?>
</div>