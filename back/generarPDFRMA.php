<?php require_once('blocks/cabecera.php'); ?>
<div class="span9" id="content">
    <!-- block -->
    <div class="block">
        <?php
            
            
           
            $urlgenera = "http://".$_SERVER['SERVER_NAME']."/componentes/pdf/examples/example_006.php?eltelefono=$eltelefono";

            
            if (@$_GET['id'] != null)
            {
                ?>
                <script language="javascript" type="text/javascript">   
                    //Se ha modificado el 'imprimir_fact_adm' por 'imprimir_fact' ya que en esta web solo existe una única empresa
                    window.location.href = "http://<?=$_SERVER['SERVER_NAME']?>/index.php?imprimir_rma=<?=$_GET['id']?>";
                </script>
                <?php
            }
        ?>
    </div>
    <!-- /block -->
</div>
<?php require_once('blocks/pie.php'); ?>