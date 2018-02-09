<?php
    header("Content-type: text/css; charset: UTF-8");

    require_once($draiz.'../sistema/i_connectionstrings.php');

    $dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);

    $sql="SELECT * FROM bd_colores";
    $query = mysqli_query($dbi, $sql);
    $colores = mysqli_fetch_array($query);

    $colorprecio=$colores['colorprecioprod'];
    $colortextoprod = $colores['colortextoprod'];

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

		#grupo-contenido #contenido #producto
		{
			background: #FFF;
			display: inline-block;
			height: auto;
			margin-left: 6px;
			padding: 0px 0px 30px 0px;
			vertical-align: top;
			width: 937px;
		}

			#grupo-contenido #contenido #producto h3
			{
				color: <?php echo $colortextoprod; ?>;
			}

			#grupo-contenido #contenido #producto .producto
			{
				background: #231F20;
				display: inline-block;
				height: 400px;
				margin-bottom: 10px;
				margin-right: -4px;
				padding: 0px;
				width: 937px;
			}

				#grupo-contenido #contenido #producto .producto  .foto
				{
					background: #231F20;
					display: inline-block;
					height: 394px;
					line-height: 394px;
					margin: auto;
					padding: 3px;
					text-align: center;
					vertical-align: top;
					width: 394px;
				}

					#grupo-contenido #contenido #producto .producto  .foto img
					{
						max-height: 394px;
						max-width: 394px;
						min-height: 200px;
						min-width: 200px;
						vertical-align: middle;
					}

				#grupo-contenido #contenido #producto .producto  .info
				{
					background: #101010;
					border: solid 1px #202020;
					display: inline-block;
					height: 400px;
					margin: 0px 0px 0px -3px;
					padding: 0px;
					position: relative;
					vertical-align: top;
					width: 534px;
				}


					#grupo-contenido #contenido #producto .producto  .info  .info2
					{
						background: #101010;
						border-bottom: solid 1px #202020;
						display: block;
						height: 34px;
						margin: 0px;
						padding: 8px;
						position: relative;
						vertical-align: top;
						width: 520px;
					}
		
						#grupo-contenido #contenido #producto .producto  .info .info2 .descuento
						{
							color: #007EC2;
							display: inline-block;
							font-size: 18px;
							font-weight: bold;
							height: 34px;
							line-height: 34px;
							padding: 0px 5px;
							width: auto;
						}
		
						#grupo-contenido #contenido #producto .producto  .info .info2 .precio
						{
							color: #FFF;
							display: inline-block;
							font-size: 22px;
							font-weight: bold;
							line-height: 34px;
							height: 34px;
							padding: 0px 5px;
							position: absolute;
							right: 8px;
							width: auto;
						}
		
						#grupo-contenido #contenido #producto .producto  .info .info2 .precioAnterior
						{
							color: #666;
							display: inline-block;
							font-size: 18px;
							font-weight: normal;
							height: 34px;
							line-height: 34px;
							text-decoration: line-through;
							padding: 0px 5px;
							width: auto;
						}
	
					#grupo-contenido #contenido #producto .producto  .info .descripcion
					{
						color: #DDD;
						height: 230px;
						line-height: 18px;
						margin-bottom: 10px;
						overflow: auto;
						padding: 5px 20px;
						text-align: justify;
					}
		
					#grupo-contenido #contenido #producto .producto  .info  .talla
					{
						color: #DDD;
						display: inline-block;
						font-weight: bold;
						height: auto;
						margin: 0px;
						padding: 0px 20px 12px 20px;
						text-align: justify;
					}
		
						#grupo-contenido #contenido #producto .producto  .info  .talla select
						{
							width: 170px;
						}
		
					#grupo-contenido #contenido #producto .producto  .info  .acesta
					{
						background: #101010;
						border-radius: 5px;
						bottom: 4px;
						color: #FFF;
						display: inline-block;
						font-size: 14px;
						font-weight: normal;
						height: 26px;
						line-height: 26px;
						margin: 8px 20px;
						padding: 2px 12px;
						text-align: center;
						text-decoration: none;
						width: auto;
					}

		#grupo-contenido #contenido #opiniones, #grupo-contenido #contenido #productos
		{
			background: #FFF;
			/*border-top: solid 1px #202020;*/
			display: block;
			height: auto;
			margin-left: 6px;
			margin-top: 1px;
			padding: 30px 0px;
			vertical-align: top !important;
			width: auto;
		}

			#grupo-contenido #contenido #opiniones .opinion
			{
				background: #101010;
				border-left: solid 1px #202020;
				border-top: solid 1px #202020;
				display: block;
				height: auto;
				margin-top: 14px;
				padding: 20px 20px;
				vertical-align: top !important;
				width: auto;
			}

			#grupo-contenido #contenido #opiniones .opinion:first-child
			{
				margin-top: 0px;
			}

			#grupo-contenido #contenido #opiniones .opinion p.descripcion
			{
				text-align: justify;
			}

			#grupo-contenido #contenido #opiniones .opinion span.nombre, #grupo-contenido #contenido #opiniones .opinion span.fecha
			{
				font-style: italic;
				font-size: 0.8rem;
				text-shadow: -1px -1px 0px #000;
			}

			#grupo-contenido #contenido #opiniones .opinion span.fecha
			{
				float: right;
			}

			/*#grupo-contenido #contenido #productos .producto
			{
				background: #231F20;
				border: solid 1px #CCC;
				border-right: none;
				display: inline-block;
				height: 358px;
				margin-bottom: 10px;
				margin-right: -4px;
				padding: 0px;
				vertical-align: top !important;
				width: 233px;
			}

			#grupo-contenido #contenido #productos .lastp
			{
				border-right: solid 1px #CCC;
				margin-right: 0px;
			}

				#grupo-contenido #contenido #productos .producto  .foto
				{
					background: #FFF;
					border: none;
					display: block;
					height: 207px;
					line-height: 207px;
					margin: auto;
					padding: 3px;
					text-align: center;
					width: 207px;
				}

					#grupo-contenido #contenido #productos .producto  .foto img
					{
						max-height: 207px;
						max-width: 207px;
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
					width: 216px;
				}
	
					#grupo-contenido #contenido #productos .producto  .info .descripcion
					{
						color: #505050;
						display: block;
						height: 46px;
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
						width: 120px;
					}

					#grupo-contenido #contenido #productos .producto  .info .precio
					{
						color: <?php echo $colorprecio; ?>;
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