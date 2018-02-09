<?php
require_once('blocks/cabecera.php');
require_once('system/pedidos/execution-log.php');

?>
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
            <h4>Log de estados de pedidos</h4>
            <p>Mantente al tando de las modificaciones que se realicen en el estado de los pedidos</p>
        </div>

        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Logs</div>
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
                        <?php if (count($list_logs) > 0) { ?>
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">Id</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Realizado por:</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Fecha</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Hora</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Nro. Pedido</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Estado Actual</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Estado Anterior</th>
                                </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php
                                foreach ($list_logs AS $listado)
                                {

                                    if (@$lineapi != 'odd')
                                        $lineapi = 'odd';
                                    else
                                        $lineapi = 'even';
                                    ?>
                                    <tr class="<?=$lineapi?>">
                                        <td valign="top" class=""  style="text-align: center;"><?=$listado['id']?></td>
                                        <td valign="top" class="" ><?=$listado['usuario']?></td>
                                        <td valign="top" class="" ><?=$listado['fecha']?></td>
                                        <td valign="top" class="" ><?=$listado['hora']?></td>
                                        <td valign="top" class="" ><?=$listado['pedido']?></td>
                                        <td valign="top" class="" >
                                            <?php
                                            if($listado['estado_actual'] == '1') echo'Pendiente';
                                            else if($listado['estado_actual'] == '2') echo'Procesando';
                                            else if($listado['estado_actual'] == '3') echo'Procesando';
                                            else if($listado['estado_actual'] == '4') echo'Procesado';
                                            else if($listado['estado_actual'] == '5') echo'Enviado';
                                            else if($listado['estado_actual'] == '6') echo'Stock';
                                            else if($listado['estado_actual'] == '7') echo'Cancelado';
                                            ?>
                                        </td>
                                        <td valign="top" class="" >
                                            <?php
                                            if($listado['estado_previo'] == '1') echo'Pendiente';
                                            else if($listado['estado_previo'] == '2') echo'Procesando';
                                            else if($listado['estado_previo'] == '3') echo'Procesando';
                                            else if($listado['estado_previo'] == '4') echo'Procesado';
                                            else if($listado['estado_previo'] == '5') echo'Enviado';
                                            else if($listado['estado_previo'] == '6') echo'Stock';
                                            else if($listado['estado_previo'] == '7') echo'Cancelado';
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        <?php } else { ?>
                            <p>No hay Logs!</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
    </div>
<?php require_once('blocks/pie.php'); ?>