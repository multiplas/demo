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
				<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?><?=$url?>1">&lt;&lt;</a>
				<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?><?=$url?><?=($pagina-1)?>">&lt;</a>
				<?php
			}
				
			for ($w = $inicial; $w <= $final; $w++)
			{
				if ($w != $actual)
				{
					?>
					<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?><?=$url?><?=$w?>"><?=$w?></a>
					<?php
				}
				else
				{
					?>
					<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?><?=$url?><?=$w?>" class="seleccionado"><?=$w?></a>
					<?php
				}
			}
				
			if ($paginas > $pagina)
			{
				?>
				<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?><?=$url?><?=($pagina+1)?>">&gt;</a>
				<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?><?=$url?><?=$paginas?>">&gt;&gt;</a>
				<?php
			}
		}
	?>
</div>