    <!-- NORMALIZE.CSS -->
    <link href="<?=$draizp?>/temas/12/bloques/css/normalize.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link href="<?=$draizp?>/temas/12/bloques/css/font-awesome.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?=$draizp?>/temas/12/bloques/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- ruby Main -->
    <link href="<?=$draizp?>/temas/12/bloques/css/ruby-main.css" rel="stylesheet">
    <!-- ruby Vertical -->
    <link href="<?=$draizp?>/temas/12/bloques/css/ruby-vertical.css" rel="stylesheet">
    <!-- ruby Demo - FOR DEMO SHOWCASE ONLY! -->
    <link href="<?=$draizp?>/temas/12/bloques/css/ruby-demo.css" rel="stylesheet">
    <!-- ruby Vertical -->
    <link href="<?=$draizp?>/temas/12/bloques/css/ruby-transitions.css" rel="stylesheet" id="ruby-transitions">
    <!-- ruby Responsive -->
    <link href="<?=$draizp?>/temas/12/bloques/css/ruby-responsive.css" rel="stylesheet">
    <!-- font Open-Sans -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,700' rel='stylesheet' type='text/css'>
    
    <!-- tema color -->
    <link rel="stylesheet" type="text/css" href="<?=$draizp?>/temas/12/bloques/css/ruby-theme-<?=$MM_colores?>.css">
    <style>
    /* FOR THIS DEMO ONLY, HIDE VERTICAL MENU ON MOBILE */
    @media(max-width:767px){
      div.ruby-wrapper.ruby-vertical {
        display: none;
      }
    }
    
    <?php if($fCabecera != ''){ ?>
        div.ruby-menu-demo-header-bg {
            background: url(<?=$draizp?>/source/<?=$fCabecera?>);
            background-repeat: no-repeat;;
        }
    <?php } ?>
    </style>

    <!-- ####################### -->
    <!--   START: RUBY HEADER    -->
    <div class="ruby-menu-demo-header<?=$MM_fondo == 1 ? ' ruby-menu-demo-header-bg' : ''?>">
      <div class="ruby-menu-demo-description">
        <?php if($logoSup != ''){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><img src="<?=$draizp?>/source/<?=$logoSup?>"></a><?php } ?>
        <div class="ruby-menu-demo-download">
          <!--Lado derecho de la cabecera encima de menú -->
        </div>
      </div>

      <!-- ########################### -->
      <!-- START: RUBY HORIZONTAL MENU -->
      <div class="ruby-wrapper<?=$MM_anchoMax == 1 ? ' ruby-menu-full-width' : ''?>">
        <button class="c-hamburger c-hamburger--htx visible-xs">
          <span>toggle menu</span>
        </button>
        <ul class="ruby-menu<?=$MM_divisiones == 1 ? ' ruby-menu-dividers' : ''?>">
          <li <?=$bar == -1 ? 'class="ruby-active-menu-item"':''?>><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><i class="fa fa-home" aria-hidden="true" style="font-size: 29px;top: 5px;"></i></a></li>
          
          <?php if($MM_despliegue == 0){ 
                include_once($draiz.'/temas/12/bloques/menu/classic.php');
           } ?>
          
          
          <?php if($MM_despliegue == 5 || $MM_despliegue == 6 || $MM_despliegue == 7 || $MM_despliegue == 8 || $MM_despliegue == 9){ ?>
          <!-- Menu Shop -->
                <?php if($MM_despliegue == 5){
                    include_once($draiz.'/temas/12/bloques/menu/shop_clothings.php');
                } ?>
                
                <?php if($MM_despliegue == 6){
                    include_once($draiz.'/temas/12/bloques/menu/shop_outerwear.php');
                } ?>
                
                <?php if($MM_despliegue == 7){
                    include_once($draiz.'/temas/12/bloques/menu/shop_bags_shoes.php');
                } ?>
                
                            
                <?php if($MM_despliegue == 8){ 
                    include_once($draiz.'/temas/12/bloques/menu/shop_accessoriest.php');
                } ?>
                
                            
                <?php if($MM_despliegue == 9){ 
                    include_once($draiz.'/temas/12/bloques/menu/shop_collections.php');
                } ?>
                
             
          <?php } ?> 
          
          
          <!-- Blog -->
          <?php 
            $control = 0;
                                foreach ($categoriasBlog AS $padre)
				{
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	
                    if($barpath == '') $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">Blog</a> ';
                    if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$padre['id'].'"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  
                    
                    if($control < 10){
                        $control++;
                    
			?>
				
					<?php
						if (count($padre['categorias']) > 0 && $padre['categorias'] != null)
						{
							?> <?php
							foreach ($padre['categorias'] AS $hijo1)
							{
                                $nombre2 = utf8_encode(strtr(utf8_decode($hijo1['nombre']), utf8_decode($tofind), $replac));
                                $nombre2 = strtolower($nombre2);
                                $nombre2 = preg_replace('([^A-Za-z0-9])', '-', $nombre2);	   
                                
								if ($hijo1['id'] == $bar)
									$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$padre['id'].'/">'.$padre['nombre'].'</a> &gt; '.
									'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo1['id'].'/"'.(count($hijo1['categorias']) < 1 ? '' : '').'>'.$hijo1['nombre'].'</a>';
					?>
									
										<?php
											if (count($hijo1['categorias']) > 0 && $hijo1['categorias'] != null)
											{
												?> <?php
												foreach ($hijo1['categorias'] AS $hijo2)
												{
                                                    $nombre3 = utf8_encode(strtr(utf8_decode($hijo2['nombre']), utf8_decode($tofind), $replac));
                                                    $nombre3 = strtolower($nombre3);
                                                    $nombre3 = preg_replace('([^A-Za-z0-9])', '-', $nombre3);	   
													if ($hijo2['id'] == $bar)
														$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/">'.$padre['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo1['id'].'/">'.$hijo1['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo2['id'].'/"'.(count($hijo2['categorias']) < 1 ? '' : '').'>'.$hijo2['nombre'].'</a>';
										?>
														<?php
															if (count($hijo2['categorias']) > 0 && $hijo2['categorias'] != null)
															{
														?>
																
																		<span><?=$hijo2['nombre']?></span>
																		<?php
																			foreach ($hijo2['categorias'] AS $hijo3)
																			{
                                                                                $nombre4 = utf8_encode(strtr(utf8_decode($hijo3['nombre']), utf8_decode($tofind), $replac));
                                                                                $nombre4 = strtolower($nombre4);
                                                                                $nombre4 = preg_replace('([^A-Za-z0-9])', '-', $nombre4);
                                                                                
																				if ($hijo3['id'] == $bar)
																					$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/">'.$padre['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo1['id'].'/">'.$hijo1['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo2['id'].'/">'.$hijo2['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo3['id'].'/"'.(count($hijo3['categorias']) < 1 ? '' : '').'>'.$hijo3['nombre'].'</a>';
																		?>
																				
																		<?php
																			}
																		?>
																	
																
														<?php
															}
													
										
												}
												?> <?php
											}
										?>
									
					<?php
							}
							?> <?php
						}
					?>
				
			<?php
				}else if ($control == 10){ echo '<li onmouseover="mostrar();" onmouseout="ocultar();" style="font-weight:bold;"><a href="#"><span style="width:15px;height:15px;background-image: url('.$draizp.'/source/th.png);margin-top:15px;"></span>&nbsp;Otros productos</a></li>'; $control++; } }
          ?>
          <?php if($Empresa['blog'] == 1){ ?>
            <?php if($MM_blog == 0 || $MM_blog == 1 || $MM_blog == 2 || $MM_blog == 3){ 
              $control = 0;
                                foreach ($categoriasBlog AS $padre)
				{
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	
                    $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">Blog</a> ';
                    if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$padre['id'].'"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  
                    
                    if($control < 10){
                        $control++;
                    
			?>
				
					<?php
						if (count($padre['categorias']) > 0 && $padre['categorias'] != null)
						{
							?> <?php
							foreach ($padre['categorias'] AS $hijo1)
							{
                                $nombre2 = utf8_encode(strtr(utf8_decode($hijo1['nombre']), utf8_decode($tofind), $replac));
                                $nombre2 = strtolower($nombre2);
                                $nombre2 = preg_replace('([^A-Za-z0-9])', '-', $nombre2);	   
                                
								if ($hijo1['id'] == $bar)
									$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$padre['id'].'/">'.$padre['nombre'].'</a> &gt; '.
									'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo1['id'].'/"'.(count($hijo1['categorias']) < 1 ? '' : '').'>'.$hijo1['nombre'].'</a>';
					?>
									
										<?php
											if (count($hijo1['categorias']) > 0 && $hijo1['categorias'] != null)
											{
												?> <?php
												foreach ($hijo1['categorias'] AS $hijo2)
												{
                                                    $nombre3 = utf8_encode(strtr(utf8_decode($hijo2['nombre']), utf8_decode($tofind), $replac));
                                                    $nombre3 = strtolower($nombre3);
                                                    $nombre3 = preg_replace('([^A-Za-z0-9])', '-', $nombre3);	   
													if ($hijo2['id'] == $bar)
														$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/">'.$padre['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo1['id'].'/">'.$hijo1['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo2['id'].'/"'.(count($hijo2['categorias']) < 1 ? '' : '').'>'.$hijo2['nombre'].'</a>';
										?>
														<?php
															if (count($hijo2['categorias']) > 0 && $hijo2['categorias'] != null)
															{
														?>
																
																		<span><?=$hijo2['nombre']?></span>
																		<?php
																			foreach ($hijo2['categorias'] AS $hijo3)
																			{
                                                                                $nombre4 = utf8_encode(strtr(utf8_decode($hijo3['nombre']), utf8_decode($tofind), $replac));
                                                                                $nombre4 = strtolower($nombre4);
                                                                                $nombre4 = preg_replace('([^A-Za-z0-9])', '-', $nombre4);
                                                                                
																				if ($hijo3['id'] == $bar)
																					$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/">'.$padre['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo1['id'].'/">'.$hijo1['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo2['id'].'/">'.$hijo2['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$hijo3['id'].'/"'.(count($hijo3['categorias']) < 1 ? '' : '').'>'.$hijo3['nombre'].'</a>';
																		?>
																				
																		<?php
																			}
																		?>
																	
																
														<?php
															}
													
										
												}
												?> <?php
											}
										?>
									
					<?php
							}
							?> <?php
						}
					?>
				
			<?php
				}else if ($control == 10){ echo '<li onmouseover="mostrar();" onmouseout="ocultar();" style="font-weight:bold;"><a href="#"><span style="width:15px;height:15px;background-image: url('.$draizp.'/source/th.png);margin-top:15px;"></span>&nbsp;Otros productos</a></li>'; $control++; } }
           ?>
          <!-- Menu Blog -->
          <li class="ruby-menu-mega-blog<?=$bar == 'B' ? ' ruby-active-menu-item':''?>"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>blog">Blog</a>
            <div>
              <ul>
                <?php if($MM_blog == 0){ 
                  include_once($draiz.'/temas/12/bloques/menu/blog_4.php');
                } ?>

                <?php if($MM_blog == 1){
                  include_once($draiz.'/temas/12/bloques/menu/blog_3.php');
                } ?>

                <?php if($MM_blog == 2){
                  include_once($draiz.'/temas/12/bloques/menu/blog_2.php');
                } ?>

                <?php if($MM_blog == 3){
                  include_once($draiz.'/temas/12/bloques/menu/blog_1.php');
                } ?>                
              </ul>
            </div>
          </li>
          <?php } ?>   
          <?php } ?>
          
          
          <!-- Galería -->
          <?php
            $control = 0;
            
            foreach ($categoriasGalerias AS $padre)
				{ 
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	
                    if($barpath == '') $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeria">Galería</a> ';
                    if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeria">Galería</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/'.$padre['id'].'"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  
                    
                    if($control < 10){
                        $control++;
                    
			?>
				
					<?php
						if (count($padre['categorias']) > 0 && $padre['categorias'] != null)
						{
							?> <?php
							foreach ($padre['categorias'] AS $hijo1)
							{
                                $nombre2 = utf8_encode(strtr(utf8_decode($hijo1['nombre']), utf8_decode($tofind), $replac));
                                $nombre2 = strtolower($nombre2);
                                $nombre2 = preg_replace('([^A-Za-z0-9])', '-', $nombre2);	   
                                
								if ($hijo1['id'] == $bar)
									$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeria">Galería</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/'.$padre['id'].'/">'.$padre['nombre'].'</a> &gt; '.
									'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/'.$hijo1['id'].'/"'.(count($hijo1['categorias']) < 1 ? '' : '').'>'.$hijo1['nombre'].'</a>';
					?>
									
										<?php
											if (count($hijo1['categorias']) > 0 && $hijo1['categorias'] != null)
											{
												?> <?php
												foreach ($hijo1['categorias'] AS $hijo2)
												{
                                                    $nombre3 = utf8_encode(strtr(utf8_decode($hijo2['nombre']), utf8_decode($tofind), $replac));
                                                    $nombre3 = strtolower($nombre3);
                                                    $nombre3 = preg_replace('([^A-Za-z0-9])', '-', $nombre3);	   
													if ($hijo2['id'] == $bar)
														$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeria">Galería</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/">'.$padre['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/'.$hijo1['id'].'/">'.$hijo1['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/'.$hijo2['id'].'/"'.(count($hijo2['categorias']) < 1 ? '' : '').'>'.$hijo2['nombre'].'</a>';
										?>
														<?php
															if (count($hijo2['categorias']) > 0 && $hijo2['categorias'] != null)
															{
														?>
																
																		<span><?=$hijo2['nombre']?></span>
																		<?php
																			foreach ($hijo2['categorias'] AS $hijo3)
																			{
                                                                                $nombre4 = utf8_encode(strtr(utf8_decode($hijo3['nombre']), utf8_decode($tofind), $replac));
                                                                                $nombre4 = strtolower($nombre4);
                                                                                $nombre4 = preg_replace('([^A-Za-z0-9])', '-', $nombre4);
                                                                                
																				if ($hijo3['id'] == $bar)
																					$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeria">Galería</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/">'.$padre['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/'.$hijo1['id'].'/">'.$hijo1['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/'.$hijo2['id'].'/">'.$hijo2['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/'.$hijo3['id'].'/"'.(count($hijo3['categorias']) < 1 ? '' : '').'>'.$hijo3['nombre'].'</a>';
																		?>
																				
																		<?php
																			}
																		?>
																	
																
														<?php
															}
													
										
												}
												?> <?php
											}
										?>
									
					<?php
							}
							?> <?php
						}
					?>
				
			<?php
				}else if ($control == 10){ echo '<li onmouseover="mostrar();" onmouseout="ocultar();" style="font-weight:bold;"><a href="#"><span style="width:15px;height:15px;background-image: url('.$draizp.'/source/th.png);margin-top:15px;"></span>&nbsp;Otros productos</a></li>'; $control++; } }
                        ?>
            <?php 
                if($Empresa['galeria'] == 1){
            ?>
                    <li <?=$bar == 'G' ? 'class="ruby-active-menu-item"':''?>><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>galeria">Galería</a></li>
            <?php } ?>                                                                                                                                      
                                                                                                                                                
          
          <!-- iconos redes -->
          <?php if($Empresa['lk'] != ''){ ?><li class="ruby-menu-right ruby-menu-social"><a target="_blank" href="<?=$Empresa['lk']?>"><i class="fa fa-linkedin" aria-hidden="true"></i><span>LinkedIn</span></a></li><?php } ?>
          
          <?php if($Empresa['yt'] != ''){ ?><li class="ruby-menu-right ruby-menu-social"><a target="_blank" href="<?=$Empresa['yt']?>"><i class="fa fa-youtube" aria-hidden="true"></i><span>YouTube</span></a></li><?php } ?>
          
          <?php if($Empresa['in'] != ''){ ?><li class="ruby-menu-right ruby-menu-social"><a target="_blank" href="<?=$Empresa['in']?>"><i class="fa fa-instagram" aria-hidden="true"></i><span>Instagram</span></a></li><?php } ?>
          
          <?php if($Empresa['pt'] != ''){ ?><li class="ruby-menu-right ruby-menu-social"><a target="_blank" href="<?=$Empresa['pt']?>"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span>Pinterest</span></a></li><?php } ?>
          
          <?php if($Empresa['gp'] != ''){ ?><li class="ruby-menu-right ruby-menu-social"><a target="_blank" href="<?=$Empresa['gp']?>"><i class="fa fa-google-plus" aria-hidden="true"></i><span>Google+</span></a></li><?php } ?>
          
          <?php if($Empresa['tw'] != ''){ ?><li class="ruby-menu-right ruby-menu-social"><a target="_blank" href="<?=$Empresa['tw']?>"><i class="fa fa-twitter" aria-hidden="true"></i><span>Twitter</span></a></li><?php } ?>
          
          <?php if($Empresa['fb'] != ''){ ?><li class="ruby-menu-right ruby-menu-social"><a target="_blank" href="<?=$Empresa['fb']?>"><i class="fa fa-facebook" aria-hidden="true"></i><span>Facebook</span></a></li><?php } ?>

          <!-- Buscador -->
          <li class="ruby-menu-right ruby-menu-social ruby-menu-search"><a href="#"><i class="fa fa-search" aria-hidden="true"></i><span><input type="text" name="search" placeholder="Buscar..."></span></a></li>

        </ul>
      </div>
      <!-- END:   RUBY HORIZONTAL MENU -->
      <!-- ########################### -->

    </div>
    <!--    END:   RUBY HEADER     -->
    <!-- ######################### -->

    <!-- JQUERY -->
    <!-- <script src="<?=$draizp?>/temas/12/bloques/js/jquery-3.1.0.min.js"></script> -->

    <!-- RUBY MAIN JAVASCRIPT -->
    <script src="<?=$draizp?>/temas/12/bloques/js/ruby-main.js"></script>

    <!-- RUBY DEMO JAVASCRIPT: FOR DEMO SHOWCASE ONLY! RUBY DEMO JAVASCRIPT IS NOT SUPPORTED! -->
    <script src="<?=$draizp?>/temas/12/bloques/js/ruby-demo.js"></script>

