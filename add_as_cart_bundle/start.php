<?php
if(session_id() == '') {//Check if session started
    session_start();
}
?>

<script type="text/javascript">
(function(jQuery) {
jQuery(document).ready(function(){
    jQuery('#add_to_cart').click(function(){
        if (product_name == '') {             
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            quantity = jQuery('#quantity').val();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText == "not registered"){
                        window.location.replace("<?=$draizp?>/cuenta");
                    }
                    else{
                        document.getElementById("product_quantity").innerHTML = quantity;
                        document.getElementById("product_name").innerHTML = product_name;
                        jQuery('#added_to_cart').css("display","inherit");
                    }
                }
            };
            xmlhttp.open("GET", "<?=$draizp?>/add_as_cart_bundle/add_product.php?q=" + product_name +"&quantity=" + quantity, true);
            xmlhttp.send();
        }
    });
    jQuery('#close_cart').click(function(){
         jQuery('#added_to_cart').css("display","none");
    });
});
 })(jQuery);   
</script>