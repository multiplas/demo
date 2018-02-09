<?php
$no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹",",",".",":",";");
$permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E","","","","");
?>
<div id="contenido">
   <div id="menu-cate"><h3 class="color-menu-cat" style="background-color: <?=$colores['menu']?>; text-align:center;color:<?=$colores['menu_letra']?>;padding-top:5px;padding-bottom:5px;margin:0;margin-top:25px;">Galerías</h3>
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
</div>
<script type="text/javascript">
(function($) {
    $("a.groupgalery").fancybox();
 })(jQuery);   
</script>