<?php
    header("Content-type: text/css; charset: UTF-8");

    require_once($draiz.'../sistema/i_connectionstrings.php');

    $dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);

    $sql="SELECT * FROM bd_colores";
    $query = mysqli_query($dbi, $sql);
    $colores = mysqli_fetch_array($query);

    $enlacesubmenures = $colores['enlacesubmenuresp'];
    $bordsubmenuhover = $colores['bordesubmenuhoverresp'];
    $fonsubmenuhover = $colores['fondosubmenuhoverresp'];
    $colorgenres = $colores['colorgeneralresp'];
    $colorgenprodres = $colores['colorgeneralprodsresp'];
?>

body
{
	
}

	#top
	{
		overflow: hidden;
		width: auto;
	}

	#cabecera
	{
		max-width: 1060px !important;
		overflow: hidden;
		width: auto;
        border-bottom: 1px #be2828 solid;
	}

	#grupo-menu
	{
		overflow: hidden;
		width: auto;
	}

		#grupo-menu #menu
		{
			max-width: 1060px !important;
			width: auto;
		}
		
			#grupo-menu #menu form[name="logout"]
			{
				float: right;
				margin-top: 12px;
				position: absolute;
				visibility: hidden;
			}
		
				#grupo-menu #menu form[name="logout"] span
				{
					color: #FFF;
					cursor: pointer;
					text-shadow: -1px -1px 0px #002E74;
				}
		
			#grupo-menu #menu #menu-op
			{
				background: transparent url(../source/menu.png) 4px center no-repeat;
				border: solid 1px #004E94;
				border-radius: 3px;
				color: #FFF;
				display: block !important;
				font-size: 20px;
				font-variant: small-caps;
				font-weight: bold;
				height: 0px;
				line-height: 36px;
				margin-bottom: 6px;
				margin-top: 3px;
				padding-left: 40px;
				padding-right: 10px;
				position: absolute;
				text-align: center;
				text-transform: lowercase;
				text-shadow: -1px -1px 0px #002E74;
				visibility: hidden;
				width: 50px;
			}

	#grupo-submenu
	{
		width: auto;
	}

		#grupo-submenu #submenu
		{
			max-width: 1060px !important;
			width: auto;
		}

		#grupo-submenu .menuabierto
		{
			height: auto !important;
		}

		#grupo-submenu .menuabiertobt
		{
			border-bottom-color: #004E94 !important;
			border-bottom-width: 2px !important;
			border-left: none !important;
			border-right: none !important;
			border-top: none !important;
			border-radius: 0px !important;
			margin-top: 7px !important;
		}
		

		#grupo-submenu #submenu-r
		{
			background: #F3F3F3;
			height: 45px;
			margin: auto;
			margin-top: -3px;
			max-width: 1060px;
			padding: 0px 22px;
			visibility: hidden;
			width: auto;
		}

			#grupo-submenu #submenu-r span.button:hover
			{
				background: -webkit-linear-gradient(#ACACAC, #F0F0F0);
				background: -o-linear-gradient(#ACACAC, #F0F0F0);
				background: -moz-linear-gradient(#ACACAC, #F0F0F0);
				background: linear-gradient(#ACACAC, #F0F0F0);
				cursor: pointer;
			}

			#grupo-submenu #submenu-r ul
			{
				display: none;
				height: auto;
				list-style: none;
				margin: 0px;
				padding: 0px;
			}

			#grupo-submenu #submenu-r #submenu-op
			{
				background: transparent;
				border-radius: 3px;
				color: <?php echo $enlacesubmenures; ?>;
				display: block !important;
				font-size: 1.3rem;
				font-variant: small-caps;
				font-weight: bold;
				height: 45px;
				line-height: 45px;
				margin-top:8px;
				padding: 0px 8px;
				text-align: center;
				text-transform: lowercase;
				text-shadow: -1px -1px 0px #FFF;
				transition: color, 0.5s;
				vertical-align: middle;
				width: auto;
			}
            
			#grupo-submenu #submenu-r #submenu-op:hover
			{
				background: #CCC;
				text-shadow: -1px -1px 0px #DDD;
				color: <?php echo $enlacesubmenures; ?>;
			}
			
			#grupo-submenu #submenu-r a
			{
				color: <?php echo $enlacesubmenures; ?>;
				display: block !important;
				text-decoration: none;
				width: auto;
			}
			
			#grupo-submenu #submenu-r span
			{
				color: #333;
				float: left;
				text-decoration: none;
				width: auto;
			}
			
			#grupo-submenu #submenu-r span.submenu-op
			{
				background: transparent;
				border-left: solid 1px #DDD;
				box-shadow: -1px 0px 0px #FFF;
				color: #999;
				cursor: pointer;
				font-size: 1.5rem;
				font-weight: bold;
				padding: 0px 0.7rem;
				position: absolute;
				right: 0px;
				text-align: center;
				text-decoration: none;
				text-shadow: -1px -1px 0px #EEE;
				top: 0px;
				transition: background, 0.5s, color 0.5s;
				width: 1.5rem;
			}
			
			#grupo-submenu #submenu-r span.submenu-op:hover
			{
				background: <?php echo $fonsubmenuhover; ?>;
				border-left: solid 1px <?php echo $bordsubmenuhover; ?>;
				box-shadow: -1px 0px 0px #DF3B39;
				color: #FFF;
			}
			
			#grupo-submenu #submenu-r ul li
			{
				color: #004E94;
				display: block !important;
				font-size: 0.9rem;
				line-height: 2.5rem;
				min-height: 2.5rem;
				position: relative;
				width: auto;
			}
			
			#grupo-submenu #submenu-r ul li.sm1, #grupo-submenu #submenu-r ul li.sm2
			{
				font-size: 0.75rem;
				line-height: 35px;
				min-height: 35px;
				padding-left: 26px;
			}
			
				#grupo-submenu #submenu-r ul li a
				{
					padding: 0px 16px;
					transition: background, 0.5s, color 0.5s;
				}
			
				#grupo-submenu #submenu-r ul li a:hover
				{
					background: <?php echo $fonsubmenuhover; ?>;
					color: #FFF;
				}
			
				#grupo-submenu #submenu-r ul li:hover>a
				{
					padding: 0px 16px;
					text-shadow: none;
				}
			
				#grupo-submenu #submenu-r ul li span
				{
					padding: 0px 16px;
				}

	#posicion-bar
	{
		overflow: hidden;
		width: auto;
	}

		#posicion-bar div
		{
			max-width: 1060px !important;
			width: auto;
		}

	#grupo-contenido #contenido #panel-superior, #grupo-contenido #contenido #panel-inferior
	{
		max-width: 1060px;
		overflow: hidden;
		width: auto;
	}
	
	#grupo-contenido #contenido
	{
		overflow: hidden;
		width: auto;
	}
	
		#grupo-contenido #contenido
		{
			max-width: 1060px;
			width: auto;
		}
	
				#grupo-contenido #contenido #producto .producto-r
				{
					height: auto !important;
					overflow: hidden;
					position: relative !important;
					top: 0px;
					visibility: visible !important;
					width: 100% !important;
				}
	
					#grupo-contenido #contenido #producto .producto-r .foto
					{
						display: inline-block;
						height: auto;
						margin-top: 0px;
						vertical-align: top;
						width: 50%;
					}
	
	
					#grupo-contenido #contenido #producto .producto-r .descripcion
					{
						display: block;
						height: auto;
						margin-top: 10px;
						/*max-height: 450px;*/
						overflow: auto;
						vertical-align: top;
						width: auto;
					}
	
	
					#grupo-contenido #contenido #producto .producto-r .descripcion2
					{
						display: inline-block;
						height: auto;
						margin-right: 9%;
						margin-top: 10px;
						/*max-height: 450px;*/
						max-width: 40%;
						overflow: auto;
						vertical-align: top;
						width: auto;
					}
	
	
					#grupo-contenido #contenido #producto .producto-r form
					{
						display: inline-block;
						height: auto;
						margin-bottom: 10px;
						margin-left: 10px;
						margin-top: 0px;
						max-height: 450px;
						overflow: auto;
						vertical-align: top;
						width: 48%;
					}
	
					#grupo-contenido #contenido #producto .producto-r .info
					{
						height: auto;
						margin-bottom: 15px;
						width: 100%;
					}
	
						#grupo-contenido #contenido #producto .producto-r .info span
						{
							color: <?php echo $colorgenres; ?>;
							border: solid 1px <?php echo $colorgenres; ?>;
							border-right: none;
							box-sizing: border-box;
							display: inline-block;
							font-size: 20px;
							font-weight: bold;
							height: auto;
							margin-right: -4px;
							padding: 10px 0px;
							text-align: center;
							width: 30%;
						}
	
						#grupo-contenido #contenido #producto .producto-r .info span:nth-child(2)
						{
							color: #666;
							border-left: none;
							border-right: none;
							text-decoration: line-through;
						}
	
						#grupo-contenido #contenido #producto .producto-r .info span:last-child
						{
                            
							color: <?php echo $colorgenprodres; ?>;
							border-left: none;
							border-right: solid 1px <?php echo $colorgenres; ?>;
							width: 40%;
						}
	
						#grupo-contenido #contenido #producto .producto-r .info p
						{
							color: #DDD;
						}
	
					#grupo-contenido #contenido #producto .producto-r .talla
					{
						display: block;
						margin: 0px 0px 10px 0px;
						max-width: 350px;
						width: 40%;
					}
	
						#grupo-contenido #contenido #producto .producto-r .talla select, #grupo-contenido #contenido #producto .producto-r .talla input[type="text"]
						{
							border: solid 1px #CCC;
							border-radius: 2px;
							box-sizing: border-box;
							font-family: inherit;
							font-size: 16px;
							font-weight: lighter;
							height: auto;
							margin-bottom: 0px;
							max-width: 270px;
							padding: 8px 8px;
							width: 100%;
						}
	
						#grupo-contenido #contenido #producto .producto-r .talla input[type="text"]
						{
							margin-bottom: 12px;
						}
	
					#grupo-contenido #contenido #producto .producto-r span.button
					{
						display: block;
						max-width: 300px;
						margin: 0px 0px 10px 0px;
					}

		#grupo-contenido #contenido #novedades, #grupo-contenido #contenido #masvendidos, #grupo-contenido #contenido #bajo
		{
			width: auto;
		}

		#grupo-contenido #contenido>.informacion
		{
			height: 0px;
			visibility: hidden;
		}

	#pie
	{
		overflow: hidden;
		width: auto;
	}

		#pie #linea-roja
		{
			width: auto;
		}

		#pie #piein
		{
			max-width: 1060px !important;
			width: auto;
		}

			#pie #piein #sociales
			{
				margin-right: 20px;
			}

	#Messages
	{
		overflow: hidden;
		width: auto;
	}

		#Messages #LbMessage, #Messages #LbMessageWarning, #Messages #LbMessageError
		{
			max-width: 1060px !important;
			width: auto;
		}


				
	#grupo-contenido #contenido #productos div.producto3
	{
		margin-left: 0% !important;
		padding: 2% 2% 1.5% 2% !important;
		width: 27% !important;
	}

	#grupo-contenido #contenido #productos div.producto3:not(:nth-child(3n))
	{
		margin-right: 2.5% !important;
	}

	#grupo-contenido #contenido #productos div.producto3:not(:nth-child(1)):not(:nth-child(2)):not(:nth-child(3))
	{
		margin-top: 3% !important;
	}
		

@media (max-width:1050px)
{

    #cabecera {
        width: auto !important;
        padding-left: 25px;
        padding-right: 25px;
    }
}
		
		
@media (max-width:940px)
{
	#slider
	{
		display: none !important;
	}

				#grupo-contenido #contenido>.informacion
				{
					height: auto !important;
					visibility: visible;
				}

				#grupo-contenido #contenido .informacion :nth-child(1), #grupo-contenido #contenido .informacion :nth-child(2)
				{
					position: absolute;
					height: 0px;
					top: 0px;
					visibility: hidden;
					width: 0px;
				}
	
			#grupo-contenido #contenido #producto
			{
				display: block;
				width: auto !important;
			}
	
				#grupo-contenido #contenido #producto .producto
				{
					position: absolute;
					height: 0px;
					overflow: hidden;
					top: 0px;
					visibility: hidden;
					width: 0px;
				}
	
					#grupo-contenido #contenido #producto .producto *
					{
						position: absolute;
						height: 0px;
						overflow: hidden;
						top: 0px;
						visibility: hidden;
						width: 0px;
					}
	
				#grupo-contenido #contenido #producto .producto-r
				{
					height: auto !important;
					position: relative !important;
					visibility: visible !important;
					width: 100% !important;
				}
	
					#grupo-contenido #contenido #producto .producto-r .foto
					{
						display: block;
						width: auto;
					}
	
	
					#grupo-contenido #contenido #producto .producto-r form
					{
						display: block;
						margin-left: 0px;
						margin-top: 10px;
						max-height: 1000px;
						width: auto;
					}
	
					#grupo-contenido #contenido #producto .producto-r .descripcion
					{
						display: block;
						margin-left: 0px;
						margin-top: 0px;
						max-height: 1000px;
						width: auto;
					}
	
					#grupo-contenido #contenido #producto .producto-r .descripcion2
					{
						display: block;
						margin-left: 0px;
						margin-right: 0px;
						margin-top: 0px;
						max-height: 1000px;
						max-width: 100%;
						width: auto;
					}
	
					#grupo-contenido #contenido #producto .producto-r .info
					{
						height: auto;
						width: 100%;
					}
	
						#grupo-contenido #contenido #producto .producto-r .info span
						{
							color: #007EC2;
							background: #101010;
							display: inline-block;
							font-size: 20px;
							font-weight: bold;
							height: auto;
							margin-right: -4px;
							padding: 10px 0px;
							text-align: center;
							width: 30%;
						}
	
						#grupo-contenido #contenido #producto .producto-r .info span:nth-child(2)
						{
							color: #666;
							text-decoration: line-through;
						}
	
						#grupo-contenido #contenido #producto .producto-r .info span:last-child
						{
							color: #FFF;
							width: 40%;
						}
	
						#grupo-contenido #contenido #producto .producto-r .info p
						{
							color: #DDD;
						}
	
					#grupo-contenido #contenido #producto .producto-r .talla
					{
						display: inline-block;
						margin: 0px 0px 10px 0px;
						max-width: 350px;
						width: 40%;
					}
	
						#grupo-contenido #contenido #producto .producto-r .talla select, #grupo-contenido #contenido #producto .producto-r .talla input[type="text"]
						{
							border: solid 1px #CCC;
							border-radius: 2px;
							box-sizing: border-box;
							font-family: inherit;
							font-size: 16px;
							font-weight: lighter;
							height: auto;
							margin-bottom: 12px;
							max-width: 270px;
							padding: 8px 8px;
							width: 100%;
						}
	
					#grupo-contenido #contenido #producto .producto-r span.button
					{
						display: block;
					}
	
					#grupo-contenido #contenido #producto .producto-r #personalicesug
					{
						float: right;
					}

			#grupo-contenido #contenido #articulo
			{
				width: auto !important;
			}

				#grupo-contenido #contenido #articulo div#texto
				{
					display: block;
					float: none;
					height: auto;
					margin: auto;
					width: auto !important;
				}

				#grupo-contenido #contenido #articulo img#textoimga
				{
					display: block;
					float: none;
					height: auto;
					margin: auto;
					max-width: 100%;
					width: auto;
				}
			
			#grupo-contenido #contenido #panel-derecho
			{
				position: absolute;
				visibility: hidden;
			}
			
			#grupo-contenido #contenido #panel-izquierdo
			{
				display: block;
				width: auto;
			}
			
				#grupo-contenido #contenido #panel-izquierdo span[name="BtReset"]
				{
					display: block;
					max-width: 150px;
					margin: 0px 0px 20px 0px;
					vertical-align: top;
					width: auto;
				}
			
			#grupo-contenido #contenido #panel-superior
			{
				height: auto;
			}
			
				#grupo-contenido #contenido #panel-izquierdo .panel-izquierdo
				{
					display: inline-block;
					vertical-align: top;
					width: auto;
				}
					
					#grupo-contenido #contenido #panel-izquierdo .panel-izquierdo span
					{
						width: auto;
					}
			
					#grupo-contenido #contenido #panel-izquierdo .panel-izquierdo span:not(:last-child):after
					{
						content: ", ";
					}
					
					#grupo-contenido #contenido #panel-superior div#ordenar
					{
						margin-left: 0px;
					}
					
				#grupo-contenido #contenido #productos
				{
					width: auto !important;
				}

			#pie #piein #logopie
			{
				display: block;
				height: 120px;
				margin: auto;
				width: auto;
			}

			#pie #piein #lalala
			{
				display: block;
				height: auto;
				margin: auto;
				text-align: center;
				width: auto;
			}

			#pie #piein #lalala *
			{
				text-align: left;
			}
}
		

		
		
@media (max-width:950px)
{

    #sli{
        width: 95% !important;
    }

	#top
	{
		width: auto;
	}

		#top div
		{
			padding: 0px;
			width: auto;
		}
				
	#grupo-contenido #contenido #productos div.muestra div.producto, #grupo-contenido #contenido #novedades div.muestra div.producto, #grupo-contenido #contenido #masvendidos div.muestra div.producto
	{
		padding: 2% 2% 1.5% 2%;
		width: 44%;
	}

	#grupo-contenido #contenido #productos div.muestra div.producto:nth-child(odd), #grupo-contenido #contenido #novedades div.muestra div.producto:nth-child(odd), #grupo-contenido #contenido #masvendidos div.muestra div.producto:nth-child(odd)
	{
		margin-left: 0% !important;
	}

	#grupo-contenido #contenido #productos div.muestra div.producto:not(:nth-child(1)):not(:nth-child(2)), #grupo-contenido #contenido #novedades div.muestra div.producto:not(:nth-child(1)):not(:nth-child(2)), #grupo-contenido #contenido #masvendidos div.muestra div.producto:not(:nth-child(1)):not(:nth-child(2))
	{
		margin-top: 3% !important;
	}
}
		

		
		
@media (max-width:900px)
{

    #cabecera {
        width: auto !important;
        padding-left: none;
        padding-right: none;
    }
    
	#cabecera #logo
	{
		display: block;
		float: none;
		margin: 0px;
		margin: auto;
		text-align: center;
	}
		
	#cabecera #buscador
	{
		display: block;
		float: none;
		height: 36px;
		margin-left: 0px;
		margin: auto;
		margin-top: 15px;
		text-align: center;
		width: 252px;
	}
	
	#cabecera #botones
	{
		display: block;
		float: none;
		margin-left: 0px;
		margin: auto;
		margin-top: 15px;
		text-align: center;
	}

		#cabecera #botones a
		{
			margin-left: 3px;
			margin-right: 3px;
		}
	
	#pie #piein #menupie
	{
		border-left: none;
	}
}
		

		
		
@media (max-width:1030px)
{
		#grupo-submenu #submenu ul, #grupo-submenu #submenu
		{
			height: 0px;
			left: 0px;
			overflow: hidden;
			padding: 0px;
			position: absolute;
			top: 0px;
			visibility: hidden;
			width: 0px;
		}

		#grupo-submenu
		{
			height: auto;
			overflow: hidden;
			width: auto;
		}

			#grupo-submenu #submenu *
			{
				left: 0px !important;
				padding: 0px !important;
				position: absolute !important;
				width: 0px !important;
			}

	#grupo-submenu #submenu-r
	{
		visibility: visible;
	}
	
	table#tcesta tr td:nth-child(2)
	{
		display: none;
	}
}
		

		
		
@media (max-width:830px)
{
	body
	{
		background-repeat: repeat !important;
	}

		#top div
		{
			text-align: center;
		}

			#top div>span
			{
				display: none;
			}

			#top div span
			{
				float: none;
				width: auto;
			}

				#top div a img
				{
					float: none;
				}

			#top div>div
			{
				float: none;
				margin: auto;
			}

				#top div>div a
				{
					float: none;
					margin: 0px;
					padding: 8px;
				}
	
	#cabecera
	{
		height: auto;
	}
	
		#cabecera #logo
		{
			float: none;
			margin: 0px;
			margin: auto;
			text-align: center;
		}

			#cabecera #botones .boton
			{
				display: inline-block;
				float: none;
				margin: 15px;
			}

		#grupo-menu #menu
		{
			height: auto;
		}
		
			#grupo-menu #menu form[name="logout"]
			{
				position: relative;
				visibility: visible;
			}
		
			#grupo-menu #menu #menu-op
			{
				height: 36px;
				position: relative;
				visibility: visible;
			}

			#grupo-menu #menu .menu
			{
				display: block;
				float: none;
				width: auto;
			}

				#grupo-menu #menu .menu a
				{
					display: block;
					width: auto;
				}

			#grupo-menu #menu .menu:hover
			{
				background: #009EE4;
			}

			#grupo-contenido #contenido #articulo
			{
				margin: auto;
				padding: 0px;
				width: auto;
			}
			
				#grupo-contenido #contenido #bajo img
				{
					display: block;
					float: none;
					height: auto;
					margin-bottom: 20px;
					width: 100%;
				}

				#grupo-contenido #contenido #bajo div
				{
					width: auto;
				}
	
			#grupo-contenido #contenido #productos
			{
				display: block !important;
			}

	#grupo-contenido #contenido #productos .superpr
	{
		display: block;
		height: auto;
		margin: 0px 0px 15px 0px;
		padding: 0px;
		vertical-align: top;
		width: auto;
	}
}
		

		
		
@media (max-width:740px)
{
    
    div#menu-cate
    {
        display: inline-block;
        float: none;
        margin-left: 2%;
        width: 100%;
        margin: 0 auto;
        /*border: 2px solid black;*/
    }
    
    div#publicaciones
    {
        width: 100%;
    }
    
		#grupo-contenido #contenido .informacion :nth-child(3), #grupo-contenido #contenido .informacion :nth-child(4)
		{
			position: absolute;
			height: 0px;
			top: 0px;
			visibility: hidden;
			width: 0px;
		}
				
	#grupo-contenido #contenido #productos div.producto3
	{
		margin-left: 2% !important;
		margin-right: 0% !important;
		padding: 2% 2% 1.5% 2% !important;
		width: 44% !important;
	}

	#grupo-contenido #contenido #productos div.producto3:nth-child(odd)
	{
		margin-left: 0% !important;
		margin-right: 0% !important;
	}

	#grupo-contenido #contenido #productos div.producto3:not(:nth-child(1)):not(:nth-child(2))
	{
		margin-top: 3% !important;
	}
	
	#grupo-contenido #contenido #productos div.producto3:not(:nth-child(3n))
	{
		margin-right: 0% !important;
	}
	
	table#tcesta tr td:nth-child(4), table#tcesta tr td:nth-child(5), table#tcesta tr td:nth-child(6), table#tcesta tr td:nth-child(7)
	{
		font-size: 1rem;
	}
	
	table#tcesta tr td
	{
		min-width: 7%;
	}
}
		

		
		
@media (max-width:660px)
{

    #cabecera #logo {
        width: 90%;
    }
    
	#grupo-contenido #articulo form[name="logout"]
	{
		display: block;
		float: none !important;
	}
	
	#grupo-contenido #contenido #producto .producto-r #personalicesug
	{
		float: none;
	}

	#pie #piein #menupie, #pie #piein .enlacespie
	{
		display: block;
		text-align: center !important;
	}
	
	#pie #piein .enlacespie
	{
		margin-top: 30px;
	}

	#pie #piein #menupie *, #pie #piein .enlacespie *
	{
		text-align: center !important;
	}

	#pie #piein #menupie p a:before, #pie #piein .enlacespie p a:before
	{
		content: "" !important;
	}
}
		

		
		
@media (max-width:600px)
{

    #cabecera #botones {
        width: auto;
    }

	#grupo-contenido #contenido #productos div.producto3, #grupo-contenido #contenido #productos div.muestra div.producto, #grupo-contenido #contenido #novedades div.muestra div.producto, #grupo-contenido #contenido #masvendidos div.muestra div.producto
	{
		display: block !important;
		margin: 0px !important;
		width: auto !important;
	}
	
	#grupo-contenido #contenido #productos div.producto3, #grupo-contenido #contenido #productos div.muestra div.producto:not(:nth-child(1)), #grupo-contenido #contenido #novedades div.muestra div.producto:not(:nth-child(1)), #grupo-contenido #contenido #masvendidos div.muestra div.producto:not(:nth-child(1))
	{
		margin-top: 3% !important;
	}
	
	table#tcesta tr td:nth-child(3)
	{
		font-size: 1rem;
	}

    .zoom{
        /* Aumentamos la anchura y altura durante 2 segundos */
        transition: width 1s, height 1s, transform 1s;
        -moz-transition: width 1s, height 1s, -moz-transform 1s;
        -webkit-transition: width 1s, height 1s, -webkit-transform 1s;
        -o-transition: width 1s, height 1s,-o-transform 1s;
    }
    .zoom:hover{
        /* tranformamos el elemento al pasar el mouse por encima al doble de
           su tamaño con scale(2). */
        transform : scale(1.03);
        -moz-transform : scale(1.03);      /* Firefox */
        -webkit-transform : scale(1.03);   /* Chrome - Safari */
        -o-transform : scale(1.03);        /* Opera */
    }

    #grupo-contenido #contenido #productos .producto a.vermas, #grupo-contenido #contenido #novedades div.muestra div.producto a.vermas, #grupo-contenido #contenido #masvendidos div.muestra div.producto a.vermas
    {
        float: none;
        display: block;
        margin: 0px;
        font-size: 16px;
        text-align: center;
        margin-top: 8px;
        max-width: 95% !important;
        padding: 15px 15px;
        transition: border 1s, background 1s, color 1s;
        width: auto;
    }

    #grupo-contenido #contenido #productos .producto .precio, #grupo-contenido #contenido #novedades div.muestra div.producto .precio, #grupo-contenido #contenido #masvendidos div.muestra div.producto .precio{
        text-align:center;
        font-size: 26px;
        width: 100%;
        max-width: 100%;
    }

    #grupo-contenido #contenido #productos .producto .descripcion, #grupo-contenido #contenido #novedades div.muestra div.producto .descripcion, #grupo-contenido #contenido #masvendidos div.muestra div.producto .descripcion {
        text-align:center;
        font-size: 26px;
        width: 100%;
        max-width: 100%;
    }

}
		

		
		
@media (max-width:480px)
{

	table#tcesta tr td:nth-child(3), table#tcesta tr td:nth-child(4), table#tcesta tr td:nth-child(5), table#tcesta tr td:nth-child(6), table#tcesta tr td:nth-child(7)
	{
		font-size: 0.9rem;
	}
	
	table#tcesta tr td:first-child a
	{
		background: transparent !important;
		border: none !important;
		font-size: 1rem !important;
		padding: 0px !important;
		width: auto !important;
	}
	
	#pie #piein #enlacespie
	{
		display: block;
		border-left: none;
		margin-top: 20px;
	}
}
		

		
		
@media (max-width:465px)
{
	table:not(#tcesta):not(#tpedido) tr td:first-child
	{
		display: none;
	}
}

@media (max-width:340px)
{

    #top
	{
        height: 70px;
	}
}