<div class="menu-nav" style="margin-top: 20px;">
	<div class="container_base">
		<div class="menu-navigation" style="max-width: 1060px;margin: auto;">
                <?php 
                    foreach ($categorias AS $padre)
                    {
                        $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                        $nombre = strtolower($nombre);
                        $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	  
                        if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  
                        echo '<div class="menu-item isparent"><a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a></div>';
                    }
                ?>
                    <?php if($Empresa['blog'] == 1){ ?>
			     <div class="menu-item isparent"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>blog"><?=$Empresa['nblog']?></a></div>
                    <?php } 
                        if($Empresa['galeria'] == 1){
                    ?>
                        <div class="menu-item isparent"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>galeria"><?=$Empresa['ngaleria']?></a></div>
                    <?php } ?>
                </div>
	</div>
</div>

<style>
    .fa-lg{
        vertical-align: 0% !important;
    }
    #top{
        background-color: <?=$colores['barra_sup']?> !important;
    }
    #grupo-submenu #submenu ul li:hover{
        background-color: <?=$colores['barra_sup']?>;
        transition: all 1s ease 0s;
    }    
    #grupo-submenu #submenu ul li {
        font-size: 16px;
    }
    #grupo-submenu #submenu-r {
        background: <?=$colores['menu']?> none repeat scroll 0 0 !important;
        color: <?=$colores['menu_letra']?>;
    }
    #grupo-submenu #submenu-r #submenu-op {
        color: white;
        font-weight: normal;
        margin-top: 17px;
    }
    #grupo-submenu #submenu ul li ul li {
        transition: all 0.5s ease-in 0s;
    }
    
    #posicion-bar div a {
        color: #000;
        text-decoration: none;
    }
    #grupo-submenu {
        background: <?=$colores['menu']?> none repeat scroll 0 0 !important;
    }
    #grupo-submenu #submenu ul li ul li {
        line-height: 100% !important;
    }
    #grupo-submenu #submenu ul li ul li:hover {
        line-height: 100% !important;
    }
    
    #grupo-submenu #submenu ul li ul li a {
        margin-top: -9px;
        top: 50%;
    } 
    
    @media (min-width:1220px){
        .imagenMenu{
            visibility: hidden; height:35px; margin-top: 0px;
        }
        .imagenMenu2{
            visibility: visible; height:35px; margin-top: 0px;
        }
        .divLogo{
            display: none !important;
        }
        .divLogo2{
            display: inline !important;
        }
        
        .no_grande{
            display: none;
        }
    }
    
    @media (max-width:1220px){
        .divLogo{
            display: none !important;
        }
        .divLogo2{
            display: none !important;
        }
        #grupo-submenu{
            top: 0px;
            width: 100%;
        }        
    }
    
    @media (max-width:1220px){
        .menu_movil_{
            display: block;
        }
        
        #grupo-submenu #submenu-r ul li a:hover{
            background: #ffffff;
            color: #000000;
        }
    }
    
    @media (min-width:1220px){
        .menu_movil_{
            display: none;
        }
        
        #grupo-submenu{
            display: none;
        }
    }
</style>
<div id="grupo-submenu" style="width: 100%; box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4); min-height: 75px; z-index: 1000; background: rgb(0, 0, 0) none repeat scroll 0% 0%;">
<div id="submenu-r" class="menu_movil_">
                
        <a href="javascript: void(0);" id="submenu-op"><i class="fa fa-bars fa-lg" style="top: -10px;"></i>&nbsp;&nbsp;&nbsp;<img id="logo_fijo2" style="height: 40px; max-width: 200px; top: -4px;" class="imagenMenu2" src="<?=$draizp?>/source/<?=$logoMenu?>" alt=""/></a>   
        <ul id="despl" style="display: none">
			<li><a href="/">Inicio</a></li>
                        <?php foreach ($categorias AS $padre)
                                {
                                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                                    $nombre = strtolower($nombre);
                                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	  
                                    echo '<li>';
                                    if($padre['url'] == ''){ ?>
                                        <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$padre['id']?>/<?=$nombre?>/" class="submenu"><?=$padre['nombre']?></a>
                                    <?php }else{ ?>
                                        <a href="<?=$padre['url']?>" target="_blank" class="submenu"><?=$padre['nombre']?></a>
                                    <?php }                                             
                                    echo '</li>';
                                }
                                ?>
                         <?php if($Empresa['blog'] == 1){ ?>
			     <li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/blog"><?=$Empresa['nblog']?></a></li>
                        <?php } 
                            if($Empresa['galeria'] == 1){
                        ?>
                            <li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/galeria"><?=$Empresa['ngaleria']?></a></li>
                        <?php } ?>
		</ul>
	</div>
</div>