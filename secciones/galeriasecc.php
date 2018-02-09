<?php
$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹",",",".",":",";");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","","","","");
?>
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
    
   <div id="menu-cate"><h3 class="color-menu-cat" style="background-color: <?=$colores['menu']?>; text-align:center;color:<?=$colores['menu_letra']?>; text-align:center;padding-top:5px;padding-bottom:5px;margin:0;margin-top:25px;">Galerías</h3>
        <div style="padding:0px;">
            <ul style="list-style: none;">
                <?php
                if($menu != null){
                    foreach ($menu AS $menu_in)
                    {
                        echo '<li><a href="'.$draizp.'/'.$_SESSION[lenguaje].'galeriasecc/'.$menu_in[id].'/'.strtolower(str_replace(' ', '-', str_replace($no_permitidas, $permitidas , $menu_in[nombre]))).'" >'.$menu_in[nombre].'</a></li>';
                    }
                }
                ?>
            </ul>
        </div>
    </div>
   <div id="publicaciones">
    <h2>Nuestra Galería</h2><br>
    <?php
        foreach ($galeria AS $imagen)
        {
            if($imagen['imagen'] != '.' && $imagen['imagen'] != '..' && strlen($imagen['imagen']) >= 5)
            {
                $ext = strtolower(substr($imagen['imagen'], -3));
                $exta = strtolower(substr($imagen['imagen'], -4));
                if ($ext != 'jpg' && $ext != 'png' && $ext != 'gif' && $ext != 'bmp' && $exta != 'jpeg')
                    continue;
                ?><div class="divgroupgalery">
                    <a class="groupgalery" rel="galeria" href="<?=$draizp?>/imagenes/galeria/<?=$imagen['imagen']?>" title="<?=$imagen['descripcion']?>">
                        <img src="<?=$draizp?>/imagenes/galeria/<?=$imagen['imagen']?>" />
                        <?php if($imagen['descripcion'] != ''){ ?>
                        <div style="position: absolute;top: 10px; z-index: 10; background-color: rgb(255, 255, 255, 0.7);padding: 5px 5px;left: 10px;right: 10px;font-weight: bold;">
                            <?=$imagen['descripcion']?><br>
                        </div>
                        <?php } ?>
                    </a>                    
                </div>
				<?php
            }
        }
    ?>
    </div>
    
    <?php if($Empresa['com_galeria'] == 1){ ?>
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
                    Nombre: <input type="text" name="nombre" id="nombre" maxlength="255" style="min-width: 100%; border: 1px solid #aaa; border-radius: 2px; box-sizing: border-box; font-family: inherit; font-size: 16px; height: auto; padding: 8px;" <?=$_SESSION['usr'] != null ? 'value="'.$_SESSION['usr']['nombre'].'"' : ''?>><br>
                    Email: <input type="text" name="email" id="email" maxlength="255" style="min-width: 100%; border: 1px solid #aaa; border-radius: 2px; box-sizing: border-box; font-family: inherit; font-size: 16px; height: auto; padding: 8px;" <?=$_SESSION['usr'] != null ? 'value="'.$_SESSION['usr']['email'].'"' : ''?>><br>
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
<script type="text/javascript">
    $("a.groupgalery").fancybox();
</script>