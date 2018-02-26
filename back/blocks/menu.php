                <style>
                    .icon-chevron-down{
                        float: right;
                        margin-top: 2px;
                        margin-right: -7px !important;
                        opacity: .25;
                    }
                    
                    .icon-chevron-up{
                        float: right;
                        margin-top: 2px;
                        margin-right: -7px !important;
                        opacity: .25;
                    }
                </style>

                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li<?=$menusel == 'index' ? ' class="active"' : ''?>>
                            <a href="index.php"><i class="icon-chevron-right"></i> Tablero Inicial</a>
                        </li>
                        <li<?=$menusel == 'menus' ? ' class="active"' : ''?> <?=$menusel == 'menus_orden' ? ' class="active"' : ''?>>
                            <a href="menus.php"><i class="icon-chevron-right"></i> Menús</a>
                        </li>
                        <li<?=$menusel == 'multimedia' ? ' class="active"' : ''?> <?=$menusel == 'multimedia' ? ' class="active"' : ''?>>
                            <a href="multimedia.php"><i class="icon-chevron-right"></i> Multimedia</a>
                        </li>
                        <li class="dropdown <?=$menusel == 'facturas' || $menusel == 'detalle' ? 'active' : ''?><?=$menusel == 'compras_pendientes' ? ' active' : ''?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pedidos <i class="icon-chevron-down"></i><span title="Productos ocultos" style="margin-right:2px;" class="badge badge-success pull-right"><?=$contadores['compras_pendientes']?></span><span title="Productos visibles totales" class="badge badge-warning pull-right"><?=$contadores['facturas']?></span></a>
                            <ul class="dropdown-menu" style="width:99%;" role="menu">
                                <li<?=$menusel == 'facturas' || $menusel == 'detalle' ? ' class="active"' : ''?>>
                                    <a href="facturas.php"><i class="icon-chevron-right"></i><span title="Facturas emitidas desde hace 24 horas" class="badge badge-warning pull-right"><?=$contadores['facturas']?></span> Pedidos</a>
                                </li>
                                <li <?=$menusel == 'compras_pendientes' ? ' class="active"' : ''?>>
                                    <a href="compras_pendientes.php"><i class="icon-chevron-right"></i><span title="Compras pendientes de validar el ingreso/pago" class="badge badge-success pull-right"><?=$contadores['compras_pendientes']?></span> Compras Pendientes</a>
                                </li>
                                <li<?=$menusel == 'rma' ? ' class="active"' : ''?>>
                                    <a href="rma.php"><i class="icon-chevron-right"></i> RMA</a>
                                </li>
                                <li<?=$menusel == 'config_msj_pedido' ? ' class="active"' : ''?>>
                                    <a href="config_msj_pedido.php"><i class="icon-chevron-right"></i> Mensajes</a>
                                </li>
                                <li<?=$menusel == 'log_status_pedidos' ? ' class="active"' : ''?>>
                                    <a href="log_status_pedidos.php"><i class="icon-chevron-right"></i> Log</a>
                                </li>
                            </ul>
                        </li>
                        <li<?=$menusel == 'presupuestos' ? ' class="active"' : ''?>>
                            <a href="presupuestos.php"><i class="icon-chevron-right"></i> Presupuestos</a>
                        </li>
                        <li<?=$menusel == 'comentarios' ? ' class="active"' : ''?>>
                            <a href="comentarios.php"><i class="icon-chevron-right"></i> Comentarios</a>
                        </li>
                        <li class="dropdown <?=$menusel == 'productos' ? 'active' : ''?><?=$menusel == 'productos_distribuidores' ? ' active' : ''?><?=$menusel == 'categorias' ? 'active' : ''?><?=$menusel == 'categorias_orden' ? 'active' : ''?><?=$menusel == 'productos_relacionados' ? 'active' : ''?><?=$menusel == 'relacion_atributos' ? 'active' : ''?><?=$menusel == 'atributoscat' ? 'active' : ''?><?=$menusel == 'cuotas' ? 'active' : ''?><?=$menusel == 'masvendidos' ? 'active' : ''?><?=$menusel == 'novedades' ? 'active' : ''?><?=$menusel == 'visualizacion' ? 'active' : ''?><?=$menusel == 'ficherosProd' ? 'active' : ''?><?=$menusel == 'etiquetas' ? 'active' : ''?><?=$menusel == 'csv' ? 'active' : ''?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <i class="icon-chevron-down"></i><span title="Productos ocultos" style="margin-right:2px;" class="badge badge-info pull-right"><?=$contadores['productoso']?></span><span title="Productos visibles totales" class="badge badge-important pull-right"><?=$contadores['productosv']?></span></a>
                            <ul class="dropdown-menu" style="width:99%;" role="menu">
                                <li<?=$menusel == 'productos' ? ' class="active"' : ''?>>
                                    <a href="productos.php"><i class="icon-chevron-right"></i><span title="Productos ocultos" class="badge badge-info pull-right"><?=$contadores['productoso']?></span><span title="Productos visibles totales" class="badge badge-important pull-right"><?=$contadores['productosv']?></span> Productos</a>
                                </li>
                                <li<?=$menusel == 'productos_rapido' ? ' class="active"' : ''?>>
                                    <a href="productosrapido.php"><i class="icon-chevron-right"></i> Subida Rápida</a>
                                </li>

                                <li<?=$menusel == 'productos_distribuidores' ? ' class="active"' : ''?>>
                                    <a href="productos_distribuidores.php"><i class="icon-chevron-right"></i> Productos distribuidores</a>
                                </li>
                                <li<?=$menusel == 'categorias' ? ' class="active"' : ''?><?=$menusel == 'categorias_orden' ? ' class="active"' : ''?>>
                                    <a href="categorias.php"><i class="icon-chevron-right"></i> Categorías</a>
                                </li>
                                <li<?=$menusel == 'marcas' ? ' class="active"' : ''?>>
                                    <a href="marcas.php"><i class="icon-chevron-right"></i> Marcas</a>
                                </li>
                                <li<?=$menusel == 'productos_relacionados' ? ' class="active"' : ''?>>
                                    <a href="productos_relacionados.php"><i class="icon-chevron-right"></i> Productos Relacionados</a>
                                </li>
                                <li<?=$menusel == 'visualizacion' ? ' class="active"' : ''?>>
                                    <a href="visualizacion.php"><i class="icon-chevron-right"></i> Visualización Productos</a>
                                </li>
                                <li<?=$menusel == 'ficherosProd' ? ' class="active"' : ''?>>
                                    <a href="ficherosProd.php"><i class="icon-chevron-right"></i> Ficheros Relacionados</a>
                                </li>
                                <li<?=$menusel == 'relacion_atributos' ? ' class="active"' : ''?>>
                                    <a href="relacion_atributos.php"><i class="icon-chevron-right"></i> Relacionar Atrbutos</a>
                                </li>
                                <li<?=$menusel == 'atributoscat' ? ' class="active"' : ''?>>
                                    <a href="atributoscat.php"><i class="icon-chevron-right"></i> Atributos (Gestión)</a>
                                </li>
                                <li<?=$menusel == 'cuotas' ? ' class="active"' : ''?>>
                                    <a href="cuotas.php"><i class="icon-chevron-right"></i> Cuotas (Financiación)</a>
                                </li>
                                <li<?=$menusel == 'masvendidos' ? ' class="active"' : ''?>>
                                    <a href="masvendidos.php"><i class="icon-chevron-right"></i> Más Vendidos</a>
                                </li>
                                <li<?=$menusel == 'novedades' ? ' class="active"' : ''?>>
                                    <a href="novedades.php"><i class="icon-chevron-right"></i> Novedades</a>
                                </li>
                                <li<?=$menusel == 'etiquetas' ? ' class="active"' : ''?>>
                                    <a href="etiquetas.php"><i class="icon-chevron-right"></i> Etiquetas</a>
                                </li>
                            </ul>
                        </li>
                        <li<?=$menusel == 'cat-imagen' ? ' class="active"' : ''?>>
                            <a href="cat-imagen.php"><i class="icon-chevron-right"></i> Imágenes menús</a>
                        </li>
                        <li<?=$menusel == 'carritos' ? ' class="active"' : ''?>>
                            <a href="carrito.php"><i class="icon-chevron-right"></i><span title="Carritos perdidos" class="badge badge-important pull-right"><?=$contadores['carritos']?></span> Carritos perdidos</a>
                        </li>
                        <!--<li<?=$menusel == 'packs' || $menusel == 'productos_pack' ? ' class="active"' : ''?>>
                            <a href="packs.php"><i class="icon-chevron-right"></i><span title="Packs totales" class="badge badge-important pull-right"><?=$contadores['packs']?></span> Packs</a>
                        </li>-->
                        <li class="dropdown <?=$menusel == 'noticias' ? 'active' : ''?><?=$menusel == 'categorias_blog' ? ' active' : ''?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <i class="icon-chevron-down"></i></a>
                            <ul class="dropdown-menu" style="width:99%;" role="menu">
                                <li<?=$menusel == 'noticias' ? ' class="active"' : ''?>>
                                    <a href="noticias.php"><i class="icon-chevron-right"></i> Blog</a>
                                </li>
                                <li<?=$menusel == 'categorias_blog' ? ' class="active"' : ''?>>
                                    <a href="categorias_blog.php"><i class="icon-chevron-right"></i> Categorías del blog</a>
                                </li>
                            </ul>
                        </li>
                        <li<?=$menusel == 'sliders' ? ' class="active"' : ''?>>
                            <a href="sliders.php"><i class="icon-chevron-right"></i> Slider</a>
                        </li>
                        <li class="dropdown <?=$menusel == 'galeria' ? 'active' : ''?><?=$menusel == 'categorias_galeria' ? ' active' : ''?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Galería <i class="icon-chevron-down"></i></a>
                            <ul class="dropdown-menu" style="width:99%;" role="menu">
                                <li<?=$menusel == 'galeria' ? ' class="active"' : ''?>>
                                    <a href="galeria.php"><i class="icon-chevron-right"></i> Galería</a>
                                </li>
                                <li<?=$menusel == 'categorias_galeria' ? ' class="active"' : ''?>>
                                    <a href="categorias_galeria.php"><i class="icon-chevron-right"></i> Categorías de Galería</a>
                                </li>
                            </ul>
                        </li>
                        <li<?=$menusel == 'descuentos' ? ' class="active"' : ''?>>
                            <a href="descuentos.php"><i class="icon-chevron-right"></i> Descuentos</a>
                        </li>
                        <li<?=$menusel == 'promocionales' ? ' class="active"' : ''?>>
                            <a href="promocionales.php"><i class="icon-chevron-right"></i> Cupones Descuento</a>
                        </li>
                        <!--<li<?=$menusel == 'bloques_principal' ? ' class="active"' : ''?>>
                            <a href="bloques_principal.php"><i class="icon-chevron-right"></i> Bloques Página Principal</a>
                        </li>-->
                        <li<?=$menusel == 'paises' ? ' class="active"' : ''?>>
                            <a href="paises.php"><i class="icon-chevron-right"></i> Paises</a>
                        </li>
                        <li<?=$menusel == 'paginas' ? ' class="active"' : ''?>>
                            <a href="paginas.php"><i class="icon-chevron-right"></i> Páginas</a>
                        </li>
                        <li<?=$menusel == 'tiendas' ? ' class="active"' : ''?>>
                            <a href="tiendas.php"><i class="icon-chevron-right"></i> Tiendas</a>
                        </li>
                       <!-- <li<?=$menusel == 'usuarios' ? ' class="active"' : ''?>>
                            <a href="usuarios.php"><i class="icon-chevron-right"></i><span title="Usuarios activos en la web" class="badge badge-success pull-right"><?=$contadores['usuarios']?></span> Usuarios</a>
                        </li>-->
                        <li class="dropup <?=$menusel == 'distribuidores' ? 'active' : ''?><?=$menusel == 'usuarios' ? ' active' : ''?><?=$menusel == 'intentoRegistro' ? ' active' : ''?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <i class="icon-chevron-up"></i><span title="Distribuidores activos en la web" class="badge badge-warning pull-right" style="margin-right:2px;"><?=$contadores['distribuidores']?></span><span title="Usuarios activos en la web" class="badge badge-success pull-right"><?=$contadores['usuarios']?></span></a>
                            <ul class="dropdown-menu" style="width:99%;" role="menu">
                                <li<?=$menusel == 'distribuidores' ? ' class="active"' : ''?>>
                                    <a href="distribuidores.php"><i class="icon-chevron-right"></i><span title="Distribuidores activos en la web" class="badge badge-warning pull-right"><?=$contadores['distribuidores']?></span> Distribuidores</a>
                                </li>
                                <li<?=$menusel == 'usuarios' ? ' class="active"' : ''?>>
                                    <a href="usuarios.php"><i class="icon-chevron-right"></i><span title="Usuarios registrados a falta de validar en la web" class="badge badge-info pull-right"><?=$contadores['usuariosr']?></span><span title="Usuarios activos en la web" class="badge badge-success pull-right"><?=$contadores['usuarios']?></span> Usuarios</a>
                                </li>
                                <li<?=$menusel == 'intentoRegistro' ? ' class="active"' : ''?>>
                                    <a href="intentoRegistro.php">Log Registro</a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown <?=$menusel == 'noticias' ? 'active' : ''?><?=$menusel == 'categorias_blog' ? ' active' : ''?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Marketing <i class="icon-chevron-down"></i></a>
                            <ul class="dropdown-menu" style="width:99%;" role="menu">
                                <li<?=$menusel == 'csv' ? ' class="active"' : ''?>>
                                    <a href="csv.php"><i class="icon-chevron-right"></i> Generar CSV</a>
                                </li>
                                <li<?=$menusel == 'merchant' ? ' class="active"' : ''?>>
                                    <a href="merchant.php"><i class="icon-chevron-right"></i> Google Merchant</a>
                                </li>
                            </ul>
                        </li>


                       <?php include "menu-personalizacion.php"; ?>
                        
                       <li class="dropup <?=$menusel == 'herramientas-menu' ? 'active' : ''?><?=$menusel == 'eliminarinfo' ? ' active' : ''?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Herramientas <i class="icon-chevron-up"></i></a>
                            <ul class="dropdown-menu" style="width:99%;" role="menu">
                                <li<?=$menusel == 'herramientas-menu' ? ' class="active"' : ''?>>
                                    <a href="herramientas-menu.php"><i class="icon-chevron-right"></i> Herramientas Menu</a>
                                </li>
                                <li<?=$menusel == 'eliminarinfo' ? ' class="active"' : ''?>>
                                    <a href="eliminar_dbinfo.php"><i class="icon-chevron-right"></i> Eliminar Información</a>
                                </li>
                            </ul>
                        </li>



                         <li class="dropup <?=$menusel == 'idiomas' ? 'active' : ''?><?=$menusel == 'configuracion' ? 'active' : ''?><?=$menusel == 'metodospago' ? ' active' : ''?><?=$menusel == 'portes' ? ' active' : ''?><?=$menusel == 'portes2' ? ' active' : ''?><?=$menusel == 'portes3' ? ' active' : ''?><?=$menusel == 'portes4' ? ' active' : ''?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configuración <i class="icon-chevron-up"></i></a>
                            <ul class="dropdown-menu" style="width:99%;" role="menu">
                                <li<?=$menusel == 'configuracion' ? ' class="active"' : ''?>>
                                    <a href="configuracion.php"><i class="icon-chevron-right"></i> Configuración web</a>
                                </li>
                                <li<?=$menusel == 'idiomas' ? ' class="active"' : ''?>>
                                    <a href="idiomas.php"><i class="icon-chevron-right"></i> Configuración idiomas web</a>
                                </li>
                                <li class="dropdown dropdown-submenu <?=$menusel == 'portes' ? ' active' : ''?><?=$menusel == 'portes2' ? ' active' : ''?><?=$menusel == 'portes3' ? ' active' : ''?><?=$menusel == 'portes4' ? ' active' : ''?>">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-chevron-right"></i> Portes</a>
                                    <ul class="dropdown-menu" style="width:99%;" role="menu">
                                        <li<?=$menusel == 'portes' ? ' class="active"' : ''?>>
                                                <a href="portes.php"><i class="icon-chevron-right"></i> Normales</a>
                                            </li>
                                            <li<?=$menusel == 'portes2' ? ' class="active"' : ''?>>
                                                <a href="portes2.php"><i class="icon-chevron-right"></i> Por Km</a>
                                            </li>
                                            <li<?=$menusel == 'portes3' ? ' class="active"' : ''?>>
                                                <a href="portes3.php"><i class="icon-chevron-right"></i> Por Provincias</a>
                                            </li> 
                                            <li<?=$menusel == 'portes4' ? ' class="active"' : ''?>>
                                                <a href="portes4.php"><i class="icon-chevron-right"></i> Por Provincias y Kg</a>
                                            </li> 
                                    </ul>
                                </li>
                                <li<?=$menusel == 'metodospago' ? ' class="active"' : ''?>>
                                    <a href="metodospago.php"><i class="icon-chevron-right"></i> Métodos de pago</a>
                                </li>
                                <li<?=$menusel == 'divisas' ? ' class="active"' : ''?>>
                                    <a href="divisas.php"><i class="icon-chevron-right"></i> Divisas</a>
                                </li>
                               
                            </ul>
                        </li>
                    </ul>



                   
                </div>
                
                <style>
                    
                .dropdown-submenu>a:after{display:block;content:" ";float:right;width:0;height:0;border-color:transparent;border-style:solid;border-width:5px 0 5px 5px;border-left-color:transparent;margin-top:5px;margin-right:-10px;}
                .dropdown-submenu:hover>a:after{border-left-color:#fff;}

                </style>