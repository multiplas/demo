          <?php $control = 0;
                $cola = count($categorias);
                $primera = 0;
          foreach ($categorias AS $padre){
                $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
                $nombre = preg_replace('([,.])', '', $nombre);
                $nombre = str_replace('--', '-', $nombre);
                $control++;
              if($control < $Napartados){ ?>
          <li <?=$padre['id'] == $bar ? 'class="ruby-active-menu-item"':''?>><a <?=$padre['url'] != '' ? 'target="_blank"' : ''?> href="<?=$padre['url'] == '' ? $draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/' : $padre['url']?>"><?=$padre['nombre']?></a> 
            <?php if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';  
            if (count($padre['categorias']) > 0 && $padre['categorias'] != null){ ?>
                <ul>
                    <?php foreach ($padre['categorias'] AS $hijo1){
                        $nombre2 = utf8_encode(strtr(utf8_decode($hijo1['nombre']), utf8_decode($tofind), $replac));
                        $nombre2 = strtolower($nombre2);
                        $nombre2 = preg_replace('([^A-Za-z0-9])', '-', $nombre2);
                        $nombre2 = str_replace('--', '-', $nombre2);
                        if ($hijo1['id'] == $bar)
                            $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a> &gt; '.
                            '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo1['id'].'/'.$nombre2.'/"'.(count($hijo1['categorias']) < 1 ? '' : '').'>'.$hijo1['nombre'].'</a>';
                    ?>
                        <li><a <?=$hijo1['url'] != '' ? 'target="_blank"' : ''?> href="<?=$hijo1['url'] == '' ? $draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo1['id'].'/'.$nombre2.'/' : $hijo1['url']?>"><?=$hijo1['nombre']?></a>
                        <?php if (count($hijo1['categorias']) > 0 && $hijo1['categorias'] != null){ ?>
                            <ul>
                            <?php foreach ($hijo1['categorias'] AS $hijo2){ 
                                    $nombre3 = utf8_encode(strtr(utf8_decode($hijo2['nombre']), utf8_decode($tofind), $replac));
                                    $nombre3 = strtolower($nombre3);
                                    $nombre3 = preg_replace('([^A-Za-z0-9])', '-', $nombre3);	
                                    $nombre3 = str_replace('--', '-', $nombre3);
                                    if ($hijo2['id'] == $bar)
                                        $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a> &gt; '.
                                        '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo1['id'].'/'.$nombre2.'/">'.$hijo1['nombre'].'</a> &gt; '.
					'<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo2['id'].'/'.$nombre3.'/"'.(count($hijo2['categorias']) < 1 ? '' : '').'>'.$hijo2['nombre'].'</a>';
                                ?>
                                
                                    <li><a <?=$hijo2['url'] != '' ? 'target="_blank"' : ''?> href="<?=$hijo2['url'] == '' ? $draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo2['id'].'/'.$nombre3.'/' : $hijo2['url']?>"><?=$hijo2['nombre']?></a>
                                    <?php if (count($hijo2['categorias']) > 0 && $hijo2['categorias'] != null){ ?>
                                        <ul>
                                        <?php foreach ($hijo2['categorias'] AS $hijo3){
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
                                            
                                                <li><a <?=$hijo3['url'] != '' ? 'target="_blank"' : ''?> href="<?=$hijo3['url'] == '' ? $draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo3['id'].'/'.$nombre4.'/' : $hijo3['url']?>"><?=$hijo3['nombre']?></a></li>
                                            
                                        <?php } ?>
                                        </ul>
                                    <?php } ?>
                                    </li>
                            <?php } ?>
                            </ul>
                       <?php } ?>
                        </li>
                 <?php } ?>
                </ul>
              <?php } ?>
          </li>
          <?php }else{ 
              if($primera == 0){ $primera++; ?>
              <li <?=$padre['id'] == $bar ? 'class="ruby-active-menu-item"':''?>><a href="#">Otros Productos</a>
                  <ul>
              <?php } 
                $nombre = utf8_encode(strtr(utf8_decode($padre['nombre']), utf8_decode($tofind), $replac));
                $nombre = strtolower($nombre);
                $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
                $nombre = preg_replace('([,.])', '', $nombre);
                $nombre = str_replace('--', '-', $nombre);
                if ($padre['id'] == $bar) $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/"'.(count($padre['categorias']) < 1 ? '' : '').'>'.$padre['nombre'].'</a>';
            ?>
                      <li><a <?=$padre['url'] != '' ? 'target="_blank"' : ''?> href="<?=$padre['url'] == '' ? $draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/' : $padre['url']?>"><?=$padre['nombre']?></a> 
                          <?php if (count($padre['categorias']) > 0 && $padre['categorias'] != null){ ?>
                            <ul>
                                <?php foreach ($padre['categorias'] AS $hijo1){ 
                                    $nombre2 = utf8_encode(strtr(utf8_decode($hijo1['nombre']), utf8_decode($tofind), $replac));
                                    $nombre2 = strtolower($nombre2);
                                    $nombre2 = preg_replace('([^A-Za-z0-9])', '-', $nombre2);
                                    $nombre2 = str_replace('--', '-', $nombre2);
                                    if ($hijo1['id'] == $bar)
                                        $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a> &gt; '.
                                        '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo1['id'].'/'.$nombre2.'/"'.(count($hijo1['categorias']) < 1 ? '' : '').'>'.$hijo1['nombre'].'</a>';
                                ?>

                                    <li><a <?=$hijo1['url'] != '' ? 'target="_blank"' : ''?> href="<?=$hijo1['url'] == '' ? $draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo1['id'].'/'.$nombre2.'/' : $hijo1['url']?>"><?=$hijo1['nombre']?></a>
                                    <?php if (count($hijo1['categorias']) > 0 && $hijo1['categorias'] != null){ ?>
                                        <ul>
                                        <?php foreach ($hijo1['categorias'] AS $hijo2){ 
                                            $nombre3 = utf8_encode(strtr(utf8_decode($hijo2['nombre']), utf8_decode($tofind), $replac));
                                        $nombre3 = strtolower($nombre3);
                                        $nombre3 = preg_replace('([^A-Za-z0-9])', '-', $nombre3);	
                                        $nombre3 = str_replace('--', '-', $nombre3);
                                        if ($hijo2['id'] == $bar)
                                            $barpath = '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$padre['id'].'/'.$nombre.'/">'.$padre['nombre'].'</a> &gt; '.
                                            '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo1['id'].'/'.$nombre2.'/">'.$hijo1['nombre'].'</a> &gt; '.
                                            '<a href="'.$draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo2['id'].'/'.$nombre3.'/"'.(count($hijo2['categorias']) < 1 ? '' : '').'>'.$hijo2['nombre'].'</a>';
                                        ?>
                                                <li><a<?=$hijo2['url'] != '' ? 'target="_blank"' : ''?> href="<?=$hijo2['url'] == '' ? $draizp.'/'.$_SESSION['lenguaje'].'productos/'.$hijo2['id'].'/'.$nombre3.'/' : $hijo2['url']?>"><?=$hijo2['nombre']?></a>
                                                </li>
                                            <?php } ?>
                                            </ul>
                                       <?php } ?>
                                        </li>
                                 <?php } ?>
                                </ul>
                              <?php } ?>   
                      </li>
                      <?php if($cola == $control){ ?>
                  </ul>
              </li>
            <?php }
                } 
          } ?>