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

<?php 
/* Obtenemos la info para los Bloques de BD */
$bloques = getBloqsInfo();
?>

<?php if ($bloques['valor'] == "1" && !empty($bloques['bloque1_texto']) ): //Si está activado ?>  
                <?php if (!empty($bloques['p_bloque1_color']) ): ?>
                <style>
                    .bloque-1{
                        background-color: <?php echo $bloques['p_bloque1_color']; ?> !important;
                        color: <?php echo $bloques['p_bloque1_color_texto']; ?> !important;
                    }
                </style>
                <?php endif; ?>
            <div class="bloque-1">
                <?php echo $bloques['bloque1_texto'];  ?>
            </div>
        <?php endif; ?>
    <!--BLOQUE 2 -->
    <?php if ($bloques['valor'] == "1" && !empty($bloques['bloque2_texto'])): //Si está activado ?>  
        <?php if (!empty($bloques['p_bloque2_color']) ): ?>
            <style>
                .bloque-2{
                    background-color: <?php echo $bloques['p_bloque2_color']; ?> !important;
                    color: <?php echo $bloques['p_bloque2_color_texto']; ?> !important;
                }
            </style>
        <?php endif; ?>
        <div class="bloque-2">
            <?php echo $bloques['bloque2_texto'];  ?>
        </div>
    <?php endif; ?>

<div id="pie">
    <div id="piein" style="text-align: center">
            <div id="lalala">
                <a href="<?=$Empresa['url']?>/<?=$_SESSION['lenguaje']?>/"><?=$Empresa['nombre']?></a> | <a target="_blank" href="http://www.camaltec.es/tienda-virtual-profesional/">TIENDA VIRTUAL PROFESIONAL</a>
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
    <?php 
    $resultado = footerCopyrightStatus();
    if( $resultado['valor'] == "1" ): //Activado
    ?>
        <div class="copyright-bar">
             <?php echo $resultado['texto'] ?><style>         .copyright-bar{             background-color: <?php echo $resultado['color_barra'] ?>;             color: <?php echo $resultado['color_texto'] ?>;         }         </style>
        </div>
    <?php
    endif;
    ?>
</div>
<link href="<?=$draizp?>/componentes/fotorama/fotorama.css" rel="stylesheet">
<script src="<?=$draizp?>/componentes/fotorama/fotorama.js"></script>