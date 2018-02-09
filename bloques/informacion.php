<div class="informacion">
	<div class="informa <?=$horientacion?>">
		<h4>Formas de pago</h4>
		<img src="<?=$draizp?>/source/visa.png" alt="Visa">
		<img src="<?=$draizp?>/source/master-card.png" alt="Master Card">
		<img src="<?=$draizp?>/source/transferencia-bancaria.png" alt="Transferencia Bancaria">
		<img src="<?=$draizp?>/source/visa-electron.png" alt="Visa Electron">
		<img src="<?=$draizp?>/source/paypal.png" alt="PayPal">
	</div>
	<div class="linea-sep-<?=$horientacion?>"></div>
	<div class="informa <?=$horientacion?>">
		<br>
		<br>
		<h5>Envios gratis por pedidos</h5>
		<h3>Superiores a</h3>
		<h2><?=$Empresa['portes_gratis']?> &euro;</h2>
		<br>
		<br>
	</div>
	<div class="linea-sep-<?=$horientacion?>"></div>
	<div class="informa <?=$horientacion?>" style="text-align: left;">
		<br>
		<br>
		<br>
		<br>
		<br>
		<h5>Atención<br>al cliente</h5>
		<h2 style="font-size: 1.3rem; margin-bottom: 10px;"><?=number_format($Empresa['telefono'], 0, ',', ' ')?></h2>
	</div>
</div>