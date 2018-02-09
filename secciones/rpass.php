<div id="contenido">
	<div id="articulo">
		<h2>Recuperar Password</h2>
		<?php
			if ($_GET['cuenta'] == 'recovery')
			{
				?>
				<p>Indica tu cuenta (email) aquí y se le enviará una mensaje de recuperación!</p><br />
				<form method="post" name="recovery" action="<?=$draizp?>/acc/recuperar">
					<input type="text" id="user" name="user" placeholder="Correo Electrónico" value="" /><br />
					<span name="BtSubmit" class="button">Recuperar Contraseña</span> <a href="/es/datos_personales"><span id="botoncitoCom"  class="button">Volver a Pedido</span></a>
					<div id="LbMessagerecovery" style=" color: #E81F32;"></div>
				</form>
				<?php
			}
                        else if ($_GET['cuenta'] == 'recoveryE'){
                            ?>
                                <br><p><b>Email no registrado.</b></p><br>
                                <a href="/cuenta"><span id="botoncitoCom"  class="button">Registrarse</span></a>
                                <a href="/pedido"><span id="botoncitoCom"  class="button">Volver a Pedido</span></a>
                        <?php
                        }
			else
			{
				?>
				<p>Se ha enviado un email a la dirección de correo con la contraseña autogenerada para que pueda acceder!</p>
				<p>Una vez entre con la contraseña autogenerada, se recomienda cambiarla por una contraseña de la que se pueda acordar.</p>
                                <a href="/cuenta"><span id="botoncitoCom"  class="button">Volver a Pedido</span></a>
				<?php
			}
		?>
	</div>
</div>