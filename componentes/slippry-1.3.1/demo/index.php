<?php session_start(); 
	$draizp = ''; ?>

                <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

		<script src="//use.edgefonts.net/cabin;source-sans-pro:n2,i2,n3,n4,n6,n7,n9.js"></script>
	<link rel="stylesheet" href="<?=$draizp?>/componentes/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?=$draizp?>/componentes/fancybox/source/jquery.fancybox.pack.js"></script>
     <link rel="stylesheet" href="<?=$draizp?>/componentes/noobslide/style.css" type="text/css" media="screen" />
	<script type="text/javascript" src="<?=$draizp?>/componentes/noobslide/mootools-1.2-core.js"></script>
	<script type="text/javascript" src="<?=$draizp?>/componentes/noobslide/_class.noobSlide.packed.js"></script>           
				
<div class="sample">
	<div class="mask6">
		<div id="box7">
			<span><a class="groupgalery" rel="group1" href="<?=$draizp?>/imagenesproductos/<?=@$_SESSION['producto']['imagen']?>">
			<img src="<?=$draizp?>/imagenesproductos/<?=@$_SESSION['producto']['imagen']?>" width="400" height="auto" alt="Photo" /></a></span>
			<?php
				$imagenes=1;
				foreach (@$_SESSION['producto']['imagenes'] AS $imagen)
				{
					?>
					<span><a class="groupgalery" rel="group1" href="<?=$draizp?>/imagenesproductos/<?=$imagen?>">
					<img src="<?=$draizp?>/imagenesproductos/<?=$imagen?>" width="400" height="" alt="Photo" /></a></span>
					<?php
					$imagenes++;
				}
			?>
		</div>
	</div>

	<div id="thumbs7">
		<div class="thumbs">
			<div><img src="<?=$draizp?>/imagenesproductos/<?=@$_SESSION['producto']['imagen']?>" alt="Photo Thumb" /></div>
			<?php
				foreach (@$_SESSION['producto']['imagenes'] AS $imagen)
				{
					?>
					<div><img src="<?=$draizp?>/imagenesproductos/<?=$imagen?>" alt="Photo Thumb" /></div>
					<?php
				}
			?>
		</div>
		<div id="thumbs_mask7"></div>
		<p id="thumbs_handles7">
			<?php
			for ($i = 1; $i <= $imagenes; $i++) {
				echo '<span></span>';
			}
			$imagenes--;
			?>
		</p>
	</div>
</div>
		<script>

		window.addEvent('domready',function(){	
			var startItem = 0; //or   0   or any
			var thumbs_mask7 = $('thumbs_mask7').setStyle('left',(startItem*60-568)+'px').set('opacity',0.5);
			var fxOptions7 = {property:'left',duration:1000, transition:Fx.Transitions.Back.easeOut, wait:false}
			var thumbsFx = new Fx.Tween(thumbs_mask7,fxOptions7);
			var nS7 = new noobSlide({
				box: $('box7'),
				items: [			
				<?php
					for ($i = 0; $i < $imagenes; $i++) {
						echo $i.',';
					}
					echo $imagenes;
				?>],
				handles: $$('#thumbs_handles7 span'),
				fxOptions: fxOptions7,
				onWalk: function(currentItem){
					thumbsFx.start(currentItem*60-568);
				},
				startItem: startItem
			});
			//walk to first with fx
			nS7.walk(0);
		});
		</script>
<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery(".groupgalery").fancybox();
	});
</script>
