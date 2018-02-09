                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <li<?=$menusel == 'index' ? ' class="active"' : ''?>>
                            <a href="index.php"><i class="icon-chevron-right"></i> Tablero Inicial</a>
                        </li>
                        <li<?=$menusel == 'productos' ? ' class="active"' : ''?>>
                            <a href="productos.php"><i class="icon-chevron-right"></i><span title="Productos ocultos" class="badge badge-info pull-right"><?=$contadores['productoso']?></span><span title="Productos visibles totales" class="badge badge-important pull-right"><?=$contadores['productosv']?></span> Productos</a>
                        </li>
                    </ul>
                </div>