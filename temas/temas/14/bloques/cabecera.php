

	<link rel="stylesheet" type="text/css" href="<?=$draizp?>/temas/14/bloques/css/styles_sjh38ed4.css" media="all">

	<link rel="stylesheet" type="text/css" href="<?=$draizp?>/temas/14/bloques/css/grid12_sjh38ed4.css" media="all">

	<script type="text/javascript" src="<?=$draizp?>/temas/14/bloques/js/scripts_sjh38ed4.js"></script>
        <style>
            #grupo-submenu #submenu a
            {
		color: <?=$colores['menu_letra']?>;
            }
            #grupo-submenu #submenu ul li:hover > a{
                color: <?=$colores['menu_letra_hover']?>;
            }     
            body{
                font-family: '<?=$fuente2?>', Arial,Helvetica,sans-serif;
            }

            .tfiltro{
                font-family: '<?=$fuente1?>', sans-serif;
            }

            h1{
                font-family: '<?=$fuente1?>', sans-serif;
            }
            .header-top-container{
                background-color: <?=$colores2['colorposbarmainSup']?> !important;
            }
            .header-primary-container{
                background-color: <?=$colores2['colorposbarmainSup']?> !important;
            }
            .icon_lef_head{
                background-color: <?=$colores2['colorbotonesmain']?> !important;
                color: <?=$colores2['colortextobotonform']?> !important;
            }
            .links > li > a:hover {
                background-color: <?=$colores['boton_fondo_hover']?> !important;
                color: <?=$colores['boton_letras_hover']?> !important;
            }
        </style>
        
<div id="root-wrapper" class="cms-index-index responsive cms-home">
    <div class="wrapper">
	<div class="page">
            <div id="top2" class="header-container header-regular">
                <div class="header-container2" style="width: 100%">
                    <div class="header-container3" style="width: 100%">
                        <div class="header-top-container" style="width: 100%">
                            <div class="header-top header container clearer" style="width: 1060px;">
                                <div class="inner-container">
                                    <div class="left-column">
                                    </div>
                                    <div>
                                        <div class="item-left block_header_top_left2" style="float: left">
                                            <ul>
                                                <li class="material-icons icon_lef_head">headset_mic</li>
                                                <li class="tel_left">Atención al cliente (+34) <?=number_format($Empresa['telefono'], 0, '', ' ')?></li>
                                            </ul>
                                        </div>
                                        <div class="hp-block right-column">
                                            <div class="item">
                                                <div id="user-menu-wrapper-regular">
                                                    <div id="user-menu" class="user-menu">
                                                        <div id="mini-cart-wrapper-regular">
                                                            <div id="mini-cart" class="mini-cart dropdown is-empty">
                                                                <!--<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta" class="mini-cart-heading dropdown-heading cover skip-link skip-cart bg_color_cart">
                                                                    <span>
                                                                        <i class="material-icons icon_shopping_cart">shopping_cart</i>
                                                                        <span class="label label_ecm_edit">Cesta</span>
                                                                        <i class="material-icons expand_icon_ecm">expand_more</i>
                                                                    </span>
                                                                </a>
                                                                    <div id="header-cart" class="mini-cart-content dropdown-content left-hand block block block-cart skip-content skip-content--style" style="display: none;">
                                                                    <div class="block-content-inner">
                                                                        <div class="empty">No tiene artículos en su carrito de compras.</div>
                                                                    </div>
                                                                </div>-->
                                                            </div>
                                                        </div>
                                                        <div id="account-links-wrapper-regular">
                                                            <div id="header-account" class="top-links links-wrapper-separators-left skip-content skip-content--style unique_links">
                                                                <ul class="links">
                                                                    <li class="first"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cuenta" title="Mi cuenta">Mi cuenta</a></li>
                                                                    <li class=" last"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cuenta" title="Inicio de sesión">Inicio de sesión</a></li>
                                                                    <li class=" last"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta" title="Cesta"><i style="font-size: 17pt;" class="fa fa-shopping-cart"></i> Cesta</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
					</div>
					<div class="myaccount_desk">
                                            <a href="#" class="skip-link skip-account">
                                                <span class="icon ic ic-user"></span>
						<span class="label">Mi cuenta</span>
                                            </a>
					</div>
                                    </div>
                                    <div class="right-column">
                                        <div id="currency-switcher-wrapper-regular" class="item item-right"></div>
                                    </div>
				</div>
                            </div>
			</div>

						<div class="header-primary-container">
							<div class="header-primary header container" style="width: 1060px;">
								<div class="inner-container">
									<div class="hp-blocks-holder skip-links--5">
										<div class="grid-container">
											<div class="hp-block left-column grid12-4">
												<div class="item"><div class="logo-wrapper logo-wrapper--regular">
													<h1 class="logo logo--regular"><a href="#" title="Logo"><?php if($logoSup != ''){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><img src="<?=$draizp?>/source/<?=$logoSup?>" alt=""/></a><?php } ?></a></h1>
												</div>
												</div>
											</div>
											<div class="grid12-2">.</div>
											<div class="hp-block central-column grid12-6 nospaced_right">
												<div class="item"><div id="search-wrapper-regular">
													<div id="header-search" class="skip-content skip-content--style search-wrapper">
														<form id="search_mini_form" action="<?=$draizp?>/<?=$_SESSION['lenguaje']?><?=$_POST['buscar']?>" method="post">
															<div class="form-search">
																<label for="search">Buscar:</label>
																<input id="search" type="text" name="buscar" value="" class="input-text" maxlength="128" autocomplete="off" placeholder="Buscar en toda la tienda...">
																<button type="submit" title="Búsqueda" class="button"><i class="material-icons icon_search">search</i></button>
															</div>
														</form>
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
	</div>
</div>