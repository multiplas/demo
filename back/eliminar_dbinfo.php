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
            <div id="edi" class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Eliminar Información de Base de Datos</div>
                </div>
                <div class="block-content collapse in">
                <legend>Eliminar de Base de Datos</legend>
                <p>Esta operación es sumamente delicada. Se recomienda que contacte con Camaltec para que le genere una COPIA DE SEGURIDAD de los datos antes de proceder a borrarlos.</p>
                <p>Si no puede contactar con el equipo técnico de Camaltec, puede realizar una COPIA DE SEGURIDAD de la base de datos a través del siguiente botón. (No se garantiza la recuperación de la información).</p>
                <form action="eliminar_dbinfo.php?eliminarinfo=true" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="span12">                               
                        <input type="hidden" name="accion" value="generar_export">        
                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-primary">Exportar Base de Datos</button><br><br>
                        </fieldset>
                    </div>
                    </form>
                    <legend>Eliminar las Compras</legend>
                    <p>Elimina las compras así como sus relaciones con los productos y los clientes.</p>
                <form action="eliminar_dbinfo.php?eliminarinfo=true" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="span12">                               
                        <input type="hidden" name="accion" value="compras">        
                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Eliminar Compras</button><br><br>
                        </fieldset>
                    </div>
                    </form>
                    <legend>Eliminar los Usuarios</legend>
                    <p>Elimina los Usuarios que no sean Administradores</p>
                    <form action="eliminar_dbinfo.php?eliminarinfo=true" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="span12">                               
                        <input type="hidden" name="accion" value="clientes">        
                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Eliminar Usuarios</button><br><br>
                        </fieldset>
                    </div>
                    </form>
                    <legend>Eliminar los productos</legend>
                    <p>Elimina los productos asi como su relación con atributos, categorías... </p>
                    <form action="eliminar_dbinfo.php?eliminarinfo=true" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="span12">                               
                        <input type="hidden" name="accion" value="productos">        
                        <button type="submit" style="margin: 0px 0px 0px 10%;" class="btn btn-success">Eliminar Productos</button><br><br>
                        </fieldset>
                    </div>
                </form>
            </div>
            </div>
            <!-- block -->
        </div>
    </div>
    <?php require_once('blocks/pie.php'); ?>