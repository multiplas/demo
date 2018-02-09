<?php
    for($i=0; $i<=count($labelidioma); $i++){
        if($labelidioma[$i][0] == 'descripcion'){
            $auxdes = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'talla'){
            $auxtal = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'cantidad'){
            $auxcan = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'disponibilidad'){
            $auxdis = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'disponible'){
            $auxok = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'anadir'){
            $auxana = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'rel_productos'){
            $auxrel = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'ver_mas'){
            $auxver = $nombreidioma[$i][0];
        }
    }
    $totalAtr = 0;
?>

<?php
    if($vistaprod == 2){
?>
    <div id="contenido" style="max-width:1100px !important;">
<?php  
    }else{
?>
    <div id="contenido">
<?php
    }
?>

<div id="contenido">
	<div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=@$_GET['nombre'] == 'yes' ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; top: 25%; width: 50%; z-index: 99999;">
		<h2>Ha añadido el producto a la cesta</h2>
		<p>El producto "<strong><?=@$producto['nombre']?></strong>" ha sido añadido correctamente a la cesta. Ahora puede verlo en su cesta.</p>
		<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/cesta" class="button">ver mi cesta</a>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">Seguir comprando</a>
	</div>
    
    <div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=@$_GET['nombre'] == 'yesp' ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; top: 25%; width: 50%; z-index: 99999;">
		<h2>Ha añadido el producto a presupuesto</h2>
		<p>El producto "<strong><?=@$producto['nombre']?></strong>" ha sido añadido correctamente al presupuesto. Ahora puede verlo en sus presupuestos.</p>
		<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/presupuesto" class="button">ver mi presupuesto</a>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">Seguir comprando</a>
	</div>
    
    <div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=@$_GET['nombre'] == 'no' ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; top: 25%; width: 50%; z-index: 99999;">
		<h2>No se ha podido añadir el producto a la cesta</h2>
		<p>El producto "<strong><?=@$producto['nombre']?></strong>" no ha sido añadido a la cesta por diferencias en la forma de pago con los productos de su cesta. Tramite la cesta, y luego añada este producto.</p>
		<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/cesta" class="button">ver mi cesta</a>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">Seguir comprando</a>
	</div>
    
    <div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=@$_GET['nombre'] == 'notp' ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; top: 5%; width: 50%; z-index: 99999;">
		<h2>No se ha podido añadir el producto a la cesta</h2>
                <p>El producto "<strong><?=@$producto['nombre']?></strong>" no ha sido añadido a la cesta. Actualmente no está disponible.</p>
		<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta" class="button">ver mi cesta</a>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">Seguir comprando</a>
	</div>

    <?php
        if($vistaprod == 2){
    ?>
        <div itemscope itemtype="http://schema.org/Product" id="producto" style="width:100% !important;">
    <?php  
        }else{
    ?>
        <div itemscope itemtype="http://schema.org/Product" id="producto">
    <?php
        }

			if ($producto == null)
			{
				echo '<p>El producto indicado no existe!</p>';
			}
			else
			{
				$_SESSION['producto'] = $producto;
                
                if($vistaprod == 1){
            ?>
                    <h1 style="text-align:center;" itemprop="name"><?=$producto['nombre']?></h1>
                    <hr>
            <?php
                }elseif($vistaprod == 2){
            ?>   
                    <h1 style="text-align:center;" itemprop="name"><?=$producto['nombre']?></h1>
                    <br>              
            <?php
                }else{
            ?>   
                    <h2 itemprop="name"><?=$producto['nombre']?></h2>                
        <?php
                }
		?>
				<!--<div class="producto">
					<div class="foto">
						<?php /*include_once('./componentes/sliderP.php');*/ ?>
						<iframe frameborder="0" src="<?=$draizp?>/componentes/slippry-1.3.1/demo/index.php" style="display: block; width: 100%; margin: auto; height: 100%;"></iframe>
					</div>
					<div class="info">
						<div class="info2">
							<span class="descuento"><?=($producto['descuento'] > 0) ? '-'.$producto['descuento'].' '.$producto['descuentoe'] : '';?></span>
							<span class="precioAnterior"><?=($producto['descuento'] > 0) ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : '';?></span>
							<span class="precio"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')?> <?=$_SESSION['moneda']?></span>
						</div>
						<div class="descripcion">
							<?php //echo $producto['descripcion']?>
						</div>
						<form action="<?=$draizp?>/acc/anadir/<?=$producto['id']?>" method="post">
							<div class="talla">
								Talla:&nbsp;&nbsp;
								<select id="talla" name="talla">
									<option value="sin-talla">Seleccionar</option>
									<?php
										foreach ($producto['tallas'] AS $talla)
										{
											?>
											<option value="<?=strtolower($talla)?>"><?=$talla?></option>
											<?php
										}
									?>
								</select>
							</div>
							<div class="talla"<?=$producto['personalizable'] != 1 ? ' style="display: none;"' : ''?>>
								Bandera:&nbsp;&nbsp;
								<select id="color" name="color">
									<option value="NP" selected>Sin Bandera</option>
									<?php
										foreach($paises as $pais)
											echo '<option value="'.$pais['nombre'].'">'.$pais['nombre'].'</option>';
									?>
								</select>
							</div><br>
							<label style="font-weight: bold; padding: 0px 20px;" <?=$producto['personalizable'] != 1 ? ' style="display: none;"' : ''?>><?=$producto['personalizable'] != 1 ? '&nbsp;' : 'Tu nombre:'?></label><input <?=$producto['personalizable'] != 1 ? ' style="display: none;"' : ''?> type="text" name="tunombre" placeholder="Pon tu nombre en el guante" style="width: 260px;" value=""><br>
							&nbsp;&nbsp;&nbsp;
							<span class="button" name="BtSubmit">Añadir a la cesta</span>
							<div style="float: right; margin-top: 15px; margin-right: 15px;">
								<span class="fb-share-button" style="float: right; margin-left: 6px;" data-href="http://<?=($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?>" data-layout="button"></span>
								<span class="g-plus" data-action="share" data-annotation="none" data-href="http://<?=($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'])?>"></span>
								<a href="https://twitter.com/share" class="twitter-share-button" data-lang="es" data-count="none" data-dnt="true">Twittear</a>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
							</div>
						</form>
					</div>
				</div>-->
        
                <?php
                    if($vistaprod == 1){
                ?>
                    <style>
                        #grupo-contenido #contenido #producto .producto-r .info span{
                            width: 100% !important;
                            border: none !important;
                        }
                        
                        #grupo-contenido #contenido #producto .producto-r .talla
                        {
                            display: block;
                            margin: 25px auto;
                            max-width: 350px;
                            width: 40%;
                        }
                        
                        #grupo-contenido #contenido #producto .producto-r span.button {
                            margin: 25px auto;
                        }
                    </style>
                    <div class="producto-r">
					<div class="foto">
						<div class="fotorama" data-transition="dissolve" data-loop="true" data-autoplay="true" data-arrows="false" data-click="false" data-fit="cover" data-nav="thumbs" data-swipe="false">
                                <img src="<?=$draizp?>/imagenesproductos/<?=@$_SESSION['producto']['imagen']?>" alt="">
                                <?php
                                    foreach (@$_SESSION['producto']['imagenes'] AS $imagen)
                                    {
                                        ?>
                                        <img src="<?=$draizp?>/imagenesproductos/<?=$imagen?>" alt="">
                                        <?php
                                    }
                                ?>
                        </div>	
					</div>
                    <form action="<?=$draizp?>/acc/anadir/<?=$producto['id']?>" method="post">
                        <style>
                        #modal {
                            width:100%; /*Toma el 100% del ancho de la página*/
                            height:100%; /*Toma el 100% del alto de la página*/
                            position:fixed; /*Con este código hacemos que el contenedor se mantenga en la pantalla y para que tome las dimensiones del body y no de la entrada*/
                            background-color: rgba(1, 1, 1, 0.9); /*Color de fondo, incluye opacidad del 90%*/
                            vertical-align: middle;
                            top:0; /*Position superior*/
                            left:0; /*Posición lateral*/
                            z-index:99999999; /*Evitamos que algún elemento del blog sobreponga la ventana modal*/
                        }
                        #contenido-interno { 
                            margin:2% auto; /*Separación arriba y centrado*/
                            vertical-align: middle;
                            font-size:12px; /*Tamaño de la fuente*/
                            height:auto; /*Ancho del contenedor*/
                            width:auto;
                            text-align:center; /*Alineación del texto*/
                            color:#222; /*Color del texto*/
                            background:rgba(255, 255, 255, 0); /*Color de fondo*/
                        }
                        #myImg{
                            width: auto;
                            height: 635px;
                            border-radius: 25px;
                            -webkit-border-radius: 25px;
                            -moz-border-radius: 25px;
                        }
                    </style>
                        
                    <script type="text/javascript">
                        function mostrareldiv(url) {
                        document.getElementById("modal").style.display = "block" ; // permite asignar display:block al elemento #modal
                        document.getElementById("myImg").src = url;
                        }

                        function ocultareldiv() {
                        document.getElementById("modal").style.display = "none" ; // permite ocultar el contenedor al hacer clic en alguna parte de éste mediante display:none en el elemento #modal
                        }
                    </script>
                        
                    <div onclick="ocultareldiv()" id="modal" style="display:none">
                        <div id="contenido-interno">
                        <img id="myImg" src="" >
                    </div></div>
                        
                    <div class="fotorama" data-transition="dissolve" data-loop="true" data-autoplay="true" data-arrows="false" data-click="false" data-fit="cover" data-nav="thumbs" data-swipe="false">
                            <img src="<?=$draizp?>/imagenesproductos/<?=@$_SESSION['producto']['imagen']?>" alt="">
                            <?php
                                foreach (@$_SESSION['producto']['imagenes'] AS $imagen)
                                {
                                    ?>
                                    <img src="<?=$draizp?>/imagenesproductos/<?=$imagen?>" alt="">
                                    <?php
                                }
                            ?>
                    </div>	
                        <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                        <div style="display:table-cell;width:100%;">
						<div style="text-align:center;"class="talla"<?=count($producto['tallas']) < 1 ? ' style="display: none;"' : ''?>>
							<select id="talla-r" name="talla">
								
								<?php
									if (count($producto['tallas']) < 1)
									{
										?>
										<option value="sin-talla" selected>Sin Talla</option>
										<?php
									}
									else
									{
										?>
										<option value="">Elige Talla</option>
										<?php
									}
								?><?php
									foreach ($producto['tallas'] AS $talla)
									{
										?>
										<option value="<?=strtolower($talla)?>"><?=$talla?></option>
										<?php
									}
								?>
							</select>
						</div>
						<!--<div class="talla">
							<select id="perso-r" name="perso" style="display: <?=$producto['personalizable'] != 1 ? 'none;' : 'block'?>;">
								<option value="0">Sin Personalizar</option>
								<option value="1">Nombre y/o número (+5.00<?=$_SESSION['moneda']?>)</option>
								<option value="2">Nombre y/o número + bandera (+8.00<?=$_SESSION['moneda']?>)</option>
							</select>
						</div>
						<div id="personalicesug" class="talla" style="display: none; height: 0px; overflow: hidden; width: auto;">
							<input type="text" name="tunombre" placeholder="Nombre;Número Ej: Luís;9" style="width: 260px;" value=""><br>
							<select id="color-r" name="color">
								<option value="" selected>Sin Bandera</option>
								<?php
									foreach($paises as $pais)
										echo '<option value="'.$pais['nombre'].'">'.$pais['nombre'].'</option>';
								?>
							</select>
							<input type="hidden" id="precioparapr" value="<?=$producto['precio']?>">
						</div>
						&nbsp;&nbsp;&nbsp;-->
                        
						<div class="talla" style="text-align:center;">
                            <label style="color: #333; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;<?=$producto['precio'] != 'Consultar' ? '' : ' display: none;'?>">Cantidad</label>
							<select id="cantidadmuliselect" name="cantidadmuliselect" style="<?=$producto['precio'] != 'Consultar' ? '' : ' display: none;'?>">
								<?php
									for($i = 1; $i <= 10; $i++)
										echo '<option value="'.$i.'">'.$i.'</option>';
								?>
							</select>
						</div>
                        <div class="info">
						<!--<span class="descuento">&nbsp;<?=($producto['descuento'] > 0 && $producto['precio'] != 'Consultar') ? '-'.$producto['descuento'].' '.$producto['descuentoe'] : '';?>&nbsp;</span>
                        
                            <span class="precioAnterior">&nbsp;<?=($producto['descuento'] > 0 && $producto['precio'] != 'Consultar') ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : '';?>&nbsp;</span>-->
                            <span itemprop="price" id="preciopr" class="precio">Precio: <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')?><?=$producto['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?> <?=@$totalAtr > 0 ? '+'. number_format($totalAtr, 2, ',', '.') .'€' : ''?></span>
                        </div>
                        <?php
                            if ($producto['precio'] != 'Consultar')
                            {
                                 
                                            if(($producto['agotado'] == 1 && $producto['pagotado'] == 0) || $producto['agotado'] == 0){
                                                if($producto['unidades'] > 0 || ($producto['unidades'] <= 0 && $producto['pagotado'] == 0)){
                                            ?>
                                                    <span class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '<?=$draizp?>/acc/anadir/<?=$producto['id']?>/'+$('#cantidadmuliselect').val());">Añadir a la cesta</span>
                                    <?php
                                                }else if($producto['pagotado'] == 2){
                                               ?>
                                                    <a href='<?=$draizp?>/<?=$_SESSION['lenguaje']?>contacto/<?=$producto['nombre']?>(<?=$producto['id']?>)' class="button">Solicitar Info</a>
                                    <?php 
                                                }
                                            }else if($producto['pagotado'] == 2){
                                               ?>
                                                    <a href='<?=$draizp?>/<?=$_SESSION['lenguaje']?>contacto/<?=$producto['nombre']?>(<?=$producto['id']?>)' class="button">Solicitar Info</a>
                                    <?php 
                                            }
                            }
                            else
                            {
                                ?><a class="button" name="BtSubmit" href="<?=$draizp?>/contacto/<?=str_replace(' ', '-', $producto['nombre'])?>">Consultar Precio</a><?php
                            }
                        ?>
						<!--<span class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '/acc/anadir/<?=$producto['id']?>/2');">Compra 2 (Ahorra 10%)</span>
						<span class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '/acc/anadir/<?=$producto['id']?>/3');">Compra 3 (Ahorra 15%)</span>-->
                        </div>
                    <?php }else{ ?>
                            <style>
                                .talla{
                                    color:#ce3c3c;
                                    border: solid 2px #ce3c3c;
                                    padding: 5px;
                                }
                                .talla:hover{
                                    color:white;
                                    border: solid 2px white;
                                    background: #ce3c3c;
                                    padding: 5px;
                                }
                            </style>
                            <div style="display:table-cell;width:100%;">
                                <div class="talla" style="text-align:center;font-size:25px;"><a href="<?=$draizp?>/cuenta/">VER PRECIOS</a></div>
                            </div>
                    <?php } ?>
					</form>
                    <div itemprop="description" class="descripcion"><br>
                        <!-- Buttons start here. Copy this ul to your document. -->
                                <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
                              <div class="social-sharing" style="text-align: center;" data-permalink="http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>">
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" class="share-facebook">
                                  <span class="icon icon-facebook" aria-hidden="true"></span>
                                  <span class="share-title">Compartir</span>
                                </a>

                                <!-- https://dev.twitter.com/docs/intents -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://twitter.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&amp;text=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>&amp;" class="share-twitter">
                                  <span class="icon icon-twitter" aria-hidden="true"></span>
                                  <span class="share-title">Tweet</span>
                                </a>

                                <!--
                                  https://developers.pinterest.com/pin_it/
                                  Pinterest get data from the same Open Graph meta tags Facebook uses
                                -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://pinterest.com/pin/create/button/?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&amp;media=<?=@$og_image?>&amp;description=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>" class="share-pinterest">
                                  <span class="icon icon-pinterest" aria-hidden="true"></span>
                                  <span class="share-title">Pin it</span>
                                </a>

                                <!-- https://developers.google.com/+/web/share/ -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://plus.google.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" class="share-google">
                                  <!-- Cannot get Google+ share count with JS yet -->
                                  <span class="icon icon-google" aria-hidden="true"></span>
                                  <span class="share-title">+1</span>
                                </a>

                                <!-- https://developer.linkedin.com/plugins/share -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&title=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>" class="share-linkedin">
                                  <span class="icon icon-linkedin" aria-hidden="true"></span>
                                  <span class="share-title">Compartir</span>
                                </a>

                                <!-- http://blogs.skype.com/2015/11/04/introducing-share-button-effortless-sharing-that-sparks-richer-conversations/ -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://web.skype.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&lang=es-es" class="share-skype">
                                  <span class="icon icon-skype" aria-hidden="true"></span>
                                  <span class="share-title">Compartir</span>
                                </a>
                              </div>
                            <!-- Buttons end here -->
                        <!--<h2>DESCRIPCIÓN</h2>
						<?php //echo $producto['descripcion']?> -->
					</div>
                    </div>
                    <br><hr>
                        
                <?php        
                    }else if($vistaprod == 0){                     
                ?>
        
				<div class="producto-r">
                    <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
					<div class="info">
						<span class="descuento">&nbsp;<?=($producto['descuento'] > 0 && $producto['precio'] != 'Consultar') ? '-'.$producto['descuento'].' '.$producto['descuentoe'] : '';?>&nbsp;</span>
                        
                            <span class="precioAnterior">&nbsp;<?=($producto['descuento'] > 0 && $producto['precio'] != 'Consultar') ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : '';?>&nbsp;</span>
                            <span itemprop="price" id="preciopr" class="precio"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')?><?=$producto['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?> <?=@$totalAtr > 0 ? '+'. number_format($totalAtr, 2, ',', '.') .'€' : ''?></span>
                        </div>
                    <?php } ?>
					<div class="foto">
						<script language="javascript" type="text/javascript">
						  function resizeIframe(obj) {
							obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
						  }
						</script>
						<?php /*include_once('./componentes/sliderPres.php');*/ ?>
						<iframe frameborder="0" src="<?=$draizp?>/componentes/slippry-1.3.1/demo/index.php" style="display: block; width: 100%; margin: auto;" onload="javascript:resizeIframe(this);"></iframe>
					</div>
					<form action="<?=$draizp?>/acc/anadir/<?=$producto['id']?>" method="post">
                        <div style="float: right; margin-top: 0px; width: 100%;">
                            <!-- Buttons start here. Copy this ul to your document. -->
                                <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
                              <div class="social-sharing" style="text-align: center;" data-permalink="http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>">
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" class="share-facebook">
                                  <span class="icon icon-facebook" aria-hidden="true"></span>
                                  <span class="share-title">Compartir</span>
                                </a>

                                <!-- https://dev.twitter.com/docs/intents -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://twitter.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&amp;text=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>&amp;" class="share-twitter">
                                  <span class="icon icon-twitter" aria-hidden="true"></span>
                                  <span class="share-title">Tweet</span>
                                </a>

                                <!--
                                  https://developers.pinterest.com/pin_it/
                                  Pinterest get data from the same Open Graph meta tags Facebook uses
                                -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://pinterest.com/pin/create/button/?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&amp;media=<?=@$og_image?>&amp;description=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>" class="share-pinterest">
                                  <span class="icon icon-pinterest" aria-hidden="true"></span>
                                  <span class="share-title">Pin it</span>
                                </a>

                                <!-- https://developers.google.com/+/web/share/ -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://plus.google.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" class="share-google">
                                  <!-- Cannot get Google+ share count with JS yet -->
                                  <span class="icon icon-google" aria-hidden="true"></span>
                                  <span class="share-title">+1</span>
                                </a>

                                <!-- https://developer.linkedin.com/plugins/share -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&title=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>" class="share-linkedin">
                                  <span class="icon icon-linkedin" aria-hidden="true"></span>
                                  <span class="share-title">Compartir</span>
                                </a>

                                <!-- http://blogs.skype.com/2015/11/04/introducing-share-button-effortless-sharing-that-sparks-richer-conversations/ -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://web.skype.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&lang=es-es" class="share-skype">
                                  <span class="icon icon-skype" aria-hidden="true"></span>
                                  <span class="share-title">Compartir</span>
                                </a>
                              </div>
                            <!-- Buttons end here -->
						</div><br><br>
                        <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
						<div class="talla"<?=count($producto['tallas']) < 1 ? ' style="display: none;"' : ''?>>
							<select id="talla-r" name="talla">
								
								<?php
									if (count($producto['tallas']) < 1)
									{
										?>
										<option value="sin-talla" selected>Sin Talla</option>
										<?php
									}
									else
									{
										?>
										<option value="">Elige Talla</option>
										<?php
									}
								?><?php
									foreach ($producto['tallas'] AS $talla)
									{
										?>
										<option value="<?=strtolower($talla)?>"><?=$talla?></option>
										<?php
									}
								?>
							</select>
						</div>
						<!--<div class="talla">
							<select id="perso-r" name="perso" style="display: <?=$producto['personalizable'] != 1 ? 'none;' : 'block'?>;">
								<option value="0">Sin Personalizar</option>
								<option value="1">Nombre y/o número (+5.00<?=$_SESSION['moneda']?>)</option>
								<option value="2">Nombre y/o número + bandera (+8.00<?=$_SESSION['moneda']?>)</option>
							</select>
						</div>
						<div id="personalicesug" class="talla" style="display: none; height: 0px; overflow: hidden; width: auto;">
							<input type="text" name="tunombre" placeholder="Nombre;Número Ej: Luís;9" style="width: 260px;" value=""><br>
							<select id="color-r" name="color">
								<option value="" selected>Sin Bandera</option>
								<?php
									foreach($paises as $pais)
										echo '<option value="'.$pais['nombre'].'">'.$pais['nombre'].'</option>';
								?>
							</select>
							<input type="hidden" id="precioparapr" value="<?=$producto['precio']?>">
						</div>
						&nbsp;&nbsp;&nbsp;-->
                        <label style="color: #333; float: left; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;<?=$producto['precio'] != 'Consultar' ? '' : ' display: none;'?>">Cantidad</label>
						<div class="talla">
							<select id="cantidadmuliselect" name="cantidadmuliselect" style="width: auto !important;<?=$producto['precio'] != 'Consultar' ? '' : ' display: none;'?>"> <?=@$totalAtr > 0 ? '+'. number_format($totalAtr, 2, ',', '.') .'€' : ''?>
								<?php
									for($i = 1; $i <= 10; $i++)
										echo '<option value="'.$i.'">'.$i.'</option>';
								?>
							</select>
						</div>
                        <?php
                            if ($producto['precio'] != 'Consultar')
                            {
                                ?><span class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '<?=$draizp?>/acc/anadir/<?=$producto['id']?>/'+$('#cantidadmuliselect').val());">Añadir a la cesta</span><?php
                            }
                            else
                            {
                                ?><a class="button" name="BtSubmit" href="<?=$draizp?>/contacto/<?=str_replace(' ', '-', $producto['nombre'])?>">Consultar Precio</a><?php
                            }
                        ?>
						<!--<span class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '/acc/anadir/<?=$producto['id']?>/2');">Compra 2 (Ahorra 10%)</span>
						<span class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '/acc/anadir/<?=$producto['id']?>/3');">Compra 3 (Ahorra 15%)</span>-->
                     <?php }else{ ?>
                            <style>
                                .talla{
                                    color:#596cad;
                                    border: solid 2px #596cad;
                                    padding: 5px;
                                    margin: 0 auto !important;
                                }
                                .talla:hover{
                                    color:white;
                                    border: solid 2px white;
                                    background: #596cad;
                                    padding: 5px;
                                }
                            </style>
                            <div class="talla" style="text-align:center;font-size:25px;"><a href="<?=$draizp?>/cuenta/">VER PRECIOS</a></div>
                    <?php } ?>
					</form>
					<div itemprop="description" class="descripcion">
						<?=$producto['descripcion']?>
                                            
                                            <?php if($producto['plazoEnt'] != ''){ ?><b>Plazo de Entrega:</b> <?=$producto['plazoEnt']?><br><br><?php } ?>
					</div>
				</div>
            <?php
                }else if($vistaprod == 2){
            ?>
                    <style>
                        #grupo-contenido #contenido #producto .producto-r .info span{
                            width: 100% !important;
                            border: none !important;
                        }
                        
                        #grupo-contenido #contenido #producto .producto-r .talla
                        {
                            display: block;
                            margin: 25px auto;
                            max-width: 350px;
                            width: 40%;
                        }
                        
                        #grupo-contenido #contenido #producto .producto-r span.button {
                            margin: 25px auto;
                        }
                    </style>
                    <div class="producto-r">
					<div class="foto">
						<script language="javascript" type="text/javascript">
						  function resizeIframe(obj) {
							obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
						  }
						</script>
						<?php /*include_once('./componentes/sliderPres.php');*/ ?>
						<iframe frameborder="0" src="<?=$draizp?>/componentes/slippry-1.3.1/demo/index.php" style="display: block; width: 100%; margin: auto;" onload="javascript:resizeIframe(this);"></iframe>
					</div>
                    <form action="<?=$draizp?>/acc/anadir/<?=$producto['id']?>" method="post" style="max-height: 550px !important;">
                        <style>
                        #modal {
                            width:100%; /*Toma el 100% del ancho de la página*/
                            height:100%; /*Toma el 100% del alto de la página*/
                            position:fixed; /*Con este código hacemos que el contenedor se mantenga en la pantalla y para que tome las dimensiones del body y no de la entrada*/
                            background-color: rgba(1, 1, 1, 0.9); /*Color de fondo, incluye opacidad del 90%*/
                            vertical-align: middle;
                            top:0; /*Position superior*/
                            left:0; /*Posición lateral*/
                            z-index:99999999; /*Evitamos que algún elemento del blog sobreponga la ventana modal*/
                        }
                        #contenido-interno { 
                            margin:2% auto; /*Separación arriba y centrado*/
                            vertical-align: middle;
                            font-size:12px; /*Tamaño de la fuente*/
                            height:auto; /*Ancho del contenedor*/
                            width:auto;
                            text-align:center; /*Alineación del texto*/
                            color:#222; /*Color del texto*/
                            background:rgba(255, 255, 255, 0); /*Color de fondo*/
                        }
                        #myImg{
                            width: auto;
                            height: 635px;
                            border-radius: 25px;
                            -webkit-border-radius: 25px;
                            -moz-border-radius: 25px;
                        }
                    </style>
                        
                    <script type="text/javascript">
                        function mostrareldiv(url) {
                            document.getElementById("modal").style.display = "block" ; // permite asignar display:block al elemento #modal
                            document.getElementById("myImg").src = url;
                        }

                        function ocultareldiv() {
                            document.getElementById("modal").style.display = "none" ; // permite ocultar el contenedor al hacer clic en alguna parte de éste mediante display:none en el elemento #modal
                        }
                        
                        function mostrar() {
                           var elElemento=document.getElementById("descp");
                           var elElemento2=document.getElementById("d1");
                           if(elElemento.style.display == 'block') {
                            elElemento.style.display = 'none';
                            elElemento2.style.display = 'block';
                           } else {
                            elElemento.style.display = 'block';
                            elElemento2.style.display = 'none';
                           }
                        }
                        
                    </script>
                        <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                        <div style="width:100%;">
                        <h2 class="click-desc" onclick="mostrar();"><img style="height:17px;width:17px;float:left;margin-top:6px;margin-left:5px" src="<?=$draizp?>/source/flecha_abajo.png" /> <?=$auxdes?> <img style="height:17px;width:17px;float:right;margin-top:6px;margin-right:5px;" src="<?=$draizp?>/source/flecha_abajo.png" /></h2> 
                        <?php
                        $texto_size = 30;
                        $text = $producto['descripcion'];
                        $text = strip_tags($text);
                        $textlen = strlen($text);
                        $pos = 0;
                        $espacios = 0;
                        while ($espacios < $texto_size && $pos < $textlen)
                        {
                            if ($text[$pos] == ' ')
                                $espacios++;
                            if ($espacios < $texto_size && $pos < $textlen)
                                $pos++;
                        }
                        $pos--;
                        $sppos = strpos($text, ' ', $pos);
                        if ($sppos < 1) $sppos = $textlen - 1;
                        if (strlen($text) > $sppos)
                        {
                            $descripcion = str_replace("\r\n", '<br>', substr($text, 0, $sppos));
                            if (strlen($text) > $sppos)
                                $descripcion .= '...';
                        }
                        ?>
                        <div id="d1" style="padding:0px 10px;padding-bottom:10px;margin-top:-45px;">
                            <?=$descripcion?>
                        </div>
                        <br>
                        <div id="descp" style="max-height:400px;overflow-y:scroll;position:absolute;background:rgba(238, 238, 238, 0.87);display:none;padding:0px 10px;padding-bottom:10px;margin-top:-65px;">
                            <?=$producto['descripcion']?>
                        </div>
                        <div style="display:table;width:100%;">
                                <?php
                                    $aux = null;
                                    $c = 0;
                                    if(count($atributos) == 0){ ?>
                                        <div><div><div>
                                    <?php
                                     }
                                    foreach ($atributos AS $atributo){ 
                                        
                                        if($atributo['nombre'] != $aux && $c == 0){ ?>
                                            <script>
                                                $(document).on("change", "#<?=$atributo['nombre']?>", function(){  
                                                    $.post("/ajax/precio.php", {id: <?=$producto['id']?>, valor: $( "#<?=$atributo['nombre']?>" ).val(), moneda1: '<?=$Empresa['moneda']?>', moneda2: '<?=$_SESSION['divisa']?>' }, function(respuesta){ 
                                                        var tot = $('#totalspan').data('precio');
                                                        tot = parseFloat(tot) - parseFloat($("#<?=$atributo['nombre']?>").data('precio')) + parseFloat(respuesta);
                                                        $("#<?=$atributo['nombre']?>").attr('data-precio', respuesta);
                                                        $('#totalspan').attr('data-precio', tot);
                                                        tot = tot.toFixed(2);
                                                        tot = tot.replace(",","/");
                                                        tot = tot.replace(".",",");
                                                        tot = tot.replace("/",".");
                                                        $('#totalspan').html(tot);
                                                    });
                                                });
                                        </script>
                                            <?php if($atributo['obligatorio'] == 'Si'){
                                                $totalAtr += $atributo['precio'];
                                            }
                                            ?>
                                            <div style="display:table-row;">
                                            <div style="display:table-cell;vertical-align:middle;width:66%;">
                                                <label style="color: #333; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;" ><?=$atributo['nombre']?>:</label>
                                            </div>
                                            <div style="display:table-cell;height:50px;vertical-align:middle;">
                                                <div style="margin:0 !important;width:100% !important;" class="talla">
                                                    <select id="<?=$atributo['nombre']?>" style="width:100%;" name="<?=$atributo['nombre']?>" <?=@$atributo['obligatorio'] == 'Si' ? 'disabled' : ''?> data-precio="0">
                                                        <?=@$atributo['obligatorio'] == 'Si' ? '' : '<option value="" selected>Ninguno/a</option>'?>
                                                        <option value="<?=$atributo['atributo']?>"><?=$atributo['atributo']?></option>
                                <?php
                                            $aux = $atributo['nombre'];
                                            $c = 1;
                                        }else if($atributo['nombre'] != $aux && $c == 1){
                                            if($atributo['obligatorio'] == 'Si'){
                                                $totalAtr += $atributo['precio'];
                                            }
                                ?>
                                                    </select>
                                                </div>
                                            </div>
                                            </div>
                                            <div style="display:table-row;">
                                            <div style="display:table-cell;vertical-align:middle;width:66%;">
                                                <label style="color: #333; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;" ><?=$atributo['nombre']?>:</label>
                                            </div>
                                            <div style="display:table-cell;height:50px;vertical-align:middle;">
                                            <script>
                                                $(document).on("change", "#<?=$atributo['nombre']?>", function(){  
                                                    $.post("/ajax/precio.php", {id: <?=$producto['id']?>, valor: $( "#<?=$atributo['nombre']?>" ).val(), moneda1: '<?=$Empresa['moneda']?>', moneda2: '<?=$_SESSION['divisa']?>' }, function(respuesta){ 
                                                        var tot = $('#totalspan').data('precio');
                                                        tot = parseFloat(tot) - parseFloat($("#<?=$atributo['nombre']?>").data('precio')) + parseFloat(respuesta);
                                                        $("#<?=$atributo['nombre']?>").attr('data-precio', respuesta);
                                                        $('#totalspan').attr('data-precio', tot);
                                                        tot = tot.toFixed(2);
                                                        tot = tot.replace(",","/");
                                                        tot = tot.replace(".",",");
                                                        tot = tot.replace("/",".");
                                                        $('#totalspan').html(tot);
                                                    });
                                                });
                                        </script>
                                                <div style="margin:0 !important;width:100% !important;" class="talla">
                                                    <select id="talla-r" style="width:100%;" name="<?=$atributo['nombre']?>" <?=@$atributo['obligatorio'] == 'Si' ? '' : ''?> data-precio="0"> 
                                                        <?=@$atributo['obligatorio'] == 'Si' ? '' : '<option value="" selected>Ninguno/a</option>'?>
                                                        <option selected value="<?=$atributo['atributo']?>"><?=$atributo['atributo']?></option>
                                            
                                <?php
                                        }else{
                                ?>

                                            <option value="<?=$atributo['atributo']?>"><?=$atributo['atributo']?></option>
                                
                                <?php
                                        }
                                    }
                                ?>
                                            </select>
                                    </div>
                                </div>
                                </div>
                                <!--<div style="display:table-cell;vertical-align:middle;width:76%;">
                                    <label style="color: #333; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;" ><?=$auxtal?>:</label>
                                </div>
                                <div style="display:table-cell;height:50px;vertical-align:middle;">
                                    <div style="margin:0 !important;width:100% !important;" class="talla"<?=count($producto['tallas']) < 1 ? ' style="display: none;"' : ''?>>
                                        <select id="talla-r" style="width:100%;" name="talla">
                                            <?php
                                                if (count($producto['tallas']) < 1)
                                                {
                                                    ?>
                                                    <option value="sin-talla" selected>Sin Talla</option>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                    <option value="">Elige Talla</option>
                                                    <?php
                                                }
                                            ?><?php
                                                foreach ($producto['tallas'] AS $talla)
                                                {
                                                    ?>
                                                    <option value="<?=strtolower($talla)?>"><?=$talla?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>-->
                            </div>
                            <?php if($producto['fDirecta'] == 1){
                                if (count($cuotas) > 0){ ?>
                            <div style="display:table;width:100%;">
                                <div style="display:table-row;">
                                    <div style="display:table-cell;vertical-align:middle;width:66%;">
                                        <label style="color: #333; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;<?=$producto['precio'] != 'Consultar' ? '' : ' display: none;'?>">Financiación:</label>
                                    </div>
                                    <div style="display:table-cell;height:50px;vertical-align:middle;">
                                        <div class="talla" style="margin:0 !important;width:100% !important;">
                                            <select id="financiacion" style="width:100%;" name="financiacion" data-cuota="1">
                                                <option value="0">No Financiado</option>
                                                <?php foreach ($cuotas AS $cuota){ ?>
                                                    <option value="<?=$cuota['id']?>"><?=number_format($cuota['precio'],2,',','.')?> x <?=$cuota['meses']?> meses</option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php  }
                            } ?>
                            <div style="display:table-row;">
                                <div style="display:table-cell;vertical-align:middle;width:76%;">
                                    <label style="color: #333; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;<?=$producto['precio'] != 'Consultar' ? '' : ' display: none;'?>"><?=$auxcan?>:</label>
                                </div>
                                <div style="display:table-cell;height:50px;vertical-align:middle;">
                                    <div class="talla" style="margin:0 !important;width:100% !important;">
                                        <select id="cantidadmuliselect" name="cantidadmuliselect" style="<?=$producto['precio'] != 'Consultar' ? '' : ' display: none;'?>">
                                            <?php
                                                for($i = 1; $i <= 10; $i++)
                                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div style="display:table-row;">
                                <div style="display:table-cell;vertical-align:middle;width:76%;">
                                    <label style="color: #333; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;" ><?=$auxdis?>:</label>
                                </div>
                                <div style="display:table-cell;text-align:right;height:50px;vertical-align:middle;">
                                    <label style="color: #575757; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;" ><?=$auxok?></label>
                                </div>
                            </div>
                            <div style="display:table-row;">
                                <div style="display:table-cell;vertical-align:middle;width:76%;">
                                    <span itemprop="price" id="preciopr" style="padding:0 !important;font-size:2em;margin-right: 15px; margin-top: 7px;" class="precio"><span id="totalspan" data-precio="<?=$producto['precio']?>"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')?></span><?=$producto['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?> <?=@$totalAtr > 0 ? '+'. number_format($totalAtr, 2, ',', '.') .$_SESSION['moneda'] : ''?></span>
                                </div>
                                <div style="display:table-cell;vertical-align:middle;">
                                    <?php
                                        if ($producto['precio'] != 'Consultar')
                                        {
                                            ?><span class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '<?=$draizp?>/acc/anadir/<?=$producto['id']?>/'+$('#cantidadmuliselect').val());"><?=$auxana?></span>
                                    <?php
                                        }
                                        else
                                        {
                                            ?><span class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '<?=$draizp?>/acc/anadir/<?=$producto['id']?>/'+$('#cantidadmuliselect').val());">Consultar precio</span>
                                    <?php
                                        }
                                    ?>   
                                </div>
                            </div>             
                        </div>
                        <?php if($producto['aplazame'] == 1){ ?>
                            <div style="display:table-row;">
                                <div style="display:table-cell;vertical-align:middle;width:100%;">
                                    <span style="padding:0 !important;font-size:2em;margin-right: 15px; margin-top: 7px;" class="precio"><small>Financialo con Aplazame por <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['caplazame1']), 2, ',', '.')?><?=$_SESSION['moneda']?> + <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['caplazame']), 2, ',', '.')?><?=$_SESSION['moneda']?> al mes</small></span>
                                </div>
                            </div>
                            <?php } ?>
						
						<!--<div class="talla">
							<select id="perso-r" name="perso" style="display: <?=$producto['personalizable'] != 1 ? 'none;' : 'block'?>;">
								<option value="0">Sin Personalizar</option>
								<option value="1">Nombre y/o número (+5.00<?=$_SESSION['moneda']?>)</option>
								<option value="2">Nombre y/o número + bandera (+8.00<?=$_SESSION['moneda']?>)</option>
							</select>
						</div>
						<div id="personalicesug" class="talla" style="display: none; height: 0px; overflow: hidden; width: auto;">
							<input type="text" name="tunombre" placeholder="Nombre;Número Ej: Luís;9" style="width: 260px;" value=""><br>
							<select id="color-r" name="color">
								<option value="" selected>Sin Bandera</option>
								<?php
									foreach($paises as $pais)
										echo '<option value="'.$pais['nombre'].'">'.$pais['nombre'].'</option>';
								?>
							</select>
							<input type="hidden" id="precioparapr" value="<?=$producto['precio']?>">
						</div>
						&nbsp;&nbsp;&nbsp;-->
                        
                        <div class="info">
						<!--<span class="descuento">&nbsp;<?=($producto['descuento'] > 0 && $producto['precio'] != 'Consultar') ? '-'.$producto['descuento'].' '.$producto['descuentoe'] : '';?>&nbsp;</span>
                        
                            <span class="precioAnterior">&nbsp;<?=($producto['descuento'] > 0 && $producto['precio'] != 'Consultar') ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : '';?>&nbsp;</span>-->
                            
                        </div>
                        
						<!--<span class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '/acc/anadir/<?=$producto['id']?>/2');">Compra 2 (Ahorra 10%)</span>
						<span class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '/acc/anadir/<?=$producto['id']?>/3');">Compra 3 (Ahorra 15%)</span>-->
                        </div>
                    <?php }else{ ?>
                            <style>
                                .talla{
                                    color:#ce3c3c;
                                    border: solid 2px #ce3c3c;
                                    padding: 5px;
                                }
                                .talla:hover{
                                    color:white;
                                    border: solid 2px white;
                                    background: #ce3c3c;
                                    padding: 5px;
                                }
                            </style>
                            <div style="display:table-cell;width:500px;">
                                <div class="talla" style="text-align:center;font-size:25px;"><a href="<?=$draizp?>/cuenta/">VER PRECIOS</a></div>
                            </div>
                    <?php } ?>
					</form>
                    <div itemprop="description" class="descripcion"><br>
                        <!-- Buttons start here. Copy this ul to your document. -->
                                <!-- https://developers.facebook.com/docs/plugins/share-button/ -->
                              <div class="social-sharing" style="text-align: center;" data-permalink="http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>">
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" class="share-facebook">
                                  <span class="icon icon-facebook" aria-hidden="true"></span>
                                  <span class="share-title">Compartir</span>
                                </a>

                                <!-- https://dev.twitter.com/docs/intents -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://twitter.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&amp;text=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>&amp;" class="share-twitter">
                                  <span class="icon icon-twitter" aria-hidden="true"></span>
                                  <span class="share-title">Tweet</span>
                                </a>

                                <!--
                                  https://developers.pinterest.com/pin_it/
                                  Pinterest get data from the same Open Graph meta tags Facebook uses
                                -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://pinterest.com/pin/create/button/?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&amp;media=<?=@$og_image?>&amp;description=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>" class="share-pinterest">
                                  <span class="icon icon-pinterest" aria-hidden="true"></span>
                                  <span class="share-title">Pin it</span>
                                </a>

                                <!-- https://developers.google.com/+/web/share/ -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://plus.google.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>" class="share-google">
                                  <!-- Cannot get Google+ share count with JS yet -->
                                  <span class="icon icon-google" aria-hidden="true"></span>
                                  <span class="share-title">+1</span>
                                </a>

                                <!-- https://developer.linkedin.com/plugins/share -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&title=<?=str_replace(' ', '%20', $og_site_name)?>%0d<?=ucwords(strtolower(str_replace(' ', '%20', $og_description)))?>" class="share-linkedin">
                                  <span class="icon icon-linkedin" aria-hidden="true"></span>
                                  <span class="share-title">Compartir</span>
                                </a>

                                <!-- http://blogs.skype.com/2015/11/04/introducing-share-button-effortless-sharing-that-sparks-richer-conversations/ -->
                                <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://web.skype.com/share?url=http://<?=$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']?>&lang=es-es" class="share-skype">
                                  <span class="icon icon-skype" aria-hidden="true"></span>
                                  <span class="share-title">Compartir</span>
                                </a>
                              </div>
                            <!-- Buttons end here -->
                        <?php
                            if($_SESSION['usr'] == null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){
                        
                                //echo $producto['descripcion']?>
                        <?php
                            }
                        ?>
                        <!--<h2>DESCRIPCIÓN</h2>
						<?php //echo $producto['descripcion']?>-->
					</div>
                    </div>
                    <br><hr>
		<?php
                }
			}
		?>
	</div>
	<!--<div id="opiniones">
		<h3>Opiniones</h3>
		<?php if ($_SESSION['usr']['id'] != null) { ?><p style="font-size: 0.75rem; font-style: italic; margin-bottom: 20px; margin-top: -20px;">Pon una opinión sobre este producto y gana 1<?=$_SESSION['moneda']?> euro de descuento acumulable para tu próxima compra (max. 6<?=$_SESSION['moneda']?> acumulables)</p><?php } ?>
		<div class="muestra">
			<?php
				$permitido = true;
				if (count($opiniones) < 1) echo 'No hay opiniones en este producto.';
				for ($i = 0; $i < count($opiniones); $i++)
				{
					if ($opiniones[$i]['idusuario'] == @$_SESSION['usr']['id']) { $permitido = false; }
			?>
					<div class="opinion">
						<span class="nombre"><?=$opiniones[$i]['nombre']?></span>
						<span class="fecha"><?=date_format(date_create($opiniones[$i]['fecha']), 'd-m-Y h:i')?></span>
						<p class="descripcion"><?=str_replace("\r\n", '<br>', $opiniones[$i]['descripcion'])?></p>
					</div>
			<?php
				}
			?>
		</div>
		<?php
			if ($permitido && $_SESSION['usr']['id'] != null) echo '<br>&laquo;&nbsp;<a href="javascript: $(\'#frmopinion\').css(\'display\', \'block\');">Dar mi opinión</a>&nbsp;&raquo;';
		?>
		<form id="frmopinion" action="<?=$draizp?>/acc/opinar" method="post" style="display: none;">
			<br>
			<textarea id="miopinar" name="miopinar" placeholder="Escriba aquí su opinión" class="doble" required><?=@$_POST['miopinar']?></textarea>
			<input type="hidden" name="idp" value="<?=$producto['id']?>">
			<input type="submit" class="button" value="Enviar mi opinión">
		</form>
	</div>-->
    <?php
        if($vistaprod == 1){
            $urlimg = '/temporal/imagenesproductos/56bdade7a833d.jpg';
    ?>
        <style>
    
            .contenedor {
              position: relative;
              height: 230px;
              transition: box-shadow 0.5s ease-in-out;
            }

            .contenedor a img {
              position: absolute;
              left: 0;
              transition: opacity 0.5s ease-in-out;
            }

            .contenedor a img.top:hover {
              opacity: 0;
            }

            .vermas2{
                margin-right: 1.5em !important;
                margin-bottom: 1.5em !important;
            }

            .vermas3{
                margin-right: 1px !important;
                margin-bottom: 2px !important;
            }

            .producto{
                text-align:center;
                width:23% !important;
                padding:0px !important;
            }

            @media (max-width:593px)
            {

                .contenedor{
                    height: 700px;
                }
            }

            @media (max-width:950px)
            {
                .producto{

                    width:48% !important;

                }

                .contenedor{
                    height: 425px;
                }
            }

        </style>
    
        <div id="productos">
		<h3><?=$auxrel?></h3>
		<div class="muestra">
			<?php
				if (count($productosRE) < 1) echo 'No hay elementos relacionados a este producto.';
				for ($i = 0; $i < count($productosRE); $i++)
				{
                    $nombre = utf8_encode(strtr(utf8_decode($productosRE[$i]['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);
                    $idPI = $productosRE[$i]['id'];
                    $sql = "SELECT imagen FROM bd_fotos WHERE idproducto=$idPI LIMIT 1;";
                    $query = mysqli_query($dbi, $sql);
                    if(mysqli_num_rows($query)>0){
                        $assoc = mysqli_fetch_array($query);
                        $imagen = $assoc['imagen'];
                    }else
                        $imagen = $productosRE[$i]['imagen'];
			?>
					<div class="producto" style="border: none !important;">
                        <div class="contenedor"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosMN[$i]['id']?>/<?=$nombre?>/"><img src="<?=$draizp?>/imagenesproductos/<?=$imagen?>" ><img class="top" src="<?=$draizp?>/imagenesproductos/<?=$productosRE[$i]['imagen']?>" alt="<?=$productosRE[$i]['nombre']?>" /></a></div>
						<span class="descripcion"><?=$productosRE[$i]['nombre']?></span>
						<span class="descuento"><?=$productosRE[$i]['descuento'] != 0 && $productosRE[$i]['precio'] != 'Consultar' ? '-'.$productosRE[$i]['descuento'].' '.$productosRE[$i]['descuentoe'] : ''?></span>
						<span class="precioa"><?=$productosRE[$i]['descuento'] != 0 && $productosRE[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosRE[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                        <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
						  <span class="precio"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosRE[$i]['precio']), 2, ',', '.')?><?=$productosRE[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span>
                            <a class="vermas2" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosRE[$i]['id']?>/<?=$nombre?>/"><?=$auxver?></a>
                        <?php }else{ ?>
                            <a class="vermas2 vermas3" style="width: 83% !important;max-width: 83% !important;text-align:center" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosRE[$i]['id']?>/<?=$nombre?>/"><?=$auxver?></a>
                        <?php } ?>
						
					</div>
			<?php
				}
			?>
		</div>
	   </div>
    <?php
        }else{
    ?>
        <div id="productos">
		<h3><?=$auxrel?></h3>
		<div class="muestra">
			<?php
				if (count($productosRE) < 1) echo 'No hay elementos relacionados a este producto.';
				for ($i = 0; $i < count($productosRE); $i++)
				{
                    $nombre = utf8_encode(strtr(utf8_decode($productosRE[$i]['nombre']), utf8_decode($tofind), $replac));
                    $nombre = strtolower($nombre);
                    $nombre = preg_replace('([^A-Za-z0-9])', '-', $nombre);	   
			?>
					<div class="producto">
						<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosRE[$i]['id']?>/<?=$nombre?>/"><img src="<?=$draizp?>/imagenesproductos/<?=$productosRE[$i]['imagen']?>" alt="<?=$productosRE[$i]['nombre']?>" /></a>
						<span class="descripcion"><?=$productosRE[$i]['nombre']?></span>
						<span class="descuento"><?=$productosRE[$i]['descuento'] != 0 && $productosRE[$i]['precio'] != 'Consultar' ? '-'.$productosRE[$i]['descuento'].' '.$productosRE[$i]['descuentoe'] : ''?></span>
						<span class="precioa"><?=$productosRE[$i]['descuento'] != 0 && $productosRE[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosRE[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                        <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                                                <span class="precio"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosRE[$i]['precio']), 2, ',', '.')?><?=$productosRE[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span>
                        <?php } ?>
						<a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/producto/<?=$productosRE[$i]['id']?>/<?=$nombre?>/"><?=$auxver?></a>
					</div>
			<?php
				}
			?>
		</div>
	   </div>
    <?php
        }
        
    ?>
	
	<?php /*include_once('./bloques/novedades.php'); ?>
	<?php include_once('./bloques/masvendidos.php');*/ ?>
</div>                     