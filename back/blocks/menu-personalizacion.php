<?php
session_start();
require_once "../back/config_db_cms.php";
require_once "../back/config/conectar_cms.php";
require_once('./system/functions.module');	

$System = new MySystem("BD_CLIENTE");

$System->ControlDeSesiones();

$cabecera = $System->CargarTemaCabecera();

?>
<li class="dropup <?=$menusel == 'personalizarTemaContainer' ? 'active' : ''?><?=$menusel == 'colores' ? 'active' : ''?><?=$menusel == 'admincurriculums' ? 'active' : ''?><?=$menusel == 'plantilla' ? ' active' : ''?><?=$menusel == 'fuentes' ? ' active' : ''?><?=$menusel == 'footercopyright' ? ' active' : ''?><?=$menusel == 'bloqueobarra' ? ' active' : ''?><?=$menusel == 'mensaje_publicitario' ? ' active' : ''?><?=$menusel == 'cabpie' ? ' active' : ''?><?=$menusel == 'extrasPedido' ? ' active' : ''?><?=$menusel == 'iconosRedes' ? ' active' : ''?><?=$menusel == 'cesta' ? ' active' : ''?><?=$menusel == 'pagos' ? ' active' : ''?><?=$menusel == 'productos_opc' ? ' active' : ''?><?=$menusel == 'filtroenproductos' ? ' active' : ''?><?=$menusel == 'pedido' ? ' active' : ''?><?=$menusel == 'bloques' ? ' active' : ''?><?=$menusel == 'megaMenu' ? ' active' : ''?>">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Personalización <i class="icon-chevron-up"></i></a>
                            <ul class="dropdown-menu" style="width:99%;" role="menu">
                                <li<?=$menusel == 'admincurriculums' ? ' class="active"' : ''?>>
                                    <a href="admincurriculums.php"><i class="icon-chevron-right"></i> Administrar Curriculums</a>
                                </li>
                                <li<?=$menusel == 'plantilla' ? ' class="active"' : ''?>>
                                    <a href="plantilla.php"><i class="icon-chevron-right"></i> Línea de estilo</a>
                                </li>
                                <li<?=$menusel == 'colores' ? ' class="active"' : ''?>>
                                    <a href="colores.php"><i class="icon-chevron-right"></i> Colores de la web</a>
                                </li>
                                <li<?=$menusel == 'fuentes' ? ' class="active"' : ''?>>
                                    <a href="fuentes.php"><i class="icon-chevron-right"></i> Fuentes de la web</a>
                                </li>
                                <li<?=$menusel == 'mensaje_publicitario' ? ' class="active"' : ''?>>
                                    <a href="mensaje_publicitario.php"><i class="icon-chevron-right"></i> Anuncio página principal</a>
                                </li>
                                <li<?=$menusel == 'cabpie' ? ' class="active"' : ''?>>
                                    <a href="cabpie.php"><i class="icon-chevron-right"></i> Html en cabecera y píe</a>
                                </li>
                                <li<?=$menusel == 'extrasPedido' ? ' class="active"' : ''?>>
                                    <a href="extrasPedido.php"><i class="icon-chevron-right"></i> Campos extras en Pedido</a>
                                </li>
                                <li<?=$menusel == 'iconosRedes' ? ' class="active"' : ''?>>
                                    <a href="iconosRedes.php"><i class="icon-chevron-right"></i> Redes Sociales</a>
                                </li>
                                <li<?=$menusel == 'cesta' ? ' class="active"' : ''?>>
                                    <a href="cesta.php"><i class="icon-chevron-right"></i> Cesta</a>
                                </li>
                                <li<?=$menusel == 'pedido' ? ' class="active"' : ''?>>
                                    <a href="pedido.php"><i class="icon-chevron-right"></i> Resumen Pedido</a>
                                </li>
                                <li<?=$menusel == 'procesodecompra' ? ' class="active"' : ''?>>
                                    <a href="cambiar_proceso_compra.php"><i class="icon-chevron-right"></i> Proceso de Compra</a>
                                </li>
                                <li<?=$menusel == 'imgscart' ? ' class="active"' : ''?>>
                                    <a href="imagenes_carrito.php"><i class="icon-chevron-right"></i> Imagenes Carrito</a>
                                </li>
                                <li<?=$menusel == 'ocultarproductos' ? ' class="active"' : ''?>>
                                    <a href="ocultar_productos.php"><i class="icon-chevron-right"></i> Mostrar/Ocultar Productos</a>
                                </li>
                                <li<?=$menusel == 'footercopyright' ? ' class="active"' : ''?>>
                                    <a href="footer_copyright_bar.php"><i class="icon-chevron-right"></i> Barra Copyright Footer</a>
                                </li>
                                <li<?=$menusel == 'filtroenproductos' ? ' class="active"' : ''?>>
                                    <a href="activar_filtro_productos.php"><i class="icon-chevron-right"></i> Filtro en productos</a>
                                </li>
                                <li<?=$menusel == 'bloques' ? ' class="active"' : ''?>>
                                    <a href="activar_bloques.php"><i class="icon-chevron-right"></i> Activar Bloques</a>
                                </li>
                                <li<?=$menusel == 'pagos' ? ' class="active"' : ''?>>
                                    <a href="pagos.php"><i class="icon-chevron-right"></i> Pagos</a>
                                </li>
                                <li<?=$menusel == 'productos_opc' ? ' class="active"' : ''?>>
                                    <a href="productos_opc.php"><i class="icon-chevron-right"></i> Productos</a>
                                </li>
                                <li<?=$menusel == 'megaMenu' ? ' class="active"' : ''?>>
                                    <a href="megaMenu.php"><i class="icon-chevron-right"></i> Mega Menú</a>
                                </li>
                                <li<?=$menusel == 'buscador' ? ' class="active"' : ''?>>
                                    <a href="buscador.php"><i class="icon-chevron-right"></i> Buscador</a>
                                </li>
                                <li<?=$menusel == 'bloqueobarra' ? ' class="active"' : ''?>>
                                    <a href="bloqueo_barra.php"><i class="icon-chevron-right"></i> Bloquear Barra de Navegación</a>
                                </li>
                                <li<?=$menusel == 'imagenportada' ? ' class="active"' : ''?>>
                                    <a href="imagen_portada.php"><i class="icon-chevron-right"></i> Imagen Portada</a>
                                </li>
                                <li<?=$menusel == 'bloquescategoria' ? ' class="active"' : ''?>>
                                    <a href="bloques_categoria.php"><i class="icon-chevron-right"></i> Categorias por bloques</a>
                                </li>
                                <li<?=$menusel == 'logofullwidth' ? ' class="active"' : ''?>>
                                    <a href="logo_tamano_completo.php"><i class="icon-chevron-right"></i> Logo Tamaño completo (Cabecera)</a>
                                </li>
                                <?php if($cabecera == 17): //Solo se aplica para el tema Container Responsive ?>
                                <li<?=$menusel == 'personalizarTemaContainer' ? ' class="active"' : ''?>>
                                    <a href="personalizarContainerResponsive.php"><i class="icon-chevron-right"></i> Personalizar Container Responsive</a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </li>