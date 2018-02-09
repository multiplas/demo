<li class="ruby-active-menu-item">
                  <div class="ruby-grid ruby-grid-lined">
                      <?php $control = 0;
                      foreach ($blogMenu AS $entradaB){ 
                          $control++; 
                          if($control%4 == 0 || $control == 1){ ?>
                            <div class="ruby-row">
                          <?php } ?>
                            <?php if($control < 5){ 
                                $text = $entradaB['contenido'];
				$text = strip_tags($text);
                                $descripcion = str_replace("\r\n", ' ', substr($text, 0, 50));
                                if (strlen($text) > 50)
                                    $descripcion .= '...';
                            ?>
                                <div class="ruby-col-3">
                                  <img src="<?=$entradaB['imagen'] != '' ? $draizp.'/imagenes/'.$entradaB['imagen'].'"' : 'http://placehold.it/190x110'?>" alt="<?=$entradaB['nombre']?>">
                                  <div class="ruby-c-inline">
                                    <span class="ruby-c-category"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><?=$entradaB['nombre']?></a></span>
                                    <span class="ruby-c-date"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><?=date("d-m-Y", strtotime($entradaB['fecha']))?></a></span>
                                  </div>
                                  <span class="ruby-c-title ruby-margin-10"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><?=$entradaB['nombre']?></a></span>
                                  <span class="ruby-c-content"><?=$descripcion?></span>
                                </div>
                            <?php } ?>
                    <?php if($control%4 == 0){ ?>    
                        </div>
                    <?php } ?>  
                    <?php } ?>
                  </div>
                </li>