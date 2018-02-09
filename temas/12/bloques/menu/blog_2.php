<li>
                  <div class="ruby-grid ruby-grid-lined">
                    <?php $control = 0;
                      foreach ($blogMenu AS $entradaB){ 
                          if($control%2 == 0){ ?>
                            <div class="ruby-row">
                    <?php } 
                        if($control < 8){ ?>
                            <div class="ruby-col-6">
                              <div class="ruby-col-4">
                                <img src="<?=$entradaB['imagen'] != '' ? $draizp.'/imagenes/'.$entradaB['imagen'].'"' : 'http://placehold.it/175x140'?>" alt="<?=$entradaB['nombre']?>">
                              </div>
                              <div class="ruby-col-8">
                                <span class="ruby-c-title"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><?=$entradaB['nombre']?></a></span>
                                <div class="ruby-c-inline">
                                  <span class="ruby-c-category"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><i class="fa fa-tag" aria-hidden="true"></i> <?=$entradaB['nombre']?></a></span>
                                  <span class="ruby-c-date"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><i class="fa fa-calendar" aria-hidden="true"></i> <?=date("d-m-Y", strtotime($entradaB['fecha']))?></a></span>
                                </div>
                              </div>
                            </div>
                        <?php } ?>
                     <?php if($control%2 == 0 && $control != 0){ ?>    
                        </div>
                     <?php } 
                     $control++; ?>  
                  <?php } ?>
                  </div>
                </li>