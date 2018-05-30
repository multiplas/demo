<?php if($cabecera == 17){ ?>
<link href="//use.fontawesome.com/releases/v5.0.7/css/all.css" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?=$draizp?>/componentes/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<?php
$principalColors = getColors();

?>
<style>
    body{
        background: #fff;
    }
    #cabecera, #top {
        max-width: 1200px !important;
        overflow: hidden;
        width: auto;
        border-bottom: none;
        background: #fff;
        height: 80px;
    }
    /* #cabecera{
        border-top: 1px solid #ccc;
    } */
    #top>div {
        width: 20%;
        display: inline-block;
    }
    /* .icono-header{
        width: 20px;
        border: 1px solid #ccc;
        padding: 5px;
    } */

    .dropdown{
        position: absolute;
        bottom: 0;
        right: 0;
        z-index: 70000;
    }

    .dropdown-toggle{
        background: transparent !important;
        color: <?=$principalColors['colordestacado']?> !important;
        border: none !important;
        box-shadow: none !important;
    }

    .dropdown button, .dropdown a{
        font-size:13px;
    }

    #top {
        padding: 5px 0 5px 0;
        font-size: 12px;
    }

    #top span, #top i{
        color: #aaa;
    }

    #top strong{
        padding: 0 3px 0 5px;
    }

    #top strong, #top a:hover{
        color: #333;
        transition: 0.5s;
    }

    .nav-top {
        padding-top: 0px;
        height: 135px;
        font-size: 13px;
       
        z-index: 99;
        margin-bottom: 5px;
    }

    .nav-top .row{
        height: 100%;
    }

    #cabecera #logo {
        vertical-align: middle;
        margin-top: 0px;
        max-width: 20%;
        margin-left: 0px;
        width: 250px;
        margin-bottom: 10px;
        display: table;
        table-layout: fixed;
        float: left;
    }

    #cabecera #menu-right{
        width: 100%;
    }

    #grupo-submenu a:hover, #grupo-submenu #submenu ul li:hover>a{
        color: <?=$principalColors['colordestacado']?> !important;
    }

    #grupo-submenu #submenu ul li ul li a:hover{
        color: <?=$principalColors['colordestacado']?> !important;
    }

    #grupo-contenido #contenido {
        padding: 0px !important;
    }

    .vistazo-rapido {
        position: absolute;
        left: 16px;
        top: 162px;
        border-radius: 0px;
        height: 38px;
        font-size: 12px;
        -webkit-transition: all 1s;
        -moz-transition: all 1s;
        transition: all 1s;  
        opacity: 1;
    }

    .vistazo-rapido, .ver-mas-img{
        height: 38px;
    }

    .vistazo-rapido,.ver-mas-img, .ver-mas-img a{
        background: <?=$principalColors['colordestacado']?>;
        border: <?=$principalColors['colordestacado']?>;
        border-radius: 2px;
        text-decoration: none !important;
        color: <?=$principalColors['colortextobotonform']?> !important;
        -webkit-transition: all 1s;
        -moz-transition: all 1s;
        transition: all 1s;
    }

    .formulario-buscador input{
        color: <?=$principalColors['colordestacado']?>;
    }

    .vistazo-rapido:hover,.ver-mas-img:hover, .ver-mas-img a:hover{
        background: #333;
        border: #333;
    }

    #grupo-submenu {
        width: auto;
        font-weight: 700;
        font-size: 10px;
    }

    #grupo-submenu #submenu{
        max-width: 100% !important;
        width: 100% !important;
    }

    #grupo-submenu #submenu ul li {
        font-size: 12px;
    }

    .usuario{
        position: absolute;
        display: block;
        top: 0;
        right: 20px;
        z-index: 58000;
        overflow: hidden;
        /* list-style: none; */
    }

    .contact-bar {
        height: 95px;
        padding-top: 17px;
        padding-bottom: 58px;
        background: <?=$principalColors['colordestacado']?>;
        color: #fff;
    }

    .usuario ul {
        margin: 5px 0px 0px 0px;
    }

    .usuario li{
        list-style: none;
    }

    .usuario li a{
        font-weight: 500;
    }

    /* tamaños para el slider */

    #sli img {
        height: 400px;
        width: auto;
        /* position: relative; */
        left: 50%;
    }

    .fotorama__stage.fotorama__pointer {
        height: 400px !important;
    }

    .cabecera-slider {
        height: 400px !important;
        margin-bottom: 50px;
    }

    .usuario li a {
        font-weight: 600;
        font-size: 12px;
        /* margin-right: 5px; */
        text-transform: uppercase;
    }

    .contact-bar-text{
        padding: 10px;
        text-transform: uppercase;
    }

    .usuario i {
        padding: 0px 0px 0px 5px;
        font-size: 18px;
        top: 14px;
        position: absolute;
        color: #555 !important;
    }

    #grupo-submenu{
        position: absolute;
        /* right: 0; */
    }

    #buscador2{
        width: 267px;
    }
    
    #buscador2 input[type=text] {
        background: rgba(255, 255, 255, 0.20);
        border: none;
        margin-left: 15px;
        margin-top: 1px;
        border-bottom-left-radius: 3px;
        border-top-left-radius: 3px;
        color: #FFF;
        float: left;
        font-size: 21px;
        outline: none;
        padding: 5px 5px;
        width: 200px;
        vertical-align: middle;
    }

    #buscador2 span#BtBuscar {
        background: #d15c5c url(../source/lupa.png);
        background-position: center;
        background-repeat: no-repeat;
        border: none;
            margin-top: 1px;
        border-bottom-right-radius: 3px;
        border-top-right-radius: 3px;
        float: left;
        font-size: 20px;
        height: 22px;
        padding: 6px;
        width: 30px;
        margin-left: 0px;
        vertical-align: middle;
        }
    
    .num-cesta{
        position: relative;
        padding: 0px 5px;
        border-radius: 20px;
        background: white;
        color: darkslategray;
        font-weight: bold;
    }

    .fix-navbar{
        position: fixed;
        top: 0;
        z-index: 70000;
        width: 100%;
        max-width: 100% !important;
        overflow: visible !important;
        border-bottom: solid #ddd 1px !important;
    }

    /* product list */
    .imagen-producto{
        height:200px;
        width:100%;
        overflow: hidden;
    }

    .single-product{
        margin-bottom: 15px;
    }

    .imagen-producto img{
        height: 100%;
    }
    .titulo-producto h4 {
        font-size: 16px;
        padding: 5px;
    }
    .titulo-producto{
        height: 50px;
        overflow: hidden;
    }
    .descripcion-producto{
        height:100px;
        width: 100%;
        font-size: 13px;
        padding: 5px;
        height: 48px;
        overflow: hidden;
    }
    .single-product .imagen-producto, .single-product .product-info{
        border: 1px solid #ddd;
    }
    .product-price{
        text-align: center;
        color: red; 
    }
    .ver-mas-img {
        position: absolute;
        right: 16px;
        top: 162px;
        border-radius: 0px;
        -webkit-transition: all 1s; /* Safari */
        transition: all 1s;   
        opacity: 1;
    }

    #myFrame{
        width: 100%;
        height: 100%;
        background-color: white;
    }

    #vistazo-rapido-container{
        display:none;
    }

    .display-iframe{
        display: inherit !important;
        position: fixed;
        top: 0;
        z-index: 80000;
        background: #00000080;
        width: 100%;
        height: 100%;
        left: 0;
        padding-top: 15%;
        padding-left: 30%;
        margin: 0;
        padding-right: 30%;
        padding-bottom: 10%;
    }
    .close-iframe {
        height: 20px;
        width: 100%;
        color: white;
        right: 0;
        position: relative;
        text-align: right;
    }
    .close-button{
        cursor: pointer;
    }    

    .ver-mas-img a {
        font-size: 12px;
    }

    #grupo-submenu #submenu ul li ul li ul li {
        margin-left: 215px;
    }

    #grupo-contenido #contenido{
        max-width: 1900px !important;
    }
    #buscador form{
        position: absolute;
        width: 1160px;
        z-index: 60000;
        height: 0px;
        overflow: hidden;
    }

    .search-button, .bag-button {
        width: 100%;
        cursor: pointer;
    }

    .search-button i, .bag-button i, .bag-button span{
        color: #fff !important;
    }

    #buscador form, #buscador input{
        -webkit-transition: all 1s ease-in-out;
        -moz-transition: all 1s ease-in-out;
        -o-transition: all 1s ease-in-out;
        transition: all 1s ease-in-out;
    }

    #grupo-contenido #contenido #novedades, #grupo-contenido #contenido #masvendidos, #grupo-contenido #contenido #bajo{
        max-width: none !important;
    }

    .estado-inicial{
        visibility: hidden;
        top: 135px;
        opacity: 0;
    }

    .logo-fondo{
        background: url(<?=$draizp?>/source/<?=$logoSup?>);
        background-repeat: no-repeat;
        background-position: left;
        z-index: 100;
    }

    .bloque-nav-top{
        background: url(<?=$draizp?>/source/<?=$fCabecera?>) repeat-x;
        -moz-box-shadow: 0px 1px 4px 1px;
        -webkit-box-shadow: 0px 1px 4px 1px;
        box-shadow: 0px 1px 4px 1px;
        margin-bottom: 5px;
    }

    .nav-right-menu li {       
        list-style: none;
        background: none;
        border: none;
        padding: 7px;
    }

    .bag-button a {
        background: #ffffff70 !important;
        height: 35px;
        padding: 8px;
    }

    .nav-right-menu {
        bottom: 0;
        position: absolute;
        right: 0;
        color: <?=$principalColors['colordestacado']?>;
        margin-bottom: 3px;
    }

    .nav-right-menu span {
        font-size: 15px;
        font-weight: bolder;
        letter-spacing: 0.5px;
    }
    
    .nav-right-menu i {
        font-size: 17px;
        padding-right: 5px;
        padding-left: 5px;
    }

    .boton-buscar {
        text-align: center;
        border: solid 1px;
        padding: 2px 20px 3px 6px;
        font-size: 10px;
    }

    .banner-cabecera{
        width: 100%;
        height: 70px;
        background: #fcac19;
        margin: 20px 0 20px 0;
    }

    /* Menu */

    .submenu {
        padding-top: 0.75em !important;
    }

    .submenu span {
        font-weight: bold;
        font-size: 1.3em;
        line-height: 1.25;
        padding-top: 4px;
        display: inline-block;
        border-left: solid 1px #ddd;
        padding-left: 30px;
        padding-right: 30px;
        letter-spacing: 1px;
    }

    .index-menu {
        font-weight: bold;
        font-size: 1.3em;
        line-height: 1.25;
        padding-top: 4px;
        display: inline-block;
        /* border-left: solid 1px #ddd; */
        padding-left: 30px;
        padding-right: 30px;
        letter-spacing: 1px;
        padding-top: 0.81em !important;
    }

    @media (max-width:830px)
    { 
        #buscador2{
            position: absolute;
            left:25%; 
            top:25%;
            margin-left: -0px;
        }
    }
    
    @media (max-width:500px)
    { 
        #buscador2{
            position: absolute;
            left:5%; 
            margin-left: -0px;
        }

        .nav-top {
            height: 130px;
            display: none;
        }
        .nav-top div {
            margin-bottom: 11px;
        }
        /* #sli img{
            height: 100%;
            width: auto;
        } */
        #grupo-submenu {
            left: 0;
            width: 100%;
        }
        #grupo-submenu #submenu-r ul {
            text-align: left;
        }
        #cabecera{
            width:100% !important;
        }
        .contact-bar {
            height: 250px;
        }
        #grupo-contenido{
            margin-top: 30px;
        }
    }
</style>


<script>
$(document).ready(function() {
    $( window ).scroll(function() {
        if($(window).scrollTop() > 50){
            $('#cabecera').addClass('fix-navbar');
            $('#cabecera').css('cssText','max-width: 100% !important');
        }
        else{
            $('#cabecera').removeClass('fix-navbar');
            $('#cabecera').css('cssText','max-width: 1200px !important');
        }
    });
    $('.ver-mas-img')
    .mouseenter(function(){
        $( this ).find( 'a').css('background-color','#333');
    })
    .mouseleave(function(){
        $( this ).find( 'a').css('background-color','<?=$principalColors['colordestacado']?>');
    });
    $('.single-product')
    .mouseenter(function(){
        $( this ).find( '.ver-mas-img' ).removeClass("estado-inicial");
        $( this ).find( '.vistazo-rapido' ).removeClass("estado-inicial");
    })
    .mouseleave(function(){
        $( this ).find( '.ver-mas-img' ).addClass("estado-inicial");
        $( this ).find( '.vistazo-rapido' ).addClass("estado-inicial");
    });
    // $(document).mouseup(function(e) 
    // {
    //     var container = $(".search-button");
    //     var container2 = $("#buscador");
    //     // if the target of the click isn't the container nor a descendant of the container
    //     if (!container.is(e.target) && container.has(e.target).length === 0) 
    //     {
    //         if (!container2.is(e.target) && container2.has(e.target).length === 0) 
    //             $('.formulario-buscador').css('height','0px');
    //     }
    //     else{
    //         $('.formulario-buscador').css('height','62px');
    //     }
    // });
});
</script>

<?php 
$themeImages = loadThemeImages();
$urlBanner = '';
$urlImageSuperior = '';
$urlImageMedio = '';
$urlImageInferior = '';
foreach($themeImages as $image){
    if($image['posicion'] == "bannerCabecera") $urlBanner = $draizp."/ficheros/".$image['valor'];
    if($image['posicion'] == "imagenLateral1") $urlImageSuperior = $draizp."/ficheros/".$image['valor'];
    if($image['posicion'] == "imagenLateral2") $urlImageMedio = $draizp."/ficheros/".$image['valor'];
    if($image['posicion'] == "imagenLateral3") $urlImageInferior = $draizp."/ficheros/".$image['valor'];
}

?>
<div class="container-fluid bloque-nav-top">
    <div class="container nav-top">
        <div class="row">
            <div class="col-xs-12 col-sm-4 align-middle logo-fondo" >
                    <!-- <span class="icono-header"><i class="far fa-envelope"></i></span>
                    <span><strong>Email:</strong></span>
                    <span><a href="mailto:<?=$Empresa['email']?>"><?=$Empresa['email']?></a></span>		 -->
            </div>
            <div class="col-sm-4 align-middle">
            <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    
                </div>
                <div class="col-sm-4">
                    <div class="dropdown show right-bottom">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Mi cuenta
                        </button>
                        <?php if ($_SESSION['usr'] != null) { ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?=$draizp?>/cuenta">Mi cuenta</a>
                                <a class="dropdown-item" href="<?=$draizp?>/acc/salir">Desconectarse</a>
                            </div>
                        <?php }else{ ?>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="<?=$draizp?>/cuenta">Conectarse</a>
                            </div>
                        <?php } ?>    
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-4 align-middle text-right">
                    <ul class="pull-right nav-right-menu">
                        <li>
                            <span class="icono-header"><i class="fas fa-phone"></i></span>
                            <span><a href="tel:<?=$Empresa['telefono']?>"><?=$Empresa['telefono']?></a></span>		
                        </li>
                        <li class="bag-button">
                            <a href="<?=$draizp?>/cesta"><i class="fas fa-shopping-bag "></i> <span> <?=count($cestanum)?> artículo(s) </span></a>				
                        </li>
                        <li class="search-button">
                            <div class="row">
                                <div class="col-sm-10">
                                    <form action="<?=$draizp?>/<?=$_POST['buscar']?>" class="" method="post">
                                        <input style="background: <?=$principalColors['fondosubmenuhoverresp']?>;color:<?=$principalColors['colorgeneralinicio']?>;height: 23px; border:none; padding-left: 25px;width: 100%;" name="buscar" type="text" id="busc" value="<?=(isset($_POST['buscar'])) ? $_POST['buscar'] : '';?>" /><span id="BtBuscar" style="background: #4b4b4b url(../source/lupa.png);background-position: center;background-repeat: no-repeat;" name="BtSubmit"></span>
                                    </form>
                                </div>
                                <div class="col-sm-2" style="padding: 0;">
                                    <div class="boton-buscar">Buscar</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <br>

            </div>
            <!-- <div class="col-sm-2">
                <div class="dropdown show">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mi cuenta
                    </button>
                    <?php if ($_SESSION['usr'] != null) { ?>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?=$draizp?>/cuenta">Mi cuenta</a>
                            <a class="dropdown-item" href="<?=$draizp?>/acc/salir">Desconectarse</a>
                        </div>
                    <?php }else{ ?>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="<?=$draizp?>/cuenta">Conectarse</a>
                        </div>
                    <?php } ?>    
                </div>
            </div> -->

        </div>
    </div>
</div>

<?php if($fCabecera != ''){ ?>
    <div style="">
<?php } ?>
<div class="container">
    <div class="banner-cabecera">
        <img src="<?=$urlBanner?>" alt="">
    </div>
</div>
<div id="cabecera">     
    <div class="container">
        <!-- <div id="logo">
            <?php if($logoSup != ''){ ?><a href="<?=$draizp?>/"><img src="<?=$draizp?>/source/<?=$logoSup?>" alt="" /></a><?php } ?>
        </div> -->
        <div id="menu-right">
            <!-- <?=$Empresa['localidad']?> | <?=$Empresa['provincia']?><br>
            <a href="tel:+34<?=number_format($Empresa['telefono'], 0, '', ' ')?>"><?php echo number_format($Empresa['telefono'], 0, '', ' '). '</a> | <a href="mailto:'.$Empresa['email'].'" >' .$Empresa['email']. '</a>'; ?> -->
            <!-- <div style="text-align:right;margin-bottom:0%;">
                <?php if(count($idiomas) >= 1){ ?>
                    <form action="<?=$draizp?>/es/" method="post" style="width:17px;display:inline-block;">
                        <input type='hidden' name='idioma' value='ESP' />
                        <input type="image" style="width:17px;" name="idioma" id="idioma" value="ESP" src="<?=$draizp?>/source/Spain-flag-48.png" />
                    </form> &nbsp;&nbsp;
                <?php } ?>
                <?php
                    for($i=0; $i<=count($idiomas); $i++){
                        if($idiomas[$i][0] == 'RUS'){
                        ?>
                            <form action="<?=$draizp?>/ru/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='idioma' value='RUS' />
                                <input type="image" style="width:17px;" name="idioma" id="idioma" value="RUS" src="<?=$draizp?>/source/Russia-flag-48.png" />
                            </form>
                        <?php
                        }
                        if($idiomas[$i][0] == 'CAT'){
                        ?>
                            <form action="<?=$draizp?>/ca/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='idioma' value='CAT' />
                                <input type="image" style="width:17px;" name="idioma" id="idioma" value="CAT" src="<?=$draizp?>/source/Catalonia-flag-48.png" />
                            </form> &nbsp;&nbsp;
                        <?php
                        }
                        if($idiomas[$i][0] == 'UK'){
                        ?>
                            <form action="<?=$draizp?>/en/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='idioma' value='UK' />
                                <input type="image" style="width:17px;" name="idioma" id="idioma" value="UK" src="<?=$draizp?>/source/United-kingdom-flag-48.png" />
                        </form> &nbsp;&nbsp;
                        <?php
                        }
                        if($idiomas[$i][0] == 'DEU'){
                        ?>
                            <form action="<?=$draizp?>/de/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='idioma' value='DEU' />
                                <input type="image" style="width:17px;" name="idioma" id="idioma" value="DEU" src="<?=$draizp?>/source/Germany-flag-48.png" /> 
                            </form> &nbsp;&nbsp;
                        <?php
                        }
                        if($idiomas[$i][0] == 'FRA'){
                        ?>
                            <form action="<?=$draizp?>/fr/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='idioma' value='FRA' />
                                <input type="image" style="width:17px;" name="idioma" id="idioma" value="FRA" src="<?=$draizp?>/source/France-flag-48.png" alt="FRA" /> 
                            </form> &nbsp;&nbsp;
                        <?php
                        }
                        if($idiomas[$i][0] == 'ITA'){
                        ?>
                            <form action="<?=$draizp?>/it/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='idioma' value='ITA' />
                                <input type="image" style="width:17px;" name="idioma" id="idioma" value="ITA" src="<?=$draizp?>/source/Italy-flag-48.png" alt="ITA" />
                            </form> &nbsp;&nbsp;
                        <?php
                        }
                        if($idiomas[$i][0] == 'POR'){
                        ?>
                            <form action="<?=$draizp?>/pr/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='idioma' value='POR' />
                                <input type="image" style="width:17px;" name="idioma" id="idioma" value="POR" src="<?=$draizp?>/source/Portugal-flag-48.png" alt="POR" /> 
                            </form> &nbsp;&nbsp;
                        <?php
                        }
                    }
            ?>
            </div> -->
            <!-- <div style="text-align:right;margin-bottom:0%;">
                <?php
                if(count($divisas) >= 1){
                        if($divisas['EUR'] == 1){
                        ?>
                            <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='divisa' value='EUR' />
                                <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="EUR" src="<?=$draizp?>/source/Euro.png" />
                            </form>
                        <?php
                        }
                        if($divisas['USD'] == 1){
                        ?>
                            <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='divisa' value='USD' />
                                <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="USD" src="<?=$draizp?>/source/Dolar.png" />
                            </form> &nbsp;&nbsp;
                        <?php
                        }
                        if($divisas['JPY'] == 1){
                        ?>
                            <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='divisa' value='JPY' />
                                <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="JPY" src="<?=$draizp?>/source/Yen.png" />
                        </form> &nbsp;&nbsp;
                        <?php
                        }
                        if($divisas['GBP'] == 1){
                        ?>
                            <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='divisa' value='GBP' />
                                <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="GBP" src="<?=$draizp?>/source/Libra.png" /> 
                            </form> &nbsp;&nbsp;
                        <?php
                        }
                        if($divisas['CHF'] == 1){
                        ?>
                            <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                                <input type='hidden' name='divisa' value='CHF' />
                                <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="CHF" src="<?=$draizp?>/source/FrancoSuizo.png" /> 
                            </form> &nbsp;&nbsp;
                        <?php
                        }
                }
                    ?>
                    
            </div> -->
            <?php include_once('menu.php'); ?>
        </div>
    </div>
</div>
<?php if($fCabecera != ''){ ?>
        </div>
<?php } ?>
<?php }else{
    if(isset($_GET['logo']))
        $_SESSION['logoURL'] = $_GET['logo']; ?>
<div id="grupo-contenido" class="container">
    <div id="contenido">

        <div>
            
                <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/pedido"><img src="<?=$_SESSION['logoURL'] != "" ? $_SESSION['logoURL'] : $draizp.'/source/'.$logoSup?>" alt="" style="max-height: 50px;"></a>
            <?php if($Empresa['mcatalogo'] == 0){ ?>
                &nbsp;&nbsp;<a class="desconectar" title="Mi cuenta" href="<?=$draizp?>/es/cuenta" style="background: rgba(255, 255, 255, 0.2) url('/source/perfil.png') no-repeat scroll center center / 20px auto; float: right; width: 20px; margin-left: 5px;">&nbsp;</a>&nbsp;&nbsp;
                <?php if ($_SESSION['usr'] != null) { ?>
                <a class="desconectar" title="Desconectarse" href="<?=$draizp?>/acc/salir" style="background: rgba(255, 255, 255, 0.2) url('/source/standby.png') no-repeat scroll center center / 20px auto; float: right; width: 20px;">&nbsp;</a> <span style="float: right">Bienvenid@ <?=$_SESSION['usr']['nombre']?>&nbsp;</span> 
                <?php } 
            }?>
	</div>
    </div>
</div>
<?php } ?>

