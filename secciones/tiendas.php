<script type="text/javascript" src="/scripts/jquery.lightbox-0.5-mod.js"></script>
<link rel="stylesheet" type="text/css" href="/css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
	$(function() {
            $('#gallery a').lightBox();
	});    	   	
</script>
<div id="contenido">
    
    <style>
        @media (max-width: 940px){
            .tamano_img{
                width: 100% !important;
                display: inline-block;
                vertical-align: top;
                
            }
            #textoimga{
                min-width: 95%;
            }
        }
        @media (min-width: 940px){
            .tamano_img{
               width: 300px !important;
               display: inline-block;
               margin-right: 125px;
               vertical-align: top;
               float: right;
            }
            
        }
    </style>
    <div id="articulo">
         <div id="map" style="height: 480px; width: 100%"></div>
         
        <br>
        <?php $direcciones[] = null; ?>
    <?php foreach ($tiendas as $tienda) { ?>
     
        <div style="width: 100%; display: table;">
            <div class="tamano_img">
                <div id="gallery">
                    <?=($tienda['imagen'] != '') ? '<img id="textoimga" src="'.$draizp.'/imagenesTiendas/'.$tienda['imagen'].'" style="margin-bottom: 20px;" />' : '';?>   
                </div>
            </div>
            <div id="texto">
                <h2><?=$tienda['nombre']?></h2><br>
                <?=$tienda['direccion']?><br>
                <?=$tienda['telefonos']?><br>
		<?=$tienda['descripcion']?>
                <?php $etiquetita = '<b>'.$tienda['nombre'].'</b><br>'.$tienda['direccion'].'<br>'.$tienda['telefonos']; ?>
                <?php array_push($direcciones, array($tienda['direccion'], $etiquetita)); ?>
            </div>
        </div>
	<script type="text/javascript">
	
        </script>
    
    <?php } unset($direcciones[0]); ?>
    
    <script type="text/javascript">
		function initMap()
		{ // Create a map object and specify the DOM element for display.
			var geocoder;
			var map;
			
			geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(<?=$Empresa['mapscoor']?>);
			var mapOptions =
			{
				zoom: <?=$Empresa['mapszoom']?>,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				center: latlng
			}
			
			map = new google.maps.Map(document.getElementById("map"), mapOptions);
			codeAddress();
                        
                        function codeAddress()
			{
                            <?php foreach($direcciones as $dir){ ?>
				var address = '<?=$dir[0]?>';
				geocoder.geocode( { 'address': address}, function(results, status)
				{
					if (status == google.maps.GeocoderStatus.OK)
					{
						var marker = new google.maps.Marker(
						{
							map: map,
							position: results[0].geometry.location
						});
                                                etiquetas(marker, '<?=$dir[1]?>');
					}
				});
                            <?php } ?>
			}
                        function etiquetas(marker, address) {
                                                    var infowindow = new google.maps.InfoWindow(); 
                                                    google.maps.event.addListener(marker, 'click', function() {
                                                      infowindow.setContent(address);
                                                      infowindow.open(map, marker);
                                                    });
                                                  }
		}
	</script>
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=<?=$Empresa['mapskey']?>&callback=initMap">
	</script>
        
    </div>
</div>