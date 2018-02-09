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
                     <div class="row-fluid">
						<div id="add" class="block" style="height: 0px; visibility: hidden;">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Subir un Producto</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
									<form action="productos.php?accion=subirpr" method="post" class="form-horizontal" enctype="multipart/form-data">
									  <fieldset>
										<legend>Subir Nuevo Producto</legend>
										<div class="control-group">
										  <label class="control-label" for="nnombre">Nombre </label>
										  <div class="controls">
											<input type="text" class="span6" id="nnombre" name="nombre" placeholder="Nombre del producto" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncontenido">Contenido</label>
                                          <div class="controls">
                                            <textarea id="ncontenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"></textarea>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="nimagen">Imagen</label>
                                            <div class="controls">
                                                <input class="input-file uniform_on" id="nimagen" name="imagen" type="file" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                            </div>
                                        </div>
                                        <div class="control-group" style="max-width: 60%;">
                                          <label class="control-label" for="nunidades">Unidades </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="nunidades" name="unidades" placeholder="Unidades en stock" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
                                        <div class="control-group" style="max-width: 60%;">
                                          <label class="control-label" for="nstock">Stock Mínimo </label>
                                          <div class="controls">
                                            <input type="text" class="span6" id="nstock" name="stock" placeholder="Stock mínimo" required>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                          </div>
                                        </div>
										<div class="control-group" style="max-width: 60%;">
										  <label class="control-label" for="nprecio">Precio </label>
										  <div class="controls">
											<input type="text" class="span6" id="nprecio" name="precio" placeholder="Precio (Sin IVA)" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group" style="max-width: 60%;">
										  <label class="control-label" for="niva">IVA </label>
										  <div class="controls">
											<input type="text" class="span6" id="niva" name="iva" placeholder="I.V.A. %" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group" style="max-width: 60%;">
										  <label class="control-label" for="ndescuento">Descuento % </label>
										  <div class="controls">
											<input type="text" class="span6" id="ndescuento" name="descuento" placeholder="Descuento %" required>
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
                                            <p style="color: #09F; font-size: 0.70rem;">Dejar a 0 para no aplicar</p>
										  </div>
										</div>
										<div class="control-group" style="max-width: 60%;">
										  <label class="control-label" for="ndescuentoe">Descuento € </label>
										  <div class="controls">
											<input type="text" class="span6" id="ndescuentoe" name="descuentoe" placeholder="Descuento €" required>
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
                                            <p style="color: #09F; font-size: 0.70rem;">Solo se aplica si el descuento % está a 0. Dejar a 0 para no aplicar</p>
										  </div>
										</div>
										<div class="control-group" style="max-width: 60%;">
										  <label class="control-label" for="npeso">Peso </label>
										  <div class="controls">
											<input type="text" class="span6" id="npeso" name="peso" placeholder="Peso KG" required>
											<span style="color: red; font-size: 0.70rem;">Requerido</span>
										  </div>
										</div>
										<div class="control-group" style="max-width: 60%;">
										  <label class="control-label" for="nreferencia">Referencia </label>
										  <div class="controls">
											<input type="text" class="span6" id="nreferencia" name="referencia" placeholder="Referencia">
											<span style="color: green; font-size: 0.70rem;">Opcional</span>
										  </div>
										</div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncategoria1">Categoría 1</label>
                                          <div class="controls">
                                            <select id="ncategoria1" name="categoria1" class="chzn-select span4" required>
                                                <option value="">Selecciona</option>
                                                <?php
                                                    foreach ($listadosalt AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                            <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncategoria2">Categoría 2</label>
                                          <div class="controls">
                                            <select id="ncategoria2" name="categoria2" class="chzn-select span4">
                                                <option value="">Selecciona</option>
                                                <?php
                                                    foreach ($listadosalt AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                            <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncategoria3">Categoría 3</label>
                                          <div class="controls">
                                            <select id="ncategoria3" name="categoria3" class="chzn-select span4">
                                                <option value="">Selecciona</option>
                                                <?php
                                                    foreach ($listadosalt AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                            <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncategoria4">Categoría 4</label>
                                          <div class="controls">
                                            <select id="ncategoria4" name="categoria4" class="chzn-select span4">
                                                <option value="">Selecciona</option>
                                                <?php
                                                    foreach ($listadosalt AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                            <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ncategoria5">Categoría 5</label>
                                          <div class="controls">
                                            <select id="ncategoria5" name="categoria5" class="chzn-select span4">
                                                <option value="">Selecciona</option>
                                                <?php
                                                    foreach ($listadosalt AS $listado)
                                                    {
                                                        ?>
                                                            <option value="<?=$listado['id']?>"><?=$listado['categoria']?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                            <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                            <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="ndisponible">Visible/Disponible</label>
                                          <div class="controls">
                                            <label class="uniform">
                                              <input class="uniform_on" type="checkbox" name="disponible" id="ndisponible" checked value="dis">
                                              Marcar para definir como visible/disponible para comprar
                                            </label>
                                          </div>
                                        </div>
										<button type="submit" class="btn btn-primary" onclick="return (if ($('#passwordc').val() != $('#rpasswordc').val()) { false; } else { true; });">Subir</button>
										<button type="button" onclick="location.href = 'productos.php';" class="btn">Cancelar</button>
									  </fieldset>
									</form>
								</div>
							</div>
						</div>
                    </div>
						<?php if (@$elemento != null && $resultaop != 1) { ?>
                     <div class="row-fluid">
							<div id="edi" class="block">
								<div class="navbar navbar-inner block-header">
									<div class="muted pull-left">Editar un Producto</div>
								</div>
								<div class="block-content collapse in">
									<div class="span12">
										<form action="productos.php?editarpr=<?=$elemento['id']?>" method="post" class="form-horizontal" enctype="multipart/form-data">
										  <fieldset>
											<legend>Editar <?=$elemento['nombre']?></legend>
                                            <div class="control-group">
                                              <label class="control-label" for="nombre">Nombre </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="nombre" name="nombre" value="<?=$elemento['nombre']?>" placeholder="Nombre del producto" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="contenido">Contenido</label>
                                              <div class="controls">
                                                <textarea id="contenido" name="contenido" class="input-xlarge textarea" style="width: 810px; height: 200px"><?=$elemento['descripcion']?></textarea>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="imagen">Imagen</label>
                                                <div class="controls">
                                                    <input class="input-file uniform_on" id="imagen" name="imagen" type="file">
                                                    <?php
                                                    if ($elemento['imagenprincipal'] != null)
                                                    {
                                                       ?>
                                                        <a style="color: #09F; font-size: 0.70rem;" href="../imagenesproductos/<?=$elemento['imagenprincipal']?>" target="_blank">ver imagen actual</a>
                                                       <?php
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="control-group" style="max-width: 60%;">
                                              <label class="control-label" for="unidades">Unidades </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="unidades" name="unidades" value="<?=$elemento['unidades']?>" placeholder="Unidades en stock" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group" style="max-width: 60%;">
                                              <label class="control-label" for="stock">Stock Mínimo </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="stock" name="stock" value="<?=$elemento['stockminimo']?>" placeholder="Stock mínimo" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group" style="max-width: 60%;">
                                              <label class="control-label" for="precio">Precio </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="precio" name="precio" value="<?=$elemento['precio']?>" placeholder="Precio (Sin IVA)" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group" style="max-width: 60%;">
                                              <label class="control-label" for="iva">IVA </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="iva" name="iva" value="<?=$elemento['iva']?>" placeholder="I.V.A. %" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group" style="max-width: 60%;">
                                              <label class="control-label" for="descuento">Descuento % </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="descuento" name="descuento" value="<?=$elemento['descuento']?>" placeholder="Descuento %" required>
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                <p style="color: #09F; font-size: 0.70rem;">Dejar a 0 para no aplicar</p>
                                              </div>
                                            </div>
                                            <div class="control-group" style="max-width: 60%;">
                                              <label class="control-label" for="descuentoe">Descuento € </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="descuentoe" name="descuentoe" value="<?=$elemento['descuentoe']?>" placeholder="Descuento €" required>
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                                <p style="color: #09F; font-size: 0.70rem;">Solo se aplica si el descuento % está a 0. Dejar a 0 para no aplicar</p>
                                              </div>
                                            </div>
                                            <div class="control-group" style="max-width: 60%;">
                                              <label class="control-label" for="peso">Peso </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="peso" name="peso" value="<?=$elemento['peso']?>" placeholder="Peso KG" required>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                              </div>
                                            </div>
                                            <div class="control-group" style="max-width: 60%;">
                                              <label class="control-label" for="referencia">Referencia </label>
                                              <div class="controls">
                                                <input type="text" class="span6" id="referencia" name="referencia" value="<?=$elemento['referencia']?>" placeholder="Referencia">
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="categoria1">Categoría 1</label>
                                              <div class="controls">
                                                <select id="categoria1" name="categoria1" class="chzn-select span4" required>
                                                    <option value="">Selecciona</option>
                                                    <?php
                                                        foreach ($listadosalt AS $listado)
                                                        {
                                                            ?>
                                                                <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcat'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span style="color: red; font-size: 0.70rem;">Requerido</span><br>
                                                <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="categoria2">Categoría 2</label>
                                              <div class="controls">
                                                <select id="categoria2" name="categoria2" class="chzn-select span4">
                                                    <option value="">Selecciona</option>
                                                    <?php
                                                        foreach ($listadosalt AS $listado)
                                                        {
                                                            ?>
                                                                <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcat2'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                                <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="categoria3">Categoría 3</label>
                                              <div class="controls">
                                                <select id="categoria3" name="categoria3" class="chzn-select span4">
                                                    <option value="">Selecciona</option>
                                                    <?php
                                                        foreach ($listadosalt AS $listado)
                                                        {
                                                            ?>
                                                                <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcat3'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                                <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="categoria4">Categoría 4</label>
                                              <div class="controls">
                                                <select id="categoria4" name="categoria4" class="chzn-select span4">
                                                    <option value="">Selecciona</option>
                                                    <?php
                                                        foreach ($listadosalt AS $listado)
                                                        {
                                                            ?>
                                                                <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcat4'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                                <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="categoria5">Categoría 5</label>
                                              <div class="controls">
                                                <select id="categoria5" name="categoria5" class="chzn-select span4">
                                                    <option value="">Selecciona</option>
                                                    <?php
                                                        foreach ($listadosalt AS $listado)
                                                        {
                                                            ?>
                                                                <option value="<?=$listado['id']?>"<?=$listado['id'] == $elemento['idcat5'] ? ' selected' : ''?>><?=$listado['categoria']?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <span style="color: green; font-size: 0.70rem;">Opcional</span><br>
                                                <span style="color: #09F; font-size: 0.70rem;">Si se elige una categoría hija de otra, el producto aparece en ambas</span>
                                              </div>
                                            </div>
                                            <div class="control-group">
                                              <label class="control-label" for="disponible">Visible/Disponible</label>
                                              <div class="controls">
                                                <label class="uniform">
                                                  <input class="uniform_on" type="checkbox" name="disponible" id="disponible"<?=$elemento['disponible'] == 1 ? ' checked' : ''?> value="dis">
                                                  Marcar para definir como visible/disponible para comprar
                                                </label>
                                              </div>
                                            </div>
											<input type="hidden" class="span6" name="idm" value="<?=$elemento['id']?>">
											<button type="submit" class="btn btn-primary">Modificar</button>
											<button type="button" onclick="location.href = 'productos.php';" class="btn">Cancelar</button>
										  </fieldset>
										</form>
									</div>
								</div>
							</div>
                        </div>
						<?php } ?>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Listado de Productos</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      <div class="btn-group">
                                         <a href="#subirco" onclick="javascript: $('#add').css('height', 'auto'); $('#add').css('visibility', 'visible');"><button class="btn btn-success">Subir Producto <i class="icon-plus icon-white"></i></button></a>
                                      </div>
                                      <!--<div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div>-->
                                   </div>
									<?php if (count($listados) > 0) { ?>
                                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                                            <thead>
                                                <tr role="row">
													<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Producto</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Precio</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">IVA</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Des.</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">PVP</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Estado</th>
													<th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Destacado</th>
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
															<td valign="top" class=""  style="text-align: center;"><?=$listado['id']?></td>
															<td valign="top" class="" ><?=$listado['nombre']?></td>
															<td valign="top" class=""  style="text-align: right;"><?=number_format($listado['precio'], 2, ',', '.')?> €</td>
															<td valign="top" class=""  style="color: #D00; text-align: right;"><?=$listado['iva']?> %</td>
															<td valign="top" class=""  style="color: green; text-align: right;"><?=$listado['descuento'] > 0 ? $listado['descuento'].' %' : ($listado['descuentoe'] > 0 ? number_format($listado['descuentoe'], 2, ',', '.').' €' : 'N/A')?></td>
															<td valign="top" class=""  style="color: #06F; text-align: right;"><?=number_format(($listado['precio'] - ($listado['descuento'] > 0 ? ($listado['precio'] * ($listado['descuento'] / 100)) : ($listado['descuentoe'] > 0 ? $listado['descuentoe'] : 0))) * ($listado['iva'] / 100 + 1), 2, ',', '.')?> €</td>
                                                            <td valign="top" class="" ><?=$listado['disponible'] ? 'activo' :  'oculto'?></td>
                                                            <td valign="top" class="" ><?=$listado['destacado'] ? 'si' :  'no'?></td>
															<td valign="top" class=""  style="text-align: center;">
																<a href="?estadopr=<?=$listado['id']?>"><?=$listado['disponible'] ? '<i style="color: green;" class="fa fa-eye fa-lg"></i>' :  '<i style="color: #999;" class="fa fa-eye-slash fa-lg"></i>'?></a>
																<a href="imagenes_productos.php?imagenespr=<?=$listado['id']?>"><i style="color: orange;" class="fa fa-picture-o fa-lg"></i></a>
																<a href="?editarpr=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a>
                                                                <a href="?eliminarpr=<?=$listado['id']?>" onclick="return confirm('Desea eliminar el producto \'\'#<?=$listado['id']?> - <?=$listado['nombre']?>\'\' de la web?');"><i style="color: #C00;" class="fa fa-trash-o fa-lg"></i></a>
															</td>
														</tr>
														<?php
													}
												?>
                                            </tbody>
                                        </table>
									<?php } else { ?>
										<p>No hay productos!</p>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>