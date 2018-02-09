<div id="novedades">
	<div class="muestra">
		<?php
			if (count($categorias) < 1) echo $aux;
			for ($i = 0; $i < count($categorias); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($categorias[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
                
                $cate = $categorias[$i]['id'];
                $sql="SELECT * FROM bd_imagen_categoria WHERE idcat = $cate";
                $query = mysqli_query($dbi, $sql);
                $imagen = mysqli_fetch_assoc($query);
                       
		?>
				<div class="producto" <?=(($i % 4) == 0) ? 'style="margin-left:0;margin-bottom:1.8em;"' : 'style="margin-bottom:1.8em;"'?>>
                    <span class="descripcion" style="z-index: 999;text-align: center;position: absolute;font-size: 20pt;width: 202px;background: rgba(0, 0, 0, 0.28);color: white;"><?=$categorias[$i]['nombre']?></span>
					<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$categorias[$i]['id']?>/<?=$nombre?>/"><img class="zoom" src="<?=$draizp.'/imagenesproductos/'.$categorias[$i]['imagen'] ?>" alt="<?=$categorias[$i]['nombre']?>" /></a>
				</div>
		<?php
			}
		?>
	</div>
</div>