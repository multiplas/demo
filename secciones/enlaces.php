<div id="contenido">
    <style>
        .imagen_url{
            display: table-cell; 
            vertical-align: middle; 
            width: 40%;
        }
        @media(max-width: 768px){
            .texto_url{
                text-align: center;
            }
            
            .imagen_url{
                display: table-row; 
                vertical-align: middle; 
                width: 40%;
            }
        }
    </style>
    <div id="publicaciones" style="width: 100% !important">
	<?php
		if ($enlacesP != null)
		{
			$anterior = 0;
			foreach ($enlacesP2 AS $entrada)
			{
			
				
				
					
					?>
                                        <div class="publicacion" style="display: table; height:230px; width: 100%">
                                            <div class="imagen_url">
						<a href="<?=$entrada['url']?>" target="_blank" title="Ver &laquo;<?=$entrada['nombre']?>&raquo;">	
							<?php
								if ($entrada['imagen'] != null)
								{
									?>
									<span style="display: block; margin-bottom: 10px; overflow: hidden; text-align: center;">
										<img class="" src="<?=$draizp?>/imagenes/<?=$entrada['imagen']?>" alt="<?=$entrada['nombre']?>" style="max-height: 250px; max-width: 100%; width: auto; vertical-align: middle">
									</span>
									<?php
								}
							?>
                                                </a>
                                            </div>
                                            <div class="texto_url" style="display: table-cell; vertical-align: middle; margin-bottom: 10px; overflow: hidden; width: 50%; margin-left: 10%">
                                                <a href="<?=$entrada['url']?>" target="_blank" title="Ver &laquo;<?=$entrada['nombre']?>&raquo;">
                                                     <h2 style="font-family: <?=$fuente1?>;"><?=$entrada['nombre']?></h2>
                                                </a>
                                                <a href="<?=$entrada['url']?>" target="_blank" title="Ver &laquo;<?=$entrada['nombre']?>&raquo;">
                                                    <p style="font-family: <?=$fuente2?>"><?=$entrada['contenido']?></p>
                                                </a>
                                            </div>
						
                                            
                                        </div>
        

					<?php
				
				
			}
		}
		else
		{
			echo '<p>No hay enlaces disponibles.</p>';
		}
	?>
	</div>
</div>