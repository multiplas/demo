<div class="buscarForm" id="buscarForm">
    <form action="<?= $draizp ?>/es/" method="post" name="formGlobalSearch" id="formGlobalSearch">
        <div class="input-group suggest">
            <input style="width: 200px;float:left;border:none;margin-top:2.5%" class="searchKeyword" id="searchKeywordId" name="searchKeywordName" value="" placeholder="Buscar..." type="text" autofocus>
            <span class="input-group-btn" style="display:inline;float:right;" onclick="javascript:document.getElementById('formGlobalSearch').submit();"><i class="fa fa-search fa-lg"></i></span>
        </div>
    </form>
    <div id="resultAutoComplete" class="suggest" style="border:none;"></div>
</div>
<script type="text/javascript" language="javascript">
        $(function ()
        {
            $(".searchKeyword").keyup(function ()
            {
                var searchKeywordValue = $(this).val();
                var dataString = 'searchAutoCompleteKeyWord=' + searchKeywordValue;
                
                if (searchKeywordValue != '')
                {
                    $.ajax({
                        type: "POST",
                        url: "/ajax/autoCompleteSearchArticulos.php",
                        data: dataString,
                        cache: false,
                        success: function (html)
                        {
                            $("#resultAutoComplete").html(html).show();
                        }
                    });
                }
                return false;
            });

        });
</script>