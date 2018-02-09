<div id="contenido" style="min-height: 350px;">
	<div style="margin-left: 30px; margin-top: 30px;">
		<?php
			if ($_GET['finalizado'] != '')
			{
				?>
				<h2 style="color: #BF1B19;">FINALIZACIÓN</h2>
				<h4>EL PAGO SE HA REALIZADO CORRECTAMENTE</h4>
				<p>Su compra se realizado correctamente, en breve recibirá un email.</p>
				<p>Puede imprimir la factura haciendo <a style="color: #BF1B19;" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>imprimir_fact/<?=$_GET['finalizado']?>" target="_blank">click aquí!</a></p>
				<?php
			}
			else
			{
				?>
				<h2 style="color: #BF1B19;">FINALIZACIÓN</h2>
				<h4>EL PAGO NO SE HA REALIZADO CORRECTAMENTE</h4>
				<p>El pago no se ha realizado por algún motivo, ya sea falta de dinero en la cuenta o rechazo de la entidad!</p>
				<p>Puede reintentar pagar haciendo <a style="color: #BF1B19;" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta">click aquí!</a>!</p>
				<p>Si el pago si se ha realizado, y no aparece la compra en su apartado de compras, por favor pongase en contacto con nuestro equipo a través de la sección contacto.</p>
				<?php
			}
		?>
	</div>
</div>