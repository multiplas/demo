<div id="contenido" style="min-height: 350px;">
	<div style="margin-left: 30px; margin-top: 30px;">
		<h2 style="color: #BF1B19;">PLATAFORMA DE PAGO</h2>
		<h4>VA A SER REDIRIGIDO</h4>
		<p>En breve será redirigido a la plataforma de pago, por favor espere.</p>
		<?php
			// EJECUCIÓN PARA PAYPAL
			echo '<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" style="height: 0px; margin-top: 0px; margin-bottom: 0px;">
			<input type="hidden" name="cmd" value="_xclick-subscriptions">
			<input type="hidden" name="business" value="'.$_SESSION['paypal']['paypalC'].'">
			<input type="hidden" name="currency_code" value="'.$_SESSION['paypal']['divisa'].'">
				
			<input type="hidden" name="return" value="'.$_SESSION['paypal']['linkReturn2'].'">
			<input type="hidden" name="cancel_return" value="'.$_SESSION['paypal']['linkCancel'].'">
			<input type="hidden" name="notify_url" value="'.$_SESSION['paypal']['urlNotificacion'].'">
			<input type="hidden" name="item_name" value="'.$_SESSION['paypal']['empresilla'].'('.$_SESSION['paypal']['secreto'].')'.'">
			<input type="hidden" name="lc" value="ES">
			
			<input type="hidden" name="no_shipping" value="1">
			<input type="hidden" name="a3" value="'.ConvertirMoneda($_SESSION['paypal']['moneda'],$_SESSION['paypal']['divisa'],$_SESSION['paypal']['precio']).'">
			<input type="hidden" name="p3" value="1">
			<input type="hidden" name="t3" value="M">
			<input type="hidden" name="src" value="1">
			<input type="hidden" name="sra" value="1">
			<input class="enviarAPayPal" type="submit" value="Si no se redirige haz click aqui" />
			</form>';		
		 ?>
		
	</div>
</div>