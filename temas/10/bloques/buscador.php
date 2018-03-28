<?php
    $showAdvancedForm  = FALSE;
    $sqlAdvancedForm   = "SELECT activo FROM bd_buscadoravanzado WHERE Id = 1 ";
    $queryAdvancedForm = mysqli_query($dbi, $sqlAdvancedForm);
    $rowAdvancedForm   = mysqli_fetch_row($queryAdvancedForm);
    if ($rowAdvancedForm[0] == 1) {
        $showAdvancedForm = TRUE;
    }
?>
<div class="buscarForm" id="buscarForm">
    <form action="<?= $draizp ?>" method="post" name="formGlobalSearch" id="formGlobalSearch">
        <div class="input-group suggest">
            <input style="width: 85%;border:none;margin-top:5.5%" class="searchKeyword" id="searchKeywordId" name="buscar" value="" placeholder="Buscar..." type="text" autofocus>
            <span class="input-group-btn" style="display:inline;float:right;color:#333" onclick="javascript:document.getElementById('formGlobalSearch').submit();"><i class="fa fa-search fa-lg"></i></span>
        </div>
    </form>
    <?php
        if ($showAdvancedForm === TRUE) {
            ?>
            <div id="resultAutoComplete" style="border:none;"></div>
            <?php
        }
    ?>
</div>
<?php
    if ($showAdvancedForm === TRUE) {
        ?>
        <script type="text/javascript" language="javascript">
                jQuery(function ()
                {
                    jQuery(".searchKeyword").keyup(function ()
                    {
                        var searchKeywordValue = jQuery(this).val();
                        if(searchKeywordValue == '')
                            jQuery('#resultAutoComplete').css('display','none');
                        else
                            jQuery('#resultAutoComplete').css('display','block');
                        var dataString = 'searchAutoCompleteKeyWord=' + searchKeywordValue;

                        if (searchKeywordValue != '')
                        {
                            jQuery.ajax({
                                type: "POST",
                                url: "/ajax/autoCompleteSearchArticulos.php",
                                data: dataString,
                                cache: false,
                                success: function (html)
                                {
                                    jQuery("#resultAutoComplete").html(html).show();
                                }
                            });
                        }
                        return false;
                    });

                });
        </script>
        <?php
    }
?>