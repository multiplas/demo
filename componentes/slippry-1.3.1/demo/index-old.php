<?php session_start(); 
	$draizp = '/v2'; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Slider Producto</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		<script src="../dist/slippry.min.js"></script>
		<script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
		<meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="demo.css">
    <link rel="stylesheet" href="../dist/slippry.css">
	</head>
	<body>
            <script> 
                    $('body').on('click','.fotorama__img',function(){
                        window.parent.document.getElementById('imagen_modal').src = $(this).attr("src");
                        window.parent.document.getElementById('myModal').style.display = "block";
                        window.parent.document.getElementById('myModal2').style.display = "block";
                    });
            </script>
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
        <link href="<?=$draizp?>/componentes/fotorama/fotorama.css" rel="stylesheet">
        <script src="<?=$draizp?>/componentes/fotorama/fotorama.js"></script>
	</body>
</html>