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
    
    #superflotante a{
        color: #333 !important;
        text-align: left !important;
        text-transform: initial !important;
        font-size: 16px !important;
        line-height: 16px !important;
        height: 16px !important;
        width: 170px !important;
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
        
        .no_grande{
            display: none;
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

<script type="text/javascript">
    (function($) {
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
    })(jQuery);
</script>
           

<div id="grupo-submenu"  style="width: 100%; -webkit-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);-moz-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4); min-height: 75px;">
    
	<div id="submenu" style="top: 50%; -ms-transform: translateY(-50%); -webkit-transform: translateY(-50%); transform: translateY(-50%); font-family: <?=$fuente1?>,sans-serif;">
		<ul>
			<li id="casita" class="divLogo2"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><i class="fa fa-home fa-lg"></i></a></li>
                        <?php if($logoMenu != ''){ ?><li id="logo_fijo" class="divLogo"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><img id="logo_fijo2" class="imagenMenu2" src="<?=$draizp?>/source/<?=$logoMenu?>" alt=""/></a></li>
                        <?php }else{ ?><li id="logo_fijo" class="divLogo"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><i class="fa fa-home fa-lg"></i></a></li><?php } ?>
			<?php
                $control = 0;
				foreach ($categorias AS $padre)
				{
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
                    $nombre = preg_replace('([,.])', '', $nombre);
                    $nombre = str_replace('--', '-', $nombre);
                    
                    if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  
                    
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
                                $nombre2 = str_replace('--', '-', $nombre2);
                                
								if ($hijo1['id'] == $bar)
									$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a> &gt; '.
									'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo1['id'].'/'.$nombre2.'/"'.(count($hijo1['categorias']) < 1 ? '' : '').'>'.$hijo1['nombre'].'</a>';
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
                                                    $nombre3 = str_replace('--', '-', $nombre3);
													if ($hijo2['id'] == $bar)
														$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo1['id'].'/'.$nombre2.'/">'.$hijo1['nombre'].'</a> &gt; '.
														'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo2['id'].'/'.$nombre3.'/"'.(count($hijo2['categorias']) < 1 ? '' : '').'>'.$hijo2['nombre'].'</a>';
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
                                                                                $nombre4 = str_replace('--', '-', $nombre4);
                                                                                
																				if ($hijo3['id'] == $bar)
																					$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo1['id'].'/'.$nombre2.'/">'.$hijo1['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo2['id'].'/'.$nombre3.'/">'.$hijo2['nombre'].'</a> &gt; '.
																					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo3['id'].'/'.$nombre4.'/"'.(count($hijo3['categorias']) < 1 ? '' : '').'>'.$hijo3['nombre'].'</a>';
																		?>
																				<a href="<?=$draizp?><?=$_SESSION['lenguaje']?>productos/<?=$hijo3['id']?>/<?=$nombre4?>"><?=$hijo3['nombre']?></a>
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
				}else if ($control == 10){ echo '<li onmouseover="mostrar();" onmouseout="ocultar();"><a href="#"><span style="width:15px;height:15px;background-image: url('.$draizp.'/source/th.png);margin-top:15px;"></span>&nbsp;Otros productos</a></li>'; $control++; 
                                
                                ?>    <div id="superflotante" onmouseover="mostrar();" onmouseout="ocultar();" class="bloque_submenu" style="margin-top: -16px !important; display:none; background-color: #ffffff; -webkit-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);-moz-box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);box-shadow: 0px 7px 11px 0px rgba(50, 50, 50, 0.4);">
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
						
                                                if(sizeof($ccp['categorias']) == 0){
                                                    echo '<li class="sm1"><a style="margin-top: 11px;" href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$ccp['id'].'">'.$titulocat.'</a>';
                                                    //$count1 = mysql_query("SELECT COUNT(id) AS c FROM bd_categorias WHERE idpadre=$ccp[id] GROUP BY idpadre",$dbi);
                                                    //$subcatnum = mysql_fetch_array($count1);
                                                    //$scn = $subcatnum['c'];
                                                    //$catsHija1 = mysql_query("SELECT * FROM bd_categorias WHERE idpadre=$ccp[id] ORDER BY categoria ASC LIMIT 5",$dbi);
                                                }else{
                                                    echo '<li onmouseover="mostrar2();" onmouseout="ocultar2();" class="sm1"><a style="margin-top: 11px;" href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$ccp['id'].'">'.$titulocat.'</a>';
                                                }
                        echo '</li>';
                        foreach ($ccp['categorias'] AS $cch){
                            if($cnt != 5){
                                echo '<div id="s2" onmouseover="mostrar2();" onmouseout="ocultar2();" class="bloque_submenu" style="display: none !important; margin-left: -5px;"><li class="sm1"><a style="color: #ff7c0a !important; margin-top: 11px;" href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$cch['id'].'">'.$cch["nombre"].'</a></li></div>';
                                $cnt++;
                            }
                        }
                        
                        if($cnt == 5){
                                echo '<div style="text-align: center; margin: 0px !important;"><a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$ccp['id'].'">ver todos</a></div>';
                        }
                        
						$cnt = 0;
						//if ($scn > 5) echo '<div style="text-align: center; margin: 0px !important;"><a href="cat.php?accion=cat&idcat1='.$ccp['id'].'">ver todos</a></div>';
						
						
                        }else{
                            $cntall++;
                        }
					}
				?>
			</div>
    <?php 
                                } 
                            }
                                
                                $control = 0;
                                foreach ($categoriasBlog AS $padre)
				{
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	
                    $nombre = str_replace('--', '-', $nombre);
                    $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">'.$Empresa['nblog'].'</a> ';
                    if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">'.$Empresa['nblog'].'</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$padre['id'].'"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  
                    
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
                                $nombre2 = str_replace('--', '-', $nombre2);
                                
								if ($hijo1['id'] == $bar)
									$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">'.$Empresa['nblog'].'</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/'.$padre['id'].'/">'.$padre['nombre'].'</a> &gt; '.
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
                                                    $nombre3 = str_replace('--', '-', $nombre3);
													if ($hijo2['id'] == $bar)
														$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">'.$Empresa['nblog'].'</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/">'.$padre['nombre'].'</a> &gt; '.
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
                                                                                $nombre4 = str_replace('--', '-', $nombre4);
                                                                                
																				if ($hijo3['id'] == $bar)
																					$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'blog">'.$Empresa['nblog'].'</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'entradas/">'.$padre['nombre'].'</a> &gt; '.
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
                                
                                
                                $control = 0;
                                
                                foreach ($categoriasGalerias AS $padre)
				{
                                     if($barpath == ''){
                                        $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeria">'.$Empresa['ngaleria'].'</a> ';
                                    }
                                    
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	
                    $nombre = str_replace('--', '-', $nombre);
                    
                    if ($padre['id'] == $bar){ $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeria">'.$Empresa['ngaleria'].'</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/'.$padre['id'].'"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  }
                    
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
                                $nombre2 = str_replace('--', '-', $nombre2);
                                
								if ($hijo1['id'] == $bar)
									$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeria">'.$Empresa['ngaleria'].'</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/'.$padre['id'].'/">'.$padre['nombre'].'</a> &gt; '.
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
                                                    $nombre3 = str_replace('--', '-', $nombre3);
													if ($hijo2['id'] == $bar)
														$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeria">'.$Empresa['ngaleria'].'</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/">'.$padre['nombre'].'</a> &gt; '.
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
                                                                                $nombre4 = str_replace('--', '-', $nombre4);
                                                                                
																				if ($hijo3['id'] == $bar)
																					$barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeria">'.$Empresa['ngaleria'].'</a> > <a href="'.$draizp.'/'.$_SESSION['lenguaje'].'galeriasecc/">'.$padre['nombre'].'</a> &gt; '.
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
			
            <script>
                function mostrar(){ 
                    document.getElementById("superflotante").style.display="block";
                }
                function ocultar(){
                    document.getElementById("superflotante").style.display="none";
                }
                function mostrar2(){ 
                    document.getElementById("s2").style.display="inline";
                }
                function ocultar2(){
                    document.getElementById("s2").style.display="none";
                }
            </script>
			<!--<li><a href="<?=$draizp?>/ofertas">Ofertas</a></li>-->
            <?php if($Empresa['blog'] == 1){ ?>
			     <li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>blog"><?=$Empresa['nblog']?></a></li>
            <?php } 
                if($Empresa['galeria'] == 1){
            ?>
                <li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>galeria"><?=$Empresa['ngaleria']?></a></li>
            <?php }  if($Empresa['preSoli'] == 1){
            ?>
                <li><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>presupuesto_cont">Presupuesto</a></li>
            <?php } ?>
			<!--<li><a href="<?=$draizp?>/contacto">Contacto</a></li>-->
		
                
                <li style="float: right;">
                    <?php
                    if(session_id() == '') {//Check if session started
                        session_start();
                    }
                    ?>
                   
                    <style>
                        .input-group:hover{
                            opacity: 1;
                            border: 0.5px solid;
                            border-color: #ffdddd;
                        }
                        
                        .input_busqueda{
                            background-color: transparent;
                            -webkit-transition: all .5s; 
                            -moz-transition: all .5s;
                            -o-transition: all .5s; 
                            transition: all .5s;
                            outline: none;
                            width: 20px;
                            margin-left: -20px;
                            z-index: 5;
                            color: transparent;
                            cursor: pointer;
                        }  
                        
                        @media (min-width:940px){
                            .input_busqueda:hover{
                                width: 150px;
                                padding-left: 10px;
                                color: #fff;
                                background-color: transparent;
                                margin-left: 0px;
                                cursor: text;
                            }
                        }
                        
                        @media (max-width:940px){
                            .input_busqueda:hover{
                                width: 100px;
                                padding-left: 10px;
                                color: #000;
                                background-color: transparent;
                                margin-left: 0px;
                                cursor: text;
                            }
                        }
                        
                    </style>
                    <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>" method="post">
                    
                    </form>
                </ul>
            
	</div>
    <style>
        select {
            background: #000000 no-repeat right;
            color: #a8cd3a;
            border: none;
            padding: 10px;
            margin: 0;
            width: 100%;
            -webkit-border-radius:0;
            -moz-border-radius:0;
            border-radius: 0;
        }
    </style>
    <div id="submenu-r">
        
        <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?><?=$_POST['buscar']?>" method="post">
            <div class="input-group no_grande" style="float: right; line-height: 50px;">
                        <input class="input_busqueda" name="buscar" class="form-control" value="" type="text">
			<span class="input-group-btn"><button type="submit" name="submit_search" class="btn btn-secondary" style="background-color: transparent;"><i class="fa fa-search  fa-lg"></i> </button></span>
                    </div>
                    </form>
                
        <a href="javascript: void(0);" id="submenu-op"><i class="fa fa-bars fa-lg" style="top: -10px;"></i>&nbsp;&nbsp;&nbsp;<img id="logo_fijo2" style="height: 40px; max-width: 200px; top: -4px;" src="<?=$draizp?>/source/<?=$logoMenu?>" alt=""/></a>   
		<ul id="despl">
			<li><a href="<?=$draizp?>/">Inicio</a></li>
			<?php
                        $contadorVM = 0;
				foreach ($categorias AS $padre)
				{
                                    if($contadorVM < 6){
                    $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
                    $nombre = str_replace('--', '-', $nombre);
			?>
				<li>
					<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$padre['id']?>/<?=$nombre?>/" class="submenu"><?=$padre['nombre']?></a>
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
                                $nombre2 = str_replace('--', '-', $nombre2);
					?>         
									<li class="sm1">
										<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$hijo1['id']?>/<?=$nombre2?>/"><?=$hijo1['nombre']?></a>
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
                                                    $nombre3 = str_replace('--', '-', $nombre3);
										?>
													<li class="sm2">
														<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$hijo2['id']?>/<?=$nombre3?>/"><?=$hijo2['nombre']?></a>
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
                                                                                $nombre4 = str_replace('--', '-', $nombre4);
																		?>
																				<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$hijo3['id']?>/<?=$nombre4?>/"><?=$hijo3['nombre']?></a>
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
                        $contadorVM++;
                                    }else{ 
                                        $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                                        $nombre = strtolower($nombre);
                                        $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
                                        $nombre = str_replace('--', '-', $nombre);
                    
                                        if($contadorVM == 6){ ?>
                                
                                <li><select id="otrosP" name="otrosP" style="float: left; top: 10px; margin-bottom: 20px;" onchange="location = this.value">
                                        <option value="">Otras Categorías</option>
                                        <?php } ?>
                                        <option value="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$padre['id']?>/<?=$nombre?>/"><?=$padre['nombre']?></option>
                                        <?php
                                        if (count($padre['categorias']) > 0 && $padre['categorias'] != null)
					{
                                            foreach ($padre['categorias'] AS $hijo1)
                                            {
                                                $nombre2 = utf8_encode(strtr(utf8_decode($hijo1['nombre']), utf8_decode($tofind), $replac));
                                                $nombre2 = strtolower($nombre2);
                                                $nombre2 = preg_replace('([^A-Za-z0-9])', '-', $nombre2);
                                                $nombre2 = str_replace('--', '-', $nombre2);
                                ?>
                                                <option value="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$hijo1['id']?>/<?=$nombre2?>/"><?=$padre['nombre']?> --> <?=$hijo1['nombre']?></option>
                                                <?php if (count($hijo1['categorias']) > 0 && $hijo1['categorias'] != null)
							{
												
                                                            foreach ($hijo1['categorias'] AS $hijo2)
                                                            {
                                                                $nombre3 = utf8_encode(strtr(utf8_decode($hijo2['nombre']), utf8_decode($tofind), $replac));
                                                                $nombre3 = strtolower($nombre3);
                                                                $nombre3 = preg_replace('([^A-Za-z0-9])', '-', $nombre3);
                                                                $nombre3 = str_replace('--', '-', $nombre3);
                                                                ?>
                                                <option value="<?=$draizp?>/<?=$_SESSION['lenguaje']?>productos/<?=$hijo2['id']?>/<?=$nombre3?>/"><?=$padre['nombre']?> --> <?=$hijo1['nombre']?> --> <?=$hijo2['nombre']?></option>
                                            <?php
                                                            }
                                                        }
                                            }
                                        }
                                        
                                        $contadorVM++;
                                        if($contadorVM == sizeof($categorias)){
                                            ?>
                                    </select>
                                </li>
                                        <?php
                                        }
                                        
                                    }
				}
			?>
			
			<?php if($Empresa['blog'] == 1){ ?>
			     <li><a href="<?=$draizp?>/blog"><?=$Empresa['nblog']?></a></li>
            <?php } 
                if($Empresa['galeria'] == 1){
            ?>
                <li><a href="<?=$draizp?>/galeria"><?=$Empresa['ngaleria']?></a></li>
            <?php } ?>
			<!--<li><a href="<?=$draizp?>/contacto">Contacto</a></li>-->
		</ul>
	</div>
</div>
