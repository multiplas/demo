				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
					<?php if ($resultaop || $resultaop2) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php } ?>

					
                     <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">CSV Productos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <a href="../feed/feedgeneral.csv">Descargar CSV</a>	<br><br>
                                    URL accesible: <span style="color: blue"><?=$System->Empresa('dominio')?>/feed/feedgeneral.csv</span><br><br>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>