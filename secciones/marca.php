<?php    
	function get_product_url($draizp, $language, $product_id, $name){
		//Right Way to Generate Product URL
		$product_url = $draizp;
		if($language)//Add language
			$product_url .= '/'.$language;
		if($product_id)//Add product
			$product_url .= '/producto/'.$product_id;
		if($name)//Add name
			$product_url .= '/'.$name.'/';
		return $product_url;
	}

	function get_brand_info($brand_name){
		global $dbi;

		$resultado = array();
		if(!empty($brand_name))
			$sql="SELECT * FROM bd_categorias WHERE categoria LIKE '$brand_name'";
		else
			$sql="SELECT * FROM bd_categorias WHERE marca = 1";
		$query = mysqli_query($dbi, $sql);
        
        if (mysqli_num_rows($query) > 0)
        {
            while($assoc = mysqli_fetch_assoc($query)){
                $resultado[] = $assoc;
            }
        }
        return $resultado;
	}

    function get_attached_files($catID){
		global $dbi;
		$resultado = array();
        $sql = "SELECT * FROM  bd_marca_fichero WHERE id_marca = $catID";
        $query = mysqli_query($dbi, $sql);
		if (mysqli_num_rows($query) > 0)
        {
			while($assoc = mysqli_fetch_assoc($query)){
                $resultado[] = $assoc;
            }
		}
        return $resultado;
    }

    $brand_name = str_replace('-',' ',$_GET['marca']);
    $brandInfo = get_brand_info($brand_name);
    $attachedFiles = get_attached_files($brandInfo[0]['id']);
	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
?>
<style>
    #posicion-bar {
        background-color: #eceeef;
        border-radius: 0.25rem;
        color: #333333;
        font-family: <?=$fuente2?> !important;
        font-size: 16px;
        margin-top: 35px;
        max-width: 1060px;
        overflow: hidden;
        padding: 0.75rem 1rem;
        width: auto;
        height: 100%;
    }
    
    #posicion-bar div {
        color: #333333;
        height: 100%;
    }

	.brand-info, .file-list{
		padding-top: 15px;
	}
	.marca-imagen {
		width: 30%;
	}
	.marca-imagen img {
		margin: auto;
    	display: block;
	}
	div.inline 
	{ 
		float:left; 
	}
	.marca-texto{
		padding-left: 15px;
		width: 65%;
	    line-height: 1.5;
	}
	.clearBoth { clear:both; }
	.fichero-list{
		width: 33%;
	    padding-top: 10px;
		padding-bottom: 10px;
	}
	.fichero-list img{
		width: 35px;
	}
	a.link-file:hover {
		color: <?=$colores['boton_fondo']?> !important;
	}
	a.link-file {
		padding-top: 9px;
		line-height: 33px;
		padding-left: 15px;
		font-weight: bolder;
	}

	@media only screen and (max-width: 600px) {
		.marca-texto{
			padding-left: 0px;
			width: 100%;
		}
		.marca-imagen {
			width: 100%;
		}
		.fichero-list{
			width: 100%;
		}
	}
	
</style>

<div id="contenido">
<?php if (count($brandInfo) == 1): ?>
	<div style="background-color: rgb(255, 255, 255); margin-top: 0px;">
	<div id="posicion-bar" style="max-width: 1028px !important">
		<div>
			<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><i class="fa fa-home fa-lg"></i></a> > <a href="<?=$draizp?>/marca">Marcas</a> > <a href="<?=$actual_link?>"><?=$brandInfo[0]['categoria']?></a>
		</div>
	</div>
	<div class="brand-info">
		<div class="marca-imagen inline">
			<img src="../marcas/<?=$brandInfo[0]['id']?>.<?=$brandInfo[0]['extension']?>" /> 
		</div>
		<div class="marca-texto inline">
			<h4>Información sobre <?=$brandInfo[0]['categoria']?></h4>
			<?=$brandInfo[0]['textoMarca']?>
		</div>
	</div>
	<div class="file-list clearBoth">
		<h4>Archivos relacionados a <?=$brandInfo[0]['categoria']?></h4>
		<?php
		if(isset($attachedFiles) && !empty($attachedFiles)){
			foreach($attachedFiles as $file){
				$tipoFichero = explode('.',$file['fichero']);
				$tipoFichero = $tipoFichero[count($tipoFichero)-1];
				if($tipoFichero == 'pdf')
					$fichero_imagen = 'pdf.png';
				elseif($tipoFichero == 'doc')
					$fichero_imagen = 'doc.jpg';
				?>
				<div class="fichero-list inline">
					<span>
						<img src="../marcas/<?=$fichero_imagen?>" alt="">
					</span> 
					<a class="link-file" href="../ficheros/<?=$file['fichero']?>" target="_blank" ><?php echo (strlen($file['fichero']) > 30)? substr($file['fichero'],0,30).'...' : $file['fichero']?></a>
				</div>
				<?php
			}
		}
		?>
	</div>
<?php else: ?>
	<div style="background-color: rgb(255, 255, 255); margin-top: 0px;">
	<div id="posicion-bar" style="max-width: 1028px !important">
		<div>
			<a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>"><i class="fa fa-home fa-lg"></i></a> > <a href="<?=$draizp?>/marca">Marcas</a> 
		</div>
	</div>
	<br>
	<?php foreach($brandInfo as $brand): 
	$brand_name = str_replace(' ','-',$brand['categoria']);
	?>
		<div class="fichero-list inline">
			<span>
				<?php if(!empty($brand['extension'])): ?>
					<img src="../marcas/<?=$brand['id']?>.<?=$brand['extension']?>" alt="<?=$brand_name?>">
				<?php else: ?>
					<img src="../marcas/default.jpg" alt="<?=$brand_name?>">
				<?php endif; ?>
			</span> 
			<a class="link-file" href="<?=$draizp?>/marca/<?=$brand_name?>" ><?=$brand['categoria']?></a>
		</div>
	<?php endforeach; ?>
<?php endif; ?>
</div>