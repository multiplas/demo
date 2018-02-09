<?php session_start(); 
	$draizp = ''; ?>

                <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="../dist/slippry.min.js"></script>
		<script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
                <link href="<?=$draizp?>/componentes/fotorama/fotorama.css" rel="stylesheet">
        <script src="<?=$draizp?>/componentes/fotorama/fotorama.js"></script>
                
                <link rel="stylesheet" href="demo.css">
    <link rel="stylesheet" href="../dist/slippry.css">
                
		<div class="fotorama" data-allowfullscreen="false" data-transition="dissolve" data-loop="true" data-autoplay="true" data-arrows="false" data-click="false" data-fit="cover" data-nav="thumbs" data-swipe="false">
                    <img class="zoom" src="<?=$draizp?>/imagenesproductos/<?=@$_SESSION['producto']['imagen']?>" alt="">
				<?php
					foreach (@$_SESSION['producto']['imagenes'] AS $imagen)
					{
						?>
						<img class="zoom" src="<?=$draizp?>/imagenesproductos/<?=$imagen?>" alt="">
						<?php
					}
				?>
        </div>	

		<script>
			$(function() {
				var demo1 = $("#demo1").slippry({
					// transition: 'fade',
					// useCSS: true,
					speed: 900,
                    pager: false
					// pause: 3000,
					// auto: true,
					// preload: 'visible',
					// autoHover: false
				});

				$('.stop').click(function () {
					demo1.stopAuto();
				});

				$('.start').click(function () {
					demo1.startAuto();
				});

				$('.prev').click(function () {
					demo1.goToPrevSlide();
					return false;
				});
				$('.next').click(function () {
					demo1.goToNextSlide();
					return false;
				});
				$('.reset').click(function () {
					demo1.destroySlider();
					return false;
				});
				$('.reload').click(function () {
					demo1.reloadSlider();
					return false;
				});
				$('.init').click(function () {
					demo1 = $("#demo1").slippry();
					return false;
				});
			});
		</script>
        
	</body>
</html>