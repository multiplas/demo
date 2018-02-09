<?php
    header("Content-type: text/css; charset: UTF-8");
    
    require_once($draiz.'../sistema/i_connectionstrings.php');

    $dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);

    $sql="SELECT * FROM bd_colores";
    $query = mysqli_query($dbi, $sql);
    $colores = mysqli_fetch_array($query);
    
    $sql2="SELECT * FROM bd_colores_productos";
    $query2 = mysqli_query($dbi, $sql2);
    $colores2 = mysqli_fetch_array($query2);
    
    $colorgaleria=$colores['colorgaleriamain'];
    $colorbotones=$colores['colorbotonesmain'];
    $colorbotoneshover=$colores['colorbotoneshovermain'];
    $colorposbar = $colores['colorposbarmain'];
    $colorposbarSup = $colores['colorposbarmainSup'];
    $colorenlace = $colores['colorenlacemain'];
    $colortextogen = $colores['colortextomain'];
    $colorbordeprods = $colores['colorbordeprodsmain'];
    $colordescprodini = $colores['colortextoprodsmain'];
    $colorlogotop = $colores['colorlogotop'];
    $colorlogobot = $colores['colorlogobot'];
    $pie_letras = $colores2['pie_letras'];
     

    $sql="SELECT * FROM bd_empresa";
    $query2 = mysqli_query($dbi, $sql);
    $logo = mysqli_fetch_array($query2);

    $logoInf=$logo['logoinf'];

?>

.wysiwyg-text-align-right{
  text-align: right;
}
.wysiwyg-text-align-center{
  text-align: center;
}
.wysiwyg-text-align-left{
  text-align: left;
}
.wysiwyg-text-align-justify{
  text-align: justify;
}


body
{
    background: <?php echo $colortextogen; ?>;
	border: none;
	color: #333;
	font-family: MiFuente, MiFuenteIE, arial;
	font-size: 14px;
	margin: auto;
	outline: 0;
	padding: 0px;
}

    .click-desc{
        margin-bottom:50px;
        text-align:center;
        border:1px solid <?php echo $colorbotones; ?>;
        background: <?php echo $colorbotones; ?>;
        color: #FFF;
        cursor:pointer;
    }

    .click-desc:hover{
        text-align:center;
        border:1px solid <?php echo $colorbotones; ?>;
        background: #fff;
        color:<?php echo $colorbotones; ?>;;
        cursor:pointer;
    }


    .contenedor:hover {
      -webkit-box-shadow: 0px 2px 5px #999;
      -moz-box-shadow: 0px 2px 5px #999;
      box-shadow: 0px 2px 5px #999;
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
        transform : scale(1.12);
        -moz-transform : scale(1.12);      /* Firefox */
        -webkit-transform : scale(1.12);   /* Chrome - Safari */
        -o-transform : scale(1.12);        /* Opera */
    }

body a
{
	border: none;
	color: inherit;
	text-decoration: inherit;
}
	
/* TODOS LOS PRODUCTOS */

#superflotante
{
	background: #FFF !important;
	border: solid 3px <?php echo $colortextogen; ?> !important;
	border-radius: 3px !important;
	border-top: solid 3px <?php echo $colortextogen; ?> !important;
	color: #333 !important;
	/*height: 500px !important;*/
	padding: 8px;
	position: absolute !important;
	z-index: 90000 !important;
	width: 97.2% !important;
	text-align: left !important;
	display:none;
    margin-top: -3px !important;
    margin-left: 8px;
}

	#superflotante div
	{
		display: inline-block !important;
		vertical-align: top;
		width: 181px !important;
		margin: 2px;
	}

	#superflotante a
	{
		color: #333 !important;
		text-align: left !important;
		text-transform: initial !important;
		font-size: 10px !important;
		line-height: 16px !important;
		height: 16px !important;
		width: 170px !important;
	}

	#superflotante a:hover
	{
		background: none !important;
		height: 14px !important;
		color: inherit !important;
	}
	
	#superflotante span
	{
		background: <?php echo $colorposbar; ?> !important;
		max-width: 160px !important;
		color: #FFF !important;
		text-align: left !important;
		line-height: 16px !important;
		height: 14px !important;
		width: 170px !important;
		float: left !important;
		padding: 6px 5px;
	}
	
		#superflotante span a
		{
			color: #FFF !important;
			font-size: 12px !important;
			line-height: 14px !important;
		}


/* ******************* */



.fancybox-overlay
{
    z-index: 60000 !important;
}
	
::-webkit-scrollbar {
    width: 8px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 18px rgba(87, 87, 87, 0.38); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 18px rgba(181, 181, 181, 0.9); 
}

.divgroupgalery
{
    box-sizing: border-box;
    display: inline-block;
    height: 180px;
    margin: 1% 2% 4% 2%;
    text-align: center;
    vertical-align: top;
    width: 45%;
    overflow: hidden;
}
	
    .divgroupgalery .groupgalery
        {
        /*border: solid 5px <?php echo $colorgaleria; ?>;*/
        border-radius: 4px;
        box-sizing: border-box;
        display: inline-block;
        height: 194px;
        max-width: 100%;
        padding: 2px;
        width: auto;
    }
        
        .divgroupgalery .groupgalery img
                {
            box-sizing: border-box;
            /*height: 180px;*/
            max-width: 100%;
            width: 350px;
        }

            #cabecera .logos_sociales i.fa
                        {
                color: <?php echo $colorlogotop; ?>;
                font-size: 1.00rem;
                margin: 1.00rem 0.20rem 0px 0.20rem;
                opacity: 0.7;
                transition: opacity 0.3s;
            }

            #pie .logos_sociales i.fa
                        {
                color: <?php echo $colorlogobot; ?>;
                font-size: 2.00rem;
                margin: 1.00rem 0.20rem 0px 0.20rem;
                opacity: 1;
                transition: opacity 0.3s;
            }

            #pie .logos_sociales i.fa
                        {
                margin-top: 0px;
            }

            #cabecera .logos_sociales i.fa:hover, #pie .logos_sociales i.fa:hover
                        {
                opacity: 1;
            }
	
body span.button
{
	background: <?php echo $colorbotones; ?>;
	border: none;
	border-radius: 3px;
	display: inline-block;
	color: #FFF;
	cursor: pointer;
	font-weight: normal;
	line-height: 18px;
	height: auto;
	margin: 8px auto;
	/*min-width: 120px;*/
	outline: none;
	padding: 6px 6px;
	text-align: center;
	transition: background, 0.5s;
	vertical-align: middle;
	width: auto;
}

body span.button:hover
{
	background: <?php echo $colorbotoneshover; ?>;
	cursor: pointer;
}

	#top
	{
		background: <?php echo $colorposbarSup; ?>;
		height: 36px;
		margin: auto;
		/*min-width: 994px;*/
		padding: 0px;
		width: 1060px;
	}

		#top>div
		{
			color: #333;
			height: 36px;
			line-height: 36px;
			margin: auto;
			padding: 0px 0px 0px 0px;
			width: 1060px;
		}

			#top div div
			{
				float: right;
				margin-left: 0px;
			}

			#top div div a
			{
				background: rgba(255, 255, 255, 0.2);
				float: left;
				margin-left: 16px;
				padding: 0px 16px;
                transition: background 0.50s;
			}

            .color-menu-cat{

                background-color: #8e2424;

            }

			#top div div a.desconectar
			{
				background: rgba(255, 255, 255, 0.2) url(/source/standby.png) no-repeat center;
				background-size: 16px;
			}

			#top div div a span.opcuenta
			{
				background: transparent url(/source/opt.png) no-repeat center right !important;
				background-size: 20px !important;
				padding-right: 26px;
			}

			#top div div a:hover
			{
				background: rgba(46, 46, 46, 0.3);
			}

			#top div div a.desconectar:hover
			{
				background: rgba(47, 47, 47, 0.3) url(/source/standby.png) no-repeat center;
				background-size: 16px;
			}

	#cabecera
	{
		height: auto;
		margin: auto;
		padding: 16px 0px;
		width: 100% !important;
        display: table;
	}

		#cabecera #logo
		{
			vertical-align:middle;
			margin-top: 12px;
			max-width: 90%;
            width: 58%;
            display: table;
            table-layout: fixed;
		}

			#cabecera #logo img
			{
				max-width: 90%;
			}

		#cabecera #buscador
		{
			vertical-align:middle;
			height: auto;
            text-align: center;
			margin: 0 0 0 0;
			padding: 0px;
			width: 33%;
            display: table-cell;
		}

			#cabecera  #buscador #titulo
			{
				color: #DDD;
				display: none;
				font-size: 20px;
				font-style: italic;
				float: left;
				letter-spacing: 3px;
				margin: -2px 0px 6px 0px;
				visibility: hidden;
			}

			#cabecera  #buscador input[type=text]
			{
				background: rgba(255, 255, 255, 0.20);
				border: none;
				border-bottom-left-radius: 3px;
				border-top-left-radius: 3px;
				color: #FFF;
				float: left;
				font-size: 20px;
				outline: none;
				padding: 7px 5px;
				width: 200px;
                vertical-align: middle;
			}

			#cabecera  #buscador span#BtBuscar
			{
				background: #1a1a1a url(../source/lupa.png);
				background-position: center;
				background-repeat: no-repeat;
				border: none;
				border-bottom-right-radius: 3px;
				border-top-right-radius: 3px;
				float: left;
				font-size: 20px;
				height: 25px;
				padding: 6px;
				width: 30px;
				margin-left: 0px;
                vertical-align: middle;
			}
			
			#cabecera  #buscador span#BtBuscar:hover
			{
				cursor: pointer;
			}

		#cabecera #botones
		{
			margin-right: 0px;
			margin-top: 12px;
			margin-bottom: 7px;
            display: table-cell;
            text-align: right;
            vertical-align:middle;
            width: 33%;
		}

			#cabecera #botones .boton
			{
				color: #007fAF;
				float: left;
				height: 20px;
				margin-top: -4px;
				padding-top: 50px;
				text-align: center;
				width: 70px;
			}

			#cabecera #botones a
			{
				margin-left: 5px;
			}

                #cabecera #botones a img
                                {
                    opacity: 0.7;
                    transition: opacity 0.50s;
                }

                #cabecera #botones a:hover img
                                {
                    opacity: 1;
                }

			#cabecera #cuenta
			{
				background: url(../source/micuenta.png) no-repeat center top;
			}

			#cabecera #cesta
			{
				background: url(../source/cesta.png) no-repeat center top;
			}

	#grupo-menu
	{
		/*background: #202020;*/
		background: -webkit-linear-gradient(#0071BC, #002763); /* For Safari 5.1 to 6.0 */
		background: -o-linear-gradient(#0071BC, #002763); /* For Opera 11.1 to 12.0 */
		background: -moz-linear-gradient(#0071BC, #002763); /* For Firefox 3.6 to 15 */
		background: linear-gradient(#0071BC, #002763); /* Standard syntax */
		box-shadow: 0px 0px 8px #333;
		height: 45px;
		margin: auto;
		/*min-width: 994px;*/
		padding: 0px;
		position: relative;
		width: auto;
		z-index: 55000;
	}

		#grupo-menu #menu
		{
			height: 45px;
			margin: auto;
			padding: 0px 22px;
			width: 1060px;
		}

			#grupo-menu #menu .menu
			{
				color: #FFF;
				float: left;
				font-size: 14px;
				text-transform: uppercase;
				height: 45px;
				line-height: 45px;
				padding: 0px 16px;
			}

			#grupo-menu #menu .seleccionado
			{
				color: #FFF;
				background: #202020;
			}

	#grupo-submenu
	{
		background: #333333;
		border-bottom: solid 3px #FFF;
		/*border-top: solid 1px #303030;*/
		height: 45px;
		margin: auto;
		/*min-width: 994px;*/
		padding: 0px;
		position: relative;
		width: auto;
		z-index: 55000;
	}
	
		#grupo-submenu span.button
		{
			background: #333333;
			border: solid 1px #AAA;
			cursor: pointer;
			margin-top: 7px;
		}

		#grupo-submenu #submenu
		{
			height: 45px;
			margin: auto;
			padding: 0px 22px;
			width: 1060px;
		}

			#submenu span.button:hover
			{
				background: -webkit-linear-gradient(#ACACAC, #F0F0F0);
				background: -o-linear-gradient(#ACACAC, #F0F0F0);
				background: -moz-linear-gradient(#ACACAC, #F0F0F0);
				background: linear-gradient(#ACACAC, #F0F0F0);
				cursor: pointer;
			}

			#grupo-submenu #submenu ul
			{
				list-style:none;
				margin: 0px;
				padding: 0px;
			}

			#grupo-submenu #submenu ul ul
			{
				position: absolute;
			}
			
			#grupo-submenu #submenu a
			{
				color: #535353;
				float: left;
				text-decoration: none;
				width: auto;
			}
			
			#grupo-submenu #submenu span
			{
				color: #333;
				float: left;
				text-decoration: none;
				width: auto;
			}
			
			#grupo-submenu #submenu ul li
			{
				color: #333;
				display: inline-block;
				font-size: 13px;
				text-transform: uppercase;
				height: 45px;
				line-height: 45px;
				position: relative;
				width: auto;
			}

			#grupo-submenu #submenu ul li:hover
			{
				background: rgba(255, 255, 255, 0.10);
			}
			
				#grupo-submenu #submenu ul li a
				{
					padding: 0px 16px;
					position: relative;
					z-index: 1000;
				}
			
				#grupo-submenu #submenu ul li:hover>a
				{
					color: <?php echo $colorbotones; ?>;;
				}
			
				#grupo-submenu #submenu ul li span
				{
					
				}
			
				#grupo-submenu #submenu>ul>li>span, #grupo-submenu #submenu>ul>li>a
				{
					padding: 0px 8px;
				}
			
				#grupo-submenu #submenu>ul>li>span:hover, #grupo-submenu #submenu>ul>li>a:hover
				{
					padding: 0px 8px;
				}

				#grupo-submenu #submenu ul li ul li
				{
					background: <?php echo $colorposbar; ?>;
					clear: both;
					display: block !important;
					float: left;
					height: 0px;
					line-height: 45px;
					margin-top: 0px;
					text-transform: Capitalize;
					visibility: hidden;
                                        opacity: 1;
				}

				#grupo-submenu #submenu ul li ul li:hover
				{
					background: <?php echo $colorenlace; ?>;
					clear: both;
					float: left;
					height: auto;
					line-height: 45px;
					margin-top: 0px;
					visibility: visible;
				}

				#grupo-submenu #submenu>ul>li>ul
				{
					margin-top: 45px;
				}
				
				#grupo-submenu #submenu ul li:hover ul li.sm1
				{
					height: 45px;
					visibility: visible;
				}
				
					#grupo-submenu #submenu ul li ul li a
					{
                        color: #333 !important;
						float: left;
						width: 218px;
					}
				
					#grupo-submenu #submenu ul li ul li:hover a
					{
						color: #FFF;
						float: left;
						width: 218px;
					}
					
					#grupo-submenu #submenu ul li ul li span
					{
						float: left;
						font-size: 16px;
						padding: 0px;
					}
					
					#grupo-submenu #submenu ul li:hover ul li.sm2
					{
						background: <?php echo $colorposbar; ?>;
					}
					
					#grupo-submenu #submenu ul li ul li.sm2:hover
					{
						background: <?php echo $colorenlace; ?>;
					}
					
					#grupo-submenu #submenu ul li ul li.sm2 ul li a
					{
						line-height: 16px;
						float: left;
						font-size: 12px;
						width: 218px;
					}
					
					#grupo-submenu #submenu ul li ul li span
					{
						color: #4C4C4C;
					}
					
					#grupo-submenu #submenu ul li ul li span:hover, #grupo-submenu #submenu ul li ul li.sm2 ul li:hover
					{
						background: #007EC2;
					}
				
					#grupo-submenu #submenu ul li.sm1:hover ul li.sm2
					{
						height: 45px;
						visibility: visible;
					}
			
						#grupo-submenu #submenu ul li ul li ul li
						{
							background: #007EC2;
							margin-left: 250px;
							padding: 0px 16px;
							width: 218px;
						}
			
						#grupo-submenu #submenu ul li.sm2 ul li a
						{
							padding: 0px;
							width: 0px;
						}
			
						#grupo-submenu #submenu ul li.sm2 ul li
						{
							margin-left: 234px;
							padding: 26px 16px 50px 16px;
							width: 218px;
						}
				
						#grupo-submenu #submenu ul li.sm1 ul li.sm2:hover ul li
						{
							height: auto;
							line-height: 20px;
							visibility: visible;
							z-index: 1001;
						}
    
	#posicion-bar
	{
		background: <?php echo $colorposbar; ?>;
		font-size: 0.7rem;
		height: 1.6rem;
		margin: auto;
		/*min-width: 994px;*/
		padding: 0px;
		position: relative;
		width: auto;
		z-index: 0;
	}

		#posicion-bar div
		{
			color: #DDD;
			height: 1.6rem;
			line-height: 1.6rem;
			margin: auto;
			padding: 0px;
			position: relative;
			width: 930px;
		}

			#posicion-bar div a
			{
				color: #FFF;
				text-decoration: none;
			}

		#grupo-contenido #contenido #novedades, #grupo-contenido #contenido #masvendidos, #grupo-contenido #contenido #bajo
		{
			background: #FFF;
			border: none;
			/*border-top: solid 1px #444;*/
			height: auto;
			max-width: 1060px;
			padding: 30px 0px;
		}

		#grupo-contenido
		{
			background: #FFF;
			/*background: -moz-linear-gradient(top, rgba(0,126,194,1) 0%, rgba(35,31,32,1) 100%);
			background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(0,126,194,1)), color-stop(100%, rgba(35,31,32,1)));
			background: -webkit-linear-gradient(top, rgba(0,126,194,1) 0%, rgba(35,31,32,1) 100%);
			background: -o-linear-gradient(top, rgba(0,126,194,1) 0%, rgba(35,31,32,1) 100%);
			background: -ms-linear-gradient(top, rgba(0,126,194,1) 0%, rgba(35,31,32,1) 100%);
			background: linear-gradient(to bottom, rgba(0,126,194,1) 0%, rgba(35,31,32,1) 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#007ec2', endColorstr='#231f20', GradientType=0 );*/
		}

		#grupo-contenido #contenido .informacion
		{
			border: none;
			height: auto;
			margin: auto;
			padding: 0px;
			text-align: center;
			width: auto;
		}

			#grupo-contenido #contenido .informacion .linea-sep-ver
			{
				border-top: solid 1px #444;
				height: 0px;
				margin: 27px auto 27px auto;
			}

			#grupo-contenido #contenido .informacion .linea-sep-hor
			{
				border-left: solid 1px #547396;
				display: inline-block;
				height: 158px;
				margin: 0px 10px 20px 10px;
				width: 0px;
			}

			#grupo-contenido #contenido .informacion .informa
			{
				border: solid 1px #547396;
				height: auto;
				margin: auto;
				padding: 0px;
				text-align: center;
				vertical-align: top;
				width: auto;
			}

			#grupo-contenido #contenido .informacion .hor
			{
				display: inline-block;
				height: 156px;
				margin-bottom: 20px;
				width: 295px;
			}

				#grupo-contenido #contenido .informacion .informa h5
				{
					color: #FFF;
					font-size: 0.8rem;
					font-weight: normal;
					margin: 0px;
					padding: 3px 10px;
					text-transform: uppercase;
				}

				#grupo-contenido #contenido .informacion .informa h4
				{
					color: #517599;
					font-size: 1.0rem;
					margin: 0px;
					padding: 10px 15px;
					text-align: left;
				}

				#grupo-contenido #contenido .informacion .informa h3
				{
					color: #FFF;
					font-size: 1.0rem;
					font-weight: normal;
					margin: 0px;
					padding: 3px 10px;
					text-transform: uppercase;
				}

				#grupo-contenido #contenido .informacion .informa h2
				{
					color: #FFF;
					font-size: 1.6rem;
					font-weight: normal;
					margin: 0px;
					padding: 3px 10px;
					text-transform: uppercase;
				}

				#grupo-contenido #contenido .informacion .informa img
				{
					margin: 5px;
					width: 70px;
				}

			#grupo-contenido #contenido .informacion .verde
			{
				background-color: #202020;
			}

			#grupo-contenido #contenido .informacion .informa:nth-child(1)
			{
				background: transparent;
			}

			#grupo-contenido #contenido .informacion .informa:nth-child(3)
			{
				background: transparent url(../source/camion.jpg) center no-repeat;
				background-size: cover;
			}

			#grupo-contenido #contenido .informacion .informa:nth-child(5)
			{
				background: transparent url(../source/atencion_cliente.jpg) center no-repeat;
				background-size: cover;
			}

		#grupo-contenido #contenido #articulo
		{
			background: #FFF;
			border: none;
			height: auto;
			padding: 0px 30px 30px 30px;
			text-align: justify;
			width: 1000px;
		}
            
			#grupo-contenido #contenido #articulo a
			{
				color: <?php echo $colorenlace; ?>;
				font-weight: normal;
				text-decoration: none;
			}

			#grupo-contenido #contenido #articulo a:hover
			{
				text-decoration: underline;
			}

			#grupo-contenido #contenido #articulo #texto
			{
				display: inline-block;
				margin-right: 16px;
				vertical-align: top;
				width: 520px !important;
			}

			#grupo-contenido #contenido #articulo img
			{
				float: right;
				height: auto !important;
				vertical-align: top;
				width: 230px;
			}

		#grupo-contenido #contenido #masvendidos
		{
			margin-top: -1px;
		}

			#grupo-contenido #contenido #novedades img.filtro, #grupo-contenido #contenido #masvendidos img.filtro
			{
				height: 260px;
				margin: 0px;
				padding: 0px;
				width: 340px;
			}

			#grupo-contenido #contenido #opiniones h3, #grupo-contenido #contenido #productos h3, #grupo-contenido #contenido #novedades span.tfiltro, #grupo-contenido #contenido #masvendidos span.tfiltro
			{
				color: <?php echo $colordescprodini; ?>;
				display: block;
				font-size: 20px;
				height: auto;
				line-height: 20px;
				margin: 0px;
				padding: 0px 0px 30px 0px;
				text-transform: uppercase;
				width: auto;
			}

            #grupo-contenido #contenido #opiniones h3, #grupo-contenido #contenido #productos h3, #grupo-contenido #contenido #novedades span.tfiltro2, #grupo-contenido #contenido #masvendidos span.tfiltro2
			{
				color: black;
				display: block;
				font-size: 20px;
				height: auto;
				line-height: 20px;
				margin: 0px;
				padding: 0px 0px 30px 0px;
				text-transform: uppercase;
				width: auto;
			}

                .decor{
                    border-left: 6px solid #3e9d80;
                    padding: 4px 10px;
                }

                .decor2{
                    border-left: 6px solid #a8a436;
                    padding: 4px 10px;
                }

			#grupo-contenido #contenido #productos div.muestra, #grupo-contenido #contenido #novedades div.muestra, #grupo-contenido #contenido #masvendidos div.muestra
			{
				height: auto;
				margin: 0px;
				padding: 0px;
				width: auto;
			}
                
				#grupo-contenido #contenido #productos .producto, #grupo-contenido #contenido #novedades div.muestra div.producto, #grupo-contenido #contenido #masvendidos div.muestra div.producto
				{
					background: #FFF;
					border: solid 1px <?php echo $colorbordeprods; ?>;
					display: inline-block;
					height: auto;
					margin: 0px;
					padding: 2% 2% 1.5% 2%;
					vertical-align: top;
					width: 19%;
				}

				#grupo-contenido #contenido #productos .producto, #grupo-contenido #contenido #novedades div.muestra div.producto, #grupo-contenido #contenido #masvendidos div.muestra div.producto
				{
					margin: 0px -5px 0px 0px;
				}

				#grupo-contenido #contenido #productos .producto:first-child, #grupo-contenido #contenido #novedades div.muestra div.producto:first-child, #grupo-contenido #contenido #masvendidos div.muestra div.producto:first-child
				{
					margin-left: 0%;
				}

				#grupo-contenido #contenido #productos .producto:not(:first-child), #grupo-contenido #contenido #novedades div.muestra div.producto:not(:first-child), #grupo-contenido #contenido #masvendidos div.muestra div.producto:not(:first-child)
				{
					margin-left: 2.5%;
				}

					#grupo-contenido #contenido #productos .producto img, #grupo-contenido #contenido #novedades div.muestra div.producto img, #grupo-contenido #contenido #masvendidos div.muestra div.producto img
					{
						margin: 0px;
						height: 100%;
						padding: 0px;
						width: 100%;
					}
                    
					#grupo-contenido #contenido #productos .producto .descripcion, #grupo-contenido #contenido #novedades div.muestra div.producto .descripcion2, #grupo-contenido #contenido #masvendidos div.muestra div.producto .descripcion2
					{
						color: <?php echo $colordescprodini; ?>;
						display: block;
						font-size: 0.75rem;
						height: 1.6rem;
						line-height: 0.85rem;
						margin: 0px;
						padding: 5px 0px;
						/*width: 192px;*/
					}

                    #grupo-contenido #contenido #productos .producto .descripcion, #grupo-contenido #contenido #novedades div.muestra div.producto .descripcion, #grupo-contenido #contenido #masvendidos div.muestra div.producto .descripcion
					{
						color: <?php echo $colordescprodini; ?>;
						display: block;
						font-size: 0.75rem;
						height: 1.6rem;
						line-height: 1rem;
						margin: 0px;
						padding: 5px 0px;
						width: 192px;
					}

					#grupo-contenido #contenido #productos .producto .precio, #grupo-contenido #contenido #novedades div.muestra div.producto .precio, #grupo-contenido #contenido #masvendidos div.muestra div.producto .precio
					{
						color: <?php echo $colordescprodini; ?>;
						display: inline-block;
						font-size: 1.1rem;
						font-weight: bold;
						height: 1.1rem;
						line-height: 1.1rem;
						margin: 0px;
						max-width: 50%;
						padding: 10px 0px 0px 0px;
						width: auto;
					}

					#grupo-contenido #contenido #productos .producto a.vermas, #grupo-contenido #contenido #novedades div.muestra div.producto a.vermas, #grupo-contenido #contenido #masvendidos div.muestra div.producto a.vermas
					{
						border: solid 1px <?php echo $colordescprodini; ?>;
						border-radius: 6px;
						color: <?php echo $colordescprodini; ?>;
						float: right;
						font-size: 0.75rem;
						font-weight: bold;
						height: 0.75rem;
						line-height: 0.75rem;
						margin: 0px;
						margin-top: 8px;
						max-width: 40%;
						padding: 4px 15px;
						transition: border 1s, background 1s, color 1s;
						width: auto;
					}

					#grupo-contenido #contenido #productos .producto a.vermas:hover, #grupo-contenido #contenido #novedades div.muestra div.producto a.vermas:hover, #grupo-contenido #contenido #masvendidos div.muestra div.producto a.vermas:hover
					{
						background: <?php echo $colordescprodini; ?>;
						border: solid 1px <?php echo $colortextogen; ?>;
						color: #FFF;
					}

                    #grupo-contenido #contenido #productos .producto a.vermas2, #grupo-contenido #contenido #novedades div.muestra div.producto a.vermas2, #grupo-contenido #contenido #masvendidos div.muestra div.producto a.vermas2
					{
						border: solid 1px <?php echo $colordescprodini; ?>;
						border-radius: 6px;
						color: #FFF;
                        background: <?php echo $colordescprodini; ?>;
						float: right;
						font-size: 0.75rem;
						font-weight: bold;
						height: 0.75rem;
						line-height: 0.75rem;
						margin: 0px;
						margin-top: 8px;
						max-width: 40%;
						padding: 4px 15px;
						transition: border 1s, background 1s, color 1s;
						width: auto;
					}

					#grupo-contenido #contenido #productos .producto a.vermas2:hover, #grupo-contenido #contenido #novedades div.muestra div.producto a.vermas2:hover, #grupo-contenido #contenido #masvendidos div.muestra div.producto a.vermas2:hover
					{
						background: #FFF;
						border: solid 1px <?php echo $colortextogen; ?>;
						color: <?php echo $colordescprodini; ?>;
					}

					#grupo-contenido #contenido #productos .producto .precioa, #grupo-contenido #contenido #novedades div.muestra div.producto .precioa, #grupo-contenido #contenido #masvendidos div.muestra div.producto .precioa
					{
						color: #666;
						display: inline-block;
						font-size: 0.75rem;
						font-weight: bold;
						/*height: 0.75rem;*/
						line-height: 0.75rem;
						margin: 0px;
						max-width: 40%;
						padding: 10px 0px;
						width: auto;
					}

					#grupo-contenido #contenido #productos .producto .descuento, #grupo-contenido #contenido #novedades div.muestra div.producto .descuento, #grupo-contenido #contenido #masvendidos div.muestra div.producto .descuento
					{
						color: #000;
						display: inline-block;
						font-size: 1.1rem;
						font-weight: bold;
						/*height: 1.1rem;*/
						line-height: 1.1rem;
						margin: 0px;
						margin-right: 10px;
						max-width: 40%;
						padding: 10px 0px;
						width: auto;
					}

					div.muestra div.producto select, div.muestra div.producto input
					{
						height: 1.7rem;
						line-height: 1.7rem;
						margin-top: 0.75rem;
						max-width: 100%;
					}

					div.muestra div.producto select:first-child
					{
						margin-top: 0px;
					}

			div#publicaciones
			{
				display: inline-block;
				padding: 0px;
				width: 75%;
			}

            div#menu-cate
			{
				display: inline-block;
                float: right;
				margin-left: 2%;
				width: 22%;
                margin: 0px;
                /*border: 2px solid black;*/
			}

			/*div#destacadas
			{
				float: right;
				margin-right: 3%;
				padding: 0px;
				width: 34%;
			}*/

				div#publicaciones a, div#destacadas a
				{
					text-decoration: none;
				}

				div#destacadas h2
				{
					font-size: 18px;
				}

				div#publicaciones div.publicacion, div#destacadas div.publicacion
				{
					display: block;
					margin-bottom: 70px;
					width: auto;
				}

				div#destacadas div.publicacion
				{
					background: #F2FBFF;
				}

					div#publicaciones div.publicacion h2, div#destacadas div.publicacion h2
					{
						color: #222222;
						font-size: 20px;
						padding: 0px 0px 0px 0px;
					}

					div#publicaciones div.publicacion img, div#destacadas div.publicacion img
					{
						width: 100%;
					}

					div#publicaciones div.publicacion p
					{
						font-size: 14px;
						text-align: justify;
					}
                    
					div#publicaciones div.publicacion input[type="submit"], div#destacadas div.publicacion input[type="submit"]
					{
						background: <?php echo $colorbotones; ?>;
						border: none;
						border-radius: 3px;
						color: #FFF;
						cursor: pointer;
						font-size: 12px;
						margin: 0px;
						min-width: 156px;
						padding: 7px 7px;
						text-transform: uppercase;
					}

					div#destacadas div.publicacion p
					{
						font-size: 12px;
					}

	#pie
	{
		background: #E6E7E9;
		height: auto;
		margin: auto;
		/*min-width: 994px;*/
		width: auto;
	}

		#linea-roja
		{
			background: #E6E7E9; /* Standard syntax */
			/*box-shadow: 0px 0px 8px #333;*/
			height: auto;
			margin: auto;
			padding: 30px 0px;
			position: relative;
			text-align: center;
			width: auto;
			/*z-index: 1000;*/
		}

			#linea-roja a
			{
				margin: 0px 5px;
			}

		#linea-roja-shadow
		{
			background: #333;
			bottom: 0px;
			/*box-shadow: 0px -5px 5px #333;*/
			height: 1px;
			margin: auto;
			padding: 0px;
			position: absolute;
			width: 100%;
			/*z-index: 1000;*/
		}

		#pie #piein
		{
			background: transparent;
			margin: auto;
			padding: 30px 0px;
			position: relative;
			width: 994px;
			/*z-index: 1000;*/
		}

			#pie #piein #logopie
			{
				background: url(../source/<?php echo $logoInf; ?>) no-repeat center top;
                    background-size: contain;
				display: inline-block;
				height: 160px;
				margin: 0px;
				max-width: 90%;
				padding: 0px;
				vertical-align: top;
				width: 358px;
			}

			#pie #piein #lalala
			{
				display: inline-block;
				height: auto;
			}

			#pie #piein #menupie, #pie #piein .enlacespie
			{
				display: inline-block;
				font-size: 12px;
				height: auto;
				margin: 0px 12px;
				padding: 0px 12px;
				vertical-align: top;
				width: auto;
			}

				#pie #piein #menupie p, #pie #piein .enlacespie p
				{
					color: <?php echo $pie_letras; ?>;
					margin: 0px 0px 10px 0px;
				}

				#pie #piein #menupie p.colorado, #pie #piein .enlacespie p.colorado
				{
					color: <?php echo $colorbordeprods; ?>;
					font-size: 14px;
					font-weight: bold;
					text-transform: uppercase;
				}

					#pie #piein #menupie p a, #pie #piein .enlacespie p a
					{
						color: <?php echo $pie_letras; ?>;
						text-decoration: none;
					}

					#pie #piein #menupie p a:before, #pie #piein .enlacespie p a:before
					{
						content: "> ";
						text-decoration: none;
					}

					#pie #piein #menupie p a.arojo, #pie #piein .enlacespie p a.arojo
					{
						color: #202020;
					}

			#pie #piein #sociales
			{
				float: right;
			}

			#pie #piein #copyright
			{
				background: #E6E7E9;
				color: #444;
				margin: 60px 0px 0px 0px;
				padding: 0px;
				text-align: center;
				width: 100%;
			}

				#pie #piein #copyright p
				{
					margin: 0px;
				}

	#Messages
	{
		background: none;
		height: auto;
		margin: auto;
		/*min-width: 994px;*/
		padding: 0px;
		position: relative;
		width: 994px;
		z-index: 1;
	}

		#Messages #LbMessage, #Messages #LbMessageWarning, #Messages #LbMessageError
		{
			background: darkgreen;
			height: auto;
			margin: auto;
			/*min-width: 974px;*/
			padding: 10px;
			width: 974px;
			z-index: 1;
		}