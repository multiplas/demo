				<?php require_once('blocks/cabecera.php'); ?>
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
                        <!-- block -->
                        <div class="block">
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
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                                            <thead>
                                                <tr role="row">
													<th class="sorting_asc" role="columnheader" tabindex="0" colspan="2" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Fecha</th>
                                                                                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tipo</th>
                                                                                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Asociado</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nombre</th>
                                                                                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">E-mail</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="3" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Comentario</th>
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
															<td valign="top" class=""  style="text-align: center;"><i style="color: #<?=@($listado['Activo'] == 1 ? '0000ff' : ($listado['Activo'] == 0 ? 'ff0000' : '' ))?>;" class="fa fa-circle fa-lg" title="<?=@($listado['estado'] == 1 ? 'Publicado' : ($listado['estado'] == 0 ? 'No Publicado' : ''))?>"></i></td>
                                                                                                                        <td valign="top" class=""  style="text-align: center;"><?=$listado['id']?></td>
                                                                                                                        <td valign="top" class="" ><?=$listado['fecha']?></td>
                                                                                                                        <td valign="top" class="" ><?=$listado['tipo']?></td>
                                                                                                                        <td valign="top" class="" ><?=$listado[0]?></td>
															<td valign="top" class="" ><?=$listado['nombre']?></td>
															<td valign="top" class="" ><?=$listado['email']?></td>
                                                                                                                        <td valign="top" class="" colspan="3" ><?=$listado['comentario']?></td>
															<td valign="top" class=""  style="text-align: center; width: 100px;">
                                                                <p><br></p><form action="#" method="get" style="margin: 0px; margin-top: -25px; position: relative; width: 100px;">
                                                                    <select id="estadocoment" name="estadocoment" class="chzn-select span4" required style="width: 100px;" onchange="javascript: $(this).parent().submit();">
                                                                        <option value="0"<?=$listado['Activo'] == 0 ? ' selected' : ''?>>No Publicado</option>
                                                                        <option value="1"<?=$listado['Activo'] == 1 ? ' selected' : ''?>>Publicado</option>
                                                                    </select>
                                                                    <input type="hidden" name="estadoCid" value="<?=$listado['id']?>">
                                                                </form>
                                                            </td>
														</tr>
														<?php
													}
												?>
                                            </tbody>
                                        </table>
									<?php } else { ?>
										<p>No hay comentarios!</p>
									<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>