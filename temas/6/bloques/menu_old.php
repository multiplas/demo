<style>
    .fa-lg{
        vertical-align: 0% !important;
    }
    #top{
        background-color: <?=$colores['barra_sup']?> !important;
    }
    #grupo-submenu #submenu ul li:hover{
        background-color: <?=$colores['barra_sup']?>;
        transition: all 1s ease 0s;
    }    
    #grupo-submenu #submenu ul li {
        font-size: 16px;
    }
    #grupo-submenu #submenu-r {
        background: <?=$colores['menu']?> none repeat scroll 0 0 !important;
        color: <?=$colores['menu_letra']?>;
    }
    #grupo-submenu #submenu-r #submenu-op {
        color: white;
        font-weight: normal;
        margin-top: 17px;
    }
    #grupo-submenu #submenu ul li ul li {
        transition: all 0.5s ease-in 0s;
    }
    
    #posicion-bar div a {
        color: #000;
        text-decoration: none;
    }
    #grupo-submenu {
        background: <?=$colores['menu']?> none repeat scroll 0 0 !important;
    }
    #grupo-submenu #submenu ul li ul li {
        line-height: 100% !important;
    }
    #grupo-submenu #submenu ul li ul li:hover {
        line-height: 100% !important;
    }
    
    #grupo-submenu #submenu ul li ul li a {
        margin-top: -9px;
        top: 50%;
    } 
    
    @media (min-width:940px){
        .imagenMenu{
            visibility: hidden; height:35px; margin-top: 0px;
        }
        .imagenMenu2{
            visibility: visible; height:35px; margin-top: 0px;
        }
        .divLogo{
            display: none !important;
        }
        .divLogo2{
            display: inline !important;
        }
    }
    
    @media (max-width:940px){
        .divLogo{
            display: none !important;
        }
        .divLogo2{
            display: none !important;
        }
        #grupo-submenu{
            top: 0px;
            width: 100%;
        }
    }
</style>

<script>
            $(document).on("scroll", function(){
                var desplazamientoActual = $(document).scrollTop();
                if(desplazamientoActual >= 200){
                    $('#casita').removeClass('divLogo2');
                    $('#casita').addClass('divLogo');
                    $('#logo_fijo').removeClass('divLogo');
                    $('#logo_fijo').addClass('divLogo2');
                }else{
                    $('#logo_fijo').removeClass('divLogo2');
                    $('#logo_fijo').addClass('divLogo');
                    $('#casita').removeClass('divLogo');
                    $('#casita').addClass('divLogo2');
                }
            });
</script>

<div id="grupo-submenu"  style="width: 100%; -webkit-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);-moz-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4); min-height: 75px;">
    
	<div id="submenu" style="top: 50%; -ms-transform: translateY(-50%); -webkit-transform: translateY(-50%); transform: translateY(-50%); font-family: <?=$fuente1?>,sans-serif;">
		<ul>
			<li id="casita" class="divLogo2"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/"><i class="fa fa-home fa-lg"></i></a></li>
                        <?php if($logoMenu != ''){ ?><li id="logo_fijo" class="divLogo"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><img id="logo_fijo2" class="imagenMenu2" src="<?=$draizp?>/source/<?=$logoMenu?>" alt=""/></a></li>
                        <?php }else{ ?><li id="logo_fijo" class="divLogo"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><i class="fa fa-home fa-lg"></i></a></li><?php } ?>
			<?php
                $control = 0;
				foreach ($categorias AS $padre)
				{
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
                    
                    if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$padre['id'].'/'.$nombre.'/"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  
                    
                    if($control < 10){
                        $control++;
                    
			?>
				<li>
                                    <?php if($padre['url'] == ''){ ?>
                                        <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$padre['id']?>/<?=$nombre?>/" class="submenu"><?=$padre['nombre']?></a>
                                    <?php }else{ ?>
                                        <a href="<?=$padre['url']?>" target="_blank" class="submenu"><?=$padre['nombre']?></a>
                                    <?php } ?>  
					<?php
						if (count($padre['categorias']) > 0 && $padre['categorias'] != null)
						{
							?> <ul class="bloque_submenu" style="-webkit-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);-moz-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);"> <?php
							foreach ($padre['categorias'] AS $hijo1)
							{
                                $nombre2 = utf8_encode(strtr(utf8_decode($hijo1['nombre']), utf8_decode($tofind), $replac));
                                $nombre2 = strtolower($nombre2);
                                $nombre2 = preg_replace('([^A-Za-z0-9])', '-', $nombre2);	   
                                
								if ($hijo1['id'] == $bar)
									$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a> &gt; '.
									'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$hijo1['id'].'/'.$nombre2.'/"'.(count($hijo1['categorias']) < 1 ? '' : '').'>'.$hijo1['nombre'].'</a>';
					?>
									<li class="sm1">
										<?php if($hijo1['url'] == ''){ ?>
                                                                                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$hijo1['id']?>/<?=$nombre2?>/"><?=$hijo1['nombre']?></a>
                                                                                <?php }else{ ?>
                                                                                    <a href="<?=$hijo1['url']?>" target="_blank" class="submenu"><?=$hijo1['nombre']?></a>
                                                                                <?php } ?>   
										<?php
											if (count($hijo1['categorias']) > 0 && $hijo1['categorias'] != null)
											{
												?> <ul> <?php
												foreach ($hijo1['categorias'] AS $hijo2)
												{
                                                    $nombre3 = utf8_encode(strtr(utf8_decode($hijo2['nombre']), utf8_decode($tofind), $replac));
                                                    $nombre3 = strtolower($nombre3);
                                                    $nombre3 = preg_replace('([^A-Za-z0-9])', '-', $nombre3);	   
													if ($hijo2['id'] == $bar)
														$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$hijo1['id'].'/'.$nombre2.'/">'.$hijo1['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$hijo2['id'].'/'.$nombre3.'/"'.(count($hijo2['categorias']) < 1 ? '' : '').'>'.$hijo2['nombre'].'</a>';
										?>
													<li class="sm2">
														<?php if($hijo2['url'] == ''){ ?>
                                                                                                                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$hijo2['id']?>/<?=$nombre3?>/"><?=$hijo2['nombre']?></a>
                                                                                                                <?php }else{ ?>
                                                                                                                    <a href="<?=$hijo2['url']?>" target="_blank" class="submenu"><?=$hijo2['nombre']?></a>
                                                                                                                <?php } ?>  
														<?php
															if (count($hijo2['categorias']) > 0 && $hijo2['categorias'] != null)
															{
														?>
																<ul>
																	<li>
																		<span><?=$hijo2['nombre']?></span>
																		<?php
																			foreach ($hijo2['categorias'] AS $hijo3)
																			{
                                                                                $nombre4 = utf8_encode(strtr(utf8_decode($hijo3['nombre']), utf8_decode($tofind), $replac));
                                                                                $nombre4 = strtolower($nombre4);
                                                                                $nombre4 = preg_replace('([^A-Za-z0-9])', '-', $nombre4);
                                                                                
																				if ($hijo3['id'] == $bar)
																					$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$hijo1['id'].'/'.$nombre2.'/">'.$hijo1['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$hijo2['id'].'/'.$nombre3.'/">'.$hijo2['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$hijo3['id'].'/'.$nombre4.'/"'.(count($hijo3['categorias']) < 1 ? '' : '').'>'.$hijo3['nombre'].'</a>';
																		?>
																				<a href="<?=$draizp?><?=$_SESSION['lenguaje']?>/productos/<?=$hijo3['id']?>/<?=$nombre4?>"><?=$hijo3['nombre']?></a>
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
				}else if ($control == 10){ echo '<li onmouseover="mostrar();" onmouseout="ocultar();" style="font-weight:bold;"><a href="#"><span style="width:15px;height:15px;background-image: url('.$draizp.'/source/th.png);margin-top:15px;"></span>&nbsp;Otros productos</a></li>'; $control++; } }
                                
                                $control = 0;
                                foreach ($categoriasBlog AS $padre)
				{
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	
                    $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/blog">Blog</a> ';
                    if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/entradas/'.$padre['id'].'"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  
                    
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
									$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/entradas/'.$padre['id'].'/">'.$padre['nombre'].'</a> &gt; '.
									'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/entradas/'.$hijo1['id'].'/"'.(count($hijo1['categorias']) < 1 ? '' : '').'>'.$hijo1['nombre'].'</a>';
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
														$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/entradas/">'.$padre['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/entradas/'.$hijo1['id'].'/">'.$hijo1['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/entradas/'.$hijo2['id'].'/"'.(count($hijo2['categorias']) < 1 ? '' : '').'>'.$hijo2['nombre'].'</a>';
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
																					$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/blog">Blog</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/entradas/">'.$padre['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/entradas/'.$hijo1['id'].'/">'.$hijo1['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/entradas/'.$hijo2['id'].'/">'.$hijo2['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/entradas/'.$hijo3['id'].'/"'.(count($hijo3['categorias']) < 1 ? '' : '').'>'.$hijo3['nombre'].'</a>';
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
                                
                                
                                $control = 0;
                                foreach ($categoriasGalerias AS $padre)
				{
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	
                    $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeria">Galería</a> ';
                    if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeria">Galería</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeriasecc/'.$padre['id'].'"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  
                    
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
									$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeria">Galería</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeriasecc/'.$padre['id'].'/">'.$padre['nombre'].'</a> &gt; '.
									'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeriasecc/'.$hijo1['id'].'/"'.(count($hijo1['categorias']) < 1 ? '' : '').'>'.$hijo1['nombre'].'</a>';
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
														$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeria">Galería</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeriasecc/">'.$padre['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeriasecc/'.$hijo1['id'].'/">'.$hijo1['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeriasecc/'.$hijo2['id'].'/"'.(count($hijo2['categorias']) < 1 ? '' : '').'>'.$hijo2['nombre'].'</a>';
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
																					$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeria">Galería</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeriasecc/">'.$padre['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeriasecc/'.$hijo1['id'].'/">'.$hijo1['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeriasecc/'.$hijo2['id'].'/">'.$hijo2['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/galeriasecc/'.$hijo3['id'].'/"'.(count($hijo3['categorias']) < 1 ? '' : '').'>'.$hijo3['nombre'].'</a>';
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
			
            <script>
                function mostrar(){ 
                    document.getElementById("superflotante").style.display="block";
                }
                function ocultar(){
                    document.getElementById("superflotante").style.display="none";
                }
            </script>
			<!--<li><a href="<?=$draizp?>/ofertas">Ofertas</a></li>-->
            <?php if($Empresa['blog'] == 1){ ?>
			     <li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/blog">Blog</a></li>
            <?php } 
                if($Empresa['galeria'] == 1){
            ?>
                <li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/galeria">Galería</a></li>
            <?php } ?>
			<!--<li><a href="<?=$draizp?>/contacto">Contacto</a></li>-->
		</ul>
	</div>
    
    <div id="superflotante" onmouseover="mostrar();" onmouseout="ocultar();">
				<?php
                    $cnt = 0;
                    $cntall = 0;
					//$catsPadre1 = mysql_query("SELECT * FROM bd_categorias WHERE idpadre=0 ORDER BY categoria ASC",$dbi);
					foreach($categorias AS $ccp)
					{
                        if($cntall >= 10){
						if (strlen($ccp["nombre"]) <= 20)
							$titulocat = mb_strtoupper($ccp["nombre"], 'UTF-8');
						else
							$titulocat = mb_strtoupper(substr($ccp["nombre"], 0, 20), 'UTF-8').'...';
						
						echo '<div class="catemenudiv"><span><a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$ccp['id'].'">'.$titulocat.'</a></span>';
						//$count1 = mysql_query("SELECT COUNT(id) AS c FROM bd_categorias WHERE idpadre=$ccp[id] GROUP BY idpadre",$dbi);
						//$subcatnum = mysql_fetch_array($count1);
						//$scn = $subcatnum['c'];
						//$catsHija1 = mysql_query("SELECT * FROM bd_categorias WHERE idpadre=$ccp[id] ORDER BY categoria ASC LIMIT 5",$dbi);
                        
                        foreach ($ccp['categorias'] AS $cch){
                            if($cnt != 5){
                                echo '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$cch['id'].'">'.$cch["nombre"].'</a><br />';
                                $cnt++;
                            }
                        }
                        
                        if($cnt == 5){
                                echo '<div style="text-align: center; margin: 0px !important;"><a href="'.$draizp.'/'.$_SESSION['lenguaje'].'/productos/'.$ccp['id'].'">ver todos</a></div>';
                        }
                        
						$cnt = 0;
						//if ($scn > 5) echo '<div style="text-align: center; margin: 0px !important;"><a href="cat.php?accion=cat&idcat1='.$ccp['id'].'">ver todos</a></div>';
						
						echo '</div>';
                        }else{
                            $cntall++;
                        }
					}
				?>
			</div>

    <div id="submenu-r">
                
        <a href="javascript: void(0);" id="submenu-op"><i class="fa fa-bars fa-lg" style="top: -10px;"></i>&nbsp;&nbsp;&nbsp;<img id="logo_fijo2" style="height: 40px; max-width: 200px; top: -4px;" src="<?=$draizp?>/source/<?=$logoMenu?>" alt=""/></a>
		<ul id="despl">
			<li><a href="<?=$draizp?>/">Inicio</a></li>
			<?php
				foreach ($categorias AS $padre)
				{
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	
			?>
				<li>
					<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/productos/<?=$padre['id']?>/<?=$nombre?>/" class="submenu"><?=$padre['nombre']?></a>
					<?php
						if (count($padre['categorias']) > 0 && $padre['categorias'] != null)
						{
							?> <span class="submenu-op">+</span>
							<ul class="bloque_submenu"> <?php
							foreach ($padre['categorias'] AS $hijo1)
							{
                                $nombre2 = utf8_encode(strtr(utf8_decode($hijo1['nombre']), utf8_decode($tofind), $replac));
                                $nombre2 = strtolower($nombre2);
                                $nombre2 = preg_replace('([^A-Za-z0-9])', '-', $nombre2);	
					?>         
									<li class="sm1">
										<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/productos/<?=$hijo1['id']?>/<?=$nombre2?>/"><?=$hijo1['nombre']?></a>
										<?php
											if (count($hijo1['categorias']) > 0 && $hijo1['categorias'] != null)
											{
												?> <span class="submenu-op">+</span>
												<ul> <?php
												foreach ($hijo1['categorias'] AS $hijo2)
												{
                                                    $nombre3 = utf8_encode(strtr(utf8_decode($hijo2['nombre']), utf8_decode($tofind), $replac));
                                                    $nombre3 = strtolower($nombre3);
                                                    $nombre3 = preg_replace('([^A-Za-z0-9])', '-', $nombre3);	
										?>
													<li class="sm2">
														<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/productos/<?=$hijo2['id']?>/<?=$nombre3?>/"><?=$hijo2['nombre']?></a>
														<?php
															if (count($hijo2['categorias']) > 0 && $hijo2['categorias'] != null)
															{
														?>
																<ul>
																	<li>
																		<span><?=$hijo2['nombre']?></span>
																		<?php
																			foreach ($hijo2['categorias'] AS $hijo3)
																			{
                                                                                $nombre4 = utf8_encode(strtr(utf8_decode($hijo3['nombre']), utf8_decode($tofind), $replac));
                                                                                $nombre4 = strtolower($nombre4);
                                                                                $nombre4 = preg_replace('([^A-Za-z0-9])', '-', $nombre4);	
																		?>
																				<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/productos/<?=$hijo3['id']?>/<?=$nombre4?>/"><?=$hijo3['nombre']?></a>
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
			<!--<li><a href="<?=$draizp?>/allpacks">Packs</a></li>-->
			<!--<li><a href="<?=$draizp?>/ofertas">Ofertas</a></li>-->
			<?php if($Empresa['blog'] == 1){ ?>
			     <li><a href="<?=$draizp?>/blog">Blog</a></li>
            <?php } 
                if($Empresa['galeria'] == 1){
            ?>
                <li><a href="<?=$draizp?>/galeria">Galería</a></li>
            <?php } ?>
			<!--<li><a href="<?=$draizp?>/contacto">Contacto</a></li>-->
		</ul>
	</div>
</div>
