<?php require_once('blocks/cabecera.php');
require_once('system/estadisticas/execution-estadisticas.php');
?>
    <script type="text/javascript" src="vendors/amchartsJS/js/serial.js"></script>
    <script type="text/javascript" src="vendors/amchartsJS/js/themes/light.js"></script>


    <!-- amCharts javascript code -->
    <script type="text/javascript">
        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var f=new Date();
        //document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
        var fecha_graf = meses[f.getMonth()] + " de " + f.getFullYear();
        var dia_graf = f.getDate();





        //Grafica de cantidad de vistas diarias
        <?php if($vistas_days){?>
        AmCharts.makeChart("chartdiv_days",
            {
                "type": "serial",
                "categoryField": "category",
                "dataDateFormat": "YYYY-MM-DD",
                "startDuration": 1,
                "theme": "light",
                "categoryAxis": {
                    "gridPosition": "start",
                    "parseDates": false
                },
                "chartCursor": {
                    "enabled": true
                },
                "chartScrollbar": {
                    "enabled": false
                },
                "trendLines": [],
                "graphs": [
                    {
                        "fillAlphas": 1,
                        "id": "AmGraph-1",
                        "title": "graph 1",
                        "type": "column",
                        "valueField": "column-1"
                    }
                ],
                "guides": [],
                "valueAxes": [
                    {
                        "id": "ValueAxis-1",
                        "title": "Cantidad de vistas"
                    }
                ],
                "allLabels": [],
                "balloon": {},
                "titles": [
                    {
                        "id": "Title-1",
                        "size": 15,
                        "text": 'Cantidad de Visitas'
                    }
                ],
                "dataProvider": [
                    <?php $i=1;
                    $cantidad_today = 0;
                    $count_vistas_mes = 0;
                    foreach ($vistas_days as $visita_day){
                    $count_vistas_mes+=$visita_day['total'];
                    $subttacfecha = substr($visita_day['campo'],0,2);
                    date_default_timezone_set('UTC');
                    $hoy = getdate();
                    if ($subttacfecha == $hoy['mday'])
                        $cantidad_today = $visita_day['total'];
                    ?>
                    {
                        "category": "Día <?=$subttacfecha?>",
                        "column-1": <?=$visita_day['total']?>
                        <?php if($i<$cv_days){?>
                    },
                <?php }else{?>
            }
        <?php }
        $i++;
        } ?>
        ]
        }
        );
        <?php }?>

</script>



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




                <!--estadisticas-->
                    <div class="row-fluid">
                        <div class="span12">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Estadísticas</div>
                                    <div class="pull-right">

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <?php if($vistas_days){?>
                                        <fieldset>
                                            <legend>Últimos 30 días</legend>
                                            <div class="row">
                                                <div class="span11">
                                                    <div id="chartdiv_days" style="width: 100%; height: 600px; background-color: white;" ></div>
                                                </div>
                                                <div class="span1" style="text-align: center">
                                                    <br><b>Hoy</b><br>
                                                    <?=$cantidad_today?>
                                                    <br>
                                                    <?php if($cantidad_today>1){echo 'Vistas';}else{echo 'Vista';} ?>
                                                    <hr>
                                                    <br><b>Mes Actual</b><br>
                                                    <?=$count_vistas_mes?>
                                                    <br>
                                                    <?php if($count_vistas_mes>1){echo 'Vistas';}else{echo 'Vista';} ?>
                                                    <hr>
                                                </div>
                                            </div>
                                        </fieldset>
                                    <?php } else { ?>
                                        <p style="text-align:center;">No hay visitas!</p>
                                    <?php } ?>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                    </div>
                    <!--end estadisticas-->
















                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Usuarios</div>
                                    <div class="pull-right">

                                    </div>
                                </div>
                                <div class="block-content collapse in">
									<?php if (count($usuarios) > 0) { ?>
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>Nombre</th>
													<th>Rol</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($usuarios AS $usuario)
													{
														?>
														<tr>
															<td><?=$usuario['id']?></td>
															<td><?=$usuario['nombre']?></td>
															<td><?=$usuario['rol_user']?></td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p style="text-align:center;">No hay usuarios registrados!</p>
									<?php } ?>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Páginas</div>
                                    <div class="pull-right">

                                    </div>
                                </div>
                                <div class="block-content collapse in">
                                    <?php if (count($paginas) > 0) { ?>
										<table class="table table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>Título</th>
													<th>Fecha</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($paginas AS $pagina)
													{
														?>
														<tr>
															<td><?=$pagina['id']?></td>
															<td><?=$pagina['titulo']?></td>
															<td><?=date_format(date_create($pagina['fecha']), 'd-m-Y H:i')?></td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p style="text-align:center;">No hay páginas!</p>
									<?php } ?>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left"><a href="carrito.php">Carrito</a></div>
                                    <div class="pull-right">

                                    </div>
                                </div>
                                <div class="block-content collapse in">
									<?php if (count($carritos) > 0) { ?>
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Usuario</th>
													<th>Producto</th>
													<th>Fecha</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($carritos AS $carrito)
													{
                                                        $date = date('d/m/Y', strtotime($carrito['fechaC']));
														?>
														<tr>
															<td><?=$carrito['nombreU']?></td>
															<td><?=$carrito['nombreP']?></td>
															<td><?=$date?></td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p style="text-align:center;">No hay productos en el carrito!</p>
									<?php } ?>
                                </div>
                            </div>
                            <!-- /block -->
                        </div>
                        <div class="span6">
                            <!-- block -->
                            <div class="block">
                                <div class="navbar navbar-inner block-header">
                                    <div class="muted pull-left">Pedidos pendientes</div>
                                    <div class="pull-right">

                                    </div>
                                </div>
                                <div class="block-content collapse in">
									<?php if (count($facturas) > 0) { ?>
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Usuario</th>
													<th>Estado</th>
													<th>Fecha</th>
												</tr>
											</thead>
											<tbody>
												<?php
													foreach ($facturas AS $factura)
													{
                                                        $date = date('d/m/Y', strtotime($carrito['fechaC']));
														?>
														<tr>
															<td><?=$factura['nombre']?></td>
															<td><?=$factura['estado']?></td>
															<td><?=date_format(date_create($factura['fecha']), 'd/m/Y')?></td>
														</tr>
														<?php
													}
												?>
											</tbody>
										</table>
									<?php } else { ?>
										<p style="text-align:center;">No hay facturas recientes</p>
									<?php } ?>
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