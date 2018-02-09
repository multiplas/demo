<?php
    for ($i = 0; $i <= count($labelidioma); $i++) {
        if ($labelidioma[$i][0] == 'condiciones') {
            $auxcon = $nombreidioma[$i][0];
        }
        if ($labelidioma[$i][0] == 'cuenta') {
           $auxcue = $nombreidioma[$i][0];
        }
        if ($labelidioma[$i][0] == 'cesta') {
            $auxces = $nombreidioma[$i][0];
        }
        if ($labelidioma[$i][0] == 'pedidos') {
            $auxped = $nombreidioma[$i][0];
        }
        if ($labelidioma[$i][0] == 'envios_devoluciones') {
            $auxenv = $nombreidioma[$i][0];
        }
        if ($labelidioma[$i][0] == 'politica_privacidad') {
            $auxpol = $nombreidioma[$i][0];
        }
        if ($labelidioma[$i][0] == 'contacto') {
            $auxcont = $nombreidioma[$i][0];
        }
        if ($labelidioma[$i][0] == 'llamanos') {
            $auxll = $nombreidioma[$i][0];
        }
        if ($labelidioma[$i][0] == 'portes') {
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
        background-color: <?= $colores['pie'] ?> !important;
        color: <?= $colores['pie_letras'] ?> !important;
        display: flex;
    }

    a:hover{
        text-decoration:none;
        color: <?= $colores['pie_letras'] ?> !important;
    }

    .pie00-pan_fot{
        background-color: <?= $colores['pie'] ?> !important;
        opacity: 0.7;
        color: <?= $colores['pie_letras'] ?> !important;
    }
</style>

<!--styles -->
<link rel="stylesheet" type="text/css" href="<?= $draizp ?>/temas/14/bloques/css/pie00.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?= $draizp ?>/temas/14/bloques/css/grid12.css" media="all" />
<link rel="stylesheet" type="text/css" href="<?= $draizp ?>/temas/14/bloques/css/grid_default.css" media="all" />
<div id="pie00-root-wrapper">
    <footer>
        <div class="pie00-main-container col1-layout">
            <div class="pie00-main container" style="max-width: 100% !important;width: 100%;">
                <?php
                    if (!require_once($draiz . '/sistema/mod_conexion.php')) {
                        echo 'Sin conexion';
                    } else {
                        $sqlFooter   = "SELECT Id, nombre FROM bd_paginas WHERE visible=1";
                        $queryFooter = mysqli_query($dbi, $sqlFooter);
                        $footerUrl   = NULL;
                        if (mysqli_num_rows($queryFooter) > 0) {
                            ?>
                            <div class="pie00-lnk_fot">
                                <div class="container">
                                    <div style="margin:auto;text-align:center">
                                        <ul>
                                            <li style="display:inline"><a href="<?= $draizp ?>/">INICIO</a></li>
                                            <?php
                                            while ($valueFooter = mysqli_fetch_assoc($queryFooter)) {
                                                ?>
                                                <li style="display:inline"><a href="<?= $draizp ?>/pagina/<?= $valueFooter['Id']; ?>"><?= $valueFooter['nombre']; ?></a>

                                                    <?php
                                                }
                                                ?>
                                            <!--<li style="display:inline"><a href="<?= $draizp ?>/v2">CUENTA</a>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                ?>
                <div class="pie00-lnk_fot">
                    <div class="container">
                        <div class="pie00-lnk_foot">
                            <div class="grid12-5">
                                <div class="pie00-bloqfot_one">
                                    <?php include($draiz . '/bloques/logos_sociales.php'); ?>
                                </div>
                            </div>
                            <div class="grid12-7">
                                <div class="pie00-bloqfot_one">© 2017 – Camaltec</div>
                            </div>
                            <div class="grid12-12">
                                <?php if ($Empresa['pie'] != '') { ?>
                                        <?= $Empresa['pie'] ?>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
