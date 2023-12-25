<?php 

// Single Validate - v1.0

if(!empty($_REQUEST["phone"])) {
    $val_phone = $_REQUEST["phone"];

    if(strlen($val_phone) == 10) {
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }
}

?>