<style>
    .color-img{
        -webkit-filter: grayscale(0); /* Color */
        -webkit-filter: grayscale(0.5); /* 50% color */
        -webkit-filter: grayscale(1); /* Blanco y negro */
        -moz-filter: grayscale(0); /* Color */
        -moz-filter: grayscale(0.5); /* 50% color */
        -moz-filter: grayscale(1); /* Blanco y negro */
        filter: grayscale(0); /* Color */
        filter: grayscale(0.5); /* 50% color */
        filter: grayscale(1); /* Blanco y negro */
    }
    
    .color-img:hover{
        -webkit-filter: grayscale(1); /* Color */
        -webkit-filter: grayscale(1); /* 50% color */
        -webkit-filter: grayscale(0); /* Blanco y negro */
        -moz-filter: grayscale(1); /* Color */
        -moz-filter: grayscale(1); /* 50% color */
        -moz-filter: grayscale(0); /* Blanco y negro */
        filter: grayscale(1); /* Color */
        filter: grayscale(1); /* 50% color */
        filter: grayscale(0); /* Blanco y negro */
    }
</style>

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

<div id="pie">
	<div id="piein">
            <style>
                #pie #piein #logopie{
                    background: none !important;
                    text-align: center;
                    height: auto !important;
                }
            </style>
            <div id="logopie">
                <img src="<?=$draizp?>/source/<?=$Empresa['logoinf']?>" style="max-height: 150px; max-width: 100%;">
                <br><br>
                <?php if($Empresa['mgfacebook'] != '' && ($Empresa['mgflugar'] == 0 || $Empresa['mgflugar'] == 2)){ ?>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=<?=$Empresa['mgfacebook']?>&tabs=&width=340&height=230&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="230" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                <?php } ?>
            </div>
                
		<div id="lalala">
			<div id="menupie">
				<p class="colorado"><?=$auxcue?></p>
				<p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/cuenta"><?=$auxcue?></a></p>
				<p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/cesta"><?=$auxces?></a></p>
                <?php if($_SESSION['usr']['id'] != null){ ?>
				    <p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/compras"><?=$auxped?></a></p>
                <?php } ?>
				<?php
					/*foreach ($categorias AS $padre)
					{
				?>
						<p><a href="<?=$draizp?>/productos/<?=$padre['id']?>"><?=$padre['nombre']?></a></p>
				<?php
					}*/
				?>
			</div>
			<div class="enlacespie">
				<p class="colorado"><?=$auxcon?></p>
				<p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/devoluciones"><?=$auxenv?></a></p>
				<p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/privacidad"><?=$auxpol?></a></p>
                <p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/portes"><?=$auxpor?></a></p>
                <?php
                    if(count($paginasP) > 0){
                        foreach($paginasP AS $pag){
                ?>
                            <p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/pagina/<?=$pag['id']?>"><?=$pag['nombre']?></a></p>
                <?php
                        }
                    }
                ?>
                            
                
			</div>
			<div class="enlacespie">
				<p class="colorado"><?=$auxcont?></p>
                                <p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/contacto"><?=$auxcont?></a></p>
                                <?php if($pieTiendas == 1){ ?><p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/tiendas">Tiendas</a></p><?php } ?>
                                 <?php
                                    if(count($enlacesP) > 0){ 
                                        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
                                        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
                                        foreach ($enlacesP AS $entrada){ ?>
                                        <p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/enlaces/<?=$entrada['id']?>/<?=strtolower(str_replace(' ', '-', str_replace($no_permitidas, $permitidas , $entrada['nombre'])))?>"><?=$entrada['nombre']?></a></p>
                                  <?php } 
                                
                                    }   
                                ?>
				<p><?=$auxll?> (+34) <?=number_format($Empresa['telefono'], 0, '', ' ')?></p>
                                <?php
                                if($Empresa['wassap'] == 1 && $Empresa['telefono3'] != ''){
                                ?>   
                                    <p>
                                        <?=$Empresa['telefono3']?> <img src="<?=$draizp?>/source/whatsapp.png" style="height: 40px;top: 14px; margin-top: -22px;">
                                    </p>
                                <?php
                                }
                                ?>
				<p><?=$Empresa['email']?></p>
				<p><?=$Empresa['horario']?></p>
                <?php include($draiz.'/bloques/logos_sociales.php'); ?>
			</div>
            
		</div>
	</div>
    
    <style>
      .tooltip {
        display: inline;
        position: relative;
      }
      .tooltip:hover:after {
        bottom: 46px;
        content: attr(title); /* este es el texto que será mostrado */
        left: 1%;
        position: absolute;
        z-index: 9999998;
        /* el formato gráfico */
        background: #212121; /* el color de fondo */
        border-radius: 5px;
        color: #f2f2f2; /* el color del texto */
        font-family: '<?=$fuente2?>', Georgia;
        font-size: 12px;
        padding: 5px 15px;
        text-align: center;
        text-shadow: 1px 1px 1px #000;
        width: 150px;
      }
      .tooltip:hover:before {
        bottom: 40px;
        content: "";
        left: 30%;
        position: absolute;
        z-index: 9999999;
        /* el triángulo inferior */
        border: solid;
        border-color: #212121 transparent;
        border-width: 6px 6px 0 6px;
      }
    </style>
	<div id="linea-roja">
        <p><strong>Métodos de pago activos</strong></p>
        <?php
            if (strlen($Empresa['paypal']) > 0)
                echo '<a href="#" title="Paypal" class="tooltip"><img class="color-img" style="width:35px;height:35px;" src="'.$draizp.'/imagenes/paypal.png" alt="paypal" /></a>';
            if ($Empresa['tpv'] > 0)
                echo '<a href="#" title="TPV" class="tooltip"><img class="color-img" style="width:35px;height:35px;" src="'.$draizp.'/imagenes/tpv.png" alt="tpv" /></a>';
            if (strlen($Empresa['cuenta']) > 0)
                echo '<a href="#" title="Transferencia" class="tooltip"><img class="color-img" style="width:35px;height:35px;" src="'.$draizp.'/imagenes/transferencia.png" alt="transferencia" /></a>';
            if ($Empresa['iban'] > 0)
                echo '<a href="#" title="Domiciliación" class="tooltip"><img class="color-img" style="width:35px;height:35px;" src="'.$draizp.'/imagenes/domiciliacion.png" alt="domiciliación" /></a>';
            if ($Empresa['contrareembolso'] > 0)
                echo '<a href="#" title="Contrareembolso" class="tooltip"><img class="color-img" style="width:35px;height:35px;" src="'.$draizp.'/imagenes/contrareembolso.png" alt="contrareembolso" /></a>';
            if ($Empresa['entienda'] > 0)
                echo '<a href="#" title="En tienda" class="tooltip"><img class="color-img" style="width:35px;height:35px;" src="'.$draizp.'/imagenes/tienda.png" alt="tienda" /></a>';
        ?>
	</div>
    
    <?php if($Empresa['pie'] != ''){ ?>
    <div id="linea-roja">
        <?=$Empresa['pie']?>
    </div>
    <?php } ?>
</div>
<link href="<?=$draizp?>/componentes/fotorama/fotorama.css" rel="stylesheet">
<script src="<?=$draizp?>/componentes/fotorama/fotorama.js"></script>