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
    }
    #cabecera{
        border-top: 1px solid #ccc;
        min-height: 150px;
    }
    #top>div {
        width: 20%;
        display: inline-block;
    }
    .icono-header{
        width: 20px;
        border: 1px solid #ccc;
        padding: 5px;
    }

    .dropdown{
        position: absolute;
        top: 0;
        right: 0;
        z-index: 70000;
    }

    .dropdown-toggle{
        background: transparent !important;
        color: #333 !important;
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
        padding-top: 10px;
        height: 45px;
        font-size: 13px;
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

    #menu-right{
        position: absolute;
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

    #grupo-submenu #submenu{
        padding: 0px !important;
    }

    #grupo-submenu{
        position: relative;
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
        left: 0;
        z-index: 70000;
        width: 100%;
        max-width: 100% !important;
        min-height: 100px !important;
        overflow: visible !important;
        background-image: url(<?=$draizp?>/source/<?=$logoSup?>);
        background-size: cover;
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
        padding-right: 15px;
        padding-left: 15px;
        border: 1px solid #aaa;
        margin: 0px 0px 0px 10px;
        background: #999;
        cursor: pointer;
    }

    .search-button:hover, .bag-button:hover {
        background: #999 !important;
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

    #nav{
        background-image: url(<?=$draizp?>/source/<?=$logoSup?>);
        background-size: cover;
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
    $(document).mouseup(function(e) 
    {
        var container = $(".search-button");
        var container2 = $("#buscador");
        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) 
        {
            if (!container2.is(e.target) && container2.has(e.target).length === 0) 
                $('.formulario-buscador').css('height','0px');
        }
        else{
            $('.formulario-buscador').css('height','62px');
        }
    });
});
</script>

<div id="nav" class="container-fluid">
    <div class="container nav-top">
        <div class="row">
            <div class="col-xs-12 col-sm-3 align-middle">
                    <span class="icono-header"><i class="far fa-envelope"></i></span>
                    <span><strong>Email:</strong></span>
                    <span><a href="mailto:<?=$Empresa['email']?>"><?=$Empresa['email']?></a></span>		
            </div>
            <div class="col-sm-3 align-middle">
                    <span class="icono-header"><i class="fas fa-phone"></i></span>
                    <span><strong>Telefono:</strong></span>
                    <span><a href="tel:<?=$Empresa['telefono']?>"><?=$Empresa['telefono']?></a></span>		
            </div>
            <div class="col-sm-4 align-middle">
                    <span class="icono-header"><i class="far fa-clock"></i></span>
                    <span><strong>Horario:</strong></span>
                    <span><?=$Empresa['horario']?></span>	
            </div>
            <div class="col-sm-2">
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
            </div>

        </div>
    </div>

    <?php if($fCabecera != ''){ ?>
        <div style="background-image:url(<?=$draizp?>/source/<?=$fCabecera?>);background-repeat: no-repeat;">
    <?php } ?>
    <div id="buscador" class="container">
        <?php
            if($inicio != 2){
        ?>
            <form action="<?=$draizp?>/<?=$_POST['buscar']?>" class="formulario-buscador" method="post">
                <input style="background: <?=$principalColors['fondosubmenuhoverresp']?>;color:<?=$principalColors['colorgeneralinicio']?>;height: 100%;padding-left: 25px;width: 100%;" name="buscar" type="text" id="busc" placeholder="Buscar<?=$aux?>..." value="<?=(isset($_POST['buscar'])) ? $_POST['buscar'] : '';?>" /><span id="BtBuscar" style="background: #4b4b4b url(../source/lupa.png);background-position: center;background-repeat: no-repeat;" name="BtSubmit"></span>
            </form>
        <?php
            }
        ?>
    </div>
    <div id="cabecera">     
        <div class="container">
        
            <div id="menu-right">
                <?php include_once('menu.php'); ?>
            </div>
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

