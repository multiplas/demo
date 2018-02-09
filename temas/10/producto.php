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


<div id="contenido">

<div id="contenido">
	<div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=@$_GET['nombre'] == 'yes' ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; top: 5%; width: 50%; z-index: 99999;">
		<h2>Ha añadido el producto a la cesta</h2>
		<p>El producto "<strong><?=@$producto['nombre']?></strong>" ha sido añadido correctamente a la cesta. Ahora puede verlo en su cesta.</p>
		<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta" class="button">ver mi cesta</a>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">X</a>
	</div>
    
    <div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=@$_GET['nombre'] == 'yesp' ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; top: 5%; width: 50%; z-index: 99999;">
		<h2>Ha añadido el producto a presupuesto</h2>
		<p>El producto "<strong><?=@$producto['nombre']?></strong>" ha sido añadido correctamente al presupuesto. Ahora puede verlo en sus presupuestos.</p>
		<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>presupuesto" class="button">ver mi presupuesto</a>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">X</a>
	</div>
    
    <div style="background: #E6E7E9; border: solid 2px #EEE; display: <?=@$_GET['nombre'] == 'no' ? 'block' : 'none'?>; left: 20%; padding: 3% 5%; position: absolute; top: 5%; width: 50%; z-index: 99999;">
		<h2>No se ha podido añadir el producto a la cesta</h2>
		<p>El producto "<strong><?=@$producto['nombre']?></strong>" no ha sido añadido a la cesta por diferencias en la forma de pago con los productos de su cesta. Tramite la cesta, y luego añada este producto.</p>
		<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta" class="button">ver mi cesta</a>
		<a href="#" onclick="$(this).parent().css('display', 'none');" class="button buttonGray" style="min-width: 10px !important;">X</a>
	</div>

        <div itemscope itemtype="http://schema.org/Product" id="producto">

<?php
			if ($producto == null)
			{
				echo '<p>El producto indicado no existe!</p>';
			}
			else
			{
				$_SESSION['producto'] = $producto;
                
                
            ?>
                    
                    <style>
                        #grupo-contenido #contenido #productos .producto .descripcion, #grupo-contenido #contenido #novedades div.muestra div.producto .descripcion, #grupo-contenido #contenido #masvendidos div.muestra div.producto .descripcion {
                         line-height: 1.75rem !important;   
                        }
                        #grupo-contenido #contenido #producto .producto-r .info span{
                            width: 100% !important;
                            border: none !important;
                            max-width: 100% !important;
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
                        
                        .sale-label{
                            background-color: #ff6600;
                            border-radius: 4px;
                            color: #fff !important;
                            float: right;
                            font-size: 14px !important;
                            font-weight: normal;
                            padding: 2px 4px;
                            text-transform: uppercase;
                            z-index: 10;
                        }
                    </style>
                    <div class="producto-r">
					<div class="foto">
                                            <?php if($producto['descuento'] > 0){ ?>
                                            <span class="sale-label" style="position: absolute;">¡Oferta!</span>
                                            <?php } ?>
						<script language="javascript" type="text/javascript">
						  function resizeIframe(obj) {
							obj.style.height = obj.contentWindow.document.body.scrollHeight + 'px';
						  }
						</script>
						<?php /*include_once('./componentes/sliderPres.php');*/ ?>
						<iframe frameborder="0" src="<?=$draizp?>/componentes/slippry-1.3.1/demo/index.php" style="display: block; width: 100%; margin: auto;" onload="javascript:resizeIframe(this);"></iframe>
					</div>
                    <form action="<?=$draizp?>/acc/anadir/<?=$producto['id']?>" method="post" style="max-height: 100% !important;">
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
                        
                        .sale-label {
                            background-color: #5cb85c;
                            border-radius: 4px;
                            color: #fff !important;
                            float: right;
                            font-size: 18px;
                            padding: 2px 4px;
                            text-transform: uppercase;
                            z-index: 10;
                        }
                        
                        .button{
                            font-weight: bold !important;
                            padding-left: 20px !important;
                            padding-right: 20px !important;
                            background-color: #e74e4e !important;
                            border-color: #e74e4e !important;
                        }
                        
                        .button:hover{
                            background-color: #000000 !important;
                            border-color: #000000 !important;
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
                        <div style="width:100%; font-family: '<?=$fuente2?>',Arial,Helvetica,sans-serif !important; font-size: 16px !important;">
                            
                            <h1 itemprop="name" style="font-weight: normal;"><?=$producto['nombre']?></h1><br>
                            
                            <b>Referencia:</b> <?=$producto['referencia']?><br><br>
                            
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
                            <?=$descripcion?><br><br>
                            
                            
                        
                        <div style="display:table; width:100%; border-top: 1px solid rgba(150, 150, 150, 0.3);"><br>
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
                                    <label style="color: #333; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;" ></label>
                                </div>
                                <div style="display:table-cell;text-align:right;height:50px;vertical-align:middle;">
                                    <label style="color: #575757; font-size: 1.20rem; margin-right: 15px; margin-top: 7px;" ><span class="sale-label">Disponible</span></label>
                                </div>
                            </div>
                            <div style="border-top: 1px solid rgba(150, 150, 150, 0.3);color: #e74e4e;">
                                <div style="display:table-cell;vertical-align:middle;width:100%;">
                                    <span itemprop="price" id="preciopr" style="padding:0 !important;font-size:2em;margin-right: 15px; top: 7px;" class="precio"><b><span id="totalspan" data-precio="<?=$producto['precio']?>"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['precio']), 2, ',', '.')?></span><?=$producto['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?> <?=@$totalAtr > 0 ? '+'. number_format($totalAtr, 2, ',', '.') .$_SESSION['moneda'] : ''?></b></span>
                                </div>
                                
                            </div>  
                                                <div style="display:table-row;">
                                <div style="display:table-cell;vertical-align:middle;width:100%;">
                                
                                    <?php
                                        if ($producto['precio'] != 'Consultar')
                                        {
                                            ?><span  class="button" name="BtSubmit" onclick="$(this).parent().attr('action', '<?=$draizp?>/acc/anadir/<?=$producto['id']?>/'+$('#cantidadmuliselect').val());"><i class="fa fa-shopping-cart"></i> <?=$auxana?></span>
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
                            
                                <style>
                                    .social-sharing2 a {
                                        border: 1px solid #ccc;
                                        border-radius: 5px;
                                        color: #000;
                                        display: inline-block;
                                        font-weight: normal;
                                        height: 40px;
                                        line-height: 22px;
                                        margin: 0 10px 10px 0;
                                        text-decoration: none;
                                    }

                                    .social-sharing2 span {
                                        display: inline-block;
                                        font-size: 12px;
                                        height: 22px;
                                        line-height: 22px;
                                        vertical-align: top;
                                        font-size: 16px !important;
                                        font-weight: normal;
                                        top: 8px;
                                        left: 5px;
                                    }
                                </style>
                                <div class="social-sharing2" style="text-align: center;" data-permalink="http://demo.tiendavirtualprofesional.com/es/producto/6700/producto-1/">
                                    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.facebook.com/sharer.php?u=http://demo.tiendavirtualprofesional.com/es/producto/6700/producto-1/">
                                      <span class="icon icon-facebook" aria-hidden="true"></span>
                                      <span class="share-title">Compartir</span>
                                    </a>

                                    <!-- https://dev.twitter.com/docs/intents -->
                                    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://twitter.com/share?url=http://demo.tiendavirtualprofesional.com/es/producto/6700/producto-1/&amp;text=%0d&amp;">
                                      <span class="icon icon-twitter" aria-hidden="true"></span>
                                      <span class="share-title">Tweet</span>
                                    </a>

                                    <!--
                                      https://developers.pinterest.com/pin_it/
                                      Pinterest get data from the same Open Graph meta tags Facebook uses
                                    -->
                                    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://pinterest.com/pin/create/button/?url=http://demo.tiendavirtualprofesional.com/es/producto/6700/producto-1/&amp;media=&amp;description=%0d">
                                      <span class="icon icon-pinterest" aria-hidden="true"></span>
                                      <span class="share-title">Pin it</span>
                                    </a>

                                    <!-- https://developers.google.com/+/web/share/ -->
                                    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://plus.google.com/share?url=http://demo.tiendavirtualprofesional.com/es/producto/6700/producto-1/">
                                      <!-- Cannot get Google+ share count with JS yet -->
                                      <span class="icon icon-google" aria-hidden="true"></span>
                                      <span class="share-title">+1</span>
                                    </a>

                                    <!-- https://developer.linkedin.com/plugins/share -->
                                    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://demo.tiendavirtualprofesional.com/es/producto/6700/producto-1/&amp;title=%0d">
                                      <span class="icon icon-linkedin" aria-hidden="true"></span>
                                      <span class="share-title">Compartir</span>
                                    </a>

                                    <!-- http://blogs.skype.com/2015/11/04/introducing-share-button-effortless-sharing-that-sparks-richer-conversations/ -->
                                    <a target="_blank" onclick="window.open(this.href, 'mywin','left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;" href="https://web.skype.com/share?url=http://demo.tiendavirtualprofesional.com/es/producto/6700/producto-1/&amp;lang=es-es">
                                      <span class="icon icon-skype" aria-hidden="true"></span>
                                      <span class="share-title">Compartir</span>
                                    </a>
                              </div>
                            
                        </div>
                        <?php if($producto['aplazame'] == 1){ ?>
                            <div style="display:table-row;">
                                <div style="display:table-cell;vertical-align:middle;width:100%;">
                                    <span style="padding:0 !important;font-size:2em;margin-right: 15px; margin-top: 7px;" class="precio"><small>Financialo con Aplazame por <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['caplazame1']), 2, ',', '.')?><?=$_SESSION['moneda']?> + <?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$producto['caplazame']), 2, ',', '.')?><?=$_SESSION['moneda']?> al mes</small></span>
                                </div>
                            </div>
                            <?php } ?>		
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
                        
                    
                    </div>
                    <br><hr>
		
                    <div style="font-family: '<?=$fuente2?>', sans-serif ! important; border: 1px solid rgba(150, 150, 150, 0.4); display: block; font-size: 16px; margin: 15px 0px; padding: 15px;">
                        <h2 style="font-family: <?=$fuente1?>; font-size: 1.75em; font-weight: 500;">Más</h2><br>
                        <?=$producto['descripcion']?>
                    </div>
	</div>
		

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
						<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosRE[$i]['id']?>/<?=$nombre?>/"><img src="<?=$draizp?>/imagenesproductos/<?=$productosRE[$i]['imagen']?>" alt="<?=$productosRE[$i]['nombre']?>" /></a>
						<span class="descripcion"><?=$productosRE[$i]['nombre']?></span>
						<span class="descuento"><?=$productosRE[$i]['descuento'] != 0 && $productosRE[$i]['precio'] != 'Consultar' ? '-'.$productosRE[$i]['descuento'].' '.$productosRE[$i]['descuentoe'] : ''?></span>
						<span class="precioa"><?=$productosRE[$i]['descuento'] != 0 && $productosRE[$i]['precio'] != 'Consultar' ? number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosRE[$i]['precio_ant']), 2, ',', '.').$_SESSION['moneda'] : ''?></span><br>
                        <?php if($_SESSION['usr'] != null || ($_SESSION['usr'] == null && $Empresa['registro'] == 1)){ ?>
                                                <span class="precio"><?=number_format(ConvertirMoneda($Empresa['moneda'],$_SESSION['divisa'],$productosRE[$i]['precio']), 2, ',', '.')?><?=$productosRE[$i]['precio'] != 'Consultar' ? $_SESSION['moneda'] : ''?></span>
                        <?php } ?>
						<a class="vermas" href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>producto/<?=$productosRE[$i]['id']?>/<?=$nombre?>/"><?=$auxver?></a>
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