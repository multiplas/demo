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
		<h2><?=$auxcont?></h2>
		<?php
			if ($_GET['contacto'] != 'well')
			{
				if ($_GET['contacto'] == 'bad')
				{
					?>
					<p style="color: #CD0505;"><strong>Ha habido un problema al enviar el mensaje!</strong> Por favor revisalo los campos para evitar caracteres extraños, problematicos o confusos.</p><br />
					<?php
				}
				else
				{
					?>
					<p><?=$auxconta?></p><br />
					<?php
				}

				$contact_text = '';
				if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){//Check if cart exists
					if(count($_SESSION['carrito']) == 1)
						$contact_text = 'Consulta sobre el producto ' . $_SESSION['carrito'][0];
					else{
						$contact_text = 'Consulta sobre los productos:';
						foreach ($_SESSION['carrito'] as $current_item){//Recorre los productos en el carrito
							$contact_text .= " Producto: " .$current_item['name'] . " Cantidad: " . $current_item['quantity'] . ",";
						}
						$contact_text = substr($contact_text, 0, -1);//Elimina la ultima coma
						$contact_text .= ".\r\n";
					}
				}
				elseif($_GET['contacto'] != null){
					$contact_text = 'Consulta sobre el producto '.str_replace("_", " ", $_GET['contacto']).".\r\n";
				}
				?>
				<form action="<?=$draizp?>/acc/enviar" method="post">
					<div class="fcenter">
						<input type="text" id="nombre" name="nombre" placeholder="<?=$auxnom?>" value="<?=@$_POST['nombre']?>" />
						<input type="text" id="telefono" name="telefono" placeholder="<?=$auxtlf?>" value="<?=@$_POST['telefono']?>" /><br />
						<input type="text" id="email" name="email" class="dobleF" placeholder="<?=$auxema?>" value="<?=@$_POST['email']?>" /><br />
                                                <textarea id="consulta" name="consulta" class="dobleF" placeholder="<?=$auxcons?>"><?=@$_POST['consulta']?><?=$contact_text ?></textarea><br />
						<label><input type="checkbox" id="checkp" name="checkp" <?=(isset($_POST['consulta'])) ? 'checked ' : '';?>/>&nbsp;<?=$auxpol?> <a href="<?=$draizp?>/privacidad" target="_blank"><?=$auxpolen?></a></label>
						<span type="submit" class="button" name="BtSubmit"><?=$auxenv?></span>
					</div>
				</form>
				<?php
			}
			else
			{
				?>
					<p style="color: #078616;"><strong>Mensaje enviado correctamente!</strong> En breve recibirá una respuesta de nuestro equipo.</p>
					<p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>contacto">Enviar otro mensaje</a>&nbsp;|&nbsp;<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>">Volver al inicio</a></p>
				<?php
			}
		?>
	</div>
	<?php $horientacion = 'hor'; include_once('./bloques/informacion.php'); ?>
	<?php //include_once('./bloques/novedades.php'); ?>
	<?php //include_once('./bloques/masvendidos.php'); ?>
</div>