<?php
    header("Content-type: text/css; charset: UTF-8");

    require_once($draiz.'../sistema/i_connectionstrings.php');

    $dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);

    $sql="SELECT * FROM bd_colores";
    $query = mysqli_query($dbi, $sql);
    $colores = mysqli_fetch_array($query);

    $colorgeneralinicio = $colores['colorgeneralinicio'];

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
		padding: 35px 22px;
		text-shadow: none;
		width: 950px;
	}

		#grupo-contenido #contenido #slider
		{
			background: #231F20;
			border: solid 1px #666;
			height: 400px;
			margin: auto;
			margin-bottom: 30px;
			padding: 0px;
			position: relative;
			width: auto;
		}

			#grupo-contenido #contenido #slider img
			{
				border: none;
				height: 400px;
				padding: 0px;
				width: 100%;
			}

		#grupo-contenido #contenido #productos
		{
			background: #FFF;
			border-top: solid 1px #444;
			padding: 30px 0px;
		}

			#grupo-contenido #contenido #productos .superpr
			{
				display: inline-block;
				height: auto;
				margin: 0px 4% 0px 0px;
				padding: 0px;
				vertical-align: top;
				width: 48%;
			}

			#grupo-contenido #contenido #productos .superpr:nth-child(2n)
			{
				margin: 0px 0px 0px -4px;
			}

				#grupo-contenido #contenido #productos .superpr img
				{
					display: block;
					height: auto;
					margin: 0px;
					padding: 0px;
					width: 100%;
				}

				#grupo-contenido #contenido #productos .superpr span
				{
					background: #101010;
					border: solid 1px #444;
					color: #FFF;
					display: block;
					height: auto;
					margin: 0px;
					padding: 13px;
					width: auto;
				}

					#grupo-contenido #contenido #productos .superpr span em
					{
						color: #007EC2;
						float: right;
						font-style: normal;
					}

			#grupo-contenido #contenido #productos .producto
			{
				background: #FFF;
				border: solid 1px #CCC;
				display: inline-block;
				height: 180px;
				margin-bottom: 10px;
				margin-right: 10px;
				padding: 0px;
				width: 210px;
			}

			#grupo-contenido #contenido #productos .producto:hover
			{
				cursor: pointer;
			}

				#grupo-contenido #contenido #productos .producto  .foto
				{
					background: #FFF;
					border: none;
					float: left;
					height: 174px;
					margin: 0px;
					padding: 3px;
					width: 99px;
				}

					#grupo-contenido #contenido #productos .producto  .foto img
					{
						border: none;
						margin: 0px;
						max-height: 174px;
						width: 100%;
					}

				#grupo-contenido #contenido #productos .producto  .info
				{
					background: #FFF;
					border: none;
					float: right;
					height: 164px;
					margin: 0px;
					padding: 8px;
					width: 89px;
				}
	
					#grupo-contenido #contenido #productos .producto  .info .descripcion
					{
						color: #505050;
						display: block;
						font-weight: bold;
						height: 90px;
						line-height: 18px;
						margin-bottom: 4px;
						overflow: auto;
					}
	
					#grupo-contenido #contenido #productos .producto  .info .descuento
					{
						color: #0070C3;
						display: block;
						font-size: 18px;
						font-weight: bold;
						line-height: 24px;
					}
	
					#grupo-contenido #contenido #productos .producto  .info .precio
					{
						color: <?php echo $colorgeneralinicio; ?>;
						display: block;
						font-size: 22px;
						font-weight: bold;
						line-height: 24px;
					}
	
					#grupo-contenido #contenido #productos .producto  .info .precioAnterior
					{
						color: #6F6F6F;
						display: block;
						font-size: 14px;
						font-weight: normal;
						line-height: 24px;
						text-decoration: line-through;
					}

		#grupo-contenido #contenido #panel-derecho
		{
			background: transparent;
			border: none;
			float: right;
			height: 572px;
			margin: auto;
			padding: 0px;
			width: 272px;
		}

			#grupo-contenido #contenido #panel-derecho #marcas-cab
			{
				background: <?php echo $colorgeneralinicio; ?>;
				border: none;
				color: #FFF;
				clear: both;
				float: left;
				font-size: 28px;
				font-style: italic;
				font-weight: bold;
				letter-spacing: 2px;
				margin-bottom: 15px;
				padding: 10px;
				text-align: center;
				text-transform: uppercase;
				width: 252px;
			}

			#grupo-contenido #contenido #panel-derecho #marcas
			{
				background: #FFF;
				border: none;
				clear: both;
				float: left;
				height: 280px;
				margin-bottom: 30px;
				padding: 10px;
				width: 252px;
			}

				#grupo-contenido #contenido #panel-derecho #marcas .marca
				{
					background: transparent;
					border: none;
					float: left;
					height: 56px;
					line-height: 62px;
					padding: 0px 5px;
					text-align: center;
					width: 116px;
				}

					#grupo-contenido #contenido #panel-derecho #marcas .marca img
					{
						background: #FFF;
						border: none;
						max-height: 56px;
						max-width: 116px;
						padding: 0px;
						vertical-align: middle;
					}

			#grupo-contenido #contenido #panel-derecho #ver-marcas
			{
				background: #231F20;
				border: none;
				color: #FFF;
				clear: both;
				float: left;
				font-size: 18px;
				font-style: italic;
				font-weight: bold;
				letter-spacing: 1px;
				margin-bottom: 20px;
				padding: 10px;
				text-align: center;
				width: 252px;
			}

			#grupo-contenido #contenido #panel-derecho #contacto
			{
				background: url(../source/contacto.jpg) no-repeat center right;
				border: solid 1px #CCC;
				color: #000;
				clear: both;
				float: left;
				font-size: 24px;
				font-weight: bold;
				height: 92px;
				letter-spacing: 1px;
				margin-bottom: 15px;
				padding: 10px 0px;
				text-align: left;
				width: 270px;
			}

				#grupo-contenido #contenido #panel-derecho #contacto span
				{
					clear: both;
					float: left;
					font-size: 1.40rem;
					height: 34px;
					line-height: 34px;
					margin-top: 34px;
					padding: 0px 12px;
					vertical-align: middle;
					width: 248px;
				}

				#grupo-contenido #contenido #panel-derecho #contacto span#telefono
				{
					background-color: rgba(0,0,0,0.5);
					color: #FFF;
					margin-top: 0px;
				}

		#grupo-contenido #contenido #bajo
		{
			border-top: solid 1px #CCC;
			min-height: 285px;
		}

			#grupo-contenido #contenido #bajo img
			{
				float: right;
				height: 285px;
				margin: 0px;
				padding: 0px;
				width: 430px;
			}

				#grupo-contenido #contenido #bajo div
				{
					margin: 0px;
					min-height: 285px;
					padding: 0px;
					width: 490px;
				}

					#grupo-contenido #contenido #bajo div p
					{
						color: #A0A0A0;
						line-height: 18px;
						margin-top: 0px;
						padding-top: 0px;
						text-align: justify;
					}

					#grupo-contenido #contenido #bajo div p.titulo
					{
						color: #202020;
						font-size: 22px;
						font-weight: bold;
					}

					#grupo-contenido #contenido #bajo div p.subtitulo
					{
						color: #777;
					}
