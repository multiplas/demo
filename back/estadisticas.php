<?php
require_once('blocks/cabecera.php');
require_once('system/estadisticas/execution-estadisticas.php');
?>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js" integrity="sha384-SlE991lGASHoBfWbelyBPLsUlwY1GwNDJo3jSJO04KZ33K2bwfV9YBauFfnzvynJ" crossorigin="anonymous"></script>
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
                "text": fecha_graf
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

//Gráfico visitas por país
        <?php if($n_visitas){
            if($tipo_consulta=='visitas por pais'){?>
        AmCharts.makeChart("chartdiv",
            {
                "type": "pie",
                "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "titleField": "country",
                "valueField": "litres",
                "fontSize": 12,
                "theme": "light",
                "allLabels": [],
                "balloon": {},
                "titles": [],
                "dataProvider": [
                    <?php $i=1;
                    foreach ($n_visitas as $nvisita){?>
                    {
                        "country": "<?php if($nvisita['country'] == '(Unknown Country?)') echo 'Sin información del país'; else echo $nvisita['country']?>",
                        "litres": <?=$nvisita['total']?>
                        <?php if($i<$cv){?>
                    },
                    <?php }else{?>
                    }
                    <?php }
                    $i++;
                            } ?>
                ]
            }
        );
        <?php }
        else if($tipo_consulta=='visitas por links'){?>
        //grafica de links ás visitados
        AmCharts.makeChart("chartdiv_links",
            {
                "type": "pie",
                "url": "google.com",
                "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "titleField": "country",
                "valueField": "litres",
                "fontSize": 12,
                "theme": "light",
                "allLabels": [],
                "balloon": {},
                "titles": [],
                "dataProvider": [
                    <?php $i=1;
                    foreach ($n_visitas as $nvisita){?>
                    {
                        "country": "<?=substr($nvisita['pagina_visitada'],0,20)?>",
                        "litres": <?=$nvisita['total']?>
                        <?php if($i<$cv){?>
                    },
                <?php }else{?>
            }
        <?php }
        $i++;
        } ?>
        ]
        }
        );
        <?php }
        else if($tipo_consulta=='visitas por origen'){?>

        //gráfica de páginas de orígen de visitantes
        AmCharts.makeChart("chartdiv_origen",
            {
                "type": "pie",
                "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "titleField": "country",
                "valueField": "litres",
                "fontSize": 12,
                "theme": "light",
                "allLabels": [],
                "balloon": {},
                "titles": [],
                "dataProvider": [
                    <?php $i=1;
                    foreach ($n_visitas as $nvisita){?>
                    {
                        "country": "<?php if($nvisita['domain'] == '') echo 'URL Directa'; else echo $nvisita['domain']?>",
                        "litres": <?=$nvisita['total']?>
                        <?php if($i<$cv){?>
                    },
                <?php }else{?>
            }
        <?php }
        $i++;
        } ?>
        ]
        }
        );
        <?php }
        }?>
    </script>



    <style>
        .resaltar-text{
            color: red;
        }

        .text-area-msj{
            height: 200px;
        }
    </style>
    <div class="span9" id="content">

        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Estadísticas</h4>
            <p>Mantente al tanto de las estadísticas de tus visitantes</p>
        </div>

        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Visitas</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">

                        <div class="span3" title="Listado de visitas">
                            <a class="btn btn-large btn-danger" href="?">
                                <i class="far fa-address-card pull-left" style="font-size: 70px"></i>&nbsp; <span style="line-height: 30px !important;">Listado de Visitas</span>
                            </a>
                        </div>
                        <div class="span3" title="Gráfica de visitas por pais">
                            <a class="btn btn-large btn-success" href="?tipo_consulta=visitas por pais">
                                <i class="fas fa-globe pull-left" style="font-size: 70px"></i>&nbsp; <span style="line-height: 30px !important;">visitas por pais</span>
                            </a>
                        </div>
                        <div class="span3" title="Gráfica de links">
                            <a class="btn btn-large btn-info" href="?tipo_consulta=visitas por links">
                                <i class="fas fa-link pull-left" style="font-size: 70px"></i>&nbsp; <span style="line-height: 30px !important;">Links visitados</span>
                            </a>
                        </div>
                        <div class="span3" title="Gráfica de páginas de origen de visitantes">
                            <a class="btn btn-large btn-warning" href="?tipo_consulta=visitas por origen">
                                <i class="fas fa-map-marker-alt pull-left" style="font-size: 70px"></i>&nbsp; <span style="line-height: 30px !important;">Orígen de Visitas</span>
                            </a>
                        </div>

                    <!--Formulario de filtro por fechas-->
                    <form method="GET" action="?"><br><br><br><br><br><br><br><br><br>
                    <input class="form-control" id="startdate" name="desde" type="text" placeholder="d-M-y" title="format : d-M-y" value="<?=$desde?>"/>
                    <span class="input-group-addon">hasta</span>
                    <input class="form-control" id="enddate" name="hasta" type="text" placeholder="d-M-y" title="format : d-M-y" value="<?=$hasta?>"/>
                       <input type="hidden" name="tipo_consulta" value="<?=$tipo_consulta?>">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </form>
                    <!--Fin de formulario de filtro por fechas-->
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
                                        registros por página</label>
                                </div>
                            </div>
                            <div class="span6">
                                <div class="dataTables_filter" id="example_filter">
                                    <label>Buscar: <input type="text" aria-controls="example"></label>
                                </div>
                            </div>
                        </div>
                        <?php if (count($visitas) > 0 || $n_visitas) {
                            if($tipo_consulta==''){
                            ?>
                        <div class="table-responsive">
                            <?php if($vistas_days){?>
                                <fieldset>
                                    <legend>Vistas por dia</legend>
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
                            <?php }?>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable table-condensed" id="example">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Dominio</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">IP</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.O</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Navegador</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Pais</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Ciudad</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Fecha</th>
                                </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php
                                $nvisita=1;
                                foreach ($visitas AS $visita)
                                {

                                    if (@$lineapi != 'odd')
                                        $lineapi = 'odd';
                                    else
                                        $lineapi = 'even';
                                    ?>
                                    <tr class="<?=$lineapi?>">
                                        <td valign="top" class=""  style="text-align: center;"><?=$nvisita?></td>
                                        <td valign="top" class="" ><?=$visita['domain']?></td>
                                        <td valign="top" class="" ><?=$visita['ip']?></td>
                                        <td valign="top" class="" ><?=$visita['user_os']?></td>
                                        <td valign="top" class="" ><?=$visita['user_browser']?></td>
                                        <td valign="top" class="" ><?=$visita['country']?></td>
                                        <td valign="top" class="" ><?=$visita['city']?></td>
                                        <td valign="top" class="" ><?=$visita['fecha']?></td>
                                    </tr>
                                    <?php
                                    $nvisita++;
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>



                        <?php }
                        else if($tipo_consulta=='visitas por pais'){
                        ?>
                        <fieldset>
                            <legend>Visitas por pais</legend>
                            <div id="chartdiv" style="width: 100%; height: 1024px; background-color: white;" ></div>
                        </fieldset>
                        <?php }
                        else if($tipo_consulta=='visitas por links'){
                            ?>
                        <fieldset>
                            <legend>Links más visitados</legend>
                            <div id="chartdiv_links" style="width: 100%; height: 1024px; background-color: white;" ></div>
                        </fieldset>
                        <?php }

                        else if($tipo_consulta=='visitas por origen'){
                            ?>
                        <fieldset>
                            <legend>Orígen de visitas</legend>
                            <div id="chartdiv_origen" style="width: 100%; height: 850px; background-color: white;" ></div>
                        </fieldset>
                        <?php }?>

                        <?php } else { ?>
                            <p>No hay visitas!</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
    </div>
<?php require_once('blocks/pie.php'); ?>

......
<script type="text/javascript" src="vendors/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
<script type="text/javascript" src="vendors/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


<script>
    $(document).ready(function() {
        $('#startdate').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            next: '#enddate' // The date in '#startdate' must be before or equal to the date in '#enddate'
        });


        $('#enddate').datepicker({
            autoclose: true,
            todayHighlight: true,
            format: 'dd-mm-yyyy',
            previous: '#startdate' // The date in '#enddate' must be after or equal to the date in '#startdate'
        });

    });

</script>