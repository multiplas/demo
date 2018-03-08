<?php require_once('blocks/cabecera.php'); ?>
<style>
    .tabla-suscriptores{
        border: 1px solid #ddd;
        width: 100%;
        margin-top: 20px;
        background: #fff;
    }
    .tabla-suscriptores th, .tabla-suscriptores td{
        width: 33.3%;
        text-align: left;
        padding: 5px;
    }
    .tabla-suscriptores td{
        border-top: 1px solid #ddd;
    }
</style>
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
    <?php if(isset($elemento) && !empty($elemento)): ?>
    <table class="tabla-suscriptores">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo</th> 
            </tr>
        </thead>
        <tbody>
            <?php foreach($elemento as $suscriptor): ?>
            <tr>
                <td><?=$suscriptor['id']?></td>
                <td><?=$suscriptor['nombre']?></td>
                <td><?=$suscriptor['email']?></td> 
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php endif; ?>
    
</div>
<?php require_once('blocks/pie.php'); ?>