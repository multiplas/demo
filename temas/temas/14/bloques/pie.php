<?php
    for($i=0; $i<=count($labelidioma); $i++){
        if($labelidioma[$i][0] == 'condiciones'){
            $auxcon = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'cuenta'){
            $auxcue = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'cesta'){
            $auxces = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'pedidos'){
            $auxped = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'envios_devoluciones'){
            $auxenv = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'politica_privacidad'){
            $auxpol = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'contacto'){
            $auxcont = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'llamanos'){
            $auxll = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'portes'){
            $auxpor = $nombreidioma[$i][0];
        }
    }
?>

<style>
    .fb-page, 
    .fb-page span, 
    .fb-page span iframe[style] { 
        width: 100% !important; 
    }
    
    ._2p3a{
        margin-left: auto !important;
        margin-right: auto !important;
    }
    
    .pie00-lnk_fot{
        background-color: <?=$colores['pie']?> !important;
        color: <?=$colores['pie_letras']?> !important;
        display: flex;
    }
    
    a:hover{ 
        text-decoration:none;
        color: <?=$colores['pie_letras']?> !important;
    }
    
    .pie00-pan_fot{
        background-color: <?=$colores['pie']?> !important;
        opacity: 0.7;
        color: <?=$colores['pie_letras']?> !important;
    }
</style>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300i,700" rel="stylesheet">
<link rel="stylesheet" href="<?=$draizp?>/temas/14/bloques/css/css/font-awesome.min.css">

<!--styles -->
<link rel="stylesheet" type="text/css" href="<?=$draizp?>/temas/14/bloques/css/pie00.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?=$draizp?>/temas/14/bloques/css/grid12.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?=$draizp?>/temas/14/bloques/css/grid_default.css" media="all" />

<!--scripts -->



<link href='//fonts.googleapis.com/css?family=Lato:400&amp;subset=latin-ext' rel='stylesheet' type='text/css' />


<div id="pie00-root-wrapper">

<footer><!-- footer -->

<div class="pie00-main-container col1-layout">
    
        <div class="pie00-main container" style="max-width: 100% !important;width: 100%;">
          
	<!--BLOQUE 1 -->
	<div class="pie00-gar_fot">
		<div class="container">
			<section id="pie00-one_garanties">

	<div class="pie00-garant_home_ecm">
		<img src="<?=$draizp?>/temas/14/bloques/img/icon_ship.svg">
		<h1>Envío urgente<br />24/48 horas</h1>
		<!-- <p>Los envíos a toda españa totalmente gratis. Consultanos</p> -->
	</div>

	<div class="pie00-garant_home_ecm">
		<img src="<?=$draizp?>/temas/14/bloques/img/icon_five2.svg">
		<h1>Hasta 5 años<br />de garantía</h1>
		<!-- <p>Los envíos a toda españa totalmente gratis. Consultanos</p> -->
	</div>

	<div class="pie00-garant_home_ecm">
		<img src="<?=$draizp?>/temas/14/bloques/img/icon_devo.svg">
		<h1>Garantía devolución<br />en 14 días</h1>
		<!-- <p>Los envíos a toda españa totalmente gratis. Consultanos</p> -->
	</div>

	<div class="pie00-garant_home_ecm">
		<img src="<?=$draizp?>/temas/14/bloques/img/icon_delivery.svg">
		<h1>Pago<br /> contrareembolso</h1>
		<!-- <p>Los envíos a toda españa totalmente gratis. Consultanos</p> -->
	</div>

	<div class="pie00-garant_home_ecm">
		<img src="<?=$draizp?>/temas/14/bloques/img/icon_ubi.svg">
		<h1>Seguimiento<br /> de pedido</h1>
		<!-- <p>Los envíos a toda españa totalmente gratis. Consultanos</p> -->
	</div>

	<div class="pie00-garant_home_ecm">
		<img src="<?=$draizp?>/temas/14/bloques/img/icon_seven.svg">
		<h1>Recibe tu pedido<br /> y paga en 7 días</h1>
		<!-- <p>Los envíos a toda españa totalmente gratis. Consultanos</p> -->
	</div>

	<div class="pie00-garant_home_ecm">
		<img src="<?=$draizp?>/temas/14/bloques/img/icon_reem.svg">
		<h1>Recogida<br />en tienda</h1>
		<!-- <p>Los envíos a toda españa totalmente gratis. Consultanos</p> -->
	</div>

	<div class="pie00-garant_home_ecm">
		<img src="<?=$draizp?>/temas/14/bloques/img/icon_contc.svg">
		<h1>Atención al cliente<br />teléfono, email o chat</h1>
		<!-- <p>Los envíos a toda españa totalmente gratis. Consultanos</p> -->
	</div>	


</section>		</div>
	</div>
	<!--END GARANTÍAS -->

	<!--BLOQUE 2 -->
	<div class="pie00-pan_fot">
		<div class="container">
			<div class="pie00-brand_panelec">
	<a href="#">
		<?php if($Empresa['logoinf'] != ''){ ?><img src="<?=$draizp?>/source/<?=$Empresa['logoinf']?>" style="max-height: 150px; max-width: 100%;"><?php } ?>
	</a>
            <p style="color: <?=$colores['pie_letras']?> !important;"><?=$Empresa['pieS']?></p>
</div>		</div>
	</div>
	<!--FIN BLOQUE 2 -->

	<!--BLOQUE 3 -->
	
	<div class="pie00-lnk_fot">
		<div class="container">
			<div class="pie00-lnk_foot">
	<div class="grid12-5">
		<div class="pie00-bloqfot_one">
                        <?php if($Empresa['logoinf'] != ''){ ?><img src="<?=$draizp?>/source/<?=$Empresa['logoinf']?>" style="max-height: 150px; max-width: 100%;"><?php } ?>
                        <br><br>
                        <?php if($Empresa['mgfacebook'] != '' && ($Empresa['mgflugar'] == 0 || $Empresa['mgflugar'] == 2)){ ?>
                        <iframe class="fb-page" src="https://www.facebook.com/plugins/page.php?href=<?=$Empresa['mgfacebook']?>&tabs=&width=340&height=230&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="230" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                        <?php } ?>

		</div>
	</div>

	<div class="grid12-2">
		<div class="pie00-bloqfot_one">
                    <?php if($Empresa['desactivarGE'] == 1 || count($paginasP) > 0 || $paginasE['20002'] == 1 || $paginasE['20001'] == 1){ ?>
			<h1 style="color: <?=$colores['pie_letras']?> !important;"><?=$auxcon?></h1>
			<ul>
                                <?php if($paginasE['20002'] == 1){ ?><li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>devoluciones"><?=$auxenv?></a></li><?php } ?>
                                <?php if($paginasE['20001'] == 1){ ?><li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>privacidad"><?=$auxpol?></a></li><?php } ?>
                                <?php if($Empresa['desactivarGE'] == 1){ ?><li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>portes"><?=$auxpor?></a></li> <?php } ?>
				<?php
                                    if(count($paginasP) > 0){
                                        foreach($paginasP AS $pag){
                                ?>
                                            <li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$pag['id']?>"><?=$pag['nombre']?></a></li>
                                <?php
                                        }
                                    }
                                ?>
			</ul> 
                    <?php
                    }
                    ?>

		</div>
	</div>

	<div class="grid12-2">
		<div class="pie00-bloqfot_one">
                    <?php if($Empresa['mcatalogo'] == 0){ ?>
			<h1 style="color: <?=$colores['pie_letras']?> !important;"><?=$auxcue?></h1>
                        <p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cuenta"><?=$auxcue?></a></p>
			<p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta"><?=$auxces?></a></p>
                        <?php if($_SESSION['usr']['id'] != null){ ?>
                            <p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>compras"><?=$auxped?></a></p>
                        <?php } ?>
                    <?php } ?>
		</div>
	</div>

	<div class="grid12-3">
		<div class="pie00-bloqfot_one">
			<h1 class="colorado" style="color: <?=$colores['pie_letras']?> !important;"><?=$auxcont?></h1>
			<ul>
                            <?php if($Empresa['preSoli'] == 1){
                                echo '<li><a href="'.$draizp.'/'.$_SESSION['lenguaje'].'presupuesto_cont">Solicitar Presupuesto</a></li>';
                            }
                            ?>
                            <li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>contacto"><?=$auxcont?></a></li>
                            <?php if($pieTiendas == 1){ ?><li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>tiendas">Tiendas</a></li><?php } ?>
                            <?php
                                if(count($enlacesP) > 0){ 
                                    $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
                                    $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
                                    foreach ($enlacesP AS $entrada){ ?>
                            <li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>enlaces/<?=$entrada['id']?>/<?=strtolower(str_replace(' ', '-', str_replace($no_permitidas, $permitidas , $entrada['nombre'])))?>"><?=$entrada['nombre']?></a></li>
                            <?php } 
                                
                                }   
                            ?>
                            <li><?=$auxll?> (+34) <?=number_format($Empresa['telefono'], 0, '', ' ')?></li>
                            <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(+34) <?=number_format($Empresa['telefono2'], 0, '', ' ')?></li>
                            <?php
                                if($Empresa['wassap'] == 1 && $Empresa['telefono3'] != ''){
                                ?>   
                                    <li style="margin-top: 9px">
                                        <img src="<?=$draizp?>/source/whatsapp.png" style="height: 30px; margin-top: -4px;"> <?=$Empresa['telefono3']?>
                                    </li>
                                <?php
                                }
                           ?>
                            <li><?=$Empresa['email']?></li>
                            <li><?=$Empresa['horario']?></li>
			</ul>
                        <br>
                        <?php include($draiz.'/bloques/logos_sociales.php'); ?>
		</div>
	</div>

	<?php if($Empresa['pie'] != ''){ ?>
            <?=$Empresa['pie']?>
        <?php } ?>

</div>		</div>
	</div>
</footer><!-- fin foopter -->
	<!--FIN BLOQUE LINKS FOOTER -->

          
<script type="text/javascript" src="<?=$draizp?>/temas/14/bloques/js/pie00.js"></script>
<link href="<?=$draizp?>/componentes/fotorama/fotorama.css" rel="stylesheet">
<script src="<?=$draizp?>/componentes/fotorama/fotorama.js"></script>


</div> <!-- END pie00-root-wrapper -->