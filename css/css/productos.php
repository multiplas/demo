<?php
    header("Content-type: text/css; charset: UTF-8");

    require_once($draiz.'../sistema/i_connectionstrings.php');

    $dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);

    $sql="SELECT * FROM bd_colores";
    $query = mysqli_query($dbi, $sql);
    $colores = mysqli_fetch_array($query);

    $colorprecio=$colores['colorprecioprods'];
    $colortextoordenar = $colores['colortextoordenarprods'];
    $colortextoprods = $colores['colortextoprods'];

?>

#grupo-contenido
{
	height: auto;
	margin: auto;
	width: auto;
}

	#grupo-contenido #contenido
	{
		background: #FFF;
		height: auto;
		margin: auto;
		padding: 15px 22px 35px 22px;
		text-shadow: none;
		width: 950px;
	}

		#grupo-contenido #contenido #panel-superior, #grupo-contenido #contenido #panel-inferior
		{
			border: none;
			display: block;
			line-height: 40px;
			margin-bottom: 15px;
			margin-top: 15px;
			min-height: 40px;
			padding: 0px;
			width: 950px;
		}

		#grupo-contenido #contenido #panel-inferior
		{
			margin-bottom: 25px;
		}

			#grupo-contenido #contenido #panel-superior div#ordenar
			{
				border: none;
				color: <?php echo $colortextoordenar; ?>;
				display: inline-block;
				font-weight: bold;
				height: 40px;
				margin-left: 200px;
				padding: 0px;
				width: auto;
			}

				#grupo-contenido #contenido #panel-superior div#ordenar select, #grupo-contenido #contenido #panel-inferior div#ordenar select
				{
					height: 22px;
					width: 200px;
				}

			#grupo-contenido #contenido #panel-superior div.paginador, #grupo-contenido #contenido #panel-inferior div.paginador
			{
				border: none;
				float: right;
				height: 40px;
				padding: 0px;
				width: auto;
			}

				#grupo-contenido #contenido #panel-superior div.paginador a, #grupo-contenido #contenido #panel-inferior div.paginador a
				{
					background: #202020;
					border-radius: 3px;
					color: #FFF;
					display: inline-block;
					font-size: 18px;
					height: 30px;
					line-height: 30px;
					text-align: center;
					text-decoration: none;
					vertical-align: middle;
					width: 36px;
				}

				#grupo-contenido #contenido #panel-superior div.paginador a:hover, #grupo-contenido #contenido #panel-inferior div.paginador a:hover
				{
					background: #666;
				}

				#grupo-contenido #contenido #panel-superior div.paginador a.seleccionado, #grupo-contenido #contenido #panel-inferior div.paginador a.seleccionado
				{
					background: #999;
				}

		#grupo-contenido #contenido #panel-izquierdo
		{
			border: none;
			display: inline-block;
			height: auto;
			margin: auto;
			padding: 0px;
			width: 186px;
		}

			#grupo-contenido #contenido #panel-izquierdo .panel-izquierdo
			{
				background: #FFF;
				/*border: solid 1px #4b4b4b;*/
				height: auto;
				margin: 0px 0px 15px 0px;
				padding: 10px 16px;
				width: 146px;
			}

				#grupo-contenido #contenido #panel-izquierdo .panel-izquierdo h3
				{
					color: <?php echo $colortextoprods; ?>;
					font-size: 14px;
					margin: 0px;
					max-width: 186px;
					padding: 4px 0px;
				}

				#grupo-contenido #contenido #panel-izquierdo .panel-izquierdo span
				{
					border: none;
					color: #444;
					display: inline-block;
					font-size: 12px;
					height: auto;
					line-height: 12px;
					margin: auto;
					padding: 4px 0px;
					vertical-align: top;
					width: 100%;
				}

					#grupo-contenido #contenido #panel-izquierdo .panel-izquierdo span input[type=checkbox]
					{
						margin: 0px;
						vertical-align: top;
					}

		#grupo-contenido #contenido #productos
		{
			background: #FFF;
			border: none;
			display: inline-block;
			height: auto;
			margin-left: 6px;
			padding: 0px;
			vertical-align: top;
			width: 860px;
		}

			/*#grupo-contenido #contenido #productos .producto
			{
				background: #FFF;
				border: solid 1px #CCC;
				display: inline-block;
				height: 358px;
				margin-bottom: 10px;
				margin-right: 10px;
				padding: 0px;
				vertical-align: middle;
				width: 240px;
			}

			#grupo-contenido #contenido #productos .lastp
			{
				margin-right: 0px;
			}

				#grupo-contenido #contenido #productos .producto  .foto
				{
					background: #FFF;
					border: none;
					display: block;
					height: 215px;
					line-height: 215px;
					margin: auto;
					padding: 3px;
					text-align: center;
					width: 215px;
				}

					#grupo-contenido #contenido #productos .producto  .foto img
					{
						max-height: 215px;
						max-width: 215px;
						min-height: 120px;
						min-width: 120px;
						vertical-align: middle;
					}

				#grupo-contenido #contenido #productos .producto  .info
				{
					background: #FFF;
					border-top: solid 1px #CCC;
					display: block;
					height: 114px;
					margin: 0px;
					padding: 8px;
					position: relative;
					width: 224px;
				}
	
					#grupo-contenido #contenido #productos .producto  .info .descripcion
					{
						color: #505050;
						display: block;
						height: 46px;
						line-height: 18px;
						margin-bottom: 4px;
						overflow: auto;
						overflow: auto;
					}
	
					#grupo-contenido #contenido #productos .producto  .info .descuento
					{
						color: #0070C3;
						display: block;
						font-size: 18px;
						font-weight: bold;
						line-height: 24px;
						width: 120px;
					}
	
					#grupo-contenido #contenido #productos .producto  .info .precio
					{
						color: <?php echo $colortextoprecio; ?>;
						display: block;
						font-size: 22px;
						font-weight: bold;
						line-height: 24px;
						width: 120px;
					}
	
					#grupo-contenido #contenido #productos .producto  .info .precioAnterior
					{
						color: #6F6F6F;
						display: block;
						font-size: 14px;
						font-weight: normal;
						line-height: 24px;
						text-decoration: line-through;
						width: 120px;
					}
	
					#grupo-contenido #contenido #productos .producto  .info .vermas
					{
						background: #202020;
						border-radius: 5px;
						bottom: 4px;
						color: #FFF;
						font-size: 14px;
						font-weight: normal;
						height: 26px;
						line-height: 26px;
						position: absolute;
						right: 12px;
						text-align: center;
						text-decoration: none;
						width: 90px;
					}*/