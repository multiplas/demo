<?php require_once('blocks/cabecera.php'); ?>
<script>
    jQuery( document ).ready(function(){
        jQuery('#generar_export, #compras, #clientes, #productos').on('click',function(){
            if(confirm('¿Estas seguro de realizar esta acción?'))
            {
                jQuery('#accion').val(this.id);
                jQuery('#form_eliminar').submit();
            }
            else
            {
                return false;
            }	
        });
    });
</script>
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
                <form id="form_eliminar" action="eliminar_dbinfo.php?eliminarinfo=true" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="span12">
                        <input type="hidden" id="accion" name="accion" value="generar_export">
                        <input type="button" id="generar_export" class="btn btn-primary" value="Exportar Base de Datos"> <br><br>
                        <legend>Eliminar las Compras</legend>
                        <p>Elimina las compras así como sus relaciones con los productos y los clientes.</p>
                        <input type="button" id="compras" class="btn btn-success" value="Eliminar Compras"> <br><br>
                        <legend>Eliminar los Usuarios</legend>
                        <p>Elimina los Usuarios que no sean Administradores</p>
                        <input type="button" id="clientes" class="btn btn-success" value="Eliminar Usuarios"> <br><br>
                        <legend>Eliminar los productos</legend>
                        <p>Elimina los productos asi como su relación con atributos, categorías... </p>
                        <input type="button" id="productos" class="btn btn-success" value="Eliminar Productos"> <br><br>
                    </div>
                </form>
            </div>
        </div>
        <!-- block -->
    </div>
</div>
<?php require_once('blocks/pie.php'); ?>