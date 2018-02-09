<?php 
require_once('blocks/cabecera.php'); 
require_once('system/herramientas/execution-confirmar-tabla2.php');

?>
                <div class="span9" id="content">
			
<div class="loader"></div>


 			<div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>Herramientas</h4>
                        <p>Mantente al tanto de las actualizaciones que esten disponibles para tu CMS.</p>
                    	</div>





					<?php if ($resultaop) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php } 
					if(isset($_POST['comprobarsql'])){

                        if (count($alert_actualizar) > 0 && $alert_actualizar) { ?>
                            <div class="row-fluid">
                                <div class="alert alert-error">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <h4>¡Aviso!</h4>
                                    <?php

                                    if (count($alert_actualizar) > 1)
                                        echo "<br>- Las siguientes tablas ya cuentan con actualizaciones disponibles.<br><br>";
                                    else
                                        echo "<br>- Las siguiente tabla ya cuenta con actualizaciones disponibles.<br><br>";
                                    foreach ($alert_actualizar as $alertTabla ) {
                                        $icli=0;
                                        ?>
                                        <table border="1" style="margin: auto; width: 98%">
                                            <tr>
                                                <td colspan="12" style="text-align: center; font-weight: bold;"><?=$alertTabla['mensaje']?></td>
                                            </tr>
                                            <tr style="text-align: center">
                                                <td colspan="6">CMS Cliente</td>
                                                <td colspan="6">CMS base</td>
                                            </tr>
                                            <tr style="text-align: center">
                                                <td>Nombre</td>
                                                <td>Tipo</td>
                                                <td>Null</td>
                                                <td>Llave</td>
                                                <td>Valor por defecto</td>
                                                <td>Información extra</td>
                                                <td>Nombre</td>
                                                <td>Tipo</td>
                                                <td>Null</td>
                                                <td>Llave</td>
                                                <td>Valor por defecto</td>
                                                <td>Información extra</td>
                                            </tr>
                                            <?php
                                            foreach ($alertTabla['actualizada']['tabla_cms_cli'] as $atatcc) {

                                                    if ($atatcc['Type'] != $alertTabla['actualizada']['tabla_cms_base'][$icli]['Type'])
                                                        $mostrar_cambios['type'] = $atatcc['Type'];
                                                    else
                                                        $mostrar_cambios['type'] = '---';
                                                    if ($atatcc['Null'] != $alertTabla['actualizada']['tabla_cms_base'][$icli]['Null'])
                                                        $mostrar_cambios['null'] = $atatcc['Null'];
                                                    else
                                                        $mostrar_cambios['null'] = '---';
                                                    if ($atatcc['Key'] != $alertTabla['actualizada']['tabla_cms_base'][$icli]['Key'])
                                                        $mostrar_cambios['key'] = $atatcc['Key'];
                                                    else
                                                        $mostrar_cambios['key'] = '---';
                                                    if ($atatcc['Default'] != $alertTabla['actualizada']['tabla_cms_base'][$icli]['Default'])
                                                        $mostrar_cambios['default'] = $atatcc['Default'];
                                                    else
                                                        $mostrar_cambios['default'] = '---';
                                                    if ($atatcc['Extra'] != $alertTabla['actualizada']['tabla_cms_base'][$icli]['Extra'])
                                                        $mostrar_cambios['extra'] = $atatcc['Extra'];
                                                    else
                                                        $mostrar_cambios['extra'] = '---';
                                                    if ($atatcc['Type'] != $alertTabla['actualizada']['tabla_cms_base'][$icli]['Type'])
                                                        $mostrar_cambios_t2['type'] = $alertTabla['actualizada']['tabla_cms_base'][$icli]['Type'];
                                                    else
                                                        $mostrar_cambios_t2['type'] = '---';
                                                    if ($atatcc['Null'] != $alertTabla['actualizada']['tabla_cms_base'][$icli]['Null'])
                                                        $mostrar_cambios_t2['null'] = $alertTabla['actualizada']['tabla_cms_base'][$icli]['Null'];
                                                    else
                                                        $mostrar_cambios_t2['null'] = '---';
                                                    if ($atatcc['Key'] != $alertTabla['actualizada']['tabla_cms_base'][$icli]['Key'])
                                                        $mostrar_cambios_t2['key'] = $alertTabla['actualizada']['tabla_cms_base'][$icli]['Key'];
                                                    else
                                                        $mostrar_cambios_t2['key'] = '---';
                                                    if ($atatcc['Default'] != $alertTabla['actualizada']['tabla_cms_base'][$icli]['Default'])
                                                        $mostrar_cambios_t2['default'] = $alertTabla['actualizada']['tabla_cms_base'][$icli]['Default'];
                                                    else
                                                        $mostrar_cambios_t2['default'] = '---';
                                                    if ($atatcc['Extra'] != $alertTabla['actualizada']['tabla_cms_base'][$icli]['Extra'])
                                                        $mostrar_cambios_t2['extra'] = $alertTabla['actualizada']['tabla_cms_base'][$icli]['Extra'];
                                                    else
                                                        $mostrar_cambios_t2['extra'] = '---';
                                                    ?>
                                                    <tr style="text-align: center; <?=$atatcc['status_campo'] == 'agregado' ? ' color:#468847;' : ''?> <?=$alertTabla['actualizada']['tabla_cms_base'][$icli]['status_campo'] == 'eliminado' ? ' color:gray;' : ''?>">
                                                        <td><?= $atatcc['Field']?></td>
                                                        <td><?= $mostrar_cambios['type'] ?></td>
                                                        <td><?= $mostrar_cambios['null'] ?></td>
                                                        <td><?= $mostrar_cambios['key'] ?></td>
                                                        <td><?= $mostrar_cambios['default'] ?></td>
                                                        <td><?= $mostrar_cambios['extra'] ?></td>
                                                        <td><?= $alertTabla['actualizada']['tabla_cms_base'][$icli]['Field'] ?></td>
                                                        <td><?= $mostrar_cambios_t2['type'] ?></td>
                                                        <td><?= $mostrar_cambios_t2['null'] ?></td>
                                                        <td><?= $mostrar_cambios_t2['key'] ?></td>
                                                        <td><?= $mostrar_cambios_t2['default'] ?></td>
                                                        <td><?= $mostrar_cambios_t2['extra'] ?></td>
                                                    </tr>
                                                    <?php
                                                    $icli++;
                                                }
                                            ?>
                                                </table><br><br>
                                                <?php
                                    }
                                    ?>
                                    <br><br>Por favor consulte con su soporte para realizar las actualizaciones correspondientes!
                                </div>
                            </div>
                        <?php }

                        else{ ?>
                            <div class="row-fluid">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <h4>Todo bien!</h4>
                                    No hay actualizaciones disponibles!
                                </div>
                            </div>
                        <?php }














					}?>
					
                    
                   
                    <!--
                     <div class="row-fluid">
			<div id="add" class="block" style="display: none;">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Actualizaciones SQL</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    hola
				</div>
			    </div>
			</div>-->
                        <!-- block -->
                
                         
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Herramientas</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
					
                                        <form action="?" method="POST">
					<input type="hidden" name="comprobarsql">
					<button onClick="submit(this)" id="btn-eliminar" class="btn btn-success">Comprobar Tablas SQL <i class="icon-list-alt icon-white"></i></button>
					</form>
                                      
					</div>
                                   </div>	
					<p>Pulsa para buscar actualizaciones.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>