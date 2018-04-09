<?php if($pie == 16){ ?>
<style>
    .color-img {
        -webkit-filter: grayscale(0);
        /* Color */
        -webkit-filter: grayscale(0.5);
        /* 50% color */
        -webkit-filter: grayscale(1);
        /* Blanco y negro */
        -moz-filter: grayscale(0);
        /* Color */
        -moz-filter: grayscale(0.5);
        /* 50% color */
        -moz-filter: grayscale(1);
        /* Blanco y negro */
        filter: grayscale(0);
        /* Color */
        filter: grayscale(0.5);
        /* 50% color */
        filter: grayscale(1);
        /* Blanco y negro */
    }

    .color-img:hover {
        -webkit-filter: grayscale(1);
        /* Color */
        -webkit-filter: grayscale(1);
        /* 50% color */
        -webkit-filter: grayscale(0);
        /* Blanco y negro */
        -moz-filter: grayscale(1);
        /* Color */
        -moz-filter: grayscale(1);
        /* 50% color */
        -moz-filter: grayscale(0);
        /* Blanco y negro */
        filter: grayscale(1);
        /* Color */
        filter: grayscale(1);
        /* 50% color */
        filter: grayscale(0);
        /* Blanco y negro */
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
        .bloque-1 {
            background-color: <?php echo $bloques['p_bloque1_color'];
            ?> !important;
            color: <?php echo $bloques['p_bloque1_color_texto'];
            ?> !important;
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
        .bloque-2 {
            background-color: <?php echo $bloques['p_bloque2_color'];
            ?> !important;
            color: <?php echo $bloques['p_bloque2_color_texto'];
            ?> !important;
        }
    </style>
    <?php endif; ?>
    <div class="bloque-2">
        <?php echo $bloques['bloque2_texto'];  ?>
    </div>
    <?php endif; ?>

    <div id="pie" class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <!-- mi cuenta -->
                    <h5>
                        <?=$auxcue?>
                    </h5>
                    <ul>
                        <li>
                            <a href="<?=$draizp?>/cuenta">
                                <?=$auxcue?>
                            </a>
                        </li>
                        <li>
                            <a href="<?=$draizp?>/cesta">
                                <?=$auxces?>
                            </a>
                        </li>
                        <?php if($_SESSION['usr']['id'] != null){ ?>
                        <li>
                            <a href="<?=$draizp?>/compras">
                                <?=$auxped?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- condiciones -->
                <div class="col-sm-3">
                    <h5>
                        <?=$auxcon?>
                    </h5>
                    <li>
                        <a href="<?=$draizp?>/devoluciones">
                            <?=$auxenv?>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$draizp?>/privacidad">
                            <?=$auxpol?>
                        </a>
                    </li>
                    <li>
                        <a href="<?=$draizp?>/portes">
                            <?=$auxpor?>
                        </a>
                    </li>
                    <?php
                if(count($paginasP) > 0){
                    foreach($paginasP AS $pag){
                ?>
                        <li>
                            <a href="<?=$draizp?>/pagina/<?=$pag['id']?>">
                                <?=$pag['nombre']?>
                            </a>
                        </li>
                        <?php
                        }
                    }
                ?>
                </div>
                <div class="col-sm-3">
                    <h5>
                        <?=$auxcont?>
                    </h5>
                    <li>
                        <a href="<?=$draizp?>/contacto">
                            <?=$auxcont?>
                        </a>
                    </li>
                    <li>
                        <a href="tel:34<?=number_format($Empresa['telefono'], 0, '', ' ')?>"><?=$auxll?> (+34)<?=number_format($Empresa['telefono'], 0, '', ' ')?></a>
                    </li>
                    <li>
                        <a href="mailto:<?=$Empresa['email']?>"><?=$Empresa['email']?></a>
                    </li>
                    <li>
                        <a href="<?=$draizp?>/contacto"><?=$Empresa['horario']?></a>
                    </li>
                </div>
                <div class="col-sm-3 contactanos">
                    <img src="<?=$draizp?>/source/<?=$logo['logoinf']?>" alt="">
                    <ul>
                        <li><i class="fa fa-map-marker"></i><a href="<?=$$draizp?>/contacto"><?=$Empresa['direccion']?></a></li>
                        <li><i class="fa fa-envelope"></i><a href="mailto:<?=$Empresa['email']?>"><?=$Empresa['email']?></a></li>
                        <li><i class="fa fa-phone"></i><a href="tel:34<?=number_format($Empresa['telefono'], 0, '', ' ')?>"><?=number_format($Empresa['telefono'], 0, '', ' ')?></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <style>
            #pie h5 {
                text-align: center;
                border-bottom: 0px solid #393939;
                color: #4c4c4c;
                font-size: 24px;
                margin-bottom: 0px;
                padding-bottom: 10px;
                text-transform: none;
                font-weight: 700;
                line-height: 1.35;
            }

            #pie {
                background-color: #bababa;
                padding: 10px 0 20px;
            }

            #pie ul {
                padding: 0;
                margin: 0;
                list-style: none;
            }

            #pie li {
                margin: 0;
                padding: 8px 0pt 8px 16px;
                border-bottom: 1px solid #919191;
                list-style: none;
                width: 100%;
                display: list-item;
                text-align: -webkit-match-parent;
                font-size: 13px;
            }

            #pie a {
                color: #ffffff;
                line-height: 30px;
                display: inline-block;
                -webkit-transition: all 300ms ease-in-out;
                -o-transition: all 300ms ease-in-out;
                transition: all 300ms ease-in-out;
                text-decoration: none;
            }

            #pie a:hover {
                padding-left: 10px;
                color: #4c4c4c;
            }

            #pie a:before {
                background: transparent;
                content: "\f068\f068";
                display: inline-block;
                height: 9px;
                margin-right: 8px;
                position: relative;
                top: 0;
                width: 11px;
                overflow: hidden;
                font: normal normal normal 14px/1 FontAwesome;
                font-size: 10px;
                letter-spacing: -1px;

            }

            #pie .contactanos li{
                clear: both;
                display: inline-block;
                margin-bottom: 10px;
                padding-bottom: 10px;
                padding-top: 0;
            }

            #pie i{
                border: 2px solid #fff;
                border-radius: 3px;
                color: #fff;
                float: left;
                font-size: 16px;
                height: 34px;
                line-height: 30px;
                margin-right: 15px;
                text-align: center;
                width: 32px;
            }

            #pie img{
                padding-bottom: 16px;
                max-width: 100%;
            }

            .tooltip {
                display: inline;
                position: relative;
            }

            .tooltip:hover:after {
                bottom: 46px;
                content: attr(title);
                /* este es el texto que será mostrado */
                left: 1%;
                position: absolute;
                z-index: 9999998;
                /* el formato gráfico */
                background: #212121;
                /* el color de fondo */
                border-radius: 5px;
                color: #f2f2f2;
                /* el color del texto */
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

            #linea-roja {
                padding: 15px 0px;
            }

            .copyright {
                margin: 5px 0 0;
                font-size: 13px;
                position: absolute;
                top: 0px;
                left: 15px;
                bottom: inherit;
            }

            @media (max-width:500px)
            { 
                .copyright{
                    position: relative;
                }
            }
        </style>
    </div>
    <div id="linea-roja" class="container-fluid">
        <div class="container">
            <div class="row" style="width:100%;">
                <div class="col-xs-12 col-sm-6">
                    <span class="copyright">
                        © 2017 FarmaVitalista. Diseño web por
                        <a href="https://www.camaltec.es/">Grupo Camaltec</a>
                    </span>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <img src="<?=$draizp?>/imagenes/payment.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <?php 
$resultado = footerCopyrightStatus();
if( $resultado['valor'] == "1" ): //Activado
?>
    <div class="copyright-bar" class="container-fluid">
        <?php echo $resultado['texto'] ?>
        <style>
            .copyright-bar {
                background-color: <?php echo $resultado['color_barra'] ?>;
                color: <?php echo $resultado['color_texto'] ?>;
            }
        </style>
    </div>
    <?php
endif;
?>
    <?php } ?>
    <link href="<?=$draizp?>/componentes/fotorama/fotorama.css" rel="stylesheet">
    <script src="<?=$draizp?>/componentes/fotorama/fotorama.js"></script>