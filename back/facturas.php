<?php
require_once('system/pedidos/execution-log.php');
require_once('blocks/cabecera.php');
require_once('system/pedidos/execution-pedidos.php');
?>
    <div class="span9" id="content">
					<?php if ($resultaop) { ?>
						<div class="row-fluid">
							<div class="alert alert-success">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
								<h4>Correcto</h4>
								La operación se ha realizado correctamente.
							</div>
						</div>
					<?php } ?>
                        <!-- Editar Datos de Facturacion -->
                        <?php if(isset($datosFacturacion)): ?> 
                        <div class="block datos-facturacion">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Datos de Facturacion</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="facturas.php?accion=editfact" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <fieldset>
                                            <input type="hidden" name="id" id="id" value="<?=$datosFacturacion['idcompra']?>">
                                            <label>Nombre</label> <input type="text" name="nombre" id="nombre" required placeholder="Nombre"  style="width:35%;" value="<?=$datosFacturacion['nombre']?>"/>
                                            <label>NIF</label> <input type="text" name="nif" id="nif" required placeholder="NIF"  style="width:35%;" value="<?=$datosFacturacion['dni']?>"/>
                                            <label>Dirección</label> <input type="text" name="direccion" id="direccion" required placeholder="direccion"  style="width:35%;" value="<?=$datosFacturacion['direccion']?>"/>
                                            <label>Localidad</label> <input type="text" name="localidad" id="localidad" required placeholder="localidad"  style="width:35%;" value="<?=$datosFacturacion['localidad']?>"/>
                                            <label>Provincia</label> <input type="text" name="provincia" id="provincia" required placeholder="provincia"  style="width:35%;" value="<?=$datosFacturacion['provincia']?>"/>
                                            <label>País</label> <input type="text" name="pais" id="pais" required placeholder="pais"  style="width:35%;" value="<?=$datosFacturacion['pais']?>"/>
                                            <label>Código postal</label> <input type="text" name="cp" id="cp" required placeholder="cp"  style="width:35%;" value="<?=$datosFacturacion['cp']?>"/>
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                            <button type="button" onclick="location.href = 'facturas.php';" class="btn">Cancelar</button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Editar Datos de Envio -->
                        <?php elseif(isset($datosEnvio)): ?> 
                        <div class="block datos-envio">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Editar Datos de Envío</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form action="facturas.php?accion=editfactenv" method="post" class="form-horizontal" enctype="multipart/form-data">
                                        <fieldset>
                                            <input type="hidden" name="id" id="id=" value="<?=$datosEnvio['idcompra']?>">
                                            <label>Nombre </label> <input type="text" name="nombre" id="nombre" required placeholder="Nombre"  style="width:35%;" value="<?=$datosEnvio['nombre']?>"/>
                                            <label>Dirección</label> <input type="text" name="direccion" id="direccion" required placeholder="direccion"  style="width:35%;" value="<?=$datosEnvio['direccion']?>"/>
                                            <label>Localidad</label> <input type="text" name="localidad" id="localidad" required placeholder="localidad"  style="width:35%;" value="<?=$datosEnvio['localidad']?>"/>
                                            <label>Provincia</label> <input type="text" name="provincia" id="provincia" required placeholder="provincia"  style="width:35%;" value="<?=$datosEnvio['provincia']?>"/>
                                            <label>Pais</label> <input type="text" name="pais" id="pais" required placeholder="pais"  style="width:35%;" value="<?=$datosEnvio['pais']?>"/>
                                            <label>Código postal</label> <input type="text" name="cp" id="cp" required placeholder="cp"  style="width:35%;" value="<?=$datosEnvio['cp']?>"/>
                                            <label>Teléfono</label> <input type="text" name="telefono" id="telefono" required placeholder="telefono"  style="width:35%;" value="<?=$datosEnvio['telefono']?>"/>
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                            <button type="button" onclick="location.href = 'facturas.php';" class="btn">Cancelar</button>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php else: ?> 
                        <!-- block -->
                        <div class="block listado-pedidos">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Pedidos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="example_wrapper" style="margin-bottom:150px;" class="dataTables_wrapper form-inline" role="grid">
                                        <div class="row" style="display: none;">
                                            <div class="span6">
                                                <div id="example_length" class="dataTables_length">
                                                    <label>
                                                    <select size="1" name="example_length" aria-controls="example">
                                                    <option value="10" selected="selected">10</option>
                                                    <option value="25">25</option>
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    </select>
                                                    records per page</label>
                                                </div>
                                            </div>
                                            <div class="span6">
                                                <div class="dataTables_filter" id="example_filter">
                                                    <label>Search: <input type="text" aria-controls="example"></label>
                                                </div>
                                            </div>
                                        </div>
									<?php if (count($listados) > 0) { ?>
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable">
                                            <thead>
                                                <tr role="row">
													<th class="sorting_asc" role="columnheader" tabindex="0" colspan="2" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Cliente</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Datos Facturación</th>
                                                                                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dirección Envío</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Total</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Fecha</th>
                                                                                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Transp.</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Forma</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                                    <?php
                                                    foreach ($listados AS $listado)
                                                    {

                                                        if (@$lineapi != 'odd')
                                                            $lineapi = 'odd';
                                                        else
                                                            $lineapi = 'even';
														?>
														<tr class="<?=$lineapi?>">
															<td valign="top" class=""  style="text-align: center;"><i style="color: #<?=@($listado['estado'] == 1 ? 'EF6A21' : ($listado['estado'] == 2 ? 'A159CF' : ($listado['estado'] == 3 ? '7759CF' : ($listado['estado'] == 4 ? '09F' : ($listado['estado'] == 5 ? '93BF63' : ($listado['estado'] == 6 ? '999' : ($listado['estado'] == 7 ? 'C00' : 'E9B93F')))))))?>;" class="fa fa-circle fa-lg" title="<?=@($listado['estado'] == 1 ? 'Pendiente' : ($listado['estado'] == 2 ? 'Procesando' : ($listado['estado'] == 3 ? 'Procesado' : ($listado['estado'] == 4 ? 'Enviado' : ($listado['estado'] == 5 ? 'Entregado' : ($listado['estado'] == 6 ? 'Pendiente de Stock' : ($listado['estado'] == 7 ? 'Cancelado' : 'Error')))))))?>"></i></td>
															<td valign="top" class=""  style="text-align: center;"><?=$listado['numero']?></td>
															<td valign="top" class="" ><?=$listado['nombre']?><?=$listado['afiliado'] != "" ? '<br><b>(Afiliado: '.$listado['afiliado'].')</b>' : ''?><?=$listado['RazonSocial'] != "" ? '<br><b>(Razon Social: '.$listado['RazonSocial'].')</b>' : ''?></td>
															<td valign="top" class="" ><?php if ($listado['direccion'] != '') { ?><?=$listado['nombreF']?><br><?=$listado['nifF']?><br><?=$listado['direccion']?><br><?=$listado['localidad']?>, <?=$listado['provincia']?><br><?=$listado['pais']?>, <?=$listado['cp']?><?php } else { ?>Recogida en tienda<?php } ?>
                                                                <a href="#" onclick="location.href = 'facturas.php?facturaID=<?=$listado['idDireccionFactura']?>';" /><i style="color: green;" class="fa fa-edit fa-lg"></i></a>
                                                            </td>
                                                            <td valign="top" class="" ><?php if ($listado['direccionE'] != '') { ?><?=$listado['nombreE']?><br><?=$listado['direccionE']?><br><?=$listado['localidadE']?>, <?=$listado['provinciaE']?><br><?=$listado['paisE']?>, <?=$listado['cpE']?><br><?=$listado['telefonoE']?><?php } else { ?>Recogida en tienda<?php } ?>
                                                                <a href="#" onclick="location.href = 'facturas.php?envioID=<?=$listado['idDireccionEnvio']?>';" /><i style="color: green;" class="fa fa-edit fa-lg"></i></a>
                                                            </td>
															<td valign="top" class=""  style="text-align: right;"><?=number_format($listado['total'], 2, ',', '.')?> € <?=@$listado['formapago'] == 'financiacionDirecta' ? '<br>+'.$listado[0]['cuota'].'€ x '.$listado[0]['meses'].' meses' : ''?></td>
															<td valign="top" class="" ><?=date_format(date_create($listado['fecha']), 'd/m/Y H:i:s')?></td>
                                                                                                                        <td valign="top" class="" ><?=$listado['transportista']?></td>
															<td valign="top" class="" ><?=ucwords($listado['formapago'])?> <?=@$listado['formapago'] == 'domiciliacion' || $listado['formapago'] == 'domiciliacionSubscripcion' || $listado['formapago'] == 'financiacionDirecta' ? '<br><b>'.$listado[0]['nentidad'].'<br>'.$listado[0]['iban'].' '.$listado[0]['entidad'].' '.$listado[0]['oficina'].' '.$listado[0]['dc'].' '.$listado[0]['ccc'].' '.$listado[0]['ccc2'].' </b>' : '' ?><?=@$listado['formapago'] == 'tarjeta' ? '<br><b>'.$listado[0]['nombre'].'<br>'.$listado[0]['numero'].'<br>'.$listado[0]['fecha'].'<br>'.$listado[0]['cvc'].'</b>' : ''?></td>
															<td valign="top" class=""  style="text-align: center; width: 100px;">
																<a href="detalle.php?id=<?=$listado['id']?><?php echo ($listado['formapago'] == 'Pago en tienda') ? '&tienda=yes' : '&tienda=no' ?>"><i class="fa fa-eye fa-lg"></i></a>
                                                                                                                                <a target="_blank" href="generarPDF.php?telf_adm=<?=$listado['telefono']?>&amp;fact_adm=<?=$listado['sesion']?>&amp;fact_adm_uid=<?=$listado['uid']?>"><i class="fa fa-print fa-lg"></i></a>
                                                                                                                                <?=$nacesSN == 1 ? '<a href="nacex.php?id='.$listado["id"].'"><img src="../logos/nacex.png" width="30px"></a>' : '' ?>
                                                                <p><br></p><form action="#" method="get" style="margin: 0px; margin-top: -25px; position: relative; width: 100px;">
                                                                    <select id="estadof" name="estadof" class="chzn-select span4" required style="width: 100px;" onchange="javascript: $(this).parent().submit();">
                                                                        <option value="1"<?=$listado['estado'] == 1 ? ' selected' : ''?>>Pendiente</option>
                                                                        <option value="2"<?=$listado['estado'] == 2 ? ' selected' : ''?>>Procesando</option>
                                                                        <option value="3"<?=$listado['estado'] == 3 ? ' selected' : ''?>>Procesado</option>
                                                                        <option value="4"<?=$listado['estado'] == 4 ? ' selected' : ''?>>Enviado</option>
                                                                        <option value="5"<?=$listado['estado'] == 5 ? ' selected' : ''?>>Entregado</option>
                                                                        <option value="6"<?=$listado['estado'] == 6 ? ' selected' : ''?>>Stock</option>
                                                                        <option value="7"<?=$listado['estado'] == 7 ? ' selected' : ''?>>Cancelado</option>
                                                                    </select>
                                                                    <input type="hidden" name="estadofact" value="<?=$listado['id']?>">
                                                                </form>
																<a href="?eliminarfact=<?=$listado['id']?>" onclick="return confirm('Desea todos los datos del pedido \'\'#<?=$listado['numero']?> con fecha de <?=date_format(date_create($listado['fecha']), 'd/m/Y H:i:s')?>\'\' de la web?');"><span style="color:red; font-size: 20px;"><i class="fa fa-trash" style="padding-top: 10px;"></i></span></a>
                                                            </td>
														</tr>
														<?php
													}
												?>
                                            </tbody>
                                        </table>
									<?php } else { ?>
										<p>No hay facturas!</p>
									<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>