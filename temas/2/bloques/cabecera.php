<?php if($cabecera == 0){ ?>
<style>

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
</style>

<div id="top">
	<div>
		<span><?=$Empresa['msgtop']?></span>
		<div>
                    <span style="float:left">Bienvenid@ <?=$_SESSION['usr']['nombre']?>&nbsp;</span>
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
			<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/cuenta"><span id="cuenta"<?=($_SESSION['usr'] != null ? 'class="opcuenta"' : '')?> class="boton"><?=($_SESSION['usr'] != null ? 'Mi cuenta' : $aux)?></span></a>
            <?php
                if(count($cestanum)>0){
            ?>
                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/cesta"><span id="cesta" class="boton"><?=$aux2?></span> <span class="num-cesta"><?=count($cestanum)?></span></a>
            <?php
                }
                if(count($presupuestonum)>0){
            ?>
                <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/presupuesto"><span id="presupuesto" class="boton">Presupuesto</span> <span class="num-cesta"><?=count($presupuestonum)?></span></a>
            <?php
                }
            ?>
			<?php if ($_SESSION['usr'] != null) { ?>
				<a class="desconectar" title="Desconectarse" href="<?=$draizp?>/acc/salir">&nbsp;</a>
			<?php } 
                        
                for($i=0; $i<=count($labelidioma); $i++){
                    if($labelidioma[$i][0] == 'buscar'){
                        $aux = $nombreidioma[$i][0];
                    }
                }
                if($inicio == 2){
                    
                    if(isset($_SERVER['HTTP_USER_AGENT'])){
                        $agent = $_SERVER['HTTP_USER_AGENT'];
                    }

                    if(strlen(strstr($agent,"Mozilla")) > 0 ){  
                        if(strlen(strstr($agent,"Chrome")) == faalse ){
                            $browser = 'mozilla';
                        }
                    }
                    if($browser=='mozilla'){
            ?>
                <div id="buscador2">
                    <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/<?=$_POST['buscar']?>" method="post">
                        <input style="background: #d15c5c;font-size: 19px !important;" name="buscar" type="text" id="busc" placeholder="<?=$aux?>..." value="<?=(isset($_POST['buscar'])) ? $_POST['buscar'] : '';?>" /><span id="BtBuscar" name="BtSubmit"></span>
                    </form>
                </div>
            <?php
                    }else{
            ?>
               <div id="buscador2">
                    <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/<?=$_POST['buscar']?>" method="post">
                        <input style="background: #d15c5c" name="buscar" type="text" id="busc" placeholder="<?=$aux?>..." value="<?=(isset($_POST['buscar'])) ? $_POST['buscar'] : '';?>" /><span id="BtBuscar" name="BtSubmit"></span>
                    </form>
                </div> 
            <?php            
                    }
                }
            ?>
             
		</div>
	</div>
</div>

<div id="cabecera">
	<div id="logo">
		<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/"><img src="<?=$draizp?>/source/<?=$logoSup?>" alt="" /></a>
	</div>
	<div id="buscador" style="display:none;">
		<div id="titulo"><?=$Empresa['nombre']?></div>
        <?php
            if($inicio != 2){
        ?>
            <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/<?=$_POST['buscar']?>" method="post">
                <input style="background: #4b4b4b" name="buscar" type="text" id="busc" placeholder="<?=$aux?>..." value="<?=(isset($_POST['buscar'])) ? $_POST['buscar'] : '';?>" /><span id="BtBuscar" style="background: #4b4b4b url(../source/lupa.png);background-position: center;background-repeat: no-repeat;" name="BtSubmit"></span>
            </form>
        <?php
            }
        ?>
	</div>
	<div id="botones">
        <?=$Empresa['localidad']?> | <?=$Empresa['provincia']?><br>
        <?php echo number_format($Empresa['telefono'], 0, '', ' '). ' | <a href="mailto:'.$Empresa['email'].'" >' .$Empresa['email']. '</a>'; ?>
        <div style="text-align:right;margin-bottom:0%;">
            <?php if(count($idiomas) >= 1){ ?>
                <form action="<?=$draizp?>/es/" method="post" style="width:17px;display:inline-block;">
                    <input type='hidden' name='idioma' value='ESP' />
                    <input type="image" style="width:17px;" name="idioma" id="idioma" value="ESP" src="<?=$draizp?>/source/Spain-flag-48.png" />
                </form> &nbsp;&nbsp;
            <?php } ?>
            <?php
                for($i=0; $i<=count($idiomas); $i++){
                    if($idiomas[$i][0] == 'RUS'){
                    ?>
                        <form action="<?=$draizp?>/ru/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='RUS' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="RUS" src="<?=$draizp?>/source/Russia-flag-48.png" />
                        </form>
                    <?php
                    }
                    if($idiomas[$i][0] == 'CAT'){
                    ?>
                        <form action="<?=$draizp?>/ca/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='CAT' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="CAT" src="<?=$draizp?>/source/Catalonia-flag-48.png" />
                        </form> &nbsp;&nbsp;
                    <?php
                    }
                    if($idiomas[$i][0] == 'UK'){
                    ?>
                        <form action="<?=$draizp?>/en/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='UK' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="UK" src="<?=$draizp?>/source/United-kingdom-flag-48.png" />
                    </form> &nbsp;&nbsp;
                    <?php
                    }
                    if($idiomas[$i][0] == 'DEU'){
                    ?>
                        <form action="<?=$draizp?>/de/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='DEU' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="DEU" src="<?=$draizp?>/source/Germany-flag-48.png" /> 
                        </form> &nbsp;&nbsp;
                    <?php
                    }
                    if($idiomas[$i][0] == 'FRA'){
                    ?>
                        <form action="<?=$draizp?>/fr/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='FRA' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="FRA" src="<?=$draizp?>/source/France-flag-48.png" alt="FRA" /> 
                        </form> &nbsp;&nbsp;
                    <?php
                    }
                    if($idiomas[$i][0] == 'ITA'){
                    ?>
                        <form action="<?=$draizp?>/it/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='ITA' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="ITA" src="<?=$draizp?>/source/Italy-flag-48.png" alt="ITA" />
                        </form> &nbsp;&nbsp;
                    <?php
                    }
                    if($idiomas[$i][0] == 'POR'){
                    ?>
                        <form action="<?=$draizp?>/pr/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='idioma' value='POR' />
                            <input type="image" style="width:17px;" name="idioma" id="idioma" value="POR" src="<?=$draizp?>/source/Portugal-flag-48.png" alt="POR" /> 
                        </form> &nbsp;&nbsp;
                    <?php
                    }
                }
        ?>
        </div>
        <div style="text-align:right;margin-bottom:0%;">
            <?php
            if(count($divisas) >= 1){
                    if($divisas['EUR'] == 1){
                    ?>
                        <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='EUR' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="EUR" src="<?=$draizp?>/source/Euro.png" />
                        </form>
                    <?php
                    }
                    if($divisas['USD'] == 1){
                    ?>
                        <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='USD' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="USD" src="<?=$draizp?>/source/Dolar.png" />
                        </form> &nbsp;&nbsp;
                    <?php
                    }
                    if($divisas['JPY'] == 1){
                    ?>
                        <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='JPY' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="JPY" src="<?=$draizp?>/source/Yen.png" />
                    </form> &nbsp;&nbsp;
                    <?php
                    }
                    if($divisas['GBP'] == 1){
                    ?>
                        <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='GBP' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="GBP" src="<?=$draizp?>/source/Libra.png" /> 
                        </form> &nbsp;&nbsp;
                    <?php
                    }
                    if($divisas['CHF'] == 1){
                    ?>
                        <form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post" style="width:17px;display:inline-block;">
                            <input type='hidden' name='divisa' value='CHF' />
                            <input type="image" style="width:17px;" name="divisa2" id="divisa2" value="CHF" src="<?=$draizp?>/source/FrancoSuizo.png" /> 
                        </form> &nbsp;&nbsp;
                    <?php
                    }
            }
                 ?>
                
        </div>
		<?php include($draiz.'/bloques/logos_sociales.php'); ?>
	</div>
</div>
<?php }else{
    if(isset($_GET['logo']))
        $_SESSION['logoURL'] = $_GET['logo']; ?>
<div id="grupo-contenido">
    <div id="contenido">
        <div>
            <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/pedido"><img src="<?=$_SESSION['logoURL'] != "" ? $_SESSION['logoURL'] : $draizp.'/source/'.$logoSup?>" alt="" style="max-height: 50px;"></a>
            &nbsp;&nbsp;<a class="desconectar" title="Mi cuenta" href="<?=$draizp?>/es/cuenta" style="background: rgba(255, 255, 255, 0.2) url('/source/perfil.png') no-repeat scroll center center / 20px auto; float: right; width: 20px; margin-left: 5px;">&nbsp;</a>&nbsp;&nbsp;
            <?php if ($_SESSION['usr'] != null) { ?>
            <a class="desconectar" title="Desconectarse" href="<?=$draizp?>/acc/salir" style="background: rgba(255, 255, 255, 0.2) url('/source/standby.png') no-repeat scroll center center / 20px auto; float: right; width: 20px;">&nbsp;</a> <span style="float: right">Bienvenid@ <?=$_SESSION['usr']['nombre']?>&nbsp;</span> 
            <?php } ?>
	</div>
    </div>
</div>
<?php } ?>

