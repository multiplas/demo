<?php
    header("Content-type: text/css; charset: UTF-8");

    require_once($draiz.'../sistema/i_connectionstrings.php');

    $dbi = mysqli_connect($svr, $usr, $pwd, $dbn, $prt);

    $sql="SELECT * FROM bd_colores";
    $query = mysqli_query($dbi, $sql);
    $colores = mysqli_fetch_array($query);

    $colorboton = $colores['colorbotonform'];
    $colorbotonhover = $colores['colorbotonhoverform'];
    $colortextoboton = $colores['colortextobotonform'];

?>

/* DEFINICIÓN GENÉRICA DE LOS ELEMENTOS DE FORMULARIO */

textarea
{
	background: #FFF;
	border: solid 1px #AAA;
	border-radius: 2px;
    box-sizing: border-box;
	color: #666 !important;
	display: block;
    font-family: inherit;
	font-size: 16px;
    font-weight: lighter;
	height: auto;
	min-height: 160px;
	padding: 8px 8px;
	width: 100%;
}

textarea:focus
{
	border: solid 1px #999;
}

#articulo input, #articulo textarea, #articulo select, #articulo span.button, #articulo span.buttonGray, a.button
{
	border: solid 1px #AAA;
	border-radius: 2px;
    box-sizing: border-box;
    font-family: inherit;
	font-size: 16px;
    /*font-weight: lighter;*/
	height: auto;
	max-width: 270px;
	padding: 8px 8px;
	width: 100%;
}

#articulo input:not(type="submit")
{
	background: #FFF;
    display: inline-block;
	line-height: 16px;
	outline: none;
	vertical-align: middle;
}

#articulo input.required
{
	border: solid 1px #E66 !important;
}

#articulo input[type=text][disabled], #articulo input[disabled]
{
	background: #F0F0F0;
	color: #666;
	text-transform: uppercase;
}

#articulo input[type=checkbox], #articulo input[type=radio]
{
	width: auto;
}

#articulo input[type=submit]
{
	color: #666;
}

#articulo input[type=submit]:hover
{
	color: #666;
}

#articulo input[type=text], #articulo input[type=password], #articulo input[type=email], #articulo input[type=tel]
{
	background: #FFF;
	color: #666;
	line-height: 24px;
	margin: 0px 2px 6px 0px;
}

#articulo input[type=text]:focus, #articulo input[type=password]:focus, #articulo input[type=email]:focus, #articulo input[type=tel]:focus
{
	border: solid 1px #AAA;
	color: inherit;
}

#articulo label
{
	display: block;
	margin-bottom: 10px;
	margin-top: 10px;
	max-width: 100%;
	width: auto;
}

#articulo select
{
	background: #FFF;
	color: #666;
	height: 42px;
	line-height: 38px;
	margin: 0px 2px 6px 0px;
	outline: none;
	vertical-align: middle;
}

#articulo select[disabled]
{
	background: #F0F0F0;
	color: #666;
}

#articulo textarea
{
	background: #FFF;
	color: #666;
	height: auto;
	line-height: 16px;
    margin: auto;
	max-height: 170px;
	max-width: 320px;
	min-height: 170px;
	min-width: 320px;
	outline: none;
	padding: 8px;
	text-align: left;
	vertical-align: middle;
}

#articulo textarea[disabled]
{
	color: #666;
	background: #F0F0F0;
}

#articulo textarea:focus
{
	border: solid 1px #AAA;
	color: inherit;
}

#articulo .noValido, .noValido
{
    border: solid 1px #D44 !important;
}

input[type="submit"].button, #articulo input[type="submit"].button, #articulo span.button, #articulo span.buttonGray, a.button, a.buttonGray
{
	background: <?php echo $colorboton; ?> ;
	border: none;
	display: inline-block;
	color: <?php echo $colortextoboton; ?>;
	cursor: pointer;
    font-weight: normal;
	line-height: 18px;
	height: auto;
	margin: 20px auto;
	min-width: 120px;
	outline: none;
	padding: 10px 15px;
	text-align: center;
	transition: background, 0.5s;
	vertical-align: middle;
	width: auto;
}

input[type="submit"].button2, #articulo input[type="submit"].button2, #articulo span.button3, #articulo span.buttonGray2, a.button2, a.buttonGray2
{
	background: <?php echo $colorboton; ?> ;
	border: none;
	display: inline-block;
	color: <?php echo $colortextoboton; ?>;
	cursor: no-drop;
        font-weight: normal;
	line-height: 18px;
	height: auto;
	margin: 20px auto;
	min-width: 120px;
	outline: none;
	padding: 10px 15px;
	text-align: center;
	transition: background, 0.5s;
	vertical-align: middle;
	width: auto;
}


input[type="submit"].button:hover, #articulo input[type="submit"].button:hover, #articulo span.button:hover, #articulo span.buttonGray:hover, a.button:hover, a.buttonGray:hover
{
	background: <?php echo $colorbotonhover; ?>;
	cursor: pointer;
}

a.buttonGray
{
	background: #999 !important;
	width: auto !important;
}

a.buttonGray:hover
{
	background: #BBB !important;
}

#articulo .buttonGray
{
	background: #CCC;
}

#articulo span.buttonGray:hover
{
	background: #DDD;
}

#articulo span.button2, #articulo span.button2G
{
	background: <?php echo $colorbotonhover; ?>;
	border: none;
	display: inline-block;
	color: <?php echo $colortextoboton; ?>;
	cursor: pointer;
    font-weight: normal;
	line-height: 18px;
	height: auto;
	margin: 20px -2px;
	min-width: 120px;
	outline: none;
	padding: 10px 15px;
	text-align: center;
	vertical-align: middle;
	transition: background 1s;
	width: auto;
}

#articulo .button2G
{
	background: #555 !important;
}

#articulo .button2:hover
{
	background: #5AB2E2 !important;
}

#articulo div.fcenter
{
	text-align: center;
}

.dobleF
{
	max-width: 545px !important;
	/*min-width: 545px !important;*/
	width: 100% !important;
}

.mitadF
{
	max-width: 132px !important;
	min-width: 132px !important;
	margin: 0px 2px 0px 0px !important;
	width: 132px !important;
}

.mitadF2
{
	max-width: 132px !important;
	min-width: 132px !important;
	width: 132px !important;
}

.miniF
{
	background: none !important;
	border: none !important;
	color: #BF1B19 !important;
	font-size: 16px !important;
	max-width: 50px !important;
	min-width: 50px !important;
	width: 50px !important;
}

.fleft
{
	text-align: left;
}

#tpedido, table:not(#tcesta):not(#tpedido):not(#comprabar)
{
	border: solid 5px #DDD;
	border-collapse: collapse;
	border-radius: 3px;
	width: 100%;
}

		table:not(#tcesta):not(#tpedido):not(#comprabar) tr td
		{
			background: #EEE;
			color: #444;
			padding: 10px 15px;
		}

		table:not(#tcesta):not(#tpedido):not(#comprabar) tr:nth-child(odd) td
		{
			background: #FFF;
		}

		table:not(#tcesta):not(#tpedido):not(#comprabar) tr:first-child td
		{
			background: #DDD;
			color: #BF1B19;
			font-variant: small-caps;
			font-weight: bold;
		}

		#tpedido tr#ultimafila
		{
			background: #666;
			color: #FFF;
		}

		#tpedido tr.inpar
		{
			
		}

		#tpedido tr.par
		{
			background: #231F20;
		}

		#tpedido tr th
		{
			background: #202020;
			color: #FFF;
			padding: 10px;
			text-align: center;
		}

		#tpedido tr td
		{
			padding: 10px;
			text-align: center;
		}

		#tpedido tr th
		{
			text-align: justify;
		}

		#tpedido tr td
		{
			text-align: justify;
		}

#comprabar
{
	border: none;
	border-collapse: collapse;
	border-radius: 3px;
	width: 100%;
}

		#comprabar tr#comprabarn td
		{
			background: none;
			color: inherit;
			font-size: 10px;
			text-align: center;
		}

		#comprabar tr#comprabarc td
		{
			background: #DDD;
			border: solid 2px #DDD;
			color: #FFF;
			height: 1px;
		}

		#comprabar tr#comprabarc td.actual
		{
			background: <?php echo $textocolorboton; ?>;
			border: solid 2px #DDD;
			border-left: solid 2px #DDD;
			border-right: solid 2px #DDD;
			color: #FFF;
		}

		#comprabar tr#comprabarc td.realizado
		{
			background: <?php echo $textocolorboton; ?>;
			border: solid 2px #BF1B19;
			color: #FFF;
		}
		
table#tcesta
{
	border-collapse: collapse;
	display: table;
	width: 100%;
}
		
	table#tcesta tr
	{
		margin: 0px;
		padding: 0px;
	}
		
		table#tcesta tr td, table#tcesta tr th
		{
			margin: 0px;
			min-width: 12%;
			padding: 3% 2%;
			text-align: left;
			vertical-align: middle;
			width: auto;
		}
		
			table#tcesta tr td img
			{
				max-height: 80px;
				max-width: 80px;
			}
			
			table#tcesta tr td a, table#tcesta tr td span.enlazado
			{
				color: #BF1B19;
				display: block;
			}
			
			table#tcesta tr td span:not(.enlazado)
			{
				display: block;
				font-size: 0.75rem;
				line-height: 0.9rem;
			}
			
			table#tcesta tr td *
			{
				vertical-align: top;
			}
		
		table#tcesta tr:nth-child(even) td
		{
			background: #F0F0F0;
		}
		
		table#tcesta tr td:nth-child(2)
		{
			padding-right: 0px;
		}
			
		table#tcesta tr td:nth-child(3)
		{
			width: 30% !important;
			padding-left: 1%;
		}
			
		table#tcesta tr td:nth-child(4) input, table#tcesta tr td:nth-child(4)
		{
			text-align: center !important;
			vertical-align: middle;
		}
			
		table#tcesta tr td:nth-child(5), table#tcesta tr th:nth-child(5), table#tcesta tr td:nth-child(6), table#tcesta tr th:nth-child(6), table#tcesta tr td:nth-child(7), table#tcesta tr th:nth-child(7)
		{
			text-align: right !important;
			vertical-align: middle;
		}
		
		table#tcesta tr td:nth-child(6), table#tcesta tr th:nth-child(5)
		{
			display: none !important;
		}
			
		table#tcesta tr td:not(:first-child)
		{
			font-size: 1.2rem;
		}
			
		table#tcesta tr td:first-child
		{
			min-width: 7%;
			vertical-align: middle;
		}
		
			table#tcesta tr td:first-child a
			{
				background: #FFF;
				border: solid 2px #DF3B39;
				border-radius: 16px;
				color: #DF3B39 !important;
				font-size: 0.9rem;
				font-weight: bold !important;
				padding: 4px 8px;
				text-align: center !important;
				text-decoration: none !important;
				vertical-align: middle;
			}

			table#tcesta tr td:first-child a:hover
			{
				background: <?php echo $colorboton; ?>;
				color: #FFF !important;
			}
		
		table#tcesta tr th, table#tcesta tr:last-child td
		{
			background: <?php echo $colorboton; ?>;
            color: #FFF;
			padding: 2% 2%;
			vertical-align: middle;
		}
		
		table#tcesta tr:last-child td:last-child
		{
			text-align: right !important;
		}