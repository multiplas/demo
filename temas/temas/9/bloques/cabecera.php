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
    font-size: 0;
}
#menu_gral > ul li {
    display: inline-block;
    width: 50px;
    position: relative;
    background: #f7f7f7;
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
    width: 100%;
    margin: 0;
    padding: 0;
    background:  transparent;
    z-index: 5;
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

#top{
    overflow: visible;
}

#top div > span {
    display: inline;
}

#top div div a.perfil {
    background: rgba(255, 255, 255, 0) url("/source/perfil.png") no-repeat scroll center center / 16px auto;
}

#top div div a.desconectar {
    background: rgba(255, 255, 255, 0) url("/source/standby.png") no-repeat scroll center center / 16px auto;
}

#top div div a.perfil:hover{
    background: rgba(47, 47, 47, 0.3) url(/source/perfil.png) no-repeat center;
    background-size: 16px;
}

#prin:hover{
    background: rgba(47, 47, 47, 0.3) no-repeat center;
}
.num-cesta {
    background: black none repeat scroll 0 0;
    border-radius: 20px;
    color: white;
    font-weight: bold;
    margin-left: -13px;
    top: -30px;
    padding: 0 4px;
    position: relative;
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
        }
    }
    @media (min-width:940px){
        .solomovil{
            display: none;
        }
    }
    @media (max-width:940px){
        #cabecera {
            display: none;
        }
        
        .solomovil{
            display: inline;
        }
    }
    @media (max-width:900px){
        .nomostrar{
            display: none !important;
        }
        
        .posicion{
            float: right !important;
        }
        
        .perfil{
            margin-right: 18px !important;
        }
    }
    @media (max-width:1060px){
        #top > div {
            width: 100%;
        }
    }
</style>


<div id="top" style="min-height: 68px; z-index: 1000000">
	<div style="-ms-transform: translateY(-50%); -webkit-transform: translateY(-50%); transform: translateY(-50%); top: 50%">
            <?php echo "<div class='solomovil' style='float:left; margin-top: 0px; text-align: right;'>";
                if(count($cestanum)>0){
            ?>
                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/cesta"><span class="boton"><img src="/source/cesta.png"></span> <span class="num-cesta"><?=count($cestanum)?></span></a>
            <?php
                }
                if(count($presupuestonum)>0){
            ?>
                <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/presupuesto"><span id="presupuesto" class="boton">Presupuesto</span> <span class="num-cesta"><?=count($presupuestonum)?></span></a>
            <?php
                }
            ?>
            
                
        </div>
    
    <?php if(count($idiomas) > 2){ ?>
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
            if(count($idiomas) > 1){ 
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
            }
        ?>
                   </ul>
               </li>
                 </ul>
             </nav>
    </span>
    <?php } ?>
    
    <?php
            if(count($divisas) > 1){
                ?>
    <span style="float: right; top: -24px">
            
            <nav id="menu_gral">
              <ul>
                  <li id='prin' style="background-color: transparent;">
                      <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='EUR' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="EUR" src="<?=$draizp?>/source/<?=$_SESSION['divisa'] == 'EUR' ? 'Euro' : ($_SESSION['divisa'] == 'USD' ? 'Dolar' : ($_SESSION['divisa'] == 'JPY' ? 'Yen' : ($_SESSION['divisa'] == 'GBP' ? 'Libra' : 'FrancoSuizo')))?>.png" />
                              </form>
                      <ul>
                      
                <?php
                    if($divisas['EUR'] == 1){
                    ?>
                          <li><form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='EUR' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="EUR" src="<?=$draizp?>/source/Euro.png" />
                              </form></li>
                    <?php
                    }
                    if($divisas['USD'] == 1){
                    ?>
                        <li><form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='USD' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="USD" src="<?=$draizp?>/source/Dolar.png" />
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($divisas['JPY'] == 1){
                    ?>
                        <li><form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='JPY' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="JPY" src="<?=$draizp?>/source/Yen.png" />
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($divisas['GBP'] == 1){
                    ?>
                        <li><form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='GBP' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="GBP" src="<?=$draizp?>/source/Libra.png" /> 
                            </form> &nbsp;&nbsp;</li>
                    <?php
                    }
                    if($divisas['CHF'] == 1){
                    ?>
                        <li><form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
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
                
        
            
            <span class="nomostrar" style="margin-left: 5px; top: -19px;"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/">Inicio</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/contacto">Contacto</a><?php
            if($Empresa['wassap'] == 1 && $Empresa['telefono3'] != ''){
            ?>   
                
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;<?=number_format($Empresa['telefono3'], 0, '', ' ')?></b> <img src="/source/whatsapp.png" style="height: 40px;top: 14px;">
                
            <?php
            }
            ?></span>
            <div class="posicion">
                    <span class="nomostrar" style="float:left">Bienvenid@ <?=substr($_SESSION['usr']['nombre'], 0, 36)?>&nbsp;</span>
            <?php
                for($i=0; $i<=count($labelidioma); $i++){
                    if($labelidioma[$i][0] == 'cuenta'){
                        $aux = $nombreidioma[$i][0];
                    }
                    if($labelidioma[$i][0] == 'cesta'){
                        $aux2 = $nombreidioma[$i][0];
                    }
                }
            ?>
                    <a class="perfil " title="Mi cuenta" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/cuenta">&nbsp;</a>
            
			<?php if ($_SESSION['usr'] != null) { ?>
				<a class="desconectar" title="Desconectarse" href="<?=$draizp?>/acc/salir">&nbsp;</a>
			<?php } 
                        
                for($i=0; $i<=count($labelidioma); $i++){
                    if($labelidioma[$i][0] == 'buscar'){
                        $aux = $nombreidioma[$i][0];
                    }
                }
                
            ?>
             
		</div>
	</div>
</div>


    <div id="cabecera">
    
    
    <div id="logo" style="float: left">
		<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/"><img src="<?=$draizp?>/source/<?=$logoSup?>" alt="" style="height: 72px;" /></a>
	</div>

    <?php
    echo "<div style='float:right; margin-top: 0px; text-align: right;'>";
                if(count($cestanum)>0){
            ?>
                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/cesta"><span class="boton"><img src="/source/cesta.png"></span> <span class="num-cesta"><?=count($cestanum)?></span></a>
            <?php
                }
                if(count($presupuestonum)>0){
            ?>
                <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/presupuesto"><span id="presupuesto" class="boton">Presupuesto</span> <span class="num-cesta"><?=count($presupuestonum)?></span></a>
            <?php
                }
            ?>
            
                
</div>




</div>

