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
	<ul class="tabs">
		<li>
			<a href="#tab1">Generar Feed Google Merchant</a>
		</li>
		<li>
			<a href="#tab2">Categorías Google Merchant</a>
		</li>
		<li>
			<a href="#tab3">Envíos Google Merchant</a>
		</li>
		<li>
			<a href="#tab4">Disponibilidad Google Merchant</a>
		</li>
	</ul>
	<div class="clr"></div>
	<section class="block">
		<article id="tab1">
			<div class="row-fluid">
			        <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <h4>ARCHIVO FEED PARA GOOGLE MERCHANT</h4>
                        <p>Puede descargar el archivo o copiar el enlace para que se pueda importar en Google Merchant.<p>
                    </div>
				<div class="block">
					<div class="navbar navbar-inner block-header">
						<div class="muted pull-left">Google Merchant - Productos</div>
					</div>
					<div class="block-content collapse in">
						<div class="span12">
							<a href="../feed/feedgeneral.txt">Descargar TXT</a>
							<br><br>
									URL accesible: <span style="color: blue">
										<?=$System->Empresa('dominio')?>/feed/feedgeneral.txt</span>
							<br><br>
						</div>
					</div>
				</div>
								<!-- /block -->
			</div>
		</article>
						<script>
							var data_id='';
							var data_name='';
							$(document).ready(function () {
								$('#btn-elegir-cat').click(function () {
									//mandar seleccion a formulario llamador
									var idcategoria=$( "#ncategoria_merchant" ).val();
									var ncategoria=$( "#ncategoria_merchant option:selected" ).text();
									$(data_id).val( idcategoria );
									$(data_name).val( ncategoria );
									$("#btn-cerrar-cat").click()
								})
							});
						</script>
						<article id="tab2">
							<div class="row-fluid">
							    <div class="alert alert-info alert-dismissable">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<h4>CATEGORIAS GOOGLE MERCHANT</h4>
									<p>Esta sección permite relacionar las categorías de la tienda con las categorías de Google Merchant.</p>
									<p><strong>USO:</strong> Al pulsar en una casilla de categoría de Merchant, se abre el selector y se elige la categoría a asignar. Se guarda pulsando en Modificar.</p>
									<p><strong>CARGAR CATEGORIAS:</strong> Permite actualizar la lista de categorias si se ha añadido alguna nueva.</p>
								</div>
								<div class="block">

									<!-- Modal Categorías -->
									<style>
										.modal.fade.in {left: 50%!important;}
										.modal {
											height: 450px;
											width: 700px;
											position: absolute;
											top: 50%; 
											margin-top: -10px;
											margin-left: -300px!important;
										}
										.modal-body {
											height: 310px;
											padding-top: 15px;
											padding-right: 15px;
											padding-bottom: 15px;
											padding-left: 65px;
										}
									</style>
									<div class="modal fade" id="ModalCats" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<h4 class="modal-title" id="myModalLabel">CATEGORIAS GOOGLE MERCHANT</h4>
												</div>
												<div class="modal-body">
													<select id="ncategoria_merchant" name="ncategoria_merchant" class="chzn-select span11">
														<option value="0">Ninguna</option>
														<?php
															foreach ($listadocatsmerchant AS $listadocat) {
																echo '<option value="'.$listadocat['categoria'].'">'.$listadocat['nombre'].'</option>';
                                                            }
														?>
													</select>
												</div>
												<div class="modal-footer">
													<button id ="btn-cerrar-cat"type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
													<button id="btn-elegir-cat" type="button" class="btn btn-danger">Elegir</button>
												</div>
											</div>
										</div>
									</div>
									<!-- -->

										<div class="navbar navbar-inner block-header">
											<div class="muted pull-left">Listado de Categorías</div>
										</div>
										<div class="block-content collapse in">
											<div class="span12">
												<div class="table-toolbar">
													<div class="btn-group">
														<a href="merchant.php?cargarcats=t">
															<button class="btn btn-success">Cargar Categorías</button>
														</a>
													</div>
												</div>
												<?php if (count($listados_cat_mer) > 0) { ?>
												<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
													<thead>
														<tr role="row">
															<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
															<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Categoría</th>
															<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Categoría Google Merchant</th>
															<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">Opciones</th>
														</tr>
													</thead>
													<tbody role="alert" aria-live="polite" aria-relevant="all">
														<?php
													foreach ($listados_cat_mer AS $listado)
													{
                                                        if (@$lineapi != 'odd')
                                                            $lineapi = 'odd';
                                                        else
                                                            $lineapi = 'even';
														?>
														<tr class="<?=$lineapi?>">
															<form action="merchant.php?editarcatmerchant=<?=$listado['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
															<input type="hidden" name="id" value="<?=$listado['id']?>">
															<td valign="top" class="span3"  style="text-align: center;">
																<?=$listado['idcategoria']?>
															</td>
															<td valign="top" class="span4" >
																<?=$listado['categoria']?>
															</td>
															<td valign="top" class="span12" >
																<a class="open-Modal" href="#" data-toggle="modal" data-target="#ModalCats" />
																	<input style="cursor: pointer" type="text" class="span12" id="ncatmerchant<?=$listado['id']?>" name="ncatmerchant" value="<?=$listado['nombre']?>" readonly
																	onclick="data_name='#ncatmerchant<?=$listado['id']?>';data_id='#idcatmerchant<?=$listado['id']?>';">
																</a>
																<input type="hidden" id="idcatmerchant<?=$listado['id']?>" name="idcatmerchant" value="<?=$listado['idmerchant']?>">
															</td>
															<td valign="top" class=""  style="text-align: center;">
																<button type="submit" class="btn btn-primary">Modificar</button>
															</td>
															</form>
														</tr>
													<?php
													}
												?>
												</tbody>
											</table>
											<?php } else { ?>
											<p>No hay categorías!</p>
											<?php } ?>
										</div>
									</div>
							</div>
								<!-- /block -->
						</div>
					</article>

					<article id="tab3">
						<div class="row-fluid">
							    <div class="alert alert-info alert-dismissable">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<h4>TIPOS DE ENVÍOS GOOGLE MERCHANT</h4>
									<p>Esta sección permite relacionar los transportistas de la tienda con las trasportes de Google Merchant.</p>
									<p><strong>USO:</strong> Escribir en la casilla el nombre del transporte de Google Merchant que corresponda a cada uno de la tienda. Se guarda pulsando en Modificar.</p>
									<p><strong>IMPORTANTE:</strong> Los transportes deben estar creados ya en Google Merchant y tener el mismo nombre. Google Merchant usa un envío por producto. Se usará el primero de la tabla.</p>
									<p><strong>CARGAR TIPOS:</strong> Permite actualizar la lista de transportistas si se ha añadido alguno nuevo.</p>
								</div>
							<div class="block">

									<div class="navbar navbar-inner block-header">
										<div class="muted pull-left">Listado de Tipos de Envío</div>
									</div>
									<div class="block-content collapse in">
										<div class="span12">
											<div class="table-toolbar">
												<div class="btn-group">
													<a href="merchant.php?cargartipos=t">
														<button class="btn btn-success">Cargar Tipos</button>
													</a>
												</div>
											</div>
											<?php if (count($listados_env_mer) > 0) { ?>
											<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
												<thead>
													<tr role="row">
														<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
														<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Transporte</th>
														<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Envío Google Merchant</th>
														<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">Opciones</th>
													</tr>
												</thead>
												<tbody role="alert" aria-live="polite" aria-relevant="all">
													<?php
													foreach ($listados_env_mer AS $listado)
													{
                                                        if (@$lineapi != 'odd')
                                                            $lineapi = 'odd';
                                                        else
                                                            $lineapi = 'even';
														?>
													<tr class="<?=$lineapi?>">
															<form action="merchant.php?editarenvmerchant=<?=$listado['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
															<input type="hidden" name="id" value="<?=$listado['id']?>">
															<td valign="top" class=""  style="text-align: center;">
																<?=$listado['idtransporte']?>
															</td>
															<td valign="top" class="" >
																<?=$listado['nombre']?>
															</td>
															<td valign="top" class="" >
																<input type="text" class="span12" id="textomerchant" name="textomerchant" value="<?=$listado['merchant']?>" required>
															</td>
															<td valign="top" class=""  style="text-align: center;">
																<button type="submit" class="btn btn-primary">Modificar</button>
															</td>
															</form>
												</tr>
												<?php
													}
												?>
											</tbody>
										</table>
										<?php } else { ?>
										<p>No hay tipos de envíos!</p>
										<?php } ?>
									</div>
								</div>
							<!-- /block -->
						</div>
					</div>
				</article>

				<article id="tab4">
					<div class="row-fluid">
						<div class="block">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Google Merchant - Disponibilidad</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
							    <div class="alert alert-info alert-dismissable">
									<button type="button" class="close" data-dismiss="alert">&times;</button>
									<h4>DISPONIBILIDAD GOOGLE MERCHANT</h4>
									<p>Se usan 2 disponibilidades en Google Merchant. "in_stock" y "out_of_stock".</p>
									<p><strong>IMPORTANTE:</strong> Los tipos de disponibilidad deben estar creados ya en Google Merchant y tener el mismo nombre que el indicado arriba.</p>
								</div>
								</div>
							</div>
						</div>
						<!-- /block -->
					</div>
				</article>

			</section>
		</div>
		<?php require_once('blocks/pie.php'); ?>