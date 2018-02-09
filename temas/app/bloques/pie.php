<style>
    .color-img{
        -webkit-filter: grayscale(0); /* Color */
        -webkit-filter: grayscale(0.5); /* 50% color */
        -webkit-filter: grayscale(1); /* Blanco y negro */
        -moz-filter: grayscale(0); /* Color */
        -moz-filter: grayscale(0.5); /* 50% color */
        -moz-filter: grayscale(1); /* Blanco y negro */
        filter: grayscale(0); /* Color */
        filter: grayscale(0.5); /* 50% color */
        filter: grayscale(1); /* Blanco y negro */
    }
    
    .color-img:hover{
        -webkit-filter: grayscale(1); /* Color */
        -webkit-filter: grayscale(1); /* 50% color */
        -webkit-filter: grayscale(0); /* Blanco y negro */
        -moz-filter: grayscale(1); /* Color */
        -moz-filter: grayscale(1); /* 50% color */
        -moz-filter: grayscale(0); /* Blanco y negro */
        filter: grayscale(1); /* Color */
        filter: grayscale(1); /* 50% color */
        filter: grayscale(0); /* Blanco y negro */
    }
</style>

<?php
    for($i=0; $i<=count($labelidioma); $i++){
        if($labelidioma[$i][0] == 'condiciones'){
            $auxcon = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'cuenta'){
            $auxcue = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'cesta'){
            $auxces = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'pedidos'){
            $auxped = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'envios_devoluciones'){
            $auxenv = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'politica_privacidad'){
            $auxpol = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'contacto'){
            $auxcont = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'llamanos'){
            $auxll = $nombreidioma[$i][0];
        }
        if($labelidioma[$i][0] == 'portes'){
            $auxpor = $nombreidioma[$i][0];
        }
    }
?>

<div id="pie">
    
    <style>
      .tooltip {
        display: inline;
        position: relative;
      }
      .tooltip:hover:after {
        bottom: 46px;
        content: attr(title); /* este es el texto que será mostrado */
        left: 1%;
        position: absolute;
        z-index: 9999998;
        /* el formato gráfico */
        background: #212121; /* el color de fondo */
        border-radius: 5px;
        color: #f2f2f2; /* el color del texto */
        font-family: '<?=$fuente2?>', Georgia;
        font-size: 12px;
        padding: 5px 15px;
        text-align: center;
        text-shadow: 1px 1px 1px #000;
        width: 150px;
      }
      .tooltip:hover:before {
        bottom: 40px;
        content: "";
        left: 30%;
        position: absolute;
        z-index: 9999999;
        /* el triángulo inferior */
        border: solid;
        border-color: #212121 transparent;
        border-width: 6px 6px 0 6px;
      }
    </style>
	

</div>
<link href="<?=$draizp?>/componentes/fotorama/fotorama.css" rel="stylesheet">
<script src="<?=$draizp?>/componentes/fotorama/fotorama.js"></script>