<style>
    #pie{
        background-color: <?=$colores['pie']?>;
        color: <?=$colores['pie_letras']?>;
    }
    
    #linea-roja{
        background-color: <?=$colores['pie']?>;
        color: <?=$colores['pie_letras']?>;
    }
    
    body{
        font-family: '<?=$fuente2?>', Arial,Helvetica,sans-serif;
    }
    
    .tfiltro{
        font-family: '<?=$fuente1?>', sans-serif;
    }
    
    h1{
        font-family: '<?=$fuente1?>', sans-serif;
    }

    #buscador2{
        width: 267px;
    }
    
    #buscador2 input[type=text] {
        background: rgba(255, 255, 255, 0.20);
        border: none;
        margin-left: 15px;
        margin-top: 1px;
        border-bottom-left-radius: 3px;
        border-top-left-radius: 3px;
        color: #FFF;
        float: left;
        font-size: 21px;
        outline: none;
        padding: 5px 5px;
        width: 200px;
        vertical-align: middle;
    }

    #buscador2 span#BtBuscar {
        background: #d15c5c url(../source/lupa.png);
        background-position: center;
        background-repeat: no-repeat;
        border: none;
            margin-top: 1px;
        border-bottom-right-radius: 3px;
        border-top-right-radius: 3px;
        float: left;
        font-size: 20px;
        height: 22px;
        padding: 6px;
        width: 30px;
        margin-left: 0px;
        vertical-align: middle;
        }
    
    .num-cesta{
        position: relative;
        padding: 0px 5px;
        border-radius: 20px;
        background: white;
        color: darkslategray;
        font-weight: bold;
    }
    
    @media (max-width:830px)
    { 
        #buscador2{
            position: absolute;
            left:25%; 
            top:25%;
            margin-left: -0px;
        }
    }
    
    @media (max-width:500px)
    { 
        #buscador2{
            position: absolute;
            left:5%; 
            margin-left: -0px;
        }
    }
    
    #grupo-submenu #submenu a
			{
				color: <?=$colores['menu_letra']?>;
                        }
                        #grupo-submenu #submenu ul li:hover > a{
                            color: <?=$colores['menu_letra_hover']?>;
                        }                    
</style>

<style>
        
        * {
    margin: 0;
    padding: 0;
    border: 0 none;
    position: relative;
}
#menu_gral {
    font-family: '<?=$fuente2?>', verdana, sans sherif;
    width: 80%;
    margin: 1.5rem auto;
}
#menu_gral ul {
    list-style-type: none; 
    text-align: center;
    font-size: 12px;
}
#menu_gral > ul li {
    display: inline-block;
    width: 50px;
    position: relative;
    background: #ffffff;
    color: black;
}
#menu_gral li form {
    display: block;
    text-decoration: none;
    font-size: 1rem;
    line-height: 2.5rem;
    color: #444;
}
#menu_gral li:hover form, #menu_gral li form:focus {
    background: transparent;
    color: #fff;
}

#menu_gral li ul {
    position: absolute;
    width: 0;
    overflow: hidden;
}
#menu_gral li:hover ul, #menu_gral li:focus ul {
    width: 200px;
    margin: 0;
    padding: 0;
    background:  transparent;
    z-index: 5;
    border: 1px solid #333
}
#menu_gral li li {
    display: block;
    width: 100%;
}
#menu_gral li:hover li form, #menu_gral li:focus li form {
    font-family: '<?=$fuente2?>';
    font-size: .9rem;
    line-height: 1.7rem;
    border-top: 1px solid #e5e5e5;
    background: transparent;
}
#menu_gral li li form:hover, #menu_gral li li form:focus {
    background: transparent; 
}
.goog-te-spinner-pos {
    z-index: -1;
}

#cabecera{
    overflow: visible;
}

#cabecera div > span {
    display: inline;
}

#cabecera div span a.perfil {
    background: rgba(255, 255, 255, 0) url("<?=$draizp?>/source/perfil3.png") no-repeat scroll center center / 50px auto;
}

#cabecera div div a.desconectar {
    background: rgba(255, 255, 255, 0) url("<?=$draizp?>/source/standby.png") no-repeat scroll center center / 50px auto;
}

#cabecera div span a.perfil:hover{
    background: rgba(47, 47, 47, 0.3) url(<?=$draizp?>/source/perfil3.png) no-repeat center;
    background-size: 16px;
}

#cabecera div span a.desconectar {
    background: rgba(255, 255, 255, 0) url("<?=$draizp?>/source/standby.png") no-repeat scroll center center / 16px auto;
}

#cabecera div span a.desconectar:hover{
    background: rgba(47, 47, 47, 0.3) url(<?=$draizp?>/source/standby.png) no-repeat center;
    background-size: 16px;
}

#prin:hover{
    background: rgba(47, 47, 47, 0.3) no-repeat center;
}


#cabecera{
    width: 90% !important;
}
    @media (min-width:992px){
        #cabecera{
            left: -530px;
            margin-left: 50%;
            border-bottom: 0 solid #be2828;
        }


        #cabecera #logo {
            margin-top: 0px;
            max-width: 40% !important;
        }
    }
    @media (min-width:940px){
        .solomovil{
            display: none;
        }
    }
    @media (max-width:940px){
        
        
        .solomovil{
            display: inline;
        }
    }
    
    @media (min-width:900px){
        .img_cesta{
            height: 20px;
            top: 5px;
            margin-left: 16px;
        }
        
        .num-cesta {
            background: black none repeat scroll 0 0;
            border-radius: 5px;
            color: white;
            font-weight: bold;
            left: -20px;
            top: -25px;
            padding: 0 4px;
            position: relative;
        }
        
        .div_datos{
            float:right;
            margin-top: 0px;
            text-align: right;
            color: white;  
        }
        
        #cabecera div span a.desconectar {
            float: right;
            margin-left: 16px;
            padding: 5px 16px;
            transition: background 0.50s;
        }
        
        #cabecera div span a.perfil {
            float: right;
            margin-left: 16px;
            padding: 12px 20px;
            transition: background 0.50s;
        }
        
        .div_wh{
            display: table;
            float: right;
            margin-left: 5px;
            top: -19px;
        }
        
        .mail_d{
            margin-left: 26px;
            top: -9px;
        }
        
        .horario_d{
            margin-left: 5px;
            top: 0px;
        }
    }
    @media (max-width:900px){
        #cabecera #logo{
            width: 100%;
            margin-bottom: 20px;
        }
        
        .div_wh{
            display: table !important;
            top: -19px;
            width: 100%;
        }
        
        .nomostrar{
            
        }
                
        .perfil{
            
        }
        
        .img_cesta{
            height: 20px;
            top: 5px;
            padding-left: 8px;
        }
        
        .num-cesta {
            background: black none repeat scroll 0 0;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            margin-left: -13px;
            top: -12px;
            padding: 0 4px;
            position: relative;
        }
        
        .div_datos{
            margin-top: 0px;
            text-align: center;
            color: white;  
            float: left;
            width: 100%;
        }
        
        #cabecera div span a.desconectar {
            padding: 5px 16px;
            transition: background 0.50s;
        }
        
        #cabecera div span a.perfil {
             float: right;
            margin-left: 16px;
            padding: 12px 20px;
            transition: background 0.50s;
        }
        
        .mail_d{
            top: -9px;
        }
        
        .horario_d{
            top: 0px;
        }
    }
    @media (max-width:1060px){
        #top > div {
            width: 100%;
        }
    }
    
    @media (min-width:1030px){
        .suggest{
            height: 38px;
            line-height: 38px;
            border: 1px solid #ccc;
            outline: 0 none;
            padding: 5px 10px;
            position: relative;
            float: left;
            z-index: 1;
            width: 225px;
        }
        
        .div_datos{
            width: 60%;
        }
        
        .num-cesta{
            float: left !important;
            top: 3px;
        }
    }
    
    @media (max-width:1030px){
        #cabecera #logo{
            width: 100%;
            text-align: center;
            float: none !important;
        }
        .buscarForm{
            display: none !important;
        }
        .logos_sociales{
            float: right !important;
        }
        .div_datos{
            width: 100%;
        }
        .num-cesta{
            float: left !important;
            top: 2px !important;
        }
        
        .perfilT{
            float: left !important;
        }
    }
    
    
</style>


<style>
        .account-layer{
            background: #fff none repeat scroll 0 0;
            border: 2px solid #333;
            left: 0;
            padding: 8px 10px;
            position: absolute;
            text-align: left;
            top: 100%;
            width: 270px;
            z-index: 15;
            display: none;
            color: black;
            list-style-type: none;
        }
        
        .stiloli{
            display: block;
            line-height: 24px;
            padding: 8px 0;
            text-decoration: none;
        }
        
        .stiloli2{
            display: block;
            line-height: 24px;
            padding: 8px 0;
            text-decoration: none;
            text-transform: uppercase;
            font-weight: bold;
            text-align: center;
        }
    </style>

    
    <style>
                #cabecera .logos_sociales i.fa {
                    font-size: 2rem;
                    opacity: 1 !important;
                }
                
                #cabecera div span a.desconectar {
                    background: rgba(255, 255, 255, 0) url("<?=$draizp?>/source/standby2.png") no-repeat scroll center center / 16px auto;
                }
                
                #cabecera div span a.desconectar:hover {
                    background: rgba(255, 255, 255, 0) url("<?=$draizp?>/source/standby2.png") no-repeat scroll center center / 16px auto;
                }
                
                #cabecera div span a.perfil {
                    background: rgba(255, 255, 255, 0) url("<?=$draizp?>/source/perfil3.png") no-repeat scroll center center / 50px auto;
                }
                
                #cabecera div span a.perfil:hover {
                    background: rgba(255, 255, 255, 0) url("<?=$draizp?>/source/perfil3.png") no-repeat scroll center center / 50px auto;
                }
                
               
    </style>


</div>
<?php if($fCabecera != ''){ ?>
    <div style="background-image:url(<?=$draizp?>/source/<?=$fCabecera?>);background-repeat: no-repeat;">
<?php } ?>
<div id="cabecera" style="z-index: 60000;">
    
    
    <div id="logo" style="float: left">
        <?php if($logoSup != ''){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><img src="<?=$draizp?>/source/<?=$logoSup?>" alt="" /></a><?php } ?>
    </div>
            
    <?php
    ?>
    <div class='div_datos'>
    
        
        
        <?php if($Empresa['mcatalogo'] == 0){ ?>
        <div class="perfilT" style="float: right">
            <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta"><span class="boton" style="float: left; margin-top: 8px;"><img src="<?=$draizp?>/source/cesta3.png" class=""></span> <span class="num-cesta"><?=count($cestanum)?></span></a>
        </div>
        
        
        <div id="perfilT" class="perfilT" style="float: right; margin-top: -15px; margin-right: 20px">
            
            <nav id="menu_gral">
                  <ul>
                    <li id="prin" style="background-color: transparent;">
                        <img src="<?=$draizp?>/source/perfil3.png" style="cursor: pointer">
                    <ul>
                        <?php if ($_SESSION['usr'] != null) { ?>
                            <li><a class="stiloli2" href="<?=$draizp?>/acc/salir">Desconectarse</a></li>
                        <?php }else{ ?>
                            <li><a class="stiloli2" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cuenta">Conectarse</a></li>
                        <?php } ?>    
                        <?php if($paginasE['20002'] == 1){ ?><li><a class="stiloli" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>devoluciones">Envíos y devoluciones</a></li><?php } ?>
                        <?php if($paginasE['20001'] == 1){ ?><li><a class="stiloli" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>privacidad">Política de privacidad</a></li><?php } ?>
                        <?php if($Empresa['desactivarGE'] == 1){ ?><li><a class="stiloli" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>portes">Gastos de Envío</a></li><?php } ?>    
                    </ul>
                    </li>
                  </ul>
            </nav> 
        </div>
        <?php } ?>
        <?php include($draiz.'/temas/10/bloques/logos_sociales.php'); ?>
        
        <div class="posicion buscarForm" style="float: right; margin-top: 10px; margin-right: 20px">
            <form action="<?=$draizp?>/es/" method="post">
                <div class="input-group suggest">
                    <input style="width: 200px;" class="" name="buscar" value="" placeholder="Buscar..." type="text">
                    <span class="input-group-btn"><button type="submit" name="submit_search" class="btn btn-secondary" style="background-color: transparent; color:black;"><i class="fa fa-search  fa-lg"></i> </button></span>
                </div>
            </form>
        </div>  
    
        

        
        
        
        
        <?php if(count($idiomas) > 1){ ?>
            <span style="float: right; top: -24px">
                <nav id="menu_gral">
                  <ul>
                    <li id="prin" style="background-color: transparent;">
                        <form action="<?=$draizp?>/es/" method="post" style="width:17px;display:inline-block;">
                        <input type='hidden' name='idioma' value='ESP' />
                        <input type="image" style="width:17px;" name="idioma" id="idioma" value="ESP" src="<?=$draizp?>/source/Spain-flag-48.png" />
                    </form> &nbsp;&nbsp;
                    <ul>
            <?php
                for($i=0; $i<=count($idiomas); $i++){
                    if($idiomas[$i][0] == 'ESP'){
                    ?>
                        <li><form action="<?=$draizp?>/es/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='ESP' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="ESP" src="<?=$draizp?>/source/Spain-flag-48.png" />
                            </form></li>
                    <?php
                    }
                    if($idiomas[$i][0] == 'RUS'){
                    ?>
                        <li><form action="<?=$draizp?>/ru/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='RUS' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="RUS" src="<?=$draizp?>/source/Russia-flag-48.png" />
                            </form></li>
                    <?php
                    }
                    if($idiomas[$i][0] == 'CAT'){
                    ?>
                        <li><form action="<?=$draizp?>/ca/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='CAT' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="CAT" src="<?=$draizp?>/source/Catalonia-flag-48.png" />
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($idiomas[$i][0] == 'UK'){
                    ?>
                        <li><form action="<?=$draizp?>/en/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='UK' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="UK" src="<?=$draizp?>/source/United-kingdom-flag-48.png" />
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($idiomas[$i][0] == 'DEU'){
                    ?>
                        <li><form action="<?=$draizp?>/de/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='DEU' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="DEU" src="<?=$draizp?>/source/Germany-flag-48.png" /> 
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($idiomas[$i][0] == 'FRA'){
                    ?>
                        <li><form action="<?=$draizp?>/fr/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='FRA' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="FRA" src="<?=$draizp?>/source/France-flag-48.png" alt="FRA" /> 
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($idiomas[$i][0] == 'ITA'){
                    ?>
                        <li><form action="<?=$draizp?>/it/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='ITA' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="ITA" src="<?=$draizp?>/source/Italy-flag-48.png" alt="ITA" />
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($idiomas[$i][0] == 'POR'){
                    ?>
                        <li><form action="<?=$draizp?>/pr/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='POR' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="POR" src="<?=$draizp?>/source/Portugal-flag-48.png" alt="POR" /> 
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                }
        ?>
                   </ul>
               </li>
                 </ul>
             </nav>
        </span>
                        <?php } ?>
        
        <?php
            if(count($divisas) > 2){
        ?>
            <span style="float: right; top: -24px">
            
            <nav id="menu_gral">
              <ul>
                  <li id='prin' style="background-color: transparent;">
                      <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='EUR' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="EUR" src="<?=$draizp?>/source/<?=$_SESSION['divisa'] == 'EUR' ? 'Euro' : ($_SESSION['divisa'] == 'USD' ? 'Dolar' : ($_SESSION['divisa'] == 'JPY' ? 'Yen' : ($_SESSION['divisa'] == 'GBP' ? 'Libra' : 'FrancoSuizo')))?>.png" />
                              </form>
                      <ul>
                      
                <?php
                    if($divisas['EUR'] == 1){
                    ?>
                          <li><form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='EUR' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="EUR" src="<?=$draizp?>/source/Euro.png" />
                              </form></li>
                    <?php
                    }
                    if($divisas['USD'] == 1){
                    ?>
                        <li><form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='USD' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="USD" src="<?=$draizp?>/source/Dolar.png" />
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($divisas['JPY'] == 1){
                    ?>
                        <li><form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='JPY' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="JPY" src="<?=$draizp?>/source/Yen.png" />
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($divisas['GBP'] == 1){
                    ?>
                        <li><form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='GBP' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="GBP" src="<?=$draizp?>/source/Libra.png" /> 
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($divisas['CHF'] == 1){
                    ?>
                        <li><form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='CHF' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="CHF" src="<?=$draizp?>/source/FrancoSuizo.png" /> 
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    
                    ?>
                     </ul>
               </li>
                 </ul>
             </nav>  
        </span>
            <?php 
            }
                 ?>
            
            
        
         
                
</div>




</div>
<?php if($fCabecera != ''){ ?>
    </div>
<?php } ?>
