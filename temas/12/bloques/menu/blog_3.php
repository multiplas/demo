<li class="hidden-md">
                  <div class="ruby-grid ruby-grid-lined">
                      <?php $control = 0;
                      foreach ($blogMenu AS $entradaB){ 
                          $control++; 
                          if($control%3 == 0 || $control == 1){ ?>
                            <div class="ruby-row">
                      <?php } 
                                $text = $entradaB['contenido'];
				$text = strip_tags($text);
                                $descripcion = str_replace("\r\n", ' ', substr($text, 0, 20));
                                if (strlen($text) > 20)
                                    $descripcion .= '...';
                            ?>
                                <div class="ruby-col-4">
                                  <div class="ruby-col-5">
                                    <img src="<?=$entradaB['imagen'] != '' ? $draizp.'/imagenes/'.$entradaB['imagen'].'"' : 'http://placehold.it/200x200'?>" alt="<?=$entradaB['nombre']?>">
                                  </div>
                                  <div class="ruby-col-7">
                                    <span class="ruby-c-title"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><?=$entradaB['nombre']?></a></span>
                                    <span class="ruby-c-category"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><?=$descripcion?></a></span>
                                    <span class="ruby-c-date"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><?=date("d-m-Y", strtotime($entradaB['fecha']))?></a></span>
                                  </div>
                                </div>
                        <?php if($control%3 == 0){ ?>    
                            </div>
                        <?php } ?>  
                  <?php } ?>
                  </div>
                </li>