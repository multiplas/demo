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
        <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><img src="<?=$draizp?>/source/<?=$logoSup?>"></a>
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
          <li class="ruby-active-menu-item"><a href="#">Home</a></li>
          
          <!-- Menu Classic-->
          <li><a href="#">Classic</a>
            <ul>
              <li><a href="#">2nd Level #1</a></li>
              <li><a href="#">2nd Level #2</a></li>
              <li><a href="#">2nd Level #3</a>
                <ul>
                  <li><a href="#"><i class="fa fa-university" aria-hidden="true"></i>3rd Level #1</a>
                    <ul>
                      <li><a href="#">4th Level #1</a></li>
                      <li><a href="#">4th Level #2</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>3rd Level #2</a></li>
                  <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i>3rd Level #3</a>
                    <ul>
                      <li><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i>4th Level #1</a></li>
                      <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i>4th Level #2</a></li>
                      <li><a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i>4th Level #3</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="ruby-open-to-left"><a href="#">2nd Level #4</a>
                <ul>
                  <li><a href="#">3rd Level #1</a></li>
                  <li><a href="#">3rd Level #2</a></li>
                  <li><a href="#">3rd Level #3</a></li>
                </ul>
              </li>
              <li><a href="#">2nd Level #5</a></li>
            </ul>
          </li>
          
          <!-- Menu Mega -->
          <li class="ruby-menu-mega"><a href="#">Mega</a>
            <div class="ruby-grid ruby-grid-lined">
              <div class="ruby-row">
                <div class="ruby-col-2">
                  <h3 class="ruby-list-heading">Normal List</h3>
                  <ul>
                    <li><a href="#">Menu Item #1</a></li>
                    <li><a href="#">Menu Item #2</a></li>
                    <li><a href="#">Menu Item #3</a></li>
                    <li><a href="#">Menu Item #4</a></li>
                    <li><a href="#">Menu Item #5</a></li>
                  </ul>
                </div>
                <div class="ruby-col-2 hidden-md">
                  <h3 class="ruby-list-heading">List with Icons</h3>
                  <ul>
                    <li><a href="#"><i class="fa fa-motorcycle" aria-hidden="true"></i>Menu Item #1</a></li>
                    <li><a href="#"><i class="fa fa-music" aria-hidden="true"></i>Menu Item #2</a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Menu Item #3</a></li>
                    <li><a href="#"><i class="fa fa-sliders" aria-hidden="true"></i>Menu Item #4</a></li>
                    <li><a href="#"><i class="fa fa-search" aria-hidden="true"></i>Menu Item #5</a></li>
                  </ul>
                </div>
                <div class="ruby-col-3 ruby-col-4-md">
                  <h3 class="ruby-list-heading">List with Images + Desc</h3>
                  <ul class="ruby-list-with-images">
                    <li><a href="#"><img src="http://placehold.it/75x50">Menu Item #1</a><span class="ruby-list-desc">Lorem ipsum dolor sit</span></li>
                    <li><a href="#"><img src="http://placehold.it/75x50">Menu Item #2</a><span class="ruby-list-desc">Lorem ipsum dolor sit</span></li>
                    <li><a href="#"><img src="http://placehold.it/75x50">Menu Item #3</a><span class="ruby-list-desc">Lorem ipsum dolor sit</span></li>
                  </ul>
                </div>
                <div class="ruby-col-5">
                  <h3 class="ruby-list-heading">Multiple Lists with Icons</h3>
                  <div class="ruby-row">
                    <div class="ruby-col-4 ruby-col-6-md">
                      <ul>
                        <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-signal" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-send" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i>Menu Item</a></li>
                      </ul>
                    </div>
                    <div class="ruby-col-4 ruby-col-6-md" style="padding-left:10px">
                      <ul>
                        <li><a href="#"><i class="fa fa-rocket" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-warning" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-upload" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-umbrella" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-trophy" aria-hidden="true"></i>Menu Item</a></li>
                      </ul>
                    </div>
                    <div class="ruby-col-4 hidden-md" style="padding-left:15px">
                      <ul>
                        <li><a href="#"><i class="fa fa-map-o" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-image" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-legal" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-paint-brush" aria-hidden="true"></i>Menu Item</a></li>
                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>Menu Item</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
          
          
          <!-- Menu Blog -->
          <li class="ruby-menu-mega-blog"><a href="#">Blog</a>
            <div>
              <ul class="ruby-menu-mega-blog-nav">

                <li class="ruby-active-menu-item"><a href="#">Blog-4-Column</a>
                  <div class="ruby-grid ruby-grid-lined">
                    <div class="ruby-row">
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/190x110">
                        <div class="ruby-c-inline">
                          <span class="ruby-c-category"><a href="#">News / Travel</a></span>
                          <span class="ruby-c-date"><a href="#">05/01/2017</a></span>
                        </div>
                        <span class="ruby-c-title ruby-margin-10"><a href="#">Vacation Proved To Increase Productivity</a></span>
                        <span class="ruby-c-content">The primary research for the study was based on an online survey that was...</span>
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/190x110">
                        <div class="ruby-c-inline">
                          <span class="ruby-c-category"><a href="#">News / Health</a></span>
                          <span class="ruby-c-date"><a href="#">05/01/2017</a></span>
                        </div>
                        <span class="ruby-c-title ruby-margin-10"><a href="#">Stereotype Idioms By The Smokers</a></span>
                        <span class="ruby-c-content">If you have ever said some of below idioms you are for sure a smoking...</span>
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/190x110">
                        <div class="ruby-c-inline">
                          <span class="ruby-c-category"><a href="#">News / Culture</a></span>
                          <span class="ruby-c-date"><a href="#">05/01/2017</a></span>
                        </div>
                        <span class="ruby-c-title ruby-margin-10"><a href="#">10 Facts About The Philosophers</a></span>
                        <span class="ruby-c-content">When we think “philosopher,” a certain image comes to mind—most often a wise...</span>
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/190x110">
                        <div class="ruby-c-inline">
                          <span class="ruby-c-category"><a href="#">News / Tech</a></span>
                          <span class="ruby-c-date"><a href="#">05/01/2017</a></span>
                        </div>
                        <span class="ruby-c-title ruby-margin-10"><a href="#">In 2016, 10 People Died While Taking Selfie</a></span>
                        <span class="ruby-c-content">This is a list of serious injuries and deaths in which the victim or a member of...</span>
                      </div>
                    </div>
                  </div>
                </li>

                <li class="hidden-md"><a href="#">Blog-3-Column</a>
                  <div class="ruby-grid ruby-grid-lined">
                    <div class="ruby-row">
                      <div class="ruby-col-4">
                        <div class="ruby-col-5">
                          <img src="http://placehold.it/200x200">
                        </div>
                        <div class="ruby-col-7">
                          <span class="ruby-c-title"><a href="#">An Erupting Volcano And A Meteor</a></span>
                          <span class="ruby-c-category"><a href="#">News / Science</a></span>
                          <span class="ruby-c-date"><a href="#">05/01/2017</a></span>
                        </div>
                      </div>
                      <div class="ruby-col-4">
                        <div class="ruby-col-5">
                          <img src="http://placehold.it/200x200">
                        </div>
                        <div class="ruby-col-7">
                          <span class="ruby-c-title"><a href="#">Bottle Labels: Short Stories To Read</a></span>
                          <span class="ruby-c-category"><a href="#">News / Culture</a></span>
                          <span class="ruby-c-date"><a href="#">05/01/2017</a></span>
                        </div>
                      </div>
                      <div class="ruby-col-4">
                        <div class="ruby-col-5">
                          <img src="http://placehold.it/200x200">
                        </div>
                        <div class="ruby-col-7">
                          <span class="ruby-c-title"><a href="#">10+ Stunning Animal Portraits By Polyushko</a></span>
                          <span class="ruby-c-category"><a href="#">News / Photography</a></span>
                          <span class="ruby-c-date"><a href="#">05/01/2017</a></span>
                        </div>
                      </div>
                    </div>
                    <div class="ruby-row">
                      <div class="ruby-col-4">
                        <div class="ruby-col-5">
                          <img src="http://placehold.it/200x200">
                        </div>
                        <div class="ruby-col-7">
                          <span class="ruby-c-title"><a href="#">Photographing The Beauty Of Fall</a></span>
                          <span class="ruby-c-category"><a href="#">News / Photography</a></span>
                          <span class="ruby-c-date"><a href="#">05/01/2017</a></span>
                        </div>
                      </div>
                      <div class="ruby-col-4">
                        <div class="ruby-col-5">
                          <img src="http://placehold.it/200x200">
                        </div>
                        <div class="ruby-col-7">
                          <span class="ruby-c-title"><a href="#">10 Freaking Facts About Being A Pilot</a></span>
                          <span class="ruby-c-category"><a href="#">News / Life</a></span>
                          <span class="ruby-c-date"><a href="#">05/01/2017</a></span>
                        </div>
                      </div>
                      <div class="ruby-col-4">
                        <div class="ruby-col-5">
                          <img src="http://placehold.it/200x200">
                        </div>
                        <div class="ruby-col-7">
                          <span class="ruby-c-title"><a href="#">Health Benefits Of A Glass Of Whiskey</a></span>
                          <span class="ruby-c-category"><a href="#">News / Health</a></span>
                          <span class="ruby-c-date"><a href="#">05/01/2017</a></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <li><a href="#">Blog-2-Column</a>
                  <div class="ruby-grid ruby-grid-lined">
                    <div class="ruby-row">
                      <div class="ruby-col-6">
                        <div class="ruby-col-4">
                          <img src="http://placehold.it/175x140">
                        </div>
                        <div class="ruby-col-8">
                          <span class="ruby-c-title"><a href="#">Nexo Created New Airless Bike Tires That Will Never Get Flat</a></span>
                          <div class="ruby-c-inline">
                            <span class="ruby-c-category"><a href="#"><i class="fa fa-tag" aria-hidden="true"></i> News / Tech</a></span>
                            <span class="ruby-c-date"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 05/01/2017</a></span>
                          </div>
                        </div>
                      </div>
                      <div class="ruby-col-6">
                        <div class="ruby-col-4">
                          <img src="http://placehold.it/175x140">
                        </div>
                        <div class="ruby-col-8">
                          <span class="ruby-c-title"><a href="#">Illustrator Creates Stunning Dresses From Everyday Objects</a></span>
                          <div class="ruby-c-inline">
                            <span class="ruby-c-category"><a href="#"><i class="fa fa-tag" aria-hidden="true"></i> News / Tech</a></span>
                            <span class="ruby-c-date"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 05/01/2017</a></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="ruby-row">
                      <div class="ruby-col-6">
                        <div class="ruby-col-4">
                          <img src="http://placehold.it/175x140">
                        </div>
                        <div class="ruby-col-8">
                          <span class="ruby-c-title"><a href="#">Italian Pastry Chef Creates Miniature Worlds With Desserts</a></span>
                          <div class="ruby-c-inline">
                            <span class="ruby-c-category"><a href="#"><i class="fa fa-tag" aria-hidden="true"></i> News / Tech</a></span>
                            <span class="ruby-c-date"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 05/01/2017</a></span>
                          </div>
                        </div>
                      </div>
                      <div class="ruby-col-6">
                        <div class="ruby-col-4">
                          <img src="http://placehold.it/175x140">
                        </div>
                        <div class="ruby-col-8">
                          <span class="ruby-c-title"><a href="#">Dogs Brought To The Lavender Gardens To Capture Their Joy</a></span>
                          <div class="ruby-c-inline">
                            <span class="ruby-c-category"><a href="#"><i class="fa fa-tag" aria-hidden="true"></i> News / Tech</a></span>
                            <span class="ruby-c-date"><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> 05/01/2017</a></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>

                <li><a href="#">Blog-Article-List</a>
                  <div class="ruby-grid ruby-grid-lined">
                    <div class="ruby-row">
                      <div class="ruby-col-6">
                        <span class="ruby-c-title" style="margin-bottom:15px">POPULAR THREADS</span>
                        <div class="ruby-row">
                          <div class="ruby-col-1"><img src="http://placehold.it/50x50"></div>
                          <div class="ruby-col-11"><span class="ruby-c-title"><a href="#">An Erupting Volcano And A Meteor Has Created A Fantastic View</a></span></div>
                        </div>
                        <div class="ruby-row">
                          <div class="ruby-col-1"><img src="http://placehold.it/50x50"></div>
                          <div class="ruby-col-11"><span class="ruby-c-title"><a href="#">Bottle Labels With Short Stories To Be Read Is The New Marketing Era</a></span></div>
                        </div>
                        <div class="ruby-row">
                          <div class="ruby-col-1"><img src="http://placehold.it/50x50"></div>
                          <div class="ruby-col-11"><span class="ruby-c-title"><a href="#">10+ Stunning Animal Portraits That Has Been Filmed By Polyushko</a></span></div>
                        </div>
                        <div class="ruby-row">
                          <div class="ruby-col-1"><img src="http://placehold.it/50x50"></div>
                          <div class="ruby-col-11"><span class="ruby-c-title"><a href="#">10 Freaking Facts About Being An airline pilot</a></span></div>
                        </div>
                      </div>
                      <div class="ruby-col-6">
                        <span class="ruby-c-title" style="margin-bottom:15px">MOST COMMENTED</span>
                        <div class="ruby-row">
                          <div class="ruby-col-1"><img src="http://placehold.it/50x50"></div>
                          <div class="ruby-col-11"><span class="ruby-c-title"><a href="#">An Erupting Volcano And A Meteor Has Created A Fantastic View</a></span></div>
                        </div>
                        <div class="ruby-row">
                          <div class="ruby-col-1"><img src="http://placehold.it/50x50"></div>
                          <div class="ruby-col-11"><span class="ruby-c-title"><a href="#">Bottle Labels With Short Stories To Be Read Is The New Marketing Era</a></span></div>
                        </div>
                        <div class="ruby-row">
                          <div class="ruby-col-1"><img src="http://placehold.it/50x50"></div>
                          <div class="ruby-col-11"><span class="ruby-c-title"><a href="#">10+ Stunning Animal Portraits That Has Been Filmed By Polyushko</a></span></div>
                        </div>
                        <div class="ruby-row">
                          <div class="ruby-col-1"><img src="http://placehold.it/50x50"></div>
                          <div class="ruby-col-11"><span class="ruby-c-title"><a href="#">10 Freaking Facts About Being An airline pilot</a></span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          
          
          <!-- Menu Shop -->
          <li class="ruby-menu-mega-shop"><a href="#">Shop</a>
            <div>
              <ul>
                <li class="ruby-active-menu-item"><a href="#">Clothing</a>
                  <div class="ruby-grid ruby-grid-lined">
                    <div class="ruby-row">
                      <div class="ruby-col-2">
                        <h3 class="ruby-list-heading">TOPS</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                          <li><a href="#">Menu Item #5</a></li>
                        </ul>
                      </div>
                      <div class="ruby-col-2">
                        <img src="http://placehold.it/292x385">
                      </div>
                      <div class="ruby-col-2">
                        <h3 class="ruby-list-heading">BOTTOM</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                          <li><a href="#">Menu Item #5</a></li>
                        </ul>
                      </div>
                      <div class="ruby-col-2">
                        <h3 class="ruby-list-heading">NIGHTWEAR</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                          <li><a href="#">Menu Item #5</a></li>
                        </ul>
                      </div>
                      <div class="ruby-col-2">
                        <img src="http://placehold.it/292x385">
                      </div>
                      <div class="ruby-col-2">
                        <h3 class="ruby-list-heading">SWIMWEAR</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                          <li><a href="#">Menu Item #5</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li><a href="#">Outerwear</a>
                  <div class="ruby-grid ruby-grid-lined">
                    <div class="ruby-row">
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/330x365">
                      </div>
                      <div class="ruby-col-3">
                        <h3 class="ruby-list-heading">COATS</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                          <li><a href="#">Menu Item #5</a></li>
                          <li><a href="#">Menu Item #6</a></li>
                          <li><a href="#">Menu Item #7</a></li>
                        </ul>
                      </div>
                      <div class="ruby-col-3">
                        <h3 class="ruby-list-heading">JACKETS</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                          <li><a href="#">Menu Item #5</a></li>
                          <li><a href="#">Menu Item #6</a></li>
                          <li><a href="#">Menu Item #7</a></li>
                        </ul>
                      </div>
                      <div class="ruby-col-3">
                        <h3 class="ruby-list-heading">LEATHER</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                          <li><a href="#">Menu Item #5</a></li>
                          <li><a href="#">Menu Item #6</a></li>
                          <li><a href="#">Menu Item #7</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li><a href="#">Bags &amp; Shoes</a>
                  <div class="ruby-grid ruby-grid-lined">
                    <div class="ruby-row">
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/292x268">
                      </div>
                      <div class="ruby-col-3">
                        <h3 class="ruby-list-heading">BAGS</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                          <li><a href="#">Menu Item #5</a></li>
                        </ul>
                      </div>
                      <div class="ruby-col-3">
                        <h3 class="ruby-list-heading">SHOES</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                          <li><a href="#">Menu Item #5</a></li>
                        </ul>
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/292x268">
                      </div>
                    </div>
                  </div>
                </li>
                <li><a href="#">Accessories</a>
                  <div class="ruby-grid ruby-grid-lined">
                    <div class="ruby-row">
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/300x150">
                        <h3 class="ruby-list-heading" style="margin-top: 16px;">EYEWEAR</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                        </ul>
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/300x150">
                        <h3 class="ruby-list-heading" style="margin-top: 16px;">JEWELLERY</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                        </ul>
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/300x150">
                        <h3 class="ruby-list-heading" style="margin-top: 16px;">WATCHES</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                        </ul>
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/300x150">
                        <h3 class="ruby-list-heading" style="margin-top: 16px;">OTHERS</h3>
                        <ul>
                          <li><a href="#">Menu Item #1</a></li>
                          <li><a href="#">Menu Item #2</a></li>
                          <li><a href="#">Menu Item #3</a></li>
                          <li><a href="#">Menu Item #4</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
                <li><a href="#">Collections</a>
                  <div class="ruby-grid ruby-grid-lined">
                    <div class="ruby-row">
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/292x210">
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/292x210">
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/292x210">
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/292x210">
                      </div>
                    </div>
                    <div class="ruby-row">
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/292x210">
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/292x210">
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/292x210">
                      </div>
                      <div class="ruby-col-3">
                        <img src="http://placehold.it/292x210">
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          
          
          <!-- Menu Right -->
          <li class="ruby-menu-right"><a href="#">Right</a>
            <ul>
              <li><a href="#">2nd Level #1</a></li>
              <li><a href="#">2nd Level #2</a></li>
              <li class="ruby-open-to-left"><a href="#">2nd Level #3</a>
                <ul>
                  <li class="ruby-open-to-left"><a href="#"><i class="fa fa-university" aria-hidden="true"></i>3rd Level #1</a>
                    <ul>
                      <li><a href="#">4th Level #1</a></li>
                      <li><a href="#">4th Level #2</a></li>
                    </ul>
                  </li>
                  <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i>3rd Level #2</a></li>
                  <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i>3rd Level #3</a>
                  <li><a href="#"><i class="fa fa-file" aria-hidden="true"></i>3rd Level #4</a>
                    <ul>
                      <li><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i>4th Level #1</a></li>
                      <li><a href="#"><i class="fa fa-print" aria-hidden="true"></i>4th Level #2</a></li>
                      <li><a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i>4th Level #3</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li class="ruby-open-to-left"><a href="#">2nd Level #4</a>
                <ul>
                  <li><a href="#">3rd Level #1</a></li>
                  <li><a href="#">3rd Level #2</a></li>
                  <li><a href="#">3rd Level #3</a></li>
                </ul>
              </li>
              <li><a href="#">2nd Level #5</a></li>
            </ul>
          </li>
          
          
          <!-- iconos redes -->
          <li class="ruby-menu-right ruby-menu-social"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i><span>@rubymenu</span></a></li>

          <li class="ruby-menu-right ruby-menu-social"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i><span>/rubymenu</span></a></li>
          
          
          <!-- Buscador -->
          <li class="ruby-menu-right ruby-menu-social ruby-menu-search"><a href="#"><i class="fa fa-search" aria-hidden="true"></i><span><input type="text" name="search" placeholder="Search.."></span></a></li>

        </ul>
      </div>
      <!-- END:   RUBY HORIZONTAL MENU -->
      <!-- ########################### -->

    </div>
    <!--    END:   RUBY HEADER     -->
    <!-- ######################### -->

    <!-- JQUERY -->
    <script src="<?=$draizp?>/temas/12/bloques/js/jquery-3.1.0.min.js"></script>

    <!-- RUBY MAIN JAVASCRIPT -->
    <script src="<?=$draizp?>/temas/12/bloques/js/ruby-main.js"></script>

    <!-- RUBY DEMO JAVASCRIPT: FOR DEMO SHOWCASE ONLY! RUBY DEMO JAVASCRIPT IS NOT SUPPORTED! -->
    <script src="<?=$draizp?>/temas/12/bloques/js/ruby-demo.js"></script>

