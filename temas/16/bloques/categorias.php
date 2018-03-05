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

        @media (max-width: 600px) {
            .categories .col-sm-3{
                width: 100% !important;
                flex: none !important;
            }
        }
        .categories .single-category, .categories figcaption, .categories figure{
            background: #9d2563 !important;
        }
        .categories .single-category{
            background: #9d2563 !important;
            text-align: center !important;
            border-radius: 5px !important;
            margin-bottom: 1.8em !important;
            color: black !important;
            padding: 5px 5px 10px 5px !important;
            min-height: 365px;
            overflow: hidden;
            margin: 15px 9px 0px 0px !important;
        }

        .categories .col-sm-3{
            width: 24%;
            flex: none !important;
        }

        .categories{
            padding-left: 20px;
        }

        .categories figcaption{
            z-index: 5;
            position: absolute;
            width: 100%;
        }

        .categories figure{
            overflow: hidden !important;
        }

        .categories h3{
            color: #ffffff !important;
            padding-top: 15px !important;
            font-size: 17px !important;
            font-weight: 400 !important;
        }

        .categories a:hover{
            border: none !important;
        }

        .single-category img{
            height: 300px;
        }

    </style>
    
	<div class="categories container">
        <div class="row">
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
				<div class="single-category col-sm-3">
                    
					<a href="<?=$draizp?>/productos/<?=$categorias[$i]['id']?>/<?=$nombre?>/">
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
</div>