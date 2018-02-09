<div id="contenido">
	<div id="articulo">
		<h2>QUIENES SOMOS!</h2>
		<?=$pagina['contenido']?>
		<br id="de" />
		<h2>DÓNDE ESTAMOS!</h2>
		<?=$pagina2['contenido']?>
	</div>
	<?php $horientacion = 'hor'; include_once('./bloques/informacion.php'); ?>
	<?php include_once('./bloques/novedades.php'); ?>
	<?php include_once('./bloques/masvendidos.php'); ?>
</div>