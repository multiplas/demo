                <li>
                  <div class="ruby-grid ruby-grid-lined">
                    <div class="ruby-row">
                      <div class="ruby-col-6">
                        <span class="ruby-c-title" style="margin-bottom:15px">ÚLTIMAS ENTRADAS</span>
                        <?php $control = 0;
                            foreach ($blogMenu AS $entradaB){ 
                                if($control < 4){
                                $control++; ?>
                                <div class="ruby-row">
                                  <div class="ruby-col-1"><img style="width: 38px; height: 38px;" src="<?=$entradaB['imagen'] != '' ? $draizp.'/imagenes/'.$entradaB['imagen'].'"' : 'http://placehold.it/50x50'?>"></div>
                                  <div class="ruby-col-11"><span class="ruby-c-title" style="height: 40px;">
                                          <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><?=$entradaB['nombre']?></a>
                                      </span>
                                  </div>
                                </div>
                        <?php   } 
                            } ?>   
                      </div>
                      <div class="ruby-col-6">
                        <span class="ruby-c-title" style="margin-bottom:15px"> </span>
                        <?php $control = 0;
                            foreach ($blogMenu AS $entradaB){ 
                                if($control >= 4 && $control < 8){
                                $control++; ?>
                                    <div class="ruby-row">
                                      <div class="ruby-col-1"><img style="width: 38px; height: 38px;" src="<?=$entradaB['imagen'] != '' ? $draizp.'/imagenes/'.$entradaB['imagen'].'"' : 'http://placehold.it/50x50'?>"></div>
                                      <div class="ruby-col-11">
                                          <span class="ruby-c-title" style="height: 40px;">
                                              <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>pagina/<?=$entradaB['id']?>/<?=strtolower(str_replace('--', '-', str_replace(':', '', str_replace('¿', '', str_replace('?', '', str_replace(' ', '-', str_replace($no_permitidas, $permitidas ,$entradaB['nombre'])))))))?>"><?=$entradaB['nombre']?></a>
                                          </span>
                                      </div>
                                    </div>
                        <?php   } 
                            } ?> 
                      </div>
                    </div>
                  </div>
                </li>