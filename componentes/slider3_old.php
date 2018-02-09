<?php if($_SESSION['app'] == "NO"){ ?>
    <div id="sli" style="width: 100% !important;margin: 0 auto;padding-top: 0em;">
    <div class="fotorama" data-width="100%" data-click="true" data-ratio="16/9" data-minwidth="10" data-maxwidth="2000" data-minheight="10" data-maxheight="60%" data-loop="true" data-autoplay="true" data-arrows="true" data-click="false" data-fit="cover" data-nav="dots" data-swipe="true">
        <?php

            switch ($_SESSION['idioma']){
                    case 'ESP': $sql="SELECT idcat, imagen, orden, contenido, tipo FROM bd_slider WHERE idcat = 0 ORDER BY orden, id ASC";
                        break;
                    case 'FRA': $sql="SELECT idcat, imagen, orden, contenido_fr AS contenido, tipo FROM bd_slider WHERE idcat = 0 ORDER BY orden, id ASC";
                        break;
                    case 'DEU': $sql="SELECT idcat, imagen, orden, contenido_al AS contenido, tipo FROM bd_slider WHERE idcat = 0 ORDER BY orden, id ASC";
                        break;
                    case 'UK': $sql="SELECT idcat, imagen, orden, contenido_en AS contenido, tipo FROM bd_slider WHERE idcat = 0 ORDER BY orden, id ASC";
                        break;
                    case 'POR': $sql="SELECT idcat, imagen, orden, contenido_po AS contenido, tipo FROM bd_slider WHERE idcat = 0 ORDER BY orden, id ASC";
                        break;
                    case 'ITA': $sql="SELECT idcat, imagen, orden, contenido_it AS contenido, tipo  FROM bd_slider WHERE idcat = 0 ORDER BY orden, id ASC";
                        break;
                    case 'CAT': $sql="SELECT idcat, imagen, orden, contenido_ca AS contenido, tipo  FROM bd_slider WHERE idcat = 0 ORDER BY orden, id ASC";
                        break;
                    case 'RUS': $sql="SELECT idcat, imagen, orden, contenido_ru AS contenido, tipo  FROM bd_slider WHERE idcat = 0 ORDER BY orden, id ASC";
                        break;
                }

            $query = mysqli_query($dbi, $sql);

            while($slider = mysqli_fetch_array($query)){    
        ?>


              <img src="<?=$draizp?>/back/uploads/<?=$slider[imagen]?>" width="100%" data-caption="<?=$slider[contenido]?>" />
              <!--<figcaption><?=$slider[contenido]?></figcaption> -->


        <?php

            }

        ?>
    </div> 
    </div>
<?php }?>


