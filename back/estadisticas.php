<?php
require_once('blocks/cabecera.php');
require_once('system/estadisticas/execution-estadisticas.php');

?>

    <!-- amCharts javascript code -->
    <script type="text/javascript">



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
                    <?php foreach ($n_visitas as $nvisita){?>
                    {
                        "country": "<?php if($nvisita['country'] == '(Unknown Country?)') echo 'Sin información del país'; else echo $nvisita['country']?>",
                        "litres": <?=$nvisita['total']?>
                        <?php if($i<$cv){?>
                    },
                    <?php }else{?>
                    }
                    <?php }
                            } ?>
                ]
            }
        );

        //grafica de links ás visitados
        AmCharts.makeChart("chartdiv_links",
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
                    <?php foreach ($n_visitas as $nvisita){?>
                    {
                        "country": "<?=$nvisita['pagina_visitada']?>",
                        "litres": <?=$nvisita['total']?>
                        <?php if($i<$cv){?>
                    },
                <?php }else{?>
            }
        <?php }
        } ?>
        ]
        }
        );

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
                    <?php foreach ($n_visitas as $nvisita){?>
                    {
                        "country": "<?php if($nvisita['domain'] == '') echo 'URL Directa'; else echo $nvisita['domain']?>",
                        "litres": <?=$nvisita['total']?>
                        <?php if($i<$cv){?>
                    },
                <?php }else{?>
            }
        <?php }
        } ?>
        ]
        }
        );
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
            <p>Mantente al tando de las estadísticas de tus visitantes</p>
        </div>

        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Visitas</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <div class="row">
                        <div class="span3" title="Listado de visitas">
                            <a href="?">
                                <div class="alert alert-info button" style=" height: auto; background: white !important;">
                                    <img src="images/img_estadisticas/icono_listado.png" style="width:90%; height: 150px">
                                </div>
                            </a>
                        </div>
                        <div class="span3" title="Gráfica de visitas por pais">
                            <a href="?tipo_consulta=visitas por pais">
                                <div class="alert alert-info button" style=" height: auto;">
                                    <img src="images/img_estadisticas/icono_grafica_por_pais.jpg" style="width:100%; height: 150px">
                                </div>
                            </a>
                        </div>
                        <div class="span3" title="Gráfica de links mas visitados">
                            <a href="?tipo_consulta=visitas por links">
                                <div class="alert alert-info button" style=" height: auto;">
                                    <img src="images/img_estadisticas/icono_links_mas_visitados.jpg" style="width:100%; height: 150px">
                                </div>
                            </a>
                        </div>
                        <div class="span3" title="Gráfica de páginas de origen de visitantes">
                            <a href="?tipo_consulta=visitas por origen">
                                <div class="alert alert-info button" style=" height: auto;">
                                    <img src="images/img_estadisticas/icono_referidos.jpg" style="width:100%; height: 150px">
                                </div>
                            </a>
                        </div>
                    </div><br><br>
                    <!--Formulario de filtro por fechas-->
                    <form method="GET" action="?">
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
                        <?php if (count($visitas) > 0 || $n_visitas > 0) {
                            if($tipo_consulta==''){
                            ?>
                        <div class="table-responsive">
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
                            <div id="chartdiv" style="width: 100%; height: 600px; background-color: white;" ></div>
                        </fieldset>
                        <?php }
                        else if($tipo_consulta=='visitas por links'){
                            ?>
                        <fieldset>
                            <legend>Links más visitados</legend>
                            <div id="chartdiv_links" style="width: 100%; height: 600px; background-color: white;" ></div>
                        </fieldset>
                        <?php }

                        else if($tipo_consulta=='visitas por origen'){
                            ?>
                        <fieldset>
                            <legend>Orígen de visitas</legend>
                            <div id="chartdiv_origen" style="width: 100%; height: 600px; background-color: white;" ></div>
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