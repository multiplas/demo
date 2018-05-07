<?php
// $atributos = Atributos();


	$filtro = LoadFilterStatus();
	$atributos= array();
	if($filtro['valor'] == 1){//Filtro activado
		if(!isset($_POST['checks']) || count($_POST['checks']) == 0)
			unset($_SESSION['checks']);
		foreach($productos as $producto)
			$atributos = addProductAttributes($producto['id'], $atributos);

		if (count($atributos) > 0)
		{
			$miCategoria = null;
			?>
				
			<div class="panel-izquierdo">
			<?php
				foreach ($atributos AS $atributo)
				{
					
					$salto = false;
					if ($miCategoria != $atributo['categoria'])
					{
						if ($miCategoria != null)
							$salto = true;
						else
						{
							?>
								<h3><?=ucwords($atributo['categoria'])?>:</h3>
							<?php
						}
						$miCategoria = $atributo['categoria'];
					}
					
					if ($salto)
					{
						?>
							</div>
							<div class="panel-izquierdo">
								<h3><?=ucwords($atributo['categoria'])?>:</h3>
						<?php
					}
					
					$chk = '';
					
					if (isset($_SESSION['checks'][$atributo['categoria']]))
						if (is_array($_SESSION['checks'][$atributo['categoria']]))
							foreach ($_SESSION['checks'][$atributo['categoria']] AS $seleccionado)
								if ($seleccionado == $atributo['id']) $chk = ' checked';
					?>
					<span><input type="checkbox" name="checks[<?=$atributo['categoria']?>][]" value="<?=$atributo['id']?>" <?=$chk?>/>&nbsp;<?=ucwords($atributo['atributo'])?></span>
					<?php
				}
			?>
			</div>
			<?php
		}
	}
?>