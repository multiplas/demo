				<?php require_once('blocks/cabecera.php'); ?>
                <div class="span9" id="content">
					
                    <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Intentos de Registros</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   
  									<div id="example_wrapper" class="dataTables_wrapper form-inline" role="grid">
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
													<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Email</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Fecha</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ip</th>
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
															<td valign="top" class="" style="text-align: center;"><?=$listado['id']?></td>
															<td valign="top" class=""><?=$listado['email']?></td>
                                                                                                                        <td valign="top" class=""><?=date("d-m-Y H:i:s", strtotime($listado['fecha']))?></td>
															<td valign="top" class=""><?=$listado['ip']?></td>
                                                            
															
														</tr>
														<?php
													}
												?>
                                            </tbody>
                                        </table>
									<?php } else { ?>
										<p>No hay intentos de registro!</p>
									<?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>