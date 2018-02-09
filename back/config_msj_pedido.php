<?php
require_once('blocks/cabecera.php');
require_once('system/pedidos/execution-pedidos.php');

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
            <h4>Configuración de emails</h4>
            <p>Configura el contenido de los emails que se enviarán al cliente al momento en que se realice un cambio de estatus de algún pedido</p>
        </div>

        <?php if ($resultaop) { ?>
            <div class="row-fluid">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Correcto</h4>
                    La operación se ha realizado correctamente.
                </div>
            </div>
        <?php }
        ?>



        <?php if (@$elemento != null) { ?>
            <div class="row-fluid">
                <div id="edi" class="block">
                    <div class="navbar navbar-inner block-header">
                        <div class="muted pull-left">Editar un Email</div>
                    </div>
                    <div class="block-content collapse in">
                        <div class="span12">
                            <form action="config_msj_pedido.php" method="POST" class="form-horizontal">
                                <fieldset>
                                    <legend>Editar email para estado de pedido "<?=$elemento['tipo_mensaje']?>"</legend>

                                    <div class="control-group">
                                        <label class="control-label" for="poblacion">Mensaje </label>
                                        <div class="controls">
                                            <textarea class="span6 text-area-msj" id="mensaje" name="mensaje" placeholder="Mensaje" required><?=$elemento['mensaje']?></textarea>
                                            <span style="color: red; font-size: 0.70rem;">Requerido</span>
                                        </div>
                                    </div>
                                    *Nota: Puedes utilizar cualquiera de las siguientes etiquetas para agregar campos dinámicos
                                    <table>
                                        <tr>
                                            <td>Nombre del Cliente: </td>
                                            <td><b class="resaltar-text">[[NombreU]]</b></td>
                                        </tr>
                                        <tr>
                                            <td>Nro. de pedido: </td>
                                            <td><b class="resaltar-text">[[NumPedido]]</b></td>
                                        </tr>
                                        <tr>
                                            <td>Estado del pedido: </td>
                                            <td><b class="resaltar-text">[[EstadoPedido]]</b></td>
                                        </tr>
                                    </table><br><br>
                                    <input type="hidden" class="span6" name="id" value="<?=$elemento['id']?>">
                                    <input type="submit" class="btn btn-primary" value="Modificar">
                                    <button type="button" onclick="location.href = 'config_msj_pedido.php';" class="btn">Cancelar</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!-- block -->

            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Listado de tipos de email</div>
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
                            <?php if (count($list_msj_config) > 0) { ?>
                                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered dataTable" id="example">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="text-align: center;">#</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Mensaje</th>
                                        <th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Tipo de email</th>
                                        <th valign="top" class="" ></th>
                                    </tr>
                                    </thead>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    <?php
                                    $i=1;
                                    foreach ($list_msj_config AS $listado)
                                    {

                                        if (@$lineapi != 'odd')
                                            $lineapi = 'odd';
                                        else
                                            $lineapi = 'even';
                                        ?>
                                        <tr class="<?=$lineapi?>">
                                            <td valign="top" class=""  style="text-align: center;"><?=$i++?></td>
                                            <td valign="top" class="" ><?=$listado['mensaje']?></td>
                                            <td valign="top" class="" ><?=$listado['tipo_mensaje']?></td>
                                            <td valign="top" class="" ><a href="?editarmsj=<?=$listado['id']?>"><i class="fa fa-pencil fa-lg"></i></a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            <?php } else { ?>
                                <p>No hay mensajes!</p>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>
<?php require_once('blocks/pie.php'); ?>