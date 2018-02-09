<?php
$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
?>
<div id="contenido">
    <div id="menu-cate"><h3 class="color-menu-cat" style="text-align:center;color:white;padding-top:5px;padding-bottom:5px;margin:0;margin-top:25px;">Categorías Blog</h3>
        <div style="padding:0px;">
            <ul style="list-style: none;">
                <?php
                if($menu != null){
                    foreach ($menu AS $menu_in)
                    {
                        echo '<li><a href="'.$draizp.'/'.$_SESSION[lenguaje].'entradas/'.$menu_in[id].'/'.str_replace(' ', '-', str_replace($no_permitidas, $permitidas , $menu_in[nombre])).'" >'.$menu_in[nombre].'</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
	<div id="publicaciones">
	<?php
		if ($entradas != null)
		{
			$anterior = 0;
			foreach ($entradas AS $entrada)
			{
				if ($entrada['destacada'] == 1 && $anterior != 1)
				{
					?>
					</div>
					<div id="destacadas">
					<?php
				}
				
				if ($entrada['destacada'] != 1)
				{
					$texto_size = 250;
					$text = $entrada['contenido'];
					$text = strip_tags($text);
					$textlen = strlen($text);
					$pos = 0;
					$espacios = 0;
					while ($espacios < $texto_size && $pos < $textlen)
					{
						if ($text[$pos] == ' ')
							$espacios++;
						if ($espacios < $texto_size && $pos < $textlen)
							$pos++;
					}
					$pos--;
					$sppos = strpos($text, ' ', $pos);
					if ($sppos < 1) $sppos = $textlen - 1;
					if (strlen($text) > $sppos)
					{
						$descripcion = str_replace("\r\n", '<br>', substr($text, 0, $sppos));
						if (strlen($text) > $sppos)
							$descripcion .= '...';
					}
					?>
					<div class="publicacion">
						<a href="<?=$draizp?>/<?=$_SESSION[lenguaje]?>/pagina/<?=$entrada['id']?>/<?=str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entrada['nombre']))?>" title="Ver &laquo;<?=$entrada['nombre']?>&raquo;">
							<h2><?=$entrada['nombre']?></h2>
							<?php
								if ($entrada['imagen'] != null)
								{
									?>
									<span style="display: block; margin-bottom: 10px; max-height: 170px; overflow: hidden; text-align: center; width: 100%;">
										<img class="zoom" src="<?=$draizp?>/imagenesproductos/<?=$entrada['imagen']?>" alt="<?=$entrada['nombre']?>">
									</span>
									<?php
								}
							?>
						</a>
						<p><?=$descripcion?></p>
					</div>
					<?php
				}
				else
				{
					$texto_size = 150;
					$text = $entrada['contenido'];
					$text = strip_tags($text);
					$textlen = strlen($text);
					$pos = 0;
					$espacios = 0;
					while ($espacios < $texto_size && $pos < $textlen)
					{
						if ($text[$pos] == ' ')
							$espacios++;
						if ($espacios < $texto_size && $pos < $textlen)
							$pos++;
					}
					$pos--;
					$sppos = strpos($text, ' ', $pos);
					if ($sppos < 1) $sppos = $textlen - 1;
					if (strlen($text) > $sppos)
					{
						$descripcion = str_replace("\r\n", '<br>', substr($text, 0, $sppos));
						if (strlen($text) > $sppos)
							$descripcion .= '...';
					}
					?>
					<div class="publicacion">
						<a href="<?=$draizp?>/<?=$_SESSION[lenguaje]?>/pagina/<?=$entrada['id']?>/<?=str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entrada['nombre']))?>" title="Ver &laquo;<?=$entrada['nombre']?>&raquo;">
							<h2><?=$entrada['nombre']?></h2>
							<?php
								if ($entrada['imagen'] != null)
								{
									?>
									<span style="display: block; margin-bottom: 10px; max-height: 100px; overflow: hidden; text-align: center; width: 100%;">
										<img class="zoom" src="<?=$draizp?>/imagenesproductos/<?=$entrada['imagen']?>" alt="<?=$entrada['nombre']?>">
									</span>
									<?php
								}
							?>
						</a>
						<p><?=$descripcion?></p>
					</div>
					<?php
				}
				$anterior = $entrada['destacada'];
			}
		}
		else
		{
			echo '<p>No hay entradas disponibles en el blog.</p>';
		}
	?>
	</div>
</div>