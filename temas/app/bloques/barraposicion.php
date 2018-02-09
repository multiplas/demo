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
</style>
<div id="posicion-bar" style="max-width: 1028px !important">
	<div>
            <a href="<?=$draizp?>/<?=$_SESSION['lenguaje']?>/"><i class="fa fa-home fa-lg"></i></a> <?=$producto_bath == 1 ? $producto_ruta : " > ".$barpath?>
	</div>
</div>