	<link rel="stylesheet" type="text/css" href="<?=$draizp?>/temas/14/bloques/css/grid12_sjh38ed4.css" media="all">
        <style>
            #grupo-submenu #submenu a
            {
		color: <?=$colores['menu_letra']?>;
            }
            #grupo-submenu #submenu ul li:hover > a{
                color: <?=$colores['menu_letra_hover']?>;
            }  
            .menu_letras{
                color: <?=$colores['menu_letra']?>;
            }
            .menu_letras:hover{
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
											<div class="hp-block left-column grid12-2">
												<div class="item"><div class="logo-wrapper logo-wrapper--regular">
													<h1 class="logo logo--regular"><a href="#" title="Logo"><?php if($logoSup != ''){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><img src="<?=$draizp?>/source/<?=$logoSup?>" alt=""/></a><?php } ?></a></h1>
												</div>
												</div>
											</div>
											<div class="grid12-10">
                                                                                            <a class="menu_letras" href="#"><div style="line-height: 70px; float: left; font-weight: bold">INICIO</div></a>
                                                                                            <a class="menu_letras" href="#"><div style="line-height: 70px; float: left; margin-left: 20px; font-weight: bold">NOSOTROS</div></a>
                                                                                            <a class="menu_letras" href="#"><div style="line-height: 70px; float: left; margin-left: 20px; font-weight: bold">PRODUCTOS</div></a>
                                                                                            <a class="menu_letras" href="#"><div style="line-height: 70px; float: left; margin-left: 20px; font-weight: bold">BLOG</div></a>
                                                                                            <a class="menu_letras" href="#"><div style="line-height: 70px; float: left; margin-left: 20px; font-weight: bold">CONTACTO</div></a>
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