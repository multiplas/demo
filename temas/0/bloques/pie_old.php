<?php if($pie == 0){ ?>
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
<?php if($Empresa['logoinf'] == ''){ ?>
<style>
    .logopie{
        background: transparent !important;
        background-size: auto auto;
        background-size: contain;
        display: inline-block;
        height: 160px;
        margin: 0px;
        max-width: 90%;
        padding: 0px;
        vertical-align: top;
        width: 358px;
    }
</style>
<?php } ?>
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
		<div id="logopie"></div>
		<div id="lalala">
			<div id="menupie">
                            <?php if($Empresa['mcatalogo'] == 0){ ?>
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
                                }
				?>
			</div>
			<div class="enlacespie">
                            <?php if($Empresa['desactivarGE'] == 1 || count($paginasP) > 0 || $paginasE['20002'] == 1 || $paginasE['20001'] == 1){ ?>
				<p class="colorado"><?=$auxcon?></p>
				<?php if($paginasE['20002'] == 1){ ?><p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/devoluciones"><?=$auxenv?></a></p><?php } ?>
				<?php if($paginasE['20001'] == 1){ ?><p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/privacidad"><?=$auxpol?></a></p><?php } ?>
                <?php if($Empresa['desactivarGE'] == 1){ ?><p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/portes"><?=$auxpor?></a></p><?php } ?>
                <?php
                    if(count($paginasP) > 0){
                        foreach($paginasP AS $pag){
                ?>
                            <p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/pagina/<?=$pag['id']?>"><?=$pag['nombre']?></a></p>
                <?php
                        }
                    }
                            }
                ?>
			</div>
			<div class="enlacespie">
				<p class="colorado"><?=$auxcont?></p>
                <p><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/contacto"><?=$auxcont?></a></p>
				<p><?=$auxll?> (+34) <?=number_format($Empresa['telefono'], 0, '', ' ')?></p>
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
        font-family: Georgia;
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
    <?php if($Empresa['mcatalogo'] == 0){?>
	<div id="linea-roja">
        <p><strong>Métodos de pago activos</strong></p>
        <?php
            if (strlen($Empresa['paypal']) > 0)
                echo '<a href="#" title="Paypal" class="tooltip"><img class="color-img" style="width:35px;height:35px;" src="'.$draizp.'/imagenes/paypal.png" alt="paypal" /></a>';
            if ($Empresa['tpv'] > 1)
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
    <?php } ?>
</div>
<?php } ?>
<link href="<?=$draizp?>/componentes/fotorama/fotorama.css" rel="stylesheet">
<script src="<?=$draizp?>/componentes/fotorama/fotorama.js"></script>