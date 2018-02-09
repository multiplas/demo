<div id="contenido" style="min-height: 350px;">
		<?php
			if ($_GET['imprimir_fact'] != '')
			{
				if($Empresa['factura'] == 1){ ?>
                                    <iframe style="border: none; height: 100%; width: 100%; min-height: 850px;" src="<?=$draizp?>/componentes/pdf/examples/example_006.php" />
                                <?php }else{ ?>
                                    <iframe style="border: none; height: 100%; width: 100%; min-height: 850px;" src="<?=$draizp?>/componentes/pdf/examples/example_006A.php" />
                                <?php } 
				//unset($_SESSION['factura']);
			}
		?>
</div>