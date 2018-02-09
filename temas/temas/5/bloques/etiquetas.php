

<div id="novedades" style="border: 1px solid rgb(221, 221, 221); padding: 15px;">
    
<style>
        @media (max-width:940px){
            .muestra{
                display: none;
            }
            .muestra2{
                display: inline;
            }
            .fotorama__caption__wrap{
                font-size: 10pt !important;
            }
            .fotorama__stage{
                height: 230px !important;
            }
            .fotorama__caption__wrap{
                min-height: 80px !important;
            }
            .fotorama__img{
                height: 100% !important;
                top: -2px !important;
            }
            .vermas3{
                            border: 1px solid #e74e4e;
                            border-radius: 6px;
                            color: <?=$colores['boton_letras']?>;
                            font-size: 1rem;
                            font-weight: bold;
                            height: 1rem;
                            line-height: 1rem;
                            margin: 10px 0 0;
                            max-width: 40%;
                            padding: 4px 15px;
                            transition: border 1s ease 0s, background 1s ease 0s, color 1s ease 0s;
                            width: auto;
                            background-color: <?=$colores['boton_fondo']?>;
                        }
                        
                        .vermas3:hover{
                            background-color: <?=$colores['boton_fondo_hover']?>;
                            color: <?=$colores['boton_letras_hover']?>;
                        }
        }
        
        @media (min-width:940px){
            .muestra{
                display: inline;
            }
            .muestra2{
                display: none;
            }
        }
        
        .etiquetas_estilo{
            font-size: 13px;
            line-height: 16px;
            font-weight: bold;
            padding: 4px 9px 5px 9px;
            border: 1px solid #d6d4d4;
            margin: 0 3px 3px 0;
        }
        
        .etiquetas_estilo:hover{
            background-color: grey;
            color: white;
        }
    </style>
    

    
	<span class="tfiltro">Etiquetas</span>
	<div class="muestra" style="text-align: center; display: inline !important">
		<?php
			if (count($etiquetasMuesta) < 1) echo 'No hay etiquetas disponibles.';
			for ($i = 1; $i < count($etiquetasMuesta); $i++)
			{
                $nombre = utf8_encode(strtr(utf8_decode($etiquetasMuesta[$i]['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
		?>
				
                        <a class="etiquetas_estilo" style="width: 83% !important;max-width: 83% !important;text-align:center" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>buscarEtq/<?=$etiquetasMuesta[$i]['id']?>/<?=$nombre?>"><?=$etiquetasMuesta[$i]['nombre']?></a>
                    
				
		<?php
			}
		?>
	</div>
    
</div>	
