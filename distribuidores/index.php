                <?php require_once('blocks/cabecera.php'); ?>
				<div class="span9" id="content">
                    <!--<div class="row-fluid">
                        <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Success</h4>
                        	The operation completed successfully
						</div>
					</div>-->
                    <!--<div class="row-fluid">
                        <!-- block 
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Statistics</div>
                                <div class="pull-right"><span class="badge badge-warning">View More</span>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span3">
                                    <div class="chart" data-percent="73">73%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Visitors</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="53">53%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Page Views</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="83">83%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Users</span>

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="chart" data-percent="13">13%</div>
                                    <div class="chart-bottom-heading"><span class="label label-info">Orders</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block 
                    </div>-->
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Bienvenido!</div>
                                    <div class="pull-right">

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre</th>
                                                <th>Apellidos</th>
                                                <th>R. Social</th>
                                                <th>Rol</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><?=$_SESSION['usr']['id']?></td>
                                                <td><?=$_SESSION['usr']['nombre']?></td>
                                                <td><?=$_SESSION['usr']['apellidos']?></td>
                                                <td><?=$_SESSION['usr']['razonsocial']?></td>
                                                <td>Distribuidor</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- block 
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Imágenes de la web</div>
                                <div class="pull-right"><span class="badge badge-info">4</span>

                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="row-fluid padd-bottom">
                                  <div class="span3">
                                      <a href="../imagenes/<?=$System->Empresa('logotop')?>" target="_blank" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="../imagenes/<?=$System->Empresa('logotop')?>">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="../imagenes/<?=$System->Empresa('logobottom')?>" target="_blank" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="../imagenes/<?=$System->Empresa('logobottom')?>">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="../source/<?=$System->Empresa('bgtop')?>" target="_blank" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="../source/<?=$System->Empresa('bgtop')?>">
                                      </a>
                                  </div>
                                  <div class="span3">
                                      <a href="../source/<?=$System->Empresa('bgbottom')?>" target="_blank" class="thumbnail">
                                        <img data-src="holder.js/260x180" alt="260x180" style="width: 260px; height: 180px;" src="../source/<?=$System->Empresa('bgbottom')?>">
                                      </a>
                                  </div>
                                </div>
                                <!--<div class="row-fluid padd-bottom">
                                </div>
                            </div>
                        </div>-->
                        <!-- /block -->
                    </div>
                </div>
				<?php require_once('blocks/pie.php'); ?>