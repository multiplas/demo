<script type="text/javascript" src="/scripts/jquery.lightbox-0.5-mod.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
(function($) {
	$(function() {
            $('#gallery a').lightBox();
	});  
})(jQuery);    	   	
</script>

<style>
    .social-sharing2 a, .social-sharing2 span{
        color: #333 !important;
    }
</style>

<div id="contenido">
    <?php if(isset($coment_anadido) && $coment_anadido){ ?>
    <div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=$coment_anadido ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; top: 5%; width: 50%; z-index: 99999;">
		<h2>Comentario añadido correctamente!</h2>
		<p>El comentario ha sido enviado correctamente y está en espera de ser aprobado por el administrador. En breve estará visible.</p>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">X</a>
	</div>
    <?php }else if(isset($coment_anadido) && !$coment_anadido){ ?>
    
    <div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=!$coment_anadido ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; top: 5%; width: 50%; z-index: 99999;">
		<h2>El comentario no se ha podido enviar!</h2>
		<p>Revise que todos los campos estén rellenos y vuelva a intentarlo.</p>
                <p>Si el problema persiste, póngase en contacto con nosotros.</p>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">X</a>
	</div>
    
    <?php } ?>
    <style>
        @media (max-width: 940px){
            .tamano_img{
                width: 100% !important;
                display: inline-block;
                vertical-align: top;
                
            }
            #textoimga{
                min-width: 95%;
            }
        }
        @media (min-width: 940px){
            .tamano_img{
               width: 300px !important;
               display: inline-block;
               margin-right: 125px;
               vertical-align: top;
               float: right;
            }
            
        }
        
        
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
       
     <?php   $nombre = strtolower($pagina['nombre']);
                        $nombre = preg_replace('([^A-Za-z0-9Á-Úá-ú])', '-', $nombre);	
                        $nombre = str_replace("á", "a", $nombre);
                        $nombre = str_replace("é", "e", $nombre);
                        $nombre = str_replace("í", "i", $nombre);
                        $nombre = str_replace("ó", "o", $nombre);
                        $nombre = str_replace("ú", "u", $nombre);
                        $nombre = str_replace("ñ", "n", $nombre);
                        $nombre = str_replace("--", "-", $nombre);
                        $nombre = str_replace("!", "", $nombre);
                        $nombre = str_replace("¡", "", $nombre);
                        $nombre = str_replace("?", "", $nombre);
                        $nombre = str_replace("¿", "", $nombre); ?>
                
                
                
    
  
    
    
	<div id="articulo" class="container">
            <div class="tamano_img">
                <div id="gallery">
                    <?=($pagina['imagen'] != '') ? '<a class="groupgalery" rel="galeria" href="'.$draizp.'/imagenes/'.$pagina['imagen'].'"><img id="textoimga" src="'.$draizp.'/imagenes/'.$pagina['imagen'].'" style="margin-bottom: 20px;" /></a>' : '';?>
                    <?php 
                        foreach ($imagenes as $image){
                            echo '<a class="groupgalery" rel="galeria" href="'.$Empresa['url'].'/imagenes/'.$image['imagen'].'"><img id="textoimga" src="'.$draizp.'/imagenes/'.$image['imagen'].'" style="margin-bottom: 20px;" /></a>';
                        }
                    ?>
                </div>
            </div>
            <div id="texto">
                <?php include('./bloques/social_sharing2.php'); ?>                
                <h2><?=$pagina['nombre']?></h2><br>
		<?=$pagina['contenido']?>
            </div>
        <?php if($Empresa['com_blog'] == 1){ ?>   
            <?php if($comentarios != null){ ?>
            <div style="display: inline-block; margin-right: 16px; vertical-align: top; float: right; width: 100% ! important;">
                <div style="text-align: center"><b><h3>Comentarios.</h3></b></div><br>
                <?php 
                    foreach ($comentarios as $comentario1){
                        echo $comentario1['nombre'] .': <b>'.$comentario1['comentario'] .'</b><br><br>';
                    }
                ?>
            </div>
            <?php } ?>
            
            <div style="display: inline-block; margin-right: 16px; vertical-align: top; float: right; width: 100% ! important;">
                <div style="text-align: center"><b>Dejanos aquí tu comentario</b></div>
                <form method="post" action="">
                    Nombre: <input type="text" name="nombre" id="nombre" maxlength="255" style="min-width: 100%" <?=$_SESSION['usr'] != null ? 'value="'.$_SESSION['usr']['nombre'].'"' : ''?>><br>
                    Email: <input type="text" name="email" id="email" maxlength="255" style="min-width: 100%" <?=$_SESSION['usr'] != null ? 'value="'.$_SESSION['usr']['email'].'"' : ''?>><br>
                    Comentario:<textarea name="comentario" id="comentario" style="min-width: 100%"></textarea>
                    <input type="hidden" name="envcom" id="envcom" value="1">
                    <input type="submit" id="BtSubmit" name="BtSubmit" class="button2" style="-webkit-appearance: none;" value="Enviar" disabled="">
                </form>
                <script>
                    $(document).on("change", "#nombre", function(){  
                        if($("#nombre").val() != ''){
                            if($("#email").val() != ''){
                                if($("#comentario").val() != ''){
                                    document.getElementById("BtSubmit").disabled = false;
                                    document.getElementById("BtSubmit").className = 'button';
                                }else{
                                    document.getElementById("BtSubmit").disabled = true;
                                    document.getElementById("BtSubmit").className = 'button2';
                                }
                            }else{
                                document.getElementById("BtSubmit").disabled = true;
                                document.getElementById("BtSubmit").className = 'button2';
                            }
                        }else{
                            document.getElementById("BtSubmit").disabled = true;
                            document.getElementById("BtSubmit").className = 'button2';
                        }
                    });
                    
                    $(document).on("change", "#email", function(){  
                        if($("#nombre").val() != ''){
                            if($("#email").val() != ''){
                                if($("#comentario").val() != ''){
                                    document.getElementById("BtSubmit").disabled = false;
                                    document.getElementById("BtSubmit").className = 'button';
                                }else{
                                    document.getElementById("BtSubmit").disabled = true;
                                    document.getElementById("BtSubmit").className = 'button2';
                                }
                            }else{
                                document.getElementById("BtSubmit").disabled = true;
                                document.getElementById("BtSubmit").className = 'button2';
                            }
                        }else{
                            document.getElementById("BtSubmit").disabled = true;
                            document.getElementById("BtSubmit").className = 'button2';
                        }
                    });
                    
                    $(document).on("change", "#comentario", function(){  
                        if($("#nombre").val() != ''){
                            if($("#email").val() != ''){
                                if($("#comentario").val() != ''){
                                    document.getElementById("BtSubmit").disabled = false;
                                    document.getElementById("BtSubmit").className = 'button';
                                }else{
                                    document.getElementById("BtSubmit").disabled = true;
                                    document.getElementById("BtSubmit").className = 'button2';                                    
                                }
                            }else{
                                document.getElementById("BtSubmit").disabled = true;
                                document.getElementById("BtSubmit").className = 'button2';
                            }
                        }else{
                            document.getElementById("BtSubmit").disabled = true;
                            document.getElementById("BtSubmit").className = 'button2';
                        }
                    });
                    
                    $(document).on("click", "#BtSubmit", function(){  
                       if($("#nombre").val() != ''){
                            if($("#email").val() != ''){
                                if($("#comentario").val() != ''){
                                    document.getElementById("BtSubmit").disabled = false;
                                    document.getElementById("BtSubmit").className = 'button';
                                }else{
                                    document.getElementById("BtSubmit").disabled = true;
                                    document.getElementById("BtSubmit").className = 'button2';
                                }
                            }else{
                                document.getElementById("BtSubmit").disabled = true;
                                document.getElementById("BtSubmit").className = 'button2';
                            }
                        }else{
                            document.getElementById("BtSubmit").disabled = true;
                            document.getElementById("BtSubmit").className = 'button2';
                        }
                    });
                </script>
            </div>
            
            <?php } ?>
	</div>
    
    
    <!--Enlaces-->
    <br><div id="publicaciones" style="width: 100% !important">
	<?php
		if ($enlacesP2 != null)
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
                                            <div class="texto_url" style="display: table-cell; vertical-align: middle; margin-bottom: 10px; overflow: hidden; width: 50%; left: 2%">
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
		
	?>
	</div>
</div>
<script type="text/javascript">
    $("a.groupgalery").fancybox();
</script>