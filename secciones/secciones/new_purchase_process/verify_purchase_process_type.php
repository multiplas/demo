<?php
function verify_purchase_process_type(){
    global $dbi;

    $sql = "SELECT * FROM `bd_procesopagoconf`
            WHERE id = 0";
    $query = mysqli_query($dbi, $sql);
    if (mysqli_num_rows($query) > 0)
    {
      $assoc = mysqli_fetch_assoc($query);
      $result = $assoc['valor'];
    }
    else
        $result = 0;
        
    return $result; 
}

if(!isset($purchase_process_type)) 
    $purchase_process_type = verify_purchase_process_type();

?>