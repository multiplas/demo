<div class="paginador">
	<?php
		if ($paginas > 1)
		{
			$actual = ($pagina > $paginas) ? $paginas : $pagina;
			$inicial = (($actual - 3) < 1) ? 1 : $actual - 3;
			$final = (($actual + 3) > $paginas) ? $paginas : ($actual + 3);
			
			if ($pagina > 1)
			{
				?>
				<a href="<?=$draizp?><?=$url?>1<?=(@$surl)?>">&lt;&lt;</a>
				<a href="<?=$draizp?><?=$url?><?=($pagina-1)?><?=(@$surl)?>">&lt;</a>
				<?php
			}
				
			for ($w = $inicial; $w <= $final; $w++)
			{
				if ($w != $actual)
				{
					?>
					<a href="<?=$draizp?><?=$url?><?=$w?><?=(@$surl)?>"><?=$w?></a>
					<?php
				}
				else
				{
					?>
					<a href="<?=$draizp?><?=$url?><?=$w?><?=(@$surl)?>" class="seleccionado"><?=$w?></a>
					<?php
				}
			}
				
			if ($paginas > $pagina)
			{
				?>
				<a href="<?=$draizp?><?=$url?><?=($pagina+1)?><?=(@$surl)?>">&gt;</a>
				<a href="<?=$draizp?><?=$url?><?=$paginas?><?=(@$surl)?>">&gt;&gt;</a>
				<?php
			}
		}
	?>
</div>