<?
    /*
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
            <ul>
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
            </ul>
        </div>
    </div>
</div>
*/
    ?>