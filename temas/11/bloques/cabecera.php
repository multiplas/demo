<link rel="stylesheet" type="text/css" media="all" href="<?=$draizp?>/temas/11/bloques/pub6/css/banak1-115.min.css"/>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,900" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Kameron:400,700" rel="stylesheet" type="text/css">

<div id="page">
<header>
<noscript>
<div class="noscript">
	<p><span class="noscript_bold">Hemos detectado que su JavaScript parece estar deshabilitado.</span><br />
	Debe tener activado Javascript en su navegador para poder utilizar la funcionalidad de este sitio web.</p>
</div>
</noscript>
<div class="top-nav">
	<div class="container_base">
		<div class="languages">
			<div class="option option1">
				España
				<div class="hidden_opt">
					<a href="#">España</a>
					<a href="#">France</a>
					<a href="#">Italia</a>
					<a href="#">Portugal</a>
				</div>
			</div>
			<div class="option option22">
				Español
				<div class="hidden_opt">
						<a href="#">Español</a>
						<a href="#">Français</a>
						<a href="#">Italiano</a>
						<a href="#">Português</a>
						<a href="#">English</a>
				</div>
			</div>
			<div class="clearfix"></div>
			<div id="pagina-cod" class="hidden">
				<span id="pagina-cod-pais">001</span>
				<span id="pagina-cod-idioma">ES</span>
			</div>
		</div>
		<div class="navigation_user" title="Login">
                     <?php if($Empresa['mcatalogo'] == 0){ ?>
			<div class="option myacount"><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cuenta"><div class="sprite_banak sprite-head_boton_usuario"></div></a></div>
                        <?php if ($_SESSION['usr'] != null) { ?>
                            <div class="option myacount"><a href="<?=$draizp?>/acc/salir"><div class="sprite_banak sprite-up_logout"></div></a></div>
                        <?php } 
                     } ?>
		</div>
		<form id="head-cesta-formulario" name="head-cesta-agregar" method="post">
			
		</form>
	</div>
</div>
<div class="information-nav">
	<div class="container_base">
		<div id="BanakMensaje"></div>
		<div class="logo_web">
			<?php if($logoSup != ''){ ?><a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/">
				<img src="<?=$draizp?>/source/<?=$logoSup?>" alt="Home" width="auto" height="80" />
                        </a><?php } ?>
		</div>
                <?php if($Empresa['mcatalogo'] == 0){ ?>
		<div class="block_cart">
			<div data-enlace="mi_cesta.html">
				<div class="total_price">0,00&euro;</div>
				<div class="cart_icon">
                                    <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>cesta">
					<div class="sprite_banak sprite-head_boton_carrito"></div>
					<span class="quantity">0</span>
                                    </a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
                <?php } ?>
		<div class="search_block">
			<form action="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/" method="post">
				<input class="buscador" type="text" name="buscar" placeholder="Buscar..." value=""/>
				<input class="enviar" type="submit" value="Envi" />
				<input class="cerrar" type="reset" value="Envi" />
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
</div>


