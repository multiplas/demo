<?php require_once('blocks/cabecera.php'); ?>
<div class="span9" id="content">
    <!-- block -->
    <div class="block">
        <?php
            if (@$_GET['telf_adm']!="") {@$_SESSION['telef'] = @$_GET['telf_adm'];}
            
            $eltelefono = $_SESSION['telef'];
            $urlgenera = "http://".$_SERVER['SERVER_NAME']."/componentes/pdf/examples/example_006.php?eltelefono=$eltelefono";

            $_SESSION['spusr'] = true;
            if (@$_GET['fact_adm'] != null && @$_GET['fact_adm_uid'] != null)
            {
                ?>
                <script language="javascript" type="text/javascript">   
                    //Se ha modificado el 'imprimir_fact_adm' por 'imprimir_fact' ya que en esta web solo existe una única empresa
                    window.location.href = "http://<?=$_SERVER['SERVER_NAME']?>/index.php?imprimir_fact=<?=$_GET['fact_adm']?>&imprimir_fact_adm_uid=<?=$_GET['fact_adm_uid']?>";
                </script>
                <?php
            }
            else if (@$_GET['fact'] != '' && @$_GET['fact'] != null)
            {
                ?>
                <iframe style="border: none; height: 100%; max-width: 100%; width: 100%; min-height: 1200px;" src="<?=$urlgenera?>" />
                <?php
            }
        ?>
    </div>
    <!-- /block -->
</div>
<?php require_once('blocks/pie.php'); ?>