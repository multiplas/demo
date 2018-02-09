<div id="novedades">
    <style>
        @media (min-width:940px){
            #grupo-contenido #contenido #productos .producto, #grupo-contenido #contenido #novedades div.muestra div.producto, #grupo-contenido #contenido #masvendidos div.muestra div.producto{
                border: none !important;
                padding: 2% 1% 1.5% !important;
                width: 21% !important;
            }
        }
        
        @media (max-width:940px){
            #grupo-contenido #contenido #productos .producto, #grupo-contenido #contenido #novedades div.muestra div.producto, #grupo-contenido #contenido #masvendidos div.muestra div.producto{
                border: none !important;
                padding: 2% 1% 1.5% !important;
                width: 100% !important;
            }
        }
    </style>
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
                    
					<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$categorias[$i]['id']?>/<?=$nombre?>/">
                                            <figure class="<?=$efecto?>" style="background-color:<?=$CFefecto?>;">
                                            <img class="zoom" src="<?=$draizp.'/imagenesproductos/'.$categorias[$i]['imagen'] ?>" alt="<?=$categorias[$i]['nombre']?>" />
                                            <figcaption style="background-color:<?=$CFefecto?>;">
                                                <h3 class="ih-fade-down ih-delay-sm" style="color:<?=$CLefecto?>"><?=$categorias[$i]['nombre']?></h3>
                                                <p class="ih-zoom-in ih-delay-sm" style="color:<?=$CLefecto?>"><?=substr($categorias[$i]['descripcion'], 0, 70)?><?=strlen($categorias[$i]['descripcion']) > 70 ? '...' : ''?></p>
                                            </figcaption>
                                        </figure>
                                            
                                        </a>
				</div>
		<?php
			}
		?>
	</div>
</div>