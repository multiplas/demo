<link rel="stylesheet" type="text/css" href="<?= $draizp ?>/temas/14/bloques/css/grid12_sjh38ed4.css" media="all">
<style type="text/css" media="all">
    #grupo-submenu #submenu a
    {
        color: <?= $colores['menu_letra'] ?>;
    }
    #grupo-submenu #submenu ul li:hover > a
    {
        color: <?= $colores['menu_letra_hover'] ?>;
    }
    .menu_letras
    {
        color: <?= $colores['menu_letra'] ?>;
    }
    .menu_letras:hover
    {
        color: <?= $colores['menu_letra_hover'] ?>;
    }
    body
    {
        font-family: '<?= $fuente2 ?>', Arial,Helvetica,sans-serif;
    }
    .tfiltro
    {
        font-family: '<?= $fuente1 ?>', sans-serif;
    }
    h1
    {
        font-family: '<?= $fuente1 ?>', sans-serif;
    }
    .header-top-container
    {
        background-color: <?= $colores2['colorposbarmainSup'] ?> !important;
    }
    .header-primary-container
    {
        background-color: <?= $colores2['colorposbarmainSup'] ?> !important;
    }
    .icon_lef_head
    {
        background-color: <?= $colores2['colorbotonesmain'] ?> !important;
        color: <?= $colores2['colortextobotonform'] ?> !important;
    }
    .links > li > a:hover
    {
        background-color: <?= $colores['boton_fondo_hover'] ?> !important;
        color: <?= $colores['boton_letras_hover'] ?> !important;
    }

    @media (min-width:1030px)
    {
        .suggest
        {
            height: 38px;
            line-height: 38px;
            border: 1px solid #ccc;
            outline: 0 none;
            padding: 5px 10px;
            position: relative;
            float: left;
            z-index: 1;
            width: 225px;
        }
        .div_datos
        {
            width: 60%;
        }
    }
    .fa-lg
    {
        vertical-align: 0% !important;
    }
    #top
    {
        background-color: <?= $colores['barra_sup'] ?> !important;
    }
    #grupo-submenu #submenu ul li:hover
    {
        background-color: <?= $colores['barra_sup'] ?>;
        transition: all 1s ease 0s;
    }
    #grupo-submenu #submenu ul li
    {
        font-size: 16px;
    }
    #grupo-submenu #submenu-r
    {
        background: <?= $colores['menu'] ?> none repeat scroll 0 0 !important;
        color: <?= $colores['menu_letra'] ?>;
    }
    #grupo-submenu #submenu-r #submenu-op
    {
        color: <?= $colores['menu_letra'] ?>;
        font-weight: normal;
        margin-top: 17px;
    }
    #grupo-submenu #submenu-r a
    {
        color: <?= $colores['menu_letra'] ?> !important;
    }
    #grupo-submenu #submenu ul li ul li
    {
        transition: all 0.5s ease-in 0s;
    }
    #posicion-bar div a
    {
        color: #000;
        text-decoration: none;
    }
    #grupo-submenu
    {
        background: <?= $colores['menu'] ?> none repeat scroll 0 0 !important;
    }
    #grupo-submenu #submenu ul li ul li
    {
        line-height: 100% !important;
    }
    #grupo-submenu #submenu ul li ul li:hover
    {
        line-height: 100% !important;
    }
    #grupo-submenu #submenu ul li ul li a
    {
        margin-top: -9px;
        top: 50%;
    }
    @media (min-width:940px)
    {
        .imagenMenu
        {
            visibility: hidden; height:35px; margin-top: 0px;
        }
        .imagenMenu2
        {
            visibility: visible; height:35px; margin-top: 0px;
        }
        .divLogo
        {
            display: none !important;
        }
        .divLogo2
        {
            display: inline !important;
        }
    }
    @media (max-width:940px)
    {
        .divLogo
        {
            display: none !important;
        }
        .divLogo2
        {
            display: none !important;
        }
        #grupo-submenu
        {
            top: -22px;
            width: 100%;
        }
        .item
        {
            display: none !important;
        }
    }
    .pie00-bloqfot_one p, ul, li, a
    {
        font-size: 1rem !important;
    }
    #grupo-submenu #submenu
    {
        max-width: 100% !important;
    }
    .scroll-to-fixed-fixed
    {
        width: 100% !important;
        left: 0px !important;
    }
    div#submenu ul.ulRight
    {
        float:right;
        display: inline-block;
        font-size: 13px;
        text-transform: uppercase;
        height: 45px;
        line-height: 45px;
        position: relative;
        width: auto;   
    }
    div.buscarForm
    {
        float:right;
        padding-top:2.5%;
    }
    i.fa.fa-shopping-cart.fa-lg, div#submenu ul.ulRight li a span, i.fa.fa-search.fa-lg
    {
        color: #808080!important;
    }
    i.fa.fa-shopping-cart.fa-lg
    {
        line-height: inherit;
        margin-top:-20%;
    }
        
</style>

<script language="javascript" type="text/javascript">
        $(document).on("scroll", function ()
        {
            var desplazamientoActual = $(document).scrollTop();
            if (desplazamientoActual >= 200) {

            } else {

            }
        });
</script>
<div id="root-wrapper" class="cms-index-index responsive cms-home" style="border-color: rgba(234,234,234,0.5);border-bottom-width: 1px;border-bottom-style: solid;">
    <div class="wrapper">
        <div class="page">
            <div id="top2" class="header-container header-regular">
                <div class="header-container2" style="width: 100%">
                    <div class="header-container3" style="width: 100%">
                        <div class="header-primary-container">
                            <div class="inner-container">
                                <div class="hp-blocks-holder skip-links--5">
                                    <div class="grid-container">
                                        <div id="grupo-submenu"  style="width: 100%; min-height: 75px;">
                                            <div class="hp-block left-column grid12-2">
                                                <div class="item"><div class="logo-wrapper logo-wrapper--regular">
                                                        <h1 class="logo logo--regular"><a href="#" title="Logo"><?php if ($logoSup != '') { ?><a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>"><img src="<?= $draizp ?>/source/<?= $logoSup ?>" alt=""/></a><?php } ?></a></h1>
                                                    </div>
                                                </div>
                                                <div id="submenu-r">
                                                    <a href="javascript: void(0);" id="submenu-op"><img id="logo_fijo2" style="height: 40px; max-width: 200px; top: -4px; float: left" src="<?= $draizp ?>/source/<?= $logoMenu ?>" alt=""/><i class="fa fa-bars fa-lg" style="float: right; margin-top: 10px"></i></a>
                                                    <ul id="despl">
                                                        <li><a href="<?= $draizp ?>/">INICIO</a></li>
                                                        <li><a href="<?= $draizp ?>/nosotros">NOSOTROS</a></li>
                                                        <li><a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>" class="submenu">PRODUCTOS</a> <span class="submenu-op">+˅</span>
                                                            <ul class="bloque_submenu">
                                                                <?php
                                                                    foreach ($categorias AS $padre) {
                                                                        $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                                                                        $nombre = strtolower($nombre);
                                                                        $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
                                                                        ?>
                                                                        <li>
                                                                            <a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>productos/<?= $padre['id'] ?>/<?= $nombre ?>/" class="submenu"><?= $padre['nombre'] ?></a>
                                                                            <?php
                                                                            if (count($padre['categorias']) > 0 && $padre['categorias'] != null) {
                                                                                ?> <span class="submenu-op">+</span>
                                                                                <ul> <?php
                                                                                    foreach ($padre['categorias'] AS $hijo1) {
                                                                                        $nombre2 = utf8_encode(strtr(utf8_decode($hijo1['nombre']), utf8_decode($tofind), $replac));
                                                                                        $nombre2 = strtolower($nombre2);
                                                                                        $nombre2 = preg_replace('([^A-Za-z0-9])', '-', $nombre2);
                                                                                        ?>
                                                                                        <li class="sm1">
                                                                                            <a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>productos/<?= $hijo1['id'] ?>/<?= $nombre2 ?>/"><?= $hijo1['nombre'] ?></a>
                                                                                            <?php
                                                                                            if (count($hijo1['categorias']) > 0 && $hijo1['categorias'] != null) {
                                                                                                ?> <span class="submenu-op">+</span>
                                                                                                <ul> <?php
                                                                                                    foreach ($hijo1['categorias'] AS $hijo2) {
                                                                                                        $nombre3 = utf8_encode(strtr(utf8_decode($hijo2['nombre']), utf8_decode($tofind), $replac));
                                                                                                        $nombre3 = strtolower($nombre3);
                                                                                                        $nombre3 = preg_replace('([^A-Za-z0-9])', '-', $nombre3);
                                                                                                        ?>
                                                                                                        <li class="sm2">
                                                                                                            <a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>productos/<?= $hijo2['id'] ?>/<?= $nombre3 ?>/"><?= $hijo2['nombre'] ?></a>
                                                                                                            <?php
                                                                                                            if (count($hijo2['categorias']) > 0 && $hijo2['categorias'] != null) {
                                                                                                                ?>
                                                                                                                <ul>
                                                                                                                    <li>
                                                                                                                        <span><?= $hijo2['nombre'] ?></span>
                                                                                                                        <?php
                                                                                                                        foreach ($hijo2['categorias'] AS $hijo3) {
                                                                                                                            $nombre4 = utf8_encode(strtr(utf8_decode($hijo3['nombre']), utf8_decode($tofind), $replac));
                                                                                                                            $nombre4 = strtolower($nombre4);
                                                                                                                            $nombre4 = preg_replace('([^A-Za-z0-9])', '-', $nombre4);
                                                                                                                            ?>
                                                                                                                            <a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>productos/<?= $hijo3['id'] ?>/<?= $nombre4 ?>/"><?= $hijo3['nombre'] ?></a>
                                                                                                                            <?php
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                                <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </li>
                                                                                                        <?php
                                                                                                    }
                                                                                                    ?> </ul> <?php
                                                                                            }
                                                                                            ?>
                                                                                        </li>
                                                                                        <?php
                                                                                    }
                                                                                    ?> </ul> <?php
                                                                            }
                                                                            ?>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </ul>
                                                        </li>
                                                        <?php if ($Empresa['blog'] == 1) { ?>
                                                                <li><a href="<?= $draizp ?>/blog">BLOG</a></li>
                                                                <?php
                                                            }
                                                            if ($Empresa['galeria'] == 1) {
                                                                ?>
                                                                <li><a href="<?= $draizp ?>/galeria">GALERÍA</a></li>
                                                            <?php } ?>
                                                        <li><a href="<?= $draizp ?>/contacto">CONTACTO</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="grid12-10">
                                                <div id="submenu" style="font-family: <?= $fuente1 ?>,sans-serif;">
                                                    <ul style="float:left">
                                                        <li style="line-height: 70px" id="casita" class="divLogo2"><a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>">INICIO</a></li>
                                                        <li style="line-height: 70px"><a href="<?= $draizp ?>/nosotros">NOSOTROS</a></li>
                                                        <li style="line-height: 70px"><a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>">PRODUCTOS</a>
                                                            <ul class="bloque_submenu" style="-webkit-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);-moz-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);">
                                                                <?php
                                                                    $control = 0;
                                                                    foreach ($categorias AS $padre) {
                                                                        $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                                                                        $nombre = strtolower($nombre);
                                                                        $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);

                                                                        if ($padre['id'] == $bar)
                                                                            $barpath = '<a href="' . $draizp . '/' . $_SESSION['lenguaje'] . 'productos/' . $padre['id'] . '/' . $nombre . '/"' . (count($padre['categorias']) < 1 ? '' : '') . '>' . $padre['nombre'] . '</a>';

                                                                        $control++;
                                                                        ?>

                                                                        <li class="sm1">
                                                                            <?php if ($padre['url'] == '') { ?>
                                                                                <a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>productos/<?= $padre['id'] ?>/<?= $nombre ?>/" class="submenu"><?= $padre['nombre'] ?> <?= count($padre['categorias']) > 0 ? '>' : '' ?></a>
                                                                            <?php } else { ?>
                                                                                <a href="<?= $padre['url'] ?>" target="_blank" class="submenu"><?= $padre['nombre'] ?></a>
                                                                            <?php } ?>
                                                                            <?php
                                                                            if (count($padre['categorias']) > 0 && $padre['categorias'] != null) {
                                                                                ?> <ul> <?php
                                                                                    foreach ($padre['categorias'] AS $hijo1) {
                                                                                        $nombre2 = utf8_encode(strtr(utf8_decode($hijo1['nombre']), utf8_decode($tofind), $replac));
                                                                                        $nombre2 = strtolower($nombre2);
                                                                                        $nombre2 = preg_replace('([^A-Za-z0-9])', '-', $nombre2);

                                                                                        if ($hijo1['id'] == $bar)
                                                                                            $barpath = '<a href="' . $draizp . '/' . $_SESSION['lenguaje'] . 'productos/' . $padre['id'] . '/' . $nombre . '/">' . $padre['nombre'] . '</a> &gt; ' .
                                                                                                    '<a href="' . $draizp . '/' . $_SESSION['lenguaje'] . 'productos/' . $hijo1['id'] . '/' . $nombre2 . '/"' . (count($hijo1['categorias']) < 1 ? '' : '') . '>' . $hijo1['nombre'] . '</a>';
                                                                                        ?>
                                                                                        <li class="sm2">
                                                                                            <?php if ($hijo1['url'] == '') { ?>
                                                                                                <a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>productos/<?= $hijo1['id'] ?>/<?= $nombre2 ?>/"><?= $hijo1['nombre'] ?></a>
                                                                                            <?php } else { ?>
                                                                                                <a href="<?= $hijo1['url'] ?>" target="_blank" class="submenu"><?= $hijo1['nombre'] ?></a>
                                                                                            <?php } ?>
                                                                                            <?php
                                                                                            if (count($hijo1['categorias']) > 0 && $hijo1['categorias'] != null) {
                                                                                                ?> <ul> <?php
                                                                                                    foreach ($hijo1['categorias'] AS $hijo2) {
                                                                                                        $nombre3 = utf8_encode(strtr(utf8_decode($hijo2['nombre']), utf8_decode($tofind), $replac));
                                                                                                        $nombre3 = strtolower($nombre3);
                                                                                                        $nombre3 = preg_replace('([^A-Za-z0-9])', '-', $nombre3);
                                                                                                        if ($hijo2['id'] == $bar)
                                                                                                            $barpath = '<a href="' . $draizp . '/' . $_SESSION['lenguaje'] . 'productos/' . $padre['id'] . '/' . $nombre . '/">' . $padre['nombre'] . '</a> &gt; ' .
                                                                                                                    '<a href="' . $draizp . '/' . $_SESSION['lenguaje'] . 'productos/' . $hijo1['id'] . '/' . $nombre2 . '/">' . $hijo1['nombre'] . '</a> &gt; ' .
                                                                                                                    '<a href="' . $draizp . '/' . $_SESSION['lenguaje'] . 'productos/' . $hijo2['id'] . '/' . $nombre3 . '/"' . (count($hijo2['categorias']) < 1 ? '' : '') . '>' . $hijo2['nombre'] . '</a>';
                                                                                                        ?>
                                                                                                        <li>
                                                                                                            <?php if ($hijo2['url'] == '') { ?>
                                                                                                                <a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>productos/<?= $hijo2['id'] ?>/<?= $nombre3 ?>/"><?= $hijo2['nombre'] ?></a>
                                                                                                            <?php } else { ?>
                                                                                                                <a href="<?= $hijo2['url'] ?>" target="_blank" class="submenu"><?= $hijo2['nombre'] ?></a>
                                                                                                            <?php } ?>
                                                                                                            <?php
                                                                                                            if (count($hijo2['categorias']) > 0 && $hijo2['categorias'] != null) {
                                                                                                                ?>
                                                                                                                <ul>
                                                                                                                    <li>
                                                                                                                        <span><?= $hijo2['nombre'] ?></span>
                                                                                                                        <?php
                                                                                                                        foreach ($hijo2['categorias'] AS $hijo3) {
                                                                                                                            $nombre4 = utf8_encode(strtr(utf8_decode($hijo3['nombre']), utf8_decode($tofind), $replac));
                                                                                                                            $nombre4 = strtolower($nombre4);
                                                                                                                            $nombre4 = preg_replace('([^A-Za-z0-9])', '-', $nombre4);

                                                                                                                            if ($hijo3['id'] == $bar)
                                                                                                                                $barpath = '<a href="' . $draizp . '/' . $_SESSION['lenguaje'] . 'productos/' . $padre['id'] . '/' . $nombre . '/">' . $padre['nombre'] . '</a> &gt; ' .
                                                                                                                                        '<a href="' . $draizp . '/' . $_SESSION['lenguaje'] . 'productos/' . $hijo1['id'] . '/' . $nombre2 . '/">' . $hijo1['nombre'] . '</a> &gt; ' .
                                                                                                                                        '<a href="' . $draizp . '/' . $_SESSION['lenguaje'] . 'productos/' . $hijo2['id'] . '/' . $nombre3 . '/">' . $hijo2['nombre'] . '</a> &gt; ' .
                                                                                                                                        '<a href="' . $draizp . '/' . $_SESSION['lenguaje'] . 'productos/' . $hijo3['id'] . '/' . $nombre4 . '/"' . (count($hijo3['categorias']) < 1 ? '' : '') . '>' . $hijo3['nombre'] . '</a>';
                                                                                                                            ?>
                                                                                                                            <a href="<?= $draizp ?><?= $_SESSION['lenguaje'] ?>productos/<?= $hijo3['id'] ?>/<?= $nombre4 ?>"><?= $hijo3['nombre'] ?></a>
                                                                                                                            <?php
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </li>
                                                                                                                </ul>
                                                                                                                <?php
                                                                                                            }
                                                                                                            ?>
                                                                                                        </li>
                                                                                                        <?php
                                                                                                    }
                                                                                                    ?> </ul> <?php
                                                                                            }
                                                                                            ?>
                                                                                        </li>
                                                                                        <?php
                                                                                    }
                                                                                    ?> </ul> <?php
                                                                            }
                                                                            ?>
                                                                        </li>
                                                                        <?php
                                                                    }
                                                                ?>
                                                            </ul></li>


                                                        <?php if ($Empresa['blog'] == 1) { ?>
                                                                <li style="line-height: 70px"><a href="<?= $draizp ?>/blog"">BLOG</a></li>
                                                                <?php
                                                            }
                                                            if ($Empresa['galeria'] == 1) {
                                                                ?>
                                                                <li style="line-height: 70px"><a href="<?= $draizp ?>/galeria">GALERÍA</a></li>
                                                            <?php } ?>

                                                        <li  style="line-height: 70px"><a href="<?= $draizp ?>/contacto">CONTACTO</a></li>
                                                        <li style="line-height: 70px"><a href="javascript:void(null);" class="submenu">CUENTA</a>

                                                            <ul class="bloque_submenu">
                                                                <?php if ($_SESSION['usr'] != null) { ?>
                                                                        <li class="sm1"><a class="submenu" href="<?= $draizp ?>/acc/salir">Desconectarse</a></li>
                                                                    <?php } else { ?>
                                                                        <li class="sm1"><a class="submenu" href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>cuenta">Conectarse</a></li>
                                                                    <?php } ?>
                                                                    <?php if ($paginasE['20002'] == 1) { ?><li class="sm1"><a class="submenu" href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>devoluciones">Envíos y devoluciones</a></li><?php } ?>
                                                                <?php if ($paginasE['20001'] == 1) { ?><li class="sm1"><a class="submenu" href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>privacidad">Política de privacidad</a></li><?php } ?>
                                                                <?php if ($Empresa['desactivarGE'] == 1) { ?><li class="sm1"><a class="submenu" href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>portes">Gastos de Envío</a></li><?php } ?>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                    </ul>
                                                    <ul class="ulRight">
                                                        <li style="line-height: 70px;margin-right:15px;">
                                                            <a href="<?= $draizp ?>/<?= $_SESSION['lenguaje'] ?>cesta" style="width:40px"><i class="fa fa-shopping-cart fa-lg" style="float:left;"></i><span style="float:right;"><?= count($cestanum);?></span></a>
                                                        </li>
                                                        <div class="buscarForm">
                                                            <form action="<?= $draizp ?>/es/" method="post" name="formGlobalSearch" id="formGlobalSearch">
                                                                <div class="input-group suggest">
                                                                    <input style="width: 200px;float:left;border:none;margin-top:2.5%" class="" name="buscar" value="" placeholder="Buscar..." type="text">
                                                                    <span class="input-group-btn" style="display:inline;float:right;" onclick="javascript:document.getElementById('formGlobalSearch').submit();"><i class="fa fa-search fa-lg"></i></span>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

